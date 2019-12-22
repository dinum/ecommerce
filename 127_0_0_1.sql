-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2019 at 08:16 PM
-- Server version: 5.7.26
-- PHP Version: 5.6.40

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(7, 2, 3),
(8, 2, 4),
(9, 3, 7),
(10, 3, 8);

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
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllog`
--

INSERT INTO `tbllog` (`id`, `log_date`, `log_time`, `user_name`, `user_id`, `description`, `values`, `ip_add`) VALUES
(1, '2019-12-14', '17:24:22', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-14 17:24:22', '[]', '::1'),
(2, '2019-12-22', '04:17:49', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-22 04:17:49', '[]', '::1'),
(3, '2019-12-22', '14:06:17', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-22 14:06:17', '[]', '::1'),
(4, '2019-12-22', '14:10:20', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-22 14:10:20', '[]', '::1'),
(5, '2019-12-22', '14:10:26', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-22 14:10:26', '[]', '::1'),
(6, '2019-12-22', '14:41:52', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-22 14:41:52', '[]', '::1'),
(7, '2019-12-22', '14:42:02', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-22 14:42:02', '[]', '::1'),
(8, '2019-12-22', '15:01:53', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-22 15:01:53', '[]', '::1'),
(9, '2019-12-22', '15:04:05', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-22 15:04:05', '[]', '::1'),
(10, '2019-12-22', '15:04:37', 'Administrator', 1, 'Add Permission | Success | ID=1', '[\"add_user\",\"\"]', '::1'),
(11, '2019-12-22', '15:04:45', 'Administrator', 1, 'Add Permission | Success | ID=2', '[\"view_users\",\"\"]', '::1'),
(12, '2019-12-22', '15:04:56', 'Administrator', 1, 'Add Permission | Success | ID=3', '[\"add_permissions\",\"1\",\"\"]', '::1'),
(13, '2019-12-22', '15:05:04', 'Administrator', 1, 'Add Permission | Success | ID=4', '[\"view_permissions\",\"\"]', '::1'),
(14, '2019-12-22', '15:05:19', 'Administrator', 1, 'Add Permission | Success | ID=5', '[\"add_user_role\",\"1\",\"\"]', '::1'),
(15, '2019-12-22', '15:05:27', 'Administrator', 1, 'Add Permission | Success | ID=6', '[\"view_user_roles\",\"\"]', '::1'),
(16, '2019-12-22', '15:06:05', 'Administrator', 1, 'Add Role | Success | ID=1', '[\"Administrator\",[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"],\"\"]', '::1'),
(17, '2019-12-22', '15:06:20', 'Administrator', 1, 'Add Role | Success | ID=2', '[\"Test_role\",[\"3\",\"4\"],\"\"]', '::1'),
(18, '2019-12-22', '15:06:44', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-22 15:06:44', '[]', '127.0.0.1'),
(19, '2019-12-22', '15:06:49', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-22 15:06:49', '[]', '127.0.0.1'),
(20, '2019-12-22', '15:07:33', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-22 15:07:33', '[]', '127.0.0.1'),
(21, '2019-12-22', '15:09:31', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-22 15:09:31', '[]', '127.0.0.1'),
(22, '2019-12-22', '15:40:27', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-22 15:40:27', '[]', '127.0.0.1'),
(23, '2019-12-22', '17:22:17', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(24, '2019-12-22', '17:22:17', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(25, '2019-12-22', '17:23:17', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(26, '2019-12-22', '17:23:17', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(27, '2019-12-22', '17:24:00', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(28, '2019-12-22', '17:24:00', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(29, '2019-12-22', '17:25:42', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(30, '2019-12-22', '17:25:42', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(31, '2019-12-22', '17:25:53', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(32, '2019-12-22', '17:25:53', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(33, '2019-12-22', '17:27:23', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(34, '2019-12-22', '17:27:23', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(35, '2019-12-22', '17:29:35', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(36, '2019-12-22', '17:29:35', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(37, '2019-12-22', '17:30:43', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(38, '2019-12-22', '17:30:43', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka \",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"Administrator\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(39, '2019-12-22', '17:30:51', 'Guest', 0, 'Add User | user name Already available', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"admin\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(40, '2019-12-22', '17:30:51', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"admin\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(41, '2019-12-22', '17:30:51', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"admin\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(42, '2019-12-22', '17:31:34', 'Guest', 0, 'Add User | user name Already available', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"admin\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(43, '2019-12-22', '17:31:34', 'Guest', 0, 'Add User | password validation fail', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"admin\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(44, '2019-12-22', '17:31:34', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"admin\",\"123\",\"123\",\"Signup\"]', '127.0.0.1'),
(45, '2019-12-22', '17:32:05', 'Guest', 0, 'Add User | Confirm password validation fail', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"dinum\",\"Dinum@inova#$123\",\"Dinum@inova#$\",\"Signup\"]', '127.0.0.1'),
(46, '2019-12-22', '17:35:28', 'Guest', 0, 'Add User | user name Already available', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"dinum\",\"Dinum@inova123\",\"Dinum@inova123\",\"Signup\"]', '127.0.0.1'),
(47, '2019-12-22', '17:35:52', 'Dinum', 3, 'Add User | Success | ID=2', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"dgsgsdg\",\"dinum2\",\"Dinum@inova123\",\"Dinum@inova123\",\"Signup\"]', '127.0.0.1'),
(48, '2019-12-22', '17:45:29', 'Dinum', 4, 'Add User | Success | ID=3', '[\"Dinum\",\"Dissnayaka\",\"Mahawela\",\"dinum@gmail.com\",\"0770307283\",\"fsaffasfasfasf\",\"cvbdcfhndf\",\"dinum3\",\"Dinum@inova123\",\"Dinum@inova123\",\"Signup\"]', '127.0.0.1'),
(49, '2019-12-22', '17:46:24', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-22 17:46:24', '[]', '127.0.0.1'),
(50, '2019-12-22', '19:16:12', 'Administrator', 1, 'Add Permission | Success | ID=7', '[\"staff_requests\",\"\"]', '127.0.0.1'),
(51, '2019-12-22', '19:16:22', 'Administrator', 1, 'Add Permission | Success | ID=8', '[\"view_staff\",\"\"]', '127.0.0.1'),
(52, '2019-12-22', '19:17:53', 'Administrator', 1, 'Add Role | Success | ID=3', '[\"HR\",[\"7\",\"8\"],\"\"]', '127.0.0.1'),
(53, '2019-12-22', '19:18:55', 'Administrator', 0, 'User LogOut -  / USER - Administrator ID - 1 / Date 2019-12-22 19:18:55', '[]', '127.0.0.1'),
(54, '2019-12-22', '19:19:08', '', 0, 'Login Failed | No Record In Database | User Name=dinum3', '[]', '127.0.0.1'),
(55, '2019-12-22', '19:20:06', '', 0, 'Login Failed | No Record In Database | User Name=admin3', '[]', '127.0.0.1'),
(56, '2019-12-22', '19:20:19', 'dinum3', 0, 'User Login -  / USER - dinum3 ID - 4 / Date 2019-12-22 19:20:19', '[]', '127.0.0.1'),
(57, '2019-12-22', '19:22:57', 'Dinum', 0, 'User LogOut -  / USER - Dinum ID - 4 / Date 2019-12-22 19:22:57', '[]', '127.0.0.1'),
(58, '2019-12-22', '19:23:06', 'dinum2', 0, 'User Login -  / USER - dinum2 ID - 3 / Date 2019-12-22 19:23:06', '[]', '127.0.0.1'),
(59, '2019-12-22', '19:28:31', 'Dinum', 0, 'User LogOut -  / USER - Dinum ID - 3 / Date 2019-12-22 19:28:31', '[]', '127.0.0.1'),
(60, '2019-12-22', '19:28:38', 'dinum2', 0, 'User Login -  / USER - dinum2 ID - 3 / Date 2019-12-22 19:28:38', '[]', '127.0.0.1'),
(61, '2019-12-22', '19:35:26', 'Dinum', 0, 'User LogOut -  / USER - Dinum ID - 3 / Date 2019-12-22 19:35:26', '[]', '127.0.0.1'),
(62, '2019-12-22', '19:35:33', 'admin', 0, 'User Login -  / USER - admin ID - 1 / Date 2019-12-22 19:35:33', '[]', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `tblpermission`
--

DROP TABLE IF EXISTS `tblpermission`;
CREATE TABLE IF NOT EXISTS `tblpermission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` text NOT NULL,
  `created_date` datetime NOT NULL,
  `special_permission` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
(8, 'view_staff', '2019-12-22 19:16:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblroles`
--

DROP TABLE IF EXISTS `tblroles`;
CREATE TABLE IF NOT EXISTS `tblroles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `added_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblroles`
--

INSERT INTO `tblroles` (`id`, `name`, `description`, `added_date`) VALUES
(1, 'Administrator', NULL, '2019-12-22'),
(2, 'Guest', NULL, '2019-12-22'),
(3, 'HR', NULL, '2019-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `detail_id` int(10) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `email` varchar(300) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `added_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `detail_id`, `name`, `description`, `email`, `username`, `password`, `added_date`, `status`) VALUES
(1, NULL, 'Administrator', NULL, 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', '2019-12-14', 1),
(2, 1, 'Dinum', NULL, 'dinum@gmail.com', 'dinum', '887bc63001cae9e14130628f2bf8b21a', '2019-12-22', 0),
(3, 2, 'Dinum', NULL, 'dinum@gmail.com', 'dinum2', '887bc63001cae9e14130628f2bf8b21a', '2019-12-22', 1),
(4, 3, 'Dinum', NULL, 'dinum@gmail.com', 'dinum3', '887bc63001cae9e14130628f2bf8b21a', '2019-12-22', 1);

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
  `address` text,
  `qualification` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `added_date` datetime NOT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_details`
--

INSERT INTO `tbl_user_details` (`id`, `fname`, `mname`, `lname`, `email`, `mobile`, `address`, `qualification`, `status`, `added_date`, `updated_date`) VALUES
(1, 'Dinum', 'Dissnayaka', 'Mahawela', 'dinum@gmail.com', 770307283, 'fsaffasfasfasf', 'dgsgsdg', 2, '2019-12-22 17:32:32', NULL),
(2, 'Dinum', 'Dissnayaka', 'Mahawela', 'dinum@gmail.com', 770307283, 'fsaffasfasfasf', 'dgsgsdg', 2, '2019-12-22 17:35:52', NULL),
(3, 'Dinum', 'Dissnayaka', 'Mahawela', 'dinum@gmail.com', 770307283, 'fsaffasfasfasf', 'cvbdcfhndf', 1, '2019-12-22 17:45:29', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
