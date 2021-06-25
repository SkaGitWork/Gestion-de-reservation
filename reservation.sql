-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 09 juin 2021 à 15:55
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `reservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe_de_transport`
--

CREATE TABLE `classe_de_transport` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classe_de_transport`
--

INSERT INTO `classe_de_transport` (`id`, `libelle`, `prix`) VALUES
(1, 'PremiÃ¨re classe', 30),
(2, 'Seconde classe', 10),
(3, 'Affaire', 10);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `email`, `mdp`, `nom`, `prenom`) VALUES
(1, 'aa@mm.cc', 'Asds', 'User', 'test'),
(4, 'aa@mm.cc', 'sd', 'df', 'df'),
(5, 'aa@mm.cc', 'test', 'test', 'test'),
(6, 'Islem@g.com', 'test', 'Adali', 'Islem'),
(7, 'Islem@h.com', 'test', 'Adali', 'Isleme'),
(8, 'Test@a.a', 'Test', 'Test', 'Test'),
(9, 'Test11@gmail.com', 'Test11', 'Test', 'Test'),
(10, 'Test11@ggg.com', 'aaaa', 'test', 'test'),
(11, 'adress@gmail.com', 'aaa', 'Nom', 'prenom');

-- --------------------------------------------------------

--
-- Structure de la table `client_reservation`
--

CREATE TABLE `client_reservation` (
  `id_client` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client_reservation`
--

INSERT INTO `client_reservation` (`id_client`, `id_reservation`, `id`) VALUES
(1, 6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `couchette`
--

CREATE TABLE `couchette` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `couchette`
--

INSERT INTO `couchette` (`id`, `libelle`, `prix`) VALUES
(1, 'Couchette', 5);

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `id` int(11) NOT NULL,
  `dep` time NOT NULL DEFAULT '20:50:30',
  `arr` time NOT NULL DEFAULT '23:50:30',
  `train_id` int(11) NOT NULL,
  `ligne_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT '2021-06-20'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id`, `dep`, `arr`, `train_id`, `ligne_id`, `date`) VALUES
(1, '00:06:00', '04:00:00', 1, 14, '2021-05-11'),
(2, '05:00:00', '07:00:00', 1, 12, '2021-05-22'),
(3, '00:06:00', '04:00:00', 1, 16, '2021-05-12'),
(4, '05:00:00', '07:00:00', 1, 16, '2021-05-19'),
(5, '20:50:30', '23:50:30', 3, 14, '2021-06-20'),
(6, '20:50:30', '23:50:30', 2, 13, '2021-06-20'),
(7, '00:06:00', '04:00:00', 1, 16, '2021-05-11'),
(8, '05:00:00', '07:00:00', 1, 14, '2021-05-22'),
(9, '00:06:00', '04:00:00', 1, 16, '2021-05-12'),
(10, '05:00:00', '07:00:00', 1, 17, '2021-05-19'),
(11, '20:50:30', '23:50:30', 3, 18, '2021-06-20'),
(12, '20:50:30', '23:50:30', 2, 12, '2021-06-20');

-- --------------------------------------------------------

--
-- Structure de la table `ligne`
--

CREATE TABLE `ligne` (
  `id` int(11) NOT NULL,
  `dep` varchar(20) NOT NULL,
  `arr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `ligne`
--

INSERT INTO `ligne` (`id`, `dep`, `arr`) VALUES
(12, 'Tunisie', 'Sousse'),
(13, 'Sousse', 'Mounastir'),
(14, 'Gabes', 'Sfax'),
(16, 'Mounastir', 'Tunisie'),
(17, 'Gabes', 'Tataouine'),
(18, 'Tataouine', 'Sousse');

-- --------------------------------------------------------

--
-- Structure de la table `profil_passager`
--

CREATE TABLE `profil_passager` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `profil_passager`
--

INSERT INTO `profil_passager` (`id`, `libelle`, `prix`) VALUES
(1, 'Enfant', 10),
(2, 'Enfant non accompagne', 5),
(3, 'Jeune', 10),
(4, 'Ã©tudiant', 20);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  `montant` float NOT NULL,
  `actif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id`, `libelle`, `montant`, `actif`) VALUES
(1, 'Ete', 0.2, 0),
(2, 'Hiver', 0.1, 1),
(3, 'Vacance', 0.3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `repas`
--

CREATE TABLE `repas` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `repas`
--

INSERT INTO `repas` (`id`, `libelle`, `prix`) VALUES
(1, 'Petit dÃ©jeuner', 10),
(2, 'DÃ©jeuner', 20),
(3, 'DÃ®ner', 20);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `profil` int(11) NOT NULL,
  `classe` int(20) NOT NULL,
  `repas` int(20) NOT NULL,
  `couchette` int(11) NOT NULL,
  `id_horaire` int(11) NOT NULL,
  `type_billet` int(20) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `nb_place` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `id_client`, `prix`, `profil`, `classe`, `repas`, `couchette`, `id_horaire`, `type_billet`, `promotion_id`, `nb_place`) VALUES
(10, 1, 104, 1, 1, 1, 1, 1, 1, 1, 1),
(55, 1, 104, 1, 1, 1, 1, 1, 1, 1, 1),
(56, 1, 72, 2, 2, 2, 1, 2, 2, 1, 1),
(57, 1, 95, 3, 1, 2, 1, 2, 2, 1, 1),
(58, 8, 77, 1, 2, 1, 1, 2, 1, 1, 1),
(59, 1, 95, 1, 1, 1, 1, 2, 1, 1, 1),
(60, 1, 95, 1, 1, 1, 1, 2, 1, 1, 1),
(61, 1, 104, 1, 1, 1, 1, 6, 1, 1, 1),
(62, 1, 92, 1, 1, 1, 1, 2, 1, 1, 1),
(63, 1, 104, 1, 1, 1, 1, 6, 1, 1, 1),
(67, 10, 140, 1, 1, 1, 1, 5, 1, 2, 3),
(68, 11, 126, 2, 3, 2, 1, 5, 1, 2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `place` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `train`
--

INSERT INTO `train` (`id`, `place`, `prix`, `type`) VALUES
(1, 0, 10, 'Fantome'),
(2, 46, 25, 'Rapide'),
(3, 42, 50, 'Lent'),
(4, 20, 50, 'Test');

-- --------------------------------------------------------

--
-- Structure de la table `type_billet`
--

CREATE TABLE `type_billet` (
  `id` int(11) NOT NULL,
  `libelle` text NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_billet`
--

INSERT INTO `type_billet` (`id`, `libelle`, `prix`) VALUES
(1, 'Modifiable', 50),
(2, 'Non modifiable', 30),
(3, 'Modifiable sous condition', 60);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe_de_transport`
--
ALTER TABLE `classe_de_transport`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `client_reservation`
--
ALTER TABLE `client_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`,`id_reservation`),
  ADD KEY `id_reservation` (`id_reservation`);

--
-- Index pour la table `couchette`
--
ALTER TABLE `couchette`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ligne_id` (`ligne_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Index pour la table `ligne`
--
ALTER TABLE `ligne`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profil_passager`
--
ALTER TABLE `profil_passager`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `repas`
--
ALTER TABLE `repas`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horaire_id` (`id_horaire`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `type` (`profil`,`classe`,`repas`,`couchette`,`type_billet`),
  ADD KEY `classe` (`classe`),
  ADD KEY `couchette` (`couchette`),
  ADD KEY `repas` (`repas`),
  ADD KEY `type_billet` (`type_billet`),
  ADD KEY `promotion_id` (`promotion_id`);

--
-- Index pour la table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_billet`
--
ALTER TABLE `type_billet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe_de_transport`
--
ALTER TABLE `classe_de_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `client_reservation`
--
ALTER TABLE `client_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `couchette`
--
ALTER TABLE `couchette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `ligne`
--
ALTER TABLE `ligne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `profil_passager`
--
ALTER TABLE `profil_passager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `repas`
--
ALTER TABLE `repas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `type_billet`
--
ALTER TABLE `type_billet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client_reservation`
--
ALTER TABLE `client_reservation`
  ADD CONSTRAINT `client_reservation_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `client_reservation_ibfk_2` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id`);

--
-- Contraintes pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD CONSTRAINT `horaire_ibfk_3` FOREIGN KEY (`ligne_id`) REFERENCES `ligne` (`id`),
  ADD CONSTRAINT `horaire_ibfk_4` FOREIGN KEY (`train_id`) REFERENCES `train` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_10` FOREIGN KEY (`promotion_id`) REFERENCES `promotion` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_horaire`) REFERENCES `horaire` (`id`),
  ADD CONSTRAINT `reservation_ibfk_5` FOREIGN KEY (`profil`) REFERENCES `profil_passager` (`id`),
  ADD CONSTRAINT `reservation_ibfk_6` FOREIGN KEY (`classe`) REFERENCES `classe_de_transport` (`id`),
  ADD CONSTRAINT `reservation_ibfk_7` FOREIGN KEY (`couchette`) REFERENCES `couchette` (`id`),
  ADD CONSTRAINT `reservation_ibfk_8` FOREIGN KEY (`repas`) REFERENCES `repas` (`id`),
  ADD CONSTRAINT `reservation_ibfk_9` FOREIGN KEY (`type_billet`) REFERENCES `type_billet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
