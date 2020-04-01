-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db5000303628.hosting-data.io
-- Généré le : mar. 31 mars 2020 à 21:43
-- Version du serveur :  5.7.28-log
-- Version de PHP : 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs296615`
--

-- --------------------------------------------------------

--
-- Structure de la table `Acteur`
--

CREATE TABLE `Acteur` (
  `id_acteur` int(11) NOT NULL,
  `nom_acteur` varchar(50) NOT NULL,
  `prenom_acteur` varchar(50) NOT NULL,
  `born_acteur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Acteur`
--

INSERT INTO `Acteur` (`id_acteur`, `nom_acteur`, `prenom_acteur`, `born_acteur`) VALUES
(1, 'Yen', 'Donnie', '0000-00-00'),
(2, 'Yue', 'Wu', '0000-00-00'),
(3, 'Adkins', 'Scott', '0000-00-00'),
(4, 'Ridley', 'Daisy', '0000-00-00'),
(5, 'Driver', 'Adam', '0000-00-00'),
(6, 'Isaac', 'Oscar', '0000-00-00'),
(7, 'Damon', 'Matt', '0000-00-00'),
(8, 'Bale', 'Christian', '0000-00-00'),
(9, 'Moss', 'Elisabeth ', '0000-00-00'),
(10, 'Craig', 'Daniel ', '0000-00-00'),
(11, 'Malek', 'Rami', '0000-00-00'),
(12, 'Seydoux', 'Léa', '0000-00-00'),
(13, 'Johansson', 'Scarlett', '0000-00-00'),
(14, 'Portman', 'Natalie', '0000-00-00'),
(15, 'Cotillard', 'Marion', '0000-00-00'),
(16, 'Gadot', 'Gal ', '0000-00-00'),
(17, 'Lawrence', 'Jennifer', '0000-00-00'),
(18, 'Watson', 'Emma ', '0000-00-00'),
(19, 'Larson', 'Brie', '0000-00-00'),
(20, 'DiCaprio', 'Leonardo', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `cinema`
--

CREATE TABLE `cinema` (
  `id_cinema` int(11) NOT NULL,
  `nom_cinema` varchar(50) NOT NULL,
  `ville_cinema` varchar(50) NOT NULL,
  `adresse_cinema` varchar(100) NOT NULL,
  `mail_cinema` varchar(50) NOT NULL,
  `telephone_cinema` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cinema`
--

INSERT INTO `cinema` (`id_cinema`, `nom_cinema`, `ville_cinema`, `adresse_cinema`, `mail_cinema`, `telephone_cinema`) VALUES
(1, 'metropolis', 'charleville-mezieres', 'Multiplexe Metropolis\r\n\r\nZac Montjoly 08000 Charleville-Mézières', '', ''),
(2, 'Le Cezanne', 'aix-en-provence', 'Le Cézanne\r\n\r\n1, rue Marcel-Guillaume 13100 Aix-en-Provence', '', ''),
(3, 'cinema 3 ', 'lille', 'rue de JJJ', '', ''),
(4, 'cinema Simplon', 'Bordeaux', '2 rue de simplon', '', ''),
(5, 'cinema pyxxel', 'land', 'vivier', 'test@simplon.fr', '66666');

-- --------------------------------------------------------

--
-- Structure de la table `equipement`
--

CREATE TABLE `equipement` (
  `id_equipement` int(11) NOT NULL,
  `nom_equipement` varchar(50) NOT NULL,
  `disponibilite_equipement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `equipement`
--

INSERT INTO `equipement` (`id_equipement`, `nom_equipement`, `disponibilite_equipement`) VALUES
(1, 'imax', 0),
(2, '3d', 0),
(3, 'camera', 0);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_film` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Film`
--

CREATE TABLE `Film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `synopsis` varchar(500) NOT NULL,
  `note` double NOT NULL,
  `duree` time NOT NULL,
  `date_sortie` date NOT NULL,
  `trailer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Film`
--

INSERT INTO `Film` (`id_film`, `titre`, `synopsis`, `note`, `duree`, `date_sortie`, `trailer`) VALUES
(1, 'IP MAN 4', 'Dans le dernier opus de la saga mythique, Ip Man se rend aux Etats-Unis à la demande de Bruce Lee afin d\'apaiser les tensions entre les maîtres locaux du Kung-fu et son protégé. Il se retrouve très vite impliqué dans un différend raciste entre les forces armées locales et une école d\'arts martiaux chinoise établie dans le quartier de Chinatown à San Francisco. Dans une apothéose de combats ultra-maîtrisés, avec la grâce et la sérénité qui le caractérisent, Donnie Yen donne vie, pour la première ', 4, '01:45:00', '2020-05-20', ''),
(2, 'STAR WARS: L\'ASCENSION DE SKYWALKER', 'La conclusion de la saga Skywalker. De nouvelles légendes vont naître dans cette bataille épique pour la liberté.', 2.5, '02:22:00', '2019-12-18', ''),
(3, 'LE MANS 66', 'Basé sur une histoire vraie, le film suit une équipe d\'excentriques ingénieurs américains menés par le visionnaire Carroll Shelby et son pilote britannique Ken Miles, qui sont envoyés par Henry Ford II pour construire à partir de rien une nouvelle automobile qui doit détrôner la Ferrari à la compétition du Mans de 1966.', 4, '02:33:00', '2019-11-13', ''),
(4, 'INVISIBLE MAN', 'Cecilia Kass est en couple avec un brillant et riche scientifique. Ne supportant plus son comportement violent et tyrannique, elle prend la fuite une nuit et se réfugie auprès de sa sœur, leur ami d\'enfance et sa fille adolescente.\r\nMais quand l\'homme se suicide en laissant à Cecilia une part importante de son immense fortune, celle-ci commence à se demander s\'il est réellement mort. Tandis qu\'une série de coïncidences inquiétantes menace la vie des êtres qu\'elle aime, Cecilia cherche désespérém', 4, '02:05:00', '2020-02-26', ''),
(5, 'MOURIR PEUT ATTENDRE', 'James Bond a quitté les services secrets et coule des jours heureux en Jamaïque. Mais sa tranquillité est de courte durée car son vieil ami Felix Leiter de la CIA débarque pour solliciter son aide : il s\'agit de sauver un scientifique qui vient d\'être kidnappé. Mais la mission se révèle bien plus dangereuse que prévu et Bond se retrouve aux trousses d\'un mystérieux ennemi détenant de redoutables armes technologiques…', 4.5, '02:43:00', '2020-11-19', '');

-- --------------------------------------------------------

--
-- Structure de la table `Genre`
--

CREATE TABLE `Genre` (
  `id_genre` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Genre`
--

INSERT INTO `Genre` (`id_genre`, `nom`) VALUES
(1, ' Action'),
(2, 'Arts Martiaux'),
(3, ' Drame'),
(4, 'Biopic'),
(5, 'Science fiction'),
(6, 'Aventure'),
(7, 'Fantastique'),
(8, 'Epouvante-horreur'),
(9, 'Thriller'),
(10, 'Espionnage'),
(11, 'Animation'),
(12, 'Comedie'),
(13, 'Doc-Fiction'),
(14, 'Policier'),
(15, 'Romance'),
(16, 'Guerre'),
(17, 'Histoire');

-- --------------------------------------------------------

--
-- Structure de la table `genrer`
--

CREATE TABLE `genrer` (
  `id_genre` int(11) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Image`
--

CREATE TABLE `Image` (
  `id_affiche` int(11) NOT NULL,
  `affiche_film` varchar(50) NOT NULL,
  `image_real` varchar(255) NOT NULL,
  `image_product` varchar(255) NOT NULL,
  `image_acteur` varchar(255) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Jouer`
--

CREATE TABLE `Jouer` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Producteur`
--

CREATE TABLE `Producteur` (
  `id_producteur` int(11) NOT NULL,
  `nom_product` varchar(50) NOT NULL,
  `prenom_product` varchar(100) NOT NULL,
  `born_product` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Producteur`
--

INSERT INTO `Producteur` (`id_producteur`, `nom_product`, `prenom_product`, `born_product`) VALUES
(1, 'Yen', 'Donnie', '0000-00-00'),
(2, 'Wang', 'Raymond', '0000-00-00'),
(3, 'Yip', 'Wilson', '0000-00-00'),
(4, 'Abrahams', 'JJ', '0000-00-00'),
(5, 'Kennedy', 'Kathleen', '0000-00-00'),
(6, 'Rejwan', 'Michelle', '0000-00-00'),
(7, 'Mangold', 'James', '0000-00-00'),
(8, 'Blum', 'Jason', '0000-00-00'),
(9, 'Blight', 'Rosemary', '0000-00-00'),
(10, 'Broccoli', 'Barbara', '0000-00-00'),
(11, 'Wilson', 'Michael G', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `Produire`
--

CREATE TABLE `Produire` (
  `id_producteur` int(11) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Realisateur`
--

CREATE TABLE `Realisateur` (
  `id_realisateur` int(11) NOT NULL,
  `nom_real` varchar(50) NOT NULL,
  `prenom_real` varchar(50) NOT NULL,
  `born_real` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Realisateur`
--

INSERT INTO `Realisateur` (`id_realisateur`, `nom_real`, `prenom_real`, `born_real`) VALUES
(1, 'Yip', 'Wilson', '0000-00-00'),
(2, 'Abrahams', 'JJ', '0000-00-00'),
(3, 'Mangold', 'James', '0000-00-00'),
(4, 'Whannell', 'Leigh', '0000-00-00'),
(5, 'Joji Fukunaga', 'Cary', '0000-00-00'),
(6, 'Cameron', 'James', '0000-00-00'),
(7, 'Scoot', 'Rydley', '0000-00-00'),
(8, 'Spielberg', 'Steven', '0000-00-00'),
(9, 'Nolan', 'Christopher', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `Realiser`
--

CREATE TABLE `Realiser` (
  `id_realisateur` int(11) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `numero_salle` int(11) NOT NULL,
  `capacite_salle` int(11) NOT NULL,
  `id_cinema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `numero_salle`, `capacite_salle`, `id_cinema`) VALUES
(1, 1, 250, 1),
(2, 2, 350, 1),
(3, 3, 150, 1),
(4, 4, 50, 1),
(5, 1, 150, 2),
(6, 2, 250, 2),
(7, 3, 350, 2),
(8, 4, 50, 2),
(9, 10, 250, 3),
(10, 11, 150, 3),
(11, 12, 50, 3),
(12, 13, 350, 3),
(13, 20, 250, 4),
(14, 21, 150, 4),
(15, 22, 50, 4),
(16, 23, 350, 4),
(17, 5, 666, 5);

-- --------------------------------------------------------

--
-- Structure de la table `tips`
--

CREATE TABLE `tips` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `type_techno` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_time_publication` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typeUser`
--

CREATE TABLE `typeUser` (
  `id_typeuser` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typeUser`
--

INSERT INTO `typeUser` (`id_typeuser`, `type`) VALUES
(1, 'admin'),
(2, 'moderateur'),
(3, 'utlisateur_login');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id_user` int(11) NOT NULL,
  `pseudo_user` varchar(100) NOT NULL,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `password_user` char(128) NOT NULL,
  `mail_username` varchar(100) NOT NULL,
  `id_type_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id_user`, `pseudo_user`, `nom_user`, `prenom_user`, `password_user`, `mail_username`, `id_type_user`) VALUES
(1, 'test', 'test', 'test', 'test', 'test@test.fr', 1),
(25, 'test2', 'blombou', 'steven', '$2y$10$gB1cygOdrpSM7IJ5ohoyZeCItBdDYV9r74QaTrtHgu3LGmWy2jHc.', 'test2@live.fr', 3),
(26, 'test3', 'dupond', 'michelle', '$2y$10$xlE1zAW7AlJdBALlDNsPcOl5avJA77IC2nHzjH6fMxGthznJ8FPPK', 'test3@live.fr', 3),
(27, 'test8', 'test', 'test', '$2y$10$G9RKBmg.xgBSimZIYMTdU..N4TsDx5zf4qsOB.D1FAM.u0Ib4Iwf2', 'test8@gmail.com', 3),
(28, 'test12', 'test12', 'test12', '$2y$10$uXSKSRHoQ9cI8SaTZogQAeO29lpYkHE6fAsWWXfu0TJDfPFJ9Eim2', 'test12@gmail.com', 3),
(29, 'machin', 'longny', 'madeline', '$2y$10$/ss0qCQWE6Fko5ULh3nOgu4ezpxlNiy/cmEDe0Z4T6lQ5GndVFaXy', 'test4@live.fr', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `prenom` varchar(150) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `nom`, `prenom`, `message`, `email`) VALUES
(1, 'bob', 'bobinou', 'zfzfzafzefzafaz', 'fzeffazfzefa@zazef'),
(2, 'steeve', NULL, 'tezvzvrvr', 'test@simplon'),
(3, 'steeve', 'test', 'tezvzvrvr', 'test@simplon'),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Acteur`
--
ALTER TABLE `Acteur`
  ADD PRIMARY KEY (`id_acteur`);

--
-- Index pour la table `cinema`
--
ALTER TABLE `cinema`
  ADD PRIMARY KEY (`id_cinema`);

--
-- Index pour la table `equipement`
--
ALTER TABLE `equipement`
  ADD PRIMARY KEY (`id_equipement`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_film`,`id_user`),
  ADD KEY `favoris_User0_FK` (`id_user`);

--
-- Index pour la table `Film`
--
ALTER TABLE `Film`
  ADD PRIMARY KEY (`id_film`);

--
-- Index pour la table `Genre`
--
ALTER TABLE `Genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Index pour la table `genrer`
--
ALTER TABLE `genrer`
  ADD PRIMARY KEY (`id_genre`,`id_film`),
  ADD KEY `genrer_Film0_FK` (`id_film`);

--
-- Index pour la table `Image`
--
ALTER TABLE `Image`
  ADD PRIMARY KEY (`id_affiche`),
  ADD KEY `Image_Film_FK` (`id_film`);

--
-- Index pour la table `Jouer`
--
ALTER TABLE `Jouer`
  ADD PRIMARY KEY (`id_film`,`id_acteur`),
  ADD KEY `Jouer_Acteur0_FK` (`id_acteur`);

--
-- Index pour la table `Producteur`
--
ALTER TABLE `Producteur`
  ADD PRIMARY KEY (`id_producteur`);

--
-- Index pour la table `Produire`
--
ALTER TABLE `Produire`
  ADD PRIMARY KEY (`id_producteur`,`id_film`),
  ADD KEY `Produire_Film0_FK` (`id_film`);

--
-- Index pour la table `Realisateur`
--
ALTER TABLE `Realisateur`
  ADD PRIMARY KEY (`id_realisateur`);

--
-- Index pour la table `Realiser`
--
ALTER TABLE `Realiser`
  ADD PRIMARY KEY (`id_realisateur`,`id_film`),
  ADD KEY `Realiser_Film0_FK` (`id_film`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`),
  ADD KEY `salle_cinema_FK` (`id_cinema`);

--
-- Index pour la table `typeUser`
--
ALTER TABLE `typeUser`
  ADD PRIMARY KEY (`id_typeuser`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `User_typeUser_FK` (`id_type_user`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Acteur`
--
ALTER TABLE `Acteur`
  MODIFY `id_acteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `cinema`
--
ALTER TABLE `cinema`
  MODIFY `id_cinema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `equipement`
--
ALTER TABLE `equipement`
  MODIFY `id_equipement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `Film`
--
ALTER TABLE `Film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `Genre`
--
ALTER TABLE `Genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `Image`
--
ALTER TABLE `Image`
  MODIFY `id_affiche` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Producteur`
--
ALTER TABLE `Producteur`
  MODIFY `id_producteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `Realisateur`
--
ALTER TABLE `Realisateur`
  MODIFY `id_realisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `typeUser`
--
ALTER TABLE `typeUser`
  MODIFY `id_typeuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `favoris_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `Film` (`id_film`),
  ADD CONSTRAINT `favoris_User0_FK` FOREIGN KEY (`id_user`) REFERENCES `User` (`id_user`);

--
-- Contraintes pour la table `genrer`
--
ALTER TABLE `genrer`
  ADD CONSTRAINT `genrer_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `Film` (`id_film`),
  ADD CONSTRAINT `genrer_Genre_FK` FOREIGN KEY (`id_genre`) REFERENCES `Genre` (`id_genre`);

--
-- Contraintes pour la table `Image`
--
ALTER TABLE `Image`
  ADD CONSTRAINT `Image_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `Film` (`id_film`);

--
-- Contraintes pour la table `Jouer`
--
ALTER TABLE `Jouer`
  ADD CONSTRAINT `Jouer_Acteur0_FK` FOREIGN KEY (`id_acteur`) REFERENCES `Acteur` (`id_acteur`),
  ADD CONSTRAINT `Jouer_Film_FK` FOREIGN KEY (`id_film`) REFERENCES `Film` (`id_film`);

--
-- Contraintes pour la table `Produire`
--
ALTER TABLE `Produire`
  ADD CONSTRAINT `Produire_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `Film` (`id_film`),
  ADD CONSTRAINT `Produire_Producteur_FK` FOREIGN KEY (`id_producteur`) REFERENCES `Producteur` (`id_producteur`);

--
-- Contraintes pour la table `Realiser`
--
ALTER TABLE `Realiser`
  ADD CONSTRAINT `Realiser_Film0_FK` FOREIGN KEY (`id_film`) REFERENCES `Film` (`id_film`),
  ADD CONSTRAINT `Realiser_Realisateur_FK` FOREIGN KEY (`id_realisateur`) REFERENCES `Realisateur` (`id_realisateur`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `salle_cinema_FK` FOREIGN KEY (`id_cinema`) REFERENCES `cinema` (`id_cinema`);

--
-- Contraintes pour la table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_typeUser_FK` FOREIGN KEY (`id_type_user`) REFERENCES `typeUser` (`id_typeuser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
