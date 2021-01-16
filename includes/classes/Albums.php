<?php
    class Albums {
        public static function getTopTenAlbums($con) {
            $albumQuery = mysqli_query($con, "SELECT * FROM albums LIMIT 10");
            return Albums::getArtistArray($albumQuery, $con);
        }

        public static function getArtistAlbums($con, $artistId) {
            $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");

            return Albums::getArtistArray($albumQuery, $con);
        }

        private static function getArtistArray($albumQuery, $con) {
            $albums = array();

            while($row = mysqli_fetch_array($albumQuery)) {
                $album = new Album();
                $id = $row['id'];
                $title = $row['title'];
                $artistId = $row['artist'];
                $genre = $row['genre'];
                $artworkPath = $row['artworkPath'];
                $album->loadExisting($id, $title, $artistId, $genre, $artworkPath, $con);

                array_push($albums, $album);
            }
            
            return $albums;
        }

    }

?>