<?php
    class Artist {
        private $con;
        private $id;
        private $name;
        private $headerPath;
        private $artworkPath;
        private $songIds;

        public function __construct() { }

        public function loadFromDB($con, $id) {
            $this->con = $con;
            $this->id = $id;

            $query = mysqli_query($this->con, "SELECT * FROM artists WHERE id = '$this->id'");
            $artist = mysqli_fetch_array($query);

            $this->name = $artist['name'];
            $this->headerPath = $artist['artistHeaderPath'];
            $this->artworkPath = $artist['artworkPath'];
            $this->songIds = $this->loadSongIds();
        }

        public function loadFromExisting($con, $id, $name, $headerPath, $artworkPath) {
            $this->con = $con;
            $this->id = $id;
            $this->name = $name;
            $this->headerPath = $headerPath;
            $this->artworkPath= $artworkPath;
            $this->songIds = $this->loadSongIds();
        }

        private function loadSongIds() {
            $query = mysqli_query($this->con, "SELECT id FROM songs WHERE artist='$this->id' ORDER BY plays DESC");
            $array = array();

            while($row = mysqli_fetch_array($query)) {
                array_push($array, $row['id']);
            }

            return $array;
        }

        public function getName() {
            return $this->name;
        }

        public function getHeaderPath() {
            return $this->headerPath;
        }
        
        public function getArtworkPath() {
            return $this->artworkPath;
        }

        public function getId() {
            return $this->id;
        }

        public function getSongIds() {
            return $this->songIds;
        }
    }
?>