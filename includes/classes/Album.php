<?php
    class Album {
        private $con;
        private $id;
        private $title;
        private $artistId;
        private $genre;
        private $artworkPath;
        private $songIds;

        public function __construct(){ }

        public function loadFromDatabase($con, $id): void {
            $this->con = $con;
            $this->id = $id;

            $query = mysqli_query($this->con, "SELECT * FROM albums WHERE id = '$this->id'");
            $album = mysqli_fetch_array($query);
            
            $this->title = $album['title'];
            $this->artistId = $album['artist'];
            $this->genre = $album['genre'];
            $this->artworkPath = $album['artworkPath'];
            $this->songIds = $this->loadSongIds();
        }

        public function loadExisting($id, $title, $artistId, $genre, $artworkPath, $con): void {
            $this->con = $con;
            $this->id = $id;
            $this->title = $title;
            $this->artistId = $artistId;
            $this->genre = $genre;
            $this->artworkPath = $artworkPath;
            $this->songIds = $this->loadSongIds();
        }

        private function loadSongIds() {
            $query = mysqli_query($this->con, "SELECT id FROM songs WHERE album='$this->id' ORDER BY albumOrder ASC");
            $array = array();

            while($row = mysqli_fetch_array($query)) {
                array_push($array, $row['id']);
            }

            return $array;
        }

        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getArtworkPath() {
            return $this->artworkPath;
        }

        public function getArtist() {
            $artist = new Artist();
            $artist->loadFromDB($this->con, $this->artistId);
            return $artist;
        }

        public function getGenre() {
            return $this->genre;
        }

        public function getNumberOfSongs() {
			return count($this->songIds);
        }
        
        public function getSongIds() {
            return $this->songIds;
        }
    }
?>