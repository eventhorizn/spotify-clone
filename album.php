<?php 
    include("includes/includedFiles.php");

    if (isset($_GET['id'])) {
        $albumId = $_GET['id'];
    }
    else {
        header("Location: index.php");
    }

    $album = new Album($con, $albumId);
    $artist = $album->getArtist();
?>

<div class="entityInfo">
    <div class="leftSection disable-select">
        <img src="<?php echo $album->getArtworkPath(); ?>">
    </div>

    <div class="rightSection">
        <p class="white-lbl disable-select">ALBUM</p>
        <h2 class="disable-select"><?php echo $album->getTitle(); ?></h2>
        <p class="white-lbl disable-select">
            <span>By</span>
            <span onclick="openPage('artist.php?id=<?php echo $artist->getId();?>')"
                class="artist-link"><?php echo $artist->getName(); ?>
            </span>
        </p>
        <p class="disable-select"><?php echo $album->getNumberOfSongs(); ?> Songs</p>
        <div class="headerButtons">
            <button class="button green playButton"
                onclick="controller.playFromArtistAlbum(tempPlaylist[0], tempPlaylist, true)">PLAY</button>
            <button class="button green pauseButton" style="display: none"
                onclick="controller.pauseSong()">PAUSE</button>
        </div>
    </div>
</div>

<?php $songIdArray = $album->getSongIds();?>
<?php include("shared/albumTrackListing.php"); ?>

<?php include("shared/optionsMenu.php")?>