-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 04 Août 2013 à 15:46
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `etmoi`
--

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `wording`, `left`, `right`) VALUES
(1, 'user', 1, 40),
(2, 'mail', 2, 5),
(3, 'password', 6, 9),
(4, 'passport', 10, 13),
(5, 'name', 14, 17),
(6, 'firstname', 18, 21),
(7, 'association', 22, 25),
(8, 'description', 26, 27),
(9, 'illustration', 28, 29),
(10, 'cover', 30, 31),
(11, 'address', 32, 33),
(12, 'zip', 34, 35),
(13, 'city', 36, 37),
(14, 'date', 38, 39),
(15, 'biere@storm.in', 3, 4),
(16, '4fa90795faafca26d3d985b63488b4ff', 7, 8),
(17, '4', 11, 12),
(18, 'biereStorming', 23, 24),
(19, 'Storming', 15, 16),
(20, 'Biere', 19, 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
