-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 18 Maj 2023, 19:22
-- Wersja serwera: 8.0.31
-- Wersja PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dziennik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmiot`
--

DROP TABLE IF EXISTS `przedmiot`;
CREATE TABLE IF NOT EXISTS `przedmiot` (
  `id_przedmiotu` int NOT NULL,
  `nazwa` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_przedmiotu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `przedmiot`
--

INSERT INTO `przedmiot` (`id_przedmiotu`, `nazwa`) VALUES
(0, 'Matematyka'),
(1, 'Język polski'),
(2, 'Język angielski'),
(3, 'Informatyka'),
(4, 'Historia'),
(5, 'Geografia'),
(6, 'Wychowanie fizyczne'),
(7, 'Religia'),
(8, 'Język niemiecki'),
(9, 'Biologia'),
(10, 'Chemia'),
(11, 'Fizyka');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
