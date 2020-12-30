<?php include("includes/includedFiles.php");

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

<table>
    <tr>
        <th class="trackCount disable-select">#</th>
        <th class="trackInfo disable-select">TITLE</th>
        <th class="trackOptions"></th>
        <th class="trackDuration"><i class="icofont-clock-time"></i></th>
    </tr>

    <?php
        $songIdArray = $album->getSongIds();
        $i = 1;

        foreach($songIdArray as $songId) {
            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist();

            echo "
            <tr id='" . $albumSong->getId() . "' class='hoverRow'>
                <td class='disable-select'>
                    <i class='icofont-play-alt-2 play-row' onclick='controller.setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'></i>
                    <i class='icofont-pause pause-row' onclick='controller.pauseSong()' style='display: none'></i>
                    <span class='song-change'>$i</span>
                </td>
                <td class='disable-select song-change'>" . $albumSong->getTitle() . "</td>
                <td class='disable-select' onclick='controller.showOptionsMenu(this)'>
                    <input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
                    <img src='assets/images/icons/more.png' class='optionsButton'>
                </td>
                <td class='disable-select song-change'>" . $albumSong->getDuration() . "</td>
            </tr>";

            $i++;
        }
    ?>
    <script>
    var tempSongIds = '<?php echo json_encode($songIdArray);?>'
    tempPlaylist = JSON.parse(tempSongIds);
    controller.setCurrentPlaying();
    </script>
</table>

<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>