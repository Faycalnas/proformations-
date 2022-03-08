-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 28, 2021 at 07:29 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proformations`
--

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `code` varchar(25) NOT NULL,
  `titre` varchar(128) NOT NULL,
  `resume` text,
  `domaine` varchar(50) DEFAULT NULL,
  `langue` varchar(64) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `code`, `titre`, `resume`, `domaine`, `langue`, `create_at`) VALUES
(4, 'SVT001', 'SVT 3e', 'Cours de biologie pour les classes de 3e', 'Biologie', 'Fran&ccedil;ais', '2021-08-20 00:26:51'),
(8, 'TEST', 'Algo 1', 'Cours d\'initiation &agrave; l\'algo - niveau 1', 'Informatique', 'Fran&ccedil;ais', '2021-08-23 20:39:45'),
(9, 'IT001', 'Algo 1', 'Cours d\'initiation &agrave; l\'algorithme - Niveau 1', 'Informatique', 'Fran&ccedil;ais', '2021-08-24 12:36:10'),
(10, 'SYM234', 'SYMFONY ', 'Le cours sur la librairie Symfony', 'Informatique', 'Fran&ccedil;ais', '2021-09-19 21:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(11) NOT NULL,
  `INE` varchar(25) NOT NULL,
  `code` varchar(25) NOT NULL,
  `inscriptionDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `INE`, `code`, `inscriptionDate`) VALUES
(2, '0123456', 'SVT001', '2021-08-24 02:25:10'),
(4, '0123456', 'TEST', '2021-08-24 12:34:48'),
(5, '1209382327', 'SVT001', '2021-10-28 20:58:32'),
(6, '1209382327', 'TEST', '2021-10-28 20:58:37'),
(7, '1209382327', 'IT001', '2021-10-28 20:58:39'),
(8, '1209382327', 'SYM234', '2021-10-28 20:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(50) NOT NULL,
  `INE` varchar(25) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `est_valide` tinyint(1) NOT NULL,
  `clef` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `INE`, `nom`, `prenom`, `adresse`, `ville`, `password`, `mail`, `role`, `image`, `est_valide`, `clef`) VALUES
('admin', '01234', 'Admin', 'COMPTE', 'administration', '', '$2y$10$mJzoMCmaU1sgy4uOeoLl1OXWXcPvQbIDTIOmfcCd4mQumqDnGJ3b2', 'test@test.fr', 'administrateur', 'profils/admin/22396_bridges-george-washington-bridge-bridge-light-wallpaper-preview.jpeg', 1, 0),
('durant', '1209382327', 'DURANT', 'KEVIN', '15 RUE DE LA CONVENTION', 'PARIS', '$2y$10$ZUwzVEm60XV/HrNjYRZeke8KsHiDt71wyOZHOFPWeqhljyUrqW51G', 'durant.kevin@gmail.com', 'utilisateur', 'profils/durant/91686_alhambra.jpg', 1, 8401),
('nass', '8475437634', 'nass', 'faycal', '5 rue du tage', 'Paris', '$2y$10$MMd.74pqmRl4APkXZjQHmuFAALq/xFXh7NvkginR/3Qa3o.lK1jZ2', 'nassiri.faycal@gmail.com', 'administrateur', 'profils/nass/62954_alhambra-palace-in-granada-andalusia-spain-jpg_header-136280.jpeg', 1, 420);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cours` (`code`),
  ADD KEY `fk_etudiant` (`INE`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`login`),
  ADD UNIQUE KEY `INE` (`INE`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `fk_cours` FOREIGN KEY (`code`) REFERENCES `cours` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_etudiant` FOREIGN KEY (`INE`) REFERENCES `utilisateur` (`INE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

