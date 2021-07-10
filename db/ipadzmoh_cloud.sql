-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2021 at 01:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ipadzmoh_cloud`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `credit` int(11) NOT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit`
--

INSERT INTO `credit` (`id`, `userId`, `credit`, `createTime`) VALUES
(1, 5, 1, '2021-07-10 06:59:46'),
(2, 3, 3, '2021-07-10 06:59:46'),
(3, 6, 9, '2021-07-10 11:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `sercheck`
--

CREATE TABLE `sercheck` (
  `id` int(11) NOT NULL,
  `serialNumber` text NOT NULL,
  `userId` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(111) NOT NULL DEFAULT 'Registered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sercheck`
--

INSERT INTO `sercheck` (`id`, `serialNumber`, `userId`, `time`, `status`) VALUES
(1, 'Test credit', 3, '2021-07-10 07:19:58', 'Registered'),
(2, 'test credit onw', 3, '2021-07-10 07:20:09', 'Registered'),
(3, 'heoo', 2, '2021-07-10 08:19:58', 'Registered'),
(4, 'dsfsadf', 2, '2021-07-10 08:20:02', 'Registered'),
(5, 'serial', 5, '2021-07-10 10:58:22', 'Registered'),
(6, 'sjll', 5, '2021-07-10 10:58:42', 'Registered'),
(7, 'SSDFASDF', 5, '2021-07-10 11:06:34', 'Registered'),
(8, 'SSDFASDF', 5, '2021-07-10 11:07:25', 'Registered'),
(9, 'SSDFASDF', 5, '2021-07-10 11:08:08', 'Registered'),
(10, 'SADFASDFASDFKJASHDFKJASHDFKHASSKDHFAHDSKFHASDF', 5, '2021-07-10 11:08:12', 'Registered'),
(11, '123456789012', 5, '2021-07-10 11:11:07', 'Registered'),
(12, 'GGGGGGGGGGGGG', 5, '2021-07-10 11:12:28', 'Registered'),
(13, 'HHHHHHHHHHHH', 6, '2021-07-10 11:44:12', 'Registered');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(5, 'root12', 'tushar@gmail.com', '123'),
(6, 'te', 'te@gmail.com', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sercheck`
--
ALTER TABLE `sercheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sercheck`
--
ALTER TABLE `sercheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
