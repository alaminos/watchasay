-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Sam 10 Mars 2018 à 17:46
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blablapp`
--

-- --------------------------------------------------------

--
-- Structure de la table `dialogues`
--

CREATE TABLE `dialogues` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `dialogues`
--

INSERT INTO `dialogues` (`id`, `title`) VALUES
(1, 'IT Interview in India');

-- --------------------------------------------------------

--
-- Structure de la table `frases`
--

CREATE TABLE `frases` (
  `id` int(12) NOT NULL,
  `language_id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recdate` datetime NOT NULL,
  `dialogue_id` int(11) NOT NULL,
  `difficulty` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `frases`
--

INSERT INTO `frases` (`id`, `language_id`, `text`, `source`, `recdate`, `dialogue_id`, `difficulty`) VALUES
(1, 3, 'Because someone is asking to write something without a context', 'interview1.ogg', '0000-00-00 00:00:00', 1, 0),
(3, 3, 'And I hate remembering some data, and writing exams, we have storage devices for that.', 'inter1.ogg', '0000-00-00 00:00:00', 1, 0),
(4, 3, 'So you did it alone and completed it?', 'inter2.ogg', '0000-00-00 00:00:00', 1, 0),
(5, 3, 'I\'m okay with it', 'inter3.ogg', '0000-00-00 00:00:00', 1, 0),
(6, 3, 'If you want me to give you this job, you\'ve got to take off your funky style dress.', 'inter4.ogg', '0000-00-00 00:00:00', 1, 0),
(7, 3, 'Why did you write Java?', 'interview2.ogg', '0000-00-00 00:00:00', 1, 0),
(8, 3, 'Your resume says that you are a Sun certified Java programmer.', 'interview3.ogg', '0000-00-00 00:00:00', 1, 0),
(9, 3, 'Tell me something about yourself.', 'interview4.ogg', '0000-00-00 00:00:00', 1, 0),
(10, 3, 'Take the marker and write something on the board.', 'interview5.ogg', '0000-00-00 00:00:00', 1, 0),
(11, 3, 'I have done two major projects and I also hold internship in two reputed companies.', 'interview6.ogg', '0000-00-00 00:00:00', 1, 0),
(12, 3, 'You\'re in the wrong place.', 'interview7.ogg', '0000-00-00 00:00:00', 1, 0),
(13, 3, 'Sorry I thought you were an interviewer.', 'interview8.ogg', '0000-00-00 00:00:00', 1, 0),
(14, 3, 'I didn\'t like sitting in the classroom and listening to boring classrooms.', 'interview9.ogg', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `languages`
--

INSERT INTO `languages` (`id`, `code`, `name`) VALUES
(3, 'en', 'English'),
(4, 'fr', 'Français');

-- --------------------------------------------------------

--
-- Structure de la table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `theme_associations`
--

CREATE TABLE `theme_associations` (
  `id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `phrase_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `last_connection` datetime NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `last_connection`, `role_id`) VALUES
(1, 'sleuvins', 'sleuvins@gmail.com', '$2y$10$0tURoLbvAwBmudS4zSWx9O0gej0q4D8iyTUC/zNuqdcSu34BJivVG', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `users_phrases`
--

CREATE TABLE `users_phrases` (
  `pk` int(11) NOT NULL,
  `last_seen` int(11) NOT NULL,
  `fallow` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phrase_id` int(11) DEFAULT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user_roles`
--

INSERT INTO `user_roles` (`id`, `title`) VALUES
(1, 'super_admin');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `dialogues`
--
ALTER TABLE `dialogues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `frases`
--
ALTER TABLE `frases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `dialogue_id` (`dialogue_id`);

--
-- Index pour la table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `theme_associations`
--
ALTER TABLE `theme_associations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phrase_id` (`phrase_id`),
  ADD KEY `theme_id` (`theme_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `users_phrases`
--
ALTER TABLE `users_phrases`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `phrase_id` (`phrase_id`);

--
-- Index pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `dialogues`
--
ALTER TABLE `dialogues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `frases`
--
ALTER TABLE `frases`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `theme_associations`
--
ALTER TABLE `theme_associations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `frases`
--
ALTER TABLE `frases`
  ADD CONSTRAINT `frases_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `frases_ibfk_2` FOREIGN KEY (`dialogue_id`) REFERENCES `dialogues` (`id`),
  ADD CONSTRAINT `frases_ibfk_3` FOREIGN KEY (`dialogue_id`) REFERENCES `dialogues` (`id`);

--
-- Contraintes pour la table `theme_associations`
--
ALTER TABLE `theme_associations`
  ADD CONSTRAINT `theme_associations_ibfk_1` FOREIGN KEY (`phrase_id`) REFERENCES `frases` (`id`),
  ADD CONSTRAINT `theme_associations_ibfk_2` FOREIGN KEY (`theme_id`) REFERENCES `themes` (`id`);

--
-- Contraintes pour la table `users_phrases`
--
ALTER TABLE `users_phrases`
  ADD CONSTRAINT `users_phrases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `users_phrases_ibfk_2` FOREIGN KEY (`phrase_id`) REFERENCES `frases` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
