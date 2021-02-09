-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 06 Janvier 2016 à 00:11
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bmakendi`
--

-- --------------------------------------------------------

--
-- Structure de la table `appeler`
--

CREATE TABLE IF NOT EXISTS `appeler` (
  `numMag` int(2) NOT NULL DEFAULT '0',
  `numCoursier` char(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`numMag`,`numCoursier`),
  KEY `numCoursier` (`numCoursier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `appeler`
--

INSERT INTO `appeler` (`numMag`, `numCoursier`) VALUES
(50, '0624545241'),
(10, '0635417781'),
(10, '0674521457'),
(50, '0714597524');

-- --------------------------------------------------------

--
-- Structure de la table `bouquet`
--

CREATE TABLE IF NOT EXISTS `bouquet` (
  `numBouquet` int(4) NOT NULL DEFAULT '0',
  `modele` varchar(30) DEFAULT NULL,
  `taille` char(1) DEFAULT NULL,
  `prix` int(3) DEFAULT NULL,
  `photo` varchar(40) DEFAULT NULL,
  `numMag` int(2) DEFAULT NULL,
  PRIMARY KEY (`numBouquet`),
  KEY `numMag` (`numMag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `bouquet`
--

INSERT INTO `bouquet` (`numBouquet`, `modele`, `taille`, `prix`, `photo`, `numMag`) VALUES
(1, 'Salsa', 'S', 43, 'images/salsa.png', 10),
(2, 'Romantique', 'L', 80, 'images/romantique.png', 1),
(3, 'Brise hivernale', 'L', 70, 'images/hivernale.png', 10),
(4, 'Estivale', 'M', 59, 'images/estivale.png', 10),
(6, 'Reveillon', 'L', 80, 'images/reveillon.png', 1),
(7, 'Noel', 'M', 80, 'images/noel.png', 10),
(8, 'Sentiment', 'S', 48, 'images/sentiment.png', 50),
(57, 'Boudoir', 'M', 71, 'images/boudoir.png', 50);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `numCli` int(6) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `adresseCli` varchar(50) DEFAULT NULL,
  `numTel` char(10) DEFAULT NULL,
  `numClub` int(6) DEFAULT NULL,
  PRIMARY KEY (`numCli`),
  KEY `numClub` (`numClub`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`numCli`, `nom`, `prenom`, `adresseCli`, `numTel`, `numClub`) VALUES
(1, 'MAKENDI', 'Bryan', '36 rue des pommes 77500 Chelles', '0765842705', 1),
(2, 'JARRY', 'Kevin', '55 impasse des pétunias 23400 Bourganeuf', '0664742694', 2),
(3, 'MARTIN', 'Eric', '32 rue du cinéma 35000 Rennes', '0671586324', 3),
(4, 'TRONCHET', 'Lucien', '55 impasse des pétunias 56400 Auray', '0745125784', 4),
(5, 'JAURES', 'Jean', '37 rue des chameaux 93370 Montfermeil', '0656548854', 5),
(6, 'GRANFRERE', 'Pascal', '78 rue des pyramides 13000 Marseille', '0656548854', NULL),
(7, 'Zoulou', 'Gauthier', '50 allÃ©e de la Mer noire', NULL, 21),
(8, 'Makendi', 'Bryan', '23 impasse Andre Clement 77500 Chelles', NULL, 22);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `numClub` int(6) NOT NULL AUTO_INCREMENT,
  `mdp` text,
  `identifiant` varchar(20) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  PRIMARY KEY (`numClub`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `club`
--

INSERT INTO `club` (`numClub`, `mdp`, `identifiant`, `email`, `nom`, `prenom`, `adresse`, `telephone`) VALUES
(1, 'tototata77', 'lapin77', 'bryan.makendi@gmail.com', 'Makendi', 'Bryan', '23 impasse Andre Clement 77500 Chelles', '616402174'),
(2, 'camembert3', 'genie23', 'bryan.makendi@gmail.com', 'Makendi', 'Bryan', '23 impasse Andre Clement 77500 Chelles', '616402174'),
(3, 'banana35', 'qsdfg35', 'bryan.makendi@gmail.com', 'Makendi', 'Bryan', '23 impasse Andre Clement 77500 Chelles', '616402174'),
(4, 'original56', 'azerty56', 'bryan.makendi@gmail.com', 'Makendi', 'Bryan', '23 impasse Andre Clement 77500 Chelles', '616402174'),
(5, 'jauresjean', 'bisounous93', 'bryan.makendi@gmail.com', 'Makendi', 'Bryan', '23 impasse Andre Clement 77500 Chelles', '616402174'),
(19, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'testeur', 'testonstous@gmail.com', 'Testeur', 'Testo', '50 rue des testeurs', '0780256412'),
(20, '7162c7aed8019cfa539edc5997dfc4ceb5e7cfdb', 'kjarry', 'kevin.ja@hotmail.fr', 'JARRY', 'Kevin', '26 rue des Vieilles Fourches', ''),
(21, 'fbe2b1ad416b7e3251086de11ad56d27ec6f72a3', 'zou', 'zoulou@waigro.fr', 'Zoulou', 'Gauthier', '50 allÃ©e de la Mer noire', ''),
(22, '0a3ba1af216659500dd8f41e29f3979f42452870', 'hocloud', 'bryan.makendi@gmail.com', 'Makendi', 'Bryan', '23 impasse Andre Clement 77500 Chelles', '0616402174');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `numCommande` char(15) NOT NULL DEFAULT '',
  `dateEnvoi` date DEFAULT NULL,
  `codeConf` varchar(15) DEFAULT NULL,
  `numBouquet` int(4) DEFAULT NULL,
  `numCli` int(6) DEFAULT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`numCommande`),
  KEY `numBouquet` (`numBouquet`),
  KEY `numCli` (`numCli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`numCommande`, `dateEnvoi`, `codeConf`, `numBouquet`, `numCli`, `texte`) VALUES
('7BLSQC2VR8A4K9O', '2016-02-03', 'gjr4oepfgq78i71', 1, 8, 'Aucun message'),
('AGEGB4777ZADQBF', '2015-12-05', NULL, 57, 4, ''),
('AVGFHTTHY562LKM', '2016-01-04', NULL, 1, 1, ''),
('AYFETYFZ45664AZ', '2015-11-03', NULL, 57, 3, ''),
('BQHFTG5548POUZA', '2015-12-29', NULL, 1, 2, ''),
('OCS4A8RVBK97L2Q', '2016-09-27', 'jgefpgrq78o714i', 3, 8, 'VASY');

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

CREATE TABLE IF NOT EXISTS `composer` (
  `numBouquet` int(4) NOT NULL DEFAULT '0',
  `numFleur` int(3) NOT NULL DEFAULT '0',
  `quantite` int(3) DEFAULT NULL,
  PRIMARY KEY (`numBouquet`,`numFleur`),
  KEY `numFleur` (`numFleur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `composer`
--

INSERT INTO `composer` (`numBouquet`, `numFleur`, `quantite`) VALUES
(1, 2, 10),
(1, 3, 2),
(1, 4, 5),
(2, 1, 10),
(2, 4, 10),
(2, 6, 10),
(2, 8, 3),
(2, 9, 10),
(57, 1, 20),
(57, 2, 20),
(57, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `coursier`
--

CREATE TABLE IF NOT EXISTS `coursier` (
  `numCoursier` char(10) NOT NULL DEFAULT '',
  `typeCoursier` varchar(11) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`numCoursier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `coursier`
--

INSERT INTO `coursier` (`numCoursier`, `typeCoursier`, `nom`, `prenom`) VALUES
('0624545241', 'indépendant', 'MELON', 'Herbert'),
('0635417781', 'indépendant', 'RACHID', 'John'),
('0674521457', 'chronopost', NULL, NULL),
('0714597524', 'chronopost', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `destinataire`
--

CREATE TABLE IF NOT EXISTS `destinataire` (
  `numDest` char(10) NOT NULL DEFAULT '',
  `adrDest` varchar(50) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`numDest`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `destinataire`
--

INSERT INTO `destinataire` (`numDest`, `adrDest`, `nom`, `prenom`) VALUES
('0656447424', '36 rue des pommes 77500 Chelles', 'MAKENDI', 'Bryan'),
('0672465479', '3 bis allée des cailloux 78430 Louveciennes', 'MALABAR', 'Robert'),
('0725452114', '54 rue du général Leclerc 35000 Rennes', 'JARRY', 'Denis'),
('0761511548', '50 allÃ©e des faucheurs 77500 Chelles', 'Jarry', 'Kevin'),
('0915467896', 'ololol rue du phone', 'Ryja', 'Kevin');

-- --------------------------------------------------------

--
-- Structure de la table `fleur`
--

CREATE TABLE IF NOT EXISTS `fleur` (
  `numFleur` int(3) NOT NULL DEFAULT '0',
  `type` varchar(15) DEFAULT NULL,
  `couleur` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`numFleur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fleur`
--

INSERT INTO `fleur` (`numFleur`, `type`, `couleur`) VALUES
(1, 'rose', 'rouge'),
(2, 'rose', 'blanche'),
(3, 'orchidée', 'jaune'),
(4, 'tulipe', 'rouge'),
(5, 'tulipe', 'jaune'),
(6, 'pétunia', 'violet'),
(7, 'pétunia', 'blanc'),
(8, 'orchidée', 'blanche'),
(9, 'jonquille', 'jaune');

-- --------------------------------------------------------

--
-- Structure de la table `livrer`
--

CREATE TABLE IF NOT EXISTS `livrer` (
  `numDest` char(10) NOT NULL DEFAULT '',
  `numCoursier` char(10) NOT NULL DEFAULT '',
  `numCommande` char(15) NOT NULL DEFAULT '',
  `situation` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`numDest`,`numCoursier`,`numCommande`),
  KEY `numCoursier` (`numCoursier`),
  KEY `numCommande` (`numCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livrer`
--

INSERT INTO `livrer` (`numDest`, `numCoursier`, `numCommande`, `situation`) VALUES
('0656447424', '0635417781', 'AVGFHTTHY562LKM', NULL),
('0672465479', '0624545241', 'AGEGB4777ZADQBF', 'en cours de livraison'),
('0672465479', '0624545241', 'AYFETYFZ45664AZ', 'livré'),
('0725452114', '0674521457', 'BQHFTG5548POUZA', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `magasin`
--

CREATE TABLE IF NOT EXISTS `magasin` (
  `numMag` int(2) NOT NULL DEFAULT '0',
  `nomMag` varchar(20) DEFAULT NULL,
  `adrMag` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`numMag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `magasin`
--

INSERT INTO `magasin` (`numMag`, `nomMag`, `adrMag`) VALUES
(1, 'Hugo Fleurs', '3 rue du porc 13000 Marseille'),
(10, 'Fleurs du monde', '52 rue des cités 77360 Vaires-sur-marne'),
(50, 'Luisa Fleurs', '35 rue du parc 56300 Pontivy');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appeler`
--
ALTER TABLE `appeler`
  ADD CONSTRAINT `appeler_ibfk_1` FOREIGN KEY (`numMag`) REFERENCES `magasin` (`numMag`),
  ADD CONSTRAINT `appeler_ibfk_2` FOREIGN KEY (`numCoursier`) REFERENCES `coursier` (`numCoursier`);

--
-- Contraintes pour la table `bouquet`
--
ALTER TABLE `bouquet`
  ADD CONSTRAINT `bouquet_ibfk_1` FOREIGN KEY (`numMag`) REFERENCES `magasin` (`numMag`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`numClub`) REFERENCES `club` (`numClub`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`numBouquet`) REFERENCES `bouquet` (`numBouquet`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`numCli`) REFERENCES `client` (`numCli`);

--
-- Contraintes pour la table `composer`
--
ALTER TABLE `composer`
  ADD CONSTRAINT `composer_ibfk_1` FOREIGN KEY (`numBouquet`) REFERENCES `bouquet` (`numBouquet`),
  ADD CONSTRAINT `composer_ibfk_2` FOREIGN KEY (`numFleur`) REFERENCES `fleur` (`numFleur`);

--
-- Contraintes pour la table `livrer`
--
ALTER TABLE `livrer`
  ADD CONSTRAINT `livrer_ibfk_1` FOREIGN KEY (`numDest`) REFERENCES `destinataire` (`numDest`),
  ADD CONSTRAINT `livrer_ibfk_2` FOREIGN KEY (`numCoursier`) REFERENCES `coursier` (`numCoursier`),
  ADD CONSTRAINT `livrer_ibfk_3` FOREIGN KEY (`numCommande`) REFERENCES `commande` (`numCommande`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
