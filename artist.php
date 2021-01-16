<?php
    include("includes/includedFiles.php");

    if (isset($_GET['id'])) {
        $artistId = $_GET['id'];
    }
    else {
        header("Location: index.php");
    }

    $artist = new Artist();
    $artist->loadFromDB($con, $artistId);
?>

<div class="entityInfo entityInfoArtist borderBottom imageContainer" style="--i: url('../../<?=$artist->getHeaderPath()?>')">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artist->getName();?></h1>

            <div class="headerButtons">
                <button class="button green playButton"
                    onclick="controller.playFromArtistAlbum(tempPlaylist[0], tempPlaylist, true)">PLAY</button>
                <button class="button green pauseButton" style="display: none"
                    onclick="controller.pauseSong()">PAUSE</button>
            </div>
        </div>
    </div>
</div>

<div class="borderBottom">
    <h2 class="centerHeader">SONGS</h2>
    <?php $songIdArray = $artist->getSongIds();?>
    <?php include("shared/artistTrackListing.php")?>
</div>

<div class="gridViewContainer">
    <h2 class="centerHeader">ALBUMS</h2>
    <?php $albums = Albums::getArtistAlbums($con, $artistId); ?>
    <?php include("shared/albumsListing.php")?>
</div>

<?php include("shared/optionsMenu.php")?>