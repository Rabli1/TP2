-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 09 nov. 2024 à 20:23
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fastfood_sushi`
--
CREATE DATABASE IF NOT EXISTS `fastfood_sushi` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `fastfood_sushi`;

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `insertOrder`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertOrder` (IN `p_order_date` VARCHAR(45), IN `p_total` FLOAT, OUT `new_order_id` INT)   BEGIN
    INSERT INTO orders(order_date, total) VALUES (p_order_date, p_total);
    SET new_order_id = LAST_INSERT_ID();
END$$

--
-- Fonctions
--
DROP FUNCTION IF EXISTS `createOrderAndReturnID`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `createOrderAndReturnID` (`p_order_date` VARCHAR(45), `p_total` FLOAT) RETURNS INT  BEGIN
    DECLARE new_order_id INT;
    
    -- Appel de la procédure pour insérer et obtenir l'ID
    CALL insertOrder(p_order_date, p_total, new_order_id);
    
    -- Retourner l'ID généré
    RETURN new_order_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Urumakis'),
(2, 'Makis'),
(3, 'Nigiris'),
(4, 'Sashimis'),
(5, 'Poké bols');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `idCategory` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDCategory` (`idCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `idCategory`) VALUES
(1, 'Urumaki au thon', 'Thon et crème sure entourés d\'une feuille d\'algue et de riz vinaigré ainsi que de graines de sésame grillées.', 8.9, 'uramaki_thon.jpg', 1),
(2, 'Urumaki de thon et goberge', 'Thon et goberge ainsi que bâtonnets de concombre entouré d\'une feuille d\'algue et riz.  Pour terminer des graines de sésame grillées.', 6.5, 'urumaki_thon_goberge.jpg', 1),
(3, 'Urumaki de saumon', 'Saumon et fromage à la crème entouré d\'une feuille d\'algue, de riz vinaigré, d\'un peu de saumon et une sauce sucrée.', 10, 'urumaki_saumon.jpg', 1),
(4, 'Maki de saumon', 'Saumon, concombre contenu dans une feuille d\'algue.', 9, 'maki_saumon.jpg', 2),
(5, 'Maki de saumon et thon', 'Saumon, thon, oeuf, tobiko (caviar) et riz contenu dans une feuille d\'algue.', 10.9, 'maki_saumon_thon.webp', 2),
(6, 'Nigiri de saumon', 'Saumon crue sur une boule de riz.', 9.7, 'nigiri_saumon_1.jpg', 3),
(7, 'Nigiri de thon', 'Thon crue sur une boule de riz surmonté de caviar.', 11.4, 'nigiri_thon.jpg', 3),
(8, 'Sashimi de thon', 'Thon crue.', 12.1, 'sashimi_thon.jpg', 4),
(9, 'Sashimi de saumon', 'Saumon crue.', 10.75, 'sashimi_saumon.jpg', 4),
(10, 'Poké bol au saumon', 'Combinaison de saumon crue, concombre, mangue, goberge, avocat sur un nid de salade et riz vinaigré.  Le tout soupoudré de graines de sésame noires et d\'une sauce sucrée.', 18, 'pokebol_saumon.jpg', 5),
(34, 'Poké bowls aux thon et saumon', 'Succulent poké bowls accompagné de mandarine, avocat, riz et soupoudré de graine de sésame', 21.55, 'foodiesfeed.com_tuna-poke-close-up.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_date` varchar(45) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `orders_id` int NOT NULL,
  `items_id` int NOT NULL,
  `quantity` int DEFAULT NULL,
  PRIMARY KEY (`orders_id`,`items_id`),
  KEY `FK_oitems_items` (`items_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'Pascal', 'Rémillard', 'pascal@clg.qc.ca', '$2y$10$b5.dy8jt21S7phAOvZOTs.XudkhOAqibaKMXflE1rBwoOVOPtoDvu'),
(2, 'Luc', 'Ledoux', 'luc@clg.qc.ca', '$2y$10$b5.dy8jt21S7phAOvZOTs.XudkhOAqibaKMXflE1rBwoOVOPtoDvu'),
(3, 'Administrateur', '', 'admin@clg.qc.ca', '$2y$10$b5.dy8jt21S7phAOvZOTs.XudkhOAqibaKMXflE1rBwoOVOPtoDvu');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
