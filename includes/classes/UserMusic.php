<?php 

    class UserMusic {
        public static function doesUserHaveAlbum($con, $username, $albumId) {
            $query = mysqli_query($con, "SELECT id FROM useralbums WHERE owner='$username' AND albumId='$albumId'");
            
            if (!$query) {
                echo mysqli_error($con);
            }
            
            $rowcount = mysqli_num_rows($query);

            if ($rowcount > 0) {
                return true;
            }

            return false;
        }

        public static function getUserAlbums($con, $username) {
            $query = mysqli_query($con, "SELECT albumId FROM useralbums WHERE owner='$username'");
            $albumIds = array();
            while($row = mysqli_fetch_array($query)) {
                array_push($albumIds, $row['albumId']);
            }
            
            return Albums::getAlbumsFromIds($con, $albumIds);
        }
    }

?>