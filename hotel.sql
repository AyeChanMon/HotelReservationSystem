-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2022 at 02:42 PM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotelrooms`
--

CREATE TABLE `hotelrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotelrooms`
--

INSERT INTO `hotelrooms` (`id`, `floor_id`, `room_id`, `room_type_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '35000.00', '2022-01-13 13:09:44', '2022-01-13 13:17:32'),
(2, 2, 1, 2, '35000.00', '2022-01-13 13:10:25', '2022-01-13 13:10:25'),
(3, 2, 3, 3, '20000.00', '2022-01-13 13:40:24', '2022-01-13 13:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Floor 1', '2022-01-13 13:09:09', '2022-01-13 13:09:09'),
(2, 'Floor 2', '2022-01-13 13:09:18', '2022-01-13 13:09:18'),
(3, 'Floor 3', '2022-01-13 13:39:59', '2022-01-13 13:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_01_11_082129_create_roomtypes_table', 1),
(5, '2022_01_11_085710_create_levels_table', 1),
(6, '2022_01_11_085732_create_rooms_table', 1),
(7, '2022_01_11_120654_create_hotelrooms_table', 1),
(8, '2022_01_11_153805_create_reservations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cindate` date NOT NULL,
  `coutdate` date NOT NULL,
  `cintime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `couttime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `childno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adultno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtype1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtype2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `norooms1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `norooms2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instructions` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `first_name`, `last_name`, `address`, `zipcode`, `city`, `state`, `phone`, `email`, `login_email`, `cindate`, `coutdate`, `cintime`, `couttime`, `childno`, `adultno`, `rtype1`, `rtype2`, `norooms1`, `norooms2`, `instructions`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Yin Phyu', 'Hnin', 'Yangon', '222', 'Kamaryut', 'Yangon', '09420700335', 'yinphyu@gmail.com', 'yinphyu@gmail.com', '2022-01-13', '2022-01-14', 'Morning', 'Morning', NULL, NULL, '1', NULL, '1', NULL, NULL, '70000.00', '2022-01-13 13:12:28', '2022-01-13 13:12:28'),
(2, 'Yin Phyu', 'Hnin', 'Yangon', '222', 'Kamaryut', 'Yangon', '09420700335', 'yinphyu@gmail.com', 'yinphyu@gmail.com', '2022-01-13', '2022-01-14', 'Afternoon', 'Afternoon', NULL, NULL, '1', NULL, '2', NULL, NULL, '140000.00', '2022-01-13 13:16:45', '2022-01-13 13:16:45'),
(3, 'Aye Chan', 'Mon', 'Mandalay', '222', 'Yangon', 'Mandalay', '09791818305', 'ayechan@gmail.com', 'ayechan@gmail.com', '2022-01-13', '2022-01-14', 'Afternoon', 'Afternoon', NULL, NULL, NULL, '1', NULL, '1', NULL, '70000.00', '2022-01-13 13:19:05', '2022-01-13 13:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Room A', '2022-01-13 13:09:34', '2022-01-13 13:09:34'),
(2, 'Room B', '2022-01-13 13:40:07', '2022-01-13 13:40:07'),
(3, 'Room C', '2022-01-13 13:40:12', '2022-01-13 13:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `roomtypes`
--

CREATE TABLE `roomtypes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roomtypes`
--

INSERT INTO `roomtypes` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Delux', '35000.00', '2022-01-13 13:08:43', '2022-01-13 13:08:43'),
(2, 'Standard', '25000.00', '2022-01-13 13:08:58', '2022-01-13 13:39:49'),
(3, 'Single', '20000.00', '2022-01-13 13:39:40', '2022-01-13 13:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$aCqiDyCylH4jOK9IM3zrDumyqcLmYsMpnbrBV7UVAwCD6.AZbEAUO', NULL, NULL, NULL, '0', 'xo8RzuDLmdeLB5Wz8UdQfb1BzZ1oTNM8ySZO3qOTAIJePje33bDiWhUmqvYO', '2022-01-13 12:42:52', '2022-01-13 13:20:13'),
(2, 'Aye Chan', 'ayechan@gmail.com', NULL, '$2y$10$FlJINu0npK3qSxceEBytIumt62Qy1NcUiqPpWnHAs4MoOKQvA2PRO', NULL, NULL, NULL, '1', NULL, '2022-01-13 12:55:00', '2022-01-13 13:21:29'),
(3, 'Yin Phyu', 'yinphyu@gmail.com', NULL, '$2y$10$6CfN/gc2V1Ge5CiIdU28TeZ1o5gIRVGLhIE2rBWnj3ntoDuGs217W', NULL, NULL, NULL, '2', NULL, '2022-01-13 13:11:16', '2022-01-13 13:21:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelrooms`
--
ALTER TABLE `hotelrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roomtypes`
--
ALTER TABLE `roomtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotelrooms`
--
ALTER TABLE `hotelrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roomtypes`
--
ALTER TABLE `roomtypes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
