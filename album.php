<?php 
    include("includes/includedFiles.php");

    if (isset($_GET['id'])) {
        $albumId = $_GET['id'];
    }
    else {
        header("Location: index.php");
    }

    $album = new Album();
    $album->loadFromDatabase($con, $albumId);
    $artist = $album->getArtist();
    $doesUserHaveAlbum = UserMusic::doesUserHaveAlbum($con, $userLoggedIn->getUserName(), $albumId);
?>

<div class="entityInfo">
    <div class="leftSection disable-select">
        <img src="<?= $album->getArtworkPath(); ?>">
    </div>

    <div class="rightSection">
        <p class="white-lbl disable-select">ALBUM</p>
        <h2 class="disable-select"><?= $album->getTitle(); ?></h2>
        <p class="white-lbl disable-select">
            <span>By</span>
            <span onclick="openPage('artist.php?id=<?= $artist->getId();?>')"
                class="artist-link"><?= $artist->getName(); ?>
            </span>
        </p>
        <p class="disable-select"><?= $album->getNumberOfSongs(); ?> Songs</p>
        <div class="headerButtons">
            <button class="button green playButton"
                    onclick="controller.playArtistAlbum(playlist[0], playlist, <?= $album->getId() ?>)"
                    id="play-btn-<?= $album->getId() ?>">
                PLAY
            </button>
            <button class="button green pauseButton" style="display: none"
                    onclick="controller.pauseAlbumSong(<?=$album->getId()?>)"
                    id="pause-btn-<?=$album->getId()?>">
                PAUSE
            </button>
            <button 
                id="addUserAlbumBtn" 
                onclick="controller.addUserAlbum(<?=$albumId?>)" 
                class="button" 
                style="margin-left: 5px; <?php if($doesUserHaveAlbum) { echo 'display:none';} else {echo 'display:inline-block';} ?>">
                ADD
            </button>
            <button 
                id="rmvUserAlbumBtn" 
                onclick="controller.removeUserAlbum(<?=$albumId?>)"  class="button" 
                style="margin-left: 5px; <?php if($doesUserHaveAlbum) { echo 'display:inline-block';} else {echo 'display:none';} ?>">
            </button>
        </div>
    </div>
</div>

<?php $songIdArray = $album->getSongIds();?>
<?php include("shared/albumTrackListing.php"); ?>
<?php include("shared/optionsMenu.php")?>

<script>
    var songIds = '<?php echo json_encode($songIdArray);?>'
    playlist = JSON.parse(songIds);
    if (controller) {
        controller.setCurrentPlayingArtist('<?= $album->getId() ?>');
        controller.setCurrentAlbumPlaying();
    }
</script>