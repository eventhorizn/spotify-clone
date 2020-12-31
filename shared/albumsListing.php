<?php while($row = mysqli_fetch_array($albumQuery)):?>
    <?php $artist = new Artist($con, $row['artist']); ?>

    <div class="gridViewItem">
        <span>
            <img src="<?=$row['artworkPath']?>" 
                    onclick="openPage('album.php?id=<?php echo $row['id']?>')">

            <div class="gridViewInfo">
                <span id="<?=$row['id']?>" class='album-change'
                    onclick="openPage('album.php?id=<?php $row['id'] ?>')">
                    <?=$row['title']?>
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
<?php endwhile?>