-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2020 at 01:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `religion` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `address`, `birth_place`, `birth_date`, `religion`, `phone`, `gender`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Roger Setiadi', '', '', '0000-00-00', '', '', 'm', 'd-male.png', '2020-09-04 04:23:33', '2020-09-04 04:23:33'),
(4, 'Roger Federer', '', '', '0000-00-00', '', '', 'f', 'd-female.png', '2020-09-04 04:23:33', '2020-09-04 04:23:33'),
(5, 'Arie Federer', '', '', '0000-00-00', '', '', 'm', 'd-male.png', '2020-09-04 04:23:33', '2020-09-04 04:23:33'),
(6, 'Suastra Setiadi', '', '', '0000-00-00', '', '', 'm', 'd-male.png', '2020-09-04 04:23:33', '2020-09-04 04:23:33'),
(7, 'Roger Suastra', '', '', '0000-00-00', '', '', 'm', 'd-male.png', '2020-09-04 04:23:33', '2020-09-04 04:23:33'),
(8, 'Roger Arie', '', '', '0000-00-00', '', '', 'f', 'd-female.png', '2020-09-04 04:23:33', '2020-09-04 04:23:33'),
(10, 'Arie Arie', '', '', '0000-00-00', '', '', 'm', 'd-male.png', '2020-09-18 22:58:19', '2020-09-18 22:58:19'),
(11, 'Putu Putu', 'Mengwi', 'Denpasar', '2000-08-29', 'Islam', '082100000000', 'm', 'd-male.png', '2020-09-18 23:03:49', '2020-09-22 06:00:11'),
(25, '123', '123', '123', '0003-02-01', 'Protestan', '123', 'm', 'd-male.png', '2020-10-07 21:11:58', '2020-10-07 21:11:58'),
(28, 'Baru', 'Baru', 'Baru', '2000-08-29', 'Hindu', '123123123123', 'm', 'd-male.png', '2020-10-15 15:42:45', '2020-10-15 15:42:45'),
(29, 'Baruu', 'Baruuf', 'Baruu', '2002-08-29', 'Hindu', '123123123123', 'm', 'd-male.png', '2020-10-15 15:43:11', '2020-10-15 19:55:53'),
(30, 'I Putu Arie Suastra Setiadi', 'Br. Munggu, Mengwi, Badung', 'Denpasar', '2000-08-29', 'Hindu', '0812081249', 'm', 'd-male.png', '2020-10-15 15:45:01', '2020-10-15 15:45:01');

-- --------------------------------------------------------

--
-- Table structure for table `member_gender`
--

CREATE TABLE `member_gender` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `value` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_gender`
--

INSERT INTO `member_gender` (`id`, `gender`, `value`) VALUES
(1, 'Male', 'm'),
(2, 'Female', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `member_payment`
--

CREATE TABLE `member_payment` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_payment`
--

INSERT INTO `member_payment` (`id`, `member_id`, `month`, `amount`, `created_at`) VALUES
(1, 1, 9, 400000, '2020-09-15 00:18:00'),
(2, 3, 9, 400000, '2020-09-15 00:18:07'),
(3, 5, 9, 400000, '2020-09-15 00:18:13'),
(4, 7, 9, 400000, '2020-09-15 00:18:19'),
(6, 4, 9, 400000, '2020-09-16 08:25:40'),
(7, 1, 8, 400000, '2020-09-17 13:47:48'),
(8, 1, 7, 400000, '2020-09-17 13:47:48'),
(10, 11, 9, 400000, '2020-09-22 19:19:28'),
(15, 14, 9, 475000, '2020-09-24 07:47:01'),
(16, 10, 9, 475000, '2020-09-25 09:08:41'),
(17, 11, 10, 475000, '2020-10-02 09:42:59'),
(18, 10, 8, 475000, '2020-10-02 11:03:03'),
(19, 10, 10, 475000, '2020-10-03 09:09:13'),
(20, 8, 10, 475000, '2020-10-03 09:14:26'),
(21, 7, 10, 475000, '2020-10-03 09:47:15'),
(22, 10, 11, 475000, '2020-10-05 10:45:24'),
(24, 23, 10, 475000, '2020-10-07 19:02:10'),
(25, 25, 10, 10000, '2020-10-10 11:50:11'),
(26, 30, 10, 400000, '2020-10-15 15:47:17'),
(27, 29, 10, 500000, '2020-10-15 19:46:32');

-- --------------------------------------------------------

--
-- Table structure for table `member_payment_debt`
--

CREATE TABLE `member_payment_debt` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_payment_debt`
--

INSERT INTO `member_payment_debt` (`id`, `member_id`, `month`, `created_at`) VALUES
(1, 10, 10, '2020-10-02 10:00:55'),
(2, 10, 8, '2020-08-29 00:00:00'),
(3, 8, 10, '2020-10-03 09:14:16'),
(4, 7, 10, '2020-10-03 09:30:40'),
(5, 6, 10, '2020-10-05 09:52:10'),
(6, 10, 11, '2020-10-05 00:00:00'),
(7, 10, 12, '2020-10-05 00:00:00'),
(8, 18, 10, '2020-10-05 17:20:01'),
(9, 19, 10, '2020-10-05 17:23:18'),
(10, 20, 10, '2020-10-05 17:46:51'),
(11, 21, 10, '2020-10-05 17:47:06'),
(12, 22, 10, '2020-10-05 18:02:01'),
(13, 23, 10, '2020-10-07 18:45:08'),
(14, 24, 10, '2020-10-07 21:01:14'),
(15, 25, 10, '2020-10-07 21:12:00'),
(16, 26, 10, '2020-10-07 21:12:42'),
(17, 27, 10, '2020-10-10 11:39:54'),
(18, 30, 10, '2020-10-15 15:45:10'),
(19, 29, 10, '2020-10-15 19:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `member_payment_price`
--

CREATE TABLE `member_payment_price` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_payment_price`
--

INSERT INTO `member_payment_price` (`id`, `price`, `created_at`, `updated_at`) VALUES
(1, 500000, '2020-09-17', '2020-10-15 19:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `member_religion`
--

CREATE TABLE `member_religion` (
  `id` int(11) NOT NULL,
  `religion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_religion`
--

INSERT INTO `member_religion` (`id`, `religion`) VALUES
(1, 'Islam'),
(2, 'Hindu'),
(3, 'Protestan'),
(4, 'Katolik'),
(5, 'Buddha'),
(6, 'Khonghucu');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-09-04-084449', 'App\\Database\\Migrations\\Member', 'default', 'App', 1599209859, 1),
(2, '2020-09-04-120026', 'App\\Database\\Migrations\\User', 'default', 'App', 1599221632, 2),
(3, '2020-09-04-122515', 'App\\Database\\Migrations\\UserRole', 'default', 'App', 1599222877, 3),
(4, '2020-09-04-122529', 'App\\Database\\Migrations\\UserAccess', 'default', 'App', 1599222877, 3),
(5, '2020-09-04-122535', 'App\\Database\\Migrations\\UserMenu', 'default', 'App', 1599222877, 3),
(6, '2020-09-04-122545', 'App\\Database\\Migrations\\UserSubMenu', 'default', 'App', 1599222877, 3),
(7, '2020-09-04-130955', 'App\\Database\\Migrations\\UserMenu', 'default', 'App', 1599225002, 4),
(8, '2020-09-04-132650', 'App\\Database\\Migrations\\UserSubMenu', 'default', 'App', 1599226017, 5),
(9, '2020-09-04-132930', 'App\\Database\\Migrations\\UserAccess', 'default', 'App', 1599226505, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `gender`, `image`, `password`, `role_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'male', 'd-male.png', '$2y$10$ifvya9m/bF56GCYBcvV35OHp4XKkYpHx0alIaK6qYAsd.DG2BB4Ha', 1, 1, '2020-09-04 07:20:50', '2020-09-04 07:20:50'),
(2, 'Member', 'member@gmail.com', 'female', 'd-female.png', '$2y$10$E0YSLvpBRXcSmcDO1B1XgOZrYV9YNZCbfa6jU1hqA51pu2hXOf3Ny', 2, 1, '2020-09-04 07:20:50', '2020-09-04 07:20:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(7, 1, 3),
(8, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Member'),
(3, 'Account');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(3, 2, 'Member', 'member', 'fas fa-fw fa-users', 1),
(6, 3, 'Sign Out', 'auth/logout', 'fas fa-sign-out-alt', 1),
(8, 2, 'Tambah', 'member/create', 'fa-fw fas fa-user-plus', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_gender`
--
ALTER TABLE `member_gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_payment`
--
ALTER TABLE `member_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_payment_debt`
--
ALTER TABLE `member_payment_debt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_payment_price`
--
ALTER TABLE `member_payment_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_religion`
--
ALTER TABLE `member_religion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `member_gender`
--
ALTER TABLE `member_gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member_payment`
--
ALTER TABLE `member_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `member_payment_debt`
--
ALTER TABLE `member_payment_debt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `member_payment_price`
--
ALTER TABLE `member_payment_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_religion`
--
ALTER TABLE `member_religion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
