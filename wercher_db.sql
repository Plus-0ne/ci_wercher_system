-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2020 at 10:01 AM
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
  `ApplicantImage` blob DEFAULT NULL,
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
(1, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f696d6167652e6a7067, '00001-A', NULL, 'Secretary', 'Office Workers', '20000', 'Tracey', 'Adey', 'K', 'Female', '42', 'TEST-879268', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', 'Single', '87', 'TEST-879268', 'TEST-879268', 'TEST-879268', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'Expired', '', '', '2020-02-23 08:27:58 AM', '2020-02-17 01:00:09 AM', '', '', '1 month, 5 days', 'No', '00001-B'),
(2, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030322d412f696d616765322e6a7067, '00002-A', 'WCB4-0003-20', 'Manager', 'Office Workers', '25000', 'Mcvarish', 'Renelle', 'S', 'Female', '50', 'TEST-797051', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', 'Single', '18', 'TEST-797051', 'TEST-797051', 'TEST-797051', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'Employed', '0', '2020-02-24 04:53:50 PM', '2020-02-25 04:53:50 PM', '2020-02-17 01:13:00 AM', '', '', NULL, 'No', '00002-B'),
(3, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f696d616765332e6a7067, '00003-A', NULL, 'ELE', 'Factory', '', 'Verdirosi', 'Melisenda', 'U', 'Female', '33', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', 'Single', '90', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'Employed', '0', '2020-02-21 07:23:35 PM', '2021-05-24 07:23:35 PM', '2020-02-17 01:13:51 AM', 'R_ContractDuration', '39149212', '1 year, 2 months, 27 days', 'Yes', '00003-B'),
(4, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030342d412f696d616765342e6a7067, '00004-A', NULL, 'Engineering', 'Factory', '50000', 'Wegener', 'Stuart', 'V', 'Male', '20', 'TEST-1064818', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', 'Married', '3', 'TEST-1064818', 'TEST-1064818', 'TEST-1064818', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'TEST-1064818', '2020-02-19', 'TEST-1064818', 'Employed', '0', '2020-02-21 05:24:41 PM', '2020-02-28 05:24:41 PM', '2020-02-19 01:31:19 AM', 'R_ContractDuration', '2629743', '1 month', 'No', '00004-B'),
(5, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030352d412f696d616765352e6a7067, '00005-A', NULL, 'Q.A. Specialist', 'Office Workers', NULL, 'Newman', 'Robert', 'P', 'Male', '78', 'TEST-6625858', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', 'Single', '0', 'TEST-6625858', 'TEST-6625858', 'TEST-6625858', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'TEST-6625858', '2020-02-19', 'TEST-6625858', 'Applicant', NULL, NULL, NULL, '2020-02-19 01:33:29 AM', NULL, NULL, NULL, NULL, NULL);

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
(0, 'B4', 'test', 'test', 'B4', 'Active'),
(1, 'Some Guy', '123456789', '11111111111', 'SG', 'Active'),
(2, 'HELLO', '1', '1', 'HI', 'Active'),
(3, '5', '5', '5', '%', 'Deleted'),
(4, 'Shrek', 'Swamp', '0000000', 'SK&FN', 'Active');

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
(2, '00002-A', NULL, '2020-02-21 05:24:41 PM', '2020-02-28 05:24:41 PM', 'B4');

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
(58, '2020', '02', '5');

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
(33, '2020-02-16', 'Current', 0, 0, 0),
(34, '2020-02-17', 'Current', 0, 0, 0),
(35, '2020-02-18', 'Current', 0, 0, 0),
(36, '2020-02-19', 'Current', 0, 0, 0),
(37, '2020-02-20', 'Current', 0, 0, 0),
(38, '2020-02-21', 'Current', 0, 0, 0),
(39, '2020-02-22', 'Current', 0, 0, 0),
(40, '2020-02-23', 'Current', 0, 0, 0);

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
(1, '1', '00001-B', 'Tracey, Adey K.', '5000', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '0', '00004-B', 'Wegener, Stuart V.', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '0', '00003-B', 'Verdirosi, Melisenda U.', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '0', '00002-B', 'Mcvarish, Renelle S.', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '0', '00002-B', 'Mcvarish, Renelle S.', '25000', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(49, '2020-02-24 04:53:50 PM', 'Employment', 'Applicant ID 00002-B has been employed to Client ID 0 for 1 day!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-B');

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
-- Table structure for table `supp_documents`
--

CREATE TABLE `supp_documents` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `Doc_Image` blob DEFAULT NULL,
  `Doc_File` blob DEFAULT NULL,
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
(10, '00003-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79372e706466, 'dummy7.pdf', 'Document', 'testtest', '1231313', '123213131', '2020-02-23');

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
(1, '00001-A', 'Hello', '2020-02-19 02:00:41 AM');

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
-- Indexes for table `tab_documents_notes`
--
ALTER TABLE `tab_documents_notes`
  ADD PRIMARY KEY (`DatabaseID`);

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
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_history`
--
ALTER TABLE `contract_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dashboard_months`
--
ALTER TABLE `dashboard_months`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `supp_documents`
--
ALTER TABLE `supp_documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tab_documents_notes`
--
ALTER TABLE `tab_documents_notes`
  MODIFY `DatabaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
