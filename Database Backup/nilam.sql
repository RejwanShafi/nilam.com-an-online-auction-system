-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 06:12 AM
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
-- Database: `nilam`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction_items`
--

CREATE TABLE `auction_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `starting_price` decimal(18,2) NOT NULL,
  `current_bid` decimal(18,2) DEFAULT NULL,
  `end_time` datetime NOT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 3 COMMENT '1 : Sold | 2 : Approved | 3: Waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_items`
--

INSERT INTO `auction_items` (`id`, `title`, `description`, `starting_price`, `current_bid`, `end_time`, `seller_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Toyota LandCruiser 300 (LC300)', 'The 2022 Toyota Land Cruiser 300 armored all-wheel drive SUV is available to order. 10-speed automatic transmission, 3.5 liter (V6) gasoline engine, 409 hp. Dimensions: 4970 x 2006 x 1930 mm, wheelbase: 2844 mm.   Armor level: BR6 Engine bay armoring  Entire perimeter protection of the passenger compartment  Protection for battery and electronic control module  Reinforced door hinges and other critical structure points  Reinforced suspension  Runflat devices Light-weight armoring package Siren/PA/Intercom system Heavy duty brake system and components Emergency lights system Fire suppression system Heavy duty wheels The Toyota Land Cruiser 300 withstands the toughest situations and most challenging terrain, providing unmatched mobility in the field. Armoured to BR6 level, the Toyota Land Cruiser provides 360-degree protection from high-powered assault rifles and blasts up to two DM51 hand grenades.', 5000000.00, 5000000.00, '2024-09-21 07:57:00', 5, '2024-09-13 19:57:48', '2024-09-13 19:57:48', 2),
(3, 'House [10 Khata]', 'House with 10,000 Sqft  4 bedroom  4 bathroom  Almost new house with 10 khata land  Location: Green Road Green Garden Private Area', 35000000.00, 35000000.00, '2024-09-20 08:35:00', 3, '2024-09-13 20:35:41', '2024-09-13 22:04:31', 2),
(5, '2003 Toyota Spacio Octane Fresh Condition', 'The Spacio comes with the seal of reliability that is the hallmark of all Toyota vehicles.A proper maintenance cycle can ensure that the Spacio can last for many years without issues. Furthermore, the vehicle is relatively easy and inexpensive to maintain.Toyota balances dependable vehicles with innovative technology, though this may affect long-term reliability.  Brand: Toyota Model: Spacio Trim / Edition: G  Year of Manufacture:2005 Registration year:2009 Condition: Used Transmission: Automatic Body type: Estate Fuel type: Octane Engine capacity:1,500 cc Kilometers run: 56320 km  Options :All Option Auto, Fresh interior, Built-in super original sound system. Original headlight and backlight with Fog lamp. Excellent AC Performance. Engine condition Suspension is also good, EBD, 4 Air Bag, 4 ABS,2 Disk Brake. Tilt Power Steering. Central Lock, UVS & Tempered Glass. Super performance engine. Disk Brake. Central Lock. Original Japanese Toyota Rim With New Tire, No any accidental history. All Papers are up-to-date. No need for any work & Just Buy And drive. Note If you want to check anything you can take this car to any automobile analyzing center.', 850000.00, NULL, '2024-09-16 08:39:00', 3, '2024-09-13 20:40:04', '2024-09-13 22:04:32', 2),
(6, 'Sea painting', 'Acrylic painting Canvus 30/40', 6130.00, NULL, '2024-09-16 08:41:00', 5, '2024-09-13 20:43:49', '2024-09-13 22:04:33', 2),
(7, 'IELTS Book', 'IELTS Academic Book List  1.Cambridge lelts Academic official practice Book 9-18 with answer  2.Cambridge lelts Academic practice book Bangla solution and Explanation  3.Makkar lelts writing  Rachel Mitchell speaking, reading, writing and listening strategy  Cambridge lelts consultants Band 9   6.Simon Reading, writing and speaking  7.Tarik Hasan secret band 8 Speaking, writing, reading and listening   2 Box speaking qué card  Location: House no 23, Road 16 Sector 12 Uttara Dhaka 1230. Contact number:[hidden information] price Negotiable.', 1300.00, NULL, '2024-09-21 08:56:00', 3, '2024-09-13 20:56:24', '2024-09-13 20:56:54', 2);

-- --------------------------------------------------------

--
-- Table structure for table `auction_item_category`
--

CREATE TABLE `auction_item_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_item_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auction_item_category`
--

INSERT INTO `auction_item_category` (`id`, `auction_item_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 3, 9, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 3, NULL, NULL),
(7, 7, 2, NULL, NULL);

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Vehicles', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(2, 'Book', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(3, 'Painting', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(4, 'Sculpture', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(5, 'Gemstone', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(6, 'Jewellery', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(7, 'Furniture', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(8, 'Collectibles', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(9, 'Real Estates', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(10, 'Tickets', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(11, 'Cloth', '2024-09-14 01:54:35', '2024-09-14 01:54:35'),
(12, 'Technology', '2024-09-14 01:54:35', '2024-09-14 01:54:35');

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
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `auction_item_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `auction_item_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, '/storage/auction_images/cDQ8RMbWb8mzvotYrEhB8yFv0B6iNdIiwoITTeWQ.jpg', '2024-09-13 19:57:49', '2024-09-13 19:57:49'),
(2, 1, '/storage/auction_images/rDTCS0siz9tvoufDfKfAVQTc3QwhaZodsUkl8I6V.jpg', '2024-09-13 19:57:49', '2024-09-13 19:57:49'),
(3, 1, '/storage/auction_images/3EbWwMWqAmeNrYNIJh5FrlfFCFue5qMJOmtgMCXh.jpg', '2024-09-13 19:57:49', '2024-09-13 19:57:49'),
(7, 3, '/storage/auction_images/qq6NbVFXCM5sRmRcpRxQaPM6yZGgCQLQaeats7tH.png', '2024-09-13 20:35:41', '2024-09-13 20:35:41'),
(8, 3, '/storage/auction_images/R2AwoRaqfW4a5SOWkjpcoZsrNyo7dLDPD7y9RXMa.png', '2024-09-13 20:35:41', '2024-09-13 20:35:41'),
(9, 3, '/storage/auction_images/7VEORxczHjwt0o1ah8swonW3OrZfslqyf3APxNk7.png', '2024-09-13 20:35:41', '2024-09-13 20:35:41'),
(11, 5, '/storage/auction_images/bjrr7PtGds59cMdrKCNAtK3wyrXClvoK1DQaCLEJ.png', '2024-09-13 20:40:04', '2024-09-13 20:40:04'),
(12, 6, '/storage/auction_images/lhsnL53SX7l6PytK8krm7ghodl2s4WDPRprjp7Ko.jpg', '2024-09-13 20:43:49', '2024-09-13 20:43:49'),
(13, 7, '/storage/auction_images/4cRkZOVMq6B7o8mhXXntFWgP8k0SjYcAsChIqolj.png', '2024-09-13 20:56:24', '2024-09-13 20:56:24');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_06_125533_create_google_id', 1),
(5, '2024_09_06_125641_add_avatars_to_users', 1),
(6, '2024_09_11_190636_create_auctions_table', 1),
(7, '2024_09_13_170855_add_status_to_auction_items_table', 1),
(8, '2024_09_13_172827_create_auction_item_category_table', 1),
(9, '2024_09_13_173235_create_auction_item_images', 1);

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
('tELJnwEyUzrBZXkBpGopYjR0GJ5XIfOmebBSUP1P', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMDZxYkcyeHJlUEV6cTFYbDFBc3RzTG8zZ1BhVmtzWTRIUDlTTHhSRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1726286650),
('W6yTDB5J7cLAfQVCCLYxrRApy5fttrlzCqOdl1gA', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 Edg/128.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQmJrMURGZE0wTGpHb3JNdm5GY1hCU1VPNEt5cmhwamw2dXlJcHcxWiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hdWN0aW9uLWFwcHJvdmUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1726286825);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 3 COMMENT '1 : Seller | 2 : Admin | 3: Normal',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `google_id`, `avatar`) VALUES
(1, 'Rejwan', NULL, 'rejwanshafi.study@gmail.com', NULL, '$2y$12$.dVTihhL81kCrOTZGSClbuhew2.A73INhhwbbnTj5lYKYOnUYUO82', 3, NULL, '2024-09-13 19:50:42', '2024-09-13 19:50:42', 'ya29.a0AcM612zpUT6z1QZrW7nKPXEmHD6Av3VFZnaySu9uarcpA-B76aTH5KQLY-z__MSLRPYf6RIGqak72CX-_PMLz2TghbgZaH07I7UpXDbIkEJDPeBdChLRJDZ8t7_1_r9hwmhsqcMMG3QGBjQEy4N8rd-VnOj-3Bn6rC8j-reIaCgYKAWQSARASFQHGX2MiMqHvvKsSWjZQTpF7IB73vw0175', 'https://lh3.googleusercontent.com/a/ACg8ocKAakmiZggQtX9DDgi1pl9RaHJWCPmeE8hGIjCo8GkWtso53w=s96-c'),
(2, 'Rejwan Shafi', 'Rejwan', 'rejwan.shafi@gmail.com', NULL, '$2y$12$i3j.skCa2KpyVqlUc/xqq.h9RnshWIc9mZHlpbdPCh4GpsmcL3stS', 2, NULL, '2024-09-13 19:51:04', '2024-09-13 19:51:04', NULL, NULL),
(3, 'Sopnil Roy Niloy', 'Niloy', 'niloy@gmail.com', NULL, '$2y$12$oSUPdmGmvfJQKmNz/nXmFuhXuJomJAUKO/i5oQH7ARS2qM7PVeXx2', 1, NULL, '2024-09-13 19:51:27', '2024-09-13 19:51:27', NULL, NULL),
(4, 'Afif Rayhan Pranto', 'Pranto', 'pranto@gmail.com', NULL, '$2y$12$1bfEiljXPsKTRwytT/gx.OXs7tU7AOeD.G7fkVWFrBFYSRgjZV7V.', 3, NULL, '2024-09-13 19:51:46', '2024-09-13 19:51:46', NULL, NULL),
(5, 'Homairah Ferdousia', 'Homaira', 'homaira@gmail.com', NULL, '$2y$12$yc.xJ8gIgyX5c7hK0/243eFB/oJfOXTrIRt7yMAgi8eIkFQ9e8a86', 1, NULL, '2024-09-13 19:53:01', '2024-09-13 19:53:01', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction_items`
--
ALTER TABLE `auction_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auction_items_seller_id_foreign` (`seller_id`);

--
-- Indexes for table `auction_item_category`
--
ALTER TABLE `auction_item_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auction_item_category_auction_item_id_foreign` (`auction_item_id`),
  ADD KEY `auction_item_category_category_id_foreign` (`category_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_auction_item_id_foreign` (`auction_item_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `auction_items`
--
ALTER TABLE `auction_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `auction_item_category`
--
ALTER TABLE `auction_item_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction_items`
--
ALTER TABLE `auction_items`
  ADD CONSTRAINT `auction_items_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auction_item_category`
--
ALTER TABLE `auction_item_category`
  ADD CONSTRAINT `auction_item_category_auction_item_id_foreign` FOREIGN KEY (`auction_item_id`) REFERENCES `auction_items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auction_item_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_auction_item_id_foreign` FOREIGN KEY (`auction_item_id`) REFERENCES `auction_items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
