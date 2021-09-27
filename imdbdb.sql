-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 11:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imdbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `imdbid`
--

CREATE TABLE `imdbid` (
  `id` int(11) UNSIGNED NOT NULL,
  `kor_ime` varchar(255) NOT NULL,
  `movie_id` varchar(255) NOT NULL,
  `kor_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `imdbid`
--

INSERT INTO `imdbid` (`id`, `kor_ime`, `movie_id`, `kor_id`) VALUES
(21, 'mario', 'tt1922373', 19),
(22, 'mario', 'tt5788182', 19),
(24, 'dds', 'tt1981115', 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `uloga` enum('user','admin') NOT NULL,
  `ime` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  `korisnicko_ime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lozinka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uloga`, `ime`, `prezime`, `korisnicko_ime`, `email`, `lozinka`) VALUES
(4, 'user', 'pero', 'peric', 'pero', 'pero@pp', '98fc7b34760face5e268bff318180e05861a970f'),
(18, 'user', 'jane', 'dd', 'jane', 'josipssszivkovic98@hotmail.com', '698d51a19d8a121ce581499d7b701668'),
(19, 'admin', 'mario', 'marusic', 'mario', 'mario.mar@gmail.com', '698d51a19d8a121ce581499d7b701668'),
(20, 'user', 'dd', 'dd', 'dds', 'josip-zivkovic98@hotmail.comsss', '698d51a19d8a121ce581499d7b701668');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imdbid`
--
ALTER TABLE `imdbid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user-favorite` (`kor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imdbid`
--
ALTER TABLE `imdbid`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `imdbid`
--
ALTER TABLE `imdbid`
  ADD CONSTRAINT `user-favorite` FOREIGN KEY (`kor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
