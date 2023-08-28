-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 01:54 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--
CREATE TABLE IF NOT EXISTS `customer` (
  `customerID` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `phone2` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `district` varchar(30) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`),
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`fullName`, `email`, `mobile`, `phone2`, `address`, `address2`, `city`, `district`, `status`, `createdOn`) VALUES
('Tatsuro Yamashita', 'tatsuroyamashita1979@yahoo.com', 993737, 772484884, '219-1065, Wakayanagi, Shimohataoka', 'Kurihara-shi', 'Miyagi', 'Japan', 'Active', '2018-04-30 15:14:02'),
('Aimi Fukada', 'aimifukada1995@gmail.com', 333829832, 0, '317-1072, Town House, ', 'Nishi-ku Hamatsu-shi', 'Shizuoka', 'Japan', 'Disabled', '2018-05-01 12:03:10'),
('Asitha Silva', 'asitha@gmail.com', 777987654, 0, 'No. 3, Radcliff Avenue, School Lane', 'Kalutara South', 'Kalutara', 'Kalutara', 'Active', '2018-05-02 09:52:28'),
('Sunil Perera', 'Sunil@gypsies.sound', 338393932, 413837293, '67/7, Perera Villa, Jayasekara Avenue', 'Mount Lavinia', 'Ratmalana', 'Colombo', 'Active', '2018-05-02 10:48:37'),
( 'Theresa May', 'may34@uk.gov.com', 329393903, 777833737, '12, Downing Street', 'London', 'London', 'Matale', 'Active', '2018-05-03 02:28:07'),
('Sachin Tendulkar', 'sachintendulkar@icc.com', 444958303, 84792838, '789-4, Apartment 3, ', 'Cric Complex', 'New Delhi', 'Puttalam', 'Active', '2018-05-03 02:28:38'),
('Nuwan Perara', 'nuwan@yahoo.com', 839378202, 0, 'Nuwan Villa, Lower Street,', 'North Mulativu', 'Mullaitivu', 'Mullaitivu', 'Active', '2018-05-05 11:17:49'),
('Amal Silverton', 'amals452@yahoo.com', 232345676, 0, 'Amal\'s House, Amal\'s Street,', 'Amal Road', 'Ambalangoda', 'Galle', 'Active', '2018-05-05 13:27:06'),
('Andrew Symonds', 'symonds@cricket.au.com', 123, 0, '23, Oak View Avenue', 'Western Australia', 'Melbourne', 'Colombo', 'Disabled', '2018-05-13 01:20:23'),
('Mark Taylor', '', 111, 0, '111', '', '', 'Colombo', 'Active', '2018-05-13 01:24:54'),
('Nelson Mandela', 'sjobs@apple.com', 333829832, 0, '1st Floor, Apple House, ', 'Las Vegas Street', 'Las Vegas', 'Kalutara', 'Disabled', '2018-05-13 02:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--
-- 8/9/2023: create table statement will only run now if it does not exists.
CREATE TABLE IF NOT EXISTS `item` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `itemNumber` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `unitPrice` float NOT NULL DEFAULT '0',
  `imageURL` varchar(255) NOT NULL DEFAULT 'imageNotAvailable.jpg',
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `description` text NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--
-- 8/9/2023: Removed productID in the insert statement as this is already auto-incremental
INSERT INTO `item` (`itemNumber`, `itemName`, `discount`, `stock`, `unitPrice`, `imageURL`, `status`, `description`) VALUES
('1', 'A4 Wagyu Beef', 0, 28, 1500, '1691311778_JW_A4_RIBSTEAK_500-600x400.png', 'Active', 'A4 Wagyu Beef'),
('2', 'Chicken Cutlet', 0, 5, 500, '1691311848_chicken-breast-650x353.jpg', 'Active', 'Chicken Cutlet'),
('3', 'Raw Salmon', 0, 5, 1300, '1691311941_raw-salmon-meat.jpg', 'Active', 'Raw Salmon'),
('4', 'Japanese Egg', 2, 6, 3409, '1691312018_pngwing.com.png', 'Active', 'Japanese Egg'),
('5', 'Japanese Rice', 2, 17, 1200, '1691312076_pngwing2.com.png', 'Active', 'Japanese Rice'),
('6', 'Pancake Mix', 0, 0, 3000, '1691312193_pancake mix.png', 'Active', 'Japanese Pancake Mix'),
('7', 'Soy Sauce', 1.5, 10, 1650, '1691312260_pngegg.png', 'Active', 'Soy Sauce'),
('8', 'Japanese Onion', 2.1, 9, 2300, '1691312326_Green-japanese-bunching-onion-on-transparent-background-PNG.png', 'Active', 'Japanese Onion'),
('9', 'Curry Sauce', 1, 92, 1000, '1691312410_curry mix.png', 'Active', 'Curry Sauce'),
('10', 'Fish Sauce', 1.5, 11, 1200, '1691312465_fish sauce.png', 'Active', 'Fish Sauce');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchaseID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `purchaseDate` date NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `unitPrice` float NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `vendorName` varchar(255) NOT NULL DEFAULT 'Test Vendor',
  `vendorID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseID`, `itemNumber`, `purchaseDate`, `itemName`, `unitPrice`, `quantity`, `vendorName`, `vendorID`) VALUES
(1, '1', '2023-01-24', 'Agedashi Tofu', 1500, 28, 'Johnson and Johnsons Co.', 3),
(2, '2', '2023-01-18', 'Agedashi Tofu', 1500, 28, 'Louise Vitton Bag', 4),
(3, '3', '2023-02-07', 'Tori Teriyaki', 1650, 10, 'Johnson and Johnsons Co.', 3),
(4, '4', '2023-02-24', 'Agedashi Tofu', 1500, 28, 'Louise Vitton Bag', 4),
(5, '6', '2023-03-16', 'Torikaraage', 2300, 9, 'ABC Company', 1),
(6, '7', '2023-03-21', 'Omurice', 1000, 92, 'Sample Vendor 222', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `saleID` int(11) NOT NULL,
  `itemNumber` varchar(255) NOT NULL,
  `customerID` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `itemName` varchar(255) NOT NULL,
  `saleDate` date NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `unitPrice` float(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`saleID`, `itemNumber`, `customerID`, `customerName`, `itemName`, `saleDate`, `discount`, `quantity`, `unitPrice`) VALUES
(1, '3', 4, 'Tatsuro Yamashita', 'Agedashi Tofu', '2023-01-02', 5, 2, 1300),
(2, '1', 39, 'Amal Silverton', 'Agedashi Tofu', '2023-01-09', 0, 111, 1500),
(3, '4', 18, 'Asitha Silva', 'Buta Kashira', '2023-01-16', 2, 1, 3409),
(4, '5', 25, 'Theresa May', 'Saba Shioyaki', '2023-01-23', 2, 1, 1200),
(5, '6', 24, 'Sunil Perera', 'Torimomo', '2023-02-06', 0, 1, 3000),
(6, '7', 14, 'Tatsuro Yamashita', 'Torikawa', '2023-02-13', 1.5, 1, 1650),
(7, '3', 4, 'Aimi Fukada', 'Okonomiyaki', '2023-02-20', 0, 3, 1300),
(8, '8', 4, 'Aimi Fukada', 'Tori Teriyaki', '2023-02-27', 2.1, 1, 2300),
(9, '6', 26, 'Sachin Tendulkar', 'Torikaraage', '2023-03-06', 0, 1, 3000),
(10, '5', 25, 'Theresa May', 'Omurice', '2023-03-13', 2, 9, 1200),
(11, '10', 26, 'Sachin Tendulkar', 'Katsu-Curry', '2023-03-20', 1, 7, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fullName`, `username`, `password`, `status`) VALUES
(5, 'Guest', 'guest', '81dc9bdb52d04dc20036dbd8313ed055', 'Active'),
(6, 'a', 'a', '0cc175b9c0f1b6a831c399e269772661', 'Active'),
(7, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Active');

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendorID` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `phone2` int(11) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `district` varchar(30) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `fullName`, `email`, `mobile`, `phone2`, `address`, `address2`, `city`, `district`, `status`, `createdOn`) VALUES
(1, 'ABC Company', '', 2343567, 0, '80, Ground Floor, ABC Shopping Complex', '46th Avenue', 'Pangasinan', 'La Union', 'Active', '2019-05-05 05:48:44'),
(2, 'Sample Vendor 222', 'sample@volvo.com', 99828282, 283730183, '123, A Road, B avenue', '123, A Road, B avenue', 'Pinakpinakan', 'Bulacan', 'Disabled', '2020-05-05 06:12:02'),
(3, 'Johnson and Johnsons Co.', '', 32323, 0, '34, Malwatta Road, Kottawa', 'Manila', 'Bataan', 'Bataan', 'Active', '2019-05-05 06:28:33'),
(4, 'Louise Vitton Bag', 'vitton@vitton.usa.com', 323234938, 0, '45, Palmer Valley, 5th Crossing', 'Manila', 'Manila', 'Bataan', 'Active', '2019-05-05 06:29:41'),
(6, 'Test Vendor', 'test@vendor.com', 43434, 47569937, 'Test address', 'Test address 2', 'Test City', 'NCR', 'Active', '2019-05-05 06:53:14'),
(7, 'Bags Co. Exporters Ltd.', '', 1111, 0, 'Sea Road, Bambalapitiya', 'bagscoexporters.email.com', 'Test Address 2', 'NCR', 'Active', '2013-05-15 10:36:54'),
(8, 'New Bags Exporters', '', 191938930, 0, '123, A Road, B avenue, ', 'Gilford Crescent', 'Manila, Metro Manila', 'NCR', 'Active', '2019-05-16 12:36:53'),
(9, 'A', 'a@gmail.com', 999995, 98866767, 'manila', 'Metro Manila', 'Manila City', 'NCR', 'Active', '2020-07-30 11:40:25');

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchaseID`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`saleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendorID`);

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchaseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `saleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
