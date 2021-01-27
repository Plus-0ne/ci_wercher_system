-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 02:15 AM
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
(30, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'aa', '$2y$10$WCH5omlTj4Qm/MqamQPFLO3if6NSolUJ449GXd9cfxdXhIY4C6kJu', 'a6', 'a', 'a', '2020-12-05 18:22:20', NULL, 'a', 'Active'),
(31, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Payroll', 'Accounting Manager', 'Payroll', '$2y$10$ZfUMjWCLOvnvqEzXdJw1m.KfUlelMjNBKcaw5MPK.Cyei8Vsw.bn6', 'Payroll', 'R', 'P', '2020-12-13 15:16:05', NULL, 'Payroll admin', 'Active');

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
(1, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00001-A', 'WCtest-0001-21', 'TEST-5038727', 'TEST-5038727', '10000', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'Male', NULL, 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', '2021-01-21', 'TEST-5038727', 'TEST-5038727', 'Single', '49', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'Walk In', 'TEST-5038727', 'TEST-5038727', NULL, 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'Employed (Permanent)', '1', '2021-01-15 07:35:02 AM', ' 00:00:00 ', NULL, NULL, NULL, NULL, '2021-01-21 05:26:46 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00002-A', 'WCtest-0002-21', 'TEST-9011888', 'TEST-9011888', '5000', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'Male', NULL, 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', '2021-01-21', 'TEST-9011888', 'TEST-9011888', 'Single', '47', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'Walk In', 'TEST-9011888', 'TEST-9011888', NULL, 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'Employed', '1', '2021-01-21 09:05:35 AM', '2022-01-21 09:05:35 AM', NULL, NULL, NULL, NULL, '2021-01-21 09:02:39 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00003-A', 'WCtest-0005-21', 'TEST-3864426', 'TEST-3864426', '5600000', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'Male', NULL, 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', '2021-01-22', 'TEST-3864426', 'TEST-3864426', 'Single', '73', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'Walk In', 'TEST-3864426', 'TEST-3864426', NULL, 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'Employed', '1', '2021-01-27 08:34:43 AM', '2022-01-27 08:34:43 AM', NULL, NULL, NULL, NULL, '2021-01-22 03:18:57 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00004-A', NULL, 'TEST-6693569', 'TEST-6693569', NULL, 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'Male', NULL, 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', '2021-01-27', 'TEST-6693569', 'TEST-6693569', 'Single', '46', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'Walk In', 'TEST-6693569', 'TEST-6693569', NULL, 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'Applicant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-27 02:43:44 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00005-A', NULL, 'TEST-4846795', 'TEST-4846795', NULL, 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'Male', NULL, 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', '2021-01-27', 'TEST-4846795', 'TEST-4846795', 'Single', '29', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'Walk In', 'TEST-4846795', 'TEST-4846795', NULL, 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'Applicant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-27 02:43:47 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00006-A', NULL, 'TEST-9284419', 'TEST-9284419', NULL, 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'Male', NULL, 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', '2021-01-27', 'TEST-9284419', 'TEST-9284419', 'Single', '58', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'Walk In', 'TEST-9284419', 'TEST-9284419', NULL, 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'Applicant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-27 02:43:50 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00007-A', 'WCtest-0004-21', 'TEST-8089530', 'TEST-8089530', '5000', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'Male', NULL, 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', '2021-01-27', 'TEST-8089530', 'TEST-8089530', 'Single', '94', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'Walk In', 'TEST-8089530', 'TEST-8089530', NULL, 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'Employed', '1', '2021-01-27 06:08:48 AM', '2022-01-27 06:08:48 AM', NULL, NULL, NULL, NULL, '2021-01-27 02:43:52 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00008-A', 'WCtest-0003-21', 'TEST-1598246', 'TEST-1598246', '', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'Male', NULL, 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', '2021-01-27', 'TEST-1598246', 'TEST-1598246', 'Single', '1', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'Walk In', 'TEST-1598246', 'TEST-1598246', NULL, 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'Employed (Permanent)', '1', '2011-06-09 02:51:15 AM', '2021-01-27 02:51:15 AM', NULL, NULL, NULL, NULL, '2021-01-27 02:43:55 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00009-A', 'WCtest-0006-21', 'TEST-4275008', 'TEST-4275008', '', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'Male', NULL, 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', '2021-01-27', 'TEST-4275008', 'TEST-4275008', 'Single', '29', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'Walk In', 'TEST-4275008', 'TEST-4275008', NULL, 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'Employed', '1', '2021-01-27 08:56:22 AM', '2022-01-27 08:56:22 AM', NULL, NULL, NULL, NULL, '2021-01-27 06:09:07 AM', NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'test', 'test', 'test', 'test', '2021-01-21 05:26:57 AM', 'Active', NULL),
(2, '123', '213312', '3123213', '12313', '2021-01-27 06:04:10 AM', 'Active', NULL),
(3, '1233', '12312323', '1232133', '123123', '2021-01-27 06:04:14 AM', 'Active', NULL),
(4, '1231312', '3213131232', '3123213', '32131233', '2021-01-27 06:04:23 AM', 'Active', NULL),
(5, 'asdasd', 'asdasdad', 'adasdasd', 'adad', '2021-01-27 06:04:27 AM', 'Active', NULL),
(6, 'asdasdasd', 'dadasdsad', 'asdsadsad', 'asaada', '2021-01-27 06:04:34 AM', 'Active', NULL);

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

--
-- Dumping data for table `contract_history`
--

INSERT INTO `contract_history` (`ID`, `ApplicantID`, `PreviousPosition`, `PreviousDateStarted`, `PreviousDateEnds`, `Client`) VALUES
(1, '00002-A', NULL, '2020-12-09 02:39:46 AM', '2020-12-08 02:39:46 AM', '1'),
(2, '00001-A', NULL, '2020-12-09 02:56:33 AM', '2020-12-09 02:56:33 AM', 'test2');

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
(59, '2020', '12', '2'),
(69, '2021', '01', '9');

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
  `ForAdminID` varchar(255) DEFAULT NULL,
  `NightShift` tinyint(1) DEFAULT NULL,
  `Holiday` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dummy_hours`
--

INSERT INTO `dummy_hours` (`ID`, `Time`, `Current`, `ForAdminID`, `NightShift`, `Holiday`) VALUES
(22, '2021-01-21', 'Current', NULL, NULL, NULL),
(23, '2021-01-22', 'Current', NULL, NULL, NULL),
(24, '2021-01-23', 'Current', NULL, NULL, NULL),
(25, '2021-01-24', 'Current', NULL, NULL, NULL),
(26, '2021-01-25', 'Current', NULL, NULL, NULL),
(27, '2021-01-26', 'Current', NULL, NULL, NULL),
(28, '2021-01-27', 'Current', NULL, NULL, NULL);

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
-- Table structure for table `globals_admin`
--

CREATE TABLE `globals_admin` (
  `ID` int(11) NOT NULL,
  `Admin` varchar(255) DEFAULT NULL,
  `SSS_Batch` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `globals_server`
--

CREATE TABLE `globals_server` (
  `ID` int(11) NOT NULL,
  `SSS_Batch` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Dumping data for table `hdmf_table`
--

INSERT INTO `hdmf_table` (`id`, `f_range`, `t_range`, `contribution_er`, `contribution_ee`, `total`) VALUES
(1, '0', '1500', 0.02, 0.01, 0.03),
(2, '1500', '10000000', 0.02, 0.02, 0.04);

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
  `RestDay` tinyint(1) DEFAULT NULL,
  `SpecialHoliday` tinyint(1) DEFAULT NULL,
  `NationalHoliday` tinyint(1) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `Philhealth` varchar(255) DEFAULT NULL,
  `SSS` varchar(255) DEFAULT NULL,
  `Tax` varchar(255) DEFAULT NULL,
  `GrossPay` varchar(255) DEFAULT NULL,
  `OvertimeGrossPay` varchar(255) DEFAULT NULL,
  `NPGrossPay` varchar(255) DEFAULT NULL,
  `NPOvertimeGrossPay` varchar(255) DEFAULT NULL,
  `ispaid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hours_monthly`
--

INSERT INTO `hours_monthly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Week`, `Month`, `t_year`, `Time`, `Hours`, `NightHours`, `Type`, `Overtime`, `NightOvertime`, `Remarks`, `RestDay`, `SpecialHoliday`, `NationalHoliday`, `Current`, `HDMF`, `Philhealth`, `SSS`, `Tax`, `GrossPay`, `OvertimeGrossPay`, `NPGrossPay`, `NPOvertimeGrossPay`, `ispaid`) VALUES
(1, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00002-B', ' TEST-9011888, TEST-9011888TEST-9011888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, '1', '00007-B', ' TEST-8089530, TEST-8089530TEST-8089530', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, '1', '00003-B', ' TEST-3864426, TEST-3864426TEST-3864426', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, '1', '00009-B', ' TEST-4275008, TEST-4275008TEST-4275008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
  `RestDay` tinyint(1) DEFAULT NULL,
  `SpecialHoliday` tinyint(1) DEFAULT NULL,
  `NationalHoliday` tinyint(1) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `Philhealth` varchar(255) DEFAULT NULL,
  `SSS` varchar(255) DEFAULT NULL,
  `Tax` varchar(255) DEFAULT NULL,
  `GrossPay` varchar(255) DEFAULT NULL,
  `OvertimeGrossPay` varchar(255) DEFAULT NULL,
  `NPGrossPay` varchar(255) DEFAULT NULL,
  `NPOvertimeGrossPay` varchar(255) DEFAULT NULL,
  `ispaid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hours_semimonthly`
--

INSERT INTO `hours_semimonthly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Week`, `Month`, `t_year`, `Time`, `Hours`, `NightHours`, `Type`, `Overtime`, `NightOvertime`, `Remarks`, `RestDay`, `SpecialHoliday`, `NationalHoliday`, `Current`, `HDMF`, `Philhealth`, `SSS`, `Tax`, `GrossPay`, `OvertimeGrossPay`, `NPGrossPay`, `NPOvertimeGrossPay`, `ispaid`) VALUES
(1, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00002-B', ' TEST-9011888, TEST-9011888TEST-9011888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, '1', '00007-B', ' TEST-8089530, TEST-8089530TEST-8089530', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, '1', '00003-B', ' TEST-3864426, TEST-3864426TEST-3864426', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, '1', '00009-B', ' TEST-4275008, TEST-4275008TEST-4275008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
  `RestDay` tinyint(1) DEFAULT NULL,
  `SpecialHoliday` tinyint(1) DEFAULT NULL,
  `NationalHoliday` tinyint(1) DEFAULT NULL,
  `Current` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `Philhealth` varchar(255) DEFAULT NULL,
  `SSS` varchar(255) DEFAULT NULL,
  `Tax` varchar(255) DEFAULT NULL,
  `GrossPay` varchar(255) DEFAULT NULL,
  `OvertimeGrossPay` varchar(255) DEFAULT NULL,
  `NPGrossPay` varchar(255) DEFAULT NULL,
  `NPOvertimeGrossPay` varchar(255) DEFAULT NULL,
  `ispaid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hours_weekly`
--

INSERT INTO `hours_weekly` (`No`, `ClientID`, `ApplicantID`, `Name`, `Salary`, `Week`, `Month`, `t_year`, `Time`, `Hours`, `NightHours`, `Type`, `Overtime`, `NightOvertime`, `Remarks`, `RestDay`, `SpecialHoliday`, `NationalHoliday`, `Current`, `HDMF`, `Philhealth`, `SSS`, `Tax`, `GrossPay`, `OvertimeGrossPay`, `NPGrossPay`, `NPOvertimeGrossPay`, `ispaid`) VALUES
(1, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00002-B', ' TEST-9011888, TEST-9011888TEST-9011888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, '1', '00007-B', ' TEST-8089530, TEST-8089530TEST-8089530', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, '1', '00003-B', ' TEST-3864426, TEST-3864426TEST-3864426', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, '1', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', '10000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, '1', '00009-B', ' TEST-4275008, TEST-4275008TEST-4275008', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
(1, 'admin', '2021-01-21 05:26:46 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(2, 'admin', '2021-01-21 05:26:57 AM', 'Client', 'Green', ' added a new client: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(3, 'admin', '2021-01-21 09:02:39 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>', NULL),
(4, 'admin', '2021-01-21 09:05:35 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(5, 'admin', '2021-01-22 03:18:57 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A\" target=\"_blank\">TEST-3864426, TEST-3864426 TEST-3864426</a>', NULL),
(6, 'admin', '2021-01-27 02:43:44 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A\" target=\"_blank\">TEST-6693569, TEST-6693569 TEST-6693569</a>', NULL),
(7, 'admin', '2021-01-27 02:43:47 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00005-A\" target=\"_blank\">TEST-4846795, TEST-4846795 TEST-4846795</a>', NULL),
(8, 'admin', '2021-01-27 02:43:50 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">TEST-9284419, TEST-9284419 TEST-9284419</a>', NULL),
(9, 'admin', '2021-01-27 02:43:52 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-8089530, TEST-8089530 TEST-8089530</a>', NULL),
(10, 'admin', '2021-01-27 02:43:55 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>', NULL),
(11, 'admin', '2021-01-27 02:45:00 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A#Contract\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(12, 'admin', '2021-01-27 02:56:07 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A#Contract\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>\'s contract details', NULL),
(13, 'admin', '2021-01-27 02:56:12 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A#Contract\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>\'s contract details', NULL),
(14, 'admin', '2021-01-27 02:56:19 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A#Contract\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>\'s contract details', NULL),
(15, 'admin', '2021-01-27 06:04:10 AM', 'Client', 'Green', ' added a new client: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">123</a>', NULL),
(16, 'admin', '2021-01-27 06:04:15 AM', 'Client', 'Green', ' added a new client: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=3\" target=\"_blank\">1233</a>', NULL),
(17, 'admin', '2021-01-27 06:04:23 AM', 'Client', 'Green', ' added a new client: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=4\" target=\"_blank\">1231312</a>', NULL),
(18, 'admin', '2021-01-27 06:04:27 AM', 'Client', 'Green', ' added a new client: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=5\" target=\"_blank\">asdasd</a>', NULL),
(19, 'admin', '2021-01-27 06:04:34 AM', 'Client', 'Green', ' added a new client: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=6\" target=\"_blank\">asdasdasd</a>', NULL),
(20, 'admin', '2021-01-27 06:08:48 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A#Contract\" target=\"_blank\">TEST-8089530, TEST-8089530 TEST-8089530</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(21, 'admin', '2021-01-27 06:09:07 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00009-A\" target=\"_blank\">TEST-4275008, TEST-4275008 TEST-4275008</a>', NULL),
(22, 'admin', '2021-01-27 07:35:09 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>\'s contract details', NULL),
(23, 'admin', '2021-01-27 08:34:43 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A#Contract\" target=\"_blank\">TEST-3864426, TEST-3864426 TEST-3864426</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(24, 'admin', '2021-01-27 08:37:25 AM', 'Note', 'Yellow', ': t5estet', NULL),
(25, 'admin', '2021-01-27 08:51:24 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>\'s contract details', NULL),
(26, 'admin', '2021-01-27 08:51:28 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>\'s contract details', NULL),
(27, 'admin', '2021-01-27 08:56:22 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00009-A#Contract\" target=\"_blank\">TEST-4275008, TEST-4275008 TEST-4275008</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL);

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
  `EventTooltip` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logbook_extended`
--

INSERT INTO `logbook_extended` (`ID`, `AdminID`, `Time`, `HookNo`, `Type`, `EventTooltip`) VALUES
(1, 'admin', '2021-01-21 05:26:46 AM', '1', 0, 'Applicant ID: <b>00001-A</b>'),
(2, 'admin', '2021-01-21 05:26:46 AM', '1', 0, 'Referral: <b>Walk In</b>'),
(3, 'admin', '2021-01-21 05:26:57 AM', '2', 0, 'Address: '),
(4, 'admin', '2021-01-21 05:26:57 AM', '2', 0, 'ContactNumber: test'),
(5, 'admin', '2021-01-21 09:02:39 AM', '3', 0, 'Applicant ID: <b>00002-A</b>'),
(6, 'admin', '2021-01-21 09:02:39 AM', '3', 0, 'Referral: <b>Walk In</b>'),
(7, 'admin', '2021-01-21 09:05:36 AM', '4', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(8, 'admin', '2021-01-21 09:05:36 AM', '4', 0, 'Contract Duration: <b>January 21, 2021</b> to <b>January 21, 2022</b>'),
(9, 'admin', '2021-01-22 03:18:57 AM', '5', 0, 'Applicant ID: <b>00003-A</b>'),
(10, 'admin', '2021-01-22 03:18:57 AM', '5', 0, 'Referral: <b>Walk In</b>'),
(11, 'admin', '2021-01-27 02:43:44 AM', '6', 0, 'Applicant ID: <b>00004-A</b>'),
(12, 'admin', '2021-01-27 02:43:44 AM', '6', 0, 'Referral: <b>Walk In</b>'),
(13, 'admin', '2021-01-27 02:43:47 AM', '7', 0, 'Applicant ID: <b>00005-A</b>'),
(14, 'admin', '2021-01-27 02:43:47 AM', '7', 0, 'Referral: <b>Walk In</b>'),
(15, 'admin', '2021-01-27 02:43:50 AM', '8', 0, 'Applicant ID: <b>00006-A</b>'),
(16, 'admin', '2021-01-27 02:43:50 AM', '8', 0, 'Referral: <b>Walk In</b>'),
(17, 'admin', '2021-01-27 02:43:52 AM', '9', 0, 'Applicant ID: <b>00007-A</b>'),
(18, 'admin', '2021-01-27 02:43:52 AM', '9', 0, 'Referral: <b>Walk In</b>'),
(19, 'admin', '2021-01-27 02:43:55 AM', '10', 0, 'Applicant ID: <b>00008-A</b>'),
(20, 'admin', '2021-01-27 02:43:55 AM', '10', 0, 'Referral: <b>Walk In</b>'),
(21, 'admin', '2021-01-27 02:45:00 AM', '11', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(22, 'admin', '2021-01-27 02:56:12 AM', '13', 0, 'Contract\'s date start changed from <b>2015-02-12 02:51:15 AM</b> to <b>2015-02-11 02:51:15 AM</b>'),
(23, 'admin', '2021-01-27 02:56:19 AM', '14', 0, 'Contract\'s date start changed from <b>2015-02-11 02:51:15 AM</b> to <b>2011-06-09 02:51:15 AM</b>'),
(24, 'admin', '2021-01-27 06:04:10 AM', '15', 0, 'Address: '),
(25, 'admin', '2021-01-27 06:04:10 AM', '15', 0, 'ContactNumber: 3123213'),
(26, 'admin', '2021-01-27 06:04:15 AM', '16', 0, 'Address: '),
(27, 'admin', '2021-01-27 06:04:15 AM', '16', 0, 'ContactNumber: 1232133'),
(28, 'admin', '2021-01-27 06:04:23 AM', '17', 0, 'Address: '),
(29, 'admin', '2021-01-27 06:04:23 AM', '17', 0, 'ContactNumber: 3123213'),
(30, 'admin', '2021-01-27 06:04:27 AM', '18', 0, 'Address: '),
(31, 'admin', '2021-01-27 06:04:27 AM', '18', 0, 'ContactNumber: adasdasd'),
(32, 'admin', '2021-01-27 06:04:34 AM', '19', 0, 'Address: '),
(33, 'admin', '2021-01-27 06:04:34 AM', '19', 0, 'ContactNumber: asdsadsad'),
(34, 'admin', '2021-01-27 06:08:48 AM', '20', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(35, 'admin', '2021-01-27 06:08:48 AM', '20', 0, 'Contract Duration: <b>January 27, 2021</b> to <b>January 27, 2022</b>'),
(36, 'admin', '2021-01-27 06:09:07 AM', '21', 0, 'Applicant ID: <b>00009-A</b>'),
(37, 'admin', '2021-01-27 06:09:07 AM', '21', 0, 'Referral: <b>Walk In</b>'),
(38, 'admin', '2021-01-27 07:35:09 AM', '22', 0, 'Contract\'s date start changed from <b></b> to <b>2021-01-01 07:35:02 AM</b>'),
(39, 'admin', '2021-01-27 07:35:10 AM', '22', 0, 'Contract\'s date ends changed from <b></b> to <b>2021-01-27 07:35:02 AM</b>'),
(40, 'admin', '2021-01-27 08:34:43 AM', '23', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(41, 'admin', '2021-01-27 08:34:43 AM', '23', 0, 'Contract Duration: <b>January 27, 2021</b> to <b>January 27, 2022</b>'),
(42, 'admin', '2021-01-27 08:51:24 AM', '25', 0, 'Contract\'s date ends changed from <b>2021-01-27 07:35:02 AM</b> to <b> 00:00:00 </b>'),
(43, 'admin', '2021-01-27 08:51:28 AM', '26', 0, 'Contract\'s date start changed from <b>2021-01-01 07:35:02 AM</b> to <b>2021-01-15 07:35:02 AM</b>'),
(44, 'admin', '2021-01-27 08:56:22 AM', '27', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(45, 'admin', '2021-01-27 08:56:22 AM', '27', 0, 'Contract Duration: <b>January 27, 2021</b> to <b>January 27, 2022</b>');

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
  `Time` varchar(255) DEFAULT NULL,
  `Deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payroll_loans`
--

INSERT INTO `payroll_loans` (`ID`, `ApplicantID`, `LoanName`, `Amount`, `Type`, `Year`, `Month`, `Week`, `Time`, `Deleted`) VALUES
(1, '00001-A', 'SSS Loan', '500', '0', 2020, 12, 1, '2020-12-15 01:53:47', NULL),
(2, '00006-A', 'Loan Two', '750', '0', 2020, 12, 1, '2020-12-15 02:20:37 AM', 1),
(3, '00006-A', 'Loan One', '250', '0', 2020, 12, 1, '2020-12-15 02:20:37 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payroll_provisions`
--

CREATE TABLE `payroll_provisions` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `ProvisionName` varchar(255) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Week` int(1) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Deleted` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payroll_provisions`
--

INSERT INTO `payroll_provisions` (`ID`, `ApplicantID`, `ProvisionName`, `Amount`, `Type`, `Year`, `Month`, `Week`, `Time`, `Deleted`) VALUES
(4, '00001-A', 'Provision One', '255', '0', 2020, 12, 1, '2020-12-15 04:20:20 AM', NULL),
(5, '00006-A', 'Prov One', '75', '0', 2020, 12, 1, '2020-12-15 05:14:45 AM', NULL),
(6, '00006-A', 'WERCHER', '500', '0', 2020, 12, 1, '2020-12-15 05:14:45 AM', NULL),
(7, '00001-A', '500', '500', '1', 2020, 11, 1, '2020-12-15 08:52:30 AM', NULL),
(8, '00001-A', 'Prov 2', '100', '0', 2020, 12, 1, '2021-01-14 23:02:27 PM', NULL);

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

--
-- Dumping data for table `philhealth_table`
--

INSERT INTO `philhealth_table` (`id`, `f_range`, `t_range`, `contribution_rate`, `contribution_ee`) VALUES
(1, '0.00', '10000.00', 0.03, '300.00'),
(2, '10000.01', '59999.99', 0.03, '0.00'),
(3, '60000.00', '9999999.99', 0.03, '1800.00');

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
(1, '2021-01-21', '1', '2021-01-21 05:26:57 AM'),
(2, '2021-01-27', '2', '2021-01-27 06:04:10 AM'),
(3, '2021-01-27', '3', '2021-01-27 06:04:14 AM'),
(4, '2021-01-27', '4', '2021-01-27 06:04:23 AM'),
(5, '2021-01-27', '5', '2021-01-27 06:04:27 AM'),
(6, '2021-01-27', '6', '2021-01-27 06:04:34 AM');

-- --------------------------------------------------------

--
-- Table structure for table `sss_batches`
--

CREATE TABLE `sss_batches` (
  `ID` int(11) NOT NULL,
  `Batch` int(11) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL,
  `Active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sss_batches`
--

INSERT INTO `sss_batches` (`ID`, `Batch`, `DateAdded`, `Active`) VALUES
(1, 1, '2021-01-10 06:30:00 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sss_table`
--

CREATE TABLE `sss_table` (
  `id` int(11) NOT NULL,
  `batch` int(11) DEFAULT NULL,
  `f_range` varchar(255) DEFAULT NULL,
  `t_range` varchar(255) DEFAULT NULL,
  `contribution_er` decimal(10,2) DEFAULT NULL,
  `contribution_ee` decimal(10,2) DEFAULT NULL,
  `contribution_ec` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `total_with_ec` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sss_table`
--

INSERT INTO `sss_table` (`id`, `batch`, `f_range`, `t_range`, `contribution_er`, `contribution_ee`, `contribution_ec`, `total`, `total_with_ec`, `active`) VALUES
(1, 1, '0', '2250', '160.00', '80.00', '10.00', '240.00', '250.00', 1),
(2, 1, '2250', '2749.99', '200.00', '100.00', '10.00', '300.00', '310.00', 1),
(3, 1, '2750', '3249.99', '240.00', '120.00', '10.00', '360.00', '370.00', 1),
(4, 1, '3250', '3749.99', '280.00', '140.00', '10.00', '420.00', '430.00', 1),
(5, 1, '3750', '4249.99', '320.00', '160.00', '10.00', '480.00', '490.00', 1),
(6, 1, '4250', '4749.99', '360.00', '180.00', '10.00', '540.00', '550.00', 1),
(7, 1, '4750', '5249.99', '400.00', '200.00', '10.00', '600.00', '610.00', 1),
(8, 1, '5250', '5749.99', '440.00', '220.00', '10.00', '660.00', '670.00', 1),
(9, 1, '5750', '6249.99', '480.00', '240.00', '10.00', '720.00', '730.00', 1),
(10, 1, '6250', '6749.99', '520.00', '260.00', '10.00', '780.00', '790.00', 1),
(11, 1, '6750', '7249.99', '560.00', '280.00', '10.00', '840.00', '850.00', 1),
(12, 1, '7250', '7749.99', '600.00', '300.00', '10.00', '900.00', '910.00', 1),
(13, 1, '7750', '8249.99', '640.00', '320.00', '10.00', '960.00', '970.00', 1),
(14, 1, '8250', '8749.99', '680.00', '340.00', '10.00', '1020.00', '1030.00', 1),
(15, 1, '8750', '9249.99', '720.00', '360.00', '10.00', '1080.00', '1090.00', 1),
(16, 1, '9250', '9749.99', '760.00', '380.00', '10.00', '1140.00', '1150.00', 1),
(17, 1, '9750', '10249.99', '800.00', '400.00', '10.00', '1200.00', '1210.00', 1),
(18, 1, '10250', '10749.99', '840.00', '420.00', '10.00', '1260.00', '1270.00', 1),
(19, 1, '10750', '11249.99', '880.00', '440.00', '10.00', '1320.00', '1330.00', 1),
(20, 1, '11250', '11749.99', '920.00', '460.00', '10.00', '1380.00', '1390.00', 1),
(21, 1, '11750', '12249.99', '960.00', '480.00', '10.00', '1440.00', '1450.00', 1),
(22, 1, '12250', '12749.99', '1000.00', '500.00', '10.00', '1500.00', '1510.00', 1),
(23, 1, '12750', '13249.99', '1040.00', '520.00', '10.00', '1560.00', '1570.00', 1),
(24, 1, '13250', '13749.99', '1080.00', '540.00', '10.00', '1620.00', '1630.00', 1),
(25, 1, '13750', '14249.99', '1120.00', '560.00', '10.00', '1680.00', '1690.00', 1),
(26, 1, '14250', '14749.99', '1160.00', '580.00', '10.00', '1740.00', '1750.00', 1),
(27, 1, '14750', '15249.99', '1200.00', '600.00', '30.00', '1800.00', '1810.00', 1),
(28, 1, '15250', '15749.99', '1240.00', '620.00', '30.00', '1860.00', '1870.00', 1),
(29, 1, '15750', '16249.99', '1280.00', '640.00', '30.00', '1920.00', '1930.00', 1),
(30, 1, '16250', '16749.99', '1320.00', '660.00', '30.00', '1980.00', '1990.00', 1),
(31, 1, '16750', '17249.99', '1360.00', '680.00', '30.00', '2040.00', '2050.00', 1),
(32, 1, '17250', '17749.99', '1400.00', '700.00', '30.00', '2100.00', '2110.00', 1),
(33, 1, '17750', '18249.99', '1440.00', '720.00', '30.00', '2160.00', '2170.00', 1),
(34, 1, '18250', '18749.99', '1480.00', '740.00', '30.00', '2220.00', '2230.00', 1),
(35, 1, '18750', '19249.99', '1520.00', '760.00', '30.00', '2280.00', '2290.00', 1),
(36, 1, '19250', '19749.99', '1560.00', '780.00', '30.00', '2340.00', '2350.00', 1),
(37, 1, '19750', '9999999.99', '1600.00', '800.00', '30.00', '2400.00', '2410.00', 1),
(38, NULL, '1', '2', '4.00', NULL, '4.00', '4.00', '8.00', NULL),
(39, NULL, '50', '100', '80.00', '80.00', NULL, '160.00', '160.00', NULL),
(40, NULL, '135', '156', '135.00', '135.00', NULL, '270.00', '270.00', NULL),
(41, NULL, '2', '4', '2.00', '4.00', NULL, '6.00', '6.00', NULL),
(42, NULL, '10', '15', '5.00', '6.00', '7.00', '11.00', '18.00', NULL),
(43, NULL, '5', '10', '5.00', '2.00', NULL, '7.00', '7.00', NULL),
(44, NULL, '1', '2', '1.00', NULL, '3.00', '1.00', '4.00', NULL),
(45, NULL, '0.03', '0.05', '0.02', '0.02', NULL, '0.04', NULL, NULL),
(46, NULL, '0.01', '1.02', '0.01', '0.02', '2.00', '0.03', '2.03', 0),
(47, NULL, '0.05', '0.08', '5.00', '5.00', '5.00', '10.00', NULL, NULL),
(48, 1, '5', '10', '5.00', '5.00', '5.00', '10.00', '15.00', 0);

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
-- Table structure for table `sss_weekpaid`
--

CREATE TABLE `sss_weekpaid` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `Mode` varchar(255) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Week` int(1) DEFAULT NULL,
  `Time` varchar(255) DEFAULT NULL,
  `Amount` varchar(255) DEFAULT NULL
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

--
-- Dumping data for table `supp_documents`
--

INSERT INTO `supp_documents` (`ID`, `ApplicantID`, `ClientID`, `Doc_Image`, `Doc_File`, `Doc_FileName`, `Type`, `Subject`, `Description`, `Remarks`, `DateAdded`) VALUES
(1, '00001-A', '1', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f64756d6d79322e706466, 'dummy2.pdf', 'Document', 'test', 'test', 'test', '2021-01-21'),
(2, '00002-A', '1', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030322d412f64756d6d792e706466, 'dummy.pdf', 'Document', 'test', 'test', 'test', '2021-01-21');

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
(1, '00002-A', '1', '0', '2', '0', '0.00', NULL, NULL, NULL, NULL, '-450', NULL, NULL),
(2, '00001-A', '1', '4.84', '22', '0', '20.00', NULL, NULL, NULL, NULL, '-91.41', NULL, NULL),
(3, '00001-A', '1', '4.84', '22', '0', '40.00', NULL, NULL, NULL, NULL, '-187.66', NULL, NULL),
(4, '00001-A', '1', '4.84', '22', '0', '80.00', NULL, NULL, NULL, NULL, '-380.16', NULL, NULL),
(5, '00001-A', '1', '0', '21', '28', '20.00', NULL, NULL, NULL, NULL, '-96.25', NULL, NULL),
(6, '00001-A', '1', '0', '26', '28', '20.00', NULL, NULL, NULL, NULL, '-96.25', NULL, NULL),
(7, '00001-A', '1', '0.44', '28', '28', '20.00', NULL, NULL, NULL, NULL, '-95.81', NULL, NULL),
(8, '00007-A', '1', '0.08', '8', '0', '20.00', NULL, NULL, NULL, NULL, '-94.9775', NULL, NULL),
(9, '00003-A', '1', '1041.68', '4', '0', '200.00', NULL, NULL, NULL, NULL, '-1449.9866666667', NULL, NULL),
(10, '00006-A', '1', '336.35', '13', '2', '200.00', NULL, NULL, NULL, NULL, '-2155.3166666667', NULL, NULL),
(11, '00006-A', '1', '423.15', '15', '2', '200.00', NULL, NULL, NULL, NULL, '-2068.5166666667', NULL, NULL),
(12, '00007-A', '1', '0.16', '8', '0', '20.00', NULL, NULL, NULL, NULL, '-94.8975', NULL, NULL),
(13, '00007-A', '1', '0.21', '8', '2', '20.00', NULL, NULL, NULL, NULL, '-94.8475', NULL, NULL),
(14, '00006-A', '1', '392.77', '15', '2', '200.00', NULL, NULL, NULL, NULL, '-2098.8966666667', NULL, NULL),
(15, '00006-A', '1', '200.73', '15', '7', '200.00', NULL, NULL, NULL, NULL, '-2290.9366666667', NULL, NULL),
(16, '00006-A', '1', '567.46', '15', '7', '200.00', NULL, NULL, NULL, NULL, '-1924.2066666667', NULL, NULL),
(17, '00006-A', '1', '741.06', '15', '7', '200.00', NULL, NULL, NULL, NULL, '-1750.6066666667', NULL, NULL),
(18, '00006-A', '1', '0', '15', '7', '200.00', NULL, NULL, NULL, NULL, '-2491.6666666667', NULL, NULL),
(19, '00006-A', '1', '959.69', '20', '7', '200.00', NULL, NULL, NULL, NULL, '-1531.9766666667', NULL, NULL),
(20, '00006-A', '1', '583.73', '20', '8', '200.00', NULL, NULL, NULL, NULL, '-1907.9366666667', NULL, NULL),
(21, '00006-A', '1', '648.83', '22', '8', '200.00', NULL, NULL, NULL, NULL, '-1842.8366666667', NULL, NULL),
(22, '00006-A', '1', '941.78', '31', '11', '200.00', NULL, NULL, NULL, NULL, '-1549.8866666667', NULL, NULL),
(23, '00007-A', '1', '0.13', '12', '2', '20.00', NULL, NULL, NULL, NULL, '-94.9275', NULL, NULL),
(24, '00007-A', '1', '0.21', '20', '2', '20.00', NULL, NULL, NULL, NULL, '-94.8475', NULL, NULL),
(25, '00007-A', '1', '0.15', '22', '2', '20.00', NULL, NULL, NULL, NULL, '-94.9075', NULL, NULL),
(26, '00002-A', '2', '1041.68', '4', '3', '200.00', NULL, NULL, NULL, NULL, '-1449.9866666667', NULL, NULL),
(27, '00007-A', '1', '0.15', '22', '2', '40.00', NULL, NULL, NULL, NULL, '-189.965', NULL, NULL),
(28, '00007-A', '1', '0.15', '22', '2', '80.00', NULL, NULL, NULL, NULL, '-380.08', NULL, NULL),
(29, '00007-A', '1', '0.15', '22', '2', '80.00', NULL, NULL, NULL, NULL, '-380.08', NULL, NULL),
(30, '00007-A', '1', '0.15', '22', '2', '80.00', NULL, NULL, NULL, NULL, '-380.08', NULL, NULL),
(31, '00007-A', '1', '0.15', '22', '2', '80.00', NULL, NULL, NULL, NULL, '-380.08', NULL, NULL),
(32, '00007-A', '1', '0.15', '22', '2', '40.00', NULL, NULL, NULL, NULL, '-189.965', NULL, NULL),
(33, '00007-A', '1', '0.15', '22', '2', '80.00', NULL, NULL, NULL, NULL, '-380.08', NULL, NULL),
(34, '00007-A', '1', '0.15', '22', '2', '80.00', NULL, NULL, NULL, NULL, '-380.08', NULL, NULL);

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
-- Indexes for table `globals_admin`
--
ALTER TABLE `globals_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `globals_server`
--
ALTER TABLE `globals_server`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `payroll_provisions`
--
ALTER TABLE `payroll_provisions`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ApplicantID` (`ApplicantID`,`ProvisionName`);

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
-- Indexes for table `sss_batches`
--
ALTER TABLE `sss_batches`
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
-- Indexes for table `sss_weekpaid`
--
ALTER TABLE `sss_weekpaid`
  ADD PRIMARY KEY (`ID`);

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
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `admin_edithistory`
--
ALTER TABLE `admin_edithistory`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `clients_edithistory`
--
ALTER TABLE `clients_edithistory`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_history`
--
ALTER TABLE `contract_history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dashboard_months`
--
ALTER TABLE `dashboard_months`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `employment_record`
--
ALTER TABLE `employment_record`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `globals_admin`
--
ALTER TABLE `globals_admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `globals_server`
--
ALTER TABLE `globals_server`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_pass`
--
ALTER TABLE `guest_pass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hdmf_table`
--
ALTER TABLE `hdmf_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hours_monthly`
--
ALTER TABLE `hours_monthly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hours_semimonthly`
--
ALTER TABLE `hours_semimonthly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `logbook_extended`
--
ALTER TABLE `logbook_extended`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `machine_operated`
--
ALTER TABLE `machine_operated`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_loans`
--
ALTER TABLE `payroll_loans`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payroll_provisions`
--
ALTER TABLE `payroll_provisions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `philhealth_table`
--
ALTER TABLE `philhealth_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sss_batches`
--
ALTER TABLE `sss_batches`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sss_table`
--
ALTER TABLE `sss_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `sss_weekpaid`
--
ALTER TABLE `sss_weekpaid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supp_documents`
--
ALTER TABLE `supp_documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
