-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 05:48 AM
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
-- Database: `caeldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `cart_price` varchar(255) NOT NULL,
  `cart_quantity` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_status` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_status`, `created_at`) VALUES
(23, 'Beef', 1, '2022-11-24 23:56:25'),
(24, 'Chicken', 1, '2022-11-24 23:59:21'),
(25, 'Pork', 1, '2022-11-27 12:11:20'),
(26, 'Pasta', 1, '2022-11-27 12:19:21'),
(27, 'Dessert', 1, '2022-11-27 12:26:09'),
(28, 'Beverages', 1, '2022-11-27 12:27:32'),
(29, 'Vegetables', 1, '2022-11-27 12:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_detail_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `user_id`, `shipping_id`, `created_at`) VALUES
(13, 93, 4, 'Beef & Mushroom', '300', '1', 5, 40, '2022-12-02 20:37:06'),
(14, 93, 5, 'Breaded Fried Chicken', '150', '1', 5, 40, '2022-12-02 20:37:06'),
(15, 94, 4, 'Beef & Mushroom', '300', '1', 5, 41, '2022-12-02 20:48:27'),
(16, 95, 9, 'Red Iced Tea', '20', '1', 5, 42, '2022-12-05 12:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_schedule` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `rider_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_schedule`, `user_id`, `rider_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`) VALUES
(93, '2022-12-02 20:37:00', 5, 1, 40, 40, '450', 2, '2022-12-02 20:37:06'),
(94, '2022-12-02 20:48:00', 5, 1, 41, 41, '300', 3, '2022-12-02 20:48:27'),
(95, '2022-12-05 12:40:00', 5, 1, 42, 42, '20', 2, '2022-12-05 12:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `shipping_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_method`, `payment_status`, `shipping_id`, `created_at`) VALUES
(40, 'cash', 1, 40, '2022-12-02 20:37:06'),
(41, 'cash', 2, 41, '2022-12-02 20:48:27'),
(42, 'cash', 1, 42, '2022-12-05 12:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` text NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `category_id`, `created_at`) VALUES
(4, 'Beef & Mushroom', '300', 'Good for 5 people. Beef and Mushroom Braised Stew is a rich and flavorful beef stew dish. Loaded with fork-tender beef, mushrooms, and creamy gravy, it’s sure to be a party hit!', 'Beef and Mushroom.jpg', 1, 23, '2022-11-25 00:09:45'),
(5, 'Breaded Fried Chicken', '150', 'Good for 3 persons. Simple but flavorful, fried chicken is a treat for both kids and adults alike. Whether you’re enjoying it at a kid’s birthday party or serving it as an appetizer for game night is a good choice.', 'Breaded Fried Chicken.png', 1, 24, '2022-11-27 12:10:12'),
(6, 'Pork Barbecue', '23', 'Tender pieces of flavorful pork glazed with a sweet and savory sauce and fresh off the grill–these pork BBQ skewers are so mouth-watering that you’ll want to hoard them all on your plate.', 'Pork Barbecue.png', 1, 25, '2022-11-27 12:12:57'),
(7, 'Spaghetti', '55', 'The distinctive sweetness of Filipino spaghetti is derived from the banana ketchup that is sold to various zones with considerable Filipino communities. Hot dog saltiness strikes a wonderful balance with it and also adds a textural snap.', 'Sphagetti.jpg', 1, 26, '2022-11-27 12:22:29'),
(8, 'Buko Pandan', '30', 'Buko Pandan is a popular Filipino Dessert made using young coconut, pandan leaves (or Screwpine leaves), and sago pearls. At first glance, this dessert dish can be mistaken for Buko Salad. Both desserts are almost similar visually.', 'Buko Pandan.jpg', 1, 27, '2022-11-27 12:26:45'),
(9, 'Red Iced Tea', '20', 'Red Iced Tea is a variation of iced tea made with pomegranate juice mixed with brewed with black tea.', 'Red Iced Tea.png', 1, 28, '2022-11-27 12:28:10'),
(10, 'Stir Fry Vegetables', '150', 'A blend of colorful veggies cooked in a sweet and savory honey garlic sauce. An easy side dish or main course that’s light, fresh and totally delicious! Serve your veggie stir fry over rice for a complete meal.', 'Stir-Fried Vegetables.png', 1, 29, '2022-11-27 12:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `rider_id` int(11) NOT NULL,
  `rider_first_name` varchar(255) NOT NULL,
  `rider_last_name` varchar(255) NOT NULL,
  `rider_email` varchar(255) NOT NULL,
  `rider_contact` varchar(255) NOT NULL,
  `rider_address` text NOT NULL,
  `rider_city` varchar(255) NOT NULL,
  `rider_username` varchar(255) NOT NULL,
  `rider_password` varchar(255) NOT NULL,
  `rider_image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`rider_id`, `rider_first_name`, `rider_last_name`, `rider_email`, `rider_contact`, `rider_address`, `rider_city`, `rider_username`, `rider_password`, `rider_image`, `created_at`) VALUES
(1, 'Kenneth ', 'Alvos', 'eresh@gmail.com', '09772880198', '#5 Belfast St. Vista Verde North Executive Village, Brgy. 167, Caloocan City', 'City', 'eresh', 'user123', 'default_avatar.png', '2022-12-03 19:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `shipping_id` int(11) NOT NULL,
  `shipping_first_name` varchar(255) NOT NULL,
  `shipping_last_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_contact` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`shipping_id`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_contact`, `shipping_address`, `shipping_city`, `created_at`) VALUES
(40, 'Patrick', 'Arganza', 'banz@gmail.com', '09772880179', '#7 Belfast St. Vista Verde North Executive Village, Brgy 167, Caloocan City', 'Caloocan City', '2022-12-02 20:37:06'),
(41, 'Patrick', 'Arganza', 'banz@gmail.com', '09772880179', '#7 Belfast St. Vista Verde North Executive Village, Brgy 167, Caloocan City', 'Caloocan City', '2022-12-02 20:48:27'),
(42, 'Patrick', 'Arganza', 'banz@gmail.com', '09772880179', '#7 Belfast St. Vista Verde North Executive Village, Brgy 167, Caloocan City', 'Caloocan City', '2022-12-05 12:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_contact`, `user_address`, `user_city`, `user_username`, `user_password`, `user_role`, `user_image`, `created_at`) VALUES
(5, 'Patrick', 'Arganza', 'banz@gmail.com', '09772880179', '#7 Belfast St. Vista Verde North Executive Village, Brgy 167, Caloocan City', 'Caloocan City', 'banz', '$2y$10$6DidZz8a5UBNExJYLsRx9.wCGJ8NwbyoH.vZU2FnJrLnL/09Yvol2', 'user', '308762815_792867072048927_5535246069055020808_n.jpg', '2022-12-02 02:09:03'),
(6, 'Kurt', 'Cadenas', 'kurtcarveycadenas1401@gmail.com', '09772880178', '#8 Belfast St. Vista Verde North Executive Village, Brgy 167, Caloocan City', 'Caloocan City', 'krtcrvy', '$2y$10$ZUPscgoHNJRw7G7FfWJGi.3rdg1UN4mLqnBZELoSneIKSS5oWFgZu', 'admin', 'default_avatar.png', '2022-12-02 02:12:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`rider_id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `rider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
