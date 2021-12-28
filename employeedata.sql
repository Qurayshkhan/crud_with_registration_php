-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 08:19 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employeedata`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'email'),
(2, 'gmail'),
(3, 'yahoo');

-- --------------------------------------------------------

--
-- Table structure for table `employeereg`
--

CREATE TABLE `employeereg` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `cpassword` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeereg`
--

INSERT INTO `employeereg` (`id`, `name`, `email`, `phone`, `password`, `cpassword`, `file`, `dt`) VALUES
(14, 'Hassan khan', 'hk147471@gmail.com', '03484348709', '$2y$10$IsM0H53piP9X8.hDzStTUOJMP1YAEg3pFWh7QmxyY9lkqLsmtIfIK', '$2y$10$E632CscVLHmXhWohT3mp0OT80.4.2Qz1v2MxFOi4xgjk3X1c0CeQm', 'upload/96 (1).jpg', '2021-10-16 18:11:20'),
(15, 'Muhammad Jawad Tahir', 'jawad@gmail.com', '034322312312', '$2y$10$WVX9.36qR3T.Saf5mBpcyefvYr/.8UFT7Wi7NAumjbxXZtPLIzInq', '$2y$10$yt7HpBGqnniW1JV3RbYaZ.B1IznUyIQwl4gUoGFeG8ML.d9ZMjeu.', 'upload/6.jpg', '2021-10-18 08:45:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeereg`
--
ALTER TABLE `employeereg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employeereg`
--
ALTER TABLE `employeereg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
