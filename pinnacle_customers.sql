-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 15, 2024 at 12:28 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `displayData` (IN `p_ID_customer` INT)   BEGIN
    SELECT * FROM orderBeer WHERE ID_customer = p_ID_customer;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetCustomerByEmailAndPassword` (IN `p_email` VARCHAR(200), IN `p_password` VARCHAR(11))   BEGIN
    SELECT * FROM loginData
    WHERE email = p_email AND password = p_password;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getInsertData` (IN `p_ID_customer` INT, IN `p_fullName` VARCHAR(255), IN `p_type_beer` VARCHAR(255), IN `p_amount` VARCHAR(255), IN `p_pickup_day` VARCHAR(255), IN `p_pickup_time` VARCHAR(255))   BEGIN
    INSERT INTO orderBeers (ID_customer, fullName, type_beer, amount, pickup_day, pickup_time)
    VALUES (p_ID_customer, p_fullName, p_type_beer, p_amount, p_pickup_day, p_pickup_time);
END$$

DELIMITER ;

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
-- Indexes for table `loginData`
--
ALTER TABLE `loginData`
  ADD PRIMARY KEY (`ID_customer`);

--
-- Indexes for table `orderBeers`
--
ALTER TABLE `orderBeers`
  ADD KEY `ID_customer` (`ID_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginData`
--
ALTER TABLE `loginData`
  MODIFY `ID_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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