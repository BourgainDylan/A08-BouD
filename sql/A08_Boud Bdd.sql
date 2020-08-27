-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 août 2020 à 14:48
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `a08_boud`
--

-- --------------------------------------------------------

--
-- Structure de la table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(80) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `dob` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `last_name` (`last_name`,`first_name`,`dob`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actors`
--

INSERT INTO `actors` (`id`, `last_name`, `first_name`, `dob`, `image`, `created_at`, `modified_at`) VALUES
(2, 'Edward', 'Norton', '1969-08-18', 'Edward_Norton.jpg', '2020-08-25 10:25:14', NULL),
(4, 'Liv', 'Tyler', '2077-07-01', 'Liv Tyler.jpg', '2020-08-25 10:28:44', NULL),
(8, 'Jon  ', 'Favreau  ', '1990-01-30', 'Jon_Favreau.jpg', '2020-08-25 10:34:53', NULL),
(10, 'Paul', 'Rudd', '1969-04-06', 'Paul_Rudd.jpg', '2020-08-25 10:37:19', NULL),
(12, 'Evangeline', 'Lilly', '1979-08-03', 'Evangeline_Lilly.jpg', '2020-08-25 10:38:24', NULL),
(14, 'Chris', 'Evans', '1981-06-13', 'Chris_Evans.jpg', '2020-08-25 10:39:03', NULL),
(16, 'hayley', 'Atwell', '1982-04-05', 'Hayley_Atwell.jpg', '2020-08-25 10:40:42', NULL),
(18, 'chris', 'Hemsworth', '1983-08-11', 'Chris_Hemsworth.jpg', '2020-08-25 10:41:58', NULL),
(20, 'Natalie', 'Portman', '1981-06-09', 'Natalie_Portman.jpg', '2020-08-25 10:42:37', NULL),
(22, 'Chris', 'Pratt', '1979-06-21', 'Chris_Pratt.jpg', '2020-08-25 10:43:43', NULL),
(24, 'Zoe', 'Saldana', '1978-06-19', 'Zoe_Saldana.jpg', '2020-08-25 10:44:42', NULL),
(26, 'Taika', 'Waititi', '1975-08-16', 'Taika_Waititi.jpg', '2020-08-25 10:45:53', NULL),
(30, 'Jake', 'Gyllenhaal', '1980-12-19', 'Jake_Gyllenhaal.jpg', '2020-08-25 10:48:05', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `actors_movies`
--

DROP TABLE IF EXISTS `actors_movies`;
CREATE TABLE IF NOT EXISTS `actors_movies` (
  `id_actors` int(11) NOT NULL,
  `id_movies` int(11) NOT NULL,
  `role` varchar(80) NOT NULL,
  UNIQUE KEY `id_actors` (`id_actors`,`id_movies`),
  KEY `actors_movies_movies` (`id_movies`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actors_movies`
--

INSERT INTO `actors_movies` (`id_actors`, `id_movies`, `role`) VALUES
(2, 52, 'Hulk'),
(4, 52, 'Betty Ross'),
(8, 49, 'Happy Hogan'),
(10, 50, 'l\'homme fourmi'),
(10, 51, 'L\'homme fourmi'),
(12, 50, 'Hope Van Dyne'),
(12, 51, 'Hope Van Dyne'),
(14, 51, 'dfd'),
(14, 53, 'Capitaine america'),
(18, 57, 'Thor'),
(20, 58, 'Jane Foster'),
(22, 54, 'Star-Lord'),
(22, 55, 'Star-Lord\r\n'),
(22, 58, 'Thor'),
(24, 54, 'Gamora'),
(24, 55, 'Gamora'),
(26, 57, 'Korg'),
(30, 56, 'Peter-parker');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `release_date` date NOT NULL,
  `duration` time DEFAULT NULL,
  `director` varchar(80) DEFAULT NULL,
  `id_phase` tinyint(3) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`release_date`),
  KEY `id_phases_phases` (`id_phase`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id`, `name`, `release_date`, `duration`, `director`, `id_phase`, `image`, `created_at`, `modified_at`) VALUES
(49, 'Iron Man', '2008-08-30', '02:06:00', 'Jon Favreau', 1, 'iron-man.jpg', '2020-08-24 13:43:59', NULL),
(50, 'Ant man et la guêpe', '2018-07-04', '01:58:00', 'Peyton Reed', 3, 'Ant-Man-et-la-guepe.jpg', '2020-08-24 13:46:00', NULL),
(51, 'Ant man', '2008-08-30', '01:57:00', 'Peyton Reed', 2, 'ant-man.jpg', '2020-08-24 13:47:55', NULL),
(52, 'Hulk', '2003-08-30', '01:57:00', 'Ang Lee     ', 1, 'incredible-hulk.jpg', '2020-08-24 13:52:59', NULL),
(53, 'Capitaine america', '2011-08-17', '02:05:00', 'Joe Johnston', 1, 'capitaine-america-le-soldat-de-lhiver.jpg', '2020-08-24 13:54:22', NULL),
(54, 'Gardien de la galaxie', '2014-08-13', '01:57:00', 'James Gunn', 2, 'gardien-de-la-galaxie-1.jpg', '2020-08-24 13:56:47', NULL),
(55, 'Gardien de la galaxie 2', '2017-04-21', '02:02:00', 'James Gunn', 2, 'gardien-de-la-galaxie-2.jpg', '2020-08-24 13:57:59', NULL),
(56, 'Spider man loin des siens', '2019-06-19', '02:01:00', 'Jon Watts', 3, 'spider-man-loin-des-siens.jpg', '2020-08-24 13:59:02', NULL),
(57, 'Thor : Ragnarok', '2017-10-25', '01:57:00', 'Taika Waititi', 3, 'thor-ragnarok.jpg', '2020-08-24 14:00:18', NULL),
(58, 'Thor : le monde des tenebres ', '2013-10-30', '02:05:00', ' Alan Taylor', 2, 'thor-le-monde-des-tenebres.jpg', '2020-08-24 14:01:30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `phases`
--

DROP TABLE IF EXISTS `phases`;
CREATE TABLE IF NOT EXISTS `phases` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `phase` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `phases`
--

INSERT INTO `phases` (`id`, `phase`) VALUES
(1, 'I'),
(2, 'II'),
(3, 'III');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `actors_movies`
--
ALTER TABLE `actors_movies`
  ADD CONSTRAINT `actors_actors_movies` FOREIGN KEY (`id_actors`) REFERENCES `actors` (`id`),
  ADD CONSTRAINT `actors_movies_movies` FOREIGN KEY (`id_movies`) REFERENCES `movies` (`id`);

--
-- Contraintes pour la table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `id_phases_phases` FOREIGN KEY (`id_phase`) REFERENCES `phases` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
