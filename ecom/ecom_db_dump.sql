-- MySQL dump 10.13  Distrib 5.7.26, for osx10.9 (x86_64)
--
-- Host: localhost    Database: ecom_db
-- ------------------------------------------------------
-- Server version	5.7.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (31,'T-SHIRTS');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (63,345,'34535434','Completed','USD');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (15,'dfsg',31,10,0,'ddsfgfdsg','',''),(16,'dfsg',31,10,0,'ddsfgfdsg','',''),(17,'dfsg',31,10,0,'ddsfgfdsg','',''),(18,'dfsg',31,10,0,'ddsfgfdsg','',''),(19,'dfsg',31,10,0,'ddsfgfdsg','',''),(20,'dfsg',31,10,0,'ddsfgfdsg','',''),(21,'dfsg',31,10,0,'ddsfgfdsg','',''),(22,'dfsg',31,10,0,'ddsfgfdsg','',''),(23,'dfsg',31,10,0,'ddsfgfdsg','',''),(24,'dfsg',31,10,0,'ddsfgfdsg','',''),(25,'dfsg',31,10,0,'ddsfgfdsg','',''),(26,'dfsg',31,10,0,'ddsfgfdsg','',''),(27,'dfsg',31,10,0,'ddsfgfdsg','',''),(28,'dfsg',31,10,0,'ddsfgfdsg','',''),(29,'dfsg',31,10,0,'ddsfgfdsg','',''),(30,'dfsg',31,10,0,'ddsfgfdsg','',''),(31,'dfsg',31,10,0,'ddsfgfdsg','',''),(32,'dfsg',31,10,0,'ddsfgfdsg','',''),(33,'dfsg',31,10,0,'ddsfgfdsg','',''),(34,'dfsg',31,10,0,'ddsfgfdsg','',''),(35,'dfsg',31,10,0,'ddsfgfdsg','',''),(36,'dfsg',31,10,0,'ddsfgfdsg','',''),(37,'dfsg',31,10,0,'ddsfgfdsg','',''),(38,'dfsg',31,10,0,'ddsfgfdsg','',''),(39,'dfsg',31,10,0,'ddsfgfdsg','',''),(40,'dfsg',31,10,0,'ddsfgfdsg','',''),(41,'dfsg',31,10,0,'ddsfgfdsg','',''),(42,'dfsg',31,10,0,'ddsfgfdsg','',''),(45,'dfsg',31,10,0,'ddsfgfdsg','',''),(46,'dfsg',31,10,0,'ddsfgfdsg','',''),(47,'dfsg',31,10,0,'ddsfgfdsg','',''),(48,'dfsg',31,10,0,'ddsfgfdsg','',''),(49,'dfsg',31,10,0,'ddsfgfdsg','',''),(50,'dfsg',31,10,0,'ddsfgfdsg','',''),(51,'dfsg',31,10,0,'ddsfgfdsg','',''),(52,'dfsg',31,10,0,'ddsfgfdsg','',''),(53,'dfsg',31,10,0,'ddsfgfdsg','',''),(54,'dfsg',31,10,0,'ddsfgfdsg','',''),(55,'dfsg',31,10,0,'ddsfgfdsg','',''),(56,'dfsg',31,10,0,'ddsfgfdsg','',''),(57,'dfsg',31,10,0,'ddsfgfdsg','',''),(58,'dfsg',31,10,0,'ddsfgfdsg','',''),(59,'dfsg',31,10,0,'ddsfgfdsg','',''),(60,'dfsg',31,10,0,'ddsfgfdsg','',''),(61,'dfsg',31,10,0,'ddsfgfdsg','',''),(62,'dfsg',31,10,0,'ddsfgfdsg','',''),(63,'dfsg',31,10,0,'ddsfgfdsg','',''),(64,'dfsg',31,10,0,'ddsfgfdsg','',''),(65,'dfsg',31,10,0,'ddsfgfdsg','',''),(66,'dfsg',31,10,0,'ddsfgfdsg','',''),(67,'dfsg',31,10,0,'ddsfgfdsg','',''),(68,'dfsg',31,10,0,'ddsfgfdsg','',''),(69,'dfsg',31,10,0,'ddsfgfdsg','',''),(70,'dfsg',31,10,0,'ddsfgfdsg','',''),(71,'dfsg',31,10,0,'ddsfgfdsg','',''),(72,'dfsg',31,10,0,'ddsfgfdsg','',''),(73,'dfsg',31,10,0,'ddsfgfdsg','',''),(74,'dfsg',31,10,0,'ddsfgfdsg','',''),(75,'dfsg',31,10,0,'ddsfgfdsg','',''),(76,'dfsg',31,10,0,'ddsfgfdsg','',''),(77,'dfsg',31,10,0,'ddsfgfdsg','',''),(78,'dfsg',31,10,0,'ddsfgfdsg','',''),(79,'dfsg',31,10,0,'ddsfgfdsg','',''),(80,'dfsg',31,10,0,'ddsfgfdsg','',''),(81,'dfsg',31,10,0,'ddsfgfdsg','',''),(82,'dfsg',31,10,0,'ddsfgfdsg','',''),(83,'dfsg',31,10,0,'ddsfgfdsg','',''),(84,'dfsg',31,10,0,'ddsfgfdsg','',''),(85,'dfsg',31,10,0,'ddsfgfdsg','',''),(86,'dfsg',31,10,0,'ddsfgfdsg','',''),(87,'dfsg',31,10,0,'ddsfgfdsg','',''),(88,'dfsg',31,10,0,'ddsfgfdsg','',''),(89,'dfsg',31,10,0,'ddsfgfdsg','',''),(90,'dfsg',31,10,0,'ddsfgfdsg','',''),(91,'dfsg',31,10,0,'ddsfgfdsg','',''),(92,'dfsg',31,10,0,'ddsfgfdsg','',''),(93,'dfsg',31,10,0,'ddsfgfdsg','',''),(94,'dfsg',31,10,0,'ddsfgfdsg','',''),(95,'dfsg',31,10,0,'ddsfgfdsg','',''),(96,'dfsg',31,10,0,'ddsfgfdsg','',''),(97,'dfsg',31,10,0,'ddsfgfdsg','',''),(98,'dfsg',31,10,0,'ddsfgfdsg','',''),(99,'dfsg',31,10,0,'ddsfgfdsg','',''),(100,'dfsg',31,10,0,'ddsfgfdsg','',''),(101,'dfsg',31,10,0,'ddsfgfdsg','',''),(102,'dfsg',31,10,0,'ddsfgfdsg','',''),(103,'dfsg',31,10,0,'ddsfgfdsg','',''),(104,'dfsg',31,10,0,'ddsfgfdsg','',''),(105,'dfsg',31,10,0,'ddsfgfdsg','',''),(106,'dfsg',31,10,0,'ddsfgfdsg','',''),(107,'dfsg',31,10,0,'ddsfgfdsg','',''),(108,'dfsg',31,10,0,'ddsfgfdsg','',''),(109,'109 Product',31,10,7,'HEllo','',''),(110,'dsfsdaf',31,10,12,'asdfas','','');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reports`
--

LOCK TABLES `reports` WRITE;
/*!40000 ALTER TABLE `reports` DISABLE KEYS */;
INSERT INTO `reports` VALUES (37,1,61,24.99,'product 1',1),(38,1,62,24.99,'product 1',1);
/*!40000 ALTER TABLE `reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slides` (
  `slide_title` varchar(255) NOT NULL,
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_image` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slides`
--

LOCK TABLES `slides` WRITE;
/*!40000 ALTER TABLE `slides` DISABLE KEYS */;
INSERT INTO `slides` VALUES ('CMS',10,'image_1.jpg'),('Javascript',11,'image_4.jpg'),('Bootstrap',12,'image_3.jpg'),('Edwin Diaz',13,'image_2.jpg');
/*!40000 ALTER TABLE `slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'rico','edwin@edwindiaz.com','123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-08  6:52:53
