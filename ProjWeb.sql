DROP DATABASE IF EXISTS pinf;
CREATE DATABASE pinf;

-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Dim 18 Août 2019 à 19:51
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pinf`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `identifiant` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'identifiant',
  `passe` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'mot de passe',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indique si l utilisateur est un administrateur ou si il est blacklist',
  `nom` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'nom',
  `prenom` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'prenom',
  `mail` varchar(60) CHARACTER SET latin1 NOT NULL COMMENT 'mail'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `identifiant`, `passe`, `admin`, `nom`, `prenom`, `mail`) VALUES
(1, 'Pierre', 'PDSM', 0, 'de Saint-Meleuc', 'Pierre', 'pinf.hyperion.hotmail.com'),
(2, 'admin', 'admin', 1, 'admin', 'admin', 'pinf.hyperion.hotmail.com');


-- --------------------------------------------------------

--
-- Structure de la table `livre_or`
--

CREATE TABLE `livre_or` (
  `id` int(11) NOT NULL COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `id_users` int(11) NOT NULL COMMENT 'l id du client du commentaire',
  `date` date NOT NULL COMMENT 'date du commentaire',
  `titre` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'titre du commentaire fait par le client',
  `texte` varchar(500) CHARACTER SET latin1 NOT NULL COMMENT 'texte du commentaire fait par le client'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

CREATE TABLE `disponibilite` (
  `id` int(11) NOT NULL COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `date` date NOT NULL COMMENT 'jour de la disponibilite',
  `heure_depart` time NOT NULL COMMENT 'heure du debut de la disponibilite',
  `heure_fin` time NOT NULL COMMENT 'heure de fin de la disponibilite'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `id_users` int(11) NOT NULL COMMENT 'l id du client ayant pris un rendez_vous',
  `id_rdv` int(11) NOT NULL COMMENT 'l id du rendez_vous',
  `accepte` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indique si l administrateur a accepte le rendez_vous (0 non, 1 oui)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livre_or`
--
ALTER TABLE `livre_or`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `livre_or`
--
ALTER TABLE `livre_or`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=4;


--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `livre_or`
  ADD CONSTRAINT `livre_or_users_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_users_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rendez_vous_disponibilite_1` FOREIGN KEY (`id_rdv`) REFERENCES `disponibilite` (`id`) ON DELETE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
