-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2016 at 01:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00"; 


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `analysis_price`
--

CREATE TABLE `analysis_price` (
  `id` int(11) NOT NULL,
  `analysis_price` decimal(10,2) NOT NULL,
  `medical_analysis_analysis_id` int(11) NOT NULL,
  `patient_type_patient_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attend_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emp_code` int(11) NOT NULL,
  `attend_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('admin', '1', NULL);

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
-- Table structure for table `bank_movement`
--

CREATE TABLE `bank_movement` (
  `movement_id` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `transaction_date` date NOT NULL,
  `transaction_state` tinyint(2) NOT NULL DEFAULT '0',
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `center_doctor_service`
--

CREATE TABLE `center_doctor_service` (
  `id` int(11) NOT NULL,
  `service_cost` decimal(10,2) NOT NULL,
  `doctor_doctor_id` int(11) NOT NULL,
  `center_service_service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `center_service`
--

CREATE TABLE `center_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `datetest`
--

CREATE TABLE `datetest` (
  `id` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `diagnosis_id` int(11) NOT NULL,
  `diagnosis_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `doctor_address` varchar(255) NOT NULL,
  `doctor_phone` varchar(255) NOT NULL,
  `doctor_email` varchar(255) DEFAULT NULL,
  `doctor_tax` decimal(10,2) NOT NULL,
  `doctor_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_loan`
--

CREATE TABLE `doctor_loan` (
  `loan_id` int(11) NOT NULL,
  `loan_cost` decimal(10,2) NOT NULL,
  `loan_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doctor_doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_loan_back`
--

CREATE TABLE `doctor_loan_back` (
  `loan_back_id` int(11) NOT NULL,
  `loan_back_cost` decimal(10,2) NOT NULL,
  `back_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doctor_doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_needs`
--

CREATE TABLE `doctor_needs` (
  `need_id` int(11) NOT NULL,
  `out_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_qty` int(11) NOT NULL,
  `item_cost` decimal(10,2) NOT NULL,
  `inventory_item_id` int(11) NOT NULL,
  `doctor_doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `employe_id` int(11) NOT NULL,
  `employe_name` varchar(255) NOT NULL,
  `employe_phone` varchar(255) NOT NULL,
  `employe_address` varchar(255) NOT NULL,
  `employe_hourPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employe_loan`
--

CREATE TABLE `employe_loan` (
  `loan_id` int(11) NOT NULL,
  `loan_cost` decimal(10,2) NOT NULL,
  `loan_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `employe_employe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emp_loan_back`
--

CREATE TABLE `emp_loan_back` (
  `loan_back_id` int(11) NOT NULL,
  `loan_back_cost` decimal(10,2) NOT NULL,
  `back_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `employe_employe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emp_part_salary`
--

CREATE TABLE `emp_part_salary` (
  `part_id` int(11) NOT NULL,
  `part_cost` decimal(10,2) NOT NULL,
  `part_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `employe_employe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `expense_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `expensetype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expensetype`
--

CREATE TABLE `expensetype` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inclubation_history`
--

CREATE TABLE `inclubation_history` (
  `stock_history_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `history_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `incubation_stock_stock_id` int(11) NOT NULL,
  `patient_patient_id` int(11) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `incubation_stock`
--

CREATE TABLE `incubation_stock` (
  `stock_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `inventory_item_id` int(11) NOT NULL,
  `in_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indoor_history`
--

CREATE TABLE `indoor_history` (
  `indoor_history_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `history_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `indoor_stock_stock_id` int(11) NOT NULL,
  `patient_patient_id` int(11) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indoor_stock`
--

CREATE TABLE `indoor_stock` (
  `stock_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `inventory_item_id` int(11) NOT NULL,
  `in_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_buyPrice` decimal(10,2) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `in_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_history`
--

CREATE TABLE `inventory_history` (
  `inventory_history_id` int(11) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `history_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inventory_item_id` int(11) NOT NULL,
  `stock_type_stock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_analysis`
--

CREATE TABLE `medical_analysis` (
  `analysis_id` int(11) NOT NULL,
  `analysis_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_insurance`
--

CREATE TABLE `medical_insurance` (
  `insurance_id` int(11) NOT NULL,
  `insurance_cost` decimal(10,2) NOT NULL,
  `insurance_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `patient_patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_service`
--

CREATE TABLE `medical_service` (
  `service_id` int(11) NOT NULL,
  `sevice_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_service_price`
--

CREATE TABLE `medical_service_price` (
  `id` int(11) NOT NULL,
  `service_cost` decimal(10,2) NOT NULL,
  `doctor_cost` int(11) NOT NULL,
  `medical_service_service_id` int(11) NOT NULL,
  `doctor_doctor_id` int(11) NOT NULL,
  `patient_patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

CREATE TABLE `nationality` (
  `nationality_id` int(11) NOT NULL,
  `nationality_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `part_salary`
--

CREATE TABLE `part_salary` (
  `part_id` int(11) NOT NULL,
  `part_cost` decimal(10,2) NOT NULL,
  `part_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `doctor_doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `patient_address` varchar(255) NOT NULL,
  `patient_age` varchar(225) NOT NULL,
  `patient_nationality` varchar(255) NOT NULL,
  `patient_gender` varchar(45) NOT NULL,
  `patient_ssn` varchar(45) NOT NULL,
  `patient_type_patient_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_reservation`
--

CREATE TABLE `patient_reservation` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `diagnosis_diagnosis_id` int(11) NOT NULL,
  `patient_patient_id` int(11) NOT NULL,
  `doctor_doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_session`
--

CREATE TABLE `patient_session` (
  `session_id` int(11) NOT NULL,
  `patient_state` int(11) NOT NULL DEFAULT '0',
  `in_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `patient_patient_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_transaction`
--

CREATE TABLE `patient_transaction` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `patient_patient_id` int(11) NOT NULL,
  `doctor_doctor_id` int(11) NOT NULL,
  `medical_service_service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_type`
--

CREATE TABLE `patient_type` (
  `patient_type_id` int(11) NOT NULL,
  `patient_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy`
--

CREATE TABLE `pharmacy` (
  `pharmacy_id` int(11) NOT NULL,
  `pharmacy_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy`
--

INSERT INTO `pharmacy` (`pharmacy_id`, `pharmacy_name`) VALUES
(1, 'anything '),
(2, 'anything ');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_needs`
--

CREATE TABLE `pharmacy_needs` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `in_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `buy_cost` decimal(10,2) NOT NULL,
  `item_qty` int(11) NOT NULL,
  `pharmacy_pharmacy_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_price`
--

CREATE TABLE `room_price` (
  `id` int(11) NOT NULL,
  `room_day_cost` decimal(10,2) NOT NULL,
  `room_room_id` int(11) NOT NULL,
  `patient_type_patient_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation`
--

CREATE TABLE `room_reservation` (
  `resevation_id` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `room_state` int(11) NOT NULL DEFAULT '0',
  `patient_patient_id` int(11) NOT NULL,
  `room_room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `has_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_item_price`
--

CREATE TABLE `stock_item_price` (
  `id` int(11) NOT NULL,
  `stock_item_price` decimal(10,2) NOT NULL,
  `patient_type_patient_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_type`
--

CREATE TABLE `stock_type` (
  `stock_id` int(11) NOT NULL,
  `stock_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `transaction_id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password_hash` varchar(250) NOT NULL,
  `status` smallint(10) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `password_rest_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `status`, `auth_key`, `role`, `created_at`, `updated_at`, `password_rest_token`) VALUES
(1, 'sameh', '$2y$13$otDYcM82pv1ya8Ql7A3R3O.BICkEQHlKX64idiHOZVHpwvxagC1w2', 10, 'ZmbY_m7wrtmFEctFEg6q73bHvAhj3rYD', 0, 1477483501, 1477483501, ''),
(2, 'admin', '$2y$13$nlgtu2FG/84udnMXM/cAUOuFz5jizhTNrG4luzcGXMXMyrZSq3Y6K', 10, 'DbMkNVFWTZtJ5HwtQ_bg4TngpZhvQQLM', 0, 1478002531, 1478002531, '');

-- --------------------------------------------------------

--
-- Table structure for table `xRay`
--

CREATE TABLE `xRay` (
  `xray_id` int(11) NOT NULL,
  `xray_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xRay_price`
--

CREATE TABLE `xRay_price` (
  `id` int(11) NOT NULL,
  `xray_cost` decimal(10,2) NOT NULL,
  `patient_type_patient_type_id` int(11) NOT NULL,
  `xRay_xray_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analysis_price`
--
ALTER TABLE `analysis_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_analysis_price_medical_analysis1_idx` (`medical_analysis_analysis_id`),
  ADD KEY `fk_analysis_price_patient_type1_idx` (`patient_type_patient_type_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attend_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
-- Indexes for table `bank_movement`
--
ALTER TABLE `bank_movement`
  ADD PRIMARY KEY (`movement_id`);

--
-- Indexes for table `center_doctor_service`
--
ALTER TABLE `center_doctor_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_center_doctor_service_doctor1_idx` (`doctor_doctor_id`),
  ADD KEY `fk_center_doctor_service_center_service1_idx` (`center_service_service_id`);

--
-- Indexes for table `center_service`
--
ALTER TABLE `center_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `datetest`
--
ALTER TABLE `datetest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`diagnosis_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `doctor_loan`
--
ALTER TABLE `doctor_loan`
  ADD PRIMARY KEY (`loan_id`,`doctor_doctor_id`),
  ADD KEY `fk_doctor_loan_doctor1_idx` (`doctor_doctor_id`);

--
-- Indexes for table `doctor_loan_back`
--
ALTER TABLE `doctor_loan_back`
  ADD PRIMARY KEY (`loan_back_id`),
  ADD KEY `fk_doctor_loan_back_doctor1_idx` (`doctor_doctor_id`);

--
-- Indexes for table `doctor_needs`
--
ALTER TABLE `doctor_needs`
  ADD PRIMARY KEY (`need_id`),
  ADD KEY `fk_doctor_needs_inventory1_idx` (`inventory_item_id`),
  ADD KEY `fk_doctor_needs_doctor1_idx` (`doctor_doctor_id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`employe_id`);

--
-- Indexes for table `employe_loan`
--
ALTER TABLE `employe_loan`
  ADD PRIMARY KEY (`loan_id`,`employe_employe_id`),
  ADD KEY `fk_employe_loan_employe1_idx` (`employe_employe_id`);

--
-- Indexes for table `emp_loan_back`
--
ALTER TABLE `emp_loan_back`
  ADD PRIMARY KEY (`loan_back_id`),
  ADD KEY `fk_emp_loan_back_employe1_idx` (`employe_employe_id`);

--
-- Indexes for table `emp_part_salary`
--
ALTER TABLE `emp_part_salary`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `fk_emp_part_salary_employe1_idx` (`employe_employe_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`),
  ADD KEY `fk_expenses_expensetype1_idx` (`expensetype_id`);

--
-- Indexes for table `expensetype`
--
ALTER TABLE `expensetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inclubation_history`
--
ALTER TABLE `inclubation_history`
  ADD PRIMARY KEY (`stock_history_id`),
  ADD KEY `fk_inclubation_history_incubation_stock1_idx` (`incubation_stock_stock_id`),
  ADD KEY `fk_inclubation_history_patient1_idx` (`patient_patient_id`);

--
-- Indexes for table `incubation_stock`
--
ALTER TABLE `incubation_stock`
  ADD PRIMARY KEY (`stock_id`,`inventory_item_id`),
  ADD KEY `fk_incubation_stock_inventory1_idx` (`inventory_item_id`);

--
-- Indexes for table `indoor_history`
--
ALTER TABLE `indoor_history`
  ADD PRIMARY KEY (`indoor_history_id`),
  ADD KEY `fk_indoor_history_indoor_stock1_idx` (`indoor_stock_stock_id`),
  ADD KEY `fk_indoor_history_patient1_idx` (`patient_patient_id`);

--
-- Indexes for table `indoor_stock`
--
ALTER TABLE `indoor_stock`
  ADD PRIMARY KEY (`stock_id`,`inventory_item_id`),
  ADD KEY `fk_indoor_stock_inventory1_idx` (`inventory_item_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `inventory_history`
--
ALTER TABLE `inventory_history`
  ADD PRIMARY KEY (`inventory_history_id`),
  ADD KEY `fk_inventory_history_inventory1_idx` (`inventory_item_id`),
  ADD KEY `fk_inventory_history_stock_type1_idx` (`stock_type_stock_id`);

--
-- Indexes for table `medical_analysis`
--
ALTER TABLE `medical_analysis`
  ADD PRIMARY KEY (`analysis_id`);

--
-- Indexes for table `medical_insurance`
--
ALTER TABLE `medical_insurance`
  ADD PRIMARY KEY (`insurance_id`,`patient_patient_id`),
  ADD KEY `fk_medical_insurance_patient1_idx` (`patient_patient_id`);

--
-- Indexes for table `medical_service`
--
ALTER TABLE `medical_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `medical_service_price`
--
ALTER TABLE `medical_service_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_medical_service_price_medical_service1_idx` (`medical_service_service_id`),
  ADD KEY `fk_medical_service_price_doctor1_idx` (`doctor_doctor_id`),
  ADD KEY `fk_medical_service_price_patient1_idx` (`patient_patient_id`);

--
-- Indexes for table `nationality`
--
ALTER TABLE `nationality`
  ADD PRIMARY KEY (`nationality_id`);

--
-- Indexes for table `part_salary`
--
ALTER TABLE `part_salary`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `fk_part_salary_doctor1_idx` (`doctor_doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD KEY `fk_patient_patient_type1_idx` (`patient_type_patient_type_id`);

--
-- Indexes for table `patient_reservation`
--
ALTER TABLE `patient_reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `fk_patient_reservation_diagnosis1_idx` (`diagnosis_diagnosis_id`),
  ADD KEY `fk_patient_reservation_patient1_idx` (`patient_patient_id`),
  ADD KEY `fk_patient_reservation_doctor1_idx` (`doctor_doctor_id`);

--
-- Indexes for table `patient_session`
--
ALTER TABLE `patient_session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `fk_patient_session_patient1_idx` (`patient_patient_id`);

--
-- Indexes for table `patient_transaction`
--
ALTER TABLE `patient_transaction`
  ADD PRIMARY KEY (`transaction_id`,`patient_patient_id`),
  ADD KEY `fk_patient_transaction_patient1_idx` (`patient_patient_id`),
  ADD KEY `fk_patient_transaction_doctor1_idx` (`doctor_doctor_id`),
  ADD KEY `fk_patient_transaction_medical_service1_idx` (`medical_service_service_id`);

--
-- Indexes for table `patient_type`
--
ALTER TABLE `patient_type`
  ADD PRIMARY KEY (`patient_type_id`);

--
-- Indexes for table `pharmacy`
--
ALTER TABLE `pharmacy`
  ADD PRIMARY KEY (`pharmacy_id`);

--
-- Indexes for table `pharmacy_needs`
--
ALTER TABLE `pharmacy_needs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pharmacy_needs_pharmacy1_idx` (`pharmacy_pharmacy_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_price`
--
ALTER TABLE `room_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_price_room1_idx` (`room_room_id`),
  ADD KEY `fk_room_price_patient_type1_idx` (`patient_type_patient_type_id`);

--
-- Indexes for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD PRIMARY KEY (`resevation_id`),
  ADD KEY `fk_room_reservation_patient1_idx` (`patient_patient_id`),
  ADD KEY `fk_room_reservation_room1_idx` (`room_room_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_item_price`
--
ALTER TABLE `stock_item_price`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patient_type_patient_type_id_UNIQUE` (`patient_type_patient_type_id`),
  ADD KEY `fk_stock_item_price_patient_type1_idx` (`patient_type_patient_type_id`);

--
-- Indexes for table `stock_type`
--
ALTER TABLE `stock_type`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`username`);

--
-- Indexes for table `xRay`
--
ALTER TABLE `xRay`
  ADD PRIMARY KEY (`xray_id`);

--
-- Indexes for table `xRay_price`
--
ALTER TABLE `xRay_price`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_x-ray_price_patient_type1_idx` (`patient_type_patient_type_id`),
  ADD KEY `fk_xRay_price_xRay1_idx` (`xRay_xray_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analysis_price`
--
ALTER TABLE `analysis_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attend_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bank_movement`
--
ALTER TABLE `bank_movement`
  MODIFY `movement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `center_service`
--
ALTER TABLE `center_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `datetest`
--
ALTER TABLE `datetest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `diagnosis_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_loan`
--
ALTER TABLE `doctor_loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_loan_back`
--
ALTER TABLE `doctor_loan_back`
  MODIFY `loan_back_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_needs`
--
ALTER TABLE `doctor_needs`
  MODIFY `need_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `employe_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employe_loan`
--
ALTER TABLE `employe_loan`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emp_loan_back`
--
ALTER TABLE `emp_loan_back`
  MODIFY `loan_back_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emp_part_salary`
--
ALTER TABLE `emp_part_salary`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expensetype`
--
ALTER TABLE `expensetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inclubation_history`
--
ALTER TABLE `inclubation_history`
  MODIFY `stock_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `incubation_stock`
--
ALTER TABLE `incubation_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indoor_history`
--
ALTER TABLE `indoor_history`
  MODIFY `indoor_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indoor_stock`
--
ALTER TABLE `indoor_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inventory_history`
--
ALTER TABLE `inventory_history`
  MODIFY `inventory_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_analysis`
--
ALTER TABLE `medical_analysis`
  MODIFY `analysis_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_insurance`
--
ALTER TABLE `medical_insurance`
  MODIFY `insurance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_service`
--
ALTER TABLE `medical_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_service_price`
--
ALTER TABLE `medical_service_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nationality`
--
ALTER TABLE `nationality`
  MODIFY `nationality_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `part_salary`
--
ALTER TABLE `part_salary`
  MODIFY `part_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_reservation`
--
ALTER TABLE `patient_reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_session`
--
ALTER TABLE `patient_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_transaction`
--
ALTER TABLE `patient_transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_type`
--
ALTER TABLE `patient_type`
  MODIFY `patient_type_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy`
--
ALTER TABLE `pharmacy`
  MODIFY `pharmacy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pharmacy_needs`
--
ALTER TABLE `pharmacy_needs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_price`
--
ALTER TABLE `room_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_reservation`
--
ALTER TABLE `room_reservation`
  MODIFY `resevation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_item_price`
--
ALTER TABLE `stock_item_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_type`
--
ALTER TABLE `stock_type`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `xRay`
--
ALTER TABLE `xRay`
  MODIFY `xray_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `xRay_price`
--
ALTER TABLE `xRay_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `analysis_price`
--
ALTER TABLE `analysis_price`
  ADD CONSTRAINT `fk_analysis_price_medical_analysis1` FOREIGN KEY (`medical_analysis_analysis_id`) REFERENCES `medical_analysis` (`analysis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_analysis_price_patient_type1` FOREIGN KEY (`patient_type_patient_type_id`) REFERENCES `patient_type` (`patient_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `center_doctor_service`
--
ALTER TABLE `center_doctor_service`
  ADD CONSTRAINT `fk_center_doctor_service_center_service1` FOREIGN KEY (`center_service_service_id`) REFERENCES `center_service` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_center_doctor_service_doctor1` FOREIGN KEY (`doctor_doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor_loan`
--
ALTER TABLE `doctor_loan`
  ADD CONSTRAINT `fk_doctor_loan_doctor1` FOREIGN KEY (`doctor_doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor_loan_back`
--
ALTER TABLE `doctor_loan_back`
  ADD CONSTRAINT `fk_doctor_loan_back_doctor1` FOREIGN KEY (`doctor_doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctor_needs`
--
ALTER TABLE `doctor_needs`
  ADD CONSTRAINT `fk_doctor_needs_doctor1` FOREIGN KEY (`doctor_doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_doctor_needs_inventory1` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `employe_loan`
--
ALTER TABLE `employe_loan`
  ADD CONSTRAINT `fk_employe_loan_employe1` FOREIGN KEY (`employe_employe_id`) REFERENCES `employe` (`employe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emp_loan_back`
--
ALTER TABLE `emp_loan_back`
  ADD CONSTRAINT `fk_emp_loan_back_employe1` FOREIGN KEY (`employe_employe_id`) REFERENCES `employe` (`employe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `emp_part_salary`
--
ALTER TABLE `emp_part_salary`
  ADD CONSTRAINT `fk_emp_part_salary_employe1` FOREIGN KEY (`employe_employe_id`) REFERENCES `employe` (`employe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `fk_expenses_expensetype1` FOREIGN KEY (`expensetype_id`) REFERENCES `expensetype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inclubation_history`
--
ALTER TABLE `inclubation_history`
  ADD CONSTRAINT `fk_inclubation_history_incubation_stock1` FOREIGN KEY (`incubation_stock_stock_id`) REFERENCES `incubation_stock` (`stock_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inclubation_history_patient1` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `incubation_stock`
--
ALTER TABLE `incubation_stock`
  ADD CONSTRAINT `fk_incubation_stock_inventory1` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `indoor_history`
--
ALTER TABLE `indoor_history`
  ADD CONSTRAINT `fk_indoor_history_indoor_stock1` FOREIGN KEY (`indoor_stock_stock_id`) REFERENCES `indoor_stock` (`stock_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_indoor_history_patient1` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `indoor_stock`
--
ALTER TABLE `indoor_stock`
  ADD CONSTRAINT `fk_indoor_stock_inventory1` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inventory_history`
--
ALTER TABLE `inventory_history`
  ADD CONSTRAINT `fk_inventory_history_inventory1` FOREIGN KEY (`inventory_item_id`) REFERENCES `inventory` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inventory_history_stock_type1` FOREIGN KEY (`stock_type_stock_id`) REFERENCES `stock_type` (`stock_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medical_insurance`
--
ALTER TABLE `medical_insurance`
  ADD CONSTRAINT `fk_medical_insurance_patient1` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `medical_service_price`
--
ALTER TABLE `medical_service_price`
  ADD CONSTRAINT `fk_medical_service_price_doctor1` FOREIGN KEY (`doctor_doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_medical_service_price_medical_service1` FOREIGN KEY (`medical_service_service_id`) REFERENCES `medical_service` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_medical_service_price_patient1` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `part_salary`
--
ALTER TABLE `part_salary`
  ADD CONSTRAINT `fk_part_salary_doctor1` FOREIGN KEY (`doctor_doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `fk_patient_patient_type1` FOREIGN KEY (`patient_type_patient_type_id`) REFERENCES `patient_type` (`patient_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient_reservation`
--
ALTER TABLE `patient_reservation`
  ADD CONSTRAINT `fk_patient_reservation_diagnosis1` FOREIGN KEY (`diagnosis_diagnosis_id`) REFERENCES `diagnosis` (`diagnosis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patient_reservation_doctor1` FOREIGN KEY (`doctor_doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patient_reservation_patient1` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient_session`
--
ALTER TABLE `patient_session`
  ADD CONSTRAINT `fk_patient_session_patient1` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `patient_transaction`
--
ALTER TABLE `patient_transaction`
  ADD CONSTRAINT `fk_patient_transaction_doctor1` FOREIGN KEY (`doctor_doctor_id`) REFERENCES `doctor` (`doctor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patient_transaction_medical_service1` FOREIGN KEY (`medical_service_service_id`) REFERENCES `medical_service` (`service_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_patient_transaction_patient1` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pharmacy_needs`
--
ALTER TABLE `pharmacy_needs`
  ADD CONSTRAINT `fk_pharmacy_needs_pharmacy1` FOREIGN KEY (`pharmacy_pharmacy_id`) REFERENCES `pharmacy` (`pharmacy_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room_price`
--
ALTER TABLE `room_price`
  ADD CONSTRAINT `fk_room_price_patient_type1` FOREIGN KEY (`patient_type_patient_type_id`) REFERENCES `patient_type` (`patient_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_room_price_room1` FOREIGN KEY (`room_room_id`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD CONSTRAINT `fk_room_reservation_patient1` FOREIGN KEY (`patient_patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_room_reservation_room1` FOREIGN KEY (`room_room_id`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_item_price`
--
ALTER TABLE `stock_item_price`
  ADD CONSTRAINT `fk_stock_item_price_patient_type1` FOREIGN KEY (`patient_type_patient_type_id`) REFERENCES `patient_type` (`patient_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `xRay_price`
--
ALTER TABLE `xRay_price`
  ADD CONSTRAINT `fk_x-ray_price_patient_type1` FOREIGN KEY (`patient_type_patient_type_id`) REFERENCES `patient_type` (`patient_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_xRay_price_xRay1` FOREIGN KEY (`xRay_xray_id`) REFERENCES `xRay` (`xray_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
