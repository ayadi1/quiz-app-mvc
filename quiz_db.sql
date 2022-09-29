-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2022 at 02:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ASSURER`
--

CREATE TABLE `ASSURER` (
  `MLE` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `AVOIR_R`
--

CREATE TABLE `AVOIR_R` (
  `id_reponse` int(11) NOT NULL,
  `ID_QUE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `COMPETENCE`
--

CREATE TABLE `COMPETENCE` (
  `id` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `LIB_COMP` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `COMPETENCE`
--

INSERT INTO `COMPETENCE` (`id`, `id_module`, `LIB_COMP`) VALUES
(1, 1, 'comp 1'),
(2, 1, 'comp 2'),
(3, 1, 'comp 3'),
(4, 2, 'comp 4'),
(5, 2, 'comp 5'),
(6, 2, 'comp 6');

-- --------------------------------------------------------

--
-- Table structure for table `ETRE_SELECTIONNER`
--

CREATE TABLE `ETRE_SELECTIONNER` (
  `id_evaluation` int(11) NOT NULL,
  `id_reponse` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `EVALUATION`
--

CREATE TABLE `EVALUATION` (
  `id` int(11) NOT NULL,
  `id_evaluation` int(11) NOT NULL,
  `CEF` int(11) NOT NULL,
  `DATE` date DEFAULT NULL,
  `SCORE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `EXAMEN`
--

CREATE TABLE `EXAMEN` (
  `id` int(11) NOT NULL,
  `id_competence` int(11) NOT NULL,
  `id_formatuer` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `EXAMEN`
--

INSERT INTO `EXAMEN` (`id`, `id_competence`, `id_formatuer`, `title`) VALUES
(1, 3, 1, 'lala'),
(2, 1, 1, 'tot');

-- --------------------------------------------------------

--
-- Table structure for table `FILIERE`
--

CREATE TABLE `FILIERE` (
  `id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FILIERE`
--

INSERT INTO `FILIERE` (`id`, `label`) VALUES
(1, 'DEV'),
(2, 'GE'),
(3, 'DEV full stack');

-- --------------------------------------------------------

--
-- Table structure for table `FORMATEUR`
--

CREATE TABLE `FORMATEUR` (
  `id` int(11) NOT NULL,
  `nom` char(20) DEFAULT NULL,
  `prenom` char(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FORMATEUR`
--

INSERT INTO `FORMATEUR` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'ayadi', 'oussama', 'ayadi.oussama1', 'ayadi'),
(2, 'maach', 'hamza', 'maach.hamza', 'maach');

-- --------------------------------------------------------

--
-- Table structure for table `FORMATEUR_FILIERE`
--

CREATE TABLE `FORMATEUR_FILIERE` (
  `id_formatuer` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FORMATEUR_FILIERE`
--

INSERT INTO `FORMATEUR_FILIERE` (`id_formatuer`, `id_filiere`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `GROUPE`
--

CREATE TABLE `GROUPE` (
  `id` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `GROUPE`
--

INSERT INTO `GROUPE` (`id`, `id_filiere`) VALUES
(1, 1),
(4, 1),
(3, 2),
(5, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `MODULE`
--

CREATE TABLE `MODULE` (
  `id` int(11) NOT NULL,
  `label` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `MODULE`
--

INSERT INTO `MODULE` (`id`, `label`) VALUES
(1, 'mod 1'),
(2, 'mod 2'),
(3, 'mod 3'),
(4, 'mod 4');

-- --------------------------------------------------------

--
-- Table structure for table `ModuleAssurer`
--

CREATE TABLE `ModuleAssurer` (
  `id_formatuer` int(11) NOT NULL,
  `id_module` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ModuleAssurer`
--

INSERT INTO `ModuleAssurer` (`id_formatuer`, `id_module`, `id_group`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 2, 3),
(1, 3, 2),
(1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `POUR`
--

CREATE TABLE `POUR` (
  `id_evaluation` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `QUESTION`
--

CREATE TABLE `QUESTION` (
  `id` int(11) NOT NULL,
  `id_reponse` int(11) DEFAULT NULL,
  `QUESTION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `REPONSE`
--

CREATE TABLE `REPONSE` (
  `id` int(11) NOT NULL,
  `REPONSE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `STAGIAIRE`
--

CREATE TABLE `STAGIAIRE` (
  `id` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `STAGIAIRE`
--

INSERT INTO `STAGIAIRE` (`id`, `id_group`, `nom`, `email`, `password`) VALUES
(1, 1, 'oussama', 'ayadi.oussama1', 'ayadi'),
(2, 1, 'maach', 'maach.hamza', 'maach');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ASSURER`
--
ALTER TABLE `ASSURER`
  ADD PRIMARY KEY (`MLE`,`id_module`,`id_group`),
  ADD KEY `FK_ASSURER` (`id_group`),
  ADD KEY `FK_ASSURER3` (`id_module`);

--
-- Indexes for table `AVOIR_R`
--
ALTER TABLE `AVOIR_R`
  ADD PRIMARY KEY (`id_reponse`,`ID_QUE`),
  ADD KEY `FK_AVOIR_R` (`ID_QUE`);

--
-- Indexes for table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_COMPOSER` (`id_module`);

--
-- Indexes for table `ETRE_SELECTIONNER`
--
ALTER TABLE `ETRE_SELECTIONNER`
  ADD PRIMARY KEY (`id_evaluation`,`id_reponse`,`id_question`),
  ADD KEY `FK_ETRE_SELECTIONNER` (`id_question`),
  ADD KEY `FK_ETRE_SELECTIONNER3` (`id_reponse`);

--
-- Indexes for table `EVALUATION`
--
ALTER TABLE `EVALUATION`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DE` (`id_evaluation`),
  ADD KEY `FK_FAIRE` (`CEF`);

--
-- Indexes for table `EXAMEN`
--
ALTER TABLE `EXAMEN`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_formatuer` (`id_formatuer`),
  ADD KEY `id_competence` (`id_competence`);

--
-- Indexes for table `FILIERE`
--
ALTER TABLE `FILIERE`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FORMATEUR`
--
ALTER TABLE `FORMATEUR`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `FORMATEUR_FILIERE`
--
ALTER TABLE `FORMATEUR_FILIERE`
  ADD PRIMARY KEY (`id_formatuer`,`id_filiere`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `GROUPE`
--
ALTER TABLE `GROUPE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_INCLURE` (`id_filiere`);

--
-- Indexes for table `MODULE`
--
ALTER TABLE `MODULE`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ModuleAssurer`
--
ALTER TABLE `ModuleAssurer`
  ADD PRIMARY KEY (`id_formatuer`,`id_module`,`id_group`),
  ADD KEY `id_group` (`id_group`),
  ADD KEY `id_module` (`id_module`);

--
-- Indexes for table `POUR`
--
ALTER TABLE `POUR`
  ADD PRIMARY KEY (`id_evaluation`,`id_question`),
  ADD KEY `FK_POUR` (`id_question`);

--
-- Indexes for table `QUESTION`
--
ALTER TABLE `QUESTION`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AVOIR_RC` (`id_reponse`);

--
-- Indexes for table `REPONSE`
--
ALTER TABLE `REPONSE`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `STAGIAIRE`
--
ALTER TABLE `STAGIAIRE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_APPARTENIR` (`id_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `COMPETENCE`
--
ALTER TABLE `COMPETENCE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `EVALUATION`
--
ALTER TABLE `EVALUATION`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `EXAMEN`
--
ALTER TABLE `EXAMEN`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `GROUPE`
--
ALTER TABLE `GROUPE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `QUESTION`
--
ALTER TABLE `QUESTION`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `REPONSE`
--
ALTER TABLE `REPONSE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `EXAMEN`
--
ALTER TABLE `EXAMEN`
  ADD CONSTRAINT `EXAMEN_ibfk_2` FOREIGN KEY (`id_formatuer`) REFERENCES `FORMATEUR` (`id`),
  ADD CONSTRAINT `EXAMEN_ibfk_3` FOREIGN KEY (`id_competence`) REFERENCES `COMPETENCE` (`id`);

--
-- Constraints for table `FORMATEUR_FILIERE`
--
ALTER TABLE `FORMATEUR_FILIERE`
  ADD CONSTRAINT `FORMATEUR_FILIERE_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `FILIERE` (`id`),
  ADD CONSTRAINT `FORMATEUR_FILIERE_ibfk_2` FOREIGN KEY (`id_formatuer`) REFERENCES `FORMATEUR` (`id`);

--
-- Constraints for table `ModuleAssurer`
--
ALTER TABLE `ModuleAssurer`
  ADD CONSTRAINT `ModuleAssurer_ibfk_1` FOREIGN KEY (`id_formatuer`) REFERENCES `FORMATEUR` (`id`),
  ADD CONSTRAINT `ModuleAssurer_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `GROUPE` (`id`),
  ADD CONSTRAINT `ModuleAssurer_ibfk_3` FOREIGN KEY (`id_module`) REFERENCES `MODULE` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
