-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 03:09 PM
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

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `CategoryName`, `Description`, `Detail`, `created_at`, `updated_at`) VALUES
(1, 'Sofas and armchairs', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex deserunt explicabo doloribus recusandae. Libero aut rem est ea maxime. Enim laborum id nulla, vitae vel expedita', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex deserunt explicabo doloribus recusandae. Libero aut rem est ea maxime. Enim laborum id nulla, vitae vel expedita similique ab provident exercitationem!', '2022-10-24 00:07:57', '2022-10-24 00:07:57'),
(2, 'Tables and chairs', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex deserunt explicabo doloribus', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex deserunt explicabo doloribus recusandae. Libero aut rem est ea maxime. Enim laborum id nulla, vitae vel expedita similique ab provident exercitationem!', '2022-10-24 00:20:39', '2022-10-24 00:20:39'),
(3, 'Kids furnitures', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex deserunt explicabo doloribus', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ex deserunt explicabo doloribus recusandae. Libero aut rem est ea maxime. Enim laborum id nulla, vitae vel expedita similique ab provident exercitationem!', '2022-10-24 00:20:53', '2022-10-24 00:20:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
