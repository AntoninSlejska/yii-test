-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Okt 2015 um 14:25
-- Server-Version: 5.6.26
-- PHP-Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `yii2example`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`id`, `name`, `surname`, `phone_number`) VALUES
(1, 'James', 'Joyce', '+39-12345678'),
(2, 'Karl', 'May', '+49-12345678');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1445238274),
('m151019_065022_create_all_reservation_tables', 1445238280);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price_per_day` decimal(20,2) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `reservation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `reservation`
--

INSERT INTO `reservation` (`id`, `room_id`, `customer_id`, `price_per_day`, `date_from`, `date_to`, `reservation_date`) VALUES
(1, 2, 1, '90.00', '2015-04-01', '2015-05-06', '2015-10-19 08:56:43'),
(2, 2, 2, '48.00', '2019-08-27', '2019-08-31', '2015-10-19 08:56:43'),
(3, 2, 1, '50.00', '2015-09-09', '2015-09-12', '2015-10-19 09:33:53'),
(4, 1, 1, '86.00', '2018-08-07', '2018-08-09', '2015-10-19 10:37:16');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL,
  `floor` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `has_conditioner` int(1) NOT NULL,
  `has_tv` int(1) NOT NULL,
  `has_phone` int(1) NOT NULL,
  `available_from` date NOT NULL,
  `price_per_day` decimal(20,2) DEFAULT '0.00',
  `description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `room`
--

INSERT INTO `room` (`id`, `floor`, `room_number`, `has_conditioner`, `has_tv`, `has_phone`, `available_from`, `price_per_day`, `description`) VALUES
(1, 1, 101, 1, 0, 1, '2015-05-20', '120.00', ''),
(2, 2, 202, 0, 1, 1, '2015-05-30', '118.00', ''),
(3, 3, 303, 0, 0, 1, '2015-11-20', '30.00', ''),
(4, 3, 301, 0, 1, 1, '2015-11-22', '50.00', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `table_1`
--

CREATE TABLE IF NOT EXISTS `table_1` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `table_1`
--

INSERT INTO `table_1` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `table_2`
--

CREATE TABLE IF NOT EXISTS `table_2` (
  `id` int(11) NOT NULL,
  `t1_id` int(11) NOT NULL,
  `t3_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `table_2`
--

INSERT INTO `table_2` (`id`, `t1_id`, `t3_id`) VALUES
(3, 1, 2),
(4, 1, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `table_3`
--

CREATE TABLE IF NOT EXISTS `table_3` (
  `id` int(11) NOT NULL,
  `t4_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `table_3`
--

INSERT INTO `table_3` (`id`, `t4_id`) VALUES
(2, 1),
(3, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `table_4`
--

CREATE TABLE IF NOT EXISTS `table_4` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `table_4`
--

INSERT INTO `table_4` (`id`) VALUES
(1),
(2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indizes für die Tabelle `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_room_id` (`room_id`),
  ADD KEY `idx_customer_id` (`customer_id`);

--
-- Indizes für die Tabelle `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `table_1`
--
ALTER TABLE `table_1`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `table_2`
--
ALTER TABLE `table_2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t1_t2_idx` (`t1_id`),
  ADD KEY `t3_t2_idx` (`t3_id`);

--
-- Indizes für die Tabelle `table_3`
--
ALTER TABLE `table_3`
  ADD PRIMARY KEY (`id`),
  ADD KEY `t4_t3_idx` (`t4_id`);

--
-- Indizes für die Tabelle `table_4`
--
ALTER TABLE `table_4`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `table_1`
--
ALTER TABLE `table_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `table_2`
--
ALTER TABLE `table_2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT für Tabelle `table_3`
--
ALTER TABLE `table_3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT für Tabelle `table_4`
--
ALTER TABLE `table_4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reservation_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `table_2`
--
ALTER TABLE `table_2`
  ADD CONSTRAINT `t1_t2` FOREIGN KEY (`t1_id`) REFERENCES `table_1` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t3_t2` FOREIGN KEY (`t3_id`) REFERENCES `table_3` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints der Tabelle `table_3`
--
ALTER TABLE `table_3`
  ADD CONSTRAINT `t4_t3` FOREIGN KEY (`t4_id`) REFERENCES `table_4` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
