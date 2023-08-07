  DROP DATABASE autopart_db;

  CREATE DATABASE autopart_db;
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
    `hashed_password` varchar(255) NOT NULL,
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
    `type` varchar(20) NOT NULL,
    `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `id_ad` int NOT NULL,
    FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

  --
  -- Dumping data for table `mark`
  --

  INSERT INTO `mark` (`name`, `id_ad`) VALUES ('peugeot', 1);

  -- --------------------------------------------------------
  -- Table structure for table `piece_name`
  --

    CREATE TABLE `piece_name` (
      `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `name` varchar(20) NOT NULL,
      `photo` varchar(20) NOT NULL,
      `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
      `id_admin` int NOT NULL,
      FOREIGN KEY (id_admin) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE,
      `id_categorie` int NOT NULL,
      FOREIGN KEY (id_categorie) REFERENCES category (id)  ON UPDATE CASCADE ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


  --

  -- Table structure for table `piece`
  --

    CREATE TABLE `piece` (
      `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
      `quantity` varchar(20) DEFAULT NULL,
      `purchase_price` float DEFAULT NULL,
      `sale_price` float DEFAULT NULL,
      `reference` varchar(20) DEFAULT NULL,
      `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
      `id_admin` int NOT NULL,
      FOREIGN KEY (id_admin) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE,
      `id_mark` int NOT NULL,
      FOREIGN KEY (id_mark) REFERENCES mark (id)  ON UPDATE CASCADE ON DELETE CASCADE,
       `id_name` int NOT NULL,
      FOREIGN KEY (id_name) REFERENCES piece_name (id)  ON UPDATE CASCADE ON DELETE CASCADE
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


  -- Table structure for table `compatible`
  --

  CREATE TABLE `compatible` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_piece` int NOT NULL,
    `id_moteur` int NOT NULL,
    `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `id_ad` int NOT NULL,
    FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_piece) REFERENCES piece (id)  ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_moteur) REFERENCES moteur (id)  ON UPDATE CASCADE ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

  --

   -- Table structure for table `voiture`
  --

  CREATE TABLE `voiture` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_model` int NOT NULL,
    `id_moteur` int NOT NULL,
    `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `id_ad` int NOT NULL,
    FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_model) REFERENCES model (id)  ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_moteur) REFERENCES moteur (id)  ON UPDATE CASCADE ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

  --
  -- Table structure for table `order`
  --

  CREATE TABLE `order` (
    `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `id_ad` int NOT NULL,
    `id_client` int NOT NULL,
    `status` varchar(20) NOT NULL DEFAULT 'PENDING',
    `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_client) REFERENCES client (id)  ON UPDATE CASCADE ON DELETE CASCADE
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

  --
  -- Table structure for table `order_piece`
  --  

  -- CREATE TABLE `order_piece` (
  --   `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  --   -- `id_order` int NOT NULL,
  --   `quantity` varchar(20) NOT NULL,
  --   `sale_price` varchar(20) NOT NULL,
  --   `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
  --   -- FOREIGN KEY (id_order) REFERENCES order (id)  ON UPDATE CASCADE ON DELETE CASCADE
  -- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE `order_piece` (
  `id` int(11) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `sale_price` varchar(20) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_order` int(11) NOT NULL,
  `id_piece` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_piece`
--
ALTER TABLE `order_piece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_piece` (`id_piece`);

    -- Table structure for table `admin_offre`
  --

  -- CREATE TABLE `admin_offre` (
  --   `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  --   `nom_offre` varchar(20) NOT NULL,
  --   `temp_de_offre` time(20) NOT NULL,
  --   `description_offre` varchar(255) NOT NULL,
  --   `id_piece` int NOT NULL,
  --   FOREIGN KEY (id_piece) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE
  -- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
