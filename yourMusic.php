<?php
    include("includes/includedFiles.php");
?>

<div class="playlistContainer disable-select">
    <div class="gridviewContainer">
        <h2>PLAYLISTS</h2>
        <div class="buttonItems">
            <button class="button green" 
                    onclick="controller.createPlaylist()">
                    NEW PLAYLIST
            </button>
        </div>

        <?php 
            $username = $userLoggedIn->getUsername();

            $playlistsQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner='$username' LIMIT 10");
        ?>

        <?php if (mysqli_num_rows($playlistsQuery) == 0): ?>
            <span class="noResults">
                You don't have any playlists yet
            </span>
        <?php endif ?>

        <?php while($row = mysqli_fetch_array($playlistsQuery)): ?>
            <?php $playlist = new Playlist($con, $row);?>

            <div class="gridViewItem playlistItem" onclick="openPage('playlist.php?id=<?=$playlist->getId()?>')">
                <div class="playlistImage">
                    <img src="assets/images/icons/playlist.png">
                </div>

                <div class="gridViewInfo">
                    <?=$playlist->getName()?>
                </div>
            </div>
        <?php endwhile ?>
    </div>
</div>