<?php
	class Song {

		private $con;
        private $id;
        private $mysqliData;
        private $title;
        private $artistId;
        private $albumId;
        private $genre;
        private $duration;
        private $path;

		public function __construct($con, $id) {
			$this->con = $con;
			$this->id = $id;

			$query = mysqli_query($this->con, "SELECT * FROM songs WHERE id='$this->id'");
            $this->mysqliData = mysqli_fetch_array($query);
            $this->title = $this->mysqliData['title'];
            $this->artistId = $this->mysqliData['artist'];
            $this->albumId = $this->mysqliData['album'];
            $this->genre = $this->mysqliData['genre'];
            $this->duration = $this->mysqliData['duration'];
            $this->path = $this->mysqliData['path'];
        }
        
        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }

        public function getArtist() {
            $artist = new Artist();
            $artist->loadFromDB($this->con, $this->artistId);
            return $artist;
        }

        public function getAlbum() {
            $album = new Album();
            $album->loadFromDatabase($this->con, $this->albumId);
            return $album;
        }

        public function getPath() {
            return $this->path;
        }

        public function getDuration() {
            return $this->duration;
        }

        public function getGenre() {
            return $this->genre;
        }

        public function getMysqliData() {
            return $this->mysqliData;
        }
        
	}
?>