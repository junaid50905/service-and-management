-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 09:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

-- Host: localhost:3306
-- Generation Time: Oct 16, 2023 at 10:22 AM
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
-- Table structure for table `appiontments`
--

CREATE TABLE `appiontments` (
  `id` bigint UNSIGNED NOT NULL,
  `selling_product_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','assigned','late','complete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appiontments`
--

INSERT INTO `appiontments` (`id`, `selling_product_id`, `status`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 6, 'assigned', '2023-10-18', '18:50', '2023-10-16 09:44:30', '2023-10-16 09:44:57'),
(2, 7, 'assigned', '2023-10-24', '21:11', '2023-10-16 10:11:33', '2023-10-16 10:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `appliances`
--

CREATE TABLE `appliances` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_price` int DEFAULT NULL,
  `market_price` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appliances`
--

INSERT INTO `appliances` (`id`, `category_id`, `subcategory_id`, `name`, `purchase_price`, `market_price`, `created_at`, `updated_at`) VALUES
(1, 34, 8, 'ssd 128 gb', 2100, 2690, NULL, NULL),
(2, 34, 9, 'Wheel Loader', 780, 1100, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `appliance_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `appliance_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checklists`
--

INSERT INTO `checklists` (`id`, `appiontment_id`, `appliance_name`, `appliance_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'ssd 128 gb', 3200, NULL, NULL),
(2, 2, 'printer wheel', 120, NULL, NULL),
(3, 2, 'Hyacinth Mcbride', 3200, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `engineers`
--

CREATE TABLE `engineers` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `engineers`
--

INSERT INTO `engineers` (`id`, `category_id`, `subcategory_id`, `name`, `email`, `password`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 34, 9, 'Abdullah al rafi', 'rafi@engineer.aamra.com', '12345678', 'Gazipura, Gazipur', '01305516213', '2023-10-16 09:42:06', '2023-10-16 09:42:06'),
(2, 34, 5, 'Shah moazzam rony', 'rony@engineer.aamra.com', '12345678', 'Sapla meniton, Gazipur chowrasta, Gazipur', '01698209834', '2023-10-16 09:43:05', '2023-10-16 09:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `expertises`
--

CREATE TABLE `expertises` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(16, '2023_09_26_204315_create_checklists_table', 12),
(13, '2014_10_12_000000_create_users_table', 10),
(17, '2023_09_26_174216_create_categories_table', 13),
(22, '2023_09_28_171645_create_subcategories_table', 15),
(23, '2023_09_26_173820_create_products_table', 16),
(28, '2023_10_02_112950_add_columns_to_appiontments_table', 20),
(29, '2023_09_26_205051_create_recruiting_engineers_table', 21),
(30, '2023_09_26_175220_create_selling_products_table', 22),
(31, '2023_10_11_151910_create_category_subcategory_table', 22),
(32, '2023_10_11_162819_create_appliances_table', 22),
(33, '2023_10_12_100628_create_servicing_orders_table', 22),
(34, '2014_10_12_000000_create_users_table', 23);
(34, '2023_10_01_150345_create_appiontments_table', 23),
(35, '2023_09_26_174336_create_engineers_table', 24),
(36, '2023_09_26_204315_create_checklists_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `time_of_warranty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `name`, `model`, `price`, `time_of_warranty`, `created_at`, `updated_at`) VALUES
(1, 34, 1, 'erm system', 'gar-erp30', 10000, '12', '2023-09-30 12:55:26', '2023-09-30 12:55:26'),
(4, 34, 5, 'HP Laser 107a Laser Printer', 'Laser 107a', 12000, '12', '2023-10-01 06:38:53', '2023-10-01 06:38:53'),
(5, 34, 5, 'HP Ink Tank 115 Printer (2LB19A)', 'Ink Tank 115', 10400, '8', '2023-10-01 06:42:48', '2023-10-01 06:42:48'),
(6, 34, 8, 'hp envy 13', 'lhpe13', 80000, '5', '2023-10-16 06:38:27', '2023-10-16 06:38:27'),
(7, 34, 9, 'Zebra LS2208 Single Line Laser Barcode Scanner with Stand', 'Zebra LS2208', 7700, '2', '2023-10-16 09:39:17', '2023-10-16 09:39:17');

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
(11, 1, 1, '2023-10-16 09:44:57', '2023-10-16 09:44:57'),
(12, 2, 2, '2023-10-16 10:11:48', '2023-10-16 10:11:48');

-- --------------------------------------------------------

--
-- Table structure for table `selling_products`
--

CREATE TABLE `selling_products` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `selling_date` date NOT NULL,
  `warranty_end_date` date NOT NULL,
  `sam` tinyint(1) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selling_products`
--

INSERT INTO `selling_products` (`id`, `user_id`, `product_id`, `selling_date`, `warranty_end_date`, `sam`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2023-10-25', '2024-10-25', 1, 4, '2023-10-16 05:48:57', '2023-10-16 05:48:57'),
(2, 1, 6, '2023-10-24', '2024-03-24', 0, 1, '2023-10-16 06:38:54', '2023-10-16 08:02:22'),
(5, 5, 4, '2023-10-16', '2024-10-16', 1, 10, '2023-10-16 08:58:28', '2023-10-16 08:58:28'),
(6, 5, 6, '2023-10-16', '2024-03-16', 1, 1, '2023-10-16 09:19:47', '2023-10-16 09:19:47'),
(7, 6, 6, '2023-10-16', '2024-03-16', 1, 12, '2023-10-16 10:10:41', '2023-10-16 10:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `servicing_orders`
--

CREATE TABLE `servicing_orders` (
  `id` bigint UNSIGNED NOT NULL,
  `appiontment_id` bigint UNSIGNED NOT NULL,
  `status` enum('pending','working','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicing_orders`
--

INSERT INTO `servicing_orders` (`id`, `appiontment_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'pending', '2023-10-16 10:06:24', '2023-10-16 10:06:24'),
(2, 2, 'pending', '2023-10-16 10:13:00', '2023-10-16 10:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 34, 'laravel react web api', '2023-09-28 13:11:16', '2023-09-28 13:11:44'),
(5, 34, 'printer', '2023-10-01 06:32:51', '2023-10-01 06:32:51'),
(6, 34, 'mobile', '2023-10-01 08:48:16', '2023-10-01 08:48:16'),
(7, 35, 'flatter, java, python', '2023-10-01 08:49:23', '2023-10-01 08:49:23'),
(8, 34, 'laptop', '2023-10-16 06:37:36', '2023-10-16 06:37:36'),
(9, 34, 'pos machine', '2023-10-16 09:37:31', '2023-10-16 09:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'solo', 'MD. Tajimul Islam', 'tazim@gmail.com', 'Dhaka Bangladesh', '123456', NULL, '$2y$10$4NBshPasg4XFTPm3V7rs6eKCmu8kUzMtf9AbaifAbQTC7OfoVcoEW', NULL, '2023-10-18 07:02:55', '2023-10-18 07:02:55');
INSERT INTO `users` (`id`, `name`, `email`, `address`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'junaid', 'junaid@gmail.com', 'gazipur', '013', '2023-10-18 05:27:45', '123', NULL, NULL, NULL),
(2, 'arman', 'arman@gmail.com', 'chandpur', '019', NULL, '123', NULL, '2023-09-04 06:53:50', '2023-09-04 06:53:50'),
(5, 'emon hasan', 'emonhasan@gmail.com', 'Rabbi towar, Board Bazar, Gazipur', '01459032208', NULL, '$2y$10$mEY/G8OWkXXchmAK19o.FOph3ybKFHGzrpTZs6t5K550BJQVGwr1.', NULL, '2023-10-16 08:57:47', '2023-10-16 08:57:47'),
(6, 'abc', 'abc@gmail.com', 'Rabbi towar, Board Bazar, Gazipur', '+1 (842) 401-3921434', NULL, '$2y$10$TUypkIMFxSlE6TArTJDGMurHyZll2NF3U3rlENUQcLS6kK.kzWuYu', NULL, '2023-10-16 10:08:20', '2023-10-16 10:08:20');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `appiontments`
--
ALTER TABLE `appiontments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appiontments_selling_product_id_foreign` (`selling_product_id`);

--
-- Indexes for table `appliances`
--
ALTER TABLE `appliances`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `selling_products`
--
ALTER TABLE `selling_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selling_products_user_id_foreign` (`user_id`),
  ADD KEY `selling_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `servicing_orders`
--
ALTER TABLE `servicing_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicing_orders_appiontment_id_foreign` (`appiontment_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `appiontments`
--
ALTER TABLE `appiontments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appliances`
--
ALTER TABLE `appliances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `engineers`
--
ALTER TABLE `engineers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`

  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recruiting_engineers`
--
ALTER TABLE `recruiting_engineers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `selling_products`
--
ALTER TABLE `selling_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `servicing_orders`
--
ALTER TABLE `servicing_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`

  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appiontments`
--
ALTER TABLE `appiontments`
  ADD CONSTRAINT `appiontments_selling_product_id_foreign` FOREIGN KEY (`selling_product_id`) REFERENCES `selling_products` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `selling_products`
--
ALTER TABLE `selling_products`
  ADD CONSTRAINT `selling_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `selling_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `servicing_orders`
--
ALTER TABLE `servicing_orders`
  ADD CONSTRAINT `servicing_orders_appiontment_id_foreign` FOREIGN KEY (`appiontment_id`) REFERENCES `appiontments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
