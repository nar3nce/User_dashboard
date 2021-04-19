-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 07:49 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_dashboard`
--
CREATE DATABASE IF NOT EXISTS `user_dashboard` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `user_dashboard`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `fullname` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `created_at` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `usertype` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `password`, `created_at`, `usertype`) VALUES
(1, 'nar3nce@gmail.com', 'narence valencia', 'ff13adc559904f3d9e401c6cd579d9c0', '21-04-19 05:43:31 AM', 'admin'),
(2, 'admin@email.com', 'admin', '59235f35e4763abb0b547bd093562f6e', '21-04-19 05:49:17 AM', 'admin'),
(3, 'normal@email.com2', 'normal user', 'eaa18e4665cb492a2203e1081e5d482c', '21-04-19 05:49:42 AM', 'normal'),
(4, 'jr@email.som', 'jr torres', '6f19d5c05af97dd8f1f39c90ea093bea', '21-04-19 07:08:08 AM', 'normal'),
(5, 'che@email.com', 'divine cruz', '97b782d67313f7934aee781f46713377', '21-04-19 07:47:35 AM', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
