-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 02:32 AM
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
(5, '00005-A', 'High School', '2', '2', '3', '3', '3'),
(6, '00022-A', 'High School', 'Highschool 101', 'Europe', '1000', '2000', '5000'),
(7, '00002-A', 'College', '11', '1531351351', '5135', '3513', '15135135');

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
(1, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f696d6167652e6a7067, '00001-A', 'Secretary', 'Office Workers', '5000', 'Tracey', 'Adey', 'K', 'Female', '42', 'TEST-879268', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', 'Single', '87', 'TEST-879268', 'TEST-879268', 'TEST-879268', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'TEST-879268', '2020-02-17', 'TEST-879268', 'Blacklisted', '1', '2020-02-17 08:01:59 AM', '2020-03-17 08:01:59 AM', '2020-02-17 01:00:09 AM', NULL, NULL, NULL, '00001-B'),
(2, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030322d412f696d616765322e6a7067, '00002-A', 'Manager', 'Office Workers', NULL, 'Mcvarish', 'Renelle', 'S', 'Female', '50', 'TEST-797051', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', 'Single', '18', 'TEST-797051', 'TEST-797051', 'TEST-797051', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'TEST-797051', '2020-02-17', 'TEST-797051', 'Applicant', NULL, NULL, NULL, '2020-02-17 01:13:00 AM', NULL, NULL, NULL, NULL),
(3, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f696d616765332e6a7067, '00003-A', 'ELE', 'Factory', NULL, 'Verdirosi', 'Melisenda', 'U', 'Female', '33', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', 'Single', '90', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'TEST-5516017', '2020-02-17', 'TEST-5516017', 'Employed', '1', '2020-02-17 08:26:18 AM', '2021-02-17 08:26:18 AM', '2020-02-17 01:13:51 AM', NULL, NULL, NULL, '00003-B');

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
(1196, '2020', '01', '11'),
(1197, '2020', '03', '1'),
(1198, '2020', '12', '1'),
(1248, '2025', '01', '0'),
(1249, '2025', '02', '0'),
(1250, '2025', '03', '0'),
(1251, '2025', '04', '0'),
(1252, '2025', '05', '0'),
(1253, '2025', '06', '0'),
(1254, '2025', '07', '0'),
(1255, '2025', '08', '0'),
(1256, '2025', '09', '0'),
(1257, '2025', '10', '0'),
(1258, '2025', '11', '0'),
(1259, '2025', '12', '0'),
(1260, '2026', '01', '0'),
(1261, '2026', '02', '0'),
(1262, '2026', '03', '0'),
(1263, '2026', '04', '0'),
(1264, '2026', '05', '0'),
(1265, '2026', '06', '0'),
(1266, '2026', '07', '0'),
(1267, '2026', '08', '0'),
(1268, '2026', '09', '0'),
(1269, '2026', '10', '0'),
(1270, '2026', '11', '0'),
(1271, '2026', '12', '0'),
(1272, '2027', '01', '0'),
(1273, '2027', '02', '0'),
(1274, '2027', '03', '0'),
(1275, '2027', '04', '0'),
(1276, '2027', '05', '0'),
(1277, '2027', '06', '0'),
(1278, '2027', '07', '0'),
(1279, '2027', '08', '0'),
(1280, '2027', '09', '0'),
(1281, '2027', '10', '0'),
(1282, '2027', '11', '0'),
(1283, '2027', '12', '0'),
(1284, '2028', '01', '0'),
(1285, '2028', '02', '0'),
(1286, '2028', '03', '0'),
(1287, '2028', '04', '0'),
(1288, '2028', '05', '0'),
(1289, '2028', '06', '0'),
(1290, '2028', '07', '0'),
(1291, '2028', '08', '0'),
(1292, '2028', '09', '0'),
(1293, '2028', '10', '0'),
(1294, '2028', '11', '0'),
(1295, '2028', '12', '0'),
(1296, '2024', '01', '0'),
(1297, '2024', '02', '0'),
(1298, '2024', '03', '0'),
(1299, '2024', '04', '0'),
(1300, '2024', '05', '0'),
(1301, '2024', '06', '0'),
(1302, '2024', '07', '0'),
(1303, '2024', '08', '0'),
(1304, '2024', '09', '0'),
(1305, '2024', '10', '0'),
(1306, '2024', '11', '0'),
(1307, '2024', '12', '0'),
(1308, '2023', '01', '0'),
(1309, '2023', '02', '0'),
(1310, '2023', '03', '0'),
(1311, '2023', '04', '0'),
(1312, '2023', '05', '0'),
(1313, '2023', '06', '0'),
(1314, '2023', '07', '0'),
(1315, '2023', '08', '0'),
(1316, '2023', '09', '0'),
(1317, '2023', '10', '0'),
(1318, '2023', '11', '0'),
(1319, '2023', '12', '0'),
(1320, '2022', '01', '0'),
(1321, '2022', '02', '0'),
(1322, '2022', '03', '0'),
(1323, '2022', '04', '0'),
(1324, '2022', '05', '0'),
(1325, '2022', '06', '0'),
(1326, '2022', '07', '0'),
(1327, '2022', '08', '0'),
(1328, '2022', '09', '0'),
(1329, '2022', '10', '0'),
(1330, '2022', '11', '0'),
(1331, '2022', '12', '0'),
(1332, '2021', '01', '0'),
(1333, '2021', '02', '0'),
(1334, '2021', '03', '0'),
(1335, '2021', '04', '0'),
(1336, '2021', '05', '0'),
(1337, '2021', '06', '0'),
(1338, '2021', '07', '0'),
(1339, '2021', '08', '0'),
(1340, '2021', '09', '0'),
(1341, '2021', '10', '0'),
(1342, '2021', '11', '0'),
(1343, '2021', '12', '0'),
(1344, '2019', '01', '0'),
(1345, '2019', '02', '0'),
(1346, '2019', '03', '0'),
(1347, '2019', '04', '0'),
(1348, '2019', '05', '0'),
(1349, '2019', '06', '0'),
(1350, '2019', '07', '0'),
(1351, '2019', '08', '0'),
(1352, '2019', '09', '0'),
(1353, '2019', '10', '0'),
(1354, '2019', '11', '0'),
(1355, '2019', '12', '0');

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
(1294, '2020-02-10', 'Current', 0, 0, 0),
(1295, '2020-02-11', 'Current', 0, 0, 0),
(1296, '2020-02-12', 'Current', 0, 0, 0),
(1297, '2020-02-13', 'Current', 0, 0, 0),
(1298, '2020-02-14', 'Current', 0, 0, 0),
(1299, '2020-02-15', 'Current', 0, 0, 0),
(1300, '2020-02-16', 'Current', 0, 0, 0),
(1301, '2020-02-17', 'Current', 0, 0, 0);

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
(49, '1', '00023-B', 'Elbertson, Jeremy E.', 'zdy34616', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '1', '00014-B', '25, 25 25.', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '1', '00006-C', NULL, NULL, '2019-12-10', 4, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(52, '1', '00006-C', NULL, NULL, '2019-12-11', 5, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(53, '1', '00006-C', NULL, NULL, '2019-12-12', 6, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(54, '1', '00006-C', NULL, NULL, '2019-12-13', 7, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(55, '1', '00006-C', NULL, NULL, '2019-12-14', 8, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(56, '1', '00006-C', NULL, NULL, '2019-12-15', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(57, '1', '00007-B', NULL, NULL, '2019-12-10', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(58, '1', '00007-B', NULL, NULL, '2019-12-11', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(59, '1', '00007-B', NULL, NULL, '2019-12-12', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(60, '1', '00007-B', NULL, NULL, '2019-12-13', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(61, '1', '00007-B', NULL, NULL, '2019-12-14', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(62, '1', '00007-B', NULL, NULL, '2019-12-15', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(63, '1', '00001-A', NULL, NULL, '2019-12-10', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(64, '1', '00001-A', NULL, NULL, '2019-12-11', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(65, '1', '00001-A', NULL, NULL, '2019-12-12', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(66, '1', '00001-A', NULL, NULL, '2019-12-13', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(67, '1', '00001-A', NULL, NULL, '2019-12-14', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(68, '1', '00001-A', NULL, NULL, '2019-12-15', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(69, '1', '00008-A', NULL, NULL, '2019-12-10', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(70, '1', '00008-A', NULL, NULL, '2019-12-11', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(71, '1', '00008-A', NULL, NULL, '2019-12-12', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(72, '1', '00008-A', NULL, NULL, '2019-12-13', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(73, '1', '00008-A', NULL, NULL, '2019-12-14', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(74, '1', '00008-A', NULL, NULL, '2019-12-15', 0, '', 0, NULL, NULL, NULL, NULL, '', '', '', ''),
(76, '1', '00001-B', 'Tracey, Adey K.', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, '1', '00003-B', 'Verdirosi, Melisenda U.', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(357, '2020-01-26 05:26:46 PM', 'Update', 'Updated weekly hours for 00007-B.', 'http://localhost/ci_wercher_system/Clients'),
(358, '2020-02-07 11:49:40 AM', 'Update', 'Applicant ID 00006-C has their contract extended by 2 days!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00006-C'),
(359, '2020-02-07 11:51:21 AM', 'New', 'A reminder has been set for ID 00006-C, alerting after 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00006-C'),
(360, '2020-02-14 10:23:41 AM', 'Employment', 'Applicant ID 00023-B has been employed to Client ID 1 for 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00023-B'),
(361, '2020-02-14 10:25:57 AM', 'Employment', 'Applicant ID 00014-B has been employed to Client ID 1 for 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00014-B'),
(362, '2020-02-17 07:35:20 AM', 'Note', 'Added new note for .', NULL),
(363, '2020-02-17 07:43:10 AM', 'Note', 'Added new note for 00012-A.', NULL),
(364, '2020-02-17 07:46:47 AM', 'Note', 'Added new note for 00013-A.', NULL),
(365, '2020-02-17 07:48:15 AM', 'Note', 'Added new note for 00012-A.', NULL),
(366, '2020-02-17 08:00:09 AM', 'New', 'New Applicant added! (Name: Tracey, Adey K. | ID: 00001-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(367, '2020-02-17 08:01:59 AM', 'Employment', 'Applicant ID 00001-B has been employed to Client ID 1 for 1 month!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-B'),
(368, '2020-02-17 08:13:00 AM', 'New', 'New Applicant added! (Name: Mcvarish, Renelle S. | ID: 00002-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(369, '2020-02-17 08:13:51 AM', 'New', 'New Applicant added! (Name: Verdirosi, Melisenda U. | ID: 00003-A)', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(370, '2020-02-17 08:26:18 AM', 'Employment', 'Applicant ID 00003-B has been employed to Client ID 1 for 1 year!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-B'),
(371, '2020-02-17 08:42:32 AM', 'Update', 'Updated details on Person ID 00003-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00003-A'),
(372, '2020-02-17 09:06:46 AM', 'Update', 'Updated details on Person ID 00002-A.', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A');

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
(1, '00001-A', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f64756d6d792e706466, 'dummy.pdf', 'Blacklist', 'blacklist test', 'hello', '12345', '2020-02-17');

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
  MODIFY `Acad_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1356;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1302;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `supp_documents`
--
ALTER TABLE `supp_documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tab_documents_notes`
--
ALTER TABLE `tab_documents_notes`
  MODIFY `DatabaseID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
