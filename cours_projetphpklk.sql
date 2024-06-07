-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 juin 2024 à 06:12
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

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
(7, 'jVjS1', 'Final Fantasy XIV', 'MMORPG', 'Final Fantasy XIV (ファイナルファンタジーXIV, Fainaru Fantajī Fōtīn?), Final Fantasy XIV: Online, ou plus tard Final Fantasy XIV: A Realm Reborn, est un jeu de rôle en ligne massivement multijoueur développé et édité par Square Enix. C\'est le quatorzième volet de la série principale des Final Fantasy et le second jeu de rôle massivement multijoueur développé par Square Enix après Final Fantasy XI. Ce jeu a une histoire particulière car deux versions se sont succédé : la version 1.0 dont les serveurs sont à présent fermés et Final Fantasy XIV: A Realm Reborn, ou version 2.0, qui est à présent la version de base du jeu. <br>\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Final_Fantasy_XIV\">https://fr.wikipedia.org/wiki/Final_Fantasy_XIV</a>', 'Multijoueur', 'Square Enix', 1, 'jVjS1.png', '2024-05-31'),
(8, 'jHnu7', 'Apex Legends', 'FPS', 'Apex Legends est un jeu vidéo de type battle royale développé par Respawn Entertainment et édité par Electronic Arts. Il est publié en accès gratuit le 4 février 2019 sur Microsoft Windows, PlayStation 4 et Xbox One. Le jeu sort sur Nintendo Switch le 9 mars 20212, enfin la version mobile est sortie le 17 mai 20223. Le 1er mai 2023, soit moins d\'an après son lancement, EA met fin à la version mobile d\'Apex Legends4. <br>\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Apex_Legends\">https://fr.wikipedia.org/wiki/Apex_Legends</a>', 'Multijoueur', 'Electronic Arts', 1, 'jHnu7.png', '2024-05-31'),
(9, 'jrSgJ', 'Call of Duty: Modern', 'FPS', 'Call of Duty: Modern Warfare III est un jeu vidéo de tir à la première personne développé par Sledgehammer Games et publié par Activision, sorti le 10 novembre 2023 sur PlayStation 4, PlayStation 5, Windows, Xbox One et Xbox Series1,2. Il s\'agit du vingtième jeu de la série Call of Duty et du troisième opus de la sous-série Modern Warfare rebootée, faisant office de suite à Modern Warfare II sorti en 2022.\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Call_of_Duty:_Modern_Warfare_III\">https://fr.wikipedia.org/wiki/Call_of_Duty:_Modern_Warfare_III</a>', 'Solo, multijoueur', 'Activision', 0, 'jrSgJ.jpg', '2024-05-31'),
(10, 'jBePr', 'Black Desert Online', 'MMORPG', 'Black Desert Online (검은사막) est un jeu vidéo de type MMORPG développé par Pearl Abyss (en) et édité par Kakao Games, sorti en 2015 sur Windows puis en 2019 sur Xbox One et PlayStation 4. <br>\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Black_Desert_Online\">https://fr.wikipedia.org/wiki/Black_Desert_Online</a>', 'Multijoueur', 'Kakao Games', 1, 'jBePr.png', '2024-05-31'),
(11, 'jUBDP', 'Call of Duty: Mobile', 'FPS', 'Call of Duty: Mobile (ou COD: Mobile) est un jeu vidéo mobile de tir à la première personne en free-to-play développé par TiMi Studios et publié par Activision. Il est disponible mondialement à partir du 1er octobre 2019 sur iOS et Android. Il fait partie de la série Call of Duty. <br>\r\nSource: <a href=\"https://fr.wikipedia.org/wiki/Call_of_Duty:_Mobile\">https://fr.wikipedia.org/wiki/Call_of_Duty:_Mobile</a>', 'Multijoueur', 'Activision', 1, 'jUBDP.png', '2024-05-31'),
(12, 'jgOB0', 'T1', 'TJ1', 'D1', 'F1', 'E1', 3, 'jgOB0.png', '2024-06-03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jeuvideo`
--
ALTER TABLE `jeuvideo`
  ADD PRIMARY KEY (`id_jeu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `jeuvideo`
--
ALTER TABLE `jeuvideo`
  MODIFY `id_jeu` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
