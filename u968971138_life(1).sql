-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2018 at 04:56 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u968971138_life`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emergency`
--

CREATE TABLE `tbl_emergency` (
  `emergency_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `type_id` int(11) NOT NULL,
  `inst_id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `e_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_emergency`
--

INSERT INTO `tbl_emergency` (`emergency_id`, `user_id`, `latitude`, `longitude`, `type_id`, `inst_id`, `date`, `time`, `e_status`) VALUES
(1, 1, '10.055357', '76.618048', 1, 1, '22/02/2018', '11:00', 'Verified'),
(2, 2, '10.054357', '76.617048', 3, 2, '30/12/2017', '11:11', 'Verified'),
(3, 3, '10.054357', '76.618048', 1, 1, '30/11/2017', '10:20', 'Verified'),
(4, 4, '9.985281', '76.578487', 3, 5, '1/1/2018', '8:30', 'Verified'),
(5, 5, '9.894083', '76.617048', 2, 4, '20/02/2018', '17:15', 'closed'),
(6, 7, '10.055357', '76.475825', 1, 1, '09/01/2018', '9:50', 'open'),
(7, 1, '10.054557', '76.581916', 1, 1, '31/12/2017', '14:10', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emerg_details`
--

CREATE TABLE `tbl_emerg_details` (
  `em_det_id` int(11) NOT NULL,
  `emergency_id` int(11) NOT NULL,
  `document` varchar(30) NOT NULL,
  `notes` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `d_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_emerg_details`
--

INSERT INTO `tbl_emerg_details` (`em_det_id`, `emergency_id`, `document`, `notes`, `date`, `d_status`) VALUES
(1, 2, 'Module1.jpg', '', '03/01/2017', 'Verified'),
(2, 3, 'Module2.jpg', '', '03/01/2017', 'Verified'),
(3, 7, 'Module3.jpg', '', '1/1/2018', 'Not Verified'),
(4, 4, 'Module4.jpg', '', '1/1/2018', 'Verified'),
(5, 7, 'Module5.jpg', '', '2/1/2018', 'Verified'),
(8, 1, 'null142.jpg', '', '21/02/2018', 'Verified'),
(9, 1, 'null8480.jpg', '', '22/02/2018', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emerg_island`
--

CREATE TABLE `tbl_emerg_island` (
  `emergency_id` int(11) NOT NULL,
  `island_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emerg_type`
--

CREATE TABLE `tbl_emerg_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_emerg_type`
--

INSERT INTO `tbl_emerg_type` (`type_id`, `type_name`) VALUES
(1, 'Hospital'),
(2, 'Blood Bank'),
(3, 'Police Station');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_institution`
--

CREATE TABLE `tbl_institution` (
  `inst_id` int(11) NOT NULL,
  `inst_name` varchar(60) NOT NULL,
  `inst_phno` varchar(30) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_institution`
--

INSERT INTO `tbl_institution` (`inst_id`, `inst_name`, `inst_phno`, `latitude`, `longitude`, `type_id`) VALUES
(1, 'Mar Baselious Medical Mission Hospital', '0485 2822203', '10.064471', '76.622376', 1),
(2, 'Kothamangalam Police Station', '0485 2862328', '10.064502', '76.6225425', 3),
(3, 'Malankara Orthodox Syrian Church Hospital Kolenchery', '0484 305 5555', '9.981931', '76.475825', 1),
(4, 'IMA Blood Bank', '04862 221 237', '9.894083', '76.708992', 2),
(5, 'Muvattupuzha Police Station', '0485 283 2304', '9.980643', '76.581906', 3),
(9, 'Blood Bank Kothamangalam', '0485 282 2203', '10.060137', '76.635121', 2),
(10, 'Hospital_CS_Block', '9876543210', '10.052303', '76.618868', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_traffic_island`
--

CREATE TABLE `tbl_traffic_island` (
  `island_id` int(11) NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `t_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_traffic_island`
--

INSERT INTO `tbl_traffic_island` (`island_id`, `latitude`, `longitude`, `t_status`) VALUES
(1, '10.052800', '76.619130', '1'),
(5, '9.60573283 ', '76.78078441', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upstatus`
--

CREATE TABLE `tbl_upstatus` (
  `sid` int(11) NOT NULL,
  `sig` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_upstatus`
--

INSERT INTO `tbl_upstatus` (`sid`, `sig`, `status`) VALUES
(1, 'T1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `aadhar_no` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `dob` varchar(30) NOT NULL,
  `blood_grp` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `u_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `firstname`, `lastname`, `phone_no`, `aadhar_no`, `email_id`, `dob`, `blood_grp`, `password`, `u_status`) VALUES
(1, 'Kevin', 'Kuriakose', '8945613212', '741852963', 'kevink@gmail.com', '11/01/1997', 'B-', 'kevin', 'valid'),
(2, 'Anishil', 'Jose', '1234567899', '987654321', 'anishil@gmail.com', '1/01/1996', 'AB+ve', '2018', 'valid'),
(3, 'Ebin', 'Mathew', '1498982390', '12345678987', 'ebinmathew@gmail.com', '1/05/1996', 'O+ve', '2018', 'valid'),
(4, 'Darshan ', 'Siby', '7445662025', '123464573890', 'darshan@gmail.com', '11/06/1996', 'B+ve', '2018', 'valid'),
(5, 'Anil', 'Jose', '3988267380', '123456789878', 'anil@gmail.com', '23/3/1994', 'A-ve', '2018', 'valid'),
(6, 'Githu', 'Savy', '1498982393', '12345678900', 'githu@gmail.com', '21/12/1995', 'A+ve', '2018', 'new'),
(7, 'Moncy', 'Mody', '1498982395', '123456789877', 'moncy@hotmail.com', '16/4/1995', 'B-ve', '2018', 'terminated'),
(10, 'Kevin', 'Kuriakose', '8111875721', '9847306006', 'kkevin0007@gmail.com', '11/1/2018', 'B-', 'kevin', 'valid'),
(11, 'hi IBM', 'Dunlop', '1234567816', '3835556', 'redmiTeri@implicitly.com', '2666666649/5235/566', 'B-', '1', 'new');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_emergency`
--
ALTER TABLE `tbl_emergency`
  ADD PRIMARY KEY (`emergency_id`);

--
-- Indexes for table `tbl_emerg_details`
--
ALTER TABLE `tbl_emerg_details`
  ADD PRIMARY KEY (`em_det_id`);

--
-- Indexes for table `tbl_emerg_type`
--
ALTER TABLE `tbl_emerg_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_institution`
--
ALTER TABLE `tbl_institution`
  ADD PRIMARY KEY (`inst_id`);

--
-- Indexes for table `tbl_traffic_island`
--
ALTER TABLE `tbl_traffic_island`
  ADD PRIMARY KEY (`island_id`);

--
-- Indexes for table `tbl_upstatus`
--
ALTER TABLE `tbl_upstatus`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_emergency`
--
ALTER TABLE `tbl_emergency`
  MODIFY `emergency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_emerg_details`
--
ALTER TABLE `tbl_emerg_details`
  MODIFY `em_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_emerg_type`
--
ALTER TABLE `tbl_emerg_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_institution`
--
ALTER TABLE `tbl_institution`
  MODIFY `inst_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_traffic_island`
--
ALTER TABLE `tbl_traffic_island`
  MODIFY `island_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_upstatus`
--
ALTER TABLE `tbl_upstatus`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
