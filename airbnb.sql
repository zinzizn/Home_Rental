-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 29, 2024 at 05:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airbnb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `aid` int(11) NOT NULL,
  `adname` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ademail` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adpassword` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`aid`, `adname`, `ademail`, `adpassword`) VALUES
(1, 'Zin Zin', 'zin@gmail.com', 'Zin112233$');

-- --------------------------------------------------------

--
-- Table structure for table `bookingtbl`
--

CREATE TABLE `bookingtbl` (
  `bid` int(11) NOT NULL,
  `CIDate` date NOT NULL,
  `CODate` date NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `totalnights` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `homeid` int(11) NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `hostprice` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `bookingstatus` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookingtbl`
--

INSERT INTO `bookingtbl` (`bid`, `CIDate`, `CODate`, `status`, `totalnights`, `uid`, `homeid`, `price`, `hostprice`, `bookingstatus`) VALUES
(59, '2024-02-01', '2024-02-03', 'Paid', 2, 36, 11, '360000', '356400', 'Paid'),
(61, '2024-02-22', '2024-02-29', NULL, 7, 43, 14, '1260000', '1247400', 'Paid'),
(62, '2024-01-27', '2024-01-31', NULL, 4, 44, 11, '720000', '712800', 'Paid'),
(63, '2024-01-28', '2024-01-30', NULL, 2, 36, 3, '360000', '356400', 'Paid'),
(64, '2024-02-03', '2024-02-09', NULL, 6, 45, 6, '1200000', '1188000', 'Paid'),
(65, '2024-02-01', '2024-02-10', NULL, 9, 44, 5, '4050000', '4009500', 'Paid'),
(66, '2024-03-24', '2024-03-27', NULL, 3, 33, 5, '1350000', '1336500', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(250) NOT NULL,
  `Question` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Answer` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Quest_type` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `Question`, `Answer`, `Quest_type`) VALUES
(1, 'How to create an account?', '', 'choose'),
(2, 'Setting up your profile', 'After logging in, navigate to the \'My Profile\' tab...', 'Getting Started'),
(3, 'How to book a room?', 'Navigate to the listing you\'re interested in and click on \'Book Now\'...', 'Booking and Reservations'),
(4, 'Are there any age restrictions to make a reservation?', 'Yes, you must be at least 18 years old to make a reservation.', 'Booking and Reservations'),
(5, 'Can I make a group booking?', 'Yes, for group bookings, please contact our support team directly.', 'Booking and Reservations'),
(7, 'Are my card details secure?', 'Yes, we use end-to-end encryption to ensure all your personal and financial details are secure.', 'Payments'),
(8, 'How do I list my space/property?', 'Navigate to the \'Become a Host\' section on our platform, provide details about your space, add high-quality photos, set your price, and publish your listing.', 'Hosts'),
(9, 'How and when do I get paid?', 'Payments are typically released 24 hours after the guest checks in.', 'Hosts'),
(10, 'What if a guest damages my property?', 'We recommend taking a security deposit before guests arrive. Additionally, our host guarantee provides protection against damages, ensuring you\'re covered in such events.', 'Hosts');

-- --------------------------------------------------------

--
-- Table structure for table `home`
--

CREATE TABLE `home` (
  `homeid` int(5) NOT NULL,
  `HAddress` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Location` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HomeType` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HVname` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Price` int(20) DEFAULT NULL,
  `dollor` int(30) NOT NULL,
  `Amenities` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bedroom` int(11) DEFAULT NULL,
  `Bathroom` int(11) DEFAULT NULL,
  `Rooms` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Guests` int(11) DEFAULT NULL,
  `Himage` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Bed_room` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Bath_room` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Dinningroom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Living` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `hostid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home`
--

INSERT INTO `home` (`homeid`, `HAddress`, `Location`, `HomeType`, `HVname`, `Price`, `dollor`, `Amenities`, `Bedroom`, `Bathroom`, `Rooms`, `Guests`, `Himage`, `Bed_room`, `Bath_room`, `Dinningroom`, `Living`, `hostid`) VALUES
(3, 'No(3),Inn Pyin,Kalaw', 'Kalaw', 'Home', 'Blue Sky', 180000, 300, 'WiFi, Parking, Air Conditioning, TV, Pets Welcome', 4, 3, 'Kitchen, Outdoor Space, Living Room', 10, 'pkaH.png', 'pkaBed.png', 'pkaBath.png', 'pkad.png', 'pkaL1.png', 1),
(4, 'No(11),Nyaung Oo,Bagan', 'Bagan', 'Villa', 'Six Star', 550000, 917, 'WiFi, Parking, Air Conditioning, Washer & Dryer, TV, Pets Welcome', 8, 5, 'Kitchen, Dining, Outdoor Space, Living Room', 20, 'pbh.png', 'pbbed.png', 'pbb.jpg', 'pbd.jpg', 'pbl.jpg', 2),
(5, 'No(36), 2.4 km from Shwe Oo Min Pagoda,Kalaw', 'Kalaw', 'Villa', 'Hella', 450000, 750, 'Parking, Air Conditioning, TV', 6, 3, 'Dining, Outdoor Space, Living Room', 15, 'pkv2h.jpg', 'pkv2b.png', 'pkv2ba.png', 'pkv2.png', 'pkv2l.png', 2),
(6, 'No. 3 Quarter, University Road, Shan State,Kalaw', 'Kalaw', 'Home', 'Tree House', 200000, 333, 'Parking, Air Conditioning, Pets Welcome', 4, 3, 'Kitchen, Dining, Outdoor Space, Living Room', 8, 'pkrH.png', 'pkrB.png', 'pkrBa.png', 'pkrL.png', 'pkrL.png', 2),
(7, 'Nyaung U, BaganShow on map2.8 km from centre', 'Bagan', 'Home', 'Star', 150000, 250, 'WiFi, Parking, Air Conditioning, Pets Welcome', 3, 2, 'Kitchen, Dining, Outdoor Space, Living Room', 8, 'pb2h.png', 'pb2bed.png', 'pb2b.png', 'pb2d.png', 'pb2l.png', 3),
(8, 'Old Bagan,Bagan', 'Bagan', 'Villa', 'Tharabar Gate', 540000, 900, 'WiFi, Parking, Air Conditioning, Washer & Dryer, TV, Pets Welcome', 7, 3, 'Kitchen, Dining, Outdoor Space, Living Room', 20, 'pbvhn.png', 'pbvbed.png', 'pbvb.png', 'pbvd.png', 'pbvl.png', 3),
(9, '165/167 35th Street Kyauktada Tsp , Mandalay,Myanmar', 'Mandalay', 'Home', 'Royal', 200000, 333, 'WiFi, Parking, Air Conditioning, TV, Pets Welcome', 3, 3, 'Kitchen, Dining, Outdoor Space, Living Room', 10, 'pmchn.png', 'pmcbe.png', 'pmcb.png', 'pmcd.png', 'pmcl.png', 4),
(10, 'No(12), 2.4 km from Shwe Oo Min Pagoda,Mandalay', 'Mandalay', 'Villa', 'Twelve', 580000, 967, 'WiFi, Parking, Air Conditioning, Pets Welcome', 8, 5, 'Kitchen, Dining, Outdoor Space, Living Room', 20, 'pmvh.png', 'pmvbed.jpeg', 'pmvba.png', 'pmvd.png', 'pmvl.png', 4),
(11, 'No. 196, 29th Street, Between 80th and 81st Street, Chan Aye Thar Zan Township, 11221 Mandalay,', 'Mandalay', 'Home', 'Zat', 180000, 300, 'Parking, Air Conditioning, Washer & Dryer', 2, 2, 'Kitchen, Outdoor Space, Living Room', 5, 'pmc1h.png', 'pmc1be.png', 'pmc1ba.png', 'pmc1d.png', 'pmc1l.png', 4),
(12, 'Nga Phe Chaung Village Inle Lake, Nyaung Shwe, Taunggyi 06078 Myanmar', 'Taung Gyi', 'Home', 'Lil Soan', 200000, 333, 'Parking, Air Conditioning, Pets Welcome', 4, 3, 'Kitchen, Living Room', 9, 'ptch.png', 'ptcbe.png', 'ptcb.png', 'ptcd.png', 'ptcl.png', 5),
(13, 'Myaung Yoe Gyi Village Inlay Lake, Taunggyi 10111 Myanmar', 'Taung Gyi', 'Villa', 'Farms', 550000, 917, 'WiFi, Parking, Washer & Dryer, Pets Welcome', 8, 4, 'Kitchen, Dining, Outdoor Space', 20, 'ptvhn1.jpg', 'ptvbe.png', 'ptvb.png', 'ptvd.png', 'ptvl.png', 5),
(14, 'No. 4 Bogyoke Aung San Street, Taunggyi 06011 Myanmar', 'Taung Gyi', 'Home', 'The Moon', 180000, 300, 'Parking, Pets Welcome', 3, 2, 'Outdoor Space, Living Room', 8, 'ptc1hn.png', 'ptc1be_1.png', 'ptc1b_1.png', 'ptc1d_1.png', 'ptc1l_1.png', 5),
(15, 'aza Thingaha Road Hotel Zone, Naypyidaw 11101 Myanmar', 'Nay Pyi Taw', 'Home', 'Park Royal', 200000, 333, 'WiFi, Parking, Washer & Dryer, Pets Welcome', 4, 2, 'Dining, Outdoor Space, Living Room', 8, 'pnch.png', 'pncbe.png', 'pncba.png', 'pncd.png', 'pncl.png', 6),
(17, 'No 9 Shwepyitawin Street, Naypyidaw 33186 Myanmar', 'Nay Pyi Taw', 'Home', 'Hua Hin', 200000, 333, 'Parking, Pets Welcome', 5, 4, 'Kitchen, Dining, Outdoor Space, Living Room', 10, 'pnc1h.png', 'pnc1be.png', 'pnc1b.png', 'pnc1d.png', 'pnc1l.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE `host` (
  `hostid` int(5) NOT NULL,
  `FirstName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LastName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nrccode` int(10) NOT NULL,
  `nrccity` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nrc` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nrcno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phoneno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`hostid`, `FirstName`, `LastName`, `Email`, `nrccode`, `nrccity`, `nrc`, `nrcno`, `phoneno`, `password`) VALUES
(1, 'Aye', 'Aye', 'aye@gmail.com', 8, 'pakhaka', 'N', '345678', '09684576231', 'Aye1122#'),
(2, 'Tu', 'Ta', 'tuta@gmail.com', 10, 'phapana', 'N', '142789', '09786543234', 'Tuta123$'),
(3, 'Thi Thi', 'Phyo', 'thi12@gmail.com', 8, 'htalana', 'N', '368903', '09682681570', 'Thi123$123'),
(4, 'Zin ', 'Zin', 'zin12@gmail.com', 8, 'bakala', 'N', '532896', '0942660789', 'Zin12345^'),
(5, 'La Min', 'Oo', 'lamin@gmail.com', 12, 'tauka', 'N', '367098', '0946891576', 'Lamin123$'),
(6, 'Sai', 'Sai', 'sai@gmail.com', 13, 'shasahna', 'N', '678956', '09266135985', 'Sai12345^&');

-- --------------------------------------------------------

--
-- Stand-in structure for view `host_match_home`
-- (See below for the actual view)
--
CREATE TABLE `host_match_home` (
`homeid` int(5)
,`HAddress` varchar(250)
,`Location` varchar(20)
,`HomeType` varchar(30)
,`HVname` varchar(250)
,`Price` int(20)
,`dollor` int(30)
,`Amenities` varchar(100)
,`Bedroom` int(11)
,`Bathroom` int(11)
,`Rooms` varchar(70)
,`Guests` int(11)
,`Himage` varchar(250)
,`Bed_room` varchar(250)
,`Bath_room` varchar(250)
,`Dinningroom` varchar(250)
,`Living` varchar(250)
,`FirstName` varchar(50)
,`LastName` varchar(50)
,`Email` varchar(250)
,`phoneno` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `paymenttbl`
--

CREATE TABLE `paymenttbl` (
  `pid` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `cardno` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CVV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `TypesOfCards` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ExpMonth` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ExpYear` int(5) NOT NULL,
  `bid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymenttbl`
--

INSERT INTO `paymenttbl` (`pid`, `Amount`, `cardno`, `CVV`, `TypesOfCards`, `ExpMonth`, `ExpYear`, `bid`) VALUES
(39, 360000, '4321567890654321', '7689', 'Visa Card', 'May', 2027, 59),
(40, 1260000, '1233312134342332', '123', 'Master Card', 'June', 2028, 61),
(41, 720000, '1234567890123456', '1234', 'Master Card', 'January', 2024, 62),
(42, 360000, '1111111111111111', '1234', 'Visa Card', 'April', 2025, 63),
(43, 1200000, '1111111111111111', '2222', 'Visa Card', 'November', 2025, 64),
(44, 4050000, '12345678912345', '1234', 'Master Card', 'October', 2024, 65),
(45, 1350000, '5432165789054321', '543', 'Visa Card', 'September', 2026, 66);

-- --------------------------------------------------------

--
-- Table structure for table `usertbl`
--

CREATE TABLE `usertbl` (
  `uid` int(11) NOT NULL,
  `UserName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nrc` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nrccity` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nrccode` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `passportno` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `UEmail` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `NRCno` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `usertbl`
--

INSERT INTO `usertbl` (`uid`, `UserName`, `nrc`, `nrccity`, `nrccode`, `passportno`, `UEmail`, `NRCno`) VALUES
(33, 'La Min', '9', 'sakana', 'N', '', 'lamin123@gmail.com', '167902'),
(34, 'James', '', '', '', 'JP457890', 'james@gmail.com', ''),
(35, 'justa', '14', 'kamana', 'N', '', 'justa@gmail.com', '123456'),
(36, 'Anne', '', '', '', 'JP457890', 'anne@gmail.com', ''),
(37, 'Pyae Pyae', '9', 'sakata', 'N', '', 'pyae@gmail.com', '432167'),
(38, 'Mery', '', '', '', 'PU567094', 'mery@gmail.com', ''),
(39, 'Thu Zar', '12', 'takana', 'N', '', 'thu@gmail.com', '564321'),
(40, 'Mu Lay', '8', 'pakhaka', 'N', '', 'mul@gmail.com', '543217'),
(41, 'Jerry', '', '', '', 'JP457890', 'jerry@gmail.com', ''),
(42, 'Zin Zin Aung', '', '', '', 'JP457891', 'zinzinaung@gmail.com', ''),
(43, 'swan', '12', 'kamaya', 'N', '', 'swanhtetn6@gmail.com', '067220'),
(44, 'Hsu', '12', 'thagaka', 'N', '', 'hsu@gmail.com', '123456'),
(45, 'wa toke ma', '12', 'tamana', 'N', '', 'watoke11@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_booking`
-- (See below for the actual view)
--
CREATE TABLE `user_booking` (
`uid` int(11)
,`UserName` varchar(250)
,`UEmail` varchar(250)
,`CIDate` date
,`CODate` date
,`HVname` varchar(250)
,`Email` varchar(250)
);

-- --------------------------------------------------------

--
-- Structure for view `host_match_home`
--
DROP TABLE IF EXISTS `host_match_home`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `host_match_home`  AS SELECT `home`.`homeid` AS `homeid`, `home`.`HAddress` AS `HAddress`, `home`.`Location` AS `Location`, `home`.`HomeType` AS `HomeType`, `home`.`HVname` AS `HVname`, `home`.`Price` AS `Price`, `home`.`dollor` AS `dollor`, `home`.`Amenities` AS `Amenities`, `home`.`Bedroom` AS `Bedroom`, `home`.`Bathroom` AS `Bathroom`, `home`.`Rooms` AS `Rooms`, `home`.`Guests` AS `Guests`, `home`.`Himage` AS `Himage`, `home`.`Bed_room` AS `Bed_room`, `home`.`Bath_room` AS `Bath_room`, `home`.`Dinningroom` AS `Dinningroom`, `home`.`Living` AS `Living`, `host`.`FirstName` AS `FirstName`, `host`.`LastName` AS `LastName`, `host`.`Email` AS `Email`, `host`.`phoneno` AS `phoneno` FROM (`home` join `host` on(`home`.`hostid` = `host`.`hostid`))  ;

-- --------------------------------------------------------

--
-- Structure for view `user_booking`
--
DROP TABLE IF EXISTS `user_booking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_booking`  AS SELECT `usertbl`.`uid` AS `uid`, `usertbl`.`UserName` AS `UserName`, `usertbl`.`UEmail` AS `UEmail`, `bookingtbl`.`CIDate` AS `CIDate`, `bookingtbl`.`CODate` AS `CODate`, `home`.`HVname` AS `HVname`, `host`.`Email` AS `Email` FROM (((`usertbl` join `bookingtbl` on(`usertbl`.`uid` = `bookingtbl`.`uid`)) join `home` on(`bookingtbl`.`homeid` = `home`.`homeid`)) join `host` on(`home`.`hostid` = `host`.`hostid`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `bookingtbl`
--
ALTER TABLE `bookingtbl`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `homeid` (`homeid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`homeid`),
  ADD KEY `hostid` (`hostid`);

--
-- Indexes for table `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`hostid`);

--
-- Indexes for table `paymenttbl`
--
ALTER TABLE `paymenttbl`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookingtbl`
--
ALTER TABLE `bookingtbl`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `home`
--
ALTER TABLE `home`
  MODIFY `homeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `host`
--
ALTER TABLE `host`
  MODIFY `hostid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paymenttbl`
--
ALTER TABLE `paymenttbl`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookingtbl`
--
ALTER TABLE `bookingtbl`
  ADD CONSTRAINT `bookingtbl_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `usertbl` (`uid`),
  ADD CONSTRAINT `bookingtbl_ibfk_2` FOREIGN KEY (`homeid`) REFERENCES `home` (`homeid`);

--
-- Constraints for table `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `home_ibfk_1` FOREIGN KEY (`hostid`) REFERENCES `host` (`hostid`);

--
-- Constraints for table `paymenttbl`
--
ALTER TABLE `paymenttbl`
  ADD CONSTRAINT `paymenttbl_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `bookingtbl` (`bid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
