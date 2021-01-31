/***** quand on va la lancer ca va permettre qu'elle ne soit pas dupliqué *****/
DROP DATABASE IF EXISTS poneyfringant; --
CREATE DATABASE poneyfringant;
/**** c'est pour utiliser la table ****/
USE poneyfringant;
CREATE user IF NOT EXISTS poney@localhost IDENTIFIED BY 'coucou';
/**** c'est pour donner les droits d'administration****/
GRANT ALL on poneyfringant.* TO poney@localhost;

CREATE TABLE `adherent` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `numadhérent` varchar(255) UNIQUE, 
  UNIQUE KEY `pseudo` (`pseudo`),
  `password` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  UNIQUE KEY `email` (`KEY`) NOT NULL,
  `numéro` varchar(255) NULL,
  `adresse` varchar(255) NULL,
  `codepostal` varchar(5) NULL,
  `ville` varchar(100) NULL,
  `date_adhesion` DATE default NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `profil` ( 
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `titre` varchar(100),
  `photo` varchar (100),
  `description` text,
  `adherent_id` INT NOT NULL,
  CONSTRAINT profil FOREIGN KEY (adherent_id) REFERENCES adherent (id), 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `interet adherent`(
  `centre_interet` varchar(255),
  `adherent_id` varchar(255),
  CONSTRAINT interet_adherent FOREIGN KEY (adherent_id) REFERENCES adherent (id),
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `interet`(
  `interet_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nom` varchar(255),
  CONSTRAINT interet FOREIGN KEY interet_adherent REFERENCES interet_adherent,

) ENGINE=InnoDB DEFAULT CHARSET=utf8;
