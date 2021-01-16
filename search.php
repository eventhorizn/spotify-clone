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
    <?php $songIds = Songs::getSongIdsByTerm($con, $term); ?>

    <?php if (count($songIds) == 0):?>
        <span class='noResults'>
            No songs found matching <?=$term?>
        </span>
    <?php else: ?>
        <?php include("shared/fullTrackListing.php")?>
    <?php endif?>
</div>

<div class="artistsContainer borderBottom disable-select">
    <h2 class="centerHeader">ARTISTS</h2>

    <?php $artists = Artists::getArtistsByTerm($con, $term); ?>

    <?php if (count($artists) == 0):?>
        <span class='noResults'>
            No artists found matching <?=$term?>
        </span>
    <?php endif ?>
    
    <?php foreach($artists as $artistFound):?>
        <?php include("shared/artistListing.php");?>
    <?php endforeach?>
</div>

<div class="gridViewContainer disable-select">
    <h2 class="centerHeader">ALBUMS</h2>
    <?php $albums = Albums::getAlbumsByTerm($con, $term); ?>

        <?php if (count($albums) == 0): ?>
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