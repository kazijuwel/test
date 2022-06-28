-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 06:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_orientbd_real`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `unique_identifier` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `version` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `activated` int(1) NOT NULL DEFAULT 1,
  `image` varchar(1000) COLLATE utf32_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `set_default` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `country`, `city`, `postal_code`, `phone`, `set_default`, `created_at`, `updated_at`) VALUES
(1, 9, 'Subang Avenue\r\nSubang Jaya', 'Malaysia', 'Selangor', '47500', '01112011350', 0, '2021-01-24 02:58:33', '2021-01-24 02:58:33'),
(2, 10, 'Subang Avenue\r\nSubang Jaya', 'Malaysia', 'Selangor', '47500', '01112011350', 0, '2021-01-24 03:13:21', '2021-01-24 03:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `app_settings`
--

CREATE TABLE `app_settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `currency_format` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_settings`
--

INSERT INTO `app_settings` (`id`, `name`, `logo`, `currency_id`, `currency_format`, `facebook`, `twitter`, `instagram`, `youtube`, `google_plus`, `created_at`, `updated_at`) VALUES
(1, 'Active eCommerce', 'uploads/logo/matggar.png', 1, 'symbol', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'https://youtube.com', 'https://google.com', '2019-08-04 16:39:15', '2019-08-04 16:39:18');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Size', '2020-02-24 05:55:07', '2020-02-24 05:55:07'),
(2, 'Fabric', '2020-02-24 05:55:13', '2020-02-24 05:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_translations`
--

CREATE TABLE `attribute_translations` (
  `id` bigint(20) NOT NULL,
  `attribute_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 1,
  `published` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `photo`, `url`, `position`, `published`, `created_at`, `updated_at`) VALUES
(4, 'uploads/banners/banner.jpg', '#', 1, 1, '2019-03-12 05:58:23', '2019-06-11 04:56:50'),
(5, 'uploads/banners/banner.jpg', '#', 1, 1, '2019-03-12 05:58:41', '2019-03-12 05:58:57'),
(6, 'uploads/banners/banner.jpg', '#', 2, 1, '2019-03-12 05:58:52', '2019-03-12 05:58:57'),
(7, 'uploads/banners/banner.jpg', '#', 2, 1, '2019-05-26 05:16:38', '2019-05-26 05:17:34'),
(8, 'uploads/banners/banner.jpg', '#', 2, 1, '2019-06-11 05:00:06', '2019-06-11 05:00:27'),
(9, 'uploads/banners/banner.jpg', '#', 1, 1, '2019-06-11 05:00:15', '2019-06-11 05:00:29'),
(10, 'uploads/banners/banner.jpg', '#', 1, 0, '2019-06-11 05:00:24', '2019-06-11 05:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `top` int(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `top`, `slug`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(3, 'HP', '30', 0, 'hp-iwvsr', NULL, NULL, '2021-01-24 01:06:14', '2021-01-24 23:41:59'),
(14, 'Samsung', '40', 0, 'samsung-myzsy', 'Samsung', 'Samsung product', '2021-01-24 23:26:45', '2021-01-24 23:41:16'),
(15, 'ViewSonic', '32', 0, 'ViewSonic-40am2', 'ViewSonic product', 'ViewSonic', '2021-01-24 23:27:46', '2021-01-24 23:27:46'),
(16, 'CAMPRO', '35', 0, 'CAMPRO-shkhS', 'CAMPRO product', 'CAMPRO', '2021-01-24 23:29:20', '2021-01-24 23:29:20'),
(17, 'APOLLO', '31', 0, 'APOLLO-u6rYK', 'APOLLO product', 'APOLLO', '2021-01-24 23:30:20', '2021-01-24 23:30:20'),
(18, 'Schneider Electric', '37', 0, 'Schneider-Electric-iGGFA', 'Schneider Electric product', 'Schneider Electric', '2021-01-24 23:32:00', '2021-01-24 23:32:00'),
(19, 'HUNDURE', '36', 0, 'HUNDURE-CLoZH', 'Schneider Electric product', 'Schneider Electric', '2021-01-24 23:32:28', '2021-01-24 23:32:28'),
(20, 'Dr. Board', '38', 0, 'Dr-Board-oPkCN', 'Dr.Board products', 'Dr.Board', '2021-01-24 23:34:57', '2021-01-24 23:34:57'),
(21, 'MICRODIGITAL', '39', 0, 'MICRODIGITAL-FIyPh', 'MICRODIGITAL products', 'MICRODIGITAL', '2021-01-24 23:35:38', '2021-01-24 23:35:38'),
(22, 'Acer', '33', 0, 'Acer-4wKKW', 'Acer product', 'Acer', '2021-01-24 23:38:35', '2021-01-24 23:38:35'),
(23, 'ABB', '81', 0, 'ABB-tnN1Z', 'ABB product', 'ABB', '2021-01-25 04:22:05', '2021-01-25 04:22:05'),
(24, 'Futronic', '83', 0, 'futronic-jeakf', 'Futronic product', 'Futronic', '2021-01-25 04:27:54', '2021-01-25 04:28:28');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `brand_id`, `name`, `lang`, `created_at`, `updated_at`) VALUES
(9, 14, 'Samsung', 'bd', '2021-01-24 23:26:45', '2021-01-24 23:26:45'),
(10, 15, 'ViewSonic', 'bd', '2021-01-24 23:27:46', '2021-01-24 23:27:46'),
(11, 16, 'CAMPRO', 'bd', '2021-01-24 23:29:20', '2021-01-24 23:29:20'),
(12, 17, 'APOLLO', 'bd', '2021-01-24 23:30:20', '2021-01-24 23:30:20'),
(13, 18, 'Schneider Electric', 'bd', '2021-01-24 23:32:00', '2021-01-24 23:32:00'),
(14, 19, 'HUNDURE', 'bd', '2021-01-24 23:32:28', '2021-01-24 23:32:28'),
(15, 20, 'Dr. Board', 'bd', '2021-01-24 23:34:57', '2021-01-24 23:34:57'),
(16, 21, 'MICRODIGITAL', 'bd', '2021-01-24 23:35:38', '2021-01-24 23:35:38'),
(17, 22, 'Acer', 'bd', '2021-01-24 23:38:35', '2021-01-24 23:38:35'),
(18, 3, 'HP', 'bd', '2021-01-24 23:41:59', '2021-01-24 23:41:59'),
(19, 23, 'ABB', 'bd', '2021-01-25 04:22:05', '2021-01-25 04:22:05'),
(20, 24, 'Futronic', 'bd', '2021-01-25 04:27:55', '2021-01-25 04:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` int(11) NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `type`, `value`, `created_at`, `updated_at`) VALUES
(1, 'home_default_currency', '27', '2018-10-16 01:35:52', '2021-01-23 02:16:03'),
(2, 'system_default_currency', '27', '2018-10-16 01:36:58', '2021-01-23 02:16:03'),
(3, 'currency_format', '1', '2018-10-17 03:01:59', '2018-10-17 03:01:59'),
(4, 'symbol_format', '1', '2018-10-17 03:01:59', '2019-01-20 02:10:55'),
(5, 'no_of_decimals', '0', '2018-10-17 03:01:59', '2020-03-04 00:57:16'),
(6, 'product_activation', '1', '2018-10-28 01:38:37', '2019-02-04 01:11:41'),
(7, 'vendor_system_activation', '1', '2018-10-28 07:44:16', '2021-01-26 12:59:28'),
(8, 'show_vendors', '1', '2018-10-28 07:44:47', '2019-02-04 01:11:13'),
(9, 'paypal_payment', '0', '2018-10-28 07:45:16', '2019-01-31 05:09:10'),
(10, 'stripe_payment', '0', '2018-10-28 07:45:47', '2018-11-14 01:51:51'),
(11, 'cash_payment', '1', '2018-10-28 07:46:05', '2019-01-24 03:40:18'),
(12, 'payumoney_payment', '0', '2018-10-28 07:46:27', '2019-03-05 05:41:36'),
(13, 'best_selling', '1', '2018-12-24 08:13:44', '2019-02-14 05:29:13'),
(14, 'paypal_sandbox', '0', '2019-01-16 12:44:18', '2019-01-16 12:44:18'),
(15, 'sslcommerz_sandbox', '1', '2019-01-16 12:44:18', '2019-03-14 00:07:26'),
(16, 'sslcommerz_payment', '1', '2019-01-24 09:39:07', '2021-01-24 22:34:21'),
(17, 'vendor_commission', '20', '2019-01-31 06:18:04', '2019-04-13 06:49:26'),
(18, 'verification_form', '[{\"type\":\"text\",\"label\":\"Your name\"},{\"type\":\"text\",\"label\":\"Shop name\"},{\"type\":\"text\",\"label\":\"Email\"},{\"type\":\"text\",\"label\":\"License No\"},{\"type\":\"text\",\"label\":\"Full Address\"},{\"type\":\"text\",\"label\":\"Phone Number\"},{\"type\":\"file\",\"label\":\"Tax Papers\"}]', '2019-02-03 11:36:58', '2019-02-16 06:14:42'),
(19, 'google_analytics', '0', '2019-02-06 12:22:35', '2019-02-06 12:22:35'),
(20, 'facebook_login', '0', '2019-02-07 12:51:59', '2019-02-08 19:41:15'),
(21, 'google_login', '0', '2019-02-07 12:52:10', '2019-02-08 19:41:14'),
(22, 'twitter_login', '0', '2019-02-07 12:52:20', '2019-02-08 02:32:56'),
(23, 'payumoney_payment', '1', '2019-03-05 11:38:17', '2019-03-05 11:38:17'),
(24, 'payumoney_sandbox', '1', '2019-03-05 11:38:17', '2019-03-05 05:39:18'),
(36, 'facebook_chat', '0', '2019-04-15 11:45:04', '2019-04-15 11:45:04'),
(37, 'email_verification', '0', '2019-04-30 07:30:07', '2019-04-30 07:30:07'),
(38, 'wallet_system', '0', '2019-05-19 08:05:44', '2021-01-24 22:37:05'),
(39, 'coupon_system', '1', '2019-06-11 09:46:18', '2021-01-24 22:34:00'),
(40, 'current_version', '1.1', '2019-06-11 09:46:18', '2019-06-11 09:46:18'),
(41, 'instamojo_payment', '0', '2019-07-06 09:58:03', '2019-07-06 09:58:03'),
(42, 'instamojo_sandbox', '1', '2019-07-06 09:58:43', '2019-07-06 09:58:43'),
(43, 'razorpay', '0', '2019-07-06 09:58:43', '2019-07-06 09:58:43'),
(44, 'paystack', '0', '2019-07-21 13:00:38', '2019-07-21 13:00:38'),
(45, 'pickup_point', '1', '2019-10-17 11:50:39', '2021-01-26 12:44:30'),
(46, 'maintenance_mode', '0', '2019-10-17 11:51:04', '2019-10-17 11:51:04'),
(47, 'voguepay', '0', '2019-10-17 11:51:24', '2019-10-17 11:51:24'),
(48, 'voguepay_sandbox', '0', '2019-10-17 11:51:38', '2019-10-17 11:51:38'),
(50, 'category_wise_commission', '0', '2020-01-21 07:22:47', '2020-01-21 07:22:47'),
(51, 'conversation_system', '1', '2020-01-21 07:23:21', '2020-01-21 07:23:21'),
(52, 'guest_checkout_active', '1', '2020-01-22 07:36:38', '2020-01-22 07:36:38'),
(53, 'facebook_pixel', '0', '2020-01-22 11:43:58', '2020-01-22 11:43:58'),
(55, 'classified_product', '1', '2020-05-13 13:01:05', '2021-01-24 22:33:52'),
(56, 'pos_activation_for_seller', '1', '2020-06-11 09:45:02', '2020-06-11 09:45:02'),
(57, 'shipping_type', 'product_wise_shipping', '2020-07-01 13:49:56', '2020-07-01 13:49:56'),
(58, 'flat_rate_shipping_cost', '0', '2020-07-01 13:49:56', '2020-07-01 13:49:56'),
(59, 'shipping_cost_admin', '0', '2020-07-01 13:49:56', '2020-07-01 13:49:56'),
(60, 'payhere_sandbox', '0', '2020-07-30 18:23:53', '2020-07-30 18:23:53'),
(61, 'payhere', '0', '2020-07-30 18:23:53', '2021-01-26 09:57:38'),
(62, 'google_recaptcha', '0', '2020-08-17 07:13:37', '2020-08-17 07:13:37'),
(63, 'ngenius', '0', '2020-09-22 10:58:21', '2020-09-22 10:58:21'),
(64, 'header_logo', '92', '2020-11-16 07:26:36', '2021-01-25 23:40:15'),
(65, 'show_language_switcher', 'on', '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(66, 'show_currency_switcher', 'on', '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(67, 'header_stikcy', 'on', '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(68, 'footer_logo', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(69, 'about_us_description', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(70, 'contact_address', '8/2, Motalib Tower (1st floor) Flat-2C, Paribag Dhaka-1000, Bangladesh', '2020-11-16 07:26:36', '2021-01-26 01:26:56'),
(71, 'contact_phone', '01841-695 -695, 0181-1446778, 0184-7327607', '2020-11-16 07:26:36', '2021-01-26 01:26:58'),
(72, 'contact_email', 'support@orient.com.bd', '2020-11-16 07:26:36', '2021-01-26 01:26:58'),
(73, 'widget_one_labels', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(74, 'widget_one_links', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(75, 'widget_one', NULL, '2020-11-16 07:26:36', '2021-01-26 11:57:17'),
(76, 'frontend_copyright_text', '@2021 ORIENT BD LIMITED ALL RIGHTS RESERVED', '2020-11-16 07:26:36', '2021-01-26 01:57:49'),
(77, 'show_social_links', 'on', '2020-11-16 07:26:36', '2021-01-26 01:40:35'),
(78, 'facebook_link', 'https://www.facebook.com/OrientbdLimited', '2020-11-16 07:26:36', '2021-01-26 01:40:37'),
(79, 'twitter_link', 'https://twitter.com/OrientbdLimited/', '2020-11-16 07:26:36', '2021-01-26 01:40:37'),
(80, 'instagram_link', 'https://www.instagram.com/', '2020-11-16 07:26:36', '2021-01-26 01:40:37'),
(81, 'youtube_link', 'https://www.youtube.com/channel/UCRYhi5RGZP5x7ZQP63szoJA?sub_confirmation=1', '2020-11-16 07:26:36', '2021-01-26 01:40:37'),
(82, 'linkedin_link', 'https://www.linkedin.com/company/orientbd/', '2020-11-16 07:26:36', '2021-01-26 01:40:37'),
(83, 'payment_method_images', '103', '2020-11-16 07:26:36', '2021-01-26 01:51:56'),
(84, 'home_slider_images', '[\"148\",\"140\",\"138\"]', '2020-11-16 07:26:36', '2021-01-27 05:14:45'),
(85, 'home_slider_links', '[null,null,null]', '2020-11-16 07:26:36', '2021-01-26 12:37:15'),
(86, 'home_banner1_images', '[\"141\",\"142\",\"143\"]', '2020-11-16 07:26:36', '2021-01-26 12:42:02'),
(87, 'home_banner1_links', '[null,null,null]', '2020-11-16 07:26:36', '2021-01-23 03:14:53'),
(88, 'home_banner2_images', NULL, '2020-11-16 07:26:36', '2021-01-26 11:31:14'),
(89, 'home_banner2_links', NULL, '2020-11-16 07:26:36', '2021-01-26 11:31:14'),
(90, 'home_categories', NULL, '2020-11-16 07:26:36', '2021-01-26 11:31:29'),
(91, 'top10_categories', '[\"13\",\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"23\"]', '2020-11-16 07:26:36', '2021-01-25 04:13:34'),
(92, 'top10_brands', '[\"14\",\"15\",\"16\",\"17\",\"18\",\"19\",\"20\",\"21\",\"22\",\"25\"]', '2020-11-16 07:26:36', '2021-01-27 04:29:54'),
(93, 'website_name', 'Orient bd Limited', '2020-11-16 07:26:36', '2021-01-25 23:46:25'),
(94, 'site_motto', 'The Largest IT Product Supplier In Bangladesh', '2020-11-16 07:26:36', '2021-01-26 00:42:43'),
(95, 'site_icon', '96', '2020-11-16 07:26:36', '2021-01-25 23:46:26'),
(96, 'base_color', '#f16522', '2020-11-16 07:26:36', '2021-01-25 04:31:12'),
(97, 'base_hov_color', '#e62e04', '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(98, 'meta_title', 'Orient BD Ltd: The Largest IT Product Supplier In Bangladesh', '2020-11-16 07:26:36', '2021-01-26 00:45:52'),
(99, 'meta_description', 'The largest supplier of IT Equipment, UPS &amp; IPS, Projector, CCTV camera, Flat monitor etc provides by Orient BD Ltd. Visit orient.com.bd.', '2020-11-16 07:26:36', '2021-01-26 00:45:54'),
(100, 'meta_keywords', 'The largest supplier of IT Equipment, UPS &amp; IPS, Projector, CCTV camera, Flat monitor etc provides by Orient BD Ltd. Visit orient.com.bd.', '2020-11-16 07:26:36', '2021-01-26 00:45:54'),
(101, 'meta_image', '96', '2020-11-16 07:26:36', '2021-01-26 00:45:54'),
(102, 'site_name', 'Orient bd Limited', '2020-11-16 07:26:36', '2021-01-25 23:30:43'),
(103, 'system_logo_white', '92', '2020-11-16 07:26:36', '2021-01-25 23:30:43'),
(104, 'system_logo_black', '92', '2020-11-16 07:26:36', '2021-01-25 23:30:43'),
(105, 'timezone', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(106, 'admin_login_background', NULL, '2020-11-16 07:26:36', '2020-11-16 07:26:36'),
(107, 'iyzico_sandbox', '1', '2020-12-30 16:45:56', '2020-12-30 16:45:56'),
(108, 'iyzico', '0', '2020-12-30 16:45:56', '2021-01-26 09:57:44'),
(109, 'decimal_separator', '1', '2020-12-30 16:45:56', '2020-12-30 16:45:56'),
(110, 'nagad', '0', '2021-01-22 10:30:03', '2021-01-26 09:57:40'),
(111, 'bkash', '1', '2021-01-22 10:30:03', '2021-01-24 22:34:26'),
(112, 'bkash_sandbox', '1', '2021-01-22 10:30:03', '2021-01-22 10:30:03'),
(113, 'home_banner3_images', NULL, '2021-01-26 11:25:15', '2021-01-26 11:31:39'),
(114, 'home_banner3_links', NULL, '2021-01-26 11:25:15', '2021-01-26 11:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `variation` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(20,2) DEFAULT NULL,
  `tax` double(20,2) DEFAULT NULL,
  `shipping_cost` double(20,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 0,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `commision_rate` double(8,2) NOT NULL DEFAULT 0.00,
  `banner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` int(1) NOT NULL DEFAULT 0,
  `top` int(1) NOT NULL DEFAULT 0,
  `digital` int(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `level`, `name`, `commision_rate`, `banner`, `icon`, `featured`, `top`, `digital`, `slug`, `meta_title`, `meta_description`, `created_at`, `updated_at`) VALUES
(13, 0, 0, 'Monitor & Display', 0.00, '63', '58', 1, 0, 0, 'monitor--display-xfbcj', 'Monitor & Display', 'Monitor & Display', '2021-01-26 11:08:17', '2021-01-26 11:08:17'),
(14, 0, 0, 'CCTV Camera', 0.00, '74', '51', 1, 0, 0, 'cctv-camera-g8atv', 'CCTV Camera', 'CCTV Camera', '2021-01-26 11:16:08', '2021-01-26 11:16:08'),
(15, 0, 0, 'UPS & IPS', 0.00, '80', '61', 1, 0, 0, 'ups--ips-mwdec', 'UPS & IPS', 'UPS & IPS', '2021-01-26 11:15:21', '2021-01-26 11:15:21'),
(16, 0, 0, 'Multimedia Projector', 0.00, '75', '60', 1, 0, 0, 'multimedia-projector-z9sg4', 'Multimedia Projector', 'Multimedia Projector', '2021-01-26 11:08:19', '2021-01-26 11:08:19'),
(17, 0, 0, 'Voltage Stabilizer', 0.00, '65', '50', 1, 0, 0, 'voltage-stabilizer-rhxkc', 'Voltage Stabilizer', 'Voltage Stabilizer', '2021-01-26 11:15:19', '2021-01-26 11:15:19'),
(18, 0, 0, 'Fingerprint & Biometric', 0.00, '76', '52', 0, 0, 0, 'fingerprint--biometric-n7yvz', 'Fingerprint & Biometric', 'Fingerprint & Biometric', '2021-01-26 11:09:23', '2021-01-26 11:09:23'),
(19, 0, 0, 'IT Equipment', 0.00, '68', '56', 0, 0, 0, 'it-equipment-z4luj', 'IT Equipment', 'IT Equipment', '2021-01-26 11:10:53', '2021-01-26 11:10:53'),
(20, 0, 0, 'Screen & Accessories', 0.00, '77', '59', 0, 0, 0, 'screen--accessories-xvmjh', 'Screen & Accessories', 'Screen & Accessories', '2021-01-25 09:52:19', '2021-01-25 03:52:19'),
(23, 0, 0, 'Router & Network', 0.00, '78', '79', 1, 0, 0, 'Router--Network-UU4lE', NULL, NULL, '2021-01-26 11:10:58', '2021-01-26 11:10:58'),
(24, 0, 0, 'Software', 0.00, '86', '87', 1, 0, 0, 'Software-TsldB', 'Software products', 'Software', '2021-01-26 11:15:40', '2021-01-26 11:15:40'),
(25, 13, 1, 'Monitor & Accessories', 0.00, NULL, NULL, 0, 0, 0, 'Monitor--Accessories-juVC0', NULL, NULL, '2021-01-25 05:06:04', '2021-01-25 05:06:04'),
(26, 25, 2, 'Gaming Monitor', 0.00, NULL, NULL, 0, 0, 0, 'Gaming-Monitor-RmSsv', NULL, NULL, '2021-01-25 05:08:15', '2021-01-25 05:08:15'),
(27, 25, 2, 'Curve Monitor', 0.00, NULL, NULL, 0, 0, 0, 'Curve-Monitor-TnW1n', NULL, NULL, '2021-01-25 05:08:38', '2021-01-25 05:08:38'),
(28, 25, 2, '4K Monitor', 0.00, NULL, NULL, 0, 0, 0, '4K-Monitor-MA235', NULL, NULL, '2021-01-26 11:08:00', '2021-01-26 11:08:00'),
(29, 25, 2, 'Laptop Monitor', 0.00, NULL, NULL, 0, 0, 0, 'Laptop-Monitor-noKJf', NULL, NULL, '2021-01-25 05:11:02', '2021-01-25 05:11:02'),
(30, 26, 3, 'Acer', 0.00, NULL, NULL, 0, 0, 0, 'Acer-Y3VBv', NULL, NULL, '2021-01-26 11:07:59', '2021-01-26 11:07:59'),
(36, 14, 1, 'Camera', 0.00, NULL, NULL, 0, 0, 0, 'camera--drones-mhume', NULL, NULL, '2021-01-25 11:20:47', '2021-01-25 05:20:47'),
(37, 14, 1, 'Drones', 0.00, NULL, NULL, 0, 0, 0, 'Drones-vSaHr', NULL, NULL, '2021-01-25 05:21:02', '2021-01-25 05:21:02'),
(38, 29, 3, 'Acer', 0.00, NULL, NULL, 0, 0, 0, 'Acer-EYNDI', NULL, NULL, '2021-01-26 11:07:59', '2021-01-26 11:07:59'),
(39, 36, 2, 'Security Cameras', 0.00, NULL, NULL, 0, 0, 0, 'Security-Cameras-X22UG', NULL, NULL, '2021-01-26 01:05:02', '2021-01-26 01:05:02'),
(40, 36, 2, 'Other Cameras', 0.00, NULL, NULL, 0, 0, 0, 'Other-Cameras-vVpGH', NULL, NULL, '2021-01-26 01:49:59', '2021-01-26 01:49:59'),
(41, 37, 2, 'Multi-Rotor', 0.00, NULL, NULL, 0, 0, 0, 'Multi-Rotor-OrnYX', NULL, NULL, '2021-01-26 09:16:31', '2021-01-26 09:16:31'),
(42, 14, 1, 'Action Camera', 0.00, NULL, NULL, 0, 0, 0, 'Action-Camera-kXIYn', NULL, NULL, '2021-01-26 09:16:59', '2021-01-26 09:16:59'),
(43, 37, 2, 'Fixed-wing', 0.00, NULL, NULL, 0, 0, 0, 'Fixed-wing-mhqdx', NULL, NULL, '2021-01-26 09:17:53', '2021-01-26 09:17:53'),
(44, 37, 2, 'Single Rotor', 0.00, NULL, NULL, 0, 0, 0, 'Single-Rotor-b6Am6', NULL, NULL, '2021-01-26 09:21:11', '2021-01-26 09:21:11'),
(45, 37, 2, 'Hybrid Votol', 0.00, NULL, NULL, 0, 0, 0, 'Hybrid-Votol-gerT2', NULL, NULL, '2021-01-26 09:22:07', '2021-01-26 09:22:07'),
(46, 42, 2, 'Go Pro', 0.00, NULL, NULL, 0, 0, 0, 'Go-Pro-dy4tW', NULL, NULL, '2021-01-26 09:25:51', '2021-01-26 09:25:51'),
(47, 42, 2, 'DJI', 0.00, NULL, NULL, 0, 0, 0, 'DJI-BIsnX', NULL, NULL, '2021-01-26 09:26:09', '2021-01-26 09:26:09'),
(48, 42, 2, 'Insta360', 0.00, NULL, NULL, 0, 0, 0, 'Insta360-TXm68', NULL, NULL, '2021-01-26 09:27:26', '2021-01-26 09:27:26'),
(49, 15, 1, 'Uninterruptible power supply', 0.00, NULL, NULL, 0, 0, 0, 'Uninterruptible-power-supply-BTjWz', NULL, NULL, '2021-01-26 09:55:41', '2021-01-26 09:55:41'),
(50, 15, 1, 'Inverter Power Supply', 0.00, NULL, NULL, 0, 0, 0, 'interruptible-power-supply-e4ayp', NULL, NULL, '2021-01-26 10:04:07', '2021-01-26 10:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `name`, `lang`, `created_at`, `updated_at`) VALUES
(7, 13, 'Monitor & Display', 'bd', '2021-01-25 00:24:25', '2021-01-25 00:24:25'),
(8, 14, 'CCTV Camera', 'bd', '2021-01-25 00:28:34', '2021-01-25 00:28:34'),
(9, 15, 'UPS & IPS', 'bd', '2021-01-25 00:29:28', '2021-01-25 00:29:28'),
(10, 16, 'Multimedia Projector', 'bd', '2021-01-25 00:30:17', '2021-01-25 00:30:17'),
(11, 17, 'Voltage Stabilizer', 'bd', '2021-01-25 00:32:30', '2021-01-25 00:32:30'),
(12, 18, 'Fingerprint & Biometric', 'bd', '2021-01-25 00:33:49', '2021-01-25 00:33:49'),
(13, 19, 'IT Equipment', 'bd', '2021-01-25 00:35:06', '2021-01-25 00:35:06'),
(14, 20, 'Screen & Accessories', 'bd', '2021-01-25 00:35:43', '2021-01-25 00:35:43'),
(17, 23, 'Router & Network', 'bd', '2021-01-25 04:12:34', '2021-01-25 04:12:34'),
(18, 24, 'Software', 'bd', '2021-01-25 04:48:46', '2021-01-25 04:48:46'),
(19, 25, 'Monitor & Accessories', 'bd', '2021-01-25 05:06:04', '2021-01-25 05:06:04'),
(20, 26, 'Gaming Monitor', 'bd', '2021-01-25 05:08:17', '2021-01-25 05:08:17'),
(21, 27, 'Curve Monitor', 'bd', '2021-01-25 05:08:39', '2021-01-25 05:08:39'),
(22, 28, '4K Monitor', 'bd', '2021-01-25 05:09:47', '2021-01-25 05:09:47'),
(23, 29, 'Laptop Monitor', 'bd', '2021-01-25 05:11:02', '2021-01-25 05:11:02'),
(24, 30, 'Acer', 'bd', '2021-01-25 05:12:14', '2021-01-25 05:12:14'),
(25, 36, 'Camera', 'bd', '2021-01-25 05:19:52', '2021-01-25 05:20:48'),
(26, 37, 'Drones', 'bd', '2021-01-25 05:21:03', '2021-01-25 05:21:03'),
(27, 38, 'Acer', 'bd', '2021-01-25 23:39:13', '2021-01-25 23:39:13'),
(28, 39, 'Security Cameras', 'bd', '2021-01-26 01:05:02', '2021-01-26 01:05:02'),
(29, 40, 'Other Cameras', 'bd', '2021-01-26 01:49:59', '2021-01-26 01:49:59'),
(30, 41, 'Multi-Rotor', 'bd', '2021-01-26 09:16:31', '2021-01-26 09:16:31'),
(31, 42, 'Action Camera', 'bd', '2021-01-26 09:16:59', '2021-01-26 09:16:59'),
(32, 43, 'Fixed-wing', 'bd', '2021-01-26 09:17:54', '2021-01-26 09:17:54'),
(33, 44, 'Single Rotor', 'bd', '2021-01-26 09:21:12', '2021-01-26 09:21:12'),
(34, 45, 'Hybrid Votol', 'bd', '2021-01-26 09:22:07', '2021-01-26 09:22:07'),
(35, 46, 'Go Pro', 'bd', '2021-01-26 09:25:51', '2021-01-26 09:25:51'),
(36, 47, 'DJI', 'bd', '2021-01-26 09:26:09', '2021-01-26 09:26:09'),
(37, 48, 'Insta360', 'bd', '2021-01-26 09:27:27', '2021-01-26 09:27:27'),
(38, 49, 'Uninterruptible power supply', 'bd', '2021-01-26 09:55:41', '2021-01-26 09:55:41'),
(39, 50, 'Inverter Power Supply', 'bd', '2021-01-26 09:55:58', '2021-01-26 10:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cost` double(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city_translations`
--

CREATE TABLE `city_translations` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'IndianRed', '#CD5C5C', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(2, 'LightCoral', '#F08080', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(3, 'Salmon', '#FA8072', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(4, 'DarkSalmon', '#E9967A', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(5, 'LightSalmon', '#FFA07A', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(6, 'Crimson', '#DC143C', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(7, 'Red', '#FF0000', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(8, 'FireBrick', '#B22222', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(9, 'DarkRed', '#8B0000', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(10, 'Pink', '#FFC0CB', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(11, 'LightPink', '#FFB6C1', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(12, 'HotPink', '#FF69B4', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(13, 'DeepPink', '#FF1493', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(14, 'MediumVioletRed', '#C71585', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(15, 'PaleVioletRed', '#DB7093', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(16, 'LightSalmon', '#FFA07A', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(17, 'Coral', '#FF7F50', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(18, 'Tomato', '#FF6347', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(19, 'OrangeRed', '#FF4500', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(20, 'DarkOrange', '#FF8C00', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(21, 'Orange', '#FFA500', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(22, 'Gold', '#FFD700', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(23, 'Yellow', '#FFFF00', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(24, 'LightYellow', '#FFFFE0', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(25, 'LemonChiffon', '#FFFACD', '2018-11-05 02:12:26', '2018-11-05 02:12:26'),
(26, 'LightGoldenrodYellow', '#FAFAD2', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(27, 'PapayaWhip', '#FFEFD5', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(28, 'Moccasin', '#FFE4B5', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(29, 'PeachPuff', '#FFDAB9', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(30, 'PaleGoldenrod', '#EEE8AA', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(31, 'Khaki', '#F0E68C', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(32, 'DarkKhaki', '#BDB76B', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(33, 'Lavender', '#E6E6FA', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(34, 'Thistle', '#D8BFD8', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(35, 'Plum', '#DDA0DD', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(36, 'Violet', '#EE82EE', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(37, 'Orchid', '#DA70D6', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(38, 'Fuchsia', '#FF00FF', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(39, 'Magenta', '#FF00FF', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(40, 'MediumOrchid', '#BA55D3', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(41, 'MediumPurple', '#9370DB', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(42, 'Amethyst', '#9966CC', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(43, 'BlueViolet', '#8A2BE2', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(44, 'DarkViolet', '#9400D3', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(45, 'DarkOrchid', '#9932CC', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(46, 'DarkMagenta', '#8B008B', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(47, 'Purple', '#800080', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(48, 'Indigo', '#4B0082', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(49, 'SlateBlue', '#6A5ACD', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(50, 'DarkSlateBlue', '#483D8B', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(51, 'MediumSlateBlue', '#7B68EE', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(52, 'GreenYellow', '#ADFF2F', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(53, 'Chartreuse', '#7FFF00', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(54, 'LawnGreen', '#7CFC00', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(55, 'Lime', '#00FF00', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(56, 'LimeGreen', '#32CD32', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(57, 'PaleGreen', '#98FB98', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(58, 'LightGreen', '#90EE90', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(59, 'MediumSpringGreen', '#00FA9A', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(60, 'SpringGreen', '#00FF7F', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(61, 'MediumSeaGreen', '#3CB371', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(62, 'SeaGreen', '#2E8B57', '2018-11-05 02:12:27', '2018-11-05 02:12:27'),
(63, 'ForestGreen', '#228B22', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(64, 'Green', '#008000', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(65, 'DarkGreen', '#006400', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(66, 'YellowGreen', '#9ACD32', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(67, 'OliveDrab', '#6B8E23', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(68, 'Olive', '#808000', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(69, 'DarkOliveGreen', '#556B2F', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(70, 'MediumAquamarine', '#66CDAA', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(71, 'DarkSeaGreen', '#8FBC8F', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(72, 'LightSeaGreen', '#20B2AA', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(73, 'DarkCyan', '#008B8B', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(74, 'Teal', '#008080', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(75, 'Aqua', '#00FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(76, 'Cyan', '#00FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(77, 'LightCyan', '#E0FFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(78, 'PaleTurquoise', '#AFEEEE', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(79, 'Aquamarine', '#7FFFD4', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(80, 'Turquoise', '#40E0D0', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(81, 'MediumTurquoise', '#48D1CC', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(82, 'DarkTurquoise', '#00CED1', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(83, 'CadetBlue', '#5F9EA0', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(84, 'SteelBlue', '#4682B4', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(85, 'LightSteelBlue', '#B0C4DE', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(86, 'PowderBlue', '#B0E0E6', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(87, 'LightBlue', '#ADD8E6', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(88, 'SkyBlue', '#87CEEB', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(89, 'LightSkyBlue', '#87CEFA', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(90, 'DeepSkyBlue', '#00BFFF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(91, 'DodgerBlue', '#1E90FF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(92, 'CornflowerBlue', '#6495ED', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(93, 'MediumSlateBlue', '#7B68EE', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(94, 'RoyalBlue', '#4169E1', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(95, 'Blue', '#0000FF', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(96, 'MediumBlue', '#0000CD', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(97, 'DarkBlue', '#00008B', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(98, 'Navy', '#000080', '2018-11-05 02:12:28', '2018-11-05 02:12:28'),
(99, 'MidnightBlue', '#191970', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(100, 'Cornsilk', '#FFF8DC', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(101, 'BlanchedAlmond', '#FFEBCD', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(102, 'Bisque', '#FFE4C4', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(103, 'NavajoWhite', '#FFDEAD', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(104, 'Wheat', '#F5DEB3', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(105, 'BurlyWood', '#DEB887', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(106, 'Tan', '#D2B48C', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(107, 'RosyBrown', '#BC8F8F', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(108, 'SandyBrown', '#F4A460', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(109, 'Goldenrod', '#DAA520', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(110, 'DarkGoldenrod', '#B8860B', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(111, 'Peru', '#CD853F', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(112, 'Chocolate', '#D2691E', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(113, 'SaddleBrown', '#8B4513', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(114, 'Sienna', '#A0522D', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(115, 'Brown', '#A52A2A', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(116, 'Maroon', '#800000', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(117, 'White', '#FFFFFF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(118, 'Snow', '#FFFAFA', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(119, 'Honeydew', '#F0FFF0', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(120, 'MintCream', '#F5FFFA', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(121, 'Azure', '#F0FFFF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(122, 'AliceBlue', '#F0F8FF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(123, 'GhostWhite', '#F8F8FF', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(124, 'WhiteSmoke', '#F5F5F5', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(125, 'Seashell', '#FFF5EE', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(126, 'Beige', '#F5F5DC', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(127, 'OldLace', '#FDF5E6', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(128, 'FloralWhite', '#FFFAF0', '2018-11-05 02:12:29', '2018-11-05 02:12:29'),
(129, 'Ivory', '#FFFFF0', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(130, 'AntiqueWhite', '#FAEBD7', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(131, 'Linen', '#FAF0E6', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(132, 'LavenderBlush', '#FFF0F5', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(133, 'MistyRose', '#FFE4E1', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(134, 'Gainsboro', '#DCDCDC', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(135, 'LightGrey', '#D3D3D3', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(136, 'Silver', '#C0C0C0', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(137, 'DarkGray', '#A9A9A9', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(138, 'Gray', '#808080', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(139, 'DimGray', '#696969', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(140, 'LightSlateGray', '#778899', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(141, 'SlateGray', '#708090', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(142, 'DarkSlateGray', '#2F4F4F', '2018-11-05 02:12:30', '2018-11-05 02:12:30'),
(143, 'Black', '#000000', '2018-11-05 02:12:30', '2018-11-05 02:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `title` varchar(1000) COLLATE utf32_unicode_ci DEFAULT NULL,
  `sender_viewed` int(1) NOT NULL DEFAULT 1,
  `receiver_viewed` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `sender_id`, `receiver_id`, `title`, `sender_viewed`, `receiver_viewed`, `created_at`, `updated_at`) VALUES
(1, 9, 9, 'HP PAVILION 15 AU072TX', 1, 0, '2021-01-24 04:35:34', '2021-01-24 04:35:34'),
(2, 10, 9, 'HP PAVILION 15 AU072TX', 1, 1, '2021-01-24 04:45:10', '2021-01-24 05:42:36'),
(3, 10, 9, 'HP PAVILION 15 AU072TX', 1, 1, '2021-01-24 05:43:48', '2021-01-24 05:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, NULL, NULL),
(2, 'AL', 'Albania', 1, NULL, NULL),
(3, 'DZ', 'Algeria', 1, NULL, NULL),
(4, 'DS', 'American Samoa', 1, NULL, NULL),
(5, 'AD', 'Andorra', 1, NULL, NULL),
(6, 'AO', 'Angola', 1, NULL, NULL),
(7, 'AI', 'Anguilla', 1, NULL, NULL),
(8, 'AQ', 'Antarctica', 1, NULL, NULL),
(9, 'AG', 'Antigua and Barbuda', 1, NULL, NULL),
(10, 'AR', 'Argentina', 1, NULL, NULL),
(11, 'AM', 'Armenia', 1, NULL, NULL),
(12, 'AW', 'Aruba', 1, NULL, NULL),
(13, 'AU', 'Australia', 1, NULL, NULL),
(14, 'AT', 'Austria', 1, NULL, NULL),
(15, 'AZ', 'Azerbaijan', 1, NULL, NULL),
(16, 'BS', 'Bahamas', 1, NULL, NULL),
(17, 'BH', 'Bahrain', 1, NULL, NULL),
(18, 'BD', 'Bangladesh', 1, NULL, NULL),
(19, 'BB', 'Barbados', 1, NULL, NULL),
(20, 'BY', 'Belarus', 1, NULL, NULL),
(21, 'BE', 'Belgium', 1, NULL, NULL),
(22, 'BZ', 'Belize', 1, NULL, NULL),
(23, 'BJ', 'Benin', 1, NULL, NULL),
(24, 'BM', 'Bermuda', 1, NULL, NULL),
(25, 'BT', 'Bhutan', 1, NULL, NULL),
(26, 'BO', 'Bolivia', 1, NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', 1, NULL, NULL),
(28, 'BW', 'Botswana', 1, NULL, NULL),
(29, 'BV', 'Bouvet Island', 1, NULL, NULL),
(30, 'BR', 'Brazil', 1, NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', 1, NULL, NULL),
(32, 'BN', 'Brunei Darussalam', 1, NULL, NULL),
(33, 'BG', 'Bulgaria', 1, NULL, NULL),
(34, 'BF', 'Burkina Faso', 1, NULL, NULL),
(35, 'BI', 'Burundi', 1, NULL, NULL),
(36, 'KH', 'Cambodia', 1, NULL, NULL),
(37, 'CM', 'Cameroon', 1, NULL, NULL),
(38, 'CA', 'Canada', 1, NULL, NULL),
(39, 'CV', 'Cape Verde', 1, NULL, NULL),
(40, 'KY', 'Cayman Islands', 1, NULL, NULL),
(41, 'CF', 'Central African Republic', 1, NULL, NULL),
(42, 'TD', 'Chad', 1, NULL, NULL),
(43, 'CL', 'Chile', 1, NULL, NULL),
(44, 'CN', 'China', 1, NULL, NULL),
(45, 'CX', 'Christmas Island', 1, NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', 1, NULL, NULL),
(47, 'CO', 'Colombia', 1, NULL, NULL),
(48, 'KM', 'Comoros', 1, NULL, NULL),
(49, 'CG', 'Congo', 1, NULL, NULL),
(50, 'CK', 'Cook Islands', 1, NULL, NULL),
(51, 'CR', 'Costa Rica', 1, NULL, NULL),
(52, 'HR', 'Croatia (Hrvatska)', 1, NULL, NULL),
(53, 'CU', 'Cuba', 1, NULL, NULL),
(54, 'CY', 'Cyprus', 1, NULL, NULL),
(55, 'CZ', 'Czech Republic', 1, NULL, NULL),
(56, 'DK', 'Denmark', 1, NULL, NULL),
(57, 'DJ', 'Djibouti', 1, NULL, NULL),
(58, 'DM', 'Dominica', 1, NULL, NULL),
(59, 'DO', 'Dominican Republic', 1, NULL, NULL),
(60, 'TP', 'East Timor', 1, NULL, NULL),
(61, 'EC', 'Ecuador', 1, NULL, NULL),
(62, 'EG', 'Egypt', 1, NULL, NULL),
(63, 'SV', 'El Salvador', 1, NULL, NULL),
(64, 'GQ', 'Equatorial Guinea', 1, NULL, NULL),
(65, 'ER', 'Eritrea', 1, NULL, NULL),
(66, 'EE', 'Estonia', 1, NULL, NULL),
(67, 'ET', 'Ethiopia', 1, NULL, NULL),
(68, 'FK', 'Falkland Islands (Malvinas)', 1, NULL, NULL),
(69, 'FO', 'Faroe Islands', 1, NULL, NULL),
(70, 'FJ', 'Fiji', 1, NULL, NULL),
(71, 'FI', 'Finland', 1, NULL, NULL),
(72, 'FR', 'France', 1, NULL, NULL),
(73, 'FX', 'France, Metropolitan', 1, NULL, NULL),
(74, 'GF', 'French Guiana', 1, NULL, NULL),
(75, 'PF', 'French Polynesia', 1, NULL, NULL),
(76, 'TF', 'French Southern Territories', 1, NULL, NULL),
(77, 'GA', 'Gabon', 1, NULL, NULL),
(78, 'GM', 'Gambia', 1, NULL, NULL),
(79, 'GE', 'Georgia', 1, NULL, NULL),
(80, 'DE', 'Germany', 1, NULL, NULL),
(81, 'GH', 'Ghana', 1, NULL, NULL),
(82, 'GI', 'Gibraltar', 1, NULL, NULL),
(83, 'GK', 'Guernsey', 1, NULL, NULL),
(84, 'GR', 'Greece', 1, NULL, NULL),
(85, 'GL', 'Greenland', 1, NULL, NULL),
(86, 'GD', 'Grenada', 1, NULL, NULL),
(87, 'GP', 'Guadeloupe', 1, NULL, NULL),
(88, 'GU', 'Guam', 1, NULL, NULL),
(89, 'GT', 'Guatemala', 1, NULL, NULL),
(90, 'GN', 'Guinea', 1, NULL, NULL),
(91, 'GW', 'Guinea-Bissau', 1, NULL, NULL),
(92, 'GY', 'Guyana', 1, NULL, NULL),
(93, 'HT', 'Haiti', 1, NULL, NULL),
(94, 'HM', 'Heard and Mc Donald Islands', 1, NULL, NULL),
(95, 'HN', 'Honduras', 1, NULL, NULL),
(96, 'HK', 'Hong Kong', 1, NULL, NULL),
(97, 'HU', 'Hungary', 1, NULL, NULL),
(98, 'IS', 'Iceland', 1, NULL, NULL),
(99, 'IN', 'India', 1, NULL, NULL),
(100, 'IM', 'Isle of Man', 1, NULL, NULL),
(101, 'ID', 'Indonesia', 1, NULL, NULL),
(102, 'IR', 'Iran (Islamic Republic of)', 1, NULL, NULL),
(103, 'IQ', 'Iraq', 1, NULL, NULL),
(104, 'IE', 'Ireland', 1, NULL, NULL),
(105, 'IL', 'Israel', 1, NULL, NULL),
(106, 'IT', 'Italy', 1, NULL, NULL),
(107, 'CI', 'Ivory Coast', 1, NULL, NULL),
(108, 'JE', 'Jersey', 1, NULL, NULL),
(109, 'JM', 'Jamaica', 1, NULL, NULL),
(110, 'JP', 'Japan', 1, NULL, NULL),
(111, 'JO', 'Jordan', 1, NULL, NULL),
(112, 'KZ', 'Kazakhstan', 1, NULL, NULL),
(113, 'KE', 'Kenya', 1, NULL, NULL),
(114, 'KI', 'Kiribati', 1, NULL, NULL),
(115, 'KP', 'Korea, Democratic People\'s Republic of', 1, NULL, NULL),
(116, 'KR', 'Korea, Republic of', 1, NULL, NULL),
(117, 'XK', 'Kosovo', 1, NULL, NULL),
(118, 'KW', 'Kuwait', 1, NULL, NULL),
(119, 'KG', 'Kyrgyzstan', 1, NULL, NULL),
(120, 'LA', 'Lao People\'s Democratic Republic', 1, NULL, NULL),
(121, 'LV', 'Latvia', 1, NULL, NULL),
(122, 'LB', 'Lebanon', 1, NULL, NULL),
(123, 'LS', 'Lesotho', 1, NULL, NULL),
(124, 'LR', 'Liberia', 1, NULL, NULL),
(125, 'LY', 'Libyan Arab Jamahiriya', 1, NULL, NULL),
(126, 'LI', 'Liechtenstein', 1, NULL, NULL),
(127, 'LT', 'Lithuania', 1, NULL, NULL),
(128, 'LU', 'Luxembourg', 1, NULL, NULL),
(129, 'MO', 'Macau', 1, NULL, NULL),
(130, 'MK', 'Macedonia', 1, NULL, NULL),
(131, 'MG', 'Madagascar', 1, NULL, NULL),
(132, 'MW', 'Malawi', 1, NULL, NULL),
(133, 'MY', 'Malaysia', 1, NULL, NULL),
(134, 'MV', 'Maldives', 1, NULL, NULL),
(135, 'ML', 'Mali', 1, NULL, NULL),
(136, 'MT', 'Malta', 1, NULL, NULL),
(137, 'MH', 'Marshall Islands', 1, NULL, NULL),
(138, 'MQ', 'Martinique', 1, NULL, NULL),
(139, 'MR', 'Mauritania', 1, NULL, NULL),
(140, 'MU', 'Mauritius', 1, NULL, NULL),
(141, 'TY', 'Mayotte', 1, NULL, NULL),
(142, 'MX', 'Mexico', 1, NULL, NULL),
(143, 'FM', 'Micronesia, Federated States of', 1, NULL, NULL),
(144, 'MD', 'Moldova, Republic of', 1, NULL, NULL),
(145, 'MC', 'Monaco', 1, NULL, NULL),
(146, 'MN', 'Mongolia', 1, NULL, NULL),
(147, 'ME', 'Montenegro', 1, NULL, NULL),
(148, 'MS', 'Montserrat', 1, NULL, NULL),
(149, 'MA', 'Morocco', 1, NULL, NULL),
(150, 'MZ', 'Mozambique', 1, NULL, NULL),
(151, 'MM', 'Myanmar', 1, NULL, NULL),
(152, 'NA', 'Namibia', 1, NULL, NULL),
(153, 'NR', 'Nauru', 1, NULL, NULL),
(154, 'NP', 'Nepal', 1, NULL, NULL),
(155, 'NL', 'Netherlands', 1, NULL, NULL),
(156, 'AN', 'Netherlands Antilles', 1, NULL, NULL),
(157, 'NC', 'New Caledonia', 1, NULL, NULL),
(158, 'NZ', 'New Zealand', 1, NULL, NULL),
(159, 'NI', 'Nicaragua', 1, NULL, NULL),
(160, 'NE', 'Niger', 1, NULL, NULL),
(161, 'NG', 'Nigeria', 1, NULL, NULL),
(162, 'NU', 'Niue', 1, NULL, NULL),
(163, 'NF', 'Norfolk Island', 1, NULL, NULL),
(164, 'MP', 'Northern Mariana Islands', 1, NULL, NULL),
(165, 'NO', 'Norway', 1, NULL, NULL),
(166, 'OM', 'Oman', 1, NULL, NULL),
(167, 'PK', 'Pakistan', 1, NULL, NULL),
(168, 'PW', 'Palau', 1, NULL, NULL),
(169, 'PS', 'Palestine', 1, NULL, NULL),
(170, 'PA', 'Panama', 1, NULL, NULL),
(171, 'PG', 'Papua New Guinea', 1, NULL, NULL),
(172, 'PY', 'Paraguay', 1, NULL, NULL),
(173, 'PE', 'Peru', 1, NULL, NULL),
(174, 'PH', 'Philippines', 1, NULL, NULL),
(175, 'PN', 'Pitcairn', 1, NULL, NULL),
(176, 'PL', 'Poland', 1, NULL, NULL),
(177, 'PT', 'Portugal', 1, NULL, NULL),
(178, 'PR', 'Puerto Rico', 1, NULL, NULL),
(179, 'QA', 'Qatar', 1, NULL, NULL),
(180, 'RE', 'Reunion', 1, NULL, NULL),
(181, 'RO', 'Romania', 1, NULL, NULL),
(182, 'RU', 'Russian Federation', 1, NULL, NULL),
(183, 'RW', 'Rwanda', 1, NULL, NULL),
(184, 'KN', 'Saint Kitts and Nevis', 1, NULL, NULL),
(185, 'LC', 'Saint Lucia', 1, NULL, NULL),
(186, 'VC', 'Saint Vincent and the Grenadines', 1, NULL, NULL),
(187, 'WS', 'Samoa', 1, NULL, NULL),
(188, 'SM', 'San Marino', 1, NULL, NULL),
(189, 'ST', 'Sao Tome and Principe', 1, NULL, NULL),
(190, 'SA', 'Saudi Arabia', 1, NULL, NULL),
(191, 'SN', 'Senegal', 1, NULL, NULL),
(192, 'RS', 'Serbia', 1, NULL, NULL),
(193, 'SC', 'Seychelles', 1, NULL, NULL),
(194, 'SL', 'Sierra Leone', 1, NULL, NULL),
(195, 'SG', 'Singapore', 1, NULL, NULL),
(196, 'SK', 'Slovakia', 1, NULL, NULL),
(197, 'SI', 'Slovenia', 1, NULL, NULL),
(198, 'SB', 'Solomon Islands', 1, NULL, NULL),
(199, 'SO', 'Somalia', 1, NULL, NULL),
(200, 'ZA', 'South Africa', 1, NULL, NULL),
(201, 'GS', 'South Georgia South Sandwich Islands', 1, NULL, NULL),
(202, 'SS', 'South Sudan', 1, NULL, NULL),
(203, 'ES', 'Spain', 1, NULL, NULL),
(204, 'LK', 'Sri Lanka', 1, NULL, NULL),
(205, 'SH', 'St. Helena', 1, NULL, NULL),
(206, 'PM', 'St. Pierre and Miquelon', 1, NULL, NULL),
(207, 'SD', 'Sudan', 1, NULL, NULL),
(208, 'SR', 'Suriname', 1, NULL, NULL),
(209, 'SJ', 'Svalbard and Jan Mayen Islands', 1, NULL, NULL),
(210, 'SZ', 'Swaziland', 1, NULL, NULL),
(211, 'SE', 'Sweden', 1, NULL, NULL),
(212, 'CH', 'Switzerland', 1, NULL, NULL),
(213, 'SY', 'Syrian Arab Republic', 1, NULL, NULL),
(214, 'TW', 'Taiwan', 1, NULL, NULL),
(215, 'TJ', 'Tajikistan', 1, NULL, NULL),
(216, 'TZ', 'Tanzania, United Republic of', 1, NULL, NULL),
(217, 'TH', 'Thailand', 1, NULL, NULL),
(218, 'TG', 'Togo', 1, NULL, NULL),
(219, 'TK', 'Tokelau', 1, NULL, NULL),
(220, 'TO', 'Tonga', 1, NULL, NULL),
(221, 'TT', 'Trinidad and Tobago', 1, NULL, NULL),
(222, 'TN', 'Tunisia', 1, NULL, NULL),
(223, 'TR', 'Turkey', 1, NULL, NULL),
(224, 'TM', 'Turkmenistan', 1, NULL, NULL),
(225, 'TC', 'Turks and Caicos Islands', 1, NULL, NULL),
(226, 'TV', 'Tuvalu', 1, NULL, NULL),
(227, 'UG', 'Uganda', 1, NULL, NULL),
(228, 'UA', 'Ukraine', 1, NULL, NULL),
(229, 'AE', 'United Arab Emirates', 1, NULL, NULL),
(230, 'GB', 'United Kingdom', 1, NULL, NULL),
(231, 'US', 'United States', 1, NULL, NULL),
(232, 'UM', 'United States minor outlying islands', 1, NULL, NULL),
(233, 'UY', 'Uruguay', 1, NULL, NULL),
(234, 'UZ', 'Uzbekistan', 1, NULL, NULL),
(235, 'VU', 'Vanuatu', 1, NULL, NULL),
(236, 'VA', 'Vatican City State', 1, NULL, NULL),
(237, 'VE', 'Venezuela', 1, NULL, NULL),
(238, 'VN', 'Vietnam', 1, NULL, NULL),
(239, 'VG', 'Virgin Islands (British)', 1, NULL, NULL),
(240, 'VI', 'Virgin Islands (U.S.)', 1, NULL, NULL),
(241, 'WF', 'Wallis and Futuna Islands', 1, NULL, NULL),
(242, 'EH', 'Western Sahara', 1, NULL, NULL),
(243, 'YE', 'Yemen', 1, NULL, NULL),
(244, 'ZR', 'Zaire', 1, NULL, NULL),
(245, 'ZM', 'Zambia', 1, NULL, NULL),
(246, 'ZW', 'Zimbabwe', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `discount` double(20,2) NOT NULL,
  `discount_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` int(15) NOT NULL,
  `end_date` int(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_usages`
--

CREATE TABLE `coupon_usages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `symbol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `exchange_rate` double(10,5) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 0,
  `code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `symbol`, `exchange_rate`, `status`, `code`, `created_at`, `updated_at`) VALUES
(1, 'U.S. Dollar', '$', 1.00000, 1, 'USD', '2018-10-09 11:35:08', '2018-10-17 05:50:52'),
(2, 'Australian Dollar', '$', 1.28000, 1, 'AUD', '2018-10-09 11:35:08', '2019-02-04 05:51:55'),
(5, 'Brazilian Real', 'R$', 3.25000, 1, 'BRL', '2018-10-09 11:35:08', '2018-10-17 05:51:00'),
(6, 'Canadian Dollar', '$', 1.27000, 1, 'CAD', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(7, 'Czech Koruna', 'Kč', 20.65000, 1, 'CZK', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(8, 'Danish Krone', 'kr', 6.05000, 1, 'DKK', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(9, 'Euro', '€', 0.85000, 1, 'EUR', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(10, 'Hong Kong Dollar', '$', 7.83000, 1, 'HKD', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(11, 'Hungarian Forint', 'Ft', 255.24000, 1, 'HUF', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(12, 'Israeli New Sheqel', '₪', 3.48000, 1, 'ILS', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(13, 'Japanese Yen', '¥', 107.12000, 1, 'JPY', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(14, 'Malaysian Ringgit', 'RM', 3.91000, 1, 'MYR', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(15, 'Mexican Peso', '$', 18.72000, 1, 'MXN', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(16, 'Norwegian Krone', 'kr', 7.83000, 1, 'NOK', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(17, 'New Zealand Dollar', '$', 1.38000, 1, 'NZD', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(18, 'Philippine Peso', '₱', 52.26000, 1, 'PHP', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(19, 'Polish Zloty', 'zł', 3.39000, 1, 'PLN', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(20, 'Pound Sterling', '£', 0.72000, 1, 'GBP', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(21, 'Russian Ruble', 'руб', 55.93000, 1, 'RUB', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(22, 'Singapore Dollar', '$', 1.32000, 1, 'SGD', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(23, 'Swedish Krona', 'kr', 8.19000, 1, 'SEK', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(24, 'Swiss Franc', 'CHF', 0.94000, 1, 'CHF', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(26, 'Thai Baht', '฿', 31.39000, 1, 'THB', '2018-10-09 11:35:08', '2018-10-09 11:35:08'),
(27, 'Taka', '৳', 84.00000, 1, 'BDT', '2018-10-09 11:35:08', '2018-12-02 05:16:13'),
(28, 'Indian Rupee', 'Rs', 68.45000, 1, 'Rupee', '2019-07-07 10:33:46', '2019-07-07 10:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 8, '2019-08-01 10:35:09', '2019-08-01 10:35:09'),
(5, 10, '2021-01-24 03:12:10', '2021-01-24 03:12:10'),
(6, 11, '2021-01-26 02:03:52', '2021-01-26 02:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `customer_packages`
--

CREATE TABLE `customer_packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `product_upload` int(11) DEFAULT NULL,
  `logo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_packages`
--

INSERT INTO `customer_packages` (`id`, `name`, `amount`, `product_upload`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Gold', 400.00, 25, '16', '2021-01-24 05:17:30', '2021-01-24 05:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `customer_package_payments`
--

CREATE TABLE `customer_package_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `customer_package_id` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `approval` int(1) NOT NULL,
  `offline_payment` int(1) NOT NULL COMMENT '1=offline payment\r\n2=online paymnet',
  `reciept` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_package_translations`
--

CREATE TABLE `customer_package_translations` (
  `id` bigint(20) NOT NULL,
  `customer_package_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_package_translations`
--

INSERT INTO `customer_package_translations` (`id`, `customer_package_id`, `name`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Gold', 'bd', '2021-01-24 05:17:30', '2021-01-24 05:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `customer_products`
--

CREATE TABLE `customer_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` int(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 0,
  `added_by` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `subsubcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `photos` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_img` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conditon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_provider` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` double(20,2) DEFAULT 0.00,
  `meta_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_img` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pdf` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_product_translations`
--

CREATE TABLE `customer_product_translations` (
  `id` bigint(20) NOT NULL,
  `customer_product_id` bigint(20) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_deals`
--

CREATE TABLE `flash_deals` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_date` int(20) DEFAULT NULL,
  `end_date` int(20) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `featured` int(1) NOT NULL DEFAULT 0,
  `background_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_deal_products`
--

CREATE TABLE `flash_deal_products` (
  `id` int(11) NOT NULL,
  `flash_deal_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `discount` double(20,2) DEFAULT 0.00,
  `discount_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flash_deal_translations`
--

CREATE TABLE `flash_deal_translations` (
  `id` bigint(20) NOT NULL,
  `flash_deal_id` bigint(20) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `frontend_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default',
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_login_background` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_login_sidebar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_plus` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `frontend_color`, `logo`, `footer_logo`, `admin_logo`, `admin_login_background`, `admin_login_sidebar`, `favicon`, `site_name`, `address`, `description`, `phone`, `email`, `facebook`, `instagram`, `twitter`, `youtube`, `google_plus`, `created_at`, `updated_at`) VALUES
(1, 'default', 'uploads/logo/pfdIuiMeXGkDAIpPEUrvUCbQrOHu484nbGfz77zB.png', NULL, 'uploads/admin_logo/wCgHrz0Q5QoL1yu4vdrNnQIr4uGuNL48CXfcxOuS.png', NULL, NULL, 'uploads/favicon/uHdGidSaRVzvPgDj6JFtntMqzJkwDk9659233jrb.png', 'Active Ecommerce CMS', 'Demo Address', 'Active eCommerce CMS is a Multi vendor system is such a platform to build a border less marketplace.', '1234567890', 'admin@example.com', 'https://www.facebook.com', 'https://www.instagram.com', 'https://www.twitter.com', 'https://www.youtube.com', 'https://www.googleplus.com', '2019-03-13 08:01:06', '2019-03-13 02:01:06');

-- --------------------------------------------------------

--
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subsubcategories` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `category_id`, `subsubcategories`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"1\"]', 1, '2019-03-12 06:38:23', '2019-03-12 06:38:23'),
(2, 2, '[\"10\"]', 1, '2019-03-12 06:44:54', '2019-03-12 06:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rtl` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `rtl`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 0, '2019-01-20 12:13:20', '2021-01-26 11:41:57'),
(3, 'Bangla', 'bd', 0, '2019-02-17 06:35:37', '2021-01-24 21:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf32_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversation_id`, `user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'http://localhost/Amar%20Bebsha%20Limited/Orientbd%20E-commerce/oriend-active-ecommerce/product/hp-pavilion-15-au072tx-ipzea\r\n\r\nhi is this available', '2021-01-24 04:35:34', '2021-01-24 04:35:34'),
(2, 2, 10, 'http://localhost/Amar%20Bebsha%20Limited/Orientbd%20E-commerce/oriend-active-ecommerce/product/hp-pavilion-15-au072tx-ipzea\r\n\r\n\r\nhii', '2021-01-24 04:45:10', '2021-01-24 04:45:10'),
(3, 3, 10, 'kire ki koros', '2021-01-24 05:43:48', '2021-01-24 05:43:48'),
(4, 3, 9, 'valo', '2021-01-24 05:44:35', '2021-01-24 05:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('125ce8289850f80d9fea100325bf892fbd0deba1f87dbfc2ab81fb43d57377ec24ed65f7dc560e46', 1, 1, 'Personal Access Token', '[]', 0, '2019-07-30 04:51:13', '2019-07-30 04:51:13', '2020-07-30 10:51:13'),
('293d2bb534220c070c4e90d25b5509965d23d3ddbc05b1e29fb4899ae09420ff112dbccab1c6f504', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 06:00:04', '2019-08-04 06:00:04', '2020-08-04 12:00:04'),
('5363e91c7892acdd6417aa9c7d4987d83568e229befbd75be64282dbe8a88147c6c705e06c1fb2bf', 1, 1, 'Personal Access Token', '[]', 0, '2019-07-13 06:44:28', '2019-07-13 06:44:28', '2020-07-13 12:44:28'),
('681b4a4099fac5e12517307b4027b54df94cbaf0cbf6b4bf496534c94f0ccd8a79dd6af9742d076b', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 07:23:06', '2019-08-04 07:23:06', '2020-08-04 13:23:06'),
('6d229e3559e568df086c706a1056f760abc1370abe74033c773490581a042442154afa1260c4b6f0', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 07:32:12', '2019-08-04 07:32:12', '2020-08-04 13:32:12'),
('6efc0f1fc3843027ea1ea7cd35acf9c74282f0271c31d45a164e7b27025a315d31022efe7bb94aaa', 1, 1, 'Personal Access Token', '[]', 0, '2019-08-08 02:35:26', '2019-08-08 02:35:26', '2020-08-08 08:35:26'),
('7745b763da15a06eaded371330072361b0524c41651cf48bf76fc1b521a475ece78703646e06d3b0', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 07:29:44', '2019-08-04 07:29:44', '2020-08-04 13:29:44'),
('815b625e239934be293cd34479b0f766bbc1da7cc10d464a2944ddce3a0142e943ae48be018ccbd0', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-22 02:07:47', '2019-07-22 02:07:47', '2020-07-22 08:07:47'),
('8921a4c96a6d674ac002e216f98855c69de2568003f9b4136f6e66f4cb9545442fb3e37e91a27cad', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 06:05:05', '2019-08-04 06:05:05', '2020-08-04 12:05:05'),
('8d8b85720304e2f161a66564cec0ecd50d70e611cc0efbf04e409330086e6009f72a39ce2191f33a', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 06:44:35', '2019-08-04 06:44:35', '2020-08-04 12:44:35'),
('bcaaebdead4c0ef15f3ea6d196fd80749d309e6db8603b235e818cb626a5cea034ff2a55b66e3e1a', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 07:14:32', '2019-08-04 07:14:32', '2020-08-04 13:14:32'),
('c25417a5c728073ca8ba57058ded43d496a9d2619b434d2a004dd490a64478c08bc3e06ffc1be65d', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-30 01:45:31', '2019-07-30 01:45:31', '2020-07-30 07:45:31'),
('c7423d85b2b5bdc5027cb283be57fa22f5943cae43f60b0ed27e6dd198e46f25e3501b3081ed0777', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-05 05:02:59', '2019-08-05 05:02:59', '2020-08-05 11:02:59'),
('e76f19dbd5c2c4060719fb1006ac56116fd86f7838b4bf74e2c0a0ac9696e724df1e517dbdb357f4', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-15 02:53:40', '2019-07-15 02:53:40', '2020-07-15 08:53:40'),
('ed7c269dd6f9a97750a982f62e0de54749be6950e323cdfef892a1ec93f8ddbacf9fe26e6a42180e', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-13 06:36:45', '2019-07-13 06:36:45', '2020-07-13 12:36:45'),
('f6d1475bc17a27e389000d3df4da5c5004ce7610158b0dd414226700c0f6db48914637b4c76e1948', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 07:22:01', '2019-08-04 07:22:01', '2020-08-04 13:22:01'),
('f85e4e444fc954430170c41779a4238f84cd6fed905f682795cd4d7b6a291ec5204a10ac0480eb30', 1, 1, 'Personal Access Token', '[]', 1, '2019-07-30 06:38:49', '2019-07-30 06:38:49', '2020-07-30 12:38:49'),
('f8bf983a42c543b99128296e4bc7c2d17a52b5b9ef69670c629b93a653c6a4af27be452e0c331f79', 1, 1, 'Personal Access Token', '[]', 1, '2019-08-04 07:28:55', '2019-08-04 07:28:55', '2020-08-04 13:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'eR2y7WUuem28ugHKppFpmss7jPyOHZsMkQwBo1Jj', 'http://localhost', 1, 0, 0, '2019-07-13 06:17:34', '2019-07-13 06:17:34'),
(2, NULL, 'Laravel Password Grant Client', 'WLW2Ol0GozbaXEnx1NtXoweYPuKEbjWdviaUgw77', 'http://localhost', 0, 1, 0, '2019-07-13 06:17:34', '2019-07-13 06:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-07-13 06:17:34', '2019-07-13 06:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `guest_id` int(11) DEFAULT NULL,
  `shipping_address` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'unpaid',
  `payment_details` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `grand_total` double(20,2) DEFAULT NULL,
  `coupon_discount` double(20,2) NOT NULL DEFAULT 0.00,
  `code` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(20) NOT NULL,
  `viewed` int(1) NOT NULL DEFAULT 0,
  `delivery_viewed` int(1) NOT NULL DEFAULT 1,
  `payment_status_viewed` int(1) DEFAULT 1,
  `commission_calculated` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `guest_id`, `shipping_address`, `payment_type`, `payment_status`, `payment_details`, `grand_total`, `coupon_discount`, `code`, `date`, `viewed`, `delivery_viewed`, `payment_status_viewed`, `commission_calculated`, `created_at`, `updated_at`) VALUES
(1, 9, NULL, '{\"name\":\"admin\",\"email\":\"admin@gmail.com\",\"address\":\"Subang Avenue\\r\\nSubang Jaya\",\"country\":\"Malaysia\",\"city\":\"Selangor\",\"postal_code\":\"47500\",\"phone\":\"01112011350\",\"checkout_type\":\"logged\"}', 'iyzico', 'unpaid', NULL, 24150.00, 0.00, '20210124-08585815', 1611478738, 0, 0, 0, 0, '2021-01-24 02:58:58', '2021-01-24 02:58:59'),
(2, 10, NULL, '{\"name\":\"Minhaz\",\"email\":\"user@gmail.com\",\"address\":\"Subang Avenue\\r\\nSubang Jaya\",\"country\":\"Malaysia\",\"city\":\"Selangor\",\"postal_code\":\"47500\",\"phone\":\"01112011350\",\"checkout_type\":\"logged\"}', 'cash_on_delivery', 'paid', NULL, 2415.00, 0.00, '20210124-09133962', 1611479619, 1, 0, 1, 1, '2021-01-24 03:13:39', '2021-01-24 04:12:33'),
(3, 10, NULL, '{\"name\":\"Minhaz\",\"email\":\"user@gmail.com\",\"address\":\"Subang Avenue\\r\\nSubang Jaya\",\"country\":\"Malaysia\",\"city\":\"Selangor\",\"postal_code\":\"47500\",\"phone\":\"01112011350\",\"checkout_type\":\"logged\"}', 'sslcommerz', 'unpaid', NULL, 2415.00, 0.00, '20210125-04361436', 1611549374, 0, 0, 0, 0, '2021-01-24 22:36:14', '2021-01-24 22:36:15'),
(4, 10, NULL, '{\"name\":\"Minhaz\",\"email\":\"user@gmail.com\",\"address\":\"Subang Avenue\\r\\nSubang Jaya\",\"country\":\"Malaysia\",\"city\":\"Selangor\",\"postal_code\":\"47500\",\"phone\":\"01112011350\",\"checkout_type\":\"logged\"}', 'bkash', 'unpaid', NULL, 2415.00, 0.00, '20210125-04362730', 1611549387, 0, 0, 0, 0, '2021-01-24 22:36:27', '2021-01-24 22:36:27'),
(5, 10, NULL, '{\"name\":\"Minhaz\",\"email\":\"user@gmail.com\",\"address\":\"Subang Avenue\\r\\nSubang Jaya\",\"country\":\"Malaysia\",\"city\":\"Selangor\",\"postal_code\":\"47500\",\"phone\":\"01112011350\",\"checkout_type\":\"logged\"}', 'bkash', 'unpaid', NULL, 2415.00, 0.00, '20210125-04372230', 1611549442, 0, 0, 0, 0, '2021-01-24 22:37:22', '2021-01-24 22:37:23'),
(6, 10, NULL, '{\"name\":\"Minhaz\",\"email\":\"user@gmail.com\",\"address\":\"Subang Avenue\\r\\nSubang Jaya\",\"country\":\"Malaysia\",\"city\":\"Selangor\",\"postal_code\":\"47500\",\"phone\":\"01112011350\",\"checkout_type\":\"logged\"}', 'sslcommerz', 'unpaid', NULL, 2415.00, 0.00, '20210125-04372861', 1611549448, 0, 1, 1, 0, '2021-01-24 22:37:28', '2021-01-25 23:32:27'),
(7, 10, NULL, '{\"name\":\"Minhaz\",\"email\":\"user@gmail.com\",\"address\":\"Subang Avenue\\r\\nSubang Jaya\",\"country\":\"Malaysia\",\"city\":\"Selangor\",\"postal_code\":\"47500\",\"phone\":\"01112011350\",\"checkout_type\":\"logged\"}', 'nagad', 'unpaid', NULL, 2415.00, 0.00, '20210125-04373381', 1611549453, 0, 1, 1, 0, '2021-01-24 22:37:33', '2021-01-25 23:32:04'),
(8, 9, NULL, '{\"name\":\"admin\",\"email\":\"admin@gmail.com\",\"address\":\"Subang Avenue\\r\\nSubang Jaya\",\"country\":\"Malaysia\",\"city\":\"Selangor\",\"postal_code\":\"47500\",\"phone\":\"01112011350\",\"checkout_type\":\"logged\"}', 'sslcommerz', 'unpaid', NULL, 700.00, 0.00, '20210126-15581226', 1611655092, 0, 0, 0, 0, '2021-01-26 09:58:12', '2021-01-26 09:58:13'),
(9, 10, NULL, '{\"name\":\"Minhaz\",\"email\":\"user@gmail.com\",\"address\":\"Subang Avenue\\r\\nSubang Jaya\",\"country\":\"Malaysia\",\"city\":\"Selangor\",\"postal_code\":\"47500\",\"phone\":\"01112011350\",\"checkout_type\":\"logged\"}', 'sslcommerz', 'paid', '{\"tran_id\":\"45c48cce2e\",\"val_id\":\"210126185454BSzXJBsNFp6bXIg\",\"amount\":\"600.00\",\"card_type\":\"DBBLMOBILEB-Dbbl Mobile Banking\",\"store_amount\":\"585.00\",\"card_no\":null,\"bank_tran_id\":\"2101261854540sl3LEqAN58gnVk\",\"status\":\"VALID\",\"tran_date\":\"2021-01-26 18:54:43\",\"currency\":\"BDT\",\"card_issuer\":\"DBBL Mobile Banking\",\"card_brand\":\"MOBILEBANKING\",\"card_issuer_country\":\"Bangladesh\",\"card_issuer_country_code\":\"BD\",\"store_id\":\"testbox\",\"verify_sign\":\"d546dc34743572351d30825fa5bed5a9\",\"verify_key\":\"amount,bank_tran_id,base_fair,card_brand,card_issuer,card_issuer_country,card_issuer_country_code,card_no,card_type,currency,currency_amount,currency_rate,currency_type,risk_level,risk_title,status,store_amount,store_id,tran_date,tran_id,val_id,value_a,value_b,value_c,value_d\",\"verify_sign_sha2\":\"ed82f8596c10493c89030953fcf4b6617eb464f4c9c6429dc2331018acc32271\",\"currency_type\":\"BDT\",\"currency_amount\":\"600.00\",\"currency_rate\":\"1.0000\",\"base_fair\":\"0.00\",\"value_a\":\"45c48cce2e\",\"value_b\":\"9\",\"value_c\":\"cart_payment\",\"value_d\":null,\"risk_level\":\"0\",\"risk_title\":\"Safe\"}', 600.00, 0.00, '20210126-18504080', 1611665440, 0, 0, 0, 1, '2021-01-26 12:50:40', '2021-01-26 12:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `variation` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(20,2) DEFAULT NULL,
  `tax` double(20,2) NOT NULL DEFAULT 0.00,
  `shipping_cost` double(20,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) DEFAULT NULL,
  `payment_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unpaid',
  `delivery_status` varchar(20) COLLATE utf8_unicode_ci DEFAULT 'pending',
  `shipping_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pickup_point_id` int(11) DEFAULT NULL,
  `product_referral_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `seller_id`, `product_id`, `variation`, `price`, `tax`, `shipping_cost`, `quantity`, `payment_status`, `delivery_status`, `shipping_type`, `pickup_point_id`, `product_referral_code`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 1, '', 23000.00, 1150.00, 0.00, 10, 'unpaid', 'pending', 'home_delivery', NULL, NULL, '2021-01-24 02:58:59', '2021-01-24 02:58:59'),
(2, 2, 9, 1, '', 2300.00, 115.00, 0.00, 1, 'paid', 'delivered', 'home_delivery', NULL, NULL, '2021-01-24 03:13:39', '2021-01-24 04:13:25'),
(3, 3, 9, 2, '', 2300.00, 115.00, 0.00, 1, 'unpaid', 'pending', 'home_delivery', NULL, NULL, '2021-01-24 22:36:14', '2021-01-24 22:36:14'),
(4, 4, 9, 2, '', 2300.00, 115.00, 0.00, 1, 'unpaid', 'pending', 'home_delivery', NULL, NULL, '2021-01-24 22:36:27', '2021-01-24 22:36:27'),
(5, 5, 9, 2, '', 2300.00, 115.00, 0.00, 1, 'unpaid', 'pending', 'home_delivery', NULL, NULL, '2021-01-24 22:37:22', '2021-01-24 22:37:22'),
(6, 6, 9, 2, '', 2300.00, 115.00, 0.00, 1, 'unpaid', 'pending', 'home_delivery', NULL, NULL, '2021-01-24 22:37:28', '2021-01-24 22:37:28'),
(7, 7, 9, 2, '', 2300.00, 115.00, 0.00, 1, 'unpaid', 'pending', 'home_delivery', NULL, NULL, '2021-01-24 22:37:33', '2021-01-24 22:37:33'),
(8, 8, 9, 11, '', 700.00, 0.00, 0.00, 1, 'unpaid', 'pending', 'home_delivery', NULL, NULL, '2021-01-26 09:58:12', '2021-01-26 09:58:12'),
(9, 9, 9, 13, 'Black-4kdual', 600.00, 0.00, 0.00, 1, 'paid', 'pending', 'pickup_point', 1, NULL, '2021-01-26 12:50:40', '2021-01-26 12:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `type`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `keywords`, `meta_image`, `created_at`, `updated_at`) VALUES
(1, 'home_page', 'Home Page', 'home', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:13:20', '2020-11-04 10:13:20'),
(2, 'seller_policy_page', 'Seller Policy Pages', 'sellerpolicy', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:14:41', '2020-11-04 12:19:30'),
(3, 'return_policy_page', 'Return Policy Page', 'returnpolicy', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:14:41', '2020-11-04 10:14:41'),
(4, 'support_policy_page', 'Support Policy Page', 'supportpolicy', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:14:59', '2020-11-04 10:14:59'),
(5, 'terms_conditions_page', 'Term Conditions Page', 'terms', NULL, NULL, NULL, NULL, NULL, '2020-11-04 10:15:29', '2020-11-04 10:15:29'),
(6, 'privacy_policy_page', 'Privacy Policy Page', 'privacypolicy', '<p>efergrtgrtg</p><p>rgttr</p>', NULL, NULL, NULL, NULL, '2020-11-04 10:15:55', '2021-01-26 11:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `page_translations`
--

CREATE TABLE `page_translations` (
  `id` bigint(20) NOT NULL,
  `page_id` bigint(20) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_translations`
--

INSERT INTO `page_translations` (`id`, `page_id`, `title`, `content`, `lang`, `created_at`, `updated_at`) VALUES
(1, 6, 'Privacy Policy Page', '<p>efergrtgrtg</p><p>rgttr</p>', 'en', '2021-01-26 11:45:32', '2021-01-26 11:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL DEFAULT 0.00,
  `payment_details` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `txn_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_points`
--

CREATE TABLE `pickup_points` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pick_up_status` int(1) DEFAULT NULL,
  `cash_on_pickup_status` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickup_points`
--

INSERT INTO `pickup_points` (`id`, `staff_id`, `name`, `address`, `phone`, `pick_up_status`, `cash_on_pickup_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pickup Point', '8/2, Motalib Tower (1st floor) Flat-2C, Paribag Dhaka-1000, Bangladesh', '01841-695 -695', 1, NULL, '2021-01-26 12:48:59', '2021-01-26 12:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_point_translations`
--

CREATE TABLE `pickup_point_translations` (
  `id` bigint(20) NOT NULL,
  `pickup_point_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pickup_point_translations`
--

INSERT INTO `pickup_point_translations` (`id`, `pickup_point_id`, `name`, `address`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pickup Point', '8/2, Motalib Tower (1st floor) Flat-2C, Paribag Dhaka-1000, Bangladesh', 'en', '2021-01-26 12:48:59', '2021-01-26 12:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'support_policy', NULL, '2019-10-29 12:54:45', '2019-01-22 05:13:15'),
(2, 'return_policy', NULL, '2019-10-29 12:54:47', '2019-01-24 05:40:11'),
(4, 'seller_policy', NULL, '2019-10-29 12:54:49', '2019-02-04 17:50:15'),
(5, 'terms', NULL, '2019-10-29 12:54:51', '2019-10-28 18:00:00'),
(6, 'privacy_policy', NULL, '2019-10-29 12:54:54', '2019-10-28 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `added_by` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `subsubcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `photos` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail_img` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_provider` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_link` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` double(20,2) NOT NULL,
  `purchase_price` double(20,2) NOT NULL,
  `variant_product` int(1) NOT NULL DEFAULT 0,
  `attributes` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `choice_options` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `colors` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `variations` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `todays_deal` int(11) NOT NULL DEFAULT 0,
  `published` int(11) NOT NULL DEFAULT 1,
  `featured` int(11) NOT NULL DEFAULT 0,
  `seller_featured` int(11) NOT NULL DEFAULT 0,
  `current_stock` int(10) NOT NULL DEFAULT 0,
  `unit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_qty` int(11) NOT NULL DEFAULT 1,
  `discount` double(20,2) DEFAULT NULL,
  `discount_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax` double(20,2) DEFAULT NULL,
  `tax_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_type` varchar(20) CHARACTER SET latin1 DEFAULT 'flat_rate',
  `shipping_cost` double(20,2) DEFAULT 0.00,
  `num_of_sale` int(11) NOT NULL DEFAULT 0,
  `meta_title` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pdf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `rating` double(8,2) NOT NULL DEFAULT 0.00,
  `barcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `digital` int(1) NOT NULL DEFAULT 0,
  `file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `added_by`, `user_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `brand_id`, `photos`, `thumbnail_img`, `video_provider`, `video_link`, `tags`, `description`, `unit_price`, `purchase_price`, `variant_product`, `attributes`, `choice_options`, `colors`, `variations`, `todays_deal`, `published`, `featured`, `seller_featured`, `current_stock`, `unit`, `min_qty`, `discount`, `discount_type`, `tax`, `tax_type`, `shipping_type`, `shipping_cost`, `num_of_sale`, `meta_title`, `meta_description`, `meta_img`, `pdf`, `slug`, `rating`, `barcode`, `digital`, `file_name`, `file_path`, `created_at`, `updated_at`) VALUES
(3, 'Acer 22-inch Monitor EK220Q / EK220QA Full HD (1920 x1080) LCD Black (HDMI, VGA Port, 75Hz)', 'admin', 9, 30, NULL, NULL, 22, '88,89,90', '91', 'youtube', 'https://www.youtube.com/watch?v=1bbnztC8n7w', 'acer,monitor,gaming', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Display Size:                                                 23.8\'\'   \r\nMaximum Resolution &amp; Refresh Rate:     - HDMI (1.4):1920x1080@144Hz; \r\n                                                                        - HDMI (2.0):1920x1080 @165Hz; \r\n                                                                        - DP:1920x1080@165Hz\r\nPanel:                                                             VA\r\nResponse Time:                                           1ms (TVR)\r\nContrast Ratio:                                             100,000,000:1(ACM)\r\nBrightness:                                                    250 nits (cd/m2)\r\nViewing Angle:                                              178°(H),178°(V)\r\nColours:                                                         16.7M\r\nBits:                                                                8Bit\r\nVESA Wall Mounting:                                  100x100mm\r\nSpeaker:                                                         No\r\nPower Supply (100-240V) :                         Internal\r\nTilt:                                                                 -5°~ 20°\r\nInput Signal:                                                - 1HDMI(1.4) + 1HDMI(2.0) + DP</span><br></p>', 17000.00, 15000.00, 0, '[]', '[]', '[]', NULL, 0, 1, 1, 0, 10, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'free', 0.00, 0, 'Acer 22-inch Monitor EK220Q / EK220QA Full HD (1920 x1080) LCD Black (HDMI, VGA Port, 75Hz)', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Display Size:                                                 23.8\'\'   \r\nMaximum Resolution &amp; Refresh Rate:     - HDMI (1.4):1920x1080@144Hz; \r\n                                                                        - HDMI (2.0):1920x1080 @165Hz; \r\n                                                                        - DP:1920x1080@165Hz\r\nPanel:                                                             VA\r\nResponse Time:                                           1ms (TVR)\r\nContrast Ratio:                                             100,000,000:1(ACM)\r\nBrightness:                                                    250 nits (cd/m2)\r\nViewing Angle:                                              178°(H),178°(V)\r\nColours:                                                         16.7M\r\nBits:                                                                8Bit\r\nVESA Wall Mounting:                                  100x100mm\r\nSpeaker:                                                         No\r\nPower Supply (100-240V) :                         Internal\r\nTilt:                                                                 -5°~ 20°\r\nInput Signal:                                                - 1HDMI(1.4) + 1HDMI(2.0) + DP</span><br></p>', NULL, NULL, 'acer-22-inch-monitor-ek220q--ek220qa-full-hd-1920-x1080-lcd-black-hdmi-vga-port-75hz-8e8yc', 0.00, NULL, 0, NULL, NULL, '2021-01-25 22:56:06', '2021-01-26 09:48:36'),
(7, 'ACER G227HQL 21.5 Inch Full HD IPS Monitor', 'admin', 9, 38, NULL, NULL, 22, '93,94,95', '97', 'youtube', NULL, 'acer,monitor', NULL, 14000.00, 10000.00, 1, '[\"1\"]', '[{\"attribute_id\":\"1\",\"values\":[\"22\",\"21\"]}]', '[\"#9966CC\",\"#FFE4C4\"]', NULL, 1, 1, 1, 0, 0, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'flat_rate', 100.00, 0, 'ACER G227HQL 21.5 Inch Full HD IPS Monitor', NULL, NULL, NULL, 'acer-g227hql-215-inch-full-hd-ips-monitor-kb37s', 0.00, NULL, 0, NULL, NULL, '2021-01-26 00:10:34', '2021-01-26 09:48:35'),
(10, 'ANBIUX 2MP PTZ WIFI IP Camera Outdoor 1080P 4X Digital Zoom Wireless Security CCTV Camera', 'admin', 9, 39, NULL, NULL, 16, '98,99,100', '137', 'youtube', NULL, 'camera,cctv,security', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">*HD 2MP Resoluton;\r\n\r\n*Support 4.0X Digital Zoom;\r\n\r\n*Support true humanoid intelligent alert double light;\r\n\r\n*Support black light full color, color night vision is clear;\r\n\r\n*Three modes preview, black light full color infrared night vision double light warning;\r\n\r\n*Support ONVIF protocol recorder add; CMS computer client save and play in real time;\r\n\r\n*Alarm mode custom setting: DIY custom setting alarm bell;\r\n\r\n*Humanoid detection: mixing line, area, two-way flow detection, for human form, the item triggers no alarm;\r\n\r\n* Customized new speakers with loud volume, 4w high power;\r\n\r\n*PTZ: rotates 270 degrees left and right and rotates 90 degrees vertically;\r\n\r\n*Dual Antenna 5DB transmits signals, high gain design, and the signal is bigger and stronger;\r\n\r\n*H.265X new storage design, TF card storage is lower, more stable and more durable;\r\n\r\n*Three matching connection modes: AP hotspot direct connection/wireless WiFi connection/bringing network port wired connection;\r\n\r\n*Exclusive patented spherical heat treatment, with an average of 30 degrees, let the screen exposure heat dry and disappear;\r\n\r\n*Free 30-day cloud storage, data security is more stable 1 times.\r\n</span></p><div><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\"><br></span></div>', 1600.00, 1300.00, 1, '[\"1\",\"2\"]', '[{\"attribute_id\":\"1\",\"values\":[\"1080P\",\"780P\"]},{\"attribute_id\":\"2\",\"values\":[\"32GB\",\"8GB\"]}]', '[]', NULL, 0, 1, 1, 0, 0, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'flat_rate', 200.00, 0, 'ANBIUX 2MP PTZ WIFI IP Camera Outdoor 1080P 4X Digital Zoom Wireless Security CCTV Camera', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">*HD 2MP Resoluton;\r\n\r\n*Support 4.0X Digital Zoom;\r\n\r\n*Support true humanoid intelligent alert double light;\r\n\r\n*Support black light full color, color night vision is clear;\r\n\r\n*Three modes preview, black light full color infrared night vision double light warning;\r\n\r\n*Support ONVIF protocol recorder add; CMS computer client save and play in real time;\r\n\r\n*Alarm mode custom setting: DIY custom setting alarm bell;\r\n\r\n*Humanoid detection: mixing line, area, two-way flow detection, for human form, the item triggers no alarm;\r\n\r\n* Customized new speakers with loud volume, 4w high power;\r\n\r\n*PTZ: rotates 270 degrees left and right and rotates 90 degrees vertically;\r\n\r\n*Dual Antenna 5DB transmits signals, high gain design, and the signal is bigger and stronger;\r\n\r\n*H.265X new storage design, TF card storage is lower, more stable and more durable;\r\n\r\n*Three matching connection modes: AP hotspot direct connection/wireless WiFi connection/bringing network port wired connection;\r\n\r\n*Exclusive patented spherical heat treatment, with an average of 30 degrees, let the screen exposure heat dry and disappear;\r\n\r\n*Free 30-day cloud storage, data security is more stable 1 times.\r\n</span></p><div><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\"><br></span></div>', NULL, '102', 'anbiux-2mp-ptz-wifi-ip-camera-outdoor-1080p-4x-digital-zoom-wireless-security-cctv-camera-oa5ef', 0.00, NULL, 0, NULL, NULL, '2021-01-26 01:22:40', '2021-01-26 10:50:22'),
(11, 'V380 WIFI Mini Spy Camera Mini Wireless1080P HD Hot Link Remote Surveillance Camera Recorder 360 Degrees', 'admin', 9, 40, NULL, NULL, 17, '105,106,107', '104', 'youtube', 'https://www.youtube.com/watch?app=desktop&v=pHFgkqc78HI', 'cameras,wifi cam,spy,spy cam', '<div class=\"kP-bM3\" style=\"background: rgba(0, 0, 0, 0.02); color: rgba(0, 0, 0, 0.87); font-size: 1.125rem; padding: 0.875rem; text-transform: capitalize; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif;\">Product Description</div><div class=\"_2aZyWI\" style=\"margin: 1.875rem 0.9375rem 0.9375rem; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px;\"><div class=\"_2u0jt9\" style=\"white-space: pre-wrap; font-size: 0.875rem; overflow: hidden; text-overflow: ellipsis; line-height: 1.875rem;\">About our shop\r\n——Our mall mainly sells all items that you want . We will bring you good quailty and the lowest price products!\r\n——Delivery from China takes about 7 to 15 days.\r\n——About the service We will try to help you solve the problem, feel free to contact us and please leave us the massage , we will respond you ASAP.\r\n\r\nFeatures:\r\n-1. HD 1080P 2.0 Megapixels CMOS sensor, WiFi camera.\r\n-2. Built-in MIC and speakers, two way audio monitoring.\r\n-3. Remote monitoring: You can check your home condition remotely via smart phone\r\n(for Android/IOS ) or tablet if only there is internet connection, no matter where you are.\r\n-4. Support multiple display modes(traditional mode, mixed mode, corridor three-dimensional picture scroll mode and panoramic inversion mode).\r\n-5. Support remote playback. Support multi-users online monitoring at the same time.\r\n-6. With 11pcs invisible IR lamps, perfect hidden, can get clear images at night, night vision distance up to 15m.\r\n-7. IR-CUT double filter. Auto switch between day and night, restoring clear true color.\r\n-8. Motion detection function. The camera will be triggered to push notification to your phone APP.\r\n-9. Support up to 64G TF card storage (not included).\r\n-10. Quick reset, no need to reset from PC client. You can have a quick configuration or change network by reset key.\r\n-11. P2P cloud function, peer to peer connection, no need port mapping.\r\n-12. H.264 video compression, higher definition image and lower bit rate.\r\n-13. Plug and play, no need complex installation.\r\n\r\nSpecifications\r\n-Colour: Black\r\n-Material: ABS\r\n-Processor: GM8135S + SC1145\r\n-Operating System: Embedded LINUX operating system\r\n-Image Sensor: 1/4 \"HD CMOS 2 Megapixel CMOS Sensor\r\n-Video format: HD (1280 * 720P); VGA (640 * 480P)\r\n-Video Coding: H.264\r\n-Video frame rate: 1-30 frames\r\n-Recording mode: manual recording, alarm recording\r\n-Video playback method: mobile client + computer client\r\n-Audio input and output: Input: Built-in 38DB microphone; Output: Built-in 8 assault 2-watt speaker\r\n-Built-in lens: 3.6MM (standard) optional configuration\r\n-Infrared light night vision effect: through the photosensitive resistance sensor switch, LED night vision 10 meters,(IR-CUT automatically switch).\r\n-Focus method: manual\r\n-Local storage: Support extrapolation 64GB TF card, support for 24-hour video recording or alarm\r\n-Support multiple protocols: TCP / UDP, IP, HTTP, SMTP, DHCP, DDNS, UPNP, NTP, ONVIF, RTSP\r\n-Wifi: Supports IEEE 802.11b / g / n (not support 5G)\r\n-Image Rotation: Mirror / Invert\r\n-Video Control: Support\r\n-Motion Detection: Support\r\n-Alarm Action: Ring Alarm / Mobile Client Push\r\n-Firmware Upgrade: Remote upgrade via network\r\n-System Interface: a USB interface, a TF interface\r\n-Applicable scene: indoor/ Outdoor\r\n\r\n\r\nPackage Included:\r\n-1x 1080p Wireless Wifi Camera\r\n-1 package x screw accessories\r\n-1x User Manual</div></div>', 700.00, 500.00, 0, '[]', '[]', '[]', NULL, 1, 1, 1, 0, 24, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'free', 0.00, 1, 'V380 WIFI Mini Spy Camera Mini Wireless1080P HD Hot Link Remote Surveillance Camera Recorder 360 Degrees', '<div class=\"kP-bM3\" style=\"background: rgba(0, 0, 0, 0.02); color: rgba(0, 0, 0, 0.87); font-size: 1.125rem; padding: 0.875rem; text-transform: capitalize; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif;\">Product Description</div><div class=\"_2aZyWI\" style=\"margin: 1.875rem 0.9375rem 0.9375rem; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px;\"><div class=\"_2u0jt9\" style=\"white-space: pre-wrap; font-size: 0.875rem; overflow: hidden; text-overflow: ellipsis; line-height: 1.875rem;\">About our shop\r\n——Our mall mainly sells all items that you want . We will bring you good quailty and the lowest price products!\r\n——Delivery from China takes about 7 to 15 days.\r\n——About the service We will try to help you solve the problem, feel free to contact us and please leave us the massage , we will respond you ASAP.\r\n\r\nFeatures:\r\n-1. HD 1080P 2.0 Megapixels CMOS sensor, WiFi camera.\r\n-2. Built-in MIC and speakers, two way audio monitoring.\r\n-3. Remote monitoring: You can check your home condition remotely via smart phone\r\n(for Android/IOS ) or tablet if only there is internet connection, no matter where you are.\r\n-4. Support multiple display modes(traditional mode, mixed mode, corridor three-dimensional picture scroll mode and panoramic inversion mode).\r\n-5. Support remote playback. Support multi-users online monitoring at the same time.\r\n-6. With 11pcs invisible IR lamps, perfect hidden, can get clear images at night, night vision distance up to 15m.\r\n-7. IR-CUT double filter. Auto switch between day and night, restoring clear true color.\r\n-8. Motion detection function. The camera will be triggered to push notification to your phone APP.\r\n-9. Support up to 64G TF card storage (not included).\r\n-10. Quick reset, no need to reset from PC client. You can have a quick configuration or change network by reset key.\r\n-11. P2P cloud function, peer to peer connection, no need port mapping.\r\n-12. H.264 video compression, higher definition image and lower bit rate.\r\n-13. Plug and play, no need complex installation.\r\n\r\nSpecifications\r\n-Colour: Black\r\n-Material: ABS\r\n-Processor: GM8135S + SC1145\r\n-Operating System: Embedded LINUX operating system\r\n-Image Sensor: 1/4 \"HD CMOS 2 Megapixel CMOS Sensor\r\n-Video format: HD (1280 * 720P); VGA (640 * 480P)\r\n-Video Coding: H.264\r\n-Video frame rate: 1-30 frames\r\n-Recording mode: manual recording, alarm recording\r\n-Video playback method: mobile client + computer client\r\n-Audio input and output: Input: Built-in 38DB microphone; Output: Built-in 8 assault 2-watt speaker\r\n-Built-in lens: 3.6MM (standard) optional configuration\r\n-Infrared light night vision effect: through the photosensitive resistance sensor switch, LED night vision 10 meters,(IR-CUT automatically switch).\r\n-Focus method: manual\r\n-Local storage: Support extrapolation 64GB TF card, support for 24-hour video recording or alarm\r\n-Support multiple protocols: TCP / UDP, IP, HTTP, SMTP, DHCP, DDNS, UPNP, NTP, ONVIF, RTSP\r\n-Wifi: Supports IEEE 802.11b / g / n (not support 5G)\r\n-Image Rotation: Mirror / Invert\r\n-Video Control: Support\r\n-Motion Detection: Support\r\n-Alarm Action: Ring Alarm / Mobile Client Push\r\n-Firmware Upgrade: Remote upgrade via network\r\n-System Interface: a USB interface, a TF interface\r\n-Applicable scene: indoor/ Outdoor\r\n\r\n\r\nPackage Included:\r\n-1x 1080p Wireless Wifi Camera\r\n-1 package x screw accessories\r\n-1x User Manual</div></div>', NULL, NULL, 'v380-wifi-mini-spy-camera-mini-wireless1080p-hd-hot-link-remote-surveillance-camera-recorder-360-degrees-wly5l', 0.00, NULL, 0, NULL, NULL, '2021-01-26 01:56:35', '2021-01-26 11:34:12'),
(12, 'DJI Mavic 2 Pro Drone', 'admin', 9, 41, NULL, NULL, 19, '108,109,110', '112', 'youtube', NULL, 'drone', NULL, 120000.00, 90000.00, 0, '[]', '[]', '[]', NULL, 0, 1, 1, 0, 30, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'flat_rate', 500.00, 0, 'DJI Mavic 2 Pro Drone', NULL, NULL, NULL, 'dji-mavic-2-pro-drone-uvnja', 0.00, NULL, 0, NULL, NULL, '2021-01-26 02:12:29', '2021-01-26 09:48:31'),
(13, 'Drone RC Portable WiFi Drones With 4K HD Camera Altitude Hold Mode follow Drone air selfie Quadcopter dron', 'admin', 9, 41, NULL, NULL, 17, '114,115,116', '117', 'youtube', NULL, 'multi,rotor,drone', NULL, 600.00, 400.00, 1, '[\"1\"]', '[{\"attribute_id\":\"1\",\"values\":[\"4k dual\"]}]', '[\"#000000\",\"#D3D3D3\"]', NULL, 0, 1, 1, 0, 0, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'free', 0.00, 1, 'Drone RC Portable WiFi Drones With 4K HD Camera Altitude Hold Mode follow Drone air selfie Quadcopter dron', NULL, NULL, NULL, 'drone-rc-portable-wifi-drones-with-4k-hd-camera-altitude-hold-mode-follow-drone-air-selfie-quadcopter-dron-zxlel', 0.00, NULL, 0, NULL, NULL, '2021-01-26 09:42:15', '2021-01-26 12:50:40'),
(14, 'ABB Net Power UPS ITALY Technology NPW800 Uninterruptible 800VA Power Supply, 230V ac Output 480W Backup Battery', 'admin', 9, 49, NULL, NULL, 23, '118,119,120,121', '136', 'youtube', NULL, 'ABB,ups', NULL, 7500.00, 6000.00, 0, '[]', '[]', '[]', NULL, 1, 1, 0, 0, 10, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'flat_rate', 500.00, 0, 'ABB Net Power UPS ITALY Technology NPW800 Uninterruptible 800VA Power Supply, 230V ac Output 480W Backup Battery', NULL, NULL, NULL, 'abb-net-power-ups-italy-technology-npw800-uninterruptible-800va-power-supply-230v-ac-output-480w-backup-battery-rgqwl', 0.00, NULL, 0, NULL, NULL, '2021-01-26 10:01:53', '2021-01-26 11:34:10'),
(15, '1200VA / 720W Inverter Power Supply IPS (12VDC) IPS1200', 'admin', 9, 50, NULL, NULL, 17, '124,125,126', '123', 'youtube', NULL, 'ips', NULL, 7000.00, 5000.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 0, 20, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'flat_rate', 0.00, 0, '1200VA / 720W Inverter Power Supply IPS (12VDC) IPS1200', NULL, NULL, NULL, '1200VA--720W-Inverter-Power-Supply-IPS-12VDC-IPS1200-Q42si', 0.00, NULL, 0, NULL, NULL, '2021-01-26 10:17:32', '2021-01-26 10:17:32'),
(16, 'VIEWSONIC PA503XE DLP PROJECTOR 4000 ANSI LUMENS XGA 1024x768. INPUT:HDMI / VGA / 3.5MM AUDIO-IN', 'admin', 9, 16, NULL, NULL, 15, '128,129,130,131', '127', 'youtube', NULL, 'viewsonic,projector,bio,finger', NULL, 30000.00, 25000.00, 0, '[]', '[]', '[]', NULL, 0, 1, 0, 0, 15, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'flat_rate', 800.00, 0, 'VIEWSONIC PA503XE DLP PROJECTOR 4000 ANSI LUMENS XGA 1024x768. INPUT:HDMI / VGA / 3.5MM AUDIO-IN', NULL, NULL, NULL, 'viewsonic-pa503xe-dlp-projector-4000-ansi-lumens-xga-1024x768-inputhdmi--vga--35mm-audio-in-tr2vr', 0.00, NULL, 0, NULL, NULL, '2021-01-26 10:26:14', '2021-01-26 13:02:45'),
(17, 'Biometric Fingerprint Thumbprint Machine', 'admin', 9, 18, NULL, NULL, 24, '133,134,135', '132', 'youtube', NULL, 'bio,finger', NULL, 4000.00, 3000.00, 0, '[]', '[]', '[]', NULL, 1, 1, 0, 0, 20, 'Pc', 1, 0.00, 'amount', 0.00, 'amount', 'flat_rate', 300.00, 0, 'Biometric Fingerprint Thumbprint Machine', NULL, NULL, NULL, 'Biometric-Fingerprint-Thumbprint-Machine-FSCgi', 0.00, NULL, 0, NULL, NULL, '2021-01-26 10:46:21', '2021-01-26 11:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `product_stocks`
--

CREATE TABLE `product_stocks` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(20,2) NOT NULL DEFAULT 0.00,
  `qty` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_stocks`
--

INSERT INTO `product_stocks` (`id`, `product_id`, `variant`, `sku`, `price`, `qty`, `created_at`, `updated_at`) VALUES
(6, 1, NULL, NULL, 2500.00, 9, '2021-01-24 04:31:19', '2021-01-24 04:31:19'),
(8, 2, NULL, NULL, 2500.00, 9, '2021-01-24 06:35:12', '2021-01-24 06:35:12'),
(10, 3, NULL, NULL, 17000.00, 10, '2021-01-25 23:14:16', '2021-01-25 23:14:16'),
(11, 6, 'AliceBlue', NULL, 4500.00, 10, '2021-01-26 00:08:35', '2021-01-26 00:08:35'),
(12, 6, 'Aqua', NULL, 5000.00, 10, '2021-01-26 00:08:35', '2021-01-26 00:08:35'),
(19, 7, 'Amethyst-22', 'Amethyst-22', 15000.00, 10, '2021-01-26 00:19:45', '2021-01-26 00:19:45'),
(20, 7, 'Amethyst-21', 'Amethyst-21', 14000.00, 5, '2021-01-26 00:19:45', '2021-01-26 00:19:45'),
(21, 7, 'Bisque-22', 'Bisque-22', 12000.00, 4, '2021-01-26 00:19:45', '2021-01-26 00:19:45'),
(22, 7, 'Bisque-21', 'Bisque-21', 14000.00, 10, '2021-01-26 00:19:45', '2021-01-26 00:19:45'),
(41, 11, NULL, NULL, 700.00, 25, '2021-01-26 01:58:39', '2021-01-26 01:58:39'),
(48, 12, NULL, NULL, 120000.00, 30, '2021-01-26 09:32:29', '2021-01-26 09:32:29'),
(51, 13, 'Black-4kdual', NULL, 600.00, 11, '2021-01-26 09:45:00', '2021-01-26 12:50:40'),
(52, 13, 'LightGrey-4kdual', NULL, 400.00, 8, '2021-01-26 09:45:00', '2021-01-26 09:45:00'),
(54, 15, NULL, NULL, 7000.00, 20, '2021-01-26 10:17:35', '2021-01-26 10:17:35'),
(56, 17, NULL, NULL, 4000.00, 20, '2021-01-26 10:46:21', '2021-01-26 10:46:21'),
(57, 14, NULL, NULL, 7500.00, 10, '2021-01-26 10:48:57', '2021-01-26 10:48:57'),
(58, 10, '1080P-32GB', '1080P-32GB', 1600.00, 10, '2021-01-26 10:50:22', '2021-01-26 10:50:22'),
(59, 10, '1080P-8GB', '1080P-8GB', 1100.00, 10, '2021-01-26 10:50:22', '2021-01-26 10:50:22'),
(60, 10, '780P-32GB', '780P-32GB', 1200.00, 0, '2021-01-26 10:50:22', '2021-01-26 10:50:22'),
(61, 10, '780P-8GB', '780P-8GB', 1600.00, 10, '2021-01-26 10:50:22', '2021-01-26 10:50:22'),
(62, 16, NULL, NULL, 30000.00, 15, '2021-01-26 13:02:45', '2021-01-26 13:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `name`, `unit`, `description`, `lang`, `created_at`, `updated_at`) VALUES
(5, 3, 'Acer 22-inch Monitor EK220Q / EK220QA Full HD (1920 x1080) LCD Black (HDMI, VGA Port, 75Hz)', 'Pc', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Display Size:                                                 23.8\'\'   \r\nMaximum Resolution &amp; Refresh Rate:     - HDMI (1.4):1920x1080@144Hz; \r\n                                                                        - HDMI (2.0):1920x1080 @165Hz; \r\n                                                                        - DP:1920x1080@165Hz\r\nPanel:                                                             VA\r\nResponse Time:                                           1ms (TVR)\r\nContrast Ratio:                                             100,000,000:1(ACM)\r\nBrightness:                                                    250 nits (cd/m2)\r\nViewing Angle:                                              178°(H),178°(V)\r\nColours:                                                         16.7M\r\nBits:                                                                8Bit\r\nVESA Wall Mounting:                                  100x100mm\r\nSpeaker:                                                         No\r\nPower Supply (100-240V) :                         Internal\r\nTilt:                                                                 -5°~ 20°\r\nInput Signal:                                                - 1HDMI(1.4) + 1HDMI(2.0) + DP</span><br></p>', 'bd', '2021-01-25 22:56:09', '2021-01-25 23:14:16'),
(7, 7, 'ACER G227HQL 21.5 Inch Full HD IPS Monitor', 'Pc', NULL, 'bd', '2021-01-26 00:17:04', '2021-01-26 00:17:04'),
(8, 10, 'ANBIUX 2MP PTZ WIFI IP Camera Outdoor 1080P 4X Digital Zoom Wireless Security CCTV Camera', 'Pc', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">*HD 2MP Resoluton;\r\n\r\n*Support 4.0X Digital Zoom;\r\n\r\n*Support true humanoid intelligent alert double light;\r\n\r\n*Support black light full color, color night vision is clear;\r\n\r\n*Three modes preview, black light full color infrared night vision double light warning;\r\n\r\n*Support ONVIF protocol recorder add; CMS computer client save and play in real time;\r\n\r\n*Alarm mode custom setting: DIY custom setting alarm bell;\r\n\r\n*Humanoid detection: mixing line, area, two-way flow detection, for human form, the item triggers no alarm;\r\n\r\n* Customized new speakers with loud volume, 4w high power;\r\n\r\n*PTZ: rotates 270 degrees left and right and rotates 90 degrees vertically;\r\n\r\n*Dual Antenna 5DB transmits signals, high gain design, and the signal is bigger and stronger;\r\n\r\n*H.265X new storage design, TF card storage is lower, more stable and more durable;\r\n\r\n*Three matching connection modes: AP hotspot direct connection/wireless WiFi connection/bringing network port wired connection;\r\n\r\n*Exclusive patented spherical heat treatment, with an average of 30 degrees, let the screen exposure heat dry and disappear;\r\n\r\n*Free 30-day cloud storage, data security is more stable 1 times.\r\n</span></p><div><span style=\"color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\"><br></span></div>', 'bd', '2021-01-26 01:24:43', '2021-01-26 01:44:53'),
(9, 11, 'V380 WIFI Mini Spy Camera Mini Wireless1080P HD Hot Link Remote Surveillance Camera Recorder 360 Degrees', 'Pc', '<div class=\"kP-bM3\" style=\"background: rgba(0, 0, 0, 0.02); color: rgba(0, 0, 0, 0.87); font-size: 1.125rem; padding: 0.875rem; text-transform: capitalize; font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif;\">Product Description</div><div class=\"_2aZyWI\" style=\"margin: 1.875rem 0.9375rem 0.9375rem; color: rgba(0, 0, 0, 0.8); font-family: Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px;\"><div class=\"_2u0jt9\" style=\"white-space: pre-wrap; font-size: 0.875rem; overflow: hidden; text-overflow: ellipsis; line-height: 1.875rem;\">About our shop\r\n——Our mall mainly sells all items that you want . We will bring you good quailty and the lowest price products!\r\n——Delivery from China takes about 7 to 15 days.\r\n——About the service We will try to help you solve the problem, feel free to contact us and please leave us the massage , we will respond you ASAP.\r\n\r\nFeatures:\r\n-1. HD 1080P 2.0 Megapixels CMOS sensor, WiFi camera.\r\n-2. Built-in MIC and speakers, two way audio monitoring.\r\n-3. Remote monitoring: You can check your home condition remotely via smart phone\r\n(for Android/IOS ) or tablet if only there is internet connection, no matter where you are.\r\n-4. Support multiple display modes(traditional mode, mixed mode, corridor three-dimensional picture scroll mode and panoramic inversion mode).\r\n-5. Support remote playback. Support multi-users online monitoring at the same time.\r\n-6. With 11pcs invisible IR lamps, perfect hidden, can get clear images at night, night vision distance up to 15m.\r\n-7. IR-CUT double filter. Auto switch between day and night, restoring clear true color.\r\n-8. Motion detection function. The camera will be triggered to push notification to your phone APP.\r\n-9. Support up to 64G TF card storage (not included).\r\n-10. Quick reset, no need to reset from PC client. You can have a quick configuration or change network by reset key.\r\n-11. P2P cloud function, peer to peer connection, no need port mapping.\r\n-12. H.264 video compression, higher definition image and lower bit rate.\r\n-13. Plug and play, no need complex installation.\r\n\r\nSpecifications\r\n-Colour: Black\r\n-Material: ABS\r\n-Processor: GM8135S + SC1145\r\n-Operating System: Embedded LINUX operating system\r\n-Image Sensor: 1/4 \"HD CMOS 2 Megapixel CMOS Sensor\r\n-Video format: HD (1280 * 720P); VGA (640 * 480P)\r\n-Video Coding: H.264\r\n-Video frame rate: 1-30 frames\r\n-Recording mode: manual recording, alarm recording\r\n-Video playback method: mobile client + computer client\r\n-Audio input and output: Input: Built-in 38DB microphone; Output: Built-in 8 assault 2-watt speaker\r\n-Built-in lens: 3.6MM (standard) optional configuration\r\n-Infrared light night vision effect: through the photosensitive resistance sensor switch, LED night vision 10 meters,(IR-CUT automatically switch).\r\n-Focus method: manual\r\n-Local storage: Support extrapolation 64GB TF card, support for 24-hour video recording or alarm\r\n-Support multiple protocols: TCP / UDP, IP, HTTP, SMTP, DHCP, DDNS, UPNP, NTP, ONVIF, RTSP\r\n-Wifi: Supports IEEE 802.11b / g / n (not support 5G)\r\n-Image Rotation: Mirror / Invert\r\n-Video Control: Support\r\n-Motion Detection: Support\r\n-Alarm Action: Ring Alarm / Mobile Client Push\r\n-Firmware Upgrade: Remote upgrade via network\r\n-System Interface: a USB interface, a TF interface\r\n-Applicable scene: indoor/ Outdoor\r\n\r\n\r\nPackage Included:\r\n-1x 1080p Wireless Wifi Camera\r\n-1 package x screw accessories\r\n-1x User Manual</div></div>', 'bd', '2021-01-26 01:56:35', '2021-01-26 01:58:39'),
(10, 12, 'DJI Mavic 2 Pro Drone', 'Pc', NULL, 'bd', '2021-01-26 02:12:30', '2021-01-26 02:12:30'),
(11, 13, 'Drone RC Portable WiFi Drones With 4K HD Camera Altitude Hold Mode follow Drone air selfie Quadcopter dron', 'Pc', NULL, 'bd', '2021-01-26 09:42:16', '2021-01-26 09:42:16'),
(12, 14, 'ABB Net Power UPS ITALY Technology NPW800 Uninterruptible 800VA Power Supply, 230V ac Output 480W Backup Battery', 'Pc', NULL, 'bd', '2021-01-26 10:01:54', '2021-01-26 10:01:54'),
(13, 15, '1200VA / 720W Inverter Power Supply IPS (12VDC) IPS1200', 'Pc', NULL, 'bd', '2021-01-26 10:17:35', '2021-01-26 10:17:35'),
(14, 16, 'VIEWSONIC PA503XE DLP PROJECTOR 4000 ANSI LUMENS XGA 1024x768. INPUT:HDMI / VGA / 3.5MM AUDIO-IN', 'Pc', NULL, 'bd', '2021-01-26 10:26:15', '2021-01-26 10:26:15'),
(15, 17, 'Biometric Fingerprint Thumbprint Machine', 'Pc', NULL, 'bd', '2021-01-26 10:46:22', '2021-01-26 10:46:22'),
(16, 16, 'VIEWSONIC PA503XE DLP PROJECTOR 4000 ANSI LUMENS XGA 1024x768. INPUT:HDMI / VGA / 3.5MM AUDIO-IN', 'Pc', NULL, 'en', '2021-01-26 13:02:45', '2021-01-26 13:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `comment` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `viewed` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `status`, `viewed`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 5, 'wow', 1, 0, '2021-01-24 04:13:51', '2021-01-24 04:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'Manager', '[\"1\",\"2\",\"4\"]', '2018-10-10 04:39:47', '2018-10-10 04:51:37'),
(2, 'Accountant', '[\"2\",\"3\",\"6\"]', '2018-10-10 04:52:09', '2021-01-26 12:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_translations`
--

CREATE TABLE `role_translations` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_translations`
--

INSERT INTO `role_translations` (`id`, `role_id`, `name`, `lang`, `created_at`, `updated_at`) VALUES
(1, 2, 'Accountant', 'en', '2021-01-26 12:52:54', '2021-01-26 12:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `searches`
--

CREATE TABLE `searches` (
  `id` int(11) NOT NULL,
  `query` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `searches`
--

INSERT INTO `searches` (`id`, `query`, `count`, `created_at`, `updated_at`) VALUES
(2, 'dcs', 1, '2020-03-08 00:29:09', '2020-03-08 00:29:09'),
(3, 'das', 3, '2020-03-08 00:29:15', '2020-03-08 00:29:50'),
(4, 'redmi 5', 1, '2021-01-24 04:40:52', '2021-01-24 04:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `verification_status` int(1) NOT NULL DEFAULT 0,
  `verification_info` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `cash_on_delivery_status` int(1) NOT NULL DEFAULT 0,
  `admin_to_pay` double(20,2) NOT NULL DEFAULT 0.00,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_acc_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_acc_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_routing_no` int(50) DEFAULT NULL,
  `bank_payment_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `user_id`, `verification_status`, `verification_info`, `cash_on_delivery_status`, `admin_to_pay`, `bank_name`, `bank_acc_name`, `bank_acc_no`, `bank_routing_no`, `bank_payment_status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '[{\"type\":\"text\",\"label\":\"Name\",\"value\":\"Mr. Seller\"},{\"type\":\"select\",\"label\":\"Marital Status\",\"value\":\"Married\"},{\"type\":\"multi_select\",\"label\":\"Company\",\"value\":\"[\\\"Company\\\"]\"},{\"type\":\"select\",\"label\":\"Gender\",\"value\":\"Male\"},{\"type\":\"file\",\"label\":\"Image\",\"value\":\"uploads\\/verification_form\\/CRWqFifcbKqibNzllBhEyUSkV6m1viknGXMEhtiW.png\"}]', 1, 78.40, NULL, NULL, NULL, NULL, 0, '2018-10-07 04:42:57', '2020-01-26 04:21:11');

-- --------------------------------------------------------

--
-- Table structure for table `seller_withdraw_requests`
--

CREATE TABLE `seller_withdraw_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` double(20,2) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `viewed` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` int(11) NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `revisit` int(11) NOT NULL,
  `sitemap_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `keyword`, `author`, `revisit`, `sitemap_link`, `description`, `created_at`, `updated_at`) VALUES
(1, 'bootstrap,responsive,template,developer', 'Active IT Zone', 11, 'https://www.activeitzone.com', 'Active E-commerce CMS Multi vendor system is such a platform to build a border less marketplace both for physical and digital goods.', '2019-08-08 08:56:11', '2019-08-08 02:56:11');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sliders` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pick_up_point_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_cost` double(20,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `user_id`, `name`, `logo`, `sliders`, `address`, `facebook`, `google`, `twitter`, `youtube`, `slug`, `meta_title`, `meta_description`, `pick_up_point_id`, `shipping_cost`, `created_at`, `updated_at`) VALUES
(1, 3, 'Demo Seller Shop', NULL, NULL, 'House : Demo, Road : Demo, Section : Demo', 'www.facebook.com', 'www.google.com', 'www.twitter.com', 'www.youtube.com', 'Demo-Seller-Shop-1', 'Demo Seller Shop Title', 'Demo description', NULL, 0.00, '2018-11-27 10:23:13', '2019-08-06 06:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `published` int(1) NOT NULL DEFAULT 1,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `photo`, `published`, `link`, `created_at`, `updated_at`) VALUES
(7, 'uploads/sliders/slider-image.jpg', 1, NULL, '2019-03-12 05:58:05', '2019-03-12 05:58:05'),
(8, 'uploads/sliders/slider-image.jpg', 1, NULL, '2019-03-12 05:58:12', '2019-03-12 05:58:12');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 12, 2, '2021-01-26 12:48:21', '2021-01-26 12:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `code` int(6) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `viewed` int(1) NOT NULL DEFAULT 0,
  `client_viewed` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `code`, `user_id`, `subject`, `details`, `files`, `status`, `viewed`, `client_viewed`, `created_at`, `updated_at`) VALUES
(1, 10000036, 10, 'what', 'dhdh', NULL, 'pending', 1, 1, '2021-01-24 11:47:57', '2021-01-24 05:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply` longtext COLLATE utf8_unicode_ci NOT NULL,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `ticket_id`, `user_id`, `reply`, `files`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '<p>ghdjdjdj</p>', NULL, '2021-01-24 05:47:47', '2021-01-24 05:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(11) NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_key` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang_value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(3, 'en', 'All Category', 'All Category', '2020-11-02 07:40:38', '2020-11-02 07:40:38'),
(4, 'en', 'All', 'All', '2020-11-02 07:40:38', '2020-11-02 07:40:38'),
(5, 'en', 'Flash Sale', 'Flash Sale', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(6, 'en', 'View More', 'View More', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(7, 'en', 'Add to wishlist', 'Add to wishlist', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(8, 'en', 'Add to compare', 'Add to compare', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(9, 'en', 'Add to cart', 'Add to cart', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(10, 'en', 'Club Point', 'Club Point', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(11, 'en', 'Classified Ads', 'Classified Ads', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(13, 'en', 'Used', 'Used', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(14, 'en', 'Top 10 Categories', 'Top 10 Categories', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(15, 'en', 'View All Categories', 'View All Categories', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(16, 'en', 'Top 10 Brands', 'Top 10 Brands', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(17, 'en', 'View All Brands', 'View All Brands', '2020-11-02 07:40:40', '2020-11-02 07:40:40'),
(43, 'en', 'Terms & conditions', 'Terms & conditions', '2020-11-02 07:40:41', '2020-11-02 07:40:41'),
(51, 'en', 'Best Selling', 'Best Selling', '2020-11-02 07:40:42', '2020-11-02 07:40:42'),
(53, 'en', 'Top 20', 'Top 20', '2020-11-02 07:40:42', '2020-11-02 07:40:42'),
(55, 'en', 'Featured Products', 'Featured Products', '2020-11-02 07:40:42', '2020-11-02 07:40:42'),
(56, 'en', 'Best Sellers', 'Best Sellers', '2020-11-02 07:40:43', '2020-11-02 07:40:43'),
(57, 'en', 'Visit Store', 'Visit Store', '2020-11-02 07:40:43', '2020-11-02 07:40:43'),
(58, 'en', 'Popular Suggestions', 'Popular Suggestions', '2020-11-02 07:46:59', '2020-11-02 07:46:59'),
(59, 'en', 'Category Suggestions', 'Category Suggestions', '2020-11-02 07:46:59', '2020-11-02 07:46:59'),
(62, 'en', 'Automobile & Motorcycle', 'Automobile & Motorcycle', '2020-11-02 07:47:01', '2020-11-02 07:47:01'),
(63, 'en', 'Price range', 'Price range', '2020-11-02 07:47:01', '2020-11-02 07:47:01'),
(64, 'en', 'Filter by color', 'Filter by color', '2020-11-02 07:47:02', '2020-11-02 07:47:02'),
(65, 'en', 'Home', 'Home', '2020-11-02 07:47:02', '2020-11-02 07:47:02'),
(67, 'en', 'Newest', 'Newest', '2020-11-02 07:47:02', '2020-11-02 07:47:02'),
(68, 'en', 'Oldest', 'Oldest', '2020-11-02 07:47:02', '2020-11-02 07:47:02'),
(69, 'en', 'Price low to high', 'Price low to high', '2020-11-02 07:47:02', '2020-11-02 07:47:02'),
(70, 'en', 'Price high to low', 'Price high to low', '2020-11-02 07:47:02', '2020-11-02 07:47:02'),
(71, 'en', 'Brands', 'Brands', '2020-11-02 07:47:02', '2020-11-02 07:47:02'),
(72, 'en', 'All Brands', 'All Brands', '2020-11-02 07:47:02', '2020-11-02 07:47:02'),
(74, 'en', 'All Sellers', 'All Sellers', '2020-11-02 07:47:02', '2020-11-02 07:47:02'),
(78, 'en', 'Inhouse product', 'Inhouse product', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(79, 'en', 'Message Seller', 'Message Seller', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(80, 'en', 'Price', 'Price', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(81, 'en', 'Discount Price', 'Discount Price', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(82, 'en', 'Color', 'Color', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(83, 'en', 'Quantity', 'Quantity', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(84, 'en', 'available', 'available', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(85, 'en', 'Total Price', 'Total Price', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(86, 'en', 'Out of Stock', 'Out of Stock', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(87, 'en', 'Refund', 'Refund', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(88, 'en', 'Share', 'Share', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(89, 'en', 'Sold By', 'Sold By', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(90, 'en', 'customer reviews', 'customer reviews', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(91, 'en', 'Top Selling Products', 'Top Selling Products', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(92, 'en', 'Description', 'Description', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(93, 'en', 'Video', 'Video', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(94, 'en', 'Reviews', 'Reviews', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(95, 'en', 'Download', 'Download', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(96, 'en', 'There have been no reviews for this product yet.', 'There have been no reviews for this product yet.', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(97, 'en', 'Related products', 'Related products', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(98, 'en', 'Any query about this product', 'Any query about this product', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(99, 'en', 'Product Name', 'Product Name', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(100, 'en', 'Your Question', 'Your Question', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(101, 'en', 'Send', 'Send', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(103, 'en', 'Use country code before number', 'Use country code before number', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(105, 'en', 'Remember Me', 'Remember Me', '2020-11-02 08:18:03', '2020-11-02 08:18:03'),
(107, 'en', 'Dont have an account?', 'Dont have an account?', '2020-11-02 08:18:04', '2020-11-02 08:18:04'),
(108, 'en', 'Register Now', 'Register Now', '2020-11-02 08:18:04', '2020-11-02 08:18:04'),
(109, 'en', 'Or Login With', 'Or Login With', '2020-11-02 08:18:04', '2020-11-02 08:18:04'),
(110, 'en', 'oops..', 'oops..', '2020-11-02 10:29:04', '2020-11-02 10:29:04'),
(111, 'en', 'This item is out of stock!', 'This item is out of stock!', '2020-11-02 10:29:04', '2020-11-02 10:29:04'),
(112, 'en', 'Back to shopping', 'Back to shopping', '2020-11-02 10:29:04', '2020-11-02 10:29:04'),
(113, 'en', 'Login to your account.', 'Login to your account.', '2020-11-02 11:27:41', '2020-11-02 11:27:41'),
(115, 'en', 'Purchase History', 'Purchase History', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(116, 'en', 'New', 'New', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(117, 'en', 'Downloads', 'Downloads', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(118, 'en', 'Sent Refund Request', 'Sent Refund Request', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(119, 'en', 'Product Bulk Upload', 'Product Bulk Upload', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(123, 'en', 'Orders', 'Orders', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(124, 'en', 'Recieved Refund Request', 'Recieved Refund Request', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(126, 'en', 'Shop Setting', 'Shop Setting', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(127, 'en', 'Payment History', 'Payment History', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(128, 'en', 'Money Withdraw', 'Money Withdraw', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(129, 'en', 'Conversations', 'Conversations', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(130, 'en', 'My Wallet', 'My Wallet', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(131, 'en', 'Earning Points', 'Earning Points', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(132, 'en', 'Support Ticket', 'Support Ticket', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(133, 'en', 'Manage Profile', 'Manage Profile', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(134, 'en', 'Sold Amount', 'Sold Amount', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(135, 'en', 'Your sold amount (current month)', 'Your sold amount (current month)', '2020-11-02 11:27:53', '2020-11-02 11:27:53'),
(136, 'en', 'Total Sold', 'Total Sold', '2020-11-02 11:27:54', '2020-11-02 11:27:54'),
(137, 'en', 'Last Month Sold', 'Last Month Sold', '2020-11-02 11:27:54', '2020-11-02 11:27:54'),
(138, 'en', 'Total sale', 'Total sale', '2020-11-02 11:27:54', '2020-11-02 11:27:54'),
(139, 'en', 'Total earnings', 'Total earnings', '2020-11-02 11:27:54', '2020-11-02 11:27:54'),
(140, 'en', 'Successful orders', 'Successful orders', '2020-11-02 11:27:54', '2020-11-02 11:27:54'),
(141, 'en', 'Total orders', 'Total orders', '2020-11-02 11:27:54', '2020-11-02 11:27:54'),
(142, 'en', 'Pending orders', 'Pending orders', '2020-11-02 11:27:54', '2020-11-02 11:27:54'),
(143, 'en', 'Cancelled orders', 'Cancelled orders', '2020-11-02 11:27:54', '2020-11-02 11:27:54'),
(145, 'en', 'Product', 'Product', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(147, 'en', 'Purchased Package', 'Purchased Package', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(148, 'en', 'Package Not Found', 'Package Not Found', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(149, 'en', 'Upgrade Package', 'Upgrade Package', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(150, 'en', 'Shop', 'Shop', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(151, 'en', 'Manage & organize your shop', 'Manage & organize your shop', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(152, 'en', 'Go to setting', 'Go to setting', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(153, 'en', 'Payment', 'Payment', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(154, 'en', 'Configure your payment method', 'Configure your payment method', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(156, 'en', 'My Panel', 'My Panel', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(158, 'en', 'Item has been added to wishlist', 'Item has been added to wishlist', '2020-11-02 11:27:55', '2020-11-02 11:27:55'),
(159, 'en', 'My Points', 'My Points', '2020-11-02 11:28:15', '2020-11-02 11:28:15'),
(160, 'en', ' Points', ' Points', '2020-11-02 11:28:15', '2020-11-02 11:28:15'),
(161, 'en', 'Wallet Money', 'Wallet Money', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(162, 'en', 'Exchange Rate', 'Exchange Rate', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(163, 'en', 'Point Earning history', 'Point Earning history', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(164, 'en', 'Date', 'Date', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(165, 'en', 'Points', 'Points', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(166, 'en', 'Converted', 'Converted', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(167, 'en', 'Action', 'Action', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(168, 'en', 'No history found.', 'No history found.', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(169, 'en', 'Convert has been done successfully Check your Wallets', 'Convert has been done successfully Check your Wallets', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(170, 'en', 'Something went wrong', 'Something went wrong', '2020-11-02 11:28:16', '2020-11-02 11:28:16'),
(171, 'en', 'Remaining Uploads', 'Remaining Uploads', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(172, 'en', 'No Package Found', 'No Package Found', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(173, 'en', 'Search product', 'Search product', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(174, 'en', 'Name', 'Name', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(176, 'en', 'Current Qty', 'Current Qty', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(177, 'en', 'Base Price', 'Base Price', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(178, 'en', 'Published', 'Published', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(179, 'en', 'Featured', 'Featured', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(180, 'en', 'Options', 'Options', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(181, 'en', 'Edit', 'Edit', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(182, 'en', 'Duplicate', 'Duplicate', '2020-11-02 11:37:13', '2020-11-02 11:37:13'),
(184, 'en', '1. Download the skeleton file and fill it with data.', '1. Download the skeleton file and fill it with data.', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(185, 'en', '2. You can download the example file to understand how the data must be filled.', '2. You can download the example file to understand how the data must be filled.', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(186, 'en', '3. Once you have downloaded and filled the skeleton file, upload it in the form below and submit.', '3. Once you have downloaded and filled the skeleton file, upload it in the form below and submit.', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(187, 'en', '4. After uploading products you need to edit them and set products images and choices.', '4. After uploading products you need to edit them and set products images and choices.', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(188, 'en', 'Download CSV', 'Download CSV', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(189, 'en', '1. Category,Sub category,Sub Sub category and Brand should be in numerical ids.', '1. Category,Sub category,Sub Sub category and Brand should be in numerical ids.', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(190, 'en', '2. You can download the pdf to get Category,Sub category,Sub Sub category and Brand id.', '2. You can download the pdf to get Category,Sub category,Sub Sub category and Brand id.', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(191, 'en', 'Download Category', 'Download Category', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(192, 'en', 'Download Sub category', 'Download Sub category', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(193, 'en', 'Download Sub Sub category', 'Download Sub Sub category', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(194, 'en', 'Download Brand', 'Download Brand', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(195, 'en', 'Upload CSV File', 'Upload CSV File', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(196, 'en', 'CSV', 'CSV', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(197, 'en', 'Choose CSV File', 'Choose CSV File', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(198, 'en', 'Upload', 'Upload', '2020-11-02 11:37:20', '2020-11-02 11:37:20'),
(199, 'en', 'Add New Digital Product', 'Add New Digital Product', '2020-11-02 11:37:25', '2020-11-02 11:37:25'),
(200, 'en', 'Available Status', 'Available Status', '2020-11-02 11:37:29', '2020-11-02 11:37:29'),
(201, 'en', 'Admin Status', 'Admin Status', '2020-11-02 11:37:29', '2020-11-02 11:37:29'),
(202, 'en', 'Pending Balance', 'Pending Balance', '2020-11-02 11:38:07', '2020-11-02 11:38:07'),
(203, 'en', 'Send Withdraw Request', 'Send Withdraw Request', '2020-11-02 11:38:07', '2020-11-02 11:38:07'),
(204, 'en', 'Withdraw Request history', 'Withdraw Request history', '2020-11-02 11:38:07', '2020-11-02 11:38:07'),
(205, 'en', 'Amount', 'Amount', '2020-11-02 11:38:07', '2020-11-02 11:38:07'),
(206, 'en', 'Status', 'Status', '2020-11-02 11:38:07', '2020-11-02 11:38:07'),
(207, 'en', 'Message', 'Message', '2020-11-02 11:38:07', '2020-11-02 11:38:07'),
(208, 'en', 'Send A Withdraw Request', 'Send A Withdraw Request', '2020-11-02 11:38:07', '2020-11-02 11:38:07'),
(209, 'en', 'Basic Info', 'Basic Info', '2020-11-02 11:38:13', '2020-11-02 11:38:13'),
(211, 'en', 'Your Phone', 'Your Phone', '2020-11-02 11:38:13', '2020-11-02 11:38:13'),
(212, 'en', 'Photo', 'Photo', '2020-11-02 11:38:13', '2020-11-02 11:38:13'),
(213, 'en', 'Browse', 'Browse', '2020-11-02 11:38:13', '2020-11-02 11:38:13'),
(215, 'en', 'Your Password', 'Your Password', '2020-11-02 11:38:13', '2020-11-02 11:38:13'),
(216, 'en', 'New Password', 'New Password', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(217, 'en', 'Confirm Password', 'Confirm Password', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(218, 'en', 'Add New Address', 'Add New Address', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(219, 'en', 'Payment Setting', 'Payment Setting', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(220, 'en', 'Cash Payment', 'Cash Payment', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(221, 'en', 'Bank Payment', 'Bank Payment', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(222, 'en', 'Bank Name', 'Bank Name', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(223, 'en', 'Bank Account Name', 'Bank Account Name', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(224, 'en', 'Bank Account Number', 'Bank Account Number', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(225, 'en', 'Bank Routing Number', 'Bank Routing Number', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(226, 'en', 'Update Profile', 'Update Profile', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(227, 'en', 'Change your email', 'Change your email', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(228, 'en', 'Your Email', 'Your Email', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(229, 'en', 'Sending Email...', 'Sending Email...', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(230, 'en', 'Verify', 'Verify', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(231, 'en', 'Update Email', 'Update Email', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(232, 'en', 'New Address', 'New Address', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(233, 'en', 'Your Address', 'Your Address', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(234, 'en', 'Country', 'Country', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(235, 'en', 'Select your country', 'Select your country', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(236, 'en', 'City', 'City', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(237, 'en', 'Your City', 'Your City', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(239, 'en', 'Your Postal Code', 'Your Postal Code', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(240, 'en', '+880', '+880', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(241, 'en', 'Save', 'Save', '2020-11-02 11:38:14', '2020-11-02 11:38:14'),
(242, 'en', 'Received Refund Request', 'Received Refund Request', '2020-11-02 11:56:20', '2020-11-02 11:56:20'),
(244, 'en', 'Delete Confirmation', 'Delete Confirmation', '2020-11-02 11:56:20', '2020-11-02 11:56:20'),
(245, 'en', 'Are you sure to delete this?', 'Are you sure to delete this?', '2020-11-02 11:56:21', '2020-11-02 11:56:21'),
(246, 'en', 'Premium Packages for Sellers', 'Premium Packages for Sellers', '2020-11-02 11:57:36', '2020-11-02 11:57:36'),
(247, 'en', 'Product Upload', 'Product Upload', '2020-11-02 11:57:36', '2020-11-02 11:57:36'),
(248, 'en', 'Digital Product Upload', 'Digital Product Upload', '2020-11-02 11:57:36', '2020-11-02 11:57:36'),
(250, 'en', 'Purchase Package', 'Purchase Package', '2020-11-02 11:57:36', '2020-11-02 11:57:36'),
(251, 'en', 'Select Payment Type', 'Select Payment Type', '2020-11-02 11:57:36', '2020-11-02 11:57:36'),
(252, 'en', 'Payment Type', 'Payment Type', '2020-11-02 11:57:36', '2020-11-02 11:57:36'),
(253, 'en', 'Select One', 'Select One', '2020-11-02 11:57:36', '2020-11-02 11:57:36'),
(254, 'en', 'Online payment', 'Online payment', '2020-11-02 11:57:37', '2020-11-02 11:57:37'),
(255, 'en', 'Offline payment', 'Offline payment', '2020-11-02 11:57:37', '2020-11-02 11:57:37'),
(256, 'en', 'Purchase Your Package', 'Purchase Your Package', '2020-11-02 11:57:37', '2020-11-02 11:57:37'),
(258, 'en', 'Paypal', 'Paypal', '2020-11-02 11:57:37', '2020-11-02 11:57:37'),
(259, 'en', 'Stripe', 'Stripe', '2020-11-02 11:57:37', '2020-11-02 11:57:37'),
(260, 'en', 'sslcommerz', 'sslcommerz', '2020-11-02 11:57:37', '2020-11-02 11:57:37'),
(265, 'en', 'Confirm', 'Confirm', '2020-11-02 11:57:37', '2020-11-02 11:57:37'),
(266, 'en', 'Offline Package Payment', 'Offline Package Payment', '2020-11-02 11:57:37', '2020-11-02 11:57:37'),
(267, 'en', 'Transaction ID', 'Transaction ID', '2020-11-02 12:30:12', '2020-11-02 12:30:12'),
(268, 'en', 'Choose image', 'Choose image', '2020-11-02 12:30:12', '2020-11-02 12:30:12'),
(269, 'en', 'Code', 'Code', '2020-11-02 12:42:00', '2020-11-02 12:42:00'),
(270, 'en', 'Delivery Status', 'Delivery Status', '2020-11-02 12:42:00', '2020-11-02 12:42:00'),
(271, 'en', 'Payment Status', 'Payment Status', '2020-11-02 12:42:00', '2020-11-02 12:42:00'),
(272, 'en', 'Paid', 'Paid', '2020-11-02 12:42:00', '2020-11-02 12:42:00'),
(273, 'en', 'Order Details', 'Order Details', '2020-11-02 12:42:00', '2020-11-02 12:42:00'),
(274, 'en', 'Download Invoice', 'Download Invoice', '2020-11-02 12:42:00', '2020-11-02 12:42:00'),
(275, 'en', 'Unpaid', 'Unpaid', '2020-11-02 12:42:00', '2020-11-02 12:42:00'),
(277, 'en', 'Order placed', 'Order placed', '2020-11-02 12:43:59', '2020-11-02 12:43:59'),
(278, 'en', 'Confirmed', 'Confirmed', '2020-11-02 12:43:59', '2020-11-02 12:43:59'),
(279, 'en', 'On delivery', 'On delivery', '2020-11-02 12:43:59', '2020-11-02 12:43:59'),
(280, 'en', 'Delivered', 'Delivered', '2020-11-02 12:43:59', '2020-11-02 12:43:59'),
(281, 'en', 'Order Summary', 'Order Summary', '2020-11-02 12:43:59', '2020-11-02 12:43:59'),
(282, 'en', 'Order Code', 'Order Code', '2020-11-02 12:43:59', '2020-11-02 12:43:59'),
(283, 'en', 'Customer', 'Customer', '2020-11-02 12:43:59', '2020-11-02 12:43:59'),
(287, 'en', 'Total order amount', 'Total order amount', '2020-11-02 12:43:59', '2020-11-02 12:43:59'),
(288, 'en', 'Shipping metdod', 'Shipping metdod', '2020-11-02 12:43:59', '2020-11-02 12:43:59'),
(289, 'en', 'Flat shipping rate', 'Flat shipping rate', '2020-11-02 12:44:00', '2020-11-02 12:44:00'),
(290, 'en', 'Payment metdod', 'Payment metdod', '2020-11-02 12:44:00', '2020-11-02 12:44:00'),
(291, 'en', 'Variation', 'Variation', '2020-11-02 12:44:00', '2020-11-02 12:44:00'),
(292, 'en', 'Delivery Type', 'Delivery Type', '2020-11-02 12:44:00', '2020-11-02 12:44:00'),
(293, 'en', 'Home Delivery', 'Home Delivery', '2020-11-02 12:44:00', '2020-11-02 12:44:00'),
(294, 'en', 'Order Ammount', 'Order Ammount', '2020-11-02 12:44:00', '2020-11-02 12:44:00'),
(295, 'en', 'Subtotal', 'Subtotal', '2020-11-02 12:44:00', '2020-11-02 12:44:00'),
(296, 'en', 'Shipping', 'Shipping', '2020-11-02 12:44:00', '2020-11-02 12:44:00'),
(298, 'en', 'Coupon Discount', 'Coupon Discount', '2020-11-02 12:44:00', '2020-11-02 12:44:00'),
(300, 'en', 'N/A', 'N/A', '2020-11-02 12:44:20', '2020-11-02 12:44:20'),
(301, 'en', 'In stock', 'In stock', '2020-11-02 12:54:52', '2020-11-02 12:54:52'),
(302, 'en', 'Buy Now', 'Buy Now', '2020-11-02 12:54:52', '2020-11-02 12:54:52'),
(303, 'en', 'Item added to your cart!', 'Item added to your cart!', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(304, 'en', 'Proceed to Checkout', 'Proceed to Checkout', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(305, 'en', 'Cart Items', 'Cart Items', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(306, 'en', '1. My Cart', '1. My Cart', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(307, 'en', 'View cart', 'View cart', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(308, 'en', '2. Shipping info', '2. Shipping info', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(309, 'en', 'Checkout', 'Checkout', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(310, 'en', '3. Delivery info', '3. Delivery info', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(311, 'en', '4. Payment', '4. Payment', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(312, 'en', '5. Confirmation', '5. Confirmation', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(313, 'en', 'Remove', 'Remove', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(314, 'en', 'Return to shop', 'Return to shop', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(315, 'en', 'Continue to Shipping', 'Continue to Shipping', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(316, 'en', 'Or', 'Or', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(317, 'en', 'Guest Checkout', 'Guest Checkout', '2020-11-02 12:56:46', '2020-11-02 12:56:46'),
(318, 'en', 'Continue to Delivery Info', 'Continue to Delivery Info', '2020-11-02 12:57:44', '2020-11-02 12:57:44'),
(319, 'en', 'Postal Code', 'Postal Code', '2020-11-02 13:01:01', '2020-11-02 13:01:01'),
(320, 'en', 'Choose Delivery Type', 'Choose Delivery Type', '2020-11-02 13:01:04', '2020-11-02 13:01:04'),
(321, 'en', 'Local Pickup', 'Local Pickup', '2020-11-02 13:01:04', '2020-11-02 13:01:04'),
(322, 'en', 'Select your nearest pickup point', 'Select your nearest pickup point', '2020-11-02 13:01:04', '2020-11-02 13:01:04'),
(323, 'en', 'Continue to Payment', 'Continue to Payment', '2020-11-02 13:01:04', '2020-11-02 13:01:04'),
(324, 'en', 'Select a payment option', 'Select a payment option', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(325, 'en', 'Razorpay', 'Razorpay', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(326, 'en', 'Paystack', 'Paystack', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(327, 'en', 'VoguePay', 'VoguePay', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(328, 'en', 'payhere', 'payhere', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(329, 'en', 'ngenius', 'ngenius', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(330, 'en', 'Paytm', 'Paytm', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(331, 'en', 'Cash on Delivery', 'Cash on Delivery', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(332, 'en', 'Your wallet balance :', 'Your wallet balance :', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(333, 'en', 'Insufficient balance', 'Insufficient balance', '2020-11-02 13:01:13', '2020-11-02 13:01:13'),
(334, 'en', 'I agree to the', 'I agree to the', '2020-11-02 13:01:14', '2020-11-02 13:01:14'),
(338, 'en', 'Complete Order', 'Complete Order', '2020-11-02 13:01:14', '2020-11-02 13:01:14'),
(339, 'en', 'Summary', 'Summary', '2020-11-02 13:01:14', '2020-11-02 13:01:14'),
(340, 'en', 'Items', 'Items', '2020-11-02 13:01:14', '2020-11-02 13:01:14'),
(341, 'en', 'Total Club point', 'Total Club point', '2020-11-02 13:01:14', '2020-11-02 13:01:14'),
(342, 'en', 'Total Shipping', 'Total Shipping', '2020-11-02 13:01:14', '2020-11-02 13:01:14'),
(343, 'en', 'Have coupon code? Enter here', 'Have coupon code? Enter here', '2020-11-02 13:01:14', '2020-11-02 13:01:14'),
(344, 'en', 'Apply', 'Apply', '2020-11-02 13:01:14', '2020-11-02 13:01:14'),
(345, 'en', 'You need to agree with our policies', 'You need to agree with our policies', '2020-11-02 13:01:14', '2020-11-02 13:01:14'),
(346, 'en', 'Forgot password', 'Forgot password', '2020-11-02 13:01:25', '2020-11-02 13:01:25'),
(469, 'en', 'SEO Setting', 'SEO Setting', '2020-11-02 13:01:33', '2020-11-02 13:01:33'),
(474, 'en', 'System Update', 'System Update', '2020-11-02 13:01:34', '2020-11-02 13:01:34'),
(480, 'en', 'Add New Payment Method', 'Add New Payment Method', '2020-11-02 13:01:38', '2020-11-02 13:01:38'),
(481, 'en', 'Manual Payment Method', 'Manual Payment Method', '2020-11-02 13:01:38', '2020-11-02 13:01:38'),
(482, 'en', 'Heading', 'Heading', '2020-11-02 13:01:38', '2020-11-02 13:01:38'),
(483, 'en', 'Logo', 'Logo', '2020-11-02 13:01:38', '2020-11-02 13:01:38'),
(484, 'en', 'Manual Payment Information', 'Manual Payment Information', '2020-11-02 13:01:42', '2020-11-02 13:01:42'),
(485, 'en', 'Type', 'Type', '2020-11-02 13:01:42', '2020-11-02 13:01:42'),
(486, 'en', 'Custom Payment', 'Custom Payment', '2020-11-02 13:01:42', '2020-11-02 13:01:42'),
(487, 'en', 'Check Payment', 'Check Payment', '2020-11-02 13:01:42', '2020-11-02 13:01:42'),
(488, 'en', 'Checkout Thumbnail', 'Checkout Thumbnail', '2020-11-02 13:01:42', '2020-11-02 13:01:42'),
(489, 'en', 'Payment Instruction', 'Payment Instruction', '2020-11-02 13:01:42', '2020-11-02 13:01:42'),
(490, 'en', 'Bank Information', 'Bank Information', '2020-11-02 13:01:42', '2020-11-02 13:01:42'),
(491, 'en', 'Select File', 'Select File', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(492, 'en', 'Upload New', 'Upload New', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(493, 'en', 'Sort by newest', 'Sort by newest', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(494, 'en', 'Sort by oldest', 'Sort by oldest', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(495, 'en', 'Sort by smallest', 'Sort by smallest', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(496, 'en', 'Sort by largest', 'Sort by largest', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(497, 'en', 'Selected Only', 'Selected Only', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(498, 'en', 'No files found', 'No files found', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(499, 'en', '0 File selected', '0 File selected', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(500, 'en', 'Clear', 'Clear', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(501, 'en', 'Prev', 'Prev', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(502, 'en', 'Next', 'Next', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(503, 'en', 'Add Files', 'Add Files', '2020-11-02 13:01:53', '2020-11-02 13:01:53'),
(504, 'en', 'Method has been inserted successfully', 'Method has been inserted successfully', '2020-11-02 13:02:03', '2020-11-02 13:02:03'),
(506, 'en', 'Order Date', 'Order Date', '2020-11-02 13:02:42', '2020-11-02 13:02:42'),
(507, 'en', 'Bill to', 'Bill to', '2020-11-02 13:02:42', '2020-11-02 13:02:42'),
(510, 'en', 'Sub Total', 'Sub Total', '2020-11-02 13:02:42', '2020-11-02 13:02:42'),
(512, 'en', 'Total Tax', 'Total Tax', '2020-11-02 13:02:42', '2020-11-02 13:02:42'),
(513, 'en', 'Grand Total', 'Grand Total', '2020-11-02 13:02:42', '2020-11-02 13:02:42'),
(514, 'en', 'Your order has been placed successfully. Please submit payment information from purchase history', 'Your order has been placed successfully. Please submit payment information from purchase history', '2020-11-02 13:02:47', '2020-11-02 13:02:47'),
(515, 'en', 'Thank You for Your Order!', 'Thank You for Your Order!', '2020-11-02 13:02:48', '2020-11-02 13:02:48'),
(516, 'en', 'Order Code:', 'Order Code:', '2020-11-02 13:02:48', '2020-11-02 13:02:48'),
(517, 'en', 'A copy or your order summary has been sent to', 'A copy or your order summary has been sent to', '2020-11-02 13:02:48', '2020-11-02 13:02:48'),
(518, 'en', 'Make Payment', 'Make Payment', '2020-11-02 13:03:26', '2020-11-02 13:03:26'),
(519, 'en', 'Payment screenshot', 'Payment screenshot', '2020-11-02 13:03:29', '2020-11-02 13:03:29'),
(520, 'en', 'Paypal Credential', 'Paypal Credential', '2020-11-02 13:12:20', '2020-11-02 13:12:20'),
(522, 'en', 'Paypal Client ID', 'Paypal Client ID', '2020-11-02 13:12:20', '2020-11-02 13:12:20'),
(523, 'en', 'Paypal Client Secret', 'Paypal Client Secret', '2020-11-02 13:12:20', '2020-11-02 13:12:20'),
(524, 'en', 'Paypal Sandbox Mode', 'Paypal Sandbox Mode', '2020-11-02 13:12:20', '2020-11-02 13:12:20'),
(525, 'en', 'Sslcommerz Credential', 'Sslcommerz Credential', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(526, 'en', 'Sslcz Store Id', 'Sslcz Store Id', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(527, 'en', 'Sslcz store password', 'Sslcz store password', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(528, 'en', 'Sslcommerz Sandbox Mode', 'Sslcommerz Sandbox Mode', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(529, 'en', 'Stripe Credential', 'Stripe Credential', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(531, 'en', 'STRIPE KEY', 'STRIPE KEY', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(533, 'en', 'STRIPE SECRET', 'STRIPE SECRET', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(534, 'en', 'RazorPay Credential', 'RazorPay Credential', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(535, 'en', 'RAZOR KEY', 'RAZOR KEY', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(536, 'en', 'RAZOR SECRET', 'RAZOR SECRET', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(537, 'en', 'Instamojo Credential', 'Instamojo Credential', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(538, 'en', 'API KEY', 'API KEY', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(539, 'en', 'IM API KEY', 'IM API KEY', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(540, 'en', 'AUTH TOKEN', 'AUTH TOKEN', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(541, 'en', 'IM AUTH TOKEN', 'IM AUTH TOKEN', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(542, 'en', 'Instamojo Sandbox Mode', 'Instamojo Sandbox Mode', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(543, 'en', 'PayStack Credential', 'PayStack Credential', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(544, 'en', 'PUBLIC KEY', 'PUBLIC KEY', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(545, 'en', 'SECRET KEY', 'SECRET KEY', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(546, 'en', 'MERCHANT EMAIL', 'MERCHANT EMAIL', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(547, 'en', 'VoguePay Credential', 'VoguePay Credential', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(548, 'en', 'MERCHANT ID', 'MERCHANT ID', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(549, 'en', 'Sandbox Mode', 'Sandbox Mode', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(550, 'en', 'Payhere Credential', 'Payhere Credential', '2020-11-02 13:12:21', '2020-11-02 13:12:21'),
(551, 'en', 'PAYHERE MERCHANT ID', 'PAYHERE MERCHANT ID', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(552, 'en', 'PAYHERE SECRET', 'PAYHERE SECRET', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(553, 'en', 'PAYHERE CURRENCY', 'PAYHERE CURRENCY', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(554, 'en', 'Payhere Sandbox Mode', 'Payhere Sandbox Mode', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(555, 'en', 'Ngenius Credential', 'Ngenius Credential', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(556, 'en', 'NGENIUS OUTLET ID', 'NGENIUS OUTLET ID', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(557, 'en', 'NGENIUS API KEY', 'NGENIUS API KEY', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(558, 'en', 'NGENIUS CURRENCY', 'NGENIUS CURRENCY', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(559, 'en', 'Mpesa Credential', 'Mpesa Credential', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(560, 'en', 'MPESA CONSUMER KEY', 'MPESA CONSUMER KEY', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(561, 'en', 'MPESA_CONSUMER_KEY', 'MPESA_CONSUMER_KEY', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(562, 'en', 'MPESA CONSUMER SECRET', 'MPESA CONSUMER SECRET', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(563, 'en', 'MPESA_CONSUMER_SECRET', 'MPESA_CONSUMER_SECRET', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(564, 'en', 'MPESA SHORT CODE', 'MPESA SHORT CODE', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(565, 'en', 'MPESA_SHORT_CODE', 'MPESA_SHORT_CODE', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(566, 'en', 'MPESA SANDBOX ACTIVATION', 'MPESA SANDBOX ACTIVATION', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(567, 'en', 'Flutterwave Credential', 'Flutterwave Credential', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(568, 'en', 'RAVE_PUBLIC_KEY', 'RAVE_PUBLIC_KEY', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(569, 'en', 'RAVE_SECRET_KEY', 'RAVE_SECRET_KEY', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(570, 'en', 'RAVE_TITLE', 'RAVE_TITLE', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(571, 'en', 'STAGIN ACTIVATION', 'STAGIN ACTIVATION', '2020-11-02 13:12:22', '2020-11-02 13:12:22'),
(573, 'en', 'All Product', 'All Product', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(574, 'en', 'Sort By', 'Sort By', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(575, 'en', 'Rating (High > Low)', 'Rating (High > Low)', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(576, 'en', 'Rating (Low > High)', 'Rating (Low > High)', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(577, 'en', 'Num of Sale (High > Low)', 'Num of Sale (High > Low)', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(578, 'en', 'Num of Sale (Low > High)', 'Num of Sale (Low > High)', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(579, 'en', 'Base Price (High > Low)', 'Base Price (High > Low)', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(580, 'en', 'Base Price (Low > High)', 'Base Price (Low > High)', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(581, 'en', 'Type & Enter', 'Type & Enter', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(582, 'en', 'Added By', 'Added By', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(583, 'en', 'Num of Sale', 'Num of Sale', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(584, 'en', 'Total Stock', 'Total Stock', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(585, 'en', 'Todays Deal', 'Todays Deal', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(586, 'en', 'Rating', 'Rating', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(587, 'en', 'times', 'times', '2020-11-02 13:15:01', '2020-11-02 13:15:01'),
(588, 'en', 'Add Nerw Product', 'Add Nerw Product', '2020-11-02 13:15:02', '2020-11-02 13:15:02'),
(589, 'en', 'Product Information', 'Product Information', '2020-11-02 13:15:02', '2020-11-02 13:15:02'),
(590, 'en', 'Unit', 'Unit', '2020-11-02 13:15:02', '2020-11-02 13:15:02'),
(591, 'en', 'Unit (e.g. KG, Pc etc)', 'Unit (e.g. KG, Pc etc)', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(592, 'en', 'Minimum Qty', 'Minimum Qty', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(593, 'en', 'Tags', 'Tags', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(594, 'en', 'Type and hit enter to add a tag', 'Type and hit enter to add a tag', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(595, 'en', 'Barcode', 'Barcode', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(596, 'en', 'Refundable', 'Refundable', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(597, 'en', 'Product Images', 'Product Images', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(598, 'en', 'Gallery Images', 'Gallery Images', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(599, 'en', 'Todays Deal updated successfully', 'Todays Deal updated successfully', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(600, 'en', 'Published products updated successfully', 'Published products updated successfully', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(601, 'en', 'Thumbnail Image', 'Thumbnail Image', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(602, 'en', 'Featured products updated successfully', 'Featured products updated successfully', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(603, 'en', 'Product Videos', 'Product Videos', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(604, 'en', 'Video Provider', 'Video Provider', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(605, 'en', 'Youtube', 'Youtube', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(606, 'en', 'Dailymotion', 'Dailymotion', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(607, 'en', 'Vimeo', 'Vimeo', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(608, 'en', 'Video Link', 'Video Link', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(609, 'en', 'Product Variation', 'Product Variation', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(610, 'en', 'Colors', 'Colors', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(611, 'en', 'Attributes', 'Attributes', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(612, 'en', 'Choose Attributes', 'Choose Attributes', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(613, 'en', 'Choose the attributes of this product and then input values of each attribute', 'Choose the attributes of this product and then input values of each attribute', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(614, 'en', 'Product price + stock', 'Product price + stock', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(616, 'en', 'Unit price', 'Unit price', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(617, 'en', 'Purchase price', 'Purchase price', '2020-11-02 13:15:03', '2020-11-02 13:15:03'),
(618, 'en', 'Flat', 'Flat', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(619, 'en', 'Percent', 'Percent', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(620, 'en', 'Discount', 'Discount', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(621, 'en', 'Product Description', 'Product Description', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(622, 'en', 'Product Shipping Cost', 'Product Shipping Cost', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(623, 'en', 'Free Shipping', 'Free Shipping', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(624, 'en', 'Flat Rate', 'Flat Rate', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(625, 'en', 'Shipping cost', 'Shipping cost', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(626, 'en', 'PDF Specification', 'PDF Specification', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(627, 'en', 'SEO Meta Tags', 'SEO Meta Tags', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(628, 'en', 'Meta Title', 'Meta Title', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(629, 'en', 'Meta Image', 'Meta Image', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(630, 'en', 'Choice Title', 'Choice Title', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(631, 'en', 'Enter choice values', 'Enter choice values', '2020-11-02 13:15:04', '2020-11-02 13:15:04'),
(632, 'en', 'All categories', 'All categories', '2020-11-03 07:12:19', '2020-11-03 07:12:19'),
(633, 'en', 'Add New category', 'Add New category', '2020-11-03 07:12:19', '2020-11-03 07:12:19'),
(634, 'en', 'Type name & Enter', 'Type name & Enter', '2020-11-03 07:12:19', '2020-11-03 07:12:19'),
(635, 'en', 'Banner', 'Banner', '2020-11-03 07:12:19', '2020-11-03 07:12:19'),
(637, 'en', 'Commission', 'Commission', '2020-11-03 07:12:19', '2020-11-03 07:12:19'),
(638, 'en', 'icon', 'icon', '2020-11-03 07:12:19', '2020-11-03 07:12:19'),
(639, 'en', 'Featured categories updated successfully', 'Featured categories updated successfully', '2020-11-03 07:12:20', '2020-11-03 07:12:20'),
(640, 'en', 'Hot', 'Hot', '2020-11-03 07:13:12', '2020-11-03 07:13:12'),
(641, 'en', 'Filter by Payment Status', 'Filter by Payment Status', '2020-11-03 07:15:15', '2020-11-03 07:15:15'),
(642, 'en', 'Un-Paid', 'Un-Paid', '2020-11-03 07:15:15', '2020-11-03 07:15:15'),
(643, 'en', 'Filter by Deliver Status', 'Filter by Deliver Status', '2020-11-03 07:15:15', '2020-11-03 07:15:15'),
(644, 'en', 'Pending', 'Pending', '2020-11-03 07:15:15', '2020-11-03 07:15:15'),
(645, 'en', 'Type Order code & hit Enter', 'Type Order code & hit Enter', '2020-11-03 07:15:15', '2020-11-03 07:15:15'),
(646, 'en', 'Num. of Products', 'Num. of Products', '2020-11-03 07:15:15', '2020-11-03 07:15:15'),
(647, 'en', 'Walk In Customer', 'Walk In Customer', '2020-11-03 10:03:20', '2020-11-03 10:03:20'),
(648, 'en', 'QTY', 'QTY', '2020-11-03 10:03:20', '2020-11-03 10:03:20'),
(649, 'en', 'Without Shipping Charge', 'Without Shipping Charge', '2020-11-03 10:03:20', '2020-11-03 10:03:20'),
(650, 'en', 'With Shipping Charge', 'With Shipping Charge', '2020-11-03 10:03:20', '2020-11-03 10:03:20'),
(651, 'en', 'Pay With Cash', 'Pay With Cash', '2020-11-03 10:03:20', '2020-11-03 10:03:20'),
(652, 'en', 'Shipping Address', 'Shipping Address', '2020-11-03 10:03:20', '2020-11-03 10:03:20'),
(653, 'en', 'Close', 'Close', '2020-11-03 10:03:20', '2020-11-03 10:03:20'),
(654, 'en', 'Select country', 'Select country', '2020-11-03 10:03:21', '2020-11-03 10:03:21'),
(655, 'en', 'Order Confirmation', 'Order Confirmation', '2020-11-03 10:03:21', '2020-11-03 10:03:21'),
(656, 'en', 'Are you sure to confirm this order?', 'Are you sure to confirm this order?', '2020-11-03 10:03:21', '2020-11-03 10:03:21'),
(657, 'en', 'Comfirm Order', 'Comfirm Order', '2020-11-03 10:03:21', '2020-11-03 10:03:21'),
(659, 'en', 'Personal Info', 'Personal Info', '2020-11-03 11:38:15', '2020-11-03 11:38:15'),
(660, 'en', 'Repeat Password', 'Repeat Password', '2020-11-03 11:38:15', '2020-11-03 11:38:15'),
(661, 'en', 'Shop Name', 'Shop Name', '2020-11-03 11:38:15', '2020-11-03 11:38:15'),
(662, 'en', 'Register Your Shop', 'Register Your Shop', '2020-11-03 11:38:15', '2020-11-03 11:38:15'),
(663, 'en', 'Affiliate Informations', 'Affiliate Informations', '2020-11-03 11:39:06', '2020-11-03 11:39:06'),
(664, 'en', 'Affiliate', 'Affiliate', '2020-11-03 11:39:06', '2020-11-03 11:39:06'),
(665, 'en', 'User Info', 'User Info', '2020-11-03 11:39:06', '2020-11-03 11:39:06'),
(667, 'en', 'Installed Addon', 'Installed Addon', '2020-11-03 11:48:13', '2020-11-03 11:48:13'),
(668, 'en', 'Available Addon', 'Available Addon', '2020-11-03 11:48:13', '2020-11-03 11:48:13'),
(669, 'en', 'Install New Addon', 'Install New Addon', '2020-11-03 11:48:13', '2020-11-03 11:48:13'),
(670, 'en', 'Version', 'Version', '2020-11-03 11:48:13', '2020-11-03 11:48:13'),
(671, 'en', 'Activated', 'Activated', '2020-11-03 11:48:13', '2020-11-03 11:48:13'),
(672, 'en', 'Deactivated', 'Deactivated', '2020-11-03 11:48:13', '2020-11-03 11:48:13'),
(673, 'en', 'Activate OTP', 'Activate OTP', '2020-11-03 11:48:20', '2020-11-03 11:48:20'),
(674, 'en', 'OTP will be Used For', 'OTP will be Used For', '2020-11-03 11:48:20', '2020-11-03 11:48:20'),
(675, 'en', 'Settings updated successfully', 'Settings updated successfully', '2020-11-03 11:48:20', '2020-11-03 11:48:20'),
(676, 'en', 'Product Owner', 'Product Owner', '2020-11-03 11:48:46', '2020-11-03 11:48:46'),
(677, 'en', 'Point', 'Point', '2020-11-03 11:48:46', '2020-11-03 11:48:46'),
(678, 'en', 'Set Point for Product Within a Range', 'Set Point for Product Within a Range', '2020-11-03 11:48:47', '2020-11-03 11:48:47'),
(679, 'en', 'Set Point for multiple products', 'Set Point for multiple products', '2020-11-03 11:48:47', '2020-11-03 11:48:47'),
(680, 'en', 'Min Price', 'Min Price', '2020-11-03 11:48:47', '2020-11-03 11:48:47'),
(681, 'en', 'Max Price', 'Max Price', '2020-11-03 11:48:47', '2020-11-03 11:48:47'),
(682, 'en', 'Set Point for all Products', 'Set Point for all Products', '2020-11-03 11:48:47', '2020-11-03 11:48:47'),
(683, 'en', 'Set Point For ', 'Set Point For ', '2020-11-03 11:48:47', '2020-11-03 11:48:47'),
(684, 'en', 'Convert Status', 'Convert Status', '2020-11-03 11:48:58', '2020-11-03 11:48:58'),
(685, 'en', 'Earned At', 'Earned At', '2020-11-03 11:48:59', '2020-11-03 11:48:59'),
(686, 'en', 'Seller Based Selling Report', 'Seller Based Selling Report', '2020-11-03 11:49:35', '2020-11-03 11:49:35'),
(687, 'en', 'Sort by verificarion status', 'Sort by verificarion status', '2020-11-03 11:49:35', '2020-11-03 11:49:35'),
(688, 'en', 'Approved', 'Approved', '2020-11-03 11:49:35', '2020-11-03 11:49:35'),
(689, 'en', 'Non Approved', 'Non Approved', '2020-11-03 11:49:35', '2020-11-03 11:49:35'),
(690, 'en', 'Filter', 'Filter', '2020-11-03 11:49:35', '2020-11-03 11:49:35'),
(691, 'en', 'Seller Name', 'Seller Name', '2020-11-03 11:49:35', '2020-11-03 11:49:35'),
(692, 'en', 'Number of Product Sale', 'Number of Product Sale', '2020-11-03 11:49:36', '2020-11-03 11:49:36'),
(693, 'en', 'Order Amount', 'Order Amount', '2020-11-03 11:49:36', '2020-11-03 11:49:36'),
(694, 'en', 'Facebook Chat Setting', 'Facebook Chat Setting', '2020-11-03 11:51:14', '2020-11-03 11:51:14'),
(695, 'en', 'Facebook Page ID', 'Facebook Page ID', '2020-11-03 11:51:14', '2020-11-03 11:51:14'),
(696, 'en', 'Please be carefull when you are configuring Facebook chat. For incorrect configuration you will not get messenger icon on your user-end site.', 'Please be carefull when you are configuring Facebook chat. For incorrect configuration you will not get messenger icon on your user-end site.', '2020-11-03 11:51:14', '2020-11-03 11:51:14'),
(697, 'en', 'Login into your facebook page', 'Login into your facebook page', '2020-11-03 11:51:14', '2020-11-03 11:51:14'),
(698, 'en', 'Find the About option of your facebook page', 'Find the About option of your facebook page', '2020-11-03 11:51:14', '2020-11-03 11:51:14'),
(699, 'en', 'At the very bottom, you can find the \\“Facebook Page ID\\”', 'At the very bottom, you can find the \\“Facebook Page ID\\”', '2020-11-03 11:51:14', '2020-11-03 11:51:14'),
(700, 'en', 'Go to Settings of your page and find the option of \\\"Advance Messaging\\\"', 'Go to Settings of your page and find the option of \\\"Advance Messaging\\\"', '2020-11-03 11:51:14', '2020-11-03 11:51:14'),
(701, 'en', 'Scroll down that page and you will get \\\"white listed domain\\\"', 'Scroll down that page and you will get \\\"white listed domain\\\"', '2020-11-03 11:51:14', '2020-11-03 11:51:14'),
(702, 'en', 'Set your website domain name', 'Set your website domain name', '2020-11-03 11:51:14', '2020-11-03 11:51:14'),
(703, 'en', 'Google reCAPTCHA Setting', 'Google reCAPTCHA Setting', '2020-11-03 11:51:25', '2020-11-03 11:51:25'),
(704, 'en', 'Site KEY', 'Site KEY', '2020-11-03 11:51:25', '2020-11-03 11:51:25'),
(705, 'en', 'Select Shipping Method', 'Select Shipping Method', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(706, 'en', 'Product Wise Shipping Cost', 'Product Wise Shipping Cost', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(707, 'en', 'Flat Rate Shipping Cost', 'Flat Rate Shipping Cost', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(708, 'en', 'Seller Wise Flat Shipping Cost', 'Seller Wise Flat Shipping Cost', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(709, 'en', 'Note', 'Note', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(710, 'en', 'Product Wise Shipping Cost calulation: Shipping cost is calculate by addition of each product shipping cost', 'Product Wise Shipping Cost calulation: Shipping cost is calculate by addition of each product shipping cost', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(711, 'en', 'Flat Rate Shipping Cost calulation: How many products a customer purchase, doesn\'t matter. Shipping cost is fixed', 'Flat Rate Shipping Cost calulation: How many products a customer purchase, doesn\'t matter. Shipping cost is fixed', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(712, 'en', 'Seller Wise Flat Shipping Cost calulation: Fixed rate for each seller. If a customer purchase 2 product from two seller shipping cost is calculate by addition of each seller flat shipping cost', 'Seller Wise Flat Shipping Cost calulation: Fixed rate for each seller. If a customer purchase 2 product from two seller shipping cost is calculate by addition of each seller flat shipping cost', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(713, 'en', 'Flat Rate Cost', 'Flat Rate Cost', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(714, 'en', 'Shipping Cost for Admin Products', 'Shipping Cost for Admin Products', '2020-11-03 11:51:32', '2020-11-03 11:51:32'),
(715, 'en', 'Countries', 'Countries', '2020-11-03 11:52:02', '2020-11-03 11:52:02'),
(716, 'en', 'Show/Hide', 'Show/Hide', '2020-11-03 11:52:02', '2020-11-03 11:52:02'),
(717, 'en', 'Country status updated successfully', 'Country status updated successfully', '2020-11-03 11:52:02', '2020-11-03 11:52:02'),
(718, 'en', 'All Subcategories', 'All Subcategories', '2020-11-03 12:27:55', '2020-11-03 12:27:55'),
(719, 'en', 'Add New Subcategory', 'Add New Subcategory', '2020-11-03 12:27:55', '2020-11-03 12:27:55'),
(720, 'en', 'Sub-Categories', 'Sub-Categories', '2020-11-03 12:27:55', '2020-11-03 12:27:55'),
(721, 'en', 'Sub Category Information', 'Sub Category Information', '2020-11-03 12:28:07', '2020-11-03 12:28:07'),
(723, 'en', 'Slug', 'Slug', '2020-11-03 12:28:07', '2020-11-03 12:28:07'),
(724, 'en', 'All Sub Subcategories', 'All Sub Subcategories', '2020-11-03 12:29:12', '2020-11-03 12:29:12'),
(725, 'en', 'Add New Sub Subcategory', 'Add New Sub Subcategory', '2020-11-03 12:29:12', '2020-11-03 12:29:12'),
(726, 'en', 'Sub-Sub-categories', 'Sub-Sub-categories', '2020-11-03 12:29:12', '2020-11-03 12:29:12'),
(727, 'en', 'Make This Default', 'Make This Default', '2020-11-04 08:24:24', '2020-11-04 08:24:24');
INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(728, 'en', 'Shops', 'Shops', '2020-11-04 11:17:10', '2020-11-04 11:17:10'),
(729, 'en', 'Women Clothing & Fashion', 'Women Clothing & Fashion', '2020-11-04 11:23:12', '2020-11-04 11:23:12'),
(730, 'en', 'Cellphones & Tabs', 'Cellphones & Tabs', '2020-11-04 12:10:41', '2020-11-04 12:10:41'),
(731, 'en', 'Welcome to', 'Welcome to', '2020-11-07 07:14:43', '2020-11-07 07:14:43'),
(732, 'en', 'Create a New Account', 'Create a New Account', '2020-11-07 07:32:15', '2020-11-07 07:32:15'),
(733, 'en', 'Full Name', 'Full Name', '2020-11-07 07:32:15', '2020-11-07 07:32:15'),
(734, 'en', 'password', 'password', '2020-11-07 07:32:15', '2020-11-07 07:32:15'),
(735, 'en', 'Confrim Password', 'Confrim Password', '2020-11-07 07:32:15', '2020-11-07 07:32:15'),
(736, 'en', 'I agree with the', 'I agree with the', '2020-11-07 07:32:15', '2020-11-07 07:32:15'),
(737, 'en', 'Terms and Conditions', 'Terms and Conditions', '2020-11-07 07:32:15', '2020-11-07 07:32:15'),
(738, 'en', 'Register', 'Register', '2020-11-07 07:32:15', '2020-11-07 07:32:15'),
(739, 'en', 'Already have an account', 'Already have an account', '2020-11-07 07:32:16', '2020-11-07 07:32:16'),
(741, 'en', 'Sign Up with', 'Sign Up with', '2020-11-07 07:32:16', '2020-11-07 07:32:16'),
(742, 'en', 'I agree with the Terms and Conditions', 'I agree with the Terms and Conditions', '2020-11-07 07:34:49', '2020-11-07 07:34:49'),
(745, 'en', 'All Role', 'All Role', '2020-11-07 07:44:28', '2020-11-07 07:44:28'),
(746, 'en', 'Add New Role', 'Add New Role', '2020-11-07 07:44:28', '2020-11-07 07:44:28'),
(747, 'en', 'Roles', 'Roles', '2020-11-07 07:44:28', '2020-11-07 07:44:28'),
(749, 'en', 'Add New Staffs', 'Add New Staffs', '2020-11-07 07:44:36', '2020-11-07 07:44:36'),
(750, 'en', 'Role', 'Role', '2020-11-07 07:44:36', '2020-11-07 07:44:36'),
(751, 'en', 'Frontend Website Name', 'Frontend Website Name', '2020-11-07 07:44:59', '2020-11-07 07:44:59'),
(752, 'en', 'Website Name', 'Website Name', '2020-11-07 07:44:59', '2020-11-07 07:44:59'),
(753, 'en', 'Site Motto', 'Site Motto', '2020-11-07 07:44:59', '2020-11-07 07:44:59'),
(754, 'en', 'Best eCommerce Website', 'Best eCommerce Website', '2020-11-07 07:44:59', '2020-11-07 07:44:59'),
(755, 'en', 'Site Icon', 'Site Icon', '2020-11-07 07:44:59', '2020-11-07 07:44:59'),
(756, 'en', 'Website favicon. 32x32 .png', 'Website favicon. 32x32 .png', '2020-11-07 07:44:59', '2020-11-07 07:44:59'),
(757, 'en', 'Website Base Color', 'Website Base Color', '2020-11-07 07:44:59', '2020-11-07 07:44:59'),
(758, 'en', 'Hex Color Code', 'Hex Color Code', '2020-11-07 07:44:59', '2020-11-07 07:44:59'),
(759, 'en', 'Website Base Hover Color', 'Website Base Hover Color', '2020-11-07 07:44:59', '2020-11-07 07:44:59'),
(760, 'en', 'Update', 'Update', '2020-11-07 07:45:00', '2020-11-07 07:45:00'),
(761, 'en', 'Global Seo', 'Global Seo', '2020-11-07 07:45:00', '2020-11-07 07:45:00'),
(762, 'en', 'Meta description', 'Meta description', '2020-11-07 07:45:00', '2020-11-07 07:45:00'),
(763, 'en', 'Keywords', 'Keywords', '2020-11-07 07:45:00', '2020-11-07 07:45:00'),
(764, 'en', 'Separate with coma', 'Separate with coma', '2020-11-07 07:45:00', '2020-11-07 07:45:00'),
(765, 'en', 'Website Pages', 'Website Pages', '2020-11-07 07:49:04', '2020-11-07 07:49:04'),
(766, 'en', 'All Pages', 'All Pages', '2020-11-07 07:49:04', '2020-11-07 07:49:04'),
(767, 'en', 'Add New Page', 'Add New Page', '2020-11-07 07:49:04', '2020-11-07 07:49:04'),
(768, 'en', 'URL', 'URL', '2020-11-07 07:49:04', '2020-11-07 07:49:04'),
(769, 'en', 'Actions', 'Actions', '2020-11-07 07:49:04', '2020-11-07 07:49:04'),
(770, 'en', 'Edit Page Information', 'Edit Page Information', '2020-11-07 07:49:22', '2020-11-07 07:49:22'),
(771, 'en', 'Page Content', 'Page Content', '2020-11-07 07:49:22', '2020-11-07 07:49:22'),
(772, 'en', 'Title', 'Title', '2020-11-07 07:49:22', '2020-11-07 07:49:22'),
(773, 'en', 'Link', 'Link', '2020-11-07 07:49:22', '2020-11-07 07:49:22'),
(774, 'en', 'Use character, number, hypen only', 'Use character, number, hypen only', '2020-11-07 07:49:22', '2020-11-07 07:49:22'),
(775, 'en', 'Add Content', 'Add Content', '2020-11-07 07:49:22', '2020-11-07 07:49:22'),
(776, 'en', 'Seo Fields', 'Seo Fields', '2020-11-07 07:49:22', '2020-11-07 07:49:22'),
(777, 'en', 'Update Page', 'Update Page', '2020-11-07 07:49:22', '2020-11-07 07:49:22'),
(778, 'en', 'Default Language', 'Default Language', '2020-11-07 07:50:09', '2020-11-07 07:50:09'),
(779, 'en', 'Add New Language', 'Add New Language', '2020-11-07 07:50:09', '2020-11-07 07:50:09'),
(780, 'en', 'RTL', 'RTL', '2020-11-07 07:50:09', '2020-11-07 07:50:09'),
(781, 'en', 'Translation', 'Translation', '2020-11-07 07:50:09', '2020-11-07 07:50:09'),
(782, 'en', 'Language Information', 'Language Information', '2020-11-07 07:50:23', '2020-11-07 07:50:23'),
(783, 'en', 'Save Page', 'Save Page', '2020-11-07 07:51:27', '2020-11-07 07:51:27'),
(784, 'en', 'Home Page Settings', 'Home Page Settings', '2020-11-07 07:51:35', '2020-11-07 07:51:35'),
(785, 'en', 'Home Slider', 'Home Slider', '2020-11-07 07:51:35', '2020-11-07 07:51:35'),
(786, 'en', 'Photos & Links', 'Photos & Links', '2020-11-07 07:51:35', '2020-11-07 07:51:35'),
(787, 'en', 'Add New', 'Add New', '2020-11-07 07:51:35', '2020-11-07 07:51:35'),
(788, 'en', 'Home Categories', 'Home Categories', '2020-11-07 07:51:35', '2020-11-07 07:51:35'),
(789, 'en', 'Home Banner 1 (Max 3)', 'Home Banner 1 (Max 3)', '2020-11-07 07:51:35', '2020-11-07 07:51:35'),
(790, 'en', 'Banner & Links', 'Banner & Links', '2020-11-07 07:51:35', '2020-11-07 07:51:35'),
(791, 'en', 'Home Banner 2 (Max 3)', 'Home Banner 2 (Max 3)', '2020-11-07 07:51:36', '2020-11-07 07:51:36'),
(792, 'en', 'Top 10', 'Top 10', '2020-11-07 07:51:36', '2020-11-07 07:51:36'),
(793, 'en', 'Top Categories (Max 10)', 'Top Categories (Max 10)', '2020-11-07 07:51:36', '2020-11-07 07:51:36'),
(794, 'en', 'Top Brands (Max 10)', 'Top Brands (Max 10)', '2020-11-07 07:51:36', '2020-11-07 07:51:36'),
(795, 'en', 'System Name', 'System Name', '2020-11-07 07:54:22', '2020-11-07 07:54:22'),
(796, 'en', 'System Logo - White', 'System Logo - White', '2020-11-07 07:54:22', '2020-11-07 07:54:22'),
(797, 'en', 'Choose Files', 'Choose Files', '2020-11-07 07:54:22', '2020-11-07 07:54:22'),
(798, 'en', 'Will be used in admin panel side menu', 'Will be used in admin panel side menu', '2020-11-07 07:54:23', '2020-11-07 07:54:23'),
(799, 'en', 'System Logo - Black', 'System Logo - Black', '2020-11-07 07:54:23', '2020-11-07 07:54:23'),
(800, 'en', 'Will be used in admin panel topbar in mobile + Admin login page', 'Will be used in admin panel topbar in mobile + Admin login page', '2020-11-07 07:54:23', '2020-11-07 07:54:23'),
(801, 'en', 'System Timezone', 'System Timezone', '2020-11-07 07:54:23', '2020-11-07 07:54:23'),
(802, 'en', 'Admin login page background', 'Admin login page background', '2020-11-07 07:54:23', '2020-11-07 07:54:23'),
(803, 'en', 'Website Header', 'Website Header', '2020-11-07 08:21:36', '2020-11-07 08:21:36'),
(804, 'en', 'Header Setting', 'Header Setting', '2020-11-07 08:21:36', '2020-11-07 08:21:36'),
(805, 'en', 'Header Logo', 'Header Logo', '2020-11-07 08:21:36', '2020-11-07 08:21:36'),
(806, 'en', 'Show Language Switcher?', 'Show Language Switcher?', '2020-11-07 08:21:36', '2020-11-07 08:21:36'),
(807, 'en', 'Show Currency Switcher?', 'Show Currency Switcher?', '2020-11-07 08:21:36', '2020-11-07 08:21:36'),
(808, 'en', 'Enable stikcy header?', 'Enable stikcy header?', '2020-11-07 08:21:36', '2020-11-07 08:21:36'),
(809, 'en', 'Website Footer', 'Website Footer', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(810, 'en', 'Footer Widget', 'Footer Widget', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(811, 'en', 'About Widget', 'About Widget', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(812, 'en', 'Footer Logo', 'Footer Logo', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(813, 'en', 'About description', 'About description', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(814, 'en', 'Contact Info Widget', 'Contact Info Widget', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(815, 'en', 'Footer contact address', 'Footer contact address', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(816, 'en', 'Footer contact phone', 'Footer contact phone', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(817, 'en', 'Footer contact email', 'Footer contact email', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(818, 'en', 'Link Widget One', 'Link Widget One', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(819, 'en', 'Links', 'Links', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(820, 'en', 'Footer Bottom', 'Footer Bottom', '2020-11-07 08:21:56', '2020-11-07 08:21:56'),
(821, 'en', 'Copyright Widget ', 'Copyright Widget ', '2020-11-07 08:21:57', '2020-11-07 08:21:57'),
(822, 'en', 'Copyright Text', 'Copyright Text', '2020-11-07 08:21:57', '2020-11-07 08:21:57'),
(823, 'en', 'Social Link Widget ', 'Social Link Widget ', '2020-11-07 08:21:57', '2020-11-07 08:21:57'),
(824, 'en', 'Show Social Links?', 'Show Social Links?', '2020-11-07 08:21:57', '2020-11-07 08:21:57'),
(825, 'en', 'Social Links', 'Social Links', '2020-11-07 08:21:57', '2020-11-07 08:21:57'),
(826, 'en', 'Payment Methods Widget ', 'Payment Methods Widget ', '2020-11-07 08:21:57', '2020-11-07 08:21:57'),
(827, 'en', 'RTL status updated successfully', 'RTL status updated successfully', '2020-11-07 08:36:11', '2020-11-07 08:36:11'),
(828, 'en', 'Language changed to ', 'Language changed to ', '2020-11-07 08:36:27', '2020-11-07 08:36:27'),
(829, 'en', 'Inhouse Product sale report', 'Inhouse Product sale report', '2020-11-07 09:30:25', '2020-11-07 09:30:25'),
(830, 'en', 'Sort by Category', 'Sort by Category', '2020-11-07 09:30:25', '2020-11-07 09:30:25'),
(831, 'en', 'Product wise stock report', 'Product wise stock report', '2020-11-07 09:31:02', '2020-11-07 09:31:02'),
(832, 'en', 'Currency changed to ', 'Currency changed to ', '2020-11-07 12:36:28', '2020-11-07 12:36:28'),
(833, 'en', 'Avatar', 'Avatar', '2020-11-08 09:32:35', '2020-11-08 09:32:35'),
(834, 'en', 'Copy', 'Copy', '2020-11-08 10:03:42', '2020-11-08 10:03:42'),
(835, 'en', 'Variant', 'Variant', '2020-11-08 10:43:02', '2020-11-08 10:43:02'),
(836, 'en', 'Variant Price', 'Variant Price', '2020-11-08 10:43:03', '2020-11-08 10:43:03'),
(837, 'en', 'SKU', 'SKU', '2020-11-08 10:43:03', '2020-11-08 10:43:03'),
(838, 'en', 'Key', 'Key', '2020-11-08 12:35:09', '2020-11-08 12:35:09'),
(839, 'en', 'Value', 'Value', '2020-11-08 12:35:09', '2020-11-08 12:35:09'),
(840, 'en', 'Copy Translations', 'Copy Translations', '2020-11-08 12:35:10', '2020-11-08 12:35:10'),
(841, 'en', 'All Pick-up Points', 'All Pick-up Points', '2020-11-08 12:35:43', '2020-11-08 12:35:43'),
(842, 'en', 'Add New Pick-up Point', 'Add New Pick-up Point', '2020-11-08 12:35:43', '2020-11-08 12:35:43'),
(843, 'en', 'Manager', 'Manager', '2020-11-08 12:35:43', '2020-11-08 12:35:43'),
(844, 'en', 'Location', 'Location', '2020-11-08 12:35:43', '2020-11-08 12:35:43'),
(845, 'en', 'Pickup Station Contact', 'Pickup Station Contact', '2020-11-08 12:35:43', '2020-11-08 12:35:43'),
(846, 'en', 'Open', 'Open', '2020-11-08 12:35:43', '2020-11-08 12:35:43'),
(847, 'en', 'POS Activation for Seller', 'POS Activation for Seller', '2020-11-08 12:35:55', '2020-11-08 12:35:55'),
(848, 'en', 'Order Completed Successfully.', 'Order Completed Successfully.', '2020-11-08 12:36:02', '2020-11-08 12:36:02'),
(849, 'en', 'Text Input', 'Text Input', '2020-11-08 12:38:40', '2020-11-08 12:38:40'),
(850, 'en', 'Select', 'Select', '2020-11-08 12:38:40', '2020-11-08 12:38:40'),
(851, 'en', 'Multiple Select', 'Multiple Select', '2020-11-08 12:38:40', '2020-11-08 12:38:40'),
(852, 'en', 'Radio', 'Radio', '2020-11-08 12:38:40', '2020-11-08 12:38:40'),
(853, 'en', 'File', 'File', '2020-11-08 12:38:40', '2020-11-08 12:38:40'),
(854, 'en', 'Email Address', 'Email Address', '2020-11-08 12:39:32', '2020-11-08 12:39:32'),
(855, 'en', 'Verification Info', 'Verification Info', '2020-11-08 12:39:32', '2020-11-08 12:39:32'),
(856, 'en', 'Approval', 'Approval', '2020-11-08 12:39:32', '2020-11-08 12:39:32'),
(857, 'en', 'Due Amount', 'Due Amount', '2020-11-08 12:39:32', '2020-11-08 12:39:32'),
(858, 'en', 'Show', 'Show', '2020-11-08 12:39:32', '2020-11-08 12:39:32'),
(859, 'en', 'Pay Now', 'Pay Now', '2020-11-08 12:39:32', '2020-11-08 12:39:32'),
(860, 'en', 'Affiliate User Verification', 'Affiliate User Verification', '2020-11-08 12:40:01', '2020-11-08 12:40:01'),
(861, 'en', 'Reject', 'Reject', '2020-11-08 12:40:01', '2020-11-08 12:40:01'),
(862, 'en', 'Accept', 'Accept', '2020-11-08 12:40:01', '2020-11-08 12:40:01'),
(863, 'en', 'Beauty, Health & Hair', 'Beauty, Health & Hair', '2020-11-08 12:54:17', '2020-11-08 12:54:17'),
(864, 'en', 'Comparison', 'Comparison', '2020-11-08 12:54:33', '2020-11-08 12:54:33'),
(865, 'en', 'Reset Compare List', 'Reset Compare List', '2020-11-08 12:54:33', '2020-11-08 12:54:33'),
(866, 'en', 'Your comparison list is empty', 'Your comparison list is empty', '2020-11-08 12:54:33', '2020-11-08 12:54:33'),
(867, 'en', 'Convert Point To Wallet', 'Convert Point To Wallet', '2020-11-08 13:04:42', '2020-11-08 13:04:42'),
(868, 'en', 'Note: You need to activate wallet option first before using club point addon.', 'Note: You need to activate wallet option first before using club point addon.', '2020-11-08 13:04:43', '2020-11-08 13:04:43'),
(869, 'en', 'Create an account.', 'Create an account.', '2020-11-09 06:17:11', '2020-11-09 06:17:11'),
(870, 'en', 'Use Email Instead', 'Use Email Instead', '2020-11-09 06:17:11', '2020-11-09 06:17:11'),
(871, 'en', 'By signing up you agree to our terms and conditions.', 'By signing up you agree to our terms and conditions.', '2020-11-09 06:17:11', '2020-11-09 06:17:11'),
(872, 'en', 'Create Account', 'Create Account', '2020-11-09 06:17:11', '2020-11-09 06:17:11'),
(873, 'en', 'Or Join With', 'Or Join With', '2020-11-09 06:17:11', '2020-11-09 06:17:11'),
(874, 'en', 'Already have an account?', 'Already have an account?', '2020-11-09 06:17:11', '2020-11-09 06:17:11'),
(875, 'en', 'Log In', 'Log In', '2020-11-09 06:17:11', '2020-11-09 06:17:11'),
(876, 'en', 'Computer & Accessories', 'Computer & Accessories', '2020-11-09 07:52:05', '2020-11-09 07:52:05'),
(878, 'en', 'Product(s)', 'Product(s)', '2020-11-09 07:52:23', '2020-11-09 07:52:23'),
(879, 'en', 'in your cart', 'in your cart', '2020-11-09 07:52:23', '2020-11-09 07:52:23'),
(880, 'en', 'in your wishlist', 'in your wishlist', '2020-11-09 07:52:23', '2020-11-09 07:52:23'),
(881, 'en', 'you ordered', 'you ordered', '2020-11-09 07:52:24', '2020-11-09 07:52:24'),
(882, 'en', 'Default Shipping Address', 'Default Shipping Address', '2020-11-09 07:52:24', '2020-11-09 07:52:24'),
(883, 'en', 'Sports & outdoor', 'Sports & outdoor', '2020-11-09 07:53:32', '2020-11-09 07:53:32'),
(884, 'en', 'Copied', 'Copied', '2020-11-09 07:54:19', '2020-11-09 07:54:19'),
(885, 'en', 'Copy the Promote Link', 'Copy the Promote Link', '2020-11-09 07:54:19', '2020-11-09 07:54:19'),
(886, 'en', 'Write a review', 'Write a review', '2020-11-09 07:54:20', '2020-11-09 07:54:20'),
(887, 'en', 'Your name', 'Your name', '2020-11-09 07:54:20', '2020-11-09 07:54:20'),
(888, 'en', 'Comment', 'Comment', '2020-11-09 07:54:20', '2020-11-09 07:54:20'),
(889, 'en', 'Your review', 'Your review', '2020-11-09 07:54:20', '2020-11-09 07:54:20'),
(890, 'en', 'Submit review', 'Submit review', '2020-11-09 07:54:20', '2020-11-09 07:54:20'),
(891, 'en', 'Claire Willis', 'Claire Willis', '2020-11-09 08:05:00', '2020-11-09 08:05:00'),
(892, 'en', 'Germaine Greene', 'Germaine Greene', '2020-11-09 08:05:00', '2020-11-09 08:05:00'),
(893, 'en', 'Product File', 'Product File', '2020-11-09 08:07:08', '2020-11-09 08:07:08'),
(894, 'en', 'Choose file', 'Choose file', '2020-11-09 08:07:08', '2020-11-09 08:07:08'),
(895, 'en', 'Type to add a tag', 'Type to add a tag', '2020-11-09 08:07:08', '2020-11-09 08:07:08'),
(896, 'en', 'Images', 'Images', '2020-11-09 08:07:08', '2020-11-09 08:07:08'),
(897, 'en', 'Main Images', 'Main Images', '2020-11-09 08:07:08', '2020-11-09 08:07:08'),
(898, 'en', 'Meta Tags', 'Meta Tags', '2020-11-09 08:07:08', '2020-11-09 08:07:08'),
(899, 'en', 'Digital Product has been inserted successfully', 'Digital Product has been inserted successfully', '2020-11-09 08:14:25', '2020-11-09 08:14:25'),
(900, 'en', 'Edit Digital Product', 'Edit Digital Product', '2020-11-09 08:14:34', '2020-11-09 08:14:34'),
(901, 'en', 'Select an option', 'Select an option', '2020-11-09 08:14:34', '2020-11-09 08:14:34'),
(902, 'en', 'tax', 'tax', '2020-11-09 08:14:35', '2020-11-09 08:14:35'),
(903, 'en', 'Any question about this product?', 'Any question about this product?', '2020-11-09 08:15:11', '2020-11-09 08:15:11'),
(904, 'en', 'Sign in', 'Sign in', '2020-11-09 08:15:11', '2020-11-09 08:15:11'),
(905, 'en', 'Login with Google', 'Login with Google', '2020-11-09 08:15:11', '2020-11-09 08:15:11'),
(906, 'en', 'Login with Facebook', 'Login with Facebook', '2020-11-09 08:15:11', '2020-11-09 08:15:11'),
(907, 'en', 'Login with Twitter', 'Login with Twitter', '2020-11-09 08:15:11', '2020-11-09 08:15:11'),
(908, 'en', 'Click to show phone number', 'Click to show phone number', '2020-11-09 08:15:51', '2020-11-09 08:15:51'),
(909, 'en', 'Other Ads of', 'Other Ads of', '2020-11-09 08:15:52', '2020-11-09 08:15:52'),
(910, 'en', 'Store Home', 'Store Home', '2020-11-09 08:54:23', '2020-11-09 08:54:23'),
(911, 'en', 'Top Selling', 'Top Selling', '2020-11-09 08:54:23', '2020-11-09 08:54:23'),
(912, 'en', 'Shop Settings', 'Shop Settings', '2020-11-09 08:55:38', '2020-11-09 08:55:38'),
(913, 'en', 'Visit Shop', 'Visit Shop', '2020-11-09 08:55:38', '2020-11-09 08:55:38'),
(914, 'en', 'Pickup Points', 'Pickup Points', '2020-11-09 08:55:38', '2020-11-09 08:55:38'),
(915, 'en', 'Select Pickup Point', 'Select Pickup Point', '2020-11-09 08:55:38', '2020-11-09 08:55:38'),
(916, 'en', 'Slider Settings', 'Slider Settings', '2020-11-09 08:55:39', '2020-11-09 08:55:39'),
(917, 'en', 'Social Media Link', 'Social Media Link', '2020-11-09 08:55:39', '2020-11-09 08:55:39'),
(918, 'en', 'Facebook', 'Facebook', '2020-11-09 08:55:39', '2020-11-09 08:55:39'),
(919, 'en', 'Twitter', 'Twitter', '2020-11-09 08:55:39', '2020-11-09 08:55:39'),
(920, 'en', 'Google', 'Google', '2020-11-09 08:55:39', '2020-11-09 08:55:39'),
(921, 'en', 'New Arrival Products', 'New Arrival Products', '2020-11-09 08:56:26', '2020-11-09 08:56:26'),
(922, 'en', 'Check Your Order Status', 'Check Your Order Status', '2020-11-09 09:23:32', '2020-11-09 09:23:32'),
(923, 'en', 'Shipping method', 'Shipping method', '2020-11-09 09:27:40', '2020-11-09 09:27:40'),
(924, 'en', 'Shipped By', 'Shipped By', '2020-11-09 09:27:41', '2020-11-09 09:27:41'),
(925, 'en', 'Image', 'Image', '2020-11-09 09:29:37', '2020-11-09 09:29:37'),
(926, 'en', 'Sub Sub Category', 'Sub Sub Category', '2020-11-09 09:29:37', '2020-11-09 09:29:37'),
(927, 'en', 'Inhouse Products', 'Inhouse Products', '2020-11-09 10:22:32', '2020-11-09 10:22:32'),
(928, 'en', 'Forgot Password?', 'Forgot Password?', '2020-11-09 10:33:21', '2020-11-09 10:33:21'),
(929, 'en', 'Enter your email address to recover your password.', 'Enter your email address to recover your password.', '2020-11-09 10:33:21', '2020-11-09 10:33:21'),
(930, 'en', 'Email or Phone', 'Email or Phone', '2020-11-09 10:33:21', '2020-11-09 10:33:21'),
(931, 'en', 'Send Password Reset Link', 'Send Password Reset Link', '2020-11-09 10:33:21', '2020-11-09 10:33:21'),
(932, 'en', 'Back to Login', 'Back to Login', '2020-11-09 10:33:21', '2020-11-09 10:33:21'),
(933, 'en', 'index', 'index', '2020-11-09 10:35:29', '2020-11-09 10:35:29'),
(934, 'en', 'Download Your Product', 'Download Your Product', '2020-11-09 10:35:30', '2020-11-09 10:35:30'),
(935, 'en', 'Option', 'Option', '2020-11-09 10:35:30', '2020-11-09 10:35:30'),
(936, 'en', 'Applied Refund Request', 'Applied Refund Request', '2020-11-09 10:35:39', '2020-11-09 10:35:39'),
(937, 'en', 'Item has been renoved from wishlist', 'Item has been renoved from wishlist', '2020-11-09 10:36:04', '2020-11-09 10:36:04'),
(938, 'en', 'Bulk Products Upload', 'Bulk Products Upload', '2020-11-09 10:39:24', '2020-11-09 10:39:24'),
(939, 'en', 'Upload CSV', 'Upload CSV', '2020-11-09 10:39:25', '2020-11-09 10:39:25'),
(940, 'en', 'Create a Ticket', 'Create a Ticket', '2020-11-09 10:40:25', '2020-11-09 10:40:25'),
(941, 'en', 'Tickets', 'Tickets', '2020-11-09 10:40:25', '2020-11-09 10:40:25'),
(942, 'en', 'Ticket ID', 'Ticket ID', '2020-11-09 10:40:25', '2020-11-09 10:40:25'),
(943, 'en', 'Sending Date', 'Sending Date', '2020-11-09 10:40:25', '2020-11-09 10:40:25'),
(944, 'en', 'Subject', 'Subject', '2020-11-09 10:40:25', '2020-11-09 10:40:25'),
(945, 'en', 'View Details', 'View Details', '2020-11-09 10:40:25', '2020-11-09 10:40:25'),
(946, 'en', 'Provide a detailed description', 'Provide a detailed description', '2020-11-09 10:40:26', '2020-11-09 10:40:26'),
(947, 'en', 'Type your reply', 'Type your reply', '2020-11-09 10:40:26', '2020-11-09 10:40:26'),
(948, 'en', 'Send Ticket', 'Send Ticket', '2020-11-09 10:40:26', '2020-11-09 10:40:26'),
(949, 'en', 'Load More', 'Load More', '2020-11-09 10:40:57', '2020-11-09 10:40:57'),
(950, 'en', 'Jewelry & Watches', 'Jewelry & Watches', '2020-11-09 10:47:38', '2020-11-09 10:47:38'),
(951, 'en', 'Filters', 'Filters', '2020-11-09 10:53:54', '2020-11-09 10:53:54'),
(952, 'en', 'Contact address', 'Contact address', '2020-11-09 10:58:46', '2020-11-09 10:58:46'),
(953, 'en', 'Contact phone', 'Contact phone', '2020-11-09 10:58:47', '2020-11-09 10:58:47'),
(954, 'en', 'Contact email', 'Contact email', '2020-11-09 10:58:47', '2020-11-09 10:58:47'),
(955, 'en', 'Filter by', 'Filter by', '2020-11-09 11:00:03', '2020-11-09 11:00:03'),
(956, 'en', 'Condition', 'Condition', '2020-11-09 11:56:13', '2020-11-09 11:56:13'),
(957, 'en', 'All Type', 'All Type', '2020-11-09 11:56:13', '2020-11-09 11:56:13'),
(960, 'en', 'Pay with wallet', 'Pay with wallet', '2020-11-09 12:56:34', '2020-11-09 12:56:34'),
(961, 'en', 'Select variation', 'Select variation', '2020-11-10 07:54:29', '2020-11-10 07:54:29'),
(962, 'en', 'No Product Added', 'No Product Added', '2020-11-10 08:07:53', '2020-11-10 08:07:53'),
(963, 'en', 'Status has been updated successfully', 'Status has been updated successfully', '2020-11-10 08:41:23', '2020-11-10 08:41:23'),
(964, 'en', 'All Seller Packages', 'All Seller Packages', '2020-11-10 09:14:10', '2020-11-10 09:14:10'),
(965, 'en', 'Add New Package', 'Add New Package', '2020-11-10 09:14:10', '2020-11-10 09:14:10'),
(966, 'en', 'Package Logo', 'Package Logo', '2020-11-10 09:14:10', '2020-11-10 09:14:10'),
(967, 'en', 'days', 'days', '2020-11-10 09:14:10', '2020-11-10 09:14:10'),
(968, 'en', 'Create New Seller Package', 'Create New Seller Package', '2020-11-10 09:14:31', '2020-11-10 09:14:31'),
(969, 'en', 'Package Name', 'Package Name', '2020-11-10 09:14:31', '2020-11-10 09:14:31'),
(970, 'en', 'Duration', 'Duration', '2020-11-10 09:14:31', '2020-11-10 09:14:31'),
(971, 'en', 'Validity in number of days', 'Validity in number of days', '2020-11-10 09:14:31', '2020-11-10 09:14:31'),
(972, 'en', 'Update Package Information', 'Update Package Information', '2020-11-10 09:14:59', '2020-11-10 09:14:59'),
(973, 'en', 'Package has been inserted successfully', 'Package has been inserted successfully', '2020-11-10 09:15:14', '2020-11-10 09:15:14'),
(974, 'en', 'Refund Request', 'Refund Request', '2020-11-10 09:17:25', '2020-11-10 09:17:25'),
(975, 'en', 'Reason', 'Reason', '2020-11-10 09:17:25', '2020-11-10 09:17:25'),
(976, 'en', 'Label', 'Label', '2020-11-10 09:20:13', '2020-11-10 09:20:13'),
(977, 'en', 'Select Label', 'Select Label', '2020-11-10 09:20:13', '2020-11-10 09:20:13'),
(978, 'en', 'Multiple Select Label', 'Multiple Select Label', '2020-11-10 09:20:13', '2020-11-10 09:20:13'),
(979, 'en', 'Radio Label', 'Radio Label', '2020-11-10 09:20:13', '2020-11-10 09:20:13'),
(980, 'en', 'Pickup Point Orders', 'Pickup Point Orders', '2020-11-10 09:25:40', '2020-11-10 09:25:40'),
(981, 'en', 'View', 'View', '2020-11-10 09:25:40', '2020-11-10 09:25:40'),
(982, 'en', 'Order #', 'Order #', '2020-11-10 09:25:48', '2020-11-10 09:25:48'),
(983, 'en', 'Order Status', 'Order Status', '2020-11-10 09:25:48', '2020-11-10 09:25:48'),
(984, 'en', 'Total amount', 'Total amount', '2020-11-10 09:25:48', '2020-11-10 09:25:48'),
(986, 'en', 'TOTAL', 'TOTAL', '2020-11-10 09:25:49', '2020-11-10 09:25:49'),
(987, 'en', 'Delivery status has been updated', 'Delivery status has been updated', '2020-11-10 09:25:49', '2020-11-10 09:25:49'),
(988, 'en', 'Payment status has been updated', 'Payment status has been updated', '2020-11-10 09:25:49', '2020-11-10 09:25:49'),
(989, 'en', 'INVOICE', 'INVOICE', '2020-11-10 09:25:58', '2020-11-10 09:25:58'),
(990, 'en', 'Set Refund Time', 'Set Refund Time', '2020-11-10 09:34:04', '2020-11-10 09:34:04'),
(991, 'en', 'Set Time for sending Refund Request', 'Set Time for sending Refund Request', '2020-11-10 09:34:04', '2020-11-10 09:34:04'),
(992, 'en', 'Set Refund Sticker', 'Set Refund Sticker', '2020-11-10 09:34:05', '2020-11-10 09:34:05'),
(993, 'en', 'Sticker', 'Sticker', '2020-11-10 09:34:05', '2020-11-10 09:34:05'),
(994, 'en', 'Refund Request All', 'Refund Request All', '2020-11-10 09:34:12', '2020-11-10 09:34:12'),
(995, 'en', 'Order Id', 'Order Id', '2020-11-10 09:34:12', '2020-11-10 09:34:12'),
(996, 'en', 'Seller Approval', 'Seller Approval', '2020-11-10 09:34:12', '2020-11-10 09:34:12'),
(997, 'en', 'Admin Approval', 'Admin Approval', '2020-11-10 09:34:12', '2020-11-10 09:34:12'),
(998, 'en', 'Refund Status', 'Refund Status', '2020-11-10 09:34:12', '2020-11-10 09:34:12'),
(1000, 'en', 'No Refund', 'No Refund', '2020-11-10 09:35:27', '2020-11-10 09:35:27'),
(1001, 'en', 'Status updated successfully', 'Status updated successfully', '2020-11-10 09:54:20', '2020-11-10 09:54:20'),
(1002, 'en', 'User Search Report', 'User Search Report', '2020-11-11 06:43:24', '2020-11-11 06:43:24'),
(1003, 'en', 'Search By', 'Search By', '2020-11-11 06:43:24', '2020-11-11 06:43:24'),
(1004, 'en', 'Number searches', 'Number searches', '2020-11-11 06:43:24', '2020-11-11 06:43:24'),
(1005, 'en', 'Sender', 'Sender', '2020-11-11 06:51:49', '2020-11-11 06:51:49'),
(1006, 'en', 'Receiver', 'Receiver', '2020-11-11 06:51:49', '2020-11-11 06:51:49'),
(1007, 'en', 'Verification form updated successfully', 'Verification form updated successfully', '2020-11-11 06:53:29', '2020-11-11 06:53:29'),
(1008, 'en', 'Invalid email or password', 'Invalid email or password', '2020-11-11 07:07:49', '2020-11-11 07:07:49'),
(1009, 'en', 'All Coupons', 'All Coupons', '2020-11-11 07:14:04', '2020-11-11 07:14:04'),
(1010, 'en', 'Add New Coupon', 'Add New Coupon', '2020-11-11 07:14:04', '2020-11-11 07:14:04'),
(1011, 'en', 'Coupon Information', 'Coupon Information', '2020-11-11 07:14:04', '2020-11-11 07:14:04'),
(1012, 'en', 'Start Date', 'Start Date', '2020-11-11 07:14:04', '2020-11-11 07:14:04'),
(1013, 'en', 'End Date', 'End Date', '2020-11-11 07:14:05', '2020-11-11 07:14:05'),
(1014, 'en', 'Product Base', 'Product Base', '2020-11-11 07:14:05', '2020-11-11 07:14:05'),
(1015, 'en', 'Send Newsletter', 'Send Newsletter', '2020-11-11 07:14:10', '2020-11-11 07:14:10'),
(1016, 'en', 'Mobile Users', 'Mobile Users', '2020-11-11 07:14:10', '2020-11-11 07:14:10'),
(1017, 'en', 'SMS subject', 'SMS subject', '2020-11-11 07:14:10', '2020-11-11 07:14:10'),
(1018, 'en', 'SMS content', 'SMS content', '2020-11-11 07:14:10', '2020-11-11 07:14:10'),
(1019, 'en', 'All Flash Delas', 'All Flash Delas', '2020-11-11 07:16:06', '2020-11-11 07:16:06'),
(1020, 'en', 'Create New Flash Dela', 'Create New Flash Dela', '2020-11-11 07:16:06', '2020-11-11 07:16:06'),
(1022, 'en', 'Page Link', 'Page Link', '2020-11-11 07:16:06', '2020-11-11 07:16:06'),
(1023, 'en', 'Flash Deal Information', 'Flash Deal Information', '2020-11-11 07:16:14', '2020-11-11 07:16:14'),
(1024, 'en', 'Background Color', 'Background Color', '2020-11-11 07:16:14', '2020-11-11 07:16:14'),
(1025, 'en', '#0000ff', '#0000ff', '2020-11-11 07:16:14', '2020-11-11 07:16:14'),
(1026, 'en', 'Text Color', 'Text Color', '2020-11-11 07:16:14', '2020-11-11 07:16:14'),
(1027, 'en', 'White', 'White', '2020-11-11 07:16:14', '2020-11-11 07:16:14'),
(1028, 'en', 'Dark', 'Dark', '2020-11-11 07:16:15', '2020-11-11 07:16:15'),
(1029, 'en', 'Choose Products', 'Choose Products', '2020-11-11 07:16:15', '2020-11-11 07:16:15'),
(1030, 'en', 'Discounts', 'Discounts', '2020-11-11 07:16:20', '2020-11-11 07:16:20'),
(1031, 'en', 'Discount Type', 'Discount Type', '2020-11-11 07:16:20', '2020-11-11 07:16:20'),
(1032, 'en', 'Twillo Credential', 'Twillo Credential', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1033, 'en', 'TWILIO SID', 'TWILIO SID', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1034, 'en', 'TWILIO AUTH TOKEN', 'TWILIO AUTH TOKEN', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1035, 'en', 'TWILIO VERIFY SID', 'TWILIO VERIFY SID', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1036, 'en', 'VALID TWILLO NUMBER', 'VALID TWILLO NUMBER', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1037, 'en', 'Nexmo Credential', 'Nexmo Credential', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1038, 'en', 'NEXMO KEY', 'NEXMO KEY', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1039, 'en', 'NEXMO SECRET', 'NEXMO SECRET', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1040, 'en', 'SSL Wireless Credential', 'SSL Wireless Credential', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1041, 'en', 'SSL SMS API TOKEN', 'SSL SMS API TOKEN', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1042, 'en', 'SSL SMS SID', 'SSL SMS SID', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1043, 'en', 'SSL SMS URL', 'SSL SMS URL', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1044, 'en', 'Fast2SMS Credential', 'Fast2SMS Credential', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1045, 'en', 'AUTH KEY', 'AUTH KEY', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1046, 'en', 'ROUTE', 'ROUTE', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1047, 'en', 'Promotional Use', 'Promotional Use', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1048, 'en', 'Transactional Use', 'Transactional Use', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1050, 'en', 'SENDER ID', 'SENDER ID', '2020-11-11 07:17:35', '2020-11-11 07:17:35'),
(1051, 'en', 'Nexmo OTP', 'Nexmo OTP', '2020-11-11 07:17:42', '2020-11-11 07:17:42'),
(1052, 'en', 'Twillo OTP', 'Twillo OTP', '2020-11-11 07:17:43', '2020-11-11 07:17:43'),
(1053, 'en', 'SSL Wireless OTP', 'SSL Wireless OTP', '2020-11-11 07:17:43', '2020-11-11 07:17:43'),
(1054, 'en', 'Fast2SMS OTP', 'Fast2SMS OTP', '2020-11-11 07:17:43', '2020-11-11 07:17:43'),
(1055, 'en', 'Order Placement', 'Order Placement', '2020-11-11 07:17:43', '2020-11-11 07:17:43'),
(1056, 'en', 'Delivery Status Changing Time', 'Delivery Status Changing Time', '2020-11-11 07:17:43', '2020-11-11 07:17:43'),
(1057, 'en', 'Paid Status Changing Time', 'Paid Status Changing Time', '2020-11-11 07:17:43', '2020-11-11 07:17:43'),
(1058, 'en', 'Send Bulk SMS', 'Send Bulk SMS', '2020-11-11 07:19:14', '2020-11-11 07:19:14'),
(1059, 'en', 'All Subscribers', 'All Subscribers', '2020-11-11 07:21:51', '2020-11-11 07:21:51'),
(1060, 'en', 'Coupon Information Adding', 'Coupon Information Adding', '2020-11-11 07:22:25', '2020-11-11 07:22:25'),
(1061, 'en', 'Coupon Type', 'Coupon Type', '2020-11-11 07:22:25', '2020-11-11 07:22:25'),
(1062, 'en', 'For Products', 'For Products', '2020-11-11 07:22:25', '2020-11-11 07:22:25'),
(1063, 'en', 'For Total Orders', 'For Total Orders', '2020-11-11 07:22:25', '2020-11-11 07:22:25'),
(1064, 'en', 'Add Your Product Base Coupon', 'Add Your Product Base Coupon', '2020-11-11 07:22:42', '2020-11-11 07:22:42'),
(1065, 'en', 'Coupon code', 'Coupon code', '2020-11-11 07:22:42', '2020-11-11 07:22:42'),
(1066, 'en', 'Sub Category', 'Sub Category', '2020-11-11 07:22:42', '2020-11-11 07:22:42'),
(1067, 'en', 'Add More', 'Add More', '2020-11-11 07:22:43', '2020-11-11 07:22:43'),
(1068, 'en', 'Add Your Cart Base Coupon', 'Add Your Cart Base Coupon', '2020-11-11 07:29:40', '2020-11-11 07:29:40'),
(1069, 'en', 'Minimum Shopping', 'Minimum Shopping', '2020-11-11 07:29:40', '2020-11-11 07:29:40'),
(1070, 'en', 'Maximum Discount Amount', 'Maximum Discount Amount', '2020-11-11 07:29:41', '2020-11-11 07:29:41'),
(1071, 'en', 'Coupon Information Update', 'Coupon Information Update', '2020-11-11 08:18:34', '2020-11-11 08:18:34'),
(1073, 'en', 'Please Configure SMTP Setting to work all email sending funtionality', 'Please Configure SMTP Setting to work all email sending funtionality', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1074, 'en', 'Configure Now', 'Configure Now', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1076, 'en', 'Total published products', 'Total published products', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1077, 'en', 'Total sellers products', 'Total sellers products', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1078, 'en', 'Total admin products', 'Total admin products', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1079, 'en', 'Manage Products', 'Manage Products', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1080, 'en', 'Total product category', 'Total product category', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1081, 'en', 'Create Category', 'Create Category', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1082, 'en', 'Total product sub sub category', 'Total product sub sub category', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1083, 'en', 'Create Sub Sub Category', 'Create Sub Sub Category', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1084, 'en', 'Total product sub category', 'Total product sub category', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1085, 'en', 'Create Sub Category', 'Create Sub Category', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1086, 'en', 'Total product brand', 'Total product brand', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1087, 'en', 'Create Brand', 'Create Brand', '2020-11-11 13:10:18', '2020-11-11 13:10:18'),
(1089, 'en', 'Total sellers', 'Total sellers', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1091, 'en', 'Total approved sellers', 'Total approved sellers', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1093, 'en', 'Total pending sellers', 'Total pending sellers', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1094, 'en', 'Manage Sellers', 'Manage Sellers', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1095, 'en', 'Category wise product sale', 'Category wise product sale', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1097, 'en', 'Sale', 'Sale', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1098, 'en', 'Category wise product stock', 'Category wise product stock', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1099, 'en', 'Category Name', 'Category Name', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1100, 'en', 'Stock', 'Stock', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1101, 'en', 'Frontend', 'Frontend', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1103, 'en', 'Home page', 'Home page', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1104, 'en', 'setting', 'setting', '2020-11-11 13:10:19', '2020-11-11 13:10:19'),
(1106, 'en', 'Policy page', 'Policy page', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1107, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1109, 'en', 'General', 'General', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1110, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1111, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1112, 'en', 'Useful link', 'Useful link', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1113, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1114, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1115, 'en', 'Activation', 'Activation', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1116, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1117, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1118, 'en', 'SMTP', 'SMTP', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1119, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1120, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1121, 'en', 'Payment method', 'Payment method', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1122, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1123, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1124, 'en', 'Social media', 'Social media', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1125, 'en', 'setting', 'setting', '2020-11-11 13:10:20', '2020-11-11 13:10:20'),
(1126, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1127, 'en', 'Business', 'Business', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1128, 'en', 'setting', 'setting', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1130, 'en', 'setting', 'setting', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1131, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1132, 'en', 'Seller verification', 'Seller verification', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1133, 'en', 'form setting', 'form setting', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1134, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1135, 'en', 'Language', 'Language', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1136, 'en', 'setting', 'setting', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1137, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1139, 'en', 'setting', 'setting', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1140, 'en', 'Click Here', 'Click Here', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1141, 'en', 'Dashboard', 'Dashboard', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1142, 'en', 'POS System', 'POS System', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1143, 'en', 'POS Manager', 'POS Manager', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1144, 'en', 'POS Configuration', 'POS Configuration', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1145, 'en', 'Products', 'Products', '2020-11-11 13:10:21', '2020-11-11 13:10:21'),
(1146, 'en', 'Add New product', 'Add New product', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1147, 'en', 'All Products', 'All Products', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1148, 'en', 'In House Products', 'In House Products', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1149, 'en', 'Seller Products', 'Seller Products', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1150, 'en', 'Digital Products', 'Digital Products', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1151, 'en', 'Bulk Import', 'Bulk Import', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1152, 'en', 'Bulk Export', 'Bulk Export', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1153, 'en', 'Category', 'Category', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1154, 'en', 'Subcategory', 'Subcategory', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1155, 'en', 'Sub Subcategory', 'Sub Subcategory', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1156, 'en', 'Brand', 'Brand', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1157, 'en', 'Attribute', 'Attribute', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1158, 'en', 'Product Reviews', 'Product Reviews', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1159, 'en', 'Sales', 'Sales', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1160, 'en', 'All Orders', 'All Orders', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1161, 'en', 'Inhouse orders', 'Inhouse orders', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1162, 'en', 'Seller Orders', 'Seller Orders', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1163, 'en', 'Pick-up Point Order', 'Pick-up Point Order', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1164, 'en', 'Refunds', 'Refunds', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1165, 'en', 'Refund Requests', 'Refund Requests', '2020-11-11 13:10:22', '2020-11-11 13:10:22'),
(1166, 'en', 'Approved Refund', 'Approved Refund', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1167, 'en', 'Refund Configuration', 'Refund Configuration', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1168, 'en', 'Customers', 'Customers', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1169, 'en', 'Customer list', 'Customer list', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1170, 'en', 'Classified Products', 'Classified Products', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1171, 'en', 'Classified Packages', 'Classified Packages', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1172, 'en', 'Sellers', 'Sellers', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1173, 'en', 'All Seller', 'All Seller', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1174, 'en', 'Payouts', 'Payouts', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1175, 'en', 'Payout Requests', 'Payout Requests', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1176, 'en', 'Seller Commission', 'Seller Commission', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1177, 'en', 'Seller Packages', 'Seller Packages', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1178, 'en', 'Seller Verification Form', 'Seller Verification Form', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1179, 'en', 'Reports', 'Reports', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1180, 'en', 'In House Product Sale', 'In House Product Sale', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1181, 'en', 'Seller Products Sale', 'Seller Products Sale', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1182, 'en', 'Products Stock', 'Products Stock', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1183, 'en', 'Products wishlist', 'Products wishlist', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1184, 'en', 'User Searches', 'User Searches', '2020-11-11 13:10:23', '2020-11-11 13:10:23'),
(1185, 'en', 'Marketing', 'Marketing', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1186, 'en', 'Flash deals', 'Flash deals', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1187, 'en', 'Newsletters', 'Newsletters', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1188, 'en', 'Bulk SMS', 'Bulk SMS', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1189, 'en', 'Subscribers', 'Subscribers', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1190, 'en', 'Coupon', 'Coupon', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1191, 'en', 'Support', 'Support', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1192, 'en', 'Ticket', 'Ticket', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1193, 'en', 'Product Queries', 'Product Queries', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1194, 'en', 'Website Setup', 'Website Setup', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1195, 'en', 'Header', 'Header', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1196, 'en', 'Footer', 'Footer', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1197, 'en', 'Pages', 'Pages', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1198, 'en', 'Appearance', 'Appearance', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1199, 'en', 'Setup & Configurations', 'Setup & Configurations', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1200, 'en', 'General Settings', 'General Settings', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1201, 'en', 'Features activation', 'Features activation', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1202, 'en', 'Languages', 'Languages', '2020-11-11 13:10:24', '2020-11-11 13:10:24'),
(1203, 'en', 'Currency', 'Currency', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1204, 'en', 'Pickup point', 'Pickup point', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1205, 'en', 'SMTP Settings', 'SMTP Settings', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1206, 'en', 'Payment Methods', 'Payment Methods', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1207, 'en', 'File System Configuration', 'File System Configuration', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1208, 'en', 'Social media Logins', 'Social media Logins', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1209, 'en', 'Analytics Tools', 'Analytics Tools', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1210, 'en', 'Facebook Chat', 'Facebook Chat', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1211, 'en', 'Google reCAPTCHA', 'Google reCAPTCHA', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1212, 'en', 'Shipping Configuration', 'Shipping Configuration', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1213, 'en', 'Shipping Countries', 'Shipping Countries', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1214, 'en', 'Affiliate System', 'Affiliate System', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1215, 'en', 'Affiliate Registration Form', 'Affiliate Registration Form', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1216, 'en', 'Affiliate Configurations', 'Affiliate Configurations', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1217, 'en', 'Affiliate Users', 'Affiliate Users', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1218, 'en', 'Referral Users', 'Referral Users', '2020-11-11 13:10:25', '2020-11-11 13:10:25'),
(1219, 'en', 'Affiliate Withdraw Requests', 'Affiliate Withdraw Requests', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1220, 'en', 'Offline Payment System', 'Offline Payment System', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1221, 'en', 'Manual Payment Methods', 'Manual Payment Methods', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1222, 'en', 'Offline Wallet Recharge', 'Offline Wallet Recharge', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1223, 'en', 'Offline Customer Package Payments', 'Offline Customer Package Payments', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1224, 'en', 'Offline Seller Package Payments', 'Offline Seller Package Payments', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1225, 'en', 'Paytm Payment Gateway', 'Paytm Payment Gateway', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1226, 'en', 'Set Paytm Credentials', 'Set Paytm Credentials', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1227, 'en', 'Club Point System', 'Club Point System', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1228, 'en', 'Club Point Configurations', 'Club Point Configurations', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1229, 'en', 'Set Product Point', 'Set Product Point', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1230, 'en', 'User Points', 'User Points', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1231, 'en', 'OTP System', 'OTP System', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1232, 'en', 'OTP Configurations', 'OTP Configurations', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1233, 'en', 'Set OTP Credentials', 'Set OTP Credentials', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1234, 'en', 'Staffs', 'Staffs', '2020-11-11 13:10:26', '2020-11-11 13:10:26'),
(1235, 'en', 'All staffs', 'All staffs', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1236, 'en', 'Staff permissions', 'Staff permissions', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1237, 'en', 'Addon Manager', 'Addon Manager', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1238, 'en', 'Browse Website', 'Browse Website', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1239, 'en', 'POS', 'POS', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1240, 'en', 'Notifications', 'Notifications', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1241, 'en', 'new orders', 'new orders', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1242, 'en', 'user-image', 'user-image', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1243, 'en', 'Profile', 'Profile', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1244, 'en', 'Logout', 'Logout', '2020-11-11 13:10:27', '2020-11-11 13:10:27'),
(1247, 'en', 'Page Not Found!', 'Page Not Found!', '2020-11-11 13:10:28', '2020-11-11 13:10:28'),
(1249, 'en', 'The page you are looking for has not been found on our server.', 'The page you are looking for has not been found on our server.', '2020-11-11 13:10:28', '2020-11-11 13:10:28'),
(1253, 'en', 'Registration', 'Registration', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1255, 'en', 'I am shopping for...', 'I am shopping for...', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1257, 'en', 'Compare', 'Compare', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1259, 'en', 'Wishlist', 'Wishlist', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1261, 'en', 'Cart', 'Cart', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1263, 'en', 'Your Cart is empty', 'Your Cart is empty', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1265, 'en', 'Categories', 'Categories', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1267, 'en', 'See All', 'See All', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1269, 'en', 'Seller Policy', 'Seller Policy', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1271, 'en', 'Return Policy', 'Return Policy', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1273, 'en', 'Support Policy', 'Support Policy', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1275, 'en', 'Privacy Policy', 'Privacy Policy', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1277, 'en', 'Your Email Address', 'Your Email Address', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1279, 'en', 'Subscribe', 'Subscribe', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1281, 'en', 'Contact Info', 'Contact Info', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1283, 'en', 'Address', 'Address', '2020-11-11 13:10:29', '2020-11-11 13:10:29'),
(1285, 'en', 'Phone', 'Phone', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1287, 'en', 'Email', 'Email', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1288, 'en', 'Login', 'Login', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1289, 'en', 'My Account', 'My Account', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1291, 'en', 'Login', 'Login', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1293, 'en', 'Order History', 'Order History', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1295, 'en', 'My Wishlist', 'My Wishlist', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1297, 'en', 'Track Order', 'Track Order', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1299, 'en', 'Be an affiliate partner', 'Be an affiliate partner', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1301, 'en', 'Be a Seller', 'Be a Seller', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1303, 'en', 'Apply Now', 'Apply Now', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1305, 'en', 'Confirmation', 'Confirmation', '2020-11-11 13:10:30', '2020-11-11 13:10:30');
INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(1307, 'en', 'Delete confirmation message', 'Delete confirmation message', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1309, 'en', 'Cancel', 'Cancel', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1312, 'en', 'Delete', 'Delete', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1313, 'en', 'Item has been added to compare list', 'Item has been added to compare list', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1314, 'en', 'Please login first', 'Please login first', '2020-11-11 13:10:30', '2020-11-11 13:10:30'),
(1315, 'en', 'Total Earnings From', 'Total Earnings From', '2020-11-12 08:01:11', '2020-11-12 08:01:11'),
(1316, 'en', 'Client Subscription', 'Client Subscription', '2020-11-12 08:01:12', '2020-11-12 08:01:12'),
(1317, 'en', 'Product category', 'Product category', '2020-11-12 08:03:46', '2020-11-12 08:03:46'),
(1318, 'en', 'Product sub sub category', 'Product sub sub category', '2020-11-12 08:03:46', '2020-11-12 08:03:46'),
(1319, 'en', 'Product sub category', 'Product sub category', '2020-11-12 08:03:46', '2020-11-12 08:03:46'),
(1320, 'en', 'Product brand', 'Product brand', '2020-11-12 08:03:46', '2020-11-12 08:03:46'),
(1321, 'en', 'Top Client Packages', 'Top Client Packages', '2020-11-12 08:05:21', '2020-11-12 08:05:21'),
(1322, 'en', 'Top Freelancer Packages', 'Top Freelancer Packages', '2020-11-12 08:05:21', '2020-11-12 08:05:21'),
(1323, 'en', 'Number of sale', 'Number of sale', '2020-11-12 09:13:09', '2020-11-12 09:13:09'),
(1324, 'en', 'Number of Stock', 'Number of Stock', '2020-11-12 09:16:02', '2020-11-12 09:16:02'),
(1325, 'en', 'Top 10 Products', 'Top 10 Products', '2020-11-12 10:02:29', '2020-11-12 10:02:29'),
(1326, 'en', 'Top 12 Products', 'Top 12 Products', '2020-11-12 10:02:39', '2020-11-12 10:02:39'),
(1327, 'en', 'Admin can not be a seller', 'Admin can not be a seller', '2020-11-12 11:30:19', '2020-11-12 11:30:19'),
(1328, 'en', 'Filter by Rating', 'Filter by Rating', '2020-11-15 08:01:15', '2020-11-15 08:01:15'),
(1329, 'en', 'Published reviews updated successfully', 'Published reviews updated successfully', '2020-11-15 08:01:15', '2020-11-15 08:01:15'),
(1330, 'en', 'Refund Sticker has been updated successfully', 'Refund Sticker has been updated successfully', '2020-11-15 08:17:12', '2020-11-15 08:17:12'),
(1331, 'en', 'Edit Product', 'Edit Product', '2020-11-15 10:31:54', '2020-11-15 10:31:54'),
(1332, 'en', 'Meta Images', 'Meta Images', '2020-11-15 10:32:12', '2020-11-15 10:32:12'),
(1333, 'en', 'Update Product', 'Update Product', '2020-11-15 10:32:12', '2020-11-15 10:32:12'),
(1334, 'en', 'Product has been deleted successfully', 'Product has been deleted successfully', '2020-11-15 10:32:57', '2020-11-15 10:32:57'),
(1335, 'en', 'Your Profile has been updated successfully!', 'Your Profile has been updated successfully!', '2020-11-15 11:10:42', '2020-11-15 11:10:42'),
(1336, 'en', 'Upload limit has been reached. Please upgrade your package.', 'Upload limit has been reached. Please upgrade your package.', '2020-11-15 11:13:45', '2020-11-15 11:13:45'),
(1337, 'en', 'Add Your Product', 'Add Your Product', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1338, 'en', 'Select a category', 'Select a category', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1339, 'en', 'Select a brand', 'Select a brand', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1340, 'en', 'Product Unit', 'Product Unit', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1341, 'en', 'Minimum Qty.', 'Minimum Qty.', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1342, 'en', 'Product Tag', 'Product Tag', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1343, 'en', 'Type & hit enter', 'Type & hit enter', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1344, 'en', 'Videos', 'Videos', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1345, 'en', 'Video From', 'Video From', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1346, 'en', 'Video URL', 'Video URL', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1347, 'en', 'Customer Choice', 'Customer Choice', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1348, 'en', 'PDF', 'PDF', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1349, 'en', 'Choose PDF', 'Choose PDF', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1350, 'en', 'Select Category', 'Select Category', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1351, 'en', 'Target Category', 'Target Category', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1352, 'en', 'subsubcategory', 'subsubcategory', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1353, 'en', 'Search Category', 'Search Category', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1354, 'en', 'Search SubCategory', 'Search SubCategory', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1355, 'en', 'Search SubSubCategory', 'Search SubSubCategory', '2020-11-15 11:17:56', '2020-11-15 11:17:56'),
(1356, 'en', 'Update your product', 'Update your product', '2020-11-15 11:39:14', '2020-11-15 11:39:14'),
(1357, 'en', 'Product has been updated successfully', 'Product has been updated successfully', '2020-11-15 11:51:36', '2020-11-15 11:51:36'),
(1358, 'en', 'Add Your Digital Product', 'Add Your Digital Product', '2020-11-15 12:24:21', '2020-11-15 12:24:21'),
(1359, 'en', 'Active eCommerce CMS Update Process', 'Active eCommerce CMS Update Process', '2020-11-16 07:53:31', '2020-11-16 07:53:31'),
(1361, 'en', 'Codecanyon purchase code', 'Codecanyon purchase code', '2020-11-16 07:53:31', '2020-11-16 07:53:31'),
(1362, 'en', 'Database Name', 'Database Name', '2020-11-16 07:53:31', '2020-11-16 07:53:31'),
(1363, 'en', 'Database Username', 'Database Username', '2020-11-16 07:53:31', '2020-11-16 07:53:31'),
(1364, 'en', 'Database Password', 'Database Password', '2020-11-16 07:53:31', '2020-11-16 07:53:31'),
(1365, 'en', 'Database Hostname', 'Database Hostname', '2020-11-16 07:53:31', '2020-11-16 07:53:31'),
(1366, 'en', 'Update Now', 'Update Now', '2020-11-16 07:53:31', '2020-11-16 07:53:31'),
(1368, 'en', 'Congratulations', 'Congratulations', '2020-11-16 07:55:14', '2020-11-16 07:55:14'),
(1369, 'en', 'You have successfully completed the updating process. Please Login to continue', 'You have successfully completed the updating process. Please Login to continue', '2020-11-16 07:55:14', '2020-11-16 07:55:14'),
(1370, 'en', 'Go to Home', 'Go to Home', '2020-11-16 07:55:14', '2020-11-16 07:55:14'),
(1371, 'en', 'Login to Admin panel', 'Login to Admin panel', '2020-11-16 07:55:14', '2020-11-16 07:55:14'),
(1372, 'en', 'S3 File System Credentials', 'S3 File System Credentials', '2020-11-16 12:59:57', '2020-11-16 12:59:57'),
(1373, 'en', 'AWS_ACCESS_KEY_ID', 'AWS_ACCESS_KEY_ID', '2020-11-16 12:59:57', '2020-11-16 12:59:57'),
(1374, 'en', 'AWS_SECRET_ACCESS_KEY', 'AWS_SECRET_ACCESS_KEY', '2020-11-16 12:59:57', '2020-11-16 12:59:57'),
(1375, 'en', 'AWS_DEFAULT_REGION', 'AWS_DEFAULT_REGION', '2020-11-16 12:59:57', '2020-11-16 12:59:57'),
(1376, 'en', 'AWS_BUCKET', 'AWS_BUCKET', '2020-11-16 12:59:57', '2020-11-16 12:59:57'),
(1377, 'en', 'AWS_URL', 'AWS_URL', '2020-11-16 12:59:57', '2020-11-16 12:59:57'),
(1378, 'en', 'S3 File System Activation', 'S3 File System Activation', '2020-11-16 12:59:57', '2020-11-16 12:59:57'),
(1379, 'en', 'Your phone number', 'Your phone number', '2020-11-17 05:50:10', '2020-11-17 05:50:10'),
(1380, 'en', 'Zip File', 'Zip File', '2020-11-17 06:58:45', '2020-11-17 06:58:45'),
(1381, 'en', 'Install', 'Install', '2020-11-17 06:58:45', '2020-11-17 06:58:45'),
(1382, 'en', 'This version is not capable of installing Addons, Please update.', 'This version is not capable of installing Addons, Please update.', '2020-11-17 06:59:11', '2020-11-17 06:59:11'),
(1383, 'bd', 'Something went wrong!', 'Something went wrong!', '2021-01-23 08:14:31', '2021-01-23 08:14:31'),
(1384, 'bd', 'Sorry for the inconvenience, but we\'re working on it.', 'Sorry for the inconvenience, but we\'re working on it.', '2021-01-23 08:14:31', '2021-01-23 08:14:31'),
(1385, 'bd', 'Error code', 'Error code', '2021-01-23 08:14:31', '2021-01-23 08:14:31'),
(1386, 'bd', 'Categories', 'Categories', '2021-01-23 02:16:24', '2021-01-23 02:16:24'),
(1387, 'bd', 'See All', 'See All', '2021-01-23 02:16:24', '2021-01-23 02:16:24'),
(1388, 'bd', 'Top 10 Categories', 'Top 10 Categories', '2021-01-23 02:16:24', '2021-01-23 02:16:24'),
(1389, 'bd', 'View All Categories', 'View All Categories', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1390, 'bd', 'Top 10 Brands', 'Top 10 Brands', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1391, 'bd', 'View All Brands', 'View All Brands', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1392, 'bd', 'Login', 'Login', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1393, 'bd', 'Registration', 'Registration', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1394, 'bd', 'I am shopping for...', 'I am shopping for...', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1395, 'bd', 'Compare', 'Compare', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1396, 'bd', 'Welcome to', 'Welcome to', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1397, 'bd', 'Login to your account.', 'Login to your account.', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1398, 'bd', 'Wishlist', 'Wishlist', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1399, 'bd', 'Email', 'Email', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1400, 'bd', 'Cart', 'Cart', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1401, 'bd', 'Password', 'Password', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1402, 'bd', 'Your Cart is empty', 'Your Cart is empty', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1403, 'bd', 'Remember Me', 'Remember Me', '2021-01-23 02:16:25', '2021-01-23 02:16:25'),
(1404, 'bd', 'Terms & conditions', 'Terms & conditions', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1405, 'bd', 'Return Policy', 'Return Policy', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1406, 'bd', 'Support Policy', 'Support Policy', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1407, 'bd', 'Privacy Policy', 'Privacy Policy', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1408, 'bd', 'Your Email Address', 'Your Email Address', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1409, 'bd', 'Subscribe', 'Subscribe', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1410, 'bd', 'Contact Info', 'Contact Info', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1411, 'bd', 'Address', 'Address', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1412, 'bd', 'Phone', 'Phone', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1413, 'bd', 'My Account', 'My Account', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1414, 'bd', 'Order History', 'Order History', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1415, 'bd', 'My Wishlist', 'My Wishlist', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1416, 'bd', 'Track Order', 'Track Order', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1417, 'bd', 'Be a Seller', 'Be a Seller', '2021-01-23 02:16:26', '2021-01-23 02:16:26'),
(1418, 'bd', 'Apply Now', 'Apply Now', '2021-01-23 02:16:27', '2021-01-23 02:16:27'),
(1419, 'bd', 'Confirmation', 'Confirmation', '2021-01-23 02:16:27', '2021-01-23 02:16:27'),
(1420, 'bd', 'Delete confirmation message', 'Delete confirmation message', '2021-01-23 02:16:27', '2021-01-23 02:16:27'),
(1421, 'bd', 'Cancel', 'Cancel', '2021-01-23 02:16:27', '2021-01-23 02:16:27'),
(1422, 'bd', 'Delete', 'Delete', '2021-01-23 02:16:27', '2021-01-23 02:16:27'),
(1423, 'bd', 'Item has been added to compare list', 'Item has been added to compare list', '2021-01-23 02:16:27', '2021-01-23 02:16:27'),
(1424, 'bd', 'Please login first', 'Please login first', '2021-01-23 02:16:27', '2021-01-23 02:16:27'),
(1425, 'bd', 'Best Selling', 'Best Selling', '2021-01-23 02:16:29', '2021-01-23 02:16:29'),
(1426, 'bd', 'Top 20', 'Top 20', '2021-01-23 02:16:29', '2021-01-23 02:16:29'),
(1427, 'en', 'Featured Products', 'Featured Products', '2021-01-23 02:16:29', '2021-01-23 02:16:29'),
(1428, 'bd', 'Best Sellers', 'Best Sellers', '2021-01-23 02:16:47', '2021-01-23 02:16:47'),
(1429, 'bd', 'Visit Store', 'Visit Store', '2021-01-23 02:16:47', '2021-01-23 02:16:47'),
(1430, 'bd', 'Please Configure SMTP Setting to work all email sending functionality', 'Please Configure SMTP Setting to work all email sending functionality', '2021-01-23 02:17:36', '2021-01-23 02:17:36'),
(1431, 'bd', 'Configure Now', 'Configure Now', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1432, 'bd', 'Total', 'Total', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1433, 'bd', 'Customer', 'Customer', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1434, 'bd', 'Order', 'Order', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1435, 'bd', 'Product category', 'Product category', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1436, 'bd', 'Product brand', 'Product brand', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1437, 'bd', 'Products', 'Products', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1438, 'bd', 'Sellers', 'Sellers', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1439, 'bd', 'Category wise product sale', 'Category wise product sale', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1440, 'bd', 'Category wise product stock', 'Category wise product stock', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1441, 'bd', 'Top 12 Products', 'Top 12 Products', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1442, 'bd', 'Total published products', 'Total published products', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1443, 'bd', 'Total sellers products', 'Total sellers products', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1444, 'bd', 'Total admin products', 'Total admin products', '2021-01-23 02:17:37', '2021-01-23 02:17:37'),
(1445, 'bd', 'Total sellers', 'Total sellers', '2021-01-23 02:17:38', '2021-01-23 02:17:38'),
(1446, 'bd', 'Total approved sellers', 'Total approved sellers', '2021-01-23 02:17:38', '2021-01-23 02:17:38'),
(1447, 'bd', 'Total pending sellers', 'Total pending sellers', '2021-01-23 02:17:38', '2021-01-23 02:17:38'),
(1448, 'bd', 'Number of sale', 'Number of sale', '2021-01-23 02:17:38', '2021-01-23 02:17:38'),
(1449, 'bd', 'Number of Stock', 'Number of Stock', '2021-01-23 02:17:38', '2021-01-23 02:17:38'),
(1450, 'bd', 'Search in menu', 'Search in menu', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1451, 'bd', 'Dashboard', 'Dashboard', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1452, 'bd', 'Add New product', 'Add New product', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1453, 'bd', 'All Products', 'All Products', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1454, 'bd', 'In House Products', 'In House Products', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1455, 'bd', 'Seller Products', 'Seller Products', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1456, 'bd', 'Digital Products', 'Digital Products', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1457, 'bd', 'Bulk Import', 'Bulk Import', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1458, 'bd', 'Bulk Export', 'Bulk Export', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1459, 'bd', 'Category', 'Category', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1460, 'bd', 'Brand', 'Brand', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1461, 'bd', 'Attribute', 'Attribute', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1462, 'bd', 'Product Reviews', 'Product Reviews', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1463, 'bd', 'Sales', 'Sales', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1464, 'bd', 'All Orders', 'All Orders', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1465, 'bd', 'Inhouse orders', 'Inhouse orders', '2021-01-23 02:17:39', '2021-01-23 02:17:39'),
(1466, 'bd', 'Seller Orders', 'Seller Orders', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1467, 'bd', 'Pick-up Point Order', 'Pick-up Point Order', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1468, 'bd', 'Customers', 'Customers', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1469, 'bd', 'Customer list', 'Customer list', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1470, 'bd', 'All Seller', 'All Seller', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1471, 'bd', 'Payouts', 'Payouts', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1472, 'bd', 'Payout Requests', 'Payout Requests', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1473, 'bd', 'Seller Commission', 'Seller Commission', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1474, 'bd', 'Seller Verification Form', 'Seller Verification Form', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1475, 'bd', 'Uploaded Files', 'Uploaded Files', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1476, 'bd', 'Reports', 'Reports', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1477, 'bd', 'In House Product Sale', 'In House Product Sale', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1478, 'bd', 'Seller Products Sale', 'Seller Products Sale', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1479, 'bd', 'Products Stock', 'Products Stock', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1480, 'bd', 'Products wishlist', 'Products wishlist', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1481, 'bd', 'User Searches', 'User Searches', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1482, 'bd', 'Marketing', 'Marketing', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1483, 'bd', 'Flash deals', 'Flash deals', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1484, 'bd', 'Newsletters', 'Newsletters', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1485, 'bd', 'Subscribers', 'Subscribers', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1486, 'bd', 'Coupon', 'Coupon', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1487, 'bd', 'Support', 'Support', '2021-01-23 02:17:40', '2021-01-23 02:17:40'),
(1488, 'bd', 'Ticket', 'Ticket', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1489, 'bd', 'Product Queries', 'Product Queries', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1490, 'bd', 'Website Setup', 'Website Setup', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1491, 'bd', 'Header', 'Header', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1492, 'bd', 'Footer', 'Footer', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1493, 'bd', 'Pages', 'Pages', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1494, 'bd', 'Appearance', 'Appearance', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1495, 'bd', 'Setup & Configurations', 'Setup & Configurations', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1496, 'bd', 'General Settings', 'General Settings', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1497, 'bd', 'Features activation', 'Features activation', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1498, 'bd', 'Languages', 'Languages', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1499, 'bd', 'Currency', 'Currency', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1500, 'bd', 'Pickup point', 'Pickup point', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1501, 'bd', 'SMTP Settings', 'SMTP Settings', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1502, 'bd', 'Payment Methods', 'Payment Methods', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1503, 'bd', 'File System Configuration', 'File System Configuration', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1504, 'bd', 'Social media Logins', 'Social media Logins', '2021-01-23 02:17:41', '2021-01-23 02:17:41'),
(1505, 'bd', 'Analytics Tools', 'Analytics Tools', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1506, 'bd', 'Facebook Chat', 'Facebook Chat', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1507, 'bd', 'Google reCAPTCHA', 'Google reCAPTCHA', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1508, 'bd', 'Shipping Configuration', 'Shipping Configuration', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1509, 'bd', 'Shipping Countries', 'Shipping Countries', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1510, 'bd', 'Shipping Cities', 'Shipping Cities', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1511, 'bd', 'Staffs', 'Staffs', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1512, 'bd', 'All staffs', 'All staffs', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1513, 'bd', 'Staff permissions', 'Staff permissions', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1514, 'bd', 'System', 'System', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1515, 'bd', 'Update', 'Update', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1516, 'bd', 'Server status', 'Server status', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1517, 'bd', 'Addon Manager', 'Addon Manager', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1518, 'bd', 'Browse Website', 'Browse Website', '2021-01-23 02:17:42', '2021-01-23 02:17:42'),
(1519, 'bd', 'Notifications', 'Notifications', '2021-01-23 02:17:43', '2021-01-23 02:17:43'),
(1520, 'bd', 'Profile', 'Profile', '2021-01-23 02:17:43', '2021-01-23 02:17:43'),
(1521, 'bd', 'Logout', 'Logout', '2021-01-23 02:17:43', '2021-01-23 02:17:43'),
(1522, 'bd', 'Nothing Found', 'Nothing Found', '2021-01-23 02:17:43', '2021-01-23 02:17:43'),
(1523, 'bd', 'Update your system', 'Update your system', '2021-01-23 02:18:00', '2021-01-23 02:18:00'),
(1524, 'bd', 'Current verion', 'Current verion', '2021-01-23 02:18:00', '2021-01-23 02:18:00'),
(1525, 'bd', 'Make sure your server has matched with all requirements.', 'Make sure your server has matched with all requirements.', '2021-01-23 02:18:00', '2021-01-23 02:18:00'),
(1526, 'bd', 'Check Here', 'Check Here', '2021-01-23 02:18:00', '2021-01-23 02:18:00'),
(1527, 'bd', 'Download latest version from codecanyon.', 'Download latest version from codecanyon.', '2021-01-23 02:18:00', '2021-01-23 02:18:00'),
(1528, 'bd', 'Extract downloaded zip. You will find updates.zip file in those extraced files.', 'Extract downloaded zip. You will find updates.zip file in those extraced files.', '2021-01-23 02:18:00', '2021-01-23 02:18:00'),
(1529, 'bd', 'Upload that zip file here and click update now.', 'Upload that zip file here and click update now.', '2021-01-23 02:18:00', '2021-01-23 02:18:00'),
(1530, 'bd', 'If you are using any addon make sure to update those addons after updating.', 'If you are using any addon make sure to update those addons after updating.', '2021-01-23 02:18:00', '2021-01-23 02:18:00'),
(1531, 'bd', 'Choose file', 'Choose file', '2021-01-23 02:18:01', '2021-01-23 02:18:01'),
(1532, 'bd', 'Update Now', 'Update Now', '2021-01-23 02:18:01', '2021-01-23 02:18:01'),
(1533, 'bd', 'Website Header', 'Website Header', '2021-01-23 02:18:18', '2021-01-23 02:18:18'),
(1534, 'bd', 'Header Setting', 'Header Setting', '2021-01-23 02:18:18', '2021-01-23 02:18:18'),
(1535, 'bd', 'Header Logo', 'Header Logo', '2021-01-23 02:18:18', '2021-01-23 02:18:18'),
(1536, 'bd', 'Browse', 'Browse', '2021-01-23 02:18:18', '2021-01-23 02:18:18'),
(1537, 'bd', 'Show Language Switcher?', 'Show Language Switcher?', '2021-01-23 02:18:18', '2021-01-23 02:18:18'),
(1538, 'bd', 'Show Currency Switcher?', 'Show Currency Switcher?', '2021-01-23 02:18:18', '2021-01-23 02:18:18'),
(1539, 'bd', 'Enable stikcy header?', 'Enable stikcy header?', '2021-01-23 02:18:18', '2021-01-23 02:18:18'),
(1540, 'bd', 'My Panel', 'My Panel', '2021-01-23 02:18:28', '2021-01-23 02:18:28'),
(1541, 'bd', 'Featured Products', 'Featured Products', '2021-01-23 02:18:29', '2021-01-23 02:18:29'),
(1542, 'bd', 'Filters', 'Filters', '2021-01-23 02:18:33', '2021-01-23 02:18:33'),
(1543, 'bd', 'All Categories', 'All Categories', '2021-01-23 02:18:33', '2021-01-23 02:18:33'),
(1544, 'bd', 'Price range', 'Price range', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1545, 'bd', 'Filter by color', 'Filter by color', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1546, 'bd', 'Home', 'Home', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1547, 'bd', 'Brands', 'Brands', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1548, 'bd', 'All Brands', 'All Brands', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1549, 'bd', 'Sort by', 'Sort by', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1550, 'bd', 'Newest', 'Newest', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1551, 'bd', 'Oldest', 'Oldest', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1552, 'bd', 'Price low to high', 'Price low to high', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1553, 'bd', 'Price high to low', 'Price high to low', '2021-01-23 02:18:34', '2021-01-23 02:18:34'),
(1554, 'bd', 'Website Footer', 'Website Footer', '2021-01-23 02:19:54', '2021-01-23 02:19:54'),
(1555, 'bd', 'Footer Widget', 'Footer Widget', '2021-01-23 02:19:54', '2021-01-23 02:19:54'),
(1556, 'bd', 'About Widget', 'About Widget', '2021-01-23 02:19:54', '2021-01-23 02:19:54'),
(1557, 'bd', 'Footer Logo', 'Footer Logo', '2021-01-23 02:19:54', '2021-01-23 02:19:54'),
(1558, 'bd', 'About description', 'About description', '2021-01-23 02:19:54', '2021-01-23 02:19:54'),
(1559, 'bd', 'Contact Info Widget', 'Contact Info Widget', '2021-01-23 02:19:54', '2021-01-23 02:19:54'),
(1560, 'bd', 'Contact address', 'Contact address', '2021-01-23 02:19:54', '2021-01-23 02:19:54'),
(1561, 'bd', 'Contact phone', 'Contact phone', '2021-01-23 02:19:54', '2021-01-23 02:19:54'),
(1562, 'bd', 'Contact email', 'Contact email', '2021-01-23 02:19:54', '2021-01-23 02:19:54'),
(1563, 'bd', 'Link Widget One', 'Link Widget One', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1564, 'bd', 'Title', 'Title', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1565, 'bd', 'Links', 'Links', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1566, 'bd', 'Add New', 'Add New', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1567, 'bd', 'Footer Bottom', 'Footer Bottom', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1568, 'bd', 'Copyright Widget ', 'Copyright Widget ', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1569, 'bd', 'Copyright Text', 'Copyright Text', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1570, 'bd', 'Social Link Widget ', 'Social Link Widget ', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1571, 'bd', 'Show Social Links?', 'Show Social Links?', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1572, 'bd', 'Social Links', 'Social Links', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1573, 'bd', 'Payment Methods Widget ', 'Payment Methods Widget ', '2021-01-23 02:19:55', '2021-01-23 02:19:55'),
(1574, 'bd', 'Website Pages', 'Website Pages', '2021-01-23 02:20:02', '2021-01-23 02:20:02'),
(1575, 'bd', 'All Pages', 'All Pages', '2021-01-23 02:20:02', '2021-01-23 02:20:02'),
(1576, 'bd', 'Add New Page', 'Add New Page', '2021-01-23 02:20:02', '2021-01-23 02:20:02'),
(1577, 'bd', 'Name', 'Name', '2021-01-23 02:20:03', '2021-01-23 02:20:03'),
(1578, 'bd', 'URL', 'URL', '2021-01-23 02:20:03', '2021-01-23 02:20:03'),
(1579, 'bd', 'Actions', 'Actions', '2021-01-23 02:20:03', '2021-01-23 02:20:03'),
(1580, 'bd', 'Delete Confirmation', 'Delete Confirmation', '2021-01-23 02:20:03', '2021-01-23 02:20:03'),
(1581, 'bd', 'Are you sure to delete this?', 'Are you sure to delete this?', '2021-01-23 02:20:03', '2021-01-23 02:20:03'),
(1582, 'bd', 'General', 'General', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1583, 'bd', 'Frontend Website Name', 'Frontend Website Name', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1584, 'bd', 'Website Name', 'Website Name', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1585, 'bd', 'Site Motto', 'Site Motto', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1586, 'bd', 'Best eCommerce Website', 'Best eCommerce Website', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1587, 'bd', 'Site Icon', 'Site Icon', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1588, 'bd', 'Website favicon. 32x32 .png', 'Website favicon. 32x32 .png', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1589, 'bd', 'Website Base Color', 'Website Base Color', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1590, 'bd', 'Hex Color Code', 'Hex Color Code', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1591, 'bd', 'Website Base Hover Color', 'Website Base Hover Color', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1592, 'bd', 'Global SEO', 'Global SEO', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1593, 'bd', 'Meta Title', 'Meta Title', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1594, 'bd', 'Meta description', 'Meta description', '2021-01-23 02:20:13', '2021-01-23 02:20:13'),
(1595, 'bd', 'Keywords', 'Keywords', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1596, 'bd', 'Separate with coma', 'Separate with coma', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1597, 'bd', 'Meta Image', 'Meta Image', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1598, 'bd', 'Cookies Agreement', 'Cookies Agreement', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1599, 'bd', 'Cookies Agreement Text', 'Cookies Agreement Text', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1600, 'bd', 'Show Cookies Agreement?', 'Show Cookies Agreement?', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1601, 'bd', 'Custom Script', 'Custom Script', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1602, 'bd', 'Header custom script - before </head>', 'Header custom script - before </head>', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1603, 'bd', 'Write script with <script> tag', 'Write script with <script> tag', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1604, 'bd', 'Footer custom script - before </body>', 'Footer custom script - before </body>', '2021-01-23 02:20:14', '2021-01-23 02:20:14'),
(1605, 'bd', 'Installed Addon', 'Installed Addon', '2021-01-23 02:23:53', '2021-01-23 02:23:53'),
(1606, 'bd', 'Available Addon', 'Available Addon', '2021-01-23 02:23:53', '2021-01-23 02:23:53'),
(1607, 'bd', 'Install/Update Addon', 'Install/Update Addon', '2021-01-23 02:23:54', '2021-01-23 02:23:54'),
(1608, 'bd', 'No Addon Installed', 'No Addon Installed', '2021-01-23 02:23:54', '2021-01-23 02:23:54'),
(1609, 'bd', 'Status updated successfully', 'Status updated successfully', '2021-01-23 02:23:54', '2021-01-23 02:23:54'),
(1610, 'bd', 'Something went wrong', 'Something went wrong', '2021-01-23 02:23:54', '2021-01-23 02:23:54'),
(1611, 'bd', 'Product Information', 'Product Information', '2021-01-23 02:24:49', '2021-01-23 02:24:49'),
(1612, 'bd', 'Product Name', 'Product Name', '2021-01-23 02:24:49', '2021-01-23 02:24:49'),
(1613, 'bd', 'Unit', 'Unit', '2021-01-23 02:24:49', '2021-01-23 02:24:49'),
(1614, 'bd', 'Unit (e.g. KG, Pc etc)', 'Unit (e.g. KG, Pc etc)', '2021-01-23 02:24:49', '2021-01-23 02:24:49'),
(1615, 'bd', 'Minimum Qty', 'Minimum Qty', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1616, 'bd', 'Tags', 'Tags', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1617, 'bd', 'Type and hit enter to add a tag', 'Type and hit enter to add a tag', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1618, 'bd', 'This is used for search. Input those words by which cutomer can find this product.', 'This is used for search. Input those words by which cutomer can find this product.', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1619, 'bd', 'Product Images', 'Product Images', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1620, 'bd', 'Gallery Images', 'Gallery Images', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1621, 'bd', 'These images are visible in product details page gallery. Use 600x600 sizes images.', 'These images are visible in product details page gallery. Use 600x600 sizes images.', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1622, 'bd', 'Thumbnail Image', 'Thumbnail Image', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1623, 'bd', 'This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.', 'This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1624, 'bd', 'Product Videos', 'Product Videos', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1625, 'bd', 'Video Provider', 'Video Provider', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1626, 'bd', 'Youtube', 'Youtube', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1627, 'bd', 'Dailymotion', 'Dailymotion', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1628, 'bd', 'Vimeo', 'Vimeo', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1629, 'bd', 'Video Link', 'Video Link', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1630, 'bd', 'Use proper link without extra parameter. Don\'t use short share link/embeded iframe code.', 'Use proper link without extra parameter. Don\'t use short share link/embeded iframe code.', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1631, 'bd', 'Product Variation', 'Product Variation', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1632, 'bd', 'Colors', 'Colors', '2021-01-23 02:24:50', '2021-01-23 02:24:50'),
(1633, 'bd', 'Attributes', 'Attributes', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1634, 'bd', 'Choose Attributes', 'Choose Attributes', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1635, 'bd', 'Choose the attributes of this product and then input values of each attribute', 'Choose the attributes of this product and then input values of each attribute', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1636, 'bd', 'Product price + stock', 'Product price + stock', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1637, 'bd', 'Unit price', 'Unit price', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1638, 'bd', 'Purchase price', 'Purchase price', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1639, 'bd', 'Tax', 'Tax', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1640, 'bd', 'Flat', 'Flat', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1641, 'bd', 'Percent', 'Percent', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1642, 'bd', 'Discount', 'Discount', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1643, 'bd', 'Quantity', 'Quantity', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1644, 'bd', 'Product Description', 'Product Description', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1645, 'bd', 'Description', 'Description', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1646, 'bd', 'Product Shipping Cost', 'Product Shipping Cost', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1647, 'bd', 'Free Shipping', 'Free Shipping', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1648, 'bd', 'Status', 'Status', '2021-01-23 02:24:51', '2021-01-23 02:24:51'),
(1649, 'bd', 'Flat Rate', 'Flat Rate', '2021-01-23 02:24:52', '2021-01-23 02:24:52'),
(1650, 'bd', 'Shipping cost', 'Shipping cost', '2021-01-23 02:24:52', '2021-01-23 02:24:52'),
(1651, 'bd', 'PDF Specification', 'PDF Specification', '2021-01-23 02:24:52', '2021-01-23 02:24:52'),
(1652, 'bd', 'SEO Meta Tags', 'SEO Meta Tags', '2021-01-23 02:24:52', '2021-01-23 02:24:52'),
(1653, 'bd', 'Save Product', 'Save Product', '2021-01-23 02:24:52', '2021-01-23 02:24:52'),
(1654, 'bd', 'Choice Title', 'Choice Title', '2021-01-23 02:24:52', '2021-01-23 02:24:52'),
(1655, 'bd', 'Enter choice values', 'Enter choice values', '2021-01-23 02:24:52', '2021-01-23 02:24:52'),
(1656, 'bd', 'Add New category', 'Add New category', '2021-01-23 02:24:57', '2021-01-23 02:24:57'),
(1657, 'bd', 'Type name & Enter', 'Type name & Enter', '2021-01-23 02:24:57', '2021-01-23 02:24:57'),
(1658, 'bd', 'Parent Category', 'Parent Category', '2021-01-23 02:24:57', '2021-01-23 02:24:57'),
(1659, 'bd', 'Level', 'Level', '2021-01-23 02:24:57', '2021-01-23 02:24:57'),
(1660, 'bd', 'Banner', 'Banner', '2021-01-23 02:24:57', '2021-01-23 02:24:57'),
(1661, 'bd', 'Icon', 'Icon', '2021-01-23 02:24:57', '2021-01-23 02:24:57'),
(1662, 'bd', 'Featured', 'Featured', '2021-01-23 02:24:58', '2021-01-23 02:24:58'),
(1663, 'bd', 'Commission', 'Commission', '2021-01-23 02:24:58', '2021-01-23 02:24:58'),
(1664, 'bd', 'Options', 'Options', '2021-01-23 02:24:58', '2021-01-23 02:24:58'),
(1665, 'bd', 'Edit', 'Edit', '2021-01-23 02:24:58', '2021-01-23 02:24:58'),
(1666, 'bd', 'Featured categories updated successfully', 'Featured categories updated successfully', '2021-01-23 02:24:58', '2021-01-23 02:24:58'),
(1667, 'bd', 'Category Information', 'Category Information', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1668, 'bd', 'Translatable', 'Translatable', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1669, 'bd', 'No Parent', 'No Parent', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1670, 'bd', 'Type', 'Type', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1671, 'bd', 'Physical', 'Physical', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1672, 'bd', 'Digital', 'Digital', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1673, 'bd', '200x200', '200x200', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1674, 'bd', '32x32', '32x32', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1675, 'bd', 'Slug', 'Slug', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1676, 'bd', 'Save', 'Save', '2021-01-23 02:25:18', '2021-01-23 02:25:18'),
(1677, 'bd', 'All Flash Deals', 'All Flash Deals', '2021-01-23 02:31:52', '2021-01-23 02:31:52'),
(1678, 'bd', 'Create New Flash Deal', 'Create New Flash Deal', '2021-01-23 02:31:53', '2021-01-23 02:31:53'),
(1679, 'bd', 'Start Date', 'Start Date', '2021-01-23 02:31:53', '2021-01-23 02:31:53'),
(1680, 'bd', 'End Date', 'End Date', '2021-01-23 02:31:53', '2021-01-23 02:31:53'),
(1681, 'bd', 'Page Link', 'Page Link', '2021-01-23 02:31:53', '2021-01-23 02:31:53'),
(1682, 'bd', 'Category has been inserted successfully', 'Category has been inserted successfully', '2021-01-23 02:35:02', '2021-01-23 02:35:02'),
(1683, 'bd', 'Select File', 'Select File', '2021-01-23 02:40:06', '2021-01-23 02:40:06'),
(1684, 'bd', 'Upload New', 'Upload New', '2021-01-23 02:40:06', '2021-01-23 02:40:06'),
(1685, 'bd', 'Sort by newest', 'Sort by newest', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1686, 'bd', 'Sort by oldest', 'Sort by oldest', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1687, 'bd', 'Sort by smallest', 'Sort by smallest', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1688, 'bd', 'Sort by largest', 'Sort by largest', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1689, 'bd', 'Selected Only', 'Selected Only', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1690, 'bd', 'Search your files', 'Search your files', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1691, 'bd', 'No files found', 'No files found', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1692, 'bd', '0 File selected', '0 File selected', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1693, 'bd', 'Clear', 'Clear', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1694, 'bd', 'Prev', 'Prev', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1695, 'bd', 'Next', 'Next', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1696, 'bd', 'Add Files', 'Add Files', '2021-01-23 02:40:07', '2021-01-23 02:40:07'),
(1697, 'bd', 'Category has been updated successfully', 'Category has been updated successfully', '2021-01-23 02:41:13', '2021-01-23 02:41:13'),
(1698, 'bd', 'All Product', 'All Product', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1699, 'bd', 'All Sellers', 'All Sellers', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1700, 'bd', 'Rating (High > Low)', 'Rating (High > Low)', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1701, 'bd', 'Rating (Low > High)', 'Rating (Low > High)', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1702, 'bd', 'Num of Sale (High > Low)', 'Num of Sale (High > Low)', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1703, 'bd', 'Num of Sale (Low > High)', 'Num of Sale (Low > High)', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1704, 'bd', 'Base Price (High > Low)', 'Base Price (High > Low)', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1705, 'bd', 'Base Price (Low > High)', 'Base Price (Low > High)', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1706, 'bd', 'Type & Enter', 'Type & Enter', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1707, 'bd', 'Added By', 'Added By', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1708, 'bd', 'Num of Sale', 'Num of Sale', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1709, 'bd', 'Total Stock', 'Total Stock', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1710, 'bd', 'Base Price', 'Base Price', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1711, 'bd', 'Todays Deal', 'Todays Deal', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1712, 'bd', 'Rating', 'Rating', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1713, 'bd', 'Published', 'Published', '2021-01-23 02:48:06', '2021-01-23 02:48:06'),
(1714, 'bd', 'Todays Deal updated successfully', 'Todays Deal updated successfully', '2021-01-23 02:48:07', '2021-01-23 02:48:07'),
(1715, 'bd', 'Published products updated successfully', 'Published products updated successfully', '2021-01-23 02:48:07', '2021-01-23 02:48:07'),
(1716, 'bd', 'Featured products updated successfully', 'Featured products updated successfully', '2021-01-23 02:48:07', '2021-01-23 02:48:07'),
(1717, 'bd', 'Product Bulk Upload', 'Product Bulk Upload', '2021-01-23 02:48:21', '2021-01-23 02:48:21'),
(1718, 'bd', 'Step 1', 'Step 1', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1719, 'bd', 'Download the skeleton file and fill it with proper data', 'Download the skeleton file and fill it with proper data', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1720, 'bd', 'You can download the example file to understand how the data must be filled', 'You can download the example file to understand how the data must be filled', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1721, 'bd', 'Once you have downloaded and filled the skeleton file, upload it in the form below and submit', 'Once you have downloaded and filled the skeleton file, upload it in the form below and submit', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1722, 'bd', 'After uploading products you need to edit them and set product\'s images and choices', 'After uploading products you need to edit them and set product\'s images and choices', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1723, 'bd', 'Download CSV', 'Download CSV', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1724, 'bd', 'Step 2', 'Step 2', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1725, 'bd', 'Category and Brand should be in numerical id', 'Category and Brand should be in numerical id', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1726, 'bd', 'You can download the pdf to get Category and Brand id', 'You can download the pdf to get Category and Brand id', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1727, 'bd', 'Download Category', 'Download Category', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1728, 'bd', 'Download Brand', 'Download Brand', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1729, 'bd', 'Upload Product File', 'Upload Product File', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1730, 'bd', 'Upload CSV', 'Upload CSV', '2021-01-23 02:48:22', '2021-01-23 02:48:22'),
(1731, 'bd', 'Home Page Settings', 'Home Page Settings', '2021-01-23 02:49:35', '2021-01-23 02:49:35'),
(1732, 'bd', 'Home Slider', 'Home Slider', '2021-01-23 02:49:35', '2021-01-23 02:49:35'),
(1733, 'bd', 'We have limited banner height to maintain UI. We had to crop from both left & right side in view for different devices to make it responsive. Before designing banner keep these points in mind.', 'We have limited banner height to maintain UI. We had to crop from both left & right side in view for different devices to make it responsive. Before designing banner keep these points in mind.', '2021-01-23 02:49:35', '2021-01-23 02:49:35'),
(1734, 'bd', 'Photos & Links', 'Photos & Links', '2021-01-23 02:49:35', '2021-01-23 02:49:35'),
(1735, 'bd', 'Home Banner 1 (Max 3)', 'Home Banner 1 (Max 3)', '2021-01-23 02:49:35', '2021-01-23 02:49:35'),
(1736, 'bd', 'Banner & Links', 'Banner & Links', '2021-01-23 02:49:35', '2021-01-23 02:49:35'),
(1737, 'bd', 'Home Banner 2 (Max 3)', 'Home Banner 2 (Max 3)', '2021-01-23 02:49:35', '2021-01-23 02:49:35'),
(1738, 'bd', 'Home Categories', 'Home Categories', '2021-01-23 02:49:35', '2021-01-23 02:49:35'),
(1739, 'bd', 'Home Banner 3 (Max 3)', 'Home Banner 3 (Max 3)', '2021-01-23 02:49:36', '2021-01-23 02:49:36'),
(1740, 'bd', 'Top 10', 'Top 10', '2021-01-23 02:49:36', '2021-01-23 02:49:36'),
(1741, 'bd', 'Top Categories (Max 10)', 'Top Categories (Max 10)', '2021-01-23 02:49:36', '2021-01-23 02:49:36'),
(1742, 'bd', 'Top Brands (Max 10)', 'Top Brands (Max 10)', '2021-01-23 02:49:36', '2021-01-23 02:49:36'),
(1743, 'bd', 'Settings updated successfully', 'Settings updated successfully', '2021-01-23 02:50:10', '2021-01-23 02:50:10'),
(1744, 'en', 'Please Configure SMTP Setting to work all email sending functionality', 'Please Configure SMTP Setting to work all email sending functionality', '2021-01-23 23:25:07', '2021-01-23 23:25:07'),
(1745, 'en', 'Order', 'Order', '2021-01-23 23:25:08', '2021-01-23 23:25:08'),
(1746, 'en', 'Search in menu', 'Search in menu', '2021-01-23 23:25:08', '2021-01-23 23:25:08'),
(1747, 'en', 'Uploaded Files', 'Uploaded Files', '2021-01-23 23:25:08', '2021-01-23 23:25:08'),
(1748, 'en', 'Shipping Cities', 'Shipping Cities', '2021-01-23 23:25:08', '2021-01-23 23:25:08'),
(1749, 'en', 'System', 'System', '2021-01-23 23:25:08', '2021-01-23 23:25:08'),
(1750, 'en', 'Server status', 'Server status', '2021-01-23 23:25:08', '2021-01-23 23:25:08'),
(1751, 'en', 'Nothing Found', 'Nothing Found', '2021-01-23 23:25:09', '2021-01-23 23:25:09'),
(1752, 'en', 'Search your files', 'Search your files', '2021-01-23 23:25:31', '2021-01-23 23:25:31'),
(1753, 'en', 'Sendmail', 'Sendmail', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1754, 'en', 'Mailgun', 'Mailgun', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1755, 'en', 'MAIL HOST', 'MAIL HOST', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1756, 'en', 'MAIL PORT', 'MAIL PORT', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1757, 'en', 'MAIL USERNAME', 'MAIL USERNAME', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1758, 'en', 'MAIL PASSWORD', 'MAIL PASSWORD', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1759, 'en', 'MAIL ENCRYPTION', 'MAIL ENCRYPTION', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1760, 'en', 'MAIL FROM ADDRESS', 'MAIL FROM ADDRESS', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1761, 'en', 'MAIL FROM NAME', 'MAIL FROM NAME', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1762, 'en', 'MAILGUN DOMAIN', 'MAILGUN DOMAIN', '2021-01-23 23:26:46', '2021-01-23 23:26:46'),
(1763, 'en', 'MAILGUN SECRET', 'MAILGUN SECRET', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1764, 'en', 'Save Configuration', 'Save Configuration', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1765, 'en', 'Test SMTP configuration', 'Test SMTP configuration', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1766, 'en', 'Enter your email address', 'Enter your email address', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1767, 'en', 'Send test email', 'Send test email', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1768, 'en', 'Instruction', 'Instruction', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1769, 'en', 'Please be carefull when you are configuring SMTP. For incorrect configuration you will get error at the time of order place, new registration, sending newsletter.', 'Please be carefull when you are configuring SMTP. For incorrect configuration you will get error at the time of order place, new registration, sending newsletter.', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1770, 'en', 'For Non-SSL', 'For Non-SSL', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1771, 'en', 'Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver ', 'Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver ', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1772, 'en', 'Set Mail Host according to your server Mail Client Manual Settings', 'Set Mail Host according to your server Mail Client Manual Settings', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1773, 'en', 'Set Mail port as 587', 'Set Mail port as 587', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1774, 'en', 'Set Mail Encryption as ssl if you face issue with tls', 'Set Mail Encryption as ssl if you face issue with tls', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1775, 'en', 'For SSL', 'For SSL', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1776, 'en', 'Set Mail port as 465', 'Set Mail port as 465', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1777, 'en', 'Set Mail Encryption as ssl', 'Set Mail Encryption as ssl', '2021-01-23 23:26:47', '2021-01-23 23:26:47'),
(1778, 'en', 'All Flash Deals', 'All Flash Deals', '2021-01-24 00:02:37', '2021-01-24 00:02:37'),
(1779, 'en', 'Create New Flash Deal', 'Create New Flash Deal', '2021-01-24 00:02:37', '2021-01-24 00:02:37'),
(1780, 'en', '#FFFFFF', '#FFFFFF', '2021-01-24 00:02:45', '2021-01-24 00:02:45'),
(1781, 'en', 'This image is shown as cover banner in flash deal details page.', 'This image is shown as cover banner in flash deal details page.', '2021-01-24 00:02:45', '2021-01-24 00:02:45'),
(1782, 'en', 'Seller Payments', 'Seller Payments', '2021-01-24 00:06:25', '2021-01-24 00:06:25'),
(1783, 'en', 'Seller', 'Seller', '2021-01-24 00:06:25', '2021-01-24 00:06:25'),
(1784, 'en', 'Payment Details', 'Payment Details', '2021-01-24 00:06:25', '2021-01-24 00:06:25'),
(1785, 'en', 'All Attributes', 'All Attributes', '2021-01-24 00:35:53', '2021-01-24 00:35:53'),
(1786, 'en', 'Add New Attribute', 'Add New Attribute', '2021-01-24 00:35:53', '2021-01-24 00:35:53'),
(1787, 'en', 'Parent Category', 'Parent Category', '2021-01-24 00:51:36', '2021-01-24 00:51:36'),
(1788, 'en', 'Level', 'Level', '2021-01-24 00:51:36', '2021-01-24 00:51:36'),
(1789, 'en', 'Category Information', 'Category Information', '2021-01-24 00:51:51', '2021-01-24 00:51:51'),
(1790, 'en', 'No Parent', 'No Parent', '2021-01-24 00:51:51', '2021-01-24 00:51:51'),
(1791, 'en', 'Physical', 'Physical', '2021-01-24 00:51:51', '2021-01-24 00:51:51'),
(1792, 'en', 'Digital', 'Digital', '2021-01-24 00:51:51', '2021-01-24 00:51:51'),
(1793, 'en', '200x200', '200x200', '2021-01-24 00:51:51', '2021-01-24 00:51:51'),
(1794, 'en', '32x32', '32x32', '2021-01-24 00:51:51', '2021-01-24 00:51:51'),
(1795, 'en', 'Add New Brand', 'Add New Brand', '2021-01-24 01:03:02', '2021-01-24 01:03:02'),
(1796, 'en', '120x80', '120x80', '2021-01-24 01:03:02', '2021-01-24 01:03:02'),
(1797, 'en', 'This is used for search. Input those words by which cutomer can find this product.', 'This is used for search. Input those words by which cutomer can find this product.', '2021-01-24 01:06:27', '2021-01-24 01:06:27');
INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(1798, 'en', 'These images are visible in product details page gallery. Use 600x600 sizes images.', 'These images are visible in product details page gallery. Use 600x600 sizes images.', '2021-01-24 01:06:27', '2021-01-24 01:06:27'),
(1799, 'en', 'This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.', 'This image is visible in all product box. Use 300x300 sizes image. Keep some blank space around main object of your image as we had to crop some edge in different devices to make it responsive.', '2021-01-24 01:06:27', '2021-01-24 01:06:27'),
(1800, 'en', 'Use proper link without extra parameter. Don\'t use short share link/embeded iframe code.', 'Use proper link without extra parameter. Don\'t use short share link/embeded iframe code.', '2021-01-24 01:06:27', '2021-01-24 01:06:27'),
(1801, 'en', 'Save Product', 'Save Product', '2021-01-24 01:06:27', '2021-01-24 01:06:27'),
(1802, 'en', 'Translatable', 'Translatable', '2021-01-24 01:20:27', '2021-01-24 01:20:27'),
(1803, 'en', 'Brand has been deleted successfully', 'Brand has been deleted successfully', '2021-01-24 02:42:21', '2021-01-24 02:42:21'),
(1804, 'en', 'Please add shipping address', 'Please add shipping address', '2021-01-24 02:58:25', '2021-01-24 02:58:25'),
(1805, 'en', 'Iyzico', 'Iyzico', '2021-01-24 02:58:47', '2021-01-24 02:58:47'),
(1806, 'en', 'Your order has been placed', 'Your order has been placed', '2021-01-24 02:58:59', '2021-01-24 02:58:59'),
(1807, 'en', 'Install/Update Addon', 'Install/Update Addon', '2021-01-24 03:06:30', '2021-01-24 03:06:30'),
(1808, 'en', 'No Addon Installed', 'No Addon Installed', '2021-01-24 03:06:30', '2021-01-24 03:06:30'),
(1809, 'en', 'Install/Update', 'Install/Update', '2021-01-24 03:06:33', '2021-01-24 03:06:33'),
(1810, 'en', 'Bkash Credential', 'Bkash Credential', '2021-01-24 03:07:06', '2021-01-24 03:07:06'),
(1811, 'en', 'BKASH CHECKOUT APP KEY', 'BKASH CHECKOUT APP KEY', '2021-01-24 03:07:06', '2021-01-24 03:07:06'),
(1812, 'en', 'BKASH CHECKOUT APP SECRET', 'BKASH CHECKOUT APP SECRET', '2021-01-24 03:07:06', '2021-01-24 03:07:06'),
(1813, 'en', 'BKASH CHECKOUT USER NAME', 'BKASH CHECKOUT USER NAME', '2021-01-24 03:07:06', '2021-01-24 03:07:06'),
(1814, 'en', 'BKASH CHECKOUT PASSWORD', 'BKASH CHECKOUT PASSWORD', '2021-01-24 03:07:06', '2021-01-24 03:07:06'),
(1815, 'en', 'Bkash Sandbox Mode', 'Bkash Sandbox Mode', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1816, 'en', 'Nagad Credential', 'Nagad Credential', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1817, 'en', 'NAGAD MODE', 'NAGAD MODE', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1818, 'en', 'NAGAD MERCHANT ID', 'NAGAD MERCHANT ID', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1819, 'en', 'NAGAD MERCHANT NUMBER', 'NAGAD MERCHANT NUMBER', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1820, 'en', 'NAGAD PG PUBLIC KEY', 'NAGAD PG PUBLIC KEY', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1821, 'en', 'NAGAD MERCHANT PRIVATE KEY', 'NAGAD MERCHANT PRIVATE KEY', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1822, 'en', 'Iyzico Credential', 'Iyzico Credential', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1823, 'en', 'IYZICO_API_KEY', 'IYZICO_API_KEY', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1824, 'en', 'IYZICO API KEY', 'IYZICO API KEY', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1825, 'en', 'IYZICO_SECRET_KEY', 'IYZICO_SECRET_KEY', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1826, 'en', 'IYZICO SECRET KEY', 'IYZICO SECRET KEY', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1827, 'en', 'IYZICO Sandbox Mode', 'IYZICO Sandbox Mode', '2021-01-24 03:07:07', '2021-01-24 03:07:07'),
(1828, 'en', 'Use Phone Instead', 'Use Phone Instead', '2021-01-24 03:11:33', '2021-01-24 03:11:33'),
(1829, 'en', 'Email or Phone already exists.', 'Email or Phone already exists.', '2021-01-24 03:11:49', '2021-01-24 03:11:49'),
(1830, 'en', 'Registration successfull.', 'Registration successfull.', '2021-01-24 03:12:10', '2021-01-24 03:12:10'),
(1831, 'en', 'Your order has been placed successfully', 'Your order has been placed successfully', '2021-01-24 03:13:39', '2021-01-24 03:13:39'),
(1832, 'en', 'System Default Currency', 'System Default Currency', '2021-01-24 03:19:41', '2021-01-24 03:19:41'),
(1833, 'en', 'Set Currency Formats', 'Set Currency Formats', '2021-01-24 03:19:41', '2021-01-24 03:19:41'),
(1834, 'en', 'Symbol Format', 'Symbol Format', '2021-01-24 03:19:41', '2021-01-24 03:19:41'),
(1835, 'en', 'Decimal Separator', 'Decimal Separator', '2021-01-24 03:19:41', '2021-01-24 03:19:41'),
(1836, 'en', 'No of decimals', 'No of decimals', '2021-01-24 03:19:41', '2021-01-24 03:19:41'),
(1837, 'en', 'All Currencies', 'All Currencies', '2021-01-24 03:19:41', '2021-01-24 03:19:41'),
(1838, 'en', 'Add New Currency', 'Add New Currency', '2021-01-24 03:19:41', '2021-01-24 03:19:41'),
(1839, 'en', 'Currency name', 'Currency name', '2021-01-24 03:19:41', '2021-01-24 03:19:41'),
(1840, 'en', 'Currency symbol', 'Currency symbol', '2021-01-24 03:19:42', '2021-01-24 03:19:42'),
(1841, 'en', 'Currency code', 'Currency code', '2021-01-24 03:19:42', '2021-01-24 03:19:42'),
(1842, 'en', 'Currency Status updated successfully', 'Currency Status updated successfully', '2021-01-24 03:19:42', '2021-01-24 03:19:42'),
(1843, 'en', 'Filter by date', 'Filter by date', '2021-01-24 03:20:49', '2021-01-24 03:20:49'),
(1844, 'bd', 'Default Language', 'Default Language', '2021-01-24 04:02:14', '2021-01-24 04:02:14'),
(1845, 'bd', 'Add New Language', 'Add New Language', '2021-01-24 04:02:14', '2021-01-24 04:02:14'),
(1846, 'bd', 'Language', 'Language', '2021-01-24 04:02:14', '2021-01-24 04:02:14'),
(1847, 'bd', 'Code', 'Code', '2021-01-24 04:02:14', '2021-01-24 04:02:14'),
(1848, 'bd', 'RTL', 'RTL', '2021-01-24 04:02:14', '2021-01-24 04:02:14'),
(1849, 'bd', 'Translation', 'Translation', '2021-01-24 04:02:14', '2021-01-24 04:02:14'),
(1850, 'bd', 'new orders', 'new orders', '2021-01-24 04:02:15', '2021-01-24 04:02:15'),
(1851, 'bd', 'Logo', 'Logo', '2021-01-24 04:02:23', '2021-01-24 04:02:23'),
(1852, 'bd', 'Add New Brand', 'Add New Brand', '2021-01-24 04:02:24', '2021-01-24 04:02:24'),
(1853, 'bd', '120x80', '120x80', '2021-01-24 04:02:24', '2021-01-24 04:02:24'),
(1854, 'bd', 'Brand has been inserted successfully', 'Brand has been inserted successfully', '2021-01-24 04:02:32', '2021-01-24 04:02:32'),
(1855, 'bd', 'Brand has been deleted successfully', 'Brand has been deleted successfully', '2021-01-24 04:02:49', '2021-01-24 04:02:49'),
(1856, 'bd', 'Category has been deleted successfully', 'Category has been deleted successfully', '2021-01-24 04:04:55', '2021-01-24 04:04:55'),
(1857, 'bd', 'Filter by Rating', 'Filter by Rating', '2021-01-24 04:07:34', '2021-01-24 04:07:34'),
(1858, 'bd', 'Product', 'Product', '2021-01-24 04:07:34', '2021-01-24 04:07:34'),
(1859, 'bd', 'Product Owner', 'Product Owner', '2021-01-24 04:07:34', '2021-01-24 04:07:34'),
(1860, 'bd', 'Comment', 'Comment', '2021-01-24 04:07:34', '2021-01-24 04:07:34'),
(1861, 'bd', 'Published reviews updated successfully', 'Published reviews updated successfully', '2021-01-24 04:07:34', '2021-01-24 04:07:34'),
(1862, 'bd', 'Purchase History', 'Purchase History', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1863, 'bd', 'New', 'New', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1864, 'bd', 'Downloads', 'Downloads', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1865, 'bd', 'Conversations', 'Conversations', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1866, 'bd', 'Support Ticket', 'Support Ticket', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1867, 'bd', 'Manage Profile', 'Manage Profile', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1868, 'bd', 'Date', 'Date', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1869, 'bd', 'Amount', 'Amount', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1870, 'bd', 'Delivery Status', 'Delivery Status', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1871, 'bd', 'Payment Status', 'Payment Status', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1872, 'bd', 'Pending', 'Pending', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1873, 'bd', 'Unpaid', 'Unpaid', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1874, 'bd', 'Order Details', 'Order Details', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1875, 'bd', 'Download Invoice', 'Download Invoice', '2021-01-24 04:08:16', '2021-01-24 04:08:16'),
(1876, 'bd', 'Item has been added to wishlist', 'Item has been added to wishlist', '2021-01-24 04:08:17', '2021-01-24 04:08:17'),
(1877, 'bd', 'Order id', 'Order id', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1878, 'bd', 'Order placed', 'Order placed', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1879, 'bd', 'Confirmed', 'Confirmed', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1880, 'bd', 'On delivery', 'On delivery', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1881, 'bd', 'Delivered', 'Delivered', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1882, 'bd', 'Order Summary', 'Order Summary', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1883, 'bd', 'Order Code', 'Order Code', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1884, 'bd', 'Shipping address', 'Shipping address', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1885, 'bd', 'Order date', 'Order date', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1886, 'bd', 'Order status', 'Order status', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1887, 'bd', 'Total order amount', 'Total order amount', '2021-01-24 04:08:22', '2021-01-24 04:08:22'),
(1888, 'bd', 'Shipping method', 'Shipping method', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1889, 'bd', 'Flat shipping rate', 'Flat shipping rate', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1890, 'bd', 'Payment method', 'Payment method', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1891, 'bd', 'Variation', 'Variation', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1892, 'bd', 'Delivery Type', 'Delivery Type', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1893, 'bd', 'Price', 'Price', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1894, 'bd', 'Home Delivery', 'Home Delivery', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1895, 'bd', 'Order Ammount', 'Order Ammount', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1896, 'bd', 'Subtotal', 'Subtotal', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1897, 'bd', 'Shipping', 'Shipping', '2021-01-24 04:08:23', '2021-01-24 04:08:23'),
(1898, 'bd', 'times', 'times', '2021-01-24 04:09:32', '2021-01-24 04:09:32'),
(1899, 'bd', 'Duplicate', 'Duplicate', '2021-01-24 04:09:32', '2021-01-24 04:09:32'),
(1900, 'bd', 'Filter by date', 'Filter by date', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1901, 'bd', 'Filter by Payment Status', 'Filter by Payment Status', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1902, 'bd', 'Paid', 'Paid', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1903, 'bd', 'Un-Paid', 'Un-Paid', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1904, 'bd', 'Filter by Deliver Status', 'Filter by Deliver Status', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1905, 'bd', 'Type Order code & hit Enter', 'Type Order code & hit Enter', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1906, 'bd', 'Filter', 'Filter', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1907, 'bd', 'Num. of Products', 'Num. of Products', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1908, 'bd', 'Cash on delivery', 'Cash on delivery', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1909, 'bd', 'View', 'View', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1910, 'bd', 'Iyzico', 'Iyzico', '2021-01-24 04:09:38', '2021-01-24 04:09:38'),
(1911, 'bd', 'Order #', 'Order #', '2021-01-24 04:09:48', '2021-01-24 04:09:48'),
(1912, 'bd', 'Total amount', 'Total amount', '2021-01-24 04:09:48', '2021-01-24 04:09:48'),
(1913, 'bd', 'Photo', 'Photo', '2021-01-24 04:09:48', '2021-01-24 04:09:48'),
(1914, 'bd', 'Qty', 'Qty', '2021-01-24 04:09:48', '2021-01-24 04:09:48'),
(1915, 'bd', 'Sub Total', 'Sub Total', '2021-01-24 04:09:48', '2021-01-24 04:09:48'),
(1916, 'bd', 'Delivery status has been updated', 'Delivery status has been updated', '2021-01-24 04:09:48', '2021-01-24 04:09:48'),
(1917, 'bd', 'Payment status has been updated', 'Payment status has been updated', '2021-01-24 04:09:48', '2021-01-24 04:09:48'),
(1918, 'bd', 'reviews', 'reviews', '2021-01-24 04:10:45', '2021-01-24 04:10:45'),
(1919, 'bd', 'In stock', 'In stock', '2021-01-24 04:10:45', '2021-01-24 04:10:45'),
(1920, 'bd', 'Sold by', 'Sold by', '2021-01-24 04:10:45', '2021-01-24 04:10:45'),
(1921, 'bd', 'Inhouse product', 'Inhouse product', '2021-01-24 04:10:45', '2021-01-24 04:10:45'),
(1922, 'bd', 'Message Seller', 'Message Seller', '2021-01-24 04:10:45', '2021-01-24 04:10:45'),
(1923, 'bd', 'Discount Price', 'Discount Price', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1924, 'bd', 'available', 'available', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1925, 'bd', 'Total Price', 'Total Price', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1926, 'bd', 'Add to cart', 'Add to cart', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1927, 'bd', 'Buy Now', 'Buy Now', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1928, 'bd', 'Add to wishlist', 'Add to wishlist', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1929, 'bd', 'Add to compare', 'Add to compare', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1930, 'bd', 'Share', 'Share', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1931, 'bd', 'customer reviews', 'customer reviews', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1932, 'bd', 'Top Selling Products', 'Top Selling Products', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1933, 'bd', 'Download', 'Download', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1934, 'bd', 'There have been no reviews for this product yet.', 'There have been no reviews for this product yet.', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1935, 'bd', 'Related products', 'Related products', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1936, 'bd', 'Any query about this product', 'Any query about this product', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1937, 'bd', 'Your Question', 'Your Question', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1938, 'bd', 'Send', 'Send', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1939, 'bd', 'Forgot password?', 'Forgot password?', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1940, 'bd', 'Dont have an account?', 'Dont have an account?', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1941, 'bd', 'Register Now', 'Register Now', '2021-01-24 04:10:46', '2021-01-24 04:10:46'),
(1942, 'bd', 'Product(s)', 'Product(s)', '2021-01-24 04:11:56', '2021-01-24 04:11:56'),
(1943, 'bd', 'in your cart', 'in your cart', '2021-01-24 04:11:56', '2021-01-24 04:11:56'),
(1944, 'bd', 'in your wishlist', 'in your wishlist', '2021-01-24 04:11:56', '2021-01-24 04:11:56'),
(1945, 'bd', 'you ordered', 'you ordered', '2021-01-24 04:11:56', '2021-01-24 04:11:56'),
(1946, 'bd', 'Default Shipping Address', 'Default Shipping Address', '2021-01-24 04:11:56', '2021-01-24 04:11:56'),
(1947, 'bd', 'Write a review', 'Write a review', '2021-01-24 04:12:38', '2021-01-24 04:12:38'),
(1948, 'bd', 'Your name', 'Your name', '2021-01-24 04:12:38', '2021-01-24 04:12:38'),
(1949, 'bd', 'Your review', 'Your review', '2021-01-24 04:12:38', '2021-01-24 04:12:38'),
(1950, 'bd', 'Submit review', 'Submit review', '2021-01-24 04:12:38', '2021-01-24 04:12:38'),
(1951, 'bd', 'Review has been submitted successfully', 'Review has been submitted successfully', '2021-01-24 04:13:52', '2021-01-24 04:13:52'),
(1952, 'bd', 'All Customers', 'All Customers', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1953, 'bd', 'Type email or name & Enter', 'Type email or name & Enter', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1954, 'bd', 'Email Address', 'Email Address', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1955, 'bd', 'Package', 'Package', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1956, 'bd', 'Wallet Balance', 'Wallet Balance', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1957, 'bd', 'Log in as this Customer', 'Log in as this Customer', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1958, 'bd', 'Ban this Customer', 'Ban this Customer', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1959, 'bd', 'Do you really want to ban this Customer?', 'Do you really want to ban this Customer?', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1960, 'bd', 'Proceed!', 'Proceed!', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1961, 'bd', 'Do you really want to unban this Customer?', 'Do you really want to unban this Customer?', '2021-01-24 04:14:51', '2021-01-24 04:14:51'),
(1962, 'bd', 'Edit Product', 'Edit Product', '2021-01-24 04:29:56', '2021-01-24 04:29:56'),
(1963, 'bd', 'Type to add a tag', 'Type to add a tag', '2021-01-24 04:29:56', '2021-01-24 04:29:56'),
(1964, 'bd', 'Meta Images', 'Meta Images', '2021-01-24 04:29:56', '2021-01-24 04:29:56'),
(1965, 'bd', 'Update Product', 'Update Product', '2021-01-24 04:29:56', '2021-01-24 04:29:56'),
(1966, 'bd', 'Product has been updated successfully', 'Product has been updated successfully', '2021-01-24 04:30:23', '2021-01-24 04:30:23'),
(1967, 'bd', 'Language changed to ', 'Language changed to ', '2021-01-24 04:31:31', '2021-01-24 04:31:31'),
(1968, 'bd', 'RTL status updated successfully', 'RTL status updated successfully', '2021-01-24 04:32:33', '2021-01-24 04:32:33'),
(1969, 'bd', 'Message has been send to seller', 'Message has been send to seller', '2021-01-24 04:35:35', '2021-01-24 04:35:35'),
(1970, 'bd', 'Add New Digital Product', 'Add New Digital Product', '2021-01-24 04:36:16', '2021-01-24 04:36:16'),
(1971, 'bd', 'Facebook Chat Setting', 'Facebook Chat Setting', '2021-01-24 04:36:56', '2021-01-24 04:36:56'),
(1972, 'bd', 'Facebook Page ID', 'Facebook Page ID', '2021-01-24 04:36:56', '2021-01-24 04:36:56'),
(1973, 'bd', 'Please be carefull when you are configuring Facebook chat. For incorrect configuration you will not get messenger icon on your user-end site.', 'Please be carefull when you are configuring Facebook chat. For incorrect configuration you will not get messenger icon on your user-end site.', '2021-01-24 04:36:56', '2021-01-24 04:36:56'),
(1974, 'bd', 'Login into your facebook page', 'Login into your facebook page', '2021-01-24 04:36:56', '2021-01-24 04:36:56'),
(1975, 'bd', 'Find the About option of your facebook page', 'Find the About option of your facebook page', '2021-01-24 04:36:56', '2021-01-24 04:36:56'),
(1976, 'bd', 'At the very bottom, you can find the \\“Facebook Page ID\\”', 'At the very bottom, you can find the \\“Facebook Page ID\\”', '2021-01-24 04:36:56', '2021-01-24 04:36:56'),
(1977, 'bd', 'Go to Settings of your page and find the option of \\\"Advance Messaging\\\"', 'Go to Settings of your page and find the option of \\\"Advance Messaging\\\"', '2021-01-24 04:36:56', '2021-01-24 04:36:56'),
(1978, 'bd', 'Scroll down that page and you will get \\\"white listed domain\\\"', 'Scroll down that page and you will get \\\"white listed domain\\\"', '2021-01-24 04:36:57', '2021-01-24 04:36:57'),
(1979, 'bd', 'Set your website domain name', 'Set your website domain name', '2021-01-24 04:36:57', '2021-01-24 04:36:57'),
(1980, 'bd', 'All uploaded files', 'All uploaded files', '2021-01-24 04:38:31', '2021-01-24 04:38:31'),
(1981, 'bd', 'Upload New File', 'Upload New File', '2021-01-24 04:38:31', '2021-01-24 04:38:31'),
(1982, 'bd', 'All files', 'All files', '2021-01-24 04:38:31', '2021-01-24 04:38:31'),
(1983, 'bd', 'Search', 'Search', '2021-01-24 04:38:31', '2021-01-24 04:38:31'),
(1984, 'bd', 'Details Info', 'Details Info', '2021-01-24 04:38:31', '2021-01-24 04:38:31'),
(1985, 'bd', 'Copy Link', 'Copy Link', '2021-01-24 04:38:31', '2021-01-24 04:38:31'),
(1986, 'bd', 'Are you sure to delete this file?', 'Are you sure to delete this file?', '2021-01-24 04:38:31', '2021-01-24 04:38:31'),
(1987, 'bd', 'File Info', 'File Info', '2021-01-24 04:38:32', '2021-01-24 04:38:32'),
(1988, 'bd', 'Link copied to clipboard', 'Link copied to clipboard', '2021-01-24 04:38:32', '2021-01-24 04:38:32'),
(1989, 'bd', 'Oops, unable to copy', 'Oops, unable to copy', '2021-01-24 04:38:32', '2021-01-24 04:38:32'),
(1990, 'bd', 'File deleted successfully', 'File deleted successfully', '2021-01-24 04:38:39', '2021-01-24 04:38:39'),
(1991, 'bd', 'User Search Report', 'User Search Report', '2021-01-24 04:40:26', '2021-01-24 04:40:26'),
(1992, 'bd', 'Search By', 'Search By', '2021-01-24 04:40:26', '2021-01-24 04:40:26'),
(1993, 'bd', 'Number searches', 'Number searches', '2021-01-24 04:40:26', '2021-01-24 04:40:26'),
(1994, 'bd', 'Popular Suggestions', 'Popular Suggestions', '2021-01-24 04:40:44', '2021-01-24 04:40:44'),
(1995, 'bd', 'Category Suggestions', 'Category Suggestions', '2021-01-24 04:40:44', '2021-01-24 04:40:44'),
(1996, 'bd', 'Category Suggestions', 'Category Suggestions', '2021-01-24 04:40:44', '2021-01-24 04:40:44'),
(1997, 'bd', 'Shops', 'Shops', '2021-01-24 04:40:47', '2021-01-24 04:40:47'),
(1998, 'bd', 'Search result for ', 'Search result for ', '2021-01-24 04:40:52', '2021-01-24 04:40:52'),
(1999, 'bd', 'All Pick-up Points', 'All Pick-up Points', '2021-01-24 04:42:04', '2021-01-24 04:42:04'),
(2000, 'bd', 'Add New Pick-up Point', 'Add New Pick-up Point', '2021-01-24 04:42:04', '2021-01-24 04:42:04'),
(2001, 'bd', 'Manager', 'Manager', '2021-01-24 04:42:04', '2021-01-24 04:42:04'),
(2002, 'bd', 'Location', 'Location', '2021-01-24 04:42:04', '2021-01-24 04:42:04'),
(2003, 'bd', 'Pickup Station Contact', 'Pickup Station Contact', '2021-01-24 04:42:04', '2021-01-24 04:42:04'),
(2004, 'bd', 'S3 File System Credentials', 'S3 File System Credentials', '2021-01-24 04:42:12', '2021-01-24 04:42:12'),
(2005, 'bd', 'AWS_ACCESS_KEY_ID', 'AWS_ACCESS_KEY_ID', '2021-01-24 04:42:12', '2021-01-24 04:42:12'),
(2006, 'bd', 'AWS_SECRET_ACCESS_KEY', 'AWS_SECRET_ACCESS_KEY', '2021-01-24 04:42:12', '2021-01-24 04:42:12'),
(2007, 'bd', 'AWS_DEFAULT_REGION', 'AWS_DEFAULT_REGION', '2021-01-24 04:42:12', '2021-01-24 04:42:12'),
(2008, 'bd', 'AWS_BUCKET', 'AWS_BUCKET', '2021-01-24 04:42:13', '2021-01-24 04:42:13'),
(2009, 'bd', 'AWS_URL', 'AWS_URL', '2021-01-24 04:42:13', '2021-01-24 04:42:13'),
(2010, 'bd', 'S3 File System Activation', 'S3 File System Activation', '2021-01-24 04:42:13', '2021-01-24 04:42:13'),
(2011, 'bd', 'Countries', 'Countries', '2021-01-24 04:42:27', '2021-01-24 04:42:27'),
(2012, 'bd', 'Show/Hide', 'Show/Hide', '2021-01-24 04:42:27', '2021-01-24 04:42:27'),
(2013, 'bd', 'Country status updated successfully', 'Country status updated successfully', '2021-01-24 04:42:27', '2021-01-24 04:42:27'),
(2014, 'bd', 'Sender', 'Sender', '2021-01-24 04:42:56', '2021-01-24 04:42:56'),
(2015, 'bd', 'Receiver', 'Receiver', '2021-01-24 04:42:56', '2021-01-24 04:42:56'),
(2016, 'bd', 'Support Desk', 'Support Desk', '2021-01-24 04:43:01', '2021-01-24 04:43:01'),
(2017, 'bd', 'Type ticket code & Enter', 'Type ticket code & Enter', '2021-01-24 04:43:01', '2021-01-24 04:43:01'),
(2018, 'bd', 'Ticket ID', 'Ticket ID', '2021-01-24 04:43:01', '2021-01-24 04:43:01'),
(2019, 'bd', 'Sending Date', 'Sending Date', '2021-01-24 04:43:01', '2021-01-24 04:43:01'),
(2020, 'bd', 'Subject', 'Subject', '2021-01-24 04:43:01', '2021-01-24 04:43:01'),
(2021, 'bd', 'User', 'User', '2021-01-24 04:43:01', '2021-01-24 04:43:01'),
(2022, 'bd', 'Last reply', 'Last reply', '2021-01-24 04:43:01', '2021-01-24 04:43:01'),
(2023, 'bd', 'All Subscribers', 'All Subscribers', '2021-01-24 04:43:08', '2021-01-24 04:43:08'),
(2024, 'bd', 'All Coupons', 'All Coupons', '2021-01-24 04:43:11', '2021-01-24 04:43:11'),
(2025, 'bd', 'Add New Coupon', 'Add New Coupon', '2021-01-24 04:43:11', '2021-01-24 04:43:11'),
(2026, 'bd', 'Coupon Information', 'Coupon Information', '2021-01-24 04:43:12', '2021-01-24 04:43:12'),
(2027, 'bd', 'Classified Products', 'Classified Products', '2021-01-24 05:11:03', '2021-01-24 05:11:03'),
(2028, 'bd', 'Image', 'Image', '2021-01-24 05:11:03', '2021-01-24 05:11:03'),
(2029, 'bd', 'Uploaded By', 'Uploaded By', '2021-01-24 05:11:03', '2021-01-24 05:11:03'),
(2030, 'bd', 'Customer Status', 'Customer Status', '2021-01-24 05:11:03', '2021-01-24 05:11:03'),
(2031, 'bd', 'Classified Packages', 'Classified Packages', '2021-01-24 05:15:07', '2021-01-24 05:15:07'),
(2032, 'bd', 'All Classifies Packages', 'All Classifies Packages', '2021-01-24 05:15:13', '2021-01-24 05:15:13'),
(2033, 'bd', 'Add New Package', 'Add New Package', '2021-01-24 05:15:13', '2021-01-24 05:15:13'),
(2034, 'bd', 'Create New Package', 'Create New Package', '2021-01-24 05:15:25', '2021-01-24 05:15:25'),
(2035, 'bd', 'Package Name', 'Package Name', '2021-01-24 05:15:25', '2021-01-24 05:15:25'),
(2036, 'bd', 'Product Upload', 'Product Upload', '2021-01-24 05:15:25', '2021-01-24 05:15:25'),
(2037, 'bd', 'Package logo', 'Package logo', '2021-01-24 05:15:25', '2021-01-24 05:15:25'),
(2038, 'bd', 'Package has been inserted successfully', 'Package has been inserted successfully', '2021-01-24 05:17:30', '2021-01-24 05:17:30'),
(2039, 'bd', 'Item has been renoved from wishlist', 'Item has been renoved from wishlist', '2021-01-24 05:22:40', '2021-01-24 05:22:40'),
(2040, 'bd', 'Register your shop', 'Register your shop', '2021-01-24 05:23:36', '2021-01-24 05:23:36'),
(2041, 'bd', 'Basic Info', 'Basic Info', '2021-01-24 05:23:36', '2021-01-24 05:23:36'),
(2042, 'bd', 'Shop Name', 'Shop Name', '2021-01-24 05:23:36', '2021-01-24 05:23:36'),
(2043, 'bd', 'Choose image', 'Choose image', '2021-01-24 05:23:36', '2021-01-24 05:23:36'),
(2044, 'bd', 'Hot', 'Hot', '2021-01-24 05:28:42', '2021-01-24 05:28:42'),
(2045, 'bd', 'Store Home', 'Store Home', '2021-01-24 05:29:25', '2021-01-24 05:29:25'),
(2046, 'bd', 'Top Selling', 'Top Selling', '2021-01-24 05:29:25', '2021-01-24 05:29:25'),
(2047, 'bd', 'New Arrival Products', 'New Arrival Products', '2021-01-24 05:29:25', '2021-01-24 05:29:25'),
(2048, 'bd', 'New Password', 'New Password', '2021-01-24 05:31:52', '2021-01-24 05:31:52'),
(2049, 'bd', 'Confirm Password', 'Confirm Password', '2021-01-24 05:31:52', '2021-01-24 05:31:52'),
(2050, 'bd', 'Avatar', 'Avatar', '2021-01-24 05:31:52', '2021-01-24 05:31:52'),
(2051, 'bd', 'Your Profile has been updated successfully!', 'Your Profile has been updated successfully!', '2021-01-24 05:33:17', '2021-01-24 05:33:17'),
(2052, 'bd', 'Add New Staffs', 'Add New Staffs', '2021-01-24 05:39:23', '2021-01-24 05:39:23'),
(2053, 'bd', 'Role', 'Role', '2021-01-24 05:39:23', '2021-01-24 05:39:23'),
(2054, 'bd', 'All Role', 'All Role', '2021-01-24 05:39:26', '2021-01-24 05:39:26'),
(2055, 'bd', 'Add New Role', 'Add New Role', '2021-01-24 05:39:26', '2021-01-24 05:39:26'),
(2056, 'bd', 'Roles', 'Roles', '2021-01-24 05:39:27', '2021-01-24 05:39:27'),
(2057, 'bd', 'Type your reply', 'Type your reply', '2021-01-24 05:42:36', '2021-01-24 05:42:36'),
(2058, 'bd', 'Create a Ticket', 'Create a Ticket', '2021-01-24 05:45:14', '2021-01-24 05:45:14'),
(2059, 'bd', 'Tickets', 'Tickets', '2021-01-24 05:45:15', '2021-01-24 05:45:15'),
(2060, 'bd', 'Provide a detailed description', 'Provide a detailed description', '2021-01-24 05:45:15', '2021-01-24 05:45:15'),
(2061, 'bd', 'Send Ticket', 'Send Ticket', '2021-01-24 05:45:15', '2021-01-24 05:45:15'),
(2062, 'bd', 'Ticket has been sent successfully', 'Ticket has been sent successfully', '2021-01-24 05:45:36', '2021-01-24 05:45:36'),
(2063, 'bd', 'View Details', 'View Details', '2021-01-24 05:45:36', '2021-01-24 05:45:36'),
(2064, 'bd', 'Send Reply', 'Send Reply', '2021-01-24 05:45:42', '2021-01-24 05:45:42'),
(2065, 'bd', 'Submit as', 'Submit as', '2021-01-24 05:46:20', '2021-01-24 05:46:20'),
(2066, 'bd', 'Open', 'Open', '2021-01-24 05:46:20', '2021-01-24 05:46:20'),
(2067, 'bd', 'Solved', 'Solved', '2021-01-24 05:46:20', '2021-01-24 05:46:20'),
(2068, 'bd', 'Reply has been sent successfully', 'Reply has been sent successfully', '2021-01-24 05:47:47', '2021-01-24 05:47:47'),
(2069, 'bd', 'Page Not Found!', 'Page Not Found!', '2021-01-24 06:03:45', '2021-01-24 06:03:45'),
(2070, 'bd', 'The page you are looking for has not been found on our server.', 'The page you are looking for has not been found on our server.', '2021-01-24 06:03:45', '2021-01-24 06:03:45'),
(2071, 'bd', 'Flash Deal Information', 'Flash Deal Information', '2021-01-24 06:07:23', '2021-01-24 06:07:23'),
(2072, 'bd', 'Background Color', 'Background Color', '2021-01-24 06:07:23', '2021-01-24 06:07:23'),
(2073, 'bd', '#FFFFFF', '#FFFFFF', '2021-01-24 06:07:23', '2021-01-24 06:07:23'),
(2074, 'bd', 'Text Color', 'Text Color', '2021-01-24 06:07:24', '2021-01-24 06:07:24'),
(2075, 'bd', 'Select One', 'Select One', '2021-01-24 06:07:24', '2021-01-24 06:07:24'),
(2076, 'bd', 'White', 'White', '2021-01-24 06:07:24', '2021-01-24 06:07:24'),
(2077, 'bd', 'Dark', 'Dark', '2021-01-24 06:07:24', '2021-01-24 06:07:24'),
(2078, 'bd', 'This image is shown as cover banner in flash deal details page.', 'This image is shown as cover banner in flash deal details page.', '2021-01-24 06:07:24', '2021-01-24 06:07:24'),
(2079, 'bd', 'Choose Products', 'Choose Products', '2021-01-24 06:07:24', '2021-01-24 06:07:24'),
(2080, 'bd', 'Discounts', 'Discounts', '2021-01-24 06:20:45', '2021-01-24 06:20:45'),
(2081, 'bd', 'Discount Type', 'Discount Type', '2021-01-24 06:20:45', '2021-01-24 06:20:45'),
(2082, 'bd', 'Flash Deal has been inserted successfully', 'Flash Deal has been inserted successfully', '2021-01-24 06:20:51', '2021-01-24 06:20:51'),
(2083, 'bd', 'Flash deal status updated successfully', 'Flash deal status updated successfully', '2021-01-24 06:21:35', '2021-01-24 06:21:35'),
(2084, 'bd', '#0000ff', '#0000ff', '2021-01-24 06:23:58', '2021-01-24 06:23:58'),
(2085, 'bd', 'Flash Deal has been updated successfully', 'Flash Deal has been updated successfully', '2021-01-24 06:24:17', '2021-01-24 06:24:17'),
(2086, 'bd', 'Product has been duplicated successfully', 'Product has been duplicated successfully', '2021-01-24 06:32:53', '2021-01-24 06:32:53'),
(2087, 'bd', 'Flash Sale', 'Flash Sale', '2021-01-24 21:44:51', '2021-01-24 21:44:51'),
(2088, 'bd', 'View More', 'View More', '2021-01-24 21:44:52', '2021-01-24 21:44:52'),
(2089, 'bd', 'HTTPS Activation', 'HTTPS Activation', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2090, 'bd', 'Maintenance Mode', 'Maintenance Mode', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2091, 'bd', 'Maintenance Mode Activation', 'Maintenance Mode Activation', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2092, 'bd', 'Classified Product Activate', 'Classified Product Activate', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2093, 'bd', 'Classified Product', 'Classified Product', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2094, 'bd', 'Business Related', 'Business Related', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2095, 'bd', 'Vendor System Activation', 'Vendor System Activation', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2096, 'bd', 'Wallet System Activation', 'Wallet System Activation', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2097, 'bd', 'Coupon System Activation', 'Coupon System Activation', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2098, 'bd', 'Pickup Point Activation', 'Pickup Point Activation', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2099, 'bd', 'Conversation Activation', 'Conversation Activation', '2021-01-24 22:33:41', '2021-01-24 22:33:41'),
(2100, 'bd', 'Guest Checkout Activation', 'Guest Checkout Activation', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2101, 'bd', 'Category-based Commission', 'Category-based Commission', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2102, 'bd', 'After activate this option Seller commision will be disabled and You need to set commission on each category otherwise Admin will not get any commision', 'After activate this option Seller commision will be disabled and You need to set commission on each category otherwise Admin will not get any commision', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2103, 'bd', 'Set Commisssion Now', 'Set Commisssion Now', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2104, 'bd', 'Email Verification', 'Email Verification', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2105, 'bd', 'Payment Related', 'Payment Related', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2106, 'bd', 'Paypal Payment Activation', 'Paypal Payment Activation', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2107, 'bd', 'You need to configure Paypal correctly to enable this feature', 'You need to configure Paypal correctly to enable this feature', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2108, 'bd', 'Stripe Payment Activation', 'Stripe Payment Activation', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2109, 'bd', 'SSlCommerz Activation', 'SSlCommerz Activation', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2110, 'bd', 'Instamojo Payment Activation', 'Instamojo Payment Activation', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2111, 'bd', 'You need to configure Instamojo Payment correctly to enable this feature', 'You need to configure Instamojo Payment correctly to enable this feature', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2112, 'bd', 'Razor Pay Activation', 'Razor Pay Activation', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2113, 'bd', 'You need to configure Razor correctly to enable this feature', 'You need to configure Razor correctly to enable this feature', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2114, 'bd', 'PayStack Activation', 'PayStack Activation', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2115, 'bd', 'You need to configure PayStack correctly to enable this feature', 'You need to configure PayStack correctly to enable this feature', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2116, 'bd', 'VoguePay Activation', 'VoguePay Activation', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2117, 'bd', 'You need to configure VoguePay correctly to enable this feature', 'You need to configure VoguePay correctly to enable this feature', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2118, 'bd', 'Payhere Activation', 'Payhere Activation', '2021-01-24 22:33:42', '2021-01-24 22:33:42'),
(2119, 'bd', 'Ngenius Activation', 'Ngenius Activation', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2120, 'bd', 'You need to configure Ngenius correctly to enable this feature', 'You need to configure Ngenius correctly to enable this feature', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2121, 'bd', 'Iyzico Activation', 'Iyzico Activation', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2122, 'bd', 'You need to configure iyzico correctly to enable this feature', 'You need to configure iyzico correctly to enable this feature', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2123, 'bd', 'Bkash Activation', 'Bkash Activation', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2124, 'bd', 'You need to configure bkash correctly to enable this feature', 'You need to configure bkash correctly to enable this feature', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2125, 'bd', 'Nagad Activation', 'Nagad Activation', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2126, 'bd', 'You need to configure nagad correctly to enable this feature', 'You need to configure nagad correctly to enable this feature', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2127, 'bd', 'Cash Payment Activation', 'Cash Payment Activation', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2128, 'bd', 'Social Media Login', 'Social Media Login', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2129, 'bd', 'Facebook login', 'Facebook login', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2130, 'bd', 'You need to configure Facebook Client correctly to enable this feature', 'You need to configure Facebook Client correctly to enable this feature', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2131, 'bd', 'Google login', 'Google login', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2132, 'bd', 'You need to configure Google Client correctly to enable this feature', 'You need to configure Google Client correctly to enable this feature', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2133, 'bd', 'Twitter login', 'Twitter login', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2134, 'bd', 'You need to configure Twitter Client correctly to enable this feature', 'You need to configure Twitter Client correctly to enable this feature', '2021-01-24 22:33:43', '2021-01-24 22:33:43'),
(2135, 'bd', 'Item added to your cart!', 'Item added to your cart!', '2021-01-24 22:35:00', '2021-01-24 22:35:00'),
(2136, 'bd', 'Back to shopping', 'Back to shopping', '2021-01-24 22:35:00', '2021-01-24 22:35:00'),
(2137, 'bd', 'Proceed to Checkout', 'Proceed to Checkout', '2021-01-24 22:35:00', '2021-01-24 22:35:00'),
(2138, 'bd', 'Cart Items', 'Cart Items', '2021-01-24 22:35:01', '2021-01-24 22:35:01'),
(2139, 'bd', '1. My Cart', '1. My Cart', '2021-01-24 22:35:01', '2021-01-24 22:35:01'),
(2140, 'bd', '2. Shipping info', '2. Shipping info', '2021-01-24 22:35:01', '2021-01-24 22:35:01'),
(2141, 'bd', '3. Delivery info', '3. Delivery info', '2021-01-24 22:35:01', '2021-01-24 22:35:01'),
(2142, 'bd', 'View cart', 'View cart', '2021-01-24 22:35:01', '2021-01-24 22:35:01'),
(2143, 'bd', '4. Payment', '4. Payment', '2021-01-24 22:35:01', '2021-01-24 22:35:01'),
(2144, 'bd', '5. Confirmation', '5. Confirmation', '2021-01-24 22:35:01', '2021-01-24 22:35:01'),
(2145, 'bd', 'Remove', 'Remove', '2021-01-24 22:35:38', '2021-01-24 22:35:38'),
(2146, 'bd', 'Return to shop', 'Return to shop', '2021-01-24 22:35:39', '2021-01-24 22:35:39'),
(2147, 'bd', 'Continue to Shipping', 'Continue to Shipping', '2021-01-24 22:35:39', '2021-01-24 22:35:39'),
(2148, 'bd', 'Or', 'Or', '2021-01-24 22:35:39', '2021-01-24 22:35:39'),
(2149, 'bd', 'Guest Checkout', 'Guest Checkout', '2021-01-24 22:35:39', '2021-01-24 22:35:39'),
(2150, 'bd', 'Checkout', 'Checkout', '2021-01-24 22:35:39', '2021-01-24 22:35:39'),
(2151, 'bd', 'My Wallet', 'My Wallet', '2021-01-24 22:35:39', '2021-01-24 22:35:39'),
(2152, 'bd', 'Postal Code', 'Postal Code', '2021-01-24 22:35:43', '2021-01-24 22:35:43'),
(2153, 'bd', 'City', 'City', '2021-01-24 22:35:44', '2021-01-24 22:35:44'),
(2154, 'bd', 'Country', 'Country', '2021-01-24 22:35:44', '2021-01-24 22:35:44'),
(2155, 'bd', 'Add New Address', 'Add New Address', '2021-01-24 22:35:44', '2021-01-24 22:35:44'),
(2156, 'bd', 'Continue to Delivery Info', 'Continue to Delivery Info', '2021-01-24 22:35:44', '2021-01-24 22:35:44'),
(2157, 'bd', 'New Address', 'New Address', '2021-01-24 22:35:44', '2021-01-24 22:35:44'),
(2158, 'bd', 'Your Address', 'Your Address', '2021-01-24 22:35:44', '2021-01-24 22:35:44'),
(2159, 'bd', 'Your City', 'Your City', '2021-01-24 22:35:44', '2021-01-24 22:35:44'),
(2160, 'bd', 'Your Postal Code', 'Your Postal Code', '2021-01-24 22:35:44', '2021-01-24 22:35:44'),
(2161, 'bd', '+880', '+880', '2021-01-24 22:35:44', '2021-01-24 22:35:44'),
(2162, 'bd', 'Continue to Payment', 'Continue to Payment', '2021-01-24 22:35:47', '2021-01-24 22:35:47'),
(2163, 'bd', 'Select a payment option', 'Select a payment option', '2021-01-24 22:35:50', '2021-01-24 22:35:50'),
(2164, 'bd', 'sslcommerz', 'sslcommerz', '2021-01-24 22:35:50', '2021-01-24 22:35:50'),
(2165, 'bd', 'payhere', 'payhere', '2021-01-24 22:35:50', '2021-01-24 22:35:50'),
(2166, 'bd', 'Nagad', 'Nagad', '2021-01-24 22:35:50', '2021-01-24 22:35:50'),
(2167, 'bd', 'Bkash', 'Bkash', '2021-01-24 22:35:50', '2021-01-24 22:35:50'),
(2168, 'bd', 'Your wallet balance :', 'Your wallet balance :', '2021-01-24 22:35:50', '2021-01-24 22:35:50'),
(2169, 'bd', 'Insufficient balance', 'Insufficient balance', '2021-01-24 22:35:50', '2021-01-24 22:35:50'),
(2170, 'bd', 'I agree to the', 'I agree to the', '2021-01-24 22:35:50', '2021-01-24 22:35:50'),
(2171, 'bd', 'terms and conditions', 'terms and conditions', '2021-01-24 22:35:50', '2021-01-24 22:35:50'),
(2172, 'bd', 'Complete Order', 'Complete Order', '2021-01-24 22:35:51', '2021-01-24 22:35:51'),
(2173, 'bd', 'Summary', 'Summary', '2021-01-24 22:35:51', '2021-01-24 22:35:51'),
(2174, 'bd', 'Items', 'Items', '2021-01-24 22:35:51', '2021-01-24 22:35:51'),
(2175, 'bd', 'Total Shipping', 'Total Shipping', '2021-01-24 22:35:51', '2021-01-24 22:35:51'),
(2176, 'bd', 'Have coupon code? Enter here', 'Have coupon code? Enter here', '2021-01-24 22:35:51', '2021-01-24 22:35:51'),
(2177, 'bd', 'Apply', 'Apply', '2021-01-24 22:35:51', '2021-01-24 22:35:51'),
(2178, 'bd', 'You need to agree with our policies', 'You need to agree with our policies', '2021-01-24 22:35:51', '2021-01-24 22:35:51'),
(2179, 'bd', 'Your order has been placed', 'Your order has been placed', '2021-01-24 22:36:15', '2021-01-24 22:36:15'),
(2180, 'bd', 'Facebook Pixel Setting', 'Facebook Pixel Setting', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2181, 'bd', 'Facebook Pixel', 'Facebook Pixel', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2182, 'bd', 'Facebook Pixel ID', 'Facebook Pixel ID', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2183, 'bd', 'Please be carefull when you are configuring Facebook pixel.', 'Please be carefull when you are configuring Facebook pixel.', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2184, 'bd', 'Log in to Facebook and go to your Ads Manager account', 'Log in to Facebook and go to your Ads Manager account', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2185, 'bd', 'Open the Navigation Bar and select Events Manager', 'Open the Navigation Bar and select Events Manager', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2186, 'bd', 'Copy your Pixel ID from underneath your Site Name and paste the number into Facebook Pixel ID field', 'Copy your Pixel ID from underneath your Site Name and paste the number into Facebook Pixel ID field', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2187, 'bd', 'Google Analytics Setting', 'Google Analytics Setting', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2188, 'bd', 'Google Analytics', 'Google Analytics', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2189, 'bd', 'Tracking ID', 'Tracking ID', '2021-01-24 22:39:02', '2021-01-24 22:39:02'),
(2190, 'bd', 'Brand Information', 'Brand Information', '2021-01-24 22:40:17', '2021-01-24 22:40:17'),
(2191, 'bd', 'Product Wish Report', 'Product Wish Report', '2021-01-24 22:41:54', '2021-01-24 22:41:54'),
(2192, 'bd', 'Sort by Category', 'Sort by Category', '2021-01-24 22:41:54', '2021-01-24 22:41:54'),
(2193, 'bd', 'Number of Wish', 'Number of Wish', '2021-01-24 22:41:54', '2021-01-24 22:41:54'),
(2194, 'bd', 'Send Newsletter', 'Send Newsletter', '2021-01-24 22:42:06', '2021-01-24 22:42:06'),
(2195, 'bd', 'Emails', 'Emails', '2021-01-24 22:42:06', '2021-01-24 22:42:06'),
(2196, 'bd', 'Users', 'Users', '2021-01-24 22:42:06', '2021-01-24 22:42:06'),
(2197, 'bd', 'Newsletter subject', 'Newsletter subject', '2021-01-24 22:42:06', '2021-01-24 22:42:06'),
(2198, 'bd', 'Newsletter content', 'Newsletter content', '2021-01-24 22:42:06', '2021-01-24 22:42:06'),
(2199, 'bd', 'Brand has been updated successfully', 'Brand has been updated successfully', '2021-01-24 23:41:16', '2021-01-24 23:41:16'),
(2200, 'bd', 'Product has been inserted successfully', 'Product has been inserted successfully', '2021-01-25 22:56:09', '2021-01-25 22:56:09'),
(2201, 'bd', 'Video', 'Video', '2021-01-25 22:57:30', '2021-01-25 22:57:30'),
(2202, 'bd', 'System Name', 'System Name', '2021-01-25 23:07:04', '2021-01-25 23:07:04'),
(2203, 'bd', 'System Logo - White', 'System Logo - White', '2021-01-25 23:07:04', '2021-01-25 23:07:04'),
(2204, 'bd', 'Choose Files', 'Choose Files', '2021-01-25 23:07:04', '2021-01-25 23:07:04'),
(2205, 'bd', 'Will be used in admin panel side menu', 'Will be used in admin panel side menu', '2021-01-25 23:07:04', '2021-01-25 23:07:04'),
(2206, 'bd', 'System Logo - Black', 'System Logo - Black', '2021-01-25 23:07:04', '2021-01-25 23:07:04'),
(2207, 'bd', 'Will be used in admin panel topbar in mobile + Admin login page', 'Will be used in admin panel topbar in mobile + Admin login page', '2021-01-25 23:07:04', '2021-01-25 23:07:04'),
(2208, 'bd', 'System Timezone', 'System Timezone', '2021-01-25 23:07:04', '2021-01-25 23:07:04'),
(2209, 'bd', 'Admin login page background', 'Admin login page background', '2021-01-25 23:07:04', '2021-01-25 23:07:04'),
(2210, 'bd', 'Purchased Package', 'Purchased Package', '2021-01-25 23:17:35', '2021-01-25 23:17:35'),
(2211, 'bd', 'Package Not Found', 'Package Not Found', '2021-01-25 23:17:35', '2021-01-25 23:17:35'),
(2212, 'bd', 'Upgrade Package', 'Upgrade Package', '2021-01-25 23:17:35', '2021-01-25 23:17:35'),
(2213, 'bd', 'Premium Packages for Customers', 'Premium Packages for Customers', '2021-01-25 23:18:28', '2021-01-25 23:18:28'),
(2214, 'bd', 'Purchase Package', 'Purchase Package', '2021-01-25 23:18:29', '2021-01-25 23:18:29'),
(2215, 'bd', 'Select Payment Type', 'Select Payment Type', '2021-01-25 23:18:29', '2021-01-25 23:18:29'),
(2216, 'bd', 'Payment Type', 'Payment Type', '2021-01-25 23:18:29', '2021-01-25 23:18:29'),
(2217, 'bd', 'Online payment', 'Online payment', '2021-01-25 23:18:29', '2021-01-25 23:18:29'),
(2218, 'bd', 'Offline payment', 'Offline payment', '2021-01-25 23:18:29', '2021-01-25 23:18:29'),
(2219, 'bd', 'Purchase Your Package', 'Purchase Your Package', '2021-01-25 23:18:29', '2021-01-25 23:18:29'),
(2220, 'bd', 'Confirm', 'Confirm', '2021-01-25 23:18:29', '2021-01-25 23:18:29'),
(2221, 'bd', 'Offline Package Purchase ', 'Offline Package Purchase ', '2021-01-25 23:18:29', '2021-01-25 23:18:29'),
(2222, 'bd', 'Remaining Uploads', 'Remaining Uploads', '2021-01-25 23:21:32', '2021-01-25 23:21:32'),
(2223, 'bd', 'No Package Found', 'No Package Found', '2021-01-25 23:21:32', '2021-01-25 23:21:32'),
(2224, 'bd', 'Available Status', 'Available Status', '2021-01-25 23:21:32', '2021-01-25 23:21:32'),
(2225, 'bd', 'Admin Status', 'Admin Status', '2021-01-25 23:21:32', '2021-01-25 23:21:32'),
(2226, 'bd', 'Status has been updated successfully', 'Status has been updated successfully', '2021-01-25 23:21:32', '2021-01-25 23:21:32'),
(2227, 'bd', 'Server information', 'Server information', '2021-01-25 23:34:10', '2021-01-25 23:34:10'),
(2228, 'bd', 'Current Version', 'Current Version', '2021-01-25 23:34:10', '2021-01-25 23:34:10'),
(2229, 'bd', 'Required Version', 'Required Version', '2021-01-25 23:34:10', '2021-01-25 23:34:10'),
(2230, 'bd', 'php.ini Config', 'php.ini Config', '2021-01-25 23:34:10', '2021-01-25 23:34:10'),
(2231, 'bd', 'Config Name', 'Config Name', '2021-01-25 23:34:10', '2021-01-25 23:34:10'),
(2232, 'bd', 'Current', 'Current', '2021-01-25 23:34:10', '2021-01-25 23:34:10'),
(2233, 'bd', 'Recommended', 'Recommended', '2021-01-25 23:34:10', '2021-01-25 23:34:10'),
(2234, 'bd', 'Extensions information', 'Extensions information', '2021-01-25 23:34:11', '2021-01-25 23:34:11'),
(2235, 'bd', 'Extension Name', 'Extension Name', '2021-01-25 23:34:11', '2021-01-25 23:34:11'),
(2236, 'bd', 'Filesystem Permissions', 'Filesystem Permissions', '2021-01-25 23:34:11', '2021-01-25 23:34:11'),
(2237, 'bd', 'File or Folder', 'File or Folder', '2021-01-25 23:34:11', '2021-01-25 23:34:11'),
(2238, 'bd', 'Language Information', 'Language Information', '2021-01-25 23:37:40', '2021-01-25 23:37:40'),
(2239, 'bd', 'update Language Info', 'update Language Info', '2021-01-25 23:37:40', '2021-01-25 23:37:40'),
(2240, 'bd', 'System Default Currency', 'System Default Currency', '2021-01-25 23:38:03', '2021-01-25 23:38:03'),
(2241, 'bd', 'Set Currency Formats', 'Set Currency Formats', '2021-01-25 23:38:03', '2021-01-25 23:38:03'),
(2242, 'bd', 'Symbol Format', 'Symbol Format', '2021-01-25 23:38:03', '2021-01-25 23:38:03'),
(2243, 'bd', 'Decimal Separator', 'Decimal Separator', '2021-01-25 23:38:03', '2021-01-25 23:38:03'),
(2244, 'bd', 'No of decimals', 'No of decimals', '2021-01-25 23:38:03', '2021-01-25 23:38:03'),
(2245, 'bd', 'All Currencies', 'All Currencies', '2021-01-25 23:38:03', '2021-01-25 23:38:03'),
(2246, 'bd', 'Add New Currency', 'Add New Currency', '2021-01-25 23:38:03', '2021-01-25 23:38:03'),
(2247, 'bd', 'Currency name', 'Currency name', '2021-01-25 23:38:03', '2021-01-25 23:38:03'),
(2248, 'bd', 'Currency symbol', 'Currency symbol', '2021-01-25 23:38:04', '2021-01-25 23:38:04'),
(2249, 'bd', 'Currency code', 'Currency code', '2021-01-25 23:38:04', '2021-01-25 23:38:04'),
(2250, 'bd', 'Exchange rate', 'Exchange rate', '2021-01-25 23:38:04', '2021-01-25 23:38:04'),
(2251, 'bd', 'Currency Status updated successfully', 'Currency Status updated successfully', '2021-01-25 23:38:04', '2021-01-25 23:38:04'),
(2252, 'bd', 'Sendmail', 'Sendmail', '2021-01-25 23:38:15', '2021-01-25 23:38:15'),
(2253, 'bd', 'SMTP', 'SMTP', '2021-01-25 23:38:15', '2021-01-25 23:38:15'),
(2254, 'bd', 'Mailgun', 'Mailgun', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2255, 'bd', 'MAIL HOST', 'MAIL HOST', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2256, 'bd', 'MAIL PORT', 'MAIL PORT', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2257, 'bd', 'MAIL USERNAME', 'MAIL USERNAME', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2258, 'bd', 'MAIL PASSWORD', 'MAIL PASSWORD', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2259, 'bd', 'MAIL ENCRYPTION', 'MAIL ENCRYPTION', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2260, 'bd', 'MAIL FROM ADDRESS', 'MAIL FROM ADDRESS', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2261, 'bd', 'MAIL FROM NAME', 'MAIL FROM NAME', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2262, 'bd', 'MAILGUN DOMAIN', 'MAILGUN DOMAIN', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2263, 'bd', 'MAILGUN SECRET', 'MAILGUN SECRET', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2264, 'bd', 'Save Configuration', 'Save Configuration', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2265, 'bd', 'Test SMTP configuration', 'Test SMTP configuration', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2266, 'bd', 'Enter your email address', 'Enter your email address', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2267, 'bd', 'Send test email', 'Send test email', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2268, 'bd', 'Instruction', 'Instruction', '2021-01-25 23:38:16', '2021-01-25 23:38:16');
INSERT INTO `translations` (`id`, `lang`, `lang_key`, `lang_value`, `created_at`, `updated_at`) VALUES
(2269, 'bd', 'Please be carefull when you are configuring SMTP. For incorrect configuration you will get error at the time of order place, new registration, sending newsletter.', 'Please be carefull when you are configuring SMTP. For incorrect configuration you will get error at the time of order place, new registration, sending newsletter.', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2270, 'bd', 'For Non-SSL', 'For Non-SSL', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2271, 'bd', 'Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver ', 'Select sendmail for Mail Driver if you face any issue after configuring smtp as Mail Driver ', '2021-01-25 23:38:16', '2021-01-25 23:38:16'),
(2272, 'bd', 'Set Mail Host according to your server Mail Client Manual Settings', 'Set Mail Host according to your server Mail Client Manual Settings', '2021-01-25 23:38:17', '2021-01-25 23:38:17'),
(2273, 'bd', 'Set Mail port as 587', 'Set Mail port as 587', '2021-01-25 23:38:17', '2021-01-25 23:38:17'),
(2274, 'bd', 'Set Mail Encryption as ssl if you face issue with tls', 'Set Mail Encryption as ssl if you face issue with tls', '2021-01-25 23:38:17', '2021-01-25 23:38:17'),
(2275, 'bd', 'For SSL', 'For SSL', '2021-01-25 23:38:17', '2021-01-25 23:38:17'),
(2276, 'bd', 'Set Mail port as 465', 'Set Mail port as 465', '2021-01-25 23:38:17', '2021-01-25 23:38:17'),
(2277, 'bd', 'Set Mail Encryption as ssl', 'Set Mail Encryption as ssl', '2021-01-25 23:38:17', '2021-01-25 23:38:17'),
(2278, 'bd', 'Paypal Credential', 'Paypal Credential', '2021-01-25 23:39:02', '2021-01-25 23:39:02'),
(2279, 'bd', 'Paypal Client Id', 'Paypal Client Id', '2021-01-25 23:39:02', '2021-01-25 23:39:02'),
(2280, 'bd', 'Paypal Client Secret', 'Paypal Client Secret', '2021-01-25 23:39:02', '2021-01-25 23:39:02'),
(2281, 'bd', 'Stripe Credential', 'Stripe Credential', '2021-01-25 23:39:02', '2021-01-25 23:39:02'),
(2282, 'bd', 'Stripe Key', 'Stripe Key', '2021-01-25 23:39:02', '2021-01-25 23:39:02'),
(2283, 'bd', 'Stripe Secret', 'Stripe Secret', '2021-01-25 23:39:02', '2021-01-25 23:39:02'),
(2284, 'bd', 'Bkash Credential', 'Bkash Credential', '2021-01-25 23:39:02', '2021-01-25 23:39:02'),
(2285, 'bd', 'BKASH CHECKOUT APP KEY', 'BKASH CHECKOUT APP KEY', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2286, 'bd', 'BKASH CHECKOUT APP SECRET', 'BKASH CHECKOUT APP SECRET', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2287, 'bd', 'BKASH CHECKOUT USER NAME', 'BKASH CHECKOUT USER NAME', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2288, 'bd', 'BKASH CHECKOUT PASSWORD', 'BKASH CHECKOUT PASSWORD', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2289, 'bd', 'Bkash Sandbox Mode', 'Bkash Sandbox Mode', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2290, 'bd', 'Nagad Credential', 'Nagad Credential', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2291, 'bd', 'NAGAD MODE', 'NAGAD MODE', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2292, 'bd', 'NAGAD MERCHANT ID', 'NAGAD MERCHANT ID', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2293, 'bd', 'NAGAD MERCHANT NUMBER', 'NAGAD MERCHANT NUMBER', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2294, 'bd', 'NAGAD PG PUBLIC KEY', 'NAGAD PG PUBLIC KEY', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2295, 'bd', 'NAGAD MERCHANT PRIVATE KEY', 'NAGAD MERCHANT PRIVATE KEY', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2296, 'bd', 'Sslcommerz Credential', 'Sslcommerz Credential', '2021-01-25 23:39:03', '2021-01-25 23:39:03'),
(2297, 'bd', 'Sslcz Store Id', 'Sslcz Store Id', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2298, 'bd', 'Sslcz store password', 'Sslcz store password', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2299, 'bd', 'Sslcommerz Sandbox Mode', 'Sslcommerz Sandbox Mode', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2300, 'bd', 'RazorPay Credential', 'RazorPay Credential', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2301, 'bd', 'RAZOR KEY', 'RAZOR KEY', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2302, 'bd', 'RAZOR SECRET', 'RAZOR SECRET', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2303, 'bd', 'Instamojo Credential', 'Instamojo Credential', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2304, 'bd', 'API KEY', 'API KEY', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2305, 'bd', 'IM API KEY', 'IM API KEY', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2306, 'bd', 'AUTH TOKEN', 'AUTH TOKEN', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2307, 'bd', 'IM AUTH TOKEN', 'IM AUTH TOKEN', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2308, 'bd', 'Instamojo Sandbox Mode', 'Instamojo Sandbox Mode', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2309, 'bd', 'PayStack Credential', 'PayStack Credential', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2310, 'bd', 'PUBLIC KEY', 'PUBLIC KEY', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2311, 'bd', 'SECRET KEY', 'SECRET KEY', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2312, 'bd', 'MERCHANT EMAIL', 'MERCHANT EMAIL', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2313, 'bd', 'Payhere Credential', 'Payhere Credential', '2021-01-25 23:39:04', '2021-01-25 23:39:04'),
(2314, 'bd', 'PAYHERE MERCHANT ID', 'PAYHERE MERCHANT ID', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2315, 'bd', 'PAYHERE SECRET', 'PAYHERE SECRET', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2316, 'bd', 'PAYHERE CURRENCY', 'PAYHERE CURRENCY', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2317, 'bd', 'Payhere Sandbox Mode', 'Payhere Sandbox Mode', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2318, 'bd', 'Ngenius Credential', 'Ngenius Credential', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2319, 'bd', 'NGENIUS OUTLET ID', 'NGENIUS OUTLET ID', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2320, 'bd', 'NGENIUS API KEY', 'NGENIUS API KEY', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2321, 'bd', 'NGENIUS CURRENCY', 'NGENIUS CURRENCY', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2322, 'bd', 'VoguePay Credential', 'VoguePay Credential', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2323, 'bd', 'MERCHANT ID', 'MERCHANT ID', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2324, 'bd', 'Sandbox Mode', 'Sandbox Mode', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2325, 'bd', 'Iyzico Credential', 'Iyzico Credential', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2326, 'bd', 'IYZICO_API_KEY', 'IYZICO_API_KEY', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2327, 'bd', 'IYZICO API KEY', 'IYZICO API KEY', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2328, 'bd', 'IYZICO_SECRET_KEY', 'IYZICO_SECRET_KEY', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2329, 'bd', 'IYZICO SECRET KEY', 'IYZICO SECRET KEY', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2330, 'bd', 'IYZICO Sandbox Mode', 'IYZICO Sandbox Mode', '2021-01-25 23:39:05', '2021-01-25 23:39:05'),
(2331, 'bd', 'Google Login Credential', 'Google Login Credential', '2021-01-25 23:39:15', '2021-01-25 23:39:15'),
(2332, 'bd', 'Client ID', 'Client ID', '2021-01-25 23:39:15', '2021-01-25 23:39:15'),
(2333, 'bd', 'Google Client ID', 'Google Client ID', '2021-01-25 23:39:15', '2021-01-25 23:39:15'),
(2334, 'bd', 'Client Secret', 'Client Secret', '2021-01-25 23:39:15', '2021-01-25 23:39:15'),
(2335, 'bd', 'Google Client Secret', 'Google Client Secret', '2021-01-25 23:39:16', '2021-01-25 23:39:16'),
(2336, 'bd', 'Facebook Login Credential', 'Facebook Login Credential', '2021-01-25 23:39:16', '2021-01-25 23:39:16'),
(2337, 'bd', 'App ID', 'App ID', '2021-01-25 23:39:16', '2021-01-25 23:39:16'),
(2338, 'bd', 'Facebook Client ID', 'Facebook Client ID', '2021-01-25 23:39:16', '2021-01-25 23:39:16'),
(2339, 'bd', 'App Secret', 'App Secret', '2021-01-25 23:39:16', '2021-01-25 23:39:16'),
(2340, 'bd', 'Facebook Client Secret', 'Facebook Client Secret', '2021-01-25 23:39:16', '2021-01-25 23:39:16'),
(2341, 'bd', 'Twitter Login Credential', 'Twitter Login Credential', '2021-01-25 23:39:16', '2021-01-25 23:39:16'),
(2342, 'bd', 'Twitter Client ID', 'Twitter Client ID', '2021-01-25 23:39:16', '2021-01-25 23:39:16'),
(2343, 'bd', 'Twitter Client Secret', 'Twitter Client Secret', '2021-01-25 23:39:16', '2021-01-25 23:39:16'),
(2344, 'bd', 'All Attributes', 'All Attributes', '2021-01-25 23:47:12', '2021-01-25 23:47:12'),
(2345, 'bd', 'Add New Attribute', 'Add New Attribute', '2021-01-25 23:47:12', '2021-01-25 23:47:12'),
(2346, 'bd', 'Variant', 'Variant', '2021-01-25 23:47:53', '2021-01-25 23:47:53'),
(2347, 'bd', 'Variant Price', 'Variant Price', '2021-01-25 23:47:53', '2021-01-25 23:47:53'),
(2348, 'bd', 'SKU', 'SKU', '2021-01-25 23:47:53', '2021-01-25 23:47:53'),
(2349, 'bd', 'Out of stock', 'Out of stock', '2021-01-25 23:55:39', '2021-01-25 23:55:39'),
(2350, 'bd', 'Product has been deleted successfully', 'Product has been deleted successfully', '2021-01-25 23:56:11', '2021-01-25 23:56:11'),
(2351, 'bd', 'Color', 'Color', '2021-01-26 00:17:14', '2021-01-26 00:17:14'),
(2352, 'bd', 'Filter by', 'Filter by', '2021-01-26 00:36:34', '2021-01-26 00:36:34'),
(2353, 'bd', 'Admin can not be a seller', 'Admin can not be a seller', '2021-01-26 02:02:33', '2021-01-26 02:02:33'),
(2354, 'bd', 'Create an account.', 'Create an account.', '2021-01-26 02:03:27', '2021-01-26 02:03:27'),
(2355, 'bd', 'Full Name', 'Full Name', '2021-01-26 02:03:27', '2021-01-26 02:03:27'),
(2356, 'bd', 'By signing up you agree to our terms and conditions.', 'By signing up you agree to our terms and conditions.', '2021-01-26 02:03:28', '2021-01-26 02:03:28'),
(2357, 'bd', 'Create Account', 'Create Account', '2021-01-26 02:03:28', '2021-01-26 02:03:28'),
(2358, 'bd', 'Already have an account?', 'Already have an account?', '2021-01-26 02:03:28', '2021-01-26 02:03:28'),
(2359, 'bd', 'Log In', 'Log In', '2021-01-26 02:03:28', '2021-01-26 02:03:28'),
(2360, 'bd', 'Use Phone Instead', 'Use Phone Instead', '2021-01-26 02:03:28', '2021-01-26 02:03:28'),
(2361, 'bd', 'Use Email Instead', 'Use Email Instead', '2021-01-26 02:03:28', '2021-01-26 02:03:28'),
(2362, 'bd', 'Registration successfull.', 'Registration successfull.', '2021-01-26 02:03:52', '2021-01-26 02:03:52'),
(2363, 'bd', 'Language has been deleted successfully', 'Language has been deleted successfully', '2021-01-26 09:05:43', '2021-01-26 09:05:43'),
(2364, 'en', 'Bkash', 'Bkash', '2021-01-26 09:58:01', '2021-01-26 09:58:01'),
(2365, 'bd', 'FlashDeal has been deleted successfully', 'FlashDeal has been deleted successfully', '2021-01-26 11:01:57', '2021-01-26 11:01:57'),
(2366, 'en', 'We have limited banner height to maintain UI. We had to crop from both left & right side in view for different devices to make it responsive. Before designing banner keep these points in mind.', 'We have limited banner height to maintain UI. We had to crop from both left & right side in view for different devices to make it responsive. Before designing banner keep these points in mind.', '2021-01-26 11:44:04', '2021-01-26 11:44:04'),
(2367, 'en', 'Home Banner 3 (Max 3)', 'Home Banner 3 (Max 3)', '2021-01-26 11:44:05', '2021-01-26 11:44:05'),
(2368, 'en', 'Page has been updated successfully', 'Page has been updated successfully', '2021-01-26 11:45:32', '2021-01-26 11:45:32'),
(2369, 'en', 'New page has been created successfully', 'New page has been created successfully', '2021-01-26 11:46:30', '2021-01-26 11:46:30'),
(2370, 'en', 'Page has been deleted successfully', 'Page has been deleted successfully', '2021-01-26 11:53:06', '2021-01-26 11:53:06'),
(2371, 'en', 'Cookies Agreement', 'Cookies Agreement', '2021-01-26 11:53:11', '2021-01-26 11:53:11'),
(2372, 'en', 'Cookies Agreement Text', 'Cookies Agreement Text', '2021-01-26 11:53:12', '2021-01-26 11:53:12'),
(2373, 'en', 'Show Cookies Agreement?', 'Show Cookies Agreement?', '2021-01-26 11:53:12', '2021-01-26 11:53:12'),
(2374, 'en', 'Custom Script', 'Custom Script', '2021-01-26 11:53:12', '2021-01-26 11:53:12'),
(2375, 'en', 'Header custom script - before </head>', 'Header custom script - before </head>', '2021-01-26 11:53:12', '2021-01-26 11:53:12'),
(2376, 'en', 'Write script with <script> tag', 'Write script with <script> tag', '2021-01-26 11:53:12', '2021-01-26 11:53:12'),
(2377, 'en', 'Footer custom script - before </body>', 'Footer custom script - before </body>', '2021-01-26 11:53:12', '2021-01-26 11:53:12'),
(2378, 'en', 'HTTPS Activation', 'HTTPS Activation', '2021-01-26 12:44:08', '2021-01-26 12:44:08'),
(2379, 'en', 'Maintenance Mode', 'Maintenance Mode', '2021-01-26 12:44:08', '2021-01-26 12:44:08'),
(2380, 'en', 'Maintenance Mode Activation', 'Maintenance Mode Activation', '2021-01-26 12:44:08', '2021-01-26 12:44:08'),
(2381, 'en', 'Classified Product Activate', 'Classified Product Activate', '2021-01-26 12:44:08', '2021-01-26 12:44:08'),
(2382, 'en', 'Classified Product', 'Classified Product', '2021-01-26 12:44:08', '2021-01-26 12:44:08'),
(2383, 'en', 'Business Related', 'Business Related', '2021-01-26 12:44:08', '2021-01-26 12:44:08'),
(2384, 'en', 'Vendor System Activation', 'Vendor System Activation', '2021-01-26 12:44:08', '2021-01-26 12:44:08'),
(2385, 'en', 'Wallet System Activation', 'Wallet System Activation', '2021-01-26 12:44:08', '2021-01-26 12:44:08'),
(2386, 'en', 'Coupon System Activation', 'Coupon System Activation', '2021-01-26 12:44:08', '2021-01-26 12:44:08'),
(2387, 'en', 'Pickup Point Activation', 'Pickup Point Activation', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2388, 'en', 'Conversation Activation', 'Conversation Activation', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2389, 'en', 'Guest Checkout Activation', 'Guest Checkout Activation', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2390, 'en', 'Category-based Commission', 'Category-based Commission', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2391, 'en', 'After activate this option Seller commision will be disabled and You need to set commission on each category otherwise Admin will not get any commision', 'After activate this option Seller commision will be disabled and You need to set commission on each category otherwise Admin will not get any commision', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2392, 'en', 'Set Commisssion Now', 'Set Commisssion Now', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2393, 'en', 'Email Verification', 'Email Verification', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2394, 'en', 'Payment Related', 'Payment Related', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2395, 'en', 'Paypal Payment Activation', 'Paypal Payment Activation', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2396, 'en', 'You need to configure Paypal correctly to enable this feature', 'You need to configure Paypal correctly to enable this feature', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2397, 'en', 'Stripe Payment Activation', 'Stripe Payment Activation', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2398, 'en', 'SSlCommerz Activation', 'SSlCommerz Activation', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2399, 'en', 'Instamojo Payment Activation', 'Instamojo Payment Activation', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2400, 'en', 'You need to configure Instamojo Payment correctly to enable this feature', 'You need to configure Instamojo Payment correctly to enable this feature', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2401, 'en', 'Razor Pay Activation', 'Razor Pay Activation', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2402, 'en', 'You need to configure Razor correctly to enable this feature', 'You need to configure Razor correctly to enable this feature', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2403, 'en', 'PayStack Activation', 'PayStack Activation', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2404, 'en', 'You need to configure PayStack correctly to enable this feature', 'You need to configure PayStack correctly to enable this feature', '2021-01-26 12:44:09', '2021-01-26 12:44:09'),
(2405, 'en', 'VoguePay Activation', 'VoguePay Activation', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2406, 'en', 'You need to configure VoguePay correctly to enable this feature', 'You need to configure VoguePay correctly to enable this feature', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2407, 'en', 'Payhere Activation', 'Payhere Activation', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2408, 'en', 'Ngenius Activation', 'Ngenius Activation', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2409, 'en', 'You need to configure Ngenius correctly to enable this feature', 'You need to configure Ngenius correctly to enable this feature', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2410, 'en', 'Iyzico Activation', 'Iyzico Activation', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2411, 'en', 'You need to configure iyzico correctly to enable this feature', 'You need to configure iyzico correctly to enable this feature', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2412, 'en', 'Bkash Activation', 'Bkash Activation', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2413, 'en', 'You need to configure bkash correctly to enable this feature', 'You need to configure bkash correctly to enable this feature', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2414, 'en', 'Nagad Activation', 'Nagad Activation', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2415, 'en', 'You need to configure nagad correctly to enable this feature', 'You need to configure nagad correctly to enable this feature', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2416, 'en', 'Cash Payment Activation', 'Cash Payment Activation', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2417, 'en', 'Social Media Login', 'Social Media Login', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2418, 'en', 'Facebook login', 'Facebook login', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2419, 'en', 'You need to configure Facebook Client correctly to enable this feature', 'You need to configure Facebook Client correctly to enable this feature', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2420, 'en', 'Google login', 'Google login', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2421, 'en', 'You need to configure Google Client correctly to enable this feature', 'You need to configure Google Client correctly to enable this feature', '2021-01-26 12:44:10', '2021-01-26 12:44:10'),
(2422, 'en', 'Twitter login', 'Twitter login', '2021-01-26 12:44:11', '2021-01-26 12:44:11'),
(2423, 'en', 'You need to configure Twitter Client correctly to enable this feature', 'You need to configure Twitter Client correctly to enable this feature', '2021-01-26 12:44:11', '2021-01-26 12:44:11'),
(2424, 'en', 'Pickup Point Information', 'Pickup Point Information', '2021-01-26 12:44:43', '2021-01-26 12:44:43'),
(2425, 'en', 'Pickup Point Status', 'Pickup Point Status', '2021-01-26 12:44:43', '2021-01-26 12:44:43'),
(2426, 'en', 'Pick-up Point Manager', 'Pick-up Point Manager', '2021-01-26 12:44:43', '2021-01-26 12:44:43'),
(2427, 'en', 'Staff Information', 'Staff Information', '2021-01-26 12:47:16', '2021-01-26 12:47:16'),
(2428, 'en', 'Staff has been inserted successfully', 'Staff has been inserted successfully', '2021-01-26 12:48:21', '2021-01-26 12:48:21'),
(2429, 'en', 'PicupPoint has been inserted successfully', 'PicupPoint has been inserted successfully', '2021-01-26 12:48:59', '2021-01-26 12:48:59'),
(2430, 'en', 'Payment completed', 'Payment completed', '2021-01-26 12:50:54', '2021-01-26 12:50:54'),
(2431, 'en', 'Pickip Point', 'Pickip Point', '2021-01-26 12:50:54', '2021-01-26 12:50:54'),
(2432, 'en', 'Role Information', 'Role Information', '2021-01-26 12:52:49', '2021-01-26 12:52:49'),
(2433, 'en', 'Permissions', 'Permissions', '2021-01-26 12:52:49', '2021-01-26 12:52:49'),
(2434, 'en', 'Role has been updated successfully', 'Role has been updated successfully', '2021-01-26 12:52:54', '2021-01-26 12:52:54'),
(2435, 'en', 'Server information', 'Server information', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2436, 'en', 'Current Version', 'Current Version', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2437, 'en', 'Required Version', 'Required Version', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2438, 'en', 'php.ini Config', 'php.ini Config', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2439, 'en', 'Config Name', 'Config Name', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2440, 'en', 'Current', 'Current', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2441, 'en', 'Recommended', 'Recommended', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2442, 'en', 'Extensions information', 'Extensions information', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2443, 'en', 'Extension Name', 'Extension Name', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2444, 'en', 'Filesystem Permissions', 'Filesystem Permissions', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2445, 'en', 'File or Folder', 'File or Folder', '2021-01-26 12:54:25', '2021-01-26 12:54:25'),
(2446, 'en', 'Step 1', 'Step 1', '2021-01-26 12:55:55', '2021-01-26 12:55:55'),
(2447, 'en', 'Download the skeleton file and fill it with proper data', 'Download the skeleton file and fill it with proper data', '2021-01-26 12:55:55', '2021-01-26 12:55:55'),
(2448, 'en', 'You can download the example file to understand how the data must be filled', 'You can download the example file to understand how the data must be filled', '2021-01-26 12:55:55', '2021-01-26 12:55:55'),
(2449, 'en', 'Once you have downloaded and filled the skeleton file, upload it in the form below and submit', 'Once you have downloaded and filled the skeleton file, upload it in the form below and submit', '2021-01-26 12:55:55', '2021-01-26 12:55:55'),
(2450, 'en', 'After uploading products you need to edit them and set product\'s images and choices', 'After uploading products you need to edit them and set product\'s images and choices', '2021-01-26 12:55:56', '2021-01-26 12:55:56'),
(2451, 'en', 'Step 2', 'Step 2', '2021-01-26 12:55:56', '2021-01-26 12:55:56'),
(2452, 'en', 'Category and Brand should be in numerical id', 'Category and Brand should be in numerical id', '2021-01-26 12:55:56', '2021-01-26 12:55:56'),
(2453, 'en', 'You can download the pdf to get Category and Brand id', 'You can download the pdf to get Category and Brand id', '2021-01-26 12:55:56', '2021-01-26 12:55:56'),
(2454, 'en', 'Upload Product File', 'Upload Product File', '2021-01-26 12:55:56', '2021-01-26 12:55:56'),
(2455, 'en', 'Support Desk', 'Support Desk', '2021-01-26 12:57:37', '2021-01-26 12:57:37'),
(2456, 'en', 'Type ticket code & Enter', 'Type ticket code & Enter', '2021-01-26 12:57:37', '2021-01-26 12:57:37'),
(2457, 'en', 'User', 'User', '2021-01-26 12:57:37', '2021-01-26 12:57:37'),
(2458, 'en', 'Last reply', 'Last reply', '2021-01-26 12:57:37', '2021-01-26 12:57:37'),
(2459, 'en', 'Facebook Pixel Setting', 'Facebook Pixel Setting', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2460, 'en', 'Facebook Pixel', 'Facebook Pixel', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2461, 'en', 'Facebook Pixel ID', 'Facebook Pixel ID', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2462, 'en', 'Please be carefull when you are configuring Facebook pixel.', 'Please be carefull when you are configuring Facebook pixel.', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2463, 'en', 'Log in to Facebook and go to your Ads Manager account', 'Log in to Facebook and go to your Ads Manager account', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2464, 'en', 'Open the Navigation Bar and select Events Manager', 'Open the Navigation Bar and select Events Manager', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2465, 'en', 'Copy your Pixel ID from underneath your Site Name and paste the number into Facebook Pixel ID field', 'Copy your Pixel ID from underneath your Site Name and paste the number into Facebook Pixel ID field', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2466, 'en', 'Google Analytics Setting', 'Google Analytics Setting', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2467, 'en', 'Google Analytics', 'Google Analytics', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2468, 'en', 'Tracking ID', 'Tracking ID', '2021-01-26 13:00:40', '2021-01-26 13:00:40'),
(2469, 'en', 'Brand has been inserted successfully', 'Brand has been inserted successfully', '2021-01-27 04:29:24', '2021-01-27 04:29:24'),
(2470, 'en', 'Brand Information', 'Brand Information', '2021-01-27 04:30:31', '2021-01-27 04:30:31'),
(2471, 'en', 'Brand has been updated successfully', 'Brand has been updated successfully', '2021-01-27 04:30:43', '2021-01-27 04:30:43'),
(2472, 'en', 'Category has been updated successfully', 'Category has been updated successfully', '2021-01-27 04:34:00', '2021-01-27 04:34:00'),
(2473, 'en', 'Category has been deleted successfully', 'Category has been deleted successfully', '2021-01-27 05:15:37', '2021-01-27 05:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `file_original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `extension` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file_original_name`, `file_name`, `user_id`, `file_size`, `extension`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'woman', 'uploads/all/oegOezW9kZp3WRxjemmdoPKdujSE0g27frqQNrm7.png', 9, 21064, 'png', 'image', '2021-01-23 02:40:24', '2021-01-23 02:40:24', NULL),
(2, 'banner1', 'uploads/all/bB2lq1w2LERP41MvsnKG3BFYFiJp4hUoAAl2DzY0.jpg', 9, 198336, 'jpg', 'image', '2021-01-23 02:56:53', '2021-01-23 02:56:53', NULL),
(3, 'baner2', 'uploads/all/RyIL05E9V6jpxCuxQ3biWbz9qfSpiQUwbuBcpCwE.png', 9, 214287, 'png', 'image', '2021-01-23 03:05:12', '2021-01-23 03:05:12', NULL),
(4, 'middlee', 'uploads/all/lodoAkikUWjS1tlERGA7bcmnELIXuuAlhd7v58Fs.png', 9, 75027, 'png', 'image', '2021-01-23 03:10:19', '2021-01-23 03:10:19', NULL),
(5, 'middle3', 'uploads/all/MgwdyoNroykpr4CDS9ImNkh7JI3nt56VVB5q1TlJ.png', 9, 48805, 'png', 'image', '2021-01-23 03:14:27', '2021-01-23 03:14:27', NULL),
(6, 'cat1', 'uploads/all/vm0vrzhEQyxObzC11mlrGJCIGPH09jm03dNx8EN4.jpg', 9, 11447, 'jpeg', 'image', '2021-01-23 03:17:51', '2021-01-23 03:17:51', NULL),
(7, 'cat3', 'uploads/all/NSczpJBMCS1pJBjWL4zO1tKDEDBpWrLfT1jFYzUa.jpg', 9, 4330, 'jpeg', 'image', '2021-01-23 03:17:51', '2021-01-23 03:17:51', NULL),
(8, 'cat2', 'uploads/all/KPysQYve7Ck9DgzcZXTJSr97Ujw4UAfUx5T8bPYZ.jpg', 9, 5461, 'jpeg', 'image', '2021-01-23 03:17:51', '2021-01-23 03:17:51', NULL),
(9, '378cd4ea61758d6e802d4612b9c76583', 'uploads/all/NgBVcfMNf9lHZZaidMz6jOpLPxEJRjdR7xyQjUKx.jpg', 9, 70081, 'jpg', 'image', '2021-01-24 00:56:26', '2021-01-24 00:56:26', NULL),
(10, '52e8125d4c84633dec4de2625f3ddabb', 'uploads/all/wj3VpUBwaU01RcpzWxJHYnmEkqWl16GoaEiJTr4H.jpg', 9, 410867, 'jpg', 'image', '2021-01-24 01:06:03', '2021-01-24 01:06:03', NULL),
(11, 'x2_1024x1024', 'uploads/all/uSeHiTE79g4otK3esIv6ULxOKFQnq5tbDqpU2Ueu.jpg', 9, 29117, 'jpg', 'image', '2021-01-24 01:08:50', '2021-01-24 01:08:50', NULL),
(12, 'x1_1024x1024', 'uploads/all/ZGHmVdQQ9Hwa3bugod0PG5flXYcOJ80OWSMbyMs3.jpg', 9, 26465, 'jpg', 'image', '2021-01-24 01:08:51', '2021-01-24 01:08:51', NULL),
(13, 'x3_1024x1024', 'uploads/all/WRbs3WZeK1SEUhte7SG8goccnclB1ulc1R0izZPi.jpg', 9, 30483, 'jpg', 'image', '2021-01-24 01:08:51', '2021-01-24 01:08:51', NULL),
(14, 'IMG_20190608_155656', 'uploads/all/Sh9LZHygtKqNXN1SiRCWyY47OUMu84k0J206UypL.jpg', 10, 6164533, 'jpg', 'image', '2021-01-24 03:15:29', '2021-01-24 04:38:39', '2021-01-24 04:38:39'),
(15, 'IMG_2835', 'uploads/all/EJaXTclqDNGHL30Lp8bTkuLuO9hGscell3eKd9k2.jpg', 10, 1231414, 'jpg', 'image', '2021-01-24 03:16:45', '2021-01-24 03:16:45', NULL),
(16, 'tKwuv9FoPFhcexE4657dc8alZFpj3YteibX8Fa1B', 'uploads/all/8Ch9WG5cvl6CvOC979XDdcx8K89zObeZQ3iFfaOs.jpg', 9, 13671, 'jpeg', 'image', '2021-01-24 05:17:21', '2021-01-24 05:17:21', NULL),
(17, '20160626_160246', 'uploads/all/Wxk6pck2Rf4vd4zMbuZIT7Lfp0u40UXr2bgj1fTB.jpg', 9, 1661033, 'jpg', 'image', '2021-01-24 05:33:01', '2021-01-24 05:33:01', NULL),
(18, '20160626_155907', 'uploads/all/fwRvqmJFWVOIE5eTYJjTITE6uqbtUOpCOWJ1TPUf.jpg', 9, 1140053, 'jpg', 'image', '2021-01-24 05:33:40', '2021-01-24 05:33:40', NULL),
(19, 'IMG_20160626_114019106', 'uploads/all/g0EnVgd6ndHD1GGN289h5i5vfOGsF1zgKZkI4r6U.jpg', 9, 719855, 'jpg', 'image', '2021-01-24 05:34:19', '2021-01-24 05:34:19', NULL),
(20, 'B612_20190816_091734_673', 'uploads/all/2FLBK8Svcr8JDxu8eiS4b19zx2QGYH7ELFqR1RzD.jpg', 9, 924929, 'jpg', 'image', '2021-01-24 05:35:29', '2021-01-24 05:35:29', NULL),
(21, 'B612_20190903_152359_028', 'uploads/all/ZMd8WZ6fdjtajhcpU5RWtA4QxhPgUHayCLKn0gcr.jpg', 9, 822845, 'jpg', 'image', '2021-01-24 05:36:06', '2021-01-24 05:36:06', NULL),
(22, 'B612_20191002_130804_678', 'uploads/all/5kGJW1TvtQz8d9IOsOKWWJNmlpec5MfVf64FVM0z.jpg', 9, 773051, 'jpg', 'image', '2021-01-24 05:36:23', '2021-01-24 05:36:23', NULL),
(23, 'B612_20191029_155354_467', 'uploads/all/qqJEdVbGdzqggsbIZqRT48LLmPuxr38JDtTBeK1R.jpg', 9, 601019, 'jpg', 'image', '2021-01-24 05:36:54', '2021-01-24 05:36:54', NULL),
(24, 'B612_20190816_092023_705', 'uploads/all/yJKoYuTasjNJQHmLFiHiRYrlbr4jAFWUC6FEh1fC.jpg', 9, 879280, 'jpg', 'image', '2021-01-24 05:37:21', '2021-01-24 05:37:21', NULL),
(25, 'B612_20190717_182102_372', 'uploads/all/Vlv0KzwMHYYY3ZAUNsJwfny80tvWVKYTc8gMMV0w.jpg', 9, 1038551, 'jpg', 'image', '2021-01-24 05:37:32', '2021-01-24 05:37:32', NULL),
(26, 'IMG_20160815_182404327', 'uploads/all/WTQzRSABu3JNzl5ovmOo37K2b3Pzg2lEWGxupgx0.jpg', 9, 515772, 'jpg', 'image', '2021-01-24 05:38:38', '2021-01-24 05:38:38', NULL),
(27, 'ramadan-sale-banner-template-design-background_7087-667', 'uploads/all/mHZW3XO8jE2Ylh7dI561MsN3gXP3hPCArecbLZ39.jpg', 9, 74547, 'jpg', 'image', '2021-01-24 06:09:52', '2021-01-24 06:09:52', NULL),
(28, 'islamic-holy-month-ramadan-sale-banner-decorated-with-glowing-hanging-lamps-beautiful-floral-design_1302-5796', 'uploads/all/nH8hen5xe2dzMaQJf5OgHKJjPfkVtVAhAbCyWykl.jpg', 9, 41002, 'jpg', 'image', '2021-01-24 06:09:52', '2021-01-24 06:09:52', NULL),
(29, 'rsz_19107', 'uploads/all/o9pImVPDd95v2yiSsCzMG4JKCZYcr0ASXmctGePE.jpg', 9, 151171, 'jpg', 'image', '2021-01-24 06:19:35', '2021-01-24 06:19:35', NULL),
(30, 'hp', 'uploads/all/kQwaJlCoaQdNaBWE8EW7XXKne4YMlYGIihR1Y5x1.png', 9, 12622, 'png', 'image', '2021-01-24 23:26:22', '2021-01-24 23:26:22', NULL),
(31, 'Capture-removebg-preview', 'uploads/all/RVwWvfoayBBrSJCCzRgd0GNA5AdQPaJ5hxrF4cgh.png', 9, 39809, 'png', 'image', '2021-01-24 23:26:22', '2021-01-24 23:26:22', NULL),
(32, '1200px-Viewsonic_logo.svg-removebg-preview', 'uploads/all/OmzGKVRp6jdI9fi1zicTWOMh9A8zVaFqtkQhkkGx.png', 9, 242157, 'png', 'image', '2021-01-24 23:26:22', '2021-01-24 23:26:22', NULL),
(33, 'download-removebg-preview', 'uploads/all/4Sy8NahGLaVN2bNBEUUVPZzMXxznV13edNUADIoz.png', 9, 10027, 'png', 'image', '2021-01-24 23:26:22', '2021-01-24 23:26:22', NULL),
(34, '580b57fcd9996e24bc43c533', 'uploads/all/H8XpsUddizJ2fiAyUoboRXI5UD4mrwGCpoi9owB0.png', 9, 27090, 'png', 'image', '2021-01-24 23:26:22', '2021-01-24 23:26:22', NULL),
(35, 'campro_logo-250x250-removebg-preview', 'uploads/all/zM6qhMhdzF66DXrzm4quxbkUkeu1l8ZLSD0h8gWg.png', 9, 23455, 'png', 'image', '2021-01-24 23:26:22', '2021-01-24 23:26:22', NULL),
(36, 'hundure-600x315', 'uploads/all/jKOmLVcLa0WrN8rm0X2aFNIbZbCo2JrLSMT7Lpny.png', 9, 15377, 'png', 'image', '2021-01-24 23:26:22', '2021-01-24 23:26:22', NULL),
(37, 'kisspng-supporters-centre-for-urban-energy-ryerson-uni-5b62e443bb66f3.9575047815332076197676-removebg-preview', 'uploads/all/Q5OomhGim9cZY7SyepD44zx4Y60PU61f5M7elQqT.png', 9, 73455, 'png', 'image', '2021-01-24 23:26:22', '2021-01-24 23:26:22', NULL),
(38, 'maxresdefault-removebg-preview', 'uploads/all/9gwSjRtuVPVtvtOEKgfTZtb6VGsItiSVV1rsDNZJ.png', 9, 71877, 'png', 'image', '2021-01-24 23:26:23', '2021-01-24 23:26:23', NULL),
(39, 'unnamed-removebg-preview', 'uploads/all/36qxW1BDL3Tv0g4stN701w7aQXdgkiqUccYolZlx.png', 9, 35707, 'png', 'image', '2021-01-24 23:26:23', '2021-01-24 23:26:23', NULL),
(40, '2-24676_samsung-logo-transparent-image-samsung-foundry-logo-hd-removebg-preview', 'uploads/all/QepWeRNgfvZcTrIGHRSXklawK2xGeTgcXLLGg3fg.png', 9, 43986, 'png', 'image', '2021-01-24 23:41:08', '2021-01-24 23:41:08', NULL),
(41, '1554727915375', 'uploads/all/IjRfeAwjPGi7OJ7WoQcWrkvBONrh5XRG8KgxoxtU.jpg', 9, 253386, 'jpg', 'image', '2021-01-25 00:24:02', '2021-01-25 00:24:02', NULL),
(42, 'banner2', 'uploads/all/iCADfTkNBqpRPcvq8oNt5nHHZCN2vJwFeZZAT5mi.jpg', 9, 502317, 'jpg', 'image', '2021-01-25 00:24:02', '2021-01-25 00:24:02', NULL),
(43, '21', 'uploads/all/pKugwznj9ED1gV71RF4cQuqjRnkoNnKzwBDordeB.jpg', 9, 77099, 'jpg', 'image', '2021-01-25 00:24:02', '2021-01-25 00:24:02', NULL),
(44, 'manitor_banner', 'uploads/all/F1RROqHiS9QR2JkTR3HMcfUGStlqeTL2XLM2Cbjy.jpg', 9, 109360, 'jpg', 'image', '2021-01-25 00:24:02', '2021-01-25 00:24:02', NULL),
(45, 'banner-0', 'uploads/all/7Oc8TFXJsVKgFa0Olrch38SLDPF8BhjbkSi0qLcp.jpg', 9, 76670, 'jpg', 'image', '2021-01-25 00:24:02', '2021-01-25 00:24:02', NULL),
(46, '1Comp_Accessories_Banner_1350x_b25e1bbd-f223-44ec-bc3e-56f825db3f26_1350x398', 'uploads/all/jXH9Ad0PjWBHYN9FLT6OR5MRPF5ekvyex7pLSmAc.jpg', 9, 119006, 'jpg', 'image', '2021-01-25 00:24:03', '2021-01-25 00:24:03', NULL),
(47, 'pngtree-atmospheric-black-geometric-laptop-banner-background-image_191784', 'uploads/all/Ajwa13w3EchlqAkTkwKoxtVz7yW6u3CIQOGg1zUr.jpg', 9, 689049, 'jpg', 'image', '2021-01-25 00:24:03', '2021-01-25 00:24:03', NULL),
(48, 'products-banner', 'uploads/all/ey5Tmm7DtCu9LOE9Z7XZOVkCIYAj5iC9x6Ip4Lts.jpg', 9, 65401, 'jpg', 'image', '2021-01-25 00:24:03', '2021-01-25 00:24:03', NULL),
(49, 'Time-Attendance-banner', 'uploads/all/CKIpweZbj4vU1Yv4Jrbdn13rXTJR1b1CfEqYGz5x.jpg', 9, 102446, 'jpg', 'image', '2021-01-25 00:24:03', '2021-01-25 00:24:03', NULL),
(50, 'Voltage Stabilizer', 'uploads/all/LuwIwTBNhi1Ock4BEqR1juI7xbC0WoeJARpYVLLa.png', 9, 52775, 'png', 'image', '2021-01-25 00:43:38', '2021-01-25 00:43:38', NULL),
(51, 'cctv2', 'uploads/all/AsUSNWGtopjURor5S1HuKJLhrmfft5U3eEvolwSb.png', 9, 42104, 'png', 'image', '2021-01-25 01:29:44', '2021-01-25 01:29:44', NULL),
(52, 'fingerprint-biome', 'uploads/all/00PSJpwqxJvhhcYWvT2Lf1tmOx2TyA5eOMXdui9b.png', 9, 22866, 'png', 'image', '2021-01-25 01:29:44', '2021-01-25 01:29:44', NULL),
(53, 'cctv', 'uploads/all/MTBUJEz9uI8C230wVgE6Jj1jDHu2hLHezlp7ZQCO.png', 9, 49592, 'png', 'image', '2021-01-25 01:29:44', '2021-01-25 01:29:44', NULL),
(54, 'fg', 'uploads/all/HOiioKDlNGoS24LN9Cr7xDjR4Svrg4LJ1Rowmh9M.png', 9, 58430, 'png', 'image', '2021-01-25 01:29:44', '2021-01-25 01:29:44', NULL),
(55, 'laptop', 'uploads/all/tEENdeVxSwNzongruvisdEL2SQFIH3NXxEFRGgc9.png', 9, 30263, 'png', 'image', '2021-01-25 01:29:45', '2021-01-25 01:29:45', NULL),
(56, 'it equipment', 'uploads/all/MUhh2JIYbwSJUoTPJsedUYrrp9RpLXNxF2IGPUWz.png', 9, 68726, 'png', 'image', '2021-01-25 01:29:45', '2021-01-25 01:29:45', NULL),
(57, 'laptop2', 'uploads/all/vcD1ze5yfrhHZs9SVr4n6tWencX2TrtOun91bz9U.png', 9, 24629, 'png', 'image', '2021-01-25 01:29:45', '2021-01-25 01:29:45', NULL),
(58, 'monitor', 'uploads/all/DMkQ1tMiPH03cv8cgHFzraAckdZq3ge14726iddt.png', 9, 35980, 'png', 'image', '2021-01-25 01:29:45', '2021-01-25 01:29:45', NULL),
(59, 'screen accessories', 'uploads/all/sX1mzV6gwhaJtVXExX7N9KhbtqBomBJUv68xN9Ih.png', 9, 37299, 'png', 'image', '2021-01-25 01:29:45', '2021-01-25 01:29:45', NULL),
(60, 'multimedia-projectors-', 'uploads/all/tnq5Tgo06endVfp3JD4kzhgyhroaEp0hjcya8J7r.png', 9, 27038, 'png', 'image', '2021-01-25 01:29:45', '2021-01-25 01:29:45', NULL),
(61, 'ups ips', 'uploads/all/ZUo2KDEX5adlOZCBib2EmjNU3pe0fkogulmpPaPv.png', 9, 32965, 'png', 'image', '2021-01-25 01:29:45', '2021-01-25 01:29:45', NULL),
(62, 'Voltage Stabilizer', 'uploads/all/9rStbXrrjsHK4DGmUD4RrhdwNEuhWJt2CenJTPRR.png', 9, 52775, 'png', 'image', '2021-01-25 01:29:45', '2021-01-25 01:29:45', NULL),
(63, '1-15253_monitor-transparent-lcd-cheap-bezel-less-monitor-hd-removebg-preview', 'uploads/all/SzFuSwYOgJiYJ9uRrgyig7CErgY7Cf5wLzRsaFTB.png', 9, 189012, 'png', 'image', '2021-01-25 01:49:20', '2021-01-25 01:49:20', NULL),
(64, 'IMG_0628-984x492-removebg-preview', 'uploads/all/rVvRMrcXMQmjDkJzasQwdYiamE2cf3zVFj1yfiPp.png', 9, 181410, 'png', 'image', '2021-01-25 02:56:49', '2021-01-25 02:56:49', NULL),
(65, 'WVP-JV200-364x364', 'uploads/all/LOkkoabiiN4y83c5AAdK78OTyzBfjVcOLKJbM8VN.png', 9, 75914, 'png', 'image', '2021-01-25 03:04:33', '2021-01-25 03:04:33', NULL),
(66, 'technology-equipment', 'uploads/all/emRmefItnPeHuxKJZ4TDGXk2B30YM4M55ScaS032.jpg', 9, 62835, 'jpg', 'image', '2021-01-25 03:15:01', '2021-01-25 03:15:01', NULL),
(67, 'technology-equipment-removebg-preview', 'uploads/all/MKNn3UuKCknPBHwuTh7U4ggGGi8LrwEc2nWCB5vw.png', 9, 272573, 'png', 'image', '2021-01-25 03:15:46', '2021-01-25 03:15:46', NULL),
(68, 'dighlth-removebg-preview', 'uploads/all/nc1oHAAGJMifg1haEQMlYGL2vK8S2Y60YhlHQOPb.png', 9, 210865, 'png', 'image', '2021-01-25 03:18:27', '2021-01-25 03:18:27', NULL),
(69, '251-2515782_laptop-services-pc-services-asus-zenbook-ux360ua-c4153t', 'uploads/all/snTZ9WgRW5jhk9NDz8TbC3IhOh9NLCV6evwNYfIK.jpg', 9, 144658, 'png', 'image', '2021-01-25 03:22:55', '2021-01-25 03:22:55', NULL),
(70, '251-2515782_laptop-services-pc-services-asus-zenbook-ux360ua-c4153t-removebg-preview', 'uploads/all/zySeXdOGWHbVY6Xt2fcSkpQLRMRkP42MeOeD6qns.png', 9, 223155, 'png', 'image', '2021-01-25 03:25:23', '2021-01-25 03:25:23', NULL),
(71, '168-1682331_windows-laptop-pc-repair-windows-10-pro-pc-removebg-preview', 'uploads/all/4pcc9CX33EqpdatD925ZmyPvrPrxO9momHFZwLQp.png', 9, 259644, 'png', 'image', '2021-01-25 03:25:23', '2021-01-25 03:25:23', NULL),
(72, '304d15f8cb5a48eb9da582ed9af6fd5e-removebg-preview', 'uploads/all/WevBjKagMAZXWIZ3IDmSCSZzeVPzMSeURwJuu0S7.png', 9, 147927, 'png', 'image', '2021-01-25 03:29:32', '2021-01-25 03:29:32', NULL),
(73, '304d15f8cb5a48eb9da582ed9af6fd5e-removebg-preview', 'uploads/all/F7ZjsDM3mKJPx05EG4ewhvvHV6xNvaUDf3RWVRoD.png', 9, 147927, 'png', 'image', '2021-01-25 03:34:42', '2021-01-25 03:34:42', NULL),
(74, '61dSOedDIfL._SL1070_', 'uploads/all/9tP1VfoVgBkRNLA43kZOsDQppIa62Cct74KOaLyO.jpg', 9, 65567, 'jpg', 'image', '2021-01-25 03:34:52', '2021-01-25 03:34:52', NULL),
(75, 'RD803-Professional-HD-Multimedia-Classroom-Projector', 'uploads/all/ELBIvxMo66tf5TlhkiMtXUHpsV2xZAa4t3FryXod.jpg', 9, 20721, 'jpg', 'image', '2021-01-25 03:40:44', '2021-01-25 03:40:44', NULL),
(76, 'CCTV-Analog-IP-Biometric-Burglar-Intrusion-Video-Phone-Door-Lock-Fire-Alarm-Systems-Desktop-Laptop-Printers-sales-Services1-1-removebg-preview', 'uploads/all/Lh8d8q95L0Uh02GQGOu1tEZBeUCoGuOv1HRe8KpS.png', 9, 229711, 'png', 'image', '2021-01-25 03:47:47', '2021-01-25 03:47:47', NULL),
(77, 'Lumen-Projejector-Stretch-600x400-removebg-preview', 'uploads/all/KXhVRYM3NFiW8vKP5JISISgVhOIs2JWRc2EFvsTk.png', 9, 83441, 'png', 'image', '2021-01-25 03:52:15', '2021-01-25 03:52:15', NULL),
(78, 'Modem-and-router-units.jpg--removebg-preview', 'uploads/all/EiJNXmwWloXiA9rWyLQW39KKYC6HXoyOV6LxVA5G.png', 9, 100362, 'png', 'image', '2021-01-25 04:10:50', '2021-01-25 04:10:50', NULL),
(79, 'network-router-icon-16', 'uploads/all/tAwMiwOYcE7RHzD1fPf8hSUqzLYfhihd7hgGDMwG.png', 9, 19634, 'jpg', 'image', '2021-01-25 04:12:28', '2021-01-25 04:12:28', NULL),
(80, 'unnamed', 'uploads/all/kT2fXOyPHw90V7GWuUsOQJPrxQlErTCnDVEH5pwa.jpg', 9, 14775, 'jpg', 'image', '2021-01-25 04:15:58', '2021-01-25 04:15:58', NULL),
(81, 'gsfg', 'uploads/all/p36L0pBubGJhSzDE0dVSDBNzAU5D0xVKuPA23jFG.png', 9, 32058, 'png', 'image', '2021-01-25 04:21:49', '2021-01-25 04:21:49', NULL),
(82, 'logo', 'uploads/all/OSAoXy0mmRcV8XTE6XE5u7XBDzzTQbl7xKGxbpZx.png', 9, 9130, 'png', 'image', '2021-01-25 04:27:25', '2021-01-25 04:27:25', NULL),
(83, 'tjdtjtf', 'uploads/all/PHtWMresiGD71kfVYvXtr4DELEhx0BzQfVyWIjlN.png', 9, 10734, 'png', 'image', '2021-01-25 04:28:20', '2021-01-25 04:28:20', NULL),
(84, 'sample-4', 'uploads/all/PVWHmVdcCvZXcOtAiFQVuZxRtEfQmPkRrxdKHMxO.jpg', 9, 88605, 'jpg', 'image', '2021-01-25 04:35:59', '2021-01-25 04:35:59', NULL),
(85, 'sample-3', 'uploads/all/uBmD60dcqZAPUOOzyJ8yhhFMLAsKo0Ncnd1sgZ7A.jpg', 9, 32625, 'jpg', 'image', '2021-01-25 04:36:26', '2021-01-25 04:36:26', NULL),
(86, 'it-solutions', 'uploads/all/R4zPmiiAN9SIUgylHOhjKAFN17oY98KZeupwlnmK.png', 9, 20140, 'png', 'image', '2021-01-25 04:44:29', '2021-01-25 04:44:29', NULL),
(87, 'software-92-622478-removebg-preview', 'uploads/all/c4V9RTDBsk7Yme400HJKUMYNG3Muw1ic2lg0pzAR.png', 9, 37325, 'png', 'image', '2021-01-25 04:48:39', '2021-01-25 04:48:39', NULL),
(88, 'Acer_Monitor_EK2-series_EK222Q_modelmain', 'uploads/all/XRSIakNId23pdouIPAUzW9HXcNbuVKDMMLVsxVdA.jpg', 9, 58793, 'jpg', 'image', '2021-01-25 22:16:49', '2021-01-25 22:16:49', NULL),
(89, 'acer-et221q-22-inch-ips-monitor-500x500', 'uploads/all/G4ArvzgMcjY2RXEZA6kBmiakNWukszGzyDQT5ycm.png', 9, 115181, 'png', 'image', '2021-01-25 22:16:49', '2021-01-25 22:16:49', NULL),
(90, 'c012a2bc7fe0b2565b0c2fb792e01234', 'uploads/all/7nAaL2iyLGpwGW22gZpNHU3GhYIqmlkAf2j7RsVG.jpg', 9, 47373, 'jpg', 'image', '2021-01-25 22:16:49', '2021-01-25 22:16:49', NULL),
(91, '6894', 'uploads/all/tYnLr7EMMpBYZUMsnJKBul80BwEewhbzeohX7LFI.png', 9, 850299, 'jpg', 'image', '2021-01-25 22:18:33', '2021-01-25 22:18:33', NULL),
(92, 'orient_logo', 'uploads/all/EnNi3gcDMCyRnzJw65V8gvWv47IxdDWX6sdBVrbO.png', 9, 10085, 'png', 'image', '2021-01-25 23:30:17', '2021-01-25 23:30:17', NULL),
(93, 'g227hql-2-500x500', 'uploads/all/S75lrpMSJGIC16eIMtYQOW0QONiA4xJ82z3mD2pR.jpg', 9, 31531, 'jpg', 'image', '2021-01-25 23:41:27', '2021-01-25 23:41:27', NULL),
(94, 'g227hql-3-500x500', 'uploads/all/9T1gPLtcu957ydxIZjz5eGtiAzmxWWARKVucbsht.jpg', 9, 34992, 'jpg', 'image', '2021-01-25 23:41:27', '2021-01-25 23:41:27', NULL),
(95, 'g227hql-1-500x500', 'uploads/all/x4mU3J3QKpqWdL4iMntV63g6DhMtUceFtP1UQsin.jpg', 9, 75958, 'jpg', 'image', '2021-01-25 23:41:27', '2021-01-25 23:41:27', NULL),
(96, 'favicon-orient', 'uploads/all/zStod4qx0RToURviAFoGMbrhok2cd56Ut6oSegh3.png', 9, 615, 'png', 'image', '2021-01-25 23:44:26', '2021-01-25 23:44:26', NULL),
(97, '617UzfQuGpL._AC_SX679_', 'uploads/all/8Tr0GVYaWPmz5B1PNTPST9VloXCPDmbENexRUX6z.jpg', 9, 58060, 'jpg', 'image', '2021-01-25 23:46:32', '2021-01-25 23:46:32', NULL),
(98, 'hd-cctv-camera-500x500', 'uploads/all/elkNazEV9zHs2EPhBUun9NfM6wJ6cBSej6on60lS.jpg', 9, 20005, 'jpg', 'image', '2021-01-26 01:17:32', '2021-01-26 01:17:32', NULL),
(99, 'unnamed', 'uploads/all/NMahYgjuELO5LJ7I0ZuO7OzedvCHBpWOvFjzrenB.jpg', 9, 21324, 'jpg', 'image', '2021-01-26 01:17:32', '2021-01-26 01:17:32', NULL),
(100, 'hd-outdoor-cctv-camera-500x500', 'uploads/all/pLNrwHOc0C6wDcMhiBK7ZIh7kycK9I2XkaPhfppk.jpg', 9, 29689, 'jpg', 'image', '2021-01-26 01:17:32', '2021-01-26 01:17:32', NULL),
(101, '495-4958736_hikvision-colour-camera-cctv-hd-png-download', 'uploads/all/iO3YSKEap1s2jTjXMmztXgHAcBKbQ6eqORvD3eIF.png', 9, 309921, 'png', 'image', '2021-01-26 01:17:43', '2021-01-26 01:17:43', NULL),
(102, 'Mortuza Minhaz', 'uploads/all/nuIlGOT9PLcD95Fi9zBqb1oy0u5iCNRzwdD4CEuO.pdf', 9, 36222, 'pdf', 'document', '2021-01-26 01:44:42', '2021-01-26 01:44:42', NULL),
(103, 'payvia', 'uploads/all/ARDJvMpqFVpHp8F6cGS8yUQbbgszxRkn09kZ5QxB.png', 9, 22577, 'png', 'image', '2021-01-26 01:51:44', '2021-01-26 01:51:44', NULL),
(104, 'WiFi-Camera-1080P-Wireless-Portable-Security-Camera-Magnetic-Small-Home-Cam-with-Motion-Detection-and-Night', 'uploads/all/ppHzQAqlfEzLON8fk5ig2ZG9AgDlzLBC35VIR77Y.jpg', 9, 58932, 'jpg', 'image', '2021-01-26 01:55:58', '2021-01-26 01:55:58', NULL),
(105, '3ee24698a71f6e26d034f56e48708696', 'uploads/all/k4WikWpOaObtCozNjYW0whIGGq56O4H3ossG1LWs.jpg', 9, 73751, 'jpg', 'image', '2021-01-26 01:57:13', '2021-01-26 01:57:13', NULL),
(106, '61vcY86LkIL._AC_SL1500_', 'uploads/all/8zTuJNqbpImBuJ0yNIMvojPYKQkErkcP4leu2qw3.jpg', 9, 86450, 'jpg', 'image', '2021-01-26 01:57:13', '2021-01-26 01:57:13', NULL),
(107, 'Best-Seller-Mini-Spy-Camera-WiFi-Hidden-Camera-Wireless-HD-1080P-Indoor-Home-Small-Spy-Cam-Security', 'uploads/all/l6VSTGu34LsyoR0sd6fFk7iBh4t01caR9DqCysz9.jpg', 9, 22121, 'jpg', 'image', '2021-01-26 01:57:13', '2021-01-26 01:57:13', NULL),
(108, '61j4acmknmL._AC_SL1500_', 'uploads/all/8GjL7rvNhKiRLnbtDWurxN1dEqQdMYCFtNWiAmOd.jpg', 9, 52714, 'jpg', 'image', '2021-01-26 02:07:11', '2021-01-26 02:07:11', NULL),
(109, '579-5798825_dji-mavic-2-pro-drone-top-view-dji', 'uploads/all/19a2uktCx1A02mBJoXn2QilpXWSvJKQZap5ZeJL6.png', 9, 84168, 'png', 'image', '2021-01-26 02:07:11', '2021-01-26 02:07:11', NULL),
(110, 'landscape-photography-mavic-2-1', 'uploads/all/pYoVdjFgrHRMWyFW9CWSe3Ds2hapLPx6umcDe5Ja.jpg', 9, 93556, 'jpg', 'image', '2021-01-26 02:07:11', '2021-01-26 02:07:11', NULL),
(111, 'dji-mavic-2-zoom-high-res-leak', 'uploads/all/gs4zSVFo2yhdQMzYEqsMdmADdAkQbcAaYbkajigj.jpg', 9, 98067, 'jpg', 'image', '2021-01-26 02:07:22', '2021-01-26 02:07:22', NULL),
(112, 'dfdf', 'uploads/all/yY90y2kHHoG1WMKqxT1mDaf7is8OLnsoyBSBhLyO.jpg', 9, 27085, 'jpg', 'image', '2021-01-26 02:15:29', '2021-01-26 02:15:29', NULL),
(113, '495-4958736_hikvision-colour-camera-cctv-hd-png-download', 'uploads/all/ZyOECVUBNHrauA1BmWmxrmrRTQ6mqPEuExVE9cmD.jpg', 9, 60620, 'jpg', 'image', '2021-01-26 02:16:08', '2021-01-26 02:16:08', NULL),
(114, '4K-F88__18983.1573546889', 'uploads/all/6xrLjTUqvtCXie2knAkRng1CYurcgq2KymboynAJ.jpg', 9, 69706, 'jpg', 'image', '2021-01-26 09:33:43', '2021-01-26 09:33:43', NULL),
(115, 'F88-Folding-Drone-RC-Quadcopter-Foldable-Portable-WiFi-Drones-With-4K-HD-Camera-Altitude-Hold-Mode.jpg_q50', 'uploads/all/lKWFDIL0uKiru2nwhsxiAaxe6Hp9xozwiTe0MwmU.jpg', 9, 108713, 'jpg', 'image', '2021-01-26 09:33:43', '2021-01-26 09:33:43', NULL),
(116, 'f064331a-3abf-4e19-a682-752c7439ae28.2b9a8c510941ecca15d7621111d8bfeb', 'uploads/all/aZou9aPAcqYu5LsfPDI433Sc2pAFIvc3vpo6g7kk.jpg', 9, 22392, 'jpeg', 'image', '2021-01-26 09:33:43', '2021-01-26 09:33:43', NULL),
(117, 'rsz_b_x', 'uploads/all/vlyXiLFmdyEmY54HPIc1RaltszTKNGSnwUPTvCQl.jpg', 9, 88650, 'jpg', 'image', '2021-01-26 09:35:38', '2021-01-26 09:35:38', NULL),
(118, '159ffe99f3a6e4dd749b672d42fbf1324c45e1de', 'uploads/all/nxFtwjkoO965HdgrShrwI4fXrw7j7MZ3eYudZTFn.jpg', 9, 12656, 'jpg', 'image', '2021-01-26 10:01:05', '2021-01-26 10:01:05', NULL),
(119, 'NPW_NetPower_COMPOSIZ_OK_1_OK', 'uploads/all/SXHZoXsOg5uc6ihPvDxWGFsY12tXCgm3Wd6umaJy.jpg', 9, 40692, 'jpg', 'image', '2021-01-26 10:01:05', '2021-01-26 10:01:05', NULL),
(120, 'UPS-PC-652A_hires_photo---05e094cc-3243-439a-ae3f-e4487b7a809b', 'uploads/all/cHoGMAUhxKcta93P8B1ea9X4jiH4mJyeJrQYzhdO.jpg', 9, 532541, 'jpg', 'image', '2021-01-26 10:01:05', '2021-01-26 10:01:05', NULL),
(121, '2000w_1200w_line_interactive_ups_for_home_computer_ups_with_24v_9ah_internal_battery', 'uploads/all/elXE5tziLSifhCr9QqFUK2xrp9ILUa5A28TIGyBD.jpg', 9, 26289, 'jpg', 'image', '2021-01-26 10:01:05', '2021-01-26 10:01:05', NULL),
(122, '28507d8ebdf746b3acd92a5a49cf6c47_en-en', 'uploads/all/9IsD1t1VtsDeHNimDLGLAOFgqcWB0PQvbvwBuNAx.png', 9, 74516, 'png', 'image', '2021-01-26 10:01:19', '2021-01-26 10:01:19', NULL),
(123, 'rsz_prolink-ips1200-1000x1000', 'uploads/all/xA8MTSSave1gQmRMwEZtFhuZLn36QEftWQ5jk4HC.jpg', 9, 86095, 'jpg', 'image', '2021-01-26 10:14:52', '2021-01-26 10:14:52', NULL),
(124, 'prolink-ips2400-1440w-inverter-power-supply-ips-24vdc-charger-prolink-2008-03-PROLiNK@35', 'uploads/all/8yiRBD69XMv0TQks6B3wJXksFhjpjG6tklLM2CXO.jpg', 9, 93720, 'jpg', 'image', '2021-01-26 10:15:36', '2021-01-26 10:15:36', NULL),
(125, 'intex-cfl-ups-50-500x500', 'uploads/all/YHGEsfEXspKiRgN9WfG2pl3fu70mjr6dAZdApQOk.png', 9, 197718, 'png', 'image', '2021-01-26 10:15:36', '2021-01-26 10:15:36', NULL),
(126, 'prolink-ips2400-2400va-high-performance-inverter-power-supply-ips-generator-with-lcd-display-4603-743205-16e08a36dee4832c40ba618365e31fb5-catalog.jpg_720x720q80', 'uploads/all/TrtBL3p3VgWR6umaJ7xeln6UP16wSB2jRGvxv3co.jpg', 9, 18124, 'jpg', 'image', '2021-01-26 10:15:36', '2021-01-26 10:15:36', NULL),
(127, 'rsz_15b3592349c6a036c7db82b1f2c4a382', 'uploads/all/vE7uOXlNEwidhQXfz6FT0OsZGzKIRMWbk23I3FFA.jpg', 9, 82817, 'jpg', 'image', '2021-01-26 10:24:08', '2021-01-26 10:24:08', NULL),
(128, 'PA503_T01', 'uploads/all/JjFhn8LmxLSrtWcWTllYnX8M1mLhW5v7ykmoACLe.jpg', 9, 316032, 'jpg', 'image', '2021-01-26 10:24:24', '2021-01-26 10:24:24', NULL),
(129, 'PA503_L01', 'uploads/all/BDOmijbybSre1IGRii2BRzGhdY8YB9EpfSj4vTV3.jpg', 9, 387547, 'jpg', 'image', '2021-01-26 10:24:24', '2021-01-26 10:24:24', NULL),
(130, 'screenshot-2020-10-19-10-14-25-500x500', 'uploads/all/lc0UiHNEViK8T3OpDe7E4ZI04NzbaqXyD7S4XrVG.png', 9, 64353, 'png', 'image', '2021-01-26 10:24:24', '2021-01-26 10:24:24', NULL),
(131, 'PA503_C01', 'uploads/all/HHeqmm57YNsVsAHHsdbmbEbstp1Ceyg4Zp9KHJfU.jpg', 9, 501487, 'jpg', 'image', '2021-01-26 10:24:24', '2021-01-26 10:24:24', NULL),
(132, 'rsz_fingerprint-time-attendance-and-access-control-terminal-with-id-card-reader-t8-a-', 'uploads/all/VB3lebX9ukWNH9hjLGCPoBlczhPK7pH2zYCb77Ln.jpg', 9, 13460, 'jpg', 'image', '2021-01-26 10:45:00', '2021-01-26 10:45:00', NULL),
(133, '2.-Bio-Finger-III', 'uploads/all/FqngMpXKC9fWO5ixYZf9UtTASSzyntPFBcEJd1xo.png', 9, 119620, 'png', 'image', '2021-01-26 10:45:14', '2021-01-26 10:45:14', NULL),
(134, 'Thumbprint-Time-Attendance-System-Biometrics-Security-with-SSR-Report-Scheduled-Bell-T5-', 'uploads/all/J0WQb9Q5XIyD1YAOsIBNZ38P5XP9cMh8I9sOx8SP.jpg', 9, 21079, 'jpg', 'image', '2021-01-26 10:45:14', '2021-01-26 10:45:14', NULL),
(135, 'biometric-fingerprint-time-attendance-clock-recorder-reader-machine-black-5602-43766961-44958480fcf2e7d60a3a2d9731aacb44-catalog.jpg_720x720q80.jpg_', 'uploads/all/ogvG4IBxP1Vmob4TnXxloOXZBRHiDQ8blt1cJ7Kc.webp', 9, 11228, 'webp', 'image', '2021-01-26 10:45:14', '2021-01-26 10:45:14', NULL),
(136, 'rsz_28507d8ebdf746b3acd92a5a49cf6c47_en-en', 'uploads/all/RkxOQqSg6Lj4rhvePsCvitmSXbHhK2Xfyd6T27K8.png', 9, 28540, 'png', 'image', '2021-01-26 10:48:52', '2021-01-26 10:48:52', NULL),
(137, 'rsz_495-4958736_hikvision-colour-camera-cctv-hd-png-download', 'uploads/all/km7oMrTMSMa2AQ5RmRvQkrCbYeF0ioRsd0m94dnH.jpg', 9, 13017, 'jpg', 'image', '2021-01-26 10:50:15', '2021-01-26 10:50:15', NULL),
(138, 'orientbd-slider3', 'uploads/all/4kxAMOov9O8xDxpQNuvBwWMGeXD7ZiiZysxxu564.jpg', 9, 42920, 'jpg', 'image', '2021-01-26 12:36:52', '2021-01-26 12:36:52', NULL),
(139, 'orientbd-slider1', 'uploads/all/GVpWQdRAqzq8fK0pzHcMByseL7yW1Al7HvxuexcU.jpg', 9, 55315, 'jpg', 'image', '2021-01-26 12:36:52', '2021-01-26 12:36:52', NULL),
(140, 'orientbd-slider2', 'uploads/all/DgHqbDn8MQo9SxpP1SN51C8Pjoy8bTG9EoIJcnkI.jpg', 9, 50811, 'jpg', 'image', '2021-01-26 12:36:52', '2021-01-26 12:36:52', NULL),
(141, 'flash-sale-discount-banner-template-promotion_7087-1222', 'uploads/all/qSgRWPLPO6HwRBHeeCrJtcMLYVRcm26U0EsAPK6a.jpg', 9, 44689, 'jpg', 'image', '2021-01-26 12:38:54', '2021-01-26 12:38:54', NULL),
(142, 'mega-sale', 'uploads/all/sQ9jRwlFnmV2cdcSWMQnVR84c1CSLOxTjvJIRcDS.jpg', 9, 43670, 'jpg', 'image', '2021-01-26 12:39:42', '2021-01-26 12:39:42', NULL),
(143, 'rsz_ramadan-sale-banner-template-design-background_7087-667', 'uploads/all/tZ5HHVrOgUXMRBIXU8vjgxJwHWrtyqMon6SXjifx.jpg', 9, 21932, 'jpg', 'image', '2021-01-26 12:41:57', '2021-01-26 12:41:57', NULL),
(144, 'rsz_dell-icon-png-50-px-dell-png-1600_1600', 'uploads/all/Gcm7BTtO9kuMpp1aEmlLUo9LD8uINQiboDIktLWj.png', 9, 6727, 'png', 'image', '2021-01-27 04:29:13', '2021-01-27 04:29:13', NULL),
(145, 'dell-icon-png-50-px-dell-png-1600_1600', 'uploads/all/Yy0Su11TOfZUDju7xK7F2IG5QLT26P7MrZnlNyV4.png', 9, 31904, 'png', 'image', '2021-01-27 04:30:38', '2021-01-27 04:30:38', NULL),
(146, '2782b0b66efa5815b12c9c637322aff3-desktop-computer-icon-computer-by-vexels', 'uploads/all/I6gp9KwvmfIIQNSkvKAs8rJ7LAiz633HKh4XlJ5Y.png', 9, 88846, 'png', 'image', '2021-01-27 04:33:55', '2021-01-27 04:33:55', NULL),
(147, 'rsz_168-1682331_windows-laptop-pc-repair-windows-10-pro-pc-removebg-preview', 'uploads/all/NBFMYcNeSf8xPJ6OgHiPW9OSpOTZBmG580VarSLx.png', 9, 46633, 'png', 'image', '2021-01-27 04:36:40', '2021-01-27 04:36:40', NULL),
(148, 'Untitled-11', 'uploads/all/7aSeX6wYgdx2oULJDlflAalEYsWCFfx5wUQv4Ym6.jpg', 9, 140046, 'jpg', 'image', '2021-01-27 05:14:37', '2021-01-27 05:14:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `referred_by` int(11) DEFAULT NULL,
  `provider_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verification_code` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_email_verificiation_code` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar_original` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `balance` double(20,2) NOT NULL DEFAULT 0.00,
  `banned` tinyint(4) NOT NULL DEFAULT 0,
  `referral_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_package_id` int(11) DEFAULT NULL,
  `remaining_uploads` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `referred_by`, `provider_id`, `user_type`, `name`, `email`, `email_verified_at`, `verification_code`, `new_email_verificiation_code`, `password`, `remember_token`, `avatar`, `avatar_original`, `address`, `country`, `city`, `postal_code`, `phone`, `balance`, `banned`, `referral_code`, `customer_package_id`, `remaining_uploads`, `created_at`, `updated_at`) VALUES
(3, NULL, NULL, 'seller', 'Mr. Seller', 'seller@example.com', '2018-12-11 18:00:00', NULL, NULL, '$2y$10$eUKRlkmm2TAug75cfGQ4i.WoUbcJ2uVPqUlVkox.cv4CCyGEIMQEm', 'WOKjMG264AcvjqGuMcHOQI2rtKKGGMITQDvkUdhDRBUkY4jzELc3OD4PL9eU', 'https://lh3.googleusercontent.com/-7OnRtLyua5Q/AAAAAAAAAAI/AAAAAAAADRk/VqWKMl4f8CI/photo.jpg?sz=50', NULL, 'Demo address', 'US', 'Demo city', '1234', NULL, 0.00, 0, '3dLUoHsR1l', NULL, NULL, '2018-10-07 04:42:57', '2020-03-05 01:33:22'),
(8, NULL, NULL, 'customer', 'Mr. Customer', 'customer@example.com', '2018-12-11 18:00:00', NULL, NULL, '$2y$10$eUKRlkmm2TAug75cfGQ4i.WoUbcJ2uVPqUlVkox.cv4CCyGEIMQEm', '9ndcz5o7xgnuxctJIbvUQcP41QKmgnWCc7JDSnWdHOvipOP2AijpamCNafEe', 'https://lh3.googleusercontent.com/-7OnRtLyua5Q/AAAAAAAAAAI/AAAAAAAADRk/VqWKMl4f8CI/photo.jpg?sz=50', NULL, 'Demo address', 'US', 'Demo city', '1234', NULL, 0.00, 0, '8zJTyXTlTT', NULL, NULL, '2018-10-07 04:42:57', '2020-03-03 04:26:11'),
(9, NULL, NULL, 'admin', 'admin', 'admin@gmail.com', '2021-01-23 02:01:03', NULL, NULL, '$2y$10$0Os4Z5xJvca3Jh6sEma6ZujUyixVQcW7tqFXKPq0Hg4zsVkviEdW.', '1cOMN1Z74Xq4KSya8pA15bWYTvjjkuoscUIfv1ABMnn2RaVsMr7tOapoXkdd', NULL, '23', NULL, NULL, NULL, NULL, NULL, 0.00, 0, NULL, NULL, 0, '2021-01-23 02:16:03', '2021-01-24 05:39:04'),
(10, NULL, NULL, 'customer', 'Minhaz', 'user@gmail.com', '2021-01-24 03:01:10', NULL, NULL, '$2y$10$VPOVy9CiX3lPFvURUfQZ3uK5lCqAWVdDabv3ndCGD6IlfwZfaEfDu', NULL, NULL, '15', NULL, NULL, NULL, NULL, NULL, 0.00, 0, NULL, NULL, 0, '2021-01-24 03:12:10', '2021-01-24 03:17:12'),
(11, NULL, NULL, 'customer', 'al mamun', 'almamun214@gmail.com', '2021-01-26 02:01:52', NULL, NULL, '$2y$10$U4ieAoBJo7eLW5lc4.8Pd.TizKTkghojfG3XkAf7Xs92Mkn7iJCxu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0, NULL, NULL, 0, '2021-01-26 02:03:52', '2021-01-26 02:03:52'),
(12, NULL, NULL, 'staff', 'Sakib', 'pickup@gmail.com', NULL, NULL, NULL, '$2y$10$JEaxzos0GuOTCIR8jovk2eIQpoO4pcwiXFsErcPtsziNjc5YQd0Eu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01675512898', 0.00, 0, NULL, NULL, 0, '2021-01-26 12:48:21', '2021-01-26 12:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` double(20,2) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 10, 1, '2021-01-24 05:22:36', '2021-01-24 05:22:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_settings`
--
ALTER TABLE `app_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_translations`
--
ALTER TABLE `city_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_packages`
--
ALTER TABLE `customer_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_package_payments`
--
ALTER TABLE `customer_package_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_package_translations`
--
ALTER TABLE `customer_package_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_products`
--
ALTER TABLE `customer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_product_translations`
--
ALTER TABLE `customer_product_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deals`
--
ALTER TABLE `flash_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deal_products`
--
ALTER TABLE `flash_deal_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flash_deal_translations`
--
ALTER TABLE `flash_deal_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_translations`
--
ALTER TABLE `page_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_points`
--
ALTER TABLE `pickup_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_point_translations`
--
ALTER TABLE `pickup_point_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `tags` (`tags`(255));

--
-- Indexes for table `product_stocks`
--
ALTER TABLE `product_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_translations`
--
ALTER TABLE `role_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `searches`
--
ALTER TABLE `searches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `seller_withdraw_requests`
--
ALTER TABLE `seller_withdraw_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `app_settings`
--
ALTER TABLE `app_settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_translations`
--
ALTER TABLE `attribute_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_translations`
--
ALTER TABLE `city_translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon_usages`
--
ALTER TABLE `coupon_usages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_packages`
--
ALTER TABLE `customer_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_package_payments`
--
ALTER TABLE `customer_package_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_package_translations`
--
ALTER TABLE `customer_package_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_products`
--
ALTER TABLE `customer_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_product_translations`
--
ALTER TABLE `customer_product_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flash_deals`
--
ALTER TABLE `flash_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flash_deal_products`
--
ALTER TABLE `flash_deal_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `flash_deal_translations`
--
ALTER TABLE `flash_deal_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `page_translations`
--
ALTER TABLE `page_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup_points`
--
ALTER TABLE `pickup_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pickup_point_translations`
--
ALTER TABLE `pickup_point_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_stocks`
--
ALTER TABLE `product_stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_translations`
--
ALTER TABLE `role_translations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `searches`
--
ALTER TABLE `searches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller_withdraw_requests`
--
ALTER TABLE `seller_withdraw_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2474;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
