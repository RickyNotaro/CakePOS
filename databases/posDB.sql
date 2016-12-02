-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 23 Novembre 2016 à 23:00
-- Version du serveur :  5.6.31
-- Version de PHP :  7.0.10

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
  `id` int(11) unsigned NOT NULL,
  `customer_type` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `customers`
--

INSERT INTO `customers` (`id`, `customer_type`) VALUES
(1, 'Client Réguliers');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) unsigned NOT NULL,
  `payment_method_id` int(11) unsigned NOT NULL,
  `sales_transaction_id` int(11) unsigned NOT NULL,
  `payment_amount` float(10,5) NOT NULL,
  `other_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) unsigned NOT NULL,
  `payment_method_code` varchar(4) NOT NULL,
  `payment_method_name` varchar(100) NOT NULL,
  `payment_method_description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `payment_method_code`, `payment_method_name`, `payment_method_description`) VALUES
(1, 'CHK', 'Cheque', 'Written order to a bank to pay a certain amount of money from one person to another person.'),
(2, 'TRF', 'CreditTransfer', 'Transfer of an amount of money in the books of the account servicer.'),
(3, 'DD', 'DirectDebit', 'Collection of an amount of money from the debtor''s bank account by the creditor.  The amount of money and dates of collections may vary.'),
(4, 'TRA', 'TransferAdvice', 'Transfer of an amount of money in the books of the account servicer. An advice should be sent back to the account owner.'),
(5, 'DIRE', 'Direct', 'Direct Method'),
(6, 'CLAS', 'Classical', 'Classical Method');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `product_name` varchar(180) NOT NULL,
  `product_description` text NOT NULL,
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
-- Structure de la table `sales_outlets`
--

CREATE TABLE IF NOT EXISTS `sales_outlets` (
  `id` int(10) unsigned NOT NULL,
  `sales_outlet_name` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sales_outlets`
--

INSERT INTO `sales_outlets` (`id`, `sales_outlet_name`) VALUES
(1, 'Walmart');

-- --------------------------------------------------------

--
-- Structure de la table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `role` varchar(80) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `staffs`
--

INSERT INTO `staffs` (`id`, `username`, `email`, `password`, `notes`, `first_name`, `last_name`, `role`) VALUES
(2, 'rnotaro', 'rnotaro@localhost.com', '$2y$10$8b873MKhyq3jeWuagmPzFuP5dpmo5Zn.OplxdIbkiYYTCcpuw5x6G', 'Gros poop', 'Ricky', 'Notaro-Garcia', 'gestionnaire'),
(3, 'admin', 'admin@localhost.com', '$2y$10$lONd7R97kMVLrU7pO7foaOP.MseFaBsAj6b0Cs9o4tOCE8ha4Wey6', 'Password is admin', 'Admin', 'Nistrater', 'gestionnaire'),
(4, 'user', 'user@localhost.com', '$2y$10$HswtgTCndNhgbWT/Zo6qre.I1XUisiqGKimTJvbaUw6haVJi0Pipi', 'Password is User', 'User', 'Name', 'employe'),
(5, 'test', 'test@localhost.com', '$2y$10$4dqacWQaIVZhjYCo1rEmw.bF1Diy0TWwOJnCcpNHHH./v8UYm1LVG', 'test', 'test', 'test', 'employe');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) unsigned NOT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  `sales_outlet_id` int(11) unsigned NOT NULL,
  `staff_id` int(11) unsigned NOT NULL,
  `transaction_date_time` datetime NOT NULL,
  `transaction_retail_price` decimal(10,5) NOT NULL,
  `other_details` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `sales_outlet_id`, `staff_id`, `transaction_date_time`, `transaction_retail_price`, `other_details`) VALUES
(1, 1, 1, 2, '2016-10-19 20:15:00', '20.00000', 'fsdfsdf'),
(2, 1, 1, 2, '2016-11-01 18:01:00', '90.00000', 'ukt');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_id` (`id`),
  ADD KEY `customer_id_2` (`id`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_method_code` (`payment_method_id`),
  ADD KEY `transaction_id` (`sales_transaction_id`);

--
-- Index pour la table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_method_code` (`payment_method_code`);

--
--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products_transactions`
--
ALTER TABLE `products_transactions`
  ADD PRIMARY KEY (`product_id`,`transaction_id`) USING BTREE,
  ADD KEY `pf_transactionId` (`transaction_id`);

--
-- Index pour la table `sales_outlets`
--
ALTER TABLE `sales_outlets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `sales_outlet_id` (`sales_outlet_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `customer_id_2` (`customer_id`),
  ADD KEY `sales_outlet_id_2` (`sales_outlet_id`),
  ADD KEY `staff_id_2` (`staff_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_method_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sales_outlets`
--
ALTER TABLE `sales_outlets`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`sales_transaction_id`) REFERENCES `transactions` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`);

--
-- Contraintes pour la table `products_transactions`
--
ALTER TABLE `products_transactions`
  ADD CONSTRAINT `products_transactions_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_transactions_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`sales_outlet_id`) REFERENCES `sales_outlets` (`id`),
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`staff_id`) REFERENCES `staffs` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
