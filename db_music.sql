-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2025 at 03:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_music`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `release_year` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `release_year`, `artist_id`) VALUES
(1, 'Minefields (Single)', 2020, 1),
(2, 'Peace & Violence (Single)', 2021, 1),
(3, 'RIP Love (Single)', 2022, 1),
(4, 'You Cant Save Me (Single)', 2023, 2),
(5, 'Let the World Burn (Single)', 2023, 2),
(6, 'Bring Me Back to Life (Single)', 2022, 2),
(7, 'Chase Atlantic', 2017, 3),
(8, 'BEAUTY IN DEATH', 2022, 3),
(9, 'MAGIC MAN', 2022, 4),
(10, 'LMLY (Single)', 2021, 4),
(11, 'Made Me A Man (Single)', 2023, 4),
(12, 'you were there for me (Single)', 2022, 5),
(13, 'pick up the phone (Single)', 2023, 5),
(14, 'Call Me When You Get This (Single)', 2021, 6),
(15, 'Stay (Single)', 2022, 6),
(16, 'Red Rose (Single)', 2023, 6),
(17, 'Cry Baby', 2015, 7),
(18, 'Talk of the Town (Single)', 2021, 8),
(19, 'Falling Behind (Single)', 2022, 8),
(20, 'Corpse Bride (Single)', 2023, 8),
(21, 'Last Love (Single)', 2022, 8);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) DEFAULT NULL,
  `debut_year` int(11) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`, `country`, `debut_year`, `genre`) VALUES
(1, 'Faozia', 'Canada', 2015, 'Pop / Alternative'),
(2, 'Chris Grey', 'Canada', 2020, 'Pop / R&B'),
(3, 'Chase Atlantic', 'Australia', 2014, 'Alternative / R&B'),
(4, 'Jackson Wang', 'China', 2017, 'Pop / R&B'),
(5, 'Henry Moodie', 'UK', 2022, 'Pop'),
(6, 'Johnny Huynh', 'Australia', 2021, 'Indie Pop'),
(7, 'Melanie Martinez', 'USA', 2014, 'Alternative Pop'),
(8, 'Allegra Jordyn', 'Canada', 2019, 'Indie Pop');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `name`, `date_created`) VALUES
(1, 'My Favorites', '2025-11-17 08:57:49'),
(2, 'Chill Vibes', '2025-11-17 08:57:49');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_song`
--

CREATE TABLE `playlist_song` (
  `playlist_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist_song`
--

INSERT INTO `playlist_song` (`playlist_id`, `song_id`) VALUES
(1, 1),
(1, 7),
(2, 8),
(2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `release_year` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `title`, `release_year`, `album_id`) VALUES
(1, 'Minefields', 2020, 1),
(2, 'Peace & Violence', 2021, 2),
(3, 'RIP Love', 2022, 3),
(4, 'You Cant Save Me', 2023, 4),
(5, 'Let the World Burn', 2023, 5),
(6, 'Bring Me Back to Life', 2022, 6),
(7, 'Swim', 2017, 7),
(8, 'Friends', 2022, 8),
(9, 'Blow', 2022, 9),
(10, 'LMLY', 2021, 10),
(11, 'Made Me A Man', 2023, 11),
(12, 'You Were There for Me', 2022, 12),
(13, 'Pick Up the Phone', 2023, 13),
(14, 'Call Me When You Get This', 2021, 14),
(15, 'Stay', 2022, 15),
(16, 'Red Rose', 2023, 16),
(17, 'Play Date', 2015, 17),
(18, 'Soap', 2015, 17),
(19, 'Talk of the Town', 2021, 18),
(20, 'Falling Behind', 2022, 19),
(21, 'Corpse Bride', 2023, 20),
(22, 'Last Love', 2022, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD PRIMARY KEY (`playlist_id`,`song_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_id` (`album_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `playlist_song`
--
ALTER TABLE `playlist_song`
  ADD CONSTRAINT `playlist_song_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `playlist_song_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
