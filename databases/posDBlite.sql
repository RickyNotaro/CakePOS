
--
-- Client :  localhost
-- Généré le :  Mer 09 Novembre 2016 à 15:06

--
-- Base de données :  `posDB`
--

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` INTEGER PRIMARY KEY ASC,
  `customer_type` varchar(255) NOT NULL
);

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
  `id` INTEGER PRIMARY KEY ASC,
  `payment_method_id` INTEGER unsigned NOT NULL,
  `sales_transaction_id` INTEGER unsigned NOT NULL,
  `payment_amount` float(10,5) NOT NULL,
  `other_details` text NOT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` INTEGER PRIMARY KEY ASC,
  `payment_method_code` varchar(4) NOT NULL,
  `payment_method_name` varchar(100) NOT NULL,
  `payment_method_description` text NOT NULL
);

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` INTEGER PRIMARY KEY ASC,
  `product_name` varchar(180) NOT NULL,
  `product_description` text NOT NULL,
  `product_retail_price` decimal(10,5) NOT NULL
);

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_description`, `product_retail_price`) VALUES
(3, 'Crayon', 'BEAU CRAYON', '10.00000'),
(4, 'Caramel', 'Wowo', '3.00000'),
(5, 'Granola 200mg', 'Wow such granola', '2.00000');

-- --------------------------------------------------------

--
-- Structure de la table `products_transactions`
--

CREATE TABLE IF NOT EXISTS `products_transactions` (
  `id` INTEGER PRIMARY KEY ASC,
  `product_id` INTEGER unsigned NOT NULL,
  `transaction_id` INTEGER unsigned NOT NULL,
  `quantity` INTEGER NOT NULL
);

--
-- Contenu de la table `products_transactions`
--

INSERT INTO `products_transactions` (`id`, `product_id`, `transaction_id`, `quantity`) VALUES
(1, 3, 6, 10),
(5, 3, 6, 5);

-- --------------------------------------------------------

--
-- Structure de la table `sales_outlets`
--

CREATE TABLE IF NOT EXISTS `sales_outlets` (
  `id` INTEGER PRIMARY KEY ASC,
  `sales_outlet_name` varchar(11) NOT NULL
);

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
  `id` INTEGER PRIMARY KEY ASC,
  `username` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `role` varchar(80) NOT NULL
);

--
-- Contenu de la table `staffs`
--

INSERT INTO `staffs` (`id`, `username`, `email`, `password`, `notes`, `first_name`, `last_name`, `role`) VALUES
(2, 'rnotaro', 'rnotaro@localhost.com', '$2y$10$8b873MKhyq3jeWuagmPzFuP5dpmo5Zn.OplxdIbkiYYTCcpuw5x6G', 'Note test', 'Ricky', 'Notaro-Garcia', 'gestionnaire'),
(3, 'admin', 'admin@localhost.com', '$2y$10$lONd7R97kMVLrU7pO7foaOP.MseFaBsAj6b0Cs9o4tOCE8ha4Wey6', 'Password is admin', 'Admin', 'Nistrater', 'gestionnaire'),
(4, 'user', 'user@localhost.com', '$2y$10$HswtgTCndNhgbWT/Zo6qre.I1XUisiqGKimTJvbaUw6haVJi0Pipi', 'Password is User', 'User', 'Name', 'employe');

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` INTEGER PRIMARY KEY ASC,
  `customer_id` INTEGER unsigned NOT NULL,
  `sales_outlet_id` INTEGER unsigned NOT NULL,
  `staff_id` INTEGER unsigned NOT NULL,
  `transaction_date_time` datetime NOT NULL,
  `transaction_retail_price` decimal(10,5) NOT NULL,
  `other_details` text NOT NULL
);

--
-- Contenu de la table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `sales_outlet_id`, `staff_id`, `transaction_date_time`, `transaction_retail_price`, `other_details`) VALUES
(00000000006, 1, 1, 2, '2016-11-02 22:39:00', '20.00000', 'fgsdfgdfsgfd');

--
-- Index pour les tables exportées
--

