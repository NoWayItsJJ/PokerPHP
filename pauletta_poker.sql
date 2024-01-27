-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 27, 2024 alle 12:32
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pauletta_poker`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id_utente` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `cognome` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id_utente`, `nome`, `cognome`, `email`, `password`) VALUES
(1, 'Fabio', 'Pauletta', '1@gmail.com', '6e6bc4e49dd477ebc98ef4046c067b5f'),
(2, 'federica', 'casiraghi', '2@gmail.com', '6e6bc4e49dd477ebc98ef4046c067b5f'),
(3, 'riccardo', 'saro', '3@gmail.com', '6e6bc4e49dd477ebc98ef4046c067b5f'),
(4, 'kevin', 'cesco', '4@gmail.com', '6e6bc4e49dd477ebc98ef4046c067b5f');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id_utente`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id_utente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
