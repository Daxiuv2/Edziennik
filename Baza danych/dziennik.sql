-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 29 Maj 2023, 19:13
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
-- Struktura tabeli dla tabeli `nauczyciel`
--

DROP TABLE IF EXISTS `nauczyciel`;
CREATE TABLE IF NOT EXISTS `nauczyciel` (
  `id_nauczyciela` int NOT NULL,
  `imie` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nazwisko` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nazwa_uzytkownika` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `haslo` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `zalogowany` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_nauczyciela`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `nauczyciel`
--

INSERT INTO `nauczyciel` (`id_nauczyciela`, `imie`, `nazwisko`, `email`, `nazwa_uzytkownika`, `haslo`, `zalogowany`) VALUES
(0, 'Marcin', 'Bąk', 'm.bak@szkola.pl', 'mbak', 'mbak', 0),
(1, 'Dmytro', 'Domański', 'd.domanski@szkola.pl', 'ddomanski', 'ddomanski', 0),
(2, 'Weronika', 'Dobrowolska', NULL, 'wdobrowolska', 'wdobrowolska', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ocena`
--

DROP TABLE IF EXISTS `ocena`;
CREATE TABLE IF NOT EXISTS `ocena` (
  `id_oceny` int NOT NULL,
  `id_ucznia` int NOT NULL,
  `ocena` float NOT NULL,
  `opis` varchar(1000) COLLATE utf8mb4_general_ci NOT NULL,
  `id_przedmiotu` int NOT NULL,
  `id_nauczyciela` int NOT NULL,
  `data_otrzymania` date NOT NULL,
  `uczen_id_ucznia` int NOT NULL,
  `przedmiot_id_przedmiotu` int NOT NULL,
  `nauczyciel_id_nauczyciela` int NOT NULL,
  PRIMARY KEY (`id_oceny`),
  KEY `ocena_nauczyciel_fk` (`nauczyciel_id_nauczyciela`),
  KEY `ocena_przedmiot_fk` (`przedmiot_id_przedmiotu`),
  KEY `ocena_uczen_fk` (`uczen_id_ucznia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczen`
--

DROP TABLE IF EXISTS `uczen`;
CREATE TABLE IF NOT EXISTS `uczen` (
  `id_ucznia` int NOT NULL,
  `imie` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nazwisko` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `pesel` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `nazwa_uzytkownika` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `haslo` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `zalogowany` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ucznia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uczen`
--

INSERT INTO `uczen` (`id_ucznia`, `imie`, `nazwisko`, `pesel`, `nazwa_uzytkownika`, `haslo`, `zalogowany`) VALUES
(0, 'Waldemar', 'Mazur', '37031617055', 'wmazur', 'wmazur', 0),
(1, 'Melania', 'Pająk', '98052063643', 'mpajak', 'mpajak', 0),
(2, 'Albin', 'Chojnacki', '81050437374', 'achojniacki', 'achojniacki', 0),
(3, 'Zygfryd', 'Kot', '69052331070', 'zkot', 'zkot', 0),
(4, 'Paula', 'Krajewska', '45081856340', 'pkrajewska', 'pkrajewska', 0),
(5, 'Remigiusz', 'Żak', '52021164214', 'rzak', 'rzak', 0),
(6, 'Oliver', 'Czajka', '11291152974', 'oczajka', 'oczajka', 0),
(7, 'Aleks', 'Kowalik', '05241732257', 'akowalik', 'akowalik', 0),
(8, 'Eliza', 'Orzechowska', '12280991169', 'eorzechowska', 'eorzechowska', 0),
(9, 'Martyna', 'Malinowska', '01282216668', 'mmalinowska', 'mmalinowska', 0),
(10, 'Maja', 'Zalewska', '94012656643', 'mzalewska', 'mzalewska', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
