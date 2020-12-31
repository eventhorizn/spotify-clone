<?php
include("includes/includedFiles.php");
?>

<div class="entityInfo">
    <div class="centerSection">
        <div class="userInfo">
            <h1><?=$userLoggedIn->getFirstLastName()?></h1>
        </div>
    </div>

    <div class="buttonItems">
        <button class="button" onclick="openPage('updateProfile.php')">
            USER DETAILS
        </button>
        <button class="button" onclick="controller.logout()">LOGOUT</button>
    </div>
</div>