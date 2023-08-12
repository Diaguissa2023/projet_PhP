-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 05 fév. 2023 à 00:27
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `basededonnees`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL,
  `type_reservation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `type_reservation`) VALUES
(1, 'Séminaires & Réunion'),
(2, 'Séminaire résidentie'),
(3, 'Repas de groupe'),
(4, 'Cocktail et soirée d\'entreprise'),
(5, 'Location seule');

-- --------------------------------------------------------

--
-- Structure de la table `login_annonceurs`
--

CREATE TABLE `login_annonceurs` (
  `id_annonceur` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login_annonceurs`
--

INSERT INTO `login_annonceurs` (`id_annonceur`, `username`, `password`, `email`) VALUES
(6, 'Mamadou Baldé', '123', 'balde.mamadou.@sncf.fr'),
(7, 'ibrahima.ly@dassaut.fr', '123', 'ibrahima.ly@dassaut.fr');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(100) NOT NULL,
  `adresse_salle` varchar(50) NOT NULL,
  `responsable_salle` varchar(50) NOT NULL,
  `mail_contact_salle` varchar(50) NOT NULL,
  `telephone_salle` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(250) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `adresse_salle`, `responsable_salle`, `mail_contact_salle`, `telephone_salle`, `description`, `price`, `image`, `category`) VALUES
(3, 'Hôtel ibs: Salle Merlin (Séminaires & Réunion)', '645 avenue du Toulouse, 34075, Montpellier, France', 'Monsieur Dupond Louis', 'dupond.louis@ibis.com', '+33 04 26 87 78 52', 'Séminaires & Réunion:\r\nEvènements formels en journée nécessitant des salles toutes équipées ainsi qu’un service de restauration.\r\nForfait :\r\nDemi-journée\r\n1 salle de réunion pour la demi-journée + 1 collation + déjeuner\r\nJournée complète\r\n1 salle de réunion pour la journée + 2 collations + 1 déjeuner\r\n\r\n', 65, 'Ibis_red.png', 1),
(4, 'Hôtel ibs: Salle Lavalaine (Séminaire résidentiels)', '645 avenue du Toulouse, 34075, Montpellier, France', 'Monsieur Pierre Alexandre', 'pierre.alexandre@ibis.com', '+33 04 33 56 78 65', 'Séminaires Résidentiels: Séminaires avec hébergement sur place\r\nForfait :\r\nSéminaires avec hébergement:\r\n1 salle de réunion pour la journée + 2 collations + 1 petit-déjeuner + 1 déjeuner + 1 dîner + 1 nuit en chambre simple.\r\n\r\n', 46, 'Ibis_bleu.jpg', 2),
(5, 'Hôtel Novotel: Salle de la cantine (Repas de groupe)', '645 avenue du marseille, 34075, Montpellier, Franc', 'Monsieur Fernandez Alexandre', 'fernandez.louis@novotel.com', '+33 42 66 32 85 45', 'Repas de groupe:\r\nForfait:\r\nDéjeuner assis:\r\nEntrée + Plat + Dessert + Eau & Café\r\n\r\nDîner assis:\r\nEntrée + Plat + Dessert + Eau & Café\r\n\r\nPour aller avec votre style de vie actif, ce repas vous apportera toute l\'énergie nécessaire pour votre journée !', 145, 'novo.jpg', 3),
(6, 'RbNb: Salle Louis (Cocktail et soirée d\'entreprise)', '645 avenue du Jean Mermoz, 34075, Montpellier, Fra', 'Monsieur Xavier Martin', 'martin.javier@ibis.m', '+33 42 56 32 12 75', 'Cocktail et soirée d\'entrepris:\r\nEvènements formels en journée nécessitant des salles toutes équipées ainsi qu’un service de restauration.\r\n\r\nForfait:\r\nCocktail:\r\n1 espace de réception pour la soirée + 1 cocktail comprenant 15 pièces par pers. + 1 bouteille de vin pour 3 pers.\r\n\r\nSoirée dansante:\r\n1 espace de piste de danse pour la soirée + 1 cocktail comprenant 15 pièces par pers. + 1 bouteille de vin pour 3 pers. + 2 verres d\'alcool par pers.', 75, 'rbnb.png', 4),
(7, 'Hôtel Radisson:(Location seule)', '45 rue de la victoire, 34056, Montpellier', 'Monsieur Guillome Blezz', 'guilom.bz@radisson.fr', '+33 04 56 32 56 58', 'Location seule: Salle Séminaire\r\n\r\nNous sommes ouverts 24/24. Profitez de votre journée et de vos aventures.\r\nA vos marques, prêts, partez !\r\nProfitez d\'activités sportives gratuites et malines à l\'extérieur mais aussi à l\'intérieur de l\'hôtel. Demandez à notre staff nos plans de running ou nos équipements sportifs.', 0, 'Radisson_Blu.jpg', 5),
(8, 'Grand Hôtel: (Séminaires & Réunion)', '653 Boulevard Edouard talier, 34070', 'Monsieur Fabien Peto', 'fabien.tito@gran.hotel.fr', '+33 01 25 32 12 58', 'Le Grand Hôtel d\'Ajaccio et Continental.\r\n\r\nSéminaires & Réunion:\r\nEvènements formels en journée nécessitant des salles toutes équipées ainsi qu’un service de restauration.\r\nForfait :\r\nDemi-journée\r\n1 salle de réunion pour la demi-journée + 1 collation + déjeuner\r\nJournée complète\r\n1 salle de réunion pour la journée + 2 collations + 1 déjeuner', 105, 'gh.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `societe_client`
--

CREATE TABLE `societe_client` (
  `id_client` int(11) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `nom_client` varchar(50) NOT NULL,
  `responsable_client` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `nombre_personne` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `societe_client`
--

INSERT INTO `societe_client` (`id_client`, `mail`, `mot_de_passe`, `nom_client`, `responsable_client`, `telephone`, `date`, `nombre_personne`) VALUES
(17, 'martin@orange.fr', 'azerty', 'Orange', 'Olivier Martin', '07 67 87 78 52', '2023-01-31', 50),
(18, 'amadou@amazone.fr', '1234', 'Amazone', 'El Mehdi Mghirat', '04 56 32 58 63', '2023-01-30', 30),
(19, 'ibrahima.ly@dassaut.fr', '123', 'Dassault systèmes', 'Ibrahima LY', '04 32 56 25 85', '2023-02-02', 100),
(20, 'mamadou.saliou@bouygues.fr', '123', 'Bouygues France', 'Mamadou Saliou Baldé', '04 87 52 36 65', '2023-03-12', 20),
(21, 'mohamed.achraf@sfr.fr', '456', 'SFR France', 'Mohamed Achraf Tafranti', '04 86 72 32 56', '2023-03-10', 80);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `login_annonceurs`
--
ALTER TABLE `login_annonceurs`
  ADD PRIMARY KEY (`id_annonceur`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_salle` (`id_salle`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`),
  ADD KEY `id_categorie` (`category`);

--
-- Index pour la table `societe_client`
--
ALTER TABLE `societe_client`
  ADD PRIMARY KEY (`id_client`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `login_annonceurs`
--
ALTER TABLE `login_annonceurs`
  MODIFY `id_annonceur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `societe_client`
--
ALTER TABLE `societe_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `societe_client` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `salle_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
