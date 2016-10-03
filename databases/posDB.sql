-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2016 at 12:53 AM
-- Server version: 5.6.28
-- PHP Version: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posDB`
--
CREATE DATABASE IF NOT EXISTS `posDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `posDB`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) unsigned NOT NULL,
  `customer_type` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_type`) VALUES
(1, 'Client Réguliers');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) unsigned NOT NULL,
  `payment_method_code` int(11) unsigned NOT NULL,
  `sales_transaction_id` int(11) unsigned NOT NULL,
  `payment_amount` float(10,5) NOT NULL,
  `other_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `product_details` text NOT NULL,
  `product_wholesale_price` decimal(10,5) NOT NULL,
  `product_retail_price` decimal(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products_transactions`
--

DROP TABLE IF EXISTS `products_transactions`;
CREATE TABLE IF NOT EXISTS `products_transactions` (
  `product_id` int(10) unsigned NOT NULL,
  `sales_transaction_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ref_payment_methods`
--

DROP TABLE IF EXISTS `ref_payment_methods`;
CREATE TABLE IF NOT EXISTS `ref_payment_methods` (
  `payment_method_code` int(11) unsigned NOT NULL,
  `payment_method_name` varchar(100) NOT NULL,
  `payment_method_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_payment_methods`
--

INSERT INTO `ref_payment_methods` (`payment_method_code`, `payment_method_name`, `payment_method_description`) VALUES
(0, 'Visa', 'Payment par carte de crédit visa.');

-- --------------------------------------------------------

--
-- Table structure for table `sales_outlets`
--

DROP TABLE IF EXISTS `sales_outlets`;
CREATE TABLE IF NOT EXISTS `sales_outlets` (
  `id` int(10) unsigned NOT NULL,
  `sales_outlet_detail` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_transactions`
--

DROP TABLE IF EXISTS `sales_transactions`;
CREATE TABLE IF NOT EXISTS `sales_transactions` (
  `id` int(11) unsigned NOT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  `sales_outlet_id` int(11) unsigned NOT NULL,
  `staff_id` int(11) unsigned NOT NULL,
  `transaction_date_time` datetime NOT NULL,
  `transaction_wholesale_price` decimal(10,5) NOT NULL,
  `transaction_retail_price` decimal(10,5) NOT NULL,
  `other_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

DROP TABLE IF EXISTS `staffs`;
CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `role` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `username`, `email`, `password`, `notes`, `first_name`, `last_name`, `role`) VALUES
(2, 'rnotaro', 'test@localhost.com', '$2y$10$8b873MKhyq3jeWuagmPzFuP5dpmo5Zn.OplxdIbkiYYTCcpuw5x6G', '', 'Ricky', 'Notaro-Garcia', 'gestionnaire');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`id`),
  ADD KEY `customer_id_2` (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_method_code` (`payment_method_code`),
  ADD KEY `transaction_id` (`sales_transaction_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_transactions`
--
ALTER TABLE `products_transactions`
  ADD PRIMARY KEY (`product_id`,`sales_transaction_id`) USING BTREE,
  ADD KEY `pf_transactionId` (`sales_transaction_id`);

--
-- Indexes for table `ref_payment_methods`
--
ALTER TABLE `ref_payment_methods`
  ADD PRIMARY KEY (`payment_method_code`);

--
-- Indexes for table `sales_outlets`
--
ALTER TABLE `sales_outlets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_transactions`
--
ALTER TABLE `sales_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `sales_outlet_id` (`sales_outlet_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `customer_id_2` (`customer_id`),
  ADD KEY `sales_outlet_id_2` (`sales_outlet_id`),
  ADD KEY `staff_id_2` (`staff_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales_outlets`
--
ALTER TABLE `sales_outlets`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_pmc` FOREIGN KEY (`payment_method_code`) REFERENCES `ref_payment_methods` (`payment_method_code`),
  ADD CONSTRAINT `fk_transactionid` FOREIGN KEY (`sales_transaction_id`) REFERENCES `sales_transactions` (`id`);

--
-- Constraints for table `products_transactions`
--
ALTER TABLE `products_transactions`
  ADD CONSTRAINT `products_transactions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_transactions_ibfk_2` FOREIGN KEY (`sales_transaction_id`) REFERENCES `sales_transactions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
