-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2025 at 05:07 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeuswatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(20) NOT NULL,
  `username` varchar(40) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `firstName`, `lastName`, `password`) VALUES
(1, 'ADMIN001', 'Crhiz', 'Salillas', 'omniguard'),
(2, 'ADMIN002', 'Lanz', 'Villanueva', 'omnig');

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `id` int(11) NOT NULL,
  `room` varchar(20) NOT NULL,
  `daily` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `room` varchar(20) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `occupancy` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `username`, `room`, `state`, `occupancy`, `date`) VALUES
(7, 'ADMIN002', 'R19', 0, 0, '2025-01-21 01:23:43'),
(8, 'ADMIN002', 'R19', 1, 0, '2025-01-21 01:23:51'),
(9, 'ADMIN002', 'R19', 1, 1, '2025-01-21 01:31:17'),
(10, 'ADMIN002', 'MTB', 1, 0, '2025-01-21 01:31:18'),
(11, 'ADMIN002', 'ECL', 0, 1, '2025-01-21 01:31:19'),
(12, 'ADMIN002', 'MTB', 0, 0, '2025-01-21 01:31:20'),
(13, 'ADMIN002', 'ECL', 1, 1, '2025-01-21 01:31:30'),
(14, 'ADMIN002', 'R19', 0, 1, '2025-01-22 11:28:00'),
(15, 'ADMIN002', 'ECL', 0, 1, '2025-01-22 11:28:02'),
(16, 'ADMIN002', 'MTB', 1, 0, '2025-01-22 11:28:04'),
(17, 'ADMIN001', 'R19', 1, 1, '2025-01-22 11:28:16'),
(18, 'ADMIN001', 'ECL', 1, 1, '2025-01-22 11:28:17'),
(19, 'ADMIN001', 'MTB', 0, 0, '2025-01-22 11:28:19'),
(20, 'ADMIN001', 'R19', 0, 1, '2025-01-22 11:28:20'),
(21, 'ADMIN001', 'ECL', 0, 1, '2025-01-22 11:28:21'),
(22, 'ADMIN001', 'R19', 1, 1, '2025-01-23 09:06:09'),
(23, 'ADMIN001', 'MTB', 1, 0, '2025-01-23 09:06:10'),
(24, 'ADMIN001', 'ECL', 1, 1, '2025-01-23 09:06:11'),
(25, 'ADMIN001', 'R19', 0, 1, '2025-01-24 01:19:48'),
(26, 'ADMIN001', 'ECL', 0, 1, '2025-01-24 01:19:50'),
(27, 'ADMIN001', 'MTB', 0, 0, '2025-01-24 01:19:51'),
(28, 'ADMIN001', 'MTB', 1, 0, '2025-01-24 01:20:08'),
(29, 'ADMIN001', 'R19', 1, 1, '2025-01-24 01:20:09'),
(30, 'ADMIN001', 'ECL', 1, 1, '2025-01-24 01:20:10'),
(31, 'ADMIN002', 'R19', 0, 1, '2025-01-28 03:38:33'),
(32, 'ADMIN002', 'MTB', 0, 0, '2025-01-28 03:38:36'),
(33, 'ADMIN002', 'ECL', 0, 1, '2025-01-28 03:39:23'),
(34, 'ADMIN002', 'MTB', 1, 0, '2025-01-28 04:02:40'),
(35, 'ADMIN002', 'MTB', 0, 0, '2025-01-28 04:02:41'),
(36, 'ADMIN002', 'MTB', 1, 0, '2025-01-28 04:02:56'),
(37, 'ADMIN002', 'MTB', 0, 0, '2025-01-28 04:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `monthly`
--

CREATE TABLE `monthly` (
  `id` int(11) NOT NULL,
  `month` varchar(20) NOT NULL,
  `monthly` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomsched`
--

CREATE TABLE `roomsched` (
  `id` int(11) NOT NULL,
  `room` varchar(20) NOT NULL,
  `roomDay` varchar(20) NOT NULL,
  `sched` varchar(65) NOT NULL,
  `section` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomstate`
--

CREATE TABLE `roomstate` (
  `id` int(11) NOT NULL,
  `room` varchar(20) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `occupancy` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomstate`
--

INSERT INTO `roomstate` (`id`, `room`, `state`, `occupancy`, `timestamp`) VALUES
(1, 'R19', 0, 0, '2025-01-28 03:39:33'),
(2, 'ECL', 0, 0, '2025-01-28 03:39:30'),
(3, 'MTB', 0, 0, '2025-01-28 04:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `roomtemp`
--

CREATE TABLE `roomtemp` (
  `id` int(11) NOT NULL,
  `room` varchar(20) NOT NULL,
  `temperature` double NOT NULL,
  `humidity` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roomval`
--

CREATE TABLE `roomval` (
  `id` int(11) NOT NULL,
  `room` varchar(20) NOT NULL,
  `data` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomval`
--

INSERT INTO `roomval` (`id`, `room`, `data`, `timestamp`) VALUES
(1, 'R19', 11, '2024-10-01 00:00:00'),
(2, 'R19', 11, '2024-10-01 01:00:00'),
(3, 'R19', 11.7, '2024-10-01 02:00:00'),
(4, 'R19', 11.6, '2024-10-01 03:00:00'),
(5, 'R19', 12.7, '2024-10-01 05:00:00'),
(6, 'R19', 13.2, '2024-10-01 06:00:00'),
(7, 'R19', 12.9, '2024-10-01 07:00:00'),
(8, 'R19', 13.8, '2024-10-01 08:00:00'),
(9, 'R19', 11, '2024-10-02 00:00:00'),
(10, 'R19', 11.2, '2024-10-02 01:00:00'),
(11, 'R19', 11.9, '2024-10-02 02:00:00'),
(12, 'R19', 12.6, '2024-10-02 03:00:00'),
(13, 'R19', 12.5, '2024-10-02 05:00:00'),
(14, 'R19', 13.1, '2024-10-02 06:00:00'),
(15, 'R19', 13.1, '2024-10-02 07:00:00'),
(16, 'R19', 13.7, '2024-10-02 08:00:00'),
(17, 'R19', 10.7, '2024-10-03 00:00:00'),
(18, 'R19', 11.4, '2024-10-03 01:00:00'),
(19, 'R19', 12.1, '2024-10-03 02:00:00'),
(20, 'R19', 12.4, '2024-10-03 03:00:00'),
(21, 'R19', 12.5, '2024-10-03 05:00:00'),
(22, 'R19', 12.6, '2024-10-03 06:00:00'),
(23, 'R19', 13.2, '2024-10-03 07:00:00'),
(24, 'R19', 13.8, '2024-10-03 08:00:00'),
(25, 'R19', 11.3, '2024-10-04 00:00:00'),
(26, 'R19', 11.8, '2024-10-04 01:00:00'),
(27, 'R19', 11.3, '2024-10-04 02:00:00'),
(28, 'R19', 11.9, '2024-10-04 03:00:00'),
(29, 'R19', 12.5, '2024-10-04 05:00:00'),
(30, 'R19', 13.3, '2024-10-04 06:00:00'),
(31, 'R19', 13.5, '2024-10-04 07:00:00'),
(32, 'R19', 13.8, '2024-10-04 08:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomsched`
--
ALTER TABLE `roomsched`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomstate`
--
ALTER TABLE `roomstate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtemp`
--
ALTER TABLE `roomtemp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomval`
--
ALTER TABLE `roomval`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `roomsched`
--
ALTER TABLE `roomsched`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomstate`
--
ALTER TABLE `roomstate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roomtemp`
--
ALTER TABLE `roomtemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roomval`
--
ALTER TABLE `roomval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
