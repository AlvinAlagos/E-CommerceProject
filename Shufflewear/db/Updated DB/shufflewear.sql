-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2022 at 04:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shufflewear`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `auctionId` int(11) NOT NULL,
  `startingBid` double NOT NULL,
  `currentBid` double DEFAULT NULL,
  `buyNowPrice` double DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `currentBidder` int(11) DEFAULT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionId`, `startingBid`, `currentBid`, `buyNowPrice`, `startDate`, `endDate`, `currentBidder`, `itemId`) VALUES
(7, 0, 0, 0, '0000-00-00', '0000-00-00', NULL, 29),
(8, 240.19, 0, 1000.4, '2022-05-03', '2022-05-06', NULL, 35);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `itemId`, `userId`, `quantity`, `size`) VALUES
(37, 28, 5, 1, 'X-small'),
(39, 29, 11, 1, 'X-small'),
(40, 29, 11, 19, 'X-small');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(25) NOT NULL,
  `description` varchar(255) NOT NULL,
  `color` varchar(50) NOT NULL,
  `isListed` bit(1) NOT NULL DEFAULT b'0',
  `img` varchar(255) NOT NULL,
  `sellerId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`itemId`, `itemName`, `description`, `color`, `isListed`, `img`, `sellerId`) VALUES
(24, 'Snoop Dogg vintage shirt', 'Vintage Shirt', 'Black', b'0', '626ad53e1f95c.jpg', NULL),
(25, 'Night Vision Goggles', 'see in da dark', 'Black', b'0', '626ad948c39a0.jpg', NULL),
(26, 'Old denim jeans', 'Little stain on it', 'Blue', b'0', '626aecb6134de.jpg', NULL),
(27, 'Snoop Dogg vintage shirt', 'Snoop Dog shirt', 'Black', b'0', '626af79cba4e2.jpg', 13),
(28, 'test', 'sauce', 'Black', b'1', '626b75474faed.jpg', 9),
(29, 'sauce', 'very wet', 'Blue', b'1', '626c2683494d2.jpg', 14),
(30, 'Nike Sweatshirt', 'Nike Sweatshirt is nice', 'White', b'1', '6271e2695eec7.jpg', 15),
(31, 'Plain Crewneck', 'Comfy bro', 'Black', b'1', '6271e2942c42e.jpg', 15),
(32, 'Jeans', 'Made from denim, may come ripped', 'Blue', b'1', '6271e2aad9ebb.jpg', 15),
(33, 'Night Vision Goggles', 'I can see at night, nice', 'Black', b'1', '6271e2d600ad6.jpg', 15),
(34, 'Snoop Shirt', 'Snoop Dogg shirt, straight from the 1990', 'Black', b'1', '6271e3328654b.jpg', 15),
(35, 'Suzuki (14) Jersey', 'Game worn and signed', 'Red', b'0', '6271e36b17694.jpg', 15);

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `listingId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `itemId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`listingId`, `quantity`, `price`, `itemId`) VALUES
(18, 10, 70.5, 30),
(19, 44, 44.55, 31),
(20, 10, 99.99, 32),
(21, 3, 434.88, 33),
(22, 20, 60.99, 34);

-- --------------------------------------------------------

--
-- Table structure for table `purchasehistory`
--

CREATE TABLE `purchasehistory` (
  `purchaseId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchaseDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasehistory`
--

INSERT INTO `purchasehistory` (`purchaseId`, `itemId`, `userId`, `quantity`, `purchaseDate`) VALUES
(10, 24, 3, 2, '2022-04-28'),
(11, 24, 3, 1, '2022-04-28'),
(12, 25, 3, 5, '2022-04-28'),
(13, 28, 11, 1, '2022-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `sellerId` int(11) NOT NULL,
  `isBanned` bit(1) NOT NULL,
  `banDate` date DEFAULT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`sellerId`, `isBanned`, `banDate`, `userId`) VALUES
(8, b'0', NULL, 4),
(9, b'0', NULL, 5),
(13, b'0', NULL, 3),
(14, b'0', NULL, 11),
(15, b'0', NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(255) DEFAULT '624903bf779d8.jpg',
  `secret` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password_hash`, `firstName`, `lastName`, `email`, `img`, `secret`) VALUES
(3, 'AlagosAlvin', '$2y$10$O4fmQxw8lmytwLbRgSHwZ.AvFqU.eDuSIXw3nWeKoVdsmfi6kbSNi', 'Alvin Eli', 'Alagos', 'alagos_alvin@hotmail.com', '624903bf779d8.jpg', ''),
(4, 'VanessaLe', '$2y$10$GhZUK.AV4/L5Wxzu9GprEOEBfuDNrs0IM/moAZhtvHMbGrg0CI2kC', 'Vanessa', 'le', 'vanessale@hotmail.com', '0', ''),
(5, 'getll88', '$2y$10$..KfmvSc9wnNzs2.z/FQ6ekxRnEseVd1nOxFWm.a.Ox9Z78EukpY2', 'Denmar', 'Ermitano', 'ermitano.den@gmail.com', '626c1ecbe0e03.png', 'GUHF63SNBIWW6PAI'),
(11, 'tester', '$2y$10$g1dRnf90GxsQNAirFKMSRe.M4snkU81s92BWu5KKReY0uTCi0hDQm', 'tester', 'tester', 'tester@tester.tester', '624903bf779d8.jpg', ''),
(12, 'getll11', '$2y$10$Uf.sdtlFV.sr71ALHjvK9OH8Bmpp1A4LSZtLePZTVV31Dc2tLzmvO', 'Denmar', 'Ermitano', 'ermitanoq95@hotmail.ca', '624903bf779d8.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistId`, `itemId`, `userId`) VALUES
(14, 28, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auctionId`),
  ADD KEY `currentBidder` (`currentBidder`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`),
  ADD KEY `FK_userID_cart` (`userId`),
  ADD KEY `FK_itemID_cart` (`itemId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `FK_sellerId` (`sellerId`);

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`listingId`),
  ADD KEY `itemId` (`itemId`);

--
-- Indexes for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD PRIMARY KEY (`purchaseId`),
  ADD KEY `itemId` (`itemId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`sellerId`),
  ADD KEY `FK_userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistId`),
  ADD KEY `FK_userID_wishlist` (`userId`),
  ADD KEY `FK_itemID_wishlist` (`itemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `auctionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `listingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  MODIFY `purchaseId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `sellerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`currentBidder`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `auction_ibfk_2` FOREIGN KEY (`itemId`) REFERENCES `inventory` (`itemId`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FK_itemID_cart` FOREIGN KEY (`itemId`) REFERENCES `inventory` (`itemId`),
  ADD CONSTRAINT `FK_userID_cart` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FK_sellerId` FOREIGN KEY (`sellerId`) REFERENCES `sellers` (`sellerId`);

--
-- Constraints for table `listing`
--
ALTER TABLE `listing`
  ADD CONSTRAINT `listing_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `inventory` (`itemId`);

--
-- Constraints for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD CONSTRAINT `purchasehistory_ibfk_1` FOREIGN KEY (`itemId`) REFERENCES `inventory` (`itemId`),
  ADD CONSTRAINT `purchasehistory_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `FK_userId` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `FK_itemID_wishlist` FOREIGN KEY (`itemId`) REFERENCES `inventory` (`itemId`),
  ADD CONSTRAINT `FK_userID_wishlist` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
