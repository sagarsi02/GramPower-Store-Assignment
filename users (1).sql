-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 11:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_store`
--

CREATE TABLE `add_store` (
  `store_sno` int(100) NOT NULL,
  `store_name` text NOT NULL,
  `store_about` text NOT NULL,
  `cat_1` text NOT NULL,
  `cat_2` text NOT NULL,
  `cat_3` text NOT NULL,
  `address` text NOT NULL,
  `hour_from` varchar(10) NOT NULL,
  `hour_to` varchar(10) NOT NULL,
  `cover_img` varchar(1000) NOT NULL,
  `img_link1` varchar(1000) NOT NULL,
  `img_link2` varchar(1000) NOT NULL,
  `img_link3` varchar(1000) NOT NULL,
  `store_alias` varchar(40) NOT NULL,
  `store_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_store`
--

INSERT INTO `add_store` (`store_sno`, `store_name`, `store_about`, `cat_1`, `cat_2`, `cat_3`, `address`, `hour_from`, `hour_to`, `cover_img`, `img_link1`, `img_link2`, `img_link3`, `store_alias`, `store_date`) VALUES
(2, 'D-mart', 'DB City is a biggest mall of Bhopal. it is based on MP Nagar, Bhopal Madhya Pradesh', 'General Store', 'Cloth', 'Grocery', 'Kolar Road, Bhopal, Madhya Pradesh', '10', '11', 'https://www.dmartindia.com/static/media/home-banner.644eeaa9.jpg', 'https://www.dmartindia.com/static/media/photo-1534723452862-4c874018d66d.4328707c.jpg', 'https://www.dmartindia.com/static/media/photo-1531206715517-5c0ba140b2b8.69577f04.jpg', 'https://www.dmartindia.com/static/media/new-top_banner.0adc43dd.jpg', 'd-mart-store', '2022-08-01 14:26:03'),
(3, 'DB City', 'The DB City Mall is a shopping complex located in the city of Bhopal, Madhya Pradesh, India. It is the 7th largest shopping mall in India.', 'Show Rooms', 'Multi Parking', 'Restaurants', 'MP Nagar, Bhopal, Madhya Pradesh', '11', '10', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/05/ec/fe/2c/db-city-mall.jpg?w=1200&h=-1&s=1', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/e6/83/2f/20181225-213029-largejpg.jpg?w=1000&h=-1&s=1', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/15/e6/83/2e/20181225-201942-largejpg.jpg?w=1000&h=-1&s=1', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/10/50/b9/3d/photo0jpg.jpg?w=1200&h=-1&s=1', 'db-city', '2022-08-01 14:27:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES
(1, 'Sagarsi02', '$2y$10$RHVDYV9PPYgC/2MNf3tFnO9ljdDSvDJrlHJcPDn130fgA8RzFyD1m', '2022-08-01 14:13:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_store`
--
ALTER TABLE `add_store`
  ADD PRIMARY KEY (`store_sno`);
ALTER TABLE `add_store` ADD FULLTEXT KEY `store_name` (`store_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_store`
--
ALTER TABLE `add_store`
  MODIFY `store_sno` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
