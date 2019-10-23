-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 10:08 PM
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
-- Database: `hr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acad_history`
--

CREATE TABLE `acad_history` (
  `Acad_No` int(11) NOT NULL,
  `EmployeeID` varchar(255) DEFAULT NULL,
  `Level` varchar(255) DEFAULT NULL,
  `SchoolName` varchar(255) DEFAULT NULL,
  `DateStarted` varchar(255) DEFAULT NULL,
  `DateEnds` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acad_history`
--

INSERT INTO `acad_history` (`Acad_No`, `EmployeeID`, `Level`, `SchoolName`, `DateStarted`, `DateEnds`) VALUES
(1, '00001-A', 'Primary', 'asdas', 'asda', 'sdad'),
(2, '00001-A', 'Secodary', 'dasdasda', 'sada', 'sada'),
(3, '00002-A', 'Primary', 'asdasd', 'asda', 'dada'),
(4, '00003-A', 'Primary', 'dadasd', 'sada', 'dasd'),
(5, '00003-A', 'Secodary', 'asdasdas', 'dsad', 'sada'),
(6, '00003-A', 'Tertiary', 'asdasdas', 'dasd', 'asda'),
(7, '00004-A', 'Primary', 'asdasdasdas', 'daas', 'dasd');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminNo` int(11) NOT NULL,
  `AdminID` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleInitial` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `CurrentAddress` varchar(255) DEFAULT NULL,
  `ContactInformation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_No`, `Employee_ID`, `EmployeeImage`, `EmploymentType`, `LastName`, `FirstName`, `MiddleInitial`, `Address`, `BirthDate`, `BirthPlace`, `Gender`, `MaritalStatus`, `ProjectAssigned`, `SSS`, `Philhealth`, `HDMF`, `TIN`, `ATM`, `DateHired`, `DateSeparated`, `Status`) VALUES
(6, '00001-A', 0x68747470733a2f2f6c6f63616c6465762e746573742f48525f53797374656d2f75706c6f6164732f30303030312d412f31343062313465303739646338356337326339663032356362363764623536322e706e67, 'Employee', 'Dasd', 'Asdasdasdas', 'Dasd', 'adasdsa', '2019-10-01', 'adsadasd', 'Male', 'Single', 'asdasd', 'asdad', 'sad', 'dsadas', 'sadsa', 'dsa', NULL, '2019-10-02', 'Inactive');

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
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_No`);

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
  MODIFY `AdminNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
