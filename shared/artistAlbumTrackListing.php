<table>
    <tr>
        <th class="trackCount disable-select">#</th>
        <th class="trackInfo disable-select">TITLE</th>
        <th class="trackOptions"></th>
        <th class="trackDuration"><i class="icofont-clock-time"></i></th>
    </tr>

    <?php $i = 1;?>
    <?php foreach($album->getSongIds() as $songId):?>
        <?php $song = new Song($con, $songId);?>

        <tr id="<?=$song->getId()?>" class="hoverRow">
            <td class="disable-select">
                <i class="icofont-play-alt-2 play-row" onclick="controller.setTrack(<?=$song->getId()?>, playlist[<?=$album->getId()?>], true)"></i>
                <i class="icofont-pause pause-row" onclick="controller.pauseSong()" style="display: none"></i>
                <span class="song-change"><?=$i?></span>
            </td>
            <td class="disable-select song-change">
                <?=$song->getTitle()?>
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
</table>