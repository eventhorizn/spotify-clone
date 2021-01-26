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

<?php if($term != ""): ?>
    <?php
        $songIds = Songs::getSongIdsByTerm($con, $term);
        $artists = Artists::getArtistsByTerm($con, $term);
        $albums = Albums::getAlbumsByTerm($con, $term);
    ?>

    <div class="borderBottom disable-select">
        <h2 class="leftHeader">SONGS</h2>

        <?php if (count($songIds) == 0):?>
            <span class='noResults'>
                No songs found matching <?=$term?>
            </span>
        <?php else: ?>
            <?php include("shared/fullTrackListing.php")?>
        <?php endif?>
    </div>

    <div class="artistsContainer borderBottom disable-select">
        <h2 class="leftHeader">ARTISTS</h2>

        <?php if (count($artists) == 0):?>
            <span class='noResults'>
                No artists found matching <?=$term?>
            </span>
        <?php endif ?>
        
        <?php include("shared/artistListing.php");?>
    </div>

    <div class="gridViewContainer disable-select">
        <h2 class="leftHeader">ALBUMS</h2>
        
            <?php if (count($albums) == 0): ?>
                <span class='noResults'>
                    No albums found matching <?=$term?>
                </span>
            <?php endif?>

        <?php include("shared/albumsListing.php")?>
    </div>

    <?php include("shared/optionsMenu.php")?>

<?php endif?>

<script type="module">
    import { Controller } from './assets/js/controller.js'

    if (!controller) {
        let playlist = <?php echo Songs::getRandomSongIds($con) ?>;
        const json_text = JSON.stringify(playlist);
        controller = new Controller(playlist);
    }

    controller.setCurrentAlbumPlaying();
    controller.searchViewInit();
</script>