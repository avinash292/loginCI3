-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 06:40 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginpractical`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `user_type`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `p_id` varchar(20) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_address` varchar(50) NOT NULL,
  `p_pincode` varchar(10) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `area` varchar(20) NOT NULL,
  `facilities` varchar(50) NOT NULL,
  `p_ref` varchar(20) NOT NULL,
  `p_photo` varchar(100) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `p_id`, `p_name`, `p_address`, `p_pincode`, `a_name`, `area`, `facilities`, `p_ref`, `p_photo`, `u_id`) VALUES
(1, 'hbjhajhbka', 'ljhb', 'jhbkj', '666666', 'yg', 'jygk', 'ljyg', 'kuyg', 'bd7771169697dd1b4c1f2fe76b5ff28c.jpg', 1),
(2, 'hgfjf', 'hgv', ',hjg', '545454', ',jhg', 'khgf', ',jhg', ',jhg', '7905307678f8153d36b3453602929744.jpg', 2),
(3, 'kjhbb', 'khvjh', 'hgjvh', '676767', 'jkhgv', 'kjgv', 'kjgv', 'kjhv', 'c817bcd79a5e2e0dc4abc62c2898a074.jpg', 1),
(4, ',hvhb', 'lkjhbjlb', 'ljhbkj', '787878', 'jhv', 'kjgv', 'kghv', 'kjhv', '4b182d71674ad70f3980640d62ba7d8e.jpg', 2),
(5, ',jblkbh', 'lkblj', 'lkbkj', '767676', 'ukgliguy', 'jyk', 'kuyg', 'kjv', 'bda4eb63dad5d45e5743c3e007b5bf25.jpg', 3),
(6, ',nvkhgv', 'ljhvkjvh', 'jhvkjgv', '878787', 'lhjbkjh', 'ljhvkjvh', 'ljhkjh', 'ljhvkjv', 'fbdc1c076d3230d60d08c54843178cb5.png', 3),
(7, 'h,jbh', 'hjb,jh', 'ljkhbbjh', '767676', ',jhvm', ',jhkj', 'jhkvj', 'kjvk', '8b8a54909feeb4a58381c719f68e590d.jpg', 2),
(8, 'ghjsf', 'gfgndfh', 'chjmdfh', '444444', 'vghmdgdh', 'fhjdyh', 'xfgnjf', 'fgjsyf', '0553b6f53ca94ccd45b125d603686c14.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `address`, `gender`, `city`, `state`, `country`, `pincode`) VALUES
(1, 'avinash', '123', 'avi@gmail.com', 'allahabad', 'male', 'allahabad', 'Uttar Pradesh', 'India', '545454'),
(2, 'vikas', '123', 'vikas@gmail.com', 'ahh', 'male', 'allahabad', 'Uttar Pradesh', 'India', '212121'),
(3, 'aman', '123', 'aman@gmail.com', 'allahabad', 'male', 'allahabad', 'Uttar Pradesh', 'India', '656565');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
