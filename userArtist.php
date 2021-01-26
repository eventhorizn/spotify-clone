<?php
    include("includes/includedFiles.php");
?>

<h1 class="pageHeadingBig disable-select ">Artists</h1>

<div class="gridViewContainer">
    <?php 
        $artists = 
            UserMusic::getUserArtists($con, $userLoggedIn->getUserName()); 
    ?>

    <?php include("shared/artistListing.php");?>
</div>