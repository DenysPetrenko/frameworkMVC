-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: nix_2_mysql
-- Generation Time: Sep 05, 2022 at 07:10 AM
-- Server version: 8.0.29
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nix2`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `sort` int DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `sort`, `created_at`, `updated_at`) VALUES
(81, '1234', 'цваыпва', 1, '2022-07-13', '2022-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(0, 'not known'),
(1, 'Male'),
(2, 'Female'),
(9, 'Not applicable');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `datetime` datetime(6) NOT NULL,
  `level` varchar(255) NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `http_code` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `datetime`, `level`, `message`, `http_code`) VALUES
(1, '2022-07-18 16:29:24.000000', '1', '1', 200),
(2, '2022-07-18 16:29:24.000000', '1', '1', 200),
(3, '2022-07-18 16:13:05.000000', 'writeLog', '123', 200),
(4, '2022-07-18 16:13:06.000000', 'writeLog', '123', 200),
(5, '2022-07-18 16:13:06.000000', 'writeLog', '123', 200),
(6, '2022-07-18 16:13:20.000000', 'writeLog', '123', 200),
(7, '2022-07-18 16:13:21.000000', 'writeLog', '123', 200),
(8, '2022-07-18 16:13:25.000000', 'writeLog', '123', 200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_german2_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8_general_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `gender_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `created_at`, `updated_at`, `gender_id`) VALUES
(115, 'Denys', 'Des.Petrenko@gmail.com', '776c79c407fb6671cf4e5122c5b3945d821b8cec', '2022-07-14', '2022-07-14', 1),
(116, 'Caleb Hayes', 'franz.stroman@connelly.info', 'c32be763cb1dca9140d104dbf323a9eb73b6b3ac', '2022-07-14', '2022-07-14', 2),
(117, 'Valentine Davis', 'rgutmann@zboncak.com', 'a2b8b7d64e3016976f562c6c561918a2e9cdfadf', '2022-07-14', '2022-07-14', 0),
(118, 'Bella Kunde', 'reichert.joyce@yahoo.com', 'e714b5b5e7d1792b70eddce358c4a8c91dd11ecf', '2022-07-14', '2022-07-14', 2),
(119, 'Sister Bashirian', 'hollis76@hotmail.com', '87bdad415977ed29b17a39106de27d824352c83d', '2022-07-14', '2022-07-14', 2),
(120, 'Mekhi Gutkowski', 'romaguera.cora@hackett.com', '16b833ec5603a5651ad517e52dc090828e28f286', '2022-07-14', '2022-07-14', 2),
(121, 'Eloisa Leannon', 'goodwin.orville@hotmail.com', 'a90ab3618867e2537fcc3bf87486f69a7b2c0f8f', '2022-07-14', '2022-07-14', 1),
(122, 'Casandra Simonis', 'timmothy31@yahoo.com', '622172c0ec8371b07ca8b2aa894ea4581e990c37', '2022-07-14', '2022-07-14', 1),
(123, 'King Brakus', 'morissette.mario@kris.com', '416dd61018cb9b6efca4fdd07c73321ea97402f0', '2022-07-14', '2022-07-14', 2),
(124, 'Ms. Clementine Erdman', 'buck.bahringer@hotmail.com', 'e2752fddc460334ecbc3411b4f3859478da29380', '2022-07-14', '2022-07-14', 2),
(125, 'Lilyan Harvey I', 'cmarks@hotmail.com', 'e031535e2ab07bce2c90f655356b56ea4c46409f', '2022-07-14', '2022-07-14', 1),
(126, 'Josianne Kunde', 'uwaters@hotmail.com', 'a0b395abf0d2b35eaec420b0a0d7ffa216fe6738', '2022-07-14', '2022-07-14', 1),
(127, 'Mr. Jameson Daugherty', 'alena.smith@barton.com', '2dbd07df0b362dfc357aac6e72350b974cef2bb7', '2022-07-14', '2022-07-14', 1),
(128, 'Ottilie Kemmer II', 'katrina90@schinner.com', '936a79745eb0e666671a234c0117289d9075019d', '2022-07-14', '2022-07-14', 0),
(129, 'Lucinda Hoeger', 'jakayla27@hansen.com', 'd693a501d3f0b6c27b34cdabca6c557d076056f8', '2022-07-14', '2022-07-14', 2),
(130, 'Malvina Leannon', 'katheryn.marks@gmail.com', '6216c0a7dcd52aaf36672aaefc13b9d496e4f228', '2022-07-14', '2022-07-14', 0),
(131, 'Laury Bechtelar', 'aric.hamill@bosco.com', '5610b39fc436203fc00bf70a0db35aa1c581fb6a', '2022-07-14', '2022-07-14', 2),
(133, 'ууууууууууу', 'уууууууууууууууу', 'уууууууууууууууууууу', '2022-07-23', '2022-07-23', 2),
(135, 'Denysыыыы', 'Des.Petrenko@gmail.com', '$2y$10$1fbnFXvYs5FuBrZJ3W3cCeDT46CH0zx5sgZQzcy4vWdDgEnSFwhqG', '2022-07-21', '2022-08-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_articles`
--

CREATE TABLE `users_articles` (
  `user_id` int NOT NULL,
  `article_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title_UNIQUE` (`title`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`email`,`pass`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Indexes for table `users_articles`
--
ALTER TABLE `users_articles`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `article_id` (`article_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_articles`
--
ALTER TABLE `users_articles`
  ADD CONSTRAINT `users_articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_articles_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
