-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 08 jan. 2026 à 06:44
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `film_id` int NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `user_id`, `film_id`, `content`) VALUES
(1, 26, 1, 'Super Film !'),
(35, 26, 2, 'Je l\'ai revu'),
(29, 26, 1, 'ET OPUAIS C GENIAL\r\n'),
(31, 29, 2, 'Un super film vraiment.     '),
(34, 26, 2, 'Super film   '),
(33, 26, 2, 'Spiderfan dit nimp trop nuul  ');

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE IF NOT EXISTS `film` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `realisateur` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `duree` varchar(255) NOT NULL,
  `synopsis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `user_id`, `titre`, `realisateur`, `genre`, `duree`, `synopsis`) VALUES
(1, 0, 'Spider-Man : New Generation', 'Bob Persichetti, Peter Ramsey, Rodney Rothman', 'Animation', '117', 'C spiderman fdp'),
(2, 0, 'Blade Runner', 'Ridley Scott', 'Science-fiction, néo-noir, action, thriller', '111', '       En l\'an 2019, un ex-policier devenu détective privé, Rick Deckard, est rappelé en service pour faire la chasse à des robots d\'apparence humaine appelés \"replicants.\" Deckard doit en éliminer quatre qui se cachent à Los Angeles. La tâche n\'est pas f'),
(3, 26, 'Le Seigneur des anneaux : La Communauté de l\'anneau', 'Peter Jackson', 'Fantasy', '178', ''),
(4, 0, 'Ça', 'Andrés Muschietti', 'Épouvante-horreur,Thriller', '135', '                 dadasdwads   ');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `surname` varchar(255) NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `surname`, `mdp`, `prenom`, `nom`) VALUES
(26, 'Mr.Nashor', '$argon2i$v=19$m=65536,t=4,p=1$WFQucmNrVkx1dFgyT0VzWQ$uB0wsiT9/sVb9k4esBwObmDXl7rzk2i1ypd2o3lq/jU', 'Nashor', 'Rashan'),
(27, 'AbsoluteCinema', '$argon2i$v=19$m=65536,t=4,p=1$SlRzMDNjN2JaQmNTUmszVw$NyBmFRYTaan7Kl7Fxk/zxAxgV2KzTFe55h/BrLtw16U', 'meunerve', 'Sam'),
(29, 'Spiderfan', '$argon2i$v=19$m=65536,t=4,p=1$N2VrYkZiYlk1c3d1SjBmbA$jhf7W1M1VSZNSRY1h+/mMI3vkOj7g6zpoR0cRbnjYn8', 'destarwars', 'Luke');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
