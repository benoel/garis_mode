-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.37 - Source distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for u6724920_garmod
CREATE DATABASE IF NOT EXISTS `u6724920_garmod` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `u6724920_garmod`;


-- Dumping structure for table u6724920_garmod.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table u6724920_garmod.admins: 3 rows
DELETE FROM `admins`;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`admin_id`, `username`, `password`, `name`, `level`, `active`, `created`) VALUES
	(8, 'putri', '82682943a05de360abb183236c632bd6', 'putri nurdiyanti', 0, 0, '2016-11-13 12:04:34'),
	(7, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 1, 1, '2016-11-13 11:51:43'),
	(13, 'regar', '2dca6e5533fd729c6b5f71f8f12aed91', 'saud siregar', 0, 1, '2016-11-13 15:19:49');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;


-- Dumping structure for table u6724920_garmod.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

-- Dumping data for table u6724920_garmod.carts: 0 rows
DELETE FROM `carts`;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;


-- Dumping structure for table u6724920_garmod.confirmations
CREATE TABLE IF NOT EXISTS `confirmations` (
  `confirmation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `pict` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `confirmation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`confirmation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table u6724920_garmod.confirmations: 1 rows
DELETE FROM `confirmations`;
/*!40000 ALTER TABLE `confirmations` DISABLE KEYS */;
INSERT INTO `confirmations` (`confirmation_id`, `user_id`, `no_invoice`, `message`, `pict`, `status`, `confirmation_date`) VALUES
	(13, 12, 'GRM00004', 'sudah di transfer pukul 18:00', '', 'accepted', '2016-11-15 13:13:08');
/*!40000 ALTER TABLE `confirmations` ENABLE KEYS */;


-- Dumping structure for table u6724920_garmod.orderdetails
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  PRIMARY KEY (`order_detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Dumping data for table u6724920_garmod.orderdetails: 1 rows
DELETE FROM `orderdetails`;
/*!40000 ALTER TABLE `orderdetails` DISABLE KEYS */;
INSERT INTO `orderdetails` (`order_detail_id`, `order_id`, `product_id`, `qty`, `total_price`) VALUES
	(52, 51, 9, 1, 130000);
/*!40000 ALTER TABLE `orderdetails` ENABLE KEYS */;


-- Dumping structure for table u6724920_garmod.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `transfer_to` varchar(50) NOT NULL,
  `delivery_address` text,
  `delivery_address_2` text,
  `city` varchar(50) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `code_transfer` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expired_date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

-- Dumping data for table u6724920_garmod.orders: 2 rows
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`order_id`, `no_invoice`, `user_id`, `name`, `transfer_to`, `delivery_address`, `delivery_address_2`, `city`, `zip_code`, `phone`, `grand_total`, `code_transfer`, `status`, `order_date`, `expired_date`) VALUES
	(51, 'GRM00004', 12, 'ibnu abdul azis', 'BCA', 'jalan duri raya', '', 'jakarta', '112112', '08988972981', 130000, NULL, 'accepted', '2016-11-15 13:13:08', '2016-11-15 12:49:24'),
	(52, 'GRM00005', 12, 'ibnu abdul azis', 'MANDIRI', 'jalan duri raya', '', 'jakarta', '111450', '08988972981', 150000, NULL, 'expired', '2016-11-15 13:18:04', '2016-11-15 12:56:52');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


-- Dumping structure for table u6724920_garmod.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table u6724920_garmod.products: 10 rows
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `name`, `price`, `stock`, `picture`, `category`, `tag`, `created`) VALUES
	(9, 'LENNON-BLACK-M', 130000, 9, '2.jpg', 'MEN', 'baju pria kaos hitam', '2016-11-15 12:39:00'),
	(8, 'MUSICFESTIVAL-BLACK-M', 100000, 8, '1.jpg', 'MEN', 'baju pria kaos hitam', '2016-11-13 16:51:30'),
	(17, 'PARTY-CATCHER-BLACK-M', 75000, 7, '3.jpg', 'MEN', 'baju pria kaos hitam', '2016-11-15 13:18:04'),
	(11, 'JAPAN-HELMET-MISTY-WHITE-M', 140000, 10, '4.jpg', 'MEN', 'baju pria kaos putih', '2016-11-15 00:06:36'),
	(12, 'SMILE-BLACK-M', 120000, 11, '5.jpg', 'MEN', 'baju pria kaos hitam', '2016-11-14 23:40:43'),
	(13, 'LS-CHILDHOOD-BLACK-M', 120000, 6, '7.jpg', 'MEN', 'baju pria kaos hitam lengan panjang', '2016-11-14 21:45:28'),
	(14, 'CHILDHOOD-BLACKBLUE-M', 90000, 10, '9.jpg', 'MEN', 'baju pria kaos hitam blue', '2016-11-15 12:40:50'),
	(15, 'ELMO-PIXEL-BLACK-M', 140000, 6, '6.jpg', 'MEN', 'baju pria kaos hitam elmo', '2016-11-15 12:40:50'),
	(16, 'LS-MUSICFESTIVAL-BLACK-M', 150000, 8, '8.jpg', 'MEN', 'baju pria kaos hitam lengan panjang', '2016-11-15 12:18:55'),
	(18, 'SWEATER-MAGNUS-ST02 BLACK M', 300000, 9, '10.jpg', 'MEN', 'sweater', '2016-11-15 12:40:44');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table u6724920_garmod.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table u6724920_garmod.users: 2 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `address`, `phone`, `email`, `active`, `last_login`, `created`) VALUES
	(14, 'fajri', '437eb04136c59d226f14527f52726341', 'alfajri', 'jalan taman ratu', '08989891121', 'alfajri@gmail.com', 1, NULL, '2016-11-13 15:58:43'),
	(12, 'azis', 'e8ad0151a6cfa40aca2ad69b1f502fde', 'ibnu abdul azis', 'jalan duri raya', '08988972981', 'ben_oel@yahoo.com', 1, NULL, '2016-11-13 15:55:58');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
