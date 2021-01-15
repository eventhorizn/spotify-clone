<table>
    <tr>
        <th class="trackCount disable-select">#</th>
        <th class="trackInfo disable-select">TITLE</th>
        <th class="trackArtist disable-select">ARTIST</th>
        <th class="trackAlbum disable-select">ALBUM</th>
        <th class="trackOptions"></th>
        <th class="trackDuration"><i class="icofont-clock-time"></i></th>
    </tr>

    <?php $i = 1;?>
    <?php foreach($songIdArray as $songId):?>
        <?php $song = new Song($con, $songId);?>

        <tr id="<?=$song->getId()?>" class="hoverRow">
            <td class="disable-select">
                <i class="icofont-play-alt-2 play-row" onclick="controller.setTrack(<?=$song->getId()?>, tempPlaylist, true)"></i>
                <i class="icofont-pause pause-row" onclick="controller.pauseSong()" style="display: none"></i>
                <span class="song-change"><?=$i?></span>
            </td>
            <td class="disable-select song-change">
                <?=$song->getTitle()?>
            </td>
            <td class="disable-select">
                <label class="rowLink song-change"   
                       onclick="openPage('artist.php?id=<?=$song->getArtist()->getId()?>')">
                    <?=$song->getArtist()->getName()?>
                 </label>
            </td>
            <td class="disable-select">
                <label class="rowLink song-change" onclick="openPage('album.php?id=<?=$song->getAlbum()->getId()?>')"> 
                    <?=$song->getAlbum()->getTitle()?>
                </label>
            </td>
            <td class="disable-select" 
                onclick="controller.showOptionsMenu(this)">
                <input type="hidden" class="songId" value="<?=$song->getId()?>">
                <img src="assets/images/icons/more.png" class="optionsButton">
            </td>
            <td class="disable-select song-change">
                <?=$song->getDuration()?>
            </td>
        </tr>

        <?php $i++;?>
    <?php endforeach; ?>
    
    <script>
        var tempSongIds = '<?php echo json_encode($songIdArray);?>'
        tempPlaylist = JSON.parse(tempSongIds);
        controller.setCurrentPlaying();
        controller.setCurrentAlbumPlaying();
    </script>
</table>