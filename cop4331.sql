-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2018 at 03:06 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `userID` int(11) NOT NULL,
  `sessionID` varchar(256) NOT NULL,
  `lastActivity` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sessionID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`userID`, `sessionID`, `lastActivity`) VALUES
(15, '2009a761-3233-11e8-ba12-408d5cde0989', '2018-03-27 22:52:43'),
(14, 'fb004538-3232-11e8-ba12-408d5cde0989', '2018-03-27 22:52:21'),
(12, '27884fcd-3232-11e8-ba12-408d5cde0989', '2018-03-27 22:45:42'),
(13, 'de8ebbb6-3232-11e8-ba12-408d5cde0989', '2018-03-27 22:50:58'),
(9, 'afac457c-3230-11e8-ba12-408d5cde0989', '2018-03-27 22:41:58'),
(15, '3aed0296-3233-11e8-ba12-408d5cde0989', '2018-03-27 22:53:31'),
(16, 'e1367486-3233-11e8-ba12-408d5cde0989', '2018-03-27 22:58:09');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
