<?php 
    class Artists {
        public static function getArtistsByTerm($con, $term) {
            $artistArray = array();
            $artistsQuery = mysqli_query($con, "SELECT * FROM artists WHERE name LIKE '$term%' LIMIT 10");

            while($row = mysqli_fetch_array($artistsQuery)) {
                $id = $row['id'];
                $name = $row['name'];
                $headerPath = $row['artistHeaderPath'];
                $artist = new Artist();
                $artist->loadFromExisting($con, $id, $name, $headerPath);

                array_push($artistArray, $artist);
            }

            return $artistArray;
        }
    }

?>