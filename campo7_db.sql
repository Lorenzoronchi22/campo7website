-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 20, 2022 at 05:25 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campo7_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `phone` text NOT NULL,
  `con_email` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `phone`, `con_email`, `facebook`, `instagram`) VALUES
(1, '0306830108', 'info@polisportivacaino.it', 'https://www.facebook.com/polisportivacaino.it', '');

-- --------------------------------------------------------

--
-- Table structure for table `prenotazioni`
--

CREATE TABLE `prenotazioni` (
  `prenotazione_id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `username` text NOT NULL,
  `data` text NOT NULL,
  `ora` text NOT NULL,
  `durata` text NOT NULL,
  `tariffa_prenotazione` text NOT NULL,
  `codice_prenotazione` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prenotazioni`
--

INSERT INTO `prenotazioni` (`prenotazione_id`, `user_id`, `username`, `data`, `ora`, `durata`, `tariffa_prenotazione`, `codice_prenotazione`) VALUES
(12, '2', 'Giorgio', '2022-12-21', '14', '1', '45', '2Giorgio2022-12-2114145'),
(15, '2', 'Giorgio', '2022-12-21', '18', '1', '45', '2Giorgio2022-12-2118145'),
(16, '2', 'Giorgio', '2022-12-23', '18', '1', '50', '2Giorgio2022-12-2318150'),
(19, '4', 'antonello', '2022-12-23', '17', '1', '50', '4antonello2022-12-2317150'),
(20, '4', 'antonello', '2022-12-25', '21', '2', '50', '4antonello2022-12-2521250'),
(21, '4', 'antonello', '2022-12-25', '22', '2', '50', '4antonello2022-12-2521250');

-- --------------------------------------------------------

--
-- Table structure for table `tariffe`
--

CREATE TABLE `tariffe` (
  `tariffa_id` int(11) NOT NULL,
  `tariffacampo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tariffe`
--

INSERT INTO `tariffe` (`tariffa_id`, `tariffacampo`) VALUES
(1, '60');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `user_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `user_type`) VALUES
(2, 'Giorgio', 'giorgiorossi@gmail.com', '$2y$10$QqSxM6Lh89QJ1ijaA.EOYux8XHD5iVg1xg5r85LgU.nyYWEzkWD.2', 'user'),
(3, 'adminprofile', 'admin@gmail.com', '$2y$10$Yw/L94.PvnL/SkBAbm8W0epCLPo2w50Ff4B1jO6SMygaMt3.kpeBa', 'admin'),
(4, 'antonello', 'antoine23@gmail.com', '$2y$10$t9JSKjlyI5SneZRr5uNlT.reEpzuac/AYg4aI/zQFd9bCQ9YSRzBu', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `prenotazioni`
--
ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`prenotazione_id`);

--
-- Indexes for table `tariffe`
--
ALTER TABLE `tariffe`
  ADD PRIMARY KEY (`tariffa_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prenotazioni`
--
ALTER TABLE `prenotazioni`
  MODIFY `prenotazione_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tariffe`
--
ALTER TABLE `tariffe`
  MODIFY `tariffa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
