-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 07:49 PM
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
  `DateEnds` varchar(255) DEFAULT NULL,
  `HighDegree` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminNo` int(11) NOT NULL,
  `Image` text DEFAULT NULL,
  `Permissions` varchar(400) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `AdminID` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL,
  `DateRemoved` varchar(255) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminNo`, `Image`, `Permissions`, `Position`, `AdminID`, `Password`, `FirstName`, `MiddleName`, `LastName`, `DateAdded`, `DateRemoved`, `Notes`, `Status`) VALUES
(23, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', '$2y$10$s64PjHG2ax5zG4GikYK8qOXDygYyGT/ZTbhswBa.mekcpRvotSluK', 'aab', 'b', 'test', '2020-11-27 09:14:17', NULL, 'super admin', 'Active'),
(24, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'dev', '$2y$10$Uj479MnjZrips4lbbJPfG.GLLSkUTwIUgxjX.a5LXw2YAAy/9Qfpa', '', '', '', '2020-12-02 01:25:27', NULL, '', 'Active'),
(25, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admi', '$2y$10$/MqksaHOjO5N5mFIqBxEL.03vMSij2dOVpDHNPGSi4yRGnxiBusEK', 'a', 'a', 'a', '2020-12-03 06:04:13', NULL, 'a', 'Active'),
(26, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'test', '$2y$10$BQwXUdmcCzPgUTQ/kwwZcOOV0NVUBvgsQKr3nvPOi3yLB9VExJH8W', 'test', 'test', 'test', '2020-12-03 06:05:45', '2020-12-08 00:40:48', 'test', 'Deleted'),
(27, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'v', '$2y$10$Af60CJqDoiUGNP6K/uaKU.0E0X0bZGifXj.QqmC1vdlOHLrRHL4CK', 'v', 'v3', 'v', '2020-12-03 06:07:36', '2020-12-08 00:26:56', 'v', 'Deleted'),
(28, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing', 'Developer', '123', '$2y$10$UdS0cLQIWO4fBdzSmSQcpud0Gdzyfc4SYZlUMbn.uqWoIWhRX.t0.', '1236', '123', '123', '2020-12-03 06:13:25', NULL, '123', 'Active'),
(29, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook', 'President', 'a2', '$2y$10$A9ZF4qIZEQ2iCJwIydIEXeGeaW2E5tNE85oMfQlgckn76KjkTLygq', 'a2', 'a2', 'a2', '2020-12-03 08:39:27', NULL, 'a2', 'Deleted'),
(30, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'aa', '$2y$10$WCH5omlTj4Qm/MqamQPFLO3if6NSolUJ449GXd9cfxdXhIY4C6kJu', 'a6', 'a', 'a', '2020-12-05 18:22:20', NULL, 'a', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `admin_edithistory`
--

CREATE TABLE `admin_edithistory` (
  `EntryID` int(11) NOT NULL,
  `AdminNo` int(11) DEFAULT NULL,
  `Image` blob DEFAULT NULL,
  `Permissions` varchar(400) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `AdminID` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `DateUpdated` varchar(255) DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `IsHidden` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_edithistory`
--

INSERT INTO `admin_edithistory` (`EntryID`, `AdminNo`, `Image`, `Permissions`, `Position`, `AdminID`, `Password`, `FirstName`, `MiddleName`, `LastName`, `DateUpdated`, `Notes`, `Status`, `IsHidden`) VALUES
(1, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', '$2y$10$etOofsUWWkb.xrT4jTDdp.ypdnSChM3YPNKTKecJcE7v6pWCxcCcS', 'aab', 'b', 'test', '2020-12-04 15:12:31', 'super admin', NULL, NULL),
(2, NULL, NULL, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 15:59:23', 'super admin', NULL, NULL),
(3, NULL, NULL, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 16:00:36', 'super admin', NULL, NULL),
(4, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d696e2f6368726f6d655f4e7056446f6846735972312e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 16:01:10', 'super admin', NULL, NULL),
(5, NULL, NULL, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 16:01:15', 'super admin', NULL, NULL),
(6, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d696e2f6368726f6d655f4e7056446f6846735972322e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 16:17:13', 'super admin', NULL, NULL),
(7, NULL, NULL, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 16:17:18', 'super admin', NULL, NULL),
(8, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d696e2f6368726f6d655f4e7056446f6846735972332e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 16:17:51', 'super admin', NULL, NULL),
(9, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d696e2f6368726f6d655f4e7056446f6846735972332e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 16:17:56', 'super admin', NULL, NULL),
(10, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d696e2f6368726f6d655f4e7056446f6846735972332e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 16:17:59', 'super admin', NULL, NULL),
(11, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d696e2f4179616d655469726564436f6d7072657373656453697a6564312e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 16:28:32', 'super admin', NULL, NULL),
(12, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d696e2f4179616d655469726564436f6d7072657373656453697a6564312e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', '$2y$10$s64PjHG2ax5zG4GikYK8qOXDygYyGT/ZTbhswBa.mekcpRvotSluK', 'aab', 'b', 'test', '2020-12-04 16:51:33', 'super admin', NULL, NULL),
(13, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d696e2f31315f31385f323032302e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 17:37:53', 'super admin', NULL, NULL),
(14, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d692f6368726f6d655f4e7056446f68467359722e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admi', NULL, 'a', 'a', 'a', '2020-12-04 17:38:00', 'a', NULL, NULL),
(15, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d696e2f31315f31385f323032302e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'President', 'admin', NULL, 'aab', 'b', 'test', '2020-12-04 18:03:25', 'super admin', NULL, NULL),
(16, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61646d692f6368726f6d655f4e7056446f68467359722e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admi', NULL, 'a', 'a', 'a', '2020-12-05 08:28:04', 'a', NULL, NULL),
(17, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f61612f31315f31385f323032302e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'aa', NULL, 'a', 'a', 'a', '2020-12-05 18:22:27', 'a', NULL, NULL),
(18, NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2020-12-06 05:08:31', 'super admin', NULL, NULL),
(19, 28, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '', 'Developer', '123', NULL, '123', '123', '123', '2020-12-07 15:10:45', '123', NULL, NULL),
(20, 28, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '', 'Developer', '123', NULL, '1236', '123', '123', '2020-12-07 15:10:49', '123', NULL, NULL),
(21, 30, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'aa', NULL, 'a6', 'a', 'a', '2020-12-07 15:10:52', 'a', NULL, NULL),
(22, 27, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'v', NULL, 'v', 'v3', 'v', '2020-12-07 15:11:15', 'v', NULL, NULL),
(23, 28, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'DashboardLogbook,Dashboard,Applicants,ApplicantsEditing', 'Developer', '123', NULL, '1236', '123', '123', '2020-12-07 15:11:41', '123', NULL, NULL),
(24, 28, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing', 'Developer', '123', NULL, '1236', '123', '123', '2020-12-07 18:42:05', '123', NULL, NULL),
(25, 28, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing', 'Developer', '123', NULL, '1236', '123', '123', '2020-12-07 18:42:08', '123', NULL, NULL),
(26, 28, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing', 'Developer', '123', NULL, '1236', '123', '123', '2020-12-07 18:42:33', '123', NULL, NULL),
(27, 24, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'dev', NULL, '', '', '', '2020-12-07 19:11:41', '', NULL, NULL);

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
  `MiddleName` varchar(255) DEFAULT NULL,
  `NameExtension` varchar(255) DEFAULT NULL,
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
  `EmergencyPerson` varchar(255) DEFAULT NULL,
  `EmergencyContact` varchar(255) DEFAULT NULL,
  `Referral` varchar(255) DEFAULT NULL,
  `Phone_No` varchar(255) DEFAULT NULL,
  `SSS_No` varchar(255) DEFAULT NULL,
  `EffectiveDateCoverage` varchar(255) DEFAULT NULL,
  `ResidenceCertificateNo` varchar(255) DEFAULT NULL,
  `TIN` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `PhilHealth` varchar(255) DEFAULT NULL,
  `ATM_No` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `ClientEmployed` varchar(255) DEFAULT NULL,
  `DateStarted` varchar(255) DEFAULT NULL,
  `DateEnds` varchar(255) DEFAULT NULL,
  `SuspensionStarted` varchar(255) DEFAULT NULL,
  `SuspensionEnds` varchar(255) DEFAULT NULL,
  `SuspensionRemarks` varchar(255) DEFAULT NULL,
  `Suspended` varchar(255) DEFAULT NULL,
  `AppliedOn` varchar(255) DEFAULT NULL,
  `ReminderType` varchar(255) DEFAULT NULL,
  `ReminderDate` varchar(255) DEFAULT NULL,
  `ReminderDateString` varchar(255) DEFAULT NULL,
  `ReminderLocked` varchar(255) DEFAULT NULL,
  `Temp_ApplicantID` varchar(255) DEFAULT NULL,
  `DateRemoved` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`ApplicantNo`, `ApplicantImage`, `ApplicantID`, `EmployeeID`, `PositionDesired`, `PositionGroup`, `SalaryExpected`, `LastName`, `FirstName`, `MiddleName`, `NameExtension`, `Gender`, `Age`, `Height`, `Weight`, `Religion`, `BirthDate`, `BirthPlace`, `Citizenship`, `CivilStatus`, `No_OfChildren`, `Address_Present`, `Address_Provincial`, `Address_Manila`, `EmergencyPerson`, `EmergencyContact`, `Referral`, `Phone_No`, `SSS_No`, `EffectiveDateCoverage`, `ResidenceCertificateNo`, `TIN`, `HDMF`, `PhilHealth`, `ATM_No`, `Status`, `ClientEmployed`, `DateStarted`, `DateEnds`, `SuspensionStarted`, `SuspensionEnds`, `SuspensionRemarks`, `Suspended`, `AppliedOn`, `ReminderType`, `ReminderDate`, `ReminderDateString`, `ReminderLocked`, `Temp_ApplicantID`, `DateRemoved`) VALUES
(1, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f707572706c652e706e67, '00001-A', 'WCtest-0001-20', 'TEST-854055', 'TEST-854055', '20000', 'TEST-854055', 'TEST-854055', 'TEST-85055', 'TEST-854055', 'Male', NULL, 'TEST-854055', 'TEST-854055', 'TEST-854055', '2020-11-29', 'TEST-854055', 'TEST-854055', 'Single', '44', 'TEST-854055', 'TEST-854055', 'TEST-854055', 'TEST-854055', 'TEST-854055', '', 'TEST-854055', 'TEST-854055', NULL, 'TEST-854055', 'TEST-854055', 'TEST-854055', 'TEST-854055', 'TEST-854055', 'Applicant', '1', '2020-11-29 09:57:26 PM', '2021-11-29 09:57:26 PM', NULL, NULL, NULL, NULL, '2020-11-29 09:57:18 PM', NULL, NULL, NULL, NULL, '00001-B', NULL),
(2, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00002-A', 'WCtes', 'TEST-239135123123123132', 'TEST-2394007', '500000', 'TEST-23940071233', 'TEST-2394', 'TEST-2394007', 'TEST-2394007', 'Male', NULL, 'TEST-2394007', 'TEST-2394007', 'TEST-2394007', '2020-12-01', 'TEST-2394007', 'TEST-2394007', 'Single', '19', 'TEST-239400612313231313133131234234242234234234234244234234234234', 'TEST-2394007', 'TEST-2394007', 'TEST-239400612313231313133131234234242234234234234244234234234234', 'TEST-2394007', '', 'TEST-2394007123123213123123123123123123', 'TEST-2394007123131231231231231232132132133', NULL, 'TEST-2394007', 'TEST-2394007', 'TEST-2394007', 'TEST-2394007', 'TEST-2394007', 'Employed', '1', '2020-12-05 06:14:09 PM', '2022-02-05 06:12:09 PM', NULL, NULL, NULL, NULL, '2020-12-01 07:47:08 PM', NULL, NULL, NULL, NULL, '00002-B', NULL),
(3, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00003-A', NULL, 'TEST-5612299', 'TEST-5612299', NULL, 'TEST-5612299', 'TEST-5612299', 'TEST-562299', 'TEST-5612299', 'Male', NULL, 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', '2020-12-05', 'TEST-5612299', 'TEST-5612299', 'Single', '4', 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'Job Fair', 'TEST-5612299', 'TEST-5612299', NULL, 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'Deleted', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-05 06:12:53 PM', NULL, NULL, NULL, NULL, NULL, '2020-12-08 00:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `applicants_edithistory`
--

CREATE TABLE `applicants_edithistory` (
  `EntryID` int(11) NOT NULL,
  `ApplicantNo` int(11) DEFAULT NULL,
  `ApplicantImage` blob DEFAULT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `EmployeeID` varchar(255) DEFAULT NULL,
  `PositionDesired` varchar(255) DEFAULT NULL,
  `PositionGroup` varchar(255) DEFAULT NULL,
  `SalaryExpected` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `NameExtension` varchar(255) DEFAULT NULL,
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
  `EmergencyPerson` varchar(255) DEFAULT NULL,
  `EmergencyContact` varchar(255) DEFAULT NULL,
  `Referral` varchar(255) DEFAULT NULL,
  `Phone_No` varchar(255) DEFAULT NULL,
  `SSS_No` varchar(255) DEFAULT NULL,
  `EffectiveDateCoverage` varchar(255) DEFAULT NULL,
  `ResidenceCertificateNo` varchar(255) DEFAULT NULL,
  `TIN` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `PhilHealth` varchar(255) DEFAULT NULL,
  `ATM_No` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `ClientEmployed` varchar(255) DEFAULT NULL,
  `DateStarted` varchar(255) DEFAULT NULL,
  `DateEnds` varchar(255) DEFAULT NULL,
  `AppliedOn` varchar(255) DEFAULT NULL,
  `DateRemoved` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `DateAdded` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `DateRemoved` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ClientID`, `Name`, `Address`, `ContactNumber`, `EmployeeIDSuffix`, `DateAdded`, `Status`, `DateRemoved`) VALUES
(1, 'test2', '118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481', '15546754756774373467, 3944584359034589, 395498-5389-6589--89365, 34953489893570893, 3958 90345890 349085, 4895658076803580, 3958 6 3589698554909999999999999999999999999999999999991', 'test', '2020-11-28 06:45:52 AM', 'Active', NULL),
(2, '1', '1', '1', '1', '2020-11-28 06:46:01 AM', 'Deleted', '2020-12-08 00:55:16');

-- --------------------------------------------------------

--
-- Table structure for table `clients_edithistory`
--

CREATE TABLE `clients_edithistory` (
  `EntryID` int(11) NOT NULL,
  `ClientID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `ContactNumber` varchar(255) DEFAULT NULL,
  `EmployeeIDSuffix` varchar(255) DEFAULT NULL,
  `DateUpdated` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `IsHidden` tinyint(1) DEFAULT NULL,
  `DateRemoved` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_months`
--

CREATE TABLE `dashboard_months` (
  `ID` int(11) NOT NULL,
  `Year` varchar(4) DEFAULT NULL,
  `Month` varchar(2) DEFAULT NULL,
  `Total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dashboard_months`
--

INSERT INTO `dashboard_months` (`ID`, `Year`, `Month`, `Total`) VALUES
(1, '2020', '01', '0'),
(2, '2020', '02', '0'),
(3, '2020', '03', '0'),
(4, '2020', '04', '0'),
(5, '2020', '05', '0'),
(6, '2020', '06', '0'),
(7, '2020', '07', '0'),
(8, '2020', '08', '0'),
(9, '2020', '09', '0'),
(10, '2020', '10', '0'),
(13, '2021', '01', '0'),
(17, '2021', '02', '0'),
(21, '2021', '03', '0'),
(25, '2021', '04', '0'),
(29, '2021', '05', '0'),
(33, '2021', '06', '0'),
(37, '2021', '07', '0'),
(41, '2021', '08', '0'),
(45, '2021', '09', '0'),
(49, '2021', '10', '0'),
(53, '2021', '11', '0'),
(57, '2021', '12', '0'),
(58, '2020', '11', '1'),
(59, '2020', '12', '2');

-- --------------------------------------------------------

--
-- Table structure for table `deferred_deductions`
--

CREATE TABLE `deferred_deductions` (
  `id` varchar(50) NOT NULL,
  `applicant_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `period` varchar(250) NOT NULL,
  `is_paid` int(2) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dummy_hours`
--

CREATE TABLE `dummy_hours` (
  `ID` int(11) NOT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL,
  `Regular` tinyint(1) DEFAULT NULL,
  `NightShift` tinyint(1) DEFAULT NULL,
  `Holiday` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dummy_hours`
--

INSERT INTO `dummy_hours` (`ID`, `Time`, `Current`, `Regular`, `NightShift`, `Holiday`) VALUES
(60, '2020-12-01', 'Current', NULL, NULL, NULL),
(61, '2020-12-02', 'Current', NULL, NULL, NULL),
(62, '2020-12-03', 'Current', NULL, NULL, NULL),
(63, '2020-12-04', 'Current', NULL, NULL, NULL),
(64, '2020-12-05', 'Current', NULL, NULL, NULL),
(65, '2020-12-06', 'Current', NULL, NULL, NULL),
(66, '2020-12-07', 'Current', NULL, NULL, NULL),
(67, '2020-12-08', 'Current', NULL, NULL, NULL),
(68, '2020-12-09', 'Current', NULL, NULL, NULL),
(69, '2020-12-10', 'Current', NULL, NULL, NULL),
(70, '2020-12-11', 'Current', NULL, NULL, NULL),
(71, '2020-12-12', 'Current', NULL, NULL, NULL),
(72, '2020-12-13', 'Current', NULL, NULL, NULL),
(73, '2020-12-14', 'Current', NULL, NULL, NULL),
(74, '2020-12-15', 'Current', NULL, NULL, NULL),
(75, '2020-12-16', 'Current', NULL, NULL, NULL),
(76, '2020-12-17', 'Current', NULL, NULL, NULL),
(77, '2020-12-18', 'Current', NULL, NULL, NULL),
(78, '2020-12-19', 'Current', NULL, NULL, NULL),
(79, '2020-12-20', 'Current', NULL, NULL, NULL),
(80, '2020-12-21', 'Current', NULL, NULL, NULL),
(81, '2020-12-22', 'Current', NULL, NULL, NULL),
(82, '2020-12-23', 'Current', NULL, NULL, NULL),
(83, '2020-12-24', 'Current', NULL, NULL, NULL),
(84, '2020-12-25', 'Current', NULL, NULL, NULL),
(85, '2020-12-26', 'Current', NULL, NULL, NULL),
(86, '2020-12-27', 'Current', NULL, NULL, NULL),
(87, '2020-12-28', 'Current', NULL, NULL, NULL),
(88, '2020-12-29', 'Current', NULL, NULL, NULL),
(89, '2020-12-30', 'Current', NULL, NULL, NULL),
(90, '2020-12-31', 'Current', NULL, NULL, NULL);

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
-- Table structure for table `employee_deductions`
--

CREATE TABLE `employee_deductions` (
  `id` varchar(50) NOT NULL,
  `applicant_id` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Table structure for table `guest_pass`
--

CREATE TABLE `guest_pass` (
  `ID` int(11) NOT NULL,
  `Code` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `ValidUntil` varchar(255) DEFAULT NULL,
  `MaxLogIns` int(11) DEFAULT NULL,
  `TimesLoggedIn` int(11) DEFAULT NULL,
  `IsBeingUsed` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hdmf_table`
--

CREATE TABLE `hdmf_table` (
  `id` int(11) NOT NULL,
  `f_range` decimal(10,0) DEFAULT NULL,
  `t_range` decimal(10,0) DEFAULT NULL,
  `contribution_er` float DEFAULT NULL,
  `contribution_ee` float DEFAULT NULL,
  `total` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `hours_monthly`
--

CREATE TABLE `hours_monthly` (
  `No` int(25) NOT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `ApplicantID` varchar(55) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `Week` int(11) DEFAULT NULL,
  `Month` int(11) DEFAULT NULL,
  `t_year` int(11) DEFAULT NULL,
  `Time` varchar(55) DEFAULT NULL,
  `Hours` int(255) DEFAULT NULL,
  `NightHours` int(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
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
  `day_pay` varchar(255) DEFAULT NULL,
  `ispaid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hours_monthly`
--

INSERT INTO `hours_monthly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Week`, `Month`, `t_year`, `Time`, `Hours`, `NightHours`, `Type`, `Overtime`, `NightOvertime`, `Remarks`, `Regular`, `NightShift`, `Holiday`, `Current`, `HDMF`, `Philhealth`, `SSS`, `Tax`, `day_pay`, `ispaid`) VALUES
(1, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hours_semimonthly`
--

CREATE TABLE `hours_semimonthly` (
  `No` int(25) NOT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `ApplicantID` varchar(55) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Salary` varchar(255) DEFAULT NULL,
  `Week` varchar(255) DEFAULT NULL,
  `Month` varchar(255) DEFAULT NULL,
  `t_year` int(11) DEFAULT NULL,
  `Time` varchar(55) DEFAULT NULL,
  `Hours` int(255) DEFAULT NULL,
  `NightHours` int(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
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
  `day_pay` varchar(255) DEFAULT NULL,
  `ispaid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hours_semimonthly`
--

INSERT INTO `hours_semimonthly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Week`, `Month`, `t_year`, `Time`, `Hours`, `NightHours`, `Type`, `Overtime`, `NightOvertime`, `Remarks`, `Regular`, `NightShift`, `Holiday`, `Current`, `HDMF`, `Philhealth`, `SSS`, `Tax`, `day_pay`, `ispaid`) VALUES
(1, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
  `Week` int(1) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `t_year` int(11) DEFAULT NULL,
  `Time` varchar(55) DEFAULT NULL,
  `Hours` int(255) DEFAULT NULL,
  `NightHours` int(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
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
  `day_pay` varchar(255) DEFAULT NULL,
  `ispaid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hours_weekly`
--

INSERT INTO `hours_weekly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Week`, `Month`, `t_year`, `Time`, `Hours`, `NightHours`, `Type`, `Overtime`, `NightOvertime`, `Remarks`, `Regular`, `NightShift`, `Holiday`, `Current`, `HDMF`, `Philhealth`, `SSS`, `Tax`, `day_pay`, `ispaid`) VALUES
(1, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '1', '00002-A', NULL, NULL, 1, 11, 2020, '2020-11-29', 2, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', 0),
(5, '1', '00002-A', NULL, NULL, 1, 11, 2020, '2020-11-30', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', 0),
(6, '1', '00002-A', NULL, NULL, 1, 11, 2020, '2020-12-01', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', 0),
(7, '1', '00002-A', NULL, NULL, 1, 11, 2020, '2020-12-02', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', 0),
(8, '1', '00002-A', NULL, NULL, 1, 11, 2020, '2020-12-03', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', 0),
(9, '1', '00002-A', NULL, NULL, 1, 11, 2020, '2020-12-04', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', 0),
(10, '1', '00002-A', NULL, NULL, 1, 11, 2020, '2020-12-05', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', 0),
(11, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `No` int(11) NOT NULL,
  `AdminID` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Icon` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Event` text DEFAULT NULL,
  `Link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`No`, `AdminID`, `Time`, `Icon`, `Type`, `Event`, `Link`) VALUES
(1, 'admin', '2020-11-28 06:45:53 AM', 'Client', 'Green', ' added a new client: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(2, 'admin', '2020-11-28 06:45:55 AM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(3, 'admin', '2020-11-28 06:46:01 AM', 'Client', 'Green', ' added a new client: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">1</a>', NULL),
(4, 'admin', '2020-11-28 06:49:07 AM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(5, 'admin', '2020-11-29 07:19:41 PM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(6, 'admin', '2020-11-29 07:19:55 PM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(7, 'admin', '2020-11-29 09:40:29 PM', 'Note', 'Yellow', ': <b>test</b>', NULL),
(8, 'admin', '2020-11-29 09:52:01 PM', 'Note', 'Yellow', ': <b>test</b>', NULL),
(9, 'admin', '2020-11-29 09:57:18 PM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(10, 'admin', '2020-11-29 09:57:26 PM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(11, 'admin', '2020-12-01 07:47:08 PM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007, TEST-2394007 TEST-2394007</a>', NULL),
(12, 'admin', '2020-12-01 09:32:37 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(13, 'admin', '2020-12-01 09:34:46 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(14, 'admin', '2020-12-01 09:35:10 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(15, 'admin', '2020-12-01 09:36:53 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(16, 'admin', '2020-12-01 09:37:53 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(17, 'admin', '2020-12-01 09:38:00 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(18, 'admin', '2020-12-01 09:38:09 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(19, 'admin', '2020-12-01 09:40:40 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(20, 'admin', '2020-12-01 09:40:56 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(21, 'admin', '2020-12-01 11:06:26 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(22, 'admin', '2020-12-01 11:23:47 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(23, 'admin', '2020-12-02 12:12:11 AM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(24, 'admin', '2020-12-02 12:35:56 AM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(25, 'GUEST', '2020-12-02 01:25:27 AM', 'Admin', 'Yellow', ' added a new admin: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=dev\" target=\"_blank\">,  </a>', NULL),
(26, 'dev', '2020-12-03 06:04:13 AM', 'Admin', 'Green', ' added a new admin: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=admi\" target=\"_blank\">A, A </a>', NULL),
(27, 'dev', '2020-12-03 06:05:45 AM', 'Admin', 'Green', ' added a new admin: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=test\" target=\"_blank\">Test, Test </a>', NULL),
(28, 'test', '2020-12-03 06:07:36 AM', 'Admin', 'Green', ' added a new admin: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=v\" target=\"_blank\">V, V </a>', NULL),
(29, 'dev', '2020-12-03 06:13:25 AM', 'Admin', 'Green', ' added a new admin: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=123\" target=\"_blank\">123, 123 </a>', NULL),
(30, 'dev', '2020-12-03 08:39:27 AM', 'Admin', 'Green', ' added a new admin: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=a2\" target=\"_blank\">A2, A2 </a>', NULL),
(31, 'dev', '2020-12-04 03:02:40 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=123\" target=\"_blank\">123</a>', NULL),
(32, 'dev', '2020-12-04 03:12:32 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(33, 'admin', '2020-12-04 03:59:24 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(34, 'admin', '2020-12-04 04:00:36 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(35, 'admin', '2020-12-04 04:01:10 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(36, 'admin', '2020-12-04 04:01:15 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(37, 'admin', '2020-12-04 04:17:13 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(38, 'admin', '2020-12-04 04:17:18 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(39, 'admin', '2020-12-04 04:17:51 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(40, 'admin', '2020-12-04 04:17:56 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(41, 'admin', '2020-12-04 04:17:59 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(42, 'admin', '2020-12-04 04:28:32 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(43, 'admin', '2020-12-04 04:51:33 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(44, 'admin', '2020-12-04 05:37:53 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(45, 'admin', '2020-12-04 05:38:00 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admi\" target=\"_blank\">admi</a>', NULL),
(46, 'admin', '2020-12-04 06:03:25 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(47, 'admin', '2020-12-05 08:28:04 AM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admi\" target=\"_blank\">admi</a>', NULL),
(48, 'admin', '2020-12-05 06:12:10 PM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract\" target=\"_blank\">TEST-2394007, TEST-2394007 TEST-2394007</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(49, 'admin', '2020-12-05 06:12:21 PM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007, TEST-2394007 TEST-2394007</a>', NULL),
(50, 'admin', '2020-12-05 06:12:27 PM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract\" target=\"_blank\">TEST-2394007, TEST-2394007 TEST-2394007</a>\'s contract details', NULL),
(51, 'admin', '2020-12-05 06:12:31 PM', 'Employee', 'Blue', ' updated contract duration for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract\" target=\"_blank\">TEST-2394007, TEST-2394007 TEST-2394007</a>', NULL),
(52, 'admin', '2020-12-05 06:12:53 PM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A\" target=\"_blank\">TEST-5612299, TEST-5612299 TEST-562299</a>', NULL),
(53, 'admin', '2020-12-05 06:22:21 PM', 'Admin', 'Green', ' added a new admin: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=aa\" target=\"_blank\">A, A </a>', NULL),
(54, 'admin', '2020-12-05 06:22:27 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=aa\" target=\"_blank\">aa</a>', NULL),
(55, 'admin', '2020-12-05 10:06:39 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007, TEST-2394007 TEST-2394007</a>', NULL),
(56, 'admin', '2020-12-06 05:08:31 AM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(57, 'admin', '2020-12-06 10:40:45 AM', 'Applicant', 'Green', ' restored <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(58, 'admin', '2020-12-06 01:35:42 PM', 'Client', 'Red', ' archived client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">2</a>', NULL),
(59, 'admin', '2020-12-06 01:41:31 PM', 'Admin', 'Red', ' removed admin <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=29\" target=\"_blank\">a2</a>', NULL),
(60, 'admin', '2020-12-06 02:40:36 PM', 'Applicant', 'Red', ' archived <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A\" target=\"_blank\">TEST-5612299, TEST-5612299 TEST-562299</a>', NULL),
(61, 'admin', '2020-12-07 03:10:45 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=123\" target=\"_blank\">123</a>', NULL),
(62, 'admin', '2020-12-07 03:10:49 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=123\" target=\"_blank\">123</a>', NULL),
(63, 'admin', '2020-12-07 03:10:53 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=aa\" target=\"_blank\">aa</a>', NULL),
(64, 'admin', '2020-12-07 03:11:15 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=v\" target=\"_blank\">v</a>', NULL),
(65, 'admin', '2020-12-07 03:11:41 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=123\" target=\"_blank\">123</a>', NULL),
(66, 'admin', '2020-12-07 06:35:34 PM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract\" target=\"_blank\">TEST-2394007, TEST-2394007 TEST-2394007</a>\'s contract details', NULL),
(67, 'admin', '2020-12-07 06:42:05 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=123\" target=\"_blank\">123</a>', NULL),
(68, 'admin', '2020-12-07 06:42:08 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=123\" target=\"_blank\">123</a>', NULL),
(69, 'admin', '2020-12-07 06:42:33 PM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=123\" target=\"_blank\">123</a>', NULL),
(70, 'admin', '2020-12-07 06:46:30 PM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(71, 'admin', '2020-12-07 06:56:08 PM', 'Admin', 'Red', ' removed admin <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=27\" target=\"_blank\">v</a>', NULL),
(72, 'admin', '2020-12-08 12:19:28 AM', 'Admin', 'Red', ' removed admin <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=27\" target=\"_blank\">v</a>', NULL),
(73, 'admin', '2020-12-08 12:19:34 AM', 'Applicant', 'Green', ' restored <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Logbook?admin=v\" target=\"_blank\">v</a>', NULL),
(74, 'admin', '2020-12-08 12:22:20 AM', 'Applicant', 'Green', ' restored client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">1</a>', NULL),
(75, 'admin', '2020-12-08 12:22:32 AM', 'Client', 'Red', ' archived client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">2</a>', NULL),
(76, 'admin', '2020-12-08 12:22:39 AM', 'Applicant', 'Green', ' restored <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A\" target=\"_blank\">TEST-5612299, TEST-5612299 TEST-562299</a>', NULL),
(77, 'admin', '2020-12-08 12:26:56 AM', 'Admin', 'Red', ' removed admin <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=27\" target=\"_blank\">v</a>', NULL),
(78, 'admin', '2020-12-08 12:36:25 AM', 'Applicant', 'Red', ' archived <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A\" target=\"_blank\">TEST-5612299, TEST-5612299 T.</a>', NULL),
(79, 'admin', '2020-12-08 12:40:48 AM', 'Admin', 'Red', ' removed admin <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=26\" target=\"_blank\">test</a>', NULL),
(80, 'admin', '2020-12-08 12:54:13 AM', 'Applicant', 'Green', ' restored client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">1</a>', NULL),
(81, 'admin', '2020-12-08 12:55:16 AM', 'Client', 'Red', ' archived client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">2</a>', NULL),
(82, 'admin', '2020-12-08 01:54:32 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940076245542526465526552522464554655244562456245544524655244555245, TEST-2394007 TEST-2394007</a>', NULL),
(83, 'admin', '2020-12-08 01:55:10 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940076245542526465526, TEST-2394007 TEST-2394007</a>', NULL),
(84, 'admin', '2020-12-08 01:55:29 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940076245542526465526, TEST-2394007234324 TEST-2394007</a>', NULL),
(85, 'admin', '2020-12-08 01:57:06 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394, TEST-2394007234324 TEST-2394007</a>', NULL),
(86, 'admin', '2020-12-08 01:57:14 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394, TEST-23 TEST-2394007</a>', NULL),
(87, 'admin', '2020-12-08 02:02:15 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394, TEST-23 TEST-2394007</a>', NULL),
(88, 'admin', '2020-12-08 02:02:23 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394, TEST-23 TEST-2394007</a>', NULL),
(89, 'admin', '2020-12-08 02:03:18 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(90, 'admin', '2020-12-08 02:05:05 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(91, 'admin', '2020-12-08 02:05:12 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(92, 'admin', '2020-12-08 02:05:36 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(93, 'admin', '2020-12-08 02:05:47 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(94, 'admin', '2020-12-08 02:06:24 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(95, 'admin', '2020-12-08 02:06:43 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(96, 'admin', '2020-12-08 02:07:15 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(97, 'admin', '2020-12-08 02:07:23 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(98, 'admin', '2020-12-08 02:07:29 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(99, 'admin', '2020-12-08 02:11:06 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(100, 'admin', '2020-12-08 02:11:23 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(101, 'admin', '2020-12-08 02:12:44 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(102, 'admin', '2020-12-08 02:13:11 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(103, 'admin', '2020-12-08 02:13:21 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(104, 'admin', '2020-12-08 02:14:03 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(105, 'admin', '2020-12-08 02:14:18 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(106, 'admin', '2020-12-08 02:15:13 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(107, 'admin', '2020-12-08 02:15:20 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(108, 'admin', '2020-12-08 02:15:25 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(109, 'admin', '2020-12-08 02:25:22 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(110, 'admin', '2020-12-08 02:25:41 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(111, 'admin', '2020-12-08 02:25:49 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(112, 'admin', '2020-12-08 02:25:58 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(113, 'admin', '2020-12-08 02:26:19 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(114, 'admin', '2020-12-08 02:31:55 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-2394007123331312313131313, TEST-2394007 TEST-2394007</a>', NULL),
(115, 'admin', '2020-12-08 02:32:32 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940071233313123131313133331131312312313131232, TEST-2394007123123331231231231312312312313231231233123 TEST-2394007</a>', NULL),
(116, 'admin', '2020-12-08 02:32:44 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940071233, TEST-2394 TEST-2394007</a>', NULL),
(117, 'admin', '2020-12-08 02:39:32 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940071233, TEST-2394 TEST-2394007</a>', NULL),
(118, 'admin', '2020-12-08 02:39:40 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940071233, TEST-2394 TEST-2394007</a>', NULL),
(119, 'admin', '2020-12-08 02:39:51 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940071233, TEST-2394 TEST-2394007</a>', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logbook_extended`
--

CREATE TABLE `logbook_extended` (
  `ID` int(11) NOT NULL,
  `AdminID` varchar(255) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `HookNo` varchar(255) DEFAULT NULL,
  `Type` int(1) DEFAULT NULL,
  `EventTooltip` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logbook_extended`
--

INSERT INTO `logbook_extended` (`ID`, `AdminID`, `Time`, `HookNo`, `Type`, `EventTooltip`) VALUES
(1, 'admin', '2020-11-28 06:45:53 AM', '1', 0, 'Address: '),
(2, 'admin', '2020-11-28 06:45:53 AM', '1', 0, 'ContactNumber: 1'),
(3, 'admin', '2020-11-28 06:46:01 AM', '3', 0, 'Address: '),
(4, 'admin', '2020-11-28 06:46:01 AM', '3', 0, 'ContactNumber: 1'),
(5, 'admin', '2020-11-28 06:49:08 AM', '4', 0, 'Name changed from <b>test</b> to <b>test2</b>.'),
(6, 'admin', '2020-11-29 07:19:41 PM', '5', 0, 'Contact number changed from <b>1</b> to <b>15546754756774373467, 3944584359034589, 395498-5389-6589--89365, 34953489893570893, 3958 90345890 349085, 4895658076803580, 3958 6 3589698554</b>.'),
(8, 'admin', '2020-11-29 09:57:18 PM', '9', 0, 'Applicant ID: <b>00001-A</b>'),
(9, 'admin', '2020-11-29 09:57:18 PM', '9', 0, 'Referral: <b></b>'),
(10, 'admin', '2020-11-29 09:57:26 PM', '10', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(11, 'admin', '2020-11-29 09:57:26 PM', '10', 0, 'Contract Duration: <b>November 29, 2020</b> to <b>November 29, 2021</b>'),
(12, 'admin', '2020-12-01 07:47:08 PM', '11', 0, 'Applicant ID: <b>00002-A</b>'),
(13, 'admin', '2020-12-01 07:47:08 PM', '11', 0, 'Referral: <b></b>'),
(14, 'admin', '2020-12-01 09:32:37 PM', '12', 0, 'Changed password.'),
(15, 'admin', '2020-12-01 09:32:37 PM', '12', 0, 'Changed profile picture.'),
(16, 'admin', '2020-12-01 09:32:38 PM', '12', 0, 'Last name changed from <b></b> to <b>test</b>.'),
(17, 'admin', '2020-12-01 09:34:46 PM', '13', 0, 'Changed password.'),
(18, 'admin', '2020-12-01 09:34:46 PM', '13', 0, 'First name changed from <b>N/A</b> to <b>a</b>.'),
(19, 'admin', '2020-12-01 09:34:46 PM', '13', 0, 'Middle name changed from <b>N/A</b> to <b></b>.'),
(20, 'admin', '2020-12-01 09:35:10 PM', '14', 0, 'Changed password.'),
(21, 'admin', '2020-12-01 09:35:10 PM', '14', 0, 'Middle name changed from <b>N/A</b> to <b></b>.'),
(22, 'admin', '2020-12-01 09:36:53 PM', '15', 0, 'Changed password.'),
(23, 'admin', '2020-12-01 09:38:00 PM', '17', 0, 'Middle name changed from <b>N/A</b> to <b>b</b>.'),
(24, 'admin', '2020-12-01 09:38:09 PM', '18', 0, 'First name changed from <b>a</b> to <b>aa</b>.'),
(25, 'admin', '2020-12-01 09:40:40 PM', '19', 0, 'First name changed from <b>aa</b> to <b>aab</b>.'),
(26, 'admin', '2020-12-01 09:40:56 PM', '20', 0, 'Permissions changed from <b></b> to <b></b>.'),
(27, 'admin', '2020-12-01 11:23:47 PM', '22', 0, 'Permissions changed from <b>Dashboard, Applicants, ApplicantsEditing, ApplicantsExpired, ApplicantsBlacklisted, ApplicantsArchived, Employees, EmployeesHiring, EmployeesEditing, EmployeesRegulars, Admins, AdminsEditing, AdminsArchived, Clients, ClientsEditing, ClientsArchived, Payroll</b> to <b>Array</b>.'),
(28, 'admin', '2020-12-02 12:12:11 AM', '23', 0, 'Changed profile picture.'),
(29, 'admin', '2020-12-02 12:12:11 AM', '23', 0, 'Permissions changed from <b>Dashboard, Applicants, ApplicantsEditing, ApplicantsExpired, ApplicantsBlacklisted, ApplicantsArchived, Employees, EmployeesHiring, EmployeesEditing, EmployeesRegulars, Admins, AdminsEditing, AdminsArchived, Clients, ClientsEditing, ClientsArchived, Payroll, DashboardLogbook</b> to <b>Array</b>.'),
(30, 'admin', '2020-12-02 12:35:56 AM', '24', 0, 'Changed profile picture.'),
(31, 'GUEST', '2020-12-02 01:25:28 AM', '25', 0, 'Admin ID: '),
(32, 'GUEST', '2020-12-02 01:25:28 AM', '25', 0, 'Position:  - Developer'),
(33, 'dev', '2020-12-03 06:04:13 AM', '26', 0, 'Admin ID: '),
(34, 'dev', '2020-12-03 06:04:13 AM', '26', 0, 'Position:  - Developer'),
(35, 'dev', '2020-12-03 06:05:45 AM', '27', 0, 'Admin ID: '),
(36, 'dev', '2020-12-03 06:05:45 AM', '27', 0, 'Position:  - Developer'),
(37, 'test', '2020-12-03 06:07:36 AM', '28', 0, 'Admin ID: '),
(38, 'test', '2020-12-03 06:07:36 AM', '28', 0, 'Position:  - Developer'),
(39, 'dev', '2020-12-03 06:13:25 AM', '29', 0, 'Admin ID: '),
(40, 'dev', '2020-12-03 06:13:26 AM', '29', 0, 'Position:  - Developer'),
(41, 'dev', '2020-12-03 08:39:28 AM', '30', 0, 'Admin ID: '),
(42, 'dev', '2020-12-03 08:39:28 AM', '30', 0, 'Position:  - President'),
(43, 'dev', '2020-12-04 03:02:40 PM', '31', 0, 'Changed password.'),
(44, 'dev', '2020-12-04 03:12:32 PM', '32', 0, 'Changed password.'),
(45, 'dev', '2020-12-04 03:12:32 PM', '32', 0, 'Changed profile picture.'),
(46, 'admin', '2020-12-04 04:01:11 PM', '35', 0, 'Changed profile picture.'),
(47, 'admin', '2020-12-04 04:17:13 PM', '37', 0, 'Changed profile picture.'),
(48, 'admin', '2020-12-04 04:17:51 PM', '39', 0, 'Changed profile picture.'),
(49, 'admin', '2020-12-04 04:28:32 PM', '42', 0, 'Changed profile picture.'),
(50, 'admin', '2020-12-04 04:51:33 PM', '43', 0, 'Changed password.'),
(51, 'admin', '2020-12-04 05:37:53 PM', '44', 0, 'Changed profile picture.'),
(52, 'admin', '2020-12-04 05:38:00 PM', '45', 0, 'Changed profile picture.'),
(53, 'admin', '2020-12-04 05:38:00 PM', '45', 0, 'Permissions changed from <b>N/A</b> to <b>Array</b>.'),
(54, 'admin', '2020-12-04 06:03:25 PM', '46', 0, 'Position changed from <b>Developer</b> to <b>President</b>.'),
(55, 'admin', '2020-12-05 06:12:10 PM', '48', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(56, 'admin', '2020-12-05 06:12:10 PM', '48', 0, 'Contract Duration: <b>December 05, 2020</b> to <b>December 05, 2021</b>'),
(57, 'admin', '2020-12-05 06:12:21 PM', '49', 0, 'Present address changed from <b>TEST-2394007</b> to <b>TEST-2394006</b>'),
(58, 'admin', '2020-12-05 06:12:27 PM', '50', 0, 'Contract\'s date start changed from <b>2020-12-05 06:12:09 PM</b> to <b>2020-12-05 06:14:09 PM</b>'),
(59, 'admin', '2020-12-05 06:12:31 PM', '51', 0, 'Contract changed from <b>December 05, 2021</b> to <b>February 05, 2022</b>'),
(60, 'admin', '2020-12-05 06:12:53 PM', '52', 0, 'Applicant ID: <b>00003-A</b>'),
(61, 'admin', '2020-12-05 06:12:53 PM', '52', 0, 'Referral: <b>Job Fair</b>'),
(62, 'admin', '2020-12-05 06:22:21 PM', '53', 0, 'Admin ID: '),
(63, 'admin', '2020-12-05 06:22:21 PM', '53', 0, 'Position:  - Developer'),
(64, 'admin', '2020-12-05 06:22:27 PM', '54', 0, 'Changed profile picture.'),
(65, 'admin', '2020-12-06 05:08:31 AM', '56', 0, 'Position changed from <b>President</b> to <b>Developer</b>.'),
(66, 'admin', '2020-12-06 10:40:45 AM', '57', 0, 'Changed status from <b>Blacklisted</b> to <b>Applicant</b>'),
(67, 'admin', '2020-12-06 01:35:43 PM', '58', 0, 'Name: N/A'),
(68, 'admin', '2020-12-06 01:35:43 PM', '58', 0, 'Address: N/A'),
(69, 'admin', '2020-12-06 01:35:43 PM', '58', 0, 'Contact Number: 1970-01-01 08:00:00 AM'),
(70, 'admin', '2020-12-06 01:41:31 PM', '59', 0, 'Name: A2, A2 A2'),
(71, 'admin', '2020-12-06 01:41:31 PM', '59', 0, 'Position:  - President'),
(72, 'admin', '2020-12-06 01:41:31 PM', '59', 0, 'Date Added: 1970-01-01 08:33:40 AM'),
(73, 'admin', '2020-12-06 02:40:36 PM', '60', 0, 'Applicant ID: 00003-A'),
(74, 'admin', '2020-12-06 02:40:36 PM', '60', 0, 'ContactNumber: TEST-5612299'),
(75, 'admin', '2020-12-07 03:10:49 PM', '62', 0, 'First name changed from <b>123</b> to <b>1236</b>.'),
(76, 'admin', '2020-12-07 03:10:53 PM', '63', 0, 'First name changed from <b>a</b> to <b>a6</b>.'),
(77, 'admin', '2020-12-07 03:11:15 PM', '64', 0, 'Middle name changed from <b>v</b> to <b>v3</b>.'),
(78, 'admin', '2020-12-07 03:11:41 PM', '65', 0, 'Permissions changed from <b>N/A</b> to <b>Array</b>.'),
(79, 'admin', '2020-12-07 06:35:34 PM', '66', 0, 'Salary changed from <b>4</b> to <b>500000</b>'),
(80, 'admin', '2020-12-07 06:42:05 PM', '67', 0, 'Permissions changed from <b>DashboardLogbook, Dashboard, Applicants, ApplicantsEditing</b> to <b>Array</b>.'),
(81, 'admin', '2020-12-07 06:46:30 PM', '70', 0, 'Address changed from <b>1</b> to <b>1184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481</b>.'),
(82, 'admin', '2020-12-07 06:56:08 PM', '71', 0, 'Name: V, V V3'),
(83, 'admin', '2020-12-07 06:56:08 PM', '71', 0, 'Position:  - Developer'),
(84, 'admin', '2020-12-07 06:56:08 PM', '71', 0, 'Date Added: 1970-01-01 08:33:40 AM'),
(85, 'admin', '2020-12-08 12:19:28 AM', '72', 0, 'Name: V, V V3'),
(86, 'admin', '2020-12-08 12:19:28 AM', '72', 0, 'Position:  - Developer'),
(87, 'admin', '2020-12-08 12:19:28 AM', '72', 0, 'Date Added: 1970-01-01 08:33:40 AM'),
(88, 'admin', '2020-12-08 12:19:34 AM', '73', 0, 'Changed status from <b>Archived</b> to <b>Active</b>'),
(89, 'admin', '2020-12-08 12:22:21 AM', '74', 0, 'Changed status from <b>Archived</b> to <b>Active</b>'),
(90, 'admin', '2020-12-08 12:22:32 AM', '75', 0, 'Name: N/A'),
(91, 'admin', '2020-12-08 12:22:32 AM', '75', 0, 'Address: N/A'),
(92, 'admin', '2020-12-08 12:22:32 AM', '75', 0, 'Contact Number: 1970-01-01 08:00:00 AM'),
(93, 'admin', '2020-12-08 12:22:39 AM', '76', 0, 'Changed status to <b>Applicant</b>'),
(94, 'admin', '2020-12-08 12:26:56 AM', '77', 0, 'Name: v, v 3'),
(95, 'admin', '2020-12-08 12:26:56 AM', '77', 0, 'Position: Developer'),
(96, 'admin', '2020-12-08 12:26:56 AM', '77', 0, 'Permissions: Dashboard, DashboardLogbook, Applicants, ApplicantsEditing, ApplicantsExpired, ApplicantsBlacklisted, ApplicantsArchived, Employees, EmployeesHiring, EmployeesEditing, EmployeesRegulars, Admins, AdminsEditing, AdminsArchived, Clients, ClientsEditing, ClientsArchived, Payroll'),
(97, 'admin', '2020-12-08 12:26:57 AM', '77', 0, 'Date Added: 2020-12-03 06:07:36'),
(98, 'admin', '2020-12-08 12:36:25 AM', '78', 0, '<b>Applicant ID:</b> 00003-A'),
(99, 'admin', '2020-12-08 12:36:25 AM', '78', 0, '<b>ContactNumber:</b> N/A'),
(100, 'admin', '2020-12-08 12:40:48 AM', '79', 0, '<b>Name:</b> test, test t.'),
(101, 'admin', '2020-12-08 12:40:48 AM', '79', 0, '<b>Position:</b> Developer'),
(102, 'admin', '2020-12-08 12:40:48 AM', '79', 0, '<b>Permissions:</b> Dashboard, DashboardLogbook, Applicants, ApplicantsEditing, ApplicantsExpired, ApplicantsBlacklisted, ApplicantsArchived, Employees, EmployeesHiring, EmployeesEditing, EmployeesRegulars, Admins, AdminsEditing, AdminsArchived, Clients, ClientsEditing, ClientsArchived, Payroll'),
(103, 'admin', '2020-12-08 12:40:48 AM', '79', 0, '<b>Date Added:</b> 2020-12-03 06:05:45'),
(104, 'admin', '2020-12-08 12:54:13 AM', '80', 0, 'Changed status from <b>Archived</b> to <b>Active</b>'),
(105, 'admin', '2020-12-08 12:55:16 AM', '81', 0, 'Name: N/A'),
(106, 'admin', '2020-12-08 12:55:16 AM', '81', 0, 'Address: N/A'),
(107, 'admin', '2020-12-08 12:55:16 AM', '81', 0, 'Contact Number: N/A'),
(108, 'admin', '2020-12-08 01:54:32 AM', '82', 0, 'Last Name changed from <b>TEST-2394007</b> to <b>TEST-23940076245542526465526552522464554655244562456245544524655244555245</b>'),
(109, 'admin', '2020-12-08 01:55:10 AM', '83', 0, 'Last Name changed from <b>TEST-23940076245542526465526552522464554655244562456245544524655244555245</b> to <b>TEST-23940076245542526465526</b>'),
(110, 'admin', '2020-12-08 01:55:29 AM', '84', 0, 'First Name changed from <b>TEST-2394007</b> to <b>TEST-2394007234324</b>'),
(111, 'admin', '2020-12-08 01:57:06 AM', '85', 0, 'Last Name changed from <b>TEST-23940076245542526465526</b> to <b>TEST-2394</b>'),
(112, 'admin', '2020-12-08 01:57:14 AM', '86', 0, 'First Name changed from <b>TEST-2394007234324</b> to <b>TEST-23</b>'),
(113, 'admin', '2020-12-08 02:02:15 AM', '87', 0, 'Position desired changed from <b>TEST-2394007</b> to <b>46512365133451345</b>'),
(114, 'admin', '2020-12-08 02:02:23 AM', '88', 0, 'Position desired changed from <b>46512365133451345</b> to <b>46512365133451345134341434134134134134134134414</b>'),
(115, 'admin', '2020-12-08 02:03:18 AM', '89', 0, 'Position desired changed from <b>46512365133451345134341434134134134134134134414</b> to <b>TEST-2394007</b>'),
(116, 'admin', '2020-12-08 02:03:18 AM', '89', 0, 'Last Name changed from <b>TEST-2394</b> to <b>TEST-2394007123331312313131313</b>'),
(117, 'admin', '2020-12-08 02:03:18 AM', '89', 0, 'First Name changed from <b>TEST-23</b> to <b>TEST-2394007</b>'),
(118, 'admin', '2020-12-08 02:05:05 AM', '90', 0, 'Position desired changed from <b>TEST-2394007</b> to <b>TEST-239400712313</b>'),
(119, 'admin', '2020-12-08 02:05:12 AM', '91', 0, 'Position desired changed from <b>TEST-239400712313</b> to <b>TEST-23940071231312313</b>'),
(120, 'admin', '2020-12-08 02:05:36 AM', '92', 0, 'Position desired changed from <b>TEST-23940071231312313</b> to <b>TEST-2394007123131231332432423423424242342</b>'),
(121, 'admin', '2020-12-08 02:05:47 AM', '93', 0, 'Position desired changed from <b>TEST-2394007123131231332432423423424242342</b> to <b>TEST-239400712</b>'),
(122, 'admin', '2020-12-08 02:06:24 AM', '94', 0, 'Position desired changed from <b>TEST-239400712</b> to <b>TEST-239400712123213131231232133</b>'),
(123, 'admin', '2020-12-08 02:06:43 AM', '95', 0, 'Position desired changed from <b>TEST-239400712123213131231232133</b> to <b>TEST-239</b>'),
(124, 'admin', '2020-12-08 02:07:15 AM', '96', 0, 'Position desired changed from <b>TEST-239</b> to <b>TEST-239135155135</b>'),
(125, 'admin', '2020-12-08 02:07:23 AM', '97', 0, 'Position desired changed from <b>TEST-239135155135</b> to <b>TEST-23913515513513515135135135</b>'),
(126, 'admin', '2020-12-08 02:07:29 AM', '98', 0, 'Position desired changed from <b>TEST-23913515513513515135135135</b> to <b>TEST-2391351551351351513513513531515315135135</b>'),
(127, 'admin', '2020-12-08 02:11:06 AM', '99', 0, 'Position desired changed from <b>TEST-2391351551351351513513513531515315135135</b> to <b>TEST-239135</b>'),
(128, 'admin', '2020-12-08 02:11:23 AM', '100', 0, 'Position desired changed from <b>TEST-239135</b> to <b>TEST-239135123123123132</b>'),
(129, 'admin', '2020-12-08 02:12:44 AM', '101', 0, 'Employee ID from <b>WCtest-0002-20</b> to <b>WCtest-0002-201231231313</b>'),
(130, 'admin', '2020-12-08 02:13:11 AM', '102', 0, 'Employee ID from <b>WCtest-0002-201231231313</b> to <b>WCtest-000</b>'),
(131, 'admin', '2020-12-08 02:13:21 AM', '103', 0, 'Employee ID from <b>WCtest-000</b> to <b>WCtes2458924-0001-20</b>'),
(132, 'admin', '2020-12-08 02:14:02 AM', '104', 0, 'Employee ID from <b>WCtes2458924-0001-20</b> to <b>WCtes2458924-0001-201232131313213123</b>'),
(133, 'admin', '2020-12-08 02:14:18 AM', '105', 0, 'Employee ID from <b>WCtes2458924-0001-201232131313213123</b> to <b>WCtes2458924-0001-20123</b>'),
(134, 'admin', '2020-12-08 02:15:13 AM', '106', 0, 'Employee ID from <b>WCtes2458924-0001-20123</b> to <b>WCtes2458924-00</b>'),
(135, 'admin', '2020-12-08 02:15:20 AM', '107', 0, 'Employee ID from <b>WCtes2458924-00</b> to <b>WCtes2458924-001231312</b>'),
(136, 'admin', '2020-12-08 02:15:25 AM', '108', 0, 'Employee ID from <b>WCtes2458924-001231312</b> to <b>WCtes</b>'),
(137, 'admin', '2020-12-08 02:25:22 AM', '109', 0, 'Present address changed from <b>TEST-2394006</b> to <b>TEST-2394006123132313131331313123331313</b>'),
(138, 'admin', '2020-12-08 02:25:41 AM', '110', 0, 'Present address changed from <b>TEST-2394006123132313131331313123331313</b> to <b>TEST-2394006123132313131331313123331313123133112332313</b>'),
(139, 'admin', '2020-12-08 02:25:49 AM', '111', 0, 'Present address changed from <b>TEST-2394006123132313131331313123331313123133112332313</b> to <b>TEST-239400612313231313133131312333131312311231313131313131312333312333112332313</b>'),
(140, 'admin', '2020-12-08 02:25:58 AM', '112', 0, 'Present address changed from <b>TEST-239400612313231313133131312333131312311231313131313131312333312333112332313</b> to <b>TEST-2394006123132313131331313123331313121212331313131312213133313311231313131313131312333312333112332313</b>'),
(141, 'admin', '2020-12-08 02:26:19 AM', '113', 0, 'Present address changed from <b>TEST-2394006123132313131331313123331313121212331313131312213133313311231313131313131312333312333112332313</b> to <b>TEST-239400612313231313133131234234242234234234234244234234234234</b>'),
(142, 'admin', '2020-12-08 02:31:55 AM', '114', 0, 'Person to notify in case of emergyency changed from <b>TEST-2394007</b> to <b>TEST-239400612313231313133131234234242234234234234244234234234234</b>'),
(143, 'admin', '2020-12-08 02:32:32 AM', '115', 0, 'Last Name changed from <b>TEST-2394007123331312313131313</b> to <b>TEST-23940071233313123131313133331131312312313131232</b>'),
(144, 'admin', '2020-12-08 02:32:32 AM', '115', 0, 'First Name changed from <b>TEST-2394007</b> to <b>TEST-2394007123123331231231231312312312313231231233123</b>'),
(145, 'admin', '2020-12-08 02:32:44 AM', '116', 0, 'Last Name changed from <b>TEST-23940071233313123131313133331131312312313131232</b> to <b>TEST-23940071233</b>'),
(146, 'admin', '2020-12-08 02:32:44 AM', '116', 0, 'First Name changed from <b>TEST-2394007123123331231231231312312312313231231233123</b> to <b>TEST-2394</b>'),
(147, 'admin', '2020-12-08 02:39:32 AM', '117', 0, 'SSS number changed from <b>TEST-2394007</b> to <b>TEST-239400712313123123123</b>'),
(148, 'admin', '2020-12-08 02:39:40 AM', '118', 0, 'SSS number changed from <b>TEST-239400712313123123123</b> to <b>TEST-2394007123131231231231231232132132133</b>'),
(149, 'admin', '2020-12-08 02:39:51 AM', '119', 0, 'Contact number changed from <b>TEST-2394007</b> to <b>TEST-2394007123123213123123123123123123</b>');

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
-- Table structure for table `other_deductions`
--

CREATE TABLE `other_deductions` (
  `id` varchar(50) NOT NULL,
  `applicant_id` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `deduction_datetime` datetime DEFAULT NULL,
  `ispaid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payroll_loans`
--

CREATE TABLE `payroll_loans` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `LoanName` varchar(255) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Week` int(1) DEFAULT NULL,
  `Deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `philhealth_table`
--

CREATE TABLE `philhealth_table` (
  `id` int(11) NOT NULL,
  `f_range` decimal(10,2) DEFAULT NULL,
  `t_range` decimal(10,2) DEFAULT NULL,
  `contribution_rate` float DEFAULT NULL,
  `contribution_ee` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `ID` int(11) NOT NULL,
  `WeekStart` varchar(255) DEFAULT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `TimeAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`ID`, `WeekStart`, `ClientID`, `TimeAdded`) VALUES
(1, '2020-11-28', '1', 'On creation'),
(2, '2020-11-28', '2', 'On creation');

-- --------------------------------------------------------

--
-- Table structure for table `sss_table`
--

CREATE TABLE `sss_table` (
  `id` int(11) NOT NULL,
  `f_range` varchar(255) DEFAULT NULL,
  `t_range` varchar(255) DEFAULT NULL,
  `contribution_er` decimal(10,2) DEFAULT NULL,
  `contribution_ee` decimal(10,2) DEFAULT NULL,
  `contribution_ec` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `total_with_ec` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sss_tobepaid`
--

CREATE TABLE `sss_tobepaid` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `Month` varchar(255) DEFAULT NULL,
  `Year` varchar(255) DEFAULT NULL,
  `Mode` int(1) DEFAULT NULL,
  `Week1Amount` varchar(255) DEFAULT NULL,
  `Week2Amount` varchar(255) DEFAULT NULL,
  `Week3Amount` varchar(255) DEFAULT NULL,
  `Week4Amount` varchar(255) DEFAULT NULL,
  `Week1Paid` varchar(255) DEFAULT NULL,
  `Week2Paid` varchar(255) DEFAULT NULL,
  `Week3Paid` varchar(255) DEFAULT NULL,
  `Week4Paid` varchar(255) DEFAULT NULL,
  `DateUpdated` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supp_documents`
--

CREATE TABLE `supp_documents` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `Doc_Image` blob DEFAULT NULL,
  `Doc_File` blob DEFAULT NULL,
  `Doc_FileName` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tab_documents_notes`
--

CREATE TABLE `tab_documents_notes` (
  `DatabaseID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `Note` text DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL,
  `Deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tax_table`
--

CREATE TABLE `tax_table` (
  `id` int(11) NOT NULL,
  `year` int(4) DEFAULT NULL,
  `f_range` decimal(10,2) DEFAULT NULL,
  `t_range` decimal(10,2) DEFAULT NULL,
  `computation` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `sss_contri` decimal(10,2) DEFAULT NULL,
  `hdmf_contri` decimal(10,2) DEFAULT NULL,
  `philhealth_contri` decimal(10,2) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT NULL,
  `date_period` varchar(100) DEFAULT NULL,
  `net_pay` varchar(255) DEFAULT NULL,
  `c_week` int(11) DEFAULT NULL,
  `c_month` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking_table`
--

INSERT INTO `tracking_table` (`id`, `ApplicantID`, `ClientID`, `gross_pay`, `TotalHours`, `TotaOT`, `sss_contri`, `hdmf_contri`, `philhealth_contri`, `tax`, `date_period`, `net_pay`, `c_week`, `c_month`) VALUES
(1, '00002-A', '1', '0', '2', '0', '0.00', NULL, NULL, NULL, NULL, '-450', NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `admin_edithistory`
--
ALTER TABLE `admin_edithistory`
  ADD PRIMARY KEY (`EntryID`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`ApplicantNo`);

--
-- Indexes for table `applicants_edithistory`
--
ALTER TABLE `applicants_edithistory`
  ADD PRIMARY KEY (`EntryID`);

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
-- Indexes for table `clients_edithistory`
--
ALTER TABLE `clients_edithistory`
  ADD PRIMARY KEY (`EntryID`);

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
-- Indexes for table `deferred_deductions`
--
ALTER TABLE `deferred_deductions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `employee_deductions`
--
ALTER TABLE `employee_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment_record`
--
ALTER TABLE `employment_record`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `guest_pass`
--
ALTER TABLE `guest_pass`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hdmf_table`
--
ALTER TABLE `hdmf_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hours_monthly`
--
ALTER TABLE `hours_monthly`
  ADD PRIMARY KEY (`No`),
  ADD UNIQUE KEY `uid` (`ApplicantID`,`Time`);

--
-- Indexes for table `hours_semimonthly`
--
ALTER TABLE `hours_semimonthly`
  ADD PRIMARY KEY (`No`),
  ADD UNIQUE KEY `uid` (`ApplicantID`,`Time`);

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
-- Indexes for table `logbook_extended`
--
ALTER TABLE `logbook_extended`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `machine_operated`
--
ALTER TABLE `machine_operated`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `other_deductions`
--
ALTER TABLE `other_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_loans`
--
ALTER TABLE `payroll_loans`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ApplicantID` (`ApplicantID`,`LoanName`);

--
-- Indexes for table `philhealth_table`
--
ALTER TABLE `philhealth_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sss_table`
--
ALTER TABLE `sss_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sss_tobepaid`
--
ALTER TABLE `sss_tobepaid`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `uidx` (`ApplicantID`,`ClientID`,`Month`,`Year`,`Mode`);

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
-- Indexes for table `tax_table`
--
ALTER TABLE `tax_table`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `admin_edithistory`
--
ALTER TABLE `admin_edithistory`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicants_edithistory`
--
ALTER TABLE `applicants_edithistory`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients_edithistory`
--
ALTER TABLE `clients_edithistory`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_history`
--
ALTER TABLE `contract_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dashboard_months`
--
ALTER TABLE `dashboard_months`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `employment_record`
--
ALTER TABLE `employment_record`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_pass`
--
ALTER TABLE `guest_pass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hdmf_table`
--
ALTER TABLE `hdmf_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hours_monthly`
--
ALTER TABLE `hours_monthly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hours_semimonthly`
--
ALTER TABLE `hours_semimonthly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `logbook_extended`
--
ALTER TABLE `logbook_extended`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `machine_operated`
--
ALTER TABLE `machine_operated`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_loans`
--
ALTER TABLE `payroll_loans`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `philhealth_table`
--
ALTER TABLE `philhealth_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sss_table`
--
ALTER TABLE `sss_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sss_tobepaid`
--
ALTER TABLE `sss_tobepaid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supp_documents`
--
ALTER TABLE `supp_documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tab_documents_notes`
--
ALTER TABLE `tab_documents_notes`
  MODIFY `DatabaseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax_table`
--
ALTER TABLE `tax_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracking_table`
--
ALTER TABLE `tracking_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
