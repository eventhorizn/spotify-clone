<?php
include("includes/includedFiles.php");

if (isset($_GET['id'])) {
    $artistId = $_GET['id'];
}
else {
    header("Location: index.php");
}

$artist = new Artist($con, $artistId);
?>

<div class="entityInfo borderBottom">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artist->getName();?></h1>

            <div class="headerButtons">
                <button class="button green">Play</button>
            </div>
        </div>
    </div>
</div>

<div class="borderBottom">
    <table>
        <tr>
            <th class="trackCount disable-select">#</th>
            <th class="trackInfo disable-select">TITLE</th>
            <th class="trackOptions"></th>
            <th class="trackDuration"><i class="icofont-clock-time"></i></th>
        </tr>

        <?php
        $songIdArray = $artist->getSongIds();
        $i = 1;

        foreach($songIdArray as $songId) {

            if ($i > 5) {
                break;
            }

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
                <td class='disable-select'><img src='assets/images/icons/more.png'></td>
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
</div>