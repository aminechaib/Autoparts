--
-- Database: `autopart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `admin` (`first_name`, `last_name`, `email`, `mobile_phone`, `role`, `hashed_password`, `creation_date`) VALUES
('admin', 'admin', 'admin@mail.com', '0699472366', 'super-admin', '$2y$10$V6/q6R4jUCbhE8oiBZs/..QWTuAuFHxKLYWKSSn4aXDAg6Ba508Sy', '2023-05-07 11:11:40');

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int NOT NULL,
  FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `mobile_phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int NOT NULL,
  FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int NOT NULL,
  FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`name`, `id_ad`) VALUES ('peugeot', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(20) DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int NOT NULL,
  FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE,
  `id_mark` int NOT NULL,
  FOREIGN KEY (id_mark) REFERENCES mark (id)  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Table structure for table `piece`
--

  CREATE TABLE `piece` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(20) DEFAULT NULL,
    `quantity` varchar(20) DEFAULT NULL,
    `photo` varchar(20) DEFAULT NULL,
    `purchase_price` float DEFAULT NULL,
    `sale_price` float DEFAULT NULL,
    `reference` varchar(20) DEFAULT NULL,
    `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `id_admin` int NOT NULL,
    FOREIGN KEY (id_admin) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE,
    `id_mark` int NOT NULL,
    FOREIGN KEY (id_mark) REFERENCES mark (id)  ON UPDATE CASCADE ON DELETE CASCADE,
    `id_categorie` int NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES moteur (id)  ON UPDATE CASCADE ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


-- Table structure for table `moteur`
--

CREATE TABLE `moteur` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(20) NOT NULL,
  `enrgie` varchar(20) NOT NULL,
  `puissance` int (20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int NOT NULL,
  FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Table structure for table `compatible`
--

CREATE TABLE `compatible` (
  `id_model` int (20) NOT NULL,
  `id_moteur` int (20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_ad` int NOT NULL,
  FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (id_model) REFERENCES model (id)  ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (id_moteur) REFERENCES moteur (id)  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--