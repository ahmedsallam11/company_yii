-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 12, 2016 at 12:33 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1481491448),
('editor', '2', 1481491448),
('ord', '3', 1481491448);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('create', 2, 'create', NULL, NULL, 1481491441, 1481491441),
('delete', 2, 'delete', NULL, NULL, 1481491441, 1481491441),
('index', 2, 'View index', NULL, NULL, 1481491441, 1481491441),
('update', 2, 'update', NULL, NULL, 1481491441, 1481491441),
('view', 2, 'view', NULL, NULL, 1481491441, 1481491441);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create'),
('admin', 'delete'),
('admin', 'editor'),
('ord', 'index'),
('editor', 'ord'),
('editor', 'update'),
('ord', 'view');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(21, 'Accounting');

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
  `supervisorID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employeeID`, `fName`, `lName`, `salary`, `departmentID`, `titleID`, `supervisorID`) VALUES
(1, 'Salwa', 'Saed', 6300, 5, 1, 0),
(3, 'mohamed', 'ibrahim', 1940, 8, 2, 19),
(19, 'Salam', 'Mohamed', 4500, 5, 1, 0),
(32, 'Abdullah', 'Ahmed', 1300, 15, 2, 34),
(34, 'Mustafa', 'Saed', 6200, 15, 1, 0),
(36, 'Ahmed', 'Mustafa', 1400, 14, 2, 37),
(38, 'Zeinab ', 'Ali', 3200, 14, 2, 37),
(39, 'Ahmed', 'Adel', 1500, 19, 2, 0),
(40, 'Islam', 'Mohamed', 8000, 19, 1, 0),
(41, 'Sally', 'Mustafa', 7400, 20, 1, 0),
(42, 'Ali', 'Ismael', 4900, 21, 1, 0),
(43, 'Zeinab', 'ibrahim', 2500, 20, 2, 41),
(44, 'Eman', 'Ali', 2900, 20, 2, 41),
(45, 'Salma', 'Rashed', 3200, 19, 2, 40);

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
(1, 'High Admin'),
(2, 'Admin'),
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
(1, 'ahmed', 'a.sallam@fetchr.us', '$2y$10$3wU4qreKCIv6Zh5SyISi9.8fDH4zEKbbYyxCfKYoWsAHnlIGagopu', 3, 0, 'bf542e42f2070a59aa28e0eb1304d5c5'),
(26, 'hassan', 'h.hassan@fetchr.us', '$2y$10$shsTteaLlDQCjjaIoNXpsO5UU8FA8opwW3OPak5h.8PTV5XiItYua', 3, 0, '7d198805a504b839a7ce78d6638e5994'),
(455, 'HightAdmin', 'd', '$2y$10$KSImmevLYc5Dkf8PgfZvg.qStFn1N9zBAOg6B9u8CWlISPWRAn0/m', 1, 1, '02af5882f68b8a724e3105b30bb68c34'),
(467, 'ahmed1', 'a.sallam@das.co', '$2y$13$N66Sse7Xx6Hu6dSyLJczeev1N4zt7vvA/hM6c/BOf4Reh//gjQW9.', 3, 0, NULL);

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
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

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
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
