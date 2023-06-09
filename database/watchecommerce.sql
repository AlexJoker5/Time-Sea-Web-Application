-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 05:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watchecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_information`
--

CREATE TABLE `billing_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipCode` varchar(255) NOT NULL,
  `creditCartNo` varchar(255) NOT NULL,
  `creditCartExpireDate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_information`
--

INSERT INTO `billing_information` (`id`, `userId`, `city`, `state`, `zipCode`, `creditCartNo`, `creditCartExpireDate`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Yangon', 'Yangon', '452452', '45245245', NULL, '2023-04-30 11:25:58', '2023-04-30 11:25:58'),
(2, NULL, 'Yangon', 'Yangon', '452452', '45245245', NULL, '2023-04-30 11:26:05', '2023-04-30 11:26:05'),
(3, NULL, 'Hakha', 'Chin', '51321343', '4342312', NULL, '2023-04-30 11:30:32', '2023-04-30 11:30:32'),
(4, 1, 'Hakha', 'Chin', '4552542', '4524524', NULL, '2023-04-30 11:35:22', '2023-04-30 11:35:22'),
(5, 1, 'Hakha', 'Yangon', '45245', '4524524', NULL, '2023-04-30 11:36:19', '2023-04-30 11:36:19'),
(6, 1, 'Hakha', 'Yangon', '45245', '4524524', NULL, '2023-04-30 11:36:34', '2023-04-30 11:36:34'),
(7, 1, 'Yangon', 'adsfdsf', '563434', '453453', NULL, '2023-04-30 12:56:42', '2023-04-30 12:56:42'),
(8, 1, 'Yangon', 'Yangon', '63453', '43453', '2023-12-23', '2023-04-30 12:57:53', '2023-04-30 12:57:53'),
(9, 1, 'Yangon', 'Yangon', '24525', '42452', '12/23', '2023-04-30 13:02:17', '2023-04-30 13:02:17'),
(10, 1, 'Yangon', 'Chin', '531232', '313123123', NULL, '2023-05-01 06:18:46', '2023-05-01 06:18:46'),
(11, 1, 'Yangon', 'Chin', '531232', '313123123', NULL, '2023-05-01 06:20:21', '2023-05-01 06:20:21'),
(12, 1, 'Yangon', 'Chin', '531232', '313123123', NULL, '2023-05-01 06:20:21', '2023-05-01 06:20:21'),
(13, 1, 'Yangon', 'Chin', '531232', '313123123', NULL, '2023-05-01 06:20:33', '2023-05-01 06:20:33'),
(14, 1, 'Mingyi', 'Haha', '2123', '12312', '55/8', '2023-05-01 09:51:18', '2023-05-01 09:51:18'),
(15, 1, 'Hakha', 'Haha', '111', '111', '12/35', '2023-05-01 09:54:54', '2023-05-01 09:54:54'),
(16, 1, 'Yangon', 'Chin', '444', '444', '55/22', '2023-05-01 09:58:27', '2023-05-01 09:58:27'),
(17, 1, 'Yangon', 'Chin', '444', '444', '55/22', '2023-05-01 09:59:48', '2023-05-01 09:59:48'),
(18, 1, 'Yangon', 'Yangon', '999', '9999', '89687', '2023-05-01 10:00:20', '2023-05-01 10:00:20'),
(19, 1, 'Yangon', 'Yangon', '999', '9999', '89687', '2023-05-01 10:07:28', '2023-05-01 10:07:28'),
(20, 1, 'Yangon', 'Yangon', '999', '9999', '89687', '2023-05-01 10:07:28', '2023-05-01 10:07:28'),
(21, 4, 'Yangon', 'Yangon', '23522', '22616', '23/22', '2023-05-03 07:42:17', '2023-05-03 07:42:17'),
(22, 4, 'Yangon', 'Yangon', '23522', '22616', '23/22', '2023-05-03 07:44:01', '2023-05-03 07:44:01'),
(23, 4, 'Yangon', 'Yangon', '24213', '32313', '23/22', '2023-05-03 07:46:05', '2023-05-03 07:46:05'),
(24, 4, 'Yangon', 'Yangon', '24213', '32313', '23/22', '2023-05-03 07:47:00', '2023-05-03 07:47:00'),
(25, 4, 'Yangon', 'Yangon', '24213', '32313', '23/22', '2023-05-03 07:47:01', '2023-05-03 07:47:01'),
(26, 4, 'Yangon', 'Yangon', '24213', '32313', '23/22', '2023-05-03 07:49:29', '2023-05-03 07:49:29'),
(27, 5, 'Yangon', 'Yangon', '5432', '1313213', '12/23', '2023-05-03 08:14:04', '2023-05-03 08:14:04'),
(28, 7, 'Yangon', 'Yangon', '134563', '653153', '12/19', '2023-05-03 08:26:22', '2023-05-03 08:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `watch_id` bigint(20) UNSIGNED NOT NULL,
  `totalCost` decimal(8,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `watch_id`, `totalCost`, `quantity`, `created_at`, `updated_at`) VALUES
(57, 3, 9, 102.00, 1, '2023-05-03 06:48:57', '2023-05-03 06:55:31'),
(62, 3, 7, 14.00, 1, '2023-05-03 06:55:11', '2023-05-03 06:55:11'),
(63, 3, 4, 28.00, 1, '2023-05-03 06:55:24', '2023-05-03 06:55:24'),
(68, 1, 1, 12.00, 1, '2023-05-03 07:31:58', '2023-05-03 07:31:58'),
(69, 1, 3, 12.00, 1, '2023-05-03 07:32:08', '2023-05-03 07:32:08'),
(78, 4, 2, 81.00, 1, '2023-05-03 07:49:58', '2023-05-03 07:49:58'),
(79, 4, 3, 12.00, 1, '2023-05-03 07:50:19', '2023-05-03 07:50:19');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billingId` bigint(20) UNSIGNED NOT NULL,
  `chartId` bigint(20) UNSIGNED NOT NULL,
  `dateIssued` date NOT NULL,
  `totalCost` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` decimal(8,2) NOT NULL DEFAULT 0.00,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_14_083729_create_billing_information_table', 1),
(6, '2023_04_14_084046_create_invoices_table', 1),
(7, '2023_04_14_084440_create_watches_table', 1),
(8, '2023_04_14_084854_create_charts_table', 1),
(9, '2023_04_17_150834_create_carousels_table', 2),
(10, '2023_04_29_120337_create_carts_table', 3),
(11, '2023_04_30_175618_create_payment_table', 4),
(12, '2023_04_30_182139_drop_and_recreate_carts_table', 4),
(13, '2023_04_30_182502_create_carts_table', 4);

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subTotal` decimal(8,2) NOT NULL DEFAULT 0.00,
  `tax` int(11) NOT NULL DEFAULT 5,
  `total` decimal(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `subTotal`, `tax`, `total`, `created_at`, `updated_at`) VALUES
(16, 1, 24.00, 5, 22.80, '2023-05-01 08:50:20', '2023-05-03 07:32:08'),
(17, 3, 144.00, 5, 136.80, '2023-05-03 06:39:46', '2023-05-03 06:55:31'),
(18, 4, 93.00, 5, 88.35, '2023-05-03 07:39:20', '2023-05-03 07:50:53'),
(19, 5, 273.00, 5, 259.35, '2023-05-03 07:59:00', '2023-05-03 08:00:29'),
(20, 7, 183.00, 5, 173.85, '2023-05-03 08:24:21', '2023-05-03 08:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNo` varchar(255) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phoneNo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'daniel', 'danielzcthang2002@gmail.com', NULL, '$2y$10$4ErY3szW6yPCLDIOLCV.LeT7ua4bSqq8xP2IboKhRPb34LAmMrY.S', '0', NULL, '2023-04-16 07:35:41', '2023-04-16 07:35:41'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$BpX6v0DLT.n4NeHUC1/I/.YiOTf0hcrayRhTbl8RNcGDZHlCKBtuO', '09971058319', NULL, '2023-04-29 06:56:07', '2023-04-29 06:56:07'),
(3, 'daniel', 'daniel@gmail.com', NULL, '$2y$10$I0JeNSL9GSBcIizIXLxTnes6WGjdMkuGkMgz2p8gJ1cZ.1t1idDpS', '0913653', NULL, '2023-05-03 06:36:05', '2023-05-03 06:36:05'),
(4, 'Daniel', 'danielzct@gmail.com', NULL, '$2y$10$CVjgQzqxGDFg390xA/4XTeoqQJbISbKuwKJMwTsNNp.ORzBqMru8K', '0913946556', NULL, '2023-05-03 07:37:41', '2023-05-03 07:37:41'),
(5, 'Daniel', 'danielzct2002@gmail.com', NULL, '$2y$10$ifHAP9zBZ9Sr8J93vQ7B..eEy/VHDnwsviAnAK5Dn5De887GAjo1S', '0922346515', NULL, '2023-05-03 07:57:28', '2023-05-03 07:57:28'),
(6, 'Daniel', 'danielz@gmail.com', NULL, '$2y$10$U7751eexQu3nGHwbp6m2ze.X6gk9kUDhuo1lP2NEUXwojAwgoV8Km', '0926456236', NULL, '2023-05-03 08:16:43', '2023-05-03 08:16:43'),
(7, 'Daniel', 'danielzct202@gmail.com', NULL, '$2y$10$x6I219MOMXgGTPYQ0lLoV.AerwrETMe84L5k7se5SianjF9xBX3kC', '0921455424', NULL, '2023-05-03 08:22:26', '2023-05-03 08:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `watches`
--

CREATE TABLE `watches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `serialName` varchar(255) NOT NULL,
  `category` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`category`)),
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL,
  `shortDescription` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `madeIn` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `releasedDate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `watches`
--

INSERT INTO `watches` (`id`, `serialName`, `category`, `featured`, `price`, `shortDescription`, `image`, `madeIn`, `company`, `releasedDate`, `created_at`, `updated_at`) VALUES
(1, 'OLEVS \n5885-3', '{\"recommend\": 1,\"new_arrival\":0,\"bestseller\":1,\"on_sale\":1}', 1, 12, 'Luxury Brand OLEVS 5885 Men Business Wrist Watch Men Fashion Business Chronograph Quartz Watch Supplier in China', 'images/1.webp', 'China', 'Huizhou Tengniu Trading Co., Ltd.\n', '2019-04-17', NULL, NULL),
(2, 'OBLVLO \nCM', '{\"recommend\": 1,\"new_arrival\":1,\"bestseller\":0,\"on_sale\":1}', 0, 81, 'Waterproof Leather Strap Stainless Steel Luxury Famous Brand Sapphire Fully Automatic Mechanical Watches', 'images/2.webp', 'China', 'Dongguan Pengyi Watch Factory', '2023-02-22', NULL, NULL),
(3, 'Scottie 3016B Silicone ', '{\"recommend\": 1,\"new_arrival\":0,\"bestseller\":1,\"on_sale\":0}', 0, 12, 'Scottie Wholesale Custom Logo Fashion silicone wrist waterproof watches men unique quartz watch for men', 'images/3.webp', 'China', 'Guangzhou Yuboya Watch Co., Ltd.', '2020-07-17', NULL, NULL),
(4, 'OEM W015C', '{\"recommend\": 1,\"new_arrival\":1,\"bestseller\":0,\"on_sale\":1}', 0, 28, '1.72inch IPS smart watch Android IOS IP68 waterproof Heart Rate Tracker Blood Pressure Oxygen Sport Smartwatch', 'images/4.webp', 'Guangdong, China', 'Sharetronic Data Technology Co., Lt', '2018-08-09', NULL, NULL),
(5, 'Fairwhale 5530', '{\"recommend\": 0,\"new_arrival\":0,\"bestseller\":1,\"on_sale\":0}', 0, 20, 'Luxury TOP Rubber Chronograph men Watch Super Luminous out door Sports Wrist Watch Quartz Men Watches', 'images/5.webp', 'Guangdong, China', 'Guangzhou Niheng Science And Technology Co., Ltd.', '2016-02-04', NULL, NULL),
(6, 'PGSS-280', '{\"recommend\": 0,\"new_arrival\":0,\"bestseller\":1,\"on_sale\":1}', 1, 9, 'Light luxury style Mineral Tempered Glass Mirror Surface Waterproof Stainless Steel Back Watch For Masculinity', 'images/6.webp\r\n', 'Guangdong, China', 'Guangdong Keweichuang Information Technology Co., Ltd.\r\n', '2022-04-11', NULL, NULL),
(7, 'GOTMUZE ZL54', '{\"recommend\": 1,\"new_arrival\":0,\"bestseller\":0,\"on_sale\":1}', 0, 14, 'GOTMUZE ZL54 Wholesale IP67 Smartwatch Calling Smart Watch For Men Blood Pressure Music Control 1.83 inch Android Smart Watch', 'images/7.webp', 'China', 'Guangzhou Shiyi Watch Co., Ltd.', '2017-10-11', NULL, NULL),
(8, 'OEM/ODM S5 2.0', '{\"recommend\": 0,\"new_arrival\":1,\"bestseller\":1,\"on_sale\":0}', 1, 10, '2023 OEM IP68 Waterproof Smart Bracelet heart rate monitor pedometer bracelet GPS Fitness Tracker Health Sport Watch', 'images/8.webp', 'Guangdong, China', 'Shenzhen Starmax Technology Co., Ltd', '2014-02-08', NULL, NULL),
(9, 'AKIRES GM2009', '{\"recommend\": 1,\"new_arrival\":1,\"bestseller\":0,\"on_sale\":1}', 0, 102, 'Luxury Brand Men 20ATM Tuna Dive Watch Waterproof Dive Watch 316 Stainless Steel Automatic Mechanical Watches Men for Diving', 'images/9.webp', 'France', 'Grace Clock & Watch Co., Ltd.', '2020-01-11', NULL, NULL),
(10, 'AKIRES 2012', '{\"recommend\": 0,\"new_arrival\":0,\"bestseller\":1,\"on_sale\":1}', 0, 120, 'Tuna NH 36 automatic watch 100 meters diver mechanical watch customized logo for men low moq', 'images/10.webp', 'France', 'Grace Clock & Watch Co., Ltd.', '2016-04-11', NULL, NULL),
(11, 'MIYOTA GFL-CT01', '{\"recommend\": 1,\"new_arrival\":0,\"bestseller\":0,\"on_sale\":1}', 0, 224, '2021 Hip Hop Luxury CZ stones watch Iced Out Gold Plated Stainless Steel Diamond Watch for men', 'images/11.webp', 'Germany', 'Gezfeel Watch Co., Ltd.', '2017-04-29', NULL, NULL),
(12, 'Smart Watches GT8', '{\"recommend\": 0,\"new_arrival\":1,\"bestseller\":1,\"on_sale\":0}', 0, 31, 'Hot Selling Large Screen Watch Voice Assistant Heart Rate Offline Bluetooth Call Watch', 'images/12.webp\r\n', 'Germany', 'Ningbo Beidao E-Commerce Co., Ltd.', '2019-07-24', NULL, NULL),
(13, 'MIYOTA SL68', '{\"recommend\": 0,\"new_arrival\":1,\"bestseller\":1,\"on_sale\":0}', 1, 16, 'Men\'s Sports Wooden Quartz Watch Personality Fashion Watch rend Large Disc Business Wood Watch', 'images/13.webp', 'China', 'Ningbo Beidao E-Commerce Co., Ltd.', '2023-04-01', NULL, NULL),
(14, 'TPW K3100', '{\"recommend\": 1,\"new_arrival\":1,\"bestseller\":0,\"on_sale\":1}', 0, 3, 'relojes de lujo para mujer custom minimalist quartz wrist watch women orologio donna', 'images/14.webp', 'China', 'Shenzhen Kastar Timepieces Co., Ltd.', '2015-06-09', NULL, NULL),
(15, 'TIME TOKEN TT7028G-1', '{\"recommend\": 0,\"new_arrival\":0,\"bestseller\":1,\"on_sale\":1}', 0, 47, 'TIME TOKEN Business Hallow Out Skeleton Wristwatch Stainless Steel Case Mechanical Automatic Watches for Men', 'images/15.webp', 'China', 'Timetoken Watch Jewelry (dongguan) Co., Ltd.', '2017-08-23', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_information`
--
ALTER TABLE `billing_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_watch_id_foreign` (`watch_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `watches`
--
ALTER TABLE `watches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_information`
--
ALTER TABLE `billing_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `watches`
--
ALTER TABLE `watches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_watch_id_foreign` FOREIGN KEY (`watch_id`) REFERENCES `watches` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
