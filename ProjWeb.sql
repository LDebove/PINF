-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 25 Avril 2020 à 15:05
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pinf`
--
DROP DATABASE IF EXISTS pinf;
CREATE DATABASE pinf;

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
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `id_users` int(11) NOT NULL COMMENT 'l id du client ayant pris un rendez_vous',
  `id_rdv` int(11) NOT NULL COMMENT 'l id du rendez_vous',
  `accepte` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indique si l administrateur a accepte le rendez_vous (0 non, 1 oui)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'clé primaire, identifiant numérique auto incrémenté',
  `login` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'identifiant',
  `passe` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'mot de passe',
  `mail` varchar(60) CHARACTER SET latin1 NOT NULL COMMENT 'mail',
  `telephone` varchar(12) CHARACTER SET latin1 COMMENT 'téléphone',
  `nom` varchar(20) CHARACTER SET latin1 COMMENT 'nom',
  `prenom` varchar(20) CHARACTER SET latin1 COMMENT 'prenom',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indique si l utilisateur est un administrateur',
  `blacklist` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indique si l utilisateur est blacklisté'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `passe`, `mail`, `telephone`, `nom`, `prenom`, `admin`, `blacklist`) VALUES
(1, 'admin', 'admin', 'web.menuiseriedunord@gmail.com', '0609335551', 'Benouahlima', 'Monsieur', 1, 0),
(2, 'Piero', 'Manzoni', 'pinf.hyperion.hotmail.com', NULL, 'de Saint-Meleuc', 'Pierre', 0, 0);


--
-- Index pour les tables exportées
--

--
-- Index pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livre_or`
--
ALTER TABLE `livre_or`
  ADD PRIMARY KEY (`id`),
  ADD KEY `livre_or_users_1` (`id_users`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rendez_vous_users_1` (`id_users`),
  ADD KEY `rendez_vous_disponibilite_1` (`id_rdv`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `livre_or`
--
ALTER TABLE `livre_or`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
