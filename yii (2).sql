-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2016 at 03:09 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `departmentID` int(11) NOT NULL,
  `departmentName` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`departmentID`, `departmentName`) VALUES
(19, 'HR'),
(20, 'CS'),
(22, 'fs');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` int(10) NOT NULL,
  `fName` varchar(50) COLLATE utf8_bin NOT NULL,
  `lName` varchar(50) COLLATE utf8_bin NOT NULL,
  `salary` int(10) NOT NULL,
  `departmentID` int(50) NOT NULL,
  `titleID` int(50) DEFAULT NULL,
  `supervisorID` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `fName`, `lName`, `salary`, `departmentID`, `titleID`, `supervisorID`) VALUES
(1, 'Salwa', 'Saed', 6300, 5, 1, 0),
(19, 'Salam', 'Mohamed', 4500, 19, 1, 0),
(34, 'Mustafa', 'Saed', 6200, 15, 1, 0),
(39, 'Ahmed', 'Adel', 1500, 19, 2, 0),
(40, 'Islam', 'Mohamed', 8000, 19, 1, 0),
(41, 'Sally', 'Mustafa', 7400, 20, 1, 0),
(42, 'Ali', 'Ismael', 4900, 21, 1, 0),
(43, 'Zeinab', 'ibrahim', 2500, 20, 2, 41),
(44, 'Eman', 'Ali', 2900, 20, 2, 41),
(45, 'Salma', 'Rashed', 3200, 19, 2, 40),
(46, 'aaaaaaaaaaaa', 'sssssssssssss', 44444442, 2, 2, 3),
(47, 'dssad', 'dsadsa', 3213, 2, 1, 3),
(48, 'ewq', 'qew', 222, 19, 1, 2),
(49, 'adasd', 'dasdsa', 2311, 1, 3, 0),
(50, 'aasd', 'dsaad', 2221, 19, 2, 0),
(52, 'aaa', 'aaaaa', 223, 19, 1, 19),
(53, 'asda', 'dadsa', 231, 19, 1, 41),
(54, 'dasdsa', 'wqw', 331, 19, 0, 3),
(55, 'wewqewq', 'ewqe', 312, 20, NULL, 0),
(56, 'wewqwe', 'eqweqw', 231, 21, 0, 3),
(57, 'qewqw', 'eqeqw', 321, 20, 1, 40),
(58, 'qew', 'ewq', 432, 20, 1, 40),
(59, 'das', 'dsa', 321, 20, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleID` int(10) NOT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleID`, `name`) VALUES
(1, 'Admin'),
(2, 'Editor'),
(3, 'Ordinary');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `titleID` int(20) NOT NULL,
  `titleName` varchar(50) NOT NULL DEFAULT 'Ordinary'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`titleID`, `titleName`) VALUES
(0, 'None'),
(1, 'Supervisor'),
(2, 'Ordinary');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(20) NOT NULL,
  `username` varchar(250) COLLATE utf8_bin NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `roleID` int(20) NOT NULL DEFAULT '3',
  `statusID` int(20) NOT NULL DEFAULT '0',
  `token` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `roleID`, `statusID`, `token`) VALUES
(4, 'ahmed', 'sa', '$2y$10$3wU4qreKCIv6Zh5SyISi9.8fDH4zEKbbYyxCfKYoWsAHnlIGagopu', 3, 0, 'bf542e42f2070a59aa28e0eb1304d5c5'),
(455, 'HightAdmin', 'd', '$2y$10$KSImmevLYc5Dkf8PgfZvg.qStFn1N9zBAOg6B9u8CWlISPWRAn0/m', 2, 1, '02af5882f68b8a724e3105b30bb68c34'),
(495, 'sallam', 'a.sallam@fetchr.us', '$2y$13$5M4QNPiqN/G.c/NPTN1s..uV1NJrHueYDBA/Iz6SIACkyR2IFV84K', 3, 1, 'fc2d78405ab617772b93d48b52e20b33');

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `statusID` int(20) NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`statusID`, `status`) VALUES
(0, 'Inactive'),
(1, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`titleID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=496;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
