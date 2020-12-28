class Audio {
    _currentlyPlaying;
    _audio = document.createElement('audio');
    _progressTimeTotal = $('.progressTime.total');

    constructor() {
        this._addHandlerCanPlay();
    }

    _formatTime(secondsIn) {
        const time = Math.round(secondsIn);
        const minutes = Math.floor(time / 60);
        const seconds = time - minutes * 60;
        const extraZero = (seconds < 10) ? "0" : "";

        return `${minutes}:${extraZero}${seconds}`;
    }

    _addHandlerCanPlay() {
        const thisClass = this;
        this._audio.addEventListener('canplay', function () {
            const dur = thisClass._formatTime(this.duration);
            thisClass._progressTimeTotal.text(dur);
        });
    }

    setTrack(track) {
        this._currentlyPlaying = track;
        this._audio.src = track.path;
        localStorage.setItem('currentlyPlaying', JSON.stringify(this._currentlyPlaying));
    }

    play() {
        this._audio.play();
    }

    pause() {
        this._audio.pause();
    }

    setTime(seconds) {
        this._audio.currentTime = seconds;
    }

    getCurrentlyPlaying() {
        return this._currentlyPlaying;
    }

    getAudio() {
        return this._audio;
    }
}