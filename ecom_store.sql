-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 08, 2020 at 02:08 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(10) NOT NULL,
  `about_heading` text NOT NULL,
  `about_short_desc` text NOT NULL,
  `about_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `about_heading`, `about_short_desc`, `about_desc`) VALUES
(1, 'About Us - Our Story', '\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,\r\n', 'Knowing that the Internet can be impersonal, our goal is to provide a secure online shopping experience while offering the personal attention customers associate with old fashioned “brick and mortar” candy shops where you could ask for something special and expect a smile from across the counter.\r\n\r\nUnlike other online stores whose aim is strictly commercial, we hope visitors enjoy our Blog and Educational sections and learn about beloved products that have a place in so many corners of America.\r\n\r\nOur website features more than 3,000 varieties of candy from companies such as Brach’s, Ferrara Pan, Just Born, and more. All merchandise is housed in a temperature-controlled warehouse operated by McKeesport Candy Company, one of the oldest wholesale candy companies in the nation, ensuring that you have the freshest product delivered to your doorstep.');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_contact`) VALUES
(2, 'admin', 'admin@candyland.com', '123', '077885221');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `customer_id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_product_quantity` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_fname` varchar(255) NOT NULL,
  `customer_lname` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_pincode` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_fname`, `customer_lname`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_pincode`, `status`) VALUES
(3, 'Parashar', 'Parikh', 'parasharparikh18@gmail.com', '$2y$10$gwVluI2TT4toOgC.hcRzseRUDum4cCvLfyQV51l0aJHNRMGLikSE6', 'United States', 'Dallas', '4699960969', '3600 Alma Road Apt#3222 Richardson', '75080', 'a'),
(4, 'romil', 'siddh', 'romil@gmail.com', '$2y$10$2gANeBDWGMwT1R73lQQlZO2SVJl6npMVuQq/7POafAzrSLy449ArS', 'wrf', 'sdfslkjfl', '1234567890', 'fsdlfkjs', '12345', 'a'),
(6, 'Parashar', 'Parikh', 'akprajapati@gmail.com', '$2y$10$pb79MHCnpDoDUefz2Tb6Buc404j7/JstKGSx9uClMzZp9Yf3sv34S', 'United States', 'Dallas', '4699960969', '3600 Alma Road Apt#3222 Richardson', '75080', 'a'),
(9, 'Parashar', 'Parikh', 'parasharparikh@gmail.com', '$2y$10$W2dR79vmNtE7ykClTkKmoOZt71rEX.lUs21EqOauX6hQsSdidvvUa', 'United States', 'Dallas', '4699960969', '3600 Alma Road Apt#3222 Richardson', '75080', 'a'),
(10, 'Parashar', 'Parikh', 'pxp@gmail.com', '$2y$10$.dOFCbQQ1Gtf632GsYFSPerFBA8OoWSrbBp8QlipSh1dwOLq6EC46', 'United States', 'Dallas', '4699960969', '3600 Alma Road Apt#3222 Richardson', '75080', 'a'),
(13, 'Aakash', 'Prajapati', 'aakashprajapati@gmail.com', '$2y$10$TC.qS9j1QfvhGg9npLzzhOaTQjbsBk55MX36WE01EDwC/.hoeUHAG', 'United States', 'Dallas', '4699960969', '3600 Alma Road Apt#3222 Richardson', '75080', 'a'),
(14, 'Aakash', 'Prajapati', 'qwer@gmail.com', '$2y$10$kof7/KrEN/YmO7OIQqgPcOIZ5Wo9EhO49ElvBYib8AVRaRuqfMNYi', 'India', 'nadiad', '2682520502', 'college road', '38700', 'a'),
(18, 'aakash', 'Parikh', 'pxp11111111@gmail.com', '$2y$10$T08paoYhN.fJuMgCqmL3/epZbCdVtGuRLQT9t.1zc7gP5QT2gb.vC', 'India', 'Richardson', '4699960969', '3600 Alma Road, #3222', '75080', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_title` text NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_amount` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `product_title`, `invoice_no`, `qty`, `order_date`, `total_amount`) VALUES
(37, 3, 'Harsheys Chocolate Bar', 2035414335, 2, '2020-05-07 22:04:15', '140'),
(38, 3, 'Haribo Mix', 1316002985, 1, '2020-05-07 22:27:27', '50'),
(39, 6, 'Haribo Mix', 690143075, 3, '2020-05-07 23:20:00', '150'),
(40, 6, 'Haribo Mix', 1884313649, 2, '2020-05-07 23:26:26', '100'),
(41, 6, 'M&M Box', 616950007, 1, '2020-05-07 23:28:57', '100'),
(42, 6, 'Twizzlers Rainbow', 1564499233, 2, '2020-05-07 23:30:27', '30'),
(46, 10, 'M&M Box', 1425083462, 3, '2020-05-08 00:10:46', '300'),
(50, 3, 'Jelly Belly Mix', 659553626, 4, '2020-05-08 01:28:47', '400');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `manufacturer_id` int(10) NOT NULL,
  `manufacturer_title` text NOT NULL,
  `manufacturer_top` text NOT NULL,
  `manufacturer_image` text NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`manufacturer_id`, `manufacturer_title`, `manufacturer_top`, `manufacturer_image`, `status`) VALUES
(2, 'Ferrero', 'no', 'Ferrero.jpg', 'a'),
(3, 'Nestle', 'no', 'Nestle.jpg', 'a'),
(4, 'Harsheys', 'no', 'HersheysLogo.jpg', 'a'),
(5, 'Lindt', 'no', 'Lindt.jpg', 'a'),
(6, 'Haribo', 'no', 'Haribo.jpg', 'a'),
(7, 'Mars', 'no', 'Mars.png', 'a'),
(8, 'Twizzlers', 'no', 'Twizzlers.jpg', 'a'),
(9, 'Starbust', 'no', 'Starbust.png', 'a'),
(10, 'Skittels', 'no', 'Skittles.jpg', 'a'),
(11, 'Sourpatch', 'no', 'Sourpatchkids.png', 'a'),
(12, 'M&M', 'no', 'M&M.jpg', 'a'),
(13, 'JellyBelly', 'no', 'jellybelly.jpg', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_url` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_psp_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_label` text NOT NULL,
  `product_quantity` int(20) NOT NULL DEFAULT '0',
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_psp_price`, `product_desc`, `product_keywords`, `product_label`, `product_quantity`, `status`) VALUES
(1, 5, 4, '2020-05-08 00:53:45', 'Harsheys Chocolate Bar', 'Harsheys-Chocolate-Bar', 'all-city-candy-hersheys2.jpg', 'all-city-candy-hershersheys3.jpg', 'Harsheys1.jpg', 70, 50, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla</p>', 'Chocolate', 'Sale', 0, 'a'),
(2, 5, 4, '2020-05-08 01:00:55', 'Harsheys Kisses', 'Harsheys-Kisses', 'harsheskiss2.jpg', 'harsheskiss1.jpg', 'harsheskiss3.jpg', 69, 45, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'Chocolate', 'Gift', 2, 'a'),
(3, 5, 2, '2020-05-07 04:40:29', 'Ferrero Rocher', 'Ferrero-Rocher', 'ferrero3.jpg', 'ferrero1.jpg', 'ferrero2.jpg', 98, 0, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla</p>', 'Ferrero Rocher', 'New', 0, 'a'),
(4, 5, 2, '2020-05-07 22:08:47', 'Ferrero Rocher Grand', 'Ferrero-Rocher-Grand', 'ferrerogrand1.jpg', 'ferrerogrand3.jpg', 'ferrerogrand2.jpg', 230, 150, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'Ferrero Rocher Grand', 'Sale', 10, 'a'),
(5, 5, 3, '2020-05-07 22:08:50', 'Nestle Kitket', 'Nestle-Kitket', 'kitket1.jpg', 'kitket2.jpg', 'kitket3.jpg', 25, 100, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'Nestle Kitket', 'New', 15, 'a'),
(6, 5, 3, '2020-05-07 22:08:56', 'Nestle Swiss', 'Nestle-Swiss', 'swiss3.jpg', 'swiss2.jpg', 'swiss1.jpg', 96, 0, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'Nestle Swiss', 'New', 2, 'a'),
(7, 5, 5, '2020-05-07 22:09:03', 'Lindt Choco', 'Lindt-Choco', 'lindtchoco2.jpg', 'lindtchoco1.jpg', 'lindtchoco3.jpg', 200, 150, '<p>Video provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document. kingVideo provides a powerful way to help you prove your point. When you click Online Video, you can paste in the embed code for the video you want to add. You can also type a keyword to search online for the video that best fits your document</p>', 'Lindt Choco', 'Sale', 1, 'a'),
(8, 5, 5, '2020-05-07 22:09:08', 'Lindt Bars', 'Lindt-Bars', 'lindtbar1.jpg', 'lindtbar3.jpg', 'lindtbar2.jpg', 245, 100, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'Lindt Bars', 'New', 7, 'a'),
(9, 4, 6, '2020-05-07 22:09:13', 'Haribo Gummy Bears', 'Haribo-Gummy-Bears', 'haribobears1.png', 'haribobears2.png', 'haribobears3.png', 50, 0, '<p>Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.Integer tristique dictum sapien et lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed sed imperdiet magna, at rhoncus arcu. Cras tincidunt felis eu vehicula consequat. Proin vel gravida quam. In tincidunt aliquam nisl. Sed velit erat, aliquam sit amet metus eget, molestie auctor nulla.</p>', 'Haribo Gummy Bears', 'New', 10, 'a'),
(10, 4, 8, '2020-05-07 22:09:16', 'Twizzlers Strings', 'Twizzlers-Strings', 'Twizzlers1.jpg', 'Twizzlers2.jpg', 'Twizzlers3.jpg', 25, 25, '<p>10</p>', 'Twizzlers', 'Sale', 25, 'a'),
(11, 4, 6, '2020-05-07 23:26:26', 'Haribo Mix', 'Haribo-Mix', 'Haribomix1.jpg', 'haribomix2.jpg', 'haribomix3.jpg', 50, 40, '<p>Haribo Mix</p>', 'Haribo Mix', 'Sale', 9, 'a'),
(13, 4, 8, '2020-05-08 01:05:14', 'Twizzlers Rainbow', 'Twizzlers-Rainbow', 'Twizzlersrainbow2.jpg', 'Twizzlersrainbow3.jpg', 'Twizzlersrainbow1.jpg', 15, 15, '<p>Twizzlers Rainbow</p>', 'Twizzlers Rainbow', 'New', 5, 'a'),
(14, 7, 12, '2020-05-08 01:15:10', 'M&M Box', 'MnM-Box', 'M&M1.jpg', 'M&M3.jpg', 'M&M2.jpg', 100, 75, '<p>M&M Box</p>', 'M&M Box', 'Sale', 25, 'a'),
(15, 6, 13, '2020-05-08 01:30:29', 'Jelly Belly Mix', 'Jelly-Belly-Mix', 'Jellybellu1.jpg', 'Jellybellu2.jpg', 'Jellybellu3.jpg', 100, 100, '<p>Jelly Belly Mix</p>', 'Jelly Belly Mix', 'New', 36, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_top` text NOT NULL,
  `p_cat_image` text NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_top`, `p_cat_image`, `status`) VALUES
(4, 'Candy', 'no', 'Candy.jpg', 'a'),
(5, 'Chocolate', 'no', 'chocolate.jpeg', 'a'),
(6, 'Jelly Beans', 'no', 'jellybeans.jpg', 'a'),
(7, 'M&Ms', 'no', 'M&Ms.jpg', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `customer_id`, `product_id`) VALUES
(2, 2, 8),
(3, 3, 1),
(4, 3, 2),
(5, 4, 15),
(6, 3, 11),
(7, 6, 11),
(8, 7, 1),
(9, 9, 1),
(10, 10, 14),
(11, 15, 13),
(12, 16, 2),
(13, 17, 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `manufacturer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
