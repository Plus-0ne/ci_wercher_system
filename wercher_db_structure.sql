-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2020 at 01:20 AM
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
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_edithistory`
--
ALTER TABLE `admin_edithistory`
  MODIFY `EntryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `ApplicantNo` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dummy_hours`
--
ALTER TABLE `dummy_hours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hours_semimonthly`
--
ALTER TABLE `hours_semimonthly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hours_weekly`
--
ALTER TABLE `hours_weekly`
  MODIFY `No` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logbook_extended`
--
ALTER TABLE `logbook_extended`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
