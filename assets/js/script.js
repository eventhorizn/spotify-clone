let currentPlaylist = [];
let shufflePlaylist = [];
let tempPlaylist = [];
let audioElement;
let mouseDown = false;
let currentIndex = 0;
let repeat = false;
let shuffle = false;

function formatTime(secondsIn) {
    const time = Math.round(secondsIn);
    const minutes = Math.floor(time / 60);
    const seconds = time - minutes * 60;
    const extraZero = (seconds < 10) ? "0" : "";

    return `${minutes}:${extraZero}${seconds}`;
}

function updateTimeProgressBar(audio) {
    $('.progressTime.current').text(formatTime(audio.currentTime));

    const progress = audio.currentTime / audio.duration * 100;
    $('.playbackBar .progress').css('width', `${progress}%`);
}

function updateVolumeProgressBar(audio) {
    const volume = audio.volume * 100;
    $('.volumeBar .progress').css('width', `${volume}%`);
}

function Audio() {
    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener('ended', function () {
        nextSong();
    });

    this.audio.addEventListener('canplay', function () {
        const dur = formatTime(this.duration);
        $('.progressTime.total').text(dur);
    });

    this.audio.addEventListener('timeupdate', function () {
        if (this.duration) {
            updateTimeProgressBar(this);
        }
    });

    this.audio.addEventListener('volumechange', function () {
        updateVolumeProgressBar(this);
    });

    this.setTrack = function (track) {
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    this.play = function () {
        this.audio.play();
    }

    this.pause = function () {
        this.audio.pause();
    }

    this.setTime = function (seconds) {
        this.audio.currentTime = seconds;
    }
}