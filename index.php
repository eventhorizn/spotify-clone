<?php include("includes/header.php");?>

<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");

$resultArray = array();

while($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);

?>

<script>
$(document).ready(function() {
    const newPlaylist = <?php echo $jsonArray ?>;
    controller = new Controller(new NowPlayingView(newPlaylist));
    const json_text = JSON.stringify(controller);
    localStorage.setItem('controller', json_text);
});
</script>

<h1 class="pageHeadingBig disable-select ">You Might Also Like</h1>

<div class="gridViewContainer">
    <?php 
        $albumQuery = mysqli_query($con, "SELECT * FROM albums LIMIT 10");

        while($row = mysqli_fetch_array($albumQuery)) {
            echo "<div class='gridViewItem'>
                    <a href='album.php?id=" . $row['id'] . "'>
                        <img src='" . $row['artworkPath'] . "'>

                        <div class='gridViewInfo'>"
                            . $row['title'] .
                        "</div>
                    </a>
				</div>";
        }
    ?>
</div>

<?php include("includes/footer.php");?>