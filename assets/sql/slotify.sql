-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: slotify
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `albums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `artist` int NOT NULL,
  `genre` int NOT NULL,
  `artworkPath` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (1,'OK Computer',1,1,'assets/images/album-artwork/okc.jpg'),(2,'World of Sleepers',2,3,'assets/images/album-artwork/cbl-ws.jpg'),(3,'Demon Days',3,2,'assets/images/album-artwork/gorillaz-dd.jpg'),(4,'Interloper',2,3,'assets/images/album-artwork/cbl-interloper.jpg');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artists`
--

DROP TABLE IF EXISTS `artists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `artistHeaderPath` varchar(500) NOT NULL,
  `artworkPath` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artists`
--

LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;
INSERT INTO `artists` VALUES (1,'Radiohead','assets/images/artist-header/Radiohead.jpg','assets/images/artist-artwork/Radiohead.jpg'),(2,'Carbon Based Lifeforms','assets/images/artist-header/CBL.png','assets/images/artist-artwork/CBL.jpg'),(3,'Gorillaz','assets/images/artist-header/Gorillaz.png','assets/images/artist-artwork/Gorillaz.jpg');
/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Rock'),(2,'Pop'),(3,'Electronic');
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlists`
--

DROP TABLE IF EXISTS `playlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `playlists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlists`
--

LOCK TABLES `playlists` WRITE;
/*!40000 ALTER TABLE `playlists` DISABLE KEYS */;
INSERT INTO `playlists` VALUES (1,'test','garyhake','2020-12-29 00:00:00'),(4,'test12','garyhake','2020-12-29 00:00:00'),(6,'Test 123','garyhake','2021-01-16 00:00:00');
/*!40000 ALTER TABLE `playlists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `playlistsongs`
--

DROP TABLE IF EXISTS `playlistsongs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `playlistsongs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `songId` int NOT NULL,
  `playlistId` int NOT NULL,
  `playlistOrder` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `playlistsongs`
--

LOCK TABLES `playlistsongs` WRITE;
/*!40000 ALTER TABLE `playlistsongs` DISABLE KEYS */;
INSERT INTO `playlistsongs` VALUES (1,28,1,1),(2,10,1,2),(3,20,1,3),(5,3,1,4),(6,2,4,1),(9,3,4,3),(11,26,4,4),(12,11,4,5),(14,1,6,1);
/*!40000 ALTER TABLE `playlistsongs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `songs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `artist` int NOT NULL,
  `album` int NOT NULL,
  `genre` int NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int NOT NULL,
  `plays` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `songs`
--

LOCK TABLES `songs` WRITE;
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;
INSERT INTO `songs` VALUES (1,'Airbag',1,1,1,'4:44','assets/music/radiohead/ok-computer/01 Airbag.mp3',1,93),(2,'Paranoid Android',1,1,1,'6:23','assets/music/radiohead/ok-computer/02 Paranoid Android.mp3',2,62),(3,'Subterranean Homesick Alien',1,1,1,'4:27','assets/music/radiohead/ok-computer/03 Subterranean Homesick Alien.mp3',3,37),(4,'Exit Music',1,1,1,'4:24','assets/music/radiohead/ok-computer/04 Exit Music (For A Film).mp3',4,47),(5,'Let Down',1,1,1,'4:59','assets/music/radiohead/ok-computer/05 Let Down.mp3',5,33),(6,'Karma Police',1,1,1,'4:21','assets/music/radiohead/ok-computer/06 Karma Police.mp3',6,32),(7,'Fitter Happier',1,1,1,'1:57','assets/music/radiohead/ok-computer/07 Fitter Happier.mp3',7,29),(8,'Electioneering',1,1,1,'3:50','assets/music/radiohead/ok-computer/08 Electioneering.mp3',8,28),(9,'Climbing Up The Walls',1,1,1,'4:45','assets/music/radiohead/ok-computer/09 Climbing Up The Walls.mp3',9,25),(10,'No Surprises',1,1,1,'3:48','assets/music/radiohead/ok-computer/10 No Surprises.mp3',10,35),(11,'Lucky',1,1,1,'4:19','assets/music/radiohead/ok-computer/11 Lucky.mp3',11,20),(12,'The Tourist',1,1,1,'5:24','assets/music/radiohead/ok-computer/12 The Tourist.mp3',12,22),(13,'Abiogenesis',2,2,3,'6:45','assets/music/carbon-based-lifeforms/world-of-sleepers/01 - Abiogenesis.mp3',1,93),(14,'Vortex',2,2,3,'6:12','assets/music/carbon-based-lifeforms/world-of-sleepers/02 - Vortex.mp3',2,32),(15,'Photosynthesis',2,2,3,'6:48','assets/music/carbon-based-lifeforms/world-of-sleepers/03 - Photosynthesis.mp3',3,32),(16,'Set Theory',2,2,3,'7:06','assets/music/carbon-based-lifeforms/world-of-sleepers/04 - Set Theory.mp3',4,28),(17,'Gryning',2,2,3,'7:20','assets/music/carbon-based-lifeforms/world-of-sleepers/05 - Gryning.mp3',5,29),(18,'Transmission_Intermission',2,2,3,'4:54','assets/music/carbon-based-lifeforms/world-of-sleepers/06 - Transmission _ Intermission.mp3',6,15),(19,'World Of Sleepers',2,2,3,'5:20','assets/music/carbon-based-lifeforms/world-of-sleepers/07 - World Of Sleepers.mp3',7,17),(20,'Proton Electron',2,2,3,'6:51','assets/music/carbon-based-lifeforms/world-of-sleepers/08 - Proton Electron.mp3',8,27),(21,'Erratic Patterns',2,2,3,'7:27','assets/music/carbon-based-lifeforms/world-of-sleepers/09 - Erratic Patterns.mp3',9,25),(22,'Flytta Dig',2,2,3,'6:24','assets/music/carbon-based-lifeforms/world-of-sleepers/10 - Flytta Dig.mp3',10,24),(23,'Betula Pendula',2,2,3,'10:52','assets/music/carbon-based-lifeforms/world-of-sleepers/11 - Betula Pendula.mp3',11,34),(24,'Intro',3,3,2,'1:07','assets/music/gorillaz/demon-days/01 Intro.mp3',1,123),(25,'Last Living Souls',3,3,2,'3:10','assets/music/gorillaz/demon-days/02 Last Living Souls.m4a',2,40),(26,'Kids With Guns',3,3,2,'3:48','assets/music/gorillaz/demon-days/03 Kids With Guns.mp3',3,34),(27,'O Green World',3,3,2,'4:35','assets/music/gorillaz/demon-days/04 O Green World.mp3',4,19),(28,'Dirty Harry',3,3,2,'3:50','assets/music/gorillaz/demon-days/05 Dirty Harry.mp3',5,32),(29,'Feel Good Inc.',3,3,2,'3:42','assets/music/gorillaz/demon-days/06 Feel Good Inc.mp3',6,17),(30,'El Manana',3,3,2,'3:53','assets/music/gorillaz/demon-days/07 El Manana.mp3',7,21),(31,'Every Planet We Reach Is Dead',3,3,2,'4:55','assets/music/gorillaz/demon-days/08 Every Planet We Reach Is Dead.mp3',8,31),(32,'November Has Come',3,3,2,'2:45','assets/music/gorillaz/demon-days/09 November Has Come.mp3',9,16),(33,'All Alone',3,3,2,'3:33','assets/music/gorillaz/demon-days/10 All Alone.mp3',10,19),(34,'White Light',3,3,2,'2:13','assets/music/gorillaz/demon-days/11 White Light.mp3',11,17),(35,'DARE',3,3,2,'4:06','assets/music/gorillaz/demon-days/12 DARE.mp3',12,12),(36,'Fire Coming Out of a Monkey\'s Head',3,3,2,'3:19','assets/music/gorillaz/demon-days/13 Fire Coming Out Of The Monkeys Head.mp3',13,15),(37,'Don\'t Get Lost In Heaven',3,3,2,'2:00','assets/music/gorillaz/demon-days/14 Dont Get Lost In Heaven.m4a',14,18),(38,'Intro',2,4,3,'1:07','assets/music/gorillaz/demon-days/01 Intro.mp3',1,15),(39,'Last Living Souls',2,4,3,'3:10','assets/music/gorillaz/demon-days/02 Last Living Souls.m4a',2,3),(40,'Kids With Guns',2,4,3,'3:48','assets/music/gorillaz/demon-days/03 Kids With Guns.mp3',3,2),(41,'O Green World',2,4,3,'4:35','assets/music/gorillaz/demon-days/04 O Green World.mp3',4,1),(42,'Dirty Harry',2,4,3,'3:50','assets/music/gorillaz/demon-days/05 Dirty Harry.mp3',5,1),(43,'Feel Good Inc.',2,4,3,'3:42','assets/music/gorillaz/demon-days/06 Feel Good Inc.mp3',6,1),(44,'El Manana',2,4,3,'3:53','assets/music/gorillaz/demon-days/07 El Manana.mp3',7,1),(45,'Every Planet We Reach Is Dead',2,4,3,'4:55','assets/music/gorillaz/demon-days/08 Every Planet We Reach Is Dead.mp3',8,0),(46,'November Has Come',2,4,3,'2:45','assets/music/gorillaz/demon-days/09 November Has Come.mp3',9,0),(47,'All Alone',2,4,3,'3:33','assets/music/gorillaz/demon-days/10 All Alone.mp3',10,0),(48,'White Light',2,4,3,'2:13','assets/music/gorillaz/demon-days/11 White Light.mp3',11,0),(49,'DARE',2,4,3,'4:06','assets/music/gorillaz/demon-days/12 DARE.mp3',12,0),(50,'Fire Coming Out of a Monkey\'s Head',2,4,3,'3:19','assets/music/gorillaz/demon-days/13 Fire Coming Out Of The Monkeys Head.mp3',13,0),(51,'Don\'t Get Lost In Heaven',2,4,3,'2:00','assets/music/gorillaz/demon-days/14 Dont Get Lost In Heaven.m4a',14,0);
/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useralbums`
--

DROP TABLE IF EXISTS `useralbums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `useralbums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `albumId` int NOT NULL,
  `owner` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useralbums`
--

LOCK TABLES `useralbums` WRITE;
/*!40000 ALTER TABLE `useralbums` DISABLE KEYS */;
INSERT INTO `useralbums` VALUES (7,2,'garyhake'),(12,3,'garyhake');
/*!40000 ALTER TABLE `useralbums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userartists`
--

DROP TABLE IF EXISTS `userartists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userartists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `artistId` int NOT NULL,
  `owner` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userartists`
--

LOCK TABLES `userartists` WRITE;
/*!40000 ALTER TABLE `userartists` DISABLE KEYS */;
INSERT INTO `userartists` VALUES (5,3,'garyhake'),(6,1,'garyhake'),(7,2,'garyhake');
/*!40000 ALTER TABLE `userartists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'garyhake','Gary','Hake','garyhake@gmail.com','648b9e63d8dcdc28071c68914c91dddb','2020-12-17 00:00:00','assets/images/profile-pics/head_emerald.png'),(2,'ghake','Rowan','Hake','Ghake@gmail.com','17d27b74df6e4c260ef41ad8adac86e6','2020-12-30 00:00:00','assets/images/profile-pics/head_emerald.png');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-17 22:11:41
