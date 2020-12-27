class Controller {
    _nowPlayingView;

    constructor(nowPlayingView) {
        this._nowPlayingView = nowPlayingView;
    }

    setShuffle() {
        this._nowPlayingView.setShuffle();
    }

    prevSong() {
        this._nowPlayingView.prevSong();
    }

    playSong() {
        this._nowPlayingView.playSong();
    }

    pauseSong() {
        this._nowPlayingView.pauseSong();
    }

    nextSong() {
        this._nowPlayingView.nextSong();
    }

    setRepeat() {
        this._nowPlayingView.setRepeat();
    }

    setMute() {
        this._nowPlayingView.setMute();
    }

    setTrack(trackId, newPlaylist, play) {
        this._nowPlayingView.setTrack(trackId, newPlaylist, play);
    }
}