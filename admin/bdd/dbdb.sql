-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 02:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nom_admin` varchar(50) DEFAULT NULL,
  `prenom_admin` varchar(50) DEFAULT NULL,
  `phone_num` varchar(13) NOT NULL,
  `email_admin` varchar(50) DEFAULT NULL,
  `mdp_admin` varchar(255) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nom_admin`, `prenom_admin`, `phone_num`, `email_admin`, `mdp_admin`, `status`) VALUES
(1, 'admin', 'admin', '0675561007', 'admin@mail.com', '$2y$10$V6/q6R4jUCbhE8oiBZs/..QWTuAuFHxKLYWKSSn4aXDAg6Ba508Sy', 'super-admi'),
(2, 'amine', 'chaib', '', 'ccamine4@gmail.com', 'amine', ''),
(3, 'admin', 'admin', '0675561007', 'admin@mail.com', '$2y$10$V6/q6R4jUCbhE8oiBZs/..QWTuAuFHxKLYWKSSn4aXDAg6Ba508Sy', 'super-admi');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(3) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `nom_categorie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `id_admin`, `nom_categorie`) VALUES
(10, NULL, 'oils'),
(11, NULL, 'ana');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `nom_client` varchar(50) DEFAULT NULL,
  `prenom_client` varchar(50) DEFAULT NULL,
  `email_client` varchar(50) DEFAULT NULL,
  `mdp_client` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `id_admin`, `nom_client`, `prenom_client`, `email_client`, `mdp_client`) VALUES
(2, 2, 'karim', 'talbi', 'talbikarim@gmail.com', 'karim');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_cmd` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_client` int(11) DEFAULT NULL,
  `date_commande` date NOT NULL,
  `validation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_cmd`, `id_admin`, `id_client`, `date_commande`, `validation`) VALUES
(2, 2, 2, '0000-00-00', 0),
(3, 2, 2, '2023-04-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compatible`
--

CREATE TABLE `compatible` (
  `id_admin` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL,
  `id_moteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `compatible`
--

INSERT INTO `compatible` (`id_admin`, `id_modele`, `id_moteur`) VALUES
(2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `marque`
--

CREATE TABLE `marque` (
  `id_marque` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `nom_marque` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `marque`
--

INSERT INTO `marque` (`id_marque`, `id_admin`, `nom_marque`) VALUES
(3, 2, 'hyundaidm'),
(4, 2, 'toyota'),
(6, NULL, 'voolvoo'),
(7, NULL, 'cate');

-- --------------------------------------------------------

--
-- Table structure for table `modele`
--

CREATE TABLE `modele` (
  `id_modele` int(11) NOT NULL,
  `nom_model` text DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_marque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `modele`
--

INSERT INTO `modele` (`id_modele`, `nom_model`, `id_admin`, `id_marque`) VALUES
(3, '398', 2, 4),
(4, 'aveo', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `moteur`
--

CREATE TABLE `moteur` (
  `id_moteur` int(11) NOT NULL,
  `nom_moteur` varchar(255) NOT NULL,
  `energie` varchar(50) DEFAULT NULL,
  `puissance` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `moteur`
--

INSERT INTO `moteur` (`id_moteur`, `nom_moteur`, `energie`, `puissance`, `id_admin`) VALUES
(3, '1.2 16V', 'diesel', 82, 2),
(4, '1.2 tdi', 'essance', 65, 2);

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_marque` int(11) DEFAULT NULL,
  `id_categorie` int(3) NOT NULL,
  `reference` varchar(11) NOT NULL,
  `nom_piece` varchar(11) NOT NULL,
  `quant_piece` int(5) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix_achat` int(5) NOT NULL,
  `prix_vent` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`id_piece`, `id_admin`, `id_marque`, `id_categorie`, `reference`, `nom_piece`, `quant_piece`, `photo`, `prix_achat`, `prix_vent`) VALUES
(5, 1, 4, 10, 'gdb400', 'plaquette', 50, 'slmdqsùm.png', 1200, 2200);

-- --------------------------------------------------------

--
-- Table structure for table `piece_commander`
--

CREATE TABLE `piece_commander` (
  `id_cmd` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `quantitie_piece` int(5) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_cmd`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `compatible`
--
ALTER TABLE `compatible`
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_modele` (`id_modele`),
  ADD KEY `id_moteur` (`id_moteur`);

--
-- Indexes for table `marque`
--
ALTER TABLE `marque`
  ADD PRIMARY KEY (`id_marque`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `modele`
--
ALTER TABLE `modele`
  ADD PRIMARY KEY (`id_modele`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_marque` (`id_marque`);

--
-- Indexes for table `moteur`
--
ALTER TABLE `moteur`
  ADD PRIMARY KEY (`id_moteur`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_marque` (`id_marque`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `piece_commander`
--
ALTER TABLE `piece_commander`
  ADD KEY `id_cmd` (`id_cmd`),
  ADD KEY `id_piece` (`id_piece`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_cmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `marque`
--
ALTER TABLE `marque`
  MODIFY `id_marque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modele`
--
ALTER TABLE `modele`
  MODIFY `id_modele` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `moteur`
--
ALTER TABLE `moteur`
  MODIFY `id_moteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `categorie_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compatible`
--
ALTER TABLE `compatible`
  ADD CONSTRAINT `compatible_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compatible_ibfk_2` FOREIGN KEY (`id_modele`) REFERENCES `modele` (`id_modele`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compatible_ibfk_3` FOREIGN KEY (`id_moteur`) REFERENCES `moteur` (`id_moteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marque`
--
ALTER TABLE `marque`
  ADD CONSTRAINT `marque_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modele`
--
ALTER TABLE `modele`
  ADD CONSTRAINT `modele_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modele_ibfk_2` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moteur`
--
ALTER TABLE `moteur`
  ADD CONSTRAINT `moteur_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piece_ibfk_2` FOREIGN KEY (`id_marque`) REFERENCES `marque` (`id_marque`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piece_ibfk_3` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piece_commander`
--
ALTER TABLE `piece_commander`
  ADD CONSTRAINT `piece_commander_ibfk_1` FOREIGN KEY (`id_cmd`) REFERENCES `commande` (`id_cmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piece_commander_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id_piece`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piece_commander_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
