<?php 
    include("includes/includedFiles.php");
?>

<h1 class="pageHeadingBig disable-select ">Albums</h1>

<div class="gridViewContainer">
    <?php 
        $albums = UserMusic::getUserAlbums($con, $userLoggedIn->getUserName()); 
    ?>
    <?php if (count($albums) == 0): ?>
        <span class="noResults">
            You don't have any albums yet
        </span>
    <?php else: ?>
        <?php include("shared/albumsListing.php")?>
    <?php endif ?>
</div>

<script>
    if (controller) {
        controller.setCurrentAlbumPlaying();
    }
</script>