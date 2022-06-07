-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2022 at 09:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trarvel_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(33) NOT NULL,
  `password` varchar(66) NOT NULL,
  `email` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL,
  `image` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `email`, `job`, `image`) VALUES
(1, 'ahmed', '123', 'ahmed@gmail.com', '', ''),
(2, 'ahmed tofiq', '123', 'm.m.m.elhossin@gmail.com', '', 'edit2.png'),
(4, 'Mohamed El hosisny', '123', 'm.m.m.elhossin@gmail.com', 'Web developer', '63346499.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `paymentDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `userId` int(11) NOT NULL,
  `tripId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `paymentDate`, `userId`, `tripId`) VALUES
(4, 5000, '2022-06-05 03:56:09', 1, 7),
(5, 5000, '2022-06-05 03:57:40', 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `travel_agency`
--

CREATE TABLE `travel_agency` (
  `id` int(11) NOT NULL,
  `name` varchar(33) NOT NULL,
  `legel_no` int(15) NOT NULL,
  `bank_account` int(20) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `addess` varchar(66) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(122) NOT NULL,
  `adminId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `travel_agency`
--

INSERT INTO `travel_agency` (`id`, `name`, `legel_no`, `bank_account`, `phone`, `addess`, `password`, `image`, `adminId`) VALUES
(8, 'egy sky', 2310021, 2147483647, '01117433885', 'naser city', '123', 'Gull_portrait_ca_usa.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `agency_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `state`, `price`, `description`, `date`, `image`, `agency_id`) VALUES
(7, 'Aswan', 5000, 'ziad very good person ', '2022-06-22', 'pexels-photo-227507.jpeg', 8),
(9, 'luxer', 2000, 'gfdsgfdsg', '2022-07-06', '63346499.jfif', 8),
(10, 'alex', 1223, 'fsdafsd', '2022-06-29', 'pexels-photo-227507.jpeg', 8),
(11, 'mansora', 2012, 'fsdafsd', '2022-06-14', 'Gull_portrait_ca_usa.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `national_id` int(15) NOT NULL,
  `email` varchar(66) NOT NULL,
  `password` varchar(23) NOT NULL,
  `address` varchar(333) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `age`, `national_id`, `email`, `password`, `address`, `phone`, `gender`) VALUES
(1, 'mohamed ', 'elhossiny', 33, 2147483647, 'mohamedaymanmoudy1@gmail.com', '123', 'asdfdsfasfdsafdsafdsaf', '01117433885', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `tripId` (`tripId`);

--
-- Indexes for table `travel_agency`
--
ALTER TABLE `travel_agency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agency_id` (`agency_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `travel_agency`
--
ALTER TABLE `travel_agency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`tripId`) REFERENCES `trips` (`id`);

--
-- Constraints for table `travel_agency`
--
ALTER TABLE `travel_agency`
  ADD CONSTRAINT `travel_agency_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`);

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_ibfk_1` FOREIGN KEY (`agency_id`) REFERENCES `travel_agency` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
