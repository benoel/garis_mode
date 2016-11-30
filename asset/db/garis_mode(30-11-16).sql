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

-- Dumping database structure for garis_mode
CREATE DATABASE IF NOT EXISTS `garis_mode` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `garis_mode`;


-- Dumping structure for table garis_mode.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- Dumping data for table garis_mode.carts: 0 rows
DELETE FROM `carts`;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`, `qty`, `total_price`) VALUES
	(73, 12, 25, 1, 255000);
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;


-- Dumping structure for table garis_mode.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `details` text,
  `cover` varchar(300) DEFAULT NULL,
  `type` smallint(1) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table garis_mode.categories: 0 rows
DELETE FROM `categories`;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table garis_mode.confirmations
CREATE TABLE IF NOT EXISTS `confirmations` (
  `confirmation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `pict` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `confirmation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`confirmation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table garis_mode.confirmations: 1 rows
DELETE FROM `confirmations`;
/*!40000 ALTER TABLE `confirmations` DISABLE KEYS */;
INSERT INTO `confirmations` (`confirmation_id`, `user_id`, `no_invoice`, `message`, `pict`, `status`, `confirmation_date`) VALUES
	(14, 19, 'GRM00006', 'sudah tranfer jam 6', '', 'accepted', '2016-11-29 21:17:15');
/*!40000 ALTER TABLE `confirmations` ENABLE KEYS */;


-- Dumping structure for table garis_mode.orderdetails
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  PRIMARY KEY (`order_detail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

-- Dumping data for table garis_mode.orderdetails: 1 rows
DELETE FROM `orderdetails`;
/*!40000 ALTER TABLE `orderdetails` DISABLE KEYS */;
INSERT INTO `orderdetails` (`order_detail_id`, `order_id`, `product_id`, `qty`, `total_price`) VALUES
	(61, 59, 22, 1, 150000);
/*!40000 ALTER TABLE `orderdetails` ENABLE KEYS */;


-- Dumping structure for table garis_mode.orders
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
  `sign_by` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expired_date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

-- Dumping data for table garis_mode.orders: 7 rows
DELETE FROM `orders`;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`order_id`, `no_invoice`, `user_id`, `name`, `transfer_to`, `delivery_address`, `delivery_address_2`, `city`, `zip_code`, `phone`, `grand_total`, `code_transfer`, `status`, `sign_by`, `order_date`, `expired_date`) VALUES
	(55, 'GRM00002', 18, 'taman', 'MANDIRI', 'Jalan jalan', '', 'jakarta', '22121', '089766677', 391500, NULL, 'expired', 1, '2016-11-30 13:11:43', '2016-11-23 00:39:40'),
	(54, 'GRM00001', 14, 'askjhaj', 'BCA', 'klhckjh', 'j', '', '', '', 175000, NULL, 'expired', 1, '2016-11-30 13:11:45', '2016-11-20 19:21:43'),
	(56, 'GRM00003', 14, 'sdfkjh', 'BCA', 'skdjfh', '', 'jakarta', '876', '080979870897', 130000, NULL, 'expired', 1, '2016-11-30 13:11:47', '2016-11-23 00:40:50'),
	(57, 'GRM00004', 12, 'ibnu abdul azis', 'BCA', 'jalan', '', 'jakarta', '12121211', '089898989898', 150000, NULL, 'expired', 1, '2016-11-30 13:11:48', '2016-11-25 22:20:16'),
	(58, 'GRM00005', 19, 'anina', 'BCA', 'kalideres', '', 'jakarta', '111840', '087789977', 315000, NULL, 'expired', 1, '2016-11-30 13:11:51', '2016-11-29 21:06:23'),
	(59, 'GRM00006', 19, 'anina', 'BCA', 'kali dered', '', 'jakarta', '111840', '089898989898', 150000, NULL, 'accepted', 20, '2016-11-30 13:11:54', '2016-11-29 21:22:05'),
	(60, 'GRM00007', 19, 'fdfd', 'MANDIRI', 'trdtr', '', 'jakarta', '65675754', '8098098098098', 255000, NULL, 'expired', 20, '2016-11-30 13:11:58', '2016-11-29 21:23:53');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;


-- Dumping structure for table garis_mode.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table garis_mode.products: 16 rows
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_id`, `name`, `price`, `stock`, `picture`, `category`, `tag`, `created`, `updated`, `created_by`, `updated_by`) VALUES
	(9, 'LENNON-BLACK-M', 130000, 9, '2.jpg', 'MEN', 'baju pria kaos hitam', '2016-11-30 13:30:39', NULL, 1, NULL),
	(8, 'MUSICFESTIVAL-BLACK-M', 100000, 8, '1.jpg', 'MEN', 'baju pria kaos hitam', '2016-11-30 13:30:42', NULL, 1, NULL),
	(17, 'PARTY-CATCHER-BLACK-M', 75000, 7, '3.jpg', 'MEN', 'baju pria kaos hitam', '2016-11-30 13:30:44', NULL, 1, NULL),
	(11, 'JAPAN-HELMET-MISTY-WHITE-M', 140000, 10, '4.jpg', 'MEN', 'baju pria kaos putih', '2016-11-30 13:30:46', NULL, 1, NULL),
	(12, 'SMILE-BLACK-M', 120000, 11, '5.jpg', 'MEN', 'baju pria kaos hitam', '2016-11-30 13:30:48', NULL, 1, NULL),
	(13, 'LS-CHILDHOOD-BLACK-M', 120000, 6, '7.jpg', 'MEN', 'baju pria kaos hitam lengan panjang', '2016-11-30 13:30:49', NULL, 1, NULL),
	(14, 'CHILDHOOD-BLACKBLUE-M', 90000, 10, '9.jpg', 'MEN', 'baju pria kaos hitam blue', '2016-11-30 13:30:50', NULL, 1, NULL),
	(15, 'ELMO-PIXEL-BLACK-M', 140000, 6, '6.jpg', 'MEN', 'baju pria kaos hitam elmo', '2016-11-30 13:30:52', NULL, 1, NULL),
	(16, 'LS-MUSICFESTIVAL-BLACK-M', 150000, 8, '8.jpg', 'MEN', 'baju pria kaos hitam lengan panjang', '2016-11-30 13:30:54', NULL, 1, NULL),
	(18, 'SWEATER-MAGNUS-ST02 BLACK M', 300000, 9, '10.jpg', 'MEN', 'sweater', '2016-11-30 13:30:55', NULL, 1, NULL),
	(20, 'BLOUSE-R-LORENA-ST-WHITEBLUE-F', 130000, 4, '11.jpg', 'WOMEN', 'lengan panjang wanita garis', '2016-11-30 13:30:57', NULL, 1, NULL),
	(21, 'BLOUSE-R-JOSEPHINE-WHITE-F', 175000, 8, '12.jpg', 'WOMEN', 'josephine putih kaos wanita', '2016-11-30 13:30:59', NULL, 1, NULL),
	(22, 'ASHER-SQUA-YELLOW-M', 150000, 9, '13.jpg', 'MEN', 'kemeja pria kotak-kotak ', '2016-11-30 13:31:00', NULL, 1, NULL),
	(23, 'ASHER-SQUA-REDNAVY-M', 175000, 15, '14.jpg', 'MEN', 'kemeja pria kotak-kotak ', '2016-11-30 13:31:02', NULL, 1, NULL),
	(24, 'JACKET-I-WILDER-STRIPE-MAROONWHITE-M', 275000, 4, '15.jpg', 'MEN', 'jaket pria garis merah', '2016-11-30 13:31:03', NULL, 1, NULL),
	(25, 'SWEATER-I-THEO-NAVJO-RED-M', 255000, 6, '16.jpg', 'MEN', 'sweater merah pria motif', '2016-11-30 13:44:36', '2016-11-30 13:44:31', 1, 20);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;


-- Dumping structure for table garis_mode.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table garis_mode.users: 6 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `address`, `phone`, `email`, `role`, `active`, `last_login`, `created`) VALUES
	(14, 'fajri', '437eb04136c59d226f14527f52726341', 'alfajri', 'jalan jalan', '08989891121', 'alfajri@gmail.com', 1, 1, '2016-11-28 11:05:34', '2016-11-13 15:58:43'),
	(12, 'azis', 'be1f5695d087aad28f35603dda8719ab', 'ibnu abdul azis', 'jalan duri raya', '08988972981', 'ben_oel@yahoo.com', 1, 1, '2016-11-30 14:15:13', '2016-11-13 15:55:58'),
	(18, 'tamam', '8daf4d6ccab84245b60d2ee408e0d88c', 'badrud taman', 'Jalan asem', '087850584166', 'tamam7373@gmail.com', 1, 1, '0000-00-00 00:00:00', '2016-11-22 23:53:07'),
	(19, 'zetry', '68053af2923e00204c3ca7c6a3150cf7', 'zetry delta', 'kalideres', '98799789098', 'zetryda@yahoo.com', 1, 1, '2016-11-30 13:53:36', '2016-11-29 20:51:04'),
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, NULL, 'ibnu.a.azis@gmail.com', 3, 1, '2016-11-30 14:05:21', '2016-11-30 11:18:17'),
	(20, 'ibnu', '21232f297a57a5a743894a0e4a801fc3', 'ibnu', 'jalan duri raya', '02156353827', 'benoel04@gmail.com', 2, 1, '2016-11-30 13:48:35', '2016-11-30 11:43:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
