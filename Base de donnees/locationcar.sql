-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 nov. 2023 à 01:40
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `locationcar`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2023-11-25 20:48:36');

-- --------------------------------------------------------

--
-- Structure de la table `tblcontactusinfo`
--

DROP TABLE IF EXISTS `tblcontactusinfo`;
CREATE TABLE IF NOT EXISTS `tblcontactusinfo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Address` tinytext,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'IAI Libreville Gabon', 'blebonheur69@gmail.com', '076594648');

-- --------------------------------------------------------

--
-- Structure de la table `tblcontactusquery`
--

DROP TABLE IF EXISTS `tblcontactusquery`;
CREATE TABLE IF NOT EXISTS `tblcontactusquery` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(1, 'Kunal ', 'kunal@gmail.com', '7977779798', 'I want to know you brach in Chandigarh?', '2020-07-07 09:34:51', 1),
(2, 'Le Bonheur BAMBO', 'lebonheurbambo6@gmail.com', '076594648', 'bonjour monsieur', '2023-11-28 08:47:43', 1),
(3, 'Le Bonheur BAMBO', 'lebonheurbambo6@gmail.com', '076594648', 'bonjour monsieur', '2023-11-28 08:52:29', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tblemployes`
--

DROP TABLE IF EXISTS `tblemployes`;
CREATE TABLE IF NOT EXISTS `tblemployes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `sexe` varchar(150) NOT NULL,
  `post` varchar(150) NOT NULL,
  `numpieceidentite` varchar(150) NOT NULL,
  `numphone` varchar(150) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblmarques`
--

DROP TABLE IF EXISTS `tblmarques`;
CREATE TABLE IF NOT EXISTS `tblmarques` (
  `id` int NOT NULL AUTO_INCREMENT,
  `NomMarque` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `DateCreation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DateMiseJour` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblmarques`
--

INSERT INTO `tblmarques` (`id`, `NomMarque`, `DateCreation`, `DateMiseJour`) VALUES
(9, 'Mushibushi', '2023-11-26 15:09:59', NULL),
(10, 'TOYOTA', '2023-11-28 01:33:50', NULL),
(11, 'Pajero', '2023-11-28 20:48:58', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tblpages`
--

DROP TABLE IF EXISTS `tblpages`;
CREATE TABLE IF NOT EXISTS `tblpages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `PageName` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '',
  `detail` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblpages`
--

INSERT INTO `tblpages` (`id`, `PageName`, `type`, `detail`) VALUES
(1, 'Terms and Conditions', 'terms', '										<p align=\"justify\"><font size=\"2\"><strong><font color=\"#990000\">(1) ACCEPTANCE OF TERMS</font><br><br></strong>Welcome to Yahoo! India. 1Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: <a href=\"http://in.docs.yahoo.com/info/terms/\">http://in.docs.yahoo.com/info/terms/</a>. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </font></p>\r\n<p align=\"justify\"><font size=\"2\">Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </font><a href=\"http://in.docs.yahoo.com/info/terms/\"><font size=\"2\">http://in.docs.yahoo.com/info/terms/</font></a><font size=\"2\">. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </font></p>\r\n<p align=\"justify\"><font size=\"2\">Welcome to Yahoo! India. Yahoo Web Services India Private Limited Yahoo\", \"we\" or \"us\" as the case may be) provides the Service (defined below) to you, subject to the following Terms of Service (\"TOS\"), which may be updated by us from time to time without notice to you. You can review the most current version of the TOS at any time at: </font><a href=\"http://in.docs.yahoo.com/info/terms/\"><font size=\"2\">http://in.docs.yahoo.com/info/terms/</font></a><font size=\"2\">. In addition, when using particular Yahoo services or third party services, you and Yahoo shall be subject to any posted guidelines or rules applicable to such services which may be posted from time to time. All such guidelines or rules, which maybe subject to change, are hereby incorporated by reference into the TOS. In most cases the guides and rules are specific to a particular part of the Service and will assist you in applying the TOS to that part, but to the extent of any inconsistency between the TOS and any guide or rule, the TOS will prevail. We may also offer other services from time to time that are governed by different Terms of Services, in which case the TOS do not apply to such other services if and to the extent expressly excluded by such different Terms of Services. Yahoo also may offer other services from time to time that are governed by different Terms of Services. These TOS do not apply to such other services that are governed by different Terms of Service. </font></p>\r\n										'),
(2, 'Privacy Policy', 'privacy', '<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat</span>'),
(3, 'About Us ', 'aboutus', '										<div><div style=\"\"><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.3333px;\">Nous proposons une flotte variée de voitures, allant de la compacte. Tous nos véhicules disposent de la climatisation, d\'une direction assistée, de vitres électriques. Tous nos véhicules sont achetés et entretenus uniquement chez des concessionnaires officiels. Les voitures à transmission automatique sont disponibles dans chaque classe de réservation. Comme nous ne sommes affiliés à aucun constructeur automobile en particulier, nous sommes en mesure de proposer une variété de marques et de modèles de véhicules à louer aux clients.</span></div><div style=\"\"><span style=\"color: rgb(51, 51, 51); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 13.3333px;\">Notre mission est d\'être reconnu comme le leader mondial de la location de voitures pour les entreprises et les secteurs public et privé en établissant des partenariats avec nos clients pour fournir les solutions de location de taxi les meilleures et les plus efficaces et pour atteindre l\'excellence du service.</span></div></div>\r\n										\r\n										'),
(11, 'FAQs', 'faqs', '																														<span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Address------Test &nbsp; &nbsp;dsfdsfds</span>');

-- --------------------------------------------------------

--
-- Structure de la table `tblparc`
--

DROP TABLE IF EXISTS `tblparc`;
CREATE TABLE IF NOT EXISTS `tblparc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `capacite` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tblreservation`
--

DROP TABLE IF EXISTS `tblreservation`;
CREATE TABLE IF NOT EXISTS `tblreservation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `NumReservation` bigint DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `VehiculeId` int DEFAULT NULL,
  `DateDebut` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `DateFin` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `Status` int DEFAULT NULL,
  `DateAffichage` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateMiseajour` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblreservation`
--

INSERT INTO `tblreservation` (`id`, `NumReservation`, `Email`, `VehiculeId`, `DateDebut`, `DateFin`, `message`, `Status`, `DateAffichage`, `DateMiseajour`) VALUES
(1, 123456789, 'test@gmail.com', 1, '2020-07-07', '2020-07-09', 'What  is the cost?', 1, '2020-07-07 14:03:09', NULL),
(2, 987456321, 'test@gmail.com', 4, '2020-07-19', '2020-07-24', 'hfghg', 1, '2020-07-09 17:49:21', '2020-07-11 12:20:57'),
(3, 443891924, 'gillesjean@gmail.com', 10, NULL, NULL, 'bonjour', 1, '2023-11-28 18:00:20', NULL),
(4, 847278664, 'marckev@gmail.com', 11, '2023-11-30', '2023-12-07', 'hello', 1, '2023-11-29 06:58:12', NULL),
(5, 263824151, 'lebonheurbambo6@gmail.com', 13, '2023-12-02', '2023-12-10', 'Bonjour je veux cette voiture pour une semaine', 0, '2023-11-29 19:06:44', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tblsubscribers`
--

DROP TABLE IF EXISTS `tblsubscribers`;
CREATE TABLE IF NOT EXISTS `tblsubscribers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `SubscriberEmail` varchar(120) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblsubscribers`
--

INSERT INTO `tblsubscribers` (`id`, `SubscriberEmail`, `PostingDate`) VALUES
(6, 'bl@gmail.com', '2023-11-23 10:55:10'),
(7, 'gillesjeanclaud@gmail.com', '2023-11-27 23:20:49');

-- --------------------------------------------------------

--
-- Structure de la table `tbltestimonial`
--

DROP TABLE IF EXISTS `tbltestimonial`;
CREATE TABLE IF NOT EXISTS `tbltestimonial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `UserEmail` varchar(100) NOT NULL,
  `Testimonial` mediumtext NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbltestimonial`
--

INSERT INTO `tbltestimonial` (`id`, `UserEmail`, `Testimonial`, `PostingDate`, `status`) VALUES
(1, 'test@gmail.com', 'I am satisfied with their service great job', '2020-07-07 14:30:12', 1);

-- --------------------------------------------------------

--
-- Structure de la table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FullName` varchar(120) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `EmailId` (`EmailId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblusers`
--

INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(2, 'Balthazar Francklin', 'balthazarfrancklin@gmail.com', 'ac3e2c4e1d4bd07fb973a2ea4d250160', '066037116', NULL, NULL, NULL, '2023-11-26 00:39:47', NULL),
(3, 'Gilles Jean-Claud', 'gillesjean@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '076594696', 'Owendo', 'Libreville', 'Gabon', '2023-11-28 08:38:51', '2023-11-28 08:41:51'),
(4, 'Marck', 'marckev@gmail.com', '6334248affa9ebd8909c2511eeac2f8e', '076594696', 'LALALA', 'Libreville', 'Gabon', '2023-11-29 06:56:05', '2023-11-29 19:34:24'),
(5, 'BAMBOA Le Bonheur', 'lebonheurbambo6@gmail.com', 'cd5d56aa7c69d0224b8e7767de96d001', '066037116', 'Cité', 'Port-Gentil', 'Gabon', '2023-11-29 18:59:46', '2023-11-29 23:08:47');

-- --------------------------------------------------------

--
-- Structure de la table `tblvehicules`
--

DROP TABLE IF EXISTS `tblvehicules`;
CREATE TABLE IF NOT EXISTS `tblvehicules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `TitreVehicule` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Immatriculation` varchar(150) NOT NULL,
  `MarqueVehicule` varchar(100) NOT NULL,
  `ModelVehicule` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `PrixParJour` int DEFAULT NULL,
  `TypeCarburant` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Annee` int DEFAULT NULL,
  `NombrePlaces` int DEFAULT NULL,
  `Vimage` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Climatiseur` int DEFAULT NULL,
  `LecteurCD` int DEFAULT NULL,
  `SiegesCuir` int DEFAULT NULL,
  `DateEnrg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateMiseJour` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tblvehicules`
--

INSERT INTO `tblvehicules` (`id`, `TitreVehicule`, `Immatriculation`, `MarqueVehicule`, `ModelVehicule`, `PrixParJour`, `TypeCarburant`, `Annee`, `NombrePlaces`, `Vimage`, `Climatiseur`, `LecteurCD`, `SiegesCuir`, `DateEnrg`, `DateMiseJour`) VALUES
(11, 'Hilux', '2345BG', '11', 'Hilux', 12000, 'Diesel', 2017, 5, 'listing_img3.jpg', 1, 1, 1, '2023-11-28 23:29:01', NULL),
(12, 'Prado', '2345BG', '10', 'Prado', 10000, 'Essence', 2014, 5, '2015_Toyota_Fortuner_(New_Zealand).jpg', 1, 1, 0, '2023-11-29 01:13:09', NULL),
(13, 'RAV4', '2653BGC', '10', 'V8', 15000, 'Gazoil', 2022, 5, 'PADRO.jpg', NULL, 1, 1, '2023-11-29 06:35:45', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
