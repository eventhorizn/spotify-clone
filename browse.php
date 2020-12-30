<?php 
include("includes/includedFiles.php");
?>

<h1 class="pageHeadingBig disable-select ">You Might Also Like</h1>

<div class="gridViewContainer">
    <?php 
        $albumQuery = mysqli_query($con, "SELECT * FROM albums LIMIT 10");

        while($row = mysqli_fetch_array($albumQuery)) {
			$artist = new Artist($con, $row['artist']);

           	echo "<div class='gridViewItem'>
					<span>
						<img src='" . $row['artworkPath'] . "' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>

						<div class='gridViewInfo'>
							<span id='" . $row['id'] . "' class='album-change' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>"
							. $row['title'] .
						"	</span>
						</div>
						<div class='gridViewInfo'>
							<span class='artist-name' onclick='openPage(\"artist.php?id=" . $artist->getId() . "\")'>"
							. $artist->getName() .
						"	</span>
						</div>
					</span>

				</div>";
        }
    ?>
</div>

<script>
controller.setCurrentAlbumPlaying();
</script>