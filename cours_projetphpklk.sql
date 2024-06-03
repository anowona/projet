-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 juin 2024 à 22:49
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cours_projetphpklk`
--
CREATE DATABASE IF NOT EXISTS `cours_projetphpklk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cours_projetphpklk`;

-- --------------------------------------------------------

--
-- Structure de la table `console`
--

CREATE TABLE `console` (
  `id_console` int(10) UNSIGNED NOT NULL,
  `codeConsole` varchar(5) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `marque` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `console`
--

INSERT INTO `console` (`id_console`, `codeConsole`, `designation`, `marque`) VALUES
(6, 'cV0rq', 'Windows', 'Microsoft'),
(7, 'c5G0r', 'Mac', 'Apple'),
(8, 'cfgEu', 'PlayStation 3', 'Sony'),
(9, 'caIJB', 'PlayStation 4', 'Sony'),
(10, 'cNoct', 'PlayStation 5', 'Sony'),
(11, 'cd9Hu', 'Xbox Series', 'Microsoft'),
(12, 'cANbG', 'Xbox One', 'Microsoft'),
(13, 'cvXyd', 'Nintendo Switch', 'Nintendo'),
(14, 'cHEuB', 'Android', 'Google'),
(15, 'cCZ0F', 'iOS', 'Apple'),
(16, 'cWJsf', 'test11', 'Test11'),
(17, 'cBZf7', 'test2', 'test2'),
(18, 'cwS7F', 'test3', 'test3');

-- --------------------------------------------------------

--
-- Structure de la table `internaute`
--

CREATE TABLE `internaute` (
  `id_internaute` int(10) UNSIGNED NOT NULL,
  `nom_prenoms` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mot_passe` varchar(255) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `sexe` varchar(1) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `date_inscr` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `internaute`
--

INSERT INTO `internaute` (`id_internaute`, `nom_prenoms`, `mail`, `mot_passe`, `adresse`, `sexe`, `pays`, `date_inscr`) VALUES
(9, 'NP9', 'E9@E9', '$2y$10$eLe/q.4TU3HPH5lcZZkj8.lzkfdIGUDJJjWhA5M9pU5rhsr.wLHR2', 'A9', 'F', 'P9', '2024-05-31');

-- --------------------------------------------------------

--
-- Structure de la table `jeuvideo`
--

CREATE TABLE `jeuvideo` (
  `id_jeu` int(11) UNSIGNED NOT NULL,
  `codeJeu` varchar(10) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `typeJeu` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `fonctionnement` varchar(255) NOT NULL,
  `editeur` varchar(20) NOT NULL,
  `mode` tinyint(1) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `dateAjout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeuvideo`
--

INSERT INTO `jeuvideo` (`id_jeu`, `codeJeu`, `titre`, `typeJeu`, `description`, `fonctionnement`, `editeur`, `mode`, `photo`, `dateAjout`) VALUES
(7, 'jVjS1', 'Final Fantasy XIV', 'MMORPG', 'Final Fantasy XIV (ファイナルファンタジーXIV, Fainaru Fantajī Fōtīn?), Final Fantasy XIV: Online, ou plus tard Final Fantasy XIV: A Realm Reborn, est un jeu de rôle en ligne massivement multijoueur développé et édité par Square Enix. C\'est le quatorzième volet de la série principale des Final Fantasy et le second jeu de rôle massivement multijoueur développé par Square Enix après Final Fantasy XI. Ce jeu a une histoire particulière car deux versions se sont succédé : la version 1.0 dont les serveurs sont à présent fermés et Final Fantasy XIV: A Realm Reborn, ou version 2.0, qui est à présent la version de base du jeu.', 'Multijoueur', 'Square Enix', 1, 'jVjS1.png', '2024-05-31'),
(8, 'jHnu7', 'Apex Legends', 'FPS', 'Apex Legends est un jeu vidéo de type battle royale développé par Respawn Entertainment et édité par Electronic Arts. Il est publié en accès gratuit le 4 février 2019 sur Microsoft Windows, PlayStation 4 et Xbox One. Le jeu sort sur Nintendo Switch le 9 mars 20212, enfin la version mobile est sortie le 17 mai 20223. Le 1er mai 2023, soit moins d\'an après son lancement, EA met fin à la version mobile d\'Apex Legends4.', 'Multijoueur', 'Electronic Arts', 1, 'jHnu7.png', '2024-05-31'),
(9, 'jrSgJ', 'Call of Duty: Modern', 'FPS', 'Call of Duty: Modern Warfare III est un jeu vidéo de tir à la première personne développé par Sledgehammer Games et publié par Activision, sorti le 10 novembre 2023 sur PlayStation 4, PlayStation 5, Windows, Xbox One et Xbox Series1,2. Il s\'agit du vingtième jeu de la série Call of Duty et du troisième opus de la sous-série Modern Warfare rebootée, faisant office de suite à Modern Warfare II sorti en 2022.\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Call_of_Duty:_Modern_Warfare_III\">https://fr.wikipedia.org/wiki/Call_of_Duty:_Modern_Warfare_III</a>', 'Solo, multijoueur', 'Activision', 0, 'jrSgJ.jpg', '2024-05-31'),
(10, 'jBePr', 'Black Desert Online', 'MMORPG', 'Black Desert Online (검은사막) est un jeu vidéo de type MMORPG développé par Pearl Abyss (en) et édité par Kakao Games, sorti en 2015 sur Windows puis en 2019 sur Xbox One et PlayStation 4.', 'Multijoueur', 'Kakao Games', 1, 'jBePr.png', '2024-05-31'),
(11, 'jUBDP', 'Call of Duty: Mobile', 'FPS', 'Call of Duty: Mobile (ou COD: Mobile) est un jeu vidéo mobile de tir à la première personne en free-to-play développé par TiMi Studios et publié par Activision. Il est disponible mondialement à partir du 1er octobre 2019 sur iOS et Android. Il fait partie de la série Call of Duty.', 'Multijoueur', 'Activision', 1, 'jUBDP.png', '2024-05-31'),
(12, 'jgOB0', 'T1', 'TJ1', 'D1', 'F1', 'E1', 3, 'jgOB0.png', '2024-06-03');

-- --------------------------------------------------------

--
-- Structure de la table `relation_consolejeuvideo`
--

CREATE TABLE `relation_consolejeuvideo` (
  `idRelation` int(11) NOT NULL,
  `codeConsole` varchar(255) NOT NULL,
  `codeJeu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `relation_consolejeuvideo`
--

INSERT INTO `relation_consolejeuvideo` (`idRelation`, `codeConsole`, `codeJeu`) VALUES
(1, 'CC2', 'jVCM8'),
(2, 'cumVU', 'jVCM8'),
(8, 'cd9Hu', 'jVjS1'),
(12, 'cd9Hu', 'jHnu7'),
(14, 'cvXyd', 'jHnu7'),
(18, 'cd9Hu', 'jrSgJ'),
(24, 'cCZ0F', 'jBePr'),
(26, 'cCZ0F', 'jUBDP'),
(74, 'c5G0r', 'jgOB0'),
(75, 'caIJB', 'jgOB0'),
(76, 'cNoct', 'jgOB0'),
(77, 'cHEuB', 'jgOB0');

-- --------------------------------------------------------

--
-- Structure de la table `relation_internautejeuvideo`
--

CREATE TABLE `relation_internautejeuvideo` (
  `idRelation` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `codeJeu` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `relation_internautejeuvideo`
--

INSERT INTO `relation_internautejeuvideo` (`idRelation`, `mail`, `codeJeu`) VALUES
(20, 'M3@M3', 'jBePr'),
(28, 'E9@E9', 'jVjS1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `console`
--
ALTER TABLE `console`
  ADD PRIMARY KEY (`id_console`);

--
-- Index pour la table `internaute`
--
ALTER TABLE `internaute`
  ADD PRIMARY KEY (`id_internaute`);

--
-- Index pour la table `jeuvideo`
--
ALTER TABLE `jeuvideo`
  ADD PRIMARY KEY (`id_jeu`);

--
-- Index pour la table `relation_consolejeuvideo`
--
ALTER TABLE `relation_consolejeuvideo`
  ADD PRIMARY KEY (`idRelation`);

--
-- Index pour la table `relation_internautejeuvideo`
--
ALTER TABLE `relation_internautejeuvideo`
  ADD PRIMARY KEY (`idRelation`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `console`
--
ALTER TABLE `console`
  MODIFY `id_console` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `internaute`
--
ALTER TABLE `internaute`
  MODIFY `id_internaute` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `jeuvideo`
--
ALTER TABLE `jeuvideo`
  MODIFY `id_jeu` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `relation_consolejeuvideo`
--
ALTER TABLE `relation_consolejeuvideo`
  MODIFY `idRelation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT pour la table `relation_internautejeuvideo`
--
ALTER TABLE `relation_internautejeuvideo`
  MODIFY `idRelation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
