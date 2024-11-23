-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 23, 2024 at 04:04 AM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteOrder` (IN `p_id_orders` INT)   BEGIN
    DELETE FROM `orderBeers`
    WHERE id_orders = p_id_orders;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `displayData` (IN `p_ID_customer` INT)   BEGIN
    SELECT * FROM orderBeers WHERE ID_customer = p_ID_customer;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `display_id_orders` (IN `p_id_orders` INT)   BEGIN SELECT * FROM orderBeers WHERE id_orders = p_id_orders; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `editData` (IN `p_fullName` VARCHAR(255), IN `p_type_beer` VARCHAR(255), IN `p_amount` VARCHAR(255), IN `p_pickup_day` VARCHAR(255), IN `p_pickup_time` VARCHAR(255), IN `p_id_orders` INT)   BEGIN
  UPDATE orderBeers
  SET
    fullName = p_fullName,   -- Update the fullName
    type_beer = p_type_beer,
    amount = p_amount,
    pickup_day = p_pickup_day,
    pickup_time = p_pickup_time
  WHERE id_orders = p_id_orders;
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
  `pickup_time` varchar(255) NOT NULL,
  `id_orders` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderBeers`
--

INSERT INTO `orderBeers` (`ID_customer`, `fullName`, `type_beer`, `amount`, `pickup_day`, `pickup_time`, `id_orders`) VALUES
(1, 'Tomas Moises Quiroga', 'Stout', '32', 'friday', '5 pm', 11),
(1, 'Tom oryan orzua', 'Amber', '32', 'thursday', '2 pm', 12),
(2, 'Sean Kevin Murphy', 'Amber', '30', 'friday', '3 pm', 18),
(4, 'Pablo el del jardin', 'Amber', '30', 'friday', '4 40 pm', 22),
(3, 'Pamela Mardones', 'Amber', '32', 'Friday', '4 pm', 27),
(3, 'Pam Posada A', 'Amber', '32', 'friday', '3 pm', 28),
(3, 'Pamela Ortuza', 'Stout', '130', 'Thursday', '3 pm', 29),
(2, 'Sean Kevin', 'Amber', '32', 'Friday', '3 pm', 30),
(2, 'Sean Murphy Mardones', 'Stout', '20', 'Friday', '3 pm', 31),
(1, 'Tom Mardones', 'Stout', '300', 'Friday', '5 pm', 32),
(1, 'Tomas Orzua', 'Amber', '300', 'friday', '4 pm', 33),
(3, 'Pamela Mardones', 'Stout', '32', 'Friday', '3 pm', 34),
(3, 'Pamela Murphy', 'Amber', '32', 'friday', '4 pm', 35),
(3, 'Pamela Flores', 'Stout', '20', 'Monday', '3 pm', 36),
(3, 'Pamela Vivanco', 'Pale ale', '12', 'Thursday', '2 pm', 37);

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
  ADD PRIMARY KEY (`id_orders`),
  ADD KEY `orderbeers_ibfk_1` (`ID_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginData`
--
ALTER TABLE `loginData`
  MODIFY `ID_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orderBeers`
--
ALTER TABLE `orderBeers`
  MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
