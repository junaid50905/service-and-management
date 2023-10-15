-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2023 at 06:59 AM
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
(4, 1, 'assigned', '2023-10-19', '15:07', '2023-10-11 06:04:43', '2023-10-11 06:07:19'),
(5, 3, 'assigned', '2023-10-12', '15:00', '2023-10-11 06:06:46', '2023-10-11 06:10:43'),
(6, 2, 'assigned', '2023-10-25', '17:52', '2023-10-11 06:51:30', '2023-10-11 06:52:16');

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
-- Table structure for table `checklists`
--

CREATE TABLE `checklists` (
  `id` bigint UNSIGNED NOT NULL,
  `appiontment_id` bigint UNSIGNED NOT NULL,
  `parts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','working','done') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
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
(1, 35, 1, 'emon', 'emon@engineer.aamra.com', '12345678', 'bonani', '01232222', '2023-10-03 09:38:37', '2023-10-03 09:38:37'),
(2, 35, 7, 'tanzim', 'tanzim@engineer.aamrasam.com', '12345678', 'Sapla meniton, Gazipur chowrasta, Gazipur', '+1 (384) 567-5851', '2023-10-11 05:02:47', '2023-10-11 05:02:47');

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
(13, '2014_10_12_000000_create_users_table', 10),
(17, '2023_09_26_174216_create_categories_table', 13),
(22, '2023_09_28_171645_create_subcategories_table', 15),
(23, '2023_09_26_173820_create_products_table', 16),
(26, '2023_09_26_175220_create_selling_products_table', 18),
(28, '2023_10_02_112950_add_columns_to_appiontments_table', 20),
(29, '2023_09_26_205051_create_recruiting_engineers_table', 21),
(30, '2023_09_26_174336_create_engineers_table', 22),
(34, '2023_10_01_150345_create_appiontments_table', 23),
(35, '2023_09_26_204315_create_checklists_table', 24);

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

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'register_test@gmail.com', '156ac44202dd3a5a04506b517636caa3f59f89dce1408fe820329eab9957c6c4', '[\"*\"]', NULL, NULL, '2023-10-03 05:48:15', '2023-10-03 05:48:15'),
(4, 'App\\Models\\User', 6, 'register_test3@gmail.com', '5a9bc1f27d1f0e0d954945597cc59056fc2575f04e3c636e90622a107a31c21a', '[\"*\"]', NULL, NULL, '2023-10-03 06:24:17', '2023-10-03 06:24:17'),
(5, 'App\\Models\\User', 6, 'login_test3@gmail.com', 'c6d425086850a143d598a5af10980b2551703e22c906b5ccc297f4cac7f8d311', '[\"*\"]', NULL, NULL, '2023-10-03 06:24:56', '2023-10-03 06:24:56'),
(6, 'App\\Models\\User', 6, 'login_test3@gmail.com', '7181fc4a1e7b2ed06c340630974e6de9de9dabd2f80ea4b384ac438d5f52f823', '[\"*\"]', NULL, NULL, '2023-10-03 06:29:53', '2023-10-03 06:29:53'),
(7, 'App\\Models\\User', 6, 'login_test3@gmail.com', '20e0f7d548ff79232307ae1f70b00ad7c1298f98cc9652b54fd67bcc60d932a8', '[\"*\"]', NULL, NULL, '2023-10-03 06:30:41', '2023-10-03 06:30:41'),
(15, 'App\\Models\\User', 7, 'login_test4@gmail.com', '4c067541948800262873c0e87ca26c4913261c0bbed039f5729b9ed5255e7561', '[\"*\"]', '2023-10-03 06:54:25', NULL, '2023-10-03 06:52:27', '2023-10-03 06:54:25'),
(16, 'App\\Models\\User', 8, 'register_testing@gmail.com', '2424f7d2d32545541cde3363e3235f9d62508e8b5c091a3049f076f9e7e8deef', '[\"*\"]', NULL, NULL, '2023-10-11 06:19:14', '2023-10-11 06:19:14'),
(17, 'App\\Models\\User', 8, 'login_testing@gmail.com', '3766deacea0ab30039882cfce849747691ff1b806642ef5c02b07e60a4334214', '[\"*\"]', '2023-10-11 06:19:28', NULL, '2023-10-11 06:19:27', '2023-10-11 06:19:28');

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
(1, 35, 1, 'erm system', 'gar-erp30', 10000, '12', '2023-09-30 12:55:26', '2023-10-02 11:04:44'),
(4, 34, 5, 'HP Laser 107a Laser Printer', 'Laser 107a', 12000, '12', '2023-10-01 06:38:53', '2023-10-01 06:38:53'),
(5, 34, 5, 'HP Ink Tank 115 Printer (2LB19A)', 'Ink Tank 115', 10400, '8', '2023-10-01 06:42:48', '2023-10-01 06:42:48'),
(6, 35, 1, 'Skote - React + Laravel Admin & Dashboard Template', 'sk-rl-1.1.1', 12000, '3', '2023-10-02 11:26:21', '2023-10-02 11:26:21');

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
(13, 4, 1, '2023-10-11 06:07:19', '2023-10-11 06:07:19'),
(14, 5, 1, '2023-10-11 06:10:43', '2023-10-11 06:10:43'),
(15, 6, 2, '2023-10-11 06:52:16', '2023-10-11 06:52:16');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selling_products`
--

INSERT INTO `selling_products` (`id`, `user_id`, `product_id`, `selling_date`, `warranty_end_date`, `sam`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2023-04-04', '2024-04-04', 0, '2023-10-01 06:51:21', '2023-10-01 06:51:21'),
(2, 2, 4, '2023-09-04', '2024-09-04', 1, '2023-09-04 06:55:47', '2023-09-04 06:55:47'),
(3, 1, 5, '2023-08-08', '2024-04-08', 1, '2023-08-07 18:00:00', '2023-08-07 18:00:00');

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
(7, 35, 'flatter, java, python', '2023-10-01 08:49:23', '2023-10-01 08:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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

INSERT INTO `users` (`id`, `name`, `email`, `address`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'junaid', 'junaid@gmail.com', 'gazipur', '013', '2023-10-18 05:27:45', '123', NULL, NULL, NULL),
(2, 'arman', 'arman@gmail.com', 'chandpur', '019', NULL, '123', NULL, '2023-09-04 06:53:50', '2023-09-04 06:53:50'),
(4, 'test', 'test@gmail.com', 'bonani', '0123456', NULL, '$2y$10$Pm9KUksCtt3daIQuRxvX/.5hSc5CU.AyuiMLdfo76sl43I43Bx0vK', NULL, '2023-10-03 05:48:15', '2023-10-03 05:48:15'),
(5, 'test2', 'test2@gmail.com', 'bonani2', '01234562', NULL, '$2y$10$UgrlPzShFl8tWSZAX1YIB.O1.vppArGu4rSKcJpGE4q6Fi2p7W6L6', NULL, '2023-10-03 05:54:34', '2023-10-03 05:54:34'),
(6, 'test3', 'test3@gmail.com', 'bonani3', '01234563', NULL, '$2y$10$G.HZ7OyWCziAu/UXE4HOEudwZvZEoQM8voay6P8MQgRbes2.ObP2.', NULL, '2023-10-03 06:24:17', '2023-10-03 06:24:17'),
(7, 'test4', 'test4@gmail.com', 'bonani3', '01234564', NULL, '$2y$10$3j2N0XVf0X7RuvJkikq6quUjdar5bjUsxi.cFl8Ze9g8WJ6jb36Oa', NULL, '2023-10-03 06:33:20', '2023-10-03 06:33:20'),
(8, 'testing', 'testing@gmail.com', 'bonani', '+1 (306) 272-9325', NULL, '$2y$10$Rtfh5j4XZ4wUdMUsAooEN.1knXXiCko8mwW8a8y95w5QkkJMF7bmG', NULL, '2023-10-11 06:19:14', '2023-10-11 06:19:14');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `recruiting_engineers`
--
ALTER TABLE `recruiting_engineers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `selling_products`
--
ALTER TABLE `selling_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appiontments`
--
ALTER TABLE `appiontments`
  ADD CONSTRAINT `appiontments_selling_product_id_foreign` FOREIGN KEY (`selling_product_id`) REFERENCES `selling_products` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
