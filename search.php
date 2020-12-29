<?php
include("includes/includedFiles.php");

if(isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
} else {
    $term = "";
}
?>

<div class="searchContainer">
    <h4 class="disable-select">Search for an Artist, Album, or Song</h4>
    <input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing...">
</div>

<script>
$(".searchInput").focus();
var val = $(".searchInput").val();
$(".searchInput").val('');
$(".searchInput").val(val);


$(function() {
    $(".searchInput").keyup(function() {
        clearTimeout(timer);

        timer = setTimeout(function() {
            const val = $('.searchInput').val();
            openPage(`search.php?term=${val}`);
        }, 2000);
    });
});

$(".searchInput").on("keydown", function(event) {
    if (event.which == 13) {
        const val = $('.searchInput').val();
        openPage(`search.php?term=${val}`);
    }
});
</script>

<?php if($term == "") exit(); ?>

<div class="borderBottom disable-select">
    <h2 class="centerHeader">SONGS</h2>
    <table>
        <?php
        $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title like '$term%' LIMIT 10");

        if (mysqli_num_rows($songsQuery) == 0) {
            echo "<span class='noResults'>No songs found matching '" . $term . "'</span>"; 
        } else {
            echo "
                <tr>
                    <th class='trackCount disable-select'>#</th>
                    <th class='trackInfo disable-select'>TITLE</th>
                    <th class='trackOptions'></th>
                    <th class='trackDuration'><i class='icofont-clock-time'></i></th>
                </tr>
                ";
        }

        $songIdArray = array();
        $i = 1;

        while($row = mysqli_fetch_array($songsQuery)) {
            $songId = $row['id'];
            if ($i > 15) {
                break;
            }

            array_push($songIdArray, $songId);

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
                <td class='disable-select' onclick='showOptionsMenu(this)'><img src='assets/images/icons/more.png' class='optionsButton' ></td>
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

<div class="artistsContainer borderBottom disable-select">
    <h2 class="centerHeader">ARTISTS</h2>

    <?php
        $artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");

        if (mysqli_num_rows($artistsQuery) == 0) {
            echo "<span class='noResults'>No artists found matching '" . $term . "'</span>"; 
        }

        while($row = mysqli_fetch_array($artistsQuery)) {
            $artistFound = new Artist($con, $row['id']);

            echo "
                <div class='searchResultRow'>
                    <div class='artistName'>
                        <span onclick='openPage(\"artist.php?id=" . $artistFound->getId() . "\")'>
                        "
                        . $artistFound->getName() .
                        "
                        </span>
                    </div>
                </div>
                ";
        }
    ?>
</div>

<div class="gridViewContainer disable-select">
    <h2 class="centerHeader">ALBUMS</h2>
    <?php 
        $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title like '$term%' LIMIT 10");

        if (mysqli_num_rows($albumQuery) == 0) {
            echo "<span class='noResults'>No albums found matching '" . $term . "'</span>"; 
        }

        while($row = mysqli_fetch_array($albumQuery)) {
           	echo "<div class='gridViewItem'>
					<span onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
						<img src='" . $row['artworkPath'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";
        }
    ?>
</div>