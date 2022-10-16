-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 05:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hinducalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `birth`
--

CREATE TABLE `birth` (
  `id` bigint(20) NOT NULL,
  `start_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `birth`
--

INSERT INTO `birth` (`id`, `start_date`, `to_date`, `created_at`, `updated_at`) VALUES
(1, '2022-05-01', '2022-06-09', '2022-06-08 15:28:13', '2022-06-08 15:28:13'),
(2, '2021-01-01', '2022-06-09', '2022-06-09 01:33:11', '2022-06-09 01:33:11'),
(3, '2022-06-01', '2022-06-09', '2022-06-09 01:40:34', '2022-06-09 01:40:34'),
(4, '2022-06-01', '2022-06-10', '2022-06-09 02:56:01', '2022-06-09 02:56:01'),
(5, '2006-01-03', '2006-01-19', '2022-06-12 00:05:04', '2022-06-12 00:05:04'),
(6, '2022-06-10', '2022-06-18', '2022-06-18 02:45:39', '2022-06-18 02:45:39'),
(7, '2022-06-16', '2022-06-18', '2022-06-18 05:11:45', '2022-06-18 05:11:45'),
(8, '2022-06-18', '2022-06-18', '2022-06-18 05:18:31', '2022-06-18 05:18:31'),
(9, '2022-06-01', '2022-06-18', '2022-06-18 05:21:29', '2022-06-18 05:21:29'),
(10, '2022-06-10', '2022-06-18', '2022-06-18 05:25:24', '2022-06-18 05:25:24'),
(11, '2022-06-18', '2022-06-18', '2022-06-18 05:27:16', '2022-06-18 05:27:16'),
(12, '2022-06-18', '2022-06-18', '2022-06-18 05:36:22', '2022-06-18 05:36:22'),
(13, '2022-06-18', '2022-06-18', '2022-06-18 05:38:41', '2022-06-18 05:38:41'),
(14, '2022-06-18', '2022-06-18', '2022-06-18 05:43:08', '2022-06-18 05:43:08'),
(15, '2022-06-17', '2022-06-18', '2022-06-18 05:45:15', '2022-06-18 05:45:15'),
(16, '2022-06-18', '2022-06-18', '2022-06-18 05:48:11', '2022-06-18 05:48:11'),
(17, '2022-06-17', '2022-06-18', '2022-06-18 05:53:17', '2022-06-18 05:53:17'),
(18, '2015-06-05', '2015-06-07', '2022-06-18 05:54:34', '2022-06-18 05:54:34'),
(19, '2022-06-18', '2022-06-18', '2022-06-18 06:14:52', '2022-06-18 06:14:52'),
(20, '2022-06-18', '2022-06-18', '2022-06-18 06:17:50', '2022-06-18 06:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `birth_details`
--

CREATE TABLE `birth_details` (
  `id` bigint(20) NOT NULL,
  `date` date DEFAULT NULL,
  `hindu_month` varchar(191) DEFAULT NULL,
  `month_planet` varchar(191) DEFAULT NULL,
  `vaar` varchar(191) DEFAULT NULL,
  `paksha` varchar(191) DEFAULT NULL,
  `tithi` varchar(191) DEFAULT NULL,
  `yog` varchar(191) DEFAULT NULL,
  `moon_rashi` varchar(191) DEFAULT NULL,
  `rashi_planet` varchar(191) DEFAULT NULL,
  `moon_varna` varchar(191) DEFAULT NULL,
  `sun_rashi` varchar(191) DEFAULT NULL,
  `nakshatra` varchar(191) DEFAULT NULL,
  `karan` varchar(191) DEFAULT NULL,
  `sunrise` varchar(191) DEFAULT NULL,
  `sunset` varchar(191) DEFAULT NULL,
  `Aries` text DEFAULT NULL,
  `Taurus` text DEFAULT NULL,
  `Gemini` text DEFAULT NULL,
  `Cancer` text DEFAULT NULL,
  `Leo` text DEFAULT NULL,
  `Virgo` text DEFAULT NULL,
  `Libra` text DEFAULT NULL,
  `Scorpio` text DEFAULT NULL,
  `Sagittarius` text DEFAULT NULL,
  `Capricorn` text DEFAULT NULL,
  `Aquarius` text DEFAULT NULL,
  `Pisces` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_03_23_122624_add_status_to_users_table', 1),
(10, '2020_03_23_122808_add_profile_pic_to_users_table', 1),
(11, '2020_03_23_134058_add_delete_at_to_users_table', 1),
(12, '2020_03_24_114126_create_menus_table', 1),
(21, '2020_03_26_203354_create_category_table', 2),
(22, '2020_03_26_204456_create_sub_category_table', 2),
(23, '2020_03_29_151133_create_product_table', 2),
(24, '2020_04_04_142623_add_roleid_to_users_table', 2),
(25, '2020_04_25_193638_create_roles_table', 2),
(26, '2020_05_12_115943_create_contact_us_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('krishire.hk1929@gmail.com', 'eyJpdiI6ImZmbUY1L3l3VWJHa1J1OFdOQitsOFE9PSIsInZhbHVlIjoiMk5td2JSR3gzL1NYNFZmYkR5Q3hUUGEvbzkwSGgyUGVmV0RtNXIxRHZBMD0iLCJtYWMiOiIwMTc4OWUxMzQxYTlhZGM3MmNmY2M3OWM0ZGY4OWY4ZmE3MGQ4ZTQ5YjNhNTBiYjAzZWVlM2RmOGJjMDE3MDE1In0=', '2020-04-25 15:47:33'),
('patelhiren.hp19@gmail.com', 'eyJpdiI6IjcyYWJzN3lKRFZtZFozMElUbkNGYkE9PSIsInZhbHVlIjoibCtwWktwelB3bEdwQXJPTzJQL0ZHaVlvS0FGY1gwejRPcVl2MWxYOEl2RT0iLCJtYWMiOiIyNmNlMmIyNTY5ZWVlMzFiMmE4NzRmMmExYzM1ZjdiYTk3NDU0MDE2MWQxYTIyNTg5NzBkZDI4OTdjNWY5NDg1In0=', '2020-05-03 09:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-05-03 13:25:54', '2020-05-03 13:25:54'),
(2, 'User', '2020-05-03 13:25:54', '2020-05-03 13:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(191) DEFAULT NULL,
  `api_key` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `api_key`, `created_at`, `updated_at`) VALUES
(1, '1', 'beeeaf626dc5459dbdfbd8b43fc2c3e7', '2022-06-08 12:47:07', '2022-06-23 08:26:37');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `role_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `profile_pic`, `deleted_at`, `role_id`) VALUES
(1, 'Admin', 'admin@panchang.com', '2022-02-19 20:47:31', '$2y$10$hZJ8sT00W0x1XHqWNdjDhOYbC9B9ytievSyvGJ74bOUv8lG37QF3q', NULL, '2020-03-26 20:47:31', '2022-06-08 10:57:14', 1, 'Profile-1654705634.png', NULL, 1),
(4, 'Vishal', 'vishal@panchang.com', '2022-02-19 20:47:31', '$2y$10$fWGRgcVz46..yxFBTWhtpeUWTEFlcLi4xBO4S5y9oH.O3fLe9vUii', NULL, '2020-03-26 20:47:31', '2022-06-08 11:08:13', 1, 'Profile-1654705634.png', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birth`
--
ALTER TABLE `birth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birth_details`
--
ALTER TABLE `birth_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `birth`
--
ALTER TABLE `birth`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `birth_details`
--
ALTER TABLE `birth_details`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
