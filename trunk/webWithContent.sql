-- MySQL dump 10.13  Distrib 5.5.9, for Win32 (x86)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	5.5.11

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
-- Current Database: `web`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `web122G7` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `web122G7`;

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `CarTypeId` int(11) NOT NULL,
  `Availability` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `CarTypeId` (`CarTypeId`),
  CONSTRAINT `CarTypeId` FOREIGN KEY (`CarTypeId`) REFERENCES `cartype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES (1,1,1);
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cartype`
--

DROP TABLE IF EXISTS `cartype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartype` (
  `id` int(11) NOT NULL,
  `Brand` varchar(45) NOT NULL,
  `Model` varchar(45) NOT NULL,
  `Year` year(4) NOT NULL,
  `Description` text,
  `Attributes` text,
  PRIMARY KEY (`id`,`Brand`,`Model`,`Year`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartype`
--

LOCK TABLES `cartype` WRITE;
/*!40000 ALTER TABLE `cartype` DISABLE KEYS */;
INSERT INTO `cartype` VALUES (1,'Mazda','3',2012,'Mazda 3 breaks new boundaries in the design of compact cars, with a sporty design and advanced technologies.\n			A reliable car, equipped and provides an impressive driving experience in relation to its competitors.','Air Conditioning\n, Seats - 5, \nGear - Automatic\nLuggage Room - 1, Luggage'),(2,'Mazda','5',2012,'Mazda 5 is among the most successful cars 7 seats in the country, thanks to sophisticated design and attractiveness\n Intreducing modern family car, spacious and with excellent performance and proven reliability. ','Air Conditioning, Seats - 7, Gear - Automatic, Luggage Room - 4 Luggage'),(3,'Mazda','6',2012,'Mazda 6 car for the family  able to capture the Israeli audience by designing sporty and successful conduct\n road is excellent, quality materials and assembly among the highest compared to price and market.','Air Conditioning, Seats - 5, Gear - Manual \\ Automatic, Luggage Room - 2 Luggage'),(4,'Chevrolet','Spark',2012,'Spark simplicity and advantage: small dimensions, small efficient engines, manual gearbox.\n Compared to others\' Spark presents 1.2 engine, safety accessories, and provides comfort.','Air Conditioning, Seats - 5, Gear - Manual, Luggage Room - 1 Luggage'),(5,'Peugeot','107',2012,'Peugeot 107 is a mini car most desired for it\'s cost savings. The model has a young design, dynamic, and\n improvements accessories and fuel consumption.','Air Conditioning, Seats - 5, Gear - Manual, Luggage Room - 1 Luggage'),(6,'Kia','Carnival',2012,'Kia Carnival offers a spacious cabin (also for 7 people) and equipped with a rich manner. Good ride comfort.\n A full-size minivan, improved and spacious with elegant looks.','Air Conditioning, Seats - 6, Gear - Automatic, Luggage Room - 3 Luggage'),(7,'Citroen','Berlingo',2012,'Citroen\'s van with high level of design and safety overmost van vhiacles. the new Berlingo provides \n			Diesel engine, manual transmission and Reliability.','Air Conditioning, Seats - 8, Gear - Automatic, Luggage Room - 3 Luggage');
/*!40000 ALTER TABLE `cartype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(45) NOT NULL,
  `Phone` decimal(10,0) DEFAULT NULL,
  `EMail` varchar(45) NOT NULL,
  `Details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'Avi',0,'e','vbla..'),(2,'a',0,'e',' e');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(9) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `CreditCardNum` decimal(16,0) NOT NULL,
  `SubscriptionTypeId` int(11) DEFAULT NULL,
  `RegistrationDate` date NOT NULL,
  `LicenseId` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `LicenseId_UNIQUE` (`LicenseId`),
  UNIQUE KEY `Username_UNIQUE` (`Username`),
  KEY `SubscriptionTypeId-FK` (`SubscriptionTypeId`),
  CONSTRAINT `SubscriptionTypeId-FK` FOREIGN KEY (`SubscriptionTypeId`) REFERENCES `subscriptiontype` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'asaf','m','asafm','12345','asafm@mail.com',1234567812345678,NULL,'2012-06-12',12345678);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Avi','Digmi','avidigmi','12345');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lease`
--

DROP TABLE IF EXISTS `lease`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lease` (
  `CarId` int(11) NOT NULL,
  `CustomerId` int(11) NOT NULL,
  `EmployeeId` int(11) NOT NULL,
  `PickUpDate` date NOT NULL,
  `PickUpTime` time NOT NULL,
  `ReturnDate` date NOT NULL,
  `ReturnTime` time NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Price` int(11) NOT NULL,
  `Approval` varchar(45) NOT NULL,
  PRIMARY KEY (`CarId`,`CustomerId`,`PickUpDate`,`PickUpTime`,`EmployeeId`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  KEY `CarIdFK` (`CarId`),
  KEY `CustomerIdFK` (`CustomerId`),
  KEY `EmployeeIdFK` (`EmployeeId`),
  CONSTRAINT `CarIdFK` FOREIGN KEY (`CarId`) REFERENCES `car` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `CustomerIdFK` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `EmployeeIdFK` FOREIGN KEY (`EmployeeId`) REFERENCES `employee` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lease`
--

LOCK TABLES `lease` WRITE;
/*!40000 ALTER TABLE `lease` DISABLE KEYS */;
INSERT INTO `lease` VALUES (1,1,1,'2012-01-01','08:00:00','2014-02-03','12:00:00',6,200,'Approved'),(1,1,1,'2012-02-06','14:00:00','2013-05-05','12:00:00',4,200,'Approved'),(1,1,1,'2012-04-02','16:00:00','2014-02-04','14:00:00',1,200,''),(1,1,1,'2014-04-04','14:00:00','2013-02-03','14:00:00',3,200,'Approved'),(1,1,1,'2014-05-04','16:00:00','2014-01-03','18:00:00',2,200,'Approved');
/*!40000 ALTER TABLE `lease` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptiontype`
--

DROP TABLE IF EXISTS `subscriptiontype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptiontype` (
  `Id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `PerDay` int(11) NOT NULL,
  `PerHour` int(11) NOT NULL,
  `Payment` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptiontype`
--

LOCK TABLES `subscriptiontype` WRITE;
/*!40000 ALTER TABLE `subscriptiontype` DISABLE KEYS */;
INSERT INTO `subscriptiontype` VALUES (1,'None',199,59,0),(2,'Basic',159,49,125),(3,'Custom',125,42,159);
/*!40000 ALTER TABLE `subscriptiontype` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-06-14 21:02:28
