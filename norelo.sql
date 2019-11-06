-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 06 juin 2019 à 18:20
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `norelo`
--

-- --------------------------------------------------------

--
-- Structure de la table `creneauxdisponibles`
--

DROP TABLE IF EXISTS `creneauxdisponibles`;
CREATE TABLE IF NOT EXISTS `creneauxdisponibles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `jour` date NOT NULL,
  `creneau1` int(10) NOT NULL,
  `creneau2` int(10) NOT NULL,
  `creneau3` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `creneauxdisponibles`
--

INSERT INTO `creneauxdisponibles` (`ID`, `jour`, `creneau1`, `creneau2`, `creneau3`) VALUES
(13, '2019-05-23', 7, 4, 4),
(15, '2019-05-24', 8, 8, 8),
(23, '2019-07-25', 4, 5, 5),
(9, '2019-05-25', 8, 6, 5),
(20, '2019-09-10', 7, 3, 6),
(21, '2019-05-22', 8, 8, 8),
(12, '2019-05-26', 7, 4, 3),
(16, '2019-05-01', 8, 8, 8),
(17, '2019-05-03', 8, 8, 8),
(19, '2019-05-02', 8, 7, 2),
(24, '2019-05-29', 7, 6, 1),
(25, '2019-05-28', 7, 6, 4),
(26, '2019-05-27', 7, 6, 4),
(27, '2019-05-20', 7, 6, 4),
(29, '2019-06-05', 2, 1, 6),
(32, '2019-06-06', 8, 6, 2),
(31, '2019-06-07', 8, 6, 7);

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `titre`, `description`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', ''),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(8, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `telephone` int(6) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prix`
--

DROP TABLE IF EXISTS `prix`;
CREATE TABLE IF NOT EXISTS `prix` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typecour` varchar(100) NOT NULL,
  `prix` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `prix`
--

INSERT INTO `prix` (`id`, `typecour`, `prix`) VALUES
(1, 'Collectif Adulte Classique', 35),
(2, 'Collectif Enfant Classique', 30),
(3, 'Individuel Adulte Classique', 70),
(4, 'Individuel Enfant Classique', 60),
(5, 'Individuel Enfant Approfondi', 100),
(6, 'Individuel Adulte Approfondi', 120),
(7, 'Collectif Adulte Approfondi', 70),
(8, 'Collectif Enfant Approfondi', 60);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `telephone` int(6) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `jour` date NOT NULL,
  `creneau` varchar(100) NOT NULL,
  `place` int(10) NOT NULL,
  `message` varchar(255) NOT NULL,
  `cour` varchar(250) NOT NULL,
  `prix` int(120) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`ID`, `nom`, `telephone`, `mail`, `jour`, `creneau`, `place`, `message`, `cour`, `prix`) VALUES
(81, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-31', 'Créneau2', 120, '151515', '', 0),
(80, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-31', 'Créneau2', 120, '151515', '', 0),
(82, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-31', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 120),
(83, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-31', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 120),
(84, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-31', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(85, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-31', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(86, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-31', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(87, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-31', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(88, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-31', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(89, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(90, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(91, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(92, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(93, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(94, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(95, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(96, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau1', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(97, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau1', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(98, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau1', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(99, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-22', 'Créneau1', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(100, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-22', 'Créneau1', 1, '151515', 'Individuel Adulte Approfondi 120 €', 120),
(101, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-22', 'Créneau1', 1, '151515', 'Individuel Adulte Approfondi 120 €', 120),
(102, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-22', 'Créneau1', 6, '151515', 'Individuel Adulte Approfondi 120 €', 720),
(103, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-22', 'Créneau2', 6, '151515', 'Individuel Adulte Approfondi 120 €', 720),
(104, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau1', 2, '151515', 'Individuel Adulte Approfondi 120 €', 240),
(105, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau1', 4, '151515', 'Individuel Adulte Approfondi 120 €', 480),
(106, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 4, '151515', 'Individuel Adulte Approfondi 120 €', 480),
(107, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau1', 8, '151515', 'Individuel Adulte Approfondi 120 €', 960),
(108, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 8, '151515', 'Individuel Adulte Approfondi 120 €', 960),
(109, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 8, '151515', 'Individuel Adulte Approfondi 120 €', 960),
(110, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 8, '151515', 'Individuel Adulte Approfondi 120 €', 960),
(111, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 8, '151515', 'Individuel Adulte Approfondi 120 €', 960),
(112, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 8, '151515', 'Individuel Adulte Approfondi 120 €', 960),
(113, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 8, '151515', 'Individuel Adulte Approfondi 120 €', 960),
(114, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau2', 8, '151515', 'Individuel Adulte Approfondi 120 €', 960),
(115, 'quentin', 556269944, 'DASILVA@GMAIL.COM', '2019-05-30', 'Créneau3', 8, '151515', 'Individuel Adulte Approfondi 120 €', 960),
(116, 'dz', 556269944, 'DASILVA@GMAIL.COM', '2019-05-29', 'Créneau3', 3, 'ùpùpùpùpp', 'Choisir...', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `pseudo`, `mdp`, `admin`, `mail`) VALUES
(9, 'pierre', '$2y$10$QXFg9ekoHfiVmgCNyFk49.f4lqWaoh4V9oKHCuKcqKJu.uXCbeHWS', 0, 'dasilva.quentin33@gmail.com'),
(8, 'quentin', '$2y$10$lAcnXTDXzYcsZ.kuOaUhyekJOlzPaqlTuBb7SOggKImb1XidwGsoC', 0, 'quenitn@gmail.com'),
(6, 'peterpan', '$2y$10$AsYRNna6Dwh2D0cJeh9W9O4ii50D6BDRbap3wn.3luasHbOOP2gza', 0, 'dasilva.quentin@gmail.com'),
(7, 'silverquent', '$2y$10$Pn6xDa3msJaz6Uq/Tz1p8OOvmV8TDOi3giSHLEx4Rnj5rAtoSiNDO', 1, 'dasilva.quentin@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
