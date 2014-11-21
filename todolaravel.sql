-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 21 Novembre 2014 à 16:19
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `todolaravel`
--

-- --------------------------------------------------------

--
-- Structure de la table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `texte` varchar(255) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=129 ;

--
-- Contenu de la table `todos`
--

INSERT INTO `todos` (`id`, `user_id`, `texte`, `statut`, `created_at`, `updated_at`) VALUES
(119, 0, 'Ajouter un système de modification de l''email', 1, '2014-08-19 18:40:35', '2014-10-05 15:25:50'),
(118, 0, 'Ajouter un système de modification du mot de passe', 1, '2014-08-19 18:38:03', '2014-10-05 15:25:55'),
(95, 0, 'Ajouter un système d''export de la liste de tâche', 0, '2014-08-12 20:00:00', '2014-11-20 18:36:26'),
(124, 0, 'test', 0, '2014-11-20 18:30:00', '2014-11-20 18:30:00'),
(127, 2, 'test', 0, '2014-11-21 16:10:42', '2014-11-21 16:10:42');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `password_temp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `token` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `password_temp`, `email`, `role`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'creasitenet', '$2y$10$41fWfo/zA9aaG201yuobL.WTtntMUiLgpfNFdhs8ijh0AE/883ELK', '', 'creasitenet.com@gmail.com', 100, '123', 'u2fQ4Nf6j0oggBT07sKwLFVMsFFJ18YrHMfLTDq7uIN9xT0MYjIbwZhB7GVC', '0000-00-00 00:00:00', '2014-11-21 16:16:11'),
(2, 'edouard', '$2y$10$gImdJt2jfWK/XMoAjvhEKeeiLo/SMkKoDWTeBoM2QTJ5l3/Dqerbi', '', 'edouardboissel@gmail.com', 1, 'shCuGp8hQz93EbGygWVD1DbImKhxxJgQ75KhmCfO9WVfWuwA8D57NnOzUDBy', 'cJB6nIFnr49HBjExlI8849lfaKuvsZXbArMuajKu9m06FOtSNNa7Km9DllXd', '2014-11-21 16:10:01', '2014-11-21 16:12:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
