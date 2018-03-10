-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Ven 09 Mars 2018 à 23:39
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
-- Structure de la table `frases`
--

CREATE TABLE `frases` (
  `id` int(12) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `recdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `frases`
--

INSERT INTO `frases` (`id`, `text`, `source`, `recdate`) VALUES
(1, 'Because someone is asking to write something without a context', 'interview1.ogg', '0000-00-00 00:00:00'),
(3, 'And I hate remembering some data, and writing exams, we have storage devices for that.', 'inter1.ogg', '0000-00-00 00:00:00'),
(4, 'So you did it alone and completed it?', 'inter2.ogg', '0000-00-00 00:00:00'),
(5, 'I\'m okay with it', 'inter3.ogg', '0000-00-00 00:00:00'),
(6, 'If you want me to give you this job, you\'ve got to take off your funky style dress.', 'inter4.ogg', '0000-00-00 00:00:00'),
(7, 'Why did you write Java?', 'interview2.ogg', '0000-00-00 00:00:00'),
(8, 'Your resume says that you are a Sun certified Java programmer.', 'interview3.ogg', '0000-00-00 00:00:00'),
(9, 'Tell me something about yourself.', 'interview4.ogg', '0000-00-00 00:00:00'),
(10, 'Take the marker and write something on the board.', 'interview5.ogg', '0000-00-00 00:00:00'),
(11, 'I have done two major projects and I also hold internship in two reputed companies.', 'interview6.ogg', '0000-00-00 00:00:00'),
(12, 'You\'re in the wrong place.', 'interview7.ogg', '0000-00-00 00:00:00'),
(13, 'Sorry I thought you were an interviewer.', 'interview8.ogg', '0000-00-00 00:00:00'),
(14, 'I didn\'t like sitting in the classroom and listening to boring classrooms.', 'interview9.ogg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'sleuvins', 'sleuvins@gmail.com', '$2y$10$0tURoLbvAwBmudS4zSWx9O0gej0q4D8iyTUC/zNuqdcSu34BJivVG');

-- --------------------------------------------------------

--
-- Structure de la table `users_phrases`
--

CREATE TABLE `users_phrases` (
  `pk` int(11) NOT NULL,
  `last_seen` int(11) NOT NULL,
  `fallow` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phrase_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `frases`
--
ALTER TABLE `frases`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `frases`
--
ALTER TABLE `frases`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `users_phrases`
--
ALTER TABLE `users_phrases`
  ADD CONSTRAINT `users_phrases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `users_phrases_ibfk_2` FOREIGN KEY (`phrase_id`) REFERENCES `frases` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
