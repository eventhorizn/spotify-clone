 <?php foreach($artists as $artist):?>
        <div class="gridViewItem">
            <span>
                <img src="<?=$artist->getArtworkPath()?>"
                    class="artist-image"
                    onclick="openPage('artist.php?id=<?=$artist->getId()?>')">

                <div class="gridViewInfo artist-title">
                    <span 
                        class="artist-name" 
                        onclick="openPage('artist.php?id=<?=$artist->getId()?>')">
                        <?=$artist->getName()?>
                    </span>
                </div>
            </span>
        </div>
    <?php endforeach?>