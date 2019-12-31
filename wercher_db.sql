-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 07:14 AM
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
(8, 'Level_1', 'Developer', 'Dev-0002', '$2y$10$u4Dv7PQgGdDL1I/XPar15e3bhNv4RQKN..3LD3aBKsV8DWdmHIPuu', 'Tewi', 'I', 'Inaba', 'Female', '1575271925'),
(10, 'Level_1', 'Developer', 'Dev-0003', '$2y$10$Q/Y/GmWDMrKLCOsN9Sb3te7stAKe0JbcqpsWG8yX8G6lrfkiGksvO', 'Romel', 'P', 'Cubelo', 'Male', '1576749066');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `ApplicantNo` int(11) NOT NULL,
  `ApplicantImage` blob DEFAULT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `PositionDesired` varchar(255) DEFAULT NULL,
  `PositionGroup` varchar(255) DEFAULT NULL,
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

INSERT INTO `applicants` (`ApplicantNo`, `ApplicantImage`, `ApplicantID`, `PositionDesired`, `PositionGroup`, `SalaryExpected`, `LastName`, `FirstName`, `MiddleInitial`, `Gender`, `Age`, `Height`, `Weight`, `Religion`, `BirthDate`, `BirthPlace`, `Citizenship`, `CivilStatus`, `No_OfChildren`, `Address_Present`, `Address_Provincial`, `Address_Manila`, `Phone_No`, `SSS_No`, `EffectiveDateCoverage`, `ResidenceCertificateNo`, `Rcn_At`, `Rcn_On`, `TIN`, `TIN_At`, `TIN_On`, `HDMF`, `HDMF_At`, `HDMF_On`, `PhilHealth`, `PhilHealth_At`, `PhilHealth_On`, `ATM_No`, `Status`, `ClientEmployed`, `DateStarted`, `DateEnds`, `AppliedOn`, `ReminderType`, `ReminderDate`, `ReminderLocked`, `Temp_ApplicantID`) VALUES
(1, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f6368726f6d655f4a7179474e53314973642e6a7067, '00001-A', 'Payroll Specialist', NULL, '50000', 'Haniyasushin', 'Keiki', 'H', 'Female', '9999', '5', '5', 'Self', '150015-12-05', 'Spirit World', '12345', 'Single', '500', '11111111', '222222222', '33333333', '123456789', '111111111', '2019-12-10', '1111111', '11111111111', '2019-12-05', '22222222222', '2222222222222', '2019-12-20', '77777', '77777777', '2019-12-13', '777', '7777777', '2019-12-13', '7785645654656', 'Expired', '1', '2019-12-15 09:03:32 PM', '2019-12-17 09:03:32 PM', '2019-10-14 11:28:43 AM', NULL, NULL, NULL, NULL),
(2, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030322d412f646c6c686f73745f6f544d3551453634556c2e6a7067, '00002-A', 'Office Staff', NULL, '80000', 'Inaba', 'Tewi', 'I', 'Female', '3000', '5', '5', '5555555', '10000-05-13', 'Eientei', '151461246', 'Single', '0', 'Eientei', 'Gensokyo', '12345', '1353141', '2456245134', '2019-12-12', '23423526246', 'A', '2019-12-13', '264622343256246', 'B', '2019-12-21', '1', '2', '2019-12-06', '3', '4', '2019-12-28', '5', 'Expired', '', '', '2019-12-23 04:29:38 AM', '2019-12-14 11:28:43 AM', '', '', 'No', '00002-A'),
(3, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f6d6f7274792e6a7067, '00003-A', 'Office Staff', NULL, '500', 'Smith', 'Morty', 'S', 'Male', '10', '5', '5', 'Rick', '2007-12-01', 'Earth', 'Yes', 'Single', '0', '252452524', '524524524', '5245245245245', '25425245', '24525245', '2019-12-19', '245245245', '2452525245245', '2019-12-14', '245245', '24245245245245245245', '2020-01-20', '', '', '', '', '', '', NULL, 'Expired', '', '', NULL, '2019-10-14 11:28:43 AM', NULL, NULL, NULL, NULL),
(4, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030342d412f446169796f757365692e6a7067, '00004-B', 'Office Staff', NULL, '8888888', 'Test', 'Test', 'Test', 'Male', '35', '531', '135', '2352561', '2019-12-18', '13513513', '1354156', 'Widowed', '5135413', '31515135', '135135', '135135135135135', '4156135', '153515', '2019-12-10', '135135', '51351313', '0135-12-05', '13513531', '5135135', '2019-12-13', '', '', '', '', '', '', NULL, 'Expired', '', '', '2019-12-22 04:42:03 AM', '2019-09-14 11:28:43 AM', '', '', 'No', '00004-B'),
(5, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030352d412f38357662733363616577333231322e6a7067, '00005-A', 'Bookeeper', NULL, '???', 'Á???', 'Á??', 'Á????', 'Female', '500', '2', '2', '?', '2019-12-04', '??', '??', 'Single', '50', '????', '????', '?????', '500000', '?', '2019-12-19', '???', '??', '2019-12-12', '???', '?', '2019-12-28', '11', '11', '2019-12-06', '22', '22', '2019-12-21', '333', 'Expired', '', '', '2018-01-13 11:33:14 PM', '2019-12-14 11:29:13 AM', 'R_ContractDuration', '2160000', 'No', NULL),
(6, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d412f526162626974732b666f6f742b69732b737570706f7365642b746f2b62652b6c75636b792b5f36396661363033323666313237303266336135663439653766626430333239312e6a7067, '00006-C', 'Office Staff', NULL, '1111111', 'Aaa', 'Aaaaaaa', 'Aaaaaa', 'Male', '11', '11', '11', '11', '2019-12-12', '11', '12313', 'Single', '13', '123213', '32131', '32133', '1313', '123213', '2019-12-26', '1231', '1131313123', '2019-12-13', '12313', '13213123123', '2019-12-21', '', '', '', '', '', '', NULL, 'Employed', '1', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', '2019-12-02 09:09:59 AM', NULL, NULL, NULL, '00006-C'),
(7, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030372d412f6368726f6d655f567737685757644b62342e6a7067, '00007-B', 'Secretary', NULL, '90000', 'Arató', 'András', 'A', 'Male', '50', '5', '80', '111111', '2019-12-03', 'Hungary', 'z315135', 'Single', '3', 'K?szeg, Hungary', 'K?szeg, Hungary', '11111', '35735723542', '2524622753', '2019-12-31', '252462624624234', 'K?szeg', '2019-12-04', '26245234226', 'K?szeg', '2019-12-14', '111', '22222', '2019-12-12', '33333', '3444444', '2019-12-27', '5555', 'Blacklisted', '1', '2019-12-18 04:34:14 AM', '2019-12-20 04:34:14 AM', '2019-12-02 09:34:26 AM', NULL, NULL, NULL, '00007-B'),
(8, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030382d412f31363630323832305f3136313233333230343338303238385f333934343238313336383536353532393633365f6e5f2d5f436f70792e6a7067, '00008-A', 'Office Staff', NULL, '20000', 'Last Name', 'First Name', 'Middle Initial', 'Male', '1', '1', '1', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', 'Single', '1', 'SAMPLE', 'SAMPLE', 'SAMPLE', '1', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-17', 'SAMPLE', 'Deleted', '1', '2019-12-12 08:41:42 PM', '2020-02-12 08:41:42 PM', '2019-12-10 06:45:27 AM', NULL, NULL, NULL, NULL),
(9, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030392d412f446973636f72645f44646c3256366f7464432e6a7067, '00009-A', 'Office Staff', NULL, '1000', 'Kojima', 'Hideo', 'D', 'Male', '56', '2', '500', 'Yes', '1963-07-24', 'Japan', 'Japanese', 'Single', '90', 'cabacbacba', 'acaccaacbacb', 'bacbacbabaaacacb', '9999999', '543577', '2019-12-01', '357357373', 'adabbcbab', '2019-12-02', '73735735', 'acbacbacbab', '2019-12-03', '737357', 'acbcabacb', '2019-12-04', '3573737', 'acbabacbabacb', '2019-12-05', '3573575375', 'Deleted', NULL, '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', '2019-12-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(22, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-01-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(23, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-02-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(24, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-03-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(25, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-04-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(26, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-05-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(27, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-06-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(28, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-07-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(29, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-08-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(30, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-09-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(31, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-10-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(32, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-11-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(33, NULL, NULL, 'DUMMY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'DUMMY', NULL, NULL, NULL, '2019-12-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(34, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303032322d412f77746969666163652e706e67, '00022-B', 'Office Staff', NULL, '35000', 'Langley', 'Richard', 'W', 'Male', '40', '5', '100', 'None', '2019-12-18', 'Jamaica', 'British', 'Single', '0', 'London', 'London', 'London', '000000000', '357935634', '2019-12-21', '135355346', 'abc53a', '2019-12-05', '72673478', 'abcdefghjikl;dfgzx', '2019-12-17', '437474128', 'abcde6c', '2019-12-13', '66345625', 'abcbcncj365gdh', '2019-12-28', '26235756378', 'Blacklisted', '4', '2019-12-18 05:14:04 AM', '2019-12-19 05:14:04 AM', '2019-12-17 10:12:37 PM', NULL, NULL, NULL, '00022-B'),
(35, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303032332d412f6368726f6d655f6a4b384d4d32785652522e6a7067, '00023-A', 'AaaAAAAAAAAA', 'TEST GROUP 3', 'zdy34616', 'Elbertson', 'Jeremy', 'E', 'Male', '34', '4', '1000', 'Jerma', '2019-09-22', 'US of A', 'A', 'Single', '0', '13515', '1515', '13513513513', '1513515315135315', '135135515', '2019-12-05', '135515', '1351353', '2019-12-13', '153513', '5135353', '2019-12-20', '535135', '335135', '2020-01-04', '153515', '1351355', '2019-12-18', '13513535', 'Applicant', NULL, NULL, NULL, '2019-12-27 12:29:43 PM', NULL, NULL, NULL, NULL);

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
(26, '00002-A', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', 'Some Guy'),
(27, '00004-B', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', 'Some Guy');

-- --------------------------------------------------------

--
-- Table structure for table `dummy_hours`
--

CREATE TABLE `dummy_hours` (
  `ID` int(11) NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dummy_hours`
--

INSERT INTO `dummy_hours` (`ID`, `Time`, `Type`, `Current`) VALUES
(5295, '2019-12-13', 'Regular', 'Current'),
(5296, '2019-12-14', 'Regular', 'Current'),
(5297, '2019-12-15', 'Regular', 'Current'),
(5298, '2019-12-16', 'Regular', 'Current'),
(5299, '2019-12-17', 'Regular', 'Current'),
(5300, '2019-12-18', 'Regular', 'Current'),
(5301, '2019-12-19', 'Regular', 'Current'),
(5302, '2019-12-20', 'Regular', 'Current'),
(5303, '2019-12-21', 'Regular', 'Current'),
(5304, '2019-12-22', 'Regular', 'Current'),
(5305, '2019-12-23', 'Regular', 'Current'),
(5306, '2019-12-24', 'Special', 'Current'),
(5307, '2019-12-25', 'Holiday', 'Current'),
(5308, '2019-12-26', 'Regular', 'Current'),
(5309, '2019-12-27', 'Regular', 'Current'),
(5310, '2019-12-28', 'Regular', 'Current'),
(5311, '2019-12-29', 'Regular', 'Current'),
(5312, '2019-12-30', 'Holiday', 'Current'),
(5313, '2019-12-31', 'Special', 'Current'),
(5314, '2020-01-01', 'Holiday', 'Current'),
(5315, '2020-01-02', 'Regular', 'Current'),
(5316, '2020-01-03', 'Regular', 'Current'),
(5317, '2020-01-04', 'Regular', 'Current'),
(5318, '2020-01-05', 'Regular', 'Current'),
(5319, '2020-01-06', 'Regular', 'Current'),
(5320, '2020-01-07', 'Regular', 'Current'),
(5321, '2020-01-08', 'Regular', 'Current'),
(5322, '2020-01-09', 'Regular', 'Current'),
(5323, '2020-01-10', 'Regular', 'Current'),
(5324, '2020-01-11', 'Regular', 'Current'),
(5325, '2020-01-12', 'Regular', 'Current'),
(5326, '2020-01-13', 'Regular', 'Current'),
(5327, '2020-01-14', 'Regular', 'Current'),
(5328, '2020-01-15', 'Regular', 'Current'),
(5329, '2020-01-16', 'Regular', 'Current'),
(5330, '2020-01-17', 'Regular', 'Current'),
(5331, '2020-01-18', 'Regular', 'Current'),
(5332, '2020-01-19', 'Regular', 'Current'),
(5333, '2020-01-20', 'Regular', 'Current'),
(5334, '2020-01-21', 'Regular', 'Current'),
(5335, '2020-01-22', 'Regular', 'Current'),
(5336, '2020-01-23', 'Regular', 'Current'),
(5337, '2020-01-24', 'Regular', 'Current'),
(5338, '2020-01-25', 'Special', 'Current'),
(5339, '2020-01-26', 'Regular', 'Current'),
(5340, '2020-01-27', 'Regular', 'Current'),
(5341, '2020-01-28', 'Regular', 'Current'),
(5342, '2020-01-29', 'Regular', 'Current'),
(5343, '2020-01-30', 'Regular', 'Current'),
(5344, '2020-01-31', 'Regular', 'Current'),
(5345, '2020-02-01', 'Regular', 'Current'),
(5346, '2020-02-02', 'Regular', 'Current'),
(5347, '2020-02-03', 'Regular', 'Current'),
(5348, '2020-02-04', 'Regular', 'Current'),
(5349, '2020-02-05', 'Regular', 'Current');

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
  `No` int(25) NOT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Regular` varchar(255) DEFAULT NULL,
  `Overtime` varchar(255) DEFAULT NULL,
  `NightShift` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hours_weekly`
--

INSERT INTO `hours_weekly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Time`, `Regular`, `Overtime`, `NightShift`, `Type`, `Current`) VALUES
(1, '1', '00001-B', 'Haniyasushin, Keiki H.', '50000', NULL, NULL, NULL, NULL, NULL, NULL),
(2, '1', '00005-B', 'Á???, Á?? Á????.', '???', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '1', '00003-B', 'Smith, Morty S.', '500', NULL, NULL, NULL, NULL, NULL, NULL),
(12027, '', '00002-A', NULL, NULL, '2019-12-13', '1', NULL, NULL, 'Rest Day', NULL),
(12028, '', '00002-A', NULL, NULL, '2019-12-14', '0', NULL, NULL, NULL, NULL),
(12029, '', '00002-A', NULL, NULL, '2019-12-15', '0', NULL, NULL, NULL, NULL),
(12030, '', '00002-A', NULL, NULL, '2019-12-16', '0', NULL, NULL, NULL, NULL),
(12031, '', '00002-A', NULL, NULL, '2019-12-17', '0', NULL, NULL, NULL, NULL),
(12032, '', '00002-A', NULL, NULL, '2019-12-18', '0', NULL, NULL, NULL, NULL),
(12033, '', '00002-A', NULL, NULL, '2019-12-19', '0', NULL, NULL, NULL, NULL),
(13433, '1', '00006-C', NULL, NULL, '2019-12-32', '23', NULL, NULL, 'Rest Day', NULL),
(13434, '1', '00006-C', NULL, NULL, '2019-12-33', '3', NULL, NULL, NULL, NULL),
(13435, '1', '00006-C', NULL, NULL, '2019-12-34', '1', NULL, NULL, NULL, NULL),
(13436, '1', '00006-C', NULL, NULL, '2019-12-35', '23', NULL, NULL, NULL, NULL),
(13437, '1', '00006-C', NULL, NULL, '2019-12-36', '3', NULL, NULL, NULL, NULL),
(13438, '1', '00006-C', NULL, NULL, '2019-12-37', '1', NULL, NULL, NULL, NULL),
(13439, '1', '00006-C', NULL, NULL, '2019-12-38', '23', NULL, NULL, NULL, NULL),
(13440, '1', '00006-C', NULL, NULL, '2019-12-39', '3', NULL, NULL, NULL, NULL),
(13441, '1', '00006-C', NULL, NULL, '2019-12-40', '1', NULL, NULL, NULL, NULL),
(13442, '1', '00006-C', NULL, NULL, '2019-12-41', '23', NULL, NULL, NULL, NULL),
(13443, '1', '00006-C', NULL, NULL, '2019-12-42', '3', NULL, NULL, NULL, NULL),
(13444, '1', '00006-C', NULL, NULL, '2019-12-43', '1', NULL, NULL, NULL, NULL),
(13445, '1', '00006-C', NULL, NULL, '2019-12-44', '23', NULL, NULL, NULL, NULL),
(13446, '1', '00006-C', NULL, NULL, '2019-12-45', '3', NULL, NULL, NULL, NULL),
(13447, '1', '00006-C', NULL, NULL, '2019-12-46', '1', NULL, NULL, NULL, NULL),
(13448, '1', '00006-C', NULL, NULL, '2019-12-47', '23', NULL, NULL, NULL, NULL),
(13449, '1', '00006-C', NULL, NULL, '2019-12-48', '3', NULL, NULL, NULL, NULL),
(13450, '1', '00006-C', NULL, NULL, '2019-12-49', '1', NULL, NULL, NULL, NULL),
(13451, '1', '00006-C', NULL, NULL, '2019-12-50', '23', NULL, NULL, NULL, NULL),
(13452, '1', '00006-C', NULL, NULL, '2019-12-51', '3', NULL, NULL, NULL, NULL),
(13453, '1', '00006-C', NULL, NULL, '2019-12-52', '1', NULL, NULL, NULL, NULL),
(13454, '1', '00006-C', NULL, NULL, '2019-12-53', '23', NULL, NULL, NULL, NULL),
(13455, '1', '00006-C', NULL, NULL, '2019-12-54', '3', NULL, NULL, NULL, NULL),
(13456, '1', '00006-C', NULL, NULL, '2019-12-55', '1', NULL, NULL, NULL, NULL),
(13457, '1', '00006-C', NULL, NULL, '2019-12-56', '23', NULL, NULL, NULL, NULL),
(13458, '1', '00006-C', NULL, NULL, '2019-12-57', '3', NULL, NULL, NULL, NULL),
(13459, '1', '00006-C', NULL, NULL, '2019-12-58', '1', NULL, NULL, NULL, NULL),
(13460, '1', '00006-C', NULL, NULL, '2019-12-59', '23', NULL, NULL, NULL, NULL),
(13461, '1', '00006-C', NULL, NULL, '2019-12-60', '3', NULL, NULL, NULL, NULL),
(13462, '1', '00006-C', NULL, NULL, '2019-12-61', '1', NULL, NULL, NULL, NULL),
(13463, '1', '00006-C', NULL, NULL, '2019-12-62', '23', NULL, NULL, NULL, NULL),
(13464, '1', '00006-C', NULL, NULL, '2019-12-63', '3', NULL, NULL, NULL, NULL),
(13465, '1', '00006-C', NULL, NULL, '2019-12-64', '1', NULL, NULL, NULL, NULL),
(13466, '1', '00006-C', NULL, NULL, '2019-12-65', '23', NULL, NULL, NULL, NULL),
(13467, '1', '00006-C', NULL, NULL, '2019-12-66', '3', NULL, NULL, NULL, NULL),
(13468, '1', '00006-C', NULL, NULL, '2019-12-67', '1', NULL, NULL, NULL, NULL),
(13469, '1', '00006-C', NULL, NULL, '2019-12-68', '23', NULL, NULL, NULL, NULL),
(13470, '1', '00006-C', NULL, NULL, '2019-12-69', '3', NULL, NULL, NULL, NULL),
(13471, '1', '00006-C', NULL, NULL, '2019-12-70', '1', NULL, NULL, NULL, NULL),
(13472, '1', '00006-C', NULL, NULL, '2019-12-71', '23', NULL, NULL, NULL, NULL),
(13473, '1', '00006-C', NULL, NULL, '2019-12-72', '3', NULL, NULL, NULL, NULL),
(13474, '1', '00006-C', NULL, NULL, '2019-12-73', '1', NULL, NULL, NULL, NULL),
(13475, '1', '00006-C', NULL, NULL, '2019-12-74', '23', NULL, NULL, NULL, NULL),
(13476, '1', '00006-C', NULL, NULL, '2019-12-75', '3', NULL, NULL, NULL, NULL),
(13477, '1', '00006-C', NULL, NULL, '2019-12-76', '1', NULL, NULL, NULL, NULL),
(13478, '1', '00006-C', NULL, NULL, '2019-12-77', '23', NULL, NULL, NULL, NULL),
(13479, '1', '00006-C', NULL, NULL, '2019-12-78', '3', NULL, NULL, NULL, NULL),
(13480, '1', '00006-C', NULL, NULL, '2019-12-79', '1', NULL, NULL, NULL, NULL),
(13481, '1', '00006-C', NULL, NULL, '2019-12-80', '23', NULL, NULL, NULL, NULL),
(13482, '1', '00006-C', NULL, NULL, '2019-12-81', '3', NULL, NULL, NULL, NULL),
(13483, '1', '00006-C', NULL, NULL, '2019-12-82', '1', NULL, NULL, NULL, NULL),
(13484, '1', '00006-C', NULL, NULL, '2019-12-83', '23', NULL, NULL, NULL, NULL),
(13504, '1', '00007-B', NULL, NULL, '2019-12-32', '0', NULL, NULL, NULL, NULL),
(13505, '1', '00007-B', NULL, NULL, '2019-12-33', '0', NULL, NULL, NULL, NULL),
(13506, '1', '00007-B', NULL, NULL, '2019-12-34', '4', NULL, NULL, NULL, NULL),
(13507, '1', '00007-B', NULL, NULL, '2019-12-35', '0', NULL, NULL, NULL, NULL),
(13508, '1', '00007-B', NULL, NULL, '2019-12-36', '0', NULL, NULL, NULL, NULL),
(13509, '1', '00007-B', NULL, NULL, '2019-12-37', '4', NULL, NULL, NULL, NULL),
(13510, '1', '00007-B', NULL, NULL, '2019-12-38', '0', NULL, NULL, NULL, NULL),
(13511, '1', '00007-B', NULL, NULL, '2019-12-39', '0', NULL, NULL, NULL, NULL),
(13512, '1', '00007-B', NULL, NULL, '2019-12-40', '4', NULL, NULL, NULL, NULL),
(13513, '1', '00007-B', NULL, NULL, '2019-12-41', '0', NULL, NULL, NULL, NULL),
(13514, '1', '00007-B', NULL, NULL, '2019-12-42', '0', NULL, NULL, NULL, NULL),
(13515, '1', '00007-B', NULL, NULL, '2019-12-43', '4', NULL, NULL, NULL, NULL),
(13516, '1', '00007-B', NULL, NULL, '2019-12-44', '0', NULL, NULL, NULL, NULL),
(13517, '1', '00007-B', NULL, NULL, '2019-12-45', '0', NULL, NULL, NULL, NULL),
(13518, '1', '00007-B', NULL, NULL, '2019-12-46', '4', NULL, NULL, NULL, NULL),
(13519, '1', '00007-B', NULL, NULL, '2019-12-47', '0', NULL, NULL, NULL, NULL),
(13520, '1', '00007-B', NULL, NULL, '2019-12-48', '0', NULL, NULL, NULL, NULL),
(13521, '1', '00007-B', NULL, NULL, '2019-12-49', '4', NULL, NULL, NULL, NULL),
(13522, '1', '00007-B', NULL, NULL, '2019-12-50', '0', NULL, NULL, NULL, NULL),
(13523, '1', '00007-B', NULL, NULL, '2019-12-51', '0', NULL, NULL, NULL, NULL),
(13524, '1', '00007-B', NULL, NULL, '2019-12-52', '4', NULL, NULL, NULL, NULL),
(13525, '1', '00007-B', NULL, NULL, '2019-12-53', '0', NULL, NULL, NULL, NULL),
(13526, '1', '00007-B', NULL, NULL, '2019-12-54', '0', NULL, NULL, NULL, NULL),
(13527, '1', '00007-B', NULL, NULL, '2019-12-55', '4', NULL, NULL, NULL, NULL),
(13528, '1', '00007-B', NULL, NULL, '2019-12-56', '0', NULL, NULL, NULL, NULL),
(13529, '1', '00007-B', NULL, NULL, '2019-12-57', '0', NULL, NULL, NULL, NULL),
(13530, '1', '00007-B', NULL, NULL, '2019-12-58', '4', NULL, NULL, NULL, NULL),
(13531, '1', '00007-B', NULL, NULL, '2019-12-59', '0', NULL, NULL, NULL, NULL),
(13532, '1', '00007-B', NULL, NULL, '2019-12-60', '0', NULL, NULL, NULL, NULL),
(13533, '1', '00007-B', NULL, NULL, '2019-12-61', '4', NULL, NULL, NULL, NULL),
(13534, '1', '00007-B', NULL, NULL, '2019-12-62', '0', NULL, NULL, NULL, NULL),
(13535, '1', '00007-B', NULL, NULL, '2019-12-63', '0', NULL, NULL, NULL, NULL),
(13536, '1', '00007-B', NULL, NULL, '2019-12-64', '4', NULL, NULL, NULL, NULL),
(13537, '1', '00007-B', NULL, NULL, '2019-12-65', '0', NULL, NULL, NULL, NULL),
(13538, '1', '00007-B', NULL, NULL, '2019-12-66', '0', NULL, NULL, NULL, NULL),
(13539, '1', '00007-B', NULL, NULL, '2019-12-67', '4', NULL, NULL, NULL, NULL),
(13540, '1', '00007-B', NULL, NULL, '2019-12-68', '0', NULL, NULL, NULL, NULL),
(13541, '1', '00007-B', NULL, NULL, '2019-12-69', '0', NULL, NULL, NULL, NULL),
(13542, '1', '00007-B', NULL, NULL, '2019-12-70', '4', NULL, NULL, NULL, NULL),
(13543, '1', '00007-B', NULL, NULL, '2019-12-71', '0', NULL, NULL, NULL, NULL),
(13544, '1', '00007-B', NULL, NULL, '2019-12-72', '0', NULL, NULL, NULL, NULL),
(13545, '1', '00007-B', NULL, NULL, '2019-12-73', '4', NULL, NULL, NULL, NULL),
(13546, '1', '00007-B', NULL, NULL, '2019-12-74', '0', NULL, NULL, NULL, NULL),
(13547, '1', '00007-B', NULL, NULL, '2019-12-75', '0', NULL, NULL, NULL, NULL),
(13548, '1', '00007-B', NULL, NULL, '2019-12-76', '4', NULL, NULL, NULL, NULL),
(13549, '1', '00007-B', NULL, NULL, '2019-12-77', '0', NULL, NULL, NULL, NULL),
(13550, '1', '00007-B', NULL, NULL, '2019-12-78', '0', NULL, NULL, NULL, NULL),
(13551, '1', '00007-B', NULL, NULL, '2019-12-79', '4', NULL, NULL, NULL, NULL),
(13552, '1', '00007-B', NULL, NULL, '2019-12-80', '0', NULL, NULL, NULL, NULL),
(13553, '1', '00007-B', NULL, NULL, '2019-12-81', '0', NULL, NULL, NULL, NULL),
(13554, '1', '00007-B', NULL, NULL, '2019-12-82', '4', NULL, NULL, NULL, NULL),
(13555, '1', '00007-B', NULL, NULL, '2019-12-83', '0', NULL, NULL, NULL, NULL),
(13575, '1', '00001-A', NULL, NULL, '2019-12-32', '5', NULL, NULL, NULL, NULL),
(13576, '1', '00001-A', NULL, NULL, '2019-12-33', '0', NULL, NULL, NULL, NULL),
(13577, '1', '00001-A', NULL, NULL, '2019-12-34', '0', NULL, NULL, NULL, NULL),
(13578, '1', '00001-A', NULL, NULL, '2019-12-35', '5', NULL, NULL, NULL, NULL),
(13579, '1', '00001-A', NULL, NULL, '2019-12-36', '0', NULL, NULL, NULL, NULL),
(13580, '1', '00001-A', NULL, NULL, '2019-12-37', '0', NULL, NULL, NULL, NULL),
(13581, '1', '00001-A', NULL, NULL, '2019-12-38', '5', NULL, NULL, NULL, NULL),
(13582, '1', '00001-A', NULL, NULL, '2019-12-39', '0', NULL, NULL, NULL, NULL),
(13583, '1', '00001-A', NULL, NULL, '2019-12-40', '0', NULL, NULL, NULL, NULL),
(13584, '1', '00001-A', NULL, NULL, '2019-12-41', '5', NULL, NULL, NULL, NULL),
(13585, '1', '00001-A', NULL, NULL, '2019-12-42', '0', NULL, NULL, NULL, NULL),
(13586, '1', '00001-A', NULL, NULL, '2019-12-43', '0', NULL, NULL, NULL, NULL),
(13587, '1', '00001-A', NULL, NULL, '2019-12-44', '5', NULL, NULL, NULL, NULL),
(13588, '1', '00001-A', NULL, NULL, '2019-12-45', '0', NULL, NULL, NULL, NULL),
(13589, '1', '00001-A', NULL, NULL, '2019-12-46', '0', NULL, NULL, NULL, NULL),
(13590, '1', '00001-A', NULL, NULL, '2019-12-47', '5', NULL, NULL, NULL, NULL),
(13591, '1', '00001-A', NULL, NULL, '2019-12-48', '0', NULL, NULL, NULL, NULL),
(13592, '1', '00001-A', NULL, NULL, '2019-12-49', '0', NULL, NULL, NULL, NULL),
(13593, '1', '00001-A', NULL, NULL, '2019-12-50', '5', NULL, NULL, NULL, NULL),
(13594, '1', '00001-A', NULL, NULL, '2019-12-51', '0', NULL, NULL, NULL, NULL),
(13595, '1', '00001-A', NULL, NULL, '2019-12-52', '0', NULL, NULL, NULL, NULL),
(13596, '1', '00001-A', NULL, NULL, '2019-12-53', '5', NULL, NULL, NULL, NULL),
(13597, '1', '00001-A', NULL, NULL, '2019-12-54', '0', NULL, NULL, NULL, NULL),
(13598, '1', '00001-A', NULL, NULL, '2019-12-55', '0', NULL, NULL, NULL, NULL),
(13599, '1', '00001-A', NULL, NULL, '2019-12-56', '5', NULL, NULL, NULL, NULL),
(13600, '1', '00001-A', NULL, NULL, '2019-12-57', '0', NULL, NULL, NULL, NULL),
(13601, '1', '00001-A', NULL, NULL, '2019-12-58', '0', NULL, NULL, NULL, NULL),
(13602, '1', '00001-A', NULL, NULL, '2019-12-59', '5', NULL, NULL, NULL, NULL),
(13603, '1', '00001-A', NULL, NULL, '2019-12-60', '0', NULL, NULL, NULL, NULL),
(13604, '1', '00001-A', NULL, NULL, '2019-12-61', '0', NULL, NULL, NULL, NULL),
(13605, '1', '00001-A', NULL, NULL, '2019-12-62', '5', NULL, NULL, NULL, NULL),
(13606, '1', '00001-A', NULL, NULL, '2019-12-63', '0', NULL, NULL, NULL, NULL),
(13607, '1', '00001-A', NULL, NULL, '2019-12-64', '0', NULL, NULL, NULL, NULL),
(13608, '1', '00001-A', NULL, NULL, '2019-12-65', '5', NULL, NULL, NULL, NULL),
(13609, '1', '00001-A', NULL, NULL, '2019-12-66', '0', NULL, NULL, NULL, NULL),
(13610, '1', '00001-A', NULL, NULL, '2019-12-67', '0', NULL, NULL, NULL, NULL),
(13611, '1', '00001-A', NULL, NULL, '2019-12-68', '5', NULL, NULL, NULL, NULL),
(13612, '1', '00001-A', NULL, NULL, '2019-12-69', '0', NULL, NULL, NULL, NULL),
(13613, '1', '00001-A', NULL, NULL, '2019-12-70', '0', NULL, NULL, NULL, NULL),
(13614, '1', '00001-A', NULL, NULL, '2019-12-71', '5', NULL, NULL, NULL, NULL),
(13615, '1', '00001-A', NULL, NULL, '2019-12-72', '0', NULL, NULL, NULL, NULL),
(13616, '1', '00001-A', NULL, NULL, '2019-12-73', '0', NULL, NULL, NULL, NULL),
(13617, '1', '00001-A', NULL, NULL, '2019-12-74', '5', NULL, NULL, NULL, NULL),
(13618, '1', '00001-A', NULL, NULL, '2019-12-75', '0', NULL, NULL, NULL, NULL),
(13619, '1', '00001-A', NULL, NULL, '2019-12-76', '0', NULL, NULL, NULL, NULL),
(13620, '1', '00001-A', NULL, NULL, '2019-12-77', '5', NULL, NULL, NULL, NULL),
(13621, '1', '00001-A', NULL, NULL, '2019-12-78', '0', NULL, NULL, NULL, NULL),
(13622, '1', '00001-A', NULL, NULL, '2019-12-79', '0', NULL, NULL, NULL, NULL),
(13623, '1', '00001-A', NULL, NULL, '2019-12-80', '5', NULL, NULL, NULL, NULL),
(13624, '1', '00001-A', NULL, NULL, '2019-12-81', '0', NULL, NULL, NULL, NULL),
(13625, '1', '00001-A', NULL, NULL, '2019-12-82', '0', NULL, NULL, NULL, NULL),
(13626, '1', '00001-A', NULL, NULL, '2019-12-83', '5', NULL, NULL, NULL, NULL),
(13646, '1', '00008-A', NULL, NULL, '2019-12-32', '0', NULL, NULL, NULL, NULL),
(13647, '1', '00008-A', NULL, NULL, '2019-12-33', '6', NULL, NULL, NULL, NULL),
(13648, '1', '00008-A', NULL, NULL, '2019-12-34', '0', NULL, NULL, NULL, NULL),
(13649, '1', '00008-A', NULL, NULL, '2019-12-35', '0', NULL, NULL, NULL, NULL),
(13650, '1', '00008-A', NULL, NULL, '2019-12-36', '6', NULL, NULL, NULL, NULL),
(13651, '1', '00008-A', NULL, NULL, '2019-12-37', '0', NULL, NULL, NULL, NULL),
(13652, '1', '00008-A', NULL, NULL, '2019-12-38', '0', NULL, NULL, NULL, NULL),
(13653, '1', '00008-A', NULL, NULL, '2019-12-39', '6', NULL, NULL, NULL, NULL),
(13654, '1', '00008-A', NULL, NULL, '2019-12-40', '0', NULL, NULL, NULL, NULL),
(13655, '1', '00008-A', NULL, NULL, '2019-12-41', '0', NULL, NULL, NULL, NULL),
(13656, '1', '00008-A', NULL, NULL, '2019-12-42', '6', NULL, NULL, NULL, NULL),
(13657, '1', '00008-A', NULL, NULL, '2019-12-43', '0', NULL, NULL, NULL, NULL),
(13658, '1', '00008-A', NULL, NULL, '2019-12-44', '0', NULL, NULL, NULL, NULL),
(13659, '1', '00008-A', NULL, NULL, '2019-12-45', '6', NULL, NULL, NULL, NULL),
(13660, '1', '00008-A', NULL, NULL, '2019-12-46', '0', NULL, NULL, NULL, NULL),
(13661, '1', '00008-A', NULL, NULL, '2019-12-47', '0', NULL, NULL, NULL, NULL),
(13662, '1', '00008-A', NULL, NULL, '2019-12-48', '6', NULL, NULL, NULL, NULL),
(13663, '1', '00008-A', NULL, NULL, '2019-12-49', '0', NULL, NULL, NULL, NULL),
(13664, '1', '00008-A', NULL, NULL, '2019-12-50', '0', NULL, NULL, NULL, NULL),
(13665, '1', '00008-A', NULL, NULL, '2019-12-51', '6', NULL, NULL, NULL, NULL),
(13666, '1', '00008-A', NULL, NULL, '2019-12-52', '0', NULL, NULL, NULL, NULL),
(13667, '1', '00008-A', NULL, NULL, '2019-12-53', '0', NULL, NULL, NULL, NULL),
(13668, '1', '00008-A', NULL, NULL, '2019-12-54', '6', NULL, NULL, NULL, NULL),
(13669, '1', '00008-A', NULL, NULL, '2019-12-55', '0', NULL, NULL, NULL, NULL),
(13670, '1', '00008-A', NULL, NULL, '2019-12-56', '0', NULL, NULL, NULL, NULL),
(13671, '1', '00008-A', NULL, NULL, '2019-12-57', '6', NULL, NULL, NULL, NULL),
(13672, '1', '00008-A', NULL, NULL, '2019-12-58', '0', NULL, NULL, NULL, NULL),
(13673, '1', '00008-A', NULL, NULL, '2019-12-59', '0', NULL, NULL, NULL, NULL),
(13674, '1', '00008-A', NULL, NULL, '2019-12-60', '6', NULL, NULL, NULL, NULL),
(13675, '1', '00008-A', NULL, NULL, '2019-12-61', '0', NULL, NULL, NULL, NULL),
(13676, '1', '00008-A', NULL, NULL, '2019-12-62', '0', NULL, NULL, NULL, NULL),
(13677, '1', '00008-A', NULL, NULL, '2019-12-63', '6', NULL, NULL, NULL, NULL),
(13678, '1', '00008-A', NULL, NULL, '2019-12-64', '0', NULL, NULL, NULL, NULL),
(13679, '1', '00008-A', NULL, NULL, '2019-12-65', '0', NULL, NULL, NULL, NULL),
(13680, '1', '00008-A', NULL, NULL, '2019-12-66', '6', NULL, NULL, NULL, NULL),
(13681, '1', '00008-A', NULL, NULL, '2019-12-67', '0', NULL, NULL, NULL, NULL),
(13682, '1', '00008-A', NULL, NULL, '2019-12-68', '0', NULL, NULL, NULL, NULL),
(13683, '1', '00008-A', NULL, NULL, '2019-12-69', '6', NULL, NULL, NULL, NULL),
(13684, '1', '00008-A', NULL, NULL, '2019-12-70', '0', NULL, NULL, NULL, NULL),
(13685, '1', '00008-A', NULL, NULL, '2019-12-71', '0', NULL, NULL, NULL, NULL),
(13686, '1', '00008-A', NULL, NULL, '2019-12-72', '6', NULL, NULL, NULL, NULL),
(13687, '1', '00008-A', NULL, NULL, '2019-12-73', '0', NULL, NULL, NULL, NULL),
(13688, '1', '00008-A', NULL, NULL, '2019-12-74', '0', NULL, NULL, NULL, NULL),
(13689, '1', '00008-A', NULL, NULL, '2019-12-75', '6', NULL, NULL, NULL, NULL),
(13690, '1', '00008-A', NULL, NULL, '2019-12-76', '0', NULL, NULL, NULL, NULL),
(13691, '1', '00008-A', NULL, NULL, '2019-12-77', '0', NULL, NULL, NULL, NULL),
(13692, '1', '00008-A', NULL, NULL, '2019-12-78', '6', NULL, NULL, NULL, NULL),
(13693, '1', '00008-A', NULL, NULL, '2019-12-79', '0', NULL, NULL, NULL, NULL),
(13694, '1', '00008-A', NULL, NULL, '2019-12-80', '0', NULL, NULL, NULL, NULL),
(13695, '1', '00008-A', NULL, NULL, '2019-12-81', '6', NULL, NULL, NULL, NULL),
(13696, '1', '00008-A', NULL, NULL, '2019-12-82', '0', NULL, NULL, NULL, NULL),
(13697, '1', '00008-A', NULL, NULL, '2019-12-83', '0', NULL, NULL, NULL, NULL),
(13701, '1', '00006-C', NULL, NULL, '2019-12-16', '1', NULL, NULL, NULL, NULL),
(13702, '1', '00006-C', NULL, NULL, '2019-12-17', '23', NULL, NULL, NULL, NULL),
(13703, '1', '00006-C', NULL, NULL, '2019-12-18', '3', NULL, NULL, NULL, NULL),
(13704, '1', '00006-C', NULL, NULL, '2019-12-19', '1', NULL, NULL, NULL, NULL),
(13705, '1', '00006-C', NULL, NULL, '2019-12-20', '23', NULL, NULL, NULL, NULL),
(13706, '1', '00006-C', NULL, NULL, '2019-12-21', '3', NULL, NULL, NULL, NULL),
(13707, '1', '00006-C', NULL, NULL, '2019-12-22', '1', NULL, NULL, NULL, NULL),
(13708, '1', '00006-C', NULL, NULL, '2019-12-23', '23', NULL, NULL, NULL, NULL),
(13709, '1', '00006-C', NULL, NULL, '2019-12-24', '3', NULL, NULL, NULL, NULL),
(13710, '1', '00006-C', NULL, NULL, '2019-12-25', '1', NULL, NULL, NULL, NULL),
(13711, '1', '00006-C', NULL, NULL, '2019-12-26', '23', NULL, NULL, NULL, NULL),
(13712, '1', '00006-C', NULL, NULL, '2019-12-27', '3', NULL, NULL, NULL, NULL),
(13713, '1', '00006-C', NULL, NULL, '2019-12-28', '1', NULL, NULL, NULL, NULL),
(13714, '1', '00006-C', NULL, NULL, '2019-12-29', '23', NULL, NULL, NULL, NULL),
(13715, '1', '00006-C', NULL, NULL, '2019-12-30', '3', NULL, NULL, NULL, NULL),
(13716, '1', '00006-C', NULL, NULL, '2019-12-31', '1', NULL, NULL, NULL, NULL),
(13717, '1', '00006-C', NULL, NULL, '2020-01-01', '23', NULL, NULL, NULL, NULL),
(13718, '1', '00006-C', NULL, NULL, '2020-01-02', '3', NULL, NULL, NULL, NULL),
(13719, '1', '00006-C', NULL, NULL, '2020-01-03', '1', NULL, NULL, NULL, NULL),
(13720, '1', '00006-C', NULL, NULL, '2020-01-04', '23', NULL, NULL, NULL, NULL),
(13721, '1', '00006-C', NULL, NULL, '2020-01-05', '3', NULL, NULL, NULL, NULL),
(13722, '1', '00006-C', NULL, NULL, '2020-01-06', '1', NULL, NULL, NULL, NULL),
(13723, '1', '00006-C', NULL, NULL, '2020-01-07', '23', NULL, NULL, NULL, NULL),
(13724, '1', '00006-C', NULL, NULL, '2020-01-08', '3', NULL, NULL, NULL, NULL),
(13725, '1', '00006-C', NULL, NULL, '2020-01-09', '1', NULL, NULL, NULL, NULL),
(13726, '1', '00006-C', NULL, NULL, '2020-01-10', '23', NULL, NULL, NULL, NULL),
(13727, '1', '00006-C', NULL, NULL, '2020-01-11', '3', NULL, NULL, NULL, NULL),
(13728, '1', '00006-C', NULL, NULL, '2020-01-12', '1', NULL, NULL, NULL, NULL),
(13729, '1', '00006-C', NULL, NULL, '2020-01-13', '23', NULL, NULL, NULL, NULL),
(13730, '1', '00006-C', NULL, NULL, '2020-01-14', '3', NULL, NULL, NULL, NULL),
(13731, '1', '00006-C', NULL, NULL, '2020-01-15', '1', NULL, NULL, NULL, NULL),
(13732, '1', '00006-C', NULL, NULL, '2020-01-16', '23', NULL, NULL, NULL, NULL),
(13733, '1', '00006-C', NULL, NULL, '2020-01-17', '3', NULL, NULL, NULL, NULL),
(13734, '1', '00006-C', NULL, NULL, '2020-01-18', '1', NULL, NULL, NULL, NULL),
(13735, '1', '00006-C', NULL, NULL, '2020-01-19', '23', NULL, NULL, NULL, NULL),
(13736, '1', '00006-C', NULL, NULL, '2020-01-20', '3', NULL, NULL, NULL, NULL),
(13737, '1', '00006-C', NULL, NULL, '2020-01-21', '1', NULL, NULL, NULL, NULL),
(13738, '1', '00006-C', NULL, NULL, '2020-01-22', '23', NULL, NULL, NULL, NULL),
(13739, '1', '00006-C', NULL, NULL, '2020-01-23', '3', NULL, NULL, NULL, NULL),
(13740, '1', '00006-C', NULL, NULL, '2020-01-24', '1', NULL, NULL, NULL, NULL),
(13741, '1', '00006-C', NULL, NULL, '2020-01-25', '23', NULL, NULL, NULL, NULL),
(13742, '1', '00006-C', NULL, NULL, '2020-01-26', '3', NULL, NULL, NULL, NULL),
(13743, '1', '00006-C', NULL, NULL, '2020-01-27', '1', NULL, NULL, NULL, NULL),
(13744, '1', '00006-C', NULL, NULL, '2020-01-28', '23', NULL, NULL, NULL, NULL),
(13745, '1', '00006-C', NULL, NULL, '2020-01-29', '3', NULL, NULL, NULL, NULL),
(13746, '1', '00006-C', NULL, NULL, '2020-01-30', '1', NULL, NULL, NULL, NULL),
(13747, '1', '00006-C', NULL, NULL, '2020-01-31', '23', NULL, NULL, NULL, NULL),
(13748, '1', '00006-C', NULL, NULL, '2020-02-01', '3', NULL, NULL, NULL, NULL),
(13749, '1', '00006-C', NULL, NULL, '2020-02-02', '1', NULL, NULL, NULL, NULL),
(13750, '1', '00006-C', NULL, NULL, '2020-02-03', '23', NULL, NULL, NULL, NULL),
(13751, '1', '00006-C', NULL, NULL, '2020-02-04', '3', NULL, NULL, NULL, NULL),
(13752, '1', '00006-C', NULL, NULL, '2020-02-05', '1', NULL, NULL, NULL, NULL),
(13753, '1', '00006-C', NULL, NULL, '2020-02-06', '23', NULL, NULL, NULL, NULL),
(13754, '1', '00006-C', NULL, NULL, '2020-02-07', '3', NULL, NULL, NULL, NULL),
(13755, '1', '00006-C', NULL, NULL, '2020-02-08', '1', NULL, NULL, NULL, NULL),
(13756, '1', '00006-C', NULL, NULL, '2020-02-09', '23', NULL, NULL, NULL, NULL),
(13757, '1', '00006-C', NULL, NULL, '2020-02-10', '3', NULL, NULL, NULL, NULL),
(13758, '1', '00006-C', NULL, NULL, '2020-02-11', '1', NULL, NULL, NULL, NULL),
(13759, '1', '00006-C', NULL, NULL, '2020-02-12', '23', NULL, NULL, NULL, NULL),
(13760, '1', '00006-C', NULL, NULL, '2020-02-13', '3', NULL, NULL, NULL, NULL),
(13761, '1', '00006-C', NULL, NULL, '2020-02-14', '1', NULL, NULL, NULL, NULL),
(13762, '1', '00006-C', NULL, NULL, '2020-02-15', '23', NULL, NULL, NULL, NULL),
(13763, '1', '00006-C', NULL, NULL, '2020-02-16', '3', NULL, NULL, NULL, NULL),
(13764, '1', '00006-C', NULL, NULL, '2020-02-17', '1', NULL, NULL, NULL, NULL),
(13765, '1', '00006-C', NULL, NULL, '2020-02-18', '23', NULL, NULL, NULL, NULL),
(13766, '1', '00006-C', NULL, NULL, '2020-02-19', '3', NULL, NULL, NULL, NULL),
(13767, '1', '00006-C', NULL, NULL, '2020-02-20', '1', NULL, NULL, NULL, NULL),
(13768, '1', '00006-C', NULL, NULL, '2020-02-21', '23', NULL, NULL, NULL, NULL),
(13772, '1', '00007-B', NULL, NULL, '2019-12-16', '4', NULL, NULL, NULL, NULL),
(13773, '1', '00007-B', NULL, NULL, '2019-12-17', '0', NULL, NULL, NULL, NULL),
(13774, '1', '00007-B', NULL, NULL, '2019-12-18', '0', NULL, NULL, NULL, NULL),
(13775, '1', '00007-B', NULL, NULL, '2019-12-19', '4', NULL, NULL, NULL, NULL),
(13776, '1', '00007-B', NULL, NULL, '2019-12-20', '0', NULL, NULL, NULL, NULL),
(13777, '1', '00007-B', NULL, NULL, '2019-12-21', '0', NULL, NULL, NULL, NULL),
(13778, '1', '00007-B', NULL, NULL, '2019-12-22', '4', NULL, NULL, NULL, NULL),
(13779, '1', '00007-B', NULL, NULL, '2019-12-23', '0', NULL, NULL, NULL, NULL),
(13780, '1', '00007-B', NULL, NULL, '2019-12-24', '0', NULL, NULL, NULL, NULL),
(13781, '1', '00007-B', NULL, NULL, '2019-12-25', '4', NULL, NULL, NULL, NULL),
(13782, '1', '00007-B', NULL, NULL, '2019-12-26', '0', NULL, NULL, NULL, NULL),
(13783, '1', '00007-B', NULL, NULL, '2019-12-27', '0', NULL, NULL, NULL, NULL),
(13784, '1', '00007-B', NULL, NULL, '2019-12-28', '4', NULL, NULL, NULL, NULL),
(13785, '1', '00007-B', NULL, NULL, '2019-12-29', '0', NULL, NULL, NULL, NULL),
(13786, '1', '00007-B', NULL, NULL, '2019-12-30', '0', NULL, NULL, NULL, NULL),
(13787, '1', '00007-B', NULL, NULL, '2019-12-31', '4', NULL, NULL, NULL, NULL),
(13788, '1', '00007-B', NULL, NULL, '2020-01-01', '0', NULL, NULL, NULL, NULL),
(13789, '1', '00007-B', NULL, NULL, '2020-01-02', '0', NULL, NULL, NULL, NULL),
(13790, '1', '00007-B', NULL, NULL, '2020-01-03', '4', NULL, NULL, NULL, NULL),
(13791, '1', '00007-B', NULL, NULL, '2020-01-04', '0', NULL, NULL, NULL, NULL),
(13792, '1', '00007-B', NULL, NULL, '2020-01-05', '0', NULL, NULL, NULL, NULL),
(13793, '1', '00007-B', NULL, NULL, '2020-01-06', '4', NULL, NULL, NULL, NULL),
(13794, '1', '00007-B', NULL, NULL, '2020-01-07', '0', NULL, NULL, NULL, NULL),
(13795, '1', '00007-B', NULL, NULL, '2020-01-08', '0', NULL, NULL, NULL, NULL),
(13796, '1', '00007-B', NULL, NULL, '2020-01-09', '4', NULL, NULL, NULL, NULL),
(13797, '1', '00007-B', NULL, NULL, '2020-01-10', '0', NULL, NULL, NULL, NULL),
(13798, '1', '00007-B', NULL, NULL, '2020-01-11', '0', NULL, NULL, NULL, NULL),
(13799, '1', '00007-B', NULL, NULL, '2020-01-12', '4', NULL, NULL, NULL, NULL),
(13800, '1', '00007-B', NULL, NULL, '2020-01-13', '0', NULL, NULL, NULL, NULL),
(13801, '1', '00007-B', NULL, NULL, '2020-01-14', '0', NULL, NULL, NULL, NULL),
(13802, '1', '00007-B', NULL, NULL, '2020-01-15', '4', NULL, NULL, NULL, NULL),
(13803, '1', '00007-B', NULL, NULL, '2020-01-16', '0', NULL, NULL, NULL, NULL),
(13804, '1', '00007-B', NULL, NULL, '2020-01-17', '0', NULL, NULL, NULL, NULL),
(13805, '1', '00007-B', NULL, NULL, '2020-01-18', '4', NULL, NULL, NULL, NULL),
(13806, '1', '00007-B', NULL, NULL, '2020-01-19', '0', NULL, NULL, NULL, NULL),
(13807, '1', '00007-B', NULL, NULL, '2020-01-20', '0', NULL, NULL, NULL, NULL),
(13808, '1', '00007-B', NULL, NULL, '2020-01-21', '4', NULL, NULL, NULL, NULL),
(13809, '1', '00007-B', NULL, NULL, '2020-01-22', '0', NULL, NULL, NULL, NULL),
(13810, '1', '00007-B', NULL, NULL, '2020-01-23', '0', NULL, NULL, NULL, NULL),
(13811, '1', '00007-B', NULL, NULL, '2020-01-24', '4', NULL, NULL, NULL, NULL),
(13812, '1', '00007-B', NULL, NULL, '2020-01-25', '0', NULL, NULL, NULL, NULL),
(13813, '1', '00007-B', NULL, NULL, '2020-01-26', '0', NULL, NULL, NULL, NULL),
(13814, '1', '00007-B', NULL, NULL, '2020-01-27', '4', NULL, NULL, NULL, NULL),
(13815, '1', '00007-B', NULL, NULL, '2020-01-28', '0', NULL, NULL, NULL, NULL),
(13816, '1', '00007-B', NULL, NULL, '2020-01-29', '0', NULL, NULL, NULL, NULL),
(13817, '1', '00007-B', NULL, NULL, '2020-01-30', '4', NULL, NULL, NULL, NULL),
(13818, '1', '00007-B', NULL, NULL, '2020-01-31', '0', NULL, NULL, NULL, NULL),
(13819, '1', '00007-B', NULL, NULL, '2020-02-01', '0', NULL, NULL, NULL, NULL),
(13820, '1', '00007-B', NULL, NULL, '2020-02-02', '4', NULL, NULL, NULL, NULL),
(13821, '1', '00007-B', NULL, NULL, '2020-02-03', '0', NULL, NULL, NULL, NULL),
(13822, '1', '00007-B', NULL, NULL, '2020-02-04', '0', NULL, NULL, NULL, NULL),
(13823, '1', '00007-B', NULL, NULL, '2020-02-05', '4', NULL, NULL, NULL, NULL),
(13824, '1', '00007-B', NULL, NULL, '2020-02-06', '0', NULL, NULL, NULL, NULL),
(13825, '1', '00007-B', NULL, NULL, '2020-02-07', '0', NULL, NULL, NULL, NULL),
(13826, '1', '00007-B', NULL, NULL, '2020-02-08', '4', NULL, NULL, NULL, NULL),
(13827, '1', '00007-B', NULL, NULL, '2020-02-09', '0', NULL, NULL, NULL, NULL),
(13828, '1', '00007-B', NULL, NULL, '2020-02-10', '0', NULL, NULL, NULL, NULL),
(13829, '1', '00007-B', NULL, NULL, '2020-02-11', '4', NULL, NULL, NULL, NULL),
(13830, '1', '00007-B', NULL, NULL, '2020-02-12', '0', NULL, NULL, NULL, NULL),
(13831, '1', '00007-B', NULL, NULL, '2020-02-13', '0', NULL, NULL, NULL, NULL),
(13832, '1', '00007-B', NULL, NULL, '2020-02-14', '4', NULL, NULL, NULL, NULL),
(13833, '1', '00007-B', NULL, NULL, '2020-02-15', '0', NULL, NULL, NULL, NULL),
(13834, '1', '00007-B', NULL, NULL, '2020-02-16', '0', NULL, NULL, NULL, NULL),
(13835, '1', '00007-B', NULL, NULL, '2020-02-17', '4', NULL, NULL, NULL, NULL),
(13836, '1', '00007-B', NULL, NULL, '2020-02-18', '0', NULL, NULL, NULL, NULL),
(13837, '1', '00007-B', NULL, NULL, '2020-02-19', '0', NULL, NULL, NULL, NULL),
(13838, '1', '00007-B', NULL, NULL, '2020-02-20', '4', NULL, NULL, NULL, NULL),
(13839, '1', '00007-B', NULL, NULL, '2020-02-21', '0', NULL, NULL, NULL, NULL),
(13843, '1', '00001-A', NULL, NULL, '2019-12-16', '0', NULL, NULL, NULL, NULL),
(13844, '1', '00001-A', NULL, NULL, '2019-12-17', '5', NULL, NULL, NULL, NULL),
(13845, '1', '00001-A', NULL, NULL, '2019-12-18', '0', NULL, NULL, NULL, NULL),
(13846, '1', '00001-A', NULL, NULL, '2019-12-19', '0', NULL, NULL, NULL, NULL),
(13847, '1', '00001-A', NULL, NULL, '2019-12-20', '5', NULL, NULL, NULL, NULL),
(13848, '1', '00001-A', NULL, NULL, '2019-12-21', '0', NULL, NULL, NULL, NULL),
(13849, '1', '00001-A', NULL, NULL, '2019-12-22', '0', NULL, NULL, NULL, NULL),
(13850, '1', '00001-A', NULL, NULL, '2019-12-23', '5', NULL, NULL, NULL, NULL),
(13851, '1', '00001-A', NULL, NULL, '2019-12-24', '0', NULL, NULL, NULL, NULL),
(13852, '1', '00001-A', NULL, NULL, '2019-12-25', '0', NULL, NULL, NULL, NULL),
(13853, '1', '00001-A', NULL, NULL, '2019-12-26', '5', NULL, NULL, NULL, NULL),
(13854, '1', '00001-A', NULL, NULL, '2019-12-27', '0', NULL, NULL, NULL, NULL),
(13855, '1', '00001-A', NULL, NULL, '2019-12-28', '0', NULL, NULL, NULL, NULL),
(13856, '1', '00001-A', NULL, NULL, '2019-12-29', '5', NULL, NULL, NULL, NULL),
(13857, '1', '00001-A', NULL, NULL, '2019-12-30', '0', NULL, NULL, NULL, NULL),
(13858, '1', '00001-A', NULL, NULL, '2019-12-31', '0', NULL, NULL, NULL, NULL),
(13859, '1', '00001-A', NULL, NULL, '2020-01-01', '5', NULL, NULL, NULL, NULL),
(13860, '1', '00001-A', NULL, NULL, '2020-01-02', '0', NULL, NULL, NULL, NULL),
(13861, '1', '00001-A', NULL, NULL, '2020-01-03', '0', NULL, NULL, NULL, NULL),
(13862, '1', '00001-A', NULL, NULL, '2020-01-04', '5', NULL, NULL, NULL, NULL),
(13863, '1', '00001-A', NULL, NULL, '2020-01-05', '0', NULL, NULL, NULL, NULL),
(13864, '1', '00001-A', NULL, NULL, '2020-01-06', '0', NULL, NULL, NULL, NULL),
(13865, '1', '00001-A', NULL, NULL, '2020-01-07', '5', NULL, NULL, NULL, NULL),
(13866, '1', '00001-A', NULL, NULL, '2020-01-08', '0', NULL, NULL, NULL, NULL),
(13867, '1', '00001-A', NULL, NULL, '2020-01-09', '0', NULL, NULL, NULL, NULL),
(13868, '1', '00001-A', NULL, NULL, '2020-01-10', '5', NULL, NULL, NULL, NULL),
(13869, '1', '00001-A', NULL, NULL, '2020-01-11', '0', NULL, NULL, NULL, NULL),
(13870, '1', '00001-A', NULL, NULL, '2020-01-12', '0', NULL, NULL, NULL, NULL),
(13871, '1', '00001-A', NULL, NULL, '2020-01-13', '5', NULL, NULL, NULL, NULL),
(13872, '1', '00001-A', NULL, NULL, '2020-01-14', '0', NULL, NULL, NULL, NULL),
(13873, '1', '00001-A', NULL, NULL, '2020-01-15', '0', NULL, NULL, NULL, NULL),
(13874, '1', '00001-A', NULL, NULL, '2020-01-16', '5', NULL, NULL, NULL, NULL),
(13875, '1', '00001-A', NULL, NULL, '2020-01-17', '0', NULL, NULL, NULL, NULL),
(13876, '1', '00001-A', NULL, NULL, '2020-01-18', '0', NULL, NULL, NULL, NULL),
(13877, '1', '00001-A', NULL, NULL, '2020-01-19', '5', NULL, NULL, NULL, NULL),
(13878, '1', '00001-A', NULL, NULL, '2020-01-20', '0', NULL, NULL, NULL, NULL),
(13879, '1', '00001-A', NULL, NULL, '2020-01-21', '0', NULL, NULL, NULL, NULL),
(13880, '1', '00001-A', NULL, NULL, '2020-01-22', '5', NULL, NULL, NULL, NULL),
(13881, '1', '00001-A', NULL, NULL, '2020-01-23', '0', NULL, NULL, NULL, NULL),
(13882, '1', '00001-A', NULL, NULL, '2020-01-24', '0', NULL, NULL, NULL, NULL),
(13883, '1', '00001-A', NULL, NULL, '2020-01-25', '5', NULL, NULL, NULL, NULL),
(13884, '1', '00001-A', NULL, NULL, '2020-01-26', '0', NULL, NULL, NULL, NULL),
(13885, '1', '00001-A', NULL, NULL, '2020-01-27', '0', NULL, NULL, NULL, NULL),
(13886, '1', '00001-A', NULL, NULL, '2020-01-28', '5', NULL, NULL, NULL, NULL),
(13887, '1', '00001-A', NULL, NULL, '2020-01-29', '0', NULL, NULL, NULL, NULL),
(13888, '1', '00001-A', NULL, NULL, '2020-01-30', '0', NULL, NULL, NULL, NULL),
(13889, '1', '00001-A', NULL, NULL, '2020-01-31', '5', NULL, NULL, NULL, NULL),
(13890, '1', '00001-A', NULL, NULL, '2020-02-01', '0', NULL, NULL, NULL, NULL),
(13891, '1', '00001-A', NULL, NULL, '2020-02-02', '0', NULL, NULL, NULL, NULL),
(13892, '1', '00001-A', NULL, NULL, '2020-02-03', '5', NULL, NULL, NULL, NULL),
(13893, '1', '00001-A', NULL, NULL, '2020-02-04', '0', NULL, NULL, NULL, NULL),
(13894, '1', '00001-A', NULL, NULL, '2020-02-05', '0', NULL, NULL, NULL, NULL),
(13895, '1', '00001-A', NULL, NULL, '2020-02-06', '5', NULL, NULL, NULL, NULL),
(13896, '1', '00001-A', NULL, NULL, '2020-02-07', '0', NULL, NULL, NULL, NULL),
(13897, '1', '00001-A', NULL, NULL, '2020-02-08', '0', NULL, NULL, NULL, NULL),
(13898, '1', '00001-A', NULL, NULL, '2020-02-09', '5', NULL, NULL, NULL, NULL),
(13899, '1', '00001-A', NULL, NULL, '2020-02-10', '0', NULL, NULL, NULL, NULL),
(13900, '1', '00001-A', NULL, NULL, '2020-02-11', '0', NULL, NULL, NULL, NULL),
(13901, '1', '00001-A', NULL, NULL, '2020-02-12', '5', NULL, NULL, NULL, NULL),
(13902, '1', '00001-A', NULL, NULL, '2020-02-13', '0', NULL, NULL, NULL, NULL),
(13903, '1', '00001-A', NULL, NULL, '2020-02-14', '0', NULL, NULL, NULL, NULL),
(13904, '1', '00001-A', NULL, NULL, '2020-02-15', '5', NULL, NULL, NULL, NULL),
(13905, '1', '00001-A', NULL, NULL, '2020-02-16', '0', NULL, NULL, NULL, NULL),
(13906, '1', '00001-A', NULL, NULL, '2020-02-17', '0', NULL, NULL, NULL, NULL),
(13907, '1', '00001-A', NULL, NULL, '2020-02-18', '5', NULL, NULL, NULL, NULL),
(13908, '1', '00001-A', NULL, NULL, '2020-02-19', '0', NULL, NULL, NULL, NULL),
(13909, '1', '00001-A', NULL, NULL, '2020-02-20', '0', NULL, NULL, NULL, NULL),
(13910, '1', '00001-A', NULL, NULL, '2020-02-21', '5', NULL, NULL, NULL, NULL),
(13914, '1', '00008-A', NULL, NULL, '2019-12-16', '0', NULL, NULL, NULL, NULL),
(13915, '1', '00008-A', NULL, NULL, '2019-12-17', '0', NULL, NULL, NULL, NULL),
(13916, '1', '00008-A', NULL, NULL, '2019-12-18', '6', NULL, NULL, NULL, NULL),
(13917, '1', '00008-A', NULL, NULL, '2019-12-19', '0', NULL, NULL, NULL, NULL),
(13918, '1', '00008-A', NULL, NULL, '2019-12-20', '0', NULL, NULL, NULL, NULL),
(13919, '1', '00008-A', NULL, NULL, '2019-12-21', '6', NULL, NULL, NULL, NULL),
(13920, '1', '00008-A', NULL, NULL, '2019-12-22', '0', NULL, NULL, NULL, NULL),
(13921, '1', '00008-A', NULL, NULL, '2019-12-23', '0', NULL, NULL, NULL, NULL),
(13922, '1', '00008-A', NULL, NULL, '2019-12-24', '6', NULL, NULL, NULL, NULL),
(13923, '1', '00008-A', NULL, NULL, '2019-12-25', '0', NULL, NULL, NULL, NULL),
(13924, '1', '00008-A', NULL, NULL, '2019-12-26', '0', NULL, NULL, NULL, NULL),
(13925, '1', '00008-A', NULL, NULL, '2019-12-27', '6', NULL, NULL, NULL, NULL),
(13926, '1', '00008-A', NULL, NULL, '2019-12-28', '0', NULL, NULL, NULL, NULL),
(13927, '1', '00008-A', NULL, NULL, '2019-12-29', '0', NULL, NULL, NULL, NULL),
(13928, '1', '00008-A', NULL, NULL, '2019-12-30', '6', NULL, NULL, NULL, NULL),
(13929, '1', '00008-A', NULL, NULL, '2019-12-31', '0', NULL, NULL, NULL, NULL),
(13930, '1', '00008-A', NULL, NULL, '2020-01-01', '0', NULL, NULL, NULL, NULL),
(13931, '1', '00008-A', NULL, NULL, '2020-01-02', '6', NULL, NULL, NULL, NULL),
(13932, '1', '00008-A', NULL, NULL, '2020-01-03', '0', NULL, NULL, NULL, NULL),
(13933, '1', '00008-A', NULL, NULL, '2020-01-04', '0', NULL, NULL, NULL, NULL),
(13934, '1', '00008-A', NULL, NULL, '2020-01-05', '6', NULL, NULL, NULL, NULL),
(13935, '1', '00008-A', NULL, NULL, '2020-01-06', '0', NULL, NULL, NULL, NULL),
(13936, '1', '00008-A', NULL, NULL, '2020-01-07', '0', NULL, NULL, NULL, NULL),
(13937, '1', '00008-A', NULL, NULL, '2020-01-08', '6', NULL, NULL, NULL, NULL),
(13938, '1', '00008-A', NULL, NULL, '2020-01-09', '0', NULL, NULL, NULL, NULL),
(13939, '1', '00008-A', NULL, NULL, '2020-01-10', '0', NULL, NULL, NULL, NULL),
(13940, '1', '00008-A', NULL, NULL, '2020-01-11', '6', NULL, NULL, NULL, NULL),
(13941, '1', '00008-A', NULL, NULL, '2020-01-12', '0', NULL, NULL, NULL, NULL),
(13942, '1', '00008-A', NULL, NULL, '2020-01-13', '0', NULL, NULL, NULL, NULL),
(13943, '1', '00008-A', NULL, NULL, '2020-01-14', '6', NULL, NULL, NULL, NULL),
(13944, '1', '00008-A', NULL, NULL, '2020-01-15', '0', NULL, NULL, NULL, NULL),
(13945, '1', '00008-A', NULL, NULL, '2020-01-16', '0', NULL, NULL, NULL, NULL),
(13946, '1', '00008-A', NULL, NULL, '2020-01-17', '6', NULL, NULL, NULL, NULL),
(13947, '1', '00008-A', NULL, NULL, '2020-01-18', '0', NULL, NULL, NULL, NULL),
(13948, '1', '00008-A', NULL, NULL, '2020-01-19', '0', NULL, NULL, NULL, NULL),
(13949, '1', '00008-A', NULL, NULL, '2020-01-20', '6', NULL, NULL, NULL, NULL),
(13950, '1', '00008-A', NULL, NULL, '2020-01-21', '0', NULL, NULL, NULL, NULL),
(13951, '1', '00008-A', NULL, NULL, '2020-01-22', '0', NULL, NULL, NULL, NULL),
(13952, '1', '00008-A', NULL, NULL, '2020-01-23', '6', NULL, NULL, NULL, NULL),
(13953, '1', '00008-A', NULL, NULL, '2020-01-24', '0', NULL, NULL, NULL, NULL),
(13954, '1', '00008-A', NULL, NULL, '2020-01-25', '0', NULL, NULL, NULL, NULL),
(13955, '1', '00008-A', NULL, NULL, '2020-01-26', '6', NULL, NULL, NULL, NULL),
(13956, '1', '00008-A', NULL, NULL, '2020-01-27', '0', NULL, NULL, NULL, NULL),
(13957, '1', '00008-A', NULL, NULL, '2020-01-28', '0', NULL, NULL, NULL, NULL),
(13958, '1', '00008-A', NULL, NULL, '2020-01-29', '6', NULL, NULL, NULL, NULL),
(13959, '1', '00008-A', NULL, NULL, '2020-01-30', '0', NULL, NULL, NULL, NULL),
(13960, '1', '00008-A', NULL, NULL, '2020-01-31', '0', NULL, NULL, NULL, NULL),
(13961, '1', '00008-A', NULL, NULL, '2020-02-01', '6', NULL, NULL, NULL, NULL),
(13962, '1', '00008-A', NULL, NULL, '2020-02-02', '0', NULL, NULL, NULL, NULL),
(13963, '1', '00008-A', NULL, NULL, '2020-02-03', '0', NULL, NULL, NULL, NULL),
(13964, '1', '00008-A', NULL, NULL, '2020-02-04', '6', NULL, NULL, NULL, NULL),
(13965, '1', '00008-A', NULL, NULL, '2020-02-05', '0', NULL, NULL, NULL, NULL),
(13966, '1', '00008-A', NULL, NULL, '2020-02-06', '0', NULL, NULL, NULL, NULL),
(13967, '1', '00008-A', NULL, NULL, '2020-02-07', '6', NULL, NULL, NULL, NULL),
(13968, '1', '00008-A', NULL, NULL, '2020-02-08', '0', NULL, NULL, NULL, NULL),
(13969, '1', '00008-A', NULL, NULL, '2020-02-09', '0', NULL, NULL, NULL, NULL),
(13970, '1', '00008-A', NULL, NULL, '2020-02-10', '6', NULL, NULL, NULL, NULL),
(13971, '1', '00008-A', NULL, NULL, '2020-02-11', '0', NULL, NULL, NULL, NULL),
(13972, '1', '00008-A', NULL, NULL, '2020-02-12', '0', NULL, NULL, NULL, NULL),
(13973, '1', '00008-A', NULL, NULL, '2020-02-13', '6', NULL, NULL, NULL, NULL),
(13974, '1', '00008-A', NULL, NULL, '2020-02-14', '0', NULL, NULL, NULL, NULL),
(13975, '1', '00008-A', NULL, NULL, '2020-02-15', '0', NULL, NULL, NULL, NULL),
(13976, '1', '00008-A', NULL, NULL, '2020-02-16', '6', NULL, NULL, NULL, NULL),
(13977, '1', '00008-A', NULL, NULL, '2020-02-17', '0', NULL, NULL, NULL, NULL),
(13978, '1', '00008-A', NULL, NULL, '2020-02-18', '0', NULL, NULL, NULL, NULL),
(13979, '1', '00008-A', NULL, NULL, '2020-02-19', '6', NULL, NULL, NULL, NULL),
(13980, '1', '00008-A', NULL, NULL, '2020-02-20', '0', NULL, NULL, NULL, NULL),
(13981, '1', '00008-A', NULL, NULL, '2020-02-21', '0', NULL, NULL, NULL, NULL),
(14006, '1', '00006-C', NULL, NULL, '2019-12-10', '4', NULL, NULL, NULL, NULL),
(14007, '1', '00006-C', NULL, NULL, '2019-12-11', '5', NULL, NULL, NULL, NULL),
(14008, '1', '00006-C', NULL, NULL, '2019-12-12', '6', NULL, NULL, NULL, NULL),
(14009, '1', '00006-C', NULL, NULL, '2019-12-13', '7', NULL, NULL, NULL, NULL),
(14010, '1', '00006-C', NULL, NULL, '2019-12-14', '8', NULL, NULL, NULL, NULL),
(14011, '1', '00006-C', NULL, NULL, '2019-12-15', '0', NULL, NULL, NULL, NULL),
(14012, '1', '00007-B', NULL, NULL, '2019-12-10', '0', NULL, NULL, NULL, NULL),
(14013, '1', '00007-B', NULL, NULL, '2019-12-11', '0', NULL, NULL, NULL, NULL),
(14014, '1', '00007-B', NULL, NULL, '2019-12-12', '0', NULL, NULL, NULL, NULL),
(14015, '1', '00007-B', NULL, NULL, '2019-12-13', '0', NULL, NULL, NULL, NULL),
(14016, '1', '00007-B', NULL, NULL, '2019-12-14', '0', NULL, NULL, NULL, NULL),
(14017, '1', '00007-B', NULL, NULL, '2019-12-15', '0', NULL, NULL, NULL, NULL),
(14018, '1', '00001-A', NULL, NULL, '2019-12-10', '0', NULL, NULL, NULL, NULL),
(14019, '1', '00001-A', NULL, NULL, '2019-12-11', '0', NULL, NULL, NULL, NULL),
(14020, '1', '00001-A', NULL, NULL, '2019-12-12', '0', NULL, NULL, NULL, NULL),
(14021, '1', '00001-A', NULL, NULL, '2019-12-13', '0', NULL, NULL, NULL, NULL),
(14022, '1', '00001-A', NULL, NULL, '2019-12-14', '0', NULL, NULL, NULL, NULL),
(14023, '1', '00001-A', NULL, NULL, '2019-12-15', '0', NULL, NULL, NULL, NULL),
(14024, '1', '00008-A', NULL, NULL, '2019-12-10', '0', NULL, NULL, NULL, NULL),
(14025, '1', '00008-A', NULL, NULL, '2019-12-11', '0', NULL, NULL, NULL, NULL),
(14026, '1', '00008-A', NULL, NULL, '2019-12-12', '0', NULL, NULL, NULL, NULL),
(14027, '1', '00008-A', NULL, NULL, '2019-12-13', '0', NULL, NULL, NULL, NULL),
(14028, '1', '00008-A', NULL, NULL, '2019-12-14', '0', NULL, NULL, NULL, NULL),
(14029, '1', '00008-A', NULL, NULL, '2019-12-15', '0', NULL, NULL, NULL, NULL);

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
(64, '2019-12-19 05:51:06 PM', 'New', 'New Admin added! (Name: Cubelo, Romel P. | Position: Developer)', 'http://localhost/ci_wercher_system/Admin_List'),
(65, '2019-12-26 09:25:33 PM', 'Update', 'Employee 00002-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(66, '2019-12-26 09:25:34 PM', 'Update', 'Employee 00004-B has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-B'),
(299, '2019-12-28 03:50:02 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(300, '2019-12-29 10:43:31 AM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(301, '2019-12-29 10:43:53 AM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(302, '2019-12-29 10:45:09 AM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(303, '2019-12-29 08:12:09 PM', 'Update', 'Updated weekly hours for .', 'http://localhost/ci_wercher_system/Clients'),
(304, '2019-12-29 08:12:13 PM', 'Update', 'Updated weekly hours for .', 'http://localhost/ci_wercher_system/Clients'),
(305, '2019-12-30 07:18:46 AM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(306, '2019-12-30 07:55:29 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(307, '2019-12-30 07:55:33 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(308, '2019-12-31 08:13:31 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients');

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
-- Table structure for table `supp_documents`
--

CREATE TABLE `supp_documents` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `Doc_Image` blob DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supp_documents`
--

INSERT INTO `supp_documents` (`ID`, `ApplicantID`, `Doc_Image`, `Subject`, `Description`, `Remarks`, `DateAdded`) VALUES
(1, '00006-C', 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f32303070782d596f75547562654d757369635f4c6f676f2e706e67, 'Violation', 'dasdasd', 'asdasd', '2019-12-27'),
(2, '00006-C', 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f6369724e6f2e706e67, 'ABC', '123', '5555', '2019-12-27');

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
-- Indexes for table `supp_documents`
--
ALTER TABLE `supp_documents`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5350;

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
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14030;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

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
-- AUTO_INCREMENT for table `supp_documents`
--
ALTER TABLE `supp_documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
