<?php 
    include("includes/includedFiles.php");
?>

<h1 class="pageHeadingBig disable-select ">You Might Also Like</h1>

<div class="gridViewContainer">
    <?php $albums = Albums::getTopTenAlbums($con); ?>
    <?php include("shared/albumsListing.php")?>
</div>

<script>
    if (controller) {
        controller.setCurrentAlbumPlaying();
    }
</script>