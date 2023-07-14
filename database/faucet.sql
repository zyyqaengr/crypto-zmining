-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2018 at 03:04 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faucet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(250) NOT NULL,
  `admin_username` varchar(250) NOT NULL,
  `admin_password` varchar(250) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_alias` varchar(250) NOT NULL,
  `randSalt` varchar(250) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_email`, `admin_alias`, `randSalt`) VALUES
(7, 'admin', '', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_balance`
--

CREATE TABLE `main_balance` (
  `satoshi` int(250) NOT NULL DEFAULT '100000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_balance`
--

INSERT INTO `main_balance` (`satoshi`) VALUES
(82920);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `user_id` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`user_id`, `username`, `email`, `subject`, `message`, `date`) VALUES
(22, 'testing', 'test@test', 'testhgfhgfhgf', 'qwertyuiop', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_role` varchar(90) NOT NULL,
  `btc_address` varchar(255) NOT NULL,
  `balance` int(255) NOT NULL,
  `last_claim` datetime NOT NULL,
  `date` date NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `user_role`, `btc_address`, `balance`, `last_claim`, `date`, `randSalt`) VALUES
(20, 'qwerty', '$2y$10$iusesomecrazystrings2uVvlyU2UIRwnPdXCmMhFVDuffwDEM7IW', 'qwerty@qwerty', 'member', 'qwertyuiopasdfghjklzxcvbnm,', 0, '2018-04-05 20:30:37', '2018-04-04', '$2y$10$iusesomecrazystrings22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
