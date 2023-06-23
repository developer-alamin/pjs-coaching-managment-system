-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 11:25 AM
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
(1, 'pjs', 'pjs@gmail.com', '01740138114', 'Kolla', 'Coaching Center', 'pjs Coaching Center', 'http://127.0.0.1:8000/storage/img/2371289313/2023/login.jpg', '$2y$10$Gvb4vipsdP7QxYpxs6.yZOGT0H7jA62BtNbiceJ9elDeDYK4W2xs.', NULL, NULL);

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
(1, 'Five', 'Friday, 16 June, 2023');

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
(1, 'Atrs', 'Saturday, 17 June, 2023');

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
(6, '2023_06_19_015349_create_admins_table', 2);

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
(1, '200', 'Saturday, 17 June, 2023');

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
(19, 'Alamin', 'Majad', 'asdas', 'ma6033094@gmail.com', '2023-06-17 17:15:51', '1234567', '21312312314', 'asdasd', 'Arts', 'Five', '100', 'asdasd', '$2y$10$Gvb4vipsdP7QxYpxs6.yZOGT0H7jA62BtNbiceJ9elDeDYK4W2xs.', 'http://127.0.0.1:8000/storage/img/1687021704/2023/06.jpg', '2023-06-17 11:08:24', '2023-06-19 21:38:36');

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
(12, 'OascpVugm7cGHRgHmhBL6fujUzYsNG0otvf2Eke0', 17, '2023-06-17 03:36:09', '2023-06-17 03:36:09'),
(13, 'WbFJnRmxDundiuDmvNYU0f0pMurQy5DOBZseYA4B', 18, '2023-06-17 11:06:11', '2023-06-17 11:06:11'),
(14, 'YkIUwCc6zcazBebp47K0w3FAUgsk5VJHZwgNClIE', 19, '2023-06-17 11:08:24', '2023-06-17 11:08:24');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `depart_table`
--
ALTER TABLE `depart_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pjs_taka`
--
ALTER TABLE `pjs_taka`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_tb`
--
ALTER TABLE `student_tb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student_verify`
--
ALTER TABLE `student_verify`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
