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
('2', 'admin', '$2y$12$sBuSBzqLEEAALYB/JcE1I.gZWx1cPUOmDCaSwl5Kd/JDF3NhGUOWG', 'admin_@imotions.nl', '1', 'ROLE_ADMIN')
##########################################################################################
#
# http://symfony.com/doc/current/book/security.html#where-do-users-come-from-user-providers
# Password Encrypted by
# > php bin/console security:encode-password
#
# Symfony Password Encoder Utility
# ================================
#
#  Type in your password to be encoded:
#  >(123)
#
#  ------------------ ---------------------------------------------------------------
#   Key                Value
#  ------------------ ---------------------------------------------------------------
#   Encoder used       Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder
#   Encoded password   $2y$12$sBuSBzqLEEAALYB/JcE1I.gZWx1cPUOmDCaSwl5Kd/JDF3NhGUOWG
#  ------------------ ---------------------------------------------------------------
#
#  ! [NOTE] Bcrypt encoder used: the encoder generated its own built-in salt.
#
#
#  [OK] Password encoding succeeded
#
##########################################################################################