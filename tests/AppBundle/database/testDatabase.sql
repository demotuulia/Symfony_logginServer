-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: loggingServer
-- ------------------------------------------------------
-- Server version	5.5.49-0ubuntu0.14.04.1

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
-- Table structure for table `client_systems`
--
use `loggingServerTest`;

DROP TABLE IF EXISTS `client_systems`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client_systems` (
  `client_systems_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `apikey` text COLLATE utf8_unicode_ci NOT NULL,
  `pubkey` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`client_systems_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_systems`
--

LOCK TABLES `client_systems` WRITE;
/*!40000 ALTER TABLE `client_systems` DISABLE KEYS */;
/*
Private keys for each client are configured in
    app/config/parameters_test.yml
*/
INSERT INTO `client_systems` VALUES
(1,'Test 1','dsf23sf','-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAyb9ULxg0c5JPD1G8OKTX
Nhz5WZo72/B5o6CiYt2h4ioUa+R5+3Jq9hbD/VRct1q3M8KLewp1D6UUjHOnjHQ4
TdI4ro18i3798HdAfnTZMx3DiAcKCSdHKehUjrj2mcsZVNyrWN4jp1SV3tLgcQWX
IL4ghgrJXk48oX2odNenUxqONDXjFhxATU7FXP/+d0ti00TvULexgpJz9LLa/MBX
zGjiu2eJAzx/8qMhxeWeJ8aC+eOOGDoi/03eJu9S+SKTCYB7VvcqYjmFFQ+gXLm5
t1GE1g6kAEfAu8q0VHiITrq8x2rDN//OlYnKfY9gAHsrfgWyPDamxKZ3QoXHCdZb
spg17+iq5fIsoIaY3yi7tQ1aNaWjKoAQpcMEpUYBZNbQYyiTbKvCLxnaMI/oKX1L
CfKEtO2oezNKgylotYEH5q4BpAz/lnlC4HDorfCt5Tckb56vyUKfPB05KvBhRwaW
HJGfZa+OHoMsYpoZCeAwl1QVq2mUdpwje7CQt2gpmEjjTEPLH6BR0tGFT0gqFzQC
eenWT7hVf3T013pxvb49yPP5rPIgBiZgaV+c+KbyXL1XS3iJFaB1mPnzLkk0gVMZ
9xstTWxN6Fxw9lBT+DkDAGmcnY5T1QQxGujU+VdmBrW5RaJ2m8WUEaYNGKWEhCMg
IEyr9+hl2DONVns7SRy18YkCAwEAAQ==
-----END PUBLIC KEY-----'),

(2,'Test 2','234324dsf23sf','-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEA0xIfYHx0OfWfN4PWtRY5
iwp1sUjc1aXgryNCF3HnfqYSS3Mur0XgvtbDcgXtUU1qtdhiwT2+oY8f1a5Kup44
cXQotFMAaz342BhTIczpu64uISRv+t7FkX6v0UfVfz2B7snIboSFfuayGuZljvjK
VCKPM+dgsyjjMipebGGRxB4E+mVEt0LvScanDprDv9h4RDlSRFMVXw9qv6Z27pQM
xmZMsjzMk23xbHRu5CKkEWTUBjWqJ9t1c3O5M4IC2/NC4n9AiwvdJe4W3yUFVEMt
xN3WH17JEhOJ9LVhZVOOuPHEr7gkDWgLcyRwpNcRQSQL6Gak7SnE0uqI1fPUwfRo
6kiJOpKj9ax4q9spyD5aKt0mlVN8U3aMXpVALMfIRT4zy43KZPsqBUy5IB5+WPO1
lsIkMx1Md7lPEzN0bOapZaJVScTZ67r8brA3PicpmmqW8nkG39wb+hKqUrpEMo50
pefiGc1mcvslpb2AQnnnm91m4rbbSbjCnlbXermcX/YEr78oqrtNujVCHR2xvvgL
TCvSPRwY9SUbhprMab2pc6MSvFBpaNugS90VS4Qei3Ow6Rx0YYVudRUm2HiZR1v9
lIimm6/v2fADsbJPy60fTscu6iGfo/dKVswxbbmL/d0o4xSFgcUZCUr3Z9c6Rg/c
5pf4Q7Ma7kH7xrYpmAovVFcCAwEAAQ==
-----END PUBLIC KEY-----'),

(3,'Test 3','sdfgfdsf23sf','-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAr73Pq50+jlQRZgYx6+vn
m2ib9H1mWmcOZ2qWc/XGMKeKgZEg  I02RIe9rEm+gstvRI/gMVGstjdxZWYwZG5RT
jbMREoZOv3RlA1pqKSmzrLmKowkKcKdG+NwEhe4mWViDvuMgF7/dkDdppZVx8yro
Q1LlO+N0wrYfCzyRzCp6pZzDGrwp3qsrasqow1I1P2JI8ubpOjEfq0uIAVhboh1a
E3HujHQKQWP8FTBAHJNWnKMRp1yiUfykgVea7CyU0GLDm39Xr/u9jQFa915PFw2d
EBSvR1Yq/POK+JakC41LJFO7R+JtN3Tp1qPJ1IWEiu4pu/DqDGuMKj2OrY7zFgqa
RU+bp9PSUto44nC0YiKXQnxHXMd8iPaNhvG56x+xfz0+aKXCFDQEHlr22sJmMSFT
wC16Inw5IPCr/hvwhpGgf2Pw0EFi94/LkQiDxpm7llKvv+LbNI9O54mTZGrSak8I
VvokRg0aszaH9fFDT1Gsi9za76lowPhmUTjNYag2HULoHKKr/rxd0FIxYDWgKFhq
xrfjvYptrxvNhL0XOL4KnfX/W7xys5gesCA4Q32gDdAEEvEC0GpR9uoDFN0Prxdr
Es8sKMisLTBYs70MAq+mgJzR6LwqjxWdc5RCr0JD2Kayd/IovzCVyBPtnbKWotYj
OJf4rr6if6sgaX0eXjWi4jMCAwEAAQ==
-----END PUBLIC KEY-----'),

(4,'Test 4','23234ffff23sf','-----BEGIN PUBLIC KEY-----
MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAupZvgbA8otQag/tB9aPl
b5kWTMe/CyZxEql0/j3noJgitUM0cQ49qCxICxN58J+PzX1WoID3pn9pupmu7SS0
mbYga1VsaxFUDYO4JY9BF8ldg9q3yndtKoR/y4eDD3eC4q6Dhi13KSdZrCbADjds
T/b545RDJ+/FHiFk+APPoTaXtUtkp24KBS6tiDnO/ZvGkFvB2UsMuSAjq+6zHbpf
x3NA7tmS2DX3ZTNBMiFWLL8fsiEf5H8r6usUN+QE6FJua41xWqT1ZthPzX3RYjZZ
KgG0Wql5xSMk/POHCoD/oB3wznIRnhYgeQegCN7nQjuPgh+GTUkuXPShKTTRvSSl
EWitizUIfp9aYx2gqYHH2uLUiiwekB79kgftwRhb4gI2d567wvhNRK+mBuZUBl4P
cvabkw72UJryrirc94FT/AChV/f9JdnG6EzDo2W26trylyTTRQ9988OZbT9JRrah
4glr+E53td2+9lB4TCUCqnxEy1wuoUbWOkVlP+vS0Thrcomapw2YZiH0Kg83GyVJ
/9I35E/dlJHEx+2E/dRUuyHnGF4Usj0xkQ9ww7Y8kN/j8x4PG8P6aP8bzzu81NXN
sjUVEray9KJT7kOd8ePKBijX+LS5EXJHjU/ZQ6ZX7X3LWXHXd+3wSSV8qWwtw05b
K2/3RTuNRalcwCYQL35SepcCAwEAAQ==
-----END PUBLIC KEY-----');


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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES
(1,'1','1',2,'Blaah asda asdasd','2016-07-25 09:26:29'),
(2,'1','2',2,'Blaah aaaa asda asdasd','2016-07-25 09:26:29'),
(3,'2','3',2,'as asdasdasd asdBlaah asda asdasd','2016-07-25 09:26:29'),
(4,'2','1',2,'Blaah asda das asdad asdasd','2016-07-25 09:26:29'),
(5,'1','2',2,'Blaah  asd 34 ds sdfasd','2016-07-25 09:26:29'),
(6,'2','3',2,'as asd as23 sdf ;kl jklhjkh dasd','2016-07-25 09:26:29'),
(7,'1','1',3,'Blaah asda asdasd','2016-07-25 09:26:29'),
(8,'1','1',3,'Blaah asda asdasd','2016-07-25 09:26:29'),
(9,'1','1',3,'Blaah asda asdasd','2016-07-25 09:26:29'),
(10,'1','2',3,'A asd asdas asda asdasd','2016-07-25 09:26:29'),
(11,'2','3',3,'D sf dsfdsfsdasd','2016-07-25 09:26:29'),
(12,'2','1',3,'Jh jhg 23723 sfsdf sdf mnmd','2016-07-25 09:26:29'),
(13,'1','2',3,'Bas sd asdads4 ds sdfasd','2016-07-25 09:26:29'),
(14,'2','3',3,'aS sd dsfdskh dasd','2016-07-25 09:26:29'),
(15,'2','1',2,'da ada asdadasdas','2016-07-24 09:26:29'),
(16,'3','2',2,'daasd ad ad asda asdasd','2016-07-24 09:26:29'),
(17,'2','3',2,'aasd fggh fh fhhfsd','2016-07-24 09:26:29'),
(18,'3','1',2,'Blasdfs fsd fdssd','2016-07-24 09:26:29'),
(19,'2','2',2,'Blaaasdas dass sdfasd','2016-07-24 09:26:29'),
(20,'1','3',2,'aasd asd3 sdf ;kl jklhjkh dasd','2016-07-24 09:26:29'),
(21,'2','1',3,'Bladasd adsdasd','2016-07-24 09:26:29'),
(22,'3','1',3,'Blaaadasd asdasd','2016-07-24 09:26:29'),
(23,'1','1',3,'Bladasda asasd dasd dasd','2016-07-24 09:26:29'),
(24,'2','2',3,'A asdad daasd ad dasd asda asdasd','2016-07-24 09:26:29'),
(25,'3','3',3,'D sfasd dasd','2016-07-24 09:26:29'),
(26,'2','1',3,'Jasd23723asd ad sfsdf sdf mnmd','2016-07-24 09:26:29'),
(27,'2','2',3,'Bas dasasdaasdads4 ds sdfasd','2016-07-24 09:26:29'),
(28,'1','3',3,'aS sd dsasdasdaskh dasd','2016-07-24 09:26:29'),
(29,'1','2',2,'da ada asdadasdas','2016-07-15 09:26:29'),
(30,'3','3',2,'daasd ad ad asda asdasd','2016-07-15 09:26:29'),
(31,'2','2',2,'aasd fggh fh fhhfsd','2016-07-15 09:26:29'),
(32,'1','2',2,'Blasdfs fsd fdssd','2016-07-15 09:26:29'),
(33,'2','3',2,'Blaaasdas dass sdfasd','2016-07-15 09:26:29'),
(34,'3','1',2,'aasd asd3 sdf ;kl jklhjkh dasd','2016-07-15 09:26:29'),
(35,'2','2',3,'Bladasd adsdasd','2016-07-15 09:26:29'),
(36,'1','2',3,'Blaaadasd asdasd','2016-07-15 09:26:29'),
(37,'3','2',3,'Bladasda asasd dasd dasd','2016-07-15 09:26:29'),
(38,'2','3',3,'A asdad daasd ad dasd asda asdasd','2016-07-15 09:26:29'),
(39,'1','1',3,'D sfasd dasd','2016-07-15 09:26:29'),
(40,'3','2',3,'Jasd23723asd ad sfsdf sdf mnmd','2016-07-15 09:26:29'),
(41,'1','3',3,'Bas dasasdaasdads4 ds sdfasd','2016-07-15 09:26:29'),
(42,'2','1',3,'aS sd dsasdasdaskh dasd','2016-07-15 09:26:29'),
(43,'1','2',1,'Email test: Error','2016-07-15 09:26:29');

/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-07-25 14:40:49



DROP TABLE IF EXISTS `loggingServerTest`.`logs_types` ;


CREATE TABLE `loggingServerTest`.`logs_types`
(
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `loggingServerTest`.`logs_types` (`id`, `name`)
VALUES
('1', 'Application'),
('2', 'Security'),
('3', 'System');

DROP TABLE IF EXISTS `loggingServerTest`.`logs_levels` ;


CREATE TABLE `loggingServerTest`.`logs_levels`
(
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(15) NOT NULL ,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `loggingServerTest`.`logs_levels` (`id`, `name`)
VALUES
('1', 'Error'),
('2', 'Warn'),
('3', 'Notice');


DROP TABLE IF EXISTS `app_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(60) NOT NULL,
  `is_active` tinyint(4) NOT NULL,
  `role`  varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;



LOCK TABLES `app_users` WRITE;
/*!40000 ALTER TABLE `app_users` DISABLE KEYS */;
# Clear password for both users is 123
INSERT INTO `app_users` (`id`, `username`, `password`, `email`, `is_active`, `role`)
VALUES
('1', 'tuulia', '$2y$12$sBuSBzqLEEAALYB/JcE1I.gZWx1cPUOmDCaSwl5Kd/JDF3NhGUOWG', 'tuulia@imotions.nl', '1', 'ROLE_USER'),
('2', 'admin', '$2y$12$sBuSBzqLEEAALYB/JcE1I.gZWx1cPUOmDCaSwl5Kd/JDF3NhGUOWG', 'admin_@imotions.nl', '1', 'ROLE_ADMIN');





LOCK TABLES `loggingServerTest`.`mail_alert` WRITE;
DROP TABLE IF EXISTS `loggingServerTest`.`mail_alert` ;


CREATE TABLE `loggingServerTest`.`mail_alert`
(
  `mail_alert_id` INT NOT NULL AUTO_INCREMENT ,
  `active` TINYINT NOT NULL ,
  `app_user_id` INT  NOT NULL,
  PRIMARY KEY (`mail_alert_id`)
) ENGINE = InnoDB;

# Here we insert 4 alerts, 2 for  user 1 (tuulia) and 1 for user 2 admin
INSERT INTO `loggingServerTest`.`mail_alert` (`mail_alert_id`, `active`, `app_user_id`)
VALUES
(1, '1', '1'),
(2, '1', '1'),
(3, '1', '2');


#LOCK TABLES `loggingServerTest`.`mail_alert_filter` WRITE;
DROP TABLE IF EXISTS  `mail_alert_filter` ;

CREATE TABLE `mail_alert_filter`
(
  `mail_alert_filter_id` INT NOT NULL AUTO_INCREMENT ,
  `mail_alert_id` INT ,
  `filter_field`  VARCHAR (100) NOT NULL ,
  `operator` VARCHAR (10),
  `value`  VARCHAR (100)NOT NULL ,
  PRIMARY KEY (`mail_alert_filter_id`)
) ENGINE = InnoDB;

INSERT INTO `mail_alert_filter` (`mail_alert_filter_id`,  `mail_alert_id`, `filter_field`, `operator`, `value`)
VALUES
# `mail_alert_id` =1 , System name ='Test2' , log_type = 2 (Security) , log_level = 1 (Error)
(NULL, '1', 'system' , '=' , 1 ),
(NULL, '1',  'type' , '=' , '2'),
(NULL, '1',  'level' , '=' , '1'),
# `mail_alert_id` =2 , System name ='Test 3' , log_type = 1 (Application) log_level = 3 (Notice)
(NULL, '2', 'system' , '=' , 2 ),
(NULL, '2',  'type' , '=' , '1'),
(NULL, '2',  'level' , '=' , '1'),
# `mail_alert_id` = 3 , System name ='Test2' , log_type = 2 (Security) , log_level = 0 (Not defined)
(NULL, '3', 'system' , '=' , 1 ),
(NULL, '3',  'type' , '=' , '2'),
(NULL, '3',  'level' , '=' , '0');




DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `roles_id`  VARCHAR (20) NOT NULL ,
  `name` VARCHAR (20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


# Add some test items

TRUNCATE `roles`;
INSERT INTO `roles` (`roles_id`, `name`)
 VALUES
('ROLE_ADMIN', 'Admin'),
('ROLE_USER', 'User') ;
