<?php include("includes/includedFiles.php");

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
                onclick="controller.setTrack(tempPlaylist[0], tempPlaylist, true)">PLAY</button>
            <button class="button green pauseButton" style="display: none"
                onclick="controller.pauseSong()">PAUSE</button>
            <button class="button deleteButton" onclick="deletePlaylist('<?php echo $playlistId; ?>')">DELETE
                PLAYLIST</button>
        </div>
    </div>
</div>

<table>
    <tr>
        <th class="trackCount disable-select">#</th>
        <th class="trackInfo disable-select">TITLE</th>
        <th class="trackArtist disable-select">ARTIST</th>
        <th class="trackAlbum disable-select">ALBUM</th>
        <th class="trackOptions"></th>
        <th class="trackDuration"><i class="icofont-clock-time"></i></th>
    </tr>

    <?php
        $songIdArray = $playlist->getSongIds();
        $i = 1;

        foreach($songIdArray as $songId) {
            $playlistSong = new Song($con, $songId);

            echo "
            <tr id='" . $playlistSong->getId() . "' class='hoverRow'>
                <td class='disable-select'>
                    <i class='icofont-play-alt-2 play-row' onclick='controller.setTrack(\"" . $playlistSong->getId() . "\", tempPlaylist, true)'></i>
                    <i class='icofont-pause pause-row' onclick='controller.pauseSong()' style='display: none'></i>
                    <span class='song-change'>$i</span>
                </td>
                <td class='disable-select song-change'>" . $playlistSong->getTitle() . "</td>
                <td class='disable-select song-change'><label class='rowLink' onclick='openPage(\"artist.php?id=" . $playlistSong->getArtist()->getId() . "\")'>" . $playlistSong->getArtist()->getName() . "</label></td>
                <td class='disable-select song-change'><label class='rowLink' onclick='openPage(\"album.php?id=" . $playlistSong->getAlbum()->getId() . "\")'>" . $playlistSong->getAlbum()->getTitle() . "</label></td>
                <td class='disable-select' onclick='showOptionsMenu(this)'><img src='assets/images/icons/more.png' class='optionsButton' ></td>
                <td class='disable-select song-change'>" . $playlistSong->getDuration() . "</td>
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