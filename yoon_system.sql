-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Gru 2022, 21:02
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `yoon_system`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbl_computers`
--

CREATE TABLE `tbl_computers` (
  `id` int(11) NOT NULL,
  `asset_code` varchar(50) NOT NULL,
  `manufacture` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `serial_number` varchar(50) NOT NULL,
  `operating_system` varchar(50) NOT NULL,
  `processor` varchar(50) NOT NULL,
  `graphics` varchar(50) NOT NULL,
  `memory` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `spare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `tbl_computers`
--

INSERT INTO `tbl_computers` (`id`, `asset_code`, `manufacture`, `model`, `type`, `serial_number`, `operating_system`, `processor`, `graphics`, `memory`, `status`, `spare`) VALUES
(53, 'wahh', 'gawg', 'hawh', 'hawh', 'hwwah', 'hawh', 'hwaha', 'whawh', 'awh', 11, 1),
(55, 'wahh', 'gawg', 'hawh', 'hawh', 'gawgag', 'hawh', 'hwaha', 'whawh', 'awh', 11, 1),
(56, 'wahh', 'gawg', 'hawh', 'hawh', 'hwwah', 'hawh', 'hwaha', 'whawh', 'awh', 11, 1),
(57, 'wahh', 'gawg', 'hawh', 'hawh', 'hwwah', 'hawh', 'hwaha', 'whawh', 'awh', 11, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(15) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_surname` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_login`, `user_password`, `user_name`, `user_surname`, `user_email`) VALUES
(1, 'd.bester', 'damian', 'Damian', 'Bester', 'd.bester@yoongroup.eu'),
(2, 'test', 'test', 'test', 'testowy', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `tbl_computers`
--
ALTER TABLE `tbl_computers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `tbl_computers`
--
ALTER TABLE `tbl_computers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT dla tabeli `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
