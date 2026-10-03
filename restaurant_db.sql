-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2026 at 02:28 PM
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
-- Database: `restaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `order_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `price`, `description`, `category`, `image`, `create_at`) VALUES
(1, 'Fried Noodle', 6000, ' Quick to prepare and that do not require fancy substitute products', 'Fried', '1788232274_fried_noodle.jpg', '2026-08-30 13:21:01'),
(13, 'Fried Rice', 6000, 'A popular dish of cooked rice that is stir-fried in a wok', 'Fried', '1788353186_Fried-Rice-Recipe.jpg', '2026-08-31 14:10:31'),
(15, 'Kyar Zan Kyaw', 6000, 'Soft and delicious fried kyar zan', 'Fried', '1788233352_Kyar_Zan.png', '2026-09-01 03:29:12'),
(17, 'Fried Chicken', 4998, 'Extra crispy buttermilk fried chicken', 'Fried', '1788271898_fried_chicken.png', '2026-09-01 14:11:38'),
(19, 'Simple Green Salad', 5500, 'Green salad recipe is simple and packed with delicious textures.', 'Salad', '1788274573_green-salad-1.jpg', '2026-09-01 14:23:49'),
(23, 'Chopped Salad', 5500, ' Chopped salad is so flavorful that even salad skeptics will pile', 'Salad', '1788274983_chopped_salad.png', '2026-09-01 15:03:03'),
(25, 'Arugula Salad', 5499, 'Arugula salad recipe is a fresh, quick, and easy side salad.', 'Salad', '1788275185_augula_salad.png', '2026-09-01 15:06:25'),
(30, 'Mango Juice', 5000, 'This refreshing mango juice made with fresh ripe mangoes', 'Juice', '1788313920_mango-juice.jpg', '2026-09-02 01:52:00'),
(31, 'Tea Salad', 5500, 'A Shortcut to Buzzy Burmese Tea Leaf Salad', 'Salad', '1788314186_laphat.png', '2026-09-02 01:56:26'),
(33, 'Watermelon Juice', 5500, 'Perfect for a hot summer afternoon.', 'Juice', '1788316332_watermelon-Juice.jpg', '2026-09-02 01:59:56'),
(35, 'Strawberry Juice', 7000, 'A perfect sweet and tangy breakfast drink for busy mornings', 'Juice', '1788316341_blueberry-strawberry-Juice.jpg', '2026-09-02 02:09:41'),
(37, 'Papaya Juice', 5000, 'It’s particularly useful in curing diseases related to blood', 'Juice', '1788315847_papaya-juice.jpg', '2026-09-02 02:24:07'),
(38, 'Mote Hin Khar', 3000, 'The most popular food of Myanmar', 'hot', '1788521533_yangon-mote-hin-khar.jpg', '2026-09-04 11:32:13'),
(39, 'Laphat thoke', 3000, 'Regarded as a national delicacy that plays a significant role in Myanmar', 'hot', '1788840094_laphat.png', '2026-09-04 11:40:50'),
(40, 'Kone Baung Kyaw', 6000, 'Its always a bit oily, but it will always tastes delicious!', 'hot', '1788835908_Kone_baung.png', '2026-09-08 02:51:48'),
(41, 'Fried Chicken', 5500, 'A universally loved comfort food known for its satisfyingly crunchy exterior', 'hot', '1788836067_fried_chicken.png', '2026-09-08 02:54:27'),
(42, 'Featured Menu1', 0, '', 'feature', '1788869678_Screenshot 2026-09-08 184234.png', '2026-09-08 04:00:30'),
(43, 'Featured Menu', 0, '', 'feature', '1788842040_featured1.png', '2026-09-08 04:03:05'),
(44, 'Featured Menu', 0, '', 'feature', '1788840336_featured3.png', '2026-09-08 04:05:36'),
(45, 'Featured Menu', 0, '', 'feature', '1788840359_featured4.png', '2026-09-08 04:05:59'),
(46, 'Featured Menu', 0, '', 'feature', '1788840376_featured5.png', '2026-09-08 04:06:16'),
(47, 'Featured Menu', 0, '', 'feature', '1788840395_featured6.png', '2026-09-08 04:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `crte_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `crte_at`) VALUES
(1, 'Nyan', '$2y$10$nDT5EPjM7T2PKJKMkeHDxOib4CHFZyWB5MwET.M0atO38fJ/gL5oS', '2026-09-02 13:43:56'),
(3, 'Ling', '$2y$10$C7k58VS.Ne6sRekkydoxxuiBU3tQ31jewIHL/bl9d13laZ2OjHL6m', '2026-09-02 13:46:21'),
(6, 'Aung', '$2y$10$xt6eGjfWnl4NqsfxYOOSwOAyo/.ff4kJGvAiBagepmQ9k.GU97kni', '2026-09-28 06:00:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
