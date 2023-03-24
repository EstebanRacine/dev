-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 24 mars 2023 à 09:25
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_etudiants`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(11) NOT NULL,
  `nomContact` varchar(40) NOT NULL,
  `prenomContact` varchar(15) NOT NULL,
  `mailContact` varchar(50) NOT NULL,
  `objetContact` varchar(30) NOT NULL,
  `messageContact` text NOT NULL,
  `datetimeContact` datetime NOT NULL DEFAULT current_timestamp(),
  `traitementContact` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`idContact`, `nomContact`, `prenomContact`, `mailContact`, `objetContact`, `messageContact`, `datetimeContact`, `traitementContact`) VALUES
(2, 'Racine', 'Esteban', 'esteban.racineecole@gmail.com', 'Test mail BDD', 'qzbieulufhzbgyqduqnnnnoiéééinéio,hé udhud', '2023-03-08 14:28:02', 1),
(3, 'Testeur', 'Josh', 'josh.mail@gmail.com', 'Test liste', ' Bonjour,\r\nÉtant élèves dans votre structure je n\'ai pas pu accéder à mes données depuis un poste de la bibliothèque.\r\nPourrions nous convenir d\'un rendez-vous pour résoudre ce problème.\r\nCordialement.\r\nJosh Testeur', '2023-03-08 17:05:30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `img` varchar(200) NOT NULL,
  `ville` varchar(70) NOT NULL,
  `promo_etudiant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `prenom`, `nom`, `email`, `date_naissance`, `adresse`, `tel`, `img`, `ville`, `promo_etudiant`) VALUES
(7, 'Jamy', 'Cose', 'champi.gnon@orange.fr', '2003-04-24', '45 rue Malcombe', '0632548952', 'src/images/students/student.jpg', 'Champagnol', 2),
(8, 'Marcus', 'Tenssil', 'fourchette@couteau.com', '2002-06-15', '23 allée des matyrs', '0785965841', 'src/images/students/student.jpg', 'Paris', 0),
(9, 'Jenny', 'Ouininon', 'jsp@gmail.com', '2005-05-05', '2 chemin des bouteilles', '0621547896', 'src/images/students/student.jpg', 'Marseille', 3),
(10, 'Cassandra', 'Caufeu', 'team.bulbizarre@pokemon.jap', '2000-01-12', '9 rue Mew', '0725319423', 'src/images/students/student.jpg', 'Gardevoir', 0),
(11, 'Odin', 'Don', 'zeus.first@god.uk', '2003-05-02', '8 allée Marchand', '0685252541', 'src/images/students/student.jpg', 'Athenes', 0),
(12, 'Louis', 'Palodaura', 'good.listening@ouie.uk', '2005-06-09', '23 rue de la Musique', '0689651478', 'src/images/students/student.jpg', 'Rome', 3),
(13, 'Cole', 'Uachu', 'cacollepour.moi@gmail.com', '2003-04-01', '15 avenue Scotch', '0798154437', 'src/images/students/63f38500b6af1.jpg', 'Toronto', 0),
(14, 'Esteban', 'Le BG', 'leplusbo@gmail.com', '2004-01-08', '13 rue du Muguet', '0631687017', 'src/images/students/63f5ef338afb0.jpg', 'Besançon', 1),
(15, 'Elodie', 'Nosaure', 'raaaaaawr@boum.fr', '1845-02-13', '85 allée Stego', '0698747485', 'src/images/students/63f6205282a4e.jpg', 'Dinotown', 1),
(16, 'Pascal', 'Orie', 'giga.sportive@pompe.uk', '2004-02-27', '', '0631984525', 'src/images/students/63f638377ea73.jpg', 'Boston', 2),
(17, 'Louis', 'Dupont', 'louis.dupont@gmail.com', '2003-01-08', '', '0698745412', 'src/images/students/student.jpg', 'Paris', 1),
(18, 'Arthur', 'Ly', 'arthur.ly@gmail.com', '2004-01-04', '13 avenue des bouteilles', '0631680717', 'src/images/students/6408b568cf23b.jpg', 'Besançon', 1);

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

CREATE TABLE `horaires` (
  `id_jour` int(1) NOT NULL,
  `ouvertureMatin` varchar(5) DEFAULT NULL,
  `fermetureMatin` varchar(5) DEFAULT NULL,
  `ouvertureApMidi` varchar(5) DEFAULT NULL,
  `fermetureApMidi` varchar(5) DEFAULT NULL,
  `lib_jour` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `horaires`
--

INSERT INTO `horaires` (`id_jour`, `ouvertureMatin`, `fermetureMatin`, `ouvertureApMidi`, `fermetureApMidi`, `lib_jour`) VALUES
(1, '08h00', '12h00', '14h00', '17h30', 'Lundi'),
(2, '08h00', '12h00', '14h00', '17h30', 'Mardi'),
(3, '08h00', '12h00', NULL, NULL, 'Mercredi'),
(4, '08h00', '12h00', '14h00', '17h30', 'Jeudi'),
(5, '08h00', '12h00', '14h00', '17h30', 'Vendredi'),
(6, NULL, NULL, NULL, NULL, 'Samedi'),
(7, NULL, NULL, NULL, NULL, 'Dimanche');

-- --------------------------------------------------------

--
-- Structure de la table `promotions`
--

CREATE TABLE `promotions` (
  `id_promo` int(11) NOT NULL,
  `nom_promo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `promotions`
--

INSERT INTO `promotions` (`id_promo`, `nom_promo`) VALUES
(1, 'SIO1'),
(2, '2nd4'),
(3, 'Term 3');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `nomUser` varchar(30) NOT NULL,
  `prenomUser` varchar(30) NOT NULL,
  `loginUser` varchar(30) NOT NULL,
  `mdpUser` varchar(60) NOT NULL,
  `accesAdmin` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`nomUser`, `prenomUser`, `loginUser`, `mdpUser`, `accesAdmin`) VALUES
('Shin', 'Higaku', 'higakus', '$2y$10$3JZ.FNiZIl4KGR/.qYhu1.8bzx7JdAUYonKANrFmf/Dc9cE494GkW', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ETUDIANT_PROMOTION` (`promo_etudiant`);

--
-- Index pour la table `horaires`
--
ALTER TABLE `horaires`
  ADD PRIMARY KEY (`id_jour`);

--
-- Index pour la table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id_promo`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`loginUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `horaires`
--
ALTER TABLE `horaires`
  MODIFY `id_jour` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants` FOREIGN KEY (`promo_etudiant`) REFERENCES `promotions` (`id_promo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
