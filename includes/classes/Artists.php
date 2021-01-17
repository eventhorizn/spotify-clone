<?php 
    class Artists {
        public static function getArtistsByTerm($con, $term) {
            $artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE name LIKE '$term%' LIMIT 10");

            return Artists::getArtistArray($artistQuery, $con);
        }

        public static function getArtistsFromIds($con, $ids) {
            $artistQuery = mysqli_query($con, "SELECT * FROM artists WHERE id IN (" . implode(',', $ids) . ")");

            return Artists::getArtistArray($artistQuery, $con);
        }

        private static function getArtistArray($artistQuery, $con) {
            $artistArray = array();

            while($row = mysqli_fetch_array($artistQuery)) {
                $id = $row['id'];
                $name = $row['name'];
                $headerPath = $row['artistHeaderPath'];
                $artworkPath = $row['artworkPath'];
                $artist = new Artist();
                $artist->loadFromExisting($con, $id, $name, $headerPath, $artworkPath);

                array_push($artistArray, $artist);
            }

            return $artistArray;
        }
    }

?>