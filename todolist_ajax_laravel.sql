-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 21 Août 2014 à 19:54
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `todolist_ajax_laravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `fini` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=131 ;

--
-- Contenu de la table `todos`
--

INSERT INTO `todos` (`id`, `user_id`, `texte`, `fini`, `created_at`, `updated_at`) VALUES
(128, 0, 'Enlever la confirmation de la suppression ?', 0, '2014-08-21 17:52:38', '2014-08-21 17:52:38'),
(130, 9, 'Test', 0, '2014-08-21 17:54:34', '2014-08-21 17:54:41'),
(129, 0, 'Réaliser un design pour les emails', 0, '2014-08-21 17:53:11', '2014-08-21 17:53:11'),
(127, 0, 'Ajouter un système de modification d''une tâche ', 0, '2014-08-21 17:52:10', '2014-08-21 17:52:10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_temp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `password_temp`, `email`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'Edouard', '$2y$10$1LUWzaBqfNVNkosY3tznfORCUVkKWE54anVM2XmKC/HydCyIYtshW', '', 'edouardboissel@gmail.com', 'ehXvYQD2iPyT3OsxlVvgWkksVPoqCcgm4oFNwvsVraM3jBcq7JEpaFvLPP8G', 'PvMshl0d16hN57crKK26EGGSGulW3rpbZPx5enyoRciz1J1Q0SZH6MfIy66E', '2014-08-21 10:44:20', '2014-08-21 15:01:55'),
(9, 'creasitenet', '$2y$10$eUbrNzIMrBDSrRMPDYnBu.B17ya1T08Q3/4NLYyDma9xWdMGM6mUS', '', 'creasitenet.com@gmail.com', '', NULL, '2014-08-21 15:54:07', '2014-08-21 15:54:07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
