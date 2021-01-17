<?php
    include("includes/includedFiles.php");
?>

<div class="nameContainer">
    <div class="centerSection">
        <h1 class="pageHeadingBig disable-select "><?=$userLoggedIn->getFirstLastName()?></h1>
    </div>

    <div class="buttonItems">
        <button class="button" onclick="openPage('updateProfile.php')">
            USER DETAILS
        </button>
        <button class="button" onclick="controller.logout()">LOGOUT</button>
    </div>
</div>