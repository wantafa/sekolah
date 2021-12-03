-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 09, 2021 at 01:28 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rms`
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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_22_143924_create_notes_table', 2),
(5, '2020_10_22_144046_create_subjects_table', 2),
(6, '2020_11_23_124053_add_column_to_users_table', 3),
(7, '2020_11_23_144355_create_post_table', 4),
(8, '2021_05_23_105316_create_perpustakaan_table', 5),
(9, '2021_05_23_105820_create_arsip_table', 5),
(10, '2021_05_23_114513_create_profil_table', 5),
(11, '2021_05_23_114754_create_renstra_table', 5),
(12, '2021_05_23_114854_create_renkerta_table', 5),
(13, '2021_05_23_115031_create_lakip_table', 5),
(14, '2021_05_23_115307_create_pengadaan_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `subject_id`, `title`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'Commodi quis laborio', 'commodi-quis-laborio', 'Veniam per', '2020-10-22 13:49:40', '2020-11-28 11:52:49'),
(2, 0, 'Commodi quis laborio', 'alias-eum-et-consequ', 'Commodi quis laborio', '2020-10-22 13:50:28', '2020-11-25 00:52:51'),
(15, 0, 'Commodi quis laborio', 'Commodi quis laborio', 'Ambar', '2020-11-24 08:50:05', '2021-05-12 05:53:58'),
(18, 0, 'Commodi quis laborio', 'nanda-tyas', 'Commodi quis laborio', '2020-11-24 23:17:14', '2021-04-07 09:20:38'),
(20, 0, 'Commodi quis laborio', 'harum-exercitationem', 'Nanda', '2020-11-25 04:34:07', '2021-04-25 03:42:37'),
(21, 0, 'Commodi quis laborio', 'Commodi quis laborio', 'Beneran', '2021-04-06 01:36:47', '2021-04-25 03:31:07'),
(22, 0, 'Commodi quis laborio', 'velit-anim-esse-est', 'Commodi quis laborio', '2021-04-15 16:30:11', '2021-04-25 03:44:18'),
(23, 0, 'Commodi quis laborio', 'sit-ut-numquam-earu', 'Commodi quis laborio', '2021-04-15 16:30:35', '2021-04-25 03:46:13'),
(24, 0, 'Alias eum et consequ', 'alias-eum-et-consequ', 'Nanda', '2021-04-25 03:31:42', '2021-04-25 03:31:42'),
(25, NULL, 'cerita 1', 'cerita-1', 'tes cerita', '2021-09-08 13:27:30', '2021-09-08 13:27:30');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '/uploads/images/profile/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `image`, `email_verified_at`, `password`, `remember_token`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'Dzakwan', 'dzakwan', 'admin@admin.com', 'admin', '/uploads/images/profile/Dzakwan_1606300468.jpeg', NULL, '$2y$10$8eBuhFN5vlgPdtQl0VL9z.x5ozUT.rqdw0nE8Dw7rduumEb/rk6de', NULL, '2021-09-09 07:34:23', '2020-10-01 21:26:07', '2021-09-09 00:34:23'),
(2, 'Shinta', 'shinta', 'shinta@admin.com', 'admin', '/uploads/images/profile/default.png', NULL, '$2y$10$S8eoSneEkERDCnOlEMl1IeCaZMw3V4HF6W/upRsO8F.mySAoGp/Py', NULL, NULL, '2020-10-04 06:40:03', '2021-09-09 01:23:59'),
(3, 'Riski', 'riski', 'riski@admin.com', 'admin', '/uploads/images/profile/default.png', NULL, '$2y$10$8/yhNvxSAF6PJcxe4R4y3OJw6IFbpFpXtrptO.Sw9yj6lVP/3CUUW', NULL, NULL, '2020-11-24 07:50:11', '2021-09-09 01:24:40');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
