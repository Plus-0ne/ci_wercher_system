-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2019 at 08:18 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wercher_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acad_history`
--

DROP TABLE IF EXISTS `acad_history`;
CREATE TABLE IF NOT EXISTS `acad_history` (
  `Acad_No` int(11) NOT NULL AUTO_INCREMENT,
  `EmployeeID` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `DateStarted` varchar(255) DEFAULT NULL,
  `DateEnds` varchar(255) NOT NULL,
  PRIMARY KEY (`Acad_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Access_ID` varchar(255) NOT NULL,
  `Branch` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Access_ID`, `Branch`) VALUES
(1, 'master', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_No` int(11) NOT NULL AUTO_INCREMENT,
  `Employee_ID` varchar(255) NOT NULL,
  `EmployeeImage` blob,
  `EmploymentType` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleInitial` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `BirthDate` varchar(255) DEFAULT NULL,
  `BirthPlace` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `MaritalStatus` varchar(255) DEFAULT NULL,
  `ProjectAssigned` varchar(255) DEFAULT NULL,
  `SSS` varchar(255) DEFAULT NULL,
  `Philhealth` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `TIN` varchar(255) DEFAULT NULL,
  `ATM` varchar(255) DEFAULT NULL,
  `DateHired` varchar(255) DEFAULT NULL,
  `DateSeparated` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Employee_No`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_No`, `Employee_ID`, `EmployeeImage`, `EmploymentType`, `LastName`, `FirstName`, `MiddleInitial`, `Address`, `BirthDate`, `BirthPlace`, `Gender`, `MaritalStatus`, `ProjectAssigned`, `SSS`, `Philhealth`, `HDMF`, `TIN`, `ATM`, `DateHired`, `DateSeparated`, `Status`) VALUES
(1, '00001-A', 0x68747470733a2f2f6c6f63616c6465762e746573742f48525f53797374656d2f75706c6f6164732f30303030312d412f31343062313465303739646338356337326339663032356362363764623536322e706e67, 'Employee', 'Dasdas', 'Dasdasd', 'Asdas', 'asdasdasdas', '2019-10-21', 'asdasdas', 'Female', 'Single', 'dasdada', 'sdadada', NULL, NULL, NULL, NULL, '2019-10-23', '2019-10-31', 'Active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
