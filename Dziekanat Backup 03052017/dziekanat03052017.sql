-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 03 Maj 2017, 10:27
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `dziekanat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lista_obecnosci`
--

CREATE TABLE `lista_obecnosci` (
  `id_lista_obecnosci` int(11) NOT NULL,
  `nrAlbumu` int(11) NOT NULL,
  `przedmiot_data` varchar(45) COLLATE utf8_polish_ci DEFAULT NULL,
  `przedmioty_idprzedmiot` int(11) NOT NULL,
  `obecny` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci ROW_FORMAT=COMPACT;

--
-- Zrzut danych tabeli `lista_obecnosci`
--

INSERT INTO `lista_obecnosci` (`id_lista_obecnosci`, `nrAlbumu`, `przedmiot_data`, `przedmioty_idprzedmiot`, `obecny`) VALUES
(1, 100003, '01/03/2017', 140, 1),
(2, 100008, '01/03/2017', 140, 0),
(3, 100000, '01/03/2017', 140, 1),
(4, 100009, '01/03/2017', 140, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `lista_obecnosci`
--
ALTER TABLE `lista_obecnosci`
  ADD PRIMARY KEY (`id_lista_obecnosci`),
  ADD UNIQUE KEY `id_lista_obecnosci` (`id_lista_obecnosci`),
  ADD KEY `nrAlbumu` (`nrAlbumu`),
  ADD KEY `przedmioty_idprzedmiot` (`przedmioty_idprzedmiot`),
  ADD KEY `przedmioty_idprzedmiot_2` (`przedmioty_idprzedmiot`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `lista_obecnosci`
--
ALTER TABLE `lista_obecnosci`
  MODIFY `id_lista_obecnosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `lista_obecnosci`
--
ALTER TABLE `lista_obecnosci`
  ADD CONSTRAINT `fk_lista_obecnosci.przedmioty` FOREIGN KEY (`przedmioty_idprzedmiot`) REFERENCES `przedmioty` (`idprzedmiot`),
  ADD CONSTRAINT `fk_lista_obecnosci.studenci` FOREIGN KEY (`nrAlbumu`) REFERENCES `studenci` (`nrAlbumu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
