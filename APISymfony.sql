-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 22 sep. 2020 à 22:17
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `APISymfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `matricule` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cni` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `matricule`, `cni`, `prenom`, `nom`, `adresse`, `email`) VALUES
(1, '47778890', '1098765432345', 'Amina', 'Badji', 'Bargnie', 'dsudb@gmail.com'),
(2, 'kjh68678', '2655756786785', 'Marame', 'Niang', 'Keur Mbaye Fall', 'thiat@gmil.com');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `entreprise_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `type_compte_id` int(11) DEFAULT NULL,
  `numero` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rib` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solde` double NOT NULL,
  `date_ouverture` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frais_ouverture` double DEFAULT NULL,
  `remuneration` double DEFAULT NULL,
  `date_debut` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_fin` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `entreprise_id`, `client_id`, `type_compte_id`, `numero`, `rib`, `solde`, `date_ouverture`, `frais_ouverture`, `remuneration`, `date_debut`, `date_fin`) VALUES
(1, NULL, 1, 1, '86686592', '53e564uo9', 200000, '22-09-2020', 5000, 10000, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `telephone`, `email`, `adresse`, `budget`) VALUES
(1, 'Lo et frere', '331234567', 'loetfrere@gmail.com', 'Parcelles', '1000000000');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

CREATE TABLE `operation` (
  `id` int(11) NOT NULL,
  `compte_id` int(11) NOT NULL,
  `depot` decimal(10,0) DEFAULT NULL,
  `retrait` decimal(10,0) DEFAULT NULL,
  `virement` decimal(10,0) DEFAULT NULL,
  `taxe` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`id`, `compte_id`, `depot`, `retrait`, `virement`, `taxe`) VALUES
(1, 1, '50000000', NULL, NULL, '5000');

-- --------------------------------------------------------

--
-- Structure de la table `type_compte`
--

CREATE TABLE `type_compte` (
  `id` int(11) NOT NULL,
  `libelle` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_compte`
--

INSERT INTO `type_compte` (`id`, `libelle`) VALUES
(1, 'Simple'),
(2, 'Courant'),
(3, 'Bloque');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CFF65260A4AEAFEA` (`entreprise_id`),
  ADD KEY `IDX_CFF6526019EB6921` (`client_id`),
  ADD KEY `IDX_CFF6526046032730` (`type_compte_id`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_1981A66DF2C56620` (`compte_id`);

--
-- Index pour la table `type_compte`
--
ALTER TABLE `type_compte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `operation`
--
ALTER TABLE `operation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type_compte`
--
ALTER TABLE `type_compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `FK_CFF6526019EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_CFF6526046032730` FOREIGN KEY (`type_compte_id`) REFERENCES `type_compte` (`id`),
  ADD CONSTRAINT `FK_CFF65260A4AEAFEA` FOREIGN KEY (`entreprise_id`) REFERENCES `entreprise` (`id`);

--
-- Contraintes pour la table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `FK_1981A66DF2C56620` FOREIGN KEY (`compte_id`) REFERENCES `compte` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
