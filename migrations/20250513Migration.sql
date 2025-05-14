-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Mai 2025 um 09:36
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bookstoredb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `authors`
--
DROP DATABASE IF EXISTS bookstoreDB;
CREATE DATABASE bookstoreDB;
USE bookstoreDB;

CREATE TABLE `authors` (
  `id` int(11) NOT NULL ,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `authors`
--

INSERT INTO `authors` (`id`, `firstName`, `lastName`, `birthDate`, `nationality`) VALUES
(1, 'Roald', 'Dahl', '1916-09-13', 'Britisch'),
(2, 'Harper', 'Lee', '1926-04-28', 'US-Amerikanisch'),
(3, 'Joanne', 'Rowling', '1965-07-31', 'British');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL ,
  `title` varchar(255) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `publicationDate` date DEFAULT NULL,
  `pageCount` int(11) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `publisher` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `coverUrl` varchar(255) DEFAULT NULL,
  `binding` tinyint(1) DEFAULT NULL,
  `authorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `books`
--

INSERT INTO `books` (`id`, `title`, `isbn`, `description`, `publicationDate`, `pageCount`, `language`, `publisher`, `category`, `coverUrl`, `binding`, `authorId`, `price` ) VALUES
(1, 'Fantastic Mr. Fox', '9780140328721', 'Ein cleverer Fuchs versucht, seine Familie vor drei bösen Bauern zu ernähren, indem er ihnen heimlich Essen stiehlt.', '1988-10-01', 96, 'eng', 'Puffin', 'Children\'s book, Adventure', 'https://covers.openlibrary.org/b/isbn/9780140328721-L.jpg', 0, 1, 12.5),
(2, 'Harry Potter and the Sorcerers Stone', '9780439554930', 'A young boy named Harry Potter discovers he is a wizard and embarks on his first year at Hogwarts School of Witchcraft and Wizardry, where he uncovers secrets about his past.', '2025-05-13', 309, 'eng', 'Arthur A. Levine Books', 'Fantasy', 'https://covers.openlibrary.org/b/isbn/9780439554930-L.jpg', 1, 3, 15.9),
(3, 'To Kill a Mockingbird', '9780061120084', 'One of the best-loved stories of all time, To Kill a Mockingbird has been translated into more than forty languages, sold more than thirty million copies worldwide, served as the basis of an enormously popular motion picture, and was voted one of the best novels of the twentieth century by librarians across the country. A gripping, heart wrenching, and wholly remarkable tale of coming-of-age in a South poisoned by viruletn prejudice, it views a world of great beauty and savage inequities through the eyes of a youn girl, as her father--a crusading local lawyer--risks everything to defend a black man unjustly accused of a terrible crime.\r\n(front flap)', '2025-05-13', 323, 'eng', 'Harper Perennial Modern Classics', 'Lee, Harper - Prose & Criticism', 'https://covers.openlibrary.org/b/isbn/9780061120084-L.jpg', 0, 2, 10.99);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`),
  ADD KEY `authorId` (`authorId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`authorId`) REFERENCES `authors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
