-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 05, 2023 at 02:06 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aeeni`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(50) NOT NULL,
  `nom_complet` varchar(255) NOT NULL,
  `parcours` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`id`, `matricule`, `nom_complet`, `parcours`, `sexe`, `email`, `mdp`) VALUES
(1, '1443HF', 'RAKOTOHARILALA Kaloina Alicia', 'L2 IG', 'féminin', 'rakotoharilalakaloinaalicia@gmail.com', 'IG2021'),
(2, '2730', 'RASOLOFOMANANA Diamondra Ny Aina', 'L2 GB', 'féminin', 'rasolofomananadiamondranyaina@gmail.com', 'GB2021'),
(3, '2398', 'RAZAFITSOTRA Heriniaina Yonnih', 'L2 GB', 'masculin', 'razafitsotraheriniaina@gmail.com', 'GB2020'),
(5, '2611', 'TOTOZAFY Safidy Mendrika', 'L2 SR', 'féminin', 'totozafysafidymendrika@gmail.com', 'SR2021');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `tag` varchar(100) NOT NULL,
  `date_envoi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_mofid` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_et` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_et` (`id_et`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reponses`
--

DROP TABLE IF EXISTS `reponses`;
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` text NOT NULL,
  `date_envoi` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_etudiant` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_etudiant` (`id_etudiant`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`id_et`) REFERENCES `etudiant` (`id`);

--
-- Constraints for table `reponses`
--
ALTER TABLE `reponses`
  ADD CONSTRAINT `reponses_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiant` (`id`),
  ADD CONSTRAINT `reponses_ibfk_2` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
