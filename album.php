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
    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath(); ?>">
    </div>

    <div class="rightSection">
        <p class="white-lbl">ALBUM</p>
        <h2><?php echo $album->getTitle(); ?></h2>
        <p class="white-lbl">
            <span>By</span>
            <a href="artist.php?id=<?php echo $artist->getId();?>" class="artist-link"><?php echo $artist->getName(); ?>
            </a>
        </p>
        <p><?php echo $album->getNumberOfSongs(); ?> Songs</p>
    </div>
</div>

<table>
    <tr>
        <th class="trackCount">#</th>
        <th class="trackInfo">TITLE</th>
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
            <tr class='hoverRow'>
                <td>
                    <i class='icofont-play-alt-2 play' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'></i>
                    <span>$i</span>
                </td>
                <td>" . $albumSong->getTitle() . "</td>
                <td><img src='assets/images/icons/more.png'></td>
                <td>" . $albumSong->getDuration() . "</td>
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