-- Genres
INSERT INTO 'genres' VALUES 
('Rock'), ('Pop'), ('Electronic');

-- Artists
INSERT INTO 'artists' VALUES 
('Radiohead'), ('Carbon Based Lifeforms'), ('Gorillaz');

-- Albums
INSERT INTO 'albums' VALUES 
('OK Computer', 1, 1, 'assets/images/album-artwork/okc.jpg'),
('World of Sleepers', 2, 3, 'assets/images/album-artwork/cbl-ws.jpg'),
('Demon Days', 3, 2, 'assets/images/album-artwork/gorillaz-dd.jpg');

-- Songs
-- Radiohead/OKC
INSERT INTO 'songs' VALUES 
('Airbag', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/01 Airbag.mp3', 1, 0),
('Paranoid Android', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/02 Paranoid Android.mp3', 2, 0),
('Subterranean Homesick Alien', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/03 Subterranean Homesick Alien.mp3', 3, 0),
('Exit Music', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/04 Exit Music (For A Film)', 4, 0),
('Let Down', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/05 Let Down', 5, 0),
('Karma Police', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/06 Karma Police', 6, 0),
('Fitter Happier', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/07 Fitter Happier', 7, 0),
('Electioneering', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/08 Electioneering', 8, 0),
('Climbing Up The Walls', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/09 Climbing Up The Walls', 9, 0),
('No Surprises', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/10 No Surprises', 10, 0),
('Lucky', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/11 Lucky', 11, 0),
('The Tourist', 1, 1, 1, '4:44', 'assets/music/radiohead/ok-computer/12 The Tourist', 12, 0);


-- CBL/World Of Sleepers
INSERT INTO 'songs' VALUES 
('Abiogenesis', 2, 2, 3, '6:45', 'assets/music/carbon-based-lifeforms/world-of-sleepers/01 - Abiogenesis.mp3', 1, 0),
('Vortex', 2, 2, 3, '6:12', 'assets/music/carbon-based-lifeforms/world-of-sleepers/02 - Vortexmp3', 2, 0),
('Photosynthesis', 2, 2, 3, '6:48', 'assets/music/carbon-based-lifeforms/world-of-sleepers/03 - Photosynthesis.mp3', 3, 0),
('Set Theory', 2, 2, 3, '7:06', 'assets/music/carbon-based-lifeforms/world-of-sleepers/04 - Set Theory.mp3', 4, 0),
('Gryning', 2, 2, 3, '7:20', 'assets/music/carbon-based-lifeforms/world-of-sleepers/05 - Gryning.mp3', 5, 0),
('Transmission_Intermission', 2, 2, 3, '4:54', 'assets/music/carbon-based-lifeforms/world-of-sleepers/06 - Transmission _ Intermission.mp3', 6, 0),
('World Of Sleepers', 2, 2, 3, '5:20', 'assets/music/carbon-based-lifeforms/world-of-sleepers/07 - World Of Sleepers.mp3', 7, 0),
('Proton Electron', 2, 2, 3, '6:51', 'assets/music/carbon-based-lifeforms/world-of-sleepers/08 - Proton Electron.mp3', 8, 0),
('Erratic Patterns', 2, 2, 3, '7:27', 'assets/music/carbon-based-lifeforms/world-of-sleepers/09 - Erratic Patterns.mp3', 9, 0),
('Flytta Dig', 2, 2, 3, '6:24', 'assets/music/carbon-based-lifeforms/world-of-sleepers/10 - Flytta Dig.mp3', 10, 0),
('Betula Pendula', 2, 2, 3, '10:52', 'assets/music/carbon-based-lifeforms/world-of-sleepers/11 - Betula Pendula.mp3', 11, 0);

-- Gorillaz/Demon Days
INSERT INTO 'songs' VALUES 
('Intro', 3, 3, 2, '1:07', 'assets/music/gorillaz/demon-days/01 Intro.mp3', 1, 0),
('Last Living Souls', 3, 3, 2, '3:10', 'assets/music/gorillaz/demon-days/02 Last Living Souls.m4a', 2, 0),
('Kids With Guns', 3, 3, 2, '3:48', 'assets/music/gorillaz/demon-days/03 Kids With Guns.mp3', 3, 0),
('O Green World', 3, 3, 2, '4:35', 'assets/music/gorillaz/demon-days/04 O Green World.mp3', 4, 0),
('Dirty Harry', 3, 3, 2, '3:50', 'assets/music/gorillaz/demon-days/05 Dirty Harry.mp3', 5, 0),
('Feel Good Inc', 3, 3, 2, '3:42', 'assets/music/gorillaz/demon-days/06 Feel Good Inc.mp3', 6, 0),
('El Manana', 3, 3, 2, '3:53', 'assets/music/gorillaz/demon-days/07 El Manana.mp3', 7, 0),
('Every Planet We Reach Is Dead', 3, 3, 2, '4:55', 'assets/music/gorillaz/demon-days/08 Every Planet We Reach Is Dead.mp3', 8, 0),
('November Has Come', 3, 3, 2, '2:45', 'assets/music/gorillaz/demon-days/09 November Has Come.mp3', 9, 0),
('All Alone', 3, 3, 2, '3:33', 'assets/music/gorillaz/demon-days/10 All Alone.mp3', 10, 0),
('White Light', 3, 3, 2, '2:13', 'assets/music/gorillaz/demon-days/11 White Light.mp3', 11, 0),
('DARE', 3, 3, 2, '4:06', 'assets/music/gorillaz/demon-days/12 DARE.mp3', 12, 0),
('Fire Coming Out of a Monkeys Head', 3, 3, 2, '3:19', 'assets/music/gorillaz/demon-days/13 Fire Coming Out Of The Monkeys Head.mp3', 13, 0),
('Dont Get Lost In Heaven', 3, 3, 2, '2:00', 'assets/music/gorillaz/demon-days/14 Dont Get Lost In Heaven.mp3', 14, 0);