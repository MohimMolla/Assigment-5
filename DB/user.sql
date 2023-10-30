-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2023 at 12:02 AM
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
-- Database: `assigment_5`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `password`, `role`, `created_at`) VALUES
(1, 'Mohim Molla', 'mohim@gmail.com', 45678, 123456, '', '2023-10-29 17:11:00'),
(6, 'admin', 'admin@gmail.com', 123456, 123456, '', '2023-10-30 15:49:36'),
(7, 'Carson Blake', 'kyro@mailinator.com', 1, 0, '', '2023-10-30 15:58:47'),
(8, 'Raphael Cabrera mmmmmmmmmm', 'mikequxo@mailinator.com', 1, 0, '', '2023-10-30 15:58:54'),
(9, 'Erasmus Battle', 'facek@mailinator.com', 2147483647, 0, '', '2023-10-30 15:59:25'),
(10, 'Ora Porter', 'lotutum@mailinator.com', 2147483647, 123456, '', '2023-10-30 16:13:22'),
(11, 'Sage Saunders', 'sacanah@mailinator.com', 1, 0, '', '2023-10-30 17:01:03'),
(12, 'Ifeoma Christian', 'cuzofe@mailinator.com', 0, 0, 'user', '2023-10-30 17:15:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
