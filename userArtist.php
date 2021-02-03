<?php
    include("includes/includedFiles.php");
?>

<h1 class="pageHeadingBig disable-select ">Artists</h1>

<div class="gridViewContainer">
    <?php 
        $artists = 
            UserMusic::getUserArtists($con, $userLoggedIn->getUserName()); 
    ?>

    <?php if (count($artists) == 0): ?>
        <span class="noResults">
            You don't have any artists yet
        </span>
    <?php else: ?>
        <?php include("shared/artistListing.php");?>
    <?php endif ?>
</div>