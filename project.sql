-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 01:11 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash_payment`
--

CREATE TABLE `cash_payment` (
  `paymentID` int(10) NOT NULL,
  `duration` varchar(10) NOT NULL,
  `total` float NOT NULL,
  `customerID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `non-reservation`
--

CREATE TABLE `non-reservation` (
  `customerID` int(10) NOT NULL,
  `vehicle_no` varchar(8) NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_payment`
--

CREATE TABLE `online_payment` (
  `paymentID` int(20) NOT NULL,
  `userID` int(20) NOT NULL,
  `method` varchar(30) NOT NULL,
  `reservationID` int(20) NOT NULL,
  `duration` int(11) NOT NULL,
  `rate` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `post` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postID`, `userID`, `post`, `time`) VALUES
(2, 4, 'Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum congue leo eget malesuada. Vestibulum ante ipsum primis in faucibus orci luctus et ', '2017-01-08 19:39:02'),
(3, 4, 'Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '2017-01-08 19:39:02'),
(4, 4, 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor risus. Nulla porttitor accumsan tincidunt. Cras ultricies ligula sed mag', '2017-01-08 19:39:02');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `slotID` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `vehicle_no` varchar(10) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` varchar(30) NOT NULL,
  `pin` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `userID`, `slotID`, `dname`, `contact`, `vehicle_no`, `start_time`, `end_time`, `status`, `pin`, `time`) VALUES
(1, 5, 1, 'Madawa', '1234567890', '12345678', '2016-11-23 00:00:00', '2016-11-24 00:00:00', 'Not checked in', 1345738965, '2017-01-08 18:00:07'),
(2, 5, 2, 'Shanika', '1234567890', '12345678', '2016-11-23 07:00:00', '2016-11-23 08:00:00', 'Not checked in', 1346257894, '2017-01-08 18:00:07'),
(3, 5, 3, 'Madawa', '1234567890', '12345678', '2016-11-23 12:00:00', '2016-11-23 16:00:00', 'Not checked in', 1724509874, '2017-01-08 18:00:07'),
(4, 5, 0, 'madawa', '1234567890', '12345678', '2016-11-30 19:00:00', '2016-11-30 23:00:00', 'Not checked in', 1038714088, '2017-01-08 18:00:07'),
(5, 5, 0, 'madawa', '1234567890', '12345678', '2016-11-30 19:00:00', '2016-11-30 23:00:00', 'Not checked in', 1038714088, '2017-01-08 18:00:07'),
(6, 5, 0, 'madawa', '1234567890', '12345678', '2016-11-30 19:00:00', '2016-11-30 23:00:00', 'Not checked in', 1038714088, '2017-01-08 18:00:07'),
(7, 5, 1, 'pasan', '1234567890', '12345678', '2016-11-30 20:00:00', '2016-11-30 22:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(8, 5, 2, 'pasan', '1234567890', '12345678', '2016-11-30 20:00:00', '2016-11-30 22:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(9, 5, 3, 'pasan', '1234567890', '12345678', '2016-11-30 20:00:00', '2016-11-30 22:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(10, 5, 1, 'pasan', '1234567890', '12345678', '2016-11-30 20:00:00', '2016-11-30 22:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(11, 5, 1, 'pasan', '1234567890', '12345678', '2016-11-30 20:00:00', '2016-11-30 22:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(12, 5, 2, 'pasan', '1234567890', '12345678', '2016-11-30 20:00:00', '2016-11-30 22:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(13, 5, 3, 'pasan', '1234567890', '12345678', '2016-11-30 20:00:00', '2016-11-30 22:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(14, 5, 0, 'madawa', '1234567890', '12345678', '2016-12-01 21:00:00', '2016-12-01 23:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(15, 5, 0, 'madawa', '1234567890', '12345678', '2016-12-01 21:00:00', '2016-12-01 23:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(16, 5, 0, 'madawa', '1234567890', '12345678', '2016-12-01 21:00:00', '2016-12-01 23:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(17, 5, 0, 'madawa', '1234567890', '12345678', '2016-12-01 21:00:00', '2016-12-01 23:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(18, 5, 1, 'madawa', '1234567890', '12345678', '2016-12-01 21:00:00', '2016-12-01 23:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(19, 5, 0, 'madawa', '1234567890', '12345678', '2016-12-01 21:00:00', '2016-12-01 23:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(20, 5, 1, 'madawa', '1234567890', '12345678', '2016-12-01 09:00:00', '2016-12-01 13:00:00', 'Not checked in', 2001273936, '2017-01-08 18:00:07'),
(21, 5, 2, 'madawa', '1234567890', '12345678', '2016-12-01 09:00:00', '2016-12-01 13:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(22, 5, 3, 'madawa', '1234567890', '12345678', '2016-12-01 09:00:00', '2016-12-01 13:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(23, 5, 1, 'madawa', '1234567890', '12345678', '2016-12-01 16:00:00', '2016-12-01 21:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(24, 5, 2, 'madawa', '1234567890', '12345678', '2016-12-01 16:00:00', '2016-12-01 21:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(25, 5, 3, 'madawa', '1234567890', '12345678', '2016-12-01 16:00:00', '2016-12-01 21:00:00', 'Not checked in', 2147483647, '2017-01-08 18:00:07'),
(26, 5, 1, 'andun', '1234567890', '12345678', '2016-12-03 10:00:00', '2016-12-01 12:00:00', 'Not checked in', 31232714, '2017-01-08 18:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `value` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`id`, `time`, `value`) VALUES
(30, '2016-09-20 08:07:23', '100'),
(31, '2016-09-20 08:11:38', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `slot-reserve`
--

CREATE TABLE `slot-reserve` (
  `slot` int(11) NOT NULL,
  `8` int(11) NOT NULL,
  `9` int(11) NOT NULL,
  `10` int(11) NOT NULL,
  `11` int(11) NOT NULL,
  `12` int(11) NOT NULL,
  `13` int(11) NOT NULL,
  `14` int(11) NOT NULL,
  `15` int(11) NOT NULL,
  `16` int(11) NOT NULL,
  `17` int(11) NOT NULL,
  `18` int(11) NOT NULL,
  `19` int(11) NOT NULL,
  `20` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slot-reserve`
--

INSERT INTO `slot-reserve` (`slot`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(10) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `license` varchar(8) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` int(1) NOT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fname`, `lname`, `email`, `nic`, `license`, `password`, `type`, `pic`) VALUES
(4, 'Shavindra', 'Wickramathilaka', 'shaviwic9@gmail.com', '940403731v', 'B2361058', 'pa55w0rd', 1, 'http://localhost/project/new/images/profilepic/13340304_1359823194034715_5942732251045050945_o.jpg'),
(5, 'madawa', 'lakmalllll', 'madawa@gmail.com', '123', '123', '123', 0, 'http://localhost/project/new/images/profilepic/13340304_1359823194034715_5942732251045050945_o.jpg'),
(6, 'Lakmindi', 'Lamahewa', 'lakmindi@gmail.com', '937000758V', '12345678', '123', 0, ''),
(8, 'Milan', 'Perera', 'milan@gmail.com', '123456789V', '1234', '123', 0, ''),
(9, 'kasun', 'silva', 'kasun@gmail.com', '934567654V', '123456', '123', 0, ''),
(10, 'Eranga', 'Ravindu', 'eranga@gmail.com', '951234567V', 'qwerty', 'nigga', 0, ''),
(11, 'Andun', 'Ranmal', 'andun@gmail.com', '9309876654', 'qwerty', '123', 0, ''),
(12, 'Nomali', 'Yashodara', 'nomali@gmail.com', '908765432V', '1234567', 'qwerty', 0, ''),
(13, 'Conrad', 'Smith', 'conrad@gmail.com', '940403731V', '12345678', '123', 0, ''),
(15, 'Pasan', 'Missaka', 'pasan@gmail.com', '941234567V', '12345678', '123', 0, ''),
(16, 'Vidusha', 'Silva', 'vidusha@gmail.com', '123456789V', '12345678', '123', 0, ''),
(17, 'Vidusha', 'Silva', 'vidusha@gmail.com', '123456789V', '12345678', '123', 0, ''),
(18, 'Vidusha', 'Silva', 'vidusha@gmail.com', '123456789V', '12345678', '123', 0, ''),
(19, 'Vidusha', 'Silva', 'vidusha@gmail.com', '123456789V', '12345678', '123', 0, ''),
(20, 'Vidusha', 'Silva', 'vidusha@gmail.com', '123456789V', '12345678', '123', 0, ''),
(42, '1', '2', 'madawa@gmail.com', '3', '', '123', 0, ''),
(43, '1', '2', 'madawa@gmail.com', '940403731v', 'B2361058', '1234', 0, ''),
(44, 'kamal', 'perera', 'perera@gmail.com', '940403731v', 'B2361058', '1234', 0, ''),
(45, 'delushan', 'mohan', 'delushan@gmail.com', '123456789V', 'bb223345', '1234', 0, ''),
(47, 'Operator', 'perera', 'operator@gmail.com', '940403731v', 'B1234567', '1234', 2, ''),
(48, 'Receptionist', 'perera', 'recep@gmail.com', '940403731v', 'B1234567', '1234', 3, ''),
(49, 'gevindu ', 'dayal', 'gevindu@gmail.com', '940403731v', 'B1234567', '1234', 0, ''),
(50, 'chamath', 'perera', 'chamath@gmail.com', '940403731v', 'B1234567', '1234', 0, ''),
(51, 'Milan', 'Perera', 'milanperera@gmail.com', '123456789V', '12345678', '1234', 0, ''),
(52, 'Milan', 'Perera', 'milanp@gmail.com', '123456789V', '12345678', '1234', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash_payment`
--
ALTER TABLE `cash_payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `non-reservation`
--
ALTER TABLE `non-reservation`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `online_payment`
--
ALTER TABLE `online_payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot-reserve`
--
ALTER TABLE `slot-reserve`
  ADD PRIMARY KEY (`slot`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `non-reservation`
--
ALTER TABLE `non-reservation`
  MODIFY `customerID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
