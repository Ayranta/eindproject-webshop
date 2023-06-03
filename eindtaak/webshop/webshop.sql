-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 03 jun 2023 om 13:03
-- Serverversie: 8.0.31
-- PHP-versie: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artikel`
--

DROP TABLE IF EXISTS `artikel`;
CREATE TABLE IF NOT EXISTS `artikel` (
  `artikelnummer` int NOT NULL AUTO_INCREMENT,
  `artikelnaam` text NOT NULL,
  `prijs` int NOT NULL,
  `afbeelding` text NOT NULL,
  `extraUitleg` text NOT NULL,
  PRIMARY KEY (`artikelnummer`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `artikel`
--

INSERT INTO `artikel` (`artikelnummer`, `artikelnaam`, `prijs`, `afbeelding`, `extraUitleg`) VALUES
(2, 'Yamaha R1M', 27905, 'https://img.etimg.com/thumb/msid-46917228,width-640,resizemode-4,imgsize-206972/yamaha-launches-yzf-r1m-in-india-priced-at-rs-29-43-lakh.jpg', 'The R1M is the most advanced production motorcycle Yamaha has ever made. Purpose-built for superior performance on the track, it features revolutionary electronic control technology that lets you push even harder and discover your true potential.'),
(4, 'yamaha r6', 14299, 'https://global-fs.webike-cdn.net/moto_img/cg/8/7859/L_11bcd16b3cf0e22121d61f094a.jpg', 'Dit is de ultieme 600 cc supersport motorfiets die de WorldSSP-races al jaren domineert. Zoals elke model in de R-serie werd hij ontwikkeld zonder compromissen om de hoogste prestatieniveaus te kunnen halen. Om de voorbereiding op het nieuwe raceseizoen voor u en voor uw team nog gemakkelijker te maken , wordt de circuit R6 RACE nu geleverd in een raceklare uitvoering.'),
(5, 'yamaha r7', 7500, 'https://bwmotors.be/wp-content/uploads/2021/09/2022_YAM_YZF700R7_EU_YB_STA_001_03_preview-kopie.jpg', 'Yamaha-modellen uit de R-serie brengen al meer dan 20 jaar duizenden rijders in vervoering. Nu is er een scherp ogende toevoeging aan het assortiment die klaar is om een nieuwe generatie rijders te verwelkomen in R/World. De R7, die snel, wendbaar en knap is, biedt sportprestaties in combinatie met alledaags plezier.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bestelling`
--

DROP TABLE IF EXISTS `bestelling`;
CREATE TABLE IF NOT EXISTS `bestelling` (
  `bestelnummer` int NOT NULL AUTO_INCREMENT,
  `gebruikernummer` int NOT NULL,
  `artikelnummer` int NOT NULL,
  PRIMARY KEY (`bestelnummer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

DROP TABLE IF EXISTS `klanten`;
CREATE TABLE IF NOT EXISTS `klanten` (
  `gebruikernummer` int NOT NULL AUTO_INCREMENT,
  `naam` text NOT NULL,
  `voornaam` text NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `wachtwoord` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`gebruikernummer`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `klanten`
--

INSERT INTO `klanten` (`gebruikernummer`, `naam`, `voornaam`, `admin`, `wachtwoord`, `email`) VALUES
(21, 'nauwelaerts', 'xander', 1, 'hallo', 'xnauwelaerts@gmail.com'),
(2, 'Casper', 'Nauwelaerts', 1, 'ikkeendendikke', 'casper.nauwelaerts@gmail.com'),
(3, 'jkgid', 'jaaaaasper', 0, 'gello', 'jaaaaaaasper@hotmail.com'),
(5, 'hallo', 'joske', 0, 'kbenmoris', 'moris@gmail.com'),
(14, 'yamaha r6', 'sdgsdsdg', 0, 'ggsdfs', 'uhbdsfn@hotmail.com'),
(15, 'xander', 'kv nbv', 0, 'xander@dlg', 'shfbv@gmail.com'),
(16, 'bbb', 'jasper', 0, 'jfdsfn', 'aaa@hotmail'),
(17, 'bbb', 'jasper', 0, 'jfdsfn', 'aaa@hotmail'),
(18, 'bbb', 'jasper', 0, 'jfdsfn', 'aaa@hotmail'),
(19, 'xander', 'sdgsdsdg', 0, 'sguvbh', 'aaa@hotmail'),
(20, 'xander', 'jasper', 0, 'hbsddqd', 'aaa@hotmail'),
(22, 'nauwelaerts', 'casper', 0, 'hallo', 'casper.nauwelaerts@bazandpoort.be'),
(24, 'caper', 'casper', 1, 'capper', 'moris@gmail.com'),
(25, 'xander', 'sdgsdsdg', 0, 'hallo', 'moris@gmail.com'),
(26, 'xander', 'sdgsdsdg', 1, 'sdfs', 'moris@gmail.com');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkel`
--

DROP TABLE IF EXISTS `winkel`;
CREATE TABLE IF NOT EXISTS `winkel` (
  `gebruikersnummer` int NOT NULL AUTO_INCREMENT,
  `artikelnummer` int NOT NULL,
  `afbeelding` text NOT NULL,
  `artikelnaam` text NOT NULL,
  `prijs` int NOT NULL,
  `aantal` int NOT NULL,
  PRIMARY KEY (`gebruikersnummer`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkelkar`
--

DROP TABLE IF EXISTS `winkelkar`;
CREATE TABLE IF NOT EXISTS `winkelkar` (
  `gebruikernummer` int NOT NULL,
  `artikelnummer` int NOT NULL,
  `afbeelding` text NOT NULL,
  `artikelnaam` text NOT NULL,
  `prijs` int NOT NULL,
  `aantal` int NOT NULL,
  PRIMARY KEY (`gebruikernummer`,`artikelnummer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `winkelkar`
--

INSERT INTO `winkelkar` (`gebruikernummer`, `artikelnummer`, `afbeelding`, `artikelnaam`, `prijs`, `aantal`) VALUES
(21, 2, 'https://img.etimg.com/thumb/msid-46917228,width-640,resizemode-4,imgsize-206972/yamaha-launches-yzf-r1m-in-india-priced-at-rs-29-43-lakh.jpg', 'Yamaha R1M', 27905, 3),
(21, 4, 'https://global-fs.webike-cdn.net/moto_img/cg/8/7859/L_11bcd16b3cf0e22121d61f094a.jpg', 'yamaha r6', 14299, 4);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkeltest`
--

DROP TABLE IF EXISTS `winkeltest`;
CREATE TABLE IF NOT EXISTS `winkeltest` (
  `gebruikernummer` int NOT NULL,
  `artikelnummer` int NOT NULL,
  `afbeelding` text NOT NULL,
  `artikelnaam` text NOT NULL,
  `prijs` int NOT NULL,
  `aantal` int NOT NULL,
  PRIMARY KEY (`gebruikernummer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
