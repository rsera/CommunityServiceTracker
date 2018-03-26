-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2018 at 02:49 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cop4331`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contactID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `CellPh` varchar(15) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `User_UserID` int(11) NOT NULL,
  PRIMARY KEY (`contactID`,`User_UserID`),
  KEY `fk_Contact_User_idx` (`User_UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactID`, `FName`, `LName`, `CellPh`, `Email`, `User_UserID`) VALUES
(2, 'a', 'a', 'a', 'a', 1),
(3, 'b', 'b', 'b', 'b', 1),
(4, 'c', 'c', 'c', 'c', 1),
(5, 'd', 'd', 'd', 'd', 1),
(6, 'u', 'u', 'u', 'u', 4),
(7, 'Mary', 'Shelley', '3849384', 'ms@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

DROP TABLE IF EXISTS `experiences`;
CREATE TABLE IF NOT EXISTS `experiences` (
  `experienceID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `expDate` date NOT NULL,
  `hours` float NOT NULL,
  `notes` varchar(256) NOT NULL,
  PRIMARY KEY (`experienceID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`experienceID`, `userID`, `name`, `expDate`, `hours`, `notes`) VALUES
(1, 5, 'Toes', '2018-03-04', 8, ''),
(2, 5, 'Poots', '2018-02-05', 12, ''),
(3, 5, 'Toesies', '2018-01-16', 42, ''),
(4, 5, 'Pootatoes', '2018-03-18', 11, ''),
(5, 5, 'Toesieohs', '2018-03-18', 3, ''),
(6, 5, 'TOE', '2018-05-14', 6, ''),
(7, 5, 'TOES', '2018-03-04', 3, ''),
(8, 5, 'POOOOOOT', '2018-07-10', 8, ''),
(9, 5, 'toe', '2018-03-21', 6, ''),
(10, 5, 'one', '2018-06-06', 1, ''),
(11, 5, 'two', '2018-05-08', 2, ''),
(12, 5, 'three', '2018-04-13', 2, ''),
(13, 5, 'Junior Knights', '2018-03-02', 5, ''),
(14, 5, 'ACM', '2018-03-05', 6, ''),
(15, 5, 'American Heart Association', '2018-09-25', 1, ''),
(16, 5, 'American Diabetes Association', '2018-10-22', 3, ''),
(17, 5, 'Junior Knights', '2018-11-15', 5, ''),
(18, 5, 'ACM-W', '2018-10-03', 6, ''),
(19, 5, 'Pet Rescue By Judy', '2018-10-08', 3, ''),
(20, 5, 'Career Day', '2018-07-09', 6, ''),
(21, 5, 'Career Day', '2018-07-23', 3, ''),
(22, 5, 'Pulling Toes', '2017-08-08', 1, ''),
(23, 5, 'Pulling all the Toes', '2017-09-04', 2, ''),
(24, 5, 'toes', '2017-09-04', 7, ''),
(25, 5, 'you', '2017-05-15', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
CREATE TABLE IF NOT EXISTS `organizations` (
  `orgID` int(11) NOT NULL AUTO_INCREMENT,
  `orgName` varchar(256) NOT NULL,
  `orgZip` int(5) NOT NULL,
  `orgWebsite` varchar(256) NOT NULL,
  `orgPhone` int(11) DEFAULT NULL,
  `orgType` varchar(128) NOT NULL,
  PRIMARY KEY (`orgID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`orgID`, `orgName`, `orgZip`, `orgWebsite`, `orgPhone`, `orgType`) VALUES
(1, 'Junior Knights', 32816, 'eecs.ucf.edu/JuniorKnights', NULL, 'Educational'),
(2, 'ACM-W', 32816, 'ucf-w.acm.org', NULL, 'Social Issues'),
(3, 'American Diabetes Association', 32751, 'diabetes.org', NULL, 'Health');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `userPWHash` varchar(255) DEFAULT NULL,
  `userZip` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID_UNIQUE` (`UserID`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FName`, `LName`, `username`, `userPWHash`, `userZip`, `goal`) VALUES
(1, 'David', 'Bohm', 'db', '0cc175b9c0f1b6a831c399e269772661', NULL, NULL),
(2, 'ab', 'cd', 'ab', '0cc175b9c0f1b6a831c399e269772661', NULL, NULL),
(3, 'b', 'b', 'b', '92eb5ffee6ae2fec3ad71c777531578f', NULL, NULL),
(4, 'z', 'z', 'z', 'fbade9e36a3f36d3d676c1b808451dd7', NULL, NULL),
(5, 'Philip', 'Dick', 'pkd', '0cc175b9c0f1b6a831c399e269772661', 32816, 250),
(6, 'Eleanor', 'Rigby', 'er', '0cc175b9c0f1b6a831c399e269772661', NULL, NULL),
(7, 'Bruce', 'Willis', 'bw', '0cc175b9c0f1b6a831c399e269772661', NULL, NULL),
(8, 'Prince', 'Eric', 'pe', '0cc175b9c0f1b6a831c399e269772661', NULL, 500),
(9, 'Mister', 'Pootman', 'mrp', '$2y$10$1xbQCSHxitUwX3/3Pz77sO1lnqoR9ayFixtg.aTmYJiH2TU9y.p1C', NULL, 500);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_Contact_User` FOREIGN KEY (`User_UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
