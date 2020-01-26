-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 10:30 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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
  `ApplicantImage` blob,
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
(5, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030352d412f38357662733363616577333231322e6a7067, '00005-A', 'Bookeeper', 'TEST GROUP 2', '???', 'Á???', 'Á??', 'Á????', 'Female', '500', '2', '2', '?', '2019-12-04', '??', '??', 'Single', '50', '????', '????', '?????', '500000', '?', '2019-12-19', '???', '??', '2019-12-12', '???', '?', '2019-12-28', '11', '11', '2019-12-06', '22', '22', '2019-12-21', '333', 'Expired', '', '', '2018-01-13 11:33:14 PM', '2019-12-14 11:29:13 AM', 'R_ContractDuration', '2160000', 'No', NULL),
(6, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d412f526162626974732b666f6f742b69732b737570706f7365642b746f2b62652b6c75636b792b5f36396661363033323666313237303266336135663439653766626430333239312e6a7067, '00006-C', 'Office Staff', NULL, '1111111', 'Aaa', 'Aaaaaaa', 'Aaaaaa', 'Male', '11', '11', '11', '11', '2019-12-12', '11', '12313', 'Single', '13', '123213', '32131', '32133', '1313', '123213', '2019-12-26', '1231', '1131313123', '2019-12-13', '12313', '13213123123', '2019-12-21', '', '', '', '', '', '', NULL, 'Employed', '1', '2019-12-18 04:39:43 AM', '2020-12-18 04:39:43 AM', '2019-12-02 09:09:59 AM', NULL, NULL, NULL, '00006-C'),
(7, 0x68747470733a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030372d412f6368726f6d655f567737685757644b62342e6a7067, '00007-B', 'Secretary', NULL, '90000', 'Arató', 'András', 'A', 'Male', '50', '5', '80', '111111', '2019-12-03', 'Hungary', 'z315135', 'Single', '3', 'K?szeg, Hungary', 'K?szeg, Hungary', '11111', '35735723542', '2524622753', '2019-12-31', '252462624624234', 'K?szeg', '2019-12-04', '26245234226', 'K?szeg', '2019-12-14', '111', '22222', '2019-12-12', '33333', '3444444', '2019-12-27', '5555', 'Blacklisted', '1', '2019-12-18 04:34:14 AM', '2019-12-20 04:34:14 AM', '2019-12-02 09:34:26 AM', NULL, NULL, NULL, '00007-B'),
(8, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030382d412f31363630323832305f3136313233333230343338303238385f333934343238313336383536353532393633365f6e5f2d5f436f70792e6a7067, '00008-A', 'Office Staff', NULL, '20000', 'Last Name', 'First Name', 'Middle Initial', 'Male', '1', '1', '1', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', 'Single', '1', 'SAMPLE', 'SAMPLE', 'SAMPLE', '1', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-11', 'SAMPLE', 'SAMPLE', '2019-12-17', 'SAMPLE', 'Deleted', '1', '2019-12-12 08:41:42 PM', '2020-02-12 08:41:42 PM', '2019-12-10 06:45:27 AM', NULL, NULL, NULL, NULL),
(9, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030392d412f446973636f72645f44646c3256366f7464432e6a7067, '00009-A', 'Office Staff', NULL, '1000', 'Kojima', 'Hideo', 'D', 'Male', '56', '2', '500', 'Yes', '1963-07-24', 'Japan', 'Japanese', 'Single', '90', 'cabacbacba', 'acaccaacbacb', 'bacbacbabaaacacb', '9999999', '543577', '2019-12-01', '357357373', 'adabbcbab', '2019-12-02', '73735735', 'acbacbacbab', '2019-12-03', '737357', 'acbcabacb', '2019-12-04', '3573737', 'acbabacbabacb', '2019-12-05', '3573575375', 'Deleted', NULL, '2019-12-15 01:28:28 AM', '2021-05-17 01:28:28 AM', '2020-12-14 05:05:30 PM', NULL, NULL, NULL, NULL),
(34, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303032322d412f77746969666163652e706e67, '00022-B', 'Office Staff', NULL, '35000', 'Langley', 'Richard', 'W', 'Male', '40', '5', '100', 'None', '2019-12-18', 'Jamaica', 'British', 'Single', '0', 'London', 'London', 'London', '000000000', '357935634', '2019-12-21', '135355346', 'abc53a', '2019-12-05', '72673478', 'abcdefghjikl;dfgzx', '2019-12-17', '437474128', 'abcde6c', '2019-12-13', '66345625', 'abcbcncj365gdh', '2019-12-28', '26235756378', 'Blacklisted', '4', '2019-12-18 05:14:04 AM', '2019-12-19 05:14:04 AM', '2020-03-17 10:12:37 PM', NULL, NULL, NULL, '00022-B'),
(35, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303032332d412f6368726f6d655f6a4b384d4d32785652522e6a7067, '00023-A', 'AaaAAAAAAAAA', 'TEST GROUP 3', 'zdy34616', 'Elbertson', 'Jeremy', 'E', 'Male', '34', '4', '1000', 'Jerma', '2019-09-22', 'US of A', 'A', 'Single', '0', '13515', '1515', '13513513513', '1513515315135315', '135135515', '2019-12-05', '135515', '1351353', '2019-12-13', '153513', '5135353', '2019-12-20', '535135', '335135', '2020-01-04', '153515', '1351355', '2019-12-18', '13513535', 'Applicant', NULL, NULL, NULL, '2019-12-27 12:29:43 PM', NULL, NULL, NULL, NULL),
(36, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f626c7565, '00012-A', 'dfhhdfhfgh', 'fdhhfdhfh', NULL, 'Dfhdfh', 'Hfhdfhfdhdh', 'Dhfdhh', 'Male', '2', 'dhhdfhdf', 'dfh', 'fhghdfhdf', '2020-01-09', 'dfhhfd', 'hfdhdghgdhd', 'Married', '23456', 'dfh', 'fhdfhd', 'hdfhdfhd', 'dfhdhfdh', 'dfh', '2020-01-16', 'hfdhf', 'fdhd', '2020-01-16', 'hhh', 'hfdhfdh', '2020-01-11', 'fhfdh', 'dfhdfhh', '2020-01-29', 'dfhd', 'fdhfdhfdh', '2020-01-31', 'hfhghdh', 'Applicant', NULL, NULL, NULL, '2020-01-13 02:20:32 PM', NULL, NULL, NULL, NULL),
(37, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303031332d412f31333234303632395f3234323038363730393530343632375f363538373233383237393430353939353134375f6e2e706e67, '00013-A', '78', 'TEST GROUP 1', '12313313', '78', '78', '78', 'Male', '78', '78', '78', '78', '2020-01-08', '78', '78', 'Married', '78', '78', '78', '78', '78', '78', '2020-01-24', '78', '78', '2020-01-09', '78', '78', '2020-01-03', '78', '78', '2020-01-17', '78', '78', '2020-01-25', '78', 'Applicant', NULL, NULL, NULL, '2020-01-13 02:33:36 PM', NULL, NULL, NULL, NULL),
(38, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f626c75652e706e67, '00014-A', '25', '25', NULL, '25', '25', '25', 'Female', '25', '25', '25', '25', '2020-01-15', '25', '25', 'Married', '25', '25', '25', '25', '25', '25', '2020-01-10', '25', '25', '2020-01-11', '25', '25', '2020-01-25', '25', '25', '2020-01-11', '25', '25', '2020-01-22', '25', 'Applicant', NULL, NULL, NULL, '2020-01-13 02:35:37 PM', NULL, NULL, NULL, NULL),
(39, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f707572706c652e706e67, '00015-A', 'TEST-5438782', 'TEST-5438782', NULL, 'TEST-5438782', 'TEST-5438782', 'TEST-5438782', 'Male', '12', 'TEST-5438782', 'TEST-5438782', 'TEST-5438782', '2020-01-13', 'TEST-5438782', 'TEST-5438782', 'Single', '12', 'TEST-5438782', 'TEST-5438782', 'TEST-5438782', 'TEST-5438782', 'TEST-5438782', '2020-01-13', 'TEST-5438782', 'TEST-5438782', '2020-01-13', 'TEST-5438782', 'TEST-5438782', '2020-01-13', 'TEST-5438782', 'TEST-5438782', '2020-01-13', 'TEST-5438782', 'TEST-5438782', '2020-01-13', 'TEST-5438782', 'Applicant', NULL, NULL, NULL, '2020-01-13 02:45:03 PM', NULL, NULL, NULL, NULL),
(40, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f677265656e2e706e67, '00016-A', 'TEST-7965240', 'TEST-7965240', NULL, 'TEST-7965240', 'TEST-7965240', 'TEST-7965240', 'Male', '36', 'TEST-7965240', 'TEST-7965240', 'TEST-7965240', '2020-01-13', 'TEST-7965240', 'TEST-7965240', 'Single', '36', 'TEST-7965240', 'TEST-7965240', 'TEST-7965240', 'TEST-7965240', 'TEST-7965240', '2020-01-13', 'TEST-7965240', 'TEST-7965240', '2020-01-13', 'TEST-7965240', 'TEST-7965240', '2020-01-13', 'TEST-7965240', 'TEST-7965240', '2020-01-13', 'TEST-7965240', 'TEST-7965240', '2020-01-13', 'TEST-7965240', 'Employed', '1', '2020-01-14 05:02:09 PM', '2020-02-08 05:02:09 PM', '2020-01-13 02:45:13 PM', 'R_ContractDuration', '2629743', 'No', '00016-B'),
(41, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f707572706c652e706e67, '00017-A', 'TEST-8140880', 'TEST-8140880', NULL, 'TEST-8140880', 'TEST-8140880', 'TEST-8140880', 'Male', '55', 'TEST-8140880', 'TEST-8140880', 'TEST-8140880', '2020-01-13', 'TEST-8140880', 'TEST-8140880', 'Single', '55', 'TEST-8140880', 'TEST-8140880', 'TEST-8140880', 'TEST-8140880', 'TEST-8140880', '2020-01-13', 'TEST-8140880', 'TEST-8140880', '2020-01-13', 'TEST-8140880', 'TEST-8140880', '2020-01-13', 'TEST-8140880', 'TEST-8140880', '2020-01-13', 'TEST-8140880', 'TEST-8140880', '2020-01-13', 'TEST-8140880', 'Applicant', NULL, NULL, NULL, '2020-01-13 02:45:19 PM', NULL, NULL, NULL, NULL),
(42, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f707572706c652e706e67, '00018-A', 'TEST-9763938', 'TEST-9763938', NULL, 'TEST-9763938', 'TEST-9763938', 'TEST-9763938', 'Male', '30', 'TEST-9763938', 'TEST-9763938', 'TEST-9763938', '2020-01-13', 'TEST-9763938', 'TEST-9763938', 'Single', '30', 'TEST-9763938', 'TEST-9763938', 'TEST-9763938', 'TEST-9763938', 'TEST-9763938', '2020-01-13', 'TEST-9763938', 'TEST-9763938', '2020-01-13', 'TEST-9763938', 'TEST-9763938', '2020-01-13', 'TEST-9763938', 'TEST-9763938', '2020-01-13', 'TEST-9763938', 'TEST-9763938', '2020-01-13', 'TEST-9763938', 'Applicant', NULL, NULL, NULL, '2020-01-13 02:45:22 PM', NULL, NULL, NULL, NULL),
(43, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f677265656e2e706e67, '00019-A', 'TEST-4765684', 'TEST-4765684', NULL, 'TEST-4765684', 'TEST-4765684', 'TEST-4765684', 'Male', '13', 'TEST-4765684', 'TEST-4765684', 'TEST-4765684', '2020-01-13', 'TEST-4765684', 'TEST-4765684', 'Single', '13', 'TEST-4765684', 'TEST-4765684', 'TEST-4765684', 'TEST-4765684', 'TEST-4765684', '2020-01-13', 'TEST-4765684', 'TEST-4765684', '2020-01-13', 'TEST-4765684', 'TEST-4765684', '2020-01-13', 'TEST-4765684', 'TEST-4765684', '2020-01-13', 'TEST-4765684', 'TEST-4765684', '2020-01-13', 'TEST-4765684', 'Applicant', NULL, NULL, NULL, '2020-01-13 02:45:35 PM', NULL, NULL, NULL, NULL),
(44, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f707572706c652e706e67, '00020-A', 'TEST-3725474', 'TEST-3725474', NULL, 'TEST-3725474', 'TEST-3725474', 'TEST-3725474', 'Male', '13', 'TEST-3725474', 'TEST-3725474', 'TEST-3725474', '2020-01-13', 'TEST-3725474', 'TEST-3725474', 'Single', '13', 'TEST-3725474', 'TEST-3725474', 'TEST-3725474', 'TEST-3725474', 'TEST-3725474', '2020-01-13', 'TEST-3725474', 'TEST-3725474', '2020-01-13', 'TEST-3725474', 'TEST-3725474', '2020-01-13', 'TEST-3725474', 'TEST-3725474', '2020-01-13', 'TEST-3725474', 'TEST-3725474', '2020-01-13', 'TEST-3725474', 'Applicant', NULL, NULL, NULL, '2020-01-13 02:45:38 PM', NULL, NULL, NULL, NULL),
(45, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f626c75652e706e67, '00021-A', 'TEST-3892365', 'TEST-3892365', NULL, 'TEST-3892365', 'TEST-3892365', 'TEST-3892365', 'Male', '51', 'TEST-3892365', 'TEST-3892365', 'TEST-3892365', '2020-01-19', 'TEST-3892365', 'TEST-3892365', 'Single', '51', 'TEST-3892365', 'TEST-3892365', 'TEST-3892365', 'TEST-3892365', 'TEST-3892365', '2020-01-19', 'TEST-3892365', 'TEST-3892365', '2020-01-19', 'TEST-3892365', 'TEST-3892365', '2020-01-19', 'TEST-3892365', 'TEST-3892365', '2020-01-19', 'TEST-3892365', 'TEST-3892365', '2020-01-19', 'TEST-3892365', 'Applicant', NULL, NULL, NULL, '2020-01-19 08:04:26 AM', NULL, NULL, NULL, NULL),
(46, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f626c75652e706e67, '00022-A', 'TEST-1906327', 'TEST-1906327', NULL, 'TEST-1906327', 'TEST-1906327', 'TEST-1906327', 'Male', '66', 'TEST-1906327', 'TEST-1906327', 'TEST-1906327', '2020-01-19', 'TEST-1906327', 'TEST-1906327', 'Single', '66', 'TEST-1906327', 'TEST-1906327', 'TEST-1906327', 'TEST-1906327', 'TEST-1906327', '2020-01-19', 'TEST-1906327', 'TEST-1906327', '2020-01-19', 'TEST-1906327', 'TEST-1906327', '2020-01-19', 'TEST-1906327', 'TEST-1906327', '2020-01-19', 'TEST-1906327', 'TEST-1906327', '2020-01-19', 'TEST-1906327', 'Applicant', NULL, NULL, NULL, '2020-01-19 09:47:57 AM', NULL, NULL, NULL, NULL);

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
-- Table structure for table `dashboard_months`
--

CREATE TABLE `dashboard_months` (
  `ID` int(11) NOT NULL,
  `Year` varchar(4) DEFAULT NULL,
  `Month` varchar(2) DEFAULT NULL,
  `Total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dashboard_months`
--

INSERT INTO `dashboard_months` (`ID`, `Year`, `Month`, `Total`) VALUES
(11, '2020', '02', '0'),
(27, '2020', '04', '0'),
(35, '2020', '05', '0'),
(43, '2020', '06', '0'),
(51, '2020', '07', '0'),
(59, '2020', '08', '0'),
(67, '2020', '09', '0'),
(75, '2020', '10', '0'),
(83, '2020', '11', '0'),
(99, '2019', '01', '0'),
(107, '2019', '02', '0'),
(115, '2019', '03', '0'),
(123, '2019', '04', '0'),
(131, '2019', '05', '0'),
(139, '2019', '06', '0'),
(147, '2019', '07', '0'),
(155, '2019', '08', '0'),
(179, '2019', '11', '0'),
(209, '2018', '01', '0'),
(217, '2018', '02', '0'),
(225, '2018', '03', '0'),
(233, '2018', '04', '0'),
(241, '2018', '05', '0'),
(249, '2018', '06', '0'),
(257, '2018', '07', '0'),
(265, '2018', '08', '0'),
(273, '2018', '09', '0'),
(281, '2018', '10', '0'),
(289, '2018', '11', '0'),
(297, '2018', '12', '0'),
(375, '2017', '01', '0'),
(383, '2017', '02', '0'),
(391, '2017', '03', '0'),
(399, '2017', '04', '0'),
(407, '2017', '05', '0'),
(415, '2017', '06', '0'),
(423, '2017', '07', '0'),
(431, '2017', '08', '0'),
(439, '2017', '09', '0'),
(447, '2017', '10', '0'),
(455, '2017', '11', '0'),
(463, '2017', '12', '0'),
(471, '2016', '01', '0'),
(479, '2016', '02', '0'),
(487, '2016', '03', '0'),
(495, '2016', '04', '0'),
(503, '2016', '05', '0'),
(511, '2016', '06', '0'),
(519, '2016', '07', '0'),
(527, '2016', '08', '0'),
(535, '2016', '09', '0'),
(543, '2016', '10', '0'),
(551, '2016', '11', '0'),
(559, '2016', '12', '0'),
(609, '2015', '01', '0'),
(617, '2015', '02', '0'),
(625, '2015', '03', '0'),
(633, '2015', '04', '0'),
(641, '2015', '05', '0'),
(649, '2015', '06', '0'),
(657, '2015', '07', '0'),
(665, '2015', '08', '0'),
(673, '2015', '09', '0'),
(681, '2015', '10', '0'),
(689, '2015', '11', '0'),
(697, '2015', '12', '0'),
(719, '2014', '01', '0'),
(727, '2014', '02', '0'),
(735, '2014', '03', '0'),
(743, '2014', '04', '0'),
(751, '2014', '05', '0'),
(759, '2014', '06', '0'),
(767, '2014', '07', '0'),
(775, '2014', '08', '0'),
(783, '2014', '09', '0'),
(791, '2014', '10', '0'),
(799, '2014', '11', '0'),
(807, '2014', '12', '0'),
(815, '2013', '01', '0'),
(823, '2013', '02', '0'),
(831, '2013', '03', '0'),
(839, '2013', '04', '0'),
(847, '2013', '05', '0'),
(855, '2013', '06', '0'),
(863, '2013', '07', '0'),
(871, '2013', '08', '0'),
(879, '2013', '09', '0'),
(887, '2013', '10', '0'),
(895, '2013', '11', '0'),
(903, '2013', '12', '0'),
(1056, '5555', '01', '0'),
(1064, '5555', '02', '0'),
(1072, '5555', '03', '0'),
(1080, '5555', '04', '0'),
(1088, '5555', '05', '0'),
(1096, '5555', '06', '0'),
(1104, '5555', '07', '0'),
(1112, '5555', '08', '0'),
(1120, '5555', '09', '0'),
(1128, '5555', '10', '0'),
(1136, '5555', '11', '0'),
(1144, '5555', '12', '0'),
(1173, '2019', '09', '1'),
(1174, '2019', '10', '2'),
(1175, '2019', '12', '6'),
(1176, '2020', '01', '10'),
(1177, '2020', '03', '1'),
(1178, '2020', '12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dummy_hours`
--

CREATE TABLE `dummy_hours` (
  `ID` int(11) NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL,
  `Regular` tinyint(1) NOT NULL,
  `NightShift` tinyint(1) NOT NULL,
  `Holiday` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dummy_hours`
--

INSERT INTO `dummy_hours` (`ID`, `Time`, `Current`, `Regular`, `NightShift`, `Holiday`) VALUES
(1192, '2019-12-10', 'Current', 0, 0, 0),
(1193, '2019-12-11', 'Current', 0, 0, 0),
(1194, '2019-12-12', 'Current', 0, 0, 0),
(1195, '2019-12-13', 'Current', 0, 0, 0),
(1196, '2019-12-14', 'Current', 0, 0, 0),
(1197, '2019-12-15', 'Current', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_No` int(11) NOT NULL,
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
  `ApplicantID` varchar(55) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `Time` varchar(55) DEFAULT NULL,
  `Hours` int(255) DEFAULT NULL,
  `Type` varchar(255) NOT NULL,
  `Overtime` int(11) DEFAULT NULL,
  `Regular` tinyint(1) DEFAULT NULL,
  `NightShift` tinyint(1) DEFAULT NULL,
  `Holiday` tinyint(1) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `Philhealth` varchar(255) DEFAULT NULL,
  `SSS` varchar(255) DEFAULT NULL,
  `Tax` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hours_weekly`
--

INSERT INTO `hours_weekly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Time`, `Hours`, `Type`, `Overtime`, `Regular`, `NightShift`, `Holiday`, `Current`, `HDMF`, `Philhealth`, `SSS`, `Tax`) VALUES
(1, '1', '00006-C', NULL, NULL, '2019-12-10', 4, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '1', '00006-C', NULL, NULL, '2019-12-11', 5, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '1', '00006-C', NULL, NULL, '2019-12-12', 6, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '1', '00006-C', NULL, NULL, '2019-12-13', 7, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '1', '00006-C', NULL, NULL, '2019-12-14', 8, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '1', '00006-C', NULL, NULL, '2019-12-15', 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '1', '00008-A', NULL, NULL, '2019-12-10', 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '1', '00008-A', NULL, NULL, '2019-12-11', 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '1', '00008-A', NULL, NULL, '2019-12-12', 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '1', '00008-A', NULL, NULL, '2019-12-13', 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '1', '00008-A', NULL, NULL, '2019-12-14', 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '1', '00008-A', NULL, NULL, '2019-12-15', 0, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '1', '00001-A', NULL, NULL, '2019-12-10', 0, '', 0, NULL, NULL, NULL, NULL, 'dasd', 'asdaddas', 'asd', 'asdasda'),
(32, '1', '00001-A', NULL, NULL, '2019-12-11', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(33, '1', '00001-A', NULL, NULL, '2019-12-12', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(34, '1', '00001-A', NULL, NULL, '2019-12-13', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(35, '1', '00001-A', NULL, NULL, '2019-12-14', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(36, '1', '00001-A', NULL, NULL, '2019-12-15', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(43, '1', '00007-B', NULL, NULL, '2019-12-10', 10, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(44, '1', '00007-B', NULL, NULL, '2019-12-11', 10, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(45, '1', '00007-B', NULL, NULL, '2019-12-12', 10, '', 10, NULL, NULL, NULL, NULL, '', '', '', ''),
(46, '1', '00007-B', NULL, NULL, '2019-12-13', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(47, '1', '00007-B', NULL, NULL, '2019-12-14', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(48, '1', '00007-B', NULL, NULL, '2019-12-15', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', '');

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
(308, '2019-12-31 08:13:31 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(309, '2019-12-31 02:49:01 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(310, '2019-12-31 02:51:17 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(311, '2019-12-31 02:51:38 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(312, '2019-12-31 02:51:46 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(313, '2019-12-31 04:51:47 PM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(314, '2020-01-01 02:33:16 AM', 'Update', 'Updated weekly hours for 00008-A.', 'http://localhost/ci_wercher_system/Clients'),
(315, '2020-01-01 02:33:26 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(316, '2020-01-01 02:33:34 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(317, '2020-01-01 02:33:39 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(318, '2020-01-01 02:49:22 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(319, '2020-01-01 02:50:34 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(320, '2020-01-01 02:50:39 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(321, '2020-01-01 02:50:47 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(322, '2020-01-01 02:50:53 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(323, '2020-01-01 02:51:20 AM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(324, '2020-01-03 05:38:07 AM', 'Archival', 'Employee ID 00023-A has been blacklisted.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00023-A'),
(325, '2020-01-11 02:33:58 AM', 'Update', 'Updated details on Person ID 00005-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(326, '2020-01-13 09:20:32 PM', 'New', 'New Applicant added! (Name: Dfhdfh, Hfhdfhfdhdh Dhfdhh. | ID: 00012-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00012-A'),
(327, '2020-01-13 09:33:36 PM', 'New', 'New Applicant added! (Name: 78, 78 78. | ID: 00013-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00013-A'),
(328, '2020-01-13 09:34:58 PM', 'Update', 'Updated details on Person ID 00013-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00013-A'),
(329, '2020-01-13 09:35:37 PM', 'New', 'New Applicant added! (Name: 25, 25 25. | ID: 00014-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00014-A'),
(330, '2020-01-13 09:45:03 PM', 'New', 'New Applicant added! (Name: TEST-5438782, TEST-5438782 TEST-5438782. | ID: 00015-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00015-A'),
(331, '2020-01-13 09:45:13 PM', 'New', 'New Applicant added! (Name: TEST-7965240, TEST-7965240 TEST-7965240. | ID: 00016-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00016-A'),
(332, '2020-01-13 09:45:19 PM', 'New', 'New Applicant added! (Name: TEST-8140880, TEST-8140880 TEST-8140880. | ID: 00017-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00017-A'),
(333, '2020-01-13 09:45:23 PM', 'New', 'New Applicant added! (Name: TEST-9763938, TEST-9763938 TEST-9763938. | ID: 00018-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00018-A'),
(334, '2020-01-13 09:45:35 PM', 'New', 'New Applicant added! (Name: TEST-4765684, TEST-4765684 TEST-4765684. | ID: 00019-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00019-A'),
(335, '2020-01-13 09:45:38 PM', 'New', 'New Applicant added! (Name: TEST-3725474, TEST-3725474 TEST-3725474. | ID: 00020-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00020-A'),
(336, '2020-01-14 05:02:09 PM', 'Employment', 'Applicant ID 00016-B has been employed to Client ID 1 for 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00016-B'),
(337, '2020-01-19 02:38:24 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(338, '2020-01-19 03:04:26 PM', 'New', 'New Applicant added! (Name: TEST-3892365, TEST-3892365 TEST-3892365. | ID: 00021-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00021-A'),
(339, '2020-01-19 03:39:18 PM', 'Update', 'Applicant ID 00016-A has their contract extended by -6 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00016-A'),
(340, '2020-01-19 03:39:28 PM', 'Update', 'Applicant ID 00016-A has their contract extended by -5 months!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00016-A'),
(341, '2020-01-19 03:39:39 PM', 'Update', 'Applicant ID 00016-A has their contract extended by -6 months!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00016-A'),
(342, '2020-01-19 04:18:48 PM', 'New', 'A reminder has been set for ID 00016-A, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00016-A'),
(343, '2020-01-19 04:47:57 PM', 'New', 'New Applicant added! (Name: TEST-1906327, TEST-1906327 TEST-1906327. | ID: 00022-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00022-A'),
(344, '2020-01-24 08:26:43 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(345, '2020-01-24 08:26:44 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(346, '2020-01-24 08:41:32 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(347, '2020-01-25 06:35:05 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(348, '2020-01-25 06:47:14 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(349, '2020-01-25 08:40:21 PM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(350, '2020-01-25 08:45:20 PM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(351, '2020-01-25 09:03:38 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(352, '2020-01-25 09:03:56 PM', 'Update', 'Updated weekly hours for 00006-C.', 'http://localhost/ci_wercher_system/Clients'),
(353, '2020-01-25 09:04:06 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(354, '2020-01-25 09:57:49 PM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(355, '2020-01-25 09:59:09 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(356, '2020-01-25 10:19:10 PM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(357, '2020-01-26 05:26:46 PM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients');

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
  `Doc_Image` blob,
  `Doc_File` blob,
  `Doc_FileName` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supp_documents`
--

INSERT INTO `supp_documents` (`ID`, `ApplicantID`, `Doc_Image`, `Doc_File`, `Doc_FileName`, `Type`, `Subject`, `Description`, `Remarks`, `DateAdded`) VALUES
(1, '00006-C', 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f32303070782d596f75547562654d757369635f4c6f676f2e706e67, NULL, NULL, NULL, 'Violation', 'dasdasd', 'asdasd', '2019-12-27'),
(2, '00006-C', 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f6369724e6f2e706e67, NULL, NULL, NULL, 'ABC', '123', '5555', '2019-12-27'),
(19, '00006-C', 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f632d61746f6d5f65322e676966, NULL, NULL, 'Document', '68', '3438', '35634683', '2020-01-12'),
(20, '00006-C', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f707974686f6e336f626a6563746f7269656e74656470726f6772616d6d696e672e706466, NULL, 'Violation', '14616146', '146161415134', '314', '2020-01-12'),
(21, '00006-C', 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f6265616e2e706e67, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f5174355f507974686f6e5f4755495f50726f6772616d6d696e675f436f6f6b626f6f6b2e706466, NULL, 'Violation', 'w58967dx', 's57w47547', '3125vzdts', '2020-01-12'),
(22, '00006-C', 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f626f6e676f6361742e706e67, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f4461776e5f6f665f7468655f417370656374732e706466, 'Dawn_of_the_Asp...', 'Document', '2746cfzsze5', '56xdfg54e6', 'tgzs2356236', '2020-01-12'),
(23, '00006-C', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f507974686f6e5f496e74657276696577732e706466, 'Python_Interviews.pdf', 'Violation', '12345', '135155', '151515', '2020-01-13'),
(24, '00006-C', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d432f507974686f6e5f496e74657276696577735f434f50595f434f50595f434f50595f434f50595f434f50595f434f50595f434f50595f434f50595f434f50592e706466, 'Python_Interviews_COPY_COPY_COPY_COPY_COPY_COPY_COPY_COPY_COPY.pdf', 'Document', '567b4', 'b4', 'b76b64b574', '2020-01-13'),
(25, '00016-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303031362d412f64756d6d792e706466, 'dummy.pdf...', 'Document', 'drag n drop test', 'drag n drop test', 'drag n drop test', '2020-01-16');

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
-- Indexes for table `dashboard_months`
--
ALTER TABLE `dashboard_months`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `my_unique_key` (`Year`,`Month`);

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
-- Indexes for table `supp_documents`
--
ALTER TABLE `supp_documents`
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
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_history`
--
ALTER TABLE `contract_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `dashboard_months`
--
ALTER TABLE `dashboard_months`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1179;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1198;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;

--
-- AUTO_INCREMENT for table `supp_documents`
--
ALTER TABLE `supp_documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
