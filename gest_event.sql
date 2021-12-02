-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 déc. 2021 à 20:21
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gest_event`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

CREATE TABLE `commentaires` (
  `ID_COMMENTAIRE` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_EVENT` int(11) NOT NULL,
  `CONTENU_COM` text NOT NULL,
  `ETAT_COM` tinyint(1) NOT NULL,
  `DATE_CREATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `ID_EVENT` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `TITRE_EVENT` char(255) NOT NULL,
  `DESC_EVENT` text NOT NULL,
  `ETAT_EVENT` tinyint(1) NOT NULL,
  `START_EVENT` date NOT NULL,
  `END_EVENT` date DEFAULT NULL,
  `DATE_CREATE` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `DATE_UPDATE` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`ID_EVENT`, `ID_USER`, `TITRE_EVENT`, `DESC_EVENT`, `ETAT_EVENT`, `START_EVENT`, `END_EVENT`, `DATE_CREATE`, `DATE_UPDATE`) VALUES
(1, 2, 'Chater lancé', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias consequuntur exercitationem ab laboriosam ex fugit. Aspernatur, ut, expedita quisquam praesentium provident officia voluptate exercitationem iusto a, vitae facere amet sapiente!', 1, '2021-11-29', '2021-11-30', '2021-11-29 06:53:10.000000', '2021-11-30 07:22:57.000000'),
(2, 2, 'Chater lancéh', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, laudantium saepe nisi quisquam nam iure ipsa molestias! Magnam nemo at reiciendis nisi blanditiis quas similique, optio vel, aliquam voluptates dignissimos!', 1, '2021-11-29', '2021-11-30', '2021-11-29 07:14:58.000000', '2021-11-29 11:42:41.000000');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `ID_NOTIFICATION` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `ID_EVENT` int(11) NOT NULL,
  `CONTENU_NOTIF` text NOT NULL,
  `DATE_CREATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID_USER` int(11) NOT NULL,
  `FULL_NAME` varchar(255) NOT NULL,
  `EMAIL` varchar(128) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `TELEPHONE` int(11) DEFAULT NULL,
  `PHOTO_USER` varchar(255) DEFAULT NULL,
  `ETAT_USER` tinyint(1) NOT NULL,
  `DATE_CREATE` datetime(6) NOT NULL,
  `DATE_UPDATE` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID_USER`, `FULL_NAME`, `EMAIL`, `PASSWORD`, `TELEPHONE`, `PHOTO_USER`, `ETAT_USER`, `DATE_CREATE`, `DATE_UPDATE`) VALUES
(1, 'TCHIENDJE Lucien', 'lucien.tchiendje@kimia-technologies.com', '$2y$10$BLHKszV4zBRS5IN1BXNU/.ZPyo5hlmjE5q4VC0CjeubFLlhRhsEPK', NULL, 'UserPhote.png', 1, '2021-11-27 15:21:49.000000', '2021-11-27 15:21:49.000000'),
(2, 'Lucien Didier', 'luciendidier@gmail.com', '$2y$10$myGoi3BXZF6AztgtZqFvr.GLVuOMTRrm6QmMusmVvQYuw02.NbMuK', 676303894, '61a5dbdff30a7.jpg', 1, '2021-11-27 17:41:39.000000', '2021-11-30 08:08:00.000000');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`ID_COMMENTAIRE`),
  ADD KEY `I_FK_COMMENTAIRES_USERS` (`ID_USER`),
  ADD KEY `I_FK_COMMENTAIRES_EVENEMENTS` (`ID_EVENT`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`ID_EVENT`),
  ADD KEY `I_FK_EVENEMENTS_USERS` (`ID_USER`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ID_NOTIFICATION`),
  ADD KEY `I_FK_NOTIFICATIONS_USERS` (`ID_USER`),
  ADD KEY `I_FK_NOTIFICATIONS_EVENEMENTS` (`ID_EVENT`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `ID_COMMENTAIRE` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `ID_EVENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID_NOTIFICATION` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_COMMENTAIRES_EVENEMENTS` FOREIGN KEY (`ID_EVENT`) REFERENCES `evenements` (`ID_EVENT`),
  ADD CONSTRAINT `FK_COMMENTAIRES_USERS` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`);

--
-- Contraintes pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD CONSTRAINT `FK_EVENEMENTS_USERS` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `FK_NOTIFICATIONS_EVENEMENTS` FOREIGN KEY (`ID_EVENT`) REFERENCES `evenements` (`ID_EVENT`),
  ADD CONSTRAINT `FK_NOTIFICATIONS_USERS` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
