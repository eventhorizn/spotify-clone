<?php
    include("../../../Config/config.php");

    if (isset($_POST['albumId']) && isset($_POST['username'])) {
        $albumId = $_POST['albumId'];
        $username = $_POST['username'];

        if (!mysqli_query($con, "DELETE FROM useralbums WHERE albumId = '$albumId' AND owner = '$username'")) {
            echo mysqli_error($con);
        };
    } else {
        echo 'Album Id was not passed into addUserAlbum.php';
    }
?>