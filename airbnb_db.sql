-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 04:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airbnb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `creator` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `title`, `description`, `price`, `rating`, `image`, `date`, `creator`) VALUES
(1, 'DELUX ROOM', 'test', 12000, 4, 'wallpaperflare.com_wallpaper.jpg', '2023-06-25 16:07:56', NULL),
(2, 'DELUX ROOM', 'test', 12000, 4, 'wallpaperflare.com_wallpaper.jpg', '2023-06-25 16:07:56', NULL),
(3, 'DELUX ROOM', 'test', 12000, 4, 'wallpaperflare.com_wallpaper.jpg', '2023-06-25 16:07:56', NULL),
(4, 'Double Room', 'test', 1200, 4, 'profile.jpg', '2023-06-25 16:29:09', NULL),
(5, 'Double Room', 'test', 1200, 4, 'profile.jpg', '2023-06-25 16:29:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL DEFAULT 'no_profle.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `profile_pic`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$pFBkHXlsTqqFAPHQP8FhmekHZtgqvR8dLtZHytYSZM1ZOLpOMDbZ2', 'profile2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
