-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2025 at 07:52 PM
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
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `position` varchar(50) NOT NULL DEFAULT 'sidebar',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `image`, `url`, `position`, `is_active`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(7, 'PLN', '1748863766_right1.jpg', 'https:', 'footer', 1, '2025-06-03', '2025-06-27', '2025-06-02 04:29:26', '2025-06-02 04:29:26'),
(8, 'sampo', '1748937387_gambar pengadaan dan persiapan bahan makanan.jpg', 'https:', 'footer', 1, '2025-06-03', '2025-06-30', '2025-06-03 00:56:27', '2025-06-03 00:56:27'),
(9, 'sabun', '1748937500_WhatsApp Image 2024-09-23 at 14.05.38_8d2328d8.jpg', 'https:', 'footer', 0, '2025-06-04', '2025-06-04', '2025-06-03 00:58:20', '2025-06-03 02:45:04'),
(10, 'sikat gigi', '1748943538_WhatsApp Image 2024-09-26 at 12.05.48_79eaa763.jpg', 'https:', 'footer', 0, '2025-06-04', '2025-06-05', '2025-06-03 02:38:58', '2025-06-03 02:38:58'),
(11, 'left', '1748944790_WhatsApp Image 2024-09-26 at 12.05.42_54c2da1c.jpg', 'https:', 'left', 1, '2025-06-03', '2025-06-03', '2025-06-03 02:59:50', '2025-06-03 02:59:50'),
(12, 'right', '1748944828_WhatsApp Image 2024-09-26 at 12.05.46_b19f7bcf.jpg', 'https:', 'right', 1, '2025-06-03', '2025-06-03', '2025-06-03 03:00:28', '2025-06-03 03:00:28'),
(13, 'header', '1748953002_WhatsApp Image 2024-09-26 at 12.05.53_094900ec.jpg', 'https:', 'header', 1, '2025-06-03', '2025-06-03', '2025-06-03 05:16:42', '2025-06-03 05:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE `clicks` (
  `id` int(11) NOT NULL,
  `element` varchar(100) DEFAULT NULL,
  `count` int(11) DEFAULT 1,
  `clicked_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(5, '2024_10_29_191102_create_posts_table', 1),
(6, '2024_10_29_225305_create_options_table', 1),
(7, '2024_10_30_012814_create_category_table', 1),
(8, '2024_10_30_013131_create_category_post_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_author_id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `post_description` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(100) NOT NULL DEFAULT '',
  `main_categories` varchar(255) NOT NULL DEFAULT '',
  `sub_categories` varchar(255) DEFAULT NULL,
  `more` varchar(255) DEFAULT NULL,
  `post_status` enum('populer','standart','hot news') NOT NULL DEFAULT 'standart',
  `views` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_author_id`, `post_title`, `post_url`, `post_description`, `post_content`, `post_image`, `main_categories`, `sub_categories`, `more`, `post_status`, `views`, `created_at`, `updated_at`) VALUES
(8, 3, 'japan', 'https:', 'fadillah', 'oj', '1748378081_WhatsApp Image 2024-09-23 at 14.05.38_8d2328d8.jpg', 'Seputar Riau', 'Kabupaten Rokan Hulu', 'Olahraga', 'standart', NULL, '2025-05-27 13:34:41', '2025-06-07 05:49:11'),
(9, 3, 'Artikel Ke-1 tentang Teknologi', 'artikel-ke-1-teknologi', 'Ini adalah deskripsi singkat untuk artikel ke-1 tentang teknologi.', 'Artikel Ke-1 tentang Teknologi ini membahas berbagai hal terkait teknologi.\r\n\r\nTopik yang diangkat akan membantu pembaca memahami lebih jauh mengenai aspek-aspek penting dalam teknologi, termasuk tips, tren, dan pembaruan terbaru di bidang tersebut.', '1748427546_WhatsApp Image 2024-09-26 at 12.06.06_f0dea1d0.jpg', 'Nasional', NULL, 'Agama', 'populer', NULL, '2025-05-28 03:19:06', '2025-05-28 03:19:06'),
(10, 3, 'Artikel Ke-2 tentang Kesehatan', 'artikel-ke-2-kesehatan', 'Ini adalah deskripsi singkat untuk artikel ke-2 tentang kesehatan.', 'Artikel Ke-2 tentang Kesehatan ini membahas berbagai hal terkait kesehatan.\r\n\r\nTopik yang diangkat akan membantu pembaca memahami lebih jauh mengenai aspek-aspek penting dalam kesehatan, termasuk tips, tren, dan pembaruan terbaru di bidang tersebut.', '1748427682_WhatsApp Image 2024-09-26 at 12.06.13_7f100bcb.jpg', 'Seputar Riau', 'Kota Pekanbaru', 'Olahraga', 'hot news', NULL, '2025-05-28 03:21:22', '2025-05-28 03:21:22'),
(11, 3, 'Artikel Ke-3 tentang Pendidikan', 'artikel-ke-3-pendidikan', 'Ini adalah deskripsi singkat untuk artikel ke-3 tentang pendidikan.', 'Artikel Ke-3 tentang Pendidikan ini membahas berbagai hal terkait pendidikan.\r\n\r\nTopik yang diangkat akan membantu pembaca memahami lebih jauh mengenai aspek-aspek penting dalam pendidikan, termasuk tips, tren, dan pembaruan terbaru di bidang tersebut', '1748428494_WhatsApp Image 2024-09-26 at 12.06.03_925b126d.jpg', 'Hukum dan Kriminal', NULL, 'More', 'populer', NULL, '2025-05-28 03:34:54', '2025-06-07 04:37:34'),
(12, 3, 'Artikel Ke-4 tentang Gaya Hidup', 'artikel-ke-4-gaya-hidup', 'Ini adalah deskripsi singkat untuk artikel ke-4 tentang gaya hidup.', 'Artikel Ke-4 tentang Gaya Hidup ini membahas berbagai hal terkait gaya hidup.\r\n\r\nTopik yang diangkat akan membantu pembaca memahami lebih jauh mengenai aspek-aspek penting dalam gaya hidup, termasuk tips, tren, dan pembaruan terbaru di bidang tersebut', '1748674449_trending_bottom2.jpg', 'Potret Peristiwa', NULL, 'Pariwisata', 'hot news', NULL, '2025-05-30 23:54:09', '2025-05-30 23:54:09'),
(13, 3, 'Artikel Ke-5 tentang Wisata', 'artikel-ke-5-wisata', 'Ini adalah deskripsi singkat untuk artikel ke-5 tentang wisata.', 'Artikel Ke-5 tentang Wisata ini membahas berbagai hal terkait wisata.\r\n\r\nTopik yang diangkat akan membantu pembaca memahami lebih jauh mengenai aspek-aspek penting dalam wisata, termasuk tips, tren, dan pembaruan terbaru di bidang tersebut', '1748674552_trending_bottom1.jpg', 'Politik', NULL, 'Teknologi', 'hot news', NULL, '2025-05-30 23:55:52', '2025-05-30 23:55:52'),
(14, 3, 'Artikel Ke-6 tentang Kuliner', 'artikel-ke-6-kuliner', 'Ini adalah deskripsi singkat untuk artikel ke-6 tentang kuliner.', 'Artikel Ke-6 tentang Kuliner ini membahas berbagai hal terkait kuliner.\r\n\r\nTopik yang diangkat akan membantu pembaca memahami lebih jauh mengenai aspek-aspek penting dalam kuliner, termasuk tips, tren, dan pembaruan terbaru di bidang tersebut', '1748674626_trending_top.jpg', 'Pemerintah', NULL, 'Kesehatan', 'hot news', NULL, '2025-05-30 23:57:06', '2025-05-30 23:57:06'),
(15, 3, 'Artikel Ke-7 tentang Otomotif', 'artikel-ke-7-otomotif', 'Ini adalah deskripsi singkat untuk artikel ke-7 tentang otomotif.', 'Artikel Ke-7 tentang Otomotif ini membahas berbagai hal terkait otomotif.\r\n\r\nTopik yang diangkat akan membantu pembaca memahami lebih jauh mengenai aspek-aspek penting dalam otomotif, termasuk tips, tren, dan pembaruan terbaru di bidang tersebut.', '1748674734_right5.jpg', 'Nasional', NULL, 'Life Style', 'hot news', NULL, '2025-05-30 23:58:54', '2025-06-07 05:14:06');

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
  `type` enum('author','admin') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', 'admin@example.com', NULL, '$2y$12$d0K8.flOXXOwkIrH0L7YVuF4SbxnczbnbuPRax39HUz8LtmYc9t5m', 'author', NULL, '2025-05-19 16:04:53', '2025-05-30 05:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `visited_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `update_ads_is_active` ON SCHEDULE EVERY 1 DAY STARTS '2025-06-03 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE ads
  SET is_active = CASE
      WHEN CURDATE() BETWEEN start_date AND end_date THEN 1
      ELSE 0
  END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
