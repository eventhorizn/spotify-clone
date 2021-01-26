<?php
    class Playlist {
        private $con;
        private $id;
        private $name;
        private $owner;
        private $songIds;

        public function __construct() {}

        public function loadFromDatabase($con, $data): void {
            if (!is_array($data)) {
                // Data is an id (string)
                $query = mysqli_query($con, "SELECT * FROM playlists WHERE id='$data'");
                $data = mysqli_fetch_array($query);
            }

            $this->con = $con;
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->owner = $data['owner'];
            $this->songIds = $this->loadSongIds();
        }

        public function loadFromExisiting($con, $id, $name, $owner) {
            $this->con = $con;
            $this->id = $id;
            $this->name = $name;
            $this->owner = $owner;
            $this->songIds = $this->loadSongIds();
        }

        private function loadSongIds() {
            $query = mysqli_query($this->con, "SELECT songId FROM playlistSongs WHERE playlistId='$this->id' ORDER BY playlistOrder ASC");
            $array = array();

            while($row = mysqli_fetch_array($query)) {
                array_push($array, $row['songId']);
            }

            return $array;
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getOwner() {
            return $this->owner;
        }

        public function getNumberOfSongs() {
            return count($this->songIds);
        }
                
        public function getSongIds() {
            return $this->songIds;
        }

        public function getArtworkPath() {
            $firstSong = new Song($this->con, $this->songIds[0]);
            $album = $firstSong->getAlbum();
            return $album->getArtworkPath();
        }

        public static function getPlaylistsDropdown($con, $username) {
            $dropdown = '
            <select class="item playlist">
                <option value="">Add to playlist</option>
            ';

            $query = mysqli_query($con, "SELECT id, name FROM playlists WHERE owner = '$username'");

            while ($row = mysqli_fetch_array($query)) {
                $id = $row['id'];
                $name = $row['name'];

                $dropdown = $dropdown . "<option value='$id'>$name</option>";
            }

            return $dropdown . "</select>";
        }
    }
?>