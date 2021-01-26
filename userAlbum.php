<?php 
    include("includes/includedFiles.php");
?>

<h1 class="pageHeadingBig disable-select ">Albums</h1>

<div class="gridViewContainer">
    <?php 
        $albums = UserMusic::getUserAlbums($con, $userLoggedIn->getUserName()); 
    ?>
    <?php include("shared/albumsListing.php")?>
</div>

<script>
    if (controller) {
        controller.setCurrentAlbumPlaying();
    }
</script>