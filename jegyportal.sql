-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 10. 17:07
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `jegyportal`
--

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
(85, 105, 36, 3),
(86, 106, 37, 1),
(87, 107, 36, 2),
(88, 108, 37, 2),
(89, 109, 37, 3),
(90, 110, 37, 4),
(91, 113, 17, 3),
(92, 114, 17, 3),
(93, 116, 17, 4),
(94, 119, 43, 3),
(95, 120, 43, 2),
(96, 121, 49, 2),
(97, 121, 49, 2),
(98, 122, 43, 2),
(99, 123, 37, 2),
(100, 125, 43, 2),
(101, 126, 43, 2),
(102, 127, 35, 2),
(103, 128, 35, 5),
(104, 129, 37, 1),
(105, 130, 38, 2),
(106, 131, 43, 2),
(107, 132, 35, 4),
(108, 137, 43, 2),
(109, 138, 43, 2),
(110, 139, 35, 2),
(111, 140, 35, 3),
(112, 141, 35, 2),
(113, 142, 35, 3),
(114, 143, 38, 2),
(115, 144, 35, 4),
(116, 145, 35, 4),
(117, 147, 35, 1),
(118, 148, 35, 3),
(119, 149, 38, 4),
(120, 150, 38, 2),
(121, 151, 38, 3),
(122, 152, 38, 3),
(123, 152, 38, 3),
(124, 152, 38, 3),
(125, 152, 38, 3),
(126, 153, 35, 3),
(127, 154, 38, 2),
(128, 155, 35, 1),
(129, 156, 38, 3),
(130, 157, 38, 1),
(131, 158, 38, 3),
(132, 159, 38, 3),
(133, 160, 38, 1),
(134, 161, 38, 1),
(135, 162, 38, 1),
(136, 163, 43, 1),
(137, 164, 38, 1),
(138, 165, 38, 3),
(139, 166, 43, 1),
(140, 166, 43, 1),
(141, 167, 49, 1),
(142, 168, 43, 1),
(143, 169, 43, 2),
(144, 170, 38, 4),
(145, 171, 38, 1),
(146, 172, 43, 1),
(147, 173, 43, 1),
(148, 174, 43, 1),
(149, 175, 43, 1),
(150, 176, 39, 2),
(151, 177, 53, 2),
(152, 178, 43, 1),
(153, 179, 43, 1),
(154, 180, 43, 1),
(155, 181, 53, 1),
(156, 182, 53, 3),
(157, 183, 53, 3),
(158, 184, 53, 1),
(159, 185, 53, 1),
(160, 186, 53, 1),
(161, 187, 53, 1),
(162, 188, 53, 1),
(163, 189, 53, 1),
(164, 190, 53, 1),
(165, 191, 43, 1),
(166, 192, 43, 1),
(167, 193, 53, 1),
(168, 194, 53, 1),
(169, 195, 43, 1),
(170, 196, 38, 1),
(171, 197, 43, 1),
(172, 198, 43, 4);

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
(17, 49, 'Bérlet', 29982, 15000),
(35, 53, 'Helyszíni', 236, 2000),
(36, 51, 'Super Early Bird', 0, 2500),
(37, 51, 'Early Bird ', 0, 3000),
(38, 51, 'Elővételes 1', 0, 3500),
(39, 51, 'Elővételes 2', 98, 4000),
(40, 51, 'Elővételes 3', 100, 4500),
(43, 52, 'Early Bird Ülőjegy', 220, 4990),
(44, 52, 'Elővételes Ülőjegy', 298, 5990),
(49, 60, 'Normál', 0, 11900),
(50, 62, 'DE DIÁK', 250, 1000),
(51, 62, 'KÜLSŐS', 250, 1500),
(52, 56, 'Patriknak', 0, 10),
(53, 60, 'pelda', 82, 1000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `qr`
--

CREATE TABLE `qr` (
  `qr_id` int(11) NOT NULL,
  `qr_eladott_id` int(11) NOT NULL,
  `qr_code` text COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `qr`
--

INSERT INTO `qr` (`qr_id`, `qr_eladott_id`, `qr_code`) VALUES
(72, 85, 'qr618a403e1a1fa'),
(73, 141, 'qr618a40b6c0e9e'),
(74, 142, 'qr618a42d30972d'),
(75, 143, 'qr618a42e8d0782'),
(76, 143, 'qr618a42e8d0782'),
(77, 143, 'qr618a42e8d0782'),
(78, 144, 'qr618a439aaed5b'),
(79, 144, 'qr618a439ab01e8'),
(80, 144, 'qr618a439ab0b9d'),
(81, 144, 'qr618a439ab22c6'),
(82, 144, 'qr618a439ab2cf6'),
(83, 145, 'qr618a44f715cc0'),
(84, 146, 'qr618a45ce1bba4'),
(85, 147, 'qr618a45f525087'),
(86, 148, 'qr618a46556fc32'),
(87, 149, 'qr618a48d00750f'),
(88, 150, 'qr618aa9c55275d'),
(89, 150, 'qr618aa9c553209'),
(90, 151, 'qr618ab15b9b673'),
(91, 151, 'qr618ab15b9bc1e'),
(92, 152, 'qr618ab1b28d42c'),
(93, 153, 'qr618ab26d604ec'),
(94, 154, 'qr618ab2fe43783'),
(95, 155, 'qr618ab3e546d65'),
(96, 156, 'qr618ab482bc339'),
(97, 156, 'qr618ab482bc864'),
(98, 156, 'qr618ab482bcd5c'),
(99, 157, 'qr618ab58e68af1'),
(100, 157, 'qr618ab58e69a0d'),
(101, 157, 'qr618ab58e69f87'),
(102, 158, 'qr618ab5d1b9229'),
(103, 159, 'qr618ab637f2096'),
(104, 160, 'qr618ab66235bd5'),
(105, 161, 'qr618ab81787018'),
(106, 162, 'qr618ab899638de'),
(107, 163, 'qr618baba5ea966'),
(108, 164, 'qr618bac16e6b57'),
(109, 165, 'qr618bac4cb39fe'),
(110, 166, 'qr618bad7471308'),
(111, 167, 'qr618baea7578a2'),
(112, 168, 'qr618baef607c9d'),
(113, 169, 'qr618baf828b522'),
(114, 170, 'qr618bb46151a4d'),
(115, 171, 'qr618bb68126145'),
(116, 172, 'qr618bb68e6e62e'),
(117, 172, 'qr618bb68e6f034'),
(118, 172, 'qr618bb68e6fa86'),
(119, 172, 'qr618bb68e705c8');

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
(65, 'Kovács József Márk', 'Hajdúböszörmény Budai-Nagy Antal 10'),
(66, 'lol', 'lol'),
(67, 'lol', 'lol'),
(68, 'lol', 'lol'),
(69, 'Patrik', 'Mickolc acelvaros'),
(70, 'lol', '34343'),
(71, 'Patrik', '12312'),
(72, 'dani ', 'vok'),
(73, 'Patrik', 'dnai'),
(74, 'Patrik', '34343'),
(75, 'Patrik', 'lol'),
(76, 'Patrik', 'Mickolc acelvaros'),
(77, 'lol', 'lol'),
(78, 'Patrik', 'Mickolc acelvaros'),
(79, 'Patrik', 'Mickolc acelvaros'),
(80, 'tesztelek1', 'tesztelek1jeggyel'),
(81, 'tesztelek1', 'tesztelek1jeggyel'),
(82, 'tesztelek1', 'tesztelek1jeggyel'),
(83, 'tesztelek1', 'tesztelek1jeggyel'),
(84, 'Patrik', 'tesztelek1jeggyel'),
(85, 'tesztelek1', 'tesztelek1jeggyel'),
(86, 'tesztelek2', 'tesztelek2jeggyel'),
(87, 'tesztelek2', 'tesztelek2jeggyel'),
(88, 'tesztelek2', 'tesztelek2jeggyel'),
(89, 'tesztelek2', 'tesztelek2jeggyel'),
(90, 'tesztelek2', 'tesztelek2jeggyel'),
(91, 'tesztelek2', 'tesztelek2jeggyel'),
(92, 'tesztelek2', 'tesztelek2jeggyel'),
(93, 'tesztelek1', 'Mickolc acelvaros'),
(94, 'tesztelek2', 'tesztelek2jeggyel'),
(95, 'tesztelek2', 'tesztelek4eggyel'),
(96, 'tesztelek2', 'tesztelek3jeggyel'),
(97, 'tesztelek5', 'tesztelek2jeggyel'),
(98, 'tesztelek5', 'Mickolc acelvaros'),
(99, 'Patrik', 'tesztelek2jeggyel'),
(100, 'tesztelek2', 'tesztelek1jeggyel'),
(101, 'tesztelek2', 'tesztelek2jeggyel'),
(102, 'tesztelek3', 'tesztelek2jeggyel'),
(103, 'tesztelek2', '12312'),
(104, 'Patrik', 'tesztelek2jeggyel'),
(105, 'tesztelek2', 'Mickolc acelvaros'),
(106, 'Patrik', 'tesztelek2jeggyel'),
(107, 'tesztelek2', 'Mickolc acelvaros'),
(108, 'tesztelek2', 'Mickolc acelvaros'),
(109, 'tesztelek2', 'tesztelek2jeggyel'),
(110, 'tesztelek1', 'Mickolc acelvaros'),
(111, 'Patrik', 'Mickolc acelvaros'),
(112, 'tesztelek2', 'tesztelek2jeggyel'),
(113, 'tesztelek2', 'tesztelek1jeggyel'),
(114, 'Patrikasd', 'dsa'),
(115, 'tesztelek2', 'lol'),
(116, 'Patrik', 'lol'),
(117, 'Patrik', 'Mickolc acelvaros'),
(118, 'tesztelek2', 'tesztelek2jeggyel'),
(119, 'tesztelek2', 'tesztelek2jeggyel'),
(120, 'tesztelek2', 'tesztelek2jeggyel'),
(121, 'tesztelek2', 'tesztelek2jeggyel'),
(122, 'tesztelek2', 'tesztelek2jeggyel'),
(123, 'tesztelek2', 'tesztelek2jeggyel'),
(124, 'tesztelek2', 'tesztelek2jeggyel'),
(125, 'lol', 'tesztelek2jeggyel'),
(126, 'tesztelek2', 'tesztelek2jeggyel'),
(127, 'tesztelek2', 'tesztelek2jeggyel'),
(128, 'dani ', 'tesztelek2jeggyel'),
(129, 'lol', 'lol'),
(130, 'tesztelek1', '34343'),
(131, 'tesztelek5', '12312'),
(132, 'tesztelek1', 'lol'),
(133, 'tesztelek2', 'tesztelek2jeggyel'),
(134, 'tesztelek2', 'tesztelek2jeggyel'),
(135, 'tesztelek2', 'Mickolc acelvaros'),
(136, 'tesztelek2', 'tesztelek2jeggyel'),
(137, 'tesztelek2', 'tesztelek2jeggyel'),
(138, 'tesztelek2', 'tesztelek2jeggyel'),
(139, 'Patrik', 'tesztelek2jeggyel'),
(140, 'tesztelek2', 'tesztelek1jeggyel'),
(141, 'tesztelek2', 'tesztelek2jeggyel'),
(142, 'tesztelek2', 'tesztelek2jeggyel'),
(143, 'tesztelek2', 'lol'),
(144, 'tesztelek2', 'tesztelek1jeggyel'),
(145, 'tesztelek1', 'tesztelek2jeggyel'),
(146, 'tesztelek2', 'lol'),
(147, 'tesztelek2', 'tesztelek2jeggyel'),
(148, 'tesztelek2', 'tesztelek2jeggyel'),
(149, 'tesztelek2', 'tesztelek1jeggyel'),
(150, 'Patrik', 'tesztelek2jeggyel'),
(151, 'sd', 'asd'),
(152, 'tesztelek2', 'Mickolc acelvaros'),
(153, 'tesztelek2', 'tesztelek2jeggyel'),
(154, 'tesztelek2', 'tesztelek2jeggyel'),
(155, 'tesztelek2', 'tesztelek2jeggyel'),
(156, 'tesztelek2', 'tesztelek2jeggyel'),
(157, 'tesztelek2', 'tesztelek1jeggyel'),
(158, 'Patrik', 'tesztelek2jeggyel'),
(159, 'tesztelek1', 'Mickolc acelvaros'),
(160, 'tesztelek2', 'tesztelek2jeggyel'),
(161, 'tesztelek2', 'tesztelek2jeggyel'),
(162, 'tesztelek2', 'Mickolc acelvaros'),
(163, 'tesztelek2', 'Mickolc acelvaros'),
(164, 'Patrik', 'tesztelek2jeggyel'),
(165, 'Patrik', 'tesztelek2jeggyel'),
(166, 'tesztelek2', 'tesztelek2jeggyel'),
(167, 'tesztelek2', 'tesztelek2jeggyel'),
(168, 'tesztelek2', 'tesztelek2jeggyel'),
(169, 'Patrik', 'tesztelek1jeggyel'),
(170, 'tesztelek2', 'Mickolc acelvaros'),
(171, 'tesztelek2', 'tesztelek2jeggyel'),
(172, 'tesztelek2', 'Mickolc acelvaros'),
(173, 'tesztelek2', 'Mickolc acelvaros'),
(174, 'tesztelek2', 'tesztelek2jeggyel'),
(175, 'tesztelek2', 'tesztelek2jeggyel'),
(176, 'Nánási Barnus', 'Mickolc acelvaros'),
(177, 'lol', 'tesztelek2jeggyel'),
(178, 'Patrik', 'tesztelek2jeggyel'),
(179, 'tesztelek2', 'Mickolc acelvaros'),
(180, 'tesztelek1', 'tesztelek2jeggyel'),
(181, 'tesztelek2', 'tesztelek2jeggyel'),
(182, 'tesztelek2', 'Mickolc acelvaros'),
(183, 'tesztelek2', 'tesztelek2jeggyel'),
(184, 'tesztelek2', 'Mickolc acelvaros'),
(185, 'tesztelek2', 'Mickolc acelvaros'),
(186, 'tesztelek2', 'Mickolc acelvaros'),
(187, 'tesztelek2', 'tesztelek2jeggyel'),
(188, 'tesztelek2', 'Mickolc acelvaros'),
(189, 'Patrik', 'tesztelek2jeggyel'),
(190, 'Patrik', 'tesztelek2jeggyel'),
(191, 'tesztelek2', 'Mickolc acelvaros'),
(192, 'tesztelek1', 'tesztelek2jeggyel'),
(193, 'tesztelek2', 'Mickolc acelvaros'),
(194, 'tesztelek2', 'tesztelek2jeggyel'),
(195, 'tesztelek2', 'tesztelek2jeggyel'),
(196, 'tesztelek2', 'tesztelek2jeggyel'),
(197, 'tesztelek2', 'tesztelek2jeggyel'),
(198, 'tesztelek2', 'tesztelek2jeggyel');

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
-- A tábla indexei `qr`
--
ALTER TABLE `qr`
  ADD PRIMARY KEY (`qr_id`),
  ADD KEY `qr_eladott_id` (`qr_eladott_id`);

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
  MODIFY `eladott_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

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
  MODIFY `jegyek_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT a táblához `qr`
--
ALTER TABLE `qr`
  MODIFY `qr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT a táblához `tipus`
--
ALTER TABLE `tipus`
  MODIFY `tipus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `vasarlo`
--
ALTER TABLE `vasarlo`
  MODIFY `vasarlo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

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

--
-- Megkötések a táblához `qr`
--
ALTER TABLE `qr`
  ADD CONSTRAINT `qr_ibfk_1` FOREIGN KEY (`qr_eladott_id`) REFERENCES `eladott` (`eladott_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
