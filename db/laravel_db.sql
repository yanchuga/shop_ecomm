-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2022 at 08:40 PM
-- Server version: 8.0.29-0ubuntu0.20.04.3
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_groups`
--

CREATE TABLE `shop_groups` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shop_groups`
--

INSERT INTO `shop_groups` (`id`, `name`) VALUES
(1, 'Electronics'),
(2, 'Cars'),
(3, 'Pets'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `shop_products`
--

CREATE TABLE `shop_products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shop_products`
--

INSERT INTO `shop_products` (`id`, `name`, `price`) VALUES
(1, 'Fiat Polo', 10000),
(2, 'Dog Colly', 1000),
(3, 'Playstation 5', 700),
(4, 'White Rabbit', 70),
(6, 'Volkswagen Passat', 7000),
(7, 'Mercedes Vito', 15000),
(8, 'Toothpaste', 40),
(9, 'Rucksack', 15),
(11, 'Monkey', 300);

-- --------------------------------------------------------

--
-- Table structure for table `shop_prod_groups`
--

CREATE TABLE `shop_prod_groups` (
  `id` int NOT NULL,
  `prod_id` int NOT NULL,
  `group_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shop_prod_groups`
--

INSERT INTO `shop_prod_groups` (`id`, `prod_id`, `group_id`) VALUES
(1, 2, 3),
(2, 4, 3),
(3, 1, 2),
(4, 6, 2),
(5, 3, 1),
(8, 7, 2),
(9, 8, 4),
(10, 9, 4),
(15, 11, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_groups`
--
ALTER TABLE `shop_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_products`
--
ALTER TABLE `shop_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_prod_groups`
--
ALTER TABLE `shop_prod_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_groups`
--
ALTER TABLE `shop_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shop_products`
--
ALTER TABLE `shop_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shop_prod_groups`
--
ALTER TABLE `shop_prod_groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shop_prod_groups`
--
ALTER TABLE `shop_prod_groups`
  ADD CONSTRAINT `shop_prod_groups_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `shop_products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
