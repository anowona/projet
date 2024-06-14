-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 13 juin 2024 à 06:43
-- Version du serveur : 10.5.20-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id22302924_projetphpklk`
--

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
(15, 'cCZ0F', 'iOS', 'Apple');

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
(9, 'NP9', 'E9@E9', '$2y$10$eLe/q.4TU3HPH5lcZZkj8.lzkfdIGUDJJjWhA5M9pU5rhsr.wLHR2', 'A9', 'F', 'P9', '2024-05-31'),
(10, 'NP10', 'E10@E10', '$2y$10$ztJhW.4h3AZlzFiVJs2C..TNMiuU4mx5rS3vJ/e9cZPw5pQlxhTO6', 'A10', 'M', '', '2024-06-11');

-- --------------------------------------------------------

--
-- Structure de la table `jeuvideo`
--

CREATE TABLE `jeuvideo` (
  `id_jeu` int(10) UNSIGNED NOT NULL,
  `codeJeu` varchar(5) NOT NULL,
  `titre` varchar(50) NOT NULL,
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
(7, 'jVjS1', 'Final Fantasy XIV', 'MMORPG', 'Final Fantasy XIV (ファイナルファンタジーXIV, Fainaru Fantajī Fōtīn?), Final Fantasy XIV: Online, ou plus tard Final Fantasy XIV: A Realm Reborn, est un jeu de rôle en ligne massivement multijoueur développé et édité par Square Enix. C\'est le quatorzième volet de la série principale des Final Fantasy et le second jeu de rôle massivement multijoueur développé par Square Enix après Final Fantasy XI. Ce jeu a une histoire particulière car deux versions se sont succédé : la version 1.0 dont les serveurs sont à présent fermés et Final Fantasy XIV: A Realm Reborn, ou version 2.0, qui est à présent la version de base du jeu. <br>\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Final_Fantasy_XIV\">https://fr.wikipedia.org/wiki/Final_Fantasy_XIV</a>', 'Multijoueur', 'Square Enix', 1, 'jVjS1.png', '2024-05-31'),
(8, 'jHnu7', 'Apex Legends', 'FPS', 'Apex Legends est un jeu vidéo de type battle royale développé par Respawn Entertainment et édité par Electronic Arts. Il est publié en accès gratuit le 4 février 2019 sur Microsoft Windows, PlayStation 4 et Xbox One. Le jeu sort sur Nintendo Switch le 9 mars 20212, enfin la version mobile est sortie le 17 mai 20223. Le 1er mai 2023, soit moins d\'an après son lancement, EA met fin à la version mobile d\'Apex Legends4. <br>\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Apex_Legends\">https://fr.wikipedia.org/wiki/Apex_Legends</a>', 'Multijoueur', 'Electronic Arts', 1, 'jHnu7.png', '2024-05-31'),
(9, 'jrSgJ', 'Call of Duty: Modern Warfare III', 'FPS', 'Call of Duty: Modern Warfare III est un jeu vidéo de tir à la première personne développé par Sledgehammer Games et publié par Activision, sorti le 10 novembre 2023 sur PlayStation 4, PlayStation 5, Windows, Xbox One et Xbox Series1,2. Il s\'agit du vingtième jeu de la série Call of Duty et du troisième opus de la sous-série Modern Warfare rebootée, faisant office de suite à Modern Warfare II sorti en 2022. <br>\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Call_of_Duty:_Modern_Warfare_III\">https://fr.wikipedia.org/wiki/Call_of_Duty:_Modern_Warfare_III</a>', 'Solo, multijoueur', 'Activision', 0, 'jrSgJ.jpg', '2024-05-31'),
(10, 'jBePr', 'Black Desert Online', 'MMORPG', 'Black Desert Online (검은사막) est un jeu vidéo de type MMORPG développé par Pearl Abyss (en) et édité par Kakao Games, sorti en 2015 sur Windows puis en 2019 sur Xbox One et PlayStation 4. <br>\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Black_Desert_Online\">https://fr.wikipedia.org/wiki/Black_Desert_Online</a>', 'Multijoueur', 'Kakao Games', 1, 'jBePr.png', '2024-05-31'),
(11, 'jUBDP', 'Call of Duty: Mobile', 'FPS', 'Call of Duty: Mobile (ou COD: Mobile) est un jeu vidéo mobile de tir à la première personne en free-to-play développé par TiMi Studios et publié par Activision. Il est disponible mondialement à partir du 1er octobre 2019 sur iOS et Android. Il fait partie de la série Call of Duty. <br>\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Call_of_Duty:_Mobile\">https://fr.wikipedia.org/wiki/Call_of_Duty:_Mobile</a>', 'Multijoueur', 'Activision', 1, 'jUBDP.png', '2024-05-31');

-- --------------------------------------------------------

--
-- Structure de la table `relation_consolejeuvideo`
--

CREATE TABLE `relation_consolejeuvideo` (
  `idRelation` int(10) UNSIGNED NOT NULL,
  `codeConsole` varchar(5) NOT NULL,
  `codeJeu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `relation_consolejeuvideo`
--

INSERT INTO `relation_consolejeuvideo` (`idRelation`, `codeConsole`, `codeJeu`) VALUES
(1, 'CC2', 'jVCM8'),
(2, 'cumVU', 'jVCM8'),
(93, 'cV0rq', 'jBePr'),
(94, 'caIJB', 'jBePr'),
(95, 'cANbG', 'jBePr'),
(96, 'cHEuB', 'jBePr'),
(97, 'cCZ0F', 'jBePr'),
(100, 'caIJB', 'jrSgJ'),
(101, 'cNoct', 'jrSgJ'),
(102, 'cd9Hu', 'jrSgJ'),
(103, 'cANbG', 'jrSgJ'),
(117, 'cV0rq', 'jVjS1'),
(118, 'c5G0r', 'jVjS1'),
(119, 'cfgEu', 'jVjS1'),
(120, 'caIJB', 'jVjS1'),
(121, 'cNoct', 'jVjS1'),
(122, 'cd9Hu', 'jVjS1'),
(123, 'caIJB', 'jHnu7'),
(124, 'cNoct', 'jHnu7'),
(125, 'cd9Hu', 'jHnu7'),
(126, 'cANbG', 'jHnu7'),
(127, 'cvXyd', 'jHnu7'),
(128, 'cHEuB', 'jUBDP'),
(129, 'cCZ0F', 'jUBDP');

-- --------------------------------------------------------

--
-- Structure de la table `relation_internautejeuvideo`
--

CREATE TABLE `relation_internautejeuvideo` (
  `idRelation` int(10) UNSIGNED NOT NULL,
  `mail` varchar(50) NOT NULL,
  `codeJeu` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `relation_internautejeuvideo`
--

INSERT INTO `relation_internautejeuvideo` (`idRelation`, `mail`, `codeJeu`) VALUES
(20, 'M3@M3', 'jBePr'),
(28, 'E9@E9', 'jVjS1'),
(29, 'E10@E10', 'jVjS1'),
(31, 'E10@E10', 'jHnu7');

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
  MODIFY `id_internaute` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `jeuvideo`
--
ALTER TABLE `jeuvideo`
  MODIFY `id_jeu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `relation_consolejeuvideo`
--
ALTER TABLE `relation_consolejeuvideo`
  MODIFY `idRelation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT pour la table `relation_internautejeuvideo`
--
ALTER TABLE `relation_internautejeuvideo`
  MODIFY `idRelation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
