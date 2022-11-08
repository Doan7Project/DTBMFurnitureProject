-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2022 at 08:30 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnituredb`
--
CREATE DATABASE IF NOT EXISTS `furnituredb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `furnituredb`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `gender`, `email`, `password`, `phone`, `birthday`, `country`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Customer 1', 'Last Name', '1', 'customer1@gmail.com', '123456', '099811221', '2013-07-12', 'Vietnam', 'Biên Hòa', 'Bien Hoa', NULL, '2022-11-08 00:25:38');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2022_10_06_082035_create_product_categories_table', 1),
(18, '2022_10_08_040344_create_products_table', 1),
(19, '2022_10_13_064900_create_product_images_table', 1),
(20, '2022_10_20_054657_create_customers_table', 1),
(21, '2022_10_20_055547_create_feedback_table', 1),
(22, '2022_10_20_055827_create_order_details_table', 1),
(23, '2022_10_20_055952_create_order_masters_table', 1),
(24, '2022_10_20_060605_create_slide_shows_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_master_id` bigint(20) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_masters`
--

CREATE TABLE `order_masters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `date_required` date NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `models` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `made_in` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `price`, `unit`, `quantity`, `status`, `models`, `made_in`, `category_id`, `images`, `content`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bed Rivain Dustria', 'FNI-667889181', 1250.00, 'Unit', 10, '0', 'New arrival', 'Thailand', 1, '/storage/uploads/2022/11/08/b_my-bed-riva-industria-mobili-571110-rel731b1fb5.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:33:00', '2022-11-08 00:15:26'),
(2, 'Box Twils', 'FNI-667889238', 1350.00, 'Unit', 10, '0', 'Default', 'Singapore', 1, '/storage/uploads/2022/11/08/h_a-box-twils-611009-rela00c4412.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:33:57', '2022-11-08 00:19:47'),
(3, 'Bamboletto', 'FNI-667889267', 1500.00, 'Unit', 20, '0', 'Default', 'Singapore', 1, '/storage/uploads/2022/11/08/h_BAMBOLETTO-B-B-Italia-588536-rel3afc3874.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:34:26', '2022-11-07 23:34:26'),
(4, 'Hug Sicis', 'FNI-667889298', 950.00, 'Unit', 35, '0', 'Default', 'Viet Nam', 1, '/storage/uploads/2022/11/08/h_hug-sicis-607690-rele8305888.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:34:57', '2022-11-08 00:16:34'),
(5, 'Killian Calligaris', 'FNI-667889328', 1600.00, 'Unit', 10, '0', 'Default', 'Japan', 1, '/storage/uploads/2022/11/08/h_KILIAN-Calligaris-598489-rel7d5943fa.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:35:27', '2022-11-07 23:35:27'),
(6, 'Layla Flou', 'FNI-667889411', 2299.00, 'Unit', 30, '0', 'Default', 'China', 1, '/storage/uploads/2022/11/08/h_LAYLA-Flou-593292-rel3c45a26a.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:36:50', '2022-11-08 00:13:15'),
(7, 'Poliform', 'FNI-667889449', 600.00, 'un', 40, '0', 'Featured_1', 'Singapore', 1, '/storage/uploads/2022/11/08/h_park-1-poliform-608974-reld631b1b.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:37:28', '2022-11-08 00:07:21'),
(8, 'Table Glass', 'FNI-667889513', 350.00, 'Unit', 20, '0', 'Featured', 'Thailand', 1, '/storage/uploads/2022/11/08/h_bedside-table-glas-italia-596476-rel58881bfb.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:38:32', '2022-11-08 00:18:32'),
(9, 'Table Rival', 'FNI-667889543', 450.00, 'Unit', 30, '0', 'Featured_2', 'Singapore', 1, '/storage/uploads/2022/11/08/h_bedside-table-riva-industria-mobili-596383-reldfff2513.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:39:02', '2022-11-08 00:09:15'),
(10, 'Table Sicsis', 'FNI-667889587', 560.00, 'Unit', 20, '0', 'Featured_2', 'Japan', 1, '/storage/uploads/2022/11/08/h_bedside-table-sicis-607679-rel31cdea5.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:39:46', '2022-11-08 00:09:23'),
(11, 'Table Grlux', 'FNI-667889624', 650.00, 'Unit', 10, '0', 'Default', 'Singapore', 1, '/storage/uploads/2022/11/08/h_code-bedside-table-poliform-608960-rel7a285880.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:40:23', '2022-11-07 23:40:23'),
(12, 'Wall Cabinet 7', 'FNI-667889659', 240.00, 'Unit', 30, '0', 'Default', 'Singapore', 1, '/storage/uploads/2022/11/08/h_open-wall-cabinet-hay-606547-relc359b1c7.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:40:58', '2022-11-07 23:40:58'),
(13, 'Giorget Vibe', 'FNI-667889689', 150.00, 'Unit', 40, '0', 'Default', 'China', 1, '/storage/uploads/2022/11/08/h_SIDE-VIBE-Giorgetti-596099-rel6e68edd1.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:41:28', '2022-11-07 23:41:28'),
(14, 'Caccaro Rel', 'FNI-667889719', 420.00, 'Unit', 18, '0', 'Default', 'Thailand', 1, '/storage/uploads/2022/11/08/h_x-caccaro-606333-rel214573c2.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:41:58', '2022-11-07 23:41:58'),
(15, 'Double Wash', 'FNI-667889756', 260.00, 'Unit', 10, '0', 'Default', 'Japan', 2, '/storage/uploads/2022/11/08/b_kids-double-washbasin-hewi-heinrich-wilke-419920-rel7537915e.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:42:35', '2022-11-07 23:42:35'),
(16, 'Baby Bathtub', 'FNI-667889787', 150.00, 'Unit', 35, '0', 'Default', 'Singapore', 2, '/storage/uploads/2022/11/08/h_basic-baby-bathtub-systempool-krion-porcelanosa-solid-surface-311326-rel89f60c3a.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:43:06', '2022-11-07 23:43:06'),
(17, 'Dam Gedy', 'FNI-667889846', 210.00, 'Unit', 20, '0', 'Featured_1', 'Singapore', 2, '/storage/uploads/2022/11/08/h_da-dam-GEDY-409405-rel3cac138.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:44:05', '2022-11-08 00:15:02'),
(18, 'Gedy DD', 'FNI-667889883', 160.00, 'Unit', 30, '0', 'Top', 'China', 2, '/storage/uploads/2022/11/08/h_DD01-GEDY-409413-rel53c81a86.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:44:42', '2022-11-08 00:19:06'),
(19, 'Baby Bathtub 49', 'FNI-667889919', 350.00, 'Unit', 10, '0', 'New arrival', 'Japan', 2, '/storage/uploads/2022/11/08/h_DD03-Baby-bathtub-GEDY-409409-rel3543898.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:45:18', '2022-11-08 00:15:45'),
(20, 'Minime Toilet', 'FNI-667889947', 450.00, 'Unit', 12, '0', 'Default', 'Japan', 2, '/storage/uploads/2022/11/08/h_MINIMÈ-Toilet-for-children-Saniline-260241-rel2dc446c2.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:45:46', '2022-11-07 23:45:46'),
(21, 'Minime Wall', 'FNI-667889980', 328.00, 'Unit', 12, '0', 'Default', 'Japan', 2, '/storage/uploads/2022/11/08/h_MINIMÈ-Wall-mounted-washbasin-Saniline-538831-rel44efaf92.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:46:19', '2022-11-07 23:46:19'),
(22, 'Prodotti', 'FNI-667890004', 170.00, 'Unit', 30, '0', 'Default', 'Singapore', 2, '/storage/uploads/2022/11/08/h_prodotti-154953-rel9b3c270361134c7eb8b26d559f01441b.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:46:43', '2022-11-07 23:46:43'),
(23, 'Kid Toilet Dento', 'FNI-667890034', 340.00, 'Unit', 20, '0', 'popular_1', 'Thailand', 2, '/storage/uploads/2022/11/08/h_sento-kids-toilet-eczacıbası-building-498068-rel4745759e.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:47:13', '2022-11-08 00:14:20'),
(24, 'Sento Kid Toilet', 'FNI-667890067', 320.00, 'Unit', 12, '0', 'Top', 'Singapore', 2, '/storage/uploads/2022/11/08/h_sento-kids-toilet-with-external-cistern-eczacıbası-building-498063-rel6919abad.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:47:46', '2022-11-08 00:19:20'),
(25, 'Antropus Cassin', 'FNI-667890216', 250.00, 'Unit', 10, '0', 'Trending', 'Thailand', 3, '/storage/uploads/2022/11/08/h_ANTROPUS-Cassina-609954-rel55463373.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:50:15', '2022-11-08 00:17:02'),
(26, 'Armchair Desalto', 'FNI-667890243', 205.00, 'Unit', 10, '0', 'Featured_1', 'Thailand', 3, '/storage/uploads/2022/11/08/h_armchair-desalto-599092-rel204b99e9.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:50:42', '2022-11-08 00:08:40'),
(27, 'Armchair Meridian', 'FNI-667890274', 650.00, 'Unit', 20, '0', 'New arrival', 'Singapore', 3, '/storage/uploads/2022/11/08/h_armchair-meridiani-604919-relfee7703e.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:51:13', '2022-11-08 00:15:55'),
(28, 'Armchair Sicis', 'FNI-667890306', 460.00, 'Unit', 20, '0', 'Default', 'Singapore', 3, '/storage/uploads/2022/11/08/h_armchair-sicis-607673-relf97171dd.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:51:45', '2022-11-07 23:51:45'),
(29, 'Blendy Movie', 'FNI-667890378', 460.00, 'Unit', 20, '0', 'Default', 'Singapore', 3, '/storage/uploads/2022/11/08/h_BLENDY-MOVIE-Armchair-DE-PADOVA-606182-rela946a98a.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:52:57', '2022-11-07 23:52:57'),
(30, 'Claire Lema', 'FNI-667890421', 340.00, 'Unit', 10, '0', 'New arrival', 'China', 3, '/storage/uploads/2022/11/08/h_CLAIRE-Lema-592316-rel16291bd1.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:53:40', '2022-11-08 00:16:06'),
(31, 'Eva Giorgetti', 'FNI-667890450', 290.00, 'Unit', 20, '0', 'Default', 'Viet Nam', 3, '/storage/uploads/2022/11/08/h_EVA-Giorgetti-601847-rel38e789f5.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:54:09', '2022-11-07 23:54:09'),
(32, 'Wittmann', 'FNI-667890482', 450.00, 'Unit', 20, '0', 'Featured_1', 'Singapore', 3, '/storage/uploads/2022/11/08/h_fame-wittmann-598154-rel119aa210.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:54:41', '2022-11-08 00:08:55'),
(33, 'Haven Calligaris', 'FNI-667890510', 470.00, 'Unit', 20, '0', 'Default', 'Japan', 3, '/storage/uploads/2022/11/08/h_haven-calligaris-598483-relfb0965d1.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:55:09', '2022-11-07 23:55:09'),
(34, 'Kaori Leather', 'FNI-667890543', 780.00, 'Unit', 20, '0', 'Default', 'Singapore', 3, '/storage/uploads/2022/11/08/h_kaori-leather-armchair-poliform-596780-rel78489fb6.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:55:42', '2022-11-07 23:55:42'),
(35, 'Quilton Wide', 'FNI-667890577', 950.00, 'Unit', 20, '0', 'popular_3', 'Thailand', 3, '/storage/uploads/2022/11/08/h_QUILTON-WIDE-Hay-606961-rel245744e1.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:56:16', '2022-11-08 00:13:33'),
(36, 'Terra Natuzzi', 'FNI-667890606', 450.00, 'Unit', 30, '0', 'Trending', 'Singapore', 3, '/storage/uploads/2022/11/08/h_TERRA-Natuzzi-Italia-594288-relf00640a3.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:56:45', '2022-11-08 00:17:19'),
(37, 'The Factory', 'FNI-667890630', 550.00, 'Unit', 20, '0', 'Featured_2', 'Thailand', 3, '/storage/uploads/2022/11/08/h_THE-FACTORY-Garden-armchair-VONDOM-604744-reld728f89e.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:57:09', '2022-11-08 00:10:04'),
(38, 'Ditre Italia', 'FNI-667890660', 560.00, 'Unit', 20, '0', 'Default', 'Singapore', 3, '/storage/uploads/2022/11/08/h_VENTO-Ditre-Italia-598904-rel5678f28e.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:57:39', '2022-11-07 23:57:39'),
(39, 'Yeoell Molteni', 'FNI-667890686', 410.00, 'Unit', 10, '0', 'Default', 'Japan', 3, '/storage/uploads/2022/11/08/h_YOELL-Molteni-C-596589-rel45cc11a8.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:58:05', '2022-11-07 23:58:05'),
(40, 'Bice Miniform', 'FNI-667890754', 110.00, 'Unit', 20, '0', 'Default', 'Thailand', 4, '/storage/uploads/2022/11/08/h_BICE-Miniforms-610811-relcc7a9f4c.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:59:13', '2022-11-07 23:59:13'),
(41, 'Chair Resea', 'FNI-667890778', 160.00, 'Unit', 30, '0', 'Default', 'Japan', 4, '/storage/uploads/2022/11/08/h_chair-design-research-limited-trading-as-tom-dixon-585605-rel745fc336.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:59:37', '2022-11-07 23:59:37'),
(42, 'Chair Knoll', 'FNI-667890856', 150.00, 'Unit', 10, '0', 'Default', 'Singapore', 4, '/storage/uploads/2022/11/08/h_chair-knoll-international-598459-rel1c445c6b.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:00:55', '2022-11-08 00:00:55'),
(43, 'Chair Monotti', 'FNI-667890884', 150.00, 'Unit', 10, '0', 'Featured_2', 'Singapore', 4, '/storage/uploads/2022/11/08/h_chair-minotti-599723-rel92a6a2df.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:01:23', '2022-11-08 00:09:50'),
(44, 'Chair Molteni', 'FNI-667890913', 190.00, 'Unit', 100, '0', 'Default', 'Singapore', 4, '/storage/uploads/2022/11/08/h_chair-molteni-c-596645-rel472069b5.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:01:52', '2022-11-08 00:01:52'),
(45, 'Dine Out Chair', 'FNI-667890942', 102.00, 'Unit', 100, '0', 'Top', 'Thailand', 4, '/storage/uploads/2022/11/08/h_DINE-OUT-CHAIR-Cassina-610486-rel32d5768f.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:02:21', '2022-11-08 00:18:46'),
(46, 'Himba Garden', 'FNI-667890966', 90.00, 'Unit', 300, '0', 'Default', 'Singapore', 4, '/storage/uploads/2022/11/08/h_himba-garden-chair-baxter-598426-rel348fe5b4.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:02:45', '2022-11-08 00:02:45'),
(47, 'Holly Calligaris', 'FNI-667890995', 110.00, 'Unit', 100, '0', 'Trending', 'Singapore', 4, '/storage/uploads/2022/11/08/h_holly-calligaris-598547-rel9f5721f4.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:03:14', '2022-11-08 00:17:29'),
(48, 'Lofty MDF', 'FNI-667891020', 200.00, 'Unit', 100, '0', 'Trending', 'Singapore', 4, '/storage/uploads/2022/11/08/h_LOFTY-MDF-Italia-611577-rel5c93badc.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:03:39', '2022-11-08 00:17:40'),
(49, 'Leather Chair', 'FNI-667891050', 105.00, 'Unit', 60, '0', 'Top', 'Singapore', 4, '/storage/uploads/2022/11/08/h_nice-leather-chair-poltrona-frau-596809-reldab43c2b.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:04:09', '2022-11-08 00:19:31'),
(50, 'Gandia Chair', 'FNI-667891076', 106.00, 'Unit', 50, '0', 'popular_2', 'Viet Nam', 4, '/storage/uploads/2022/11/08/h_onde-chair-gandia-blasco-605716-rel4e7ae1ec.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:04:35', '2022-11-08 00:22:18'),
(51, 'Chair Pastis', 'FNI-667891099', 104.00, 'Unit', 100, '0', 'Featured', 'Viet Nam', 4, '/storage/uploads/2022/11/08/h_PASTIS-Chair-with-armrests-Hay-606517-rel279f98d.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:04:58', '2022-11-08 00:18:23'),
(52, 'Sophie Lite', 'FNI-667891154', 150.00, 'Unit', 100, '0', 'Default', 'Viet Nam', 4, '/storage/uploads/2022/11/08/h_sophie-lite-chair-with-armrests-poliform-604132-rela8268ed4.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:05:53', '2022-11-08 00:05:53'),
(53, 'Thea Queen', 'FNI-667891179', 260.00, 'Unit', 100, '0', 'Featured', 'China', 4, '/storage/uploads/2022/11/08/h_thea-queen-gallotti-radice-598894-reldda72b3a.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:06:18', '2022-11-08 00:18:12'),
(54, 'Chair Twins', 'FNI-667891208', 160.00, 'Unit', 160, '0', 'Featured', 'China', 4, '/storage/uploads/2022/11/08/h_TWINS-Chair-with-armrests-emu-596349-rel5846aba7.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:06:47', '2022-11-08 00:18:03'),
(55, 'Prodioti Bedroom', 'FNI-667891495', 2500.00, 'Unit', 100, '0', 'Default', 'Japan', 2, '/storage/uploads/2022/11/08/h_prodotti-179241-relc9d5bf2a9098448db72e09ac2510abd4.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:11:34', '2022-11-08 00:13:57'),
(56, 'Stable Bed', 'FNI-667891524', 1700.00, 'Unit', 100, '0', 'Default', 'Japan', 2, '/storage/uploads/2022/11/08/h_STABLE-Bed-Mathy-by-Bols-556267-rel9d7be5b4.webp', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-08 00:12:03', '2022-11-08 00:22:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CategoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `Detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `CategoryName`, `Description`, `Detail`, `created_at`, `updated_at`) VALUES
(1, 'Children\'s bedroom', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:28:29', '2022-11-07 23:28:29'),
(2, 'Kids furnitures', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:28:49', '2022-11-07 23:28:49'),
(3, 'Sofas and armchairs', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:29:07', '2022-11-07 23:29:07'),
(4, 'Tables and chairs', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. In sint nostrum deleniti ipsa sunt atque unde est sapiente odit accusamus, ipsam suscipit soluta a quam, recusandae corporis reprehenderit. Eos, esse!', '2022-11-07 23:29:24', '2022-11-07 23:29:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide_shows`
--

CREATE TABLE `slide_shows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slide_shows`
--

INSERT INTO `slide_shows` (`id`, `name`, `image`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Luxury Internal', '1666596297.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:24:57', '2022-10-24 00:24:57'),
(2, 'Cool Room', '1666596329.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:25:29', '2022-10-24 00:25:29'),
(3, 'Classical Room', '1666596344.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:25:44', '2022-10-24 00:25:44'),
(4, 'Family Room', '1666596368.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:26:08', '2022-10-24 00:26:08'),
(5, 'Green For Xmax', '1666596398.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:26:38', '2022-10-24 00:26:38');

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
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$pN1GSSjezeVcwT.9/lExeOVeEXn5ujTTjgJSVbPMMN8euy9X9lt4K', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_masters`
--
ALTER TABLE `order_masters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_masters_customer_id_foreign` (`customer_id`);

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
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `slide_shows`
--
ALTER TABLE `slide_shows`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_masters`
--
ALTER TABLE `order_masters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide_shows`
--
ALTER TABLE `slide_shows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `order_masters`
--
ALTER TABLE `order_masters`
  ADD CONSTRAINT `order_masters_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
