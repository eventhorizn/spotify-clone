<?php foreach($albums as $album):?>
    <?php $artist = $album->getArtist(); ?>

    <div class="gridViewItem">
        <span>
            <img src="<?=$album->getArtworkPath()?>" 
                    onclick="openPage('album.php?id=<?=$album->getId()?>')">

            <div class="gridViewInfo">
                <span id="<?=$album->getId()?>" class='album-change'
                    onclick="openPage('album.php?id=<?=$album->getId()?>')">
                    <?=$album->getTitle()?>
                </span>
            </div>

            <div class="gridViewInfo">
                <span class="artist-name" 
                        onclick="openPage('artist.php?id=<?=$artist->getId()?>')">
                    <?=$artist->getName()?>
                </span>
            </div>
        </span>
    </div>
<?php endforeach?>