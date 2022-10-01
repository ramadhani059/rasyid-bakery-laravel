-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 06:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rasyid_bakery`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_category_original` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_category_encrypted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_product` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `img_category_original`, `img_category_encrypted`, `nama_kategori`, `slug`, `jumlah_product`, `created_at`, `updated_at`) VALUES
(1, 'donat-coklat-keju.jpeg', 'QIG2SNsBru3JEEbGgFiXjF2otz6aREkpGAWRVszv.jpg', 'Donats', 'donats', 5, NULL, '2022-01-22 12:43:09'),
(2, 'Roti bantal abon - 13000.png', 'FGNt0gMtc0MYIamnO6bKwQB2jUjLNDtdTAKklIaI.png', 'Roti Jumbo', 'roti-jumbo', 4, '2022-01-22 12:43:39', '2022-01-22 12:43:39'),
(3, 'Black Forest Pudding -15000.png', 'KGIJh35YifKVCe7JICJ7vkbsWqIUC8in2z8GAHe7.png', 'Pudding', 'pudding', 4, '2022-01-22 13:13:18', '2022-01-22 13:13:18'),
(4, 'Roti tawar chocochip - 15000.png', 'IAUJCFDx2MupWjewUIabgO3UpGud5eUvcCVyHfjp.png', 'Roti Tawar', 'roti-tawar', 4, '2022-01-22 22:16:32', '2022-01-22 22:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Pratama Ramadhani Wijaya', 'pratamaramadhani059@gmail.com', 'Pesan Donat Coklat Keju 50 Porsi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tempor ornare ipsum eget fermentum. Aliquam rutrum ultrices malesuada. Fusce dapibus gravida ex, eu gravida tellus imperdiet id. Proin lacus sapien, tincidunt ut imperdiet ac, cursus id nunc. Curabitur ullamcorper tempus erat, quis lacinia est facilisis id. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nunc imperdiet laoreet nunc. Vestibulum eu diam interdum, pretium justo vel, efficitur massa. Donec ut posuere velit. Donec aliquet, dolor viverra pharetra imperdiet, tellus eros ultricies justo, at faucibus lorem leo sed sem. Proin placerat rutrum justo, vel sollicitudin nibh ultricies ac. Ut varius mauris a magna blandit mollis.', NULL, NULL);

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
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_01_15_182741_create_messages_table', 1),
(5, '2022_01_16_105622_create_categories_table', 1),
(6, '2022_01_16_105802_create_products_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img_product_original` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_product_encrypted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_product` int(11) NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `img_product_original`, `img_product_encrypted`, `nama_product`, `harga_product`, `categorie_id`, `created_at`, `updated_at`) VALUES
(1, 'donat coklat keju.jpg', '43sGseHnr9fPqjAKauDogPViHQ4ThJEVs29IEBmk.jpg', 'Donat Coklat Keju', 5000, 1, NULL, '2022-01-22 12:42:29'),
(2, 'Roti jumbo coklat - 10000.png', 'C61hB8eocohDqvEiabjD6ExmLlqYdmCyx4c9515w.png', 'Roti Jumbo Coklat', 10000, 2, '2022-01-22 12:44:06', '2022-01-22 12:44:06'),
(3, 'Roti Prambanan - 15000.png', 'OKV5i6nDqlP4glqmuEqwvFZrOAT17813M2wL6iQi.png', 'Roti Prambanan', 15000, 2, '2022-01-22 12:44:30', '2022-01-22 12:44:30'),
(4, 'Roti Sobek - 10000.png', 'B3ZwBpri5YPIlSSfsEhpmlWVp0mOtbbsDi1Vqlpv.png', 'Roti Sobek', 10000, 2, '2022-01-22 12:44:56', '2022-01-22 12:44:56'),
(5, 'Donat Coklat Kacang - 5000.png', 'DFVGcCEOL1uavZbuABZHg9Ko80Lj0bjSUINA3lRT.png', 'Donat Coklat Kacang', 5000, 1, '2022-01-22 12:45:52', '2022-01-22 12:45:52'),
(6, 'Donat Coklat Mente - 5000.png', 'iFWhsotU52ZZcoElr0Ec7aJjSGWHVS32goP3kzQ8.png', 'Donat Coklat Mente', 5000, 1, '2022-01-22 12:46:16', '2022-01-22 12:46:16'),
(7, 'Donat Gula - 3500.png', 'gAEbafFu4gDS3uramL0UjeEPH2GcDgfKDPtcif4i.png', 'Donat Gula', 3500, 1, '2022-01-22 12:46:39', '2022-01-22 12:46:39'),
(8, 'Coffee Latte Pudding - 15000.png', 'FI5JZLukrY5lFP6V1cj83s0TbK8J1lrAeNXpLiyX.png', 'Coffee Latte Pudding', 15000, 3, '2022-01-22 13:13:51', '2022-01-22 13:13:51'),
(9, 'Tropical Pudding - 15000.png', 'MUO6BsfIfzf5H8Ca8gDj6jmKvQcLVJ3bU95uX2VT.png', 'Tropical Pudding', 15000, 3, '2022-01-22 22:15:21', '2022-01-22 22:15:21'),
(10, 'Roti tawar chocochip - 15000.png', 'ffxrDboMeHPitHRUrjBi6HNIwHICOPRCdn6WJQn2.png', 'Roti Tawar Chocochip', 15000, 4, '2022-01-22 22:17:30', '2022-01-22 22:17:30'),
(11, 'Roti Tawar Gandum - 11000.png', 'vECvNZ45lZxGUZJg8VWN7BHfJ2W2oipwGOdn28OX.png', 'Roti Tawar Gandum', 11000, 4, '2022-01-22 22:18:42', '2022-01-22 22:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_user_original` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_user_encrypted` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `img_user_original`, `img_user_encrypted`, `email_verified_at`, `password`, `position`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ramadhani059', 'Pratama Ramadhani Wijaya', 'pratamaramadhani059@gmail.com', 'rama.jfif', 'nufNfm6Lb21CLr2hmoFQgKqHN6ZKYbOCHEWTEV2W.jpg', NULL, '$2y$10$K/Ca2mcNHW3.eVgp7NjfB.tcp/qZPqiUJ1KH1K5ezClixRLeu5giu', 'Owner', NULL, NULL, '2022-01-22 12:45:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_nama_kategori_unique` (`nama_kategori`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD KEY `products_categorie_id_foreign` (`categorie_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
