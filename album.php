<?php include("includes/header.php");

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
            <a href="artist.php?id=<?php echo $artist->getId();?>" class="artist-link"><?php echo $artist->getName(); ?>
            </a>
        </p>
        <p class="disable-select"><?php echo $album->getNumberOfSongs(); ?> Songs</p>
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
                    <i class='icofont-play-alt-2 play' onclick='controller.setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'></i>
                    <i class='icofont-pause pause' style='display: none'></i>
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
    const tempSongIds = '<?php echo json_encode($songIdArray);?>'
    tempPlaylist = JSON.parse(tempSongIds);
    </script>
</table>


<?php include("includes/footer.php");?>