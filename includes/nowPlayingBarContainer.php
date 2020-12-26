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
    audioElement = new Audio();
    setTrack(newPlaylist[0], newPlaylist, false);
    updateVolumeProgressBar(audioElement.audio);

    $('#nowPlayingBarContainer').on("mousedown touchstart mousemove touchmove", function(e) {
        e.preventDefault();
    });

    $('.playbackBar .progressBar').mousedown(function() {
        mouseDown = true;
    });

    $('.playbackBar .progressBar').mousemove(function(e) {
        if (mouseDown) {
            dragProgress(e, this);
        }
    });

    $('.playbackBar .progressBar').mouseup(function(e) {
        timeFromOffset(e, this);
    });

    $(".volumeBar .progressBar").mousedown(function() {
        mouseDown = true;
    });

    $(".volumeBar .progressBar").mousemove(function(e) {
        if (mouseDown) {

            var percentage = e.offsetX / $(this).width();

            if (percentage >= 0 && percentage <= 1) {
                audioElement.audio.volume = percentage;
            }
        }
    });

    $(".volumeBar .progressBar").mouseup(function(e) {
        var percentage = e.offsetX / $(this).width();

        if (percentage >= 0 && percentage <= 1) {
            audioElement.audio.volume = percentage;
        }
    });

    $(document).mouseup(function() {
        mouseDown = false;
    });
});

function dragProgress(mouse, progessBar) {
    const percentage = mouse.offsetX / $(progessBar).width() * 100;
    $('.playbackBar .progress').css('width', `${percentage}%`);
}

function timeFromOffset(mouse, progressBar) {
    const percentage = mouse.offsetX / $(progressBar).width() * 100;
    const seconds = audioElement.audio.duration * (percentage / 100);
    audioElement.setTime(seconds);
}

function prevSong() {
    if (audioElement.audio.currentTime >= 3 || currentIndex === 0) {
        audioElement.setTime(0);
    } else {
        currentIndex--;
        setTrack(currentPlaylist[currentIndex], currentPlaylist, true);
    }
}

function nextSong() {
    if (repeat) {
        audioElement.setTime(0);
        playSong();
        return;
    }

    if (currentIndex === currentPlaylist.length - 1) {
        currentIndex = 0;
    } else {
        currentIndex++;
    }

    const trackToPlay = shuffle ? shufflePlaylist[currentIndex] : currentPlaylist[currentIndex];
    setTrack(trackToPlay, currentPlaylist, true);
}

function setShuffle() {
    shuffle = !shuffle;
    const className = shuffle ? "icofont-random icon-active" : "icofont-random icon";
    $('.controlButton.shuffle i').attr('class', `${className}`);

    if (shuffle) {
        // randomize playlist
        shuffleArray(shufflePlaylist);
        currentIndex = shufflePlaylist.indexOf(audioElement.currentlyPlaying.id);
    } else {
        // shuffle has been deactivated
        // go back to regular playlist
        currentIndex = currentPlaylist.indexOf(audioElement.currentlyPlaying.id);
    }
}

function shuffleArray(a) {
    let j, x, i;
    for (i = a.length; i; i--) {
        j = Math.floor(Math.random() * i);
        x = a[i - 1];
        a[i - 1] = a[j];
        a[j] = x;
    }
}

function setRepeat() {
    repeat = !repeat;
    const className = repeat ? "icofont-retweet icon-active" : "icofont-retweet icon";
    $('.controlButton.repeat i').attr('class', `${className}`);
}

function setMute() {
    audioElement.audio.muted = !audioElement.audio.muted;
    const className = audioElement.audio.muted ? "icofont-volume-mute icon" : "icofont-volume-up icon";
    $('.controlButton.volume i').attr('class', `${className}`);
}

function setTrack(trackId, newPlaylist, play) {
    //console.log(play);
    if (newPlaylist != currentPlaylist) {
        currentPlaylist = newPlaylist;
        shufflePlaylist = currentPlaylist.slice();
        shuffleArray(shufflePlaylist);
    }

    if (shuffle) {
        currentIndex = shufflePlaylist.indexOf(trackId);
    } else {
        currentIndex = currentPlaylist.indexOf(trackId);
    }

    pauseSong();

    $.post("includes/handlers/ajax/getSongJson.php", {
        songId: trackId
    }, function(data) {
        const track = JSON.parse(data);

        $(".trackName span").text(track.title);

        $.post("includes/handlers/ajax/getArtistJson.php", {
            artistId: track.artist
        }, function(data) {
            const artist = JSON.parse(data);

            $(".artistName span").text(artist.name);
            $(".artistName").attr("href", `artist.php?id=${artist.id}`);
        });

        $.post("includes/handlers/ajax/getAlbumJson.php", {
            albumId: track.album
        }, function(data) {
            const album = JSON.parse(data);

            $(".albumLink img").attr("src", album.artworkPath);
            $(".albumLink a").attr("href", `album.php?id=${album.id}`);
        });

        audioElement.setTrack(track);
        if (play) {
            playSong();
        }

    });

    if (play) {
        audioElement.play();
    }
}

function playSong() {
    if (audioElement.audio.currentTime === 0) {
        $.post("includes/handlers/ajax/updatePlays.php", {
            songId: audioElement.currentlyPlaying.id
        });
    }

    $(".controlButton.play").hide();
    $(".controlButton.pause").show();
    audioElement.play();
}

function pauseSong() {
    $(".controlButton.play").show();
    $(".controlButton.pause").hide();
    audioElement.pause();
}
</script>

<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <a href="">
                        <img class="albumArtwork" src="" alt="Album Art">
                    </a>
                </span>

                <div class="trackInfo">
                    <span class="trackName">
                        <span></span>
                    </span>

                    <a href="" class="artistName">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>

        <div id="nowPlayingCenter">
            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle Button" onclick="setShuffle()">
                        <i class="icofont-random icon"></i>
                    </button>

                    <button class="controlButton previous" title="Previous Button" onclick="prevSong()">
                        <i class="icofont-bubble-left icon-big"></i>
                    </button>

                    <button class="controlButton controlButtonGrow play" title="Play Button" onclick="playSong()">
                        <i class="icofont-play-alt-2 icon-big"></i>
                    </button>

                    <button class="controlButton controlButtonGrow pause" title="Pause Button" style="display: none"
                        onclick="pauseSong()">
                        <i class="icofont-pause icon-big"></i>
                    </button>

                    <button class="controlButton next" title="Next Button" onClick="nextSong()">
                        <i class="icofont-bubble-right icon-big"></i>
                    </button>

                    <button class="controlButton repeat" title="Repeat Button" onclick="setRepeat()">
                        <i class="icofont-retweet icon"></i>
                    </button>
                </div>

                <div class="playbackBar">
                    <span class="progressTime current">0.00</span>
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>

                    </div>
                    <span class="progressTime total">0.00</span>
                </div>
            </div>
        </div>

        <div id="nowPlayingRight">
            <div class="volumeBar">
                <button class="controlButton volume" title="Volume Button" onclick="setMute()">
                    <i class="icofont-volume-up icon"></i>
                </button>

                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>