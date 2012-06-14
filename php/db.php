
<?php

$conn = mysql_connect('localhost', 'root', "");
if ($conn):
	$result = mysql_select_db('db_exm123');
else:
	die ("Could not connect to db " . mysql_error());
endif;

if(!$result)
{
	echo "<br> We gnerate a new schema (database) named: <b>db_exm123</b> in your MySql.<br>";
	$result = mysql_query("CREATE DATABASE db_exm123")
	or die ("Failed to create database: " . mysql_error());
}

$query = "CREATE DATABASE IF NOT EXISTS `web122G7`";

$query = "USE `web122G7`";

$query = "DROP TABLE IF EXISTS `car`";

$query = "CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `CarTypeId` int(11) NOT NULL,
  `Availability` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `CarTypeId` (`CarTypeId`),
  CONSTRAINT `CarTypeId` FOREIGN KEY (`CarTypeId`) REFERENCES `cartype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$query = "LOCK TABLES `car` WRITE";

$query = "INSERT INTO `car` VALUES (1,1,1)";

$query = "UNLOCK TABLES";

$query = "DROP TABLE IF EXISTS `cartype`";

$query = "CREATE TABLE `cartype` (
  `id` int(11) NOT NULL,
  `Brand` varchar(45) NOT NULL,
  `Model` varchar(45) NOT NULL,
  `Year` year(4) NOT NULL,
  `Description` text,
  `Attributes` text,
  PRIMARY KEY (`id`,`Brand`,`Model`,`Year`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$query = "LOCK TABLES `cartype` WRITE";

$query = "INSERT INTO `cartype` VALUES (1,'Mazda','3',2012,'Mazda 3 breaks new boundaries in the design of compact cars, with a sporty design and advanced technologies.\n			A reliable car, equipped and provides an impressive driving experience in relation to its competitors.','Air Conditioning\n, Seats - 5, \nGear - Automatic\nLuggage Room - 1, Luggage'),(2,'Mazda','5',2012,'Mazda 5 is among the most successful cars 7 seats in the country, thanks to sophisticated design and attractiveness\n Intreducing modern family car, spacious and with excellent performance and proven reliability. ','Air Conditioning, Seats - 7, Gear - Automatic, Luggage Room - 4 Luggage'),(3,'Mazda','6',2012,'Mazda 6 car for the family  able to capture the Israeli audience by designing sporty and successful conduct\n road is excellent, quality materials and assembly among the highest compared to price and market.','Air Conditioning, Seats - 5, Gear - Manual \\ Automatic, Luggage Room - 2 Luggage'),(4,'Chevrolet','Spark',2012,'Spark simplicity and advantage: small dimensions, small efficient engines, manual gearbox.\n Compared to others\' Spark presents 1.2 engine, safety accessories, and provides comfort.','Air Conditioning, Seats - 5, Gear - Manual, Luggage Room - 1 Luggage'),(5,'Peugeot','107',2012,'Peugeot 107 is a mini car most desired for it\'s cost savings. The model has a young design, dynamic, and\n improvements accessories and fuel consumption.','Air Conditioning, Seats - 5, Gear - Manual, Luggage Room - 1 Luggage'),(6,'Kia','Carnival',2012,'Kia Carnival offers a spacious cabin (also for 7 people) and equipped with a rich manner. Good ride comfort.\n A full-size minivan, improved and spacious with elegant looks.','Air Conditioning, Seats - 6, Gear - Automatic, Luggage Room - 3 Luggage'),(7,'Citroen','Berlingo',2012,'Citroen\'s van with high level of design and safety overmost van vhiacles. the new Berlingo provides \n			Diesel engine, manual transmission and Reliability.','Air Conditioning, Seats - 8, Gear - Automatic, Luggage Room - 3 Luggage')";

$query = "UNLOCK TABLES";

$query = "DROP TABLE IF EXISTS `contact`";

$query = "CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FullName` varchar(45) NOT NULL,
  `Phone` decimal(10,0) DEFAULT NULL,
  `EMail` varchar(45) NOT NULL,
  `Details` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

$query = "LOCK TABLES `contact` WRITE";

$query = "INSERT INTO `contact` VALUES (1,'Avi',0,'e','vbla..'),(2,'a',0,'e',' e')";

$query = "UNLOCK TABLES";

$query = "DROP TABLE IF EXISTS `customer`";

$query = "CREATE TABLE `customer` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$query = "LOCK TABLES `customer` WRITE";

$query = "INSERT INTO `customer` VALUES (1,'asaf','m','asafm','12345','asafm@mail.com',1234567812345678,NULL,'2012-06-12',12345678)";

$query = "UNLOCK TABLES";

$query = "DROP TABLE IF EXISTS `employee`";

$query = "CREATE TABLE `employee` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`),
  UNIQUE KEY `Username_UNIQUE` (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$query = "LOCK TABLES `employee` WRITE;"

$query = "INSERT INTO `employee` VALUES (1,'Avi','Digmi','avidigmi','12345')";

$query = "UNLOCK TABLES";

$query = "DROP TABLE IF EXISTS `lease`";

$query = "CREATE TABLE `lease` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1";

$query = "LOCK TABLES `lease` WRITE";

$query = "INSERT INTO `lease` VALUES (1,1,1,'2012-01-01','08:00:00','2014-02-03','12:00:00',6,200,'Approved'),(1,1,1,'2012-02-06','14:00:00','2013-05-05','12:00:00',4,200,'Approved'),(1,1,1,'2012-04-02','16:00:00','2014-02-04','14:00:00',1,200,''),(1,1,1,'2014-04-04','14:00:00','2013-02-03','14:00:00',3,200,'Approved'),(1,1,1,'2014-05-04','16:00:00','2014-01-03','18:00:00',2,200,'Approved')";

$query = "UNLOCK TABLES";

$query = "DROP TABLE IF EXISTS `subscriptiontype`";

$query = "CREATE TABLE `subscriptiontype` (
  `Id` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `PerDay` int(11) NOT NULL,
  `PerHour` int(11) NOT NULL,
  `Payment` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Id_UNIQUE` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";

$query = "LOCK TABLES `subscriptiontype` WRITE";

$query = "INSERT INTO `subscriptiontype` VALUES (1,'None',199,59,0),(2,'Basic',159,49,125),(3,'Custom',125,42,159)";

$query = "UNLOCK TABLES";

?>