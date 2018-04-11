-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2018 at 04:49 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`experienceID`, `userID`, `name`, `expDate`, `hours`, `notes`) VALUES
(45, 17, 'Habitat for Humanity', '2018-04-04', 5, 'I helped build houses.'),
(46, 17, 'YMCA', '2018-04-05', 5.75, 'Today I helped tutor in the after school program.'),
(47, 17, 'Habitat for Humanity', '2018-04-06', 2.15, 'helped build houses'),
(48, 17, 'YMCA', '2018-04-11', 3.1, 'helped tutor'),
(49, 17, 'YMCA', '2018-04-12', 1, 'helped tutor');

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
  `conName` varchar(255) NOT NULL,
  `conEmail` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  PRIMARY KEY (`orgID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`orgID`, `orgName`, `orgZip`, `orgWebsite`, `conName`, `conEmail`, `approved`) VALUES
(1, 'Junior Knights', 32816, 'eecs.ucf.edu/JuniorKnights', '', '', 0),
(2, 'ACM-W', 32816, 'ucf-w.acm.org', '', '', 0),
(3, 'American Diabetes Association', 32751, 'diabetes.org', '', '', 0);

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
(16, 'e1367486-3233-11e8-ba12-408d5cde0989', '2018-03-27 22:58:09'),
(17, 'acc6e781-338d-11e8-a6d7-308d991afc4e', '2018-03-29 16:13:32'),
(17, 'e3d8437b-3857-11e8-a6d7-308d991afc4e', '2018-04-04 18:29:31'),
(17, '7edf2095-3859-11e8-a6d7-308d991afc4e', '2018-04-04 18:41:00'),
(17, '9c866d65-3859-11e8-a6d7-308d991afc4e', '2018-04-04 18:41:50'),
(17, 'c163e80e-39c2-11e8-9a7f-308d991afc4e', '2018-04-06 13:48:46'),
(17, '9bdf912b-39c3-11e8-9a7f-308d991afc4e', '2018-04-06 14:16:14'),
(17, '8b087a2d-39e1-11e8-9a7f-308d991afc4e', '2018-04-06 17:29:09'),
(17, '67cccab5-39ec-11e8-9a7f-308d991afc4e', '2018-04-06 18:46:55'),
(17, 'dea06291-39ed-11e8-9a7f-308d991afc4e', '2018-04-06 18:57:23'),
(17, '00585666-39ee-11e8-9a7f-308d991afc4e', '2018-04-06 18:58:20'),
(17, 'abcae5da-3b47-11e8-9a7f-308d991afc4e', '2018-04-08 12:12:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FName`, `LName`, `username`, `userPWHash`, `userZip`, `goal`) VALUES
(17, 'abc', 'de', 'abc', '$2y$10$ZaPht0KPVqBh3CU00IdPdOprSgc7woveM5dInBEdA63MFf5VhMmm2', 32818, 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
