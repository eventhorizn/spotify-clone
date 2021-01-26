<?php
    // served w/ ajax?
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        include("Config/config.php");
        include("Models/User.php");
        include("Models/Artist.php");
        include("Models/Album.php");
        include("Models/Song.php");
        include("Models/Playlist.php");
        include("Models/Artists.php");
        include("Models/Albums.php");
        include("Models/Playlists.php");
        include("Models/Songs.php");
        include("Models/UserMusic.php");

        if (isset($_GET['userLoggedIn'])) {
            $userLoggedIn = new User($con, $_GET['userLoggedIn']);
        } else {
            echo "username variable was not passed into the page. Check the openPage js function";
            exit();
        }
    } else {
        include("includes/header.php");
        include("includes/footer.php");

        $url = $_SERVER['REQUEST_URI'];
        echo "<script>openPage('$url')</script>";
        exit();
    }

?>