-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2024 at 06:06 PM
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
-- Database: `token`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deacription` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `name`, `deacription`, `status`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'sdgs', 'sfdhgs', 'active', 1, NULL, '2024-04-29 11:42:13', '2024-04-29 11:42:13'),
(2, '1', NULL, 'active', 1, NULL, '2024-04-30 03:48:10', '2024-04-30 03:48:10'),
(3, '2', NULL, 'active', 1, NULL, '2024-04-30 03:48:14', '2024-04-30 03:48:14'),
(4, '3', NULL, 'active', 1, NULL, '2024-04-30 03:48:18', '2024-04-30 03:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `counter_token_calls`
--

CREATE TABLE `counter_token_calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `counter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `token_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'complete',
  `atend_by` bigint(20) UNSIGNED DEFAULT NULL,
  `call_time` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counter_token_calls`
--

INSERT INTO `counter_token_calls` (`id`, `department_id`, `service_id`, `counter_id`, `name`, `phone`, `token_number`, `status`, `atend_by`, `call_time`, `date`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, NULL, NULL, '4', 'complete', 2, '2024-05-01 12:32:40', '2024-04-30', 2, NULL, '2024-05-01 09:32:40', '2024-05-01 09:32:40'),
(2, 1, 1, 2, NULL, NULL, '1', 'complete', 2, '2024-05-01 12:33:49', '2024-05-01', 2, NULL, '2024-05-01 09:33:49', '2024-05-01 09:33:49'),
(3, 1, 1, 2, NULL, NULL, '2', 'complete', 2, '2024-05-01 14:32:04', '2024-05-01', 2, NULL, '2024-05-01 11:32:04', '2024-05-01 11:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deacription` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `deacription`, `status`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'Dermatology', 'mnbb', 'active', 1, 2, '2024-04-29 11:20:44', '2024-05-01 11:48:03'),
(2, 'sofiul', NULL, 'active', 1, NULL, '2024-04-30 07:44:03', '2024-04-30 07:44:03'),
(3, 'dsghg', NULL, 'active', 1, NULL, '2024-04-30 07:44:07', '2024-04-30 07:44:07'),
(4, 'sfdhgdfh', NULL, 'active', 1, NULL, '2024-04-30 07:44:10', '2024-04-30 07:44:10'),
(5, 'fghfdt', NULL, 'active', 1, NULL, '2024-04-30 07:44:21', '2024-04-30 07:44:21'),
(6, 'tgjrytj', NULL, 'active', 1, NULL, '2024-04-30 07:44:26', '2024-04-30 07:44:26'),
(7, 'rtyjutyjhm', NULL, 'active', 1, NULL, '2024-04-30 07:44:30', '2024-04-30 07:44:30'),
(8, 'fhjhk', NULL, 'active', 1, NULL, '2024-04-30 07:44:35', '2024-04-30 07:44:35'),
(9, 'hgkjhgkj', NULL, 'active', 1, NULL, '2024-04-30 07:44:38', '2024-04-30 07:44:38'),
(10, 'fhgfh', NULL, 'active', 1, NULL, '2024-04-30 07:44:42', '2024-04-30 07:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `displays`
--

CREATE TABLE `displays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deacription` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `displays`
--

INSERT INTO `displays` (`id`, `name`, `deacription`, `status`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 'nbv', NULL, 'active', 1, 1, '2024-04-30 06:01:35', '2024-04-30 06:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `display_services`
--

CREATE TABLE `display_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `display_services`
--

INSERT INTO `display_services` (`id`, `display_id`, `service_id`, `created_at`, `updated_at`) VALUES
(3, 1, 2, '2024-04-30 06:12:42', '2024-04-30 06:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_tokens`
--

CREATE TABLE `doctor_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `counter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `token_number` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `atend_by` bigint(20) UNSIGNED DEFAULT NULL,
  `call_time` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_tokens`
--

INSERT INTO `doctor_tokens` (`id`, `doctor_id`, `department_id`, `service_id`, `counter_id`, `room_id`, `name`, `phone`, `token_number`, `note`, `status`, `atend_by`, `call_time`, `date`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 2, NULL, NULL, NULL, '1', NULL, 'complete', 2, '2024-05-01 12:40:45', '2024-05-01', 1, 2, '2024-05-01 04:45:55', '2024-05-01 09:40:45'),
(2, 2, 1, 1, 2, 1, NULL, NULL, '2', NULL, 'complete', 2, '2024-05-01 14:50:24', '2024-05-01', 1, 2, '2024-05-01 04:46:25', '2024-05-01 11:50:24'),
(3, 2, 1, 1, 2, NULL, NULL, NULL, '3', NULL, 'pending', NULL, NULL, '2024-05-01', 1, NULL, '2024-05-01 04:46:41', '2024-05-01 04:46:41'),
(4, 2, 1, 1, 2, 1, NULL, NULL, '4', NULL, 'complete', 2, '2024-05-01 14:33:21', '2024-05-01', 2, 2, '2024-05-01 11:33:09', '2024-05-01 11:33:21'),
(5, 2, 1, 1, 2, 1, NULL, NULL, '5', NULL, 'complete', 2, '2024-05-01 14:51:54', '2024-05-01', 2, 2, '2024-05-01 11:50:12', '2024-05-01 11:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_token_calls`
--

CREATE TABLE `doctor_token_calls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `token_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'complete',
  `atend_by` bigint(20) UNSIGNED DEFAULT NULL,
  `call_time` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_token_calls`
--

INSERT INTO `doctor_token_calls` (`id`, `doctor_id`, `department_id`, `service_id`, `room_id`, `name`, `phone`, `token_number`, `status`, `atend_by`, `call_time`, `date`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, NULL, NULL, '1', 'complete', 2, '2024-05-01 12:40:45', '2024-05-01', 2, NULL, '2024-05-01 09:40:45', '2024-05-01 09:40:45'),
(2, 2, 1, 1, 1, NULL, NULL, '4', 'complete', 2, '2024-05-01 14:33:21', '2024-05-01', 2, NULL, '2024-05-01 11:33:21', '2024-05-01 11:33:21'),
(3, 2, 1, 1, 1, NULL, NULL, '2', 'complete', 2, '2024-05-01 14:50:24', '2024-05-01', 2, NULL, '2024-05-01 11:50:24', '2024-05-01 11:50:24'),
(4, 2, 1, 1, 1, NULL, NULL, '5', 'complete', 2, '2024-05-01 14:51:54', '2024-05-01', 2, NULL, '2024-05-01 11:51:54', '2024-05-01 11:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT 'MD Sofiul Bashar',
  `title` varchar(255) NOT NULL DEFAULT 'Sofiul Ecommerce',
  `address` text DEFAULT NULL,
  `phone` varchar(255) NOT NULL DEFAULT '36981701',
  `email` varchar(255) NOT NULL DEFAULT 'mdsofiul1997@gmail.com',
  `currency` varchar(255) NOT NULL DEFAULT 'USD',
  `currency_symbol` varchar(255) NOT NULL DEFAULT '$',
  `country` varchar(255) DEFAULT NULL,
  `mane_logo` varchar(255) NOT NULL DEFAULT 'logo.png',
  `fab_logo` varchar(255) NOT NULL DEFAULT 'fab-logo.png',
  `print_logo` varchar(255) DEFAULT NULL,
  `stamp` varchar(255) NOT NULL DEFAULT 'stamp.png',
  `leaveform_print_logo` varchar(255) NOT NULL DEFAULT 'leaveformlogo.png',
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linked_in` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `pinterest` varchar(255) DEFAULT NULL,
  `snapchat` varchar(255) DEFAULT NULL,
  `vk` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `create_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `name`, `title`, `address`, `phone`, `email`, `currency`, `currency_symbol`, `country`, `mane_logo`, `fab_logo`, `print_logo`, `stamp`, `leaveform_print_logo`, `facebook`, `twitter`, `linked_in`, `youtube`, `instagram`, `pinterest`, `snapchat`, `vk`, `website`, `create_by`, `created_at`, `updated_at`) VALUES
(1, 'Liva Dermatology', 'Liva Dermatology', 'address', '36954820', 'admin@medprohis.com', 'BHD', 'BHD', 'Bahrain', 'logo.png', 'fab_logo.png', 'print_logo.png', 'stamp.png', 'leaveformlogo.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'medprohis.com', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '0001_01_01_000001_create_cache_table', 1),
(8, '0001_01_01_000002_create_jobs_table', 1),
(9, '2024_04_29_123120_create_general_settings_table', 1),
(10, '2024_04_29_123622_create_departments_table', 1),
(11, '2024_04_29_143029_create_counters_table', 2),
(21, '2024_04_30_054445_create_services_table', 3),
(22, '2024_04_30_054446_create_service_counters_table', 3),
(27, '2024_04_30_063028_create_displays_table', 4),
(28, '2024_04_30_063114_create_display_services_table', 4),
(30, '2024_04_30_115232_create_tokens_table', 5),
(31, '0001_01_01_000000_create_users_table', 6),
(32, '2024_04_30_190035_create_rooms_table', 6),
(34, '2024_05_01_073252_create_doctor_tokens_table', 7),
(35, '2024_05_01_114809_create_counter_token_calls_table', 8),
(36, '2024_05_01_114949_create_doctor_token_calls_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deacription` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `deacription`, `status`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, '100', NULL, 'active', 1, 2, '2024-04-30 16:09:27', '2024-05-01 11:47:34'),
(2, '110', NULL, 'active', 1, NULL, '2024-04-30 16:09:33', '2024-04-30 16:09:33'),
(3, '111', NULL, 'active', 1, NULL, '2024-05-01 02:50:35', '2024-05-01 02:50:35'),
(4, '112', NULL, 'active', 1, NULL, '2024-05-01 02:50:40', '2024-05-01 02:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deacription` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `department_id`, `name`, `deacription`, `image`, `status`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hydrafacial', NULL, '1714574943.jpg', 'active', 1, 2, '2024-04-30 04:43:12', '2024-05-01 11:49:03'),
(2, 1, 'Laser', NULL, '1714574916.jpg', 'active', 1, 2, '2024-04-30 05:31:50', '2024-05-01 11:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `service_counters`
--

CREATE TABLE `service_counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `counter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_counters`
--

INSERT INTO `service_counters` (`id`, `service_id`, `counter_id`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2024-05-01 11:48:36', '2024-05-01 11:48:36'),
(7, 2, 2, '2024-05-01 11:48:36', '2024-05-01 11:48:36'),
(8, 2, 4, '2024-05-01 11:48:36', '2024-05-01 11:48:36'),
(9, 1, 2, '2024-05-01 11:49:03', '2024-05-01 11:49:03'),
(10, 1, 3, '2024-05-01 11:49:03', '2024-05-01 11:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('zzZW5IiTTBPsPSYMHj7kraxPpBLE6Wzux5SKYD6Q', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibkZVemFDWUJvVEY5aEJEcGhWZDRUS09BV21vZmFUVkFwbkRtUExDeSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXN0ZXIvZGlzcGxheS1zaG93L3Jvb212aWV3LzEiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1714575298);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `counter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `token_number` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `atend_by` bigint(20) UNSIGNED DEFAULT NULL,
  `call_time` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `create_by` bigint(20) UNSIGNED DEFAULT NULL,
  `update_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `department_id`, `service_id`, `counter_id`, `name`, `phone`, `token_number`, `note`, `status`, `atend_by`, `call_time`, `date`, `create_by`, `update_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, NULL, '1', NULL, 'pending', NULL, NULL, '2024-04-30', 1, NULL, '2024-04-30 10:16:32', '2024-04-30 10:16:32'),
(2, 1, 2, NULL, NULL, NULL, '2', NULL, 'pending', NULL, NULL, '2024-04-30', 1, NULL, '2024-04-30 10:16:48', '2024-04-30 10:16:48'),
(3, 1, 1, NULL, NULL, NULL, '3', NULL, 'pending', NULL, NULL, '2024-04-30', 1, NULL, '2024-04-30 10:16:57', '2024-04-30 10:16:57'),
(4, 1, 1, 2, NULL, NULL, '4', NULL, 'complete', 2, '2024-05-01 12:32:40', '2024-04-30', 1, 2, '2024-04-30 10:17:16', '2024-05-01 09:32:40'),
(5, 1, 1, 2, NULL, NULL, '1', NULL, 'complete', 2, '2024-05-01 12:33:49', '2024-05-01', 2, 2, '2024-05-01 09:33:39', '2024-05-01 09:33:49'),
(6, 1, 1, 2, NULL, NULL, '2', NULL, 'complete', 2, '2024-05-01 14:32:04', '2024-05-01', 2, 2, '2024-05-01 09:34:05', '2024-05-01 11:32:04'),
(7, 1, 2, NULL, NULL, NULL, '3', NULL, 'pending', NULL, NULL, '2024-05-01', 2, NULL, '2024-05-01 09:34:08', '2024-05-01 09:34:08'),
(8, 1, 1, NULL, NULL, NULL, '4', NULL, 'pending', NULL, NULL, '2024-05-01', 2, NULL, '2024-05-01 09:34:10', '2024-05-01 09:34:10'),
(9, 1, 1, NULL, NULL, NULL, '5', NULL, 'pending', NULL, NULL, '2024-05-01', 2, NULL, '2024-05-01 11:30:41', '2024-05-01 11:30:41'),
(10, 1, 1, NULL, NULL, NULL, '6', NULL, 'pending', NULL, NULL, '2024-05-01', 2, NULL, '2024-05-01 11:49:23', '2024-05-01 11:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `developer` varchar(255) DEFAULT NULL,
  `doctor` varchar(350) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `counter_id` bigint(20) UNSIGNED DEFAULT NULL,
  `room_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `id_card_number` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isban` enum('active','inactive') NOT NULL DEFAULT 'active',
  `last_seen` datetime DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `stamp` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `employee_id`, `name`, `role_id`, `developer`, `doctor`, `email`, `phone`, `department_id`, `service_id`, `counter_id`, `room_id`, `date_of_birth`, `note`, `gender`, `id_card_number`, `image`, `isban`, `last_seen`, `email_verified_at`, `password`, `signature`, `stamp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '1000', 'Super Admin', NULL, 'yes', NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'profile.jpg', 'active', '2023-11-09 19:04:57', NULL, '$2y$12$NFj73sHjd01hpniUn1HZwe0qy.nGiJfTlPEkGYJm2mO9E8l2zxuJi', NULL, NULL, 'U0W5ChzJ27orPaatxXMNX4tudMMsT3GO3ROUfJ5WB2SSvFfafoGdFTTttGVl', '2023-07-19 19:12:56', '2023-11-09 16:04:57'),
(2, 'sofiul', 'so2405010512', 'Dr. sofiul', NULL, NULL, 'yes', 'mdsofiul1997@gmail.com', 'dhdfhj', 1, 1, 2, 1, '2024-05-01', NULL, 'male', '6547954', '1714574637.jpg', 'active', NULL, NULL, '$2y$12$5tfZon6TLyYEV7k/MkI00uzW3yM0yG07iIYUMSjQWkTZF4C1UcpdS', NULL, NULL, 'IbUNqdpFt2Gzy7lA4p39rxqedztFRFoM6WPh9p3o2URNesdSlw5Wc81ASuO2', '2024-05-01 03:53:43', '2024-05-01 11:45:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `counters_create_by_foreign` (`create_by`),
  ADD KEY `counters_update_by_foreign` (`update_by`);

--
-- Indexes for table `counter_token_calls`
--
ALTER TABLE `counter_token_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_create_by_foreign` (`create_by`),
  ADD KEY `departments_update_by_foreign` (`update_by`);

--
-- Indexes for table `displays`
--
ALTER TABLE `displays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `displays_create_by_foreign` (`create_by`),
  ADD KEY `displays_update_by_foreign` (`update_by`);

--
-- Indexes for table `display_services`
--
ALTER TABLE `display_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_tokens`
--
ALTER TABLE `doctor_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_token_calls`
--
ALTER TABLE `doctor_token_calls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_create_by_foreign` (`create_by`),
  ADD KEY `rooms_update_by_foreign` (`update_by`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_create_by_foreign` (`create_by`),
  ADD KEY `services_update_by_foreign` (`update_by`),
  ADD KEY `services_department_id_foreign` (`department_id`);

--
-- Indexes for table `service_counters`
--
ALTER TABLE `service_counters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_counters_service_id_foreign` (`service_id`),
  ADD KEY `service_counters_counter_id_foreign` (`counter_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_employee_id_unique` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `counter_token_calls`
--
ALTER TABLE `counter_token_calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `displays`
--
ALTER TABLE `displays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `display_services`
--
ALTER TABLE `display_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_tokens`
--
ALTER TABLE `doctor_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_token_calls`
--
ALTER TABLE `doctor_token_calls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_counters`
--
ALTER TABLE `service_counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `counters`
--
ALTER TABLE `counters`
  ADD CONSTRAINT `counters_create_by_foreign` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `counters_update_by_foreign` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_create_by_foreign` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `departments_update_by_foreign` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `displays`
--
ALTER TABLE `displays`
  ADD CONSTRAINT `displays_create_by_foreign` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `displays_update_by_foreign` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_create_by_foreign` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rooms_update_by_foreign` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_create_by_foreign` FOREIGN KEY (`create_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_update_by_foreign` FOREIGN KEY (`update_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_counters`
--
ALTER TABLE `service_counters`
  ADD CONSTRAINT `service_counters_counter_id_foreign` FOREIGN KEY (`counter_id`) REFERENCES `counters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_counters_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
