<?php 
    include("includes/includedFiles.php");
?>

<h1 class="pageHeadingBig disable-select ">You Might Also Like</h1>

<div class="gridViewContainer">
    <?php $albumQuery = mysqli_query($con, "SELECT * FROM albums LIMIT 10");?>
    <?php include("shared/albumsListing.php")?>
</div>

<script>
    if (controller) {
        controller.setCurrentAlbumPlaying();
    }
</script>