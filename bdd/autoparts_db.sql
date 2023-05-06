
#CREATE DATABASE autparts_db CHARACTER SET utf8 COLLATE utf8_general_ci;
#USE autparts_db;
CREATE TABLE admin(
    id TINYINT(1) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobile_phone VARCHAR(20) NOT NULL,
    role VARCHAR(20) NOT NULL,
    hashed_password VARCHAR(255) NOT NULL
)ENGINE=INNODB;

CREATE TABLE client(
    id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,  
    first_name VARCHAR(20) NOT NULL,  
    last_name VARCHAR(20) NOT NULL, 
    mobile_phone VARCHAR(20) NOT NULL, 
    email VARCHAR(255) NOT NULL,  
    adresse VARCHAR(255) NOT NULL,
    societe VARCHAR(45) NULL,
    type VARCHAR(45) NULL,
    id_ad TINYINT(1), 
    FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

CREATE TABLE category(
    id INT(4) NOT NULL AUTO_INCREMENT PRIMARY KEY,  
    name VARCHAR(20) NOT NULL,
    id_ad TINYINT(1), 
    FOREIGN KEY (id_ad) REFERENCES admin (id)  ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=INNODB;

-- password: 123456
INSERT INTO admin (`id`, `first_name`, `last_name`, `email`, `mobile_phone`, `role`, `hashed_password`) VALUES (1, 'admin', 'admin', 'admin@mail.com', '0699472366', 'super-admin', '$2y$10$V6/q6R4jUCbhE8oiBZs/..QWTuAuFHxKLYWKSSn4aXDAg6Ba508Sy');