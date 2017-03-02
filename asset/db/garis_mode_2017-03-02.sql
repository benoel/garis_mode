# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.33)
# Database: garis_mode
# Generation Time: 2017-03-02 10:35:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table carts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;

INSERT INTO `carts` (`cart_id`, `user_id`, `product_id`, `qty`, `total_price`)
VALUES
	(81,14,25,1,255000);

/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table confirmations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `confirmations`;

CREATE TABLE `confirmations` (
  `confirmation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `no_invoice` varchar(50) DEFAULT NULL,
  `bankname` varchar(50) DEFAULT NULL,
  `accname` varchar(50) DEFAULT NULL,
  `noacc` varchar(50) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL,
  `pict` varchar(50) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `confirmation_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`confirmation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `confirmations` WRITE;
/*!40000 ALTER TABLE `confirmations` DISABLE KEYS */;

INSERT INTO `confirmations` (`confirmation_id`, `user_id`, `no_invoice`, `bankname`, `accname`, `noacc`, `message`, `pict`, `status`, `confirmation_date`)
VALUES
	(16,12,'GRM00001','BCA','ibnu abdul azis','111122233455555','sudah transfer','WhatsApp Image 2016-12-07 at 20.31.03 (1).jpeg','accepted','2016-12-15 17:46:22');

/*!40000 ALTER TABLE `confirmations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table discount
# ------------------------------------------------------------

DROP TABLE IF EXISTS `discount`;

CREATE TABLE `discount` (
  `discount_id` int(11) NOT NULL AUTO_INCREMENT,
  `discount` int(11) DEFAULT NULL,
  `desc` varchar(50) NOT NULL,
  `limit` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`discount_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `discount` WRITE;
/*!40000 ALTER TABLE `discount` DISABLE KEYS */;

INSERT INTO `discount` (`discount_id`, `discount`, `desc`, `limit`, `status`, `created_by`, `created`)
VALUES
	(1,10,'discount akhir tahun',300000,1,'1','2016-12-16 03:47:09');

/*!40000 ALTER TABLE `discount` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table expiredtime
# ------------------------------------------------------------

DROP TABLE IF EXISTS `expiredtime`;

CREATE TABLE `expiredtime` (
  `expired_id` int(11) NOT NULL AUTO_INCREMENT,
  `second` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`expired_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table orderdetails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orderdetails`;

CREATE TABLE `orderdetails` (
  `order_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_detail_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `orderdetails` WRITE;
/*!40000 ALTER TABLE `orderdetails` DISABLE KEYS */;

INSERT INTO `orderdetails` (`order_detail_id`, `order_id`, `product_id`, `qty`, `total_price`)
VALUES
	(66,63,22,2,300000),
	(65,63,23,3,525000);

/*!40000 ALTER TABLE `orderdetails` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `transfer_to` varchar(50) DEFAULT NULL,
  `delivery_address` text,
  `delivery_address_2` text,
  `city` varchar(50) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `courier` varchar(50) DEFAULT NULL,
  `service` varchar(50) DEFAULT NULL,
  `cost_courier` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `code_transfer` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `sign_by` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expired_date` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`order_id`, `no_invoice`, `user_id`, `name`, `transfer_to`, `delivery_address`, `delivery_address_2`, `city`, `zip_code`, `phone`, `courier`, `service`, `cost_courier`, `grand_total`, `code_transfer`, `status`, `sign_by`, `order_date`, `expired_date`)
VALUES
	(63,'GRM00001',12,'ibnu abdul azis','BCA','jalan duri raya','','Jakarta Barat','111450','08988972981','jne','CTC',9000,751500,NULL,'accepted',1,'2016-12-15 17:46:22','2016-12-16 00:28:48'),
	(64,'GRM00002',14,'alfajri','BCA','jalan jalan','','Jakarta Barat','12111','08984366475','jne','CTC',9000,324000,NULL,'expired',1,'2017-01-08 13:38:53','2017-01-08 13:55:07');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`product_id`, `name`, `price`, `stock`, `picture`, `category`, `tag`, `created`, `updated`, `created_by`, `updated_by`)
VALUES
	(9,'LENNON-BLACK-M',130000,9,'2.jpg','MEN','baju pria kaos hitam','2016-11-30 06:30:39',NULL,1,NULL),
	(8,'MUSICFESTIVAL-BLACK-M',100000,8,'1.jpg','MEN','baju pria kaos hitam','2016-11-30 06:30:42',NULL,1,NULL),
	(17,'PARTY-CATCHER-BLACK-M',75000,7,'3.jpg','MEN','baju pria kaos hitam','2016-11-30 06:30:44',NULL,1,NULL),
	(11,'JAPAN-HELMET-MISTY-WHITE-M',140000,10,'4.jpg','MEN','baju pria kaos putih','2016-11-30 06:30:46',NULL,1,NULL),
	(12,'SMILE-BLACK-M',120000,11,'5.jpg','MEN','baju pria kaos hitam','2016-11-30 06:30:48',NULL,1,NULL),
	(13,'LS-CHILDHOOD-BLACK-M',120000,6,'7.jpg','MEN','baju pria kaos hitam lengan panjang','2016-11-30 06:30:49',NULL,1,NULL),
	(14,'CHILDHOOD-BLACKBLUE-M',90000,10,'9.jpg','MEN','baju pria kaos hitam blue','2016-11-30 06:30:50',NULL,1,NULL),
	(15,'ELMO-PIXEL-BLACK-M',140000,6,'6.jpg','MEN','baju pria kaos hitam elmo','2016-11-30 06:30:52',NULL,1,NULL),
	(16,'LS-MUSICFESTIVAL-BLACK-M',150000,8,'8.jpg','MEN','baju pria kaos hitam lengan panjang','2016-11-30 06:30:54',NULL,1,NULL),
	(18,'SWEATER-MAGNUS-ST02 BLACK M',300000,9,'10.jpg','MEN','sweater','2016-11-30 06:30:55',NULL,1,NULL),
	(20,'BLOUSE-R-LORENA-ST-WHITEBLUE-F',130000,9,'11.jpg','WOMEN','lengan panjang wanita garis','2016-11-30 06:30:57',NULL,1,NULL),
	(21,'BLOUSE-R-JOSEPHINE-WHITE-F',175000,8,'12.jpg','WOMEN','josephine putih kaos wanita','2016-11-30 06:30:59',NULL,1,NULL),
	(22,'ASHER-SQUA-YELLOW-M',150000,7,'13.jpg','MEN','kemeja pria kotak-kotak ','2016-11-30 06:31:00',NULL,1,NULL),
	(23,'ASHER-SQUA-REDNAVY-M',175000,10,'14.jpg','MEN','kemeja pria kotak-kotak ','2016-11-30 06:31:02',NULL,1,NULL),
	(24,'JACKET-I-WILDER-STRIPE-MAROONWHITE-M',275000,10,'15.jpg','MEN','jaket pria garis merah','2016-11-30 06:31:03',NULL,1,NULL),
	(25,'SWEATER-I-THEO-NAVJO-RED-M',255000,6,'16.jpg','MEN','sweater merah pria motif','2016-11-30 06:44:36','2016-11-30 06:44:31',1,20);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `address`, `phone`, `email`, `role`, `active`, `last_login`, `created`)
VALUES
	(14,'fajri','437eb04136c59d226f14527f52726341','alfajri','jalan jalan','08989891121','alfajri@gmail.com',1,1,'2017-01-25 12:09:54','2016-11-13 08:58:43'),
	(12,'azis','be1f5695d087aad28f35603dda8719ab','ibnu abdul azis','jalan duri raya','08988972981','ben_oel@yahoo.com',1,1,'2016-12-16 06:25:56','2016-11-13 08:55:58'),
	(18,'tamam','8daf4d6ccab84245b60d2ee408e0d88c','badrud taman','Jalan asem','087850584166','tamam7373@gmail.com',1,1,'0000-00-00 00:00:00','2016-11-22 16:53:07'),
	(19,'zetry','68053af2923e00204c3ca7c6a3150cf7','zetry delta','kalideres','98799789098','zetryda@yahoo.com',1,1,'2016-11-30 06:53:36','2016-11-29 13:51:04'),
	(1,'admin','21232f297a57a5a743894a0e4a801fc3','admin',NULL,NULL,'ibnu.a.azis@gmail.com',3,1,'2017-03-01 11:33:22','2016-11-30 04:18:17'),
	(20,'ibnu','202cb962ac59075b964b07152d234b70','ibnu','jalan duri raya','02156353827','benoel04@gmail.com',2,1,'2017-01-23 10:59:52','2016-11-30 04:43:54');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
