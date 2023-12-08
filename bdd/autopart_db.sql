-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 03:19 AM
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
(1, 'admin', 'admin', 'admin@mail.com', '0699472366', 'super-admin', '$2y$10$V6/q6R4jUCbhE8oiBZs/..QWTuAuFHxKLYWKSSn4aXDAg6Ba508Sy', '2023-05-07 10:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `creation_date`, `id_ad`) VALUES
(1, 'Suspension', '2023-08-17 08:08:54', 1),
(2, 'Filtre', '2023-08-17 10:08:54', 1),
(4, 'Electricité', '2023-09-04 12:09:28', 1),
(5, 'Amortissement', '2023-09-05 00:09:12', 1),
(6, 'Allumage et préchauffage ', '2023-09-05 00:09:43', 1),
(7, 'Freins', '2023-09-05 01:09:05', 1);

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
(1, 'amine', 'Chaib', '0675561007', '$2y$10$qUiy2dqGZ/e.hDEhAz2XYOZg2G5b1et3PEeqtqbTOajO9MfR7GU6u', 'ccamine4@gmail.com', 'rue cem souidania', '2023-08-17 08:08:23', 1),
(2, 'mdem', 'bouchaoui', '0875561007', '$2y$10$DCJHmi/NmkPjAO7Hu1zwFeOUp1pGewm741Cd7KG0rGDs88Vh59GTa', 'ccmodem@gmail.co', 'azmadaz', '2023-08-28 18:08:22', 1),
(3, 'karim', 'talbi', '0675561008', '$2y$10$qUiy2dqGZ/e.hDEhAz2XYOZg2G5b1et3PEeqtqbTOajO9MfR7GU6u', 'tablib@gmail.com', 'zadiez', '2023-09-02 18:05:26', 1),
(4, 'abdo', 'chaib', '0675561007', '$2y$10$/JOpGCBUll3/M19Y4ciebe7omSzIGT85BWrIzy8SRYTkE81grw9Am', 'chaibabdou@gmail.com', 'aruescem', '2023-08-28 18:08:08', 1),
(5, 'amine', 'talbi', '0775561007', '$2y$10$qUiy2dqGZ/e.hDEhAz2XYOZg2G5b1et3PEeqtqbTOajO9MfR7GU6u', 'modembouch@gmail.com', 'dza', '2023-09-01 15:28:41', 1);

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
(15, 45, 27, '2023-09-05 02:09:01', 1),
(16, 45, 26, '2023-09-05 02:09:48', 1),
(17, 44, 26, '2023-09-05 02:09:04', 1),
(18, 43, 13, '2023-09-05 02:09:18', 1),
(19, 43, 11, '2023-09-05 02:09:27', 1),
(20, 43, 12, '2023-09-05 02:09:00', 1),
(21, 42, 23, '2023-09-05 02:09:16', 1),
(22, 41, 21, '2023-09-05 02:09:28', 1),
(23, 41, 20, '2023-09-05 02:09:33', 1),
(24, 40, 23, '2023-09-05 02:09:42', 1),
(25, 39, 22, '2023-09-05 02:09:54', 1),
(26, 36, 17, '2023-09-05 02:09:08', 1),
(27, 35, 17, '2023-09-05 02:09:14', 1),
(28, 36, 23, '2023-09-05 02:09:29', 1),
(29, 35, 19, '2023-09-05 02:09:36', 1),
(30, 34, 24, '2023-09-05 02:09:54', 1),
(31, 33, 19, '2023-09-05 02:09:05', 1),
(32, 32, 6, '2023-09-05 02:09:13', 1),
(33, 38, 25, '2023-09-05 02:09:40', 1),
(34, 33, 16, '2023-09-05 02:09:40', 1),
(35, 33, 15, '2023-09-05 02:09:53', 1),
(36, 26, 24, '2023-09-05 02:09:42', 1),
(37, 26, 23, '2023-09-05 02:09:55', 1),
(38, 27, 27, '2023-09-05 02:09:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `name`, `type`, `creation_date`, `id_ad`) VALUES
(1, 'peugeot', 'voiture', '2023-08-17 07:14:10', 1),
(3, 'renault', 'voiture', '2023-08-30 08:08:36', 1),
(4, 'peugeot', 'piece', '2023-08-30 09:08:49', 1),
(6, 'renault', 'piece', '2023-08-30 09:08:24', 1),
(7, 'Dacia', 'voiture', '2023-08-30 14:08:03', 1),
(8, 'valeo', 'piece', '2023-08-31 13:08:57', 1),
(9, 'samco', 'piece', '2023-08-31 13:08:44', 1),
(10, 'meca_filtre', 'piece', '2023-09-05 01:09:59', 1),
(11, 'blueprint', 'piece', '2023-09-05 01:09:09', 1),
(12, 'gates', 'piece', '2023-09-05 01:09:19', 1),
(13, 'chevrolet', 'voiture', '2023-09-05 01:09:29', 1),
(14, 'hyundai', 'voiture', '2023-09-05 01:09:47', 1),
(15, 'hyundai', 'piece', '2023-09-05 01:09:55', 1),
(16, 'kia', 'voiture', '2023-09-05 01:09:03', 1),
(17, 'Citroen', 'voiture', '2023-09-05 01:09:57', 1),
(18, 'eurorepare', 'piece', '2023-09-05 01:09:25', 1),
(19, 'DFM', 'voiture', '2023-09-05 01:09:36', 1),
(20, 'AOB', 'piece', '2023-09-05 01:09:46', 1),
(21, 'SUZUKI', 'piece', '2023-09-05 01:09:00', 1),
(22, 'SUZUKI', 'voiture', '2023-09-05 01:09:08', 1),
(23, 'NGK', 'piece', '2023-09-05 02:09:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL,
  `id_mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id`, `name`, `creation_date`, `id_ad`, `id_mark`) VALUES
(3, '208', '2023-08-28 19:08:22', 1, 1),
(4, 'clio4', '2023-08-30 09:08:52', 1, 3),
(5, 'symbol', '2023-08-30 14:08:41', 1, 3),
(6, 'stepway', '2023-08-30 14:08:29', 1, 7),
(7, 'Logan', '2023-08-30 14:08:38', 1, 7),
(8, 'Berlingo', '2023-09-05 01:09:32', 1, 17),
(9, 'Alto', '2023-09-05 01:09:54', 1, 22),
(10, 'Swift', '2023-09-05 01:09:03', 1, 22),
(11, 'Mini truck', '2023-09-05 01:09:17', 1, 19),
(12, 'picanto', '2023-09-05 01:09:28', 1, 16),
(13, 'Rio', '2023-09-05 01:09:01', 1, 16),
(14, 'creta', '2023-09-05 01:09:59', 1, 14),
(15, 'accent RB', '2023-09-05 01:09:13', 1, 14),
(16, 'I20', '2023-09-05 01:09:38', 1, 14),
(17, 'Sportage', '2023-09-05 01:09:04', 1, 16),
(18, 'Kangoo', '2023-09-05 01:09:48', 1, 3),
(19, 'Aveo', '2023-09-05 01:09:58', 1, 13),
(20, 'Sail', '2023-09-05 01:09:06', 1, 13),
(21, 'Cruze', '2023-09-05 01:09:16', 1, 13),
(22, 'I10', '2023-09-05 01:09:17', 1, 14),
(23, '207', '2023-09-05 01:09:19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `moteur`
--

CREATE TABLE `moteur` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `enrgie` varchar(20) NOT NULL,
  `puissance` int(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `moteur`
--

INSERT INTO `moteur` (`id`, `name`, `enrgie`, `puissance`, `creation_date`, `id_ad`) VALUES
(1, '1.2 16V', 'Essance', 82, '2023-08-17 09:08:05', 1),
(6, '1.6 mpi', 'Essance', 80, '2023-09-05 01:09:13', 1),
(7, '1.4 mpi', 'Essance', 75, '2023-08-30 14:08:02', 1),
(10, '1.2 VTI', 'Essance', 80, '2023-09-05 00:09:04', 1),
(11, '2.0 HDI', 'Diesel', 120, '2023-09-05 00:09:26', 1),
(12, '1.6 HDI', 'Diesel', 92, '2023-09-05 00:09:39', 1),
(13, '1.6 HDI', 'Diesel', 110, '2023-09-05 00:09:51', 1),
(14, '1.6 CRDI', 'Diesel', 128, '2023-09-05 01:09:47', 1),
(15, '1.4 8V PGT', 'Essance', 70, '2023-09-05 00:09:55', 1),
(16, '1.6 16V PGT', 'Essance', 95, '2023-09-05 01:09:17', 1),
(17, '0.9 TCE', 'Essance', 90, '2023-09-05 01:09:39', 1),
(18, '1.2 BVA', 'Essance', 87, '2023-09-05 01:09:30', 1),
(19, '1.5 ETEC', 'Essance', 85, '2023-09-05 01:09:02', 1),
(20, '1.2 8V STEC', 'Essance', 72, '2023-09-05 01:09:17', 1),
(21, '1.2 16V STEC 2', 'Essance', 81, '2023-09-05 01:09:38', 1),
(22, '1.6 mpi BVA', 'Essance', 123, '2023-09-05 01:09:38', 1),
(23, '1.5 DCI', 'Diesel', 85, '2023-09-05 01:09:03', 1),
(24, '1.6 ECOTEC', 'Essance', 110, '2023-09-05 01:09:36', 1),
(25, '1.1 DFM', 'Essance', 65, '2023-09-05 01:09:01', 1),
(26, '1.0 SUZUKI', 'Essance', 58, '2023-09-05 01:09:20', 1),
(27, '1.3 VVT', 'Essance', 88, '2023-09-05 01:09:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `id_admin`, `id_client`) VALUES
(178, 1, 1),
(179, 1, 1),
(194, 1, 3),
(200, 1, 1),
(201, 1, 1),
(202, 1, 1),
(203, 1, 1),
(204, 1, 1),
(205, 1, 1),
(206, 1, 1),
(207, 1, 1),
(208, 1, 1),
(209, 1, 1),
(210, 1, 1),
(217, 1, 1),
(218, 1, 1),
(219, 1, 1),
(220, 1, 1),
(226, 1, 1),
(227, 1, 3),
(228, 1, 3),
(229, 1, 3),
(230, 1, 3),
(231, 1, 3),
(232, 1, 3),
(233, 1, 3),
(234, 1, 3),
(235, 1, 3),
(236, 1, 3),
(237, 1, 3),
(238, 1, 3),
(239, 1, 3),
(240, 1, 3),
(241, 1, 3),
(242, 1, 3),
(243, 1, 3),
(244, 1, 3),
(245, 1, 3),
(246, 1, 3),
(247, 1, 3),
(248, 1, 3),
(249, 1, 3),
(250, 1, 3),
(251, 1, 3),
(252, 1, 3),
(253, 1, 3),
(254, 1, 3),
(255, 1, 3),
(256, 1, 3),
(257, 1, 3),
(258, 1, 3),
(259, 1, 3),
(260, 1, 3),
(261, 1, 3),
(262, 1, 3),
(263, 1, 3),
(264, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `msgsent`
--

CREATE TABLE `msgsent` (
  `id` int(11) NOT NULL,
  `msg_cl` varchar(256) DEFAULT NULL,
  `msg_ad` varchar(256) DEFAULT NULL,
  `id_msg` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `is_deleted` varchar(80) NOT NULL DEFAULT 'no',
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `msgsent`
--

INSERT INTO `msgsent` (`id`, `msg_cl`, `msg_ad`, `id_msg`, `status`, `is_deleted`, `creation_date`) VALUES
(111, 'hello', '', 178, 'read', 'no', '2023-09-03 11:09:50'),
(112, 'its me', '', 179, 'read', 'no', '2023-09-03 12:09:37'),
(117, 'wach amine', '', 200, 'read', 'no', '2023-09-03 18:09:39'),
(118, 'wach amine', '', 201, 'read', 'no', '2023-09-03 18:09:08'),
(119, 'wach amine', '', 202, 'read', 'no', '2023-09-03 18:09:54'),
(120, 'cv kho', '', 203, 'read', 'no', '2023-09-03 18:09:59'),
(121, '', '', 206, 'read', 'no', '2023-09-03 18:09:53'),
(122, '', '', 207, 'read', 'no', '2023-09-03 18:09:14'),
(123, '', '', 208, 'read', 'no', '2023-09-03 18:09:42'),
(124, '', '', 209, 'read', 'no', '2023-09-03 18:09:27'),
(125, '', 'wach amine', 210, 'read', 'no', '2023-09-03 18:09:31'),
(126, NULL, 'wahch sahbiii', 210, 'PENDING', 'no', '2023-09-03 18:54:41'),
(127, 'kifah', '', 217, 'read', 'no', '2023-09-03 19:09:30'),
(128, '', 'walou', 218, 'read', 'no', '2023-09-03 19:09:41'),
(129, '', 'wachnou', 219, 'read', 'no', '2023-09-03 19:09:54'),
(130, 'rah', '', 220, 'read', 'no', '2023-09-03 19:09:17'),
(131, 'cv kho', '', 226, 'read', 'no', '2023-09-03 20:09:30'),
(132, 'wach amine', '', 227, 'read', 'no', '2023-09-03 20:09:46'),
(133, '', 'saha', 228, 'read', 'no', '2023-09-03 20:09:04'),
(134, '', 'cv kho', 229, 'read', 'no', '2023-09-03 20:09:28'),
(135, '', 'wach amine', 230, 'read', 'no', '2023-09-03 20:09:19'),
(136, '', 'kachma', 231, 'read', 'no', '2023-09-03 22:09:34'),
(137, 'kifah', '', 232, 'read', 'no', '2023-09-03 22:09:17'),
(138, 'awwwww', '', 233, 'read', 'no', '2023-09-03 22:09:30'),
(139, '', 'waloooooooo', 234, 'read', 'no', '2023-09-03 22:09:28'),
(140, '', 'wach amine', 235, 'read', 'no', '2023-09-03 23:09:04'),
(141, '', 'cv kho', 236, 'read', 'no', '2023-09-03 23:09:10'),
(142, '', 'wach amine', 237, 'read', 'no', '2023-09-03 23:09:46'),
(143, '', '9ol wallah', 238, 'read', 'no', '2023-09-03 23:09:37'),
(144, '', 'nooooooooooo', 239, 'read', 'no', '2023-09-04 00:09:29'),
(145, 'ok', '', 240, 'read', 'no', '2023-09-04 00:09:37'),
(146, '', 'ok', 241, 'read', 'no', '2023-09-04 00:09:12'),
(147, '', 'cv kho', 242, 'read', 'no', '2023-09-04 00:09:45'),
(148, '', 'wach amine', 243, 'read', 'no', '2023-09-04 00:09:49'),
(149, '', 'ok', 244, 'read', 'no', '2023-09-04 00:09:40'),
(150, '', 'wach amine', 245, 'read', 'no', '2023-09-04 00:09:46'),
(151, '', 'dddddddddd', 246, 'read', 'no', '2023-09-04 00:09:28'),
(152, 'cv kho', '', 247, 'read', 'no', '2023-09-04 00:09:37'),
(153, '', '3laj', 248, 'read', 'no', '2023-09-04 00:09:48'),
(154, '', 'wach amine', 249, 'read', 'no', '2023-09-04 00:09:24'),
(155, '', 'cv kho', 250, 'read', 'no', '2023-09-04 00:09:40'),
(156, '', 'ddddddd', 251, 'read', 'no', '2023-09-04 00:09:43'),
(157, '', 'ddddd', 252, 'read', 'no', '2023-09-04 00:09:50'),
(158, '', 'wach amine', 253, 'read', 'no', '2023-09-04 00:09:33'),
(159, '', 'wach amine', 254, 'read', 'no', '2023-09-04 00:09:58'),
(160, '', 'ddddd', 255, 'read', 'no', '2023-09-04 00:09:27'),
(161, '', '', 256, 'read', 'no', '2023-09-04 00:09:01'),
(162, '', '', 257, 'read', 'no', '2023-09-04 00:09:16'),
(163, '', '', 258, 'read', 'no', '2023-09-04 00:09:59'),
(164, '', '', 259, 'read', 'no', '2023-09-04 00:09:20'),
(165, '', 'wach amine', 260, 'read', 'no', '2023-09-04 00:09:04'),
(166, '', 'cv kho', 261, 'read', 'no', '2023-09-04 00:09:08'),
(167, 'ok', '', 262, 'read', 'no', '2023-09-04 00:09:23'),
(168, 'aaaaaa', '', 263, 'read', 'no', '2023-09-04 12:09:50'),
(169, '', '', 264, 'read', 'no', '2023-09-04 12:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `id_ad` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'PENDING',
  `is_deleted` varchar(80) NOT NULL DEFAULT 'no',
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_ad`, `id_client`, `status`, `is_deleted`, `creation_date`) VALUES
(27, 1, 3, 'VALIDER', 'OUI Suprimer :2023-09-04 11:09:53', '2023-09-04 10:09:58'),
(28, 1, 3, 'PENDING', 'OUI Suprimer :2023-09-04 12:09:16', '2023-09-04 10:09:30'),
(29, 1, 3, 'VALIDER', 'no', '2023-09-04 10:09:39'),
(30, 1, 1, 'VALIDER', 'no', '2023-09-04 10:09:19'),
(31, 1, 3, 'VALIDER', 'no', '2023-09-04 11:09:32'),
(32, 1, 1, 'PENDING', 'no', '2023-09-04 21:09:15');

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
  `quantity` varchar(20) DEFAULT NULL,
  `purchase_price` float DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) NOT NULL,
  `id_mark` int(11) NOT NULL,
  `id_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`id`, `quantity`, `purchase_price`, `sale_price`, `reference`, `creation_date`, `id_admin`, `id_mark`, `id_name`) VALUES
(25, '20', 3800, 5100, 'e440GT', '2023-09-05 01:09:26', 1, 18, 13),
(26, '30', 1800, 2650, 'ER299', '2023-09-05 01:09:28', 1, 20, 13),
(27, '5', 8800, 11000, 'rnt27786', '2023-09-05 01:09:09', 1, 6, 13),
(28, '25', 650, 950, 'eTTA22', '2023-09-05 01:09:42', 1, 20, 12),
(29, '15', 1250, 1950, 'EMRAA78', '2023-09-05 01:09:17', 1, 18, 12),
(30, '35', 320, 550, 'HY787', '2023-09-05 01:09:59', 1, 15, 9),
(31, '45', 280, 550, 'E7716FF', '2023-09-05 01:09:34', 1, 10, 9),
(32, '10', 165, 2200, 'GDB400', '2023-09-05 01:09:05', 1, 9, 12),
(33, '12', 650, 950, 'BL2333', '2023-09-05 01:09:41', 1, 11, 8),
(34, '20', 480, 850, 'RRT221', '2023-09-05 01:09:13', 1, 11, 8),
(35, '7', 11000, 14500, 'PGT221A', '2023-09-05 01:09:55', 1, 4, 27),
(36, '4', 9950, 12600, 'RNT2661892', '2023-09-05 01:09:31', 1, 6, 28),
(37, '28', 150, 250, 'sz781', '2023-09-05 01:09:59', 1, 21, 30),
(38, '20', 120, 250, 'AOB1123', '2023-09-05 02:09:27', 1, 20, 30),
(39, '20', 1100, 1800, 'VLLT271', '2023-09-05 02:09:28', 1, 8, 17),
(40, '28', 1350, 1900, 'vl8728', '2023-09-05 02:09:07', 1, 8, 17),
(41, '12', 1250, 1750, 'GT268', '2023-09-05 02:09:55', 1, 12, 21),
(42, '45', 2650, 3200, 'VLB2101', '2023-09-05 02:09:29', 1, 8, 25),
(43, '20', 2650, 3100, 'VLB1299', '2023-09-05 02:09:14', 1, 8, 25),
(44, '50', 1050, 1650, 'BKRCE', '2023-09-05 02:09:49', 1, 23, 24),
(45, '40', 850, 1300, 'BK6EC', '2023-09-05 02:09:38', 1, 23, 24);

-- --------------------------------------------------------

--
-- Table structure for table `piece_name`
--

CREATE TABLE `piece_name` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_admin` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `piece_name`
--

INSERT INTO `piece_name` (`id`, `name`, `photo`, `creation_date`, `id_admin`, `id_categorie`) VALUES
(8, 'Filtre_air', '1693873617.jpg', '2023-09-05 01:09:12', 1, 2),
(9, 'filtre_uil', '1693873641.jpg', '2023-09-05 01:09:29', 1, 2),
(10, 'Filtre_essance', '1693873660.jpg', '2023-09-05 01:09:07', 1, 2),
(11, 'Filtre_gazoil', '1693873704.jpg', '2023-09-05 01:09:35', 1, 2),
(12, 'plaquette_frien', '1693873764.jpg', '2023-09-05 01:09:18', 1, 7),
(13, 'Disc de Frein', '1693873830.jpg', '2023-09-05 01:09:48', 1, 7),
(14, 'Tombour', '1693873866.jpg', '2023-09-05 01:09:14', 1, 7),
(15, 'Flexible de frein', '1693873942.jpg', '2023-09-05 01:09:35', 1, 7),
(16, 'cylindre de roue', '1693873978.jpg', '2023-09-05 01:09:21', 1, 7),
(17, 'maitre_cylindre', '1693874034.jpg', '2023-09-05 01:09:14', 1, 7),
(18, 'Biellette de suspension arrière et avant', '1693874149.jpg', '2023-09-05 01:09:42', 1, 1),
(19, 'bras de suspension', '1693874243.jpg', '2023-09-05 01:09:36', 1, 1),
(20, 'suspension de la cabine', '1693874273.jpg', '2023-09-05 01:09:21', 1, 1),
(21, 'Bendix', '1693874783.jpg', '2023-09-05 01:09:29', 1, 4),
(22, 'Demareur', '1693874806.jpg', '2023-09-05 01:09:56', 1, 4),
(23, 'alternateur', '1693874860.jpg', '2023-09-05 01:09:51', 1, 4),
(24, 'bougie allumage', '1693874934.jpg', '2023-09-05 01:09:06', 1, 6),
(25, 'bougie chaufage', '1693874957.jpg', '2023-09-05 01:09:28', 1, 6),
(26, 'relait_prechaufage', '1693875000.jpg', '2023-09-05 01:09:13', 1, 6),
(27, 'Amortisseur AV', '1693875041.jpg', '2023-09-05 01:09:16', 1, 5),
(28, 'Amortisseur AR', '1693875085.jpg', '2023-09-05 01:09:36', 1, 5),
(29, 'ressort aboudin', '1693875108.jpg', '2023-09-05 01:09:58', 1, 5),
(30, 'cylindre bloc', '1693875145.jpg', '2023-09-05 01:09:35', 1, 5);

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
(2, 3, 10, '2023-08-29 10:08:20', 1),
(3, 4, 1, '2023-08-30 10:08:51', 1),
(4, 7, 7, '2023-08-30 14:08:04', 1),
(5, 6, 6, '2023-08-30 14:08:13', 1),
(6, 5, 6, '2023-08-30 14:08:22', 1),
(7, 5, 1, '2023-08-30 14:08:31', 1),
(8, 7, 6, '2023-08-30 19:08:05', 1),
(9, 4, 23, '2023-09-05 01:09:29', 1),
(10, 4, 17, '2023-09-05 01:09:41', 1),
(11, 19, 21, '2023-09-05 01:09:54', 1),
(12, 19, 20, '2023-09-05 01:09:13', 1),
(13, 20, 21, '2023-09-05 01:09:21', 1),
(14, 21, 24, '2023-09-05 01:09:28', 1),
(15, 18, 23, '2023-09-05 01:09:36', 1),
(16, 17, 22, '2023-09-05 01:09:48', 1),
(17, 17, 14, '2023-09-05 01:09:07', 1),
(18, 16, 22, '2023-09-05 01:09:32', 1),
(19, 15, 14, '2023-09-05 01:09:58', 1),
(20, 14, 22, '2023-09-05 01:09:13', 1),
(21, 14, 14, '2023-09-05 01:09:29', 1),
(22, 13, 14, '2023-09-05 01:09:42', 1),
(23, 12, 18, '2023-09-05 01:09:03', 1),
(24, 22, 18, '2023-09-05 01:09:36', 1),
(25, 11, 25, '2023-09-05 01:09:01', 1),
(26, 10, 27, '2023-09-05 01:09:12', 1),
(27, 9, 26, '2023-09-05 01:09:23', 1),
(28, 8, 13, '2023-09-05 01:09:36', 1),
(29, 8, 12, '2023-09-05 01:09:47', 1),
(30, 3, 12, '2023-09-05 01:09:01', 1),
(31, 23, 12, '2023-09-05 01:09:41', 1),
(32, 23, 16, '2023-09-05 01:09:56', 1),
(33, 23, 15, '2023-09-05 01:09:07', 1),
(34, 5, 23, '2023-09-05 01:09:19', 1),
(35, 6, 23, '2023-09-05 01:09:29', 1),
(36, 19, 19, '2023-09-05 02:09:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_client` (`id_client`);

--
-- Indexes for table `msgsent`
--
ALTER TABLE `msgsent`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_msg` (`id_msg`);

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
  ADD KEY `id_name` (`id_name`);

--
-- Indexes for table `piece_name`
--
ALTER TABLE `piece_name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_admin` (`id_admin`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `compatible`
--
ALTER TABLE `compatible`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `moteur`
--
ALTER TABLE `moteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `msgsent`
--
ALTER TABLE `msgsent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_piece`
--
ALTER TABLE `order_piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `piece_name`
--
ALTER TABLE `piece_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `msg`
--
ALTER TABLE `msg`
  ADD CONSTRAINT `msg_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `msg_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `msgsent`
--
ALTER TABLE `msgsent`
  ADD CONSTRAINT `msgsent_ibfk_1` FOREIGN KEY (`id_msg`) REFERENCES `msg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_ad`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_piece`
--
ALTER TABLE `order_piece`
  ADD CONSTRAINT `order_piece_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_piece_ibfk_2` FOREIGN KEY (`id_piece`) REFERENCES `piece` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `piece_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piece_ibfk_2` FOREIGN KEY (`id_mark`) REFERENCES `mark` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piece_ibfk_3` FOREIGN KEY (`id_name`) REFERENCES `piece_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `piece_name`
--
ALTER TABLE `piece_name`
  ADD CONSTRAINT `piece_name_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piece_name_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
