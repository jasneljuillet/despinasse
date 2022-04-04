-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 03, 2022 at 06:51 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL,
  `brand_status` int(11) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(1, 'Apple', 1, 1),
(2, 'BRANA', 1, 2),
(3, 'Dell', 1, 2),
(4, 'Dell', 1, 2),
(5, 'Dell', 1, 1),
(6, 'HP', 1, 2),
(7, '7 Up', 1, 1),
(8, 'Vamark', 1, 1),
(9, 'IUO', 1, 2),
(10, 'Bongu', 1, 2),
(11, 'BNC', 1, 2),
(12, 'Orelus', 1, 2),
(13, 'Despinasse', 2, 2),
(14, 'Vamark', 1, 2),
(15, 'Merci', 1, 2),
(16, 'Catherine', 1, 2),
(17, 'Marco', 1, 2),
(18, 'ALLIANCE', 2, 2),
(19, 'CINOTECH', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL,
  `categories_status` int(11) NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `numClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  PRIMARY KEY (`numClient`)
) ENGINE=InnoDB AUTO_INCREMENT=736 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`numClient`, `nomClient`, `adresse`, `phone`) VALUES
(719, 'BEAUDYNE Logistics', 'Nazon rue Celime 3', '2765443'),
(720, 'Despinasse', '12345', ''),
(721, 'Despinasse', '12345', ''),
(722, 'Despinasse', '12345', ''),
(723, 'Despinasse', '12345', ''),
(724, 'Despinasse', '12345', ''),
(725, 'Despinasse', '12345', ''),
(726, 'Despinasse', '12345', ''),
(727, 'Despinasse', '12345', ''),
(728, 'Despinasse', '12345', ''),
(729, 'Despinasse', '12345', ''),
(730, 'Despinasse', '12345', ''),
(731, 'Despinasse', '12345', ''),
(732, 'Despinasse', '12345', ''),
(733, 'juillet', '12345', ''),
(734, 'juillet', '12345', ''),
(735, 'etienne', 'etienne@gmail.com', '44901752');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `client` varchar(50) NOT NULL,
  `sales` tinyint(1) NOT NULL,
  `dateSales` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Id`, `client`, `sales`, `dateSales`) VALUES
(1, 'Desmartech', 0, '0000-00-00'),
(2, 'UNIBANK', 1, '0000-00-00'),
(4, 'UNIBANK', 1, '2022-03-04'),
(5, 'Desmartech', 1, '0000-00-00'),
(6, 'Desmartech', 1, '2022-03-12'),
(7, 'Desmartech', 1, '2022-03-03'),
(8, 'Desmartech', 1, '2022-03-02'),
(9, 'Desmartech', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dossier`
--

DROP TABLE IF EXISTS `dossier`;
CREATE TABLE IF NOT EXISTS `dossier` (
  `Num_Dossier` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(150) NOT NULL,
  `TypeDossier` enum('Import','Export','Local','') NOT NULL,
  `Date_creation` date NOT NULL,
  `Destinataire` varchar(180) NOT NULL,
  `Description_collis` varchar(300) NOT NULL,
  `Poids_collis` float NOT NULL,
  `Bill_Lading` varchar(150) NOT NULL,
  `clientId` int(11) DEFAULT NULL,
  PRIMARY KEY (`Num_Dossier`),
  KEY `FK_Client` (`clientId`)
) ENGINE=InnoDB AUTO_INCREMENT=936 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dossier`
--

INSERT INTO `dossier` (`Num_Dossier`, `Nom`, `TypeDossier`, `Date_creation`, `Destinataire`, `Description_collis`, `Poids_collis`, `Bill_Lading`, `clientId`) VALUES
(907, 'Desmartech', 'Local', '2022-03-02', 'Port-au-Prine', 'Concentre', 140000, 'QWERTYUIOP', 719),
(928, 'VAMARK', 'Local', '2020-04-05', 'Jacmel', 'Compact', 12345.9, 'VAMARK900', 719),
(929, 'UNIBANK', 'Local', '2022-06-02', 'Jacmel', 'Concentre', 12345, 'UNI900', 719),
(932, 'NATCOM', 'Local', '2022-03-27', 'Jacmel', 'Concentre', 12450, 'NATCOM', 719);

-- --------------------------------------------------------

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `Id` int(11) NOT NULL,
  `numFacture` int(11) NOT NULL,
  `totalAmount` float NOT NULL,
  `Pay` float NOT NULL,
  `BalancePay` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `facture_items`
--

DROP TABLE IF EXISTS `facture_items`;
CREATE TABLE IF NOT EXISTS `facture_items` (
  `Id` int(11) NOT NULL,
  `factureId` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `prix` float NOT NULL,
  `client` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `orders_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `orders_item_status` int(11) NOT NULL,
  PRIMARY KEY (`orders_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_code`, `product_image`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(1, 'Back up', 'V-009', 'backup', 9000000, 5, '900', '900', 1, 1),
(2, 'Back up', 'V-009', 'backup', 1, 5, '900', '900', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pservices`
--

DROP TABLE IF EXISTS `pservices`;
CREATE TABLE IF NOT EXISTS `pservices` (
  `Id` int(11) NOT NULL,
  `serviceName` varchar(100) NOT NULL,
  `serviceDesc` text NOT NULL,
  `servicePrix` float(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pservices`
--

INSERT INTO `pservices` (`Id`, `serviceName`, `serviceDesc`, `servicePrix`) VALUES
(1, 'Tranport', 'Tranport', 50),
(2, 'Shipping', 'Shipping', 100),
(1, 'Tranport', 'Tranport', 50),
(2, 'Shipping', 'Shipping', 100);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `quantite` float DEFAULT NULL,
  `client` int(11) DEFAULT NULL,
  `dossier` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_clint` (`client`),
  KEY `FK_Dossier` (`dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=932 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `nom`, `prix`, `quantite`, `client`, `dossier`) VALUES
(1, 'Shipping', 100, 6, 719, 929),
(2, 'Tranport', 50, 3, 719, 928),
(3, 'Tranport', 50, 5, 719, 907),
(4, 'Tranport', 50, 10, 719, 907),
(5, 'Shipping', 100, 3, 719, 907),
(928, 'Billet Avion', 250, 3, 719, 928),
(929, 'Visa Saint Domingue', 400, 1, 719, 929),
(930, 'Shipping', 100, 2, 719, 907),
(931, 'Tranport', 50, 25, 719, 907);

-- --------------------------------------------------------

--
-- Table structure for table `tempcart`
--

DROP TABLE IF EXISTS `tempcart`;
CREATE TABLE IF NOT EXISTS `tempcart` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `client` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `isactive` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempcart`
--

INSERT INTO `tempcart` (`Id`, `client`, `product`, `price`, `isactive`) VALUES
(1, 'UNIBANK', 'Tranport', 50, 1),
(2, 'UNIBANK', 'Shipping', 100, 1),
(3, 'UNIBANK', 'Tranport', 50, 1),
(4, 'UNIBANK', 'Tranport', 50, 1),
(5, '', 'Shipping', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(2, 'jasnel', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(5, 'Despinas', '827ccb0eea8a706c4c34a16891f84e7b', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `FK_Client` FOREIGN KEY (`clientId`) REFERENCES `client` (`numClient`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK_Dossier` FOREIGN KEY (`dossier`) REFERENCES `dossier` (`Num_Dossier`),
  ADD CONSTRAINT `FK_clint` FOREIGN KEY (`client`) REFERENCES `client` (`numClient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
