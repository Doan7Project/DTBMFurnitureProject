-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 10:10 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

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
-- Dumping data for table `slide_shows`
--

INSERT INTO `slide_shows` (`id`, `name`, `image`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Luxury Internal', '1666596297.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:24:57', '2022-10-24 00:24:57'),
(2, 'Cool Room', '1666596329.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:25:29', '2022-10-24 00:25:29'),
(3, 'Classical Room', '1666596344.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:25:44', '2022-10-24 00:25:44'),
(4, 'Family Room', '1666596368.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:26:08', '2022-10-24 00:26:08'),
(5, 'Green For Xmax', '1666596398.jpg', 'Active', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt eaque nemo adipisci consequatur deleniti atque quis unde nulla nihil hic esse placeat voluptatibus voluptate, consequuntur labore sequi repellendus cupiditate ut.', '2022-10-24 00:26:38', '2022-10-24 00:26:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
