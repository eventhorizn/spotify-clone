<?php
    ob_start(); // wait before we have all data before sending to server
    session_start();

    $timezone = date_default_timezone_set("America/New_York");
    $con = mysqli_connect("localhost", "root", "", "slotify");

    if (mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_errno();
    }
?>