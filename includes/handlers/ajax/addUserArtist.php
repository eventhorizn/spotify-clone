<?php
    include("../../config.php");

    if (isset($_POST['artistId']) && isset($_POST['username'])) {
        $artistId = $_POST['artistId'];
        $username = $_POST['username'];

        if(!mysqli_query($con, "INSERT INTO userartists VALUES(NULL, '$artistId', '$username')")) {
            echo mysqli_error($con);
        };

    } else {
        echo 'Artist Id was not passed into addUserArtist.php';
    }
?>