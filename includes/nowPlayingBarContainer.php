<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <span>
                        <img class="albumArtwork" src="" alt="Album Art">
                    </span>
                </span>

                <div class="trackInfo">
                    <span class="trackName">
                        <span></span>
                    </span>

                    <span class="artistName">
                        <span></span>
                    </span>
                </div>
            </div>
        </div>

        <div id="nowPlayingCenter">
            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle Button" onclick="controller.setShuffle()">
                        <i class="icofont-random icon"></i>
                    </button>

                    <button class="controlButton previous" title="Previous Button" onclick="controller.prevSong()">
                        <i class="icofont-bubble-left icon-big"></i>
                    </button>

                    <button class="controlButton controlButtonGrow play" title="Play Button"
                        onclick="controller.playSong()">
                        <i class="icofont-play-alt-2 icon-big"></i>
                    </button>

                    <button class="controlButton controlButtonGrow pause" title="Pause Button" style="display: none"
                        onclick="controller.pauseSong()">
                        <i class="icofont-pause icon-big"></i>
                    </button>

                    <button class="controlButton next" title="Next Button" onClick="controller.nextSong()">
                        <i class="icofont-bubble-right icon-big"></i>
                    </button>

                    <button class="controlButton repeat" title="Repeat Button" onclick="controller.setRepeat()">
                        <i class="icofont-retweet icon"></i>
                    </button>
                </div>

                <div class="playbackBar">
                    <span class="progressTime current disable-select">0.00</span>
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>

                    </div>
                    <span class="progressTime total disable-select">0.00</span>
                </div>
            </div>
        </div>

        <div id="nowPlayingRight">
            <div class="volumeBar">
                <button class="controlButton volume" title="Volume Button" onclick="controller.setMute()">
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