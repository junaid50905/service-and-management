-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 30, 2023 at 04:41 AM
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','superadmin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'ajhar', 'ahjar@superadmin.aamra-solution.com', '12345678', 'superadmin', '2023-10-25 07:11:15', '2023-10-25 07:11:15'),
(2, 'abdullah', 'abdullah@admin.aamra-solution.com', '12345678', 'admin', '2023-10-25 07:11:15', '2023-10-25 07:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `appiontments`
--

CREATE TABLE `appiontments` (
  `id` bigint UNSIGNED NOT NULL,
  `sold_product_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `engineer_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','assigned','late','working','complete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `appiontments` (`id`, `sold_product_id`, `user_id`, `engineer_id`, `status`, `usertype`, `appiontment_taken_date`, `appiontment_taken_time`, `inspection_date`, `inspection_time`, `created_at`, `updated_at`) VALUES
(93, 31, 15, 5, 'late', 'solo', '2023-11-20', '17:07:29', '2023-11-21', '18:59:00', '2023-11-20 11:07:29', '2023-11-22 03:15:16'),
(94, 31, 15, 5, 'late', 'solo', '2023-11-20', '17:14:11', '2023-11-27', '02:45:00', '2023-11-20 11:14:11', '2023-11-27 03:06:55'),
(95, 30, 15, 3, 'complete', 'solo', '2023-11-20', '17:14:25', '2023-11-22', '19:14:00', '2023-11-20 11:14:25', '2023-11-21 04:32:33'),
(96, 26, 7, NULL, 'pending', 'solo', '2023-11-21', '10:30:08', NULL, NULL, '2023-11-21 04:30:08', '2023-11-21 04:30:08'),
(97, 19, 7, 4, 'late', 'solo', '2023-11-21', '14:10:38', '2023-11-27', '13:30:00', '2023-11-21 08:10:38', '2023-11-27 07:30:02'),
(98, 9, 7, 6, 'late', 'solo', '2023-11-21', '14:15:03', '2023-11-22', '21:40:00', '2023-11-21 08:15:03', '2023-11-23 03:20:30'),
(99, 29, 7, 4, 'late', 'solo', '2023-11-21', '15:28:19', '2023-11-27', '13:00:00', '2023-11-21 09:28:19', '2023-11-27 07:00:33'),
(100, 29, 7, 4, 'late', 'solo', '2023-11-21', '15:47:14', '2023-11-22', '20:38:00', '2023-11-21 09:47:14', '2023-11-23 03:20:30'),
(101, 26, 7, 3, 'complete', 'solo', '2023-11-21', '17:56:53', '2023-11-22', '19:57:00', '2023-11-21 11:56:53', '2023-11-21 12:00:10'),
(102, 22, 7, 3, 'complete', 'solo', '2023-11-21', '18:01:33', '2023-11-22', '21:01:00', '2023-11-21 12:01:33', '2023-11-27 04:26:22'),
(103, 26, 7, 3, 'complete', 'solo', '2023-11-21', '18:02:30', '2023-11-22', '21:02:00', '2023-11-21 12:02:30', '2023-11-27 04:19:29'),
(104, 31, 15, NULL, 'pending', 'solo', '2023-11-26', '10:47:57', NULL, NULL, '2023-11-26 04:47:57', '2023-11-26 04:47:57'),
(105, 31, 15, NULL, 'pending', 'solo', '2023-11-26', '10:48:34', NULL, NULL, '2023-11-26 04:48:34', '2023-11-26 04:48:34'),
(106, 10, 8, NULL, 'pending', 'group', '2023-11-26', '10:53:08', NULL, NULL, '2023-11-26 04:53:08', '2023-11-26 04:53:08'),
(107, 29, 7, 4, 'late', 'solo', '2023-11-26', '10:56:56', '2023-11-28', '14:40:00', '2023-11-26 04:56:56', '2023-11-28 08:40:39'),
(108, 26, 7, NULL, 'pending', 'solo', '2023-11-26', '10:59:21', NULL, NULL, '2023-11-26 04:59:21', '2023-11-26 04:59:21'),
(109, 19, 7, 4, 'late', 'solo', '2023-11-26', '11:01:16', '2023-11-28', '02:35:00', '2023-11-26 05:01:16', '2023-11-28 03:40:54'),
(110, 22, 7, NULL, 'pending', 'solo', '2023-11-26', '11:05:23', NULL, NULL, '2023-11-26 05:05:23', '2023-11-26 05:05:23'),
(111, 30, 15, NULL, 'pending', 'solo', '2023-11-26', '11:05:35', NULL, NULL, '2023-11-26 05:05:35', '2023-11-26 05:05:35'),
(112, 32, 10, 3, 'complete', 'group', '2023-11-26', '11:05:54', '2023-11-27', '12:17:00', '2023-11-26 05:05:54', '2023-11-28 04:03:16'),
(113, 20, 10, 4, 'late', 'solo', '2023-11-26', '11:59:04', '2023-11-29', '14:00:00', '2023-11-26 05:59:04', '2023-11-29 08:45:08'),
(114, 20, 10, 4, 'assigned', 'solo', '2023-11-26', '12:54:35', '2023-12-08', '14:00:00', '2023-11-26 06:54:35', '2023-11-26 09:50:11'),
(115, 20, 10, 4, 'assigned', 'solo', '2023-11-26', '15:54:11', '2023-12-05', '18:54:00', '2023-11-26 09:54:11', '2023-11-26 09:54:42'),
(116, 20, 10, 4, 'late', 'solo', '2023-11-26', '15:55:36', '2023-11-29', '14:21:00', '2023-11-26 09:55:36', '2023-11-29 08:45:08'),
(117, 20, 10, 4, 'late', 'solo', '2023-11-26', '16:17:47', '2023-11-29', '21:26:00', '2023-11-26 10:17:47', '2023-11-30 03:17:35'),
(118, 20, 10, 9, 'working', 'solo', '2023-11-26', '16:27:18', '2023-11-28', '18:56:00', '2023-11-26 10:27:18', '2023-11-28 05:14:46'),
(119, 27, 10, 3, 'working', 'solo', '2023-11-26', '16:56:21', '2023-11-28', '02:37:00', '2023-11-26 10:56:21', '2023-11-27 05:42:18'),
(120, 20, 10, 9, 'working', 'solo', '2023-11-26', '16:56:56', '2023-11-30', '13:46:00', '2023-11-26 10:56:56', '2023-11-28 04:57:00'),
(121, 32, NULL, 3, 'complete', 'solo', '2023-11-26', '17:19:11', '2023-11-28', '20:19:00', '2023-11-26 11:19:11', '2023-11-27 04:25:07'),
(122, 33, NULL, 3, 'working', 'solo', '2023-11-27', '10:28:14', '2023-11-28', '02:28:00', '2023-11-27 04:28:14', '2023-11-27 04:57:41'),
(123, 30, NULL, 7, 'late', 'solo', '2023-11-27', '15:19:43', '2023-11-29', '18:23:00', '2023-11-27 09:19:43', '2023-11-30 03:17:35'),
(124, 32, NULL, 3, 'complete', 'solo', '2023-11-28', '09:45:54', '2023-11-30', '10:00:00', '2023-11-28 03:45:54', '2023-11-28 04:03:43'),
(125, 32, NULL, 3, 'late', 'solo', '2023-11-28', '09:55:10', '2023-11-28', '10:09:00', '2023-11-28 03:55:10', '2023-11-28 04:09:09'),
(126, 32, NULL, 3, 'working', 'solo', '2023-11-28', '10:48:44', '2023-11-29', '13:00:00', '2023-11-28 04:48:44', '2023-11-28 04:50:27'),
(127, 26, 7, 3, 'complete', 'solo', '2023-11-28', '11:42:06', '2023-11-29', '14:43:00', '2023-11-28 05:42:06', '2023-11-28 05:46:47'),
(128, 26, 7, 3, 'complete', 'solo', '2023-11-29', '09:17:52', '2023-11-29', '15:18:00', '2023-11-29 03:17:52', '2023-11-29 03:24:03'),
(129, 33, NULL, 3, 'working', 'solo', '2023-11-30', '10:00:30', '2023-11-30', '14:00:00', '2023-11-30 04:00:30', '2023-11-30 04:01:29'),
(130, 25, NULL, NULL, 'pending', 'group', '2023-11-30', '10:06:49', NULL, NULL, '2023-11-30 04:06:49', '2023-11-30 04:06:49'),
(131, 10, NULL, NULL, 'pending', 'group', '2023-11-30', '10:08:21', NULL, NULL, '2023-11-30 04:08:21', '2023-11-30 04:08:21'),
(132, 13, NULL, 4, 'working', 'group', '2023-11-30', '10:10:25', '2023-12-01', '12:12:00', '2023-11-30 04:10:25', '2023-11-30 04:12:57');

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

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(9, 34, 5, 'Forhad', 'forhad@engineer.aamra.com', '12345678', 'uttara, Dhaka', '014563434343', '2023-11-26 10:55:55', '2023-11-26 10:55:55');

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

INSERT INTO `inspections` (`id`, `appiontment_id`, `engineer_id`, `start_date`, `start_time`, `end_time`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(25, 95, 3, '2023-11-20', '17:15:55', '17:15:58', 90.403978, 23.794008, 'complete', NULL, '2023-11-21 04:32:33'),
(26, 101, 3, '2023-11-21', '17:58:51', '17:59:01', 90.403981, 23.794008, 'complete', NULL, '2023-11-21 12:00:10'),
(27, 103, 3, '2023-11-21', '18:04:35', '10:18:37', 90.403982, 23.794010, 'complete', NULL, '2023-11-27 04:19:29'),
(28, 121, 3, '2023-11-26', '17:43:16', '10:24:43', 90.403978, 23.794008, 'complete', NULL, '2023-11-27 04:25:07'),
(29, 121, 3, '2023-11-26', '17:43:48', '10:24:43', 90.403979, 23.794008, 'complete', NULL, '2023-11-27 04:25:07'),
(30, 121, 3, '2023-11-26', '17:49:58', '10:24:43', 90.403984, 23.794007, 'complete', NULL, '2023-11-27 04:25:07'),
(31, 121, 3, '2023-11-26', '17:51:56', '10:24:43', 90.403979, 23.794011, 'complete', NULL, '2023-11-27 04:25:07'),
(32, 121, 3, '2023-11-26', '17:52:54', '10:24:43', 90.403977, 23.794008, 'complete', NULL, '2023-11-27 04:25:07'),
(33, 121, 3, '2023-11-26', '17:55:33', '10:24:43', 90.403979, 23.794008, 'complete', NULL, '2023-11-27 04:25:07'),
(34, 121, 3, '2023-11-26', '17:56:01', '10:24:43', 90.403979, 23.794008, 'complete', NULL, '2023-11-27 04:25:07'),
(35, 121, 3, '2023-11-26', '17:59:16', '10:24:43', 90.403983, 23.794004, 'complete', NULL, '2023-11-27 04:25:07'),
(36, 121, 3, '2023-11-26', '18:01:37', '10:24:43', 90.403981, 23.794012, 'complete', NULL, '2023-11-27 04:25:07'),
(37, 121, 3, '2023-11-26', '18:02:31', '10:24:43', 90.403978, 23.794005, 'complete', NULL, '2023-11-27 04:25:07'),
(38, 103, 3, '2023-11-27', '09:08:19', '10:18:37', 90.403982, 23.793972, 'complete', NULL, '2023-11-27 04:19:29'),
(39, 103, 3, '2023-11-27', '09:11:53', '10:18:37', 90.403977, 23.794008, 'complete', NULL, '2023-11-27 04:19:29'),
(40, 103, 3, '2023-11-27', '09:15:03', '10:18:37', 90.403980, 23.794005, 'complete', NULL, '2023-11-27 04:19:29'),
(41, 103, 3, '2023-11-27', '09:16:28', '10:18:37', 90.403980, 23.793998, 'complete', NULL, '2023-11-27 04:19:29'),
(42, 103, 3, '2023-11-27', '09:49:36', '10:18:37', 90.403981, 23.794016, 'complete', NULL, '2023-11-27 04:19:29'),
(43, 103, 3, '2023-11-27', '09:56:08', '10:18:37', 90.403963, 23.794011, 'complete', NULL, '2023-11-27 04:19:29'),
(44, 103, 3, '2023-11-27', '10:12:08', '10:18:37', 90.403982, 23.794007, 'complete', NULL, '2023-11-27 04:19:29'),
(45, 103, 3, '2023-11-27', '10:18:27', '10:18:37', 90.403961, 23.793969, 'complete', NULL, '2023-11-27 04:19:29'),
(46, 121, 3, '2023-11-27', '10:24:23', '10:24:43', 90.403997, 23.794004, 'complete', NULL, '2023-11-27 04:25:07'),
(47, 102, 3, '2023-11-27', '10:25:34', '10:25:43', 90.403990, 23.794007, 'complete', NULL, '2023-11-27 04:26:22'),
(48, 122, 3, '2023-11-27', '10:29:29', '10:57:47', 90.403980, 23.794012, 'working', NULL, '2023-11-27 04:57:47'),
(49, 122, 3, '2023-11-27', '10:34:50', '10:57:47', 90.403980, 23.794004, 'working', NULL, '2023-11-27 04:57:47'),
(50, 122, 3, '2023-11-27', '10:37:21', '10:57:47', 90.403977, 23.794003, 'working', NULL, '2023-11-27 04:57:47'),
(51, 122, 3, '2023-11-27', '10:57:41', '10:57:47', 90.403967, 23.794009, 'working', NULL, '2023-11-27 04:57:47'),
(52, 119, 3, '2023-11-27', '11:40:14', '11:42:21', 90.403978, 23.794009, 'working', NULL, '2023-11-27 05:42:21'),
(53, 119, 3, '2023-11-27', '11:42:18', '11:42:21', 90.403981, 23.794005, 'working', NULL, '2023-11-27 05:42:21'),
(54, 124, 3, '2023-11-28', '09:56:25', '10:00:19', 90.403979, 23.794005, 'complete', NULL, '2023-11-28 04:03:43'),
(55, 124, 3, '2023-11-28', '10:00:13', '10:00:19', 90.403978, 23.794012, 'complete', NULL, '2023-11-28 04:03:43'),
(56, 112, 3, '2023-11-28', '10:02:02', '10:02:21', 90.403977, 23.794009, 'complete', NULL, '2023-11-28 04:03:16'),
(57, 126, 3, '2023-11-28', '10:50:27', '10:50:35', 90.403981, 23.794005, 'working', NULL, '2023-11-28 04:50:35'),
(58, 120, 9, '2023-11-28', '10:57:00', '10:57:08', 90.603984, 23.694009, 'working', NULL, '2023-11-28 04:57:08'),
(59, 118, 9, '2023-11-28', '11:14:46', '11:25:58', 90.403977, 23.794006, 'working', NULL, '2023-11-28 05:25:58'),
(60, 127, 3, '2023-11-28', '11:45:21', '11:45:45', 90.403981, 23.793928, 'complete', NULL, '2023-11-28 05:46:47'),
(61, 127, 3, '2023-11-28', '11:45:41', '11:45:45', 90.403981, 23.793928, 'complete', NULL, '2023-11-28 05:46:47'),
(62, 128, 3, '2023-11-29', '09:22:03', '09:24:01', 90.403979, 23.794010, 'complete', NULL, '2023-11-29 03:24:03'),
(63, 128, 3, '2023-11-29', '09:23:59', '09:24:01', 90.403977, 23.794005, 'complete', NULL, '2023-11-29 03:24:03'),
(64, 129, 3, '2023-11-30', '10:01:29', '10:01:38', 90.403981, 23.794004, 'working', NULL, '2023-11-30 04:01:38'),
(65, 132, 4, '2023-11-30', '10:12:57', '10:12:58', 90.403959, 23.794008, 'working', NULL, '2023-11-30 04:12:58');

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
  `appliance_name` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(68, 93, 5, '2023-11-20 11:07:59', '2023-11-20 11:07:59'),
(69, 95, 3, '2023-11-20 11:14:38', '2023-11-20 11:14:38'),
(70, 100, 4, '2023-11-21 10:38:38', '2023-11-21 10:38:38'),
(71, 98, 6, '2023-11-21 10:40:07', '2023-11-21 10:40:07'),
(72, 101, 3, '2023-11-21 11:58:03', '2023-11-21 11:58:03'),
(73, 102, 3, '2023-11-21 12:01:58', '2023-11-21 12:01:58'),
(74, 103, 3, '2023-11-21 12:03:49', '2023-11-21 12:03:49'),
(75, 99, 4, '2023-11-26 04:15:38', '2023-11-26 04:15:38'),
(76, 94, 5, '2023-11-26 04:45:54', '2023-11-26 04:45:54'),
(77, 97, 4, '2023-11-26 04:46:15', '2023-11-26 04:46:15'),
(78, 109, 4, '2023-11-26 05:35:13', '2023-11-26 05:35:13'),
(79, 107, 4, '2023-11-26 05:58:24', '2023-11-26 05:58:24'),
(80, 113, 4, '2023-11-26 06:53:54', '2023-11-26 06:53:54'),
(81, 114, 4, '2023-11-26 09:06:07', '2023-11-26 09:06:07'),
(82, 114, 4, '2023-11-26 09:06:07', '2023-11-26 09:06:07'),
(83, 114, 4, '2023-11-26 09:06:07', '2023-11-26 09:06:07'),
(84, 114, 4, '2023-11-26 09:06:07', '2023-11-26 09:06:07'),
(85, 114, 4, '2023-11-26 09:06:07', '2023-11-26 09:06:07'),
(86, 114, 4, '2023-11-26 09:50:11', '2023-11-26 09:50:11'),
(87, 115, 4, '2023-11-26 09:54:42', '2023-11-26 09:54:42'),
(88, 116, 4, '2023-11-26 10:17:23', '2023-11-26 10:17:23'),
(89, 117, 4, '2023-11-26 10:26:34', '2023-11-26 10:26:34'),
(90, 118, 9, '2023-11-26 10:56:39', '2023-11-26 10:56:39'),
(91, 121, 3, '2023-11-26 11:20:04', '2023-11-26 11:20:04'),
(92, 122, 3, '2023-11-27 04:28:34', '2023-11-27 04:28:34'),
(93, 119, 3, '2023-11-27 05:37:10', '2023-11-27 05:37:10'),
(94, 112, 3, '2023-11-27 06:15:53', '2023-11-27 06:15:53'),
(95, 123, 7, '2023-11-27 09:23:12', '2023-11-27 09:23:12'),
(96, 124, 3, '2023-11-28 03:54:01', '2023-11-28 03:54:01'),
(97, 125, 3, '2023-11-28 04:05:46', '2023-11-28 04:05:46'),
(98, 120, 9, '2023-11-28 04:46:40', '2023-11-28 04:46:40'),
(99, 126, 3, '2023-11-28 04:49:36', '2023-11-28 04:49:36'),
(100, 127, 3, '2023-11-28 05:43:50', '2023-11-28 05:43:50'),
(101, 128, 3, '2023-11-29 03:18:48', '2023-11-29 03:18:48'),
(102, 129, 3, '2023-11-30 04:00:58', '2023-11-30 04:00:58'),
(103, 132, 4, '2023-11-30 04:12:39', '2023-11-30 04:12:39');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  `sold_product_id` bigint UNSIGNED NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `service_requests`
--

INSERT INTO `service_requests` (`id`, `user_id`, `usertype`, `sold_product_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 7, 'solo', 29, 'taken', '2023-11-21 09:23:35', '2023-11-21 09:47:14'),
(5, 7, 'solo', 22, 'taken', '2023-11-21 10:23:20', '2023-11-21 12:01:33'),
(6, 7, 'solo', 26, 'taken', '2023-11-21 11:54:18', '2023-11-21 11:56:53'),
(7, 7, 'solo', 26, 'taken', '2023-11-21 12:02:15', '2023-11-21 12:02:30'),
(8, 7, 'solo', 19, 'taken', '2023-11-26 05:01:02', '2023-11-26 05:01:16'),
(9, 7, 'solo', 22, 'taken', '2023-11-26 05:05:01', '2023-11-26 05:05:23'),
(10, 15, 'solo', 30, 'taken', '2023-11-26 05:05:35', '2023-11-26 05:05:35'),
(11, 10, 'group', 32, 'taken', '2023-11-26 05:05:54', '2023-11-26 05:05:54'),
(12, 10, 'solo', 20, 'taken', '2023-11-26 05:59:04', '2023-11-26 05:59:04'),
(13, 10, 'solo', 20, 'taken', '2023-11-26 06:54:35', '2023-11-26 06:54:35'),
(14, 10, 'solo', 20, 'taken', '2023-11-26 09:51:18', '2023-11-26 09:54:11'),
(15, 10, 'solo', 20, 'taken', '2023-11-26 09:54:58', '2023-11-26 09:55:36'),
(16, 10, 'solo', 20, 'taken', '2023-11-26 10:17:35', '2023-11-26 10:17:47'),
(17, 10, 'solo', 20, 'taken', '2023-11-26 10:27:04', '2023-11-26 10:27:18'),
(18, 10, 'solo', 27, 'taken', '2023-11-26 10:56:09', '2023-11-26 10:56:21'),
(19, 10, 'solo', 20, 'taken', '2023-11-26 10:56:46', '2023-11-26 10:56:56'),
(20, 7, 'solo', 26, 'taken', '2023-11-28 05:41:34', '2023-11-28 05:42:06'),
(21, 7, 'solo', 26, 'taken', '2023-11-29 03:17:15', '2023-11-29 03:17:52');

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
(27, 10, 8, 10, 2, '2023-10-03', 23, 1, '2023-11-05 08:30:48', '2023-11-05 08:30:48'),
(28, 8, 8, 8, 4, '2023-10-29', 12, 1, '2023-11-05 08:38:10', '2023-11-05 08:38:10'),
(29, 7, 4, NULL, 3, '2023-10-29', 12, 1, '2023-11-15 06:10:13', '2023-11-15 06:10:13'),
(30, 15, 8, NULL, 3, '2023-10-30', 12, 0, '2023-11-20 06:23:30', '2023-11-20 06:23:30'),
(31, 15, 7, NULL, 5, '2023-11-22', 10, 1, '2023-11-20 06:59:44', '2023-11-20 06:59:44'),
(32, 10, 8, 10, 2, '2023-10-29', 12, 1, '2023-11-21 05:36:48', '2023-11-21 05:36:48'),
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
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(15, 'solo', 'one bank', 'onebank@gmail.com', 'Gulshan', '0198765435433', NULL, '$2y$10$GWoPZwjMLmEr6vqscCwtH.Z3Nb2VVwiAKcN2uo2Y3wJrHmx1F8Gje', NULL, '2023-11-20 05:44:15', '2023-11-20 06:20:02');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appiontments`
--
ALTER TABLE `appiontments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `appliances`
--
ALTER TABLE `appliances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
