-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 06, 2017 alle 17:09
-- Versione del server: 5.6.35
-- Versione PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yiiplus`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('create-country', 1, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('create-city', 1, NULL, NULL, NULL, NULL, NULL),
('create-country', 1, 'Creare nuovi paesi e nuove città', NULL, NULL, NULL, NULL),
('delete-country', 1, 'Eliminazione paesi e città', NULL, NULL, NULL, NULL),
('update-city', 2, NULL, NULL, NULL, NULL, NULL),
('update-country', 1, 'Aggiornamento paese e città', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `city`
--

CREATE TABLE `city` (
  `id_city` int(11) NOT NULL,
  `ccode` char(3) NOT NULL,
  `name` char(50) NOT NULL,
  `population` int(11) NOT NULL,
  `birthdate` date NOT NULL,
  `allegato` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `city`
--

INSERT INTO `city` (`id_city`, `ccode`, `name`, `population`, `birthdate`, `allegato`) VALUES
(1, 'BR', 'Melbourne', 10000000, '1900-12-13', 'img/Melbourne.jpg'),
(2, 'BR', 'Rio de Janeiro', 7000000, '1900-12-07', 'img/Rio de Janeiro.jpg'),
(3, 'CA', 'Toronto', 4000000, '0000-00-00', ''),
(4, 'CN', 'Pechino', 18000000, '0000-00-00', ''),
(5, 'DE', 'Berlino', 5000000, '0000-00-00', ''),
(6, 'FR', 'Parigi', 7500000, '0000-00-00', ''),
(7, 'GB', 'Londra', 7000000, '0000-00-00', ''),
(8, 'IN', 'Mumbai', 12000000, '0000-00-00', ''),
(9, 'IT', 'Roma', 5800000, '0000-00-00', ''),
(10, 'RSM', 'Misano', 10000, '0000-00-00', ''),
(11, 'RU', 'Mosca', 12000000, '0000-00-00', ''),
(12, 'US', 'Las Vegas', 300000, '0000-00-00', ''),
(13, 'LU', 'Lugano', 343455, '0000-00-00', ''),
(14, '222', 'Lugano', 323435, '0000-00-00', ''),
(15, '222', 'Berna', 223546546, '0000-00-00', ''),
(16, '222', 'Ginevra', 324232, '0000-00-00', ''),
(17, 'xxx', 'Nuova Delhi', 323455678, '0000-00-00', ''),
(18, '222', 'Bellinzona', 12345, '0000-00-00', ''),
(19, 'BR', 'Brasilia', 1324, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Struttura della tabella `country`
--

CREATE TABLE `country` (
  `code` char(3) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `country`
--

INSERT INTO `country` (`code`, `name`, `population`) VALUES
('BR', 'Brazil', 205722000),
('CA', 'Canada', 35985751),
('CN', 'China', 1375210000),
('DE', 'Germany', 81459000),
('FR', 'France', 64513242),
('GB', 'United Kingdom', 65097000),
('IN', 'India', 1285400000),
('RSM', 'San Marino', 20000),
('RU', 'Russia', 146519759),
('SCV', 'Città del Vaticano', 45547),
('SPA', 'Spagna', 235464667),
('SV', 'Svizzera', 3223434),
('US', 'United States', 322976000),
('xxx', 'India', 2147483647);

-- --------------------------------------------------------

--
-- Struttura della tabella `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1493738968),
('m130524_201442_init', 1493738990);

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `numerocittapernazione`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `numerocittapernazione` (
`conteggio` bigint(21)
,`name` char(52)
);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'imafa82', 'ENXpTKSdCwoHarLWxmw3vSkXp8h6MOKz', '$2y$13$kYQLf/IVC8CHtv83AUNZfOptI6d607VZKY8TbT.hU15BYy5qbTV/G', '', 'imafa82@gmail.com', 10, 1493739011, 1493739011);

-- --------------------------------------------------------

--
-- Struttura per la vista `numerocittapernazione`
--
DROP TABLE IF EXISTS `numerocittapernazione`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `numerocittapernazione`  AS  select count(`city`.`id_city`) AS `conteggio`,`country`.`name` AS `name` from (`country` left join `city` on((`country`.`code` = `city`.`ccode`))) group by `country`.`name` order by `conteggio` desc ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignement_user_ibfk_2` (`user_id`);

--
-- Indici per le tabelle `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indici per le tabelle `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indici per le tabelle `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indici per le tabelle `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `ccode` (`ccode`);

--
-- Indici per le tabelle `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indici per le tabelle `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `city`
--
ALTER TABLE `city`
  MODIFY `id_city` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignement_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Limiti per la tabella `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
