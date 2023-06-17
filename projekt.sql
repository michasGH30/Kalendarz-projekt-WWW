-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Cze 2023, 20:40
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `friends`
--

CREATE TABLE `friends` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_user` int(11) UNSIGNED NOT NULL,
  `ID_friend` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `friends`
--

INSERT INTO `friends` (`ID`, `ID_user`, `ID_friend`) VALUES
(31, 1, 2),
(37, 1, 4),
(38, 1, 2),
(39, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `friends_request`
--

CREATE TABLE `friends_request` (
  `ID` int(10) UNSIGNED NOT NULL,
  `ID_user` int(11) UNSIGNED NOT NULL,
  `ID_friend` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `friends_request`
--

INSERT INTO `friends_request` (`ID`, `ID_user`, `ID_friend`) VALUES
(1, 2, 3),
(2, 2, 4),
(24, 1, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meetings`
--

CREATE TABLE `meetings` (
  `ID` int(11) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_polish_ci NOT NULL,
  `date` date NOT NULL,
  `ID_creator` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `meetings`
--

INSERT INTO `meetings` (`ID`, `title`, `date`, `ID_creator`) VALUES
(1, 'Spotkanie 1', '2023-03-25', 1),
(2, 'Spotkanie 2', '2023-03-31', 1),
(3, 'Spotkanie 3', '2023-03-26', 1),
(4, 'Spotkanie test1', '2023-03-01', 1),
(5, 'Spotkanie test2', '2023-03-05', 1),
(6, 'Spotkanie test3', '2023-03-12', 1),
(7, 'Spotkanie test4', '2023-03-19', 1),
(8, 'Spotkanie test5', '2023-04-01', 1),
(9, 'Spotkanie test5', '2023-02-26', 1),
(11, 'Spotkanie w kwietniu xd', '2023-04-09', 1),
(12, 'Spotkanie w kwietniu kolejne', '2023-04-23', 1),
(13, 'Spotkanie w kwietniu jeszcze kolejne ', '2023-04-16', 1),
(14, 'Spotkanie w kwietniu ostatnie', '2023-04-30', 1),
(15, 'Test wielu w jeden dzień', '2023-04-23', 1),
(21, 'Test dodawania', '2023-05-08', 1),
(22, 'Test przejścia na inną stronę', '2023-05-09', 1),
(23, 'Kolejny test', '2023-05-10', 1),
(24, 'Jeszcze jeden test edycja', '2023-05-11', 2),
(25, 'Again', '2023-05-12', 1),
(27, 'co?', '2023-05-14', 1),
(28, 'aha zmiana nie ręcznie', '2023-05-18', 2),
(29, 'Najbliższe spotkania', '2023-06-06', 1),
(30, 'Test', '2023-06-20', 1),
(31, 'kolejne', '2023-06-06', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `meetings_members`
--

CREATE TABLE `meetings_members` (
  `ID` int(11) UNSIGNED NOT NULL,
  `ID_meeting` int(11) UNSIGNED NOT NULL,
  `ID_user` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `meetings_members`
--

INSERT INTO `meetings_members` (`ID`, `ID_meeting`, `ID_user`) VALUES
(2, 1, 3),
(3, 2, 2),
(4, 2, 4),
(5, 3, 2),
(6, 4, 2),
(7, 5, 2),
(8, 6, 2),
(9, 7, 2),
(10, 8, 2),
(11, 9, 2),
(12, 8, 1),
(14, 11, 1),
(15, 12, 1),
(16, 13, 1),
(17, 14, 1),
(18, 15, 1),
(44, 21, 1),
(45, 21, 4),
(46, 21, 5),
(47, 21, 6),
(48, 22, 1),
(49, 22, 2),
(50, 22, 3),
(51, 23, 1),
(52, 23, 2),
(53, 24, 1),
(54, 24, 5),
(55, 24, 6),
(56, 25, 1),
(57, 25, 2),
(60, 27, 1),
(61, 27, 2),
(64, 28, 3),
(65, 28, 4),
(66, 24, 4),
(67, 24, 5),
(68, 24, 6),
(69, 28, 2),
(70, 29, 1),
(71, 30, 1),
(72, 30, 5),
(73, 30, 6),
(74, 30, 4),
(75, 30, 5),
(76, 30, 6),
(77, 31, 1),
(78, 31, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(10) UNSIGNED NOT NULL,
  `login` text COLLATE utf8mb4_polish_ci NOT NULL,
  `password` text COLLATE utf8mb4_polish_ci NOT NULL,
  `name` text COLLATE utf8mb4_polish_ci NOT NULL,
  `surname` text COLLATE utf8mb4_polish_ci NOT NULL,
  `date_of_join` date NOT NULL,
  `picture` text COLLATE utf8mb4_polish_ci NOT NULL DEFAULT 'img/profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`ID`, `login`, `password`, `name`, `surname`, `date_of_join`, `picture`) VALUES
(1, 'login', 'cc03e747a6afbbcbf8be7668acfebee5', 'Uczeń 1', 'Uczeń 1', '2023-03-22', 'img/Kei_Shirogane_crying_CPP.png'),
(2, 'login2', 'a6d9709a4fc8e794ecfb17af1116f67d', 'Uczeń 2', 'Uczeń 2', '2023-03-22', 'img/note.png'),
(3, 'login323', '5d2a40d928c91a4554420b2c71f8d720', 'Uczeń 3', 'Uczeń 3', '2023-03-22', 'img/profile.png'),
(4, 'login', '098f6bcd4621d373cade4e832627b4f6', 'Uczeń 4', 'Uczeń 4', '2023-03-22', 'img/profile.png'),
(5, 'loginlogin', 'hasłohasło', 'Uczeń 5', 'Uczeń 5', '0000-00-00', 'img/board.png'),
(6, 'login_login', 'hasło_hasło', 'Uczeń 6', 'Uczeń 6', '2023-04-01', 'img/profile.png');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_friend` (`ID_friend`);

--
-- Indeksy dla tabeli `friends_request`
--
ALTER TABLE `friends_request`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_user` (`ID_user`),
  ADD KEY `ID_friend` (`ID_friend`);

--
-- Indeksy dla tabeli `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `ID_creator` (`ID_creator`);

--
-- Indeksy dla tabeli `meetings_members`
--
ALTER TABLE `meetings_members`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_meeting` (`ID_meeting`),
  ADD KEY `ID_user` (`ID_user`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `friends`
--
ALTER TABLE `friends`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT dla tabeli `friends_request`
--
ALTER TABLE `friends_request`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `meetings`
--
ALTER TABLE `meetings`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT dla tabeli `meetings_members`
--
ALTER TABLE `meetings_members`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`ID_friend`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `friends_request`
--
ALTER TABLE `friends_request`
  ADD CONSTRAINT `friends_request_ibfk_1` FOREIGN KEY (`ID_friend`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friends_request_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`ID_creator`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `meetings_members`
--
ALTER TABLE `meetings_members`
  ADD CONSTRAINT `meetings_members_ibfk_1` FOREIGN KEY (`ID_meeting`) REFERENCES `meetings` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meetings_members_ibfk_2` FOREIGN KEY (`ID_user`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
