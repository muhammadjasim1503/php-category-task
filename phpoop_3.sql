-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 09:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `phpoop_3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `images`) VALUES
(13, 'Heavy gaming', 'Xiaomi Mi 10T.jpg'),
(14, 'ios', '123994856_2788361584756212_7071224326015518419_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `model` varchar(150) NOT NULL,
  `id_admin` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `display` varchar(150) NOT NULL,
  `hardware` varchar(255) NOT NULL,
  `camera` varchar(255) NOT NULL,
  `battery` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `model`, `id_admin`, `title`, `price`, `display`, `hardware`, `camera`, `battery`, `qty`, `images`, `created_at`, `category_id`) VALUES
(17, 'Xiaomi', 0, 'Xiaomi MI 10T', 250, '6.7 inches', '8gb', '50 MP, f/1.9, 23mm (wide), 1/1.28', 'Li-Po 4200 mAh', 40, 'Xiaomi Mi 10T.jpg', '2022-08-04 06:08:02', 13),
(18, 'Samsung', 0, 'Samsung Galaxy S20', 420, '6.5 inches', '6gb', '12 megapixels; 8 MP; 12 MP', '4500 mAh', 20, 'Samsung_Galaxy_S20_FE_5G.png', '2022-08-05 05:42:59', 13),
(19, 'iphone', 0, 'iphone 12', 500, '6.7 inches', '8gb', '12 megapixels; 8 MP; 12 MP', '4500 mAh', 30, '51971.jpg', '2022-08-05 05:43:41', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `license_date` varchar(255) DEFAULT NULL,
  `active_status` varchar(255) NOT NULL,
  `status` smallint(1) NOT NULL DEFAULT 0,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `online` smallint(6) NOT NULL DEFAULT 0,
  `cat_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `create_date`, `license_date`, `active_status`, `status`, `role`, `online`, `cat_id`) VALUES
(1, 'Muhamad', 'Jasim', 'jasim@gmail.com', '$2y$10$s0EY4oQYOtUyerD.qTK0B.lD4ERZnGC7dj3JLRU1zp4hlvw2AP8ii', '2022-08-03 10:32:09', '2023-08-03', 'verified', 0, 'user', 1, 0),
(2, 'admin', 'admin', 'admin@gmail.com', '$2y$10$1rSD32gmdeR.d26n3JqqRujb4Idyie6c7GxzANESiV9VJSRLpjTm6', '2022-08-03 10:32:30', '2023-08-03', 'verified', 0, 'admin', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FOREIGN` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;
