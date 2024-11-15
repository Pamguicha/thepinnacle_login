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
-- Table structure for table `orderBeers`
--

CREATE TABLE `orderBeers` (
  `ID_customer` int(11) DEFAULT NULL,
  `fullName` varchar(255) NOT NULL,
  `type_beer` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `pickup_day` varchar(255) NOT NULL,
  `pickup_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderBeers`
--

INSERT INTO `orderBeers` (`ID_customer`, `fullName`, `type_beer`, `amount`, `pickup_day`, `pickup_time`) VALUES
(1, 'Tom Ryan', 'Amber', '24 pack', 'wednesday', '3 pm'),
(2, 'Sean Murphy', '34 beer', '30 pack', 'friday', '3 ppm'),
(2, 'Sean Murphy', 'Amber', '500', 'friday', '1 pm'),
(3, 'Pamela Ivonne', 'Amber', '24', 'friday', '4 45pm'),
(3, 'Pamela Posada', 'Amber', '30', 'friday', '4 pm'),
(3, 'pamela', 'stout', '30', 'friday', '3pm'),
(3, 'Sabrina', 'Amber', '30', 'tuesday', '3pm'),
(3, 'Pamela Mardones', 'Amber', '50', 'wednesday', '3 pm'),
(1, 'Tom orsh', 'Amber', '49 pack', 'thursday', '4 pm'),
(1, 'Tom Richard', 'stout', '30 beers', 'monday', '4 pm'),
(1, 'Tomas Edison', 'Amber', '40', 'friday', '3 pm'),
(4, 'Pablo jorquera', 'Amber', '12', 'wedne', '3 pm'),
(4, 'Pablo Picapiedra', 'Amber', '30', 'wednesday', '2 pm'),
(4, 'Pablo Marmol', 'Amber', '40', 'friday', '3 pm'),
(4, 'Bagel', 'Amber', '30', 'friday', '4 45pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderBeers`
--
ALTER TABLE `orderBeers`
  ADD KEY `ID_customer` (`ID_customer`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderBeers`
--
ALTER TABLE `orderBeers`
  ADD CONSTRAINT `orderbeers_ibfk_1` FOREIGN KEY (`ID_customer`) REFERENCES `loginData` (`ID_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
