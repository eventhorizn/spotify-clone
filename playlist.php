<?php 
    include("includes/includedFiles.php");

    if (isset($_GET['id'])) {
        $playlistId = $_GET['id'];
    }
    else {
        header("Location: index.php");
    }

    $playlist = new Playlist();
    $playlist->loadFromDatabase($con, $playlistId);
    $songIds = $playlist->getSongIds();
?>

<div class="entityInfo">
    <div class="leftSection disable-select">
        <div>
            <img src="<?= $playlist->getArtworkPath() ?>">
        </div>
    </div>

    <div class="rightSection">
        <p class="white-lbl disable-select">PLAYLIST</p>
        <h2 class="disable-select"><?= $playlist->getName(); ?></h2>
        <p class="white-lbl disable-select">
            <span>By</span>
            <span class="playlistOwner">
                <?= $playlist->getOwner(); ?>
            </span>
        </p>
        <p class="disable-select">
            <?= $playlist->getNumberOfSongs(); ?> Songs
        </p>
        <div class="headerButtons">
            
            <?php if (count($songIds) > 0): ?>
                <button 
                    class="button green playButton"
                    onclick="controller.playFromArtistAlbum(playlist[0], playlist, true)">
                    PLAY
                </button>
            <?php endif ?>

            <button 
                class="button green pauseButton" 
                style="display: none"
                onclick="controller.pauseSong()">
                PAUSE
            </button>

            <button 
                class="button deleteButton" 
                data-toggle="modal" data-target="#deletePlaylistModal">
                DELETE PLAYLIST
            </button>
        </div>
    </div>
</div>

<?php include("shared/fullTrackListing.php")?>

<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
    <div 
        class="item" 
        onclick="controller.removeFromPlaylist(this, '<?= $playlistId ?>')">
        Remove from Playlist
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="deletePlaylistModal" tabindex="-1" role="dialog" 
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-background">
      <div class="modal-header">
        <h4 class="modal-title center-header">Delete Playlist?</h5>
      </div>
      <div class="modal-footer center-container">
        <button type="button" class="button red" 
                onclick="controller.deletePlaylist('<?= $playlistId; ?>')">
            Delete
        </button>
        <button type="button" class="button" 
                data-dismiss="modal" id="cancel-btn">
            Cancel
        </button>
      </div>
    </div>
  </div>
</div>