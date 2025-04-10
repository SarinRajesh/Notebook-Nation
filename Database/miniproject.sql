-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2024 at 05:32 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id20642500_miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `lap_id` int(20) NOT NULL,
  `person` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `selected` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `lap_id`, `person`, `image`, `name`, `price`, `quantity`, `selected`) VALUES
(147, 25, 'Sarin50', 'lap13.jpg', 'DELL G15', '79990', '2', 'yes'),
(148, 27, 'Sarin50', 'lap1.jpg', 'HP Pavilion Gaming', '85500', '3', 'no'),
(149, 24, 'user2', 'lap3.jpg', 'Lenovo Legion 5', '117500', '1', 'no'),
(151, 25, 'user2', 'lap13.jpg', 'DELL G15', '79990', '1', 'yes'),
(152, 26, 'user2', 'lap10.jpg', 'acer Predator Helios 300', '134999', '1', ''),
(153, 24, 'Sarin50', 'lap3.jpg', 'Lenovo Legion 5', '117500', '1', 'no'),
(154, 21, 'Sarin50', 'lap11.jpg', 'HP OMEN', '166549', '1', 'no'),
(155, 25, 'Sarin50', 'lap13.jpg', 'DELL G15', '79990', '1', 'yes'),
(156, 25, 'sarin', 'lap13.jpg', 'DELL G15', '79990', '1', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(20) NOT NULL,
  `queries` varchar(2000) NOT NULL,
  `replies` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(2, 'hi|hey', 'Hi, how can I help you?'),
(3, ' Hi, can you help me find a good laptop for gaming?|gaming laptop', 'Sure, what\'s your budget?'),
(4, 'I have a budget of around 75000.|60000|50000|80000|90000|100000', 'We have a range of laptops in that price range that are great for gaming. Do you have any specific requirements or preferences?'),
(5, ' I want something with a good graphics card and at least 8GB of RAM.', 'I would recommend the ASUS TUF Gaming laptop. It has an NVIDIA GeForce GTX 1650 graphics card and 8GB of RAM. It also has a fast processor and a large storage capacity.'),
(6, 'How much does it cost?', 'It\'s currently priced at $999. Would you like me to show you some other options in that price range?'),
(7, 'No, that sounds good. Can you tell me about the warranty?', 'Sure, the laptop comes with a one-year warranty that covers any hardware defects. We also offer extended warranties for an additional fee if you\'re interested.'),
(8, 'Great, I think I\'ll go ahead and buy it. How do I place an order?', 'You can order it directly from our website. Just add it to your cart and proceed to checkout. If you have any questions during the process, feel free to ask me for assistance.'),
(9, 'Hi, I\'m looking for a laptop for basic everyday use. What do you recommend?', 'Sure, we have a wide range of laptops for everyday use. What is your budget?'),
(10, 'I\'m looking to spend around 65000.', 'Great, I recommend the HP Pavilion laptop. It has a 15.6-inch display, an AMD Ryzen 5 processor, 8GB of RAM, and a 512GB SSD.'),
(11, 'Yes, that should be enough. Can you tell me about the return policy?', 'Sure, we have a 30-day return policy for all of our products. If you\'re not satisfied with your purchase for any reason, you can return it within 30 days for a full refund.');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `id` int(20) NOT NULL,
  `lap_id` int(11) NOT NULL,
  `person` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `processor` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `storage` varchar(20) NOT NULL,
  `display` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compare`
--

INSERT INTO `compare` (`id`, `lap_id`, `person`, `image`, `name`, `processor`, `ram`, `storage`, `display`, `price`) VALUES
(40, 26, 'user1', 'lap10.jpg', 'Predator Helios 300', 'INTEL i9', '16GB', '1TB SSD', '15.6inch', '134999'),
(41, 24, 'user1', 'lap3.jpg', 'Legion 5', 'AMD Ryzen 7', '16GB', '512GB SSD', '15.6inch', '117500'),
(42, 22, 'user1', 'lap16.jpg', 'Alienware', 'INTEL i9', '32GB', '1TB SSD', '15.6inch', '202490'),
(43, 25, 'Sarin5', 'lap13.jpg', 'DELL G15', 'INTEL i5', '8GB', '512GB SSD', '15.6inch', '79990'),
(44, 24, 'Sarin5', 'lap3.jpg', 'Legion 5', 'AMD Ryzen 7', '16GB', '512GB SSD', '15.6inch', '117500'),
(45, 26, 'Sarin5', 'lap10.jpg', 'Predator Helios 300', 'INTEL i9', '16GB', '1TB SSD', '15.6inch', '134999'),
(46, 15, 'Sarin50', 'lap7.jpg', 'HP Victus', 'INTEL i5', '16GB', '512GB SSD', '15.6inch', '62990'),
(47, 18, 'Sarin50', 'lap5.jpg', 'MSI Bravo 15', 'AMD Ryzen 5', '8GB', '512GB SSD', '15.6inch', '49990'),
(48, 25, 'user2', 'lap13.jpg', 'DELL G15', 'INTEL i5', '8GB', '512GB SSD', '15.6inch', '79990'),
(49, 25, 'sarin', 'lap13.jpg', 'DELL G15', 'INTEL i5', '8GB', '512GB SSD', '15.6inch', '79990'),
(50, 19, 'Sandra', 'lap15.jpg', 'MSI Raider GE66', 'INTEL i7', '16GB', '1TB SSD', '15.6inch', '244990');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `file` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `available` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`id`, `name`, `email`, `phone`, `username`, `password`, `file`, `status`, `role`, `available`) VALUES
(11, 'admin', 'admin@gmail.com', '9494849443', 'admin', 'Sarin@12', '', 'active', 'admin', ''),
(12, 'employee', 'employee@gmail.com', '9497449294', 'employee', 'Sarin@12', '', 'active', 'employee', ''),
(13, 'ASUS', 'asus@gmail.com', '9497449290', 'asus', 'Sarin@12', '', 'active', 'vendor', ''),
(14, 'delivery boy1', 'boy1@gmail.com', '9497449291', 'boy1', 'Sarin@12', '', 'active', 'delivery boy', 'not available'),
(15, 'delivery boy2', 'boy2@gmail.com', '9497449294', 'boy2', 'Sarin@12', '', 'active', 'delivery boy', ''),
(16, 'delivery boy3', 'boy3@gmail.com', '9497009297', 'boy3', 'Sarin@12', '', 'active', 'delivery boy', 'not available'),
(17, 'delivery boy4', 'boy4@gmail.com', '9497449298', 'boy4', 'Sarin@12', '', 'active', 'delivery boy', ''),
(18, 'MSI', 'msi@gmail.com', '9848328345', 'msi', 'Sarin@12', '', 'active', 'vendor', ''),
(19, 'HP', 'hp@gmail.com', '9497449212', 'hp', 'Sarin@12', '', 'active', 'vendor', 'available'),
(20, 'Lenovo', 'lenovo@gmail.com', '9497449244', 'lenovo', 'Sarin@12', '', 'active', 'vendor', ''),
(21, 'Dell', 'dell@gmail.com', '9497440294', 'dell', 'Sarin@12', '', 'active', 'vendor', ''),
(22, 'acer', 'acer@gmail.com', '9491449290', 'acer', 'Sarin@12', '', 'active', 'vendor', '');

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `id` int(11) NOT NULL,
  `file` varchar(20) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `processor` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `storage` varchar(20) NOT NULL,
  `display` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `stock` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`id`, `file`, `vendor`, `name`, `processor`, `ram`, `storage`, `display`, `price`, `stock`) VALUES
(11, 'lap12.jpg', 'ASUS', 'ASUS TUF Gaming A17', 'AMD Ryzen 5', '8GB', '512GB SSD', '15.6inch', '63500', '5'),
(12, 'lap9.jpg', 'Lenovo', 'Lenovo Ideapad Gaming', 'INTEL i5', '8GB', '512GB SSD', '15.6inch', '53000', '30'),
(14, 'lap1.jpg', 'HP', 'HP Pavilion Gaming', 'AMD Ryzen 5', '16GB', '512GB SSD', '15.6inch', '75990', '37'),
(15, 'lap7.jpg', 'HP', 'HP Victus', 'INTEL i5', '16GB', '512GB SSD', '15.6inch', '62990', '3'),
(16, 'lap4.jpg', 'acer ', 'acer Nitro 5', 'INTEL i5', '8GB', '512GB SSD', '15.6inch', '79990', '31'),
(17, 'lap2.jpg', 'ASUS', 'ASUS ROG Strix', 'AMD Ryzen 7', '16GB', '512GB SSD', '15.6inch', '99990', '42'),
(18, 'lap5.jpg', 'MSI ', 'MSI Bravo 15', 'AMD Ryzen 5', '8GB', '512GB SSD', '15.6inch', '49990', '38'),
(19, 'lap15.jpg', 'MSI', 'MSI Raider GE66', 'INTEL i7', '16GB', '1TB SSD', '15.6inch', '244990', '38'),
(20, 'lap6.jpg', 'ASUS', 'ASUS ROG Zephyrus', 'AMD Ryzen 7', '8GB', '1TB SSD', '14inch', '76990', '45'),
(21, 'lap11.jpg', 'HP', 'HP OMEN', 'INTEL i7', '16GB', '1TB SSD', '15.6inch', '166549', '40'),
(22, 'lap16.jpg', 'DELL', 'DELL Alienware', 'INTEL i9', '32GB', '1TB SSD', '15.6inch', '202490', '48'),
(23, 'lap14.jpg', 'ASUS', 'ASUS TUF Dash', 'INTEL i7', '16GB', '1TB SSD', '15.6inch', '83990', '28'),
(24, 'lap3.jpg', 'Lenovo', 'Lenovo Legion 5', 'AMD Ryzen 7', '16GB', '512GB SSD', '15.6inch', '117500', '31'),
(25, 'lap13.jpg', 'DELL', 'DELL G15', 'INTEL i5', '8GB', '512GB SSD', '15.6inch', '79990', '7'),
(26, 'lap10.jpg', 'acer', 'acer Predator Helios 300', 'INTEL i9', '16GB', '1TB SSD', '15.6inch', '134999', '25'),
(27, 'lap1.jpg', 'HP', 'HP Pavilion Gaming', 'INTEL i7', '16GB', '512GB SSD', '15.6inch', '85500', '26');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(20) NOT NULL,
  `lap_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `order_date` varchar(20) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `delivery_boy` varchar(20) NOT NULL,
  `delivery_date` varchar(20) NOT NULL,
  `delivery_status` varchar(20) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `refund` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `lap_id`, `quantity`, `amount`, `fullname`, `username`, `phone`, `pincode`, `city`, `district`, `state`, `order_date`, `order_status`, `delivery_boy`, `delivery_date`, `delivery_status`, `otp`, `refund`) VALUES
(1, 25, 1, '80060', 'Sarin Rajesh', 'sarin', '9497449297', '688537', 'eramalloor', 'ALPY', 'kerala', '2023-04-27', 'Confirmed', 'boy2', '2023-04-28', 'Delivered', 'Verified', ''),
(2, 25, 1, '80060', 'Sarin Rajesh', 'sarin', '9497449297', '688537', 'eramalloor', 'ALPY', 'kerala', '2023-04-27', 'Cancelled', 'Not assigned', 'Pending', 'Pending', 'Pending', 'Completed'),
(3, 14, 1, '76060', 'Sarin Rajesh', 'sarin', '9497449297', '688537', 'eramalloor', 'ALPY', 'kerala', '2023-04-27', 'Confirmed', 'boy4', '2023-05-06', 'Pending', 'Pending', ''),
(4, 25, 1, '80060', 'Sarin Rajesh', 'sarin', '9497449297', '688537', 'eramalloor', 'ALPY', 'kerala', '2023-04-27', 'Not confirmed', 'Not assigned', 'Pending', 'Pending', 'Pending', ''),
(5, 25, 1, '80060', 'sandrarajesh', 'Sandra', '9446807743', '688537', 'Alappuzha', 'alpy', 'Kerala', '2023-08-19', 'Not confirmed', 'Not assigned', 'Pending', 'Pending', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `lap_id` int(20) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `lap_id`, `username`, `payment_status`, `payment_id`, `added_on`) VALUES
(1, 25, 'sarin', 'pending', '', '2023-04-27'),
(2, 25, 'sarin', 'complete', 'pay_LiqnH9AxCNpn9S', '2023-04-27'),
(3, 14, 'sarin', 'complete', 'pay_Liqocy9QnfnjGe', '2023-04-27'),
(4, 25, 'sarin', 'complete', 'pay_LiqpTZTTfg56SV', '2023-04-27'),
(5, 25, 'Sandra', 'complete', 'pay_MRpHdpWKa818Td', '2023-08-19');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `file` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`id`, `name`, `phone`, `email`, `pincode`, `city`, `district`, `state`, `username`, `password`, `file`, `status`, `role`) VALUES
(1, 'Sarin Rajesh', '9497449297', 'sarinkannattuthara@gmail.com', '688537', 'eramalloor', 'ALPY', 'kerala', 'sarin', 'Sarin@123', '', 'active', 'customer'),
(2, 'sandrarajesh', '9446807743', 'sandrarajesh20@gmail.com', '688537', 'Alappuzha', 'alpy', 'Kerala', 'sandra', 'Sandra@123', 'wwww.png', 'inactive', 'customer'),
(3, 'sandrarajesh', '9446807743', 'sandrarajesh166@gmail.com', '688537', 'Alappuzha', 'alpy', 'Kerala', 'sandra', 'Sandra@123', 'wwww.png', 'inactive', 'customer'),
(4, 'fdg', '7945612301', 'me@fdg.tfh', '', '', '', '', 'fgsgs', 'qwe123@W', '', 'active', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(20) NOT NULL,
  `lap_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(60) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `complaint` varchar(80) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `lap_id`, `order_id`, `fullname`, `username`, `phone`, `address`, `vendor`, `image`, `name`, `complaint`, `status`, `date`) VALUES
(1, 25, 1, 'Sarin Rajesh', 'sarin', '9497449297', 'eramalloor, ALPY, kerala, 688537', 'DELL', 'lap13.jpg', 'DELL G15', 'Screen blackout issue.', 'Serviced', '2023-04-28'),
(2, 25, 1, 'Sarin Rajesh', '', '9497449297', 'eramalloor, ALPY, kerala, 688537', 'DELL', 'lap13.jpg', 'DELL G15', 'Screen blackout issue.', 'Not confirmed', 'Not confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(20) NOT NULL,
  `lap_id` int(20) NOT NULL,
  `person` varchar(20) NOT NULL,
  `image` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `processor` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `storage` varchar(20) NOT NULL,
  `display` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `lap_id`, `person`, `image`, `name`, `processor`, `ram`, `storage`, `display`, `price`) VALUES
(12, 24, 'user1', 'lap3.jpg', 'Legion 5', 'AMD Ryzen 7', '16GB', '512GB SSD', '15.6inch', '117500'),
(13, 27, 'user1', 'lap1.jpg', 'Pavilion Gaming', 'INTEL i7', '16GB', '512GB SSD', '15.6inch', '85500'),
(14, 18, 'Sarin5', 'lap5.jpg', 'Bravo 15', 'AMD Ryzen 5', '8GB', '512GB SSD', '15.6inch', '49990'),
(15, 25, 'Sarin5', 'lap13.jpg', 'G15', 'INTEL i5', '8GB', '512GB SSD', '15.6inch', '79990'),
(16, 25, 'Sarin5', 'lap13.jpg', 'DELL G15', 'INTEL i5', '8GB', '512GB SSD', '15.6inch', '79990'),
(17, 18, 'Sarin50', 'lap5.jpg', 'MSI Bravo 15', 'AMD Ryzen 5', '8GB', '512GB SSD', '15.6inch', '49990'),
(18, 14, 'user2', 'lap1.jpg', 'HP Pavilion Gaming', 'AMD Ryzen 5', '16GB', '512GB SSD', '15.6inch', '75990'),
(19, 14, 'sarin', 'lap1.jpg', 'HP Pavilion Gaming', 'AMD Ryzen 5', '16GB', '512GB SSD', '15.6inch', '75990'),
(20, 25, 'Sandra', 'lap13.jpg', 'DELL G15', 'INTEL i5', '8GB', '512GB SSD', '15.6inch', '79990');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lap_id` (`lap_id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lap_id` (`lap_id`);

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `lap_id` (`lap_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lap_id` (`lap_id`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `lap_id` (`lap_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lap_id` (`lap_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reg`
--
ALTER TABLE `reg`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`lap_id`) REFERENCES `laptops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
