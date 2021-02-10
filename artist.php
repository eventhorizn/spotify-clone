<?php
    include("includes/includedFiles.php");

    if (isset($_GET['id'])) {
        $artistId = $_GET['id'];
    }
    else {
        header("Location: index.php");
    }

    $artist = new Artist();
    $artist->loadFromDB($con, $artistId);
    $doesUserHaveArtist = UserMusic::doesUserHaveArtist($con, $userLoggedIn->getUserName(), $artistId);

    $albums = Albums::getArtistAlbums($con, $artistId);
    $firstAlbum = $albums[0];
?>

<div 
    class="entityInfo entityInfoArtist borderBottom imageContainer" 
    style="--i: url('../../<?=$artist->getHeaderPath()?>')">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?=$artist->getName();?></h1>

            <div class="headerButtons">
                <button class="button green playButton"
                        onclick="controller.playArtistAlbum(playlist[<?=$firstAlbum->getId()?>][0], playlist[<?=$firstAlbum->getId()?>], <?=$firstAlbum->getId()?>)"
                        id="play-artist-btn">
                    PLAY
                </button>
                <button class="button green pauseButton" style="display: none"
                        onclick="controller.pauseAlbumSong(<?=$firstAlbum->getId()?>)"
                        id="pause-artist-btn">
                    PAUSE
                </button>
                <button 
                    id="addUserArtistBtn" 
                    onclick="controller.addUserArtist(<?=$artistId?>)" class="button" 
                    style="margin-left: 5px; <?php if($doesUserHaveArtist) { echo 'display:none';} else {echo 'display:inline-block';} ?>">
                    FOLLOW
                </button>
                <button 
                    id="rmvUserArtistBtn" 
                    onclick="controller.removeUserArtist(<?=$artistId?>)"  class="button" 
                    style="margin-left: 5px; <?php if($doesUserHaveArtist) { echo 'display:inline-block';} else {echo 'display:none';} ?>">
                </button>
            </div>
        </div>
    </div>
</div>

<div class="gridViewContainer">
    <div>
        <h2 class="album-header">ALBUMS</h2>
    </div>
    
    <?php 
        $songIdArray = array();

        foreach($albums as $album) {
            $key = $album->getId();
            $value = $album->getSongIds();
            $songIdArray[$key] = $value;
            include("shared/artistAlbum.php");
        }
    ?>
</div>

<?php include("shared/optionsMenu.php")?>