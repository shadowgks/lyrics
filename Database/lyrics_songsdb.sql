-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 17 jan. 2023 à 13:56
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lyrics_songsdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `date_birthday` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `picture` text COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `firstName`, `lastName`, `date_birthday`, `email`, `password`, `picture`) VALUES
(4, 'saad', 'moumou', '1999-10-03', 'saad@gmail.com', 'saad123456b', '[value-7]');

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `picture` text COLLATE utf8mb4_bin NOT NULL,
  `date_birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id`, `name`, `picture`, `date_birthday`) VALUES
(5, 'Adele', '[value-3]', '1986-10-10');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(3, 'pop'),
(4, 'rap');

-- --------------------------------------------------------

--
-- Structure de la table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `release_date` date NOT NULL,
  `lyrics` text COLLATE utf8mb4_bin NOT NULL,
  `picture` text COLLATE utf8mb4_bin NOT NULL,
  `id_artist` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_artist` (`id_artist`),
  KEY `id_cat` (`id_cat`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `songs`
--

INSERT INTO `songs` (`id`, `name`, `release_date`, `lyrics`, `picture`, `id_artist`, `id_cat`, `id_admin`) VALUES
(3, 'Hello', '2011-10-10', '[value-4]', 'picture', 5, 3, 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`id_artist`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
