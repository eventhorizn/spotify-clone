<?php 
    include("includes/includedFiles.php");

    if (isset($_GET['id'])) {
        $playlistId = $_GET['id'];
    }
    else {
        header("Location: index.php");
    }

    $playlist = new Playlist($con, $playlistId);
    $owner = new User($con, $playlist->getOwner());
?>

<div class="entityInfo">
    <div class="leftSection disable-select">
        <div class="playlistImage">
            <img src="assets/images/icons/playlist.png">
        </div>
    </div>

    <div class="rightSection">
        <p class="white-lbl disable-select">PLAYLIST</p>
        <h2 class="disable-select"><?php echo $playlist->getName(); ?></h2>
        <p class="white-lbl disable-select">
            <span>By</span>
            <span class="playlistOwner"><?php echo $playlist->getOwner(); ?>
            </span>
        </p>
        <p class="disable-select"><?php echo $playlist->getNumberOfSongs(); ?> Songs</p>
        <div class="headerButtons">
            <button class="button green playButton"
                onclick="controller.playFromArtistAlbum(tempPlaylist[0], tempPlaylist, true)">PLAY</button>
            <button class="button green pauseButton" style="display: none"
                onclick="controller.pauseSong()">PAUSE</button>
            <button class="button deleteButton" onclick="controller.deletePlaylist('<?php echo $playlistId; ?>')">DELETE
                PLAYLIST</button>
        </div>
    </div>
</div>

<?php
    $songIdArray = $playlist->getSongIds();
?>
<?php include("shared/fullTrackListing.php")?>

<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
    <div class="item" onclick="controller.removeFromPlaylist(this, '<?php echo $playlistId ?>')">Remove from Playlist
    </div>
</nav>