-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 04:33 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `comment` longtext NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `comment`, `email`) VALUES
(1, 'Malaysia I love this country. Malaysia is a Muslim Coutry foriengers also alot in this coutry specially indian and chinese. Its mountain areas are soo beautiful. Recently I visit this beautiful country and I enjoy alot I like two cities of this country 1st is Kuala lampur and the second is malaka this two cities is very beautiful and the beaches I just love it and want to go again.', 'fatinnur381@gmail.com'),
(12, 'We see ads that say Malaysia truly Asia, but well that not true. I visited Malaysia with my family and I reached there by 9 o clock. Everything to my surprise was closed. It seemed it it was 2am. We had a hard time finding a cab. Although the cab driver was very generous.\r\n\r\nWe reached our hotel and the next day we went for local sight seeing. To our surprise there was not a single person who helped us out. Frustrated we stopped at a shop for some coffee. There we asked a person the way to a very famous mall. The person gave us a wrong address and we ended up at the main highway.\r\n\r\nThe people of the place are very mean and not helpful at all. I would never advice anyone to visit Malaysia.', 'yani@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` date DEFAULT NULL,
  `day` varchar(10) NOT NULL,
  `budget` varchar(50) NOT NULL,
  `memo` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `location`, `date`, `day`, `budget`, `memo`, `email`) VALUES
(26, 'pulau dayang bunting            ', '2021-01-30', '7', '1000', 'fam trips', 'fatinnur381@gmail.com'),
(32, 'pulau kapas', '2021-01-20', '4', '1000', 'travel', 'fatinnur381@gmail.com'),
(34, 'pulau dayang bunting            ', '2021-08-26', '10', '1500', 'solo', 'fatinnur381@gmail.com'),
(35, 'pahang', '2021-01-19', '3', '500', 'test1', 'nabihah@gmail.com'),
(37, 'semporna', '2021-02-27', '5', '700', 'testing', 'fatinnur381@gmail.com'),
(38, 'semporna', '2021-04-29', '5', '500', 'fam trips', 'yani@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `email`, `contact`, `password`) VALUES
('fatin', 'fatinnur381@gmail.com', '1234567891', '6367c48dd193d56ea7b0baad25b19455e529f5ee'),
('nabihah', 'nabihah@gmail.com', '12345678910', '20eabe5d64b0e216796e834f52d61fd0b70332fc'),
('yani', 'yani@gmail.com', '1234567891', '6367c48dd193d56ea7b0baad25b19455e529f5ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
