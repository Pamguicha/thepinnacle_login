-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 14, 2024 at 11:59 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinnacle_customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginData`
--

CREATE TABLE `loginData` (
  `ID_customer` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loginData`
--

INSERT INTO `loginData` (`ID_customer`, `email`, `firstName`, `password`) VALUES
(1, 'Cardinal@am.com', 'Tom', '12345'),
(2, 'sean@hotmail.com', 'Sean', 'sean123'),
(3, 'pam@gmail.com', 'Pam', 'pam123'),
(4, 'pablo@am.com', 'Pablo', 'Norway');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginData`
--
ALTER TABLE `loginData`
  ADD PRIMARY KEY (`ID_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginData`
--
ALTER TABLE `loginData`
  MODIFY `ID_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
