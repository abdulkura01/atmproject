-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 01:53 PM
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
-- Database: `steamledgedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `bf` decimal(20,2) NOT NULL,
  `amnt` decimal(20,2) NOT NULL,
  `cf` decimal(20,2) NOT NULL,
  `detail` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `userId`, `bf`, `amnt`, `cf`, `detail`, `status`, `date`, `updated_at`) VALUES
(1, 4, '0.00', '200000.00', '200000.00', 'CR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(2, 4, '200000.00', '20000.00', '180000.00', 'DR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(3, 4, '180000.00', '10000.00', '190000.00', 'CR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(4, 4, '190000.00', '5000.00', '195000.00', 'CR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(5, 4, '195000.00', '3000.00', '198000.00', 'CR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(6, 4, '198000.00', '2000.00', '200000.00', 'CR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(7, 4, '200000.00', '1000.00', '199000.00', 'DR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(8, 4, '199000.00', '1000.00', '200000.00', 'CR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(9, 5, '0.00', '3000.00', '3000.00', 'CR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(10, 5, '3000.00', '1000.00', '2000.00', 'DR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(11, 6, '0.00', '50000.00', '50000.00', 'CR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(12, 6, '50000.00', '4000.00', '46000.00', 'DR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(13, 6, '46000.00', '1000000.00', '1046000.00', 'CR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(14, 6, '1046000.00', '500000.00', '546000.00', 'DR', 1, '2021-05-01', '2021-05-02 03:14:36'),
(15, 7, '0.00', '30000.00', '30000.00', 'CR', 1, '2021-05-02', '2021-05-02 03:14:36'),
(16, 7, '30000.00', '3000.00', '27000.00', 'DR', 1, '2021-05-02', '2021-05-02 03:14:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'Abdul', 'a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8'),
(2, 'Dahir', 'u', '51e69892ab49df85c6230ccc57f8e1d1606caccc'),
(3, 'Musa', 'b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98'),
(4, 'Musa', 'f', '4a0a19218e082a343a1b17e5333409af9d98f0f5'),
(5, 'Farouk', 'h', '27d5482eebd075de44389774fce28c69f45c8a75'),
(6, 'Tanko', 's', 'a0f1490a20d0211c997b44bc357e1972deab8ae3'),
(7, 'Dahir', 'g', '54fd1711209fb1c0781092374132c66e79e2241b');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `balance` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `userId`, `balance`) VALUES
(1, 4, '200000.00'),
(3, 5, '2000.00'),
(4, 6, '546000.00'),
(5, 7, '27000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
