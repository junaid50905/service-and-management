-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2023 at 09:58 AM
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
  `status` enum('pending','assigned','late','complete') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appliances`
--

CREATE TABLE `appliances` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(2, 34, 9, 'Wheel Loader', 780, 1100, NULL, NULL),
(3, 34, 8, 'nvme 256 GB', 2140, 3400, NULL, NULL);

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
(1, 34, 9, 'Abdullah al rafi', 'rafi@engineer.aamra.com', '12345678', 'Gazipura, Gazipur', '01305516213', '2023-10-16 09:42:06', '2023-10-16 09:42:06'),
(2, 34, 5, 'Shah moazzam rony', 'rony@engineer.aamra.com', '12345678', 'Sapla meniton, Gazipur chowrasta, Gazipur', '01698209834', '2023-10-16 09:43:05', '2023-10-16 09:43:05'),
(3, 34, 6, 'saber', 'saber@engineer.aamra.com', '123', 'kakoli, bonani', '+1 (842) 401-392112', '2023-10-18 08:41:03', '2023-10-18 08:41:03');

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
(29, '2023_09_26_205051_create_recruiting_engineers_table', 21),
(30, '2023_09_26_175220_create_selling_products_table', 22),
(31, '2023_10_11_151910_create_category_subcategory_table', 22),
(32, '2023_10_11_162819_create_appliances_table', 22),
(33, '2023_10_12_100628_create_servicing_orders_table', 22),
(34, '2023_10_01_150345_create_appiontments_table', 23),
(35, '2023_09_26_174336_create_engineers_table', 24),
(36, '2023_09_26_204315_create_checklists_table', 25),
(37, '2023_09_26_173820_create_products_table', 26),
(38, '2014_10_12_000000_create_users_table', 27);

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
(2, 'App\\Models\\User', 8, 'login_emon123@gmail.com', 'f2389ae84a2ff97ca25f6968ecdddc3f90fcf3acd586b55210e97ea806e273c2', '[\"*\"]', NULL, NULL, '2023-10-16 11:25:44', '2023-10-16 11:25:44');

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
(3, 35, 7, 'erp system', 'erp-qw', 10000, '2023-10-18 07:13:17', '2023-10-18 08:34:40');

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
(9, 34, 'pos machine', '2023-10-16 09:37:31', '2023-10-16 09:37:31');

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
(1, 'company', 'Katelyn Giles', 'govejegew@mailinator.com', 'Deleniti est recusan', '0134444', NULL, '$2y$10$URpGyLP6EUnGV1geCOb8Mu43gsUJFfcesSEo1smTo818ND72mNlP.', NULL, '2023-10-18 09:52:04', '2023-10-18 09:55:14');

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appliances`
--
ALTER TABLE `appliances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `recruiting_engineers`
--
ALTER TABLE `recruiting_engineers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `selling_products`
--
ALTER TABLE `selling_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `servicing_orders`
--
ALTER TABLE `servicing_orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
