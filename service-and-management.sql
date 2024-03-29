-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2024 at 05:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `service-and-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','superadmin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'ajhar', 'ahjar@superadmin.aamra-solution.com', '12345678', 'superadmin', '2023-10-25 07:11:15', '2023-10-25 07:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `appiontments`
--

CREATE TABLE `appiontments` (
  `id` bigint UNSIGNED NOT NULL,
  `sold_product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `engineer_id` bigint UNSIGNED DEFAULT NULL,
  `reserve` enum('true','false') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blockedEngineerId` int DEFAULT NULL,
  `status` enum('pending','assigned','late','working','complete') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `estimated_time` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appiontment_taken_date` date DEFAULT NULL,
  `appiontment_taken_time` time DEFAULT NULL,
  `inspection_date` date DEFAULT NULL,
  `inspection_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appiontments`
--

INSERT INTO `appiontments` (`id`, `sold_product_id`, `user_id`, `engineer_id`, `reserve`, `blockedEngineerId`, `status`, `estimated_time`, `usertype`, `appiontment_taken_date`, `appiontment_taken_time`, `inspection_date`, `inspection_time`, `created_at`, `updated_at`) VALUES
(135, 22, 7, 3, NULL, NULL, 'complete', NULL, 'solo', '2023-11-30', '12:17:10', '2023-11-30', '13:00:00', '2023-11-30 06:17:10', '2023-11-30 07:02:31'),
(136, 33, 10, 3, NULL, NULL, 'complete', NULL, 'solo', '2023-11-30', '15:06:19', '2023-11-30', '15:00:00', '2023-11-30 09:06:19', '2023-12-10 06:22:43'),
(137, 11, 8, 8, NULL, NULL, 'working', '4', 'group', '2023-11-30', '15:11:45', '2023-11-30', '16:00:00', '2023-11-30 09:11:45', '2023-12-05 09:21:45'),
(138, 19, 7, 4, NULL, NULL, 'complete', NULL, 'solo', '2023-12-04', '09:24:21', '2023-12-05', '11:32:00', '2023-12-04 03:24:21', '2023-12-04 05:48:54'),
(139, 19, 7, 4, NULL, NULL, 'working', '3', 'solo', '2023-12-04', '12:05:02', '2023-12-04', '13:00:00', '2023-12-04 06:05:02', '2023-12-05 07:57:59'),
(140, 19, 7, 4, NULL, NULL, 'working', '2', 'solo', '2023-12-04', '13:34:27', '2023-12-04', '16:34:00', '2023-12-04 07:34:27', '2023-12-05 09:22:05'),
(141, 31, 15, 5, 'false', -1, 'late', NULL, 'solo', '2023-12-04', '14:09:36', '2023-12-07', '19:58:00', '2023-12-04 08:09:36', '2023-12-10 03:56:34'),
(142, 32, 10, 3, NULL, NULL, 'late', NULL, 'solo', '2023-12-06', '10:06:05', '2023-12-06', '11:30:00', '2023-12-06 04:06:05', '2023-12-06 05:30:18'),
(143, 33, 10, 7, NULL, NULL, 'late', NULL, 'solo', '2023-12-06', '10:35:01', '2023-12-07', '01:37:00', '2023-12-06 04:35:01', '2023-12-07 03:26:46'),
(146, 32, 10, 7, 'false', 7, 'late', NULL, 'solo', '2023-12-06', '16:57:43', '2023-12-07', '19:06:00', '2023-12-06 10:57:43', '2023-12-10 03:56:34'),
(147, 33, 10, 3, 'false', 3, 'late', NULL, 'solo', '2023-12-06', '17:07:39', '2023-12-07', '21:08:00', '2023-12-06 11:07:39', '2023-12-10 03:56:34'),
(148, 33, 10, 7, 'false', 7, 'late', NULL, 'solo', '2023-12-06', '17:08:54', '2023-12-07', '21:11:00', '2023-12-06 11:08:54', '2023-12-10 03:56:34'),
(149, 30, 15, 3, 'false', -1, 'working', NULL, 'solo', '2023-12-06', '17:13:24', '2023-12-07', '20:21:00', '2023-12-06 11:13:24', '2023-12-17 05:08:30'),
(150, 30, 15, 3, 'false', -1, 'working', '2', 'solo', '2023-12-07', '09:43:55', '2023-12-08', '13:00:00', '2023-12-07 03:43:55', '2023-12-10 05:11:29'),
(151, 33, 10, 7, 'false', -1, 'late', NULL, 'solo', '2023-12-07', '09:47:27', '2023-12-08', '01:04:00', '2023-12-07 03:47:27', '2023-12-10 03:56:34'),
(152, 30, 15, 3, 'false', -1, 'working', NULL, 'solo', '2023-12-10', '11:30:33', '2023-12-10', '12:30:00', '2023-12-10 05:30:33', '2023-12-10 05:33:20'),
(153, 23, 9, 10, 'false', -1, 'working', NULL, 'group', '2023-12-10', '11:37:13', '2023-12-10', '13:00:00', '2023-12-10 05:37:13', '2023-12-10 06:42:21'),
(154, 20, 10, 9, 'false', -1, 'late', NULL, 'solo', '2023-12-10', '12:17:57', '2023-12-10', '12:19:00', '2023-12-10 06:17:57', '2023-12-10 06:19:07'),
(155, 31, 15, 5, 'false', -1, 'late', NULL, 'solo', '2023-12-17', '10:39:46', '2023-12-17', '10:00:00', '2023-12-17 04:39:46', '2023-12-17 05:06:10'),
(156, 33, 10, 3, 'false', -1, 'late', NULL, 'solo', '2023-12-17', '11:10:42', '2023-12-17', '17:00:00', '2023-12-17 05:10:42', '2023-12-17 11:00:14'),
(157, 32, 10, 3, 'false', -1, 'late', NULL, 'solo', '2023-12-17', '11:15:26', '2023-12-19', '12:30:00', '2023-12-17 05:15:26', '2023-12-19 06:30:04'),
(158, 21, 8, 3, 'false', -1, 'late', NULL, 'group', '2023-12-17', '11:32:25', '2023-12-17', '12:00:00', '2023-12-17 05:32:25', '2023-12-17 06:00:56'),
(159, 26, 7, 3, 'false', -1, 'late', NULL, 'solo', '2023-12-19', '14:47:42', '2023-12-19', '16:00:00', '2023-12-19 08:47:42', '2023-12-19 10:00:07'),
(160, 22, 7, 3, 'false', -1, 'complete', NULL, 'solo', '2023-12-19', '15:46:30', '2023-12-19', '19:00:00', '2023-12-19 09:46:30', '2023-12-19 10:00:11'),
(161, 25, 9, 3, 'false', -1, 'late', NULL, 'group', '2023-12-19', '16:09:00', '2023-12-19', '16:11:00', '2023-12-19 10:09:00', '2023-12-19 10:11:29'),
(162, 26, 7, 3, 'false', -1, 'late', NULL, 'solo', '2023-12-19', '16:10:25', '2023-12-19', '16:12:00', '2023-12-19 10:10:25', '2023-12-19 10:12:35'),
(163, 30, 15, 3, 'false', -1, 'late', NULL, 'solo', '2023-12-20', '10:02:49', '2023-12-20', '13:00:00', '2023-12-20 04:02:49', '2023-12-20 07:00:10'),
(164, 26, 7, 10, 'false', -1, 'assigned', NULL, 'solo', '2023-12-20', '10:03:41', '2023-12-21', '14:00:00', '2023-12-20 04:03:41', '2023-12-20 04:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `appliances`
--

CREATE TABLE `appliances` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` int DEFAULT NULL,
  `market_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliances`
--

INSERT INTO `appliances` (`id`, `category_id`, `subcategory_id`, `product_id`, `name`, `purchase_price`, `market_price`, `created_at`, `updated_at`) VALUES
(9, 34, 6, 9, 'Camera', 2000, 2300, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `branch_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `user_id`, `branch_name`, `branch_address`, `admin_name`, `admin_email`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 8, 'Motijheel Branch', 'Shadinota Bhaban, 88 Motijheel C/A, Dhaka', 'habibullah', 'habibullah@gmail.com', '095274241', NULL, NULL),
(2, 8, 'Dhanmondi Branch', 'House-21, Road-08, Dhanmondi R/A, Dhaka-1205', 'kamal', 'kamal@gmail.com', '095261188', NULL, NULL),
(3, 8, 'Moghbazar Branch', 'Shafi Complex, Holding No-1/A, West Moghbazar, New Circular Road, Ramna, Dhaka', 'iqbal hossain', 'iqbal@ebl.com', '095274188', NULL, NULL),
(4, 8, 'Shantinagar Branch', 'Iris Noorjehan (1st Floor), Plot no. 104, Kakrail Road, Ramna, Dhaka', 'ali', 'ali@shantinagar.ebl.com', '02-8300218', NULL, NULL),
(6, 10, 'Motijheel Branch', 'sector 6, uttara, Dhaka', 'habibullah', 'habibullah@gmail.com.bd', '0199039093', NULL, NULL),
(7, 9, 'Gazipur Branch', 'Chowrasta, Gazipur', 'shirajul', 'shirajul@brac.com', '01234567895', NULL, NULL),
(8, 8, 'Gazipur Branch', 'Chowrasta, Gazipur', 'shirajul', 'shirajul@brac.com', '01234567895', NULL, NULL),
(9, 9, 'Motijil Branch', 'Motijil', 'Saif', 'saif@mitijil.bracbank.com', '0232320323', NULL, NULL),
(10, 10, 'Gazipur Branch', 'Chowrasta, Gazipur', 'shirajul', 'shirajul@wasternbank.com', '012345632323', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(34, 'hardware', '2023-09-28 10:54:10', '2023-09-30 12:53:21'),
(35, 'software', '2023-09-28 10:54:17', '2023-09-28 10:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `category_subcategory`
--

CREATE TABLE `category_subcategory` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checklists`
--

CREATE TABLE `checklists` (
  `id` bigint UNSIGNED NOT NULL,
  `appiontment_id` bigint UNSIGNED NOT NULL,
  `appliance_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `appliance_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE `engineers` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`id`, `category_id`, `subcategory_id`, `name`, `email`, `password`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(3, 34, 6, 'saber', 'saber@engineer.aamra.com', '123', 'kakoli, bonani', '+1 (842) 401-392112', '2023-10-18 08:41:03', '2023-10-18 08:41:03'),
(4, 34, 5, 'pavel', 'pavel@engineer.aamra.com', '12345678', 'Rabbi towar, Board Bazar, Gazipur', '09666-772323', '2023-10-22 10:16:36', '2023-10-22 10:16:36'),
(5, 34, 9, 'ajay', 'ajay@engineer.aamra.com', '12345678', 'Rabbi towar, Board Bazar, Gazipur', '+1 (306) 272-9325', '2023-10-22 10:28:01', '2023-10-22 10:28:01'),
(6, 34, 8, 'Kameko Butler', 'Kameko@engineer.aamra.com', '123', 'Velit velit itaque', '+1 (325) 587-9579', '2023-10-23 04:51:14', '2023-10-23 04:51:14'),
(7, 34, 6, 'emon', 'emon@engineer.aamara.com', '12345678', 'air port, dhaka', '0198765435', '2023-11-15 06:17:18', '2023-11-15 06:17:18'),
(8, 34, 8, 'tajimul', 'tajimul@engineer.com', '12345678', 'uttara, Dhaka', '01987987973', '2023-11-15 06:20:22', '2023-11-15 06:20:22'),
(9, 34, 5, 'Forhad', 'forhad@engineer.aamra.com', '12345678', 'uttara, Dhaka', '014563434343', '2023-11-26 10:55:55', '2023-11-26 10:55:55'),
(10, 34, 6, 'mustafiz', 'mustafiz@engineer.aamra.com', '12345678', 'uttara, Dhaka', '01987983223', '2023-12-06 09:38:30', '2023-12-06 09:38:30'),
(11, 34, 6, 'bappy', 'bappy@engineer.aamra.com', '12345678', 'Gulshan', '01522323323232', '2023-12-06 09:39:35', '2023-12-06 09:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `expertises`
--

CREATE TABLE `expertises` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inspections`
--

CREATE TABLE `inspections` (
  `id` bigint UNSIGNED NOT NULL,
  `appiontment_id` bigint UNSIGNED NOT NULL,
  `engineer_id` bigint UNSIGNED DEFAULT NULL,
  `inspection` enum('start','stop') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `longitude` double(10,6) DEFAULT NULL,
  `latitude` double(10,6) DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inspections`
--

INSERT INTO `inspections` (`id`, `appiontment_id`, `engineer_id`, `inspection`, `start_date`, `start_time`, `end_time`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(70, 135, 3, NULL, '2023-11-30', '12:18:35', '12:27:41', 90.403983, 23.794008, 'complete', NULL, '2023-11-30 07:02:31'),
(71, 135, 3, NULL, '2023-11-30', '12:27:38', '12:27:41', 90.403966, 23.794012, 'complete', NULL, '2023-11-30 07:02:31'),
(72, 136, 3, NULL, '2023-11-30', '15:08:13', '15:08:20', 90.403961, 23.794015, 'complete', NULL, '2023-12-10 06:22:43'),
(73, 137, 8, 'stop', '2023-11-30', '15:13:57', '13:55:26', 90.423987, 23.795030, 'working', NULL, '2023-12-04 07:55:26'),
(74, 138, 4, NULL, '2023-12-04', '09:27:29', '11:47:04', 90.403977, 23.793998, 'complete', NULL, '2023-12-04 05:48:54'),
(75, 138, 4, NULL, '2023-12-04', '09:31:08', '11:47:04', 90.403977, 23.793970, 'complete', NULL, '2023-12-04 05:48:54'),
(76, 138, 4, NULL, '2023-12-04', '09:39:21', '11:47:04', 90.403982, 23.794002, 'complete', NULL, '2023-12-04 05:48:54'),
(77, 138, 4, NULL, '2023-12-04', '09:40:45', '11:47:04', 90.403983, 23.794005, 'complete', NULL, '2023-12-04 05:48:54'),
(78, 138, 4, NULL, '2023-12-04', '09:46:41', '11:47:04', 90.403985, 23.793970, 'complete', NULL, '2023-12-04 05:48:54'),
(79, 138, 4, NULL, '2023-12-04', '09:56:58', '11:47:04', 90.403991, 23.793946, 'complete', NULL, '2023-12-04 05:48:54'),
(80, 138, 4, NULL, '2023-12-04', '10:00:39', '11:47:04', 90.403984, 23.794003, 'complete', NULL, '2023-12-04 05:48:54'),
(81, 138, 4, NULL, '2023-12-04', '10:24:18', '11:47:04', 90.403977, 23.794006, 'complete', NULL, '2023-12-04 05:48:54'),
(82, 138, 4, NULL, '2023-12-04', '11:46:25', '11:47:04', 90.403974, 23.794007, 'complete', NULL, '2023-12-04 05:48:54'),
(83, 139, 4, 'stop', '2023-12-04', '12:21:12', '12:35:30', 90.403976, 23.794005, 'working', NULL, '2023-12-04 06:35:30'),
(84, 139, 4, 'stop', '2023-12-04', '12:27:38', '12:35:30', 90.403982, 23.794004, 'working', NULL, '2023-12-04 06:35:30'),
(85, 139, 4, 'stop', '2023-12-04', '12:27:59', '12:35:30', 90.403982, 23.794004, 'working', NULL, '2023-12-04 06:35:30'),
(86, 139, 4, 'stop', '2023-12-04', '12:35:18', '12:35:30', 90.403982, 23.793990, 'working', NULL, '2023-12-04 06:35:30'),
(87, 140, 4, 'stop', '2023-12-04', '13:35:13', '13:35:43', 90.403962, 23.794010, 'working', NULL, '2023-12-04 07:35:43'),
(88, 137, 8, 'stop', '2023-12-04', '13:52:56', '13:55:26', 90.403979, 23.794006, 'working', NULL, '2023-12-04 07:55:26'),
(89, 150, 3, 'stop', '2023-12-10', '10:39:11', '10:40:12', 90.374200, 23.701800, 'working', NULL, '2023-12-10 04:40:12'),
(90, 150, 3, 'stop', '2023-12-10', '10:39:46', '10:40:12', 90.374200, 23.701800, 'working', NULL, '2023-12-10 04:40:12'),
(91, 152, 3, 'stop', '2023-12-10', '11:33:20', '12:19:18', 90.374200, 23.701800, 'working', NULL, '2023-12-10 06:19:18'),
(92, 153, 10, 'stop', '2023-12-10', '12:37:24', '12:44:21', 90.374200, 23.701800, 'working', NULL, '2023-12-10 06:44:21'),
(93, 153, 10, 'stop', '2023-12-10', '12:42:21', '12:44:21', 90.374200, 23.701800, 'working', NULL, '2023-12-10 06:44:21'),
(95, 149, 3, 'stop', '2023-12-17', '11:08:30', '11:09:44', 90.374200, 23.701800, 'working', NULL, '2023-12-17 05:09:44'),
(96, 160, 3, 'stop', '2023-12-19', '15:58:30', '15:59:45', 90.374200, 23.701800, 'complete', NULL, '2023-12-19 10:00:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_09_26_174533_create_expertises_table', 5),
(9, '2023_09_26_175124_create_customers_table', 6),
(17, '2023_09_26_174216_create_categories_table', 13),
(22, '2023_09_28_171645_create_subcategories_table', 15),
(28, '2023_10_02_112950_add_columns_to_appiontments_table', 20),
(31, '2023_10_11_151910_create_category_subcategory_table', 22),
(32, '2023_10_11_162819_create_appliances_table', 22),
(33, '2023_10_12_100628_create_servicing_orders_table', 22),
(35, '2023_09_26_174336_create_engineers_table', 24),
(36, '2023_09_26_204315_create_checklists_table', 25),
(37, '2023_09_26_173820_create_products_table', 26),
(38, '2014_10_12_000000_create_users_table', 27),
(46, '2023_10_19_155805_create_sold_products_table', 29),
(48, '2023_10_19_155619_create_branches_table', 30),
(54, '2023_10_25_130656_create_admins_table', 34),
(64, '2023_10_01_150345_create_appiontments_table', 35),
(65, '2023_11_05_113128_create_recruiting_engineers_table', 36),
(71, '2023_11_05_103610_create_inspections_table', 37);

-- --------------------------------------------------------

--
-- Table structure for table `parts_for_product`
--

CREATE TABLE `parts_for_product` (
  `id` bigint UNSIGNED NOT NULL,
  `appiontment_id` bigint UNSIGNED NOT NULL,
  `appliance_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parts_for_product`
--

INSERT INTO `parts_for_product` (`id`, `appiontment_id`, `appliance_name`, `updated_at`, `created_at`) VALUES
(31, 95, 'ic', '2023-11-20 11:16:22', '2023-11-20 11:16:22'),
(32, 95, 'power buton', '2023-11-20 11:16:22', '2023-11-20 11:16:22'),
(33, 95, ' camera', '2023-11-20 11:16:22', '2023-11-20 11:16:22'),
(34, 101, 'ic', '2023-11-21 11:59:19', '2023-11-21 11:59:19'),
(35, 101, 'power button', '2023-11-21 11:59:19', '2023-11-21 11:59:19'),
(36, 127, 'wheel', '2023-11-28 05:46:05', '2023-11-28 05:46:05'),
(37, 127, 'ic', '2023-11-28 05:46:05', '2023-11-28 05:46:05'),
(38, 128, 'ic', '2023-11-29 03:22:33', '2023-11-29 03:22:33'),
(39, 128, 'power', '2023-11-29 03:22:33', '2023-11-29 03:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 8, 'register_emon123@gmail.com', 'fd59c35892d565bda5113426361b400e334cb508a9b48df305f6e4028221b00b', '[\"*\"]', NULL, NULL, '2023-10-16 11:25:28', '2023-10-16 11:25:28'),
(2, 'App\\Models\\User', 8, 'login_emon123@gmail.com', 'f2389ae84a2ff97ca25f6968ecdddc3f90fcf3acd586b55210e97ea806e273c2', '[\"*\"]', '2023-10-25 04:06:57', NULL, '2023-10-16 11:25:44', '2023-10-25 04:06:57'),
(13, 'App\\Models\\User', 11, 'login_sheba@gmail.com', 'bc534bff77e53662d4ad0471da0a68ecf87185f151d47b6dcb50c8fbb4857522', '[\"*\"]', '2023-11-13 11:00:39', NULL, '2023-11-13 07:17:55', '2023-11-13 11:00:39'),
(14, 'App\\Models\\User', 11, 'login_sheba@gmail.com', '10d9f5abea501e8c0496b475b529c19a6ba7a3857ef7e170178307e5cf8cb047', '[\"*\"]', NULL, NULL, '2023-11-14 09:33:13', '2023-11-14 09:33:13'),
(15, 'App\\Models\\User', 11, 'login_sheba@gmail.com', '8d220a5d3cca8a241831d1c41df8e58e17c3c54d591ab23a483d221ef024c5f5', '[\"*\"]', NULL, NULL, '2023-11-14 09:33:31', '2023-11-14 09:33:31'),
(16, 'App\\Models\\User', 11, 'login_sheba@gmail.com', '576ce4c3750117f6ac3c972b6e51e78894d2bc2b6443716bb1f247310ff68499', '[\"*\"]', NULL, NULL, '2023-11-19 11:04:02', '2023-11-19 11:04:02'),
(17, 'App\\Models\\User', 11, 'login_sheba@gmail.com', 'c3cf68f9ae033a2483c5971ec666053a80f45c8f61cecd2ced1fd9fa58796cae', '[\"*\"]', NULL, NULL, '2023-11-20 03:43:46', '2023-11-20 03:43:46'),
(18, 'App\\Models\\User', 11, 'login_sheba@gmail.com', '199f388d152df6e20fed62629833a20e42e316f5f454f188a53b0adab36414ca', '[\"*\"]', NULL, NULL, '2023-11-20 03:44:05', '2023-11-20 03:44:05'),
(19, 'App\\Models\\User', 11, 'login_sheba@gmail.com', '69c03d581262a7dc5dbe8248613546f970ab326459e895361e331bf73a17e32e', '[\"*\"]', '2023-11-21 03:48:33', NULL, '2023-11-20 03:44:24', '2023-11-21 03:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `model`, `price`, `created_at`, `updated_at`) VALUES
(2, 34, 5, 'HP DeskJet 2320 All-in-One Printer', 'hp-d-230', 12000, '2023-10-18 07:01:46', '2023-10-18 09:03:36'),
(4, 34, 5, 'Epson EcoTank L1250 A4 Wi-Fi Ink Tank Printer', 'epsonl1250', 18500, '2023-10-18 15:58:40', '2023-10-18 15:58:40'),
(5, 34, 5, 'Brother DCP-T520W Multifunction Color Inktank Printer with Wireless and Mobile Printing', 'brothert520', 24900, '2023-10-18 15:59:29', '2023-10-18 15:59:29'),
(6, 34, 9, 'SPRT SP-POS890W Thermal POS Printer', 'sprtpos890', 10500, '2023-10-18 16:00:53', '2023-10-18 16:00:53'),
(7, 34, 9, 'Epson TM-T81III POS Printer with Ethernet Port', 'epsont81', 14000, '2023-10-18 16:01:34', '2023-10-18 16:01:34'),
(8, 34, 6, 'OPPO A17k Smartphone (3/64GB)', 'oppoa17', 13990, '2023-10-18 16:02:55', '2023-10-18 16:02:55'),
(9, 34, 6, 'Samsung Galaxy A13 Smartphone (6/128GB)', 'samsung_g_a13', 22999, '2023-10-18 16:03:51', '2023-10-18 16:03:51'),
(10, 34, 8, 'DOEL Freedom A9 AMD A9-9425 14.1\" HD Laptop', 'doel_freedom_a9', 26700, '2023-10-18 16:04:57', '2023-10-18 16:04:57'),
(11, 34, 8, 'Lenovo IdeaPad Slim 3i Intel Celeron N4020 256GB SSD 15.6\" HD Laptop', 'lenovo3i', 35500, '2023-10-18 16:06:07', '2023-10-18 16:06:07'),
(12, 35, 10, 'erp management system', 'erp_m_s', 12000, '2023-10-18 16:09:12', '2023-10-18 16:09:12'),
(13, 35, 7, 'inventory management system', 'inv_ms', 34000, '2023-10-18 16:09:46', '2023-10-18 16:09:46'),
(14, 35, 11, 'service management system', 'ser_ms', 45000, '2023-10-18 16:10:37', '2023-10-18 16:10:37'),
(15, 35, 7, 'school management system', 'schoool_ms', 34000, '2023-10-18 16:11:07', '2023-10-18 16:11:07'),
(16, 35, 11, 'hospital management system', 'hospital_ms', 54000, '2023-10-18 16:11:42', '2023-10-18 16:11:42'),
(17, 35, 11, 'shop management system', 'shop_ms', 52900, '2023-10-18 16:12:14', '2023-10-18 16:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `recruiting_engineers`
--

CREATE TABLE `recruiting_engineers` (
  `id` bigint UNSIGNED NOT NULL,
  `appiontment_id` bigint UNSIGNED NOT NULL,
  `engineer_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recruiting_engineers`
--

INSERT INTO `recruiting_engineers` (`id`, `appiontment_id`, `engineer_id`, `created_at`, `updated_at`) VALUES
(106, 135, 3, '2023-11-30 06:17:34', '2023-11-30 06:17:34'),
(107, 136, 3, '2023-11-30 09:07:11', '2023-11-30 09:07:11'),
(108, 137, 8, '2023-11-30 09:13:34', '2023-11-30 09:13:34'),
(109, 138, 4, '2023-12-04 03:25:44', '2023-12-04 03:25:44'),
(110, 139, 4, '2023-12-04 06:05:24', '2023-12-04 06:05:24'),
(111, 140, 4, '2023-12-04 07:34:45', '2023-12-04 07:34:45'),
(112, 142, 3, '2023-12-06 04:29:14', '2023-12-06 04:29:14'),
(113, 143, 7, '2023-12-06 04:39:53', '2023-12-06 04:39:53'),
(122, 146, 3, '2023-12-06 10:59:54', '2023-12-06 10:59:54'),
(123, 146, 7, '2023-12-06 11:06:08', '2023-12-06 11:06:08'),
(124, 147, 3, '2023-12-06 11:08:20', '2023-12-06 11:08:20'),
(125, 148, 7, '2023-12-06 11:11:53', '2023-12-06 11:11:53'),
(126, 149, 10, '2023-12-06 11:19:25', '2023-12-06 11:19:25'),
(127, 149, 7, '2023-12-06 11:20:18', '2023-12-06 11:20:18'),
(128, 149, 3, '2023-12-06 11:21:29', '2023-12-06 11:21:29'),
(129, 141, 5, '2023-12-06 11:58:06', '2023-12-06 11:58:06'),
(130, 150, 3, '2023-12-07 03:46:24', '2023-12-07 03:46:24'),
(131, 151, 7, '2023-12-07 04:04:03', '2023-12-07 04:04:03'),
(132, 152, 3, '2023-12-10 05:31:33', '2023-12-10 05:31:33'),
(133, 153, 10, '2023-12-10 05:37:35', '2023-12-10 05:37:35'),
(134, 154, 9, '2023-12-10 06:18:16', '2023-12-10 06:18:16'),
(135, 155, 5, '2023-12-17 05:05:36', '2023-12-17 05:05:36'),
(136, 156, 3, '2023-12-17 05:15:14', '2023-12-17 05:15:14'),
(137, 158, 3, '2023-12-17 05:34:10', '2023-12-17 05:34:10'),
(138, 157, 3, '2023-12-17 05:35:04', '2023-12-17 05:35:04'),
(139, 159, 3, '2023-12-19 08:59:26', '2023-12-19 08:59:26'),
(140, 160, 3, '2023-12-19 09:56:47', '2023-12-19 09:56:47'),
(141, 161, 3, '2023-12-19 10:09:21', '2023-12-19 10:09:21'),
(142, 162, 3, '2023-12-19 10:10:39', '2023-12-19 10:10:39'),
(143, 163, 3, '2023-12-20 04:03:31', '2023-12-20 04:03:31'),
(144, 164, 10, '2023-12-20 04:25:35', '2023-12-20 04:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `usertype` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sold_product_id` bigint UNSIGNED NOT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `user_id`, `usertype`, `sold_product_id`, `status`, `created_at`, `updated_at`) VALUES
(22, 7, 'solo', 22, 'taken', '2023-11-30 06:16:45', '2023-11-30 06:17:10'),
(23, 7, 'solo', 19, 'taken', '2023-12-04 03:23:50', '2023-12-04 03:24:21'),
(24, 7, 'solo', 26, 'taken', '2023-12-19 08:46:44', '2023-12-19 08:47:42'),
(25, 7, 'solo', 22, 'taken', '2023-12-19 09:46:04', '2023-12-19 09:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `servicing_orders`
--

CREATE TABLE `servicing_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `appiontment_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','working','done') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sold_products`
--

CREATE TABLE `sold_products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `branch_id` bigint UNSIGNED DEFAULT NULL,
  `quantity` int NOT NULL,
  `selling_date` date NOT NULL,
  `time_of_warranty` int NOT NULL,
  `sam` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sold_products`
--

INSERT INTO `sold_products` (`id`, `user_id`, `product_id`, `branch_id`, `quantity`, `selling_date`, `time_of_warranty`, `sam`, `created_at`, `updated_at`) VALUES
(8, 7, 4, NULL, 2, '2023-10-02', 6, 1, '2023-10-19 15:28:58', '2023-10-19 15:28:58'),
(9, 7, 11, NULL, 1, '2023-10-18', 12, 0, '2023-10-19 15:30:11', '2023-10-19 15:30:11'),
(10, 8, 6, 1, 20, '2023-10-10', 18, 1, '2023-10-19 15:40:25', '2023-10-19 15:40:25'),
(11, 8, 10, 2, 4, '2023-10-10', 12, 1, '2023-10-19 16:22:29', '2023-10-19 16:22:29'),
(12, 8, 7, 3, 35, '2023-10-10', 3, 0, '2023-10-19 16:23:49', '2023-10-19 16:23:49'),
(13, 8, 2, 1, 2, '2023-10-09', 3, 0, '2023-10-19 15:40:25', '2023-10-19 15:40:25'),
(14, 8, 7, 4, 10, '2023-10-02', 3, 0, '2023-10-21 07:19:37', '2023-10-21 07:19:37'),
(17, 8, 2, 3, 4, '2023-10-11', 6, 0, '2023-10-21 10:27:58', '2023-10-21 10:27:58'),
(18, 8, 2, 1, 12, '2023-10-23', 3, 1, '2023-10-23 03:32:42', '2023-10-23 03:32:42'),
(19, 7, 4, NULL, 10, '2023-10-09', 12, 1, '2023-10-23 11:33:32', '2023-10-23 11:33:32'),
(20, 10, 4, 6, 4, '2023-10-18', 13, 0, '2023-10-23 11:39:44', '2023-10-23 11:39:44'),
(21, 8, 8, 1, 1, '2023-10-18', 1, 0, '2023-10-23 11:41:56', '2023-10-23 11:41:56'),
(22, 7, 9, NULL, 4, '2023-10-27', 12, 1, '2023-10-26 07:04:48', '2023-10-26 07:04:48'),
(23, 9, 8, 7, 2, '2023-11-03', 14, 0, '2023-10-26 07:12:08', '2023-10-26 07:12:08'),
(24, 8, 8, 8, 3, '2023-10-01', 12, 0, '2023-10-30 04:37:35', '2023-10-30 04:37:35'),
(25, 9, 8, 9, 12, '2023-10-29', 12, 0, '2023-11-05 07:16:48', '2023-11-05 07:16:48'),
(26, 7, 8, NULL, 7, '2023-10-29', 21, 0, '2023-11-05 08:07:23', '2023-11-05 08:07:23'),
(27, 10, 8, NULL, 2, '2023-10-03', 23, 1, '2023-11-05 08:30:48', '2023-11-05 08:30:48'),
(28, 8, 8, 8, 4, '2023-10-29', 12, 1, '2023-11-05 08:38:10', '2023-11-05 08:38:10'),
(29, 7, 4, NULL, 3, '2023-10-29', 12, 1, '2023-11-15 06:10:13', '2023-11-15 06:10:13'),
(30, 15, 8, NULL, 3, '2023-10-30', 12, 0, '2023-11-20 06:23:30', '2023-11-20 06:23:30'),
(31, 15, 7, NULL, 5, '2023-11-22', 10, 1, '2023-11-20 06:59:44', '2023-11-20 06:59:44'),
(32, 10, 8, NULL, 2, '2023-10-29', 12, 1, '2023-11-21 05:36:48', '2023-11-21 05:36:48'),
(33, 10, 8, NULL, 1, '2023-08-16', 12, 1, '2023-11-26 05:11:35', '2023-11-26 05:11:35');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(5, 34, 'printer', '2023-10-01 06:32:51', '2023-10-01 06:32:51'),
(6, 34, 'mobile', '2023-10-01 08:48:16', '2023-10-01 08:48:16'),
(7, 35, 'flatter, java, python', '2023-10-01 08:49:23', '2023-10-01 08:49:23'),
(8, 34, 'laptop', '2023-10-16 06:37:36', '2023-10-16 06:37:36'),
(9, 34, 'pos machine', '2023-10-16 09:37:31', '2023-10-16 09:37:31'),
(10, 35, 'laravel, react, bootstrap, api', '2023-10-18 16:07:09', '2023-10-18 16:07:09'),
(11, 35, 'express js, mongodb, angular, nood js', '2023-10-18 16:08:14', '2023-10-18 16:08:14');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `first_name`, `created_at`, `updated_at`) VALUES
(2, 'U2FsdGVkX19Jq8Vdd3fjPHqSWbvUbAgH0NcnCXpbSJo=', '2023-11-22 05:20:48', '2023-11-22 05:20:48'),
(3, 'U2FsdGVkX181P32mlP5aPPGg+B1OAfLaQFe+H79hrFo=', '2023-11-22 05:41:51', '2023-11-22 05:41:51'),
(6, 'U2FsdGVkX194qLSSZG4dl8tSIUsJCqBz8xUc/apdeH4=', '2023-11-22 05:46:19', '2023-11-22 05:46:19'),
(7, 'U2FsdGVkX18Pg+cGKQdJQ1nAQQqMut1aRBFjfQI/kAU=', '2023-11-22 07:34:17', '2023-11-22 07:34:17'),
(8, '0', '2023-11-22 09:32:51', '2023-11-22 09:32:51'),
(9, 'abc', '2023-11-22 09:50:18', '2023-11-22 09:50:18'),
(10, 'xyz', '2023-11-22 09:57:03', '2023-11-22 09:57:03'),
(11, 'junaid', '2023-11-22 10:04:24', '2023-11-22 10:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `address`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'solo', 'Abc company', 'abc@gmail.com', 'Sapla meniton, Gazipur chowrasta, Gazipur', '0120998923', NULL, '$2y$10$VaHsab6XFxoCgFYclkBo2uvE/FHjNAIKtjDO9lcWmPhyFq46YIYcW', NULL, '2023-10-19 15:28:19', '2023-11-21 05:41:10'),
(8, 'group', 'EBL bank', 'saddam@headoffice.admin.ebl.com', '100 Gulshan Ave, Dhaka 1212', '09666-777325', NULL, '$2y$10$p1cVckJtklYSD6IZ1luunu/B0vrhW3DBKgJcGpVXkLZHQn09wVYki', NULL, '2023-10-19 15:35:28', '2023-10-19 15:35:28'),
(9, 'group', 'brac bank', 'enquiry@bracbank.com', 'Anik Tower, 220/B Bir Uttam Mir Shawkat Sarak, Dhaka 1208', '02-55668056', NULL, '$2y$10$seAt9QXQha0OddqaaKWec.6ak9mrAxcTzJfOhNRau9XNNSLQANQTm', NULL, '2023-10-19 16:26:17', '2023-10-19 16:26:17'),
(10, 'solo', 'wastern bank', 'wa@gmail.com', 'kakoli, bonani', '0120998923434', NULL, '$2y$10$BvSIHqRoPtzfltgIt0SYQeMM41rh1Zbn5ueHThMz1vVDeeNzA60U.', NULL, '2023-10-23 11:38:24', '2023-11-26 05:09:09'),
(11, 'solo', 'sheba', 'sheba@gmail.com', 'Gulshan', '01456789434', NULL, '12345678', NULL, '2023-11-07 10:45:21', '2023-11-07 10:45:21'),
(12, 'solo', 'idlc', 'idlc@gmail.com', 'Gulshan, dhaka', '014567433232', NULL, '$2y$10$YdikvuWBYN13mPAwfBAoMuHLZnVay/ZkC8Mueyss7gBjW2sG3kLsq', NULL, '2023-11-13 06:16:55', '2023-11-13 06:16:55'),
(13, 'solo', 'sopno', 'sopno@gmail.com', 'Gulshan', '0152232322', NULL, '$2y$10$mWT2jBxgYMgplFn.B70GB.vXCrV/VpbSXnxrSYkBueHKzy0EEF8W2', NULL, '2023-11-15 06:13:09', '2023-11-15 06:13:09'),
(14, 'solo', 'xyz', 'xyz@gmail.com', 'uttara, Dhaka', '1234567890', NULL, '11223344', NULL, '2023-11-20 05:18:10', '2023-11-20 05:20:41'),
(15, 'solo', 'one bank', 'onebank@gmail.com', 'Anik Tower, 220/B Bir Uttam Mir Shawkat Sarak, Dhaka 1208', '0198765435433', NULL, '$2y$10$GWoPZwjMLmEr6vqscCwtH.Z3Nb2VVwiAKcN2uo2Y3wJrHmx1F8Gje', NULL, '2023-11-20 05:44:15', '2023-11-20 06:20:02'),
(16, 'group', 'Test Limited', 'testltd@gmail.com', 'Kuril', '01743217111', NULL, '$2y$10$KcN5aevfDg8C.1dhehOrauOLYwtck33j5MAB4hFqGIeeEgSeIyU/2', NULL, '2023-12-16 19:18:00', '2023-12-16 19:18:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appiontments`
--
ALTER TABLE `appiontments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appiontments_sold_product_id_foreign` (`sold_product_id`),
  ADD KEY `engineer_id` (`engineer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `appliances`
--
ALTER TABLE `appliances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `branches_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_subcategory`
--
ALTER TABLE `category_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_subcategory_category_id_foreign` (`category_id`),
  ADD KEY `category_subcategory_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checklists_appiontment_id_foreign` (`appiontment_id`);

--
-- Indexes for table `engineers`
--
ALTER TABLE `engineers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `engineers_email_unique` (`email`),
  ADD KEY `engineers_category_id_foreign` (`category_id`),
  ADD KEY `engineers_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `expertises`
--
ALTER TABLE `expertises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expertises_category_id_foreign` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inspections`
--
ALTER TABLE `inspections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inspections_appiontment_id_foreign` (`appiontment_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts_for_product`
--
ALTER TABLE `parts_for_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appiontment_id` (`appiontment_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `recruiting_engineers`
--
ALTER TABLE `recruiting_engineers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recruiting_engineers_appiontment_id_foreign` (`appiontment_id`),
  ADD KEY `recruiting_engineers_engineer_id_foreign` (`engineer_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sold_product_id` (`user_id`),
  ADD KEY `user_id` (`sold_product_id`);

--
-- Indexes for table `servicing_orders`
--
ALTER TABLE `servicing_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicing_orders_appiontment_id_foreign` (`appiontment_id`);

--
-- Indexes for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sold_products_branch_id_foreign` (`branch_id`),
  ADD KEY `sold_products_user_id_foreign` (`user_id`),
  ADD KEY `sold_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appiontments`
--
ALTER TABLE `appiontments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `appliances`
--
ALTER TABLE `appliances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category_subcategory`
--
ALTER TABLE `category_subcategory`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `engineers`
--
ALTER TABLE `engineers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expertises`
--
ALTER TABLE `expertises`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inspections`
--
ALTER TABLE `inspections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `parts_for_product`
--
ALTER TABLE `parts_for_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recruiting_engineers`
--
ALTER TABLE `recruiting_engineers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `servicing_orders`
--
ALTER TABLE `servicing_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sold_products`
--
ALTER TABLE `sold_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appiontments`
--
ALTER TABLE `appiontments`
  ADD CONSTRAINT `appiontments_sold_product_id_foreign` FOREIGN KEY (`sold_product_id`) REFERENCES `sold_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_subcategory`
--
ALTER TABLE `category_subcategory`
  ADD CONSTRAINT `category_subcategory_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_subcategory_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checklists`
--
ALTER TABLE `checklists`
  ADD CONSTRAINT `checklists_appiontment_id_foreign` FOREIGN KEY (`appiontment_id`) REFERENCES `appiontments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `engineers`
--
ALTER TABLE `engineers`
  ADD CONSTRAINT `engineers_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `engineers_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `expertises`
--
ALTER TABLE `expertises`
  ADD CONSTRAINT `expertises_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inspections`
--
ALTER TABLE `inspections`
  ADD CONSTRAINT `inspections_appiontment_id_foreign` FOREIGN KEY (`appiontment_id`) REFERENCES `appiontments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recruiting_engineers`
--
ALTER TABLE `recruiting_engineers`
  ADD CONSTRAINT `recruiting_engineers_appiontment_id_foreign` FOREIGN KEY (`appiontment_id`) REFERENCES `appiontments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recruiting_engineers_engineer_id_foreign` FOREIGN KEY (`engineer_id`) REFERENCES `engineers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `servicing_orders`
--
ALTER TABLE `servicing_orders`
  ADD CONSTRAINT `servicing_orders_appiontment_id_foreign` FOREIGN KEY (`appiontment_id`) REFERENCES `appiontments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sold_products`
--
ALTER TABLE `sold_products`
  ADD CONSTRAINT `sold_products_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sold_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sold_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
