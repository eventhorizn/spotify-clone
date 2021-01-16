<?php 

    class Songs {
        public static function getRandomSongIds($con) {
            $songIds = array();
            $songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

            while($row = mysqli_fetch_array($songQuery)) {
                array_push($songIds, $row['id']);
            }

            return json_encode($songIds);
        }
    }

?>