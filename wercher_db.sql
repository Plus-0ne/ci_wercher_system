-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 02:42 AM
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
(1, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f707572706c652e706e67, '00001-A', 'WCtest-0003-20', 'TEST-854055', 'TEST-854055', '500', 'TEST-854055', 'TEST-854055', 'TEST-85055', 'TEST-854055', 'Male', NULL, 'TEST-854055', 'TEST-854055', 'TEST-854055', '2020-11-29', 'TEST-854055', 'TEST-854055', 'Single', '44', 'TEST-854055', 'TEST-854055', 'TEST-854055', 'TEST-854055', 'TEST-854055', '', 'TEST-854055', 'TEST-854055', NULL, 'TEST-854055', 'TEST-854055', 'TEST-854055', 'TEST-854055', 'TEST-854055', 'Blacklisted', '1', '2020-12-09 04:21:42 AM', '2021-12-09 04:21:42 AM', NULL, NULL, NULL, NULL, '2020-11-29 09:57:18 PM', '', '', NULL, 'No', '00001-B', NULL),
(2, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00002-A', 'WC1-0001-20', 'TEST-239135123123123132', 'TEST-2394007', '50000', 'TEST-23940071233', 'TEST-2394', 'TEST-2394007', 'TEST-2394007', 'Male', NULL, 'TEST-2394007', 'TEST-2394007', 'TEST-2394007', '2020-12-01', 'TEST-2394007', 'TEST-2394007', 'Single', '19', 'TEST-239400612313231313133131234234242234234234234244234234234234', 'TEST-2394007', 'TEST-2394007', 'TEST-239400612313231313133131234234242234234234234244234234234234', 'TEST-2394007', '', 'TEST-2394007123123213123123123123123123', 'TEST-2394007123131231231231231232132132133', NULL, 'TEST-2394007', 'TEST-2394007', 'TEST-2394007', 'TEST-2394007', 'TEST-2394007', 'Employed (Permanent)', '2', '2020-12-09 02:40:00', '', NULL, NULL, NULL, NULL, '2020-12-01 07:47:08 PM', '', '', NULL, 'No', '00002-B', '2020-12-09 02:35:00'),
(3, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00003-A', 'WCtest-0004-20', 'TEST-5612299', 'TEST-5612299', '50000', 'TEST-5612299', 'TEST-5612299', 'TEST-562299', 'TEST-5612299', 'Male', NULL, 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', '2020-12-05', 'TEST-5612299', 'TEST-5612299', 'Single', '4', 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-5612299234', 'TEST-5612299TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442', 'Job Fair', 'TEST-5612299TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442', 'TEST-5612299', NULL, 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'TEST-5612299', 'Blacklisted', '1', '2020-12-14 12:32:08 AM', '2021-01-14 12:32:08 AM', NULL, NULL, NULL, NULL, '2020-12-05 06:12:53 PM', NULL, NULL, NULL, NULL, NULL, '2020-12-08 00:36:25'),
(4, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00004-A', 'WCtest-0003-20', 'TEST-3243424', 'TEST-3243424', '5000', 'TEST-3243424', 'TEST-3243424', 'TEST-43424', 'TEST-3243424', 'Male', NULL, 'TEST-3243424', 'TEST-3243424', 'TEST-3243424', '2020-12-09', 'TEST-3243424', 'TEST-3243424', 'Single', '3', 'TEST-3243424', 'TEST-3243424', 'TEST-3243424', 'TEST-3243424', 'TEST-3243424', '', 'TEST-3243424', 'TEST-3243424', NULL, 'TEST-3243424', 'TEST-3243424', 'TEST-3243424', 'TEST-3243424', 'TEST-3243424', 'Employed (Permanent)', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-09 03:33:15 AM', NULL, NULL, NULL, NULL, '00004-B', NULL),
(5, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00005-A', 'WCtest-0003-20', 'TEST-6470075', 'TEST-6470075', '50000', 'TEST-6470075', 'TEST-6470075', 'TEST-6470075', 'TEST-6470075', 'Male', NULL, 'TEST-6470075', 'TEST-6470075', 'TEST-6470075', '2020-12-09', 'TEST-6470075', 'TEST-6470075', 'Single', '40', 'TEST-6470075', 'TEST-6470075', 'TEST-6470075', 'TEST-6470075', 'TEST-6470075', 'Walk In', 'TEST-6470075', 'TEST-6470075', NULL, 'TEST-6470075', 'TEST-6470075', 'TEST-6470075', 'TEST-6470075', 'TEST-6470075', 'Employed (Permanent)', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-09 04:26:11 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00006-A', 'WCtest-0005-20', 'TEST-2527094', 'TEST-2527094', '50000', 'Abcdef', 'Test', 'TEST-2527094', 'ext', 'Male', NULL, 'TEST-2527094', 'TEST-2527094', 'TEST-2527094', '1988-03-03', 'TEST-2527094', 'TEST-2527094', 'Single', '29', 'TEST-2527094', 'TEST-2527094', 'TEST-2527094', 'TEST-2527094', 'TEST-2527094', 'Walk In', 'TEST-2527094', 'TEST-2527094', NULL, 'TEST-2527094', 'TEST-2527094', 'TEST-2527094', 'TEST-2527094', 'TEST-2527094', 'Employed', '1', '2020-12-14 12:44:38 AM', '2021-12-14 12:44:38 AM', '2021-01-15 06:47:03 AM', '2021-01-20 06:47:03 AM', NULL, 'Yes', '2020-12-13 03:44:07 PM', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00007-A', 'WCtest-0006-20', 'TEST-9160527', 'TEST-9160527', '23', 'TEST-9160527', 'TEST-9160527', 'TEST-9160527', 'TEST-9160527', 'Male', NULL, 'TEST-9160527', 'TEST-9160527', 'TEST-9160527', '2020-12-14', 'TEST-9160527', 'TEST-9160527', 'Single', '20', 'TEST-9160527', 'TEST-9160527', 'TEST-9160527', 'TEST-9160527', 'TEST-9160527', 'Walk In', 'TEST-9160527', 'TEST-9160527', NULL, 'TEST-9160527', 'TEST-9160527', 'TEST-9160527', 'TEST-9160527', 'TEST-9160527', 'Employed', '1', '2020-12-14 12:45:17 AM', '2021-12-19 12:45:17 AM', NULL, NULL, NULL, NULL, '2020-12-14 12:45:09 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00008-A', 'WCtest-0007-20', 'TEST-6506954', 'TEST-6506954', '5555', 'TEST-6506954', 'TEST-6506954', 'TEST-6506954', 'TEST-6506954', 'Male', NULL, 'TEST-6506954', 'TEST-6506954', 'TEST-6506954', '2020-12-14', 'TEST-6506954', 'TEST-6506954', 'Single', '47', 'TEST-6506954', 'TEST-6506954', 'TEST-6506954', 'TEST-6506954', 'TEST-6506954', 'Walk In', 'TEST-6506954', 'TEST-6506954', NULL, 'TEST-6506954', 'TEST-6506954', 'TEST-6506954', 'TEST-6506954', 'TEST-6506954', 'Employed', '1', '2020-12-14 12:45:41 AM', '2022-05-14 12:45:41 AM', NULL, NULL, NULL, NULL, '2020-12-14 12:45:36 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00009-A', 'WCtest-0008-20', 'TEST-8983217', 'TEST-8983217', '50000', 'TEST-8983217', 'TEST-8983217', 'TEST-8983217', 'TEST-8983217', 'Male', NULL, 'TEST-8983217', 'TEST-8983217', 'TEST-8983217', '2020-12-14', 'TEST-8983217', 'TEST-8983217', 'Single', '44', 'TEST-8983217', 'TEST-8983217', 'TEST-8983217', 'TEST-8983217', 'TEST-8983217', 'Walk In', 'TEST-8983217', 'TEST-8983217', NULL, 'TEST-8983217', 'TEST-8983217', 'TEST-8983217', 'TEST-8983217', 'TEST-8983217', 'Employed', '1', '2020-12-14 12:46:18 AM', '2021-12-14 12:46:18 AM', NULL, NULL, NULL, NULL, '2020-12-14 12:46:12 AM', NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test2', '118490201248924', '1554675475677437', 'test', '2020-11-28 06:45:52 AM', 'Active', NULL),
(2, '1', '1', '1', '1', '2020-11-28 06:46:01 AM', 'Active', '2020-12-08 00:55:16'),
(3, 'test3', 'test3', 'test3', 'test3', '2020-12-13 06:39:55 PM', 'Active', NULL);

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
  `ForAdminID` varchar(255) DEFAULT NULL,
  `NightShift` tinyint(1) DEFAULT NULL,
  `Holiday` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dummy_hours`
--

INSERT INTO `dummy_hours` (`ID`, `Time`, `Current`, `ForAdminID`, `NightShift`, `Holiday`) VALUES
(485, '2021-01-09', 'Current', NULL, NULL, NULL),
(486, '2021-01-10', 'Current', NULL, NULL, NULL),
(487, '2021-01-11', 'Current', NULL, NULL, NULL),
(488, '2021-01-12', 'Current', NULL, NULL, NULL),
(489, '2021-01-13', 'Current', NULL, NULL, NULL),
(490, '2021-01-14', 'Current', NULL, NULL, NULL),
(491, '2021-01-15', 'Current', NULL, NULL, NULL);

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
(1, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, '2', '00002-B', 'TEST-23940071233, TEST-2394 TEST-2394007.', '500000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, '2', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '50000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, '1', '00005-B', 'TEST-6470075, TEST-6470075 TEST-6470075.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(17, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-07', 4, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '3.48', NULL, NULL, NULL, 0),
(18, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-08', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(19, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-09', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(20, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-10', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(21, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-11', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(22, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-12', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(23, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(24, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(25, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(26, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-16', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(27, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-17', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(28, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-18', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(29, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-19', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(30, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-20', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(31, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-21', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(32, '1', '00001-A', NULL, NULL, 1, 11, 2020, '2020-12-22', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, NULL, NULL, 0),
(33, '1', '00003-B', ' TEST-5612299, TEST-5612299TEST-562299', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(34, '1', '00006-B', ' TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094, TEST-2527094TEST-2527094', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(35, '1', '00007-B', ' TEST-9160527, TEST-9160527TEST-9160527', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(36, '1', '00008-B', ' TEST-6506954, TEST-6506954TEST-6506954', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(37, '1', '00009-B', ' TEST-8983217, TEST-8983217TEST-8983217', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(66, '1', '00001-A', NULL, NULL, 1, 0, 2021, '2021-01-09', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(67, '1', '00001-A', NULL, NULL, 1, 0, 2021, '2021-01-10', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(68, '1', '00001-A', NULL, NULL, 1, 0, 2021, '2021-01-11', 2, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.74', '0.00', '0.00', '0.00', 0),
(69, '1', '00001-A', NULL, NULL, 1, 0, 2021, '2021-01-12', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(70, '1', '00001-A', NULL, NULL, 1, 0, 2021, '2021-01-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(71, '1', '00001-A', NULL, NULL, 1, 0, 2021, '2021-01-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(72, '1', '00001-A', NULL, NULL, 1, 0, 2021, '2021-01-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(80, '1', '00007-A', NULL, NULL, 1, 0, 2021, '2021-01-09', 2, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.08', '0.00', '0.00', '0.00', 0),
(81, '1', '00007-A', NULL, NULL, 1, 0, 2021, '2021-01-10', 5, 0, NULL, 1, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(82, '1', '00007-A', NULL, NULL, 1, 0, 2021, '2021-01-11', 0, 0, NULL, 2, 0, '', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(83, '1', '00007-A', NULL, NULL, 1, 0, 2021, '2021-01-12', 0, 0, NULL, 2, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(84, '1', '00007-A', NULL, NULL, 1, 0, 2021, '2021-01-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(85, '1', '00007-A', NULL, NULL, 1, 0, 2021, '2021-01-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(86, '1', '00007-A', NULL, NULL, 1, 0, 2021, '2021-01-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(87, '1', '00008-A', NULL, NULL, 1, 1, 2021, '2021-01-09', 3, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20.43', '0.00', '0.00', '0.00', 0),
(88, '1', '00008-A', NULL, NULL, 1, 1, 2021, '2021-01-10', 2, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '13.62', '0.00', '0.00', '0.00', 0),
(89, '1', '00008-A', NULL, NULL, 1, 1, 2021, '2021-01-11', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(90, '1', '00008-A', NULL, NULL, 1, 1, 2021, '2021-01-12', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(91, '1', '00008-A', NULL, NULL, 1, 1, 2021, '2021-01-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(92, '1', '00008-A', NULL, NULL, 1, 1, 2021, '2021-01-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(93, '1', '00008-A', NULL, NULL, 1, 1, 2021, '2021-01-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0);

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
(1, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, '1', '00002-B', 'TEST-2394007, TEST-2394007 TEST-2394007.', '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, '2', '00002-B', 'TEST-23940071233, TEST-2394 TEST-2394007.', '500000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', '20000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, '2', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '50000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(10, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, '1', '00001-B', 'TEST-854055, TEST-854055 TEST-85055.', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, '1', '00004-B', 'TEST-3243424, TEST-3243424 TEST-43424.', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, '1', '00005-B', 'TEST-6470075, TEST-6470075 TEST-6470075.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(17, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-07', 3, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '1.05', NULL, NULL, NULL, 0),
(18, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-08', 0, 0, NULL, 4, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '1.75', NULL, NULL, NULL, 0),
(19, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-09', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(20, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-10', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(21, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-11', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(22, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-12', 6, 5, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '5.23', NULL, NULL, NULL, 0),
(23, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(24, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(25, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(26, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-16', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(27, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-17', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(28, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-18', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(29, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-19', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(30, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-20', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(31, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-21', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(32, '1', '00001-A', NULL, NULL, '1', '11', 2020, '2020-12-22', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, '', '', '', '', '0.00', NULL, NULL, NULL, 0),
(33, '1', '00003-B', ' TEST-5612299, TEST-5612299TEST-562299', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(34, '1', '00006-B', ' TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094, TEST-2527094TEST-2527094', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(35, '1', '00007-B', ' TEST-9160527, TEST-9160527TEST-9160527', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(36, '1', '00008-B', ' TEST-6506954, TEST-6506954TEST-6506954', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(37, '1', '00009-B', ' TEST-8983217, TEST-8983217TEST-8983217', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(45, '1', '00001-A', NULL, NULL, '1', '04', 2021, '2021-01-09', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(46, '1', '00001-A', NULL, NULL, '1', '04', 2021, '2021-01-10', 3, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.05', '0.00', '0.00', '0.00', 0),
(47, '1', '00001-A', NULL, NULL, '1', '04', 2021, '2021-01-11', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(48, '1', '00001-A', NULL, NULL, '1', '04', 2021, '2021-01-12', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(49, '1', '00001-A', NULL, NULL, '1', '04', 2021, '2021-01-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(50, '1', '00001-A', NULL, NULL, '1', '04', 2021, '2021-01-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(51, '1', '00001-A', NULL, NULL, '1', '04', 2021, '2021-01-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(52, '1', '00007-A', NULL, NULL, '1', '01', 2021, '2021-01-09', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(53, '1', '00007-A', NULL, NULL, '1', '01', 2021, '2021-01-10', 2, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(54, '1', '00007-A', NULL, NULL, '1', '01', 2021, '2021-01-11', 3, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.06', '0.00', '0.00', '0.00', 0),
(55, '1', '00007-A', NULL, NULL, '1', '01', 2021, '2021-01-12', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(56, '1', '00007-A', NULL, NULL, '1', '01', 2021, '2021-01-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(57, '1', '00007-A', NULL, NULL, '1', '01', 2021, '2021-01-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(58, '1', '00007-A', NULL, NULL, '1', '01', 2021, '2021-01-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(59, '1', '00009-A', NULL, NULL, '1', '01', 2021, '2021-01-09', 5, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '173.60', '0.00', '0.00', '0.00', 0),
(60, '1', '00009-A', NULL, NULL, '1', '01', 2021, '2021-01-10', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(61, '1', '00009-A', NULL, NULL, '1', '01', 2021, '2021-01-11', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(62, '1', '00009-A', NULL, NULL, '1', '01', 2021, '2021-01-12', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(63, '1', '00009-A', NULL, NULL, '1', '01', 2021, '2021-01-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(64, '1', '00009-A', NULL, NULL, '1', '01', 2021, '2021-01-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(65, '1', '00009-A', NULL, NULL, '1', '01', 2021, '2021-01-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0);

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
(1, '1', '00007-A', NULL, NULL, 3, 12, 2020, '2020-12-12', 8, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.08', '0.00', '0.00', '0.00', 0),
(2, '1', '00007-A', NULL, NULL, 3, 12, 2020, '2020-12-13', 4, 0, NULL, 0, 0, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.05', '0.00', '0.00', '0.00', 0),
(3, '1', '00007-A', NULL, NULL, 3, 12, 2020, '2020-12-14', 0, 0, NULL, 2, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.03', '0.00', '0.00', 0),
(4, '1', '00007-A', NULL, NULL, 3, 12, 2020, '2020-12-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(5, '1', '00007-A', NULL, NULL, 3, 12, 2020, '2020-12-16', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(6, '1', '00007-A', NULL, NULL, 3, 12, 2020, '2020-12-17', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(7, '1', '00007-A', NULL, NULL, 3, 12, 2020, '2020-12-18', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(15, '1', '00007-A', NULL, NULL, 2, 12, 2020, '2021-01-08', 8, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(16, '1', '00007-A', NULL, NULL, 2, 12, 2020, '2021-01-09', 2, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.02', '0.00', '0.00', '0.00', 0),
(17, '1', '00007-A', NULL, NULL, 2, 12, 2020, '2021-01-10', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(18, '1', '00007-A', NULL, NULL, 2, 12, 2020, '2021-01-11', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(19, '1', '00007-A', NULL, NULL, 2, 12, 2020, '2021-01-12', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(20, '1', '00007-A', NULL, NULL, 2, 12, 2020, '2021-01-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(21, '1', '00007-A', NULL, NULL, 2, 12, 2020, '2021-01-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(22, '2', '00002-A', NULL, NULL, 1, 12, 2020, '2021-01-09', 4, 0, NULL, 3, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1041.68', '976.58', '0.00', '0.00', 0),
(23, '2', '00002-A', NULL, NULL, 1, 12, 2020, '2021-01-10', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(24, '2', '00002-A', NULL, NULL, 1, 12, 2020, '2021-01-11', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(25, '2', '00002-A', NULL, NULL, 1, 12, 2020, '2021-01-12', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(26, '2', '00002-A', NULL, NULL, 1, 12, 2020, '2021-01-13', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(27, '2', '00002-A', NULL, NULL, 1, 12, 2020, '2021-01-14', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(28, '2', '00002-A', NULL, NULL, 1, 12, 2020, '2021-01-15', 0, 0, NULL, 0, 0, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0);

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
(119, 'admin', '2020-12-08 02:39:51 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940071233, TEST-2394 TEST-2394007</a>', NULL),
(120, 'admin', '2020-12-08 11:05:35 PM', 'Applicant', 'Green', ' restored client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">1</a>', NULL),
(121, 'admin', '2020-12-09 02:35:00 AM', 'Applicant', 'Red', ' archived <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940071233, TEST-2394 T.</a>', NULL),
(122, 'admin', '2020-12-09 02:35:07 AM', 'Applicant', 'Green', ' restored <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">[No Name]</a>', NULL),
(123, 'admin', '2020-12-09 02:39:46 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract\" target=\"_blank\">TEST-23940071233, TEST-2394 TEST-2394007</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">1</a>', NULL),
(124, NULL, '2020-12-09 02:39:46 AM', NULL, 'Update', 'Employee 00002-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00002-A'),
(125, 'admin', '2020-12-09 02:40:00 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract\" target=\"_blank\">TEST-23940071233, TEST-2394 TEST-2394007</a> permanently to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">1</a>', NULL),
(126, 'admin', '2020-12-09 02:56:33 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(127, 'admin', '2020-12-09 03:33:15 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A\" target=\"_blank\">TEST-3243424, TEST-3243424 TEST-43424</a>', NULL),
(128, 'admin', '2020-12-09 03:58:57 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>\'s contract details', NULL),
(129, NULL, '2020-12-09 03:58:57 AM', NULL, 'Update', 'Employee 00001-A has expired!', 'http://localhost/ci_wercher_system/ViewEmployee?id=00001-A'),
(130, 'admin', '2020-12-09 04:09:04 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A#Contract\" target=\"_blank\">TEST-3243424, TEST-3243424 TEST-43424</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(131, 'admin', '2020-12-09 04:14:16 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A#Contract\" target=\"_blank\">TEST-3243424, TEST-3243424 TEST-43424</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">1</a>', NULL),
(132, 'admin', '2020-12-09 04:19:15 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A#Contract\" target=\"_blank\">TEST-3243424, TEST-3243424 TEST-43424</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(133, 'admin', '2020-12-09 04:20:13 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A#Contract\" target=\"_blank\">TEST-3243424, TEST-3243424 TEST-43424</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(134, 'admin', '2020-12-09 04:20:31 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A#Contract\" target=\"_blank\">TEST-3243424, TEST-3243424 TEST-43424</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(135, 'admin', '2020-12-09 04:20:39 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(136, 'admin', '2020-12-09 04:21:42 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(137, 'admin', '2020-12-09 04:22:14 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A#Contract\" target=\"_blank\">TEST-3243424, TEST-3243424 TEST-43424</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(138, 'admin', '2020-12-09 04:26:11 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00005-A\" target=\"_blank\">TEST-6470075, TEST-6470075 TEST-6470075</a>', NULL),
(139, 'admin', '2020-12-09 04:27:07 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00005-A#Contract\" target=\"_blank\">TEST-6470075, TEST-6470075 TEST-6470075</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(140, 'admin', '2020-12-09 04:27:40 AM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(141, 'admin', '2020-12-13 03:07:31 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(142, 'admin', '2020-12-13 03:11:42 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(143, 'admin', '2020-12-13 03:13:14 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(144, 'admin', '2020-12-13 03:16:05 PM', 'Admin', 'Green', ' added a new admin: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=Payroll\" target=\"_blank\">P, Payroll </a>', NULL),
(145, 'admin', '2020-12-13 03:44:07 PM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">TEST-2527094, TEST-2527094 TEST-2527094</a>', NULL),
(146, 'Payroll', '2020-12-13 04:57:11 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(147, 'Payroll', '2020-12-13 04:57:19 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(148, 'Payroll', '2020-12-13 04:57:25 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(149, 'admin', '2020-12-13 06:14:37 PM', 'Salary', 'Blue', ' updated the primary week', NULL),
(150, 'admin', '2020-12-13 06:14:43 PM', 'Salary', 'Blue', ' updated the primary week', NULL),
(151, 'admin', '2020-12-13 06:31:35 PM', 'Salary', 'Blue', ' updated the primary week', NULL),
(152, 'admin', '2020-12-13 06:39:55 PM', 'Client', 'Green', ' added a new client: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=3\" target=\"_blank\">test3</a>', NULL),
(153, 'admin', '2020-12-13 06:47:12 PM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094, TEST-2527094 TEST-2527094</a>', NULL),
(154, 'admin', '2020-12-13 07:41:45 PM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A\" target=\"_blank\">TEST-5612299, TEST-5612299 TEST-562299</a>', NULL),
(155, 'admin', '2020-12-13 07:41:55 PM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A\" target=\"_blank\">TEST-5612299, TEST-5612299 TEST-562299</a>', NULL),
(156, 'admin', '2020-12-14 12:31:52 AM', 'Applicant', 'Green', ' restored <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A\" target=\"_blank\">[No Name]</a>', NULL),
(157, 'admin', '2020-12-14 12:45:09 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(158, 'admin', '2020-12-14 12:45:36 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-6506954, TEST-6506954 TEST-6506954</a>', NULL),
(159, 'admin', '2020-12-14 12:46:12 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00009-A\" target=\"_blank\">TEST-8983217, TEST-8983217 TEST-8983217</a>', NULL),
(160, 'admin', '2020-12-14 12:46:18 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00009-A#Contract\" target=\"_blank\">TEST-8983217, TEST-8983217 TEST-8983217</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test2</a>', NULL),
(161, 'admin', '2020-12-14 01:49:50 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(162, 'admin', '2020-12-14 01:49:54 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00003-A\" target=\"_blank\">TEST-5612299, TEST-5612299 TEST-562299</a>', NULL),
(163, 'admin', '2020-12-14 04:38:45 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, TEST-2527094 TEST-2527094</a>', NULL),
(164, 'admin', '2020-12-14 04:38:53 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(165, 'admin', '2020-12-14 05:38:24 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940071233, TEST-2394 TEST-2394007</a>', NULL),
(166, 'admin', '2020-12-14 05:39:46 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(167, 'admin', '2020-12-14 06:04:40 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(168, 'admin', '2020-12-14 06:20:03 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(169, 'admin', '2020-12-14 06:20:08 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(170, 'admin', '2020-12-14 06:28:53 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(171, 'admin', '2020-12-14 06:38:00 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(172, 'admin', '2020-12-14 06:38:28 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(173, 'admin', '2020-12-14 06:45:29 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(174, 'admin', '2020-12-14 07:50:10 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(175, 'admin', '2020-12-14 08:13:36 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(176, 'admin', '2020-12-14 08:17:35 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(177, 'admin', '2020-12-14 05:28:35 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(178, 'admin', '2020-12-14 08:43:05 PM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test21341345445461344134451134</a>', NULL),
(179, 'admin', '2020-12-14 08:44:27 PM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test213413454454613441344325635262632623623635636356</a>', NULL),
(180, 'admin', '2020-12-14 08:44:40 PM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test21341345445461344134424624642624624624624624626262624642626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test213413454454613441344246246426246246246246246262626246426262462462624624626246246</a>', NULL),
(181, 'admin', '2020-12-15 02:05:35 AM', 'Client', 'Blue', ' updated client <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344</a>', NULL),
(182, 'admin', '2020-12-15 02:21:15 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(183, 'admin', '2020-12-18 10:38:45 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(184, 'admin', '2021-01-07 08:22:43 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(185, 'admin', '2021-01-07 08:30:07 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(186, 'admin', '2021-01-07 09:28:56 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(187, 'admin', '2021-01-07 09:29:44 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(188, 'admin', '2021-01-09 09:04:44 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(189, 'admin', '2021-01-09 09:05:50 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(190, 'admin', '2021-01-10 03:00:09 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(191, 'admin', '2021-01-10 03:00:22 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(192, 'admin', '2021-01-10 03:00:53 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(193, 'admin', '2021-01-10 03:01:03 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(194, 'admin', '2021-01-10 03:01:07 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(195, 'admin', '2021-01-10 03:01:11 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(196, 'admin', '2021-01-10 03:01:15 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(197, 'admin', '2021-01-10 03:01:41 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(198, 'admin', '2021-01-10 03:02:29 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(199, 'admin', '2021-01-10 03:02:43 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(200, 'admin', '2021-01-10 03:03:37 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(201, 'admin', '2021-01-10 03:04:00 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(202, 'admin', '2021-01-10 03:04:03 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(203, 'admin', '2021-01-10 03:04:07 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(204, 'admin', '2021-01-10 03:04:59 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(205, 'admin', '2021-01-10 03:06:08 PM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(206, 'admin', '2021-01-10 03:06:22 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(207, 'admin', '2021-01-10 11:31:49 PM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(208, 'admin', '2021-01-13 08:40:31 PM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(209, 'admin', '2021-01-14 10:52:42 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(210, 'admin', '2021-01-14 11:00:33 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(211, 'admin', '2021-01-15 01:08:09 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-23940071233, TEST-2394 TEST-2394007</a>', NULL),
(212, 'admin', '2021-01-15 05:34:08 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL);
INSERT INTO `logbook` (`No`, `AdminID`, `Time`, `Icon`, `Type`, `Event`, `Link`) VALUES
(213, 'admin', '2021-01-15 05:35:57 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(214, 'admin', '2021-01-15 05:36:26 AM', 'Salary', 'Blue', ' updated the primary week', NULL),
(215, 'admin', '2021-01-15 05:36:37 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(216, 'admin', '2021-01-15 05:36:43 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(217, 'admin', '2021-01-15 05:36:47 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(218, 'admin', '2021-01-15 05:37:02 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(219, 'admin', '2021-01-15 05:37:19 AM', 'Salary', 'Blue', ' updated the primary week', NULL),
(220, 'admin', '2021-01-15 05:37:26 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(221, 'admin', '2021-01-15 05:42:44 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-854055, TEST-854055 TEST-85055</a>', NULL),
(222, 'admin', '2021-01-15 05:42:50 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(223, 'admin', '2021-01-15 05:43:11 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-9160527, TEST-9160527 TEST-9160527</a>', NULL),
(224, 'admin', '2021-01-15 05:44:26 AM', 'Salary', 'Blue', ' updated the primary week', NULL),
(225, 'admin', '2021-01-15 05:46:30 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-6506954, TEST-6506954 TEST-6506954</a>', NULL),
(226, 'admin', '2021-01-15 05:47:23 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00009-A\" target=\"_blank\">TEST-8983217, TEST-8983217 TEST-8983217</a>', NULL),
(227, 'admin', '2021-01-15 06:42:56 AM', 'Employee', 'Red', ' suspended <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A#Contract\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(228, 'admin', '2021-01-15 06:45:42 AM', 'Employee', 'Red', ' suspended <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A#Contract\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL),
(229, 'admin', '2021-01-15 06:47:03 AM', 'Employee', 'Red', ' suspended <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A#Contract\" target=\"_blank\">Abcdef, Test TEST-2527094</a>', NULL);

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
(149, 'admin', '2020-12-08 02:39:51 AM', '119', 0, 'Contact number changed from <b>TEST-2394007</b> to <b>TEST-2394007123123213123123123123123123</b>'),
(150, 'admin', '2020-12-08 11:05:35 PM', '120', 0, 'Changed status from <b>Archived</b> to <b>Active</b>'),
(151, 'admin', '2020-12-09 02:35:00 AM', '121', 0, '<b>Applicant ID:</b> 00002-A'),
(152, 'admin', '2020-12-09 02:35:00 AM', '121', 0, '<b>ContactNumber:</b> N/A'),
(153, 'admin', '2020-12-09 02:35:07 AM', '122', 0, 'Changed status to <b>Applicant</b>'),
(154, 'admin', '2020-12-09 02:39:46 AM', '123', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(155, 'admin', '2020-12-09 02:39:46 AM', '123', 0, 'Contract Duration: <b>December 09, 2020</b> to <b>December 08, 2020</b>'),
(156, 'admin', '2020-12-09 02:40:00 AM', '125', 0, 'Status changed from <b></b> to <b>Employed (Permanent)</b>'),
(157, 'admin', '2020-12-09 02:56:33 AM', '126', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(158, 'admin', '2020-12-09 02:56:33 AM', '126', 0, 'Contract Duration: <b>December 09, 2020</b> to <b>December 09, 2021</b>'),
(159, 'admin', '2020-12-09 03:33:16 AM', '127', 0, 'Applicant ID: <b>00004-A</b>'),
(160, 'admin', '2020-12-09 03:33:16 AM', '127', 0, 'Referral: <b></b>'),
(161, 'admin', '2020-12-09 03:58:57 AM', '128', 0, 'Contract\'s date ends changed from <b>2021-12-09 02:56:33 AM</b> to <b>2020-12-09 02:56:33 AM</b>'),
(162, 'admin', '2020-12-09 04:09:04 AM', '130', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(163, 'admin', '2020-12-09 04:14:16 AM', '131', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(164, 'admin', '2020-12-09 04:19:15 AM', '132', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(165, 'admin', '2020-12-09 04:19:15 AM', '132', 0, 'Contract Duration: <b>December 09, 2020</b> to <b>December 09, 2021</b>'),
(166, 'admin', '2020-12-09 04:20:13 AM', '133', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(167, 'admin', '2020-12-09 04:20:13 AM', '133', 0, 'Contract Duration: <b>December 09, 2020</b> to <b>December 09, 2021</b>'),
(168, 'admin', '2020-12-09 04:20:31 AM', '134', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(169, 'admin', '2020-12-09 04:20:31 AM', '134', 0, 'Contract Duration: <b>December 09, 2020</b> to <b>December 09, 2021</b>'),
(170, 'admin', '2020-12-09 04:20:39 AM', '135', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(171, 'admin', '2020-12-09 04:20:39 AM', '135', 0, 'Contract Duration: <b>December 09, 2020</b> to <b>December 09, 2021</b>'),
(172, 'admin', '2020-12-09 04:21:42 AM', '136', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(173, 'admin', '2020-12-09 04:21:42 AM', '136', 0, 'Contract Duration: <b>December 09, 2020</b> to <b>December 09, 2021</b>'),
(174, 'admin', '2020-12-09 04:22:14 AM', '137', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(175, 'admin', '2020-12-09 04:26:11 AM', '138', 0, 'Applicant ID: <b>00005-A</b>'),
(176, 'admin', '2020-12-09 04:26:11 AM', '138', 0, 'Referral: <b>Walk In</b>'),
(177, 'admin', '2020-12-09 04:27:07 AM', '139', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(178, 'admin', '2020-12-09 04:27:40 AM', '140', 0, 'Address changed from <b>118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481118490201248924811184902012489248111849020124892481</b> to <b>118490201248924</b>.'),
(179, 'admin', '2020-12-09 04:27:40 AM', '140', 0, 'Contact number changed from <b>15546754756774373467, 3944584359034589, 395498-5389-6589--89365, 34953489893570893, 3958 90345890 349085, 4895658076803580, 3958 6 3589698554909999999999999999999999999999999999991</b> to <b>1554675475677437</b>.'),
(180, 'admin', '2020-12-13 03:16:05 PM', '144', 0, 'Admin ID: '),
(181, 'admin', '2020-12-13 03:16:05 PM', '144', 0, 'Position:  - Accounting Manager'),
(182, 'admin', '2020-12-13 03:44:07 PM', '145', 0, 'Applicant ID: <b>00006-A</b>'),
(183, 'admin', '2020-12-13 03:44:07 PM', '145', 0, 'Referral: <b>Walk In</b>'),
(184, 'admin', '2020-12-13 06:39:55 PM', '152', 0, 'Address: '),
(185, 'admin', '2020-12-13 06:39:55 PM', '152', 0, 'ContactNumber: test3'),
(186, 'admin', '2020-12-13 06:47:12 PM', '153', 0, 'Last Name changed from <b>TEST-2527094</b> to <b>TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094</b>'),
(187, 'admin', '2020-12-13 07:41:45 PM', '154', 0, 'Person to notify in case of emergyency changed from <b>TEST-5612299</b> to <b>TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442</b>'),
(188, 'admin', '2020-12-13 07:41:55 PM', '155', 0, 'Contact number changed from <b>TEST-5612299</b> to <b>TEST-5612299TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442TEST-561229923423442</b>'),
(189, 'admin', '2020-12-14 12:31:53 AM', '156', 0, 'Changed status to <b>Applicant</b>'),
(190, 'admin', '2020-12-14 12:45:09 AM', '157', 0, 'Applicant ID: <b>00007-A</b>'),
(191, 'admin', '2020-12-14 12:45:09 AM', '157', 0, 'Referral: <b>Walk In</b>'),
(192, 'admin', '2020-12-14 12:45:36 AM', '158', 0, 'Applicant ID: <b>00008-A</b>'),
(193, 'admin', '2020-12-14 12:45:36 AM', '158', 0, 'Referral: <b>Walk In</b>'),
(194, 'admin', '2020-12-14 12:46:12 AM', '159', 0, 'Applicant ID: <b>00009-A</b>'),
(195, 'admin', '2020-12-14 12:46:12 AM', '159', 0, 'Referral: <b>Walk In</b>'),
(196, 'admin', '2020-12-14 12:46:18 AM', '160', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(197, 'admin', '2020-12-14 12:46:18 AM', '160', 0, 'Contract Duration: <b>December 14, 2020</b> to <b>December 14, 2021</b>'),
(198, 'admin', '2020-12-14 04:38:45 AM', '163', 0, 'Last Name changed from <b>TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094TEST-2527094</b> to <b>abcdef</b>'),
(199, 'admin', '2020-12-14 04:38:53 AM', '164', 0, 'First Name changed from <b>TEST-2527094</b> to <b>test</b>'),
(200, 'admin', '2020-12-14 05:38:23 AM', '165', 0, 'Expected salary changed from <b>₱</b> to <b>₱50000</b>'),
(201, 'admin', '2020-12-14 08:43:05 PM', '178', 0, 'Name changed from <b>test2</b> to <b>test21341345445461344134451134</b>.'),
(202, 'admin', '2020-12-14 08:44:27 PM', '179', 0, 'Name changed from <b>test21341345445461344134451134</b> to <b>test213413454454613441344325635262632623623635636356</b>.'),
(203, 'admin', '2020-12-14 08:44:40 PM', '180', 0, 'Name changed from <b>test213413454454613441344325635262632623623635636356</b> to <b>test21341345445461344134424624642624624624624624626262624642626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test213413454454613441344246246'),
(204, 'admin', '2020-12-15 02:05:35 AM', '181', 0, 'Name changed from <b>test21341345445461344134424624642624624624624624626262624642626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464262462462462462462626262464262624624626246246test2134134544546134413442462464</b> to <b>test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344test213413454454613441344</b>.'),
(205, 'admin', '2021-01-07 08:22:43 PM', '184', 0, '<b>From:</b> 1'),
(206, 'admin', '2021-01-07 08:22:43 PM', '184', 0, '<b>To:</b> 2'),
(207, 'admin', '2021-01-07 08:22:43 PM', '184', 0, '<b>Contribution (ER):</b> 1'),
(208, 'admin', '2021-01-07 08:22:44 PM', '184', 0, '<b>Contribution (EE):</b> 1'),
(209, 'admin', '2021-01-07 08:22:44 PM', '184', 0, '<b>Contribution (EC):</b> '),
(210, 'admin', '2021-01-07 08:22:44 PM', '184', 0, '<b>Total:</b> 2'),
(211, 'admin', '2021-01-07 08:22:44 PM', '184', 0, '<b>Total with EC:</b> 2'),
(212, 'admin', '2021-01-07 08:30:07 PM', '185', 0, '<b>From:</b> 50'),
(213, 'admin', '2021-01-07 08:30:07 PM', '185', 0, '<b>To:</b> 100'),
(214, 'admin', '2021-01-07 08:30:07 PM', '185', 0, '<b>Contribution (ER):</b> 80'),
(215, 'admin', '2021-01-07 08:30:07 PM', '185', 0, '<b>Contribution (EE):</b> 80'),
(216, 'admin', '2021-01-07 08:30:07 PM', '185', 0, '<b>Contribution (EC):</b> '),
(217, 'admin', '2021-01-07 08:30:07 PM', '185', 0, '<b>Total:</b> 160'),
(218, 'admin', '2021-01-07 08:30:07 PM', '185', 0, '<b>Total with EC:</b> 160'),
(219, 'admin', '2021-01-07 09:28:56 PM', '186', 0, '<b>From:</b> 135'),
(220, 'admin', '2021-01-07 09:28:56 PM', '186', 0, '<b>To:</b> 156'),
(221, 'admin', '2021-01-07 09:28:56 PM', '186', 0, '<b>Contribution (ER):</b> 135'),
(222, 'admin', '2021-01-07 09:28:56 PM', '186', 0, '<b>Contribution (EE):</b> 135'),
(223, 'admin', '2021-01-07 09:28:56 PM', '186', 0, '<b>Contribution (EC):</b> '),
(224, 'admin', '2021-01-07 09:28:56 PM', '186', 0, '<b>Total:</b> 270'),
(225, 'admin', '2021-01-07 09:28:56 PM', '186', 0, '<b>Total with EC:</b> 270'),
(226, 'admin', '2021-01-07 09:29:44 PM', '187', 0, '<b>From:</b> 2'),
(227, 'admin', '2021-01-07 09:29:44 PM', '187', 0, '<b>To:</b> 4'),
(228, 'admin', '2021-01-07 09:29:44 PM', '187', 0, '<b>Contribution (ER):</b> 2'),
(229, 'admin', '2021-01-07 09:29:44 PM', '187', 0, '<b>Contribution (EE):</b> 4'),
(230, 'admin', '2021-01-07 09:29:44 PM', '187', 0, '<b>Contribution (EC):</b> '),
(231, 'admin', '2021-01-07 09:29:44 PM', '187', 0, '<b>Total:</b> 6'),
(232, 'admin', '2021-01-07 09:29:44 PM', '187', 0, '<b>Total with EC:</b> 6'),
(233, 'admin', '2021-01-09 09:04:44 PM', '188', 0, '<b>From:</b> 5'),
(234, 'admin', '2021-01-09 09:04:44 PM', '188', 0, '<b>To:</b> 10'),
(235, 'admin', '2021-01-09 09:04:44 PM', '188', 0, '<b>Contribution (ER):</b> 5'),
(236, 'admin', '2021-01-09 09:04:44 PM', '188', 0, '<b>Contribution (EE):</b> 2'),
(237, 'admin', '2021-01-09 09:04:44 PM', '188', 0, '<b>Contribution (EC):</b> '),
(238, 'admin', '2021-01-09 09:04:44 PM', '188', 0, '<b>Total:</b> 7'),
(239, 'admin', '2021-01-09 09:04:44 PM', '188', 0, '<b>Total with EC:</b> 7'),
(240, 'admin', '2021-01-09 09:05:50 PM', '189', 0, '<b>From:</b> 1'),
(241, 'admin', '2021-01-09 09:05:50 PM', '189', 0, '<b>To:</b> 2'),
(242, 'admin', '2021-01-09 09:05:50 PM', '189', 0, '<b>Contribution (ER):</b> 1'),
(243, 'admin', '2021-01-09 09:05:50 PM', '189', 0, '<b>Contribution (EE):</b> 2'),
(244, 'admin', '2021-01-09 09:05:50 PM', '189', 0, '<b>Contribution (EC):</b> '),
(245, 'admin', '2021-01-09 09:05:50 PM', '189', 0, '<b>Total:</b> 3'),
(246, 'admin', '2021-01-09 09:05:50 PM', '189', 0, '<b>Total with EC:</b> '),
(247, 'admin', '2021-01-10 03:01:41 PM', '197', 0, '<b>From:</b> 1'),
(248, 'admin', '2021-01-10 03:01:41 PM', '197', 0, '<b>To:</b> 2'),
(249, 'admin', '2021-01-10 03:01:41 PM', '197', 0, '<b>Contribution (ER):</b> 1.00'),
(250, 'admin', '2021-01-10 03:01:41 PM', '197', 0, '<b>Contribution (EE):</b> '),
(251, 'admin', '2021-01-10 03:01:41 PM', '197', 0, '<b>Contribution (EC):</b> 3'),
(252, 'admin', '2021-01-10 03:01:42 PM', '197', 0, '<b>Total:</b> 1'),
(253, 'admin', '2021-01-10 03:01:42 PM', '197', 0, '<b>Total with EC:</b> 4'),
(254, 'admin', '2021-01-10 03:02:29 PM', '198', 0, '<b>From:</b> 0.03'),
(255, 'admin', '2021-01-10 03:02:29 PM', '198', 0, '<b>To:</b> 0.05'),
(256, 'admin', '2021-01-10 03:02:29 PM', '198', 0, '<b>Contribution (ER):</b> 0.02'),
(257, 'admin', '2021-01-10 03:02:29 PM', '198', 0, '<b>Contribution (EE):</b> 0.02'),
(258, 'admin', '2021-01-10 03:02:29 PM', '198', 0, '<b>Contribution (EC):</b> '),
(259, 'admin', '2021-01-10 03:02:29 PM', '198', 0, '<b>Total:</b> 0.04'),
(260, 'admin', '2021-01-10 03:02:29 PM', '198', 0, '<b>Total with EC:</b> '),
(261, 'admin', '2021-01-10 03:02:43 PM', '199', 0, '<b>From:</b> 0.01'),
(262, 'admin', '2021-01-10 03:02:43 PM', '199', 0, '<b>To:</b> 0.02'),
(263, 'admin', '2021-01-10 03:02:43 PM', '199', 0, '<b>Contribution (ER):</b> 0.01'),
(264, 'admin', '2021-01-10 03:02:43 PM', '199', 0, '<b>Contribution (EE):</b> 0.02'),
(265, 'admin', '2021-01-10 03:02:43 PM', '199', 0, '<b>Contribution (EC):</b> '),
(266, 'admin', '2021-01-10 03:02:43 PM', '199', 0, '<b>Total:</b> 0.03'),
(267, 'admin', '2021-01-10 03:02:43 PM', '199', 0, '<b>Total with EC:</b> '),
(268, 'admin', '2021-01-10 03:03:37 PM', '200', 0, '<b>From:</b> 0.01'),
(269, 'admin', '2021-01-10 03:03:37 PM', '200', 0, '<b>To:</b> 0.02'),
(270, 'admin', '2021-01-10 03:03:37 PM', '200', 0, '<b>Contribution (ER):</b> 0.01'),
(271, 'admin', '2021-01-10 03:03:37 PM', '200', 0, '<b>Contribution (EE):</b> '),
(272, 'admin', '2021-01-10 03:03:38 PM', '200', 0, '<b>Contribution (EC):</b> '),
(273, 'admin', '2021-01-10 03:03:38 PM', '200', 0, '<b>Total:</b> 0.01'),
(274, 'admin', '2021-01-10 03:03:38 PM', '200', 0, '<b>Total with EC:</b> 0.01'),
(275, 'admin', '2021-01-10 03:04:00 PM', '201', 0, '<b>From:</b> 0.01'),
(276, 'admin', '2021-01-10 03:04:00 PM', '201', 0, '<b>To:</b> 0.02'),
(277, 'admin', '2021-01-10 03:04:00 PM', '201', 0, '<b>Contribution (ER):</b> 0.01'),
(278, 'admin', '2021-01-10 03:04:00 PM', '201', 0, '<b>Contribution (EE):</b> '),
(279, 'admin', '2021-01-10 03:04:00 PM', '201', 0, '<b>Contribution (EC):</b> 0.00'),
(280, 'admin', '2021-01-10 03:04:00 PM', '201', 0, '<b>Total:</b> 0.01'),
(281, 'admin', '2021-01-10 03:04:00 PM', '201', 0, '<b>Total with EC:</b> 0.01'),
(282, 'admin', '2021-01-10 03:04:03 PM', '202', 0, '<b>From:</b> 0.01'),
(283, 'admin', '2021-01-10 03:04:03 PM', '202', 0, '<b>To:</b> 0.02'),
(284, 'admin', '2021-01-10 03:04:03 PM', '202', 0, '<b>Contribution (ER):</b> 0.01'),
(285, 'admin', '2021-01-10 03:04:04 PM', '202', 0, '<b>Contribution (EE):</b> '),
(286, 'admin', '2021-01-10 03:04:04 PM', '202', 0, '<b>Contribution (EC):</b> 2'),
(287, 'admin', '2021-01-10 03:04:04 PM', '202', 0, '<b>Total:</b> 0.01'),
(288, 'admin', '2021-01-10 03:04:04 PM', '202', 0, '<b>Total with EC:</b> 2.01'),
(289, 'admin', '2021-01-10 03:04:07 PM', '203', 0, '<b>From:</b> 0.01'),
(290, 'admin', '2021-01-10 03:04:07 PM', '203', 0, '<b>To:</b> 1.02'),
(291, 'admin', '2021-01-10 03:04:07 PM', '203', 0, '<b>Contribution (ER):</b> 0.01'),
(292, 'admin', '2021-01-10 03:04:08 PM', '203', 0, '<b>Contribution (EE):</b> '),
(293, 'admin', '2021-01-10 03:04:08 PM', '203', 0, '<b>Contribution (EC):</b> 2.00'),
(294, 'admin', '2021-01-10 03:04:08 PM', '203', 0, '<b>Total:</b> 0.01'),
(295, 'admin', '2021-01-10 03:04:08 PM', '203', 0, '<b>Total with EC:</b> 2.01'),
(296, 'admin', '2021-01-10 03:04:59 PM', '204', 0, '<b>From:</b> 0.01'),
(297, 'admin', '2021-01-10 03:04:59 PM', '204', 0, '<b>To:</b> 1.02'),
(298, 'admin', '2021-01-10 03:04:59 PM', '204', 0, '<b>Contribution (ER):</b> 0.01'),
(299, 'admin', '2021-01-10 03:04:59 PM', '204', 0, '<b>Contribution (EE):</b> '),
(300, 'admin', '2021-01-10 03:04:59 PM', '204', 0, '<b>Contribution (EC):</b> 2.00'),
(301, 'admin', '2021-01-10 03:04:59 PM', '204', 0, '<b>Total:</b> 0.01'),
(302, 'admin', '2021-01-10 03:04:59 PM', '204', 0, '<b>Total with EC:</b> 2.01'),
(303, 'admin', '2021-01-10 03:06:08 PM', '205', 0, '<b>From:</b> 0.01'),
(304, 'admin', '2021-01-10 03:06:08 PM', '205', 0, '<b>To:</b> 1.02'),
(305, 'admin', '2021-01-10 03:06:08 PM', '205', 0, '<b>Contribution (ER):</b> 0.01'),
(306, 'admin', '2021-01-10 03:06:08 PM', '205', 0, '<b>Contribution (EE):</b> 0.02'),
(307, 'admin', '2021-01-10 03:06:08 PM', '205', 0, '<b>Contribution (EC):</b> 2.00'),
(308, 'admin', '2021-01-10 03:06:08 PM', '205', 0, '<b>Total:</b> 0.03'),
(309, 'admin', '2021-01-10 03:06:08 PM', '205', 0, '<b>Total with EC:</b> 2.03'),
(310, 'admin', '2021-01-10 03:06:22 PM', '206', 0, '<b>From:</b> 0.05'),
(311, 'admin', '2021-01-10 03:06:22 PM', '206', 0, '<b>To:</b> 0.08'),
(312, 'admin', '2021-01-10 03:06:22 PM', '206', 0, '<b>Contribution (ER):</b> 5'),
(313, 'admin', '2021-01-10 03:06:22 PM', '206', 0, '<b>Contribution (EE):</b> 5'),
(314, 'admin', '2021-01-10 03:06:22 PM', '206', 0, '<b>Contribution (EC):</b> 5'),
(315, 'admin', '2021-01-10 03:06:22 PM', '206', 0, '<b>Total:</b> 10'),
(316, 'admin', '2021-01-10 03:06:22 PM', '206', 0, '<b>Total with EC:</b> '),
(317, 'admin', '2021-01-10 11:31:49 PM', '207', 0, '<b>From:</b> 5'),
(318, 'admin', '2021-01-10 11:31:49 PM', '207', 0, '<b>To:</b> 10'),
(319, 'admin', '2021-01-10 11:31:49 PM', '207', 0, '<b>Contribution (ER):</b> 5'),
(320, 'admin', '2021-01-10 11:31:49 PM', '207', 0, '<b>Contribution (EE):</b> 5'),
(321, 'admin', '2021-01-10 11:31:49 PM', '207', 0, '<b>Contribution (EC):</b> 5'),
(322, 'admin', '2021-01-10 11:31:49 PM', '207', 0, '<b>Total:</b> 10'),
(323, 'admin', '2021-01-10 11:31:49 PM', '207', 0, '<b>Total with EC:</b> 15'),
(324, 'admin', '2021-01-13 08:40:31 PM', '208', 0, 'Birthday changed from <b>December 13, 2020</b> to <b>March 03, 1988</b>'),
(325, 'admin', '2021-01-15 06:42:56 AM', '227', 0, 'Suspended for <b>January 15, 2021</b> to <b>January 18, 2021</b>'),
(326, 'admin', '2021-01-15 06:45:42 AM', '228', 0, 'Suspended for <b>January 15, 2021</b> to <b>January 19, 2021</b>'),
(327, 'admin', '2021-01-15 06:47:03 AM', '229', 0, 'Suspended for <b>January 15, 2021</b> to <b>January 20, 2021</b>');

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
(2, '2020-11-28', '2', '2020-12-13 18:14:43'),
(3, '2020-12-29', '1', '2020-12-13 15:13:13'),
(4, '2020-12-01', '1', '2020-12-13 18:14:37'),
(5, '2020-12-01', '1', '2020-12-13 18:14:43'),
(6, '2020-12-02', '1', '2020-12-13 18:31:35'),
(7, '2020-12-13', '3', '2020-12-13 18:39:55'),
(8, '2020-12-31', '1', '2021-01-14 22:52:42'),
(9, '2020-12-27', '2', '2021-01-15 01:08:09'),
(10, '2021-01-31', '1', '2021-01-15 05:35:56'),
(11, '2021-01-01', '1', '2021-01-15 05:36:26'),
(12, '2021-02-01', '1', '2021-01-15 05:36:37'),
(13, '2021-03-04', '1', '2021-01-15 05:36:43'),
(14, '2021-04-04', '1', '2021-01-15 05:36:47'),
(15, '2021-01-01', '1', '2021-01-15 05:37:19'),
(16, '2021-01-21', '1', '2021-01-15 05:44:26');

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

--
-- Dumping data for table `sss_tobepaid`
--

INSERT INTO `sss_tobepaid` (`ID`, `ApplicantID`, `ClientID`, `Month`, `Year`, `Mode`, `Week1Amount`, `Week2Amount`, `Week3Amount`, `Week4Amount`, `Week1Paid`, `Week2Paid`, `Week3Paid`, `Week4Paid`, `DateUpdated`, `DateAdded`) VALUES
(0, '00009-A', '1', '01', '2021', 1, NULL, '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-15 06:09:18'),
(1, '00001-A', '1', '11', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-13 14:56:42'),
(2, '00004-A', '1', '11', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-13 14:56:42'),
(3, '00005-A', '1', '11', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-13 14:56:42'),
(4, '00001-A', '1', '11', '2020', 1, '40', '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-13 15:12:02'),
(5, '00004-A', '1', '11', '2020', 1, '40', '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-13 15:12:02'),
(6, '00005-A', '1', '11', '2020', 1, '40', '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-13 15:12:02'),
(7, '00003-A', '1', '11', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:32:08'),
(8, '00006-A', '1', '11', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:32:08'),
(9, '00007-A', '1', '11', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:32:08'),
(10, '00008-A', '1', '11', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:32:08'),
(11, '00009-A', '1', '11', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:32:09'),
(12, '00003-A', '1', '11', '2020', 1, '40', '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:45:25'),
(13, '00006-A', '1', '11', '2020', 1, '40', '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:45:25'),
(14, '00007-A', '1', '11', '2020', 1, '40', '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:45:25'),
(15, '00008-A', '1', '11', '2020', 1, '40', '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:45:25'),
(16, '00009-A', '1', '11', '2020', 1, '40', '40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:45:25'),
(17, '00001-A', '1', '12', '2020', 0, '20', '20', '20', '20', '2', NULL, NULL, NULL, '2020-12-15 03:10:44 AM', '2020-12-14 01:49:55'),
(18, '00003-A', '1', '12', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:49:55'),
(19, '00004-A', '1', '12', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:49:56'),
(20, '00005-A', '1', '12', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:49:56'),
(21, '00006-A', '1', '12', '2020', 0, '20', '20', '20', '20', '10', NULL, NULL, NULL, '2020-12-15 03:12:50 AM', '2020-12-14 01:49:56'),
(22, '00007-A', '1', '12', '2020', 0, '20', '0.005', '0.005', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:49:56'),
(23, '00008-A', '1', '12', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:49:56'),
(24, '00009-A', '1', '12', '2020', 0, '20', '20', '20', '20', NULL, NULL, NULL, NULL, NULL, '2020-12-14 01:49:56');

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

--
-- Dumping data for table `sss_weekpaid`
--

INSERT INTO `sss_weekpaid` (`ID`, `ApplicantID`, `ClientID`, `Mode`, `Year`, `Month`, `Week`, `Time`, `Amount`) VALUES
(1, '00006-A', '1', '0', 2020, 12, 1, '2020-12-15 03:12:29 AM', '5'),
(2, '00006-A', '1', '0', 2020, 12, 1, '2020-12-15 03:12:50 AM', '10');

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
(1, '00003-A', '1', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d792e706466, 'dummy.pdf', 'Document', '135', '1355', '5', '2021-01-13'),
(2, '00003-A', '1', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030332d412f64756d6d79312e706466, 'dummy1.pdf', 'Blacklist', '55', '55', '55', '2021-01-13'),
(3, '00001-A', '1', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f64756d6d792e706466, 'dummy.pdf', 'Violation', '135', '135', '135', '2021-01-13'),
(4, '00001-A', '1', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030312d412f64756d6d79312e706466, 'dummy1.pdf', 'Blacklist', '153', '151551', '1555', '2021-01-13'),
(5, '00006-A', '1', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d412f64756d6d79312e706466, 'dummy1.pdf', 'Violation', '3', '3', '3', '2021-01-15'),
(6, '00006-A', '1', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d412f64756d6d79322e706466, 'dummy2.pdf', 'Suspension', '4', '4', '', '2021-01-15'),
(7, '00006-A', '1', NULL, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030362d412f64756d6d79332e706466, 'dummy3.pdf', 'Suspension', '5', '5', '5', '2021-01-15');

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
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

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
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `hours_semimonthly`
--
ALTER TABLE `hours_semimonthly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `logbook_extended`
--
ALTER TABLE `logbook_extended`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supp_documents`
--
ALTER TABLE `supp_documents`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
