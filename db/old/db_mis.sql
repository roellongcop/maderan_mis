-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2018 at 07:07 AM
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
CREATE DATABASE IF NOT EXISTS `db_mis` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_mis`;

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
(1, 'Maderan System', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'resources/src/uploads/Penguins.jpg');

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

--
-- Dumping data for table `tbl_achievement`
--

INSERT INTO `tbl_achievement` (`id`, `name`, `description`, `photo`, `status`) VALUES
(1, 'best in cleaning', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'resources/src/uploads/Desert and the sands.jpg', 'active'),
(2, 'best in cleaning', '1212', 'resources/src/uploads/1.jpg', 'active');

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
(1, '18', '18', 'active'),
(2, '9b', 'lower', 'active'),
(3, '12', 'doon may court', 'active');

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
(2, '23', '23', 'equipment', 'active'),
(3, 'tables', '4 legged table\r\n', 'equipment', 'active'),
(4, 'tablets', 'blah blah', 'medicine', 'active'),
(5, 'syrup', 'liquid items', 'medicine', 'active');

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
(1, 'sample', 'asd', 2, 1, 1, 'reserved', 0.00, 'wqeqwe', '0000-00-00 00:00:00', '2018-11-09 15:05:47'),
(2, 'basketball', 'spalding', 3, 1, 0, 'active', 50.00, '', '2018-11-05 05:20:52', '2018-11-09 11:39:35'),
(3, 'sound system', 'lorem ipsum', 3, 1, 1, 'reserved', 500.00, '', '2018-11-06 04:07:35', '2018-11-09 15:05:47');

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

--
-- Dumping data for table `tbl_history`
--

INSERT INTO `tbl_history` (`id`, `name`, `description`, `photo`, `status`) VALUES
(1, 'Legend', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', 'active'),
(2, 'best in dessert camp', 'sample', 'resources/src/uploads/Koala.jpg', 'active');

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

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`id`, `path`, `name`, `date_added`) VALUES
(2, '/resources/src/images/shoppy.jpg', 'sample', '2018-11-14 01:08:05'),
(3, '/resources/src/images/pro1.jpg', 'Laptop', '2018-11-14 01:08:05'),
(4, '/resources/src/images/pro2.jpg', 'Bag', '2018-11-14 01:08:05'),
(5, '/resources/src/images/pro3.jpg', 'Laptop', '2018-11-14 01:08:05'),
(6, '/resources/src/images/pro4.jpg', 'Laptop', '2018-11-14 01:08:05'),
(7, '/resources/src/images/pro5.jpg', 'sample', '2018-11-14 01:08:05'),
(8, '/resources/src/images/pro6.jpg', 'Laptop', '2018-11-14 01:08:05');

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
(1, 1, '19', '19', 'active'),
(2, 2, '23', '2323', 'active'),
(3, 1, '45', 'sample\r\n', 'active'),
(4, 3, '56', 'qwerty', 'active');

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
  `expiration_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`id`, `name`, `description`, `category_id`, `quantity`, `price`, `unit_id`, `expiration_date`, `status`, `date_added`, `date_updated`) VALUES
(2, 'tempra', 'blah blah', 4, 100, 200.00, 1, '2018-11-14', 'active', '2018-11-05 05:30:50', '2018-11-06 11:41:32'),
(3, 'biogesic', 'blah blah', 5, 100, 500.00, 1, '2018-11-15', 'active', '2018-11-09 03:32:17', '2018-11-09 11:32:17');

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
(1, 2, 4, 'active'),
(2, 5, 3, 'active'),
(3, 6, 5, 'active');

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
  `sex` enum('male','female') NOT NULL,
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
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_people`
--

INSERT INTO `tbl_people` (`id`, `fname`, `mname`, `lname`, `age`, `sex`, `mobile_no`, `tel_no`, `email`, `blk_id`, `lot_id`, `street_id`, `position_id`, `date_of_birth`, `place_of_birth`, `sss`, `tin`, `contact_person`, `contact_no`, `relationship`, `photo`, `status`) VALUES
(2, 'roel', 'rivera', 'longcop', 22, 'male', '', '', '', 2, 2, 2, 1, '', '', '', '', '', '', '', '', 'active'),
(3, 'annabelle', 'baltazar', 'gernale', 19, 'female', '092329321', 'n/a', 'sample@gmail.com', 1, 1, 1, 1, '2018-11-16', 'gma', '', '', 'guardian test', '092374332', 'mother', 'resources/src/uploads/6.jpg', 'active'),
(4, 'dezza', 'lumiano', 'evangelista', 20, 'female', '', '', '', 3, 4, 3, 2, '', '', '', '', '', '', '', '', 'active'),
(5, 'jeffrey', 'barozzo', 'darupan', 24, 'male', '', '', '', 1, 3, 1, 1, '', '', '', '', '', '', '', 'resources/src/uploads/Chrysanthemum.jpg', 'active'),
(6, 'karl', 'solomon', 'flores', 52, 'male', '', '', '', 3, 4, 3, 1, '', '', '', '', '', '', '', 'resources/src/uploads/Tulips.jpg', 'active');

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

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`id`, `name`, `description`, `blk_id`, `lot_id`, `street_id`, `is_rentable`, `rent_price`, `photo`, `status`) VALUES
(1, 'court', '15x15 meters court covered', 1, 1, 1, 1, 50.00, '', 'active'),
(2, 'maderan stadium', '1000 person compact special', 2, 2, 2, 1, 500.00, '', 'reserved'),
(3, 'school', 'elementarty', 3, 4, 3, 0, 50.00, '', 'active'),
(4, 'garden', 'the best garden', 3, 4, 3, 1, 500.00, 'resources/src/uploads/Desert and the sands.jpg', 'active');

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
(1, 'child', 'child only', 'family', 'active'),
(2, 'head', 'its the guardian of the family', 'family', 'active'),
(3, 'Brgy. Captain', 'Incharge', 'official', 'active'),
(4, 'Vice captain', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'official', 'active'),
(5, 'kagawad', 'somenone', 'official', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservation`
--

CREATE TABLE `tbl_reservation` (
  `id` int(10) NOT NULL,
  `people_id` int(10) NOT NULL,
  `date_from` datetime NOT NULL,
  `date_to` datetime NOT NULL,
  `reference_id` int(10) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservation`
--

INSERT INTO `tbl_reservation` (`id`, `people_id`, `date_from`, `date_to`, `reference_id`, `type`, `status`) VALUES
(1, 2, '2018-11-13 03:23:00', '2018-11-22 02:32:00', 2, 'equipment', 'returned'),
(2, 2, '2018-11-21 02:23:00', '2018-11-21 03:23:00', 2, 'place', 'reserved'),
(3, 5, '2018-11-14 02:32:00', '2018-11-21 02:32:00', 3, 'equipment', 'reserved'),
(4, 5, '2018-11-22 02:32:00', '2018-11-22 03:12:00', 1, 'equipment', 'reserved');

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
(1, 1, 'macaria', 'macaria', 'active'),
(2, 2, 'governors drive', 'dasdasdas', 'active'),
(3, 3, 'rizal', 'qweqewqwe', 'active');

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
(1, 'pieces', 'lorem ipsum', 'active');

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
(1, 'admin1', '$2y$13$oOma6SrbfF.f7Vkd0B9XeOYvI6ek70.L8kN39kjjQ1sFbHW6cYdOq', 'secretary', 'wdctcZW2zf', '_EPAFNFMQE', 'active');

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
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_block`
--
ALTER TABLE `tbl_block`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_history`
--
ALTER TABLE `tbl_history`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_lot`
--
ALTER TABLE `tbl_lot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_official`
--
ALTER TABLE `tbl_official`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_people`
--
ALTER TABLE `tbl_people`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_reservation`
--
ALTER TABLE `tbl_reservation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_street`
--
ALTER TABLE `tbl_street`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
