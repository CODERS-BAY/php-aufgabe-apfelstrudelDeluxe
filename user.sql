-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Mrz 2021 um 17:54
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `teams`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_surname` varchar(20) NOT NULL,
  `user_image` varchar(200) DEFAULT NULL,
  `user_mail` varchar(100) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_team_id` int(11) DEFAULT NULL,
  `user_rights_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_name`, `user_surname`, `user_image`, `user_mail`, `user_password`, `user_team_id`, `user_rights_id`) VALUES
(13, 'karin.thuerschmid', 'Karin', 'Thürschmid', NULL, 'karin@firma.at', '123', 10, 3),
(14, 'gerti.huber', 'Gerti', 'Huber', NULL, 'gerti@firma.at', '123', 10, 2),
(15, 'michaela.frau', 'Michaela', 'Frau', NULL, 'michaela@firma.at', '123', 6, 1),
(26, 'stefan.berger', 'Stefan', 'Berger', NULL, 'sb@firma.at', '123', 10, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_team_id` (`user_team_id`),
  ADD KEY `user_rights_id` (`user_rights_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_team_id`) REFERENCES `team` (`team_id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`user_rights_id`) REFERENCES `rights` (`rights_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
