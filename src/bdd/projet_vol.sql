-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 26 mars 2025 à 09:50
-- Version du serveur : 5.7.40
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_vol`
--

-- --------------------------------------------------------

--
-- Structure de la table `avions`
--

DROP TABLE IF EXISTS `avions`;
CREATE TABLE IF NOT EXISTS `avions` (
  `id_avion` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `capacite` int(255) NOT NULL,
  `localisation_avion` int(11) NOT NULL,
  PRIMARY KEY (`id_avion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pilotes`
--

DROP TABLE IF EXISTS `pilotes`;
CREATE TABLE IF NOT EXISTS `pilotes` (
  `id_pilote` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `conges` tinyint(1) NOT NULL,
  `ref_avion` int(11) NOT NULL,
  `ref_vol` int(11) NOT NULL,
  PRIMARY KEY (`id_pilote`),
  KEY `ref_avion` (`ref_avion`),
  KEY `ref_vol` (`ref_vol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_reservation` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  `prix_billet` double NOT NULL,
  `reservation_en_cours` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_Utilisateur` int(11) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `nom` text NOT NULL,
  `prénom` text NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `ville_residence` text NOT NULL,
  `role` text NOT NULL,
  `ref_vol` int(11) NOT NULL,
  PRIMARY KEY (`id_Utilisateur`),
  KEY `ref_vol` (`ref_vol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vols`
--

DROP TABLE IF EXISTS `vols`;
CREATE TABLE IF NOT EXISTS `vols` (
  `id_vol` int(11) NOT NULL,
  `destination` text NOT NULL,
  `heure_depart` time(6) NOT NULL,
  `heure_arrivee` time(6) NOT NULL,
  `ville_arrivee` text NOT NULL,
  `ref_reservation` int(11) NOT NULL,
  `ref_avion` int(11) NOT NULL,
  `ref_pilote` int(11) NOT NULL,
  PRIMARY KEY (`id_vol`),
  KEY `ref_reservation` (`ref_reservation`),
  KEY `ref_avion` (`ref_avion`),
  KEY `ref_pilote` (`ref_pilote`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `pilotes`
--
ALTER TABLE `pilotes`
  ADD CONSTRAINT `pilotes_ibfk_1` FOREIGN KEY (`ref_avion`) REFERENCES `avions` (`id_avion`),
  ADD CONSTRAINT `pilotes_ibfk_2` FOREIGN KEY (`ref_vol`) REFERENCES `vols` (`id_vol`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ref_vol`) REFERENCES `vols` (`id_vol`);

--
-- Contraintes pour la table `vols`
--
ALTER TABLE `vols`
  ADD CONSTRAINT `vols_ibfk_1` FOREIGN KEY (`ref_reservation`) REFERENCES `reservation` (`id_reservation`),
  ADD CONSTRAINT `vols_ibfk_2` FOREIGN KEY (`ref_avion`) REFERENCES `avions` (`id_avion`),
  ADD CONSTRAINT `vols_ibfk_3` FOREIGN KEY (`ref_pilote`) REFERENCES `pilotes` (`id_pilote`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
