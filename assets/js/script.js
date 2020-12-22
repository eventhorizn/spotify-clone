let currentPlaylist = [];
let audioElement;

function formatTime(secondsIn) {
    const time = Math.round(secondsIn);
    const minutes = Math.floor(time / 60);
    const seconds = time - minutes * 60;
    const extraZero = (seconds < 10) ? "0" : "";

    return `${minutes}:${extraZero}${seconds}`;
}

function updateTimeProgressBar(audio) {
    $('.progressTime.current').text(formatTime(audio.currentTime));
    $('.progressTime.remaining').text(formatTime(audio.duration - audio.currentTime));

    const progress = audio.currentTime / audio.duration * 100;
    $('.playbackBar .progress').css('width', `${progress}%`);
}

function Audio() {
    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener('canplay', function () {
        const dur = formatTime(this.duration);
        $('.progressTime.remaining').text(dur);
    });

    this.audio.addEventListener('timeupdate', function () {
        if (this.duration) {
            updateTimeProgressBar(this);
        }
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
}