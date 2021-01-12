DROP DATABASE IF EXISTS SQL_GB;
CREATE DATABASE  IF NOT EXISTS `SQL_GB` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `SQL_GB`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 192.168.56.102    Database: SQL_GB
-- ------------------------------------------------------
-- Server version	8.0.13_countries_countries

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Countries`
--

DROP TABLE IF EXISTS `Countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Countries` (
  `ID` smallint(4) NOT NULL AUTO_INCREMENT,
  `Name` varchar(455) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name_UNIQUE` (`Name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Countries`
--

LOCK TABLES `Countries` WRITE;
/*!40000 ALTER TABLE `Countries` DISABLE KEYS */;
INSERT INTO `Countries` VALUES (2,'Беларусь'),(1,'Россия');
/*!40000 ALTER TABLE `Countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Provinces`
--

DROP TABLE IF EXISTS `Provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Provinces` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(455) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CountryID` smallint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Provinces`
--

LOCK TABLES `Provinces` WRITE;
/*!40000 ALTER TABLE `Provinces` DISABLE KEYS */;
INSERT INTO `Provinces` VALUES (1,'Адыгея',1),(2,'Алтай',1),(3,'Башкортостан',1),(4,'Бурятия',1),(5,'Дагестан',1),(6,'Ингушетия',1),(7,'Кабардино-Балкария',1),(8,'Калмыкия',1),(9,'Карачаево-Черкесия',1),(10,'Карелия',1),(11,'Коми',1),(12,'Крым',1),(13,'Марий Эл',1),(14,'Мордовия',1),(15,'Якутия',1),(16,'Северная Осетия',1),(17,'Татарстан',1),(18,'Тыва',1),(19,'Удмуртия',1),(20,'Хакасия',1),(21,'Чечня',1),(22,'Чувашия',1),(23,'Алтайский край',1),(24,'Забайкальский край',1),(25,'Камчатский край',1),(26,'Краснодарский край',1),(27,'Красноярский край',1),(28,'Пермский край',1),(29,'Приморский край',1),(30,'Ставропольский край',1),(31,'Хабаровский край',1),(32,'Амурская область',1),(33,'Архангельская область',1),(34,'Астраханская область',1),(35,'Белгородская область',1),(36,'Брянская область',1),(37,'Владимирская область',1),(38,'Волгоградская область',1),(39,'Вологодская область',1),(40,'Воронежская область',1),(41,'Ивановская область',1),(42,'Иркутская область',1),(43,'Калининградская область',1),(44,'Калужская область',1),(45,'Кемеровская область',1),(46,'Кировская область',1),(47,'Костромская область',1),(48,'Курганская область',1),(49,'Курская область',1),(50,'Ленинградская область',1),(51,'Липецкая область',1),(52,'Магаданская область',1),(53,'Московская область',1),(54,'Мурманская область',1),(55,'Нижегородская область',1),(56,'Новгородская область',1),(57,'Новосибирская область',1),(58,'Омская область',1),(59,'Оренбургская область',1),(60,'Орловская область',1),(61,'Пензенская область',1),(62,'Псковская область',1),(63,'Ростовская область',1),(64,'Рязанская область',1),(65,'Самарская область',1),(66,'Саратовская область',1),(67,'Сахалинская область',1),(68,'Свердловская область',1),(69,'Смоленская область',1),(70,'Тамбовская область',1),(71,'Тверская область',1),(72,'Томская область',1),(73,'Тульская область',1),(74,'Тюменская область',1),(75,'Ульяновская область',1),(76,'Челябинская область',1),(77,'Ярославская область',1),(79,'Москва',1),(80,'Санкт-Петербург',1),(81,'Севастополь',1),(83,'Еврейская АО',1),(85,'Ненецкий АО',1),(86,'Ханты-Мансийский АО',1),(87,'Чукотский АО',1),(88,'Ямало-Ненецкий АО',1),(89,'Брестская область',2),(90,'Витебская область',2),(91,'Гомельская область',2),(92,'Гродненская область',2),(93,'Минская область',2),(94,'Могилёвская область',2),(95,'Минск',2);
/*!40000 ALTER TABLE `Provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Regions`
--

DROP TABLE IF EXISTS `Regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Regions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProvinceID` int(11) DEFAULT NULL,
  `Name` varchar(455) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Regions`
--

LOCK TABLES `Regions` WRITE;
/*!40000 ALTER TABLE `Regions` DISABLE KEYS */;
/*!40000 ALTER TABLE `Regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Towns`
--

DROP TABLE IF EXISTS `Towns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `Towns` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(455) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ProvinceID` int(11) NOT NULL,
  `RegionID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Towns`
--

LOCK TABLES `Towns` WRITE;
/*!40000 ALTER TABLE `Towns` DISABLE KEYS */;
/*!40000 ALTER TABLE `Towns` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-03 17:55:32
