-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Út 28.Máj 2024, 23:33
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `projektphp`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `historia_objednavok`
--

CREATE TABLE `historia_objednavok` (
  `Historia_Objednavok_id` int(11) NOT NULL,
  `Zakaznik_zakaznik_id` int(11) NOT NULL,
  `Objednavky_objednavky_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `objednavky`
--

CREATE TABLE `objednavky` (
  `objednavky_id` int(11) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `cena` float NOT NULL,
  `mnozstvo` int(11) NOT NULL,
  `produkt` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `qna`
--

CREATE TABLE `qna` (
  `QnA_id` int(11) NOT NULL,
  `odpoved` text NOT NULL,
  `otazka` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `qna`
--

INSERT INTO `qna` (`QnA_id`, `odpoved`, `otazka`) VALUES
(2, 'Môj obľúbený programovací jazyk bude určite PHP. ', 'Aký je váš obľúbený programovací jazyk?'),
(3, 'Mojím cieľom je prejsť tento predmet.', 'Aké sú vaše ciele pre túto stránku?'),
(4, 'Odpoveď bude vždy kačica.', 'Aké je najlepšie zviera?'),
(5, 'Mám základné znalosti PHP a skúsenosti, ktoré neviem použiť.', 'Aké sú vaše skúsenosti s PHP?');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zakaznik`
--

CREATE TABLE `zakaznik` (
  `zakaznik_id` int(11) NOT NULL,
  `meno` varchar(45) NOT NULL,
  `priezvisko` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `heslo` varchar(255) NOT NULL,
  `adresa` varchar(45) DEFAULT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Sťahujem dáta pre tabuľku `zakaznik`
--

INSERT INTO `zakaznik` (`zakaznik_id`, `meno`, `priezvisko`, `email`, `heslo`, `adresa`, `admin`) VALUES
(12, 'Patrik', 'Kavan', 'Patrik.Kavan@gmail.com', '$2y$10$olu../r9o8DnMWYhalAjaeo3w5x9jJHGKKxqdWlamIarV4gafkjlW', NULL, 1);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `historia_objednavok`
--
ALTER TABLE `historia_objednavok`
  ADD PRIMARY KEY (`Historia_Objednavok_id`),
  ADD KEY `fk_Zakaznik_has_Objednavky_Objednavky1_idx` (`Objednavky_objednavky_id`),
  ADD KEY `fk_Zakaznik_has_Objednavky_Zakaznik_idx` (`Zakaznik_zakaznik_id`);

--
-- Indexy pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  ADD PRIMARY KEY (`objednavky_id`);

--
-- Indexy pre tabuľku `qna`
--
ALTER TABLE `qna`
  ADD PRIMARY KEY (`QnA_id`);

--
-- Indexy pre tabuľku `zakaznik`
--
ALTER TABLE `zakaznik`
  ADD PRIMARY KEY (`zakaznik_id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `historia_objednavok`
--
ALTER TABLE `historia_objednavok`
  MODIFY `Historia_Objednavok_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `objednavky`
--
ALTER TABLE `objednavky`
  MODIFY `objednavky_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `qna`
--
ALTER TABLE `qna`
  MODIFY `QnA_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `zakaznik`
--
ALTER TABLE `zakaznik`
  MODIFY `zakaznik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `historia_objednavok`
--
ALTER TABLE `historia_objednavok`
  ADD CONSTRAINT `fk_Zakaznik_has_Objednavky_Objednavky1` FOREIGN KEY (`Objednavky_objednavky_id`) REFERENCES `objednavky` (`objednavky_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Zakaznik_has_Objednavky_Zakaznik` FOREIGN KEY (`Zakaznik_zakaznik_id`) REFERENCES `zakaznik` (`zakaznik_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
