-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 10, 2023 at 06:39 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_car`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookings_id` int(11) NOT NULL,
  `bookings_status` int(11) NOT NULL,
  `booking_date` date NOT NULL,
  `cars_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `return_date` date NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0-pending, 1-approved, 2-rejected, 3-completed\r\n',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookings_id`, `bookings_status`, `booking_date`, `cars_id`, `customers_id`, `pickup_date`, `return_date`, `message`, `status`, `updated_at`, `created_at`) VALUES
(1, 0, '2023-02-10', 12, 1, '2023-02-11', '2023-02-15', 'Hi', 1, '2023-02-10 18:11:28', '2023-02-10 18:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brands_id` int(11) NOT NULL,
  `brands` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brands_id`, `brands`) VALUES
(1, 'Land Rover'),
(2, 'Audi'),
(3, 'Maruthi'),
(4, 'Toyota'),
(5, 'Mercedes-Benz'),
(6, 'Mahindra'),
(7, 'Hyundai'),
(8, 'TATA');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `cars_id` int(11) NOT NULL,
  `cars_status` int(11) NOT NULL,
  `brands_id` int(11) NOT NULL,
  `car_types_id` int(11) NOT NULL,
  `seat_type` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `price_per_day` varchar(100) NOT NULL,
  `mileage_per_litter` int(100) NOT NULL,
  `fuel_type` varchar(100) NOT NULL,
  `transmission` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `image_2` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`cars_id`, `cars_status`, `brands_id`, `car_types_id`, `seat_type`, `title`, `model`, `number`, `price_per_day`, `mileage_per_litter`, `fuel_type`, `transmission`, `description`, `updated_at`, `created_at`, `image`, `image_2`) VALUES
(1, 0, 5, 1, 4, 'Mercedes Grand Sedan', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 17:58:00', '2023-02-10 17:32:15', 'DcPJiRi4sxA4kawd5iN5UF4Y8Q7AbY2ww2wvRfIP.jpg', NULL),
(2, 0, 1, 1, 4, 'Range Rover', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 17:45:37', '2023-02-10 17:32:15', 'qzF8bvGzQdiRLKyrFC07uhrJjm9duJA7wOAPOdO5.jpg', NULL),
(3, 0, 6, 1, 4, 'Mahindra Thar', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 17:58:58', '2023-02-10 17:32:15', 'CTgkMeWYuf83ubSNu9M0rnXaUwKHs3zQYr1kpaiW.webp', NULL),
(4, 0, 6, 1, 4, 'Mahindra Scorpio-N', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 17:59:07', '2023-02-10 17:32:15', 'QIfRTFRMbzTXfGaw7G7DYdBRr6eekC53f6zvEY22.webp', NULL),
(5, 0, 7, 1, 4, 'Hyundai Creta', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 17:59:53', '2023-02-10 17:32:15', '80lS9ldC9XroYR97QXnfXAEGNJ7u5gdsQNtxbHmH.webp', NULL),
(6, 0, 3, 1, 4, 'Maruti Suzuki Brezza', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 17:51:14', '2023-02-10 17:32:15', '2ohW1o3kgffiKja9TqE2xzjJZutpymq0gc81UXRR.webp', NULL),
(7, 0, 6, 1, 4, 'Mahindra XUV700', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 18:00:00', '2023-02-10 17:32:15', 'aDkYvLKDneqnJCjrh26WQ4IWRkEhug5F5JNx85rJ.webp', NULL),
(8, 0, 3, 1, 4, 'Maruti Suzuki Swift', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 17:52:25', '2023-02-10 17:32:15', 'PThM7wcu5Txh6DedBeXcTDgx6SJpNl9iZHN3wkfs.webp', NULL),
(9, 0, 8, 1, 4, 'Tata Nexon', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 18:00:16', '2023-02-10 17:32:15', 'ferTQMvr0GcsxCnocPqyMGLOE6br08tj3VtaSVMY.webp', NULL),
(10, 0, 4, 1, 4, 'Toyota Innova Hycross', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 18:00:23', '2023-02-10 17:32:15', 'iNRUFEyneUNVA0AuLlvYFaYfkAxAJzVobhRjhJo9.webp', NULL),
(11, 0, 8, 1, 4, 'Tata Punch', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 18:00:28', '2023-02-10 17:32:15', '5Ih4T1g9pGAeoVHJ9ytcICY25XhbXUV2JZFYUCfN.webp', NULL),
(12, 0, 4, 1, 4, 'Toyota Fortuner', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 18:00:35', '2023-02-10 17:32:15', 'ZaOSqzZSMjPdsAbwKCCBGZrIfi5r8zwF8uXQBzVp.webp', NULL),
(13, 1, 1, 1, 4, 'MG Hector', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 18:00:59', '2023-02-10 17:32:15', 'Pnl0qcLe5YeFtmwxbTdrRFAOlWC1mTJBTP6NA7ze.webp', NULL),
(14, 0, 6, 1, 4, 'Mahindra Bolero', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 18:00:46', '2023-02-10 17:32:15', 'OYpYxIO5hoOrDHnf9Jvp09IZTNV9FPtmVlFb3UOA.webp', NULL),
(15, 0, 8, 1, 4, 'Tata Harrier', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 18:00:51', '2023-02-10 17:32:15', 'm5eWw3QBExykMkF6KGJJ5R2ZDNuyiWrO5D1dLZtP.webp', NULL),
(16, 0, 8, 1, 4, 'Tata Altroz', '2020', 'KL13 AG1234', '50', 18, 'Petrol', 'Manual', 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.\r\n\r\nWhen she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.', '2023-02-10 18:00:56', '2023-02-10 17:32:15', 'I49M64sigUutxR51ZVQxsrblYgng4sYMBGqmXRAa.webp', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `car_types`
--

CREATE TABLE `car_types` (
  `car_types_id` int(11) NOT NULL,
  `car_types` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car_types`
--

INSERT INTO `car_types` (`car_types_id`, `car_types`) VALUES
(1, 'SUV'),
(2, 'Sedan'),
(3, 'Hatchback'),
(4, 'Luxury');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customers_id` int(11) NOT NULL,
  `customers_status` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customers_id`, `customers_status`, `date`, `name`, `mobile`, `email`, `password`, `gender`, `created_at`, `updated_at`) VALUES
(1, 0, '2023-02-10', 'Customer', '1234567890', 'customer@gmail.com', '$2y$10$RXzo0ty5yR7yO5Nh.cgURevrC1gV1qMFkyVV24yyHKzXbXIL..tEi', 'Male', '2023-02-10 18:10:24', '2023-02-10 18:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_10_131651_create_bookings_table', 0),
(6, '2023_02_10_131651_create_brands_table', 0),
(7, '2023_02_10_131651_create_car_types_table', 0),
(8, '2023_02_10_131651_create_cars_table', 0),
(9, '2023_02_10_131651_create_customers_table', 0),
(10, '2023_02_10_131651_create_failed_jobs_table', 0),
(11, '2023_02_10_131651_create_password_resets_table', 0),
(12, '2023_02_10_131651_create_personal_access_tokens_table', 0),
(13, '2023_02_10_131651_create_users_table', 0),
(14, '2023_02_10_183245_create_bookings_table', 0),
(15, '2023_02_10_183245_create_brands_table', 0),
(16, '2023_02_10_183245_create_car_types_table', 0),
(17, '2023_02_10_183245_create_cars_table', 0),
(18, '2023_02_10_183245_create_customers_table', 0),
(19, '2023_02_10_183245_create_failed_jobs_table', 0),
(20, '2023_02_10_183245_create_password_resets_table', 0),
(21, '2023_02_10_183245_create_personal_access_tokens_table', 0),
(22, '2023_02_10_183245_create_users_table', 0);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'admin@gmail.com', NULL, '$2y$10$gLQ14rEPZ6bfhk5Fryk6TeQsog2j01s9/JpIbNz13QFRe7TWm22oG', NULL, '2023-02-08 13:13:25', '2023-02-08 13:13:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookings_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brands_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`cars_id`);

--
-- Indexes for table `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`car_types_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customers_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brands_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `cars_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `car_types`
--
ALTER TABLE `car_types`
  MODIFY `car_types_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
