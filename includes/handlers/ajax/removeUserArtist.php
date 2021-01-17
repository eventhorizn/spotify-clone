<?php
    include("../../config.php");

    if (isset($_POST['artistId']) && isset($_POST['username'])) {
        $artistId = $_POST['artistId'];
        $username = $_POST['username'];

        if (!mysqli_query($con, "DELETE FROM userartists WHERE artistId = '$artistId' AND owner = '$username'")) {
            echo mysqli_error($con);
        };
    } else {
        echo 'Album Id was not passed into addUserAlbum.php';
    }
?>