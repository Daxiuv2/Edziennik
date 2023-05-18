-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `uczen`;
CREATE TABLE IF NOT EXISTS `uczen` (
  `id_ucznia` int NOT NULL,
  `imie` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nazwisko` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `pesel` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `login` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `haslo` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_ucznia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `uczen` (`id_ucznia`, `imie`, `nazwisko`, `pesel`, `login`, `haslo`) VALUES
(0, 'Waldemar', 'Mazur', '37031617055', 'wmazur', 'wmazur'),
(1, 'Melania', 'Pająk', '98052063643', 'mpajak', 'mpajak'),
(2, 'Albin', 'Chojnacki', '81050437374', 'achojniacki', 'achojniacki'),
(3, 'Zygfryd', 'Kot', '69052331070', 'zkot', 'zkot'),
(4, 'Paula', 'Krajewska', '45081856340', 'pkrajewska', 'pkrajewska'),
(5, 'Remigiusz', 'Żak', '52021164214', 'rzak', 'rzak'),
(6, 'Oliver', 'Czajka', '11291152974', 'oczajka', 'oczajka'),
(7, 'Aleks', 'Kowalik', '05241732257', 'akowalik', 'akowalik'),
(8, 'Eliza', 'Orzechowska', '12280991169', 'eorzechowska', 'eorzechowska'),
(9, 'Martyna', 'Malinowska', '01282216668', 'mmalinowska', 'mmalinowska'),
(10, 'Maja', 'Zalewska', '94012656643', 'mzalewska', 'mzalewska');
COMMIT;