-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 07:14 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pjs`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `mname` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `studentId` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `post` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `category` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `taka` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(600) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `fname`, `mname`, `email`, `studentId`, `phone`, `post`, `category`, `class`, `taka`, `village`, `pass`, `img`, `date`) VALUES
(18, 'asdadf', 'aesdaf', 'adsdasd', 'asdas@gmail.com', '12313', '21313124343', 'sadadf', 'Arts', 'Five', '100', 'adsdad', '$2y$10$sMvtuCYX/0.8TbNsZyDex.0pqFJ3FJKR8veALQmbamIEvyrZsiBNa', 'http://127.0.0.1:8000/storage/img/1682312988.jpg', 'Monday, 24 April, 2023'),
(19, 'asdada', 'asdasd', 'asdasd', 'adasd@gmail.com', '324234', '23423424556', 'safds', 'Arts', 'Five', '100', 'dasdasd', '$2y$10$HxVdil0FtTd/bTp6RNnHwuwnLCH7g2DhlRVYf.sw1kKzr5YTTBkV2', 'http://127.0.0.1:8000/storage/img/1682313158.jpg', 'Monday, 24 April, 2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
