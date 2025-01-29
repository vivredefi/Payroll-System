-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 05:27 PM
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
('EMP100018', 'abcd', 'STAFF', 'ACTIVE', 'admin', '2025-01-26 02:49:52');

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
(100002, 'EMP100002', 'ksdajf', 'LAUNDRY ATTENDANT', 'Branch 3', '480', 'admin', '2025-01-26 02:11:16'),
(100004, 'EMP100003', 'ksdajf', 'LAUNDRY ATTENDANT', 'Branch 1', '1000', 'admin', '2025-01-26 02:15:45'),
(100005, 'EMP100005', 'ksdajf', 'LAUNDRY ATTENDANT', 'Branch 1', '1000', 'admin', '2025-01-26 02:18:08'),
(100007, 'EMP100006', 'ksdajf324', 'LAUNDRY ATTENDANT', 'Branch 1', '1000', 'admin', '2025-01-26 02:22:22'),
(100010, 'EMP100008', 'ksdajf324', 'LAUNDRY ATTENDANT', 'Branch 1', '1000', 'admin', '2025-01-26 02:24:33'),
(100011, 'EMP100011', 'ksdajf', 'LAUNDRY ATTENDANT', 'Branch 1', '124332', 'admin', '2025-01-26 02:25:44'),
(100013, 'EMP100012', 'ksdajf', 'LAUNDRY ATTENDANT', 'Branch 1', '124332', 'admin', '2025-01-26 02:26:06'),
(100014, 'EMP100014', 'ksdajf', 'LAUNDRY ATTENDANT', 'Branch 1', '124332', 'admin', '2025-01-26 02:27:30'),
(100015, 'EMP100015', 'ksdajf', 'LAUNDRY ATTENDANT', 'Branch 2', '3', 'admin', '2025-01-26 02:28:02'),
(100016, 'EMP100016', 'kelv', 'LAUNDRY ATTENDANT', 'Branch 1', '500', 'admin', '2025-01-26 02:48:24'),
(100017, 'EMP100017', 'gabayni', 'LAUNDRY ATTENDANT', 'Branch 2', '1234', 'admin', '2025-01-26 02:49:13');

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
('01/27/2025', '11:30:11', 'Update', 'Account Management', 'EMP100018', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`username`);

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
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `ainumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100019;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
