-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 10:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjs_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_td`
--

CREATE TABLE `admin_td` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(70) NOT NULL,
  `admin_email` varchar(70) NOT NULL,
  `admin_mobile` varchar(70) NOT NULL,
  `admin_village` varchar(70) NOT NULL,
  `admin_post` varchar(70) NOT NULL,
  `admin_about` varchar(70) NOT NULL,
  `admin_img` varchar(70) NOT NULL,
  `admin_pass` varchar(70) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_td`
--

INSERT INTO `admin_td` (`id`, `admin_name`, `admin_email`, `admin_mobile`, `admin_village`, `admin_post`, `admin_about`, `admin_img`, `admin_pass`, `created_at`, `updated_at`) VALUES
(1, 'Alamin Ali', 'ma6033094@gmail.com', '0984902384', 'Doforpur', 'Billkola', 'My Name is alamin.i am a web developer...', 'http://127.0.0.1:8000/storage/img/1688191294/2023/07.jpg', '$2y$10$Mw5yVKLmBg05BtRoIrSRm.v0YWpZwL3SFQh.ekpdaZWRHuYelmfzO', NULL, '2023-07-06 02:39:27');

-- --------------------------------------------------------

--
-- Table structure for table `class_table`
--

CREATE TABLE `class_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_name` varchar(191) NOT NULL,
  `class_date` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_table`
--

INSERT INTO `class_table` (`id`, `class_name`, `class_date`) VALUES
(1, 'Five', 'Wednesday, 28 June, 2023'),
(2, 'Six', 'Wednesday, 28 June, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `depart_table`
--

CREATE TABLE `depart_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `depart_name` varchar(191) NOT NULL,
  `depart_date` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `depart_table`
--

INSERT INTO `depart_table` (`id`, `depart_name`, `depart_date`) VALUES
(1, 'Arts', 'Wednesday, 28 June, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2023_04_30_035743_student_table_migration', 1),
(2, '2023_05_01_072242_class_migration', 1),
(3, '2023_05_04_034139_department_migration', 1),
(4, '2023_05_04_083853_taka_migration', 1),
(5, '2023_06_16_014024_users_verify_migration', 1),
(6, '2023_06_19_015349_create_admins_table', 1),
(7, '2023_06_24_032913_create_invoices_table', 1),
(8, '2023_06_26_022635_invoice_rename', 2),
(9, '2023_07_03_083521_create_stdent_pass_resets_table', 3),
(10, '2023_07_03_083849_create_admin_pass_resets_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pjs_taka`
--

CREATE TABLE `pjs_taka` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pjs_taka` varchar(191) NOT NULL,
  `taka_date` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pjs_taka`
--

INSERT INTO `pjs_taka` (`id`, `pjs_taka`, `taka_date`) VALUES
(1, '100', 'Wednesday, 28 June, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `student_tb`
--

CREATE TABLE `student_tb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(191) NOT NULL,
  `student_fname` varchar(191) NOT NULL,
  `student_mname` varchar(191) NOT NULL,
  `student_email` varchar(191) NOT NULL,
  `student_email_verified_at` varchar(191) DEFAULT NULL,
  `student_studentId` varchar(191) NOT NULL,
  `student_phone` varchar(191) NOT NULL,
  `student_post` varchar(191) NOT NULL,
  `student_category` varchar(191) NOT NULL,
  `student_class` varchar(191) NOT NULL,
  `student_taka` varchar(191) NOT NULL,
  `student_village` varchar(191) NOT NULL,
  `student_pass` varchar(191) NOT NULL,
  `student_img` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_tb`
--

INSERT INTO `student_tb` (`id`, `student_name`, `student_fname`, `student_mname`, `student_email`, `student_email_verified_at`, `student_studentId`, `student_phone`, `student_post`, `student_category`, `student_class`, `student_taka`, `student_village`, `student_pass`, `student_img`, `created_at`, `updated_at`) VALUES
(4, 'abir', 'mijan', 'anua', 'mdalaminali125315@gmail.com', '2023-07-01 05:55:15', '12345456', '13424234333', 'Student', 'Arts', 'Five', '100', 'Kdsas', '$2y$10$oS/Y.8QHeNs96OqJ.iqCYuZ4ZhFr4/DfmdRXyLTuHOmL/NaqT1a..', 'http://127.0.0.1:8000/storage/img/1688190893/2023/07.jpg', '2023-06-30 23:54:54', '2023-06-30 23:55:15'),
(5, 'maruf', 'aje', 'asd', 'alaminali121121@gmail.com', '2023-07-01 05:57:51', '1234243', '12312412322', 'Adas', 'Arts', 'Five', '100', 'ahnfjkas', '$2y$10$MVur3tJkWj0aAhJx6oJRVeQDWF2lc1pmF8o6Rm5SVTO8H2tw26b26', 'http://127.0.0.1:8000/storage/img/1688191043/2023/07.jpg', '2023-06-30 23:57:23', '2023-06-30 23:57:51'),
(9, 'alamin', 'majad', 'asd', 'ma6033094@gmail.com', '2023-07-05 05:59:30', '1234567', '13213412431', 'sadasd', 'Arts', 'Five', '100', 'asda', '$2y$10$ge.7EiDjfKZ53gMmI6siMO/1yGhcwJlT/Q/98lbbtLWkF3/jaEiY2', 'http://127.0.0.1:8000/storage/img/1688536594/2023/07.jpg', '2023-07-04 23:56:34', '2023-07-06 02:50:07');

-- --------------------------------------------------------

--
-- Table structure for table `student_verify`
--

CREATE TABLE `student_verify` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_token` varchar(191) NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_verify`
--

INSERT INTO `student_verify` (`id`, `student_token`, `student_id`, `created_at`, `updated_at`) VALUES
(1, 'IjjKNEt5ogsNrRVDrCMNFGolEPSoimefUxuequTJ', 1, '2023-06-24 04:09:41', '2023-06-24 04:09:41'),
(2, 'NmJb4FdnyptCNBO2hH2Jx9gtEQCHLqxBtAlm526K', 2, '2023-06-24 20:20:07', '2023-06-24 20:20:07'),
(3, 'np2y6bFRgVpXP2D1Hvp80AVvbsStPWyr8ZNfv7Ay', 3, '2023-06-30 23:50:50', '2023-06-30 23:50:50'),
(4, '7zpetpAEFrgHENSeqHtevZsLGTpvLgO7WHA3jntN', 4, '2023-06-30 23:54:54', '2023-06-30 23:54:54'),
(5, 'rP1A7s8QnQ9Jss3M00pfmIuh1MozDpJzH1S6C6At', 5, '2023-06-30 23:57:23', '2023-06-30 23:57:23'),
(6, 'D2QuTqumIFbSB5qg25GmcaFlQupRYAtz9luZr09D', 6, '2023-07-04 23:30:34', '2023-07-04 23:30:34'),
(7, 'bhq0xpxDsmNZhHxY9K8U5CQ84L47Rrnl7QJfGea9', 7, '2023-07-04 23:33:27', '2023-07-04 23:33:27'),
(9, 'bmV2hn5iXjwD5PJa9M3YsX6OoS0Yg24t2MLvvj8I', 9, '2023-07-04 23:56:34', '2023-07-04 23:56:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_td`
--
ALTER TABLE `admin_td`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_table`
--
ALTER TABLE `class_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depart_table`
--
ALTER TABLE `depart_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pjs_taka`
--
ALTER TABLE `pjs_taka`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_tb`
--
ALTER TABLE `student_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_verify`
--
ALTER TABLE `student_verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_td`
--
ALTER TABLE `admin_td`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_table`
--
ALTER TABLE `class_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `depart_table`
--
ALTER TABLE `depart_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pjs_taka`
--
ALTER TABLE `pjs_taka`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_tb`
--
ALTER TABLE `student_tb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_verify`
--
ALTER TABLE `student_verify`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
