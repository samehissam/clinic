-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2016 at 11:16 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashier`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'admin can do everything he want', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ccategory`
--

CREATE TABLE `ccategory` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ccategory`
--

INSERT INTO `ccategory` (`category_id`, `category_name`) VALUES
(1, 'مشروبات');

-- --------------------------------------------------------

--
-- Table structure for table `cexpenses`
--

CREATE TABLE `cexpenses` (
  `expense_id` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expense_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cexpenses`
--

INSERT INTO `cexpenses` (`expense_id`, `cost`, `description`, `date`, `expense_type_id`) VALUES
(24, '150.00', 'مرتب لمسعد', '2016-05-04 19:31:58', 10),
(25, '150.00', 'ddddddddddddddddd', '2016-05-07 20:00:02', 10),
(26, '150.00', 'mlj', '2016-05-16 05:41:05', 10);

-- --------------------------------------------------------

--
-- Table structure for table `cexpensetype`
--

CREATE TABLE `cexpensetype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cexpensetype`
--

INSERT INTO `cexpensetype` (`id`, `name`) VALUES
(10, 'مرتبات');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `name`) VALUES
(1, 'D2ED-49E8');

-- --------------------------------------------------------

--
-- Table structure for table `citem`
--

CREATE TABLE `citem` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_cost` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citem`
--

INSERT INTO `citem` (`item_id`, `item_name`, `item_cost`, `category_id`) VALUES
(29, 'شاي', '9.00', 1),
(30, 'قهوة', '55.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `crtransaction`
--

CREATE TABLE `crtransaction` (
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `table_session` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_item_id` int(11) NOT NULL,
  `table_table_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(3) NOT NULL DEFAULT 'o'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crtransaction`
--

INSERT INTO `crtransaction` (`id`, `qty`, `table_session`, `item_item_id`, `table_table_id`, `user_id`, `order_status`) VALUES
(1100, 1, '2016-06-09 12:40:56', 29, 2, 25, 'o'),
(1101, 2, '2016-06-09 13:12:30', 29, 2, 25, 'o'),
(1102, 3, '2016-06-09 13:12:30', 30, 2, 25, 'o'),
(1103, 1, '2016-06-09 13:35:29', 29, 6, 25, 'o');

-- --------------------------------------------------------

--
-- Table structure for table `ctable_session`
--

CREATE TABLE `ctable_session` (
  `table_id` int(11) NOT NULL,
  `table_state` int(11) DEFAULT '0',
  `session_start` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctable_session`
--

INSERT INTO `ctable_session` (`table_id`, `table_state`, `session_start`) VALUES
(1, 0, '2016-05-04 19:25:34'),
(2, 0, '2016-06-09 14:45:21'),
(3, 0, '2016-06-09 12:44:05'),
(4, 0, '2016-05-06 23:39:32'),
(5, 0, '2016-06-09 14:36:59'),
(6, 0, '2016-06-09 03:02:32');

-- --------------------------------------------------------

--
-- Table structure for table `ctransaction`
--

CREATE TABLE `ctransaction` (
  `id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `table_session` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_item_id` int(11) NOT NULL,
  `table_table_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(3) NOT NULL DEFAULT 'o'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ctransaction`
--

INSERT INTO `ctransaction` (`id`, `qty`, `table_session`, `item_item_id`, `table_table_id`, `user_id`, `order_status`) VALUES
(2, 1, '2016-06-09 14:45:21', 29, 2, 25, 'o'),
(3, 2, '2016-06-09 14:45:21', 30, 2, 25, 'o');

-- --------------------------------------------------------

--
-- Table structure for table `datetest`
--

CREATE TABLE `datetest` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `TestDay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expire_date`
--

CREATE TABLE `expire_date` (
  `expire_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `InventoryId` int(11) NOT NULL,
  `ProductQty` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`InventoryId`, `ProductQty`, `ProductId`) VALUES
(1, 2, 1),
(14, 12, 2),
(21, 6, 4),
(22, 24, 3),
(23, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `invoic`
--

CREATE TABLE `invoic` (
  `id` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoic`
--

INSERT INTO `invoic` (`id`, `order_num`, `order_date`) VALUES
(1, 1, '2016-06-10'),
(2, 2, '2016-06-10'),
(3, 3, '2016-06-10'),
(4, 4, '2016-06-10'),
(5, 5, '2016-06-10'),
(6, 6, '2016-06-10'),
(7, 7, '2016-06-10'),
(8, 8, '2016-06-10'),
(9, 9, '2016-06-10'),
(10, 10, '2016-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `login_session`
--

CREATE TABLE `login_session` (
  `session_id` int(11) NOT NULL,
  `login_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1444393607),
('m130524_201442_init', 1444393609);

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `id` int(11) NOT NULL,
  `order_tabe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductCategoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `ProductCategoryId`) VALUES
(1, 'خضروات', 1),
(2, 'طماطم', 1),
(3, 'بطاطس', 1),
(4, 'خيار', 1),
(5, 'بذنجان', 1);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `ProductCategoryId` int(11) NOT NULL,
  `ProductCategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`ProductCategoryId`, `ProductCategoryName`) VALUES
(1, 'bhgy');

-- --------------------------------------------------------

--
-- Table structure for table `rcategory`
--

CREATE TABLE `rcategory` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rcategory`
--

INSERT INTO `rcategory` (`category_id`, `category_name`) VALUES
(5, 'البيتزا');

-- --------------------------------------------------------

--
-- Table structure for table `rcustomer`
--

CREATE TABLE `rcustomer` (
  `CustomerId` int(11) NOT NULL,
  `CustomerName` varchar(255) NOT NULL,
  `CustomerPhone` varchar(255) NOT NULL,
  `CustomerAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rcustomer`
--

INSERT INTO `rcustomer` (`CustomerId`, `CustomerName`, `CustomerPhone`, `CustomerAddress`) VALUES
(18, 'khi', '010', 'jojohj'),
(19, '5', '5', '5'),
(20, '44444444444', '014', '44444444444'),
(21, 'bklhi', '047', 'hihih'),
(22, 'sameh', '153', 'Damitta');

-- --------------------------------------------------------

--
-- Table structure for table `rexpenses`
--

CREATE TABLE `rexpenses` (
  `expense_id` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `expense_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rexpenses`
--

INSERT INTO `rexpenses` (`expense_id`, `cost`, `description`, `date`, `expense_type_id`) VALUES
(23, '300.00', 'مرتب الشيف حسن', '2016-05-04 19:33:21', 10),
(24, '64.00', ';kpi[p', '2016-05-09 23:52:49', 10),
(25, '55.00', 'jjh', '2016-05-09 23:54:14', 10),
(26, '55.00', 'jjh', '2016-05-09 23:54:24', 10),
(27, '55.00', 'jjh', '2016-05-09 23:54:38', 10),
(28, '666.00', 'gfhf', '2016-05-09 23:54:47', 10),
(29, '68.00', 'بيلبليشثق', '2016-05-09 23:57:09', 10),
(30, '5.00', 'jgg', '2016-05-10 00:09:45', 10);

-- --------------------------------------------------------

--
-- Table structure for table `rexpensetype`
--

CREATE TABLE `rexpensetype` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rexpensetype`
--

INSERT INTO `rexpensetype` (`id`, `name`) VALUES
(10, 'أجور'),
(11, 'مرتبات'),
(12, 'إيجار'),
(13, 'بوفيه'),
(14, 'ddddd');

-- --------------------------------------------------------

--
-- Table structure for table `ritem`
--

CREATE TABLE `ritem` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_cost` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ritem`
--

INSERT INTO `ritem` (`item_id`, `item_name`, `item_cost`, `category_id`) VALUES
(29, 'بيتزا', '24.00', 5),
(30, 'فطائر', '35.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `rtable_session`
--

CREATE TABLE `rtable_session` (
  `table_id` int(11) NOT NULL,
  `table_state` int(11) DEFAULT '0',
  `session_start` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rtable_session`
--

INSERT INTO `rtable_session` (`table_id`, `table_state`, `session_start`) VALUES
(1, 0, '2016-05-06 11:46:11'),
(2, 1, '2016-06-09 13:12:30'),
(3, 0, '2016-06-09 02:35:55'),
(4, 0, '2016-05-06 23:16:02'),
(5, 1, '2016-06-09 12:26:56'),
(6, 1, '2016-06-09 13:35:29'),
(7, 0, '2016-05-06 23:17:09'),
(8, 0, '2016-06-09 03:01:00'),
(9, 0, '2016-06-09 02:19:11'),
(10, 0, '2016-05-06 23:23:17'),
(11, 0, '2016-05-06 23:23:17'),
(12, 0, '2016-05-06 23:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `rtransaction`
--

CREATE TABLE `rtransaction` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `item_item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` varchar(3) NOT NULL DEFAULT 'o'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rtransaction`
--

INSERT INTO `rtransaction` (`id`, `invoice_id`, `qty`, `date`, `item_item_id`, `user_id`, `order_status`) VALUES
(11, 3, 1, '2016-06-09 23:23:13', 29, 25, 'g'),
(12, 4, 1, '2016-06-09 23:23:25', 30, 25, 'g'),
(13, 4, 2, '2016-06-09 23:23:25', 29, 25, 'g'),
(14, 5, 1, '2016-06-09 23:55:07', 29, 25, 'g'),
(15, 5, 1, '2016-06-09 23:55:07', 29, 25, 'g'),
(16, 5, 2, '2016-06-09 23:55:07', 30, 25, 'g'),
(17, 6, 2, '2016-06-10 15:36:17', 29, 25, 'p'),
(18, 7, 2, '2016-06-10 16:11:10', 30, 25, 'p'),
(19, 7, 5, '2016-06-10 16:11:10', 29, 25, 'p'),
(20, 8, 1, '2016-06-10 16:11:36', 29, 25, 'o'),
(21, 9, 2, '2016-06-10 16:11:47', 29, 25, 'o'),
(22, 10, 1, '2016-06-10 16:12:01', 30, 25, 'o');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `system_setup`
--

CREATE TABLE `system_setup` (
  `start_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `order_table` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
(24, 'sameh', 'r7FDWdhIn3wcU_NhEkuGfH9GMguX88Jo', '$2y$13$ElocMaSV990pu2yenjCbfuEKamrTZkATdhEtW7sgXRqzuFLlIgScy', NULL, 10, 1450214989, 1450214989),
(25, 'admin', 'WqdOmas7J1orAnuWNpDlm-ZfN2dyFkGx', '$2y$13$iHPsg4VXJE3nRteeLRzRKeTzF7ETptqf6GuA1O1FssvP/hacCGOym', NULL, 10, 1447627107, 1447627107),
(26, 'sam', 'CM3SMHRd5nsG9QBzEnjopCz3nHgo29gr', '$2y$13$OnVsbhkivvtKTBWvszwOJO5h3yCnGKHQx3SHPt0fCDDXt1cWT2xeK', NULL, 10, 1463123753, 1463123753),
(27, 'samehh', 'F6CoQ1_uCuRJlDobghoqMncHJ2NvYT0A', '$2y$13$AhUXWlEYKSPY5F.Vq9R4HuCM4fwLszewkzH65w2vczCkBxLTHpruK', NULL, 10, 1463124078, 1463124078);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `ccategory`
--
ALTER TABLE `ccategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cexpenses`
--
ALTER TABLE `cexpenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `fk_Cexpenses_CexpenseType1_idx` (`expense_type_id`);

--
-- Indexes for table `cexpensetype`
--
ALTER TABLE `cexpensetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `citem`
--
ALTER TABLE `citem`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `crtransaction`
--
ALTER TABLE `crtransaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_CRtransaction_item_idx` (`item_item_id`);

--
-- Indexes for table `ctable_session`
--
ALTER TABLE `ctable_session`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `ctransaction`
--
ALTER TABLE `ctransaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Ctransaction_item_idx` (`item_item_id`);

--
-- Indexes for table `datetest`
--
ALTER TABLE `datetest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`InventoryId`,`ProductId`),
  ADD KEY `fk_Inventory_Product1_idx` (`ProductId`);

--
-- Indexes for table `invoic`
--
ALTER TABLE `invoic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_session`
--
ALTER TABLE `login_session`
  ADD PRIMARY KEY (`session_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`,`ProductCategoryId`),
  ADD KEY `fk_product_ProductCategory1_idx` (`ProductCategoryId`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`ProductCategoryId`);

--
-- Indexes for table `rcategory`
--
ALTER TABLE `rcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `rcustomer`
--
ALTER TABLE `rcustomer`
  ADD PRIMARY KEY (`CustomerId`);

--
-- Indexes for table `rexpenses`
--
ALTER TABLE `rexpenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `fk_Rexpenses_RexpenseType1_idx` (`expense_type_id`);

--
-- Indexes for table `rexpensetype`
--
ALTER TABLE `rexpensetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ritem`
--
ALTER TABLE `ritem`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `rtable_session`
--
ALTER TABLE `rtable_session`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `rtransaction`
--
ALTER TABLE `rtransaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Rtransaction_item_idx` (`item_item_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ccategory`
--
ALTER TABLE `ccategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cexpenses`
--
ALTER TABLE `cexpenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `cexpensetype`
--
ALTER TABLE `cexpensetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `citem`
--
ALTER TABLE `citem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `crtransaction`
--
ALTER TABLE `crtransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1104;
--
-- AUTO_INCREMENT for table `ctable_session`
--
ALTER TABLE `ctable_session`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ctransaction`
--
ALTER TABLE `ctransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `datetest`
--
ALTER TABLE `datetest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `InventoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `invoic`
--
ALTER TABLE `invoic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `login_session`
--
ALTER TABLE `login_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `ProductCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rcategory`
--
ALTER TABLE `rcategory`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `rcustomer`
--
ALTER TABLE `rcustomer`
  MODIFY `CustomerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `rexpenses`
--
ALTER TABLE `rexpenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `rexpensetype`
--
ALTER TABLE `rexpensetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ritem`
--
ALTER TABLE `ritem`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `rtable_session`
--
ALTER TABLE `rtable_session`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rtransaction`
--
ALTER TABLE `rtransaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cexpenses`
--
ALTER TABLE `cexpenses`
  ADD CONSTRAINT `fk_Cexpenses_CexpenseType1` FOREIGN KEY (`expense_type_id`) REFERENCES `cexpensetype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `crtransaction`
--
ALTER TABLE `crtransaction`
  ADD CONSTRAINT `CRtransaction_ibfk_1` FOREIGN KEY (`item_item_id`) REFERENCES `ritem` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ctransaction`
--
ALTER TABLE `ctransaction`
  ADD CONSTRAINT `Ctransaction_ibfk_1` FOREIGN KEY (`item_item_id`) REFERENCES `citem` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rexpenses`
--
ALTER TABLE `rexpenses`
  ADD CONSTRAINT `fk_Rexpenses_RexpenseType1` FOREIGN KEY (`expense_type_id`) REFERENCES `rexpensetype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rtransaction`
--
ALTER TABLE `rtransaction`
  ADD CONSTRAINT `Rtransaction_ibfk_1` FOREIGN KEY (`item_item_id`) REFERENCES `ritem` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
