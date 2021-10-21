-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Feb 25. 13:54
-- Kiszolgáló verziója: 10.1.19-MariaDB
-- PHP verzió: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `jegyportal`
--
CREATE DATABASE IF NOT EXISTS `jegyportal` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `jegyportal`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `eladott`
--

CREATE TABLE `eladott` (
  `eladott_id` int(11) NOT NULL,
  `eladott_vasarlo_id` int(11) NOT NULL,
  `eladott_jegyek_id` int(11) NOT NULL,
  `eladott_jegyek_db` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `eladott`
--

INSERT INTO `eladott` (`eladott_id`, `eladott_vasarlo_id`, `eladott_jegyek_id`, `eladott_jegyek_db`) VALUES
(46, 58, 43, 5),
(47, 59, 36, 3),
(48, 60, 17, 2),
(49, 61, 49, 1),
(50, 62, 36, 4),
(51, 63, 49, 4),
(52, 64, 49, 4),
(53, 65, 17, 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `esemeny`
--

CREATE TABLE `esemeny` (
  `esemeny_id` int(11) NOT NULL,
  `esemeny_nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `esemeny_helyszin_id` int(11) NOT NULL,
  `esemeny_datum` date NOT NULL,
  `esemeny_kep` varchar(75) COLLATE utf8_hungarian_ci NOT NULL,
  `esemeny_tipus_id` int(11) NOT NULL,
  `szervezo_id` int(11) NOT NULL,
  `zartkoru` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `esemeny`
--

INSERT INTO `esemeny` (`esemeny_id`, `esemeny_nev`, `esemeny_helyszin_id`, `esemeny_datum`, `esemeny_kep`, `esemeny_tipus_id`, `szervezo_id`, `zartkoru`) VALUES
(49, 'Campus Fesztivál', 3, '2020-07-22', '67787254_10156586646247781_6617577900486950912_o.jpg', 6, 5, 0),
(51, 'XXL pres. Maxie Devine (It)', 4, '2020-03-14', '81025990_1043116166069160_6004006663651065856_n.jpg', 3, 1, 0),
(52, 'Kökény Attila & Ruszó Tibi Koncert', 8, '2020-03-07', '81930691_146569760121088_1987032070777470976_n.jpg', 2, 6, 0),
(53, 'Underground Production Pres.// Victoria Franches & Marco Ginelli', 2, '2020-03-20', '83697098_2816934101697227_7396199915849777152_n.jpg', 3, 3, 0),
(55, 'Sofar Debrecen Special: Meadows (SWE)', 9, '2020-05-09', '81869483_1265280377001173_7129259533670547456_o.jpg', 2, 1, 0),
(56, 'Ricsárdgír & Szabó Benedek és a Galaxisok', 9, '2020-04-25', '83381546_2691261740967675_3430441214548115456_o.jpg', 2, 1, 0),
(57, 'Retro Torony 2020', 3, '2020-08-29', '69584769_2448285108552613_2843661665877098496_o.jpg', 3, 5, 0),
(58, 'Csányi Sándor színházi estje: Hogyan értsük félre a nőket?', 8, '2020-03-21', '85030234_3323773760982911_1904976295385628672_n.png', 4, 6, 0),
(59, 'Az én sztorim / Ördög Nóra & Nánási Pál', 8, '2020-04-02', '83172628_10156555615120810_1746283460026171392_o.jpg', 4, 6, 0),
(60, 'Paparazzi Gastronomy Tour | Debrecen Város Borai', 10, '2020-02-20', '84123767_713894549141260_4758021983768150016_o.jpg', 5, 1, 0),
(61, 'Mariposas Konnekt.- Easter Madness', 5, '2020-04-11', '84692799_2814106565299675_4311145724839460864_o.jpg', 3, 1, 0),
(62, 'Záróbuli / Willcox / • Kazánház Egyetemi Klub', 7, '2020-05-13', '83108462_2998545073491946_2976986719284363264_o.jpg', 3, 1, 1),
(63, 'IV. Rozé Torony / Rozé és Habzóbor Fesztivál', 3, '2020-05-15', '87154697_2817802601600860_926051616816103424_o.jpg', 6, 5, 0);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `felhasznalo_id` int(11) NOT NULL,
  `felhasznalo_nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `felhasznalo_jelszo` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `felhasznalo_rang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`felhasznalo_id`, `felhasznalo_nev`, `felhasznalo_jelszo`, `felhasznalo_rang`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2),
(2, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 0),
(3, 'sayhello', '981fe96ed23ad8b9554cfeea38cd334a', 1),
(4, 'pappdaniel2001', '612b3e2a4a502061e95b970fe5cd971f', 1),
(5, 'viztorony', 'f9b163597bfe53920a0c643115c4a6e9', 1),
(6, 'lovarda', '700eca46f33e78c6a7b2840566b952ac', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `helyszin`
--

CREATE TABLE `helyszin` (
  `helyszin_id` int(11) NOT NULL,
  `helyszin_nev` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `helyszin`
--

INSERT INTO `helyszin` (`helyszin_id`, `helyszin_nev`) VALUES
(1, ''),
(2, 'Say Hello'),
(3, 'Nagyerdei víztorony'),
(4, 'HALL'),
(5, 'Egoist BarClub'),
(6, 'My Friends Club'),
(7, 'Kazánház Egyetemi Klub'),
(8, 'Lovarda'),
(9, 'Roncsbár'),
(10, 'Paparazzi Kitchen & Bar');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jegyek`
--

CREATE TABLE `jegyek` (
  `jegyek_id` int(11) NOT NULL,
  `esemeny_id` int(11) NOT NULL,
  `jegyek_tipus` varchar(25) COLLATE utf8_hungarian_ci NOT NULL,
  `jegyek_darab` int(11) NOT NULL,
  `jegyek_ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `jegyek`
--

INSERT INTO `jegyek` (`jegyek_id`, `esemeny_id`, `jegyek_tipus`, `jegyek_darab`, `jegyek_ar`) VALUES
(17, 49, 'Bérlet', 29994, 15000),
(35, 53, 'Helyszíni', 300, 2000),
(36, 51, 'Super Early Bird', 13, 2500),
(37, 51, 'Early Bird ', 20, 3000),
(38, 51, 'Elővételes 1', 50, 3500),
(39, 51, 'Elővételes 2', 100, 4000),
(40, 51, 'Elővételes 3', 100, 4500),
(43, 52, 'Early Bird Ülőjegy', 295, 4990),
(44, 52, 'Elővételes Ülőjegy', 300, 5990),
(49, 60, 'Normál', 21, 11900),
(50, 62, 'DE DIÁK', 250, 1000),
(51, 62, 'KÜLSŐS', 250, 1500);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tipus`
--

CREATE TABLE `tipus` (
  `tipus_id` int(11) NOT NULL,
  `tipus_nev` varchar(15) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `tipus`
--

INSERT INTO `tipus` (`tipus_id`, `tipus_nev`) VALUES
(1, ''),
(2, 'Koncert'),
(3, 'Party'),
(4, 'Előadás'),
(5, 'Gasztro'),
(6, 'Fesztivál');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `vasarlo`
--

CREATE TABLE `vasarlo` (
  `vasarlo_id` int(11) NOT NULL,
  `vasarlo_nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `vasarlo_lakcim` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `vasarlo`
--

INSERT INTO `vasarlo` (`vasarlo_id`, `vasarlo_nev`, `vasarlo_lakcim`) VALUES
(58, 'Kovács József Márk', 'Hajdúböszörmény Budai-Nagy Antal 10'),
(59, 'Veres Marcell Áron', 'Téglás Alkotmány 30/c'),
(60, 'Hajzer Péter', 'Debrecen Füredi 65'),
(61, 'Éles Sándor', 'Hajdúsámson Árpád 150'),
(62, 'Czigle Attila', 'Debrecen Borsika 78'),
(63, 'Czigle Attila', 'Debrecen Borsika 78'),
(64, 'Hajzer Péter', 'Debrecen Füredi 65'),
(65, 'Kovács József Márk', 'Hajdúböszörmény Budai-Nagy Antal 10');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `eladott`
--
ALTER TABLE `eladott`
  ADD PRIMARY KEY (`eladott_id`),
  ADD KEY `eladott_jegyek_id` (`eladott_jegyek_id`),
  ADD KEY `eladott_ibfk_2` (`eladott_vasarlo_id`);

--
-- A tábla indexei `esemeny`
--
ALTER TABLE `esemeny`
  ADD PRIMARY KEY (`esemeny_id`),
  ADD KEY `esemeny_helyszin_id` (`esemeny_helyszin_id`),
  ADD KEY `esemeny_tipus_id` (`esemeny_tipus_id`),
  ADD KEY `szervezo_id` (`szervezo_id`);

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`felhasznalo_id`);

--
-- A tábla indexei `helyszin`
--
ALTER TABLE `helyszin`
  ADD PRIMARY KEY (`helyszin_id`);

--
-- A tábla indexei `jegyek`
--
ALTER TABLE `jegyek`
  ADD PRIMARY KEY (`jegyek_id`),
  ADD KEY `esemeny_id` (`esemeny_id`);

--
-- A tábla indexei `tipus`
--
ALTER TABLE `tipus`
  ADD PRIMARY KEY (`tipus_id`);

--
-- A tábla indexei `vasarlo`
--
ALTER TABLE `vasarlo`
  ADD PRIMARY KEY (`vasarlo_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `eladott`
--
ALTER TABLE `eladott`
  MODIFY `eladott_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT a táblához `esemeny`
--
ALTER TABLE `esemeny`
  MODIFY `esemeny_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT a táblához `felhasznalo`
--
ALTER TABLE `felhasznalo`
  MODIFY `felhasznalo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT a táblához `helyszin`
--
ALTER TABLE `helyszin`
  MODIFY `helyszin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT a táblához `jegyek`
--
ALTER TABLE `jegyek`
  MODIFY `jegyek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT a táblához `tipus`
--
ALTER TABLE `tipus`
  MODIFY `tipus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT a táblához `vasarlo`
--
ALTER TABLE `vasarlo`
  MODIFY `vasarlo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `eladott`
--
ALTER TABLE `eladott`
  ADD CONSTRAINT `eladott_ibfk_1` FOREIGN KEY (`eladott_jegyek_id`) REFERENCES `jegyek` (`jegyek_id`),
  ADD CONSTRAINT `eladott_ibfk_2` FOREIGN KEY (`eladott_vasarlo_id`) REFERENCES `vasarlo` (`vasarlo_id`);

--
-- Megkötések a táblához `esemeny`
--
ALTER TABLE `esemeny`
  ADD CONSTRAINT `esemeny_ibfk_1` FOREIGN KEY (`esemeny_helyszin_id`) REFERENCES `helyszin` (`helyszin_id`),
  ADD CONSTRAINT `esemeny_ibfk_2` FOREIGN KEY (`esemeny_tipus_id`) REFERENCES `tipus` (`tipus_id`),
  ADD CONSTRAINT `esemeny_ibfk_3` FOREIGN KEY (`szervezo_id`) REFERENCES `felhasznalo` (`felhasznalo_id`);

--
-- Megkötések a táblához `jegyek`
--
ALTER TABLE `jegyek`
  ADD CONSTRAINT `jegyek_ibfk_2` FOREIGN KEY (`esemeny_id`) REFERENCES `esemeny` (`esemeny_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
