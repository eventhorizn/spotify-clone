<?php
    class Playlists {
        public static function getMyPlaylists($con, $username) {
            $playlists = array();

            $playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner='$username' LIMIT 10");

            if (mysqli_num_rows($playlistsQuery) == 0) {
                return $playlists;
            }

            while($row = mysqli_fetch_array($playlistsQuery)) {
                $playlist = new Playlist();
                $id = $row['id'];
                $name = $row['name'];
                $owner = $row['owner'];
                $playlist->loadFromExisiting($con, $id, $name, $owner);

                array_push($playlists, $playlist);
            }

            return $playlists;
        }
    }
?>