<?php 
    include("includes/includedFiles.php");
    $albums = Albums::getTopTenAlbums($con);
?>

<h1 class="pageHeadingBig disable-select ">You Might Also Like</h1>

<div class="gridViewContainer">
    <?php include("shared/albumsListing.php")?>
</div>

<script>
    if (controller) {
        controller.setCurrentAlbumPlaying();
    }
</script>