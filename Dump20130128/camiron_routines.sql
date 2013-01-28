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
-- Temporary table structure for view `les_taches`
--

DROP TABLE IF EXISTS `les_taches`;
/*!50001 DROP VIEW IF EXISTS `les_taches`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `les_taches` (
  `id` int(11),
  `cond_cat_title` text,
  `cond_cat_title_c` text,
  `required_action` text,
  `required_action_c` text,
  `deadline` date,
  `deadline_c` text,
  `party_accountable` text,
  `party_accountable_c` text,
  `person_in_charge` text,
  `person_in_charge_c` text,
  `due_date` date,
  `due_date_c` text,
  `authority_accountable` text,
  `authority_accountable_c` text,
  `status` text,
  `status_c` text,
  `input_camiron` text,
  `input_camiron_c` text,
  `input_state` text,
  `input_state_c` text,
  `output` text,
  `output_c` text,
  `risk_sanction` text,
  `risk_sanction_c` text,
  `is_assigned_to` varchar(50),
  `comment` text,
  `type` varchar(20),
  `id_document` int(11),
  `sector` varchar(200)
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `les_taches`
--

/*!50001 DROP TABLE IF EXISTS `les_taches`*/;
/*!50001 DROP VIEW IF EXISTS `les_taches`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `les_taches` AS select `tasks`.`id` AS `id`,`tasks`.`cond_cat_title` AS `cond_cat_title`,`tasks`.`cond_cat_title_c` AS `cond_cat_title_c`,`tasks`.`required_action` AS `required_action`,`tasks`.`required_action_c` AS `required_action_c`,`tasks`.`deadline` AS `deadline`,`tasks`.`deadline_c` AS `deadline_c`,`tasks`.`party_accountable` AS `party_accountable`,`tasks`.`party_accountable_c` AS `party_accountable_c`,`tasks`.`person_in_charge` AS `person_in_charge`,`tasks`.`person_in_charge_c` AS `person_in_charge_c`,`tasks`.`due_date` AS `due_date`,`tasks`.`due_date_c` AS `due_date_c`,`tasks`.`authority_accountable` AS `authority_accountable`,`tasks`.`authority_accountable_c` AS `authority_accountable_c`,`tasks`.`status` AS `status`,`tasks`.`status_c` AS `status_c`,`tasks`.`input_camiron` AS `input_camiron`,`tasks`.`input_camiron_c` AS `input_camiron_c`,`tasks`.`input_state` AS `input_state`,`tasks`.`input_state_c` AS `input_state_c`,`tasks`.`output` AS `output`,`tasks`.`output_c` AS `output_c`,`tasks`.`risk_sanction` AS `risk_sanction`,`tasks`.`risk_sanction_c` AS `risk_sanction_c`,`tasks`.`is_assigned_to` AS `is_assigned_to`,`tasks`.`comment` AS `comment`,`tasks`.`type` AS `type`,`tasks`.`id_document` AS `id_document`,`tasks`.`sector` AS `sector` from `tasks` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-28 10:22:12
