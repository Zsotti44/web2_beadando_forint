-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Okt 27. 18:02
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `web2_beadando_forint`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menus`
--

CREATE TABLE `menus` (
  `menuid` int(10) UNSIGNED NOT NULL,
  `menu_nev` varchar(255) NOT NULL,
  `view` varchar(255) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- A tábla adatainak kiíratása `menus`
--

INSERT INTO `menus` (`menuid`, `menu_nev`, `view`, `menu_title`, `role`, `parent`, `menu_order`, `active`) VALUES
(1, 'Főoldal', '/', 'Főoldal', 'none', 0, 1, 1),
(2, 'Információk', '', 'Információk', 'user', 0, 2, 1),
(3, 'Admin', 'admin', 'Adminisztráció', 'admin', 0, 3, 1),
(4, 'Teszt', 'teszt', 'Teszt', 'none', 0, 4, 1),
(6, 'Menük', '', 'Admin- Menük', 'none', 3, 1, 1),
(7, 'PDF', 'pdf', 'PDF Generátor', 'none', 0, 6, 1),
(8, 'MNB Adatszolgáltatás', 'mnb', 'MNB SOAP', 'none', 0, 7, 1),
(9, 'Adatszolgáltatás', 'mnb/mnb', 'MNB SOAP service', 'none', 8, 8, 1),
(10, 'Napi árfolyamok', 'mnb/exchangeRate', 'Árfolyam lekérdezés', 'none', 8, 9, 1),
(11, 'Havi árfolyamok', 'mnb/monthlyExchangeRate', 'Árfolyam lekérdezés', 'none', 8, 10, 1),
(12, 'Devizapárok', 'mnb/showCurrencyPair', 'Devizapárok lekérése', 'none', 8, 11, 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menuid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `menus`
--
ALTER TABLE `menus`
  MODIFY `menuid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
