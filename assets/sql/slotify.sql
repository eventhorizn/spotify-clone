-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 04:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'OK Computer', 1, 1, 'assets/images/album-artwork/okc.jpg'),
(2, 'World of Sleepers', 2, 3, 'assets/images/album-artwork/cbl-ws.jpg'),
(3, 'Demon Days', 3, 2, 'assets/images/album-artwork/gorillaz-dd.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Radiohead'),
(2, 'Carbon Based LIfeforms'),
(3, 'Gorillaz');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Electronic');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(1, 'test', 'garyhake', '2020-12-29 00:00:00'),
(4, 'test12', 'garyhake', '2020-12-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(1, 28, 1, 1),
(2, 10, 1, 2),
(3, 20, 1, 3),
(5, 3, 1, 4),
(6, 2, 4, 1),
(9, 3, 4, 3),
(11, 26, 4, 4),
(12, 11, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Airbag', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/01 Airbag.mp3', 1, 84),
(2, 'Paranoid Android', 1, 1, 1, '6:23', 'assets/music/radiohead/ok-computer/02 Paranoid Android.mp3', 2, 52),
(3, 'Subterranean Homesick Alien', 1, 1, 1, '4:27', 'assets/music/radiohead/ok-computer/03 Subterranean Homesick Alien.mp3', 3, 32),
(4, 'Exit Music', 1, 1, 1, '4:24', 'assets/music/radiohead/ok-computer/04 Exit Music (For A Film).mp3', 4, 40),
(5, 'Let Down', 1, 1, 1, '4:59', 'assets/music/radiohead/ok-computer/05 Let Down.mp3', 5, 27),
(6, 'Karma Police', 1, 1, 1, '4:21', 'assets/music/radiohead/ok-computer/06 Karma Police.mp3', 6, 30),
(7, 'Fitter Happier', 1, 1, 1, '1:57', 'assets/music/radiohead/ok-computer/07 Fitter Happier.mp3', 7, 29),
(8, 'Electioneering', 1, 1, 1, '3:50', 'assets/music/radiohead/ok-computer/08 Electioneering.mp3', 8, 28),
(9, 'Climbing Up The Walls', 1, 1, 1, '4:45', 'assets/music/radiohead/ok-computer/09 Climbing Up The Walls.mp3', 9, 25),
(10, 'No Surprises', 1, 1, 1, '3:48', 'assets/music/radiohead/ok-computer/10 No Surprises.mp3', 10, 33),
(11, 'Lucky', 1, 1, 1, '4:19', 'assets/music/radiohead/ok-computer/11 Lucky.mp3', 11, 19),
(12, 'The Tourist', 1, 1, 1, '5:24', 'assets/music/radiohead/ok-computer/12 The Tourist.mp3', 12, 22),
(13, 'Abiogenesis', 2, 2, 3, '6:45', 'assets/music/carbon-based-lifeforms/world-of-sleepers/01 - Abiogenesis.mp3', 1, 35),
(14, 'Vortex', 2, 2, 3, '6:12', 'assets/music/carbon-based-lifeforms/world-of-sleepers/02 - Vortex.mp3', 2, 20),
(15, 'Photosynthesis', 2, 2, 3, '6:48', 'assets/music/carbon-based-lifeforms/world-of-sleepers/03 - Photosynthesis.mp3', 3, 21),
(16, 'Set Theory', 2, 2, 3, '7:06', 'assets/music/carbon-based-lifeforms/world-of-sleepers/04 - Set Theory.mp3', 4, 16),
(17, 'Gryning', 2, 2, 3, '7:20', 'assets/music/carbon-based-lifeforms/world-of-sleepers/05 - Gryning.mp3', 5, 23),
(18, 'Transmission_Intermission', 2, 2, 3, '4:54', 'assets/music/carbon-based-lifeforms/world-of-sleepers/06 - Transmission _ Intermission.mp3', 6, 9),
(19, 'World Of Sleepers', 2, 2, 3, '5:20', 'assets/music/carbon-based-lifeforms/world-of-sleepers/07 - World Of Sleepers.mp3', 7, 10),
(20, 'Proton Electron', 2, 2, 3, '6:51', 'assets/music/carbon-based-lifeforms/world-of-sleepers/08 - Proton Electron.mp3', 8, 18),
(21, 'Erratic Patterns', 2, 2, 3, '7:27', 'assets/music/carbon-based-lifeforms/world-of-sleepers/09 - Erratic Patterns.mp3', 9, 19),
(22, 'Flytta Dig', 2, 2, 3, '6:24', 'assets/music/carbon-based-lifeforms/world-of-sleepers/10 - Flytta Dig.mp3', 10, 17),
(23, 'Betula Pendula', 2, 2, 3, '10:52', 'assets/music/carbon-based-lifeforms/world-of-sleepers/11 - Betula Pendula.mp3', 11, 27),
(24, 'Intro', 3, 3, 2, '1:07', 'assets/music/gorillaz/demon-days/01 Intro.mp3', 1, 112),
(25, 'Last Living Souls', 3, 3, 2, '3:10', 'assets/music/gorillaz/demon-days/02 Last Living Souls.m4a', 2, 37),
(26, 'Kids With Guns', 3, 3, 2, '3:48', 'assets/music/gorillaz/demon-days/03 Kids With Guns.mp3', 3, 33),
(27, 'O Green World', 3, 3, 2, '4:35', 'assets/music/gorillaz/demon-days/04 O Green World.mp3', 4, 17),
(28, 'Dirty Harry', 3, 3, 2, '3:50', 'assets/music/gorillaz/demon-days/05 Dirty Harry.mp3', 5, 26),
(29, 'Feel Good Inc.', 3, 3, 2, '3:42', 'assets/music/gorillaz/demon-days/06 Feel Good Inc.mp3', 6, 15),
(30, 'El Manana', 3, 3, 2, '3:53', 'assets/music/gorillaz/demon-days/07 El Manana.mp3', 7, 21),
(31, 'Every Planet We Reach Is Dead', 3, 3, 2, '4:55', 'assets/music/gorillaz/demon-days/08 Every Planet We Reach Is Dead.mp3', 8, 31),
(32, 'November Has Come', 3, 3, 2, '2:45', 'assets/music/gorillaz/demon-days/09 November Has Come.mp3', 9, 16),
(33, 'All Alone', 3, 3, 2, '3:33', 'assets/music/gorillaz/demon-days/10 All Alone.mp3', 10, 18),
(34, 'White Light', 3, 3, 2, '2:13', 'assets/music/gorillaz/demon-days/11 White Light.mp3', 11, 16),
(35, 'DARE', 3, 3, 2, '4:06', 'assets/music/gorillaz/demon-days/12 DARE.mp3', 12, 12),
(36, 'Fire Coming Out of a Monkey\'s Head', 3, 3, 2, '3:19', 'assets/music/gorillaz/demon-days/13 Fire Coming Out Of The Monkeys Head.mp3', 13, 14),
(37, 'Don\'t Get Lost In Heaven', 3, 3, 2, '2:00', 'assets/music/gorillaz/demon-days/14 Dont Get Lost In Heaven.m4a', 14, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(1, 'garyhake', 'Gary', 'Hake', 'garyhake@gmail.com', '648b9e63d8dcdc28071c68914c91dddb', '2020-12-17 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(2, 'ghake', 'Rowan', 'Hake', 'Ghake@gmail.com', '17d27b74df6e4c260ef41ad8adac86e6', '2020-12-30 00:00:00', 'assets/images/profile-pics/head_emerald.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
