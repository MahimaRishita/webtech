-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 02, 2023 at 10:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upload`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `img_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `timesatmp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `img_id`, `username`, `comment`, `timesatmp`) VALUES
(5, 18, 'Rishita', 'hi', '2023-04-02 18:43:22'),
(6, 18, 'Rishita', 'hi', '2023-04-02 18:47:57'),
(7, 18, 'Rishita', 'hi', '2023-04-02 18:49:32'),
(8, 14, 'Asritha', 'nice pic', '2023-04-02 18:56:11'),
(9, 14, 'Nishitha', 'nice pic', '2023-04-02 18:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `uname` varchar(100) NOT NULL,
  `likes` bigint(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `description`, `created_at`, `uname`, `likes`) VALUES
(14, 'Ph.jpg', 'my pic', '2023-04-02 16:17:25', 'Rishita', 2),
(15, 'Ph.jpg', 'hi', '2023-04-02 16:18:32', 'Rishita', 1),
(16, 'idcard.jpg', 'id', '2023-04-02 16:19:11', 'Rishita', 1),
(17, 'Gold Black Minimalist Light Bulb Logo  (1).png', 'logo', '2023-04-02 16:29:07', 'Rishita', 1),
(18, 'Mountain Landscape Vector Design Poster.jpg', 'mountains', '2023-04-02 16:44:59', 'Asritha', 2),
(19, 'image1.png', 'hi', '2023-04-02 20:16:07', 'Asritha', 1),
(20, 'image1.png', 'this is me', '2023-04-02 20:21:29', 'Rishita', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_id`, `username`, `created_at`) VALUES
(9, 14, 'Rishita', '2023-04-02 19:47:45'),
(10, 15, 'Rishita', '2023-04-02 19:49:28'),
(11, 16, 'Rishita', '2023-04-02 19:49:34'),
(12, 17, 'Rishita', '2023-04-02 19:49:41'),
(13, 18, 'Rishita', '2023-04-02 19:49:46'),
(14, 18, 'Asritha', '2023-04-02 19:50:10'),
(15, 14, 'Asritha', '2023-04-02 20:09:53'),
(16, 19, 'Asritha', '2023-04-02 20:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(254) NOT NULL,
  `passw` varchar(200) NOT NULL,
  `phone_no` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `username`, `email`, `passw`, `phone_no`) VALUES
(5, 'Rishita', 'rishita@gmail.com', '1234', 2147483647),
(7, 'Asritha', 'asritha@gmail.com', '123', 2147483647),
(8, 'dheeraj', 'dheerajmeela1@gmail.com', '123', 2147483647),
(9, 'santosh', 'santosh@gmaill.com', '123', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
