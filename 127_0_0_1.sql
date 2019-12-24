-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2019 at 07:11 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `permission_roles`
--

DROP TABLE IF EXISTS `permission_roles`;
CREATE TABLE IF NOT EXISTS `permission_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_idx` (`role_id`),
  KEY `permission_idx` (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permission_roles`
--

INSERT INTO `permission_roles` (`id`, `role_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(9, 3, 7),
(10, 3, 8),
(11, 4, 9),
(12, 4, 10),
(13, 4, 11),
(14, 2, 12),
(15, 3, 13),
(16, 4, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbllog`
--

DROP TABLE IF EXISTS `tbllog`;
CREATE TABLE IF NOT EXISTS `tbllog` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `log_date` date NOT NULL,
  `log_time` varchar(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `description` varchar(250) NOT NULL,
  `values` text NOT NULL,
  `ip_add` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllog`
--

INSERT INTO `tbllog` (`id`, `log_date`, `log_time`, `user_name`, `user_id`, `description`, `values`, `ip_add`) VALUES
(87, '2019-12-24', '01:46:51', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-24 01:46:51', '[]', '::1'),
(88, '2019-12-24', '01:47:19', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-24 01:47:19', '[]', '::1'),
(89, '2019-12-24', '01:47:40', 'manager', 0, 'User Login -  / USER - manager ID - 5 / Date 2019-12-24 01:47:40', '[]', '::1'),
(90, '2019-12-24', '07:23:40', 'dinum2', 0, 'User Login -  / USER - dinum2 ID - 3 / Date 2019-12-24 07:23:40', '[]', '::1'),
(91, '2019-12-24', '07:23:50', 'Dinum', 0, 'User LogOut -  / USER - Dinum ID - 3 / Date 2019-12-24 07:23:50', '[]', '::1'),
(92, '2019-12-24', '07:23:56', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-24 07:23:56', '[]', '::1'),
(93, '2019-12-24', '07:24:13', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-24 07:24:13', '[]', '::1'),
(94, '2019-12-24', '08:30:57', 'manager', 0, 'User Login -  / USER - manager ID - 5 / Date 2019-12-24 08:30:57', '[]', '::1'),
(95, '2019-12-24', '09:00:54', 'manager', 0, 'User LogOut -  / USER - manager ID - 5 / Date 2019-12-24 09:00:54', '[]', '::1'),
(96, '2019-12-24', '09:01:00', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-24 09:01:00', '[]', '::1'),
(97, '2019-12-24', '09:43:30', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-24 09:43:30', '[]', '::1'),
(98, '2019-12-24', '09:43:36', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-24 09:43:36', '[]', '::1'),
(99, '2019-12-24', '09:43:43', 'Administrator', 1, 'Add Permission | Success | ID=12', '[\"apply_vacancy\",\"\"]', '::1'),
(100, '2019-12-24', '09:45:06', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-24 09:45:06', '[]', '::1'),
(101, '2019-12-24', '09:45:19', 'dinum2', 0, 'User Login -  / USER - dinum2 ID - 3 / Date 2019-12-24 09:45:19', '[]', '::1'),
(102, '2019-12-24', '09:46:36', 'Dinum', 0, 'User LogOut -  / USER - Dinum ID - 3 / Date 2019-12-24 09:46:36', '[]', '::1'),
(103, '2019-12-24', '09:46:45', 'dinum', 0, 'User Login -  / USER - dinum ID - 2 / Date 2019-12-24 09:46:45', '[]', '::1'),
(104, '2019-12-24', '11:03:22', 'Dinum', 2, 'apply for vacancy | Success | ID=3', '[]', '::1'),
(105, '2019-12-24', '14:21:00', 'dinum', 0, 'User Login -  / USER - dinum ID - 2 / Date 2019-12-24 14:21:00', '[]', '::1'),
(106, '2019-12-24', '14:37:07', 'Dinum', 2, 'apply for vacancy | Success | ID=2', '[]', '::1'),
(107, '2019-12-24', '15:00:09', 'Dinum', 0, 'User LogOut -  / USER - Dinum ID - 2 / Date 2019-12-24 15:00:09', '[]', '::1'),
(108, '2019-12-24', '15:01:36', 'dinum', 0, 'User Login -  / USER - dinum ID - 2 / Date 2019-12-24 15:01:36', '[]', '::1'),
(109, '2019-12-24', '15:02:28', 'Dinum', 0, 'User LogOut -  / USER - Dinum ID - 2 / Date 2019-12-24 15:02:28', '[]', '::1'),
(110, '2019-12-24', '15:02:35', 'dinum', 0, 'User Login -  / USER - dinum ID - 2 / Date 2019-12-24 15:02:35', '[]', '::1'),
(111, '2019-12-24', '15:02:55', 'Dinum', 0, 'User LogOut -  / USER - Dinum ID - 2 / Date 2019-12-24 15:02:55', '[]', '::1'),
(112, '2019-12-24', '15:03:01', 'manager', 0, 'User Login -  / USER - manager ID - 5 / Date 2019-12-24 15:03:01', '[]', '::1'),
(113, '2019-12-24', '15:03:07', 'manager', 0, 'User LogOut -  / USER - manager ID - 5 / Date 2019-12-24 15:03:07', '[]', '::1'),
(114, '2019-12-24', '15:03:42', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-24 15:03:42', '[]', '::1'),
(115, '2019-12-24', '15:04:30', 'Administrator', 1, 'Add User | Success | ID=6', '[\"hr\",\"hr@gmail.com\",\"1\",\"hr\",\"Dinum@inova123\",\"Dinum@inova123\",[\"3\"],\"\"]', '::1'),
(116, '2019-12-24', '15:04:36', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-24 15:04:36', '[]', '::1'),
(117, '2019-12-24', '15:04:42', 'hr', 0, 'User Login -  / USER - hr ID - 6 / Date 2019-12-24 15:04:42', '[]', '::1'),
(118, '2019-12-24', '15:04:54', 'hr', 0, 'User LogOut -  / USER - hr ID - 6 / Date 2019-12-24 15:04:54', '[]', '::1'),
(119, '2019-12-24', '15:07:02', 'manager', 0, 'User Login -  / USER - manager ID - 5 / Date 2019-12-24 15:07:02', '[]', '::1'),
(120, '2019-12-24', '18:05:39', 'hr', 0, 'User Login -  / USER - hr ID - 6 / Date 2019-12-24 18:05:39', '[]', '::1'),
(121, '2019-12-24', '18:09:36', 'hr', 0, 'User LogOut -  / USER - hr ID - 6 / Date 2019-12-24 18:09:36', '[]', '::1'),
(122, '2019-12-24', '18:09:43', 'manager', 0, 'User Login -  / USER - manager ID - 5 / Date 2019-12-24 18:09:43', '[]', '::1'),
(123, '2019-12-24', '18:12:37', 'manager', 0, 'User LogOut -  / USER - manager ID - 5 / Date 2019-12-24 18:12:37', '[]', '::1'),
(124, '2019-12-24', '18:12:43', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-24 18:12:43', '[]', '::1'),
(125, '2019-12-24', '18:12:52', 'Administrator', 1, 'Add Permission | Success | ID=13', '[\"view_employee\",\"\"]', '::1'),
(126, '2019-12-24', '18:14:10', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-24 18:14:10', '[]', '::1'),
(127, '2019-12-24', '18:14:19', 'hr', 0, 'User Login -  / USER - hr ID - 6 / Date 2019-12-24 18:14:19', '[]', '::1'),
(128, '2019-12-24', '18:15:03', 'hr', 0, 'User LogOut -  / USER - hr ID - 6 / Date 2019-12-24 18:15:03', '[]', '::1'),
(129, '2019-12-24', '18:15:09', 'manager', 0, 'User Login -  / USER - manager ID - 5 / Date 2019-12-24 18:15:09', '[]', '::1'),
(130, '2019-12-24', '18:37:05', 'manager', 0, 'User LogOut -  / USER - manager ID - 5 / Date 2019-12-24 18:37:05', '[]', '::1'),
(131, '2019-12-24', '18:37:12', 'dinum', 0, 'User Login -  / USER - dinum ID - 2 / Date 2019-12-24 18:37:12', '[]', '::1'),
(132, '2019-12-24', '18:46:47', 'Dinum', 0, 'User LogOut -  / USER - Dinum ID - 2 / Date 2019-12-24 18:46:47', '[]', '::1'),
(133, '2019-12-24', '18:46:53', 'manager', 0, 'User Login -  / USER - manager ID - 5 / Date 2019-12-24 18:46:53', '[]', '::1'),
(134, '2019-12-24', '19:06:35', 'manager', 0, 'User LogOut -  / USER - manager ID - 5 / Date 2019-12-24 19:06:35', '[]', '::1'),
(135, '2019-12-24', '19:08:59', 'hr', 0, 'User Login -  / USER - hr ID - 6 / Date 2019-12-24 19:08:59', '[]', '::1'),
(136, '2019-12-24', '19:10:04', 'hr', 0, 'User LogOut -  / USER - hr ID - 6 / Date 2019-12-24 19:10:04', '[]', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `tblpermission`
--

DROP TABLE IF EXISTS `tblpermission`;
CREATE TABLE IF NOT EXISTS `tblpermission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` text NOT NULL,
  `created_date` datetime NOT NULL,
  `special_permission` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpermission`
--

INSERT INTO `tblpermission` (`id`, `permission`, `created_date`, `special_permission`) VALUES
(1, 'add_user', '2019-12-22 15:04:37', 1),
(2, 'view_users', '2019-12-22 15:04:45', 0),
(3, 'add_permissions', '2019-12-22 15:04:56', 1),
(4, 'view_permissions', '2019-12-22 15:05:04', 0),
(5, 'add_user_role', '2019-12-22 15:05:19', 1),
(6, 'view_user_roles', '2019-12-22 15:05:27', 0),
(7, 'staff_requests', '2019-12-22 19:16:12', 0),
(8, 'view_staff', '2019-12-22 19:16:22', 0),
(9, 'add_vacancy', '2019-12-23 15:33:17', 1),
(10, 'view_vacancy', '2019-12-23 15:33:37', 0),
(11, 'vacancies_requests', '2019-12-23 15:33:54', 0),
(12, 'apply_vacancy', '2019-12-24 09:43:43', 0),
(13, 'view_employee', '2019-12-24 18:12:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblroles`
--

DROP TABLE IF EXISTS `tblroles`;
CREATE TABLE IF NOT EXISTS `tblroles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `added_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroles`
--

INSERT INTO `tblroles` (`id`, `name`, `description`, `added_date`) VALUES
(1, 'Administrator', NULL, '2019-12-22'),
(2, 'Guest', NULL, '2019-12-22'),
(3, 'HR', NULL, '2019-12-22'),
(4, 'Manager', NULL, '2019-12-23');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `detail_id` int(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `added_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `detail_id`, `name`, `description`, `email`, `username`, `password`, `added_date`, `status`) VALUES
(1, NULL, 'Administrator', NULL, 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', '2019-12-14', 1),
(2, 1, 'Dinum', NULL, 'm.dinum@gmail.com', 'dinum', '887bc63001cae9e14130628f2bf8b21a', '2019-12-22', 1),
(3, 2, 'Dinum', NULL, 'dinum@gmail.com', 'dinum2', '887bc63001cae9e14130628f2bf8b21a', '2019-12-22', 1),
(4, 3, 'Dinum', NULL, 'dinum@gmail.com', 'dinum3', '887bc63001cae9e14130628f2bf8b21a', '2019-12-22', 1),
(5, NULL, 'manager', NULL, 'manager@gmail.com', 'manager', '887bc63001cae9e14130628f2bf8b21a', '2019-12-23', 1),
(6, NULL, 'hr', NULL, 'hr@gmail.com', 'hr', '887bc63001cae9e14130628f2bf8b21a', '2019-12-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_details`
--

DROP TABLE IF EXISTS `tbl_user_details`;
CREATE TABLE IF NOT EXISTS `tbl_user_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mobile` int(10) NOT NULL,
  `address` text DEFAULT NULL,
  `qualification` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`id`, `fname`, `mname`, `lname`, `email`, `mobile`, `address`, `qualification`, `status`, `added_date`, `updated_date`) VALUES
(1, 'Dinum', 'Dissnayaka', 'Mahawela', 'm.dinum@gmail.com', 770307283, '325/3 gona', 'dgsgsdg', 2, '2019-12-22 17:32:32', '2019-12-23 15:58:36'),
(2, 'Dinum', 'Dissnayaka', 'Mahawela', 'dinum@gmail.com', 770307283, 'fsaffasfasfasf', 'dgsgsdg', 2, '2019-12-22 17:35:52', NULL),
(3, 'Dinum', 'Dissnayaka', 'Mahawela', 'dinum@gmail.com', 770307283, 'fsaffasfasfasf', 'cvbdcfhndf', 1, '2019-12-22 17:45:29', '2019-12-23 15:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_vacancy`
--

DROP TABLE IF EXISTS `tbl_user_vacancy`;
CREATE TABLE IF NOT EXISTS `tbl_user_vacancy` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `vacancy_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_vacancy`
--

INSERT INTO `tbl_user_vacancy` (`id`, `user_id`, `vacancy_id`, `status`) VALUES
(1, 2, 3, 2),
(2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vacancies`
--

DROP TABLE IF EXISTS `tbl_vacancies`;
CREATE TABLE IF NOT EXISTS `tbl_vacancies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tittle` varchar(500) NOT NULL,
  `summery` text NOT NULL,
  `type` tinyint(1) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `location` varchar(500) DEFAULT NULL,
  `pay_type` tinyint(1) NOT NULL,
  `payment` double DEFAULT NULL,
  `description` text DEFAULT NULL,
  `added_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vacancies`
--

INSERT INTO `tbl_vacancies` (`id`, `tittle`, `summery`, `type`, `start`, `end`, `location`, `pay_type`, `payment`, `description`, `added_date`, `status`, `updated_date`) VALUES
(1, 'testing data', 'vxdgs', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gretgyer', 2, 36346, 'dfghdfhdf', '2019-12-23 18:25:27', 1, '2019-12-24 08:31:09'),
(2, 'testing data 2', 'sdgfsdgsdg', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sdgsdhgsdhgsdhg', 2, 463463, 'dfhdfhdf', '2019-12-23 18:31:49', 1, '2019-12-24 02:11:16'),
(3, 'testing data 3', 'dsgsdgsdgsdg', 2, '2019-12-24 00:03:00', '2019-12-28 00:03:00', 'sdgsdgsdg', 2, 3456346, 'sdgbsdgds', '2019-12-23 18:34:01', 1, '2019-12-24 02:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_idx` (`user_id`),
  KEY `role_idx` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 2),
(5, 5, 4),
(6, 6, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
