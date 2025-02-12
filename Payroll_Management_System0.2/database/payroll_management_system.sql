-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 11:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `username` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL,
  `usertype` varchar(50) NOT NULL,
  `userstatus` varchar(50) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `datecreated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`username`, `userpass`, `usertype`, `userstatus`, `createdby`, `datecreated`) VALUES
('admin', '1234', 'ADMINISTRATOR', 'ACTIVE', 'admin', '01/17/2025'),
('EMP100021', '1234', 'STAFF', 'ACTIVE', 'admin', '2025-01-30 20:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `tblattendance`
--

CREATE TABLE `tblattendance` (
  `attendance_id` int(50) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `attendance_date` varchar(50) NOT NULL,
  `attendance_time` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `comment` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tblattendance`
--

INSERT INTO `tblattendance` (`attendance_id`, `employee_id`, `attendance_date`, `attendance_time`, `action`, `comment`) VALUES
(1, 'EMP-000020', '03/02/2025', '16:13:35', 'IN', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbranches`
--

CREATE TABLE `tblbranches` (
  `branchname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `datecreated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tblbranches`
--

INSERT INTO `tblbranches` (`branchname`, `address`, `createdby`, `datecreated`) VALUES
('branch demo 1', 'tondo', 'admin', '2025-01-30 00:17:23'),
('branch demo 3', 'urbiztondo', 'admin', '2025-01-30 00:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `ainumber` int(11) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `dailyrate` varchar(50) NOT NULL,
  `createdby` varchar(50) NOT NULL,
  `datecreated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`ainumber`, `employee_id`, `name`, `position`, `branch`, `dailyrate`, `createdby`, `datecreated`) VALUES
(100021, 'EMP100021', 'gabayni', 'LAUNDRY ATTENDANT', 'branch demo 3', '500', 'admin', '2025-01-30 20:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbllogs`
--

CREATE TABLE `tbllogs` (
  `datelog` varchar(50) NOT NULL,
  `timelog` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `employee_id` varchar(50) NOT NULL,
  `performedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbllogs`
--

INSERT INTO `tbllogs` (`datelog`, `timelog`, `action`, `module`, `employee_id`, `performedby`) VALUES
('1', '2', '0', '0', '0', '0'),
('1', '2', '0', '0', '0', '0'),
('1', '2', '0', '0', '0', '0'),
('1', '2', '0', '0', '0', '0'),
('1', '2', '0', '0', '0', '0'),
('1', '2', '0', '0', '0', '0'),
('01/26/2025', '08:48:36', 'Delete', 'Students Management', '', 'admin'),
('01/26/2025', '08:48:49', 'Delete', 'Students Management', '', 'admin'),
('01/26/2025', '08:49:24', 'Delete', 'Students Management', '', 'admin'),
('01/26/2025', '08:50:21', 'Delete', 'Students Management', '', 'admin'),
('01/26/2025', '08:51:41', 'Delete', 'Students Management', '', 'admin'),
('01/26/2025', '08:51:47', 'Delete', 'Students Management', '', 'admin'),
('01/26/2025', '08:52:57', 'Delete', 'Students Management', '', 'admin'),
('01/26/2025', '08:56:59', 'Delete', 'Students Management', 'EMP100001', 'admin'),
('01/27/2025', '12:28:44', 'Delete', 'Employees Management', 'EMP100018', 'admin'),
('01/27/2025', '11:29:51', 'Update', 'Account Management', 'EMP100018', 'admin'),
('01/27/2025', '11:30:11', 'Update', 'Account Management', 'EMP100018', 'admin'),
('01/30/2025', '12:21:08', 'Add', 'Account Management', 'branch demo 3', 'admin'),
('01/30/2025', '07:45:49', 'Delete', 'Branches Management', 'branch demo 2', 'admin'),
('01/30/2025', '07:46:02', 'Delete', 'Branches Management', 'branch demo 2', 'admin'),
('01/30/2025', '07:47:04', 'Delete', 'Branches Management', 'branch demo 2', 'admin'),
('01/30/2025', '07:48:07', 'Delete', 'Employees Management', 'EMP100017', 'admin'),
('01/30/2025', '07:48:07', 'Delete', 'Accounts Management', 'EMP100017', 'admin'),
('01/30/2025', '07:48:58', 'Delete', 'Employees Management', 'EMP100002', 'admin'),
('01/30/2025', '07:48:58', 'Delete', 'Accounts Management', 'EMP100002', 'admin'),
('01/30/2025', '07:49:02', 'Delete', 'Employees Management', 'EMP100003', 'admin'),
('01/30/2025', '07:49:02', 'Delete', 'Accounts Management', 'EMP100003', 'admin'),
('01/30/2025', '07:49:03', 'Delete', 'Employees Management', 'EMP100005', 'admin'),
('01/30/2025', '07:49:03', 'Delete', 'Accounts Management', 'EMP100005', 'admin'),
('01/30/2025', '07:49:06', 'Delete', 'Employees Management', 'EMP100006', 'admin'),
('01/30/2025', '07:49:06', 'Delete', 'Accounts Management', 'EMP100006', 'admin'),
('01/30/2025', '07:49:08', 'Delete', 'Employees Management', 'EMP100008', 'admin'),
('01/30/2025', '07:49:08', 'Delete', 'Accounts Management', 'EMP100008', 'admin'),
('01/30/2025', '07:49:11', 'Delete', 'Employees Management', 'EMP100011', 'admin'),
('01/30/2025', '07:49:11', 'Delete', 'Accounts Management', 'EMP100011', 'admin'),
('01/30/2025', '07:49:14', 'Delete', 'Employees Management', 'EMP100012', 'admin'),
('01/30/2025', '07:49:14', 'Delete', 'Accounts Management', 'EMP100012', 'admin'),
('01/30/2025', '07:49:16', 'Delete', 'Employees Management', 'EMP100014', 'admin'),
('01/30/2025', '07:49:16', 'Delete', 'Accounts Management', 'EMP100014', 'admin'),
('01/30/2025', '07:49:18', 'Delete', 'Employees Management', 'EMP100015', 'admin'),
('01/30/2025', '07:49:18', 'Delete', 'Accounts Management', 'EMP100015', 'admin'),
('01/30/2025', '07:49:21', 'Delete', 'Employees Management', 'EMP100016', 'admin'),
('01/30/2025', '07:49:21', 'Delete', 'Accounts Management', 'EMP100016', 'admin'),
('01/30/2025', '08:00:11', 'Add', 'Employee Management', 'EMP100001', 'admin'),
('01/30/2025', '08:00:11', 'Add', 'Account Management', 'EMP100001', 'admin'),
('01/30/2025', '08:15:57', 'Add', 'Employee Management', 'EMP100020', 'admin'),
('01/30/2025', '08:15:57', 'Add', 'Account Management', 'EMP100020', 'admin'),
('01/30/2025', '08:16:50', 'Add', 'Employee Management', 'EMP100021', 'admin'),
('01/30/2025', '08:16:50', 'Add', 'Account Management', 'EMP100021', 'admin'),
('01/30/2025', '08:20:04', 'Delete', 'Employees Management', 'EMP100020', 'admin'),
('01/30/2025', '08:20:04', 'Delete', 'Accounts Management', 'EMP100020', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tblattendance`
--
ALTER TABLE `tblattendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `tblbranches`
--
ALTER TABLE `tblbranches`
  ADD PRIMARY KEY (`branchname`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `ainumber` (`ainumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblattendance`
--
ALTER TABLE `tblattendance`
  MODIFY `attendance_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `ainumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100022;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
