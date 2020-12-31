<?php
include("includes/config.php");
include("includes/classes/User.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");
include("includes/classes/Playlist.php");

if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
    $username = $userLoggedIn->getUsername();
    echo "<script>userLoggedIn = '$username';</script>";
} else {
    header("Location: register.php");
}

?>

<html>

<head>
    <title>Welcome to Slotify!</title>

    <link rel="stylesheet" href="assets/icofont/icofont.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/navBar.css">
    <link rel="stylesheet" href="assets/css/nowPlaying.css">
    <link rel="stylesheet" href="assets/css/artist.css">
    <link rel="stylesheet" href="assets/css/search.css">
    <link rel="stylesheet" href="assets/css/yourMusic.css">
    <link rel="stylesheet" href="assets/css/playlist.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/controller.js"></script>
    <script src="assets/js/classes/audio.js"></script>
    <script src="assets/js/views/nowPlayingView.js"></script>
    <script src="assets/js/views/albumView.js"></script>
    <script src="assets/js/views/searchView.js"></script>
    <script src="assets/js/views/playlistView.js"></script>
    <script src="assets/js/views/profileView.js"></script>
</head>

<body>
    <div id="mainContainer">
        <div id="topContainer">
            <?php include("includes/navBarContainer.php"); ?>

            <div id="mainViewContainer">
                <div id="mainContent">