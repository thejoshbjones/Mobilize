-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2013 at 05:14 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `heath_hackattack`
--
CREATE DATABASE IF NOT EXISTS `heath_hackattack` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `heath_hackattack`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(255) NOT NULL,
  `Ministry` int(255) NOT NULL,
  `User` int(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ministry`
--

CREATE TABLE IF NOT EXISTS `ministry` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Owner` int(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ministry`
--

INSERT INTO `ministry` (`ID`, `Name`, `Description`, `City`, `State`, `Email`, `Phone`, `Owner`) VALUES
(1, 'Hope for the Hungry', 'We help hungry people get not hungry.', 'Austin', 'TX', 'h4h@email.com', '555-555-5555', 1),
(2, 'Hope in the City', 'We''re a church', 'Austin', 'TX', 'email@email.com', '555-555-5555', 1);

-- --------------------------------------------------------

--
-- Table structure for table `opportunity`
--

CREATE TABLE IF NOT EXISTS `opportunity` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Ministry` int(255) NOT NULL,
  `Owner` int(255) NOT NULL,
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Skill` int(255) NOT NULL,
  `Timeframe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Start_Date` int(255) NOT NULL,
  `End_Date` int(255) NOT NULL,
  `Address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Zip` int(255) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `opportunity`
--

INSERT INTO `opportunity` (`ID`, `Ministry`, `Owner`, `Title`, `Description`, `Skill`, `Timeframe`, `Start_Date`, `End_Date`, `Address`, `City`, `State`, `Zip`, `Status`) VALUES
(1, 1, 1, 'Teach Money Classes', 'We would like someone wise in the ways of finances to teach money classes.', 3, '5 Months', 0, 50514, '123 Some St.', 'Austin', 'TX', 76513, 1),
(2, 1, 1, 'Advanced Ministry', 'Do some advanced ministry stuff', 6, '8 Hours', 10114, 10114, '123 Some St.', 'Austin', 'TX', 76513, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Skill` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`ID`, `Skill`) VALUES
(1, 'Graphic Design'),
(2, 'Law'),
(3, 'Business/Marketing'),
(4, 'Education'),
(5, 'Computing/IT'),
(6, 'Ministry'),
(7, 'Accounting'),
(8, 'Counseling');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Opportunity` int(255) NOT NULL,
  `Task_Num` int(255) NOT NULL,
  `Task` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `State` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `First_Name`, `Last_Name`, `City`, `State`, `Email`, `Phone`) VALUES
(1, 'joshbjones', 'password', 'Josh', 'Jones', 'Austin', 'TX', 'email@email.com', '555-555-5555');

-- --------------------------------------------------------

--
-- Table structure for table `userskills`
--

CREATE TABLE IF NOT EXISTS `userskills` (
  `Users` int(255) NOT NULL,
  `Skills` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
