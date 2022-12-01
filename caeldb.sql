-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 08:03 AM
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
-- Database: `caeldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cart_price` varchar(255) NOT NULL,
  `cart_quantity` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_status`, `user_id`, `created_at`) VALUES
(23, 'Beef', 1, 3, '2022-11-24 23:56:25'),
(24, 'Chicken', 1, 3, '2022-11-24 23:59:21'),
(25, 'Pork', 1, 3, '2022-11-27 12:11:20'),
(26, 'Pasta', 1, 3, '2022-11-27 12:19:21'),
(27, 'Dessert', 1, 3, '2022-11-27 12:26:09'),
(28, 'Beverages', 1, 3, '2022-11-27 12:27:32'),
(29, 'Vegetables', 1, 3, '2022-11-27 12:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `category_id`, `created_at`) VALUES
(4, 'Beef & Mushroom', '300', 'Good for 5 people. Beef and Mushroom Braised Stew is a rich and flavorful beef stew dish. Loaded with fork-tender beef, mushrooms, and creamy gravy, it’s sure to be a party hit!', 'Beef and Mushroom.jpg', 1, 23, '2022-11-25 00:09:45'),
(5, 'Breaded Fried Chicken', '150', 'Good for 3 persons. Simple but flavorful, fried chicken is a treat for both kids and adults alike. Whether you’re enjoying it at a kid’s birthday party or serving it as an appetizer for game night is a good choice.', 'Breaded Fried Chicken.png', 1, 24, '2022-11-27 12:10:12'),
(6, 'Pork Barbecue', '23', 'Tender pieces of flavorful pork glazed with a sweet and savory sauce and fresh off the grill–these pork BBQ skewers are so mouth-watering that you’ll want to hoard them all on your plate.', 'Pork Barbecue.png', 1, 25, '2022-11-27 12:12:57'),
(7, 'Spaghetti', '55', 'The distinctive sweetness of Filipino spaghetti is derived from the banana ketchup that is sold to various zones with considerable Filipino communities. Hot dog saltiness strikes a wonderful balance with it and also adds a textural snap.', 'Sphagetti.jpg', 1, 26, '2022-11-27 12:22:29'),
(8, 'Buko Pandan', '30', 'Buko Pandan is a popular Filipino Dessert made using young coconut, pandan leaves (or Screwpine leaves), and sago pearls. At first glance, this dessert dish can be mistaken for Buko Salad. Both desserts are almost similar visually.', 'Buko Pandan.jpg', 1, 27, '2022-11-27 12:26:45'),
(9, 'Red Iced Tea', '20', 'Red Iced Tea is a variation of iced tea made with pomegranate juice mixed with brewed with black tea.', 'Red Iced Tea.png', 1, 28, '2022-11-27 12:28:10'),
(10, 'Stir Fry Vegetables', '150', 'A blend of colorful veggies cooked in a sweet and savory honey garlic sauce. An easy side dish or main course that’s light, fresh and totally delicious! Serve your veggie stir fry over rice for a complete meal.', 'Stir-Fried Vegetables.png', 1, 29, '2022-11-27 12:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_contact` varchar(255) DEFAULT NULL,
  `user_address` text DEFAULT NULL,
  `user_city` varchar(255) DEFAULT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'user',
  `user_image` text NOT NULL DEFAULT 'default_avatar.png',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_contact`, `user_address`, `user_city`, `user_username`, `user_password`, `user_role`, `user_image`, `created_at`) VALUES
(3, 'Kurt Carvey', 'Cadenas', 'kurtcarveycadenas1401@gmail.com', NULL, NULL, NULL, 'krtcrvy', '$2y$10$E4dHFzW4LElasXnPJFHsFuXpQNl2AFfRGJS.89JSPSuWPOyx/KB5C', 'admin', 'default_avatar.png', '2022-11-24 21:20:36'),
(4, 'Patrick Eugene', 'Arganza', 'banz@gmail.com', NULL, NULL, NULL, 'banz', '$2y$10$Rf/vlWjI5JRDcYktRa7sm.GFcLDNRJaJQunUOkKQK.wgWDgpXRAYG', 'user', 'default_avatar.png', '2022-11-24 22:20:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
