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
    controller.searchViewInit();
</script>

<?php if($term == "") exit(); ?>

<div class="borderBottom disable-select">
    <h2 class="centerHeader">SONGS</h2>
    <?php
        $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title like '$term%' LIMIT 10");
    ?>

    <?php $songIdArray = array();?>
    <?php if (mysqli_num_rows($songsQuery) == 0):?>
        <span class='noResults'>
            No songs found matching <?=$term?>
        </span>
    <?php else: ?>
        <?php  while($row = mysqli_fetch_array($songsQuery)) {
            $songId = $row['id'];
            array_push($songIdArray, $songId);
        }?>
        <?php include("shared/fullTrackListing.php")?>
    <?php endif?>

    <script>
        var tempSongIds = '<?php echo json_encode($songIdArray);?>'
        tempPlaylist = JSON.parse(tempSongIds);
        controller.setCurrentPlaying();
    </script>
</div>

<div class="artistsContainer borderBottom disable-select">
    <h2 class="centerHeader">ARTISTS</h2>

    <?php
        $artistsQuery = mysqli_query($con, "SELECT id FROM artists WHERE name LIKE '$term%' LIMIT 10");
    ?>

    <?php if (mysqli_num_rows($artistsQuery) == 0):?>
        <span class='noResults'>
            No artists found matching <?=$term?>
        </span>
    <?php endif ?>
    
    <?php while($row = mysqli_fetch_array($artistsQuery)) :?>
        <?php $artistFound = new Artist($con, $row['id']); ?>
        <?php include("shared/artistListing.php");?>
    <?php endwhile?>
</div>

<div class="gridViewContainer disable-select">
    <h2 class="centerHeader">ALBUMS</h2>
    <?php 
        $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title like '$term%' LIMIT 10");
    ?>

        <?php if (mysqli_num_rows($albumQuery) == 0): ?>
            <span class='noResults'>
                No albums found matching <?=$term?>
            </span>
        <?php endif?>

    <?php include("shared/albumsListing.php")?>
</div>

<?php include("shared/optionsMenu.php")?>

<script>
    controller.setCurrentAlbumPlaying();
</script>