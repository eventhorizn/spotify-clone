<?php 
    $artist = $album->getArtist();
    $doesUserHaveAlbum = UserMusic::doesUserHaveAlbum($con, $userLoggedIn->getUserName(), $album->getId());
?>

<div class="entityInfo">
    <div class="leftSection disable-select">
        <img src="<?= $album->getArtworkPath(); ?>"
            onclick="openPage('album.php?id=<?=$album->getId()?>')"
            class="artist-album-image">
    </div>

    <div class="rightSection">
        <h2 
            class="disable-select artist-album-title"
            onclick="openPage('album.php?id=<?=$album->getId()?>')">
            <?= $album->getTitle(); ?>
        </h2>
        <p class="disable-select">
            <?= $album->getNumberOfSongs(); ?> Songs
        </p>
        <div class="headerButtons">
            <button class="button green playButton"
                    onclick="controller.playArtistAlbum(playlist[<?=$album->getId()?>][0], playlist[<?=$album->getId()?>], <?=$album->getId()?>)"
                    id="play-btn-<?=$album->getId()?>">
                    PLAY
            </button>
            <button class="button green pauseButton" 
                    style="display: none"
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