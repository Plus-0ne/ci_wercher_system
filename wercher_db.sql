-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2019 at 08:51 AM
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
  `ReminderType` varchar(255) DEFAULT NULL,
  `ReminderDate` varchar(255) DEFAULT NULL,
  `ReminderLocked` varchar(255) DEFAULT NULL,
  `Temp_ApplicantID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`ApplicantNo`, `ApplicantImage`, `ApplicantID`, `PositionDesired`, `SalaryExpected`, `LastName`, `FirstName`, `MiddleInitial`, `Gender`, `Age`, `Height`, `Weight`, `Religion`, `BirthDate`, `BirthPlace`, `Citizenship`, `CivilStatus`, `No_OfChildren`, `Address_Present`, `Address_Provincial`, `Address_Manila`, `Phone_No`, `SSS_No`, `EffectiveDateCoverage`, `ResidenceCertificateNo`, `Rcn_At`, `Rcn_On`, `TIN`, `TIN_At`, `TIN_On`, `HDMF`, `HDMF_At`, `HDMF_On`, `PhilHealth`, `PhilHealth_At`, `PhilHealth_On`, `ATM_No`, `Status`, `ClientEmployed`, `DateStarted`, `DateEnds`, `AppliedOn`, `ReminderType`, `ReminderDate`, `ReminderLocked`, `Temp_ApplicantID`) VALUES
(1, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f6368726f6d655f4a7179474e53314973642e6a7067, '00001-A', 'Payroll Specialist', '50000', 'Haniyasushin', 'Keiki', 'H', 'Female', '9999', '5', '5', 'Self', '150015-12-05', 'Spirit World', '12345', 'Single', '500', '11111111', '222222222', '33333333', '123456789', '111111111', '2019-12-10', '1111111', '11111111111', '2019-12-05', '22222222222', '2222222222222', '2019-12-20', '77777', '77777777', '2019-12-13', '777', '7777777', '2019-12-13', '7785645654656', 'Expired', '1', '2019-12-15 09:03:32 PM', '2019-12-17 09:03:32 PM', '2019-10-14 11:28:43 AM', NULL, NULL, NULL, NULL),
(2, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030322d412f646c6c686f73745f6f544d3551453634556c2e6a7067, '00002-A', 'Office Staff', '80000', 'Inaba', 'Tewi', 'I', 'Female', '3000', '5', '5', '5555555', '10000-05-13', 'Eientei', '151461246', 'Single', '0', 'Eientei', 'Gensokyo', '12345', '1353141', '2456245134', '2019-12-12', '23423526246', 'A', '2019-12-13', '264622343256246', 'B', '2019-12-21', '1', '2', '2019-12-06', '3', '4', '2019-12-28', '5', 'Employed', '1', '2019-12-18 04:29:38 AM', '2019-12-23 04:29:38 AM', '2019-12-14 11:28:43 AM', NULL, NULL, 'Yes', '00002-A'),
(3, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f6d6f7274792e6a7067, '00003-A', 'Office Staff', '500', 'Smith', 'Morty', 'S', 'Male', '10', '5', '5', 'Rick', '2007-12-01', 'Earth', 'Yes', 'Single', '0', '252452524', '524524524', '5245245245245', '25425245', '24525245', '2019-12-19', '245245245', '2452525245245', '2019-12-14', '245245', '24245245245245245245', '2020-01-20', '', '', '', '', '', '', NULL, 'Expired', '', '', NULL, '2019-10-14 11:28:43 AM', NULL, NULL, NULL, NULL),
(4, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030342d412f446169796f757365692e6a7067, '00004-B', 'Office Staff', '8888888', 'Test', 'Test', 'Test', 'Male', '35', '531', '135', '2352561', '2019-12-18', '13513513', '1354156', 'Widowed', '5135413', '31515135', '135135', '135135135135135', '4156135', '153515', '2019-12-10', '135135', '51351313', '0135-12-05', '13513531', '5135135', '2019-12-13', '', '', '', '', '', '', NULL, 'Employed', '1', '2019-12-18 04:42:03 AM', '2019-12-22 04:42:03 AM', '2019-09-14 11:28:43 AM', 'R_ContractDuration', '2629743', 'No', '00004-B'),
(5, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030352d412f38357662733363616577333231322e6a7067, '00005-A', 'Bookeeper', '???', 'Á???', 'Á??', 'Á????', 'Female', '500', '2', '2', '?', '2019-12-04', '??', '??', 'Single', '50', '????', '????', '?????', '500000', '?', '2019-12-19', '???', '??', '2019-12-12', '???', '?', '2019-12-28', '11', '11', '2019-12-06', '22', '22', '2019-12-21', '333', 'Expired', '', '', '2018-01-13 11:33:14 PM', '2019-12-14 11:29:13 AM', 'R_ContractDuration', '2160000', 'No', NULL),
(6, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d412f526162626974732b666f6f742b69732b737570706f7365642b746f2b62652b6c75636b792b5f36396661363033323666313237303266336135663439653766626430333239312e6a7067, '00006-C', 'Office Staff', '1111111', 'Aaa', 'Aaaaaaa', 'Aaaaaa', 'Male', '11', '11', '11', '11', '2019-12-12', '11', '12313', 'Single', '13', '123213', '32131', '32133', '1313', '123213', '2019-12-26', '1231', '1131313123', '2019-12-13', '12313', '13213123123', '2019-12-21', '', '', '', '', '', '', NULL, 'Employed', '1', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', '2019-12-02 09:09:59 AM', NULL, NULL, NULL, '00006-C'),
(7, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030372d412f6368726f6d655f567737685757644b62342e6a7067, '00007-B', 'Secretary', '90000', 'Arató', 'András', 'A', 'Male', '50', '5', '80', '111111', '2019-12-03', 'Hungary', 'z315135', 'Single', '3', 'K?szeg, Hungary', 'K?szeg, Hungary', '11111', '35735723542', '2524622753', '2019-12-31', '252462624624234', 'K?szeg', '2019-12-04', '26245234226', 'K?szeg', '2019-12-14', '111', '22222', '2019-12-12', '33333', '3444444', '2019-12-27', '5555', 'Blacklisted', '1', '2019-12-18 04:34:14 AM', '2019-12-20 04:34:14 AM', '2019-12-02 09:34:26 AM', NULL, NULL, NULL, '00007-B'),
(8, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030382d412f31363630323832305f3136313233333230343338303238385f333934343238313336383536353532393633365f6e5f2d5f436f70792e6a7067, '00008-A', 'Office Staff', '20000', 'Last Name', 'First Name', 'Middle Initial', 'Male', '1', '1', '1', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', 'Single', '1', 'SAMPLE', 'SAMPLE', 'SAMPLE', '1', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-17', 'SAMPLE', 'Deleted', '1', '2019-12-12 08:41:42 PM', '2020-02-12 08:41:42 PM', '2019-12-10 06:45:27 AM', NULL, NULL, NULL, NULL),
(9, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030392d412f446973636f72645f44646c3256366f7464432e6a7067, '00009-A', 'Office Staff', '1000', 'Kojima', 'Hideo', 'D', 'Male', '56', '2', '500', 'Yes', '1963-07-24', 'Japan', 'Japanese', 'Single', '90', 'cabacbacba', 'acaccaacbacb', 'bacbacbabaaacacb', '9999999', '543577', '2019-12-01', '357357373', 'adabbcbab', '2019-12-02', '73735735', 'acbacbacbab', '2019-12-03', '737357', 'acbcabacb', '2019-12-04', '3573737', 'acbabacbabacb', '2019-12-05', '3573575375', 'Deleted', NULL, '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', '2019-12-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(22, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-01-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(23, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-02-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(24, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-03-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(25, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-04-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(26, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-05-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(27, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-06-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(28, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-07-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(29, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-08-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(30, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-09-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(31, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-10-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(32, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-11-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(33, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-12-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(34, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303032322d412f77746969666163652e706e67, '00022-B', 'Office Staff', '35000', 'Langley', 'Richard', 'W', 'Male', '40', '5', '100', 'None', '2019-12-18', 'Jamaica', 'British', 'Single', '0', 'London', 'London', 'London', '000000000', '357935634', '2019-12-21', '135355346', 'abc53a', '2019-12-05', '72673478', 'abcdefghjikl;dfgzx', '2019-12-17', '437474128', 'abcde6c', '2019-12-13', '66345625', 'abcbcncj365gdh', '2019-12-28', '26235756378', 'Blacklisted', '4', '2019-12-18 05:14:04 AM', '2019-12-19 05:14:04 AM', '2019-12-17 10:12:37 PM', NULL, NULL, NULL, '00022-B');

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
(25, '00006-B', '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', 'Some Guy');

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
(64, '2019-12-21 05:01:24 AM', 'New', 'A reminder has been set for ID 00004-B, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-B');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
