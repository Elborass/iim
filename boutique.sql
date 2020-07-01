-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 29, 2020 at 02:58 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date_enregistrement`, `etat`) VALUES
(1, 6, 118, '2020-05-26 11:11:06', 'en cours de traitement'),
(2, 6, 118, '2020-05-26 12:55:20', 'en cours de traitement'),
(3, 6, 267, '2020-05-26 14:13:13', 'en cours de traitement');

-- --------------------------------------------------------

--
-- Table structure for table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(3) NOT NULL,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_produit`, `quantite`, `prix`) VALUES
(1, 2, 7, 2, 59),
(2, 3, 2, 2, 15),
(3, 3, 8, 3, 79);

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(60) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(6, 'samih', '$2y$10$Emwm0Vo6whxbY55zelx9NusexdCgr5yXuipACc2Y4zxtHEhzKd1Hi', 'Habbani', 'Samih', 'samihhabbani@gmail.com', 'm', 'Soissons', 02200, 'rue d\'edouard phillipe', 2),
(7, 'david', '$2y$10$bqrclhf5tUM6kNEeRGSDs.5tzhunNqfMeiWYKYO3X9DBXa86Idmv.', 'david', 'cohen', 'samihhabbani@gmail.com', 'm', 'paris', 75020, 'rue de l\'élysée', 2),
(8, 'admin', '$2y$10$kIAEVIcwU6Sni36nT2CPB.KOSB4EktWUrg63YY1lXzW/V6DHfChiK', 'Habbani', 'Samih', 'samihhabbani@gmail.com', 'm', 'Soissons', 02200, 'rue d\'edouard phillipe', 1),
(9, 'natalia', '$2y$10$CnLXhliw4tYzmBNUItu.V.DsUmmnI1Lr79zqNGAyLsoyDvp4HmpsS', 'Fabiano', 'Natalia', 'natalia@gmail.com', 'f', 'Houdan', 78550, '13 rue Saint-Mathieu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(1, '11-d-23', 'tshirt', 'Tshirt Col V', 'Tee-shirt en coton flammé liseré contrastant pour femme', 'bleu foncé', 'M', 'f', '', 2011, 101),
(2, '66-f-15', 'tshirt', 'Tshirt Col V rouge', 'c\'est vraiment un super tshirt en soir&eacute;e !', 'rouge', 'S', 'f', 'http://localhost:8080/php/boutique/photo/66-f-15_rouge.png', 151, 21),
(3, '88-g-77', 'tshirt', 'Tshirt Col rond vert', 'Il vous faut ce tshirt Made In France !!!', 'vert', 'L', 'm', 'http://localhost:8080/php/boutique/photo/88-g-77_vert.png', 29, 56),
(4, '55-b-38', 'tshirt', 'Tshirt jaune', 'le jaune reviens &agrave; la mode, non? :-)', 'jaune', 'S', 'm', 'http://localhost:8080/php/boutique/photo/55-b-38_jaune.png', 20, -4),
(5, '31-p-33', 'tshirt', 'Tshirt noir original', 'voici un tshirt noir tr&egrave;s original :p', 'noir', 'XL', 'm', 'http://localhost:8080/php/boutique/photo/31-p-33_noir.jpg', 25, 73),
(6, '56-a-65', 'chemise', 'Chemise Blanche', 'Les chemises c\'est bien mieux que les tshirts', 'blanc', 'L', 'm', 'http://localhost:8080/php/boutique/photo/56-a-65_chemiseblanchem.jpg', 49, 66),
(7, '63-s-63', 'chemise', 'Chemise Noir', 'Comme vous pouvez le voir c\'est une chemise noir...', 'noir', 'M', 'm', 'http://localhost:8080/php/boutique/photo/63-s-63_chemisenoirm.jpg', 59, 113),
(8, '77-p-79', 'pull', 'Pull gris', 'Pull gris pour l\'hiver', 'gris', 'XL', 'f', 'http://localhost:8080/php/boutique/photo/77-p-79_pullgrism2.jpg', 79, 92),
(45, 'ma_reference_1', 'tshirt', 'super tshirt', 'Super t\'shirt d\'été', 'noire', 'xs', 'm', '', 39, 33),
(49, 'ma_reference_2', 'tshirt', 'super tshirt', 'Super t\'shirt d\'été', 'noire', 'xs', 'm', '', 39, 33),
(51, 'joanna', 'tshirt', 'jojo', 'Super t\'shirt d\'été 2', 'rouge', 'M', 'f', 'photo', 34, 1),
(52, 'sam_01', 'tshirt', 'toto', 'Tee-shirt en coton flammé liseré contrastant', 'rouge', 'M', 'm', 'photo', 45, 1),
(53, 'sam_02', 'tshirt', 'Tshirt Col V', 'Super t\'shirt d\'été 3', 'bleu', 'M', 'm', 'photo', 20, 33),
(54, 'angelique_01', 'pull', 'angèle', 'Super Angélique je te laisse tranquille pour aujourdhui c\'est promis', 'rose', 'M', 'f', 'photo', 99, 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Indexes for table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`);

--
-- Constraints for table `details_commande`
--
ALTER TABLE `details_commande`
  ADD CONSTRAINT `details_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);
