<?php
    include("includes/includedFiles.php");
?>

<div class="playlistContainer disable-select">
    <div class="gridviewContainer">
        <h1 class="pageHeadingBig disable-select ">Playlists</h1>
        <div class="buttonItems">
            <button class="button green" 
                    onclick="controller.createPlaylist()">
                    NEW PLAYLIST
            </button>
        </div>

        <?php 
            $username = $userLoggedIn->getUsername();

            $playlists = Playlists::getMyPlaylists($con, $username);
        ?>

        <?php if (count($playlists) == 0): ?>
            <span class="noResults">
                You don't have any playlists yet
            </span>
        <?php endif ?>

        <?php foreach($playlists as $playlist): ?>
            <div class="gridViewItem playlistItem" onclick="openPage('playlist.php?id=<?=$playlist->getId()?>')">
                <div class="playlistImage">
                    <img src="assets/images/icons/playlist.png">
                </div>

                <div class="gridViewInfo">
                    <?=$playlist->getName()?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>