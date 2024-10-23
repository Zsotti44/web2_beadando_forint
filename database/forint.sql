-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Okt 23. 10:56
-- Kiszolgáló verziója: 10.4.28-MariaDB
-- PHP verzió: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `forint`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `akod`
--

CREATE TABLE `akod` (
  `ermeid` int(4) DEFAULT NULL,
  `femid` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `akod`
--

INSERT INTO `akod` (`ermeid`, `femid`) VALUES
(1, 5),
(2, 5),
(3, 2),
(3, 3),
(3, 4),
(4, 5),
(5, 2),
(5, 3),
(6, 2),
(6, 6),
(7, 2),
(7, 3),
(8, 1),
(10, 1),
(11, 2),
(11, 3),
(11, 6),
(12, 3),
(13, 2),
(13, 3),
(14, 2),
(14, 3),
(14, 4),
(15, 3),
(16, 2),
(16, 3),
(16, 5),
(17, 2),
(17, 3),
(17, 4),
(18, 2),
(18, 3),
(19, 2),
(19, 3),
(19, 4),
(20, 2),
(20, 3),
(21, 2),
(21, 3),
(21, 4),
(22, 2),
(22, 3),
(22, 4),
(23, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `anyag`
--

CREATE TABLE `anyag` (
  `femid` int(4) NOT NULL,
  `femnev` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `anyag`
--

INSERT INTO `anyag` (`femid`, `femnev`) VALUES
(1, 'Ezüst'),
(2, 'Réz'),
(3, 'Nikkel'),
(4, 'Cink'),
(5, 'Alumínium'),
(6, 'Ón');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `erme`
--

CREATE TABLE `erme` (
  `ermeid` int(4) NOT NULL,
  `cimlet` int(6) DEFAULT NULL,
  `tomeg` decimal(4,2) DEFAULT NULL,
  `darab` int(11) DEFAULT NULL,
  `kiadas` date DEFAULT NULL,
  `bevonas` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `erme`
--

INSERT INTO `erme` (`ermeid`, `cimlet`, `tomeg`, `darab`, `kiadas`, `bevonas`) VALUES
(1, 1, 1.50, 227158000, '1946-08-01', '1995-06-30'),
(2, 1, 1.40, 431890120, '1967-05-12', '1995-06-30'),
(3, 1, 2.05, 483371015, '1993-03-29', '2008-02-28'),
(4, 2, 2.80, 13500000, '1946-08-01', '1951-11-30'),
(5, 2, 5.00, 57528000, '1950-01-20', '1971-06-30'),
(6, 2, 4.44, 303208159, '1970-07-01', '1995-06-30'),
(7, 2, 3.10, 467772105, '1993-03-29', '2008-02-28'),
(8, 5, 20.00, 39802, '1946-08-01', '1977-06-30'),
(10, 5, 12.00, 10004252, '1947-05-19', '1977-06-30'),
(11, 5, 7.40, 20029200, '1967-05-12', '1972-06-30'),
(12, 5, 5.73, 58284387, '1971-08-02', '1987-03-31'),
(13, 5, 5.00, 109668035, '1983-04-18', '1995-06-30'),
(14, 5, 4.20, 197772300, '1993-06-21', NULL),
(15, 10, 8.83, 66130376, '1971-06-01', '1987-03-31'),
(16, 10, 6.10, 108330025, '1983-04-18', '1995-06-30'),
(17, 10, 6.10, 158688505, '1993-06-21', NULL),
(18, 20, 7.06, 108792015, '1983-04-18', '1995-06-30'),
(19, 20, 6.90, 171477005, '1993-03-29', NULL),
(20, 50, 7.70, 65406505, '1993-03-29', NULL),
(21, 100, 9.40, 42573505, '1993-06-21', '1998-12-31'),
(22, 100, 8.00, 155073000, '1996-10-21', NULL),
(23, 200, 12.00, 11250014, '1992-12-01', '1998-04-03');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `id` int(4) NOT NULL,
  `felhNev` varchar(32) NOT NULL,
  `jelszo` varchar(255) NOT NULL,
  `jog` tinyint(3) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tervezo`
--

CREATE TABLE `tervezo` (
  `tid` int(1) NOT NULL,
  `nev` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `tervezo`
--

INSERT INTO `tervezo` (`tid`, `nev`) VALUES
(1, 'Bognár György'),
(2, 'Kósa István'),
(3, 'Bartos István'),
(4, 'Farkas Boldogfai Sándor'),
(5, 'Iván István'),
(6, 'Szabó Ferenc'),
(7, 'Berán Lajos');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tkod`
--

CREATE TABLE `tkod` (
  `ermeid` int(4) DEFAULT NULL,
  `tervezoid` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- A tábla adatainak kiíratása `tkod`
--

INSERT INTO `tkod` (`ermeid`, `tervezoid`) VALUES
(1, 5),
(2, 5),
(3, 2),
(3, 3),
(4, 7),
(5, 5),
(6, 4),
(7, 2),
(7, 3),
(8, 5),
(10, 5),
(11, 5),
(11, 6),
(12, 5),
(12, 6),
(13, 5),
(13, 6),
(14, 2),
(14, 3),
(15, 1),
(15, 4),
(16, 1),
(16, 4),
(17, 2),
(17, 3),
(18, 1),
(19, 2),
(19, 3),
(20, 2),
(20, 3),
(21, 2),
(21, 3),
(22, 2),
(23, 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `akod`
--
ALTER TABLE `akod`
  ADD UNIQUE KEY `ermeid` (`ermeid`,`femid`),
  ADD KEY `femid` (`femid`);

--
-- A tábla indexei `anyag`
--
ALTER TABLE `anyag`
  ADD PRIMARY KEY (`femid`);

--
-- A tábla indexei `erme`
--
ALTER TABLE `erme`
  ADD PRIMARY KEY (`ermeid`);

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `egyedi_felhnev` (`felhNev`);

--
-- A tábla indexei `tervezo`
--
ALTER TABLE `tervezo`
  ADD PRIMARY KEY (`tid`);

--
-- A tábla indexei `tkod`
--
ALTER TABLE `tkod`
  ADD UNIQUE KEY `ermeid` (`ermeid`,`tervezoid`),
  ADD KEY `tervezoid` (`tervezoid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalo`
--
ALTER TABLE `felhasznalo`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `akod`
--
ALTER TABLE `akod`
  ADD CONSTRAINT `akod_ibfk_1` FOREIGN KEY (`femid`) REFERENCES `anyag` (`femid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `erme`
--
ALTER TABLE `erme`
  ADD CONSTRAINT `erme_ibfk_1` FOREIGN KEY (`ermeid`) REFERENCES `akod` (`ermeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `tkod`
--
ALTER TABLE `tkod`
  ADD CONSTRAINT `tkod_ibfk_1` FOREIGN KEY (`ermeid`) REFERENCES `erme` (`ermeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tkod_ibfk_2` FOREIGN KEY (`tervezoid`) REFERENCES `tervezo` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
