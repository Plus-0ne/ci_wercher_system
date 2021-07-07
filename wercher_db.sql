-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2021 at 04:35 AM
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
(23, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,EmployeesAbsorbedWercher,EmployeesAbsorbedLeft,EmployeesResigned,EmployeesTerminated,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', '$2y$10$s64PjHG2ax5zG4GikYK8qOXDygYyGT/ZTbhswBa.mekcpRvotSluK', 'aab', 'b', 'test', '2020-11-27 09:14:17', NULL, 'super admin', 'Active'),
(24, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'dev', '$2y$10$Uj479MnjZrips4lbbJPfG.GLLSkUTwIUgxjX.a5LXw2YAAy/9Qfpa', '', '', '', '2020-12-02 01:25:27', NULL, '', 'Active'),
(25, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admi', '$2y$10$/MqksaHOjO5N5mFIqBxEL.03vMSij2dOVpDHNPGSi4yRGnxiBusEK', 'a', 'a', 'a', '2020-12-03 06:04:13', NULL, 'a', 'Active'),
(26, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'test', '$2y$10$BQwXUdmcCzPgUTQ/kwwZcOOV0NVUBvgsQKr3nvPOi3yLB9VExJH8W', 'test', 'test', 'test', '2020-12-03 06:05:45', '2020-12-08 00:40:48', 'test', 'Deleted'),
(27, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'v', '$2y$10$Af60CJqDoiUGNP6K/uaKU.0E0X0bZGifXj.QqmC1vdlOHLrRHL4CK', 'v', 'v3', 'v', '2020-12-03 06:07:36', '2020-12-08 00:26:56', 'v', 'Deleted'),
(28, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing', 'Developer', '123', '$2y$10$UdS0cLQIWO4fBdzSmSQcpud0Gdzyfc4SYZlUMbn.uqWoIWhRX.t0.', '1236', '123', '123', '2020-12-03 06:13:25', NULL, '123', 'Active'),
(29, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook', 'President', 'a2', '$2y$10$A9ZF4qIZEQ2iCJwIydIEXeGeaW2E5tNE85oMfQlgckn76KjkTLygq', 'a2', 'a2', 'a2', '2020-12-03 08:39:27', NULL, 'a2', 'Deleted'),
(30, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'aa', '$2y$10$WCH5omlTj4Qm/MqamQPFLO3if6NSolUJ449GXd9cfxdXhIY4C6kJu', 'a6', 'a', 'a', '2020-12-05 18:22:20', NULL, 'a', 'Active'),
(31, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Payroll', 'Accounting Manager', 'Payroll', '$2y$10$ZfUMjWCLOvnvqEzXdJw1m.KfUlelMjNBKcaw5MPK.Cyei8Vsw.bn6', 'Payroll', 'R', 'P', '2020-12-13 15:16:05', NULL, 'Payroll admin', 'Active'),
(32, 'http://localhost/ci_wercher_system/assets/img/wercher_noimage_standard.png', 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Admin Officer', 'asd', '$2y$10$wNs0FpZkDs2iMc934xV6PumRU2EzhDaco2B4buS5CbG7fkFBngz3W', '', '', 'asd', '2021-03-05 09:06:03', NULL, '', 'Active');

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
(27, 24, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'dev', NULL, '', '', '', '2020-12-07 19:11:41', '', NULL, NULL),
(28, 23, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll,EmployeesAbsorbed,EmployeesResigned,EmployeesTerminated', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2021-04-07 09:47:23', 'super admin', NULL, NULL),
(29, 23, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,EmployeesResigned,EmployeesTerminated,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll,EmployeesAbsorbedWercher,EmployeesAbsorbedLeft', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2021-04-10 01:00:43', 'super admin', NULL, NULL),
(30, 23, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,EmployeesAbsorbedWercher,EmployeesAbsorbedLeft,EmployeesResigned,EmployeesTerminated,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2021-05-21 09:10:43', 'super admin', NULL, NULL),
(31, 23, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, 'Dashboard,DashboardLogbook,Applicants,ApplicantsEditing,ApplicantsExpired,ApplicantsBlacklisted,ApplicantsArchived,Employees,EmployeesHiring,EmployeesEditing,EmployeesRegulars,EmployeesAbsorbedWercher,EmployeesAbsorbedLeft,EmployeesResigned,EmployeesTerminated,Admins,AdminsEditing,AdminsArchived,Clients,ClientsEditing,ClientsArchived,Payroll', 'Developer', 'admin', NULL, 'aab', 'b', 'test', '2021-05-21 09:16:10', 'super admin', NULL, NULL);

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
  `SalaryType` varchar(255) DEFAULT NULL,
  `SalaryDistDate` varchar(255) DEFAULT NULL,
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
  `EmailAddress` varchar(255) DEFAULT NULL,
  `SSS_No` varchar(255) DEFAULT NULL,
  `EffectiveDateCoverage` varchar(255) DEFAULT NULL,
  `ResidenceCertificateNo` varchar(255) DEFAULT NULL,
  `TIN` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `PhilHealth` varchar(255) DEFAULT NULL,
  `HMO` varchar(255) DEFAULT NULL,
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

INSERT INTO `applicants` (`ApplicantNo`, `ApplicantImage`, `ApplicantID`, `EmployeeID`, `PositionDesired`, `PositionGroup`, `SalaryExpected`, `SalaryType`, `SalaryDistDate`, `LastName`, `FirstName`, `MiddleName`, `NameExtension`, `Gender`, `Age`, `Height`, `Weight`, `Religion`, `BirthDate`, `BirthPlace`, `Citizenship`, `CivilStatus`, `No_OfChildren`, `Address_Present`, `Address_Provincial`, `Address_Manila`, `EmergencyPerson`, `EmergencyContact`, `Referral`, `Phone_No`, `EmailAddress`, `SSS_No`, `EffectiveDateCoverage`, `ResidenceCertificateNo`, `TIN`, `HDMF`, `PhilHealth`, `HMO`, `ATM_No`, `Status`, `ClientEmployed`, `DateStarted`, `DateEnds`, `SuspensionStarted`, `SuspensionEnds`, `SuspensionRemarks`, `Suspended`, `AppliedOn`, `ReminderType`, `ReminderDate`, `ReminderDateString`, `ReminderLocked`, `Temp_ApplicantID`, `DateRemoved`) VALUES
(1, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00001-A', 'WC12313-0002-21', 'TEST-5038727', 'TEST-5038727', '500', 'Daily', '1970-01-01 08:00:00 AM', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'Male', NULL, 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', '2021-01-21', 'TEST-5038727', 'TEST-5038727', 'Single', '49', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'Walk In', 'TEST-5038727', '12313', 'TEST-5038727', NULL, 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', 'TEST-5038727', '', 'TEST-5038727', 'Employed (Permanent)', '2', '2021-05-17 09:21:27 AM', '2021-04-07 10:25:53', NULL, NULL, NULL, NULL, '2021-01-21 05:26:46 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f75706c6f6164732f30303030322d412f4861616368616d612e706e67, '00002-A', 'WCtest-0002-21', 'TEST-9011888', 'TEST-9011888', '5000', 'Monthly', NULL, 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'Male', NULL, 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', '2021-01-21', 'TEST-9011888', 'TEST-9011888', 'Single', '47', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'TEST-9011888', 'Walk In', 'TEST-9011888', '12313@asdadasdasdasdadadasdad.com', 'TEST-9011888', NULL, 'TEST-9011888', '123', 'TEST-9011888', 'TEST-9011888', 'fhhsh', 'TEST-9011888', 'Employed', '1', '2021-01-21 09:05:35 AM', '2022-01-21 09:05:35 ', NULL, NULL, NULL, NULL, '2021-01-21 09:02:39 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00003-A', 'WCtest-0005-21', 'TEST-3864426', 'TEST-3864426', '5600000', NULL, NULL, 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'Male', NULL, 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', '2021-01-22', 'TEST-3864426', 'TEST-3864426', 'Single', '73', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'Walk In', 'TEST-3864426', NULL, 'TEST-3864426', NULL, 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', 'TEST-3864426', NULL, 'TEST-3864426', 'Employed', '1', '2021-01-27 08:34:43 AM', '2022-01-27 08:34:43 AM', NULL, NULL, NULL, NULL, '2021-01-22 03:18:57 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00004-A', 'WCtest-0008-21', 'TEST-6693569', 'TEST-6693569', '2000', 'Daily', NULL, 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'Male', NULL, 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', '2021-01-27', 'TEST-6693569', 'TEST-6693569', 'Single', '46', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'Walk In', 'TEST-6693569', NULL, 'TEST-6693569', NULL, 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', 'TEST-6693569', NULL, 'TEST-6693569', 'Employed (Permanent)', '1', '2021-05-14 07:52:21 AM', ' 00:00:00 ', NULL, NULL, NULL, NULL, '2021-01-27 02:43:44 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00005-A', 'WCtest-0007-21', 'TEST-4846795', 'TEST-4846795', '5000', NULL, NULL, 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'Male', NULL, 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', '2021-01-27', 'TEST-4846795', 'TEST-4846795', 'Single', '29', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'Walk In', 'TEST-4846795', NULL, 'TEST-4846795', NULL, 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', 'TEST-4846795', NULL, 'TEST-4846795', 'Employed (Permanent)', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-27 02:43:47 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00006-A', 'WCtest-0006-21', 'TEST-9284419', 'TEST-9284419', '80000', NULL, NULL, 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'Male', NULL, 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', '2021-01-27', 'TEST-9284419', 'TEST-9284419', 'Single', '58', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'Walk In', 'TEST-9284419', NULL, 'TEST-9284419', NULL, 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', 'TEST-9284419', NULL, 'TEST-9284419', 'Employed (Permanent)', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-01-27 02:43:50 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00007-A', 'WCtest-0004-21', 'TEST-8089530', 'TEST-8089530', '5000', NULL, NULL, 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'Male', NULL, 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', '2021-01-27', 'TEST-8089530', 'TEST-8089530', 'Single', '94', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'Walk In', 'TEST-8089530', NULL, 'TEST-8089530', NULL, 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', 'TEST-8089530', NULL, 'TEST-8089530', 'Employed', '1', '2021-01-27 06:08:48 AM', '2022-01-27 06:08:48 AM', NULL, NULL, NULL, NULL, '2021-01-27 02:43:52 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00008-A', 'WCtest-0003-21', 'TEST-1598246', 'TEST-1598246', '12500', 'Monthly', NULL, 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'Male', NULL, 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', '2021-01-27', 'TEST-1598246', 'TEST-1598246', 'Single', '1', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'Walk In', 'TEST-1598246', NULL, 'TEST-1598246', NULL, 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', 'TEST-1598246', NULL, 'TEST-1598246', 'Absorbed (Wercher)', '1', '2011-06-09 02:51:15 AM', ' 00:00:00 ', NULL, NULL, NULL, NULL, '2021-01-27 02:43:55 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00009-A', 'WCtest-0006-21', 'TEST-4275008', 'TEST-4275008', '', NULL, NULL, 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'Male', NULL, 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', '2021-01-27', 'TEST-4275008', 'TEST-4275008', 'Single', '29', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'Walk In', 'TEST-4275008', NULL, 'TEST-4275008', NULL, 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', 'TEST-4275008', NULL, 'TEST-4275008', 'Employed', '1', '2021-01-27 08:56:22 AM', '2022-01-27 08:56:22 AM', NULL, NULL, NULL, NULL, '2021-01-27 06:09:07 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00010-A', 'WC12313-0002-21', 'TEST-1301460', 'TEST-1301460', '10000', NULL, NULL, 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', 'Male', NULL, 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', '2021-04-07', 'TEST-1301460', 'TEST-1301460', 'Single', '36', 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', 'Walk In', 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', NULL, 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', 'TEST-1301460', 'Expired', '', '', '', NULL, NULL, NULL, NULL, '2021-04-07 09:33:16 AM', '', '', NULL, 'No', NULL, NULL),
(11, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00011-A', 'WCtest-0025-21', 'TEST-3873782', 'TEST-3873782', '300', 'Daily', '1970-01-01 08:00:00 AM', 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', 'Male', NULL, 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', '2021-04-10', 'TEST-3873782', 'TEST-3873782', 'Single', '86', 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', 'Walk In', 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', NULL, 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', 'TEST-3873782', 'Employed (Permanent)', '1', '2021-05-17 08:17:25 AM', '2021-05-17 08:12:57', NULL, NULL, NULL, NULL, '2021-04-10 10:22:47 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00012-A', 'WCtest-0010-21', 'TEST-4556870', 'TEST-4556870', '500', NULL, NULL, 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', 'Male', NULL, 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', '2021-04-10', 'TEST-4556870', 'TEST-4556870', 'Single', '71', 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', 'Walk In', 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', NULL, 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', 'TEST-4556870', 'Absorbed (Left)', '1', NULL, '2021-04-10 10:35:04', NULL, NULL, NULL, NULL, '2021-04-10 10:34:37 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00013-A', 'WCtest-0011-21', 'TEST-6537586', 'TEST-6537586', '500', 'Daily', NULL, 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', 'Male', NULL, 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', '2021-04-10', 'TEST-6537586', 'TEST-6537586', 'Single', '14', 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', 'Walk In', 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', NULL, 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', 'TEST-6537586', 'Employed (Permanent)', '1', '2021-05-21 02:03:08 PM', ' 00:00:00 ', NULL, NULL, NULL, NULL, '2021-04-10 10:35:14 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00014-A', 'WCtest-0013-21', 'TEST-2508552', 'TEST-2508552', '500', NULL, NULL, 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', 'Male', NULL, 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', '2021-04-10', 'TEST-2508552', 'TEST-2508552', 'Single', '72', 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', 'Walk In', 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', NULL, 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', 'TEST-2508552', '', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 10:36:05 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00015-A', 'WCtest-0012-21', 'TEST-979651', 'TEST-979651', '500', NULL, NULL, 'TEST-979651', 'TEST-979651', 'TEST-979651', 'TEST-979651', 'Male', NULL, 'TEST-979651', 'TEST-979651', 'TEST-979651', '2021-04-10', 'TEST-979651', 'TEST-979651', 'Single', '28', 'TEST-979651', 'TEST-979651', 'TEST-979651', 'TEST-979651', 'TEST-979651', 'Walk In', 'TEST-979651', 'TEST-979651', 'TEST-979651', NULL, 'TEST-979651', 'TEST-979651', 'TEST-979651', 'TEST-979651', 'TEST-979651', 'TEST-979651', 'Employed (Permanent)', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 10:36:07 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00016-A', 'WCtest-0016-21', 'TEST-5005238', 'TEST-5005238', '', NULL, NULL, 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', 'Male', NULL, 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', '2021-04-10', 'TEST-5005238', 'TEST-5005238', 'Single', '6', 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', 'Walk In', 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', NULL, 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', 'TEST-5005238', 'Employed (Permanent)', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 10:38:20 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00017-A', 'WCtest-0015-21', 'TEST-4344266', 'TEST-4344266', '', NULL, NULL, 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', 'Male', NULL, 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', '2021-04-10', 'TEST-4344266', 'TEST-4344266', 'Single', '98', 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', 'Walk In', 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', NULL, 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', 'TEST-4344266', 'Regular', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 10:39:45 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00018-A', 'WCtest-0016-21', 'TEST-7657015', 'TEST-7657015', '', NULL, NULL, 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', 'Male', NULL, 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', '2021-04-10', 'TEST-7657015', 'TEST-7657015', 'Single', '21', 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', 'Walk In', 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', NULL, 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', 'TEST-7657015', 'absorbed', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 10:39:47 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00019-A', 'WCtest-0017-21', 'TEST-985662', 'TEST-985662', '500', NULL, NULL, 'TEST-985662', 'TEST-985662', 'TEST-985662', 'TEST-985662', 'Male', NULL, 'TEST-985662', 'TEST-985662', 'TEST-985662', '2021-04-10', 'TEST-985662', 'TEST-985662', 'Single', '56', 'TEST-985662', 'TEST-985662', 'TEST-985662', 'TEST-985662', 'TEST-985662', 'Walk In', 'TEST-985662', 'TEST-985662', 'TEST-985662', NULL, 'TEST-985662', 'TEST-985662', 'TEST-985662', 'TEST-985662', 'TEST-985662', 'TEST-985662', 'Absorbed (Wercher)', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-10 10:42:28 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00020-A', 'WCtest-0018-21', 'TEST-4350935', 'TEST-4350935', '12312', 'Daily', '1971-01-01 08:00:00 AM', 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', 'Male', NULL, 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', '2021-05-13', 'TEST-4350935', 'TEST-4350935', 'Single', '28', 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', 'Walk In', 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', NULL, 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', 'TEST-4350935', 'Employed', '1', '2021-05-14 02:28:52 AM', '2022-05-14 02:28:52 AM', NULL, NULL, NULL, NULL, '2021-05-13 09:44:45 PM', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00021-A', 'WCtest-0019-21', 'TEST-7613400', 'TEST-7613400', '5000', 'Monthly', '1971-01-01 08:00:00 AM', 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', 'Male', NULL, 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', '2021-05-14', 'TEST-7613400', 'TEST-7613400', 'Single', '22', 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', 'Walk In', 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', NULL, 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', 'TEST-7613400', 'Employed', '1', '2021-05-14 03:59:12 AM', '2022-05-14 03:59:12 AM', NULL, NULL, NULL, NULL, '2021-05-14 02:28:37 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00022-A', 'WCtest-0020-21', 'TEST-7966933', 'TEST-7966933', '20000', 'Total', '1971-01-01 08:00:00 AM', 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', 'Male', NULL, 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', '2021-05-14', 'TEST-7966933', 'TEST-7966933', 'Single', '95', 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', 'Walk In', 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', NULL, 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', 'TEST-7966933', 'Employed', '1', '2021-05-14 05:41:24 AM', '2022-05-14 05:41:24 AM', NULL, NULL, NULL, NULL, '2021-05-14 03:59:01 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00023-A', 'WCtest-0021-21', 'TEST-3372621', 'TEST-3372621', '500', 'Daily', '1971-01-01 08:00:00 AM', 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', 'Male', NULL, 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', '2021-05-14', 'TEST-3372621', 'TEST-3372621', 'Single', '49', 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', 'Walk In', 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', NULL, 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', 'TEST-3372621', 'Employed (Permanent)', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 05:41:12 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00024-A', 'WCtest-0022-21', 'TEST-267476', 'TEST-267476', '400', 'Daily', '1971-01-01 08:00:00 AM', 'TEST-267476', 'TEST-267476', 'TEST-267476', 'TEST-267476', 'Male', NULL, 'TEST-267476', 'TEST-267476', 'TEST-267476', '2021-05-14', 'TEST-267476', 'TEST-267476', 'Single', '76', 'TEST-267476', 'TEST-267476', 'TEST-267476', 'TEST-267476', 'TEST-267476', 'Walk In', 'TEST-267476', 'TEST-267476', 'TEST-267476', NULL, 'TEST-267476', 'TEST-267476', 'TEST-267476', 'TEST-267476', 'TEST-267476', 'TEST-267476', 'Employed (Permanent)', '1', NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-14 06:13:03 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00025-A', 'WCtest-0023-21', 'TEST-9141654', 'TEST-9141654', '300.23', 'Daily', '1971-01-01 08:00:00 AM', 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', 'Male', NULL, 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', '2021-05-14', 'TEST-9141654', 'TEST-9141654', 'Single', '57', 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', 'Walk In', 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', NULL, 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', 'TEST-9141654', 'Employed (Permanent)', '1', '2021-05-14 06:14:13 AM', ' 00:00:00 ', NULL, NULL, NULL, NULL, '2021-05-14 06:14:01 AM', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 0x687474703a2f2f6c6f63616c686f73742f63695f776572636865725f73797374656d2f6173736574732f696d672f776572636865725f6e6f696d6167655f7374616e646172642e706e67, '00026-A', 'WCtest-0024-21', 'TEST-884298', 'TEST-884298', '500', 'Daily', '1970-01-01 08:00:00 AM', 'TEST-884298', 'TEST-884298', 'TEST-884298', 'TEST-884298', 'Male', NULL, 'TEST-884298', 'TEST-884298', 'TEST-884298', '2021-05-14', 'TEST-884298', 'TEST-884298', 'Single', '52', 'TEST-884298', 'TEST-884298', 'TEST-884298', 'TEST-884298', 'TEST-884298', 'Walk In', 'TEST-884298', 'TEST-884298', 'TEST-884298', NULL, 'TEST-884298', 'TEST-884298', 'TEST-884298', 'TEST-884298', 'TEST-884298', 'TEST-884298', 'Employed (Permanent)', '1', '2021-05-14 09:28:47 AM', ' 00:00:00 ', NULL, NULL, NULL, NULL, '2021-05-14 07:53:57 AM', NULL, NULL, NULL, NULL, NULL, NULL);

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
  `EmailAddress` varchar(255) DEFAULT NULL,
  `SSS_No` varchar(255) DEFAULT NULL,
  `EffectiveDateCoverage` varchar(255) DEFAULT NULL,
  `ResidenceCertificateNo` varchar(255) DEFAULT NULL,
  `TIN` varchar(255) DEFAULT NULL,
  `HDMF` varchar(255) DEFAULT NULL,
  `PhilHealth` varchar(255) DEFAULT NULL,
  `HMO` varchar(255) DEFAULT NULL,
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
(2, '00001-A', NULL, '2020-12-09 02:56:33 AM', '2020-12-09 02:56:33 AM', 'test2'),
(3, '00010-A', NULL, '2021-04-10 08:36:08 AM', '2021-05-10 08:36:08 AM', '123');

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
(80, '2021', '01', '9'),
(81, '2021', '04', '10');

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
(400, '2021-06-22', 'Current', NULL, NULL, NULL),
(401, '2021-06-23', 'Current', NULL, NULL, NULL),
(402, '2021-06-24', 'Current', NULL, NULL, NULL),
(403, '2021-06-25', 'Current', NULL, NULL, NULL),
(404, '2021-06-26', 'Current', NULL, NULL, NULL),
(405, '2021-06-27', 'Current', NULL, NULL, NULL),
(406, '2021-06-28', 'Current', NULL, NULL, NULL);

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
  `Week` int(1) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `t_year` int(11) DEFAULT NULL,
  `Time` varchar(55) DEFAULT NULL,
  `Hours` varchar(255) DEFAULT NULL,
  `NightHours` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Overtime` varchar(11) DEFAULT NULL,
  `NightOvertime` varchar(11) DEFAULT NULL,
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
(1, '1', '00026-B', ' TEST-884298, TEST-884298TEST-884298', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00026-B', ' TEST-884298, TEST-884298TEST-884298', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-11', '8.3', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(4, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-12', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(5, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-13', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(6, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-14', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(10, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-11', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '400.00', '0.00', '0.00', '0.00', 0),
(11, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-12', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(12, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-13', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(13, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-14', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(14, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-15', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(15, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-16', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(16, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-17', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(17, '1', '00011-B', ' TEST-3873782, TEST-3873782TEST-3873782', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, '2', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-15', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '5000.00', '0.00', '0.00', '0.00', 0),
(21, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-16', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(22, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-17', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(23, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-18', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(24, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-19', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(25, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-20', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(26, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-21', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(27, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(28, '1', '00013-B', ' TEST-6537586, TEST-6537586TEST-6537586', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
  `Week` int(1) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `t_year` int(11) DEFAULT NULL,
  `Time` varchar(55) DEFAULT NULL,
  `Hours` varchar(255) DEFAULT NULL,
  `NightHours` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Overtime` varchar(11) DEFAULT NULL,
  `NightOvertime` varchar(11) DEFAULT NULL,
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
(1, '1', '00026-B', ' TEST-884298, TEST-884298TEST-884298', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(2, '1', '00026-B', ' TEST-884298, TEST-884298TEST-884298', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(24, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-11', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(25, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-12', '0.07', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(26, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-13', '0.05', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(27, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-14', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(28, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-15', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(29, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-16', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(30, '1', '00008-A', NULL, NULL, 1, 5, 2021, '2021-05-17', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(32, '1', '00011-B', ' TEST-3873782, TEST-3873782TEST-3873782', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(40, '2', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(135, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-11', '8.01', '0', NULL, '10', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500.63', '781.25', '0.00', '0.00', 0),
(136, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-12', '4', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '250.00', '0.00', '0.00', '0.00', 0),
(137, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-13', '8', '0', NULL, '4', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500.00', '312.50', '0.00', '0.00', 0),
(138, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-14', '4', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '250.00', '0.00', '0.00', '0.00', 0),
(139, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-15', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(140, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-16', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(141, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-17', '5', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '312.50', '0.00', '0.00', '0.00', 0),
(142, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-18', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(143, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-19', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(144, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-20', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(145, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-21', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(146, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-22', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(147, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-23', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(148, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-24', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(149, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-25', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(150, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-26', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(152, '1', '00011-A', NULL, NULL, 1, 5, 2021, '2021-05-11', '8', '0', NULL, '4', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '187.50', '0.00', '0.00', 0),
(153, '1', '00011-A', NULL, NULL, 1, 5, 2021, '2021-05-12', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(154, '1', '00011-A', NULL, NULL, 1, 5, 2021, '2021-05-13', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(155, '1', '00011-A', NULL, NULL, 1, 5, 2021, '2021-05-14', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(156, '1', '00011-A', NULL, NULL, 1, 5, 2021, '2021-05-15', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(157, '1', '00011-A', NULL, NULL, 1, 5, 2021, '2021-05-16', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(158, '1', '00011-A', NULL, NULL, 1, 5, 2021, '2021-05-17', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(160, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(161, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(169, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-15', '5', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '250.00', '0.00', '0.00', '0.00', 0),
(170, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-16', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(171, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-17', '5', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '250.00', '0.00', '0.00', '0.00', 0),
(172, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-18', '8', '0', NULL, '8', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '400.00', '500.00', '0.00', '0.00', 0),
(173, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-19', '5', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '250.00', '0.00', '0.00', '0.00', 0),
(174, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-20', '0', '8', NULL, '0', '5', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '440.00', '343.75', 0),
(175, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-21', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(176, '1', '00013-B', ' TEST-6537586, TEST-6537586TEST-6537586', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(177, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-16', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(178, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-17', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(179, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-18', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(180, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-19', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(181, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-20', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(182, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-21', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(183, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-22', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(184, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-23', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(185, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-24', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(186, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-25', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(187, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-26', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(188, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-27', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(189, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-28', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(190, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-29', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(191, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-30', '8', '0', NULL, '2', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '93.75', '0.00', '0.00', 0),
(192, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-01', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(193, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-02', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(194, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-03', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(195, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-04', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(196, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-05', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(197, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-06', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(198, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-07', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(199, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-08', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(200, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-09', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(201, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-10', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(202, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-11', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(203, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-12', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(204, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-13', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(205, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-14', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(206, '1', '00011-A', NULL, NULL, 2, 4, 2021, '2021-04-15', '8', '0', NULL, '2', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '93.75', '0.00', '0.00', 0);

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
  `Hours` varchar(255) DEFAULT NULL,
  `NightHours` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Overtime` varchar(11) DEFAULT NULL,
  `NightOvertime` varchar(11) DEFAULT NULL,
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
(1, '1', '00002-A', NULL, NULL, 1, 5, 2021, '2021-05-08', '8.3', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '172.89', '0.00', '0.00', '0.00', 0),
(2, '1', '00002-A', NULL, NULL, 1, 5, 2021, '2021-05-09', '0.06', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1.25', '0.00', '0.00', '0.00', 0),
(3, '1', '00002-A', NULL, NULL, 1, 5, 2021, '2021-05-10', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(4, '1', '00002-A', NULL, NULL, 1, 5, 2021, '2021-05-11', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(5, '1', '00002-A', NULL, NULL, 1, 5, 2021, '2021-05-12', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(6, '1', '00002-A', NULL, NULL, 1, 5, 2021, '2021-05-13', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(7, '1', '00002-A', NULL, NULL, 1, 5, 2021, '2021-05-14', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', 0),
(8, '1', '00026-B', ' TEST-884298, TEST-884298TEST-884298', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, '1', '00026-B', ' TEST-884298, TEST-884298TEST-884298', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(17, '1', '00011-A', NULL, NULL, 2, 5, 2021, '2021-05-11', '8', '0', NULL, '4', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500.00', '312.50', '0.00', '0.00', 0),
(24, '1', '00011-B', ' TEST-3873782, TEST-3873782TEST-3873782', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(25, '1', '00024-A', NULL, NULL, 2, 5, 2021, '2021-05-11', '8', '5', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '400.00', '0.00', '275.00', '0.00', 0),
(26, '1', '00024-A', NULL, NULL, 2, 5, 2021, '2021-05-12', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(27, '1', '00024-A', NULL, NULL, 2, 5, 2021, '2021-05-13', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(28, '1', '00024-A', NULL, NULL, 2, 5, 2021, '2021-05-14', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(32, '2', '00001-B', ' TEST-5038727, TEST-5038727TEST-5038727', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(61, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-11', '15', '8', NULL, '4', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '937.50', '312.50', '550.00', '0.00', 0),
(62, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-12', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(63, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-13', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(64, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-14', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(65, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-15', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(66, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-16', '5', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '312.50', '0.00', '0.00', '0.00', 0),
(67, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-17', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(68, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-18', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(69, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-19', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(70, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-20', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(71, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-21', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(72, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-22', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(73, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-23', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(74, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-24', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(75, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-25', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(76, '2', '00001-A', NULL, NULL, 1, 5, 2021, '2021-05-26', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(77, '1', '00011-A', NULL, NULL, 2, 5, 2021, '2021-05-12', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(78, '1', '00011-A', NULL, NULL, 2, 5, 2021, '2021-05-13', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(79, '1', '00011-A', NULL, NULL, 2, 5, 2021, '2021-05-14', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(80, '1', '00011-A', NULL, NULL, 2, 5, 2021, '2021-05-15', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(81, '1', '00011-A', NULL, NULL, 2, 5, 2021, '2021-05-16', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(82, '1', '00011-A', NULL, NULL, 2, 5, 2021, '2021-05-17', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(83, '1', '00011-A', NULL, NULL, 2, 5, 2021, '2021-05-18', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(84, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(85, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-15', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '400.00', '0.00', '0.00', '0.00', 0),
(86, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-16', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '400.00', '0.00', '0.00', '0.00', 0),
(87, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-17', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '400.00', '0.00', '0.00', '0.00', 0),
(88, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-18', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(89, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-19', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(90, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-20', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(91, '1', '00024-A', NULL, NULL, 1, 5, 2021, '2021-05-21', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0', 0),
(92, '1', '00008-B', ' TEST-1598246, TEST-1598246TEST-1598246', '5000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(93, '1', '00013-B', ' TEST-6537586, TEST-6537586TEST-6537586', '500', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(94, '1', '00011-A', NULL, NULL, 1, 6, 2021, '2021-06-22', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(95, '1', '00011-A', NULL, NULL, 1, 6, 2021, '2021-06-23', '8', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '300.00', '0.00', '0.00', '0.00', 0),
(96, '1', '00011-A', NULL, NULL, 1, 6, 2021, '2021-06-24', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(97, '1', '00011-A', NULL, NULL, 1, 6, 2021, '2021-06-25', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(98, '1', '00011-A', NULL, NULL, 1, 6, 2021, '2021-06-26', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(99, '1', '00011-A', NULL, NULL, 1, 6, 2021, '2021-06-27', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0),
(100, '1', '00011-A', NULL, NULL, 1, 6, 2021, '2021-06-28', '0', '0', NULL, '0', '0', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.00', '0.00', '0.00', '0.00', 0);

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
(27, 'admin', '2021-01-27 08:56:22 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00009-A#Contract\" target=\"_blank\">TEST-4275008, TEST-4275008 TEST-4275008</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(28, 'admin', '2021-01-28 12:56:53 PM', 'Note', 'Yellow', ': hello', NULL),
(29, 'admin', '2021-01-28 01:42:29 PM', 'Note', 'Yellow', ': 465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465465', NULL),
(30, 'admin', '2021-01-28 01:46:37 PM', 'Note', 'Yellow', ': ', NULL),
(31, 'admin', '2021-01-28 01:47:26 PM', 'Note', 'Yellow', ': asdad', NULL),
(32, 'admin', '2021-01-28 01:47:29 PM', 'Note', 'Yellow', ': asdasd', NULL),
(33, 'admin', '2021-01-29 02:28:01 AM', 'Note', 'Yellow', ': &#34;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&#34;', NULL),
(34, 'admin', '2021-01-29 02:28:52 AM', 'Note', 'Yellow', ': Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et egestas quis ipsum suspendisse ultrices gravida dictum fusce. Amet volutpat consequat mauris nunc. In vitae turpis massa sed elementum tempus egestas sed sed. Semper quis lectus nulla at volutpat diam ut venenatis tellus. Massa tempor nec feugiat nisl pretium fusce id. Commodo ullamcorper a lacus vestibulum sed arcu. Sapien pellentesque habitant morbi tristique senectus et netus et malesuada. Consequat ac felis donec et odio pellentesque diam volutpat commodo. Sed ullamcorper morbi tincidunt ornare massa eget egestas purus. Tortor condimentum lacinia quis vel eros. Habitant morbi tristique senectus et netus. Eu mi bibendum neque egestas congue quisque egestas diam. Feugiat vivamus at augue eget arcu dictum varius duis. Augue eget arcu dictum varius. Amet nisl suscipit adipiscing bibendum est ultricies integer quis. Turpis tincidunt id aliquet risus feugiat in ante metus dictum.\n\nTortor consequat id porta nibh venenatis cras sed felis. At urna condimentum mattis pellentesque id nibh. Id semper risus in hendrerit. Eget dolor morbi non arcu risus quis. Purus non enim praesent elementum facilisis leo. Cursus eget nunc scelerisque viverra mauris in aliquam sem fringilla. Blandit aliquam etiam erat velit scelerisque in dictum non. Mauris nunc congue nisi vitae suscipit. Arcu dui vivamus arcu felis bibendum ut. Diam ut venenatis tellus in.\n\nAdipiscing vitae proin sagittis nisl rhoncus mattis. Id donec ultrices tincidunt arcu. Lorem ipsum dolor sit amet consectetur adipiscing. Pellentesque habitant morbi tristique senectus et netus et malesuada. Maecenas sed enim ut sem viverra aliquet eget. Quis hendrerit dolor magna eget est lorem ipsum. Molestie ac feugiat sed lectus vestibulum mattis ullamcorper velit sed. Fames ac turpis egestas maecenas pharetra convallis posuere morbi leo. At auctor urna nunc id cursus. Sagittis aliquam malesuada bibendum arcu. Placerat vestibulum lectus mauris ultrices eros in cursus.\n\nNunc aliquet bibendum enim facilisis. Sed sed risus pretium quam vulputate dignissim. Commodo ullamcorper a lacus vestibulum. Sed nisi lacus sed viverra tellus in. Sed elementum tempus egestas sed sed risus pretium quam vulputate. Elementum pulvinar etiam non quam. Sed turpis tincidunt id aliquet risus feugiat in ante. Morbi tristique senectus et netus et malesuada. Ut ornare lectus sit amet est placerat. Quam vulputate dignissim suspendisse in est ante in. Euismod nisi porta lorem mollis aliquam ut porttitor. Fringilla phasellus faucibus scelerisque eleifend donec pretium vulputate. Sollicitudin ac orci phasellus egestas tellus rutrum. Arcu non sodales neque sodales ut etiam sit. Porttitor eget dolor morbi non arcu risus. Et pharetra pharetra massa massa ultricies mi quis. Eu ultrices vitae auctor eu.\n\nDignissim suspendisse in est ante in nibh mauris. Enim praesent elementum facilisis leo vel. Massa tempor nec feugiat nisl pretium fusce id. Vel facilisis volutpat est velit. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Nisl nisi scelerisque eu ultrices vitae auctor. Sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque eu. Erat nam at lectus urna duis convallis convallis. Arcu ac tortor dignissim convallis aenean et. Et malesuada fames ac turpis egestas maecenas. At auctor urna nunc id cursus metus aliquam eleifend. Velit sed ullamcorper morbi tincidunt. Orci phasellus egestas tellus rutrum. Felis eget velit aliquet sagittis id. Arcu non odio euismod lacinia at quis risus. Viverra vitae congue eu consequat ac felis donec. Habitasse platea dictumst vestibulum rhoncus est pellentesque. Nec tincidunt praesent semper feugiat nibh sed pulvinar. Ultricies mi eget mauris pharetra et ultrices neque ornare. Sed arcu non odio euismod lacinia at quis risus.\n\nMollis nunc sed id semper risus in hendrerit. Vestibulum mattis ullamcorper velit sed ullamcorper morbi tincidunt. Lorem ipsum dolor sit amet. Amet tellus cras adipiscing enim eu turpis egestas pretium. Risus pretium quam vulputate dignissim suspendisse in est ante in. Morbi leo urna molestie at elementum eu facilisis. Aliquam sem et tortor consequat id porta nibh venenatis cras. Amet purus gravida quis blandit turpis cursus in hac habitasse. Risus nec feugiat in fermentum posuere urna. Sit amet facilisis magna etiam tempor orci eu lobortis elementum. Tincidunt praesent semper feugiat nibh sed pulvinar proin gravida hendrerit. Integer enim neque volutpat ac tincidunt vitae. Libero enim sed faucibus turpis. Est sit amet facilisis magna etiam tempor orci eu lobortis. Justo eget magna fermentum iaculis eu non. Vel pharetra vel turpis nunc eget. Nisl nisi scelerisque eu ultrices. Platea dictumst quisque sagittis purus sit amet.\n\nId velit ut tortor pretium viverra suspendisse potenti. Accumsan tortor posuere ac ut consequat semper viverra. Dui vivamus arcu felis bibendum ut tristique. Hendrerit gravida rutrum quisque non tellus orci ac auctor. Blandit libero volutpat sed cras ornare arcu dui vivamus. Ut placerat orci nulla pellentesque dignissim enim. Vitae auctor eu augue ut. Elit ut aliquam purus sit amet luctus. Viverra nibh cras pulvinar mattis nunc. Tristique senectus et netus et malesuada fames ac. Aliquet risus feugiat in ante metus dictum. Arcu bibendum at varius vel pharetra vel turpis nunc. Hendrerit gravida rutrum quisque non.\n\nPlacerat duis ultricies lacus sed turpis tincidunt id. Aliquam etiam erat velit scelerisque in dictum. Gravida rutrum quisque non tellus orci ac auctor. Leo a diam sollicitudin tempor id eu nisl. Sed libero enim sed faucibus. Elit scelerisque mauris pellentesque pulvinar pellentesque. Nascetur ridiculus mus mauris vitae ultricies leo. Et odio pellentesque diam volutpat commodo sed egestas. Egestas congue quisque egestas diam in arcu cursus euismod quis. At auctor urna nunc id cursus metus aliquam eleifend. Interdum varius sit amet mattis vulputate enim nulla aliquet. Auctor neque vitae tempus quam pellentesque nec nam aliquam.\n\nSuspendisse potenti nullam ac tortor. Vitae ultricies leo integer malesuada nunc vel risus commodo viverra. Convallis posuere morbi leo urna molestie at elementum eu. Et molestie ac feugiat sed lectus vestibulum mattis ullamcorper. At elementum eu facilisis sed odio morbi quis commodo odio. Amet risus nullam eget felis eget. In nisl nisi scelerisque eu ultrices. Senectus et netus et malesuada. Sem fringilla ut morbi tincidunt augue interdum velit. Risus ultricies tristique nulla aliquet enim. Ultricies leo integer malesuada nunc vel. Donec massa sapien faucibus et molestie. Tempus quam pellentesque nec nam. Id consectetur purus ut faucibus pulvinar elementum integer.\n\nSit amet porttitor eget dolor morbi non arcu risus. Tortor id aliquet lectus proin nibh nisl condimentum id venenatis. Sit amet commodo nulla facilisi nullam vehicula. Feugiat scelerisque varius morbi enim nunc faucibus a. Ultricies mi quis hendrerit dolor magna eget. Orci dapibus ultrices in iaculis nunc sed augue. Maecenas sed enim ut sem viverra aliquet. Sollicitudin ac orci phasellus egestas. Consequat interdum varius sit amet mattis vulputate. Amet massa vitae tortor condimentum lacinia quis vel eros donec.', NULL),
(35, 'admin', '2021-02-16 08:53:06 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00009-A\" target=\"_blank\">TEST-4275008, TEST-4275008 TEST-4275008</a>', NULL),
(36, 'admin', '2021-02-16 08:53:31 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>', NULL),
(37, 'admin', '2021-02-17 04:43:45 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>', NULL),
(38, 'admin', '2021-03-05 09:06:03 AM', 'Admin', 'Green', ' added a new admin: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewAdmin?id=asd\" target=\"_blank\">Asd,  </a>', NULL),
(39, 'admin', '2021-04-07 09:24:38 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>', NULL),
(40, 'admin', '2021-04-07 09:27:53 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>', NULL),
(41, 'admin', '2021-04-07 09:28:07 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>', NULL),
(42, 'admin', '2021-04-07 09:28:24 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>', NULL),
(43, 'admin', '2021-04-07 09:33:16 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00010-A\" target=\"_blank\">TEST-1301460, TEST-1301460 TEST-1301460</a>', NULL),
(44, 'admin', '2021-04-07 09:47:23 AM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(45, 'admin', '2021-04-07 10:25:46 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Contract\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">123</a>', NULL),
(46, 'admin', '2021-04-07 10:26:52 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(47, 'admin', '2021-04-10 01:00:43 AM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(48, 'admin', '2021-04-10 08:36:08 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00010-A#Contract\" target=\"_blank\">TEST-1301460, TEST-1301460 TEST-1301460</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">123</a>', NULL),
(49, 'admin', '2021-04-10 08:44:16 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00006-A#Contract\" target=\"_blank\">TEST-9284419, TEST-9284419 TEST-9284419</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(50, 'admin', '2021-04-10 09:02:33 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00005-A#Contract\" target=\"_blank\">TEST-4846795, TEST-4846795 TEST-4846795</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(51, 'admin', '2021-04-10 09:04:53 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00005-A\" target=\"_blank\">TEST-4846795, TEST-4846795 TEST-4846795</a>', NULL),
(52, 'admin', '2021-04-10 09:05:02 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00005-A\" target=\"_blank\">TEST-4846795, TEST-4846795 TEST-4846795</a>', NULL),
(53, 'admin', '2021-04-10 09:05:06 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00005-A\" target=\"_blank\">TEST-4846795, TEST-4846795 TEST-4846795</a>', NULL),
(54, 'admin', '2021-04-10 09:09:15 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>', NULL),
(55, 'admin', '2021-04-10 09:11:08 AM', 'Salary', 'Blue', ' updated the primary week', NULL),
(56, 'admin', '2021-04-10 09:11:37 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-8089530, TEST-8089530 TEST-8089530</a>', NULL),
(57, 'admin', '2021-04-10 09:11:37 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00007-A\" target=\"_blank\">TEST-8089530, TEST-8089530 TEST-8089530</a>', NULL),
(58, 'admin', '2021-04-10 10:20:46 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A#Contract\" target=\"_blank\">TEST-6693569, TEST-6693569 TEST-6693569</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(59, 'admin', '2021-04-10 10:22:47 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a>', NULL),
(60, 'admin', '2021-04-10 10:22:55 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(61, 'admin', '2021-04-10 10:26:45 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(62, 'admin', '2021-04-10 10:27:12 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(63, 'admin', '2021-04-10 10:27:57 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(64, 'admin', '2021-04-10 10:28:04 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(65, 'admin', '2021-04-10 10:28:39 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(66, 'admin', '2021-04-10 10:30:45 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(67, 'admin', '2021-04-10 10:31:47 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(68, 'admin', '2021-04-10 10:31:54 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(69, 'admin', '2021-04-10 10:33:03 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(70, 'admin', '2021-04-10 10:34:26 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(71, 'admin', '2021-04-10 10:34:27 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Contract\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(72, 'admin', '2021-04-10 10:34:37 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00012-A\" target=\"_blank\">TEST-4556870, TEST-4556870 TEST-4556870</a>', NULL),
(73, 'admin', '2021-04-10 10:34:45 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00012-A#Contract\" target=\"_blank\">TEST-4556870, TEST-4556870 TEST-4556870</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(74, 'admin', '2021-04-10 10:35:15 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00013-A\" target=\"_blank\">TEST-6537586, TEST-6537586 TEST-6537586</a>', NULL),
(75, 'admin', '2021-04-10 10:35:23 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00013-A#Contract\" target=\"_blank\">TEST-6537586, TEST-6537586 TEST-6537586</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(76, 'admin', '2021-04-10 10:36:05 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00014-A\" target=\"_blank\">TEST-2508552, TEST-2508552 TEST-2508552</a>', NULL),
(77, 'admin', '2021-04-10 10:36:07 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00015-A\" target=\"_blank\">TEST-979651, TEST-979651 TEST-979651</a>', NULL),
(78, 'admin', '2021-04-10 10:37:23 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00015-A#Contract\" target=\"_blank\">TEST-979651, TEST-979651 TEST-979651</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(79, 'admin', '2021-04-10 10:37:58 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00014-A#Contract\" target=\"_blank\">TEST-2508552, TEST-2508552 TEST-2508552</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(80, 'admin', '2021-04-10 10:38:20 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00016-A\" target=\"_blank\">TEST-5005238, TEST-5005238 TEST-5005238</a>', NULL),
(81, 'admin', '2021-04-10 10:38:45 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00016-A#Contract\" target=\"_blank\">TEST-5005238, TEST-5005238 TEST-5005238</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(82, 'admin', '2021-04-10 10:39:45 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00017-A\" target=\"_blank\">TEST-4344266, TEST-4344266 TEST-4344266</a>', NULL),
(83, 'admin', '2021-04-10 10:39:47 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00018-A\" target=\"_blank\">TEST-7657015, TEST-7657015 TEST-7657015</a>', NULL),
(84, 'admin', '2021-04-10 10:39:52 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00017-A#Contract\" target=\"_blank\">TEST-4344266, TEST-4344266 TEST-4344266</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(85, 'admin', '2021-04-10 10:40:55 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00016-A#Contract\" target=\"_blank\">TEST-5005238, TEST-5005238 TEST-5005238</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(86, 'admin', '2021-04-10 10:41:49 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00018-A#Contract\" target=\"_blank\">TEST-7657015, TEST-7657015 TEST-7657015</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(87, 'admin', '2021-04-10 10:42:28 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00019-A\" target=\"_blank\">TEST-985662, TEST-985662 TEST-985662</a>', NULL),
(88, 'admin', '2021-04-10 10:42:35 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00019-A#Contract\" target=\"_blank\">TEST-985662, TEST-985662 TEST-985662</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(89, 'admin', '2021-05-12 06:44:07 AM', 'Salary', 'Blue', ' created a new SSS batch.', NULL),
(90, 'admin', '2021-05-12 06:44:16 AM', 'Salary', 'Blue', ' created a new SSS batch.', NULL),
(91, 'admin', '2021-05-12 06:58:02 AM', 'Salary', 'Blue', ' created a new SSS batch.', NULL),
(92, 'admin', '2021-05-12 06:58:11 AM', 'Salary', 'Blue', ' created a new SSS batch.', NULL),
(93, 'admin', '2021-05-12 10:41:26 AM', 'Salary', 'Blue', ' created a new SSS batch.', NULL),
(94, 'admin', '2021-05-12 10:42:17 AM', 'Salary', 'Blue', ' created a new SSS batch.', NULL),
(95, 'admin', '2021-05-12 11:05:09 AM', 'Salary', 'Blue', ' created a new SSS batch.', NULL),
(96, 'admin', '2021-05-12 11:05:13 AM', 'Salary', 'Blue', ' created a new SSS batch.', NULL),
(97, 'admin', '2021-05-12 11:19:22 AM', 'Salary', 'Blue', ' created a new SSS batch.', NULL),
(98, 'admin', '2021-05-13 09:44:45 PM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00020-A\" target=\"_blank\">TEST-4350935, TEST-4350935 TEST-4350935</a>', NULL),
(99, 'admin', '2021-05-14 02:28:37 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00021-A\" target=\"_blank\">TEST-7613400, TEST-7613400 TEST-7613400</a>', NULL),
(100, 'admin', '2021-05-14 02:28:52 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00020-A#Contract\" target=\"_blank\">TEST-4350935, TEST-4350935 TEST-4350935</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(101, 'admin', '2021-05-14 03:59:01 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00022-A\" target=\"_blank\">TEST-7966933, TEST-7966933 TEST-7966933</a>', NULL),
(102, 'admin', '2021-05-14 03:59:12 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00021-A#Contract\" target=\"_blank\">TEST-7613400, TEST-7613400 TEST-7613400</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(103, 'admin', '2021-05-14 05:41:12 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00023-A\" target=\"_blank\">TEST-3372621, TEST-3372621 TEST-3372621</a>', NULL),
(104, 'admin', '2021-05-14 05:41:25 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00022-A#Contract\" target=\"_blank\">TEST-7966933, TEST-7966933 TEST-7966933</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(105, 'admin', '2021-05-14 05:53:09 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00023-A#Contract\" target=\"_blank\">TEST-3372621, TEST-3372621 TEST-3372621</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(106, 'admin', '2021-05-14 06:13:03 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00024-A\" target=\"_blank\">TEST-267476, TEST-267476 TEST-267476</a>', NULL),
(107, 'admin', '2021-05-14 06:13:15 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00024-A#Contract\" target=\"_blank\">TEST-267476, TEST-267476 TEST-267476</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(108, 'admin', '2021-05-14 06:14:01 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00025-A\" target=\"_blank\">TEST-9141654, TEST-9141654 TEST-9141654</a>', NULL),
(109, 'admin', '2021-05-14 06:14:13 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00025-A#Contract\" target=\"_blank\">TEST-9141654, TEST-9141654 TEST-9141654</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(110, 'admin', '2021-05-14 07:50:11 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Contract\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>\'s contract details', NULL),
(111, 'admin', '2021-05-14 07:52:28 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A#Employment\" target=\"_blank\">TEST-6693569, TEST-6693569 TEST-6693569</a>\'s contract details', NULL),
(112, 'admin', '2021-05-14 07:52:37 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00004-A#Employment\" target=\"_blank\">TEST-6693569, TEST-6693569 TEST-6693569</a>\'s contract details', NULL),
(113, 'admin', '2021-05-14 07:52:58 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Employment\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>\'s contract details', NULL),
(114, 'admin', '2021-05-14 07:53:10 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Employment\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>\'s contract details', NULL),
(115, 'admin', '2021-05-14 07:53:57 AM', 'Applicant', 'Green', ' added a new applicant: <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00026-A\" target=\"_blank\">TEST-884298, TEST-884298 TEST-884298</a>', NULL),
(116, 'admin', '2021-05-14 08:05:14 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Employment\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>\'s contract details', NULL),
(117, 'admin', '2021-05-14 08:05:56 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Employment\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>\'s contract details', NULL),
(118, 'admin', '2021-05-14 08:06:00 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Employment\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>\'s contract details', NULL),
(119, 'admin', '2021-05-14 08:06:04 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A#Employment\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>\'s contract details', NULL),
(120, 'admin', '2021-05-14 08:08:56 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00025-A#Employment\" target=\"_blank\">TEST-9141654, TEST-9141654 TEST-9141654</a>\'s contract details', NULL),
(121, 'admin', '2021-05-14 08:33:00 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Employment\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a>\'s contract details', NULL),
(122, 'admin', '2021-05-14 08:37:51 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00021-A\" target=\"_blank\">TEST-7613400, TEST-7613400 TEST-7613400</a>', NULL),
(123, 'admin', '2021-05-14 08:38:07 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00021-A\" target=\"_blank\">TEST-7613400, TEST-7613400 TEST-7613400</a>', NULL),
(124, 'admin', '2021-05-14 08:57:43 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>', NULL),
(125, 'admin', '2021-05-14 09:28:48 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00026-A#Employment\" target=\"_blank\">TEST-884298, TEST-884298 TEST-884298</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(126, 'admin', '2021-05-14 09:37:11 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00026-A#Employment\" target=\"_blank\">TEST-884298, TEST-884298 TEST-884298</a>\'s contract details', NULL),
(127, 'admin', '2021-05-17 04:26:36 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>', NULL),
(128, 'admin', '2021-05-17 04:52:16 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>', NULL),
(129, 'admin', '2021-05-17 04:53:40 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>', NULL),
(130, 'admin', '2021-05-17 04:53:53 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>', NULL),
(131, 'admin', '2021-05-17 06:25:19 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>', NULL),
(132, 'admin', '2021-05-17 06:43:33 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00024-A\" target=\"_blank\">TEST-267476, TEST-267476 TEST-267476</a>', NULL),
(133, 'admin', '2021-05-17 06:56:09 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00024-A\" target=\"_blank\">TEST-267476, TEST-267476 TEST-267476</a>', NULL),
(134, 'admin', '2021-05-17 06:56:40 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a>', NULL),
(135, 'admin', '2021-05-17 08:17:26 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A#Employment\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=1\" target=\"_blank\">test</a>', NULL),
(136, 'admin', '2021-05-17 08:18:21 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00024-A\" target=\"_blank\">TEST-267476, TEST-267476 TEST-267476</a>', NULL),
(137, 'admin', '2021-05-17 09:06:04 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a>', NULL),
(138, 'admin', '2021-05-17 09:21:17 AM', 'Applicant', 'Green', ' restored <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">[No Name]</a>', NULL),
(139, 'admin', '2021-05-17 09:21:27 AM', 'Employee', 'Blue', ' employed <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A#Employment\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a> to <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Clients?id=2\" target=\"_blank\">123</a>', NULL),
(140, 'admin', '2021-05-17 09:21:37 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(141, 'admin', '2021-05-17 09:21:47 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(142, 'admin', '2021-05-17 09:24:02 AM', 'Salary', 'Blue', ' updated the primary week', NULL),
(143, 'admin', '2021-05-17 09:24:11 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(144, 'admin', '2021-05-17 09:24:32 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(145, 'admin', '2021-05-17 09:28:33 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(146, 'admin', '2021-05-17 09:49:01 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(147, 'admin', '2021-05-17 09:54:58 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(148, 'admin', '2021-05-17 09:59:23 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(149, 'admin', '2021-05-17 09:59:49 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(150, 'admin', '2021-05-17 10:08:28 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(151, 'admin', '2021-05-17 10:09:49 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(152, 'admin', '2021-05-17 10:09:55 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL),
(153, 'admin', '2021-05-17 10:10:30 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00001-A\" target=\"_blank\">TEST-5038727, TEST-5038727 TEST-5038727</a>', NULL);
INSERT INTO `logbook` (`No`, `AdminID`, `Time`, `Icon`, `Type`, `Event`, `Link`) VALUES
(154, 'admin', '2021-05-17 07:31:19 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a>', NULL),
(155, 'admin', '2021-05-18 03:40:46 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a>', NULL),
(156, 'admin', '2021-05-21 08:23:18 AM', 'Payroll', 'Green', ' added a new SSS table row', NULL),
(157, 'admin', '2021-05-21 08:33:00 AM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(158, 'admin', '2021-05-21 08:33:00 AM', 'Salary', 'Blue', ' updated the SSS table', NULL),
(159, 'admin', '2021-05-21 09:10:43 AM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(160, 'admin', '2021-05-21 09:16:10 AM', 'Admin', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/Admins?id=admin\" target=\"_blank\">admin</a>', NULL),
(161, 'admin', '2021-05-21 09:43:35 AM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A#Employment\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>\'s contract details', NULL),
(162, 'admin', '2021-05-21 09:44:08 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>', NULL),
(163, 'admin', '2021-05-21 11:23:45 AM', 'Salary', 'Blue', ' updated the primary week', NULL),
(164, 'admin', '2021-05-21 11:26:11 AM', 'Salary', 'Blue', ' updated the primary week', NULL),
(165, 'admin', '2021-05-21 11:29:07 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00024-A\" target=\"_blank\">TEST-267476, TEST-267476 TEST-267476</a>', NULL),
(166, 'admin', '2021-05-21 12:15:48 PM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00008-A#Employment\" target=\"_blank\">TEST-1598246, TEST-1598246 TEST-1598246</a>\'s contract details', NULL),
(167, 'admin', '2021-05-21 12:37:29 PM', 'Salary', 'Blue', ' updated the primary week', NULL),
(168, 'admin', '2021-05-21 12:54:53 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00024-A\" target=\"_blank\">TEST-267476, TEST-267476 TEST-267476</a>', NULL),
(169, 'admin', '2021-05-21 12:54:53 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00024-A\" target=\"_blank\">TEST-267476, TEST-267476 TEST-267476</a>', NULL),
(170, 'admin', '2021-05-21 02:03:14 PM', 'Employee', 'Blue', ' updated <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00013-A#Employment\" target=\"_blank\">TEST-6537586, TEST-6537586 TEST-6537586</a>\'s contract details', NULL),
(171, 'admin', '2021-05-21 02:05:08 PM', 'Salary', 'Blue', ' updated the primary week', NULL),
(172, 'admin', '2021-05-21 02:05:54 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a>', NULL),
(173, 'admin', '2021-05-21 02:13:40 PM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00011-A\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a>', NULL),
(174, 'admin', '2021-06-25 09:11:05 AM', 'Employee', 'Blue', ' updated details for <a class=\"logbook-tooltip-highlight\" href=\"http://localhost/ci_wercher_system/ViewEmployee?id=00002-A\" target=\"_blank\">TEST-9011888, TEST-9011888 TEST-9011888</a>', NULL),
(175, 'admin', '2021-06-28 09:30:30 AM', 'Salary', 'Blue', ' updated the hours of <a class=\"logbook-tooltip-highlight\" href=\"https://localhost/ci_wercher_system/ViewEmployee?id=00011-A\" target=\"_blank\">TEST-3873782, TEST-3873782 TEST-3873782</a>', NULL);

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
(45, 'admin', '2021-01-27 08:56:22 AM', '27', 0, 'Contract Duration: <b>January 27, 2021</b> to <b>January 27, 2022</b>'),
(46, 'admin', '2021-03-05 09:06:03 AM', '38', 0, 'Admin ID: '),
(47, 'admin', '2021-03-05 09:06:03 AM', '38', 0, 'Position:  - Admin Officer'),
(48, 'admin', '2021-04-07 09:24:38 AM', '39', 0, 'TIN number changed from <b>TEST-9011888</b> to <b>asdas</b>'),
(49, 'admin', '2021-04-07 09:27:53 AM', '40', 0, 'Email address changed from <b></b> to <b>12313@</b>'),
(50, 'admin', '2021-04-07 09:27:53 AM', '40', 0, 'TIN number changed from <b>asdas</b> to <b>123</b>'),
(51, 'admin', '2021-04-07 09:28:07 AM', '41', 0, 'HMO number changed from <b></b> to <b>fhhsh</b>'),
(52, 'admin', '2021-04-07 09:28:24 AM', '42', 0, 'Email address changed from <b>12313@</b> to <b>12313@asdadasdasdasdadadasdad.com</b>'),
(53, 'admin', '2021-04-07 09:33:16 AM', '43', 0, 'Applicant ID: <b>00010-A</b>'),
(54, 'admin', '2021-04-07 09:33:16 AM', '43', 0, 'Referral: <b>Walk In</b>'),
(55, 'admin', '2021-04-07 09:47:23 AM', '43', 0, 'Permissions changed from <b>Dashboard, DashboardLogbook, Applicants, ApplicantsEditing, ApplicantsExpired, ApplicantsBlacklisted, ApplicantsArchived, Employees, EmployeesHiring, EmployeesEditing, EmployeesRegulars, Admins, AdminsEditing, AdminsArchived, Clients, ClientsEditing, ClientsArchived, Payroll</b> to <b>Array</b>.'),
(56, 'admin', '2021-04-07 10:25:46 AM', '45', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(57, 'admin', '2021-04-07 10:26:52 AM', '46', 0, 'Employee ID from <b>WC12313-0001-21</b> to <b></b>'),
(58, 'admin', '2021-04-07 10:26:52 AM', '46', 0, 'Email address changed from <b></b> to <b>12313</b>'),
(59, 'admin', '2021-04-10 01:00:43 AM', '46', 0, 'Permissions changed from <b>Dashboard, DashboardLogbook, Applicants, ApplicantsEditing, ApplicantsExpired, ApplicantsBlacklisted, ApplicantsArchived, Employees, EmployeesHiring, EmployeesEditing, EmployeesRegulars, Admins, AdminsEditing, AdminsArchived, Clients, ClientsEditing, ClientsArchived, Payroll, EmployeesAbsorbed, EmployeesResigned, EmployeesTerminated</b> to <b>Array</b>.'),
(60, 'admin', '2021-04-10 08:36:08 AM', '48', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(61, 'admin', '2021-04-10 08:36:08 AM', '48', 0, 'Contract Duration: <b>April 10, 2021</b> to <b>May 10, 2021</b>'),
(62, 'admin', '2021-04-10 08:44:16 AM', '49', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(63, 'admin', '2021-04-10 09:02:33 AM', '50', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(64, 'admin', '2021-04-10 10:20:46 AM', '58', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(65, 'admin', '2021-04-10 10:22:47 AM', '59', 0, 'Applicant ID: <b>00011-A</b>'),
(66, 'admin', '2021-04-10 10:22:47 AM', '59', 0, 'Referral: <b>Walk In</b>'),
(67, 'admin', '2021-04-10 10:22:55 AM', '60', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(68, 'admin', '2021-04-10 10:26:45 AM', '61', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(69, 'admin', '2021-04-10 10:27:13 AM', '62', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(70, 'admin', '2021-04-10 10:27:57 AM', '63', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(71, 'admin', '2021-04-10 10:28:04 AM', '64', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(72, 'admin', '2021-04-10 10:28:39 AM', '65', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(73, 'admin', '2021-04-10 10:30:46 AM', '66', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(74, 'admin', '2021-04-10 10:31:47 AM', '67', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(75, 'admin', '2021-04-10 10:31:54 AM', '68', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(76, 'admin', '2021-04-10 10:33:04 AM', '69', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(77, 'admin', '2021-04-10 10:34:27 AM', '70', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(78, 'admin', '2021-04-10 10:34:27 AM', '71', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(79, 'admin', '2021-04-10 10:34:37 AM', '72', 0, 'Applicant ID: <b>00012-A</b>'),
(80, 'admin', '2021-04-10 10:34:37 AM', '72', 0, 'Referral: <b>Walk In</b>'),
(81, 'admin', '2021-04-10 10:34:45 AM', '73', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(82, 'admin', '2021-04-10 10:35:15 AM', '74', 0, 'Applicant ID: <b>00013-A</b>'),
(83, 'admin', '2021-04-10 10:35:15 AM', '74', 0, 'Referral: <b>Walk In</b>'),
(84, 'admin', '2021-04-10 10:35:23 AM', '75', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(85, 'admin', '2021-04-10 10:36:05 AM', '76', 0, 'Applicant ID: <b>00014-A</b>'),
(86, 'admin', '2021-04-10 10:36:05 AM', '76', 0, 'Referral: <b>Walk In</b>'),
(87, 'admin', '2021-04-10 10:36:08 AM', '77', 0, 'Applicant ID: <b>00015-A</b>'),
(88, 'admin', '2021-04-10 10:36:08 AM', '77', 0, 'Referral: <b>Walk In</b>'),
(89, 'admin', '2021-04-10 10:37:23 AM', '78', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(90, 'admin', '2021-04-10 10:37:58 AM', '79', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(91, 'admin', '2021-04-10 10:38:20 AM', '80', 0, 'Applicant ID: <b>00016-A</b>'),
(92, 'admin', '2021-04-10 10:38:20 AM', '80', 0, 'Referral: <b>Walk In</b>'),
(93, 'admin', '2021-04-10 10:38:45 AM', '81', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(94, 'admin', '2021-04-10 10:39:45 AM', '82', 0, 'Applicant ID: <b>00017-A</b>'),
(95, 'admin', '2021-04-10 10:39:45 AM', '82', 0, 'Referral: <b>Walk In</b>'),
(96, 'admin', '2021-04-10 10:39:47 AM', '83', 0, 'Applicant ID: <b>00018-A</b>'),
(97, 'admin', '2021-04-10 10:39:48 AM', '83', 0, 'Referral: <b>Walk In</b>'),
(98, 'admin', '2021-04-10 10:39:52 AM', '84', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(99, 'admin', '2021-04-10 10:40:55 AM', '85', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(100, 'admin', '2021-04-10 10:41:49 AM', '86', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(101, 'admin', '2021-04-10 10:42:28 AM', '87', 0, 'Applicant ID: <b>00019-A</b>'),
(102, 'admin', '2021-04-10 10:42:28 AM', '87', 0, 'Referral: <b>Walk In</b>'),
(103, 'admin', '2021-04-10 10:42:35 AM', '88', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(104, 'admin', '2021-05-13 09:44:45 PM', '98', 0, 'Applicant ID: <b>00020-A</b>'),
(105, 'admin', '2021-05-13 09:44:45 PM', '98', 0, 'Referral: <b>Walk In</b>'),
(106, 'admin', '2021-05-14 02:28:37 AM', '99', 0, 'Applicant ID: <b>00021-A</b>'),
(107, 'admin', '2021-05-14 02:28:37 AM', '99', 0, 'Referral: <b>Walk In</b>'),
(108, 'admin', '2021-05-14 02:28:52 AM', '100', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(109, 'admin', '2021-05-14 02:28:52 AM', '100', 0, 'Contract Duration: <b>May 14, 2021</b> to <b>May 14, 2022</b>'),
(110, 'admin', '2021-05-14 03:59:02 AM', '101', 0, 'Applicant ID: <b>00022-A</b>'),
(111, 'admin', '2021-05-14 03:59:02 AM', '101', 0, 'Referral: <b>Walk In</b>'),
(112, 'admin', '2021-05-14 03:59:12 AM', '102', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(113, 'admin', '2021-05-14 03:59:12 AM', '102', 0, 'Contract Duration: <b>May 14, 2021</b> to <b>May 14, 2022</b>'),
(114, 'admin', '2021-05-14 05:41:12 AM', '103', 0, 'Applicant ID: <b>00023-A</b>'),
(115, 'admin', '2021-05-14 05:41:12 AM', '103', 0, 'Referral: <b>Walk In</b>'),
(116, 'admin', '2021-05-14 05:41:25 AM', '104', 0, 'Status changed from <b>Applicant</b> to <b>Employed</b>'),
(117, 'admin', '2021-05-14 05:41:25 AM', '104', 0, 'Contract Duration: <b>May 14, 2021</b> to <b>May 14, 2022</b>'),
(118, 'admin', '2021-05-14 05:53:09 AM', '105', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(119, 'admin', '2021-05-14 06:13:03 AM', '106', 0, 'Applicant ID: <b>00024-A</b>'),
(120, 'admin', '2021-05-14 06:13:03 AM', '106', 0, 'Referral: <b>Walk In</b>'),
(121, 'admin', '2021-05-14 06:13:15 AM', '107', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(122, 'admin', '2021-05-14 06:14:01 AM', '108', 0, 'Applicant ID: <b>00025-A</b>'),
(123, 'admin', '2021-05-14 06:14:01 AM', '108', 0, 'Referral: <b>Walk In</b>'),
(124, 'admin', '2021-05-14 06:14:13 AM', '109', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(125, 'admin', '2021-05-14 07:50:11 AM', '110', 0, 'Contract\'s date ends changed from <b>2022-01-21 09:05:35 AM</b> to <b>2022-01-21 09:05:35 </b>'),
(126, 'admin', '2021-05-14 07:52:28 AM', '111', 0, 'Contract\'s date start changed from <b></b> to <b>2021-05-14 07:52:21 AM</b>'),
(127, 'admin', '2021-05-14 07:52:28 AM', '111', 0, 'Contract\'s date ends changed from <b></b> to <b> 00:00:00 </b>'),
(128, 'admin', '2021-05-14 07:52:28 AM', '111', 0, 'Salary changed from <b></b> to <b>2000</b>'),
(129, 'admin', '2021-05-14 07:53:58 AM', '115', 0, 'Applicant ID: <b>00026-A</b>'),
(130, 'admin', '2021-05-14 07:53:58 AM', '115', 0, 'Referral: <b>Walk In</b>'),
(131, 'admin', '2021-05-14 08:06:00 AM', '118', 0, 'Salary changed from <b>5000</b> to <b>5000</b>'),
(132, 'admin', '2021-05-14 08:06:04 AM', '119', 0, 'Salary changed from <b>5000</b> to <b>5000</b>'),
(133, 'admin', '2021-05-14 08:08:56 AM', '120', 0, 'Contract\'s date ends changed from <b></b> to <b> 00:00:00 </b>'),
(134, 'admin', '2021-05-14 08:08:56 AM', '120', 0, 'Salary changed from <b>300</b> to <b>300.23</b>'),
(135, 'admin', '2021-05-14 08:33:00 AM', '121', 0, 'Contract\'s date start changed from <b></b> to <b>2021-05-14 08:32:54 AM</b>'),
(136, 'admin', '2021-05-14 08:33:00 AM', '121', 0, 'Contract\'s date ends changed from <b></b> to <b> 00:00:00 </b>'),
(137, 'admin', '2021-05-14 08:33:00 AM', '121', 0, 'Salary changed from <b>500</b> to <b>500</b>'),
(138, 'admin', '2021-05-14 09:28:48 AM', '125', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(139, 'admin', '2021-05-14 09:37:11 AM', '126', 0, 'Contract\'s date ends changed from <b></b> to <b> 00:00:00 </b>'),
(140, 'admin', '2021-05-14 09:37:11 AM', '126', 0, 'Salary changed from <b>500</b> to <b>500</b>'),
(141, 'admin', '2021-05-17 08:17:26 AM', '135', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(142, 'admin', '2021-05-17 09:21:17 AM', '138', 0, 'Changed status to <b>Applicant</b>'),
(143, 'admin', '2021-05-17 09:21:27 AM', '139', 0, 'Status changed from <b>Applicant</b> to <b>Regular</b>'),
(144, 'admin', '2021-05-21 08:23:18 AM', '156', 0, '<b>From:</b> 0'),
(145, 'admin', '2021-05-21 08:23:18 AM', '156', 0, '<b>To:</b> 150'),
(146, 'admin', '2021-05-21 08:23:18 AM', '156', 0, '<b>Contribution (ER):</b> 10'),
(147, 'admin', '2021-05-21 08:23:18 AM', '156', 0, '<b>Contribution (EE):</b> 10'),
(148, 'admin', '2021-05-21 08:23:18 AM', '156', 0, '<b>Contribution (EC):</b> 10'),
(149, 'admin', '2021-05-21 08:23:18 AM', '156', 0, '<b>Total:</b> 20'),
(150, 'admin', '2021-05-21 08:23:18 AM', '156', 0, '<b>Total with EC:</b> 30'),
(151, 'admin', '2021-05-21 08:33:00 AM', '157', 0, '<b>From:</b> 0'),
(152, 'admin', '2021-05-21 08:33:00 AM', '157', 0, '<b>To:</b> 150'),
(153, 'admin', '2021-05-21 08:33:00 AM', '157', 0, '<b>Contribution (ER):</b> 10.00'),
(154, 'admin', '2021-05-21 08:33:00 AM', '157', 0, '<b>Contribution (EE):</b> 10.00'),
(155, 'admin', '2021-05-21 08:33:00 AM', '157', 0, '<b>Contribution (EC):</b> 11'),
(156, 'admin', '2021-05-21 08:33:00 AM', '157', 0, '<b>Total:</b> 20'),
(157, 'admin', '2021-05-21 08:33:00 AM', '157', 0, '<b>Total with EC:</b> 31'),
(158, 'admin', '2021-05-21 08:33:00 AM', '158', 0, '<b>From:</b> 0'),
(159, 'admin', '2021-05-21 08:33:00 AM', '158', 0, '<b>To:</b> 150'),
(160, 'admin', '2021-05-21 08:33:00 AM', '158', 0, '<b>Contribution (ER):</b> 10.00'),
(161, 'admin', '2021-05-21 08:33:00 AM', '158', 0, '<b>Contribution (EE):</b> 10.00'),
(162, 'admin', '2021-05-21 08:33:00 AM', '158', 0, '<b>Contribution (EC):</b> 11'),
(163, 'admin', '2021-05-21 08:33:00 AM', '158', 0, '<b>Total:</b> 20'),
(164, 'admin', '2021-05-21 08:33:00 AM', '158', 0, '<b>Total with EC:</b> 31'),
(165, 'admin', '2021-05-21 09:10:43 AM', '158', 0, 'Permissions changed from <b>Dashboard, DashboardLogbook, Applicants, ApplicantsEditing, ApplicantsExpired, ApplicantsBlacklisted, ApplicantsArchived, Employees, EmployeesHiring, EmployeesEditing, EmployeesRegulars, EmployeesResigned, EmployeesTerminated, Admins, AdminsEditing, AdminsArchived, Clients, ClientsEditing, ClientsArchived, Payroll, EmployeesAbsorbedWercher, EmployeesAbsorbedLeft</b> to <b>Array</b>.'),
(166, 'admin', '2021-05-21 09:16:10 AM', '159', 0, 'Permissions changed from <b>Dashboard, DashboardLogbook, Applicants, ApplicantsEditing, ApplicantsExpired, ApplicantsBlacklisted, ApplicantsArchived, Employees, EmployeesHiring, EmployeesEditing, EmployeesRegulars, EmployeesAbsorbedWercher, EmployeesAbsorbedLeft, EmployeesResigned, EmployeesTerminated, Admins, AdminsEditing, AdminsArchived, Clients, ClientsEditing, ClientsArchived</b> to <b>Array</b>.'),
(167, 'admin', '2021-05-21 09:43:35 AM', '161', 0, 'Contract\'s date ends changed from <b>2021-04-10 01:01:55</b> to <b> 00:00:00 </b>'),
(168, 'admin', '2021-05-21 09:43:35 AM', '161', 0, 'Salary changed from <b></b> to <b>5000</b>'),
(169, 'admin', '2021-05-21 09:43:35 AM', '161', 0, 'Salary changed from <b></b> to <b>5000</b>'),
(170, 'admin', '2021-05-21 12:15:48 PM', '166', 0, 'Salary changed from <b>5000</b> to <b>12500</b>'),
(171, 'admin', '2021-05-21 12:15:48 PM', '166', 0, 'Salary changed from <b>5000</b> to <b>12500</b>'),
(172, 'admin', '2021-05-21 02:03:14 PM', '170', 0, 'Contract\'s date start changed from <b></b> to <b>2021-05-21 02:03:08 PM</b>'),
(173, 'admin', '2021-05-21 02:03:14 PM', '170', 0, 'Contract\'s date ends changed from <b></b> to <b> 00:00:00 </b>'),
(174, 'admin', '2021-05-21 02:03:14 PM', '170', 0, 'Salary changed from <b>500</b> to <b>500</b>'),
(175, 'admin', '2021-06-25 09:11:05 AM', '174', 0, 'Changed profile picture');

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
(3, '00006-A', 'Loan One', '250', '0', 2020, 12, 1, '2020-12-15 02:20:37 AM', 1),
(4, '00002-A', '50', '50', '0', 2021, 5, 1, '2021-05-17 09:02:32 AM', 1),
(5, '00001-A', '200', '200', '1', 2021, 5, 1, '2021-05-17 09:46:10 AM', NULL),
(6, '00002-A', '200', '200', '0', 2021, 5, 1, '2021-05-21 09:18:38 AM', 1),
(7, '00002-A', '5000', '5000', '0', 2021, 5, 1, '2021-05-21 09:36:22 AM', NULL);

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
(8, '00001-A', 'Prov 2', '100', '0', 2020, 12, 1, '2021-01-14 23:02:27 PM', NULL),
(9, '00002-A', 'TEST', '500', '0', 2021, 5, 1, '2021-05-17 07:18:09 AM', NULL),
(10, '00002-A', '100', '100', '0', 2021, 5, 1, '2021-05-17 08:57:07 AM', 1),
(11, '00002-A', '500', '500', '1', 2021, 5, 1, '2021-05-17 09:33:23 AM', NULL),
(13, '00001-A', '200', '200', '1', 2021, 5, 1, '2021-05-17 09:45:45 AM', NULL),
(14, '00002-A', '5 00', '000', '0', 2021, 5, 1, '2021-05-17 19:30:49 PM', 1),
(15, '00002-A', '200', '200', '0', 2021, 5, 3, '2021-05-21 09:16:36 AM', NULL),
(16, '00002-A', '500EWR', '500', '0', 2021, 5, 1, '2021-05-21 09:30:17 AM', NULL),
(17, '00002-A', '5000', '5000', '0', 2021, 5, 1, '2021-05-21 09:30:21 AM', NULL);

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
-- Table structure for table `previous_company`
--

CREATE TABLE `previous_company` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `CompanyContact` text DEFAULT NULL,
  `CompanyAddress` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `previous_company`
--

INSERT INTO `previous_company` (`ID`, `ApplicantID`, `CompanyName`, `CompanyContact`, `CompanyAddress`) VALUES
(1, '00006-B', 'asd', 'dgfg', 'zxcvx'),
(2, '00005-B', '', '', ''),
(3, '00004-B', 'a', 'b', 'c'),
(4, '00011-B', 'a', 'b', 'c'),
(5, '00011-A', '123', '123', '123'),
(6, '00011-A', '1', '1', '1'),
(7, '00011-A', '', '', ''),
(8, '00011-A', '', '', ''),
(9, '00011-A', '', '', ''),
(10, '00011-A', '', '', ''),
(11, '00011-A', '', '', ''),
(12, '00011-A', '', '', ''),
(13, '00011-A', '', '', ''),
(14, '00011-A', '', '', ''),
(15, '00011-A', '', '', ''),
(16, '00012-A', 'a', 'b', 'c'),
(17, '00013-A', 'a', 'b', 'c'),
(18, '00015-A', 'a', 'b', 'c'),
(19, '00014-A', 'asd', 'asd', 'asd'),
(20, '00016-A', '', '', ''),
(21, '00017-A', '', '', ''),
(22, '00016-A', '', '', ''),
(23, '00018-A', 'a', 'b', 'c'),
(24, '00019-A', 'a', 'b', 'c'),
(25, '00023-A', '', '', ''),
(26, '00024-A', '', '', ''),
(27, '00025-A', '', '', ''),
(28, '00026-A', '', '', ''),
(29, '00011-A', '', '', ''),
(30, '00001-A', '', '', '');

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
  `SSSDayFrom` varchar(255) DEFAULT NULL COMMENT 'Day of the month',
  `SSSDayTo` varchar(255) DEFAULT NULL COMMENT 'Day of the month',
  `HDMFDayFrom` varchar(255) DEFAULT NULL COMMENT 'Day of the month',
  `HDMFDayTo` varchar(255) DEFAULT NULL COMMENT 'Day of the month',
  `ClientID` varchar(255) DEFAULT NULL,
  `TimeAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`ID`, `WeekStart`, `SSSDayFrom`, `SSSDayTo`, `HDMFDayFrom`, `HDMFDayTo`, `ClientID`, `TimeAdded`) VALUES
(1, '2021-01-21', NULL, NULL, NULL, NULL, '1', '2021-01-21 05:26:57 AM'),
(2, '2021-01-27', NULL, NULL, NULL, NULL, '2', '2021-01-27 06:04:10 AM'),
(3, '2021-01-27', NULL, NULL, NULL, NULL, '3', '2021-01-27 06:04:14 AM'),
(4, '2021-01-27', NULL, NULL, NULL, NULL, '4', '2021-01-27 06:04:23 AM'),
(5, '2021-01-27', NULL, NULL, NULL, NULL, '5', '2021-01-27 06:04:27 AM'),
(6, '2021-01-27', NULL, NULL, NULL, NULL, '6', '2021-01-27 06:04:34 AM'),
(7, '2021-02-19', NULL, NULL, NULL, NULL, '1', '2021-04-10 09:04:52'),
(8, '2021-03-20', NULL, NULL, NULL, NULL, '1', '2021-04-10 09:05:02'),
(9, '2021-04-10', NULL, NULL, NULL, NULL, '1', '2021-04-10 09:11:08'),
(10, '2021-05-09', NULL, NULL, NULL, NULL, '1', '2021-05-14 08:37:51'),
(11, '2021-02-25', NULL, NULL, NULL, NULL, '2', '2021-05-17 09:21:37'),
(12, '2021-05-17', NULL, NULL, NULL, NULL, '2', '2021-05-17 09:24:02'),
(13, NULL, NULL, NULL, NULL, NULL, '1', '2021-05-21 11:23:45'),
(14, '2021-05-21', '16', '31', '1', '15', '1', '2021-05-21 11:26:10'),
(15, '2021-05-21', '1', '15', '16', '31', '1', '2021-05-21 12:37:29'),
(16, '2021-04-01', '1', '15', '16', '31', '1', '2021-05-21 14:05:08'),
(17, '2021-06-25', '1', '15', '16', '31', '1', '2021-06-25 07:51:12 AM'),
(18, '2021-06-28', NULL, NULL, NULL, NULL, '2', '2021-06-28 09:35:33 AM');

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
(1, 1, '2021-01-10 06:30:00 PM', 1),
(2, 2, '2021-05-12 06:43:41 AM', NULL),
(3, 3, '2021-05-12 06:44:07 AM', NULL),
(4, 4, '2021-05-12 06:44:16 AM', NULL),
(5, 5, '2021-05-12 06:58:02 AM', NULL),
(6, 6, '2021-05-12 06:58:11 AM', NULL),
(7, 7, '2021-05-12 10:41:26 AM', NULL),
(8, 8, '2021-05-12 10:42:17 AM', NULL),
(9, 9, '2021-05-12 11:01:49 AM', NULL),
(10, 10, '2021-05-12 11:03:28 AM', NULL),
(11, 11, '2021-05-12 11:04:51 AM', NULL),
(12, 12, '2021-05-12 11:05:09 AM', NULL),
(13, 13, '2021-05-12 11:05:13 AM', NULL),
(14, 14, '2021-05-12 11:19:22 AM', NULL);

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
  `active` tinyint(1) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sss_table`
--

INSERT INTO `sss_table` (`id`, `batch`, `f_range`, `t_range`, `contribution_er`, `contribution_ee`, `contribution_ec`, `total`, `total_with_ec`, `active`, `DateAdded`) VALUES
(1, 14, '0', '2250', '160.00', '80.00', '10.00', '240.00', '250.00', 1, NULL),
(2, 14, '2250', '2749.99', '200.00', '100.00', '10.00', '300.00', '310.00', 1, NULL),
(3, 14, '2750', '3249.99', '240.00', '120.00', '10.00', '360.00', '370.00', 1, NULL),
(4, 14, '3250', '3749.99', '280.00', '140.00', '10.00', '420.00', '430.00', 1, NULL),
(5, 14, '3750', '4249.99', '320.00', '160.00', '10.00', '480.00', '490.00', 1, NULL),
(6, 14, '4250', '4749.99', '360.00', '180.00', '10.00', '540.00', '550.00', 1, NULL),
(7, 14, '4750', '5249.99', '400.00', '200.00', '10.00', '600.00', '610.00', 1, NULL),
(8, 14, '5250', '5749.99', '440.00', '220.00', '10.00', '660.00', '670.00', 1, NULL),
(9, 14, '5750', '6249.99', '480.00', '240.00', '10.00', '720.00', '730.00', 1, NULL),
(10, 14, '6250', '6749.99', '520.00', '260.00', '10.00', '780.00', '790.00', 1, NULL),
(11, 14, '6750', '7249.99', '560.00', '280.00', '10.00', '840.00', '850.00', 1, NULL),
(12, 14, '7250', '7749.99', '600.00', '300.00', '10.00', '900.00', '910.00', 1, NULL),
(13, 14, '7750', '8249.99', '640.00', '320.00', '10.00', '960.00', '970.00', 1, NULL),
(14, 14, '8250', '8749.99', '680.00', '340.00', '10.00', '1020.00', '1030.00', 1, NULL),
(15, 14, '8750', '9249.99', '720.00', '360.00', '10.00', '1080.00', '1090.00', 1, NULL),
(16, 14, '9250', '9749.99', '760.00', '380.00', '10.00', '1140.00', '1150.00', 1, NULL),
(17, 14, '9750', '10249.99', '800.00', '400.00', '10.00', '1200.00', '1210.00', 1, NULL),
(18, 14, '10250', '10749.99', '840.00', '420.00', '10.00', '1260.00', '1270.00', 1, NULL),
(19, 14, '10750', '11249.99', '880.00', '440.00', '10.00', '1320.00', '1330.00', 1, NULL),
(20, 14, '11250', '11749.99', '920.00', '460.00', '10.00', '1380.00', '1390.00', 1, NULL),
(21, 14, '11750', '12249.99', '960.00', '480.00', '10.00', '1440.00', '1450.00', 1, NULL),
(22, 14, '12250', '12749.99', '1000.00', '500.00', '10.00', '1500.00', '1510.00', 1, NULL),
(23, 14, '12750', '13249.99', '1040.00', '520.00', '10.00', '1560.00', '1570.00', 1, NULL),
(24, 14, '13250', '13749.99', '1080.00', '540.00', '10.00', '1620.00', '1630.00', 1, NULL),
(25, 14, '13750', '14249.99', '1120.00', '560.00', '10.00', '1680.00', '1690.00', 1, NULL),
(26, 14, '14250', '14749.99', '1160.00', '580.00', '10.00', '1740.00', '1750.00', 1, NULL),
(27, 14, '14750', '15249.99', '1200.00', '600.00', '30.00', '1800.00', '1810.00', 1, NULL),
(28, 14, '15250', '15749.99', '1240.00', '620.00', '30.00', '1860.00', '1870.00', 1, NULL),
(29, 14, '15750', '16249.99', '1280.00', '640.00', '30.00', '1920.00', '1930.00', 1, NULL),
(30, 14, '16250', '16749.99', '1320.00', '660.00', '30.00', '1980.00', '1990.00', 1, NULL),
(31, 14, '16750', '17249.99', '1360.00', '680.00', '30.00', '2040.00', '2050.00', 1, NULL),
(32, 14, '17250', '17749.99', '1400.00', '700.00', '30.00', '2100.00', '2110.00', 1, NULL),
(33, 14, '17750', '18249.99', '1440.00', '720.00', '30.00', '2160.00', '2170.00', 1, NULL),
(34, 14, '18250', '18749.99', '1480.00', '740.00', '30.00', '2220.00', '2230.00', 1, NULL),
(35, 14, '18750', '19249.99', '1520.00', '760.00', '30.00', '2280.00', '2290.00', 1, NULL),
(36, 14, '19250', '19749.99', '1560.00', '780.00', '30.00', '2340.00', '2350.00', 1, NULL),
(37, 14, '19750', '9999999.99', '1600.00', '800.00', '30.00', '2400.00', '2410.00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sss_table_history`
--

CREATE TABLE `sss_table_history` (
  `id` int(11) NOT NULL,
  `batch` int(11) DEFAULT NULL,
  `f_range` varchar(255) DEFAULT NULL,
  `t_range` varchar(255) DEFAULT NULL,
  `contribution_er` decimal(10,2) DEFAULT NULL,
  `contribution_ee` decimal(10,2) DEFAULT NULL,
  `contribution_ec` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `total_with_ec` decimal(10,2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `DateAdded` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sss_table_history`
--

INSERT INTO `sss_table_history` (`id`, `batch`, `f_range`, `t_range`, `contribution_er`, `contribution_ee`, `contribution_ec`, `total`, `total_with_ec`, `active`, `DateAdded`) VALUES
(1, 4, '0', '2250', '160.00', '80.00', '10.00', '240.00', '250.00', NULL, '2021-05-12 06:58:01 AM'),
(2, 4, '2250', '2749.99', '200.00', '100.00', '10.00', '300.00', '310.00', NULL, '2021-05-12 06:58:01 AM'),
(3, 4, '2750', '3249.99', '240.00', '120.00', '10.00', '360.00', '370.00', NULL, '2021-05-12 06:58:01 AM'),
(4, 4, '3250', '3749.99', '280.00', '140.00', '10.00', '420.00', '430.00', NULL, '2021-05-12 06:58:01 AM'),
(5, 4, '3750', '4249.99', '320.00', '160.00', '10.00', '480.00', '490.00', NULL, '2021-05-12 06:58:01 AM'),
(6, 4, '4250', '4749.99', '360.00', '180.00', '10.00', '540.00', '550.00', NULL, '2021-05-12 06:58:01 AM'),
(7, 4, '4750', '5249.99', '400.00', '200.00', '10.00', '600.00', '610.00', NULL, '2021-05-12 06:58:01 AM'),
(8, 4, '5250', '5749.99', '440.00', '220.00', '10.00', '660.00', '670.00', NULL, '2021-05-12 06:58:01 AM'),
(9, 4, '5750', '6249.99', '480.00', '240.00', '10.00', '720.00', '730.00', NULL, '2021-05-12 06:58:01 AM'),
(10, 4, '6250', '6749.99', '520.00', '260.00', '10.00', '780.00', '790.00', NULL, '2021-05-12 06:58:01 AM'),
(11, 4, '6750', '7249.99', '560.00', '280.00', '10.00', '840.00', '850.00', NULL, '2021-05-12 06:58:01 AM'),
(12, 4, '7250', '7749.99', '600.00', '300.00', '10.00', '900.00', '910.00', NULL, '2021-05-12 06:58:01 AM'),
(13, 4, '7750', '8249.99', '640.00', '320.00', '10.00', '960.00', '970.00', NULL, '2021-05-12 06:58:01 AM'),
(14, 4, '8250', '8749.99', '680.00', '340.00', '10.00', '1020.00', '1030.00', NULL, '2021-05-12 06:58:01 AM'),
(15, 4, '8750', '9249.99', '720.00', '360.00', '10.00', '1080.00', '1090.00', NULL, '2021-05-12 06:58:01 AM'),
(16, 4, '9250', '9749.99', '760.00', '380.00', '10.00', '1140.00', '1150.00', NULL, '2021-05-12 06:58:01 AM'),
(17, 4, '9750', '10249.99', '800.00', '400.00', '10.00', '1200.00', '1210.00', NULL, '2021-05-12 06:58:01 AM'),
(18, 4, '10250', '10749.99', '840.00', '420.00', '10.00', '1260.00', '1270.00', NULL, '2021-05-12 06:58:01 AM'),
(19, 4, '10750', '11249.99', '880.00', '440.00', '10.00', '1320.00', '1330.00', NULL, '2021-05-12 06:58:01 AM'),
(20, 4, '11250', '11749.99', '920.00', '460.00', '10.00', '1380.00', '1390.00', NULL, '2021-05-12 06:58:02 AM'),
(21, 4, '11750', '12249.99', '960.00', '480.00', '10.00', '1440.00', '1450.00', NULL, '2021-05-12 06:58:02 AM'),
(22, 4, '12250', '12749.99', '1000.00', '500.00', '10.00', '1500.00', '1510.00', NULL, '2021-05-12 06:58:02 AM'),
(23, 4, '12750', '13249.99', '1040.00', '520.00', '10.00', '1560.00', '1570.00', NULL, '2021-05-12 06:58:02 AM'),
(24, 4, '13250', '13749.99', '1080.00', '540.00', '10.00', '1620.00', '1630.00', NULL, '2021-05-12 06:58:02 AM'),
(25, 4, '13750', '14249.99', '1120.00', '560.00', '10.00', '1680.00', '1690.00', NULL, '2021-05-12 06:58:02 AM'),
(26, 4, '14250', '14749.99', '1160.00', '580.00', '10.00', '1740.00', '1750.00', NULL, '2021-05-12 06:58:02 AM'),
(27, 4, '14750', '15249.99', '1200.00', '600.00', '30.00', '1800.00', '1810.00', NULL, '2021-05-12 06:58:02 AM'),
(28, 4, '15250', '15749.99', '1240.00', '620.00', '30.00', '1860.00', '1870.00', NULL, '2021-05-12 06:58:02 AM'),
(29, 4, '15750', '16249.99', '1280.00', '640.00', '30.00', '1920.00', '1930.00', NULL, '2021-05-12 06:58:02 AM'),
(30, 4, '16250', '16749.99', '1320.00', '660.00', '30.00', '1980.00', '1990.00', NULL, '2021-05-12 06:58:02 AM'),
(31, 4, '16750', '17249.99', '1360.00', '680.00', '30.00', '2040.00', '2050.00', NULL, '2021-05-12 06:58:02 AM'),
(32, 4, '17250', '17749.99', '1400.00', '700.00', '30.00', '2100.00', '2110.00', NULL, '2021-05-12 06:58:02 AM'),
(33, 4, '17750', '18249.99', '1440.00', '720.00', '30.00', '2160.00', '2170.00', NULL, '2021-05-12 06:58:02 AM'),
(34, 4, '18250', '18749.99', '1480.00', '740.00', '30.00', '2220.00', '2230.00', NULL, '2021-05-12 06:58:02 AM'),
(35, 4, '18750', '19249.99', '1520.00', '760.00', '30.00', '2280.00', '2290.00', NULL, '2021-05-12 06:58:02 AM'),
(36, 4, '19250', '19749.99', '1560.00', '780.00', '30.00', '2340.00', '2350.00', NULL, '2021-05-12 06:58:02 AM'),
(37, 4, '19750', '9999999.99', '1600.00', '800.00', '30.00', '2400.00', '2410.00', NULL, '2021-05-12 06:58:02 AM'),
(38, 5, '0', '2250', '160.00', '80.00', '10.00', '240.00', '250.00', NULL, '2021-05-12 06:58:10 AM'),
(39, 5, '2250', '2749.99', '200.00', '100.00', '10.00', '300.00', '310.00', NULL, '2021-05-12 06:58:10 AM'),
(40, 5, '2750', '3249.99', '240.00', '120.00', '10.00', '360.00', '370.00', NULL, '2021-05-12 06:58:10 AM'),
(41, 5, '3250', '3749.99', '280.00', '140.00', '10.00', '420.00', '430.00', NULL, '2021-05-12 06:58:10 AM'),
(42, 5, '3750', '4249.99', '320.00', '160.00', '10.00', '480.00', '490.00', NULL, '2021-05-12 06:58:10 AM'),
(43, 5, '4250', '4749.99', '360.00', '180.00', '10.00', '540.00', '550.00', NULL, '2021-05-12 06:58:10 AM'),
(44, 5, '4750', '5249.99', '400.00', '200.00', '10.00', '600.00', '610.00', NULL, '2021-05-12 06:58:10 AM'),
(45, 5, '5250', '5749.99', '440.00', '220.00', '10.00', '660.00', '670.00', NULL, '2021-05-12 06:58:10 AM'),
(46, 5, '5750', '6249.99', '480.00', '240.00', '10.00', '720.00', '730.00', NULL, '2021-05-12 06:58:10 AM'),
(47, 5, '6250', '6749.99', '520.00', '260.00', '10.00', '780.00', '790.00', NULL, '2021-05-12 06:58:10 AM'),
(48, 5, '6750', '7249.99', '560.00', '280.00', '10.00', '840.00', '850.00', NULL, '2021-05-12 06:58:10 AM'),
(49, 5, '7250', '7749.99', '600.00', '300.00', '10.00', '900.00', '910.00', NULL, '2021-05-12 06:58:10 AM'),
(50, 5, '7750', '8249.99', '640.00', '320.00', '10.00', '960.00', '970.00', NULL, '2021-05-12 06:58:10 AM'),
(51, 5, '8250', '8749.99', '680.00', '340.00', '10.00', '1020.00', '1030.00', NULL, '2021-05-12 06:58:10 AM'),
(52, 5, '8750', '9249.99', '720.00', '360.00', '10.00', '1080.00', '1090.00', NULL, '2021-05-12 06:58:10 AM'),
(53, 5, '9250', '9749.99', '760.00', '380.00', '10.00', '1140.00', '1150.00', NULL, '2021-05-12 06:58:10 AM'),
(54, 5, '9750', '10249.99', '800.00', '400.00', '10.00', '1200.00', '1210.00', NULL, '2021-05-12 06:58:10 AM'),
(55, 5, '10250', '10749.99', '840.00', '420.00', '10.00', '1260.00', '1270.00', NULL, '2021-05-12 06:58:10 AM'),
(56, 5, '10750', '11249.99', '880.00', '440.00', '10.00', '1320.00', '1330.00', NULL, '2021-05-12 06:58:10 AM'),
(57, 5, '11250', '11749.99', '920.00', '460.00', '10.00', '1380.00', '1390.00', NULL, '2021-05-12 06:58:10 AM'),
(58, 5, '11750', '12249.99', '960.00', '480.00', '10.00', '1440.00', '1450.00', NULL, '2021-05-12 06:58:10 AM'),
(59, 5, '12250', '12749.99', '1000.00', '500.00', '10.00', '1500.00', '1510.00', NULL, '2021-05-12 06:58:11 AM'),
(60, 5, '12750', '13249.99', '1040.00', '520.00', '10.00', '1560.00', '1570.00', NULL, '2021-05-12 06:58:11 AM'),
(61, 5, '13250', '13749.99', '1080.00', '540.00', '10.00', '1620.00', '1630.00', NULL, '2021-05-12 06:58:11 AM'),
(62, 5, '13750', '14249.99', '1120.00', '560.00', '10.00', '1680.00', '1690.00', NULL, '2021-05-12 06:58:11 AM'),
(63, 5, '14250', '14749.99', '1160.00', '580.00', '10.00', '1740.00', '1750.00', NULL, '2021-05-12 06:58:11 AM'),
(64, 5, '14750', '15249.99', '1200.00', '600.00', '30.00', '1800.00', '1810.00', NULL, '2021-05-12 06:58:11 AM'),
(65, 5, '15250', '15749.99', '1240.00', '620.00', '30.00', '1860.00', '1870.00', NULL, '2021-05-12 06:58:11 AM'),
(66, 5, '15750', '16249.99', '1280.00', '640.00', '30.00', '1920.00', '1930.00', NULL, '2021-05-12 06:58:11 AM'),
(67, 5, '16250', '16749.99', '1320.00', '660.00', '30.00', '1980.00', '1990.00', NULL, '2021-05-12 06:58:11 AM'),
(68, 5, '16750', '17249.99', '1360.00', '680.00', '30.00', '2040.00', '2050.00', NULL, '2021-05-12 06:58:11 AM'),
(69, 5, '17250', '17749.99', '1400.00', '700.00', '30.00', '2100.00', '2110.00', NULL, '2021-05-12 06:58:11 AM'),
(70, 5, '17750', '18249.99', '1440.00', '720.00', '30.00', '2160.00', '2170.00', NULL, '2021-05-12 06:58:11 AM'),
(71, 5, '18250', '18749.99', '1480.00', '740.00', '30.00', '2220.00', '2230.00', NULL, '2021-05-12 06:58:11 AM'),
(72, 5, '18750', '19249.99', '1520.00', '760.00', '30.00', '2280.00', '2290.00', NULL, '2021-05-12 06:58:11 AM'),
(73, 5, '19250', '19749.99', '1560.00', '780.00', '30.00', '2340.00', '2350.00', NULL, '2021-05-12 06:58:11 AM'),
(74, 5, '19750', '9999999.99', '1600.00', '800.00', '30.00', '2400.00', '2410.00', NULL, '2021-05-12 06:58:11 AM'),
(75, 7, '0', '2250', '160.00', '80.00', '10.00', '240.00', '250.00', NULL, '2021-05-12 11:04:50 AM'),
(76, 7, '2250', '2749.99', '200.00', '100.00', '10.00', '300.00', '310.00', NULL, '2021-05-12 11:04:50 AM'),
(77, 7, '2750', '3249.99', '240.00', '120.00', '10.00', '360.00', '370.00', NULL, '2021-05-12 11:04:50 AM'),
(78, 7, '3250', '3749.99', '280.00', '140.00', '10.00', '420.00', '430.00', NULL, '2021-05-12 11:04:50 AM'),
(79, 7, '3750', '4249.99', '320.00', '160.00', '10.00', '480.00', '490.00', NULL, '2021-05-12 11:04:50 AM'),
(80, 7, '4250', '4749.99', '360.00', '180.00', '10.00', '540.00', '550.00', NULL, '2021-05-12 11:04:50 AM'),
(81, 7, '4750', '5249.99', '400.00', '200.00', '10.00', '600.00', '610.00', NULL, '2021-05-12 11:04:50 AM'),
(82, 7, '5250', '5749.99', '440.00', '220.00', '10.00', '660.00', '670.00', NULL, '2021-05-12 11:04:50 AM'),
(83, 7, '5750', '6249.99', '480.00', '240.00', '10.00', '720.00', '730.00', NULL, '2021-05-12 11:04:50 AM'),
(84, 7, '6250', '6749.99', '520.00', '260.00', '10.00', '780.00', '790.00', NULL, '2021-05-12 11:04:50 AM'),
(85, 7, '6750', '7249.99', '560.00', '280.00', '10.00', '840.00', '850.00', NULL, '2021-05-12 11:04:50 AM'),
(86, 7, '7250', '7749.99', '600.00', '300.00', '10.00', '900.00', '910.00', NULL, '2021-05-12 11:04:50 AM'),
(87, 7, '7750', '8249.99', '640.00', '320.00', '10.00', '960.00', '970.00', NULL, '2021-05-12 11:04:50 AM'),
(88, 7, '8250', '8749.99', '680.00', '340.00', '10.00', '1020.00', '1030.00', NULL, '2021-05-12 11:04:50 AM'),
(89, 7, '8750', '9249.99', '720.00', '360.00', '10.00', '1080.00', '1090.00', NULL, '2021-05-12 11:04:50 AM'),
(90, 7, '9250', '9749.99', '760.00', '380.00', '10.00', '1140.00', '1150.00', NULL, '2021-05-12 11:04:50 AM'),
(91, 7, '9750', '10249.99', '800.00', '400.00', '10.00', '1200.00', '1210.00', NULL, '2021-05-12 11:04:50 AM'),
(92, 7, '10250', '10749.99', '840.00', '420.00', '10.00', '1260.00', '1270.00', NULL, '2021-05-12 11:04:50 AM'),
(93, 7, '10750', '11249.99', '880.00', '440.00', '10.00', '1320.00', '1330.00', NULL, '2021-05-12 11:04:50 AM'),
(94, 7, '11250', '11749.99', '920.00', '460.00', '10.00', '1380.00', '1390.00', NULL, '2021-05-12 11:04:50 AM'),
(95, 7, '11750', '12249.99', '960.00', '480.00', '10.00', '1440.00', '1450.00', NULL, '2021-05-12 11:04:50 AM'),
(96, 7, '12250', '12749.99', '1000.00', '500.00', '10.00', '1500.00', '1510.00', NULL, '2021-05-12 11:04:50 AM'),
(97, 7, '12750', '13249.99', '1040.00', '520.00', '10.00', '1560.00', '1570.00', NULL, '2021-05-12 11:04:50 AM'),
(98, 7, '13250', '13749.99', '1080.00', '540.00', '10.00', '1620.00', '1630.00', NULL, '2021-05-12 11:04:50 AM'),
(99, 7, '13750', '14249.99', '1120.00', '560.00', '10.00', '1680.00', '1690.00', NULL, '2021-05-12 11:04:50 AM'),
(100, 7, '14250', '14749.99', '1160.00', '580.00', '10.00', '1740.00', '1750.00', NULL, '2021-05-12 11:04:50 AM'),
(101, 7, '14750', '15249.99', '1200.00', '600.00', '30.00', '1800.00', '1810.00', NULL, '2021-05-12 11:04:50 AM'),
(102, 7, '15250', '15749.99', '1240.00', '620.00', '30.00', '1860.00', '1870.00', NULL, '2021-05-12 11:04:50 AM'),
(103, 7, '15750', '16249.99', '1280.00', '640.00', '30.00', '1920.00', '1930.00', NULL, '2021-05-12 11:04:50 AM'),
(104, 7, '16250', '16749.99', '1320.00', '660.00', '30.00', '1980.00', '1990.00', NULL, '2021-05-12 11:04:50 AM'),
(105, 7, '16750', '17249.99', '1360.00', '680.00', '30.00', '2040.00', '2050.00', NULL, '2021-05-12 11:04:50 AM'),
(106, 7, '17250', '17749.99', '1400.00', '700.00', '30.00', '2100.00', '2110.00', NULL, '2021-05-12 11:04:51 AM'),
(107, 7, '17750', '18249.99', '1440.00', '720.00', '30.00', '2160.00', '2170.00', NULL, '2021-05-12 11:04:51 AM'),
(108, 7, '18250', '18749.99', '1480.00', '740.00', '30.00', '2220.00', '2230.00', NULL, '2021-05-12 11:04:51 AM'),
(109, 7, '18750', '19249.99', '1520.00', '760.00', '30.00', '2280.00', '2290.00', NULL, '2021-05-12 11:04:51 AM'),
(110, 7, '19250', '19749.99', '1560.00', '780.00', '30.00', '2340.00', '2350.00', NULL, '2021-05-12 11:04:51 AM'),
(111, 7, '19750', '9999999.99', '1600.00', '800.00', '30.00', '2400.00', '2410.00', NULL, '2021-05-12 11:04:51 AM'),
(112, 7, '0', '2250', '160.00', '80.00', '10.00', '240.00', '250.00', NULL, '2021-05-12 11:05:08 AM'),
(113, 7, '2250', '2749.99', '200.00', '100.00', '10.00', '300.00', '310.00', NULL, '2021-05-12 11:05:08 AM'),
(114, 7, '2750', '3249.99', '240.00', '120.00', '10.00', '360.00', '370.00', NULL, '2021-05-12 11:05:08 AM'),
(115, 7, '3250', '3749.99', '280.00', '140.00', '10.00', '420.00', '430.00', NULL, '2021-05-12 11:05:08 AM'),
(116, 7, '3750', '4249.99', '320.00', '160.00', '10.00', '480.00', '490.00', NULL, '2021-05-12 11:05:08 AM'),
(117, 7, '4250', '4749.99', '360.00', '180.00', '10.00', '540.00', '550.00', NULL, '2021-05-12 11:05:08 AM'),
(118, 7, '4750', '5249.99', '400.00', '200.00', '10.00', '600.00', '610.00', NULL, '2021-05-12 11:05:08 AM'),
(119, 7, '5250', '5749.99', '440.00', '220.00', '10.00', '660.00', '670.00', NULL, '2021-05-12 11:05:08 AM'),
(120, 7, '5750', '6249.99', '480.00', '240.00', '10.00', '720.00', '730.00', NULL, '2021-05-12 11:05:08 AM'),
(121, 7, '6250', '6749.99', '520.00', '260.00', '10.00', '780.00', '790.00', NULL, '2021-05-12 11:05:08 AM'),
(122, 7, '6750', '7249.99', '560.00', '280.00', '10.00', '840.00', '850.00', NULL, '2021-05-12 11:05:08 AM'),
(123, 7, '7250', '7749.99', '600.00', '300.00', '10.00', '900.00', '910.00', NULL, '2021-05-12 11:05:08 AM'),
(124, 7, '7750', '8249.99', '640.00', '320.00', '10.00', '960.00', '970.00', NULL, '2021-05-12 11:05:08 AM'),
(125, 7, '8250', '8749.99', '680.00', '340.00', '10.00', '1020.00', '1030.00', NULL, '2021-05-12 11:05:08 AM'),
(126, 7, '8750', '9249.99', '720.00', '360.00', '10.00', '1080.00', '1090.00', NULL, '2021-05-12 11:05:08 AM'),
(127, 7, '9250', '9749.99', '760.00', '380.00', '10.00', '1140.00', '1150.00', NULL, '2021-05-12 11:05:08 AM'),
(128, 7, '9750', '10249.99', '800.00', '400.00', '10.00', '1200.00', '1210.00', NULL, '2021-05-12 11:05:08 AM'),
(129, 7, '10250', '10749.99', '840.00', '420.00', '10.00', '1260.00', '1270.00', NULL, '2021-05-12 11:05:08 AM'),
(130, 7, '10750', '11249.99', '880.00', '440.00', '10.00', '1320.00', '1330.00', NULL, '2021-05-12 11:05:08 AM'),
(131, 7, '11250', '11749.99', '920.00', '460.00', '10.00', '1380.00', '1390.00', NULL, '2021-05-12 11:05:08 AM'),
(132, 7, '11750', '12249.99', '960.00', '480.00', '10.00', '1440.00', '1450.00', NULL, '2021-05-12 11:05:08 AM'),
(133, 7, '12250', '12749.99', '1000.00', '500.00', '10.00', '1500.00', '1510.00', NULL, '2021-05-12 11:05:09 AM'),
(134, 7, '12750', '13249.99', '1040.00', '520.00', '10.00', '1560.00', '1570.00', NULL, '2021-05-12 11:05:09 AM'),
(135, 7, '13250', '13749.99', '1080.00', '540.00', '10.00', '1620.00', '1630.00', NULL, '2021-05-12 11:05:09 AM'),
(136, 7, '13750', '14249.99', '1120.00', '560.00', '10.00', '1680.00', '1690.00', NULL, '2021-05-12 11:05:09 AM'),
(137, 7, '14250', '14749.99', '1160.00', '580.00', '10.00', '1740.00', '1750.00', NULL, '2021-05-12 11:05:09 AM'),
(138, 7, '14750', '15249.99', '1200.00', '600.00', '30.00', '1800.00', '1810.00', NULL, '2021-05-12 11:05:09 AM'),
(139, 7, '15250', '15749.99', '1240.00', '620.00', '30.00', '1860.00', '1870.00', NULL, '2021-05-12 11:05:09 AM'),
(140, 7, '15750', '16249.99', '1280.00', '640.00', '30.00', '1920.00', '1930.00', NULL, '2021-05-12 11:05:09 AM'),
(141, 7, '16250', '16749.99', '1320.00', '660.00', '30.00', '1980.00', '1990.00', NULL, '2021-05-12 11:05:09 AM'),
(142, 7, '16750', '17249.99', '1360.00', '680.00', '30.00', '2040.00', '2050.00', NULL, '2021-05-12 11:05:09 AM'),
(143, 7, '17250', '17749.99', '1400.00', '700.00', '30.00', '2100.00', '2110.00', NULL, '2021-05-12 11:05:09 AM'),
(144, 7, '17750', '18249.99', '1440.00', '720.00', '30.00', '2160.00', '2170.00', NULL, '2021-05-12 11:05:09 AM'),
(145, 7, '18250', '18749.99', '1480.00', '740.00', '30.00', '2220.00', '2230.00', NULL, '2021-05-12 11:05:09 AM'),
(146, 7, '18750', '19249.99', '1520.00', '760.00', '30.00', '2280.00', '2290.00', NULL, '2021-05-12 11:05:09 AM'),
(147, 7, '19250', '19749.99', '1560.00', '780.00', '30.00', '2340.00', '2350.00', NULL, '2021-05-12 11:05:09 AM'),
(148, 7, '19750', '9999999.99', '1600.00', '800.00', '30.00', '2400.00', '2410.00', NULL, '2021-05-12 11:05:09 AM'),
(149, 12, '0', '2250', '160.00', '80.00', '10.00', '240.00', '250.00', NULL, '2021-05-12 11:05:12 AM'),
(150, 12, '2250', '2749.99', '200.00', '100.00', '10.00', '300.00', '310.00', NULL, '2021-05-12 11:05:12 AM'),
(151, 12, '2750', '3249.99', '240.00', '120.00', '10.00', '360.00', '370.00', NULL, '2021-05-12 11:05:12 AM'),
(152, 12, '3250', '3749.99', '280.00', '140.00', '10.00', '420.00', '430.00', NULL, '2021-05-12 11:05:12 AM'),
(153, 12, '3750', '4249.99', '320.00', '160.00', '10.00', '480.00', '490.00', NULL, '2021-05-12 11:05:12 AM'),
(154, 12, '4250', '4749.99', '360.00', '180.00', '10.00', '540.00', '550.00', NULL, '2021-05-12 11:05:12 AM'),
(155, 12, '4750', '5249.99', '400.00', '200.00', '10.00', '600.00', '610.00', NULL, '2021-05-12 11:05:12 AM'),
(156, 12, '5250', '5749.99', '440.00', '220.00', '10.00', '660.00', '670.00', NULL, '2021-05-12 11:05:12 AM'),
(157, 12, '5750', '6249.99', '480.00', '240.00', '10.00', '720.00', '730.00', NULL, '2021-05-12 11:05:12 AM'),
(158, 12, '6250', '6749.99', '520.00', '260.00', '10.00', '780.00', '790.00', NULL, '2021-05-12 11:05:12 AM'),
(159, 12, '6750', '7249.99', '560.00', '280.00', '10.00', '840.00', '850.00', NULL, '2021-05-12 11:05:12 AM'),
(160, 12, '7250', '7749.99', '600.00', '300.00', '10.00', '900.00', '910.00', NULL, '2021-05-12 11:05:12 AM'),
(161, 12, '7750', '8249.99', '640.00', '320.00', '10.00', '960.00', '970.00', NULL, '2021-05-12 11:05:12 AM'),
(162, 12, '8250', '8749.99', '680.00', '340.00', '10.00', '1020.00', '1030.00', NULL, '2021-05-12 11:05:12 AM'),
(163, 12, '8750', '9249.99', '720.00', '360.00', '10.00', '1080.00', '1090.00', NULL, '2021-05-12 11:05:12 AM'),
(164, 12, '9250', '9749.99', '760.00', '380.00', '10.00', '1140.00', '1150.00', NULL, '2021-05-12 11:05:12 AM'),
(165, 12, '9750', '10249.99', '800.00', '400.00', '10.00', '1200.00', '1210.00', NULL, '2021-05-12 11:05:13 AM'),
(166, 12, '10250', '10749.99', '840.00', '420.00', '10.00', '1260.00', '1270.00', NULL, '2021-05-12 11:05:13 AM'),
(167, 12, '10750', '11249.99', '880.00', '440.00', '10.00', '1320.00', '1330.00', NULL, '2021-05-12 11:05:13 AM'),
(168, 12, '11250', '11749.99', '920.00', '460.00', '10.00', '1380.00', '1390.00', NULL, '2021-05-12 11:05:13 AM'),
(169, 12, '11750', '12249.99', '960.00', '480.00', '10.00', '1440.00', '1450.00', NULL, '2021-05-12 11:05:13 AM'),
(170, 12, '12250', '12749.99', '1000.00', '500.00', '10.00', '1500.00', '1510.00', NULL, '2021-05-12 11:05:13 AM'),
(171, 12, '12750', '13249.99', '1040.00', '520.00', '10.00', '1560.00', '1570.00', NULL, '2021-05-12 11:05:13 AM'),
(172, 12, '13250', '13749.99', '1080.00', '540.00', '10.00', '1620.00', '1630.00', NULL, '2021-05-12 11:05:13 AM'),
(173, 12, '13750', '14249.99', '1120.00', '560.00', '10.00', '1680.00', '1690.00', NULL, '2021-05-12 11:05:13 AM'),
(174, 12, '14250', '14749.99', '1160.00', '580.00', '10.00', '1740.00', '1750.00', NULL, '2021-05-12 11:05:13 AM'),
(175, 12, '14750', '15249.99', '1200.00', '600.00', '30.00', '1800.00', '1810.00', NULL, '2021-05-12 11:05:13 AM'),
(176, 12, '15250', '15749.99', '1240.00', '620.00', '30.00', '1860.00', '1870.00', NULL, '2021-05-12 11:05:13 AM'),
(177, 12, '15750', '16249.99', '1280.00', '640.00', '30.00', '1920.00', '1930.00', NULL, '2021-05-12 11:05:13 AM'),
(178, 12, '16250', '16749.99', '1320.00', '660.00', '30.00', '1980.00', '1990.00', NULL, '2021-05-12 11:05:13 AM'),
(179, 12, '16750', '17249.99', '1360.00', '680.00', '30.00', '2040.00', '2050.00', NULL, '2021-05-12 11:05:13 AM'),
(180, 12, '17250', '17749.99', '1400.00', '700.00', '30.00', '2100.00', '2110.00', NULL, '2021-05-12 11:05:13 AM'),
(181, 12, '17750', '18249.99', '1440.00', '720.00', '30.00', '2160.00', '2170.00', NULL, '2021-05-12 11:05:13 AM'),
(182, 12, '18250', '18749.99', '1480.00', '740.00', '30.00', '2220.00', '2230.00', NULL, '2021-05-12 11:05:13 AM'),
(183, 12, '18750', '19249.99', '1520.00', '760.00', '30.00', '2280.00', '2290.00', NULL, '2021-05-12 11:05:13 AM'),
(184, 12, '19250', '19749.99', '1560.00', '780.00', '30.00', '2340.00', '2350.00', NULL, '2021-05-12 11:05:13 AM'),
(185, 12, '19750', '9999999.99', '1600.00', '800.00', '30.00', '2400.00', '2410.00', NULL, '2021-05-12 11:05:13 AM'),
(186, 13, '0', '2250', '160.00', '80.00', '10.00', '240.00', '250.00', NULL, '2021-05-12 11:19:20 AM'),
(187, 13, '2250', '2749.99', '200.00', '100.00', '10.00', '300.00', '310.00', NULL, '2021-05-12 11:19:20 AM'),
(188, 13, '2750', '3249.99', '240.00', '120.00', '10.00', '360.00', '370.00', NULL, '2021-05-12 11:19:21 AM'),
(189, 13, '3250', '3749.99', '280.00', '140.00', '10.00', '420.00', '430.00', NULL, '2021-05-12 11:19:21 AM'),
(190, 13, '3750', '4249.99', '320.00', '160.00', '10.00', '480.00', '490.00', NULL, '2021-05-12 11:19:21 AM'),
(191, 13, '4250', '4749.99', '360.00', '180.00', '10.00', '540.00', '550.00', NULL, '2021-05-12 11:19:21 AM'),
(192, 13, '4750', '5249.99', '400.00', '200.00', '10.00', '600.00', '610.00', NULL, '2021-05-12 11:19:21 AM'),
(193, 13, '5250', '5749.99', '440.00', '220.00', '10.00', '660.00', '670.00', NULL, '2021-05-12 11:19:21 AM'),
(194, 13, '5750', '6249.99', '480.00', '240.00', '10.00', '720.00', '730.00', NULL, '2021-05-12 11:19:21 AM'),
(195, 13, '6250', '6749.99', '520.00', '260.00', '10.00', '780.00', '790.00', NULL, '2021-05-12 11:19:21 AM'),
(196, 13, '6750', '7249.99', '560.00', '280.00', '10.00', '840.00', '850.00', NULL, '2021-05-12 11:19:21 AM'),
(197, 13, '7250', '7749.99', '600.00', '300.00', '10.00', '900.00', '910.00', NULL, '2021-05-12 11:19:21 AM'),
(198, 13, '7750', '8249.99', '640.00', '320.00', '10.00', '960.00', '970.00', NULL, '2021-05-12 11:19:21 AM'),
(199, 13, '8250', '8749.99', '680.00', '340.00', '10.00', '1020.00', '1030.00', NULL, '2021-05-12 11:19:21 AM'),
(200, 13, '8750', '9249.99', '720.00', '360.00', '10.00', '1080.00', '1090.00', NULL, '2021-05-12 11:19:21 AM'),
(201, 13, '9250', '9749.99', '760.00', '380.00', '10.00', '1140.00', '1150.00', NULL, '2021-05-12 11:19:21 AM'),
(202, 13, '9750', '10249.99', '800.00', '400.00', '10.00', '1200.00', '1210.00', NULL, '2021-05-12 11:19:21 AM'),
(203, 13, '10250', '10749.99', '840.00', '420.00', '10.00', '1260.00', '1270.00', NULL, '2021-05-12 11:19:21 AM'),
(204, 13, '10750', '11249.99', '880.00', '440.00', '10.00', '1320.00', '1330.00', NULL, '2021-05-12 11:19:21 AM'),
(205, 13, '11250', '11749.99', '920.00', '460.00', '10.00', '1380.00', '1390.00', NULL, '2021-05-12 11:19:21 AM'),
(206, 13, '11750', '12249.99', '960.00', '480.00', '10.00', '1440.00', '1450.00', NULL, '2021-05-12 11:19:21 AM'),
(207, 13, '12250', '12749.99', '1000.00', '500.00', '10.00', '1500.00', '1510.00', NULL, '2021-05-12 11:19:21 AM'),
(208, 13, '12750', '13249.99', '1040.00', '520.00', '10.00', '1560.00', '1570.00', NULL, '2021-05-12 11:19:21 AM'),
(209, 13, '13250', '13749.99', '1080.00', '540.00', '10.00', '1620.00', '1630.00', NULL, '2021-05-12 11:19:21 AM'),
(210, 13, '13750', '14249.99', '1120.00', '560.00', '10.00', '1680.00', '1690.00', NULL, '2021-05-12 11:19:21 AM'),
(211, 13, '14250', '14749.99', '1160.00', '580.00', '10.00', '1740.00', '1750.00', NULL, '2021-05-12 11:19:21 AM'),
(212, 13, '14750', '15249.99', '1200.00', '600.00', '30.00', '1800.00', '1810.00', NULL, '2021-05-12 11:19:21 AM'),
(213, 13, '15250', '15749.99', '1240.00', '620.00', '30.00', '1860.00', '1870.00', NULL, '2021-05-12 11:19:21 AM'),
(214, 13, '15750', '16249.99', '1280.00', '640.00', '30.00', '1920.00', '1930.00', NULL, '2021-05-12 11:19:21 AM'),
(215, 13, '16250', '16749.99', '1320.00', '660.00', '30.00', '1980.00', '1990.00', NULL, '2021-05-12 11:19:21 AM'),
(216, 13, '16750', '17249.99', '1360.00', '680.00', '30.00', '2040.00', '2050.00', NULL, '2021-05-12 11:19:21 AM'),
(217, 13, '17250', '17749.99', '1400.00', '700.00', '30.00', '2100.00', '2110.00', NULL, '2021-05-12 11:19:21 AM'),
(218, 13, '17750', '18249.99', '1440.00', '720.00', '30.00', '2160.00', '2170.00', NULL, '2021-05-12 11:19:22 AM'),
(219, 13, '18250', '18749.99', '1480.00', '740.00', '30.00', '2220.00', '2230.00', NULL, '2021-05-12 11:19:22 AM'),
(220, 13, '18750', '19249.99', '1520.00', '760.00', '30.00', '2280.00', '2290.00', NULL, '2021-05-12 11:19:22 AM'),
(221, 13, '19250', '19749.99', '1560.00', '780.00', '30.00', '2340.00', '2350.00', NULL, '2021-05-12 11:19:22 AM'),
(222, 13, '19750', '9999999.99', '1600.00', '800.00', '30.00', '2400.00', '2410.00', NULL, '2021-05-12 11:19:22 AM');

-- --------------------------------------------------------

--
-- Table structure for table `sss_tobepaid`
--

CREATE TABLE `sss_tobepaid` (
  `ID` int(11) NOT NULL,
  `ApplicantID` varchar(255) DEFAULT NULL,
  `ClientID` varchar(255) DEFAULT NULL,
  `Month` int(2) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
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
(0, '00026-A', '1', 5, 2021, 0, NULL, NULL, NULL, '20', NULL, NULL, NULL, NULL, NULL, '2021-05-25 11:39:13');

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
(34, '00007-A', '1', '0.15', '22', '2', '80.00', NULL, NULL, NULL, NULL, '-380.08', NULL, NULL),
(35, '00009-A', '1', '0', '10', '0', '0.00', NULL, NULL, NULL, NULL, '-450', NULL, NULL),
(36, '00002-A', '1', '8.68', '4', '4', '50.00', NULL, NULL, NULL, NULL, '-141.32', NULL, NULL),
(37, '00008-A', '1', '0', '4', '0', '0.00', NULL, NULL, NULL, NULL, '-450', NULL, NULL),
(38, '00005-A', '1', '0', '6', '0', '50.00', NULL, NULL, NULL, NULL, '-150', NULL, NULL),
(39, '00005-A', '1', '0', '6', '3', '50.00', NULL, NULL, NULL, NULL, '-150', NULL, NULL),
(40, '00005-A', '1', '0', '11', '3', '50.00', NULL, NULL, NULL, NULL, '-150', NULL, NULL),
(41, '00002-A', '1', '36.89', '17', '4', '50.00', NULL, NULL, NULL, NULL, '-113.11', NULL, NULL),
(42, '00007-A', '1', '10.85', '5', '2', '50.00', NULL, NULL, NULL, NULL, '-139.15', NULL, NULL),
(43, '00007-A', '1', '10.85', '5', '2', '50.00', NULL, NULL, NULL, NULL, '-139.15', NULL, NULL),
(44, '00021-A', '1', '153.93', '7', '0', '50.00', NULL, NULL, NULL, NULL, '3.93', NULL, NULL),
(45, '00021-A', '1', '156.22', '8', '0', '50.00', NULL, NULL, NULL, NULL, '6.22', NULL, NULL),
(46, '00002-A', '1', '174.14', '8.360000000000001', '0', '50.00', NULL, NULL, NULL, NULL, '24.14', NULL, NULL),
(47, '00024-A', '1', '400', '8', '0', '20.00', NULL, NULL, NULL, NULL, '304', NULL, NULL),
(48, '00011-A', '1', '500', '8', '4', '20.00', NULL, NULL, NULL, NULL, '403.75', NULL, NULL),
(49, '00024-A', '1', '400', '8', '0', '20.00', NULL, NULL, NULL, NULL, '304', NULL, NULL),
(50, '00011-A', '1', '500', '8', '4', '40.00', NULL, NULL, NULL, NULL, '308.5', NULL, NULL),
(51, '00001-A', '2', '500', '8', '4', '20.00', NULL, NULL, NULL, NULL, '403.75', NULL, NULL),
(52, '00001-A', '2', '500', '8', '4', '40.00', NULL, NULL, NULL, NULL, '307.5', NULL, NULL),
(53, '00001-A', '2', '500.63', '8.01', '4', '20.00', NULL, NULL, NULL, NULL, '404.38', NULL, NULL),
(54, '00001-A', '2', '500.63', '8.01', '4', '40.00', NULL, NULL, NULL, NULL, '308.13', NULL, NULL),
(55, '00001-A', '2', '312.5', '13.01', '4', '20.00', NULL, NULL, NULL, NULL, '216.25', NULL, NULL),
(56, '00001-A', '2', '813.13', '13.01', '4', '20.00', NULL, NULL, NULL, NULL, '716.88', NULL, NULL),
(57, '00001-A', '2', '813.13', '13.01', '4', '40.00', NULL, NULL, NULL, NULL, '620.63', NULL, NULL),
(58, '00001-A', '2', '813.13', '13.01', '4', '40.00', NULL, NULL, NULL, NULL, '620.63', NULL, NULL),
(59, '00001-A', '2', '813.13', '13.01', '4', '40.00', NULL, NULL, NULL, NULL, '620.63', NULL, NULL),
(60, '00001-A', '2', '813.13', '13.01', '4', '40.00', NULL, NULL, NULL, NULL, '620.63', NULL, NULL),
(61, '00001-A', '2', '813.13', '13.01', '4', '40.00', NULL, NULL, NULL, NULL, '620.63', NULL, NULL),
(62, '00001-A', '2', '813.13', '13.01', '4', '40.00', NULL, NULL, NULL, NULL, '620.63', NULL, NULL),
(63, '00001-A', '2', '1250', '20', '4', '20.00', NULL, NULL, NULL, NULL, '1153.75', NULL, NULL),
(64, '00011-A', '1', '500', '8', '4', '40.00', NULL, NULL, NULL, NULL, '308.5', NULL, NULL),
(65, '00011-A', '1', '1700', '40', '4', '20.00', NULL, NULL, NULL, NULL, '1604.25', NULL, NULL),
(66, '00024-A', '1', '1600', '32', '0', '20.00', NULL, NULL, NULL, NULL, '1504', NULL, NULL),
(67, '00024-A', '1', '1600', '32', '0', '40.00', NULL, NULL, NULL, NULL, '1408', NULL, NULL),
(68, '00024-A', '1', '1600', '32', '0', '40.00', NULL, NULL, NULL, NULL, '1408', NULL, NULL),
(69, '00011-A', '1', '1700', '40', '4', '40.00', NULL, NULL, NULL, NULL, '1508.5', NULL, NULL),
(70, '00011-A', '1', '1700', '40', '4', '40.00', NULL, NULL, NULL, NULL, '1508.5', NULL, NULL),
(71, '00011-A', '1', '2300', '56', '4', '20.00', NULL, NULL, NULL, NULL, '2204.25', NULL, NULL);

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
-- Indexes for table `previous_company`
--
ALTER TABLE `previous_company`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `sss_table_history`
--
ALTER TABLE `sss_table_history`
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
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `admin_edithistory`
--
ALTER TABLE `admin_edithistory`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dashboard_months`
--
ALTER TABLE `dashboard_months`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;

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
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `hours_semimonthly`
--
ALTER TABLE `hours_semimonthly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `logbook_extended`
--
ALTER TABLE `logbook_extended`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `machine_operated`
--
ALTER TABLE `machine_operated`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_loans`
--
ALTER TABLE `payroll_loans`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payroll_provisions`
--
ALTER TABLE `payroll_provisions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `philhealth_table`
--
ALTER TABLE `philhealth_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `previous_company`
--
ALTER TABLE `previous_company`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sss_batches`
--
ALTER TABLE `sss_batches`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sss_table`
--
ALTER TABLE `sss_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `sss_table_history`
--
ALTER TABLE `sss_table_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `sss_weekpaid`
--
ALTER TABLE `sss_weekpaid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
