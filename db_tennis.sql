-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 03:14 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tennis`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'I Putu Arie Suastra Setiadi', 'ariesetiadi00@gmail.com', 'default.jpg', '$2y$10$zZgi1PET.ROUBMAovcQgd.ZIemoV04AEz0RsHHU9PaaOtdK6u61je', 0, 1, '2020-08-21'),
(5, 'I Putu Arie Suastra Setiadi', 'tuarimb29@gmail.com', 'default.jpg', '$2y$10$.bLiagPeWwLCXkhpahZ91.Ybo0GdZzt2Eug7K9sqM8.SsYJ.rbuY6', 0, 0, '2020-08-23'),
(6, 'I Putu Arie Suastra Setiadi', 'tuarimb11@gmail.com', 'default.jpg', '$2y$10$9IyjoShllHeh6QPkHVXJ5eLsSIktOpxSA55gHr8AAt7rY3W8qZt/y', 0, 1, '2020-08-23'),
(7, 'I Putu Arie Suastra Setiadi', 'tuarimb21@gmail.com', 'default.jpg', '$2y$10$7GXhftGRHSaGYwqGdkP.OeifOQirTKlm/miiljBWy9F1tnhFaeEBK', 0, 1, '2020-08-23'),
(8, 'I Putu Arie Suastra Setiadi', 'tuarimb22@gmail.com', 'default.jpg', '$2y$10$nFWJb5Th/VoM374D8pvw6.JBtaWPqIROENyajxweZCrLRnqn34wCi', 0, 1, '2020-08-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
