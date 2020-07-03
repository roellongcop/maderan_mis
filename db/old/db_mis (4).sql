-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2019 at 03:31 PM
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
(1, 'Maderan System', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'resources/src/uploads/maderanlogo.jpg');

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
(2, '10', 'block 10', 'active'),
(3, '7b', 'block 7b', 'active');

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

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `description`, `type`, `status`) VALUES
(1, 'Chair', 'Wooden Chair', 'equipment', 'active'),
(2, 'syrup', 'syrup', 'medicine', 'active'),
(3, 'plastics', 'plastics', 'equipment', 'active');

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
  `partner_id` int(11) NOT NULL,
  `child_name` varchar(191) NOT NULL,
  `child_born` date NOT NULL,
  `child_relationship` varchar(191) NOT NULL,
  `resident_since` date NOT NULL,
  `living_together` varchar(64) NOT NULL,
  `findings` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_certificate`
--

INSERT INTO `tbl_certificate` (`id`, `name`, `user_id`, `purpose`, `business_name`, `business_address`, `business_foreclosed`, `partner_since`, `partner_id`, `child_name`, `child_born`, `child_relationship`, `resident_since`, `living_together`, `findings`, `status`, `created_at`, `updated_at`) VALUES
(1, 'business_clearance', 1, '', 'Business Name', 'Business Address', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', '', '', 0, '2019-09-03 11:19:05', '2019-09-03 11:19:05'),
(2, 'business_closure', 1, '', 'Business Name', 'Business Address', '0000-00-00', '0000-00-00', 0, '', '0000-00-00', '', '0000-00-00', '', '', 0, '2019-09-09 10:12:03', '2019-09-09 10:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complainant`
--

CREATE TABLE `tbl_complainant` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blotter_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_complainant`
--

INSERT INTO `tbl_complainant` (`id`, `user_id`, `blotter_id`, `status`, `created_at`, `updated_at`) VALUES
(16, 2, 0, 0, '2019-09-09 13:30:55', '2019-09-09 13:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE `tbl_equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(10) NOT NULL,
  `unit_id` int(10) NOT NULL,
  `is_rentable` tinyint(1) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rent_price` float(10,2) NOT NULL,
  `image` text NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`id`, `name`, `description`, `category_id`, `unit_id`, `is_rentable`, `status`, `rent_price`, `image`, `date_added`, `date_updated`) VALUES
(2, 'table', '2323', 3, 1, 1, 'active', 23.00, '', '2019-09-09 12:57:18', '2019-09-09 06:31:03');

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
(1, 2, '45', 'Lot No 45', 'active'),
(2, 2, '11', 'Lot 11', 'active');

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

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id`, `name`, `description`, `category_id`, `quantity`, `price`, `unit_id`, `expiration_date`, `batch_no`, `status`, `date_added`, `date_updated`) VALUES
(2, 'gems', 'gems', 2, 232, 2323.00, 1, '07/17/2025', 'gems', 'active', '2019-09-09 13:00:17', '2019-09-09 05:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1558618561);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_official`
--

CREATE TABLE `tbl_official` (
  `id` int(10) NOT NULL,
  `people_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_official`
--

INSERT INTO `tbl_official` (`id`, `people_id`, `position_id`, `status`) VALUES
(1, 1, 2, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_people`
--

CREATE TABLE `tbl_people` (
  `id` int(10) NOT NULL,
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
  `civil_status` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_people`
--

INSERT INTO `tbl_people` (`id`, `fname`, `mname`, `lname`, `age`, `sex`, `mobile_no`, `tel_no`, `email`, `blk_id`, `lot_id`, `street_id`, `position_id`, `date_of_birth`, `place_of_birth`, `sss`, `tin`, `contact_person`, `contact_no`, `relationship`, `photo`, `is_resident`, `status`, `civil_status`) VALUES
(1, 'John', 'Marie', 'Doe', 49, 'male', '213', '123', 'test@gmail.com', 2, 1, 1, 1, '01/01/1970', '123', '123', '123', '213', '123', 'father', 'resources/src/uploads/maderanlogo.jpg', 0, 'active', 'married'),
(2, 'leo', 'Midd', 'Doe', 49, 'male', '123123123', '3354634234', 'test@gmail.com', 2, 1, 1, 1, '01/01/1970', 'laguna', '654645352', '423423423', 'Leonard Santos', '3354634234', 'father', 'resources/src/uploads/back-bar.jpg', 1, 'active', 'single'),
(3, 'Joshua', 'Midd', 'Doe', 49, 'male', '123123123', '3354634234', 'test@gmail.com', 2, 1, 1, 1, '01/01/1970', 'laguna', '654645352', '423423423', 'Leonard Santos', '3354634234', 'father', 'resources/src/uploads/back-bar.jpg', 1, 'deleted', 'single');

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

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`id`, `name`, `description`, `type`, `status`) VALUES
(1, 'head', 'head of the family', 'family', 'active'),
(2, 'brgy captain', 'brgy captain', 'official', 'active'),
(3, 'secretary', 'secretary', 'official', 'active');

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
  `startus` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_respondent`
--

INSERT INTO `tbl_respondent` (`id`, `user_id`, `blotter_id`, `startus`, `created_at`, `updated_at`) VALUES
(3, 1, 0, 0, '2019-09-09 13:30:02', '2019-09-09 13:30:02');

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
(1, 2, 'Rizal', 'Rizal', 'active');

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

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id`, `name`, `description`, `status`) VALUES
(1, 'pieces', 'pieces', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `accessToken` varchar(200) NOT NULL,
  `authKey` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `type`, `accessToken`, `authKey`, `status`) VALUES
(1, 'secretary', '$2y$13$wRmsSoAyYblOf7tFqEG8SOZNKewuVwumUn45WYMeIjTBm4dbZyzOa', 'secretary', 'PdVaSGtlyU', '6ONFU-TKZM', 'active'),
(2, 'staff', '$2y$13$tZYpISQqDu9Nm6hboMd0AuaCKB9UvrCRXxmQE9Ws9O.eCfumgrNg6', 'staff', 'DlSTlrBDoR', '2IYRDEKASW', 'active'),
(3, 'head', '$2y$13$IRWLQSf6jXb/B.eoPjV.yeEQzVwXJwdtrTJ4MqR0QA84Rov2caDoK', 'head', 'zVgIdvBiec', 'UH6AI9CAJ-', 'active'),
(4, 'midwife', '$2y$13$WoC4jpBUzqhlXqpjVHAmAOncv6Uqs2LhMi5FTvDqdftVOEJIlXAGm', 'midwife', 'D5wmN7TBJu', 'OOF0FVWBOR', 'active');

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
-- Indexes for table `tbl_migration`
--
ALTER TABLE `tbl_migration`
  ADD PRIMARY KEY (`version`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_blotter`
--
ALTER TABLE `tbl_blotter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_certificate`
--
ALTER TABLE `tbl_certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_complainant`
--
ALTER TABLE `tbl_complainant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_official`
--
ALTER TABLE `tbl_official`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_people`
--
ALTER TABLE `tbl_people`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_respondent`
--
ALTER TABLE `tbl_respondent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_street`
--
ALTER TABLE `tbl_street`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
