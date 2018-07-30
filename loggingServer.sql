-- MySQL dump 10.13  Distrib 5.7.19, for Linux (x86_64)
--
-- Host: localhost    Database: loggingServer
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1.1

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
-- Table structure for table `app_users`
--

DROP TABLE IF EXISTS `app_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(60) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_users`
--

LOCK TABLES `app_users` WRITE;
/*!40000 ALTER TABLE `app_users` DISABLE KEYS */;
INSERT INTO `app_users` VALUES (1,'tuulia','$2y$12$sBuSBzqLEEAALYB/JcE1I.gZWx1cPUOmDCaSwl5Kd/JDF3NhGUOWG','tuulia@test.nl',1,'ROLE_USER'),(2,'admin','$2y$12$sBuSBzqLEEAALYB/JcE1I.gZWx1cPUOmDCaSwl5Kd/JDF3NhGUOWG','admin_@test.nl',1,'ROLE_ADMIN');
/*!40000 ALTER TABLE `app_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_systems`
--

DROP TABLE IF EXISTS `client_systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_systems` (
  `client_systems_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `apikey` text COLLATE utf8_unicode_ci NOT NULL,
  `pubkey` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`client_systems_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_systems`
--

LOCK TABLES `client_systems` WRITE;
/*!40000 ALTER TABLE `client_systems` DISABLE KEYS */;
INSERT INTO `client_systems` VALUES (1,'Test 1','dsf23sf','dsf32345356734ewr'),(2,'Test 2','234324dsf23sf','ds35345f3234ewr'),(3,'Test 3','sdfgfdsf23sf','dsfxxxx32345356734ewr'),(4,'Test 4','23234ffff23sf','ds35234jkfsjk234ewr');
/*!40000 ALTER TABLE `client_systems` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `level` enum('1','2','3') COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('1','2','3') COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_systems_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'1','1',2,'Blaah asda asdasd','2018-07-21 17:05:51'),(2,'1','2',2,'Blaah aaaa asda asdasd','2018-07-21 17:05:51'),(3,'2','3',2,'as asdasdasd asdBlaah asda asdasd','2018-07-21 17:05:51'),(4,'2','1',2,'Blaah asda das asdad asdasd','2018-07-21 17:05:51'),(5,'1','2',2,'Blaah  asd 34 ds sdfasd','2018-07-21 17:05:51'),(6,'2','3',2,'as asd as23 sdf ;kl jklhjkh dasd','2018-07-21 17:05:51'),(7,'1','1',3,'Blaah asda asdasd','2018-07-21 17:05:51'),(8,'1','1',3,'Blaah asda asdasd','2018-07-21 17:05:51'),(9,'1','1',3,'Blaah asda asdasd','2018-07-21 17:05:51'),(10,'1','2',3,'A asd asdas asda asdasd','2018-07-21 17:05:51'),(11,'2','3',3,'D sf dsfdsfsdasd','2018-07-21 17:05:51'),(12,'2','1',3,'Jh jhg 23723 sfsdf sdf mnmd','2018-07-21 17:05:51'),(13,'1','2',3,'Bas sd asdads4 ds sdfasd','2018-07-21 17:05:51'),(14,'2','3',3,'aS sd dsfdskh dasd','2018-07-21 17:05:51'),(15,'1','1',1,'Hello World','2018-07-21 17:42:29');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs_levels`
--

DROP TABLE IF EXISTS `logs_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs_levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs_levels`
--

LOCK TABLES `logs_levels` WRITE;
/*!40000 ALTER TABLE `logs_levels` DISABLE KEYS */;
INSERT INTO `logs_levels` VALUES (1,'Error'),(2,'Warn'),(3,'Notice');
/*!40000 ALTER TABLE `logs_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs_types`
--

DROP TABLE IF EXISTS `logs_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs_types`
--

LOCK TABLES `logs_types` WRITE;
/*!40000 ALTER TABLE `logs_types` DISABLE KEYS */;
INSERT INTO `logs_types` VALUES (1,'Application'),(2,'Security'),(3,'System');
/*!40000 ALTER TABLE `logs_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_alert`
--

DROP TABLE IF EXISTS `mail_alert`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_alert` (
  `mail_alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(4) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  PRIMARY KEY (`mail_alert_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_alert`
--

LOCK TABLES `mail_alert` WRITE;
/*!40000 ALTER TABLE `mail_alert` DISABLE KEYS */;
INSERT INTO `mail_alert` VALUES (1,1,2);
/*!40000 ALTER TABLE `mail_alert` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_alert_app_user`
--

DROP TABLE IF EXISTS `mail_alert_app_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_alert_app_user` (
  `mail_alert_id` int(11) NOT NULL,
  `app_user_id` int(11) NOT NULL,
  PRIMARY KEY (`mail_alert_id`,`app_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_alert_app_user`
--

LOCK TABLES `mail_alert_app_user` WRITE;
/*!40000 ALTER TABLE `mail_alert_app_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_alert_app_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_alert_filter`
--

DROP TABLE IF EXISTS `mail_alert_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_alert_filter` (
  `mail_alert_filter_id` int(11) NOT NULL AUTO_INCREMENT,
  `mail_alert_id` int(11) DEFAULT NULL,
  `filter_field` varchar(100) NOT NULL,
  `operator` varchar(10) DEFAULT NULL,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`mail_alert_filter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_alert_filter`
--

LOCK TABLES `mail_alert_filter` WRITE;
/*!40000 ALTER TABLE `mail_alert_filter` DISABLE KEYS */;
INSERT INTO `mail_alert_filter` VALUES (1,1,'system','=','1'),(2,1,'type','=','2'),(3,1,'level','=','1');
/*!40000 ALTER TABLE `mail_alert_filter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `roles_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES ('ROLE_ADMIN','Admin'),('ROLE_USER','User');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-21 21:12:33
