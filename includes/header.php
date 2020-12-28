<?php
include("includes/config.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");

//session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
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
    <link rel="stylesheet" href="assets/css/album-playlist.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/js/controller.js"></script>
    <script src="assets/js/classes/audio.js"></script>
    <script src="assets/js/views/nowPlayingView.js"></script>
    <script src="assets/js/views/albumView.js"></script>
</head>

<body>
    <div id="mainContainer">
        <div id="topContainer">
            <?php include("includes/navBarContainer.php"); ?>

            <div id="mainViewContainer">
                <div id="mainContent">