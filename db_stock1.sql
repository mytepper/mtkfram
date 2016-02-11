-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2016 at 09:52 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stock1`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_12_15_102742_create_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill`
--

CREATE TABLE IF NOT EXISTS `tb_bill` (
  `id` int(11) NOT NULL DEFAULT '0',
  `CUID` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_bill`
--

INSERT INTO `tb_bill` (`id`, `CUID`, `created_at`, `updated_at`, `status`) VALUES
(1, 3, '2016-01-28 06:57:10', '2016-01-28 07:30:17', 2),
(2, 3, '2016-01-28 06:59:51', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bill_list`
--

CREATE TABLE IF NOT EXISTS `tb_bill_list` (
  `id` int(11) NOT NULL,
  `PID` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bill_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_bill_list`
--

INSERT INTO `tb_bill_list` (`id`, `PID`, `price`, `unit`, `note`, `bill_id`) VALUES
(3, 2, 20000, 1, '-', 2),
(10, 2, 50000, 10, '-', 1),
(11, 1, 50000, 8, '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_creditor`
--

CREATE TABLE IF NOT EXISTS `tb_creditor` (
  `CID` int(11) NOT NULL,
  `Ccode` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CRE',
  `Cname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `Caddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `Ctel` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '-',
  `C_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_creditor`
--

INSERT INTO `tb_creditor` (`CID`, `Ccode`, `Cname`, `Caddress`, `Ctel`, `C_create`) VALUES
(2, 'CRE', 'กรุงเทพ', '-', '999', '2015-12-24 07:42:38'),
(3, 'CRE', 'กรุงศรี', 'ฟหกฟห\r\n', 'จจตต', '2015-12-24 08:10:37'),
(5, 'CRE', 'กรุงไทย', '000', '999', '2015-12-24 08:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE IF NOT EXISTS `tb_customer` (
  `CUID` int(11) NOT NULL,
  `CUcode` varchar(3) COLLATE utf8_unicode_ci DEFAULT 'CUS',
  `CUname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CUaddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CUtel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CUmap` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CUnote` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CU_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`CUID`, `CUcode`, `CUname`, `CUaddress`, `CUtel`, `CUmap`, `CUnote`, `CU_create`) VALUES
(2, 'CUS', 'test 2 test', 'cm', '9999', '-', '-', '2015-12-25 10:03:38'),
(3, 'CUS', 'customer', '-', '99', '-', '-', '2015-12-25 10:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_income`
--

CREATE TABLE IF NOT EXISTS `tb_income` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `total` int(11) NOT NULL DEFAULT '1',
  `customer` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_income`
--

INSERT INTO `tb_income` (`id`, `type`, `name`, `total`, `customer`, `created_at`) VALUES
(2, 2, 'เสริมจมูก สิริโคนอเมกา แบบนิ่ม', 20000, '-', '2016-01-29 06:36:22'),
(3, 1, 'December 2015', 300, '-', '2016-01-29 07:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE IF NOT EXISTS `tb_product` (
  `PID` int(11) NOT NULL,
  `Pcode` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'P',
  `Pname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Psize` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Punit` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `P_buy_f` int(11) DEFAULT '0',
  `P_buy_i` int(11) DEFAULT '0',
  `P_price_f` int(11) DEFAULT '0',
  `P_price_i` int(11) DEFAULT '0',
  `TID` int(11) DEFAULT '0',
  `P_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`PID`, `Pcode`, `Pname`, `Psize`, `Punit`, `P_buy_f`, `P_buy_i`, `P_price_f`, `P_price_i`, `TID`, `P_create`) VALUES
(1, 'P', 'ปลาดูก', '200', 'กิโลกรัม', 1800, 2000, 1800, 2200, 1, '2015-12-24 10:46:12'),
(2, 'P', 'test', 'test', 'กิโลกรัม', 100, 100, 100, 100, 2, '2015-12-25 02:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product_type`
--

CREATE TABLE IF NOT EXISTS `tb_product_type` (
  `TID` int(11) NOT NULL,
  `Tcode` varchar(3) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'T',
  `Tname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'T',
  `CID` int(11) NOT NULL,
  `T_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_product_type`
--

INSERT INTO `tb_product_type` (`TID`, `Tcode`, `Tname`, `CID`, `T_create`) VALUES
(1, 'T', 'อาหารปลา V1', 0, '2015-12-24 09:09:04'),
(2, 'T', 'อาหารกบ', 0, '2015-12-24 09:09:11'),
(3, 'T', 'อาการปลา พิเศษ', 0, '2015-12-24 09:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_purchase`
--

CREATE TABLE IF NOT EXISTS `tb_purchase` (
  `UID` int(11) NOT NULL,
  `Ucode` varchar(15) COLLATE utf8_unicode_ci DEFAULT 'U',
  `CID` int(11) DEFAULT '0',
  `PID` int(11) DEFAULT '0',
  `U_price` int(11) DEFAULT '0',
  `U_number` int(11) DEFAULT '0',
  `U_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `U_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `PBID` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_purchase`
--

INSERT INTO `tb_purchase` (`UID`, `Ucode`, `CID`, `PID`, `U_price`, `U_number`, `U_note`, `U_create`, `PBID`) VALUES
(8, 'U', 5, 2, 9000, 9, '-', '2015-12-25 10:48:56', 1),
(11, 'U', 3, 2, 9000, 10, '-', '2016-01-27 06:39:23', 1),
(12, 'U', 5, 1, 1000, 1, '-', '2016-01-27 06:40:00', 1),
(13, 'U', 3, 2, 9, 1, '-', '2016-01-27 06:58:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_purchase_bill`
--

CREATE TABLE IF NOT EXISTS `tb_purchase_bill` (
  `PBID` int(11) NOT NULL,
  `PB_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PB_code` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PB',
  `PB_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_purchase_bill`
--

INSERT INTO `tb_purchase_bill` (`PBID`, `PB_create`, `PB_code`, `PB_status`) VALUES
(1, '2015-12-25 07:56:01', 'PB', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_receive`
--

CREATE TABLE IF NOT EXISTS `tb_receive` (
  `id` int(11) NOT NULL,
  `CUID` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '2'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_receive`
--

INSERT INTO `tb_receive` (`id`, `CUID`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, '2016-01-29 04:32:52', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_receive_list`
--

CREATE TABLE IF NOT EXISTS `tb_receive_list` (
  `id` int(11) NOT NULL,
  `PID` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `unit` int(11) NOT NULL DEFAULT '0',
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `bill_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_receive_list`
--

INSERT INTO `tb_receive_list` (`id`, `PID`, `price`, `unit`, `note`, `bill_id`) VALUES
(1, 1, 20000, 3, '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ship`
--

CREATE TABLE IF NOT EXISTS `tb_ship` (
  `id` int(11) NOT NULL,
  `CUID` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_ship`
--

INSERT INTO `tb_ship` (`id`, `CUID`, `created_at`, `updated_at`, `status`) VALUES
(2, 3, '2016-01-28 10:04:34', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ship_list`
--

CREATE TABLE IF NOT EXISTS `tb_ship_list` (
  `id` int(11) NOT NULL,
  `PID` int(11) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `unit` int(11) NOT NULL DEFAULT '0',
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `bill_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_ship_list`
--

INSERT INTO `tb_ship_list` (`id`, `PID`, `price`, `unit`, `note`, `bill_id`) VALUES
(1, 2, 19000, 2, '-', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `email`, `password`, `name`, `tel`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$/MeoS85Eeon9axuO0yGetumKYeDCv2y1cVcXWe6qPrhpkPl53BrMu', 'admin admin', '191', 'admin', 'PjleRRiyZrLVHsVLOmQQWgZcN0Ps9O9MJca5gYKx9Xolnf82wbR2XgN1I8lO', '2015-12-24 03:29:31', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bill`
--
ALTER TABLE `tb_bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bill_list`
--
ALTER TABLE `tb_bill_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_creditor`
--
ALTER TABLE `tb_creditor`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`CUID`);

--
-- Indexes for table `tb_income`
--
ALTER TABLE `tb_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`PID`);

--
-- Indexes for table `tb_product_type`
--
ALTER TABLE `tb_product_type`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `tb_purchase`
--
ALTER TABLE `tb_purchase`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `tb_purchase_bill`
--
ALTER TABLE `tb_purchase_bill`
  ADD PRIMARY KEY (`PBID`);

--
-- Indexes for table `tb_receive`
--
ALTER TABLE `tb_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_receive_list`
--
ALTER TABLE `tb_receive_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ship`
--
ALTER TABLE `tb_ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ship_list`
--
ALTER TABLE `tb_ship_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_users_username_unique` (`username`),
  ADD UNIQUE KEY `tb_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bill_list`
--
ALTER TABLE `tb_bill_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_creditor`
--
ALTER TABLE `tb_creditor`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `CUID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_income`
--
ALTER TABLE `tb_income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_product_type`
--
ALTER TABLE `tb_product_type`
  MODIFY `TID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_purchase`
--
ALTER TABLE `tb_purchase`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_receive`
--
ALTER TABLE `tb_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_receive_list`
--
ALTER TABLE `tb_receive_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_ship_list`
--
ALTER TABLE `tb_ship_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
