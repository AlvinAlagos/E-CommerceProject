-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 07:59 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `itemId`, `userId`, `quantity`) VALUES
(8, 10, 5, 2),
(17, 9, 5, 1),
(19, 11, 5, 1),
(21, 17, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(25) NOT NULL,
  `price` double NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `sellerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`itemId`, `itemName`, `price`, `description`, `size`, `quantity`, `img`, `sellerId`) VALUES
(9, 'Plain longsleeve crewneck', 20, 'Plain black crewneck', 'Large', 1, '6248ef2340293.jpg', 6),
(10, 'Nike Vintage Shirt', 5.99, 'Vintage Nike Shirt, 5 in stock bad condition', 'Small', 5, '6248ef4f0db3b.jpg', 6),
(11, 'Old denim jeans', 39.99, '8/10 condition, little stain on the back', 'X-small', 1, '6248eff2d552c.jpg', 6),
(16, 'Suzuki (14) Jersey', 199.99, 'game worn.', 'Large', 0, '624bb79fdee8e.jpg', 9),
(17, 'Honda Civic', 22983.14, '16 seats if you count the trunk', 'X-Large', 22, '624d105e25cfd.jpg', 9);

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
(6, b'0', NULL, 3),
(8, b'0', NULL, 4),
(9, b'0', NULL, 5);

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
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `password_hash`, `firstName`, `lastName`, `email`, `img`) VALUES
(3, 'AlagosAlvin', '$2y$10$O4fmQxw8lmytwLbRgSHwZ.AvFqU.eDuSIXw3nWeKoVdsmfi6kbSNi', 'Alvin Eli', 'Alagos', 'alagos_alvin@hotmail.com', '624903bf779d8.jpg'),
(4, 'VanessaLe', '$2y$10$GhZUK.AV4/L5Wxzu9GprEOEBfuDNrs0IM/moAZhtvHMbGrg0CI2kC', 'Vanessa', 'le', 'vanessale@hotmail.com', '0'),
(5, 'getll88', '$2y$10$..KfmvSc9wnNzs2.z/FQ6ekxRnEseVd1nOxFWm.a.Ox9Z78EukpY2', 'Denmar', 'Ermitano', 'ermitano.den@gmail.com', NULL);

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
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `sellerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `FK_userId` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `FK_itemID_wishlist` FOREIGN KEY (`itemID`) REFERENCES `inventory` (`itemId`),
  ADD CONSTRAINT `FK_userID_wishlist` FOREIGN KEY (`userID`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
