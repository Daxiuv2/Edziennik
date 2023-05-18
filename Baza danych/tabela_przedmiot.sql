-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/

DROP TABLE IF EXISTS `przedmiot`;
CREATE TABLE IF NOT EXISTS `przedmiot` (
  `id_przedmiotu` int NOT NULL,
  `nazwa` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_przedmiotu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
