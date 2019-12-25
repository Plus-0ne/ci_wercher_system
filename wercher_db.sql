-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2019 at 06:29 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

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

CREATE TABLE `acad_history` (
  `Acad_No` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `Level` varchar(255) DEFAULT NULL,
  `SchoolName` varchar(255) DEFAULT NULL,
  `SchoolAddress` varchar(255) DEFAULT NULL,
  `DateStarted` varchar(255) DEFAULT NULL,
  `DateEnds` varchar(255) NOT NULL,
  `HighDegree` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_history`
--

INSERT INTO `acad_history` (`Acad_No`, `ApplicantID`, `Level`, `SchoolName`, `SchoolAddress`, `DateStarted`, `DateEnds`, `HighDegree`) VALUES
(1, '00007-A', 'Other courses / Special Training', '5555555', '55555', '2015', '2050', 'Yes'),
(2, '00008-A', 'High School', 'SAMPLE', 'SAMPLE', 'SAMP', 'SAMP', 'SAMPLE'),
(3, '00002-A', 'College', 'yes', 'yeys', '1234', '5678', 'yesyesyes'),
(5, '00005-A', 'High School', '2', '2', '3', '3', '3'),
(6, '00022-A', 'High School', 'Highschool 101', 'Europe', '1000', '2000', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminNo` int(11) NOT NULL,
  `AdminLevel` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `AdminID` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleInitial` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminNo`, `AdminLevel`, `Position`, `AdminID`, `Password`, `FirstName`, `MiddleInitial`, `LastName`, `Gender`, `DateAdded`) VALUES
(7, 'Level_1', 'Developer', 'Dev-0001', '$2y$10$yJEJbZZiXlqaFAWZE08.geoEc3tfpRGkQyYVACpcy4ukOow.mESim', 'Romel', 'P', 'Cubelo', 'Male', '1573753020'),
(8, 'Level_1', 'Developer', 'Dev-0002', '$2y$10$u4Dv7PQgGdDL1I/XPar15e3bhNv4RQKN..3LD3aBKsV8DWdmHIPuu', 'Tewi', 'I', 'Inaba', 'Female', '1575271925');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `ApplicantNo` int(11) NOT NULL,
  `ApplicantImage` blob DEFAULT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `PositionDesired` varchar(255) DEFAULT NULL,
  `SalaryExpected` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleInitial` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Age` varchar(255) DEFAULT NULL,
  `Height` varchar(255) DEFAULT NULL,
  `Weight` varchar(255) DEFAULT NULL,
  `Religion` varchar(255) DEFAULT NULL,
  `BirthDate` varchar(255) DEFAULT NULL,
  `BirthPlace` varchar(255) DEFAULT NULL,
  `Citizenship` varchar(255) DEFAULT NULL,
  `CivilStatus` varchar(255) DEFAULT NULL,
  `No_OfChildren` varchar(255) DEFAULT NULL,
  `Address_Present` varchar(255) DEFAULT NULL,
  `Address_Provincial` varchar(255) DEFAULT NULL,
  `Address_Manila` varchar(255) DEFAULT NULL,
  `Phone_No` varchar(255) DEFAULT NULL,
  `SSS_No` varchar(255) DEFAULT NULL,
  `EffectiveDateCoverage` varchar(255) DEFAULT NULL,
  `ResidenceCertificateNo` varchar(255) DEFAULT NULL,
  `Rcn_At` varchar(255) DEFAULT NULL,
  `Rcn_On` varchar(255) DEFAULT NULL,
  `TIN` varchar(255) DEFAULT NULL,
  `TIN_At` varchar(255) DEFAULT NULL,
  `TIN_On` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `HDMF_At` varchar(255) DEFAULT NULL,
  `HDMF_On` varchar(255) DEFAULT NULL,
  `PhilHealth` varchar(255) DEFAULT NULL,
  `PhilHealth_At` varchar(255) DEFAULT NULL,
  `PhilHealth_On` varchar(255) DEFAULT NULL,
  `ATM_No` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `ClientEmployed` varchar(255) DEFAULT NULL,
  `DateStarted` varchar(255) DEFAULT NULL,
  `DateEnds` varchar(255) DEFAULT NULL,
  `AppliedOn` varchar(255) DEFAULT NULL,
  `SalaryType` varchar(255) DEFAULT NULL,
  `ReminderType` varchar(255) DEFAULT NULL,
  `ReminderDate` varchar(255) DEFAULT NULL,
  `ReminderLocked` varchar(255) DEFAULT NULL,
  `Temp_ApplicantID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`ApplicantNo`, `ApplicantImage`, `ApplicantID`, `PositionDesired`, `SalaryExpected`, `LastName`, `FirstName`, `MiddleInitial`, `Gender`, `Age`, `Height`, `Weight`, `Religion`, `BirthDate`, `BirthPlace`, `Citizenship`, `CivilStatus`, `No_OfChildren`, `Address_Present`, `Address_Provincial`, `Address_Manila`, `Phone_No`, `SSS_No`, `EffectiveDateCoverage`, `ResidenceCertificateNo`, `Rcn_At`, `Rcn_On`, `TIN`, `TIN_At`, `TIN_On`, `HDMF`, `HDMF_At`, `HDMF_On`, `PhilHealth`, `PhilHealth_At`, `PhilHealth_On`, `ATM_No`, `Status`, `ClientEmployed`, `DateStarted`, `DateEnds`, `AppliedOn`, `SalaryType`, `ReminderType`, `ReminderDate`, `ReminderLocked`, `Temp_ApplicantID`) VALUES
(1, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f6368726f6d655f4a7179474e53314973642e6a7067, '00001-B', 'Payroll Specialist', '50000', 'Haniyasushin', 'Keiki', 'H', 'Female', '9999', '5', '5', 'Self', '150015-12-05', 'Spirit World', '12345', 'Single', '500', '11111111', '222222222', '33333333', '123456789', '111111111', '2019-12-10', '1111111', '11111111111', '2019-12-05', '22222222222', '2222222222222', '2019-12-20', '77777', '77777777', '2019-12-13', '777', '7777777', '2019-12-13', '7785645654656', 'Expired', '1', '', '2019-12-23 08:56:27 AM', '2019-10-14 11:28:43 AM', NULL, '', '', 'No', '00001-B'),
(2, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030322d412f646c6c686f73745f6f544d3551453634556c2e6a7067, '00002-A', 'Office Staff', '80000', 'Inaba', 'Tewi', 'I', 'Female', '3000', '5', '5', '5555555', '10000-05-13', 'Eientei', '151461246', 'Single', '0', 'Eientei', 'Gensokyo', '12345', '1353141', '2456245134', '2019-12-12', '23423526246', 'A', '2019-12-13', '264622343256246', 'B', '2019-12-21', '1', '2', '2019-12-06', '3', '4', '2019-12-28', '5', 'Expired', '', '', '2019-12-23 04:29:38 AM', '2019-12-14 11:28:43 AM', NULL, '', '', 'No', '00002-A'),
(3, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f6d6f7274792e6a7067, '00003-B', 'Office Staff', '500', 'Smith', 'Morty', 'S', 'Male', '10', '5', '5', 'Rick', '2007-12-01', 'Earth', 'Yes', 'Single', '0', '252452524', '524524524', '5245245245245', '25425245', '24525245', '2019-12-19', '245245245', '2452525245245', '2019-12-14', '245245', '24245245245245245245', '2020-01-20', '', '', '', '', '', '', NULL, 'Expired', '1', '', '2019-12-23 10:31:54 AM', '2019-10-14 11:28:43 AM', NULL, '', '', 'No', '00003-B'),
(4, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030342d412f446169796f757365692e6a7067, '00004-B', 'Office Staff', '8888888', 'Test', 'Test', 'Test', 'Male', '35', '531', '135', '2352561', '2019-12-18', '13513513', '1354156', 'Widowed', '5135413', '31515135', '135135', '135135135135135', '4156135', '153515', '2019-12-10', '135135', '51351313', '0135-12-05', '13513531', '5135135', '2019-12-13', '', '', '', '', '', '', NULL, 'Expired', '', '', '2019-12-22 04:42:03 AM', '2019-09-14 11:28:43 AM', NULL, '', '', 'No', '00004-B'),
(5, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030352d412f38357662733363616577333231322e6a7067, '00005-B', 'Bookeeper', '???', 'Á???', 'Á??', 'Á????', 'Female', '500', '2', '2', '?', '2019-12-04', '??', '??', 'Single', '50', '????', '????', '?????', '500000', '?', '2019-12-19', '???', '??', '2019-12-12', '???', '?', '2019-12-28', '11', '11', '2019-12-06', '22', '22', '2019-12-21', '333', 'Expired', '1', '', '2019-12-23 09:31:37 AM', '2019-12-14 11:29:13 AM', NULL, '', '', 'No', '00005-B'),
(6, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d412f526162626974732b666f6f742b69732b737570706f7365642b746f2b62652b6c75636b792b5f36396661363033323666313237303266336135663439653766626430333239312e6a7067, '00006-C', 'Office Staff', '1111111', 'Aaa', 'Aaaaaaa', 'Aaaaaa', 'Male', '11', '11', '11', '11', '2019-12-12', '11', '12313', 'Single', '13', '123213', '32131', '32133', '1313', '123213', '2019-12-26', '1231', '1131313123', '2019-12-13', '12313', '13213123123', '2019-12-21', '', '', '', '', '', '', NULL, 'Employed', '2', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', '2019-12-02 09:09:59 AM', NULL, NULL, NULL, NULL, '00006-C'),
(7, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030372d412f6368726f6d655f567737685757644b62342e6a7067, '00007-B', 'Secretary', '90000', 'Arató', 'András', 'A', 'Male', '50', '5', '80', '111111', '2019-12-03', 'Hungary', 'z315135', 'Single', '3', 'K?szeg, Hungary', 'K?szeg, Hungary', '11111', '35735723542', '2524622753', '2019-12-31', '252462624624234', 'K?szeg', '2019-12-04', '26245234226', 'K?szeg', '2019-12-14', '111', '22222', '2019-12-12', '33333', '3444444', '2019-12-27', '5555', 'Blacklisted', '2', '2019-12-18 04:34:14 AM', '2019-12-20 04:34:14 AM', '2019-12-02 09:34:26 AM', NULL, NULL, NULL, NULL, '00007-B'),
(8, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030382d412f31363630323832305f3136313233333230343338303238385f333934343238313336383536353532393633365f6e5f2d5f436f70792e6a7067, '00008-A', 'Office Staff', '20000', 'Last Name', 'First Name', 'Middle Initial', 'Male', '1', '1', '1', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', 'Single', '1', 'SAMPLE', 'SAMPLE', 'SAMPLE', '1', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-17', 'SAMPLE', 'Deleted', '2', '2019-12-12 08:41:42 PM', '2020-02-12 08:41:42 PM', '2019-12-10 06:45:27 AM', NULL, NULL, NULL, NULL, NULL),
(9, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030392d412f446973636f72645f44646c3256366f7464432e6a7067, '00009-A', 'Office Staff', '1000', 'Kojima', 'Hideo', 'D', 'Male', '56', '2', '500', 'Yes', '1963-07-24', 'Japan', 'Japanese', 'Single', '90', 'cabacbacba', 'acaccaacbacb', 'bacbacbabaaacacb', '9999999', '543577', '2019-12-01', '357357373', 'adabbcbab', '2019-12-02', '73735735', 'acbacbacbab', '2019-12-03', '737357', 'acbcabacb', '2019-12-04', '3573737', 'acbabacbabacb', '2019-12-05', '3573575375', 'Deleted', NULL, '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', '2019-12-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-01-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-02-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-03-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-04-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-05-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-06-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-07-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-08-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-09-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-10-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-11-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-12-14 05:05:30 PM', NULL, NULL, NULL, NULL, NULL),
(34, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303032322d412f77746969666163652e706e67, '00022-B', 'Office Staff', '35000', 'Langley', 'Richard', 'W', 'Male', '40', '5', '100', 'None', '2019-12-18', 'Jamaica', 'British', 'Single', '0', 'London', 'London', 'London', '000000000', '357935634', '2019-12-21', '135355346', 'abc53a', '2019-12-05', '72673478', 'abcdefghjikl;dfgzx', '2019-12-17', '437474128', 'abcde6c', '2019-12-13', '66345625', 'abcbcncj365gdh', '2019-12-28', '26235756378', 'Blacklisted', '4', '2019-12-18 05:14:04 AM', '2019-12-19 05:14:04 AM', '2019-12-17 10:12:37 PM', NULL, NULL, NULL, NULL, '00022-B');

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `LogID` int(11) NOT NULL,
  `LogType` varchar(255) DEFAULT NULL,
  `UserAgent` varchar(255) DEFAULT NULL,
  `IPAddress` varchar(255) DEFAULT NULL,
  `Action` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `beneficiaries`
--

CREATE TABLE `beneficiaries` (
  `No` int(11) NOT NULL,
  `ApplicationID` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Relationship` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ClientID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `ContactNumber` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `Name`, `Address`, `ContactNumber`, `Status`) VALUES
(1, 'Some Guy', '123456789', '11111111111', 'Active'),
(2, 'HELLO', '1', '1', 'Active'),
(3, '5', '5', '5', 'Deleted'),
(4, 'Shrek', 'Swamp', '0000000', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `contract_history`
--

CREATE TABLE `contract_history` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `PreviousDateStarted` varchar(255) DEFAULT NULL,
  `PreviousDateEnds` varchar(255) DEFAULT NULL,
  `Client` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract_history`
--

INSERT INTO `contract_history` (`ID`, `ApplicantID`, `PreviousDateStarted`, `PreviousDateEnds`, `Client`) VALUES
(1, '00007-A', '2019-12-12 03:46:27 AM', '2019-11-12 03:46:27 AM', 'Some Guy'),
(2, '00005-A', '2019-12-12 04:20:18 AM', '2019-10-12 04:20:18 AM', 'HELLO'),
(3, '00003-A', '2019-12-12 04:20:44 AM', '2018-02-12 04:20:44 AM', 'HELLO'),
(4, '00006-A', NULL, NULL, 'Some Guy'),
(5, '00007-A', '2019-12-12 08:41:42 PM', '2020-02-12 08:41:42 PM', 'Some Guy'),
(6, '00007-A', '2019-12-12 08:41:42 PM', '2020-02-12 08:41:42 PM', 'Some Guy'),
(7, '00001-A', '2019-12-12 08:41:42 PM', '2020-02-12 08:41:42 PM', 'Some Guy'),
(8, '00006-A', '2019-12-12 08:41:42 PM', '2020-02-12 08:41:42 PM', 'Some Guy'),
(9, '00001-A', '2019-12-12 08:41:42 PM', '2020-02-12 08:41:42 PM', 'Some Guy'),
(10, '00007-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(11, '00004-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(12, '00002-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(13, '00002-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(14, '00005-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(15, '00005-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(16, '00006-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(17, '00006-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(18, '00007-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(19, '00007-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(20, '00001-A', NULL, NULL, 'Some Guy'),
(21, '00002-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(22, '00002-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(23, '00003-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(24, '00005-A', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(25, '00006-B', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy'),
(26, '00004-B', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', 'Some Guy'),
(27, '00001-A', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', 'Some Guy'),
(28, '00002-A', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', 'Some Guy'),
(29, '00003-A', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', 'Some Guy'),
(30, '00005-A', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', 'Some Guy'),
(31, '00001-B', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', 'HELLO');

-- --------------------------------------------------------

--
-- Table structure for table `dummy_hours`
--

CREATE TABLE `dummy_hours` (
  `ID` int(11) NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dummy_hours`
--

INSERT INTO `dummy_hours` (`ID`, `Time`, `Current`) VALUES
(141, '2019-12-09', 'Current'),
(142, '2019-12-10', 'Current'),
(143, '2019-12-11', 'Current'),
(144, '2019-12-12', 'Current'),
(145, '2019-12-13', 'Current'),
(146, '2019-12-14', 'Current');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_No` int(11) NOT NULL,
  `Employee_ID` varchar(255) NOT NULL,
  `EmployeeImage` blob DEFAULT NULL,
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
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employment_record`
--

CREATE TABLE `employment_record` (
  `No` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `PeriodCovered` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `CauseOfSeparation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employment_record`
--

INSERT INTO `employment_record` (`No`, `ApplicantID`, `Name`, `Address`, `PeriodCovered`, `Position`, `Salary`, `CauseOfSeparation`) VALUES
(1, '00007-A', 'Some Dude', 'Somewhere in Russia', '2010', 'Manager', '75000', 'Late by 1 minute'),
(2, '00008-A', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE', 'SAMPLE');

-- --------------------------------------------------------

--
-- Table structure for table `hours_weekly`
--

CREATE TABLE `hours_weekly` (
  `No` int(11) NOT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Hours` varchar(255) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hours_weekly`
--

INSERT INTO `hours_weekly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Time`, `Hours`, `Current`) VALUES
(1, '1', '00001-B', 'Haniyasushin, Keiki H.', '50000', NULL, NULL, NULL),
(2, '1', '00005-B', 'Á???, Á?? Á????.', '???', NULL, NULL, NULL),
(3, '1', '00003-B', 'Smith, Morty S.', '500', NULL, NULL, NULL),
(383, '1', '00001-B', NULL, NULL, '2019-12-06', '1', NULL),
(384, '1', '00001-B', NULL, NULL, '2019-12-07', '2', NULL),
(385, '1', '00001-B', NULL, NULL, '2019-12-08', '3', NULL),
(388, '1', '00003-B', NULL, NULL, '2019-12-06', '6', NULL),
(389, '1', '00003-B', NULL, NULL, '2019-12-07', '7', NULL),
(390, '1', '00003-B', NULL, NULL, '2019-12-08', '8', NULL),
(391, '1', '00003-B', NULL, NULL, '2019-12-09', '9', NULL),
(392, '1', '00003-B', NULL, NULL, '2019-12-10', '10', NULL),
(393, '1', '00001-B', NULL, NULL, '2019-12-09', '4', NULL),
(394, '1', '00001-B', NULL, NULL, '2019-12-10', '5', NULL),
(395, '1', '00001-B', NULL, NULL, '2019-12-11', '6', NULL),
(396, '1', '00001-B', NULL, NULL, '2019-12-12', '7', NULL),
(397, '1', '00001-B', NULL, NULL, '2019-12-13', '8', NULL),
(398, '1', '00001-B', NULL, NULL, '2019-12-14', '11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `No` int(11) NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Event` varchar(255) DEFAULT NULL,
  `Link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`No`, `Time`, `Type`, `Event`, `Link`) VALUES
(3, '2019-12-15 01:45:00 AM', 'Employment', 'Applicant ID 2 has been employed to Client ID 1 for 1 years, 0 months, and 0 days!', NULL),
(4, '2019-12-15 02:02:53 AM', 'Update', 'Updated details on Applicant/Employee ID 00001-A.', NULL),
(5, '2019-12-15 02:03:18 AM', 'New', 'New Admin added! (Name: 55, 55 55. | Position: HR_Assistant)', NULL),
(6, '2019-12-15 02:03:27 AM', 'Deletion', 'Admin ID 9 has been removed.', NULL),
(7, '2019-12-15 02:14:30 AM', 'Note', 'TEST NOTE 12345', NULL),
(8, '2019-12-15 04:30:56 AM', 'New', 'Applicant ID 1 has been employed to Client ID 1 for 1 years, 0 months, and 0 days!', NULL),
(9, '2019-12-15 08:03:17 PM', 'Update', 'Applicant ID 9 has their contract extended by  years, 5 months, and  days.', NULL),
(10, '2019-12-15 08:54:43 PM', 'New', '1', NULL),
(11, '2019-12-15 08:56:09 PM', 'New', '1', NULL),
(12, '2019-12-15 08:58:16 PM', 'New', '1', NULL),
(13, '2019-12-15 08:58:52 PM', 'New', '0', NULL),
(14, '2019-12-15 08:59:13 PM', 'New', 'Applicant ID 3 has been employed to Client ID 1 for 1 years, 0 months, 0 days!', NULL),
(15, '2019-12-15 09:03:32 PM', 'New', 'Applicant ID 1 has been employed to Client ID 1 for 1 days!', NULL),
(16, '2019-12-15 09:08:51 PM', 'New', 'Applicant ID 3 has been employed to Client ID 1 for 1 year, 2 months!', NULL),
(17, '2019-12-15 09:11:48 PM', 'Update', 'Applicant ID 1 has their contract extended by1 day!', NULL),
(18, '2019-12-15 09:12:39 PM', 'Note', 'vvvvvvvvvvvvvvvvvvvvvvv', NULL),
(19, '2019-12-15 09:13:35 PM', 'Note', '5555', NULL),
(20, '2019-12-15 09:13:39 PM', 'Note', '2222222', NULL),
(21, '2019-12-15 09:15:25 PM', 'Note', '1', NULL),
(22, '2019-12-15 09:15:29 PM', 'Note', '2222', NULL),
(23, '2019-12-15 09:15:56 PM', 'Note', '777', NULL),
(24, '2019-12-15 09:16:02 PM', 'Note', '22', NULL),
(25, '2019-12-15 10:11:41 PM', 'New', 'Applicant ID 4 has been employed to Client ID 1 for 1 day!', NULL),
(26, '2019-12-16 04:21:15 AM', 'Update', 'Updated details on Applicant/Employee ID 00005-A.', NULL),
(27, '2019-12-16 04:21:34 AM', 'New', 'Applicant ID 00002-A has been employed to Client ID 1 for 1 day!', NULL),
(28, '2019-12-16 06:22:31 AM', 'New', 'Applicant ID 00005-A has been employed to Client ID 2 for 1 day!', NULL),
(29, '2019-12-16 06:23:06 AM', 'New', 'Applicant ID 00007-A has been employed to Client ID 2 for 1 day!', NULL),
(30, '2019-12-16 06:23:11 AM', 'New', 'Applicant ID 00006-A has been employed to Client ID 2 for 1 day!', NULL),
(31, '2019-12-16 06:24:29 AM', 'New', 'New Client added! (Name: Shrek | Contact: 0000000)', NULL),
(32, '2019-12-16 07:51:24 AM', 'Note', 'aaaaaaaa', NULL),
(33, '2019-12-17 11:33:14 PM', 'New', 'Applicant ID 00005-A has been employed to Client ID 1 for 27 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(34, '2019-12-17 11:33:14 PM', 'Reminder', 'Employee 00005-A is expiring in 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(35, '2019-12-17 11:33:33 PM', 'New', 'Applicant ID 00002-A has been employed to Client ID 1 for 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(36, '2019-12-17 11:33:34 PM', 'Reminder', 'Employee 00002-A is expiring in 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(37, '2019-12-17 11:33:34 PM', 'Reminder', 'Employee 00005-A is expiring in 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(38, '2019-12-17 11:33:49 PM', 'Reminder', 'Employee 00002-A is expiring in 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(39, '2019-12-17 11:33:49 PM', 'Reminder', 'Employee 00005-A is expiring in 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(40, '2019-12-17 11:37:48 PM', 'Reminder', 'Employee 00002-A is expiring in 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(41, '2019-12-17 11:37:48 PM', 'Reminder', 'Employee 00005-A is expiring in 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(42, '2019-12-18 04:02:17 AM', 'New', 'A reminder has been set for ID 00002-A, alerting after 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(43, '2019-12-18 04:02:52 AM', 'Update', 'Employee 00002-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(44, '2019-12-18 04:03:40 AM', 'New', 'A reminder has been set for ID 00003-A, alerting after 1 year, 1 month, 5 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(45, '2019-12-18 04:03:40 AM', 'Update', 'Employee 00003-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(46, '2019-12-18 04:06:47 AM', 'New', 'A reminder has been set for ID 00005-A, alerting after 26 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(47, '2019-12-18 04:06:58 AM', 'New', 'A reminder has been set for ID 00005-A, alerting after 25 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(48, '2019-12-18 04:13:08 AM', 'New', 'Applicant ID 00002-A has been employed to Client ID 1 for 5 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(49, '2019-12-18 04:13:50 AM', 'New', 'Applicant ID 00002-A has been employed to Client ID 1 for 5 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(50, '2019-12-18 04:18:15 AM', 'New', 'Applicant ID 00002-A has been employed to Client ID 1 for 5 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(51, '2019-12-18 04:28:53 AM', 'New', 'Applicant ID 00002-A has been employed to Client ID 1 for 5 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(52, '2019-12-18 04:29:38 AM', 'New', 'Applicant ID 00002-A has been employed to Client ID 1 for 5 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(53, '2019-12-18 04:34:14 AM', 'New', 'Applicant ID 00007-A has been employed to Client ID 1 for 2 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00007-A'),
(54, '2019-12-18 04:34:21 AM', 'New', 'Applicant ID 00006-A has been employed to Client ID 1 for 2 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00006-A'),
(55, '2019-12-18 04:39:00 AM', 'Update', 'Employee 00005-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(56, '2019-12-18 04:39:25 AM', 'Update', 'Employee 00006-B has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00006-B'),
(57, '2019-12-18 04:39:43 AM', 'New', 'Applicant ID 00006-B has been employed to Client ID 1 for 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00006-B'),
(58, '2019-12-18 04:42:03 AM', 'New', 'Applicant ID 00004-B has been employed to Client ID 1 for 4 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-B'),
(59, '2019-12-18 05:04:08 AM', 'New', 'A reminder has been set for ID 00004-B, alerting after 3 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-B'),
(60, '2019-12-18 05:12:37 AM', 'New', 'New Applicant added! (Name: Langley, Richard W. | ID: 00022-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00022-A'),
(61, '2019-12-18 05:14:04 AM', 'New', 'Applicant ID 00022-B has been employed to Client ID 4 for 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00022-B'),
(62, '2019-12-18 05:14:15 AM', 'Archival', 'Employee ID 00009-A has been archived.', 'http://localhost/ci_wercher_system/ViewEmployee?id='),
(63, '2019-12-18 05:40:03 AM', 'Archival', 'Employee ID 00022-B has been blacklisted.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00022-B'),
(64, '2019-12-21 05:01:24 AM', 'New', 'A reminder has been set for ID 00004-B, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-B'),
(65, '2019-12-21 03:52:41 PM', 'New', 'A reminder has been set for ID 00004-B, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-B'),
(66, '2019-12-21 04:37:26 PM', 'Note', 'Hello world', NULL),
(67, '2019-12-22 01:52:02 AM', 'Note', 'Datetime Test', NULL),
(68, '2019-12-22 04:48:28 AM', 'Update', 'Employee 00004-B has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-B'),
(69, '2019-12-22 08:56:27 AM', 'New', 'Applicant ID 00001-B has been employed to Client ID 1 for 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-B'),
(70, '2019-12-22 09:31:37 AM', 'New', 'Applicant ID 00005-B has been employed to Client ID 1 for 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-B'),
(71, '2019-12-22 10:27:06 AM', 'New', 'Applicant ID  has been employed to Client ID  fo!', 'http://localhost/ci_wercher_system/ViewEmployee?id='),
(72, '2019-12-22 10:29:13 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(73, '2019-12-22 10:29:34 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(74, '2019-12-22 10:31:16 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(75, '2019-12-22 10:31:22 AM', 'Update', 'Updated weekly hours for 00005-B.', 'http://localhost/ci_wercher_system/Clients'),
(76, '2019-12-22 10:31:55 AM', 'New', 'Applicant ID 00003-B has been employed to Client ID 1 for 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-B'),
(77, '2019-12-22 10:32:17 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(78, '2019-12-23 11:49:03 PM', 'Update', 'Employee 00001-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(79, '2019-12-23 11:49:03 PM', 'Update', 'Employee 00002-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(80, '2019-12-23 11:49:03 PM', 'Update', 'Employee 00003-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(81, '2019-12-23 11:49:03 PM', 'Update', 'Employee 00005-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(82, '2019-12-25 04:09:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(83, '2019-12-25 04:09:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(84, '2019-12-25 04:09:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(85, '2019-12-25 04:10:33 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(86, '2019-12-25 04:10:33 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(87, '2019-12-25 04:10:33 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(88, '2019-12-25 04:11:32 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(89, '2019-12-25 04:11:32 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(90, '2019-12-25 04:11:32 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(91, '2019-12-25 04:11:48 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(92, '2019-12-25 04:11:49 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(93, '2019-12-25 04:11:49 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(94, '2019-12-25 04:12:57 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(95, '2019-12-25 04:12:58 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(96, '2019-12-25 04:12:58 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(97, '2019-12-25 04:14:17 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(98, '2019-12-25 04:14:17 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(99, '2019-12-25 04:14:17 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(100, '2019-12-25 05:20:57 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(101, '2019-12-25 05:20:57 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(102, '2019-12-25 05:20:57 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(103, '2019-12-25 05:20:57 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(104, '2019-12-25 05:23:42 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(105, '2019-12-25 05:23:42 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(106, '2019-12-25 05:23:43 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(107, '2019-12-25 05:23:43 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(108, '2019-12-25 05:23:43 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(109, '2019-12-25 05:23:43 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(110, '2019-12-25 06:27:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(111, '2019-12-25 06:27:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(112, '2019-12-25 06:27:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(113, '2019-12-25 06:27:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(114, '2019-12-25 06:27:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(115, '2019-12-25 06:27:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(116, '2019-12-25 06:27:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(117, '2019-12-25 06:27:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(118, '2019-12-25 06:29:47 AM', 'Update', 'Employee 00001-B has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-B'),
(119, '2019-12-25 06:30:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(120, '2019-12-25 06:30:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(121, '2019-12-25 06:30:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(122, '2019-12-25 06:30:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(123, '2019-12-25 06:30:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(124, '2019-12-25 06:30:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(125, '2019-12-25 06:30:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(126, '2019-12-25 06:30:29 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(127, '2019-12-25 06:33:00 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(128, '2019-12-25 06:33:00 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(129, '2019-12-25 06:33:00 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(130, '2019-12-25 06:33:00 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(131, '2019-12-25 06:33:00 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(132, '2019-12-25 06:33:00 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(133, '2019-12-25 06:33:00 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(134, '2019-12-25 06:33:00 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(135, '2019-12-25 06:34:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(136, '2019-12-25 06:34:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(137, '2019-12-25 06:34:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(138, '2019-12-25 06:34:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(139, '2019-12-25 06:34:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(140, '2019-12-25 06:34:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(141, '2019-12-25 06:34:28 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(142, '2019-12-25 06:34:29 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(143, '2019-12-25 06:37:44 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(144, '2019-12-25 06:37:44 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(145, '2019-12-25 06:37:44 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(146, '2019-12-25 06:37:44 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(147, '2019-12-25 06:37:44 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(148, '2019-12-25 06:37:44 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(149, '2019-12-25 06:37:44 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(150, '2019-12-25 06:37:44 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(151, '2019-12-25 07:32:47 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(152, '2019-12-25 07:32:47 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(153, '2019-12-25 07:32:47 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(154, '2019-12-25 07:32:47 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(155, '2019-12-25 07:32:47 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(156, '2019-12-25 07:32:47 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(157, '2019-12-25 07:32:47 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(158, '2019-12-25 07:32:47 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(159, '2019-12-25 08:00:35 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(160, '2019-12-25 08:00:35 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(161, '2019-12-25 08:00:35 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(162, '2019-12-25 08:00:35 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(163, '2019-12-25 08:00:35 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(164, '2019-12-25 08:00:35 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(165, '2019-12-25 08:00:35 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(166, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(167, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(168, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(169, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(170, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(171, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(172, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(173, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(174, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(175, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(176, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(177, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(178, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(179, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(180, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(181, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(182, '2019-12-25 08:00:36 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(183, '2019-12-25 08:00:37 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(184, '2019-12-25 08:00:37 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(185, '2019-12-25 08:00:37 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(186, '2019-12-25 08:00:37 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(187, '2019-12-25 08:00:37 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(188, '2019-12-25 08:00:37 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(189, '2019-12-25 08:00:37 AM', 'Update', 'Updated weekly hours for 00022-B.', 'http://localhost/ci_wercher_system/Clients'),
(190, '2019-12-25 08:04:22 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(191, '2019-12-25 08:04:22 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(192, '2019-12-25 08:04:22 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(193, '2019-12-25 08:05:41 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(194, '2019-12-25 08:05:41 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(195, '2019-12-25 08:05:42 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(196, '2019-12-25 08:05:50 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(197, '2019-12-25 08:05:50 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(198, '2019-12-25 08:05:50 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(199, '2019-12-25 08:08:18 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(200, '2019-12-25 08:08:18 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(201, '2019-12-25 08:08:18 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(202, '2019-12-25 08:08:41 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(203, '2019-12-25 08:08:41 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(204, '2019-12-25 08:08:41 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(205, '2019-12-25 08:08:49 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(206, '2019-12-25 08:08:49 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(207, '2019-12-25 08:08:49 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(208, '2019-12-25 08:16:58 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(209, '2019-12-25 08:16:58 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(210, '2019-12-25 08:16:58 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(211, '2019-12-25 08:17:02 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(212, '2019-12-25 08:17:02 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(213, '2019-12-25 08:17:02 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(214, '2019-12-25 08:18:11 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(215, '2019-12-25 08:18:11 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(216, '2019-12-25 08:18:11 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(217, '2019-12-25 08:18:15 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(218, '2019-12-25 08:18:15 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(219, '2019-12-25 08:18:15 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(220, '2019-12-25 08:29:38 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(221, '2019-12-25 08:29:38 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(222, '2019-12-25 08:29:38 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(223, '2019-12-25 08:29:42 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(224, '2019-12-25 08:29:42 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(225, '2019-12-25 08:29:42 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(226, '2019-12-25 08:29:52 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(227, '2019-12-25 08:29:52 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(228, '2019-12-25 08:29:52 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(229, '2019-12-25 08:30:04 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(230, '2019-12-25 08:30:05 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(231, '2019-12-25 08:30:05 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(232, '2019-12-25 08:30:16 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(233, '2019-12-25 08:30:16 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(234, '2019-12-25 08:30:17 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(235, '2019-12-25 08:30:32 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(236, '2019-12-25 08:30:32 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(237, '2019-12-25 08:30:32 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(238, '2019-12-25 08:30:37 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(239, '2019-12-25 08:30:37 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(240, '2019-12-25 08:30:37 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(241, '2019-12-25 08:30:48 AM', 'Update', 'Updated weekly hours for 00005-B.', 'http://localhost/ci_wercher_system/Clients'),
(242, '2019-12-25 08:30:48 AM', 'Update', 'Updated weekly hours for 00005-B.', 'http://localhost/ci_wercher_system/Clients'),
(243, '2019-12-25 08:30:48 AM', 'Update', 'Updated weekly hours for 00005-B.', 'http://localhost/ci_wercher_system/Clients'),
(244, '2019-12-25 08:31:01 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(245, '2019-12-25 08:31:01 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(246, '2019-12-25 08:31:01 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(247, '2019-12-25 06:48:47 PM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(248, '2019-12-25 06:48:47 PM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(249, '2019-12-25 06:48:47 PM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(250, '2019-12-25 06:48:47 PM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(251, '2019-12-25 06:48:47 PM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(252, '2019-12-25 06:48:48 PM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(253, '2019-12-25 06:57:42 PM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(254, '2019-12-25 06:58:23 PM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(255, '2019-12-25 07:01:48 PM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(256, '2019-12-25 07:03:28 PM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(257, '2019-12-25 07:03:40 PM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(258, '2019-12-26 01:18:17 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(259, '2019-12-26 01:18:50 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(260, '2019-12-26 01:19:39 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(261, '2019-12-26 01:20:23 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(262, '2019-12-26 01:20:37 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(263, '2019-12-26 01:22:43 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(264, '2019-12-26 01:22:43 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(265, '2019-12-26 01:22:43 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(266, '2019-12-26 01:22:43 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(267, '2019-12-26 01:22:43 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(268, '2019-12-26 01:22:53 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(269, '2019-12-26 01:22:53 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(270, '2019-12-26 01:22:53 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(271, '2019-12-26 01:22:53 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(272, '2019-12-26 01:22:53 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(273, '2019-12-26 01:23:52 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(274, '2019-12-26 01:23:53 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(275, '2019-12-26 01:23:53 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(276, '2019-12-26 01:23:53 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(277, '2019-12-26 01:23:53 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(278, '2019-12-26 01:24:07 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(279, '2019-12-26 01:24:07 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(280, '2019-12-26 01:24:07 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(281, '2019-12-26 01:24:07 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(282, '2019-12-26 01:24:07 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(283, '2019-12-26 01:24:13 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(284, '2019-12-26 01:24:13 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(285, '2019-12-26 01:24:14 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(286, '2019-12-26 01:24:14 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(287, '2019-12-26 01:24:14 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(288, '2019-12-26 01:25:34 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(289, '2019-12-26 01:26:09 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(290, '2019-12-26 01:26:16 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(291, '2019-12-26 01:27:30 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients'),
(292, '2019-12-26 01:27:37 AM', 'Update', 'Updated weekly hours for 00003-B.', 'http://localhost/ci_wercher_system/Clients'),
(293, '2019-12-26 01:28:00 AM', 'Update', 'Updated weekly hours for 00001-B.', 'http://localhost/ci_wercher_system/Clients');

-- --------------------------------------------------------

--
-- Table structure for table `machine_operated`
--

CREATE TABLE `machine_operated` (
  `No` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `MachineName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machine_operated`
--

INSERT INTO `machine_operated` (`No`, `ApplicantID`, `MachineName`) VALUES
(1, '00007-A', 'HCHCHCHC2000'),
(3, '00008-A', 'SAMPLE'),
(9, '00001-A', '1'),
(10, '00001-A', '2'),
(11, '00001-A', '3'),
(12, '00001-A', '4'),
(13, '00001-A', '5');

-- --------------------------------------------------------

--
-- Table structure for table `relatives`
--

CREATE TABLE `relatives` (
  `No` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `Relation` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Occupation` varchar(2555) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `ClientName` varchar(255) DEFAULT NULL,
  `Violation` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acad_history`
--
ALTER TABLE `acad_history`
  ADD PRIMARY KEY (`Acad_No`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminNo`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`ApplicantNo`);

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`LogID`);

--
-- Indexes for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `contract_history`
--
ALTER TABLE `contract_history`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_No`);

--
-- Indexes for table `employment_record`
--
ALTER TABLE `employment_record`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  ADD PRIMARY KEY (`No`),
  ADD UNIQUE KEY `account_prod` (`ApplicantID`,`Time`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `machine_operated`
--
ALTER TABLE `machine_operated`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `relatives`
--
ALTER TABLE `relatives`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acad_history`
--
ALTER TABLE `acad_history`
  MODIFY `Acad_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beneficiaries`
--
ALTER TABLE `beneficiaries`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contract_history`
--
ALTER TABLE `contract_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employment_record`
--
ALTER TABLE `employment_record`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=399;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `machine_operated`
--
ALTER TABLE `machine_operated`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `relatives`
--
ALTER TABLE `relatives`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
