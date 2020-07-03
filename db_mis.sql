-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2020 at 07:33 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `name`, `description`, `photo`) VALUES
(1, 'MADERAN SYSTEM', 'MADERAN SYSTEM', 'RESOURCES/SRC/UPLOADS/MADERANLOGO.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_achievement`
--

CREATE TABLE `tbl_achievement` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_block`
--

CREATE TABLE `tbl_block` (
  `id` int(10) NOT NULL,
  `blk_no` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_block`
--

INSERT INTO `tbl_block` (`id`, `blk_no`, `description`, `status`) VALUES
(1, '18', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blotter`
--

CREATE TABLE `tbl_blotter` (
  `id` int(11) NOT NULL,
  `case_no` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `nature_of_case` tinyint(1) NOT NULL,
  `action_taken` tinyint(1) DEFAULT NULL,
  `remarks` tinyint(1) NOT NULL,
  `in_charge` int(11) NOT NULL,
  `date_happen` date NOT NULL,
  `time_happen` time NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificate`
--

CREATE TABLE `tbl_certificate` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purpose` text NOT NULL,
  `business_name` varchar(191) NOT NULL,
  `business_address` text NOT NULL,
  `business_foreclosed` date NOT NULL,
  `partner_since` date NOT NULL,
  `partner_id` int(11) DEFAULT NULL,
  `child_name` varchar(191) NOT NULL,
  `child_born` date NOT NULL,
  `child_relationship` varchar(191) NOT NULL,
  `resident_since` date NOT NULL,
  `living_together` varchar(64) NOT NULL,
  `findings` text NOT NULL,
  `others` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainant`
--

CREATE TABLE `tbl_complainant` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blotter_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_complainant`
--

INSERT INTO `tbl_complainant` (`id`, `user_id`, `blotter_id`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 0, '', 0, '2020-03-13 05:10:21', '2020-03-13 05:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_distribution`
--

CREATE TABLE `tbl_distribution` (
  `id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employment`
--

CREATE TABLE `tbl_employment` (
  `id` int(11) NOT NULL,
  `people_id` int(11) NOT NULL,
  `company_name` varchar(256) NOT NULL,
  `duration_from` date NOT NULL,
  `duration_to` date NOT NULL,
  `address` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employment`
--

INSERT INTO `tbl_employment` (`id`, `people_id`, `company_name`, `duration_from`, `duration_to`, `address`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 'Filweb Asia INC', '2019-05-07', '2020-03-12', 'San Pedro Laguna', 0, '2020-03-13 03:59:33', '2020-03-13 03:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE `tbl_equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `category_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `is_rentable` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rent_price` float(10,2) DEFAULT NULL,
  `image` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE `tbl_history` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `id` int(10) NOT NULL,
  `path` text NOT NULL,
  `name` varchar(200) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lot`
--

CREATE TABLE `tbl_lot` (
  `id` int(10) NOT NULL,
  `block_id` int(10) NOT NULL,
  `lot_no` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lot`
--

INSERT INTO `tbl_lot` (`id`, `block_id`, `lot_no`, `description`, `status`) VALUES
(1, 1, '10', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` float(10,2) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `expiration_date` varchar(50) NOT NULL,
  `batch_no` varchar(32) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nature_of_cases`
--

CREATE TABLE `tbl_nature_of_cases` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_occupant`
--

CREATE TABLE `tbl_occupant` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `occupant_id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_occupant`
--

INSERT INTO `tbl_occupant` (`id`, `user_id`, `occupant_id`, `type`) VALUES
(1, 1, 2, 'spouse'),
(2, 2, 1, 'spouse'),
(3, 1, 3, 'son');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_official`
--

CREATE TABLE `tbl_official` (
  `id` int(10) NOT NULL,
  `people_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `position` varchar(64) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_people`
--

CREATE TABLE `tbl_people` (
  `id` int(10) NOT NULL,
  `control_no` varchar(32) NOT NULL,
  `religion` varchar(128) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `tel_no` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `blk_id` int(10) NOT NULL,
  `lot_id` int(10) NOT NULL,
  `street_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `place_of_birth` text NOT NULL,
  `sss` varchar(50) NOT NULL,
  `tin` varchar(50) NOT NULL,
  `contact_person` varchar(200) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `is_resident` int(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  `civil_status` varchar(64) NOT NULL,
  `height` varchar(32) NOT NULL,
  `weight` varchar(32) NOT NULL,
  `length_of_stay` int(11) NOT NULL,
  `income` float(10,2) NOT NULL,
  `employment_id` int(11) NOT NULL,
  `occupation` text NOT NULL,
  `spouse_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `family_position` varchar(32) NOT NULL,
  `date_id_issued` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_people`
--

INSERT INTO `tbl_people` (`id`, `control_no`, `religion`, `fname`, `mname`, `lname`, `age`, `sex`, `mobile_no`, `tel_no`, `email`, `blk_id`, `lot_id`, `street_id`, `position_id`, `date_of_birth`, `place_of_birth`, `sss`, `tin`, `contact_person`, `contact_no`, `relationship`, `photo`, `is_resident`, `status`, `civil_status`, `height`, `weight`, `length_of_stay`, `income`, `employment_id`, `occupation`, `spouse_id`, `parent_id`, `family_position`, `date_id_issued`) VALUES
(1, '2020-03-00003', NULL, 'John', 'Hance', 'Doe', 49, 'male', '09763876582', '82649210', 'john@test.com', 1, 1, 1, 0, '07/09/1970', 'GMA Cavite', '4567890', '4567890', 'Rodman Doe', '09752836128', 'neighbor', 'resources/src/uploads/dgth.jpg', 0, 'In-active', 'married', '179', '76', 10, 20000.00, 0, '', 0, 0, '', '2020-03-13'),
(2, '2020-03-00002', NULL, 'Jane', 'Hance', 'Doe', 11, '', '', '', '', 0, 0, 0, 0, '2008-05-14', '', '', '', '', '', '', '', 1, 'active', 'widowed', '', '', 0, 0.00, 0, 'None', 0, 0, 'spouse', '0000-00-00'),
(3, '2020-03-00004', 'Catholic', 'Hance', 'Leo', 'Doe', 0, 'female', '', '', '', 1, 1, 1, 0, '03/10/2020', 'GMA', '', '', 'test', '09124329237', '', '', 1, 'active', 'single', '11', '23', 0, 0.00, 0, 'N/A', 0, 0, 'son', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_people_parent`
--

CREATE TABLE `tbl_people_parent` (
  `id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `blk_id` int(10) NOT NULL,
  `lot_id` int(10) NOT NULL,
  `street_id` int(10) NOT NULL,
  `is_rentable` tinyint(1) NOT NULL,
  `rent_price` float(10,2) NOT NULL,
  `photo` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `id` int(10) NOT NULL,
  `people_id` int(10) NOT NULL,
  `date_from` varchar(50) NOT NULL,
  `date_to` varchar(50) NOT NULL,
  `reference_id` int(10) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_respondent`
--

CREATE TABLE `tbl_respondent` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blotter_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_respondent`
--

INSERT INTO `tbl_respondent` (`id`, `user_id`, `blotter_id`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 0, '', 0, '2020-03-13 05:13:03', '2020-03-13 05:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `access` text NOT NULL,
  `role_access` text NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`, `access`, `role_access`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Barangay Captain', '{\"about\":[\"index\",\"view\"],\"achievement\":[\"index\",\"view\"],\"block\":[\"index\",\"view\"],\"blotter\":[\"index\",\"view\",\"summary\",\"form\"],\"certificate\":[\"index\",\"view\",\"form\"],\"complainant\":[\"index\",\"view\"],\"dashboard\":[\"index\"],\"distribution\":[\"index\",\"view\"],\"employment\":[\"index\",\"view\",\"form\"],\"equipment-category\":[\"index\",\"view\"],\"equipment\":[\"index\",\"view\",\"load\",\"print\"],\"history\":[\"index\",\"view\"],\"image\":[\"index\",\"view\"],\"lot\":[\"index\",\"view\",\"load\"],\"medicine-category\":[\"index\",\"view\"],\"medicine\":[\"index\",\"view\",\"print\"],\"nature-of-cases\":[\"index\",\"view\"],\"occupant\":[\"index\",\"view\"],\"official\":[\"index\",\"view\"],\"people\":[\"index\",\"print-resident\",\"print-not-resident\",\"not-resident\",\"view\",\"load\",\"card\",\"get-siblings\",\"print-id\",\"form\",\"id-summary\"],\"people-parent\":[\"index\",\"view\"],\"place\":[\"index\",\"view\",\"load\"],\"position\":[\"index\",\"view\"],\"reservation\":[\"index\",\"view\",\"detail\"],\"respondent\":[\"index\",\"view\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\"],\"street\":[\"index\",\"view\",\"load\"],\"unit\":[\"index\",\"view\"],\"user\":[\"index\",\"view\"]}', '[\"1\",\"10\",\"11\",\"8\",\"9\"]', 1, '2020-01-27 05:48:39', '2020-02-01 17:56:46'),
(8, 'Secretary', '{\"about\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"achievement\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"block\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"certificate\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"form\"],\"dashboard\":[\"index\"],\"employment\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"form\"],\"history\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"image\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"lot\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\"],\"occupant\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"official\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"people\":[\"index\",\"print-resident\",\"print-not-resident\",\"not-resident\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"card\",\"get-siblings\",\"print-id\",\"form\",\"id-summary\"],\"people-parent\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"place\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\"],\"reservation\":[\"detail\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\"],\"street\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\"],\"unit\":[\"create\"],\"user\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}', '[\"1\",\"10\",\"11\",\"8\",\"9\"]', 1, '2020-01-31 06:11:40', '2020-02-01 23:12:09'),
(9, 'Staff', '{\"certificate\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"form\"],\"dashboard\":[\"index\"],\"employment\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"form\"],\"equipment-category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"equipment\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"print\"],\"image\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"lot\":[\"load\"],\"medicine-category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"medicine\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"print\"],\"occupant\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"people\":[\"index\",\"print-resident\",\"print-not-resident\",\"not-resident\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"card\",\"get-siblings\",\"print-id\",\"form\",\"id-summary\"],\"people-parent\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"reservation\":[\"index\",\"view\",\"create\",\"return\",\"update\",\"delete\",\"detail\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\"],\"street\":[\"load\"],\"unit\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"user\":[\"update\"]}', 'null', 1, '2020-01-31 06:11:56', '2020-02-01 23:28:43'),
(10, 'Head', '{\"blotter\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"summary\",\"form\"],\"certificate\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"form\"],\"complainant\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"dashboard\":[\"index\"],\"employment\":[\"form\"],\"lot\":[\"load\"],\"occupant\":[\"update\",\"delete\"],\"people\":[\"index\",\"print-resident\",\"print-not-resident\",\"not-resident\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"card\",\"get-siblings\",\"print-id\",\"form\",\"id-summary\"],\"people-parent\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"respondent\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\"],\"street\":[\"load\"]}', 'null', 1, '2020-01-31 06:12:11', '2020-02-01 23:20:47'),
(11, 'MidWife', '{\"dashboard\":[\"index\"],\"distribution\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"employment\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"form\"],\"equipment-category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"equipment\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"print\"],\"lot\":[\"load\"],\"medicine-category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"medicine\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"print\"],\"occupant\":[\"update\",\"delete\"],\"people\":[\"index\",\"print-resident\",\"print-not-resident\",\"not-resident\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"get-siblings\",\"print-id\",\"form\",\"id-summary\"],\"people-parent\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\"],\"street\":[\"load\"],\"unit\":[\"index\",\"view\",\"create\",\"update\",\"delete\"]}', 'null', 1, '2020-01-31 06:12:40', '2020-02-01 23:35:26'),
(12, 'DEVELOPER', '{\"about\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"achievement\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"block\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"blotter\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"summary\",\"form\"],\"certificate\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"form\"],\"complainant\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"dashboard\":[\"index\"],\"distribution\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"employment\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"form\"],\"equipment-category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"equipment\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"print\"],\"history\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"image\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"lot\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\"],\"medicine-category\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"medicine\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"print\"],\"nature-of-cases\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"occupant\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"official\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"people\":[\"index\",\"print-resident\",\"print-not-resident\",\"not-resident\",\"view\",\"create\",\"update\",\"delete\",\"load\",\"card\",\"get-siblings\",\"print-id\",\"form\",\"id-summary\"],\"people-parent\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"place\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\"],\"position\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"reservation\":[\"index\",\"view\",\"create\",\"return\",\"update\",\"delete\",\"detail\"],\"respondent\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"role\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"seed\":[\"block\",\"street\",\"lot\",\"place\",\"history\",\"achievement\",\"people\",\"set-spouse\",\"blotter\",\"respondent\",\"complainant\"],\"site\":[\"index\",\"login\",\"logout\",\"contact\",\"about\"],\"street\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"load\"],\"unit\":[\"index\",\"view\",\"create\",\"update\",\"delete\"],\"user\":[\"index\",\"view\",\"create\",\"update\",\"delete\",\"dashboard\"]}', '[\"12\",\"1\",\"10\",\"11\",\"8\",\"9\"]', 1, '2020-01-31 07:06:39', '2020-03-13 05:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_street`
--

CREATE TABLE `tbl_street` (
  `id` int(10) NOT NULL,
  `block_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_street`
--

INSERT INTO `tbl_street` (`id`, `block_id`, `name`, `description`, `status`) VALUES
(1, 1, 'Macaria Streer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `accessToken` varchar(200) NOT NULL,
  `authKey` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `type`, `role_id`, `accessToken`, `authKey`, `status`) VALUES
(1, 'celito', '$2y$13$RrzOqs25hplYdVBpiTdjce9dWURMPk4/gblxzK2RIKmBGAx7m679G', 'secretary', 8, 'paVuenJuRP', 'IXXAOHI5CU', 'active'),
(2, 'renato', '$2y$13$3NLFrK5RsjauZlDD1Xd8KeT/IROMNWo4UY6EFDtXSD1MtYmKWAXN6', 'staff', 9, '7fvslYBw88', 'E2S-LX06T7', 'active'),
(3, 'clarito', '$2y$13$niB43Jse4N/wJYVlGzu2OulTiRGh2E.PJHkZHhRzG3eTc44V6hBqK', 'head', 10, '8Umr6UabDW', 'U8XCLWC6I-', 'active'),
(4, 'pia', '$2y$13$eBjuHSc.VrltDvV7k5ZBbOdJF8ePwQlaOLhZp7mNw3I2E3OAAWJIC', 'midwife', 11, 'cJ4dqP3sLQ', 'QQ6WJEYEVX', 'active'),
(5, 'admin', '$2y$13$1LX5wfdee9qMGfG7Pdu/eOxphqi/VX1zX99tcmZpdSHwEudNLu8i6', '', 12, 'ikZ1IHlP43', 'JQBAU0YRSO', 'active'),
(6, 'captain', '$2y$13$YVyJkxXMBXW8GZ1teeBb0e7v41bn2GtjK9cG0RjRuGzZ1iivZVfxO', '', 1, 'LHv4qfo_AR', 'GOOP7HJ8XG', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_achievement`
--
ALTER TABLE `tbl_achievement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_block`
--
ALTER TABLE `tbl_block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_certificate`
--
ALTER TABLE `tbl_certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_complainant`
--
ALTER TABLE `tbl_complainant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_distribution`
--
ALTER TABLE `tbl_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employment`
--
ALTER TABLE `tbl_employment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lot`
--
ALTER TABLE `tbl_lot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_nature_of_cases`
--
ALTER TABLE `tbl_nature_of_cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_occupant`
--
ALTER TABLE `tbl_occupant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_official`
--
ALTER TABLE `tbl_official`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_people`
--
ALTER TABLE `tbl_people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_people_parent`
--
ALTER TABLE `tbl_people_parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_respondent`
--
ALTER TABLE `tbl_respondent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_street`
--
ALTER TABLE `tbl_street`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_achievement`
--
ALTER TABLE `tbl_achievement`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_block`
--
ALTER TABLE `tbl_block`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_certificate`
--
ALTER TABLE `tbl_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_complainant`
--
ALTER TABLE `tbl_complainant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_distribution`
--
ALTER TABLE `tbl_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employment`
--
ALTER TABLE `tbl_employment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_lot`
--
ALTER TABLE `tbl_lot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_nature_of_cases`
--
ALTER TABLE `tbl_nature_of_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_occupant`
--
ALTER TABLE `tbl_occupant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_official`
--
ALTER TABLE `tbl_official`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_people`
--
ALTER TABLE `tbl_people`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_people_parent`
--
ALTER TABLE `tbl_people_parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_respondent`
--
ALTER TABLE `tbl_respondent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_street`
--
ALTER TABLE `tbl_street`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
