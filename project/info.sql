-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2025 at 10:32 PM
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
-- Database: `aqi`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `AQI` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `Country`, `City`, `AQI`) VALUES
(9, 'Bangladesh', 'Dhaka', '175'),
(10, 'Bangladesh', 'Chittagong', '95'),
(11, 'Bangladesh', 'Khulna', '110'),
(12, 'Bangladesh', 'Rajshahi', '120'),
(13, 'Bangladesh', 'Sylhet', '85'),
(14, 'Bangladesh', 'Barisal', '105'),
(15, 'Bangladesh', 'Rangpur', '98'),
(16, 'Bangladesh', 'Mymensingh', '102'),
(17, 'Bangladesh', 'Comilla', '99'),
(18, 'Bangladesh', 'Narayanganj', '135'),
(19, 'Bangladesh', 'Gazipur', '140'),
(20, 'Bangladesh', 'Jessore', '112'),
(21, 'Bangladesh', 'Bogura', '100'),
(22, 'Bangladesh', 'Pabna', '108'),
(23, 'Bangladesh', 'Noakhali', '93'),
(24, 'Bangladesh', 'Brahmanbaria', '97'),
(25, 'Bangladesh', 'Dinajpur', '90'),
(27, 'Bangladesh', 'Feni', '96'),
(28, 'Bangladesh', 'Tangail', '101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
