-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Dim 17 Juin 2012 à 17:37
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `galaxy`
--

-- --------------------------------------------------------

--
-- Structure de la table `node`
--

CREATE TABLE IF NOT EXISTS `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL DEFAULT '0',
  `weight` int(11) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update` timestamp NULL DEFAULT NULL,
  `title` varchar(32) DEFAULT NULL,
  `text` varchar(256) DEFAULT NULL,
  `link` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `node`
--

INSERT INTO `node` (`id`, `id_parent`, `id_user`, `weight`, `date`, `update`, `title`, `text`, `link`) VALUES
(1, 0, 1, 7, '2012-06-13 16:02:26', '2012-06-14 12:52:51', 'Root', 'This is the root node of this galaxy.', ''),
(2, 1, 0, 5, '2012-06-14 00:04:00', '2012-06-14 12:52:51', 'node1', 'This is a test node. Parent is Root. I added a super website!', 'http://reddit.com'),
(3, 1, 0, 1, '2012-06-14 00:04:00', NULL, 'node2', 'This is a test node. Parent is Root', NULL),
(4, 2, 0, 3, '2012-06-14 00:04:00', '2012-06-14 12:52:51', 'node3', 'This is a test node. Parent is node1', NULL),
(5, 4, 0, 2, '2012-06-14 01:20:00', '2012-06-14 12:52:51', 'node4', 'This is a test node. Parent is node3. I added a super website!', 'http://www.google.com'),
(6, 2, 0, 1, '2012-06-14 01:20:00', '2012-06-14 12:31:28', 'node5', 'This is a test node. Parent is node1', NULL),
(7, 5, 0, 1, '2012-06-14 09:38:00', '2012-06-14 12:52:51', 'node6', 'This is a test node. Parent is node4', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `date`, `email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2012-06-13 20:33:31', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
