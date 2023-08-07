-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2023 at 10:51 PM
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
-- Database: `autopart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `email`, `mobile_phone`, `role`, `hashed_password`, `creation_date`) VALUES
(1, 'admin', 'admin', 'admin@mail.com', '0699472366', 'super-admin', '$2y$10$V6/q6R4jUCbhE8oiBZs/..QWTuAuFHxKLYWKSSn4aXDAg6Ba508Sy', '2023-05-07 10:11:40'),
(2, 'amine', 'Chaib', 'ccamine4@gmail.com', '0675561007', 'super-admin', '$2y$10$dMYkpxTVYoCWkDIwl7DZzeeeaHwZLbhG6VCs7lLC0.dNq3XlrZYr6', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_offre`
--

CREATE TABLE `admin_offre` (
  `id` int(11) NOT NULL,
  `nom_offre` varchar(20) NOT NULL,
  `descriptio_offre` varchar(255) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `target_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `creation_date`, `id_ad`) VALUES
(1, 'frienage', '0000-00-00 00:00:00', 1),
(2, 'filtration', '0000-00-00 00:00:00', 1),
(3, 'electric', '0000-00-00 00:00:00', 1),
(4, 'suspension', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `first_name`, `last_name`, `mobile_phone`, `hashed_password`, `email`, `adresse`, `creation_date`, `id_ad`) VALUES
(3, 'karim', 'talbi', '0699472360', 'zaldmùazùlda', 'talbikarim@gmail.com', 'sqq', '2023-07-24 09:38:00', 1),
(4, 'mdem', 'bouchaoui', '0775561007', '$2y$10$wR0hzmKc6g1Y01euaI6Dj.mLCj4fKTu406IBmcxwU/MCz7b0Yn1bG', 'modembouch@gmail.com', 'rue cem souidania', '0000-00-00 00:00:00', 1),
(5, 'lamin', 'gacci', '0875561007', '$2y$10$sV9Nc.6szofTgqQLEcNYR.fLdZsd8fb9CgFJbIVVwYLaBhbqxLC4u', 'modemgacci@gmail.com', 'rue la ville', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `compatible`
--

CREATE TABLE `compatible` (
  `id` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL,
  `id_moteur` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `compatible`
--

INSERT INTO `compatible` (`id`, `id_piece`, `id_moteur`, `creation_date`, `id_ad`) VALUES
(2, 3, 2, '0000-00-00 00:00:00', 1),
(3, 1, 2, '0000-00-00 00:00:00', 1),
(4, 3, 1, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `name`, `type`, `creation_date`, `id_ad`) VALUES
(2, 'peugeot', 'voiture', '0000-00-00 00:00:00', 1),
(3, 'valeo', 'piece', '0000-00-00 00:00:00', 1),
(4, 'renault', 'voiture', '0000-00-00 00:00:00', 1),
(5, 'renault', 'piece', '0000-00-00 00:00:00', 1),
(6, 'denso', 'piece', '0000-00-00 00:00:00', 1),
(7, 'eyquem', 'piece', '0000-00-00 00:00:00', 1),
(8, 'jufi', 'piece', '0000-00-00 00:00:00', 1),
(9, 'champ', 'piece', '0000-00-00 00:00:00', 1),
(10, 'general motor', 'piece', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL,
  `id_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `creation_date`, `id_ad`, `id_mark`) VALUES
(1, '208', '0000-00-00 00:00:00', 1, 2),
(2, 'symbol', '0000-00-00 00:00:00', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `moteur`
--

CREATE TABLE `moteur` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `enrgie` varchar(20) NOT NULL,
  `puissance` int(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `moteur`
--

INSERT INTO `moteur` (`id`, `name`, `enrgie`, `puissance`, `creation_date`, `id_ad`) VALUES
(1, '1.2 8V', 'Essance', 72, '0000-00-00 00:00:00', 1),
(2, '1.6 mpi', 'Essance', 77, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_ad` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_piece`
--

CREATE TABLE `order_piece` (
  `id` int(11) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `sale_price` varchar(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_order` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `quantity` varchar(20) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  `purchase_price` float DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `reference` varchar(20) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) NOT NULL,
  `id_mark` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`id`, `name`, `quantity`, `photo`, `purchase_price`, `sale_price`, `reference`, `creation_date`, `id_admin`, `id_mark`, `id_categorie`, `status`) VALUES
(1, 'plaquette av', '10', 'vlcsnap-2023-07-15-1', 1800, 2500, 'gdb400', '2023-07-25 07:50:52', 1, 3, 1, 1),
(3, 'filtre_air', '20', 'vlcsnap-2023-05-27-1', 450, 850, 'E2700', '0000-00-00 00:00:00', 1, 5, 2, 0),
(4, 'bougis', '21', 'vlcsnap-2023-05-27-1', 1800, 2500, 'SGm665', '0000-00-00 00:00:00', 1, 9, 3, 0),
(5, 'plaquette av', '10', 'vlcsnap-2023-05-27-1', 2550, 3850, 'gdb538', '0000-00-00 00:00:00', 1, 8, 1, 0),
(6, 'pompe essance', '27', 'vlcsnap-2023-05-27-1', 2980, 3950, 'jlaz9', '0000-00-00 00:00:00', 1, 6, 3, 0),
(7, 'chain distribution', '20', 'vlcsnap-2023-05-27-1', 2200, 3850, 'JLKArNT', '0000-00-00 00:00:00', 1, 5, 3, 0),
(8, 'amortiseur av', '15', '64c23f8695568.jpeg', 8800, 12500, '3872Y', '0000-00-00 00:00:00', 1, 10, 4, 0),
(10, 'plaquette av', '20', 'vlcsnap-2023-05-27-1', 1800, 2500, 'gdb400', '0000-00-00 00:00:00', 1, 8, 3, 0),
(11, 'plaquette av', '10', '', 1800, 2500, 'gdb400', '0000-00-00 00:00:00', 1, 9, 4, 0),
(12, 'plaquette av', '26', '', 2899, 3750, 'izaeiazpd', '0000-00-00 00:00:00', 1, 8, 4, 0),
(13, 'routile_dir', '28', '64c3d0b68fa67.jpeg', 2250, 3200, 'EFrrta', '0000-00-00 00:00:00', 1, 8, 4, 0),
(14, 'filtre_air', '26', '64c3d1f8701d7.jpeg', 1650, 3850, 'ezioeuz7', '0000-00-00 00:00:00', 1, 6, 2, 0),
(15, 'frienage', '26', '64c42775d7bcf.jpeg', 1650, 3850, 'E2700sqsmsd', '0000-00-00 00:00:00', 1, 6, 3, 0),
(16, 'plaquette av', '20', '64c4279cb41cb.jpeg', 1800, 2500, 'fserze', '0000-00-00 00:00:00', 1, 8, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `id` int(11) NOT NULL,
  `id_model` int(11) NOT NULL,
  `id_moteur` int(11) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`id`, `id_model`, `id_moteur`, `creation_date`, `id_ad`) VALUES
(2, 2, 2, '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_offre`
--
ALTER TABLE `admin_offre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_piece` (`id_piece`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ad` (`id_ad`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ad` (`id_ad`);

--
-- Indexes for table `compatible`
--
ALTER TABLE `compatible`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ad` (`id_ad`),
  ADD KEY `id_piece` (`id_piece`),
  ADD KEY `id_moteur` (`id_moteur`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ad` (`id_ad`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ad` (`id_ad`),
  ADD KEY `id_mark` (`id_mark`);

--
-- Indexes for table `moteur`
--
ALTER TABLE `moteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ad` (`id_ad`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ad` (`id_ad`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `order_piece`
--
ALTER TABLE `order_piece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_piece` (`id_piece`);

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_mark` (`id_mark`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ad` (`id_ad`),
  ADD KEY `id_model` (`id_model`),
  ADD KEY `id_moteur` (`id_moteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_offre`
--
ALTER TABLE `admin_offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compatible`
--
ALTER TABLE `compatible`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `moteur`
--
ALTER TABLE `moteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_offre`
--
ALTER TABLE `admin_offre`
  ADD CONSTRAINT `admin_offre_ibfk_1` FOREIGN KEY (`id_piece`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `compatible`
--
ALTER TABLE `compatible`
  ADD CONSTRAINT `compatible_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compatible_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compatible_ibfk_3` FOREIGN KEY (`id_moteur`) REFERENCES `moteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mark`
--
ALTER TABLE `mark`
  ADD CONSTRAINT `mark_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `model_ibfk_2` FOREIGN KEY (`id_mark`) REFERENCES `mark` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moteur`
--
ALTER TABLE `moteur`
  ADD CONSTRAINT `moteur_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piece_ibfk_2` FOREIGN KEY (`id_mark`) REFERENCES `mark` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piece_ibfk_3` FOREIGN KEY (`id_categorie`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voiture_ibfk_2` FOREIGN KEY (`id_model`) REFERENCES `model` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `voiture_ibfk_3` FOREIGN KEY (`id_moteur`) REFERENCES `moteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
