-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 15, 2018 at 08:50 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `COP4331`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE IF NOT EXISTS `experiences` (
  `experienceID` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `expDate` date NOT NULL,
  `hours` float NOT NULL,
  `notes` varchar(256) NOT NULL,
  PRIMARY KEY (`experienceID`),
  KEY `userID` (`userID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`experienceID`, `userID`, `name`, `expDate`, `hours`, `notes`) VALUES
(45, 17, 'Habitat for Humanity', '2018-04-04', 5, 'I helped build houses.'),
(46, 17, 'YMCA', '2018-04-05', 5.75, 'Today I helped tutor in the after school program.'),
(47, 17, 'Habitat for Humanity', '2018-04-06', 2.15, 'helped build houses'),
(48, 17, 'YMCA', '2018-04-11', 3.1, 'helped tutor'),
(49, 17, 'YMCA', '2018-04-12', 1, 'helped tutor'),
(50, 18, 'Junior Knights', '2018-04-07', 4, 'Went over lists and strings'),
(51, 18, 'NCWIT Awards Ceremony', '2018-05-12', 4, 'Helped organize event and mentor high school girls'),
(52, 18, 'Walk for Diabetes', '2018-04-02', 3, 'Raised $300'),
(68, 25, 'burger', '0000-00-00', 1, 'flipped burger'),
(62, 25, 'mac', '2018-04-03', 3, ''),
(63, 25, 'cheese', '2018-04-09', -1, ''),
(64, 25, 'bleh', '2018-04-04', -10, 'didn''t feel good today'),
(65, 25, 'asdff', '2018-04-08', 7, ''),
(66, 25, 'asdf', '2018-03-30', 1, ''),
(67, 25, 'asdf', '2018-04-06', 20, ''),
(69, 25, 'burgers', '0000-00-00', 2, 'flipped em'),
(70, 25, 'Junior Knights', '0000-00-00', 2, 'flipped em'),
(71, 25, 'Junior Knights2', '2018-04-06', 2, 'flipped em');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE IF NOT EXISTS `organizations` (
  `orgID` int(11) NOT NULL AUTO_INCREMENT,
  `orgName` varchar(256) NOT NULL,
  `orgZip` int(5) NOT NULL,
  `orgWebsite` varchar(256) NOT NULL,
  `conName` varchar(255) NOT NULL,
  `conEmail` varchar(255) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orgID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
(18, '2bff9c21-3d9b-11e8-9712-e0db55fe2900', '2018-04-11 08:39:25'),
(18, '204c585e-3da2-11e8-a45b-e0db55fe2900', '2018-04-11 11:39:58'),
(18, '9464c96b-3da2-11e8-a45b-e0db55fe2900', '2018-04-11 09:08:31'),
(18, '819f6e0a-3da3-11e8-a45b-e0db55fe2900', '2018-04-11 09:15:09'),
(18, '3440b5e2-3dad-11e8-a45b-e0db55fe2900', '2018-04-11 10:24:35'),
(18, '850aee43-3db6-11e8-a45b-e0db55fe2900', '2018-04-11 11:31:16'),
(18, '3e2d1512-3db9-11e8-a45b-e0db55fe2900', '2018-04-11 12:26:25'),
(19, 'e613732f-3db9-11e8-a45b-e0db55fe2900', '2018-04-11 11:55:27'),
(20, 'f1dbb218-3dbd-11e8-a45b-e0db55fe2900', '2018-04-11 12:24:25'),
(18, 'd230a95f-3dbe-11e8-a45b-e0db55fe2900', '2018-04-11 12:30:58'),
(18, 'fc927911-3dbe-11e8-a45b-e0db55fe2900', '2018-04-11 12:32:28'),
(18, '9f376e5b-3dc1-11e8-a45b-e0db55fe2900', '2018-04-11 13:30:38'),
(21, '5427995b-3dc5-11e8-a45b-e0db55fe2900', '2018-04-11 13:17:16'),
(22, '80ab1bd1-3dc5-11e8-a45b-e0db55fe2900', '2018-04-11 13:18:31'),
(23, '8df71d5a-3dc6-11e8-a45b-e0db55fe2900', '2018-04-11 13:26:02'),
(24, 'bf9f0b9b-3dc6-11e8-a45b-e0db55fe2900', '2018-04-11 13:27:26'),
(25, '38a2c07b-3dc7-11e8-a45b-e0db55fe2900', '2018-04-11 13:30:49'),
(26, '82f305d5-3dc7-11e8-a45b-e0db55fe2900', '2018-04-11 13:32:53'),
(27, 'bca19d79-3dc7-11e8-a45b-e0db55fe2900', '2018-04-11 13:34:30'),
(18, '0915a088-3dc9-11e8-a45b-e0db55fe2900', '2018-04-11 13:43:48'),
(28, '48961802-3dc9-11e8-a45b-e0db55fe2900', '2018-04-11 13:45:35'),
(29, '7ef616eb-3dc9-11e8-a45b-e0db55fe2900', '2018-04-11 13:47:06'),
(30, 'd3618ad1-3dc9-11e8-a45b-e0db55fe2900', '2018-04-11 13:49:27'),
(18, 'd7e28d63-3de7-11e8-a45b-e0db55fe2900', '2018-04-11 17:25:57'),
(25, '7ec4e930-3de8-11e8-a45b-e0db55fe2900', '2018-04-11 17:29:25'),
(25, 'a4e6919e-3de8-11e8-a45b-e0db55fe2900', '2018-04-11 17:33:41'),
(18, '8f0a18f0-3e8d-11e8-88ec-e0db55fe2900', '2018-04-12 13:10:34'),
(18, '79fd0651-3e95-11e8-88ec-e0db55fe2900', '2018-04-12 14:07:15'),
(31, '12abe4bf-3e97-11e8-88ec-e0db55fe2900', '2018-04-12 14:18:40'),
(18, '6d60cf99-3e97-11e8-88ec-e0db55fe2900', '2018-04-12 14:21:13'),
(18, 'ab32e947-3e97-11e8-88ec-e0db55fe2900', '2018-04-12 14:22:56'),
(18, 'ade6e437-3e97-11e8-88ec-e0db55fe2900', '2018-04-12 14:23:01'),
(18, 'cbac93d7-3e97-11e8-88ec-e0db55fe2900', '2018-04-12 14:23:51'),
(18, 'da25c477-3e97-11e8-88ec-e0db55fe2900', '2018-04-12 14:24:15'),
(18, '1bdffbde-3e98-11e8-88ec-e0db55fe2900', '2018-04-12 14:26:05'),
(32, 'b30f8518-3e98-11e8-88ec-e0db55fe2900', '2018-04-12 14:30:19'),
(18, 'f95ee710-3e98-11e8-88ec-e0db55fe2900', '2018-04-12 14:32:17'),
(18, 'b924fffb-3f33-11e8-88ec-e0db55fe2900', '2018-04-13 09:00:01'),
(18, '65a6ca51-3f38-11e8-88ec-e0db55fe2900', '2018-04-13 09:33:29'),
(18, '675d396a-3f38-11e8-88ec-e0db55fe2900', '2018-04-13 09:33:31'),
(18, '5444c156-3f39-11e8-88ec-e0db55fe2900', '2018-04-13 09:40:09'),
(25, 'a3c84931-3f39-11e8-88ec-e0db55fe2900', '2018-04-13 09:42:22'),
(25, '82404245-3f3a-11e8-88ec-e0db55fe2900', '2018-04-13 09:48:36'),
(25, 'b559d476-3f3a-11e8-88ec-e0db55fe2900', '2018-04-13 09:50:01'),
(33, 'bbdca936-3f3a-11e8-88ec-e0db55fe2900', '2018-04-13 09:50:12'),
(25, 'efdbf801-3f3a-11e8-88ec-e0db55fe2900', '2018-04-13 09:51:39'),
(34, 'bbcc46dd-3f3b-11e8-88ec-e0db55fe2900', '2018-04-13 09:57:22'),
(35, '4e47cf17-3f3c-11e8-88ec-e0db55fe2900', '2018-04-13 10:01:27'),
(35, '62a2f515-3f3c-11e8-88ec-e0db55fe2900', '2018-04-13 10:02:02'),
(36, '88857efb-3f3c-11e8-88ec-e0db55fe2900', '2018-04-13 10:03:05'),
(25, '90699751-3f3c-11e8-88ec-e0db55fe2900', '2018-04-13 10:03:18'),
(36, '9358f89d-3f3c-11e8-88ec-e0db55fe2900', '2018-04-13 10:03:23'),
(25, '925dc86a-3f40-11e8-88ec-e0db55fe2900', '2018-04-13 10:32:00'),
(25, '7eca4a0a-3f41-11e8-88ec-e0db55fe2900', '2018-04-13 10:38:36'),
(25, '35499098-3f42-11e8-88ec-e0db55fe2900', '2018-04-13 10:43:42'),
(25, '92a17503-3f42-11e8-88ec-e0db55fe2900', '2018-04-13 10:46:19'),
(25, 'd96ab418-3f42-11e8-88ec-e0db55fe2900', '2018-04-13 10:48:18'),
(25, '14f324da-3f43-11e8-88ec-e0db55fe2900', '2018-04-13 10:50:14'),
(25, '7402181e-3f43-11e8-88ec-e0db55fe2900', '2018-04-13 10:55:30'),
(25, 'f067cbff-3f43-11e8-88ec-e0db55fe2900', '2018-04-13 10:56:21'),
(25, '513a7416-3f44-11e8-88ec-e0db55fe2900', '2018-04-13 10:59:28'),
(25, 'c1b7725c-3f44-11e8-88ec-e0db55fe2900', '2018-04-13 11:05:56'),
(25, '89915122-3f45-11e8-88ec-e0db55fe2900', '2018-04-13 11:07:49'),
(25, 'f0861186-3f45-11e8-88ec-e0db55fe2900', '2018-04-13 11:15:30'),
(25, '12f4966e-3f47-11e8-88ec-e0db55fe2900', '2018-04-13 11:18:32'),
(25, '5c504e16-3f47-11e8-88ec-e0db55fe2900', '2018-04-13 11:20:35'),
(18, '6c44d2cc-3f50-11e8-88ec-e0db55fe2900', '2018-04-13 12:25:28'),
(18, 'f8b8255e-3f50-11e8-88ec-e0db55fe2900', '2018-04-13 12:29:23'),
(18, '7af9acca-3f51-11e8-88ec-e0db55fe2900', '2018-04-13 12:33:02'),
(25, '537f0f51-3f52-11e8-88ec-e0db55fe2900', '2018-04-13 12:39:05'),
(25, '517fd1de-3f53-11e8-88ec-e0db55fe2900', '2018-04-13 12:46:11'),
(18, '54d87019-3f53-11e8-88ec-e0db55fe2900', '2018-04-13 12:46:17'),
(18, 'c7edae26-3f53-11e8-88ec-e0db55fe2900', '2018-04-13 12:49:30'),
(18, 'e3cba5c3-3f53-11e8-88ec-e0db55fe2900', '2018-04-13 12:50:17'),
(18, 'ae2cdb5c-3f55-11e8-88ec-e0db55fe2900', '2018-04-13 13:03:06'),
(18, 'dc8d5b84-3f56-11e8-88ec-e0db55fe2900', '2018-04-13 13:11:33'),
(18, '34a5f331-3f57-11e8-88ec-e0db55fe2900', '2018-04-13 13:14:01'),
(18, '8b1067cc-3f58-11e8-88ec-e0db55fe2900', '2018-04-13 13:23:35'),
(18, 'e61de8a6-3f58-11e8-88ec-e0db55fe2900', '2018-04-13 13:26:08'),
(18, '1d29937b-3f59-11e8-88ec-e0db55fe2900', '2018-04-13 13:27:40'),
(18, '37990a08-3f59-11e8-88ec-e0db55fe2900', '2018-04-13 13:28:25'),
(18, 'a3e120bf-3f5b-11e8-88ec-e0db55fe2900', '2018-04-13 13:45:45'),
(18, '88b071a1-3f5c-11e8-88ec-e0db55fe2900', '2018-04-13 13:52:09'),
(18, '07e49673-3f5d-11e8-88ec-e0db55fe2900', '2018-04-13 13:55:43'),
(18, 'b49513b2-3f5d-11e8-88ec-e0db55fe2900', '2018-04-13 14:00:32'),
(18, '17b52ea5-3f5e-11e8-88ec-e0db55fe2900', '2018-04-13 14:03:19'),
(18, '2ff5fa3c-3f5e-11e8-88ec-e0db55fe2900', '2018-04-13 14:03:59'),
(18, '4d4bbeff-3f5e-11e8-88ec-e0db55fe2900', '2018-04-13 14:04:49'),
(18, 'a4c56279-3f5f-11e8-88ec-e0db55fe2900', '2018-04-13 14:14:25'),
(18, '42e3bf0e-3f60-11e8-88ec-e0db55fe2900', '2018-04-13 14:18:50'),
(18, '8ddd14fd-4034-11e8-88ec-e0db55fe2900', '2018-04-14 15:38:29'),
(37, 'e69fc089-40b8-11e8-88ec-e0db55fe2900', '2018-04-15 07:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `userPWHash` varchar(255) DEFAULT NULL,
  `userZip` int(11) DEFAULT NULL,
  `goal` int(11) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserID_UNIQUE` (`UserID`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FName`, `LName`, `username`, `userPWHash`, `userZip`, `goal`, `admin`) VALUES
(18, 'a', 'b', 'a', '$2y$10$2VQBRQoanKwDP6Oo/MdG4uBXg39/oJESArYJCBY4d6/HeCUwWUTY.', 32816, 120, NULL),
(22, 'b', 'b', 'b', '$2y$10$qK0zm2x0cz4KgtLVjevE9O8fugVL.Y1Tn9hlgRoBxSQZi2ESFDFCO', 33076, 150, NULL),
(25, 'tim', 'rigby', 'tim', '$2y$10$MCLjl/oelU7yA5IIk0/CR.TsQnm6n9l2iiZ5aN3Pt8xt5aHA5330O', 33076, 100, NULL),
(26, 'p', 'p', 'p', '$2y$10$RxVRlhbaojqnEypxmaMXZuc1pKj34Tx3tiiuxWFDqsMIYqQKy0a42', 33, 3, NULL),
(27, 'c', 'c', 'c', '$2y$10$aLpRJUP/TLjlisfDGOLP/ODUHMQv4tRsEDR1rWlPCLVtrfHmM4l.G', 3, 3, NULL),
(28, 'd', 'd', 'd', '$2y$10$stksZh6FBx.eQWO/Mqu5iubLKJFY6oa3Ypsfz6MvB/bjybHX1/MLe', 33, 9999, NULL),
(29, 'e', 'e', 'e', '$2y$10$dGo/D5jQmPTMWWVot1ymH..NK4QqVchDqdU.m48IwIG/e9dDofKtK', 546, 500, NULL),
(30, 'f', 'f', 'f', '$2y$10$VNzszSPMR.7lT.AX8gIht.jfUATeu2XdySmigCh2PyAjuXN2fbkP2', 900, 900, NULL),
(31, 'q', 'q', 'q', '$2y$10$NT1DbahbY..AAFrpdQzrquVRFdqOBoig.Ul4El4TXBsYOVzQIBRQO', 55, 55, NULL),
(32, '', '', '', '$2y$10$FWugHJyQNBYkYW4v.5tp9OmgIXU02wXMlqTQSwX/33SgcVnUyGDri', 0, 0, NULL),
(36, 'harry', 'potter', 'hp', '$2y$10$/P2GF5dcUO3nQ70n7z0Eo.hEwRKWx0FrbhVlclzZr2WuOvkOXRM3a', 32816, 150, NULL),
(37, 'test', 'testy', 't', '$2y$10$cTYbwVmZYzw6WZB8RjdC7Ov9VrSeZZH/3j2pUCNEvJPe734awwVlu', 32816, 50, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
