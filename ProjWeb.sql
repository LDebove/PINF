
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
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'date du commentaire',
  `titre` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'titre du commentaire fait par le client',
  `texte` varchar(500) CHARACTER SET latin1 NOT NULL COMMENT 'texte du commentaire fait par le client'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prestations`
--

CREATE TABLE `prestations` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `texte` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `telephone` varchar(12) CHARACTER SET latin1 NOT NULL COMMENT 'téléphone',
  `nom` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'nom',
  `prenom` varchar(20) CHARACTER SET latin1 NOT NULL COMMENT 'prenom',
  `admin` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'indique si l utilisateur est un administrateur',
  `blacklist` tinyint(1) DEFAULT '0' COMMENT 'indique si l utilisateur est blacklisté'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `passe`, `mail`, `telephone`, `nom`, `prenom`, `admin`, `blacklist`) VALUES
(1, 'admin', '?4Wr3$raBr1spod-xiXA', 'web.menuiseriedunord@gmail.com', '0609335551', 'Benouahlima', 'Monsieur', 1, 0);

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
-- Index pour la table `prestations`
--
ALTER TABLE `prestations`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `livre_or`
--
ALTER TABLE `livre_or`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `prestations`
--
ALTER TABLE `prestations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'clé primaire, identifiant numérique auto incrémenté', AUTO_INCREMENT=11;