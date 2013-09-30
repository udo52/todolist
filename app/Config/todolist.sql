-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Sep 2013 um 14:26
-- Server Version: 5.5.25a
-- PHP-Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `todolist`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `priorities`
--

CREATE TABLE IF NOT EXISTS `priorities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `priorities`
--

INSERT INTO `priorities` (`id`, `name`) VALUES
(1, 'niedrig'),
(2, 'mittel'),
(3, 'hoch');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'wartend'),
(2, 'in Arbeit'),
(3, 'erledigt');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `priority_id` int(10) NOT NULL DEFAULT '2',
  `created_on` datetime NOT NULL,
  `due_on` datetime NOT NULL,
  `modified_on` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL,
  `description` text,
  `comment` text,
  `status_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`name`),
  KEY `FK_todos_priorities` (`priority_id`),
  KEY `FK_todos_users` (`user_id`),
  KEY `FK_todos_statuses` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Daten für Tabelle `todos`
--

INSERT INTO `todos` (`id`, `priority_id`, `created_on`, `due_on`, `modified_on`, `name`, `user_id`, `description`, `comment`, `status_id`) VALUES
(1, 1, '2013-09-24 15:43:00', '2013-10-24 12:00:00', '2013-09-24 15:43:00', 'Web-Anwendung zur Kundenverwaltung entwickeln', 1, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', 'Kein weiterer Kommentar', 2),
(2, 3, '2013-09-24 15:47:00', '2013-09-29 12:59:00', '2013-09-24 15:47:00', 'Wohnwagen reinigen', 2, 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '', 1),
(3, 1, '2013-09-24 15:56:00', '2013-09-26 15:00:00', '2013-09-24 15:56:00', 'Ã–lstand prÃ¼fen / Ford Fiesta', 1, '', 'dringend erforderlich', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `first_name` varchar(50) NOT NULL DEFAULT '0',
  `last_name` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `email`, `password`, `created`) VALUES
(1, 'Steinkamp', 'Udo', 'Steinkamp', 'udo@usteinkamp.de', 'test', '2013-09-12 16:06:28'),
(2, 'adam', 'eva', 'admin', 'info@adam.de', 'test', '2013-09-13 18:25:57');

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `FK_todos_priorities` FOREIGN KEY (`priority_id`) REFERENCES `priorities` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_todos_statuses` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_todos_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
