CREATE DATABASE  IF NOT EXISTS `camiron` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `camiron`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: camiron
-- ------------------------------------------------------
-- Server version	5.5.29

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
-- Table structure for table `rc_users`
--

DROP TABLE IF EXISTS `rc_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rc_users` (
  `login` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `gp` int(11) NOT NULL,
  `last_login` date DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `manager` varchar(50) NOT NULL,
  `team` int(11) NOT NULL,
  `noms` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rc_users`
--

LOCK TABLES `rc_users` WRITE;
/*!40000 ALTER TABLE `rc_users` DISABLE KEYS */;
INSERT INTO `rc_users` VALUES ('sassoo','camiron',2,NULL,1,'',2,'Serge Asso\'o'),('rkouakam','camiron',1,NULL,1,'',2,'Raoul Kouakam'),('bpennetier','camiron',2,NULL,1,'',1,'Bruno Pennetier'),('hatchom','camiron',2,NULL,1,'',1,'Herve Atchom Ngagni'),('admin','admin',3,NULL,1,'',0,NULL);
/*!40000 ALTER TABLE `rc_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-28 10:22:07
