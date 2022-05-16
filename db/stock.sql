-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2022 at 05:44 PM
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
  `personne` varchar(255) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  PRIMARY KEY (`numClient`)
) ENGINE=InnoDB AUTO_INCREMENT=744 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`numClient`, `nomClient`, `adresse`, `personne`, `phone`, `tel`) VALUES
(719, 'BEAUDYNE Logistics', 'Nazon rue Celime 5', 'Martino Pierre', '2765443', '29908651'),
(740, 'Santpon', '16 bis 2ieme Imp.Lavaud', 'Ilfodotte Valcourt', '39098765', '28789090'),
(741, 'UNIBANK', '2,rue celimene Nzon', 'Marinez Lopez', '28909090', '34567890'),
(742, 'FAES', '3, Delmas 75', 'Jenny Lia', '28789090', '22212345'),
(743, 'Despinasse', '3, rue celimene Nazon', 'Jolie Mama', '28909090', '34567890');

-- --------------------------------------------------------

--
-- Table structure for table `clientreference`
--

DROP TABLE IF EXISTS `clientreference`;
CREATE TABLE IF NOT EXISTS `clientreference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_reference` varchar(100) NOT NULL,
  `client` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client` (`client`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientreference`
--

INSERT INTO `clientreference` (`id`, `no_reference`, `client`) VALUES
(1, 'JJ-994', 742),
(3, 'Bga-008', 742),
(5, 'despinasse-09000', 743);

-- --------------------------------------------------------

--
-- Table structure for table `clienttransport`
--

DROP TABLE IF EXISTS `clienttransport`;
CREATE TABLE IF NOT EXISTS `clienttransport` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `typeDossier` varchar(100) NOT NULL,
  `client` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `client` (`client`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clienttransport`
--

INSERT INTO `clienttransport` (`Id`, `typeDossier`, `client`) VALUES
(2, 'Aerien', 742),
(3, 'Aerien', 743);

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
) ENGINE=InnoDB AUTO_INCREMENT=941 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dossier`
--

INSERT INTO `dossier` (`Num_Dossier`, `Nom`, `TypeDossier`, `Date_creation`, `Destinataire`, `Description_collis`, `Poids_collis`, `Bill_Lading`, `clientId`) VALUES
(907, 'Desmartech', 'Local', '2022-03-02', 'Port-au-Prine', 'Concentre', 140000, '', 719),
(928, 'VAMARK', 'Local', '2020-04-05', 'Jacmel', 'Compact', 12345.9, '', 719),
(929, 'UNIBANK', 'Local', '2022-06-02', 'Jacmel', 'Concentre', 12345, '', 719),
(932, 'NATCOM', 'Local', '2022-03-27', 'Jacmel', 'Concentre', 12450, '', 719),
(938, 'vamark', 'Local', '2022-04-04', 'Jeremie', 'Concentre', 12345, '', 719),
(939, 'Jasnel', 'Local', '2022-05-07', 'Jasnel Juillet', 'Description des collis', 120, '45', 742),
(940, 'Despinasse', 'Export', '2022-05-16', 'Jeremie', 'Concentre', 12345, '', 743);

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
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceName` varchar(100) NOT NULL,
  `prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pservices`
--

INSERT INTO `pservices` (`Id`, `serviceName`, `prix`) VALUES
(1, 'Shipping', 50),
(2, 'Transport', 40),
(5, 'Livraison', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

DROP TABLE IF EXISTS `reference`;
CREATE TABLE IF NOT EXISTS `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_reference` varchar(180) NOT NULL,
  `dossier` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dossier` (`dossier`)
) ENGINE=MyISAM AUTO_INCREMENT=170 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`id`, `no_reference`, `dossier`) VALUES
(1, 'ajsn45', 939),
(165, 'despinasse2022-2023-2024', 939),
(168, 'despinasse-900', 940),
(157, '7799', 939),
(162, 'des001', 939),
(166, '7y', 929),
(167, '7y', 929);

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
) ENGINE=InnoDB AUTO_INCREMENT=1170 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `nom`, `prix`, `quantite`, `client`, `dossier`) VALUES
(3, 'Tranport', 50, 5, 719, 907),
(4, 'Tranport', 50, 10, 719, 907),
(5, 'Shipping', 100, 3, 719, 907),
(928, 'Billet Avion', 250, 3, 719, 928),
(929, 'Visa Saint Domingue', 400, 1, 719, 929),
(930, 'Shipping', 100, 2, 719, 907),
(931, 'Tranport', 50, 25, 719, 907),
(932, 'Tranport', 50, 1, 719, 929),
(936, 'Tranport', 90, 3, 740, NULL),
(938, 'Tranport', 45, 3, 740, NULL),
(939, 'Tranport', 40, 2, 740, NULL),
(940, 'Tranport', 12, 2, 740, NULL),
(947, 'Tranport', 120, 1, 719, 938),
(948, 'Shipping', 150, 2, 719, 938),
(960, 'Shipping', 22, 1, 741, NULL),
(965, 'Shipping', 22, 1, 741, NULL),
(969, 'Shipping', 22, 1, 741, NULL),
(970, 'Shipping', 22, 1, 741, NULL),
(971, 'Shipping', 22, 1, 741, NULL),
(972, 'Shipping', 22, 1, 741, NULL),
(973, 'Shipping', 22, 1, 741, NULL),
(974, 'Shipping', 22, 1, 741, NULL),
(975, 'Shipping', 22, 1, 741, NULL),
(976, 'Shipping', 22, 1, 741, NULL),
(977, 'Shipping', 22, 1, 741, NULL),
(978, 'Shipping', 22, 1, 741, NULL),
(979, 'Shipping', 22, 1, 741, NULL),
(981, 'Shipping', 22, 1, 741, NULL),
(982, 'Shipping', 22, 1, 741, NULL),
(983, 'Shipping', 22, 1, 741, NULL),
(984, 'Shipping', 22, 1, 741, NULL),
(985, 'Shipping', 22, 1, 741, NULL),
(986, 'Shipping', 22, 1, 741, NULL),
(987, 'Shipping', 22, 1, 741, NULL),
(988, 'Shipping', 22, 1, 741, NULL),
(989, 'Shipping', 22, 1, 741, NULL),
(990, 'Shipping', 22, 1, 741, NULL),
(991, 'Shipping', 22, 1, 741, NULL),
(992, 'Shipping', 22, 1, 741, NULL),
(995, 'Shipping', 22, 1, 741, NULL),
(996, 'Shipping', 22, 1, 741, NULL),
(998, 'Shipping', 22, 1, 741, NULL),
(999, 'Shipping', 22, 1, 741, NULL),
(1003, 'Shipping', 22, 1, 741, NULL),
(1004, 'Shipping', 22, 1, 741, NULL),
(1005, 'Shipping', 22, 1, 741, NULL),
(1007, 'Shipping', 22, 1, 741, NULL),
(1008, 'Shipping', 22, 1, 741, NULL),
(1009, 'Shipping', 22, 1, 741, NULL),
(1010, 'Shipping', 22, 1, 741, NULL),
(1011, 'Shipping', 22, 1, 741, NULL),
(1012, 'Shipping', 22, 1, 741, NULL),
(1013, 'Shipping', 22, 1, 741, NULL),
(1014, 'Shipping', 22, 1, 741, NULL),
(1015, 'Shipping', 22, 1, 741, NULL),
(1016, 'Shipping', 22, 1, 741, NULL),
(1017, 'Shipping', 22, 1, 741, NULL),
(1018, 'Shipping', 22, 1, 741, NULL),
(1019, 'Shipping', 22, 1, 741, NULL),
(1020, 'Shipping', 22, 1, 741, NULL),
(1021, 'Shipping', 22, 1, 741, NULL),
(1023, 'Shipping', 22, 1, 741, NULL),
(1024, 'Shipping', 22, 1, 741, NULL),
(1025, 'Shipping', 22, 1, 741, NULL),
(1026, 'Shipping', 22, 1, 741, NULL),
(1027, 'Shipping', 22, 1, 741, NULL),
(1029, 'Shipping', 22, 1, 741, NULL),
(1030, 'Shipping', 22, 1, 741, NULL),
(1031, 'Shipping', 22, 1, 741, NULL),
(1032, 'Shipping', 22, 1, 741, NULL),
(1033, 'Shipping', 22, 1, 741, NULL),
(1034, 'Shipping', 22, 1, 741, NULL),
(1035, 'Shipping', 22, 1, 741, NULL),
(1036, 'Shipping', 22, 1, 741, NULL),
(1037, 'Shipping', 22, 1, 741, NULL),
(1038, 'Shipping', 22, 1, 741, NULL),
(1039, 'Shipping', 22, 1, 741, NULL),
(1040, 'Shipping', 22, 1, 741, NULL),
(1041, 'Shipping', 22, 1, 741, NULL),
(1042, 'Shipping', 22, 1, 741, NULL),
(1043, 'Shipping', 22, 1, 741, NULL),
(1044, 'Shipping', 22, 1, 741, NULL),
(1045, 'Shipping', 22, 1, 741, NULL),
(1046, 'Shipping', 22, 1, 741, NULL),
(1048, 'Shipping', 22, 1, 741, NULL),
(1049, 'Shipping', 22, 1, 741, NULL),
(1050, 'Shipping', 22, 1, 741, NULL),
(1051, 'Shipping', 22, 1, 741, NULL),
(1052, 'Shipping', 22, 1, 741, NULL),
(1053, 'Shipping', 22, 1, 741, NULL),
(1054, 'Shipping', 22, 1, 741, NULL),
(1055, 'Shipping', 22, 1, 741, NULL),
(1056, 'Shipping', 22, 1, 741, NULL),
(1057, 'Shipping', 22, 1, 741, NULL),
(1058, 'Shipping', 22, 1, 741, NULL),
(1059, 'Shipping', 22, 1, 741, NULL),
(1060, 'Shipping', 22, 1, 741, NULL),
(1061, 'Shipping', 22, 1, 741, NULL),
(1062, 'Shipping', 22, 1, 741, NULL),
(1063, 'Shipping', 22, 1, 741, NULL),
(1064, 'Shipping', 22, 1, 741, NULL),
(1065, 'Shipping', 22, 1, 741, NULL),
(1066, 'Shipping', 22, 1, 741, NULL),
(1067, 'Shipping', 22, 1, 741, NULL),
(1068, 'Shipping', 22, 1, 741, NULL),
(1069, 'Shipping', 22, 1, 741, NULL),
(1071, 'Shipping', 22, 1, 741, NULL),
(1072, 'Shipping', 22, 1, 741, NULL),
(1073, 'Shipping', 22, 1, 741, NULL),
(1074, 'Shipping', 22, 1, 741, NULL),
(1075, 'Shipping', 22, 1, 741, NULL),
(1076, 'Shipping', 22, 1, 741, NULL),
(1077, 'Shipping', 22, 1, 741, NULL),
(1078, 'Shipping', 22, 1, 741, NULL),
(1079, 'Shipping', 22, 1, 741, NULL),
(1080, 'Shipping', 22, 1, 741, NULL),
(1081, 'Shipping', 22, 1, 741, NULL),
(1083, 'Shipping', 22, 1, 741, NULL),
(1084, 'Shipping', 22, 1, 741, NULL),
(1085, 'Shipping', 22, 1, 741, NULL),
(1086, 'Shipping', 22, 1, 741, NULL),
(1087, 'Shipping', 22, 1, 741, NULL),
(1088, 'Shipping', 22, 1, 741, NULL),
(1089, 'Shipping', 22, 1, 741, NULL),
(1090, 'Shipping', 22, 1, 741, NULL),
(1091, 'Shipping', 22, 1, 741, NULL),
(1092, 'Shipping', 22, 1, 741, NULL),
(1093, 'Shipping', 22, 1, 741, NULL),
(1094, 'Shipping', 22, 1, 741, NULL),
(1095, 'Shipping', 22, 1, 741, NULL),
(1096, 'Shipping', 22, 1, 741, NULL),
(1097, 'Shipping', 22, 1, 741, NULL),
(1098, 'Shipping', 22, 1, 741, NULL),
(1099, 'Shipping', 22, 1, 741, NULL),
(1100, 'Shipping', 22, 1, 741, NULL),
(1101, 'Shipping', 22, 1, 741, NULL),
(1103, 'Shipping', 22, 1, 741, NULL),
(1104, 'Shipping', 22, 1, 741, NULL),
(1105, 'Shipping', 22, 1, 741, NULL),
(1106, 'Shipping', 22, 1, 741, NULL),
(1107, 'Tranport', 33, 1, 741, NULL),
(1108, 'Tranport', 33, 1, 741, NULL),
(1109, 'Tranport', 33, 1, 741, NULL),
(1110, 'Tranport', 33, 1, 741, NULL),
(1111, 'Tranport', 33, 1, 741, NULL),
(1112, 'Tranport', 33, 1, 741, NULL),
(1113, 'Tranport', 33, 1, 741, NULL),
(1114, 'Tranport', 33, 1, 741, NULL),
(1115, 'Tranport', 33, 1, 741, NULL),
(1116, 'Tranport', 33, 1, 741, NULL),
(1117, 'Tranport', 33, 1, 741, NULL),
(1118, 'Tranport', 33, 1, 741, NULL),
(1119, 'Tranport', 33, 1, 741, NULL),
(1121, 'Tranport', 33, 1, 741, NULL),
(1122, 'Tranport', 33, 1, 741, NULL),
(1123, 'Tranport', 33, 1, 741, NULL),
(1124, 'Tranport', 33, 1, 741, NULL),
(1127, 'Tranport', 33, 1, 741, NULL),
(1128, 'Tranport', 33, 1, 741, NULL),
(1129, 'Tranport', 33, 1, 741, NULL),
(1130, 'Tranport', 33, 1, 741, NULL),
(1132, 'Tranport', 33, 1, 741, NULL),
(1135, 'Tranport', 33, 1, 741, NULL),
(1149, 'Shipping', 60, 5, 742, NULL),
(1150, 'Shipping', 20, 5, 742, NULL),
(1151, 'Tranport', 25, 3, 742, NULL),
(1152, 'Tranport', 44, 4, 742, NULL),
(1153, 'Shipping', 67, 6, 742, NULL),
(1156, 'Tranport', 45, 2, 719, NULL),
(1157, 'Livraison', 77, 2, 740, NULL),
(1159, 'Transport', 45, 3, 742, 939),
(1160, 'Shipping', 77, 10, 742, 939),
(1161, 'Shipping', 100, 1, 742, 939),
(1162, 'Shipping', 100, 1, 743, NULL),
(1163, 'Transport', 200, 1, 743, NULL),
(1164, 'Livraison', 90, 2, 743, NULL),
(1165, 'Transport', 200, 1, 743, 940),
(1166, 'Transport', 100, 1, 743, 940),
(1167, 'Livraison', 200, 2, 743, 940),
(1168, 'Shipping', 50, 1, 743, 940),
(1169, 'Transport', 30, 2, 743, 940);

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
-- Table structure for table `transport`
--

DROP TABLE IF EXISTS `transport`;
CREATE TABLE IF NOT EXISTS `transport` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `typedossier` enum('Aerien','Maritime','Routier') NOT NULL,
  `dossier` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FK_Transport` (`dossier`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`Id`, `typedossier`, `dossier`) VALUES
(1, 'Maritime', 939),
(20, 'Maritime', 938),
(21, 'Maritime', 929),
(22, 'Maritime', 940);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `status`) VALUES
(2, 'jasnel', '827ccb0eea8a706c4c34a16891f84e7b', 'adm'),
(5, 'Despinas', '827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(7, 'carine', 'b59c67bf196a4758191e42f76670ceba', 'user'),
(8, 'pierre', '84675f2baf7140037b8f5afe54eef841', 'user'),
(9, 'saul2', 'b59c67bf196a4758191e42f76670ceba', 'adm'),
(11, 'jjj', 'b59c67bf196a4758191e42f76670ceba', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientreference`
--
ALTER TABLE `clientreference`
  ADD CONSTRAINT `clientreference_ibfk_1` FOREIGN KEY (`client`) REFERENCES `client` (`numClient`);

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

--
-- Constraints for table `transport`
--
ALTER TABLE `transport`
  ADD CONSTRAINT `FK_Transport` FOREIGN KEY (`dossier`) REFERENCES `dossier` (`Num_Dossier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
