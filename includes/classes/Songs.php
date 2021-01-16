<?php 

    class Songs {
        public static function getRandomSongIds($con) {
            $songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

            return json_encode(Songs::getSongIdsArray($con, $songQuery));
        }

        public static function getSongIdsByTerm($con, $term) {
            $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title like '$term%' LIMIT 10");
            return Songs::getSongIdsArray($con, $songsQuery);
        }

        private static function getSongIdsArray($con, $songQuery) {
            $songIds = array();
            while($row = mysqli_fetch_array($songQuery)) {
                array_push($songIds, $row['id']);
            }
            return $songIds;
        }
    }

?>