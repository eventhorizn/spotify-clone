<?php
    include("includes/includedFiles.php");

    $username = $userLoggedIn->getUsername();
    $playlists = Playlists::getMyPlaylists($con, $username);
?>

<div class="playlistContainer disable-select">
    <div class="gridviewContainer">
        <h1 class="pageHeadingBig disable-select ">Playlists</h1>
        <div class="buttonItems">
             <button class="button green add-playlist-btn" 
                     data-toggle="modal" data-target="#newPlaylistModal">
                    NEW PLAYLIST
            </button>
        </div>

        <?php if (count($playlists) == 0): ?>
            <span class="noResults">
                You don't have any playlists yet
            </span>
        <?php endif ?>

        <?php foreach($playlists as $playlist): ?>
            <div 
                class="gridViewItem playlistItem" 
                onclick="openPage('playlist.php?id=<?=$playlist->getId()?>')">
                <div>
                    <img src="<?= $playlist->getArtworkPath() ?>">
                </div>

                <div class="gridViewInfo">
                    <?=$playlist->getName()?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newPlaylistModal" tabindex="-1" role="dialog" 
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal-background">
      <div class="modal-header">
        <h4 class="modal-title center-header">Create Playlist</h5>
        <button type="button" class="close close-button" 
                data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body center-container">
        <div>
          <label class="playlist-name-lbl">Name</label>
          <br/>
          <input id="playlist-name" class="playlist-name-input">
        </div>
      </div>
      <div class="modal-footer center-container">
        <button type="button" class="button green" 
                onclick="controller.createPlaylist()">
          Create
      </button>
      </div>
    </div>
  </div>
</div>