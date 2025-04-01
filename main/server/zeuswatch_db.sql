-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2025 at 11:41 PM
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
-- Database: `zeuswatch_db`
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

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`id`, `room`, `daily`, `timestamp`) VALUES
(1, 'MTB', 4.53, '2025-01-13 08:30:00'),
(2, 'MTB', 4.56, '2025-01-14 08:30:00'),
(3, 'MTB', 4.52, '2025-01-15 08:30:00'),
(4, 'MTB', 4.48, '2025-01-16 08:30:00'),
(5, 'MTB', 4.23, '2025-01-17 08:30:00'),
(6, 'MTB', 4.43, '2025-01-20 08:30:00'),
(7, 'MTB', 4.52, '2025-01-21 08:30:00'),
(8, 'MTB', 4.36, '2025-01-22 08:30:00'),
(9, 'MTB', 4.32, '2025-01-23 08:30:00'),
(10, 'MTB', 4.47, '2025-01-24 08:30:00'),
(11, 'MTB', 4.52, '2025-01-27 08:30:00'),
(12, 'MTB', 4.3, '2025-01-28 08:30:00'),
(13, 'MTB', 4.44, '2025-01-29 08:30:00'),
(14, 'MTB', 4.44, '2025-01-30 08:30:00'),
(15, 'MTB', 4.53, '2025-01-31 08:30:00'),
(16, 'MTB', 4.37, '2025-02-03 08:30:00'),
(17, 'MTB', 4.54, '2025-02-04 08:30:00'),
(18, 'MTB', 4.41, '2025-02-05 08:30:00'),
(19, 'MTB', 4.4, '2025-02-06 08:30:00'),
(20, 'MTB', 4.37, '2025-02-07 08:30:00'),
(21, 'MTB', 3.19, '2025-02-10 08:30:00'),
(22, 'MTB', 4.25, '2025-02-11 08:30:00'),
(23, 'MTB', 4.23, '2025-02-12 08:30:00'),
(24, 'MTB', 4.31, '2025-02-13 08:30:00'),
(25, 'MTB', 2.8, '2025-02-14 08:30:00'),
(26, 'MTB', 4.3, '2025-02-17 08:30:00'),
(27, 'MTB', 4.22, '2025-02-18 08:30:00'),
(28, 'MTB', 2.25, '2025-02-19 08:30:00'),
(29, 'MTB', 3.23, '2025-02-20 08:30:00'),
(30, 'MTB', 4.19, '2025-02-21 08:30:00'),
(31, 'MTB', 0.8, '2025-02-24 08:30:00'),
(32, 'MTB', 0.86, '2025-02-25 08:30:00'),
(33, 'MTB', 1.26, '2025-02-26 08:30:00'),
(34, 'MTB', 1.2, '2025-02-27 08:30:00'),
(35, 'MTB', 2.1, '2025-02-28 08:30:00'),
(36, 'ECL ', 13.48, '2025-01-13 08:30:00'),
(37, 'ECL ', 13.58, '2025-01-14 08:30:00'),
(38, 'ECL ', 14.98, '2025-01-15 08:30:00'),
(39, 'ECL ', 15.16, '2025-01-16 08:30:00'),
(40, 'ECL ', 12.08, '2025-01-17 08:30:00'),
(41, 'ECL ', 12.23, '2025-01-20 08:30:00'),
(42, 'ECL ', 14.1, '2025-01-21 08:30:00'),
(43, 'ECL ', 13.52, '2025-01-22 08:30:00'),
(44, 'ECL ', 15.15, '2025-01-23 08:30:00'),
(45, 'ECL ', 13.06, '2025-01-24 08:30:00'),
(46, 'ECL ', 13.07, '2025-01-27 08:30:00'),
(47, 'ECL ', 12.53, '2025-01-28 08:30:00'),
(48, 'ECL ', 14.18, '2025-01-29 08:30:00'),
(49, 'ECL ', 13.96, '2025-01-30 08:30:00'),
(50, 'ECL ', 15.8, '2025-01-31 08:30:00'),
(51, 'ECL ', 16.65, '2025-02-03 08:30:00'),
(52, 'ECL ', 15.07, '2025-02-04 08:30:00'),
(53, 'ECL ', 13.21, '2025-02-05 08:30:00'),
(54, 'ECL ', 13.42, '2025-02-06 08:30:00'),
(55, 'ECL ', 14.63, '2025-02-07 08:30:00'),
(56, 'ECL ', 7.07, '2025-02-10 08:30:00'),
(57, 'ECL ', 2.46, '2025-02-11 08:30:00'),
(58, 'ECL ', 4.78, '2025-02-12 08:30:00'),
(59, 'ECL ', 6.89, '2025-02-13 08:30:00'),
(60, 'ECL ', 0.32, '2025-02-14 08:30:00'),
(61, 'ECL ', 7.16, '2025-02-17 08:30:00'),
(62, 'ECL ', 2.59, '2025-02-18 08:30:00'),
(63, 'ECL ', 0.32, '2025-02-19 08:30:00'),
(64, 'ECL ', 2.58, '2025-02-20 08:30:00'),
(65, 'ECL ', 0.32, '2025-02-21 08:30:00'),
(66, 'ECL ', 2.37, '2025-02-24 08:30:00'),
(67, 'ECL ', 4.5, '2025-02-25 08:30:00'),
(68, 'ECL ', 4.61, '2025-02-26 08:30:00'),
(69, 'ECL ', 0.29, '2025-02-27 08:30:00'),
(70, 'ECL ', 4.95, '2025-02-28 08:30:00'),
(71, 'R19 ', 6.81, '2025-01-13 08:30:00'),
(72, 'R19 ', 6.88, '2025-01-14 08:30:00'),
(73, 'R19 ', 6.78, '2025-01-15 08:30:00'),
(74, 'R19 ', 6.93, '2025-01-16 08:30:00'),
(75, 'R19 ', 6.9, '2025-01-17 08:30:00'),
(76, 'R19 ', 6.77, '2025-01-20 08:30:00'),
(77, 'R19 ', 6.88, '2025-01-21 08:30:00'),
(78, 'R19 ', 6.92, '2025-01-22 08:30:00'),
(79, 'R19 ', 6.84, '2025-01-23 08:30:00'),
(80, 'R19 ', 7.08, '2025-01-24 08:30:00'),
(81, 'R19 ', 6.93, '2025-01-27 08:30:00'),
(82, 'R19 ', 6.87, '2025-01-28 08:30:00'),
(83, 'R19 ', 6.86, '2025-01-29 08:30:00'),
(84, 'R19 ', 6.99, '2025-01-30 08:30:00'),
(85, 'R19 ', 6.91, '2025-01-31 08:30:00'),
(86, 'R19 ', 6.85, '2025-02-03 08:30:00'),
(87, 'R19 ', 6.94, '2025-02-04 08:30:00'),
(88, 'R19 ', 6.93, '2025-02-05 08:30:00'),
(89, 'R19 ', 7.01, '2025-02-06 08:30:00'),
(90, 'R19 ', 6.98, '2025-02-07 08:30:00'),
(91, 'R19 ', 3.81, '2025-02-10 08:30:00'),
(92, 'R19 ', 5.68, '2025-02-11 08:30:00'),
(93, 'R19 ', 4.35, '2025-02-12 08:30:00'),
(94, 'R19 ', 3.98, '2025-02-13 08:30:00'),
(95, 'R19 ', 4.85, '2025-02-14 08:30:00'),
(96, 'R19 ', 4.4, '2025-02-17 08:30:00'),
(97, 'R19 ', 3.62, '2025-02-18 08:30:00'),
(98, 'R19 ', 3.56, '2025-02-19 08:30:00'),
(99, 'R19 ', 4.64, '2025-02-20 08:30:00'),
(100, 'R19 ', 4.42, '2025-02-21 08:30:00'),
(101, 'R19 ', 4.89, '2025-02-24 08:30:00'),
(102, 'R19 ', 3.3, '2025-02-25 08:30:00'),
(103, 'R19 ', 4.38, '2025-02-26 08:30:00'),
(104, 'R19 ', 5.44, '2025-02-27 08:30:00'),
(105, 'R19 ', 3.69, '2025-02-28 08:30:00'),
(106, 'R19', 0, '2025-03-03 08:30:00'),
(107, 'R19', 0, '2025-03-04 08:30:00'),
(108, 'MTB', 0, '2025-03-03 08:30:00'),
(109, 'MTB', 0, '2025-03-04 08:30:00'),
(110, 'ECL', 0, '2025-03-03 08:30:00'),
(111, 'ECL', 0.092408333333329, '2025-03-04 09:34:56'),
(112, 'R19', 0, '2025-03-05 08:30:00'),
(113, 'MTB', 0, '2025-03-05 08:30:00'),
(114, 'ECL', 0, '2025-03-05 08:30:00'),
(115, 'R19', 0, '2025-03-06 08:30:00'),
(116, 'MTB', 0, '2025-03-06 08:30:00'),
(117, 'ECL', 0, '2025-03-06 08:30:00'),
(118, 'ECL', 0, '2025-03-07 08:30:00'),
(119, 'R19', 0, '2025-03-07 08:30:00'),
(120, 'MTB', 0, '2025-03-12 08:00:02'),
(121, 'ECL', 0, '2025-03-10 08:30:02'),
(122, 'MTB', 0, '2025-03-10 08:30:02'),
(123, 'R19', 0, '2025-03-10 08:30:02'),
(124, 'ECL', 0, '2025-03-11 08:30:02'),
(125, 'MTB', 0, '2025-03-11 08:30:02'),
(126, 'R19', 0, '2025-03-11 08:30:02'),
(127, 'ECL', 0, '2025-03-12 08:30:02'),
(128, 'MTB', 0, '2025-03-12 08:30:02'),
(129, 'R19', 0, '2025-03-12 08:30:02'),
(130, 'ECL', 0, '2025-03-13 08:30:02'),
(131, 'MTB', 0, '2025-03-13 08:30:02'),
(132, 'R19', 0, '2025-03-13 08:30:02'),
(133, 'MTB', 0, '2025-03-14 08:30:02'),
(134, 'ECL', 0, '2025-03-14 08:30:02'),
(135, 'R19', 0, '2025-03-14 08:30:02');

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
(7, 'ADMIN002', 'R19', 0, 0, '2025-01-20 17:23:43'),
(8, 'ADMIN002', 'R19', 1, 0, '2025-01-20 17:23:51'),
(9, 'ADMIN002', 'R19', 1, 1, '2025-01-20 17:31:17'),
(10, 'ADMIN002', 'MTB', 1, 0, '2025-01-20 17:31:18'),
(11, 'ADMIN002', 'ECL', 0, 1, '2025-01-20 17:31:19'),
(12, 'ADMIN002', 'MTB', 0, 0, '2025-01-20 17:31:20'),
(13, 'ADMIN002', 'ECL', 1, 1, '2025-01-20 17:31:30'),
(14, 'ADMIN002', 'R19', 0, 1, '2025-01-22 03:28:00'),
(15, 'ADMIN002', 'ECL', 0, 1, '2025-01-22 03:28:02'),
(16, 'ADMIN002', 'MTB', 1, 0, '2025-01-22 03:28:04'),
(17, 'ADMIN001', 'R19', 1, 1, '2025-01-22 03:28:16'),
(18, 'ADMIN001', 'ECL', 1, 1, '2025-01-22 03:28:17'),
(19, 'ADMIN001', 'MTB', 0, 0, '2025-01-22 03:28:19'),
(20, 'ADMIN001', 'R19', 0, 1, '2025-01-22 03:28:20'),
(21, 'ADMIN001', 'ECL', 0, 1, '2025-01-22 03:28:21'),
(22, 'ADMIN001', 'R19', 1, 1, '2025-01-23 01:06:09'),
(23, 'ADMIN001', 'MTB', 1, 0, '2025-01-23 01:06:10'),
(24, 'ADMIN001', 'ECL', 1, 1, '2025-01-23 01:06:11'),
(25, 'ADMIN001', 'R19', 0, 1, '2025-01-23 17:19:48'),
(26, 'ADMIN001', 'ECL', 0, 1, '2025-01-23 17:19:50'),
(27, 'ADMIN001', 'MTB', 0, 0, '2025-01-23 17:19:51'),
(28, 'ADMIN001', 'MTB', 1, 0, '2025-01-23 17:20:08'),
(29, 'ADMIN001', 'R19', 1, 1, '2025-01-23 17:20:09'),
(30, 'ADMIN001', 'ECL', 1, 1, '2025-01-23 17:20:10'),
(31, 'ADMIN002', 'R19', 0, 1, '2025-01-27 19:38:33'),
(32, 'ADMIN002', 'MTB', 0, 0, '2025-01-27 19:38:36'),
(33, 'ADMIN002', 'ECL', 0, 1, '2025-01-27 19:39:23'),
(34, 'ADMIN002', 'MTB', 1, 0, '2025-01-27 20:02:40'),
(35, 'ADMIN002', 'MTB', 0, 0, '2025-01-27 20:02:41'),
(36, 'ADMIN002', 'MTB', 1, 0, '2025-01-27 20:02:56'),
(37, 'ADMIN002', 'MTB', 0, 0, '2025-01-27 20:03:04'),
(38, 'ADMIN002', 'ECL', 1, 0, '2025-03-04 09:17:24'),
(39, 'ADMIN002', 'ECL', 0, 0, '2025-03-04 09:17:30'),
(40, 'ADMIN002', 'ECL', 1, 0, '2025-03-04 09:17:40'),
(41, 'ADMIN002', 'ECL', 0, 0, '2025-03-06 06:11:31'),
(42, 'ADMIN002', 'R19', 1, 0, '2025-03-15 02:57:16'),
(43, 'ADMIN002', 'R19', 0, 0, '2025-03-15 02:57:17'),
(44, 'ADMIN002', 'R19', 1, 0, '2025-03-15 02:57:17'),
(45, 'ADMIN002', 'R19', 0, 0, '2025-03-15 02:57:18'),
(46, 'ADMIN002', 'R19', 1, 0, '2025-03-15 02:58:17'),
(47, 'ADMIN002', 'R19', 0, 0, '2025-03-15 02:58:20'),
(48, 'ADMIN002', 'R19', 1, 0, '2025-03-31 01:39:14'),
(49, 'ADMIN002', 'R19', 0, 0, '2025-03-31 01:39:17');

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

--
-- Dumping data for table `monthly`
--

INSERT INTO `monthly` (`id`, `month`, `monthly`, `timestamp`) VALUES
(1, 'JAN', 376.88, '2025-01-31 08:30:00'),
(2, 'FEB', 289.19, '2025-02-28 08:30:00'),
(3, 'MAR', 0.092408333333329, '2025-03-06 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `predictedtemp`
--

CREATE TABLE `predictedtemp` (
  `id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `temperature` float NOT NULL,
  `humidity` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `predictedtemp`
--

INSERT INTO `predictedtemp` (`id`, `day`, `temperature`, `humidity`) VALUES
(1, 'MON', 36, 56),
(2, 'TUE', 37, 55),
(3, 'WED', 37, 53),
(4, 'THU', 39, 56),
(5, 'FRI', 41, 60);

-- --------------------------------------------------------

--
-- Table structure for table `roomstate`
--

CREATE TABLE `roomstate` (
  `id` int(11) NOT NULL,
  `room` varchar(20) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `occupancy` tinyint(1) NOT NULL,
  `adminStatus` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roomstate`
--

INSERT INTO `roomstate` (`id`, `room`, `state`, `occupancy`, `adminStatus`, `timestamp`) VALUES
(1, 'R19', 0, 0, 'AUTOMATIC', '2025-03-31 01:40:14'),
(2, 'ECL', 0, 0, 'AUTOMATIC', '2025-03-06 06:11:31'),
(3, 'MTB', 0, 0, 'AUTOMATIC', '2025-01-27 20:03:04');

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

--
-- Dumping data for table `roomtemp`
--

INSERT INTO `roomtemp` (`id`, `room`, `temperature`, `humidity`, `timestamp`) VALUES
(1, 'R19', 31, 67, '2025-03-03 07:12:17'),
(2, 'MTB', 31, 63, '2025-03-03 07:12:17'),
(3, 'ECL', 28.5, 42, '2025-03-04 09:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `room` varchar(20) NOT NULL,
  `morning` varchar(20) NOT NULL,
  `afternoon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `room`, `morning`, `afternoon`) VALUES
(1, 'R19', '08:15 AM - 12:00 PM ', '01:00 PM - 07:30 PM'),
(2, 'MTB', '08:15 AM - 12:00 PM ', '01:00 PM - 07:30 PM'),
(3, 'ECL', '08:15 AM - 12:00 PM ', '01:00 PM - 07:30 PM');

-- --------------------------------------------------------

--
-- Table structure for table `weekly`
--

CREATE TABLE `weekly` (
  `id` int(11) NOT NULL,
  `day` int(10) NOT NULL,
  `value` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weekly`
--

INSERT INTO `weekly` (`id`, `day`, `value`, `timestamp`) VALUES
(1, 1, 24.82, '2025-01-13 08:30:00'),
(2, 2, 25.02, '2025-01-14 08:30:00'),
(3, 3, 26.28, '2025-01-15 08:30:00'),
(4, 4, 26.57, '2025-01-16 08:30:00'),
(5, 5, 23.21, '2025-01-17 08:30:00'),
(6, 1, 23.43, '2025-01-20 08:30:00'),
(7, 2, 25.5, '2025-01-21 08:30:00'),
(8, 3, 24.8, '2025-01-22 08:30:00'),
(9, 4, 26.31, '2025-01-23 08:30:00'),
(10, 5, 24.61, '2025-01-24 08:30:00'),
(11, 1, 24.52, '2025-01-27 08:30:00'),
(12, 2, 23.7, '2025-01-28 08:30:00'),
(13, 3, 25.48, '2025-01-29 08:30:00'),
(14, 4, 25.39, '2025-01-30 08:30:00'),
(15, 5, 27.24, '2025-01-31 08:30:00'),
(16, 1, 27.87, '2025-02-03 08:30:00'),
(17, 2, 26.55, '2025-02-04 08:30:00'),
(18, 3, 24.55, '2025-02-05 08:30:00'),
(19, 4, 24.83, '2025-02-06 08:30:00'),
(20, 5, 25.98, '2025-02-07 08:30:00'),
(21, 1, 14.07, '2025-02-10 08:30:00'),
(22, 2, 12.39, '2025-02-11 08:30:00'),
(23, 3, 13.36, '2025-02-12 08:30:00'),
(24, 4, 15.18, '2025-02-13 08:30:00'),
(25, 5, 7.97, '2025-02-14 08:30:00'),
(26, 1, 15.86, '2025-02-17 08:30:00'),
(27, 2, 10.43, '2025-02-18 08:30:00'),
(28, 3, 6.13, '2025-02-19 08:30:00'),
(29, 4, 10.45, '2025-02-20 08:30:00'),
(30, 5, 8.93, '2025-02-21 08:30:00'),
(31, 1, 8.06, '2025-02-24 08:30:00'),
(32, 2, 8.66, '2025-02-25 08:30:00'),
(33, 3, 10.25, '2025-02-26 08:30:00'),
(34, 4, 6.93, '2025-02-27 08:30:00'),
(35, 5, 10.74, '2025-02-28 08:30:00'),
(36, 1, 0, '2025-03-03 08:30:00'),
(37, 2, 0.092408333333329, '2025-03-04 09:34:56'),
(41, 3, 0, '2025-03-05 08:30:00'),
(42, 4, 0, '2025-03-06 08:30:00'),
(43, 5, 0, '2025-03-07 08:30:00'),
(44, 1, 0, '2025-03-10 08:30:00'),
(45, 2, 0, '2025-03-11 08:30:00'),
(46, 3, 0, '2025-03-12 08:30:00'),
(47, 4, 0, '2025-03-13 08:30:00'),
(48, 5, 0, '2025-03-14 08:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `monthly`
--
ALTER TABLE `monthly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predictedtemp`
--
ALTER TABLE `predictedtemp`
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
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weekly`
--
ALTER TABLE `weekly`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `monthly`
--
ALTER TABLE `monthly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `predictedtemp`
--
ALTER TABLE `predictedtemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roomstate`
--
ALTER TABLE `roomstate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roomtemp`
--
ALTER TABLE `roomtemp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weekly`
--
ALTER TABLE `weekly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
