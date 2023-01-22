-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2023 at 09:24 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lyrics_songsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date_birthday` date NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstName`, `lastName`, `date_birthday`, `email`, `password`, `picture`) VALUES
(4, 'saad', 'moumou', '1999-10-03', 'saad@gmail.com', 'saad123456b', '[value-7]'),
(5, 'Linda', 'Mckay', '2000-12-23', 'xaqalij@mailinator.com', 'Pa$$w0rd!', 'public/assets/imgs/pictures_upload/default/admins/default_picture.png'),
(6, 'Xaviera', 'Wade', '2006-03-02', 'vyfyfyhe@mailinator.com', 'Pa$$w0rd!', 'public/assets/imgs/pictures_upload/default/admins/default_picture.png'),
(7, 'Inez', 'Howell', '2016-09-17', 'kunywikul@mailinator.com', 'Pa$$w0rd!', 'public/assets/imgs/pictures_upload/default/admins/default_picture.png'),
(8, 'Libby', 'Ward', '1978-10-13', 'riwypogyko@mailinator.com', 'Pa$$w0rd!', 'public/assets/imgs/pictures_upload/default/admins/default_picture.png'),
(9, 'Ifeoma', 'Gill', '1997-02-25', 'rebesuv@mailinator.com', 'Pa$$w0rd!', 'public/assets/imgs/pictures_upload/default/admins/default_picture.png'),
(10, 'Emily', 'Moses', '1986-08-16', 'pegynef@mailinator.com', 'Pa$$w0rd!', 'public/assets/imgs/pictures_upload/default/admins/default_picture.png'),
(11, 'Bradley', 'Levy', '1997-05-30', 'qowecyral@mailinator.com', 'Pa$$w0rd!', 'public/assets/imgs/pictures_upload/default/admins/default_picture.png');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `id_admin`) VALUES
(7, 'saad', 5);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `date_birthday` date NOT NULL,
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `picture`, `date_birthday`, `id_admin`) VALUES
(38, 'adele', 'public/assets/imgs/pictures_upload/default/artists/default_picture.png', '2023-01-09', 5),
(41, 's', 'public/assets/imgs/pictures_upload/new/artists/artist.63cda7415028c1.76682040.png', '2023-01-17', 11);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `id_admin`) VALUES
(34, 'd', 5),
(37, 'dsaf', 11),
(38, 'ff', 11);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `release_date` date NOT NULL,
  `lyrics` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `picture` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_artist` int NOT NULL,
  `id_cat` int NOT NULL,
  `id_album` int NOT NULL,
  `id_admin` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_artist` (`id_artist`),
  KEY `id_cat` (`id_cat`),
  KEY `id_admin` (`id_admin`),
  KEY `id_albums` (`id_album`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `artists`
--
ALTER TABLE `artists`
  ADD CONSTRAINT `artists_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`id_artist`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `songs_ibfk_2` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `songs_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `songs_ibfk_4` FOREIGN KEY (`id_album`) REFERENCES `albums` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
