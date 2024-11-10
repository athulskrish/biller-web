-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 11:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keramfvp_smartpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_cell` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_cell`, `customer_email`, `customer_address`) VALUES
(21, 'Jhonson', '8801954796214', 'jhonson@gmail.com', 'Australia'),
(10, 'Jasim Uddin', '+8855775555', 'jasim@gmail.com', 'Chittagong'),
(13, 'Rakib Uddin', '+8888558888', 'rakib@gmail.com', 'Agrabad, Ctg'),
(32, 'athul s', '66464646464', 'ahahhahaha@gmail.com', 'ahahhaha'),
(33, 'hi', '51264697805', 'a@g.clm', '122'),
(34, 'amal kumar', '7501989432', 'amal@gmail.com', 'amal');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(255) NOT NULL,
  `expense_name` varchar(255) NOT NULL,
  `expense_note` varchar(255) NOT NULL,
  `expense_amount` varchar(255) NOT NULL,
  `expense_date` varchar(255) NOT NULL,
  `expense_time` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense_name`, `expense_note`, `expense_amount`, `expense_date`, `expense_time`, `timestamp`) VALUES
(4, 'Snacks Bil', 'Snacks Bill', '50', '2020-05-12', '11:01 AM', '2020-06-06 18:31:42'),
(52, 'asdadasd', 'asdasdasd', '52.96', '2021-07-30', '12:28 AM', '2021-07-30 00:28:29'),
(28, 'Employment Cost', 'cost for employee ', '5000.25', '2020-06-07', '09:42 PM ', '2020-11-25 06:09:07'),
(47, 'Employee Salary', 'Employee Salary', '2000', '2021-03-12', '12:41 AM', '2021-04-20 18:36:39'),
(51, 'asdasda', 'sdasdasd', '69.99', '2021-07-30', '12:28 AM', '2021-07-30 00:28:15'),
(49, 'mi gasto', 'kasjdkajsd', '123.223', '2021-07-29', '1:57 PM', '2021-07-28 21:57:23'),
(53, 'name', 'note', '250', '2024-09-26', '11:30 PM', '2024-09-26 18:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `product_name` text NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_order_date` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `invoice_id`, `product_name`, `product_quantity`, `product_weight`, `product_price`, `product_order_date`, `product_id`, `product_image`, `timestamp`) VALUES
(1, 'INV820211618944462', 'chicken eggs , hen eggs', '1', '2 g', '222', '2021-04-21', '14', '1593670631.jpg', '2021-04-20 18:47:43'),
(2, 'INV820211626446279', 'Banana', '2', '2 Kg', '70', '2021-07-16', '12', 'banana.png', '2021-07-16 14:38:00'),
(3, 'INV1220211626480417', 'Chicken Eggs', '2', '2 g', '50', '2021-07-16', '14', 'eggs.jpg', '2021-07-17 00:06:58'),
(4, 'INV820211626565374', 'Banana', '1', '2 Kg', '70', '2021-07-17', '12', 'banana.png', '2021-07-17 23:43:05'),
(5, 'INV820211626569770', 'Chicken Eggs', '1', '2 g', '50', '2021-07-18', '14', 'eggs.jpg', '2021-07-18 00:56:12'),
(6, 'INV820211626570308', 'Fruit Juice', '1', '1 pcs', '120.5', '2021-07-18', '27', 'juice.jpg', '2021-07-18 01:05:10'),
(7, 'INV820211626703842', 'lens', '1', '0.300 g', '1', '2021-07-19', '42', '1626703769.png', '2021-07-19 14:10:44'),
(8, 'INV820211626738346', 'Banana', '1', '2 Kg', '70', '2021-07-20', '12', 'banana.png', '2021-07-19 23:45:49'),
(9, 'INV820211626738346', 'Chicken Eggs', '1', '2 g', '50', '2021-07-20', '14', 'eggs.jpg', '2021-07-19 23:45:49'),
(10, 'INV820211627189601', 'Chicken Eggs', '1', '2 g', '50', '2021-07-25', '14', 'eggs.jpg', '2021-07-25 05:06:43'),
(11, 'INV820211627189601', 'Iphone XI', '1', '10 g', '546', '2021-07-25', '43', '1626929298.jpg', '2021-07-25 05:06:43'),
(12, 'INV820211627189601', 'vixol pink', '1', '12 ml', '100', '2021-07-25', '44', '1616832968.png', '2021-07-25 05:06:43'),
(13, 'INV820211627457162', 'Iphone XI', '1', '10 g', '546', '2021-07-28', '43', '1626929298.jpg', '2021-07-28 07:26:03'),
(14, 'INV820211627457162', 'Chicken Eggs', '1', '2 g', '50', '2021-07-28', '14', 'eggs.jpg', '2021-07-28 07:26:03'),
(15, 'INV820211627457162', 'lens', '1', '0.300 g', '1', '2021-07-28', '42', '1626703769.png', '2021-07-28 07:26:03'),
(16, 'INV820211627504345', 'Iphone XI', '1', '10 g', '546', '2021-07-28', '43', '1626929298.jpg', '2021-07-28 20:32:25'),
(17, 'INV820211627508876', 'Iphone XI', '10', '10 g', '546', '2021-07-28', '43', '1626929298.jpg', '2021-07-28 21:47:57'),
(18, 'INV820211627769060', 'ALcatra com Picanha', '1', '555 g', '1000000', '2021-07-31', '44', '1627008512.jpg', '2021-07-31 22:04:20'),
(19, 'INV820211628238525', 'aaa', '1', '1 pcs', '200', '2021-08-06', '45', '1628020016.png', '2021-08-06 08:28:47'),
(20, 'INV820211628364451', 'Iphone XI', '1', '10 g', '546', '2021-08-07', '43', '1626929298.jpg', '2021-08-07 19:27:34'),
(21, 'INV820211628364451', 'aaa', '1', '1 pcs', '200', '2021-08-07', '45', '1628020016.png', '2021-08-07 19:27:34'),
(22, 'INV820211628364451', 'nnn', '1', '1 pcs', '20', '2021-08-07', '46', '1628021760.png', '2021-08-07 19:27:34'),
(23, 'INV820211628380341', 'lens', '1', '0.300 g', '1', '2021-08-08', '42', '1626703769.png', '2021-08-07 23:52:23'),
(24, 'INV820241727935957', 'g', '1', '2 Kg', '5', '2024-10-03', '53', '1727623687.png', '2024-10-03 06:12:37'),
(25, 'INV820241727935957', 'n', '1', '25 g', '60', '2024-10-03', '54', '1727881610.png', '2024-10-03 06:12:38'),
(26, 'INV820241727936092', 'hmm', '1', '2 g', '358', '2024-10-03', '52', '1727584565.png', '2024-10-03 06:14:52'),
(27, 'INV820241727936591', 'hmm', '1', '2 g', '358', '2024-10-03', '52', '1727584565.png', '2024-10-03 06:23:12'),
(28, 'INV820241727936591', 'g', '1', '2 Kg', '5', '2024-10-03', '53', '1727623687.png', '2024-10-03 06:23:12'),
(29, 'INV820241727938137', 'g', '1', '2 Kg', '5', '2024-10-03', '53', '1727623687.png', '2024-10-03 06:48:58'),
(30, 'INV820241727974040', 'g', '1', '2 Kg', '5', '2024-10-03', '53', '1727623687.png', '2024-10-03 16:47:21'),
(31, 'INV820241727974040', 'n', '1', '25 g', '60', '2024-10-03', '54', '1727881610.png', '2024-10-03 16:47:21'),
(32, 'INV820241727975338', 'Fruit Juice', '1', '1 pcs', '120.5', '2024-10-03', '27', 'juice.jpg', '2024-10-03 17:09:00'),
(33, 'INV820241728109503', 'bingo ', '1', '555 Kg', '555', '2024-10-05', '55', '1728109487.png', '2024-10-05 06:25:04'),
(34, 'INV820241728131498', 'bingo ', '1', '555 Kg', '555', '2024-10-05', '55', '1728109487.png', '2024-10-05 12:31:40'),
(35, 'INV820241728131569', 'bingo ', '1', '555 Kg', '555', '2024-10-05', '55', '1728109487.png', '2024-10-05 12:32:50'),
(36, 'INV820241728135872', 'Jam jam', '1', '20 Kg', '500', '2024-10-05', '48', '1628433803.png', '2024-10-05 13:44:41'),
(37, 'INV820241728287338', 'n', '1', '25 g', '60', '2024-10-07', '54', '1727881610.png', '2024-10-07 07:48:59'),
(38, 'INV820241728287338', 'bingo ', '1', '555 Kg', '555', '2024-10-07', '55', '1728109487.png', '2024-10-07 07:48:59'),
(39, 'INV820241728287375', 'n', '1', '25 g', '60', '2024-10-07', '54', '1727881610.png', '2024-10-07 07:49:35'),
(40, 'INV820241728287375', 'bingo ', '1', '555 Kg', '555', '2024-10-07', '55', '1728109487.png', '2024-10-07 07:49:35'),
(41, 'INV820241728379423', 'bingo ', '1', '555 Kg', '555', '2024-10-08', '55', '1728109487.png', '2024-10-08 09:23:43'),
(42, 'INV820241731068351', 'n', '1', '25 g', '60', '2024-11-08', '54', '1727881610.png', '2024-11-08 12:19:12'),
(43, 'INV820241731068351', 'bingo ', '1', '555 Kg', '555', '2024-11-08', '55', '1728109487.png', '2024-11-08 12:19:12'),
(44, 'INV820241731077380', 'bingo ', '1', '555 Kg', '555', '2024-11-08', '55', '1728109487.png', '2024-11-08 14:49:41'),
(45, 'INV820241731077839', 'bingo ', '1', '555 Kg', '555', '2024-11-08', '55', '1728109487.png', '2024-11-08 14:57:19'),
(46, 'INV820241731077976', 'bingo ', '1', '555 Kg', '555', '2024-11-08', '55', '1728109487.png', '2024-11-08 14:59:36'),
(47, 'INV820241731078637', 'n', '1', '25 g', '60', '2024-11-08', '54', '1727881610.png', '2024-11-08 15:10:38'),
(48, 'INV820241731131029', 'bingo ', '1', '555 Kg', '555', '2024-11-09', '55', '1728109487.png', '2024-11-09 05:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_time` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `order_payment_method` varchar(255) NOT NULL,
  `order_price` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `served_by` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `invoice_id`, `order_date`, `order_time`, `order_type`, `order_payment_method`, `order_price`, `discount`, `tax`, `customer_name`, `served_by`, `timestamp`) VALUES
(1, 'INV820211618944462', '2021-04-21', '12:47 AM', 'PICK UP', 'CASH', '222.0', '3.30', '33.3', 'Rakib Uddin', 'Admin', '2021-04-20 18:47:43'),
(2, 'INV820211626446279', '2021-07-16', '09:37 PM', 'PICK UP', 'CASH', '140.0', '0.00', '14.0', 'Walk In Customer', 'Admin', '2021-07-16 14:38:00'),
(3, 'INV1220211626480417', '2021-07-16', '07:06 PM', 'PICK UP', 'CASH', '100.0', '0.00', '10.0', 'Walk In Customer', 'Testing', '2021-07-17 00:06:58'),
(4, 'INV820211626565374', '2021-07-17', '06:42 PM', 'PICK UP', 'CASH', '70.0', '0.00', '7.0', 'Jasim Uddin', 'Admin', '2021-07-17 23:43:05'),
(5, 'INV820211626569770', '2021-07-18', '02:56 AM', 'PICK UP', 'CASH', '50.0', '0.00', '5.0', 'Walk In Customer', 'Admin', '2021-07-18 00:56:12'),
(6, 'INV820211626570308', '2021-07-18', '03:05 AM', 'HOME DELIVERY', 'CASH', '120.5', '0.00', '12.05', 'Rakib Uddin', 'Admin', '2021-07-18 01:05:10'),
(7, 'INV820211626703842', '2021-07-19', '04:10 PM', 'HOME DELIVERY', 'PAYPAL', '1.0', '0.00', '0.1', 'Walk In Customer', 'Admin', '2021-07-19 14:10:44'),
(8, 'INV820211626738346', '2021-07-20', '12:45 AM', 'PICK UP', 'OM', '120.0', '0.00', '12.0', 'mfondi', 'Admin', '2021-07-19 23:45:49'),
(9, 'INV820211627189601', '2021-07-25', '10:06 AM', 'PICK UP', 'CASH', '696.0', '0.00', '69.6', 'Walk In Customer', 'Admin', '2021-07-25 05:06:43'),
(10, 'INV820211627457162', '2021-07-28', '12:26 PM', 'Table Booking', 'CASH', '597.0', '0.00', '59.7', 'Walk In Customer', 'Admin', '2021-07-28 07:26:03'),
(11, 'INV820211627504345', '2021-07-28', '03:32 PM', 'PICK UP', 'CASH', '546.0', '0.00', '54.6', 'Walk In Customer', 'Admin', '2021-07-28 20:32:25'),
(12, 'INV820211627508876', '2021-07-28', '09:47 PM', 'PERCEL', 'CASH', '5460.0', '655.9', '546.0', 'Jhonson', 'Admin', '2021-07-28 21:47:57'),
(13, 'INV820211627769060', '2021-07-31', '05:04 PM', 'PICK UP', 'CASH', '1000000.0', '0.00', '100000.0', 'Rakib Uddin', 'Admin', '2021-07-31 22:04:20'),
(14, 'INV820211628238525', '2021-08-06', '03:28 AM', 'PICK UP', 'CASH', '200.0', '0.00', '20.0', 'Walk In Customer', 'Admin', '2021-08-06 08:28:47'),
(15, 'INV820211628364451', '2021-08-07', '08:27 PM', 'PICK UP', 'CASH', '766.0', '0.00', '76.6', 'Walk In Customer', 'Admin', '2021-08-07 19:27:34'),
(16, 'INV820211628380341', '2021-08-08', '12:52 AM', 'Table Booking', 'CASH', '1.0', '0.00', '0.1', 'Walk In Customer', 'Admin', '2021-08-07 23:52:23'),
(17, 'INV820241727935957', '2024-10-03', '11:42 AM', 'PICK UP', 'CASH', '65.0', '0.00', '6.5', 'Walk In Customer', 'Admin', '2024-10-03 06:12:37'),
(18, 'INV820241727936092', '2024-10-03', '11:44 AM', 'PICK UP', 'CASH', '358.0', '0.00', '35.8', 'Walk In Customer', 'Admin', '2024-10-03 06:14:52'),
(19, 'INV820241727936591', '2024-10-03', '11:53 AM', 'PICK UP', 'CASH', '363.0', '0.00', '36.3', 'Walk In Customer', 'Admin', '2024-10-03 06:23:12'),
(20, 'INV820241727938137', '2024-10-03', '12:18 PM', 'PICK UP', 'CASH', '5.0', '0.00', '0.5', 'Walk In Customer', 'Admin', '2024-10-03 06:48:58'),
(21, 'INV820241727974040', '2024-10-03', '10:17 PM', 'PICK UP', 'CASH', '65.0', '0.00', '6.5', 'athul s', 'Admin', '2024-10-03 16:47:21'),
(22, 'INV820241727975338', '2024-10-03', '10:38 PM', 'HOME DELIVERY', 'CARD', '120.5', '0.00', '12.05', 'Jasim Uddin', 'Admin', '2024-10-03 17:09:00'),
(23, 'INV820241728109503', '2024-10-05', '11:55 AM', 'PICK UP', 'CARD', '555.0', '0.00', '55.5', 'Walk In Customer', 'Admin', '2024-10-05 06:25:04'),
(24, 'INV820241728131498', '2024-10-05', '06:01 PM', 'Reserved', 'CASH', '555.0', '100', '55.5', 'athul s', 'Admin', '2024-10-05 12:31:40'),
(25, 'INV820241728131569', '2024-10-05', '06:02 PM', 'PICK UP', 'CASH', '555.0', '100', '55.5', 'Walk In Customer', 'Admin', '2024-10-05 12:32:50'),
(26, 'INV820241728135872', '2024-10-05', '07:14 PM', 'PICK UP', 'CASH', '500.0', '5', '50.0', 'Walk In Customer', 'Admin', '2024-10-05 13:44:41'),
(27, 'INV820241728287338', '2024-10-07', '01:18 PM', 'PICK UP', 'CASH', '615.0', '0.00', '61.5', 'Walk In Customer', 'Admin', '2024-10-07 07:48:59'),
(28, 'INV820241728287375', '2024-10-07', '01:19 PM', 'PICK UP', 'CASH', '615.0', '0.00', '61.5', 'Walk In Customer', 'Admin', '2024-10-07 07:49:35'),
(29, 'INV820241728379423', '2024-10-08', '02:53 PM', 'PICK UP', 'CASH', '555.0', '0.00', '55.5', 'Walk In Customer', 'Admin', '2024-10-08 09:23:43'),
(30, 'INV820241731068351', '2024-11-08', '05:49 PM', 'PICK UP', 'CASH', '615.0', '0.00', '61.5', 'Walk In Customer', 'Admin', '2024-11-08 12:19:12'),
(31, 'INV820241731077380', '2024-11-08', '08:19 PM', 'PICK UP', 'CASH', '555.0', '0.00', '55.5', 'Walk In Customer', 'Admin', '2024-11-08 14:49:41'),
(32, 'INV820241731077839', '2024-11-08', '08:27 PM', 'PICK UP', 'CASH', '555.0', '0.00', '55.5', 'Walk In Customer', 'Admin', '2024-11-08 14:57:19'),
(33, 'INV820241731077976', '2024-11-08', '08:29 PM', 'PICK UP', 'CASH', '555.0', '55', '55.5', 'Walk In Customer', 'Admin', '2024-11-08 14:59:36'),
(34, 'INV820241731078637', '2024-11-08', '08:40 PM', 'PICK UP', 'CASH', '60.0', '5', '6.0', 'Walk In Customer', 'Admin', '2024-11-08 15:10:38'),
(35, 'INV820241731131029', '2024-11-09', '11:13 AM', 'PICK UP', 'CASH', '555.0', '0.00', '55.5', 'Walk In Customer', 'Admin', '2024-11-09 05:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_new`
--

CREATE TABLE `order_new` (
  `order_new_id` int(50) NOT NULL,
  `code` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `bos` varchar(300) NOT NULL,
  `sak` varchar(300) NOT NULL,
  `qty` int(200) NOT NULL,
  `rate` int(200) NOT NULL,
  `tax` int(200) NOT NULL,
  `total` float NOT NULL,
  `order_uid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_new`
--

INSERT INTO `order_new` (`order_new_id`, `code`, `name`, `bos`, `sak`, `qty`, `rate`, `tax`, `total`, `order_uid`) VALUES
(100001, '202', 'qa', '00', '00', 22, 22, 2, 22, 100001),
(100014, 'aa', 'Bingo', '20', '20', 20, 20, 1, 404, 100002),
(100015, '', '', '', '', 0, 0, 0, 0, 100002),
(100016, 'aa', 'lays', '99', '88', 88, 676, 5, 62462.4, 100003),
(100017, 'bo', 'red', '997', '77', 8, 6, 5, 50.4, 100003),
(100018, '', '', '', '', 0, 0, 0, 0, 100003),
(100019, 'aa', 'aa', '11', '11', 2, 11, 1, 22.22, 100004),
(100020, '', '', '', '', 0, 0, 0, 0, 100004);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` text NOT NULL,
  `product_category_id` int(5) NOT NULL,
  `product_description` text NOT NULL,
  `product_buy_price` float NOT NULL DEFAULT 0,
  `product_sell_price` float NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `product_weight_unit_id` int(11) NOT NULL,
  `product_supplier_id` int(11) NOT NULL,
  `product_image` text NOT NULL,
  `product_stock` int(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_code`, `product_category_id`, `product_description`, `product_buy_price`, `product_sell_price`, `product_weight`, `product_weight_unit_id`, `product_supplier_id`, `product_image`, `product_stock`, `timestamp`) VALUES
(1, 'Poco F1', 'RRS', 1, 'Latest smart phone', 0, 250, '1', 4, 15, 'poco_f1.jpg', 0, '2021-04-20 19:04:21'),
(45, 'aaa', 'ghh', 20, 'h', 0, 200, '1', 4, 19, '1628020016.png', 8, '2021-08-07 19:27:34'),
(7, 'Chicken Biryani', 'kochu', 21, 'wqwq', 0, 100, '2', 1, 18, 'chicken_biryani.jpg', 20, '2021-04-20 19:09:39'),
(43, 'Iphone XI', 'Iphone001', 1, 'Phone', 0, 546, '10', 1, 5, '1626929298.jpg', 6, '2021-08-07 19:27:34'),
(14, 'Chicken Eggs', 'eggs', 3, 'well & fresh', 0, 50, '2', 1, 19, 'eggs.jpg', 488, '2021-07-28 07:26:03'),
(27, 'Fruit Juice', 'juice', 3, 'well and healthy', 0, 120.5, '1', 4, 19, 'juice.jpg', 8, '2024-10-03 17:09:00'),
(41, 'stevia', '7861000213509', 21, 'estevia', 0, 23, '2', 2, 18, '1626541468.png', 60, '2021-07-17 17:04:27'),
(42, 'lens', '2099901779588', 1, 'blah blah', 0, 1, '0.300', 1, 5, '1626703769.png', 97, '2021-08-07 23:52:23'),
(44, 'ALcatra com Picanha', '12a3sd45as4d321', 9, 'Alcatra com a picanha', 0, 1000000, '555', 1, 18, '1627008512.jpg', 8, '2021-07-31 22:04:20'),
(46, 'nnn', 'nnnn', 20, '', 0, 20, '1', 4, 18, '1628021760.png', 698, '2021-08-07 19:27:34'),
(47, 'Test buy ', 'ewee', 21, 'asasas', 200, 300, '200', 2, 5, 'image_placeholder.png', 20, '2021-08-08 13:25:50'),
(48, 'Jam jam', 'vvgdx', 20, 'decs', 200, 500, '20', 2, 5, '1628433803.png', 9, '2024-10-05 13:44:41'),
(49, 'Jam', 'Jam001', 20, '66666', 20, 50, '200', 1, 19, '1727373370.jpg', 100, '2024-09-26 17:56:10'),
(50, 'a', '1', 27, 'y', 250, 290, '2', 3, 19, '1727521186.png', 20, '2024-09-28 10:59:46'),
(51, 'j', 'u', 20, '5', 20, 250, '35', 2, 18, '1727532699.png', 25, '2024-09-28 14:11:38'),
(52, 'hmm', '664', 27, 'hh', 258, 358, '2', 1, 19, '1727584565.png', 23, '2024-10-03 06:23:12'),
(54, 'n', 'b', 21, 'b', 28, 60, '25', 1, 18, '1727881610.png', 19, '2024-11-08 15:10:38'),
(55, 'bingo ', '6666', 21, 'yyy', 966, 555, '555', 2, 18, '1728109487.png', 6655, '2024-11-09 05:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_category_id` int(11) NOT NULL,
  `product_category_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_category_id`, `product_category_name`) VALUES
(20, 'Grocery'),
(21, 'Food'),
(26, 'Stationary'),
(27, 'Books'),
(28, '');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_contact` varchar(255) NOT NULL,
  `shop_email` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `tax` varchar(11) NOT NULL,
  `currency_symbol` varchar(20) NOT NULL,
  `shop_status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_name`, `shop_contact`, `shop_email`, `shop_address`, `tax`, `currency_symbol`, `shop_status`) VALUES
(1, 'Manju Fancy', '+910000000000', 'manjufancy@gmail.com', 'Kollam', '10', 'â‚¹', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `suppliers_id` int(255) NOT NULL,
  `suppliers_name` varchar(255) NOT NULL,
  `suppliers_contact_person` varchar(255) NOT NULL,
  `suppliers_cell` varchar(255) NOT NULL,
  `suppliers_email` varchar(255) NOT NULL,
  `suppliers_address` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`suppliers_id`, `suppliers_name`, `suppliers_contact_person`, `suppliers_cell`, `suppliers_email`, `suppliers_address`, `timestamp`) VALUES
(5, 'jon', 'Jamal', '01831758798', 'jamul@gmail.com', 'Iiuc', '2020-07-06 16:16:59'),
(19, 'Pepsi', 'Jhon', '88800891994', 'pepsi9@gmail.com', 'USA', '2020-07-30 06:31:14'),
(18, 'Addidas', 'Jhon due', '88085585588', 'addidas@gmail.com', 'USA', '2020-07-30 06:31:53'),
(20, 'amal', 'jise', '7586904213', 's@g.v', 'hj', '2024-09-26 16:55:51'),
(21, 'hi', 'heloo', '258800466', 'a@n.m', 'hh', '2024-09-26 18:03:52'),
(22, 'a', 'a', 'aa', 'aa@g.con', 'aa', '2024-11-09 19:03:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `cell`, `email`, `password`, `user_type`) VALUES
(8, 'Admin', '123456789', 'admin@gmail.com', '123456', 'admin'),
(13, 'Staff', '9876543210', 'staff@gmail.com', '123456', 'staff'),
(14, 'Manager ', '123456985', 'manager@gmail.com', '123456', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `weight_unit`
--

CREATE TABLE `weight_unit` (
  `weight_unit_id` int(11) NOT NULL,
  `weight_unit_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `weight_unit`
--

INSERT INTO `weight_unit` (`weight_unit_id`, `weight_unit_name`) VALUES
(1, 'g'),
(2, 'Kg'),
(3, 'L'),
(4, 'pcs'),
(5, 'ml');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`);

--
-- Indexes for table `order_new`
--
ALTER TABLE `order_new`
  ADD PRIMARY KEY (`order_new_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_category_id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`suppliers_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight_unit`
--
ALTER TABLE `weight_unit`
  ADD PRIMARY KEY (`weight_unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_new`
--
ALTER TABLE `order_new`
  MODIFY `order_new_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100021;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `product_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `suppliers_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `weight_unit`
--
ALTER TABLE `weight_unit`
  MODIFY `weight_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
