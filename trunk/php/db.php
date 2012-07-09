
<?php

$con = mysql_connect('localhost', 'digmia', "RYkUhstj");

if ($con)
	$result = mysql_select_db('web122G7');

if ($result){

	$query = "SHOW TABLES FROM web122G7";
	$tables = mysql_query($query);
	
	if (!$tables)
		$result = false;

	while ($row = mysql_fetch_row($tables))
		if ("employee" == $row[0])
			$result = false;
}
	
if(!$result) {

	$query = "DROP DATABASE web122G7";
	
	mysql_query($query, $con);

	$query = "CREATE DATABASE IF NOT EXISTS `web122G7`";

	mysql_query($query, $con);
	
	mysql_select_db("web122G7", $con);
	
	$query = "DROP TABLE IF EXISTS `cartype`";

	mysql_query($query);
	
	//cartype
	
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

	mysql_query($query);
	
	$query = "LOCK TABLES `cartype` WRITE";

	mysql_query($query);
	
	$query = "INSERT INTO `cartype` VALUES (1,'Mazda','3',2012,'Mazda 3 breaks new boundaries in the design of compact cars, with a sporty design and advanced technologies.\n			A reliable car, equipped and provides an impressive driving experience in relation to its competitors.','Air Conditioning\n, Seats - 5, \nGear - Automatic\nLuggage Room - 1, Luggage'),(2,'Mazda','5',2012,'Mazda 5 is among the most successful cars 7 seats in the country, thanks to sophisticated design and attractiveness\n Intreducing modern family car, spacious and with excellent performance and proven reliability. ','Air Conditioning, Seats - 7, Gear - Automatic, Luggage Room - 4 Luggage'),(3,'Mazda','6',2012,'Mazda 6 car for the family  able to capture the Israeli audience by designing sporty and successful conduct\n road is excellent, quality materials and assembly among the highest compared to price and market.','Air Conditioning, Seats - 5, Gear - Manual \\ Automatic, Luggage Room - 2 Luggage'),(4,'Chevrolet','Spark',2012,'Spark simplicity and advantage: small dimensions, small efficient engines, manual gearbox.\n Compared to others\' Spark presents 1.2 engine, safety accessories, and provides comfort.','Air Conditioning, Seats - 5, Gear - Manual, Luggage Room - 1 Luggage'),(5,'Peugeot','107',2012,'Peugeot 107 is a mini car most desired for it\'s cost savings. The model has a young design, dynamic, and\n improvements accessories and fuel consumption.','Air Conditioning, Seats - 5, Gear - Manual, Luggage Room - 1 Luggage'),(6,'Kia','Carnival',2012,'Kia Carnival offers a spacious cabin (also for 7 people) and equipped with a rich manner. Good ride comfort.\n A full-size minivan, improved and spacious with elegant looks.','Air Conditioning, Seats - 6, Gear - Automatic, Luggage Room - 3 Luggage'),(7,'Citroen','Berlingo',2012,'Citroen\'s van with high level of design and safety overmost van vhiacles. the new Berlingo provides \n			Diesel engine, manual transmission and Reliability.','Air Conditioning, Seats - 8, Gear - Automatic, Luggage Room - 3 Luggage')";

	mysql_query($query);
	
	$query = "UNLOCK TABLES";

	mysql_query($query);
	
	// car
	
	$query = "DROP TABLE IF EXISTS `car`";

	mysql_query($query);
	
	$query = "CREATE TABLE `car` (
	  `id` int(11) NOT NULL,
	  `CarTypeId` int(11) NOT NULL,
	  `Availability` tinyint(1) NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `id_UNIQUE` (`id`),
	  KEY `CarTypeId` (`CarTypeId`),
	  CONSTRAINT `CarTypeId` FOREIGN KEY (`CarTypeId`) REFERENCES `cartype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	mysql_query($query);
	
	$query = "LOCK TABLES `car` WRITE";

	mysql_query($query);

	$query = "INSERT INTO `car` VALUES (1,1,5),(2,2,3),(3,3,4),(4,4,6),(5,5,5),(6,6,4),(7,7,6)";

	mysql_query($query);
	
	$query = "UNLOCK TABLES";

	mysql_query($query);
	
	//contact
	
	$query = "DROP TABLE IF EXISTS `contact`";

	mysql_query($query);
	
	$query = "CREATE TABLE `contact` (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `FullName` varchar(45) NOT NULL,
	  `Phone` decimal(10,0) DEFAULT NULL,
	  `EMail` varchar(45) NOT NULL,
	  `Details` text NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

	mysql_query($query);
	
	$query = "LOCK TABLES `contact` WRITE";

	mysql_query($query);
	
	$query = "INSERT INTO `contact` VALUES (1,'Avi',0,'e','vbla..'),(2,'a',0,'e',' e')";

	mysql_query($query);
	
	$query = "UNLOCK TABLES";

	mysql_query($query);
	
	// tblemployees
	
	$query = "DROP TABLE IF EXISTS `tblemployees`";

	mysql_query($query);
	
	$query = "CREATE TABLE `tblemployees` (
			`fldEmpId` int(11) NOT NULL AUTO_INCREMENT,
			`fldPassword` varchar(20) NOT NULL,
			`fldUserName` varchar(20) NOT NULL,
			`fldFname` varchar(20) NOT NULL,
			`fldLname` varchar(20) NOT NULL,
			PRIMARY KEY (`fldEmpId`),
			UNIQUE KEY `Id_UNIQUE` (`fldEmpId`),
			UNIQUE KEY `fldUserName_UNIQUE` (`fldUserName`)
			) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1";

	mysql_query($query);

	$query = "LOCK TABLES `tblemployees` WRITE";

	mysql_query($query);
	
	$query = "INSERT INTO `tblemployees` VALUES (1,'12345','avi','Avi','Digmi'),(2,'12345','benny','Benny','Michaeli')";

	mysql_query($query);
	
	$query = "UNLOCK TABLES";

	mysql_query($query);
	
	// subscriptiontype
	
	$query = "DROP TABLE IF EXISTS `subscriptiontype`";

	mysql_query($query);
	
	$query = "CREATE TABLE `subscriptiontype` (
	  `Id` int(11) NOT NULL,
	  `Name` varchar(45) NOT NULL,
	  `PerDay` int(11) NOT NULL,
	  `PerHour` int(11) NOT NULL,
	  `Payment` int(11) NOT NULL,
	  PRIMARY KEY (`Id`),
	  UNIQUE KEY `Id_UNIQUE` (`Id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1";

	mysql_query($query);
	
	$query = "LOCK TABLES `subscriptiontype` WRITE";

	mysql_query($query);
	
	$query = "INSERT INTO `subscriptiontype` VALUES (1,'None',199,59,0),(2,'Basic',159,49,125),(3,'Custom',125,42,159)";

	mysql_query($query);
	
	$query = "UNLOCK TABLES";

	mysql_query($query);
	
	// customer
	
	$query = "DROP TABLE IF EXISTS `customer`";

	mysql_query($query);
	
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

	mysql_query($query);
	
	$query = "LOCK TABLES `customer` WRITE";

	mysql_query($query);
	
	$query = "INSERT INTO `customer` VALUES (1,'asaf','m','asafm','12345','asafm@mail.com',1234567812345678,NULL,'2012-06-12',12345678)";

	mysql_query($query);
	
	$query = "UNLOCK TABLES";

	mysql_query($query);
	
	// lease
	
	$query = "DROP TABLE IF EXISTS `lease`";

	mysql_query($query);
	
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
			CONSTRAINT `EmployeeIdFK` FOREIGN KEY (`EmployeeId`) REFERENCES `tblemployees` (`fldEmpId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
			CONSTRAINT `CarIdFK` FOREIGN KEY (`CarId`) REFERENCES `car` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
			CONSTRAINT `CustomerIdFK` FOREIGN KEY (`CustomerId`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
			) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1";

	mysql_query($query);
	
	$query = "LOCK TABLES `lease` WRITE";

	mysql_query($query);
	
	$query = "INSERT INTO `lease` VALUES (1,1,1,'2012-01-01','08:00:00','2014-02-03','12:00:00',6,200,'Approved'),(1,1,1,'2012-02-06','14:00:00','2013-05-05','12:00:00',4,200,'Approved'),(1,1,1,'2012-04-02','16:00:00','2014-02-04','14:00:00',1,200,''),(1,1,1,'2014-04-04','14:00:00','2013-02-03','14:00:00',3,200,'Approved'),(1,1,1,'2014-05-04','16:00:00','2014-01-03','18:00:00',2,200,'Approved')";

	mysql_query($query);
	
	$query = "UNLOCK TABLES";

	mysql_query($query);
}

mysql_close($con);

?>