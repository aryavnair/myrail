-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 06:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `itemno` int(50) NOT NULL,
  `fid` varchar(150) NOT NULL,
  `rate` varchar(150) NOT NULL,
  `food` varchar(150) NOT NULL,
  `user` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`itemno`, `fid`, `rate`, `food`, `user`) VALUES
(9, '', '', '', ''),
(10, '', '', '', ''),
(11, '', '', '', ''),
(12, '1', '120', 'chikken', 'user@gmail.com'),
(13, '2', '8', 'dosa', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `catering`
--

CREATE TABLE `catering` (
  `catid` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `licenseno` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(191) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catering`
--

INSERT INTO `catering` (`catid`, `name`, `licenseno`, `email`, `mobile`, `address`, `district`, `state`) VALUES
(23, 'hello', '1236547890', 'hello@gmail.com', '8974563210', 'pala', 'Begusarai', 'Bihar'),
(24, 'aryastores', '326540987', 'aryas@gmail.com', '9874563210', 'puthuppally', 'Bharuch', 'Gujarat'),
(94, 'matha stores', '585666556', 'matha@gmai.com', '9846110803', 'pala', 'Lakshadweep', 'Lakshadweep (UT)');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `fid` int(50) NOT NULL,
  `food` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `rate` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`fid`, `food`, `type`, `rate`) VALUES
(1, 'chikken', 'nonveg', '120'),
(2, 'dosa', 'veg', '8');

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE `foodorder` (
  `orderID` int(50) NOT NULL,
  `user` varchar(100) NOT NULL,
  `food` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginID` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `email`, `password`, `user_type`, `status`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1'),
(2, 'harshakumar@gmail.com', '34f7e6dd6acf03192d82f0337c8c54ba', 'staff', '1'),
(3, 'swathycatering@gmail.com', '5e2f38b5c0e16a2d5180c07cda98c403', 'catering', '1'),
(95, 'aravind@gmail.com', '40121c56c2dc028370cee914d123015c', 'user', '1'),
(96, 'mohanlal@gmail.com', '4e15ebab16f6530ab7ca89e1f53820f9', 'user', '0'),
(97, 'aravinduu@gmail.com', 'e2fc714c4727ee9395f324cd2e7f331f', 'user', '1'),
(98, 'admina@gmail.com', 'd95679752134a2d9eb61dbd7b91c4bcc', 'user', '1'),
(99, 'adminuu@gmail.com', 'd6e1c05c8a81c2ae74c7aedea5ec92c1', 'user', '1'),
(100, 'adminkk@gmail.com', 'd6e1c05c8a81c2ae74c7aedea5ec92c1', 'user', '1'),
(101, 'aadmin@gmail.com', 'd6e1c05c8a81c2ae74c7aedea5ec92c1', 'user', '1'),
(102, 'admhin@gmail.com', 'd6e1c05c8a81c2ae74c7aedea5ec92c1', 'user', '1'),
(103, 'adminkjh@gmail.com', 'd6e1c05c8a81c2ae74c7aedea5ec92c1', 'user', '1'),
(104, 'oiadmin@gmail.com', 'd6e1c05c8a81c2ae74c7aedea5ec92c1', 'user', '1'),
(105, 'admijkn@gmail.com', 'd6e1c05c8a81c2ae74c7aedea5ec92c1', 'user', '1'),
(106, 'user@gmail.com', 'd6e1c05c8a81c2ae74c7aedea5ec92c1', 'user', '1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `cardnumber` mediumtext NOT NULL,
  `balance` longtext NOT NULL,
  `csv` varchar(123) NOT NULL,
  `exp` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`cardnumber`, `balance`, `csv`, `exp`) VALUES
('1111111', '500000', '123', '16/04/2019');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `pnrnumber` int(50) NOT NULL,
  `trainid` varchar(150) NOT NULL,
  `cls` varchar(100) NOT NULL,
  `dat` varchar(100) NOT NULL,
  `berth` varchar(100) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `user` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`pnrnumber`, `trainid`, `cls`, `dat`, `berth`, `payment`, `user`) VALUES
(17, '1', '1A', '04/01/2019', 'upperberth', 'notpaid', ''),
(18, '1', '1A', '04/01/2019', 'upperberth', 'notpaid', ''),
(19, '1', '1A', '04/01/2019', 'upperberth', 'notpaid', ''),
(20, '1', '1A', '04/01/2019', 'upperberth', 'notpaid', ''),
(21, '1', '1A', '04/01/2019', 'upperberth', 'paid', 'user@gmail.com'),
(22, '1', '1A', '04/11/2019', 'upperberth', 'paid', 'user@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `fname`, `lname`, `gender`, `address`, `dob`, `mobile`, `email`, `qualification`, `district`, `state`, `image`) VALUES
(4, 'Meenu', 'Rajeev', 'Female', 'kidangoor', '1994-12-08', '2147483647', 'meenu@gmail.com', 'bba', 'Ernakulam', 'Kerala', 'pi_7.jpg'),
(5, 'Aparna', 'Rajeev', 'Female', 'Pala', '2004-12-08', '2147483647', 'aparna@gmail.com', 'tenth', 'Kottayam', 'Kerala', 'pi_5.jpg'),
(93, 'Bhagya', 'sree', 'Female', 'changanasserry', '2018-04-05', '7558847126', 'bhagya@gmail.com', 'mca', 'Kottayam', 'Kerala', 'pi_6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `stationId` int(50) NOT NULL,
  `station` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`stationId`, `station`, `contact`, `address`) VALUES
(2, 'chengannoor', '98985695655', 'addr'),
(3, 'Kizhakkekootta', '87854985656', 'address'),
(4, 'kottayam', '9874563210', 'Nagampadam, Kottayam, Kottayam District, Kerala'),
(5, 'kollam', '1234567890', 'Chinnakkada Roundabout, Chamkkada, Kollam, Kerala '),
(6, 'trivandrum', '0987654321', 'Thampanoor, Trivandrum'),
(7, 'Delhi', '0987654321', 'Ajmeri Gate,delhi'),
(8, 'Guwahati', '9856321047', 'assam'),
(9, 'kjnkj5555', '', ''),
(10, 'Guwahati', '0987654321', 'Thampanoor Trivandrum');

-- --------------------------------------------------------

--
-- Table structure for table `stop`
--

CREATE TABLE `stop` (
  `stopid` int(50) NOT NULL,
  `train` varchar(50) NOT NULL,
  `station` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stop`
--

INSERT INTO `stop` (`stopid`, `train`, `station`) VALUES
(2267, 'Vanjinad', 'chengannoor'),
(2268, 'Vanjinad', 'Kizhakkekootta'),
(2269, 'Vanjinad', 'kottayam'),
(2271, 'Malabar Express', 'chengannoor'),
(2274, 'Malabar Express', 'kottayam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otp`
--

CREATE TABLE `tbl_otp` (
  `otp_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `status` int(20) NOT NULL,
  `count` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_otp`
--

INSERT INTO `tbl_otp` (`otp_id`, `email`, `otp`, `status`, `count`) VALUES
(25, 'aryavnair08@gmail.com', '339603', 0, 0),
(26, 'aravinduu@gmail.com', '712999', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `trainId` int(50) NOT NULL,
  `train_number` varchar(50) NOT NULL,
  `train_name` varchar(50) NOT NULL,
  `arival` varchar(50) NOT NULL,
  `depatrure` varchar(50) NOT NULL,
  `distance` varchar(50) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  `1A` varchar(100) NOT NULL,
  `2A` varchar(100) NOT NULL,
  `3A` varchar(100) NOT NULL,
  `EC` varchar(100) NOT NULL,
  `FC` varchar(100) NOT NULL,
  `CC` varchar(100) NOT NULL,
  `SL` varchar(100) NOT NULL,
  `upperberth` varchar(100) NOT NULL,
  `midberth` varchar(100) NOT NULL,
  `lowerberth` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`trainId`, `train_number`, `train_name`, `arival`, `depatrure`, `distance`, `source`, `destination`, `1A`, `2A`, `3A`, `EC`, `FC`, `CC`, `SL`, `upperberth`, `midberth`, `lowerberth`) VALUES
(1, '3222', 'Vanjinad', '10', '20', '30km', 'chengannoor', 'Kizhakkekootta', 'true', '', '', '', '', '', '', 'true', '', ''),
(2, '2135', 'Malabar Express', '09.30', '10.30', '36.2', 'kottayam', 'chengannoor', '', '', '', '', '', '', '', '', '', ''),
(3, '7896', 'Chennai express', '09.00', '09.30', '2845', 'trivandrum', 'Delhi', '', '', '', '', '', '', '', '', '', ''),
(4, '3652', 'Amritha Express', '12.00', '13.00', '350', 'kottayam', 'trivandrum', '', '', '', '', '', '', '', '', '', ''),
(5, 'ii', 'jkjk', 'jkjk', 'jkj', 'kjk', 'kollam', 'Kizhakkekootta', 'true', 'true', '', 'true', '', '', '', 'true', '', ''),
(6, 'oioi', 'ioio', 'ioi', 'oiilhjk', 'hjkghjg', 'chengannoor', 'chengannoor', 'true', 'false', 'true', 'true', 'false', 'false', 'false', 'false', 'true', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `firstname`, `lastname`, `email`, `gender`, `mobile`, `district`, `state`, `image`) VALUES
(94, 'Nandakumar', 'Asj', 'aravind@gmail.com', 'Male', '8129365304', 'Kalaburagi (Gulbarga)', 'Karnataka', 'image'),
(95, 'Mohan ', 'Lal', 'mohanlal@gmail.com', 'Male', '8129365304', 'Nicobar', 'Andaman and Nicobar Island (UT)', 'image'),
(96, 'Nandakumar', 'As', 'aravinduu@gmail.com', 'Male', 'nand@gmail.com', 'Pathanamthitta', 'Kerala', 'nand@gmail.com.'),
(97, 'Nandakumar', 'As', 'admina@gmail.com', 'Male', '8129365304', 'Select District', '', 'admina@gmail.com.jpg'),
(98, 'Nandakumar', 'As', 'adminuu@gmail.com', 'Male', '8129365304', 'Select District', '', 'adminuu@gmail.com.jpg'),
(99, 'Nandakumar', 'As', 'adminkk@gmail.com', 'Male', '8129365304', 'Select District', '', 'adminkk@gmail.com.jpg'),
(106, '           Nandak', '           As', 'user@gmail.com', 'Male', '           8129365304', 'Select District', '', ' user@gmail.com.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`itemno`);

--
-- Indexes for table `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`pnrnumber`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`stationId`);

--
-- Indexes for table `stop`
--
ALTER TABLE `stop`
  ADD PRIMARY KEY (`stopid`);

--
-- Indexes for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  ADD PRIMARY KEY (`otp_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`trainId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `itemno` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `catering`
--
ALTER TABLE `catering`
  MODIFY `catid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foodorder`
--
ALTER TABLE `foodorder`
  MODIFY `orderID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `pnrnumber` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `stationId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stop`
--
ALTER TABLE `stop`
  MODIFY `stopid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2275;

--
-- AUTO_INCREMENT for table `tbl_otp`
--
ALTER TABLE `tbl_otp`
  MODIFY `otp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `trainId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
