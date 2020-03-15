-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 09:37 PM
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
(7, 'Level_1', 'Developer', 'Dev-0001', '$2y$10$yJEJbZZiXlqaFAWZE08.geoEc3tfpRGkQyYVACpcy4ukOow.mESim', 'Romel', 'P', 'Cubelo', 'Male', '1573753020');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `ApplicantNo` int(11) NOT NULL,
  `ApplicantImage` blob,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `EmployeeID` varchar(255) DEFAULT NULL,
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
  `ReminderDateString` varchar(255) DEFAULT NULL,
  `ReminderLocked` varchar(255) DEFAULT NULL,
  `Temp_ApplicantID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`ApplicantNo`, `ApplicantImage`, `ApplicantID`, `EmployeeID`, `PositionDesired`, `PositionGroup`, `SalaryExpected`, `LastName`, `FirstName`, `MiddleInitial`, `Gender`, `Age`, `Height`, `Weight`, `Religion`, `BirthDate`, `BirthPlace`, `Citizenship`, `CivilStatus`, `No_OfChildren`, `Address_Present`, `Address_Provincial`, `Address_Manila`, `Phone_No`, `SSS_No`, `EffectiveDateCoverage`, `ResidenceCertificateNo`, `Rcn_At`, `Rcn_On`, `TIN`, `TIN_At`, `TIN_On`, `HDMF`, `HDMF_At`, `HDMF_On`, `PhilHealth`, `PhilHealth_At`, `PhilHealth_On`, `ATM_No`, `Status`, `ClientEmployed`, `DateStarted`, `DateEnds`, `AppliedOn`, `ReminderType`, `ReminderDate`, `ReminderDateString`, `ReminderLocked`, `Temp_ApplicantID`) VALUES
(1, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f696d6167652e6a7067, '00001-A', 'WCHI-0003-20', 'Secretary', 'Office Workers', '20000', 'Tracey', 'Adey', 'K', 'Female', '42', 'TEST-879268', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', 'Single', '87', 'TEST-879268', 'TEST-879268', 'TEST-879268', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'Employed', '2', '2020-03-02 11:25:20 AM', '2020-10-02 11:25:20 AM', '2020-02-17 01:00:09 AM', '', '', '1 month, 5 days', 'No', '00001-B'),
(2, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030322d412f696d616765322e6a7067, '00002-A', 'WCHI-0002-20', 'Manager', 'Office Workers', '2000', 'Mcvarish', 'Renelle', 'S', 'Female', '50', 'TEST-797051', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', 'Single', '18', 'TEST-797051', 'TEST-797051', 'TEST-797051', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'Employed', '2', '2020-03-02 11:25:12 AM', '2020-11-02 11:25:12 AM', '2020-02-17 01:13:00 AM', '', '', NULL, 'No', '00002-B'),
(3, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f696d616765332e6a7067, '00003-A', 'WCB4-4334-20', 'ELE', 'Factory', '10000', 'Verdirosi', 'Melisenda', 'U', 'Female', '33', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', 'Single', '90', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'Blacklisted', '0', '2020-02-21 07:23:35 PM', '2021-05-24 07:23:35 PM', '2020-02-17 01:13:51 AM', 'R_ContractDuration', '39149212', '1 year, 2 months, 27 days', 'Yes', '00003-B'),
(4, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030342d412f696d616765342e6a7067, '00004-A', 'WCHI-0001-20', 'Engineering', 'Factory', '10000', 'Wegener', 'Stuart', 'V', 'Male', '20', 'TEST-1064818', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', 'Married', '3', 'TEST-1064818', 'TEST-1064818', 'TEST-1064818', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'Employed', '2', '2020-03-02 11:25:00 AM', '2021-03-02 11:25:00 AM', '2020-02-19 01:31:19 AM', 'R_ContractDuration', '604800', '7 days', 'No', '00004-B'),
(5, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030352d412f696d616765352e6a7067, '00005-A', 'WCSK&FN-0001-20', 'Q.A. Specialist', 'Office Workers', '30000', 'Newman', 'Robert', 'P', 'Male', '78', 'TEST-6625858', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', 'Single', '0', 'TEST-6625858', 'TEST-6625858', 'TEST-6625858', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'Employed', '4', '2020-02-27 08:42:10 AM', '2020-03-27 08:42:10 AM', '2020-02-19 01:33:29 AM', NULL, NULL, NULL, NULL, '00005-B'),
(6, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d412f696d616765362e6a7067, '00006-A', 'WCB4-0002-20', 'Engineering', 'Factory', '10000', 'Wegener', 'Steve', 'V', 'Male', '', '', '', '', '', '', '', 'Single', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Applicant', '0', '2020-03-02 10:29:47 AM', '2021-03-02 10:29:47 AM', '2020-02-27 01:27:16 AM', NULL, NULL, NULL, NULL, '00006-B');

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
  `EmployeeIDSuffix` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `Name`, `Address`, `ContactNumber`, `EmployeeIDSuffix`, `Status`) VALUES
(1, 'Some Guy', '123456789', '11111111111', 'SG', 'Active'),
(2, 'HELLO', '1', '1', 'HI', 'Active'),
(3, '5', '5', '5', '%', 'Deleted'),
(4, 'Shrek', 'Swamp', '0000000', 'SK&FN', 'Active'),
(5, 'B4', 'test', 'test', 'B4', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `contract_history`
--

CREATE TABLE `contract_history` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `PreviousPosition` varchar(255) DEFAULT NULL,
  `PreviousDateStarted` varchar(255) DEFAULT NULL,
  `PreviousDateEnds` varchar(255) DEFAULT NULL,
  `Client` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract_history`
--

INSERT INTO `contract_history` (`ID`, `ApplicantID`, `PreviousPosition`, `PreviousDateStarted`, `PreviousDateEnds`, `Client`) VALUES
(1, '00001-A', NULL, '2020-02-21 05:24:41 PM', '2020-02-28 05:24:41 PM', 'Client Test'),
(2, '00002-A', NULL, '2020-02-21 05:24:41 PM', '2020-02-28 05:24:41 PM', 'B4'),
(3, '00002-A', NULL, '2020-02-21 05:24:41 PM', '2020-02-28 05:24:41 PM', 'B4'),
(4, '00004-A', NULL, '2020-02-27 08:42:10 AM', '2020-03-27 08:42:10 AM', 'Shrek');

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
(1, '2020', '01', '0'),
(5, '2020', '03', '0'),
(7, '2020', '04', '0'),
(9, '2020', '05', '0'),
(11, '2020', '06', '0'),
(13, '2020', '07', '0'),
(15, '2020', '08', '0'),
(17, '2020', '09', '0'),
(19, '2020', '10', '0'),
(21, '2020', '11', '0'),
(23, '2020', '12', '0'),
(27, '2019', '01', '0'),
(29, '2019', '02', '0'),
(31, '2019', '03', '0'),
(33, '2019', '04', '0'),
(35, '2019', '05', '0'),
(37, '2019', '06', '0'),
(39, '2019', '07', '0'),
(41, '2019', '08', '0'),
(43, '2019', '09', '0'),
(45, '2019', '10', '0'),
(47, '2019', '11', '0'),
(49, '2019', '12', '0'),
(88, '9999', '01', '0'),
(90, '9999', '02', '0'),
(92, '9999', '03', '0'),
(94, '9999', '04', '0'),
(96, '9999', '05', '0'),
(98, '9999', '06', '0'),
(100, '9999', '07', '0'),
(102, '9999', '08', '0'),
(104, '9999', '09', '0'),
(106, '9999', '10', '0'),
(108, '9999', '11', '0'),
(110, '9999', '12', '0'),
(118, '2021', '01', '0'),
(120, '2021', '02', '0'),
(122, '2021', '03', '0'),
(124, '2021', '04', '0'),
(126, '2021', '05', '0'),
(128, '2021', '06', '0'),
(130, '2021', '07', '0'),
(132, '2021', '08', '0'),
(134, '2021', '09', '0'),
(136, '2021', '10', '0'),
(138, '2021', '11', '0'),
(140, '2021', '12', '0'),
(144, '2022', '01', '0'),
(146, '2022', '02', '0'),
(148, '2022', '03', '0'),
(150, '2022', '04', '0'),
(152, '2022', '05', '0'),
(154, '2022', '06', '0'),
(156, '2022', '07', '0'),
(158, '2022', '08', '0'),
(160, '2022', '09', '0'),
(162, '2022', '10', '0'),
(164, '2022', '11', '0'),
(166, '2022', '12', '0'),
(174, '2023', '01', '0'),
(176, '2023', '02', '0'),
(178, '2023', '03', '0'),
(180, '2023', '04', '0'),
(182, '2023', '05', '0'),
(184, '2023', '06', '0'),
(186, '2023', '07', '0'),
(188, '2023', '08', '0'),
(190, '2023', '09', '0'),
(192, '2023', '10', '0'),
(194, '2023', '11', '0'),
(196, '2023', '12', '0'),
(198, '2024', '01', '0'),
(200, '2024', '02', '0'),
(202, '2024', '03', '0'),
(204, '2024', '04', '0'),
(206, '2024', '05', '0'),
(208, '2024', '06', '0'),
(210, '2024', '07', '0'),
(212, '2024', '08', '0'),
(214, '2024', '09', '0'),
(216, '2024', '10', '0'),
(218, '2024', '11', '0'),
(220, '2024', '12', '0'),
(222, '2025', '01', '0'),
(224, '2025', '02', '0'),
(226, '2025', '03', '0'),
(228, '2025', '04', '0'),
(230, '2025', '05', '0'),
(232, '2025', '06', '0'),
(234, '2025', '07', '0'),
(236, '2025', '08', '0'),
(238, '2025', '09', '0'),
(240, '2025', '10', '0'),
(242, '2025', '11', '0'),
(244, '2025', '12', '0'),
(249, '2020', '02', '6');

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
(464, '2020-03-09', 'Current', 0, 0, 0),
(465, '2020-03-10', 'Current', 0, 0, 0),
(466, '2020-03-11', 'Current', 0, 0, 0),
(467, '2020-03-12', 'Current', 0, 0, 0),
(468, '2020-03-13', 'Current', 0, 0, 0),
(469, '2020-03-14', 'Current', 0, 0, 0),
(470, '2020-03-15', 'Current', 0, 0, 0),
(471, '2020-03-16', 'Current', 0, 0, 0);

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
  `NightHours` int(255) DEFAULT NULL,
  `Type` varchar(255) NOT NULL,
  `Overtime` int(11) DEFAULT NULL,
  `NightOvertime` int(11) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `Regular` tinyint(1) DEFAULT NULL,
  `NightShift` tinyint(1) DEFAULT NULL,
  `Holiday` tinyint(1) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `Philhealth` varchar(255) DEFAULT NULL,
  `SSS` varchar(255) DEFAULT NULL,
  `Tax` varchar(255) DEFAULT NULL,
  `day_pay` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hours_weekly`
--

INSERT INTO `hours_weekly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Time`, `Hours`, `NightHours`, `Type`, `Overtime`, `NightOvertime`, `Remarks`, `Regular`, `NightShift`, `Holiday`, `Current`, `HDMF`, `Philhealth`, `SSS`, `Tax`, `day_pay`) VALUES
(65, '2', '00002-A', NULL, NULL, '2020-03-09', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '76.96'),
(66, '2', '00002-A', NULL, NULL, '2020-03-10', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '76.96'),
(67, '2', '00002-A', NULL, NULL, '2020-03-11', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '76.96'),
(68, '2', '00002-A', NULL, NULL, '2020-03-12', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '76.96'),
(69, '2', '00002-A', NULL, NULL, '2020-03-13', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '76.96'),
(70, '2', '00002-A', NULL, NULL, '2020-03-14', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '76.96'),
(71, '2', '00002-A', NULL, NULL, '2020-03-15', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '76.96'),
(72, '2', '00002-A', NULL, NULL, '2020-03-16', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '76.96'),
(169, '2', '00004-A', NULL, NULL, '2020-03-09', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '384.64'),
(170, '2', '00004-A', NULL, NULL, '2020-03-10', 0, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00'),
(171, '2', '00004-A', NULL, NULL, '2020-03-11', 0, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00'),
(172, '2', '00004-A', NULL, NULL, '2020-03-12', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '384.64'),
(173, '2', '00004-A', NULL, NULL, '2020-03-13', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '384.64'),
(174, '2', '00004-A', NULL, NULL, '2020-03-14', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '384.64'),
(175, '2', '00004-A', NULL, NULL, '2020-03-15', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '384.64'),
(176, '2', '00004-A', NULL, NULL, '2020-03-16', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '384.64'),
(209, '2', '00001-A', NULL, NULL, '2020-03-09', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '769.20'),
(210, '2', '00001-A', NULL, NULL, '2020-03-10', 0, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00'),
(211, '2', '00001-A', NULL, NULL, '2020-03-11', 0, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00'),
(212, '2', '00001-A', NULL, NULL, '2020-03-12', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '769.20'),
(213, '2', '00001-A', NULL, NULL, '2020-03-13', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '769.20'),
(214, '2', '00001-A', NULL, NULL, '2020-03-14', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '769.20'),
(215, '2', '00001-A', NULL, NULL, '2020-03-15', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '769.20'),
(216, '2', '00001-A', NULL, NULL, '2020-03-16', 8, 0, '', 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '769.20');

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
(1, '2020-02-19 08:27:28 AM', 'Archival', 'Employee ID 00001-A has been restored as an Applicant.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(2, '2020-02-19 08:27:58 AM', 'Employment', 'Applicant ID 00001-B has been employed to Client ID 1 for 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-B'),
(3, '2020-02-19 08:31:19 AM', 'New', 'New Applicant added! (Name: Wegener, Stuart TEST-1064818. | ID: 00004-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(4, '2020-02-19 08:31:33 AM', 'Update', 'Updated details on Person ID 00004-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(5, '2020-02-19 08:33:29 AM', 'New', 'New Applicant added! (Name: Newman, Robert P.. | ID: 00005-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(6, '2020-02-19 08:33:41 AM', 'Update', 'Updated details on Person ID 00005-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(7, '2020-02-19 08:40:54 AM', 'New', 'New Admin added! (Name: Santos, Joshua Y. | Position: Developer)', 'http://localhost/ci_wercher_system/Admin_List'),
(8, '2020-02-19 08:48:12 AM', 'New', 'New Client added! (Name: Client Test | Contact: Test)', 'http://localhost/ci_wercher_system/Clients'),
(9, '2020-02-19 09:00:41 AM', 'Note', 'Added new note for 00001-A.', NULL),
(10, '2020-02-19 09:01:42 AM', 'Update', 'Employee ID 00003-A has been restored as an Applicant.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(11, '2020-02-21 05:24:41 PM', 'Employment', 'Applicant ID 00004-B has been employed to Client ID 0 for 7 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-B'),
(12, '2020-02-21 07:23:35 PM', 'Employment', 'Applicant ID 00003-B has been employed to Client ID 0 for 1 year, 3 months!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-B'),
(13, '2020-02-21 07:26:27 PM', 'New', 'A reminder has been set for ID 00001-A, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(14, '2020-02-22 05:08:46 AM', 'New', 'A reminder has been set for ID 00001-A, alerting after 2 months!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(15, '2020-02-22 05:08:50 AM', 'New', 'A reminder has been set for ID 00001-A, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(16, '2020-02-22 05:08:54 AM', 'New', 'A reminder has been set for ID 00001-A, alerting after 30 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(17, '2020-02-22 05:20:28 AM', 'Update', 'Applicant ID 00001-A has their contract extended by -5 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(18, '2020-02-22 05:20:44 AM', 'Update', 'Applicant ID 00001-A has their contract extended by -20 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(19, '2020-02-22 06:11:21 AM', 'New', 'A reminder has been set for ID 00004-A, alerting after 3 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(20, '2020-02-22 06:11:39 AM', 'New', 'A reminder has been set for ID 00004-A, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(21, '2020-02-22 06:11:43 AM', 'New', 'A reminder has been set for ID 00004-A, alerting after 31 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(22, '2020-02-22 06:11:47 AM', 'New', 'A reminder has been set for ID 00004-A, alerting after 29 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(23, '2020-02-22 09:22:28 AM', 'New', 'A reminder has been set for ID 00001-A, alerting after 5 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(24, '2020-02-22 09:23:20 AM', 'New', 'A reminder has been set for ID 00001-A, alerting after 2 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(25, '2020-02-22 09:23:20 AM', 'Reminder', 'Employee 00001-A is expiring in 0 years, 0 months, 2 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(26, '2020-02-22 09:23:43 AM', 'New', 'A reminder has been set for ID 00001-A, alerting after 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(27, '2020-02-22 09:25:33 AM', 'New', 'A reminder has been set for ID 00001-A, alerting after 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(28, '2020-02-22 09:25:40 AM', 'New', 'A reminder has been set for ID 00001-A, alerting after 1 month, 5 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(29, '2020-02-23 08:33:49 AM', 'Update', 'Employee 00001-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(30, '2020-02-23 08:34:59 AM', 'New', 'A reminder has been set for ID 00004-A, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(31, '2020-02-23 08:39:12 AM', 'New', 'A reminder has been set for ID 00004-A, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(32, '2020-02-23 08:39:14 AM', 'New', 'A reminder has been set for ID 00004-A, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(33, '2020-02-23 08:39:52 AM', 'New', 'A reminder has been set for ID 00004-A, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(34, '2020-02-23 08:40:37 AM', 'New', 'A reminder has been set for ID 00003-A, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(35, '2020-02-23 02:14:03 PM', 'New', 'A reminder has been set for ID 00003-A, alerting after 2 months!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(36, '2020-02-23 02:14:07 PM', 'New', 'A reminder has been set for ID 00003-A, alerting after 1 year, 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(37, '2020-02-23 02:14:07 PM', 'Reminder', 'Employee 00003-A is expiring in 1 year, 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(38, '2020-02-23 02:14:11 PM', 'New', 'A reminder has been set for ID 00003-A, alerting after 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(39, '2020-02-23 02:14:11 PM', 'Reminder', 'Employee 00003-A is expiring in 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(40, '2020-02-23 02:14:18 PM', 'New', 'A reminder has been set for ID 00003-A, alerting after 1 year, 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(41, '2020-02-23 02:14:53 PM', 'New', 'A reminder has been set for ID 00003-A, alerting after 1 year, 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(42, '2020-02-23 02:15:09 PM', 'New', 'A reminder has been set for ID 00003-A, alerting after 1 year, 2 months, 27 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(43, '2020-02-23 02:15:10 PM', 'Reminder', 'Employee 00003-A is expiring in 1 year, 2 months, 27 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(44, '2020-02-23 02:22:59 PM', 'Update', 'Applicant ID 00003-A has their contract extended by 3 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A#Contract'),
(45, '2020-02-24 10:39:26 AM', 'New', 'New Client added! (Name: B4 | Contact: test)', 'http://localhost/ci_wercher_system/Clients'),
(46, '2020-02-24 04:52:19 PM', 'Employment', 'Applicant ID 00002-B has been employed to Client ID 0 for 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-B'),
(47, '2020-02-24 04:53:13 PM', 'Update', 'Applicant ID 00002-A has their contract extended by -1 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract'),
(48, '2020-02-24 04:53:13 PM', 'Update', 'Employee 00002-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(49, '2020-02-24 04:53:50 PM', 'Employment', 'Applicant ID 00002-B has been employed to Client ID 0 for 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-B'),
(50, '2020-02-24 09:24:57 PM', 'Update', 'Updated details on Person ID 00003-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(51, '2020-02-24 09:26:12 PM', 'Update', 'Updated details on Person ID 00003-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(52, '2020-02-24 09:27:55 PM', 'Update', 'Updated details on Person ID 00003-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(53, '2020-02-24 10:10:26 PM', 'Update', 'Updated details on Person ID 00002-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(54, '2020-02-24 10:14:38 PM', 'Update', 'Updated details on Person ID 00005-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(55, '2020-02-25 08:33:32 PM', 'Update', 'Employee 00002-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(56, '2020-02-27 07:32:37 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(57, '2020-02-27 07:33:03 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(58, '2020-02-27 07:39:58 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(59, '2020-02-27 07:40:23 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(60, '2020-02-27 07:42:17 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(61, '2020-02-27 07:42:24 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(62, '2020-02-27 07:42:33 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(63, '2020-02-27 07:45:47 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(64, '2020-02-27 07:47:38 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(65, '2020-02-27 07:49:15 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(66, '2020-02-27 08:27:16 AM', 'New', 'New Applicant added! (Name: Wegener, Steve . | ID: 00006-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00006-A'),
(67, '2020-02-27 08:34:39 AM', 'Update', 'Updated details on Person ID 00005-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-A'),
(68, '2020-02-27 08:34:50 AM', 'Update', 'Updated details on Person ID 00006-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00006-A'),
(69, '2020-02-27 08:35:00 AM', 'Update', 'Updated details on Person ID 00006-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00006-A'),
(70, '2020-02-27 08:42:10 AM', 'Employment', 'Applicant ID 00005-B has been employed to Client ID 4 for 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00005-B'),
(71, '2020-02-29 12:44:12 AM', 'Update', 'Employee 00004-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(72, '2020-02-29 02:45:28 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(73, '2020-02-29 02:48:22 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(74, '2020-02-29 02:57:26 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(75, '2020-02-29 03:14:14 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(76, '2020-02-29 03:15:22 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(77, '2020-02-29 03:16:51 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(78, '2020-02-29 03:17:46 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(79, '2020-02-29 03:19:28 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(80, '2020-02-29 03:20:01 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(81, '2020-02-29 03:32:49 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(82, '2020-02-29 03:33:16 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(83, '2020-02-29 03:33:39 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(84, '2020-02-29 03:37:07 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(85, '2020-02-29 03:45:50 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(86, '2020-02-29 03:46:46 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(87, '2020-02-29 03:59:24 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(88, '2020-02-29 04:00:30 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(89, '2020-02-29 04:01:39 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(90, '2020-02-29 04:02:33 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(91, '2020-02-29 04:02:56 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(92, '2020-02-29 04:03:48 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(93, '2020-02-29 04:07:24 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(94, '2020-02-29 04:09:26 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(95, '2020-02-29 04:09:51 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(96, '2020-02-29 04:10:00 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(97, '2020-02-29 04:10:05 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(98, '2020-02-29 04:10:19 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(99, '2020-02-29 04:10:57 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(100, '2020-02-29 04:11:09 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(101, '2020-02-29 04:11:24 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(102, '2020-02-29 04:11:56 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(103, '2020-02-29 04:12:27 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(104, '2020-02-29 04:12:36 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(105, '2020-02-29 04:15:40 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(106, '2020-02-29 04:16:04 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(107, '2020-02-29 04:16:52 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(108, '2020-02-29 04:17:11 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(109, '2020-02-29 04:19:01 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(110, '2020-02-29 04:19:30 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(111, '2020-02-29 04:19:55 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(112, '2020-02-29 04:20:27 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(113, '2020-02-29 04:20:44 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(114, '2020-02-29 04:20:58 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(115, '2020-02-29 04:21:04 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(116, '2020-02-29 04:21:19 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(117, '2020-02-29 04:21:25 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(118, '2020-02-29 04:21:35 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(119, '2020-02-29 04:21:43 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(120, '2020-02-29 04:22:05 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(121, '2020-02-29 04:22:16 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(122, '2020-02-29 04:22:21 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(123, '2020-02-29 04:22:26 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(124, '2020-02-29 04:26:35 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(125, '2020-02-29 04:28:15 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(126, '2020-02-29 04:28:27 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(127, '2020-02-29 04:28:49 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(128, '2020-02-29 04:29:02 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(129, '2020-02-29 04:29:16 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(130, '2020-02-29 04:29:47 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(131, '2020-02-29 04:29:51 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(132, '2020-02-29 04:30:25 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(133, '2020-02-29 04:31:28 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(134, '2020-02-29 04:31:41 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(135, '2020-02-29 04:34:13 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(136, '2020-02-29 04:34:21 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(137, '2020-02-29 04:34:27 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(138, '2020-02-29 04:34:34 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(139, '2020-02-29 04:34:39 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(140, '2020-02-29 04:35:20 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(141, '2020-02-29 04:35:27 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(142, '2020-02-29 04:35:35 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(143, '2020-02-29 04:36:03 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(144, '2020-02-29 04:38:47 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(145, '2020-02-29 04:39:10 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(146, '2020-02-29 04:39:43 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(147, '2020-02-29 04:40:38 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(148, '2020-02-29 04:40:50 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(149, '2020-02-29 04:40:59 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(150, '2020-02-29 04:41:04 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(151, '2020-02-29 04:41:30 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(152, '2020-02-29 04:44:02 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(153, '2020-02-29 04:44:21 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(154, '2020-02-29 04:46:47 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(155, '2020-02-29 04:48:37 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(156, '2020-02-29 04:49:07 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(157, '2020-02-29 05:01:23 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(158, '2020-03-01 05:32:20 PM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(159, '2020-03-01 06:15:42 PM', 'Update', 'Updated weekly hours for 00005-A.', 'http://localhost/ci_wercher_system/Clients'),
(160, '2020-03-01 09:27:22 PM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(161, '2020-03-01 09:28:23 PM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(162, '2020-03-01 10:22:06 PM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(163, '2020-03-01 10:22:51 PM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(164, '2020-03-02 10:29:47 AM', 'Employment', 'Applicant ID 00006-B has been employed to Client ID 0 for 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00006-B'),
(165, '2020-03-02 10:30:59 AM', 'Update', 'Updated weekly hours for 00006-A.', 'http://localhost/ci_wercher_system/Clients'),
(166, '2020-03-02 10:55:22 AM', 'Update', 'Updated weekly hours for 00003-A.', 'http://localhost/ci_wercher_system/Clients'),
(167, '2020-03-02 11:18:48 AM', 'Note', 'Added new note for 00001-A.', NULL),
(168, '2020-03-02 11:22:17 AM', 'New', 'New Client added! (Name: 123213 | Contact: 12332)', 'http://localhost/ci_wercher_system/Clients'),
(169, '2020-03-02 11:23:19 AM', 'New', 'New Client added! (Name: Test Client | Contact: 123213213123)', 'http://localhost/ci_wercher_system/Clients'),
(170, '2020-03-02 11:25:01 AM', 'Employment', 'Applicant ID 00004-B has been employed to Client ID 2 for 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-B'),
(171, '2020-03-02 11:25:12 AM', 'Employment', 'Applicant ID 00002-B has been employed to Client ID 2 for 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-B'),
(172, '2020-03-02 11:25:20 AM', 'Employment', 'Applicant ID 00001-B has been employed to Client ID 2 for 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-B'),
(173, '2020-03-02 11:25:30 AM', 'Update', 'Applicant ID 00001-A has their contract extended by -5 months!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract'),
(174, '2020-03-02 11:25:43 AM', 'Update', 'Applicant ID 00002-A has their contract extended by -4 months!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract'),
(175, '2020-03-02 11:26:56 AM', 'New', 'A reminder has been set for ID 00004-A, alerting after 7 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00004-A'),
(176, '2020-03-13 01:55:49 PM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(177, '2020-03-15 01:14:46 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(178, '2020-03-15 01:15:25 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(179, '2020-03-15 01:16:39 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(180, '2020-03-15 01:16:58 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(181, '2020-03-15 01:46:57 PM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(182, '2020-03-15 01:50:07 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(183, '2020-03-15 01:55:31 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(184, '2020-03-15 01:57:17 PM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(185, '2020-03-16 03:17:43 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(186, '2020-03-16 03:18:08 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(187, '2020-03-16 03:20:32 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(188, '2020-03-16 03:21:00 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(189, '2020-03-16 03:22:29 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(190, '2020-03-16 03:25:53 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(191, '2020-03-16 03:27:08 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(192, '2020-03-16 03:27:40 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(193, '2020-03-16 03:32:10 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(194, '2020-03-16 03:35:24 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(195, '2020-03-16 03:37:39 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(196, '2020-03-16 03:38:33 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(197, '2020-03-16 03:44:36 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(198, '2020-03-16 03:46:37 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(199, '2020-03-16 03:46:48 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(200, '2020-03-16 03:47:15 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(201, '2020-03-16 03:47:37 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(202, '2020-03-16 03:53:49 AM', 'Update', 'Updated weekly hours for 00002-A.', 'http://localhost/ci_wercher_system/Clients'),
(203, '2020-03-16 03:54:01 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(204, '2020-03-16 03:54:16 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(205, '2020-03-16 04:04:36 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(206, '2020-03-16 04:06:50 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(207, '2020-03-16 04:07:25 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(208, '2020-03-16 04:13:35 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(209, '2020-03-16 04:14:38 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(210, '2020-03-16 04:15:51 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(211, '2020-03-16 04:17:22 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(212, '2020-03-16 04:18:51 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(213, '2020-03-16 04:19:46 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(214, '2020-03-16 04:21:16 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(215, '2020-03-16 04:33:31 AM', 'Update', 'Updated weekly hours for 00004-A.', 'http://localhost/ci_wercher_system/Clients'),
(216, '2020-03-16 04:33:42 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(217, '2020-03-16 04:33:52 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(218, '2020-03-16 04:34:04 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(219, '2020-03-16 04:34:23 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients'),
(220, '2020-03-16 04:37:15 AM', 'Update', 'Updated weekly hours for 00001-A.', 'http://localhost/ci_wercher_system/Clients');

-- --------------------------------------------------------

--
-- Table structure for table `machine_operated`
--

CREATE TABLE `machine_operated` (
  `No` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `MachineName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `sss_table`
--

CREATE TABLE `sss_table` (
  `id` int(11) NOT NULL,
  `f_range` varchar(255) DEFAULT NULL,
  `t_range` varchar(255) DEFAULT NULL,
  `contribution` varchar(255) DEFAULT NULL,
  `last_update` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sss_table`
--

INSERT INTO `sss_table` (`id`, `f_range`, `t_range`, `contribution`, `last_update`) VALUES
(1, '0', '2250', '160', NULL),
(2, '2250', '2750', '200', NULL),
(3, '2750', '3249.99', '240', NULL),
(4, '3250', '3749.99', '280', NULL),
(5, '333333', '3333333', '500', NULL),
(6, '4334', '55444', '380', NULL);

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
(1, '00001-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f64756d6d792e706466, 'dummy.pdf', 'Blacklist', 'blacklist test', 'hello', '12345', '2020-02-17'),
(2, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d792e706466, 'dummy.pdf', 'Document', 'Hello', '12345', '12345', '2020-02-17'),
(3, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79312e706466, 'dummy1.pdf', 'Document', 'a', 'a', 'a', '2020-02-17'),
(4, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79322e706466, 'dummy2.pdf', 'Document', '1476', '1616134', '1234', '2020-02-17'),
(5, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79332e706466, 'dummy3.pdf', 'Document', 'test test', '1231', '312331', '2020-02-19'),
(6, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79342e706466, 'dummy4.pdf', 'Document', '134', '1341341341', '13135135', '2020-02-19'),
(7, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79352e706466, 'dummy5.pdf', 'Document', '123', '12321312', '3123123123', '2020-02-19'),
(8, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79362e706466, 'dummy6.pdf', 'Blacklist', '2nd blacklist test', 'hellooo', '12345', '2020-02-19'),
(9, '00004-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030342d412f64756d6d792e706466, 'dummy.pdf', 'Document', 'testtest', '123131312', '3123213', '2020-02-23'),
(10, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79372e706466, 'dummy7.pdf', 'Document', 'testtest', '1231313', '123213131', '2020-02-23'),
(11, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79382e706466, 'dummy8.pdf', 'Blacklist', '123133132', '1231313', '13213132', '2020-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `tab_documents_notes`
--

CREATE TABLE `tab_documents_notes` (
  `DatabaseID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `Note` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tab_documents_notes`
--

INSERT INTO `tab_documents_notes` (`DatabaseID`, `ApplicantID`, `Note`, `DateAdded`) VALUES
(1, '00001-A', 'Hello', '2020-02-19 02:00:41 AM'),
(2, '00001-A', 'hekllo', '2020-03-02 04:18:48 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_table`
--

CREATE TABLE `tracking_table` (
  `id` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `gross_pay` varchar(255) DEFAULT NULL,
  `TotalHours` varchar(255) DEFAULT NULL,
  `TotaOT` varchar(255) DEFAULT NULL,
  `sss_contri` varchar(255) DEFAULT NULL,
  `net_pay` varchar(255) DEFAULT NULL,
  `c_week` int(11) DEFAULT NULL,
  `c_month` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking_table`
--

INSERT INTO `tracking_table` (`id`, `ApplicantID`, `ClientID`, `gross_pay`, `TotalHours`, `TotaOT`, `sss_contri`, `net_pay`, `c_week`, `c_month`) VALUES
(1, '00001-A', '2', '4615.2', '48', '0', '380', '4235.2', 1, '2020/03/16');

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
-- Indexes for table `sss_table`
--
ALTER TABLE `sss_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supp_documents`
--
ALTER TABLE `supp_documents`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tab_documents_notes`
--
ALTER TABLE `tab_documents_notes`
  ADD PRIMARY KEY (`DatabaseID`);

--
-- Indexes for table `tracking_table`
--
ALTER TABLE `tracking_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acad_history`
--
ALTER TABLE `acad_history`
  MODIFY `Acad_No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contract_history`
--
ALTER TABLE `contract_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dashboard_months`
--
ALTER TABLE `dashboard_months`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `sss_table`
--
ALTER TABLE `sss_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supp_documents`
--
ALTER TABLE `supp_documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tab_documents_notes`
--
ALTER TABLE `tab_documents_notes`
  MODIFY `DatabaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tracking_table`
--
ALTER TABLE `tracking_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
