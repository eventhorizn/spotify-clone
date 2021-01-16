<?php
    class Albums {
        public static function getTopTenAlbums($con) {
            $albumQuery = mysqli_query($con, "SELECT * FROM albums LIMIT 10");
            return Albums::getAlbumArray($albumQuery, $con);
        }

        public static function getArtistAlbums($con, $artistId) {
            $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist='$artistId'");

            return Albums::getAlbumArray($albumQuery, $con);
        }

        public static function getAlbumsByTerm($con, $term) {
            $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title like '$term%' LIMIT 10");

            return Albums::getAlbumArray($albumQuery, $con);
        }

        private static function getAlbumArray($albumQuery, $con) {
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