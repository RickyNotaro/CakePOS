-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 19 Septembre 2016 à 13:15
-- Version du serveur :  5.6.30
-- Version de PHP :  7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `posDB`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) unsigned NOT NULL,
  `customer_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) unsigned NOT NULL,
  `payment_method_code` int(11) unsigned NOT NULL,
  `transaction_id` int(11) unsigned NOT NULL,
  `payment_amount` float(10,5) NOT NULL,
  `other_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) unsigned NOT NULL,
  `product_details` text NOT NULL,
  `product_wholesale_price` decimal(10,5) NOT NULL,
  `product_retail_price` decimal(10,5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products_transactions`
--

CREATE TABLE IF NOT EXISTS `products_transactions` (
  `product_id` int(10) unsigned NOT NULL,
  `transaction_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ref_payment_methods`
--

CREATE TABLE IF NOT EXISTS `ref_payment_methods` (
  `payment_method_code` int(11) unsigned NOT NULL,
  `payment_method_name` varchar(100) NOT NULL,
  `payment_method_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sales_outlet`
--

CREATE TABLE IF NOT EXISTS `sales_outlet` (
  `sales_outlet_id` int(10) unsigned NOT NULL,
  `sales_outlet_detaild` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sales_transaction`
--

CREATE TABLE IF NOT EXISTS `sales_transaction` (
  `transaction_id` int(11) unsigned NOT NULL,
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
-- Structure de la table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(10) unsigned NOT NULL,
  `staff_details` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_id` (`customer_id`),
  ADD KEY `customer_id_2` (`customer_id`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_method_code` (`payment_method_code`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `products_transactions`
--
ALTER TABLE `products_transactions`
  ADD PRIMARY KEY (`product_id`,`transaction_id`) USING BTREE,
  ADD KEY `pf_transactionId` (`transaction_id`);

--
-- Index pour la table `ref_payment_methods`
--
ALTER TABLE `ref_payment_methods`
  ADD PRIMARY KEY (`payment_method_code`);

--
-- Index pour la table `sales_outlet`
--
ALTER TABLE `sales_outlet`
  ADD PRIMARY KEY (`sales_outlet_id`);

--
-- Index pour la table `sales_transaction`
--
ALTER TABLE `sales_transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `sales_outlet_id` (`sales_outlet_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `customer_id_2` (`customer_id`),
  ADD KEY `sales_outlet_id_2` (`sales_outlet_id`),
  ADD KEY `staff_id_2` (`staff_id`);

--
-- Index pour la table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sales_outlet`
--
ALTER TABLE `sales_outlet`
  MODIFY `sales_outlet_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_pmc` FOREIGN KEY (`payment_method_code`) REFERENCES `ref_payment_methods` (`payment_method_code`),
  ADD CONSTRAINT `fk_transactionid` FOREIGN KEY (`transaction_id`) REFERENCES `sales_transaction` (`transaction_id`);

--
-- Contraintes pour la table `products_transactions`
--
ALTER TABLE `products_transactions`
  ADD CONSTRAINT `pf_productId` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `pf_transactionId` FOREIGN KEY (`transaction_id`) REFERENCES `sales_transaction` (`transaction_id`);

--
-- Contraintes pour la table `sales_transaction`
--
ALTER TABLE `sales_transaction`
  ADD CONSTRAINT `fk_customerId` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `fk_salesOutletId` FOREIGN KEY (`sales_outlet_id`) REFERENCES `sales_outlet` (`sales_outlet_id`),
  ADD CONSTRAINT `fk_staffId` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
