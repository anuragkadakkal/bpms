-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2021 at 08:36 AM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppywArkGLZ`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_assignwork`
--

CREATE TABLE `tb_assignwork` (
  `wkid` int(11) NOT NULL,
  `wkdesc` varchar(255) NOT NULL,
  `wkkey` varchar(8) NOT NULL,
  `wkstaffid` int(11) NOT NULL,
  `wkbkkey` varchar(8) NOT NULL,
  `wkstatus` enum('0','1','2','3') NOT NULL,
  `curdate` varchar(255) NOT NULL,
  `dateonly` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_assignwork`
--

INSERT INTO `tb_assignwork` (`wkid`, `wkdesc`, `wkkey`, `wkstaffid`, `wkbkkey`, `wkstatus`, `curdate`, `dateonly`) VALUES
(1, 'Hope that you will do it very nicely.', '39a5ccb7', 1, '89490dbf', '2', '2021-06-15 06:12:41am', '2021-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_attendance`
--

CREATE TABLE `tb_attendance` (
  `attendid` int(11) NOT NULL,
  `attendkey` varchar(8) NOT NULL,
  `attendstaffid` int(11) NOT NULL,
  `punchin` varchar(200) NOT NULL,
  `punchout` varchar(200) DEFAULT NULL,
  `curdate` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_attendance`
--

INSERT INTO `tb_attendance` (`attendid`, `attendkey`, `attendstaffid`, `punchin`, `punchout`, `curdate`) VALUES
(1, '15249aff', 70, '2021-06-15 06:11:07am', '2021-06-15 06:13:10am', '2021-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
  `bk_id` int(11) NOT NULL,
  `bk_key` varchar(8) NOT NULL,
  `bk_fullname` varchar(50) NOT NULL,
  `bk_email` varchar(100) NOT NULL,
  `bk_address` varchar(100) NOT NULL,
  `bk_apdate` varchar(100) NOT NULL,
  `bk_timeslot` varchar(50) NOT NULL,
  `bk_phone` varchar(15) NOT NULL,
  `bk_feedback` varchar(200) DEFAULT NULL,
  `bk_catid` int(11) NOT NULL,
  `bk_subcatid` int(11) NOT NULL,
  `bk_amt` varchar(20) NOT NULL,
  `bk_status` enum('0','1','2','3') NOT NULL,
  `bk_userid` int(11) NOT NULL,
  `astaff` varchar(1) DEFAULT NULL,
  `curdatebook` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`bk_id`, `bk_key`, `bk_fullname`, `bk_email`, `bk_address`, `bk_apdate`, `bk_timeslot`, `bk_phone`, `bk_feedback`, `bk_catid`, `bk_subcatid`, `bk_amt`, `bk_status`, `bk_userid`, `astaff`, `curdatebook`) VALUES
(1, '89490dbf', 'Honey K Kuriakose', 'honeykkuriakose1998@gmail.com', 'Honey Villa', '2021-06-17', '10am - 11am', '8075942707', 'Bill Paid', 2, 2, '350', '1', 69, '1', '2021-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `catid` int(11) NOT NULL,
  `catkey` varchar(8) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catdesc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `catstatus` enum('0','1') NOT NULL DEFAULT '0',
  `loginid` int(11) NOT NULL,
  `delstatus` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`catid`, `catkey`, `catname`, `catdesc`, `catstatus`, `loginid`, `delstatus`) VALUES
(1, '5693d2a7', 'Hair', 'Products used for hair.', '1', 1, '0'),
(2, '9caaf403', 'Face', 'Products used for face.', '1', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `custid` int(11) NOT NULL,
  `custkey` varchar(8) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `proof` varchar(100) NOT NULL,
  `loginid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`custid`, `custkey`, `fname`, `address`, `phone`, `proof`, `loginid`) VALUES
(1, 'c977ea89', 'Honey K Kuriakose', 'Honey Villa', '8075942707', 'aadharvv.jpg', 69);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobapply`
--

CREATE TABLE `tb_jobapply` (
  `applyid` int(11) NOT NULL,
  `applykey` varchar(8) NOT NULL,
  `applyresume` varchar(100) NOT NULL,
  `applyloginid` int(11) NOT NULL,
  `applydate` date NOT NULL,
  `applyjobid` int(11) NOT NULL,
  `applystatus` enum('0','1','2','3') NOT NULL,
  `applyfeedback` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jobs`
--

CREATE TABLE `tb_jobs` (
  `jid` int(11) NOT NULL,
  `jkey` varchar(8) NOT NULL,
  `jtitle` varchar(100) NOT NULL,
  `jqual` varchar(100) NOT NULL,
  `jexp` varchar(50) NOT NULL,
  `jtype` varchar(50) NOT NULL,
  `jskills` varchar(255) NOT NULL,
  `jsalary` varchar(50) NOT NULL,
  `jnovacancy` varchar(5) NOT NULL,
  `jdate` date NOT NULL,
  `jlastdate` date NOT NULL,
  `jdesc` varchar(500) NOT NULL,
  `jstatus` enum('0','1','2','3') NOT NULL,
  `loginid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_leave`
--

CREATE TABLE `tb_leave` (
  `lvid` int(11) NOT NULL,
  `lvkey` varchar(8) NOT NULL,
  `lvuserid` int(11) NOT NULL,
  `lvpurpose` varchar(255) NOT NULL,
  `lvstartdate` varchar(100) NOT NULL,
  `lvenddate` varchar(100) NOT NULL,
  `curdate` varchar(50) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL,
  `lvfeedback` varchar(200) DEFAULT NULL,
  `applydate` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_leave`
--

INSERT INTO `tb_leave` (`lvid`, `lvkey`, `lvuserid`, `lvpurpose`, `lvstartdate`, `lvenddate`, `curdate`, `status`, `lvfeedback`, `applydate`) VALUES
(1, 'e0b1f460', 70, 'Marriage', '2021-06-24', '2021-06-26', '2021-06-15', '1', 'Approved', '2021-06-15 06:13:30 AM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `utype` enum('0','1','2') NOT NULL,
  `delstatus` enum('0','1') NOT NULL,
  `atstatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `status`, `utype`, `delstatus`, `atstatus`) VALUES
(1, 'admin@gmail.com', '751cb3f4aa17c36186f4856c8982bf27', '1', '0', '0', NULL),
(69, 'honeykkuriakose1998@gmail.com', 'bd0591c775f72caa900a1a63c02ee5f4', '1', '1', '0', NULL),
(70, 'donarose@gmail.com', 'e80c80774ce0847c2cb957b5c1903555', '1', '2', '0', '2021-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_productbookings`
--

CREATE TABLE `tb_productbookings` (
  `pbid` int(11) NOT NULL,
  `pbkey` varchar(8) NOT NULL,
  `pbitems` varchar(255) NOT NULL,
  `pbamount` varchar(15) NOT NULL,
  `pbdate` varchar(50) NOT NULL,
  `pbuserid` int(11) NOT NULL,
  `pbstatus` enum('0','1','2','3','4') NOT NULL,
  `pb_feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_productbookings`
--

INSERT INTO `tb_productbookings` (`pbid`, `pbkey`, `pbitems`, `pbamount`, `pbdate`, `pbuserid`, `pbstatus`, `pb_feedback`) VALUES
(1, '7b4b41b9', 'Nourish Mantra Skin Brightening - 2', '5,500.00', '2021-06-15', 69, '4', 'Bill Paid');

-- --------------------------------------------------------

--
-- Table structure for table `tb_servicecat`
--

CREATE TABLE `tb_servicecat` (
  `catid` int(11) NOT NULL,
  `catkey` varchar(8) NOT NULL,
  `catname` varchar(100) NOT NULL,
  `catdesc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `catstatus` enum('0','1') NOT NULL DEFAULT '0',
  `loginid` int(11) NOT NULL,
  `delstatus` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_servicecat`
--

INSERT INTO `tb_servicecat` (`catid`, `catkey`, `catname`, `catdesc`, `catstatus`, `loginid`, `delstatus`) VALUES
(1, 'e487933e', 'Facial', 'A facial is a family of skin care treatments for the face, including steam, exfoliation, extraction, creams, lotions, facial masks, peels, and massage. They are normally performed in beauty salons, but are also a common spa treatment.', '1', 1, '0'),
(2, 'fee13367', 'Hair ', 'To keep the hair clear, coloured, dandruff treatment etc.', '1', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_servicesubcat`
--

CREATE TABLE `tb_servicesubcat` (
  `scatid` int(11) NOT NULL,
  `scatkey` varchar(8) NOT NULL,
  `scatname` varchar(100) NOT NULL,
  `scatdesc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `amt` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `scatstatus` enum('0','1') NOT NULL,
  `catid` int(11) NOT NULL,
  `loginid` int(11) NOT NULL,
  `delstatus` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_servicesubcat`
--

INSERT INTO `tb_servicesubcat` (`scatid`, `scatkey`, `scatname`, `scatdesc`, `amt`, `image`, `scatstatus`, `catid`, `loginid`, `delstatus`) VALUES
(1, '7a80377d', 'Fruit Facial', 'Not all of us have enough time to go to a salon for a facial. How about bringing the spa to your home by trying some homemade fruit facials that leave your skin healthy and beautiful.', '499', 'fruit.jpg', '1', 1, 1, '0'),
(2, '03ae9351', 'Layer Cut', 'Make sure to use a blow dryer before your straighten so you can employ the root volume. Use a straightener to eliminate flyaways and keep things sleek.\r\n', '350', 'Hair cut -layer.jpg', '1', 2, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_staffreg`
--

CREATE TABLE `tb_staffreg` (
  `engid` int(11) NOT NULL,
  `engkey` varchar(8) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `district` varchar(20) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `loginid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_staffreg`
--

INSERT INTO `tb_staffreg` (`engid`, `engkey`, `fname`, `lname`, `address`, `gender`, `phno`, `district`, `pincode`, `loginid`) VALUES
(1, '3ca7cf47', 'Dona', 'Rose', 'Dona Villa', 'Female', '8756578968', 'Idukki', '556789', 70);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subcat`
--

CREATE TABLE `tb_subcat` (
  `scatid` int(11) NOT NULL,
  `scatkey` varchar(8) NOT NULL,
  `scatname` varchar(100) NOT NULL,
  `scatdesc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mfg` varchar(100) NOT NULL,
  `exp` varchar(100) NOT NULL,
  `amt` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `scatstatus` enum('0','1') NOT NULL,
  `catid` int(11) NOT NULL,
  `loginid` int(11) NOT NULL,
  `delstatus` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_subcat`
--

INSERT INTO `tb_subcat` (`scatid`, `scatkey`, `scatname`, `scatdesc`, `mfg`, `exp`, `amt`, `image`, `scatstatus`, `catid`, `loginid`, `delstatus`) VALUES
(1, '143bfded', 'Nourish Mantra Skin Brightening', 'Enriched with green tea extracts, aloe vera extracts, and Niacinamide, our Green Tea Tatva Scrub Cleanser is a 2-in-1 formulation designed to cleanse the face of makeup and impurities while gently exfoliating dead skin cells.', '2021-05-04', '2021-07-15', '2750', 'SkinBrighteningComboGreen_1800x1800.jpg', '1', 2, 1, '0'),
(2, '3c5f15b4', 'Cosmic Sutra Hair Oil', 'The mystique of core Indian Ayurveda packed in a bottle, a world of time-tested goodness. Every drop is enriched with the indulgence that nature has to offer. Moringa helps prevent dryness, Bhringraj promotes hair growth.', '2021-05-12', '2021-08-19', '450', 'SkinBrighteningComboGreen_1800x1800.jpg', '1', 1, 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_assignwork`
--
ALTER TABLE `tb_assignwork`
  ADD PRIMARY KEY (`wkid`);

--
-- Indexes for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD PRIMARY KEY (`attendid`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`bk_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`custid`);

--
-- Indexes for table `tb_jobapply`
--
ALTER TABLE `tb_jobapply`
  ADD PRIMARY KEY (`applyid`);

--
-- Indexes for table `tb_jobs`
--
ALTER TABLE `tb_jobs`
  ADD PRIMARY KEY (`jid`);

--
-- Indexes for table `tb_leave`
--
ALTER TABLE `tb_leave`
  ADD PRIMARY KEY (`lvid`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_productbookings`
--
ALTER TABLE `tb_productbookings`
  ADD PRIMARY KEY (`pbid`);

--
-- Indexes for table `tb_servicecat`
--
ALTER TABLE `tb_servicecat`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tb_servicesubcat`
--
ALTER TABLE `tb_servicesubcat`
  ADD PRIMARY KEY (`scatid`);

--
-- Indexes for table `tb_staffreg`
--
ALTER TABLE `tb_staffreg`
  ADD PRIMARY KEY (`engid`);

--
-- Indexes for table `tb_subcat`
--
ALTER TABLE `tb_subcat`
  ADD PRIMARY KEY (`scatid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_assignwork`
--
ALTER TABLE `tb_assignwork`
  MODIFY `wkid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  MODIFY `attendid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `custid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jobapply`
--
ALTER TABLE `tb_jobapply`
  MODIFY `applyid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jobs`
--
ALTER TABLE `tb_jobs`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_leave`
--
ALTER TABLE `tb_leave`
  MODIFY `lvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tb_productbookings`
--
ALTER TABLE `tb_productbookings`
  MODIFY `pbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_servicecat`
--
ALTER TABLE `tb_servicecat`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_servicesubcat`
--
ALTER TABLE `tb_servicesubcat`
  MODIFY `scatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_staffreg`
--
ALTER TABLE `tb_staffreg`
  MODIFY `engid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_subcat`
--
ALTER TABLE `tb_subcat`
  MODIFY `scatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
