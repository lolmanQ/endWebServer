-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 28 aug 2020 kl 10:57
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `usertest`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `productID`, `amount`) VALUES
(1, 6, 4, 15),
(2, 6, 2, 100),
(8, 2, 2, 0),
(9, 2, 4, 0),
(10, 6, 6, 20),
(11, 9, 2, 7),
(12, 9, 4, 12),
(13, 9, 6, 25),
(14, 0, 2, 0),
(15, 0, 4, 0),
(16, 0, 6, 0),
(17, 0, 2, 0),
(18, 0, 4, 0),
(19, 0, 6, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cost` float NOT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`productID`, `name`, `cost`, `img`) VALUES
(2, 'orange', 12, 'orange.jpg'),
(4, 'apple', 15, 'apple.jpg'),
(6, 'Strawberry', 20, 'strawberry.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(64) NOT NULL,
  `privliges` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `privliges`) VALUES
(8, 'admin', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'admin'),
(9, 'Elias', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'user');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Index för tabell `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`) USING BTREE;

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT för tabell `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
