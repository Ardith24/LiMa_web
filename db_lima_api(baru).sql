-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2019 at 05:34 AM
-- Server version: 10.1.41-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-12+0~20191026.23+debian9~1.gbp940de0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lima_api`
--

-- --------------------------------------------------------

--
-- Table structure for table `kesulitans`
--

CREATE TABLE `kesulitans` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_tingkat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kesulitans`
--

INSERT INTO `kesulitans` (`id`, `nama_tingkat`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'easy', 3, NULL, NULL),
(2, 'medium', 5, NULL, NULL),
(3, 'hard', 8, NULL, NULL),
(4, 'very hard', 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_12_215750_create_sprints_table', 1),
(7, '2019_10_15_065716_create_kontaks_table', 2),
(8, '2019_10_15_090506_create_tasks_table', 3),
(9, '2019_10_19_013824_create_kejars_table', 4),
(10, '2019_10_20_223521_create_sprints_table', 5),
(11, '2019_10_21_001148_create_sprints_table', 6),
(12, '2019_10_22_082727_create_kesulitans_table', 7),
(15, '2019_10_22_083704_create_tasks_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sprints`
--

CREATE TABLE `sprints` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_sprint` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_sprint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sprints`
--

INSERT INTO `sprints` (`id`, `nama_sprint`, `desc_sprint`, `tgl_mulai`, `tgl_selesai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Link n Match', 'KeEnam', '2019-10-26', '2019-10-31', '2019-10-21 15:38:28', '2019-10-25 16:14:51', NULL),
(11, 'TOKOMEDIA', 'nice', '2019-10-25', '2019-10-27', '2019-10-24 02:23:22', '2019-11-20 21:22:08', '2019-11-20 21:22:08'),
(12, 'Jangan Takut Gagal', 'bismillah', '2019-10-26', '2019-10-30', '2019-10-25 00:26:42', '2019-10-25 00:26:42', NULL),
(13, 'Visual Code', 'okelah', '2019-11-09', '2019-11-29', '2019-11-20 09:22:09', '2019-11-20 09:25:59', '2019-11-20 09:25:59'),
(14, 'Visual Studio Code', 'oke bismillah', '2019-11-20', '2019-11-28', '2019-11-20 09:25:54', '2019-11-20 09:25:54', NULL),
(15, 'TOKOMEDIA', 'belum ada', '2019-11-29', '2019-11-30', '2019-11-20 22:04:13', '2019-11-20 22:04:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `sprint_id` int(10) UNSIGNED NOT NULL,
  `nama_task` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kesulitan_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `sprint_id`, `nama_task`, `kesulitan_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 14, 'Okelah', 4, 1, '2019-10-25 00:30:36', '2019-11-20 22:02:00'),
(7, 12, 'I love Indonesia', 3, 0, '2019-10-25 15:52:18', '2019-11-20 21:52:53'),
(9, 1, 'Blablaba', 1, 0, '2019-10-29 00:09:35', '2019-11-20 21:53:14'),
(12, 15, 'ABCDEFGH', 4, 1, '2019-11-21 03:34:02', '2019-11-21 03:35:39'),
(14, 1, 'avdaawudb', 1, 1, '2019-11-21 03:38:06', '2019-11-21 03:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ardith Lutfiawan', 'ardith.lutfiawan@gmail.com', '$2y$10$s752O.d2aXA6ZJuoR7oYyu1PqWH1XTotxEXddz8dd4RNaoIjq4NYK', 'kw4DgL1iLHHiu2Do3ufw7TFqdNJXeoTpLdVzkK6XK9VaCwUGe8u1OCdymPDu', '2019-10-12 16:07:10', '2019-10-12 16:07:10'),
(3, 'Alifia', 'alifia@gmail.com', '$2y$10$FN2VM0yJw5vs/2ytri3gHeH0gfdqVFNrcVApi1Dc6p6Oovjm/sfbe', NULL, '2019-11-21 02:31:39', '2019-11-21 02:31:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kesulitans`
--
ALTER TABLE `kesulitans`
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
-- Indexes for table `sprints`
--
ALTER TABLE `sprints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_kesulitan_id_foreign` (`kesulitan_id`),
  ADD KEY `sprint_id` (`sprint_id`);

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
-- AUTO_INCREMENT for table `kesulitans`
--
ALTER TABLE `kesulitans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sprints`
--
ALTER TABLE `sprints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `sprint_id` FOREIGN KEY (`sprint_id`) REFERENCES `sprints` (`id`),
  ADD CONSTRAINT `tasks_kesulitan_id_foreign` FOREIGN KEY (`kesulitan_id`) REFERENCES `kesulitans` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
