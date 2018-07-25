-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 11:04 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rfsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id_rf` int(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(255) NOT NULL,
  `property` varchar(255) NOT NULL,
  `station` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id_rf`, `brand`, `model`, `property`, `station`, `status`) VALUES
(11, 'samsung', 'sd', 'unilever', 'dispatch1', 'ready'),
(111, 'asus', 'xcv', 'linfox', 'dispatch1', 'broken'),
(554, 'samsung', 'ss123', 'unilever', 'picker', 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `operators`
--

CREATE TABLE `operators` (
  `nik` int(20) NOT NULL,
  `name` text NOT NULL,
  `job` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_sap` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operators`
--

INSERT INTO `operators` (`nik`, `name`, `job`, `image`, `id_sap`) VALUES
(2342, 'Nokia', 'picker', '/images/401040.jpg', NULL),
(45243, 'rafika', 'picker', '/images/image_1532187816.gif', NULL),
(54335, 'fdsfds', 'checker', '/images/image_1532187990.gif', NULL),
(323424, 'adel', 'checker', '/images/image_1531187447.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saps`
--

CREATE TABLE `saps` (
  `id_sap` int(10) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_lend` int(20) NOT NULL,
  `tgl_pinjam` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tgl_kembali` datetime DEFAULT NULL,
  `nik` int(20) NOT NULL,
  `id_rf` int(20) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id_lend`, `tgl_pinjam`, `tgl_kembali`, `nik`, `id_rf`, `status`) VALUES
(4, '2018-07-13 00:00:00', '2018-07-14 00:00:00', 323424, 554, 'belum dikembalikan'),
(41, '2018-07-23 10:46:39', '2018-07-23 03:46:39', 323424, 554, 'kembali');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `station` varchar(255) DEFAULT NULL,
  `level` enum('admin_rf','admin_system','manager','') DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `password`, `image`, `station`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(213, 'mirna kusuma', 'mirna', '$2y$10$p/gl36ZF6/IoatDDj4Qcd.vP..g9XNVKOrt8CGtCaOQ8RMG5Bs3tK', NULL, NULL, NULL, 'gh2AL2zDbxlvOvGeOPO5prRI16h6Sp90sGD6UR0JDUc3b0bDMGjZsIMsiNgR', '2018-07-17 07:57:07', '2018-07-17 01:36:48'),
(1122, 'Adel Calon Manager', 'manager1', '$2y$10$rcIHnQSBW/aoJfqdROH9ReofBlR07ywZ8pHhWkGnHB6CpGnv/x8e6', '', NULL, 'manager', 'xAAXhreCWnm7FfN6TsniCPXqOY4joyU4pvZ6P5YXU3JLUUelHKbaRqgd3TCT', '2018-07-23 07:47:29', '2018-07-18 04:21:43'),
(1312, 'adelia', 'admin_sistem', '$2y$10$Yc/5l5toi30DJj7lRsqCW.icXZqSpv8E5qOiI14BAqfmDGcOiPtF6', NULL, NULL, 'admin_system', 'NkaqB782VfjnT2RCUOxrU0pWSAKwEzyNkXA0LKqQdrgAzUxhasnMEZuMDQXk', '2018-07-22 12:22:34', '2018-07-18 06:43:41'),
(5643, 'adel', 'mirna.kusumawati', '$2y$10$33wsZ7to.75DjNvPI2AXpeyKlVAFb8O6i8bbDE2eQNzGN9zwvnmUy', '/images/image_1532051156.PNG', 'Receiving', 'admin_rf', NULL, '2018-07-20 01:45:57', '2018-07-20 01:45:57'),
(11506, 'adel', 'mirna', '543', '', 'Dispatch 2', NULL, NULL, '2018-07-16 14:45:38', '2018-07-16 14:45:38'),
(32432, '32241', 'fdfdfds', '$2y$10$HKQuOM41kR73Qq0d2z4Qieng0s1sF8CO6D2GnkL1uc8CvZSQ4WpGi', '\r\n', 'Dispatch 1', 'admin_rf', NULL, '2018-07-20 02:52:43', '2018-07-20 02:52:14'),
(401040, 'Mirna Kusumawati', 'mirnakusuma', '$2y$10$Kkktrj/MvhgqtVyOWdUKNO6YwEkYyLrxO57RDPK/yprkPlV7kQu4u', '/images/image_1532053052.jpg', 'Dispatch 1', 'admin_rf', NULL, '2018-07-20 02:17:32', '2018-07-20 02:17:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id_rf`);

--
-- Indexes for table `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `id_sap` (`id_sap`);

--
-- Indexes for table `saps`
--
ALTER TABLE `saps`
  ADD PRIMARY KEY (`id_sap`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_lend`),
  ADD KEY `id_rf` (`id_rf`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saps`
--
ALTER TABLE `saps`
  MODIFY `id_sap` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id_lend` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401041;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `operators`
--
ALTER TABLE `operators`
  ADD CONSTRAINT `operators_ibfk_1` FOREIGN KEY (`id_sap`) REFERENCES `saps` (`id_sap`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_rf`) REFERENCES `devices` (`id_rf`),
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `operators` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
