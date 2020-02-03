-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 05:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_spot`
--

CREATE TABLE `blog_spot` (
  `id_blogSpot` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `URL` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `metaTitle` varchar(50) NOT NULL,
  `URL` varchar(50) NOT NULL,
  `content` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `prefix` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileNo` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirmPassword` varchar(50) NOT NULL,
  `information` varchar(50) NOT NULL,
  `Submit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `prefix`, `firstName`, `lastName`, `email`, `mobileNo`, `password`, `confirmPassword`, `information`, `Submit`) VALUES
(3, 'Miss', 'gfhg', 'hgh', 'ss@gmail.com', '12315', '46', '65', 'ghj fgyhj', 'Submit'),
(4, 'Mr', '', '', '', '', '', '', '', 'Submit'),
(5, 'Mr', '', '', '', '', '', '', '', 'Submit'),
(6, 'Mr', '', '', '', '', '', '', '', 'Submit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_spot`
--
ALTER TABLE `blog_spot`
  ADD PRIMARY KEY (`id_blogSpot`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_spot`
--
ALTER TABLE `blog_spot`
  MODIFY `id_blogSpot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
