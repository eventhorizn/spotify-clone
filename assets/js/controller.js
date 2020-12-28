class Controller {
    _nowPlayingView;
    _albumView;

    constructor(nowPlayingView) {
        this._nowPlayingView = nowPlayingView;
        this._albumView = new AlbumView();
    }

    setShuffle() {
        this._nowPlayingView.setShuffle();
    }

    prevSong() {
        this._nowPlayingView.prevSong(setCurrentPlaying());
    }

    playSong() {
        this._nowPlayingView.playSong();
        this._albumView.playSong();
    }

    pauseSong() {
        this._nowPlayingView.pauseSong();
    }

    nextSong() {
        this._nowPlayingView.nextSong(setCurrentPlaying());
    }

    setRepeat() {
        this._nowPlayingView.setRepeat();
    }

    setMute() {
        this._nowPlayingView.setMute();
    }

    setTrack(trackId, newPlaylist, play) {
        this._nowPlayingView.setTrack(trackId, newPlaylist, play, this.setCurrentPlaying());
        ;
    }

    setCurrentPlaying() {
        const currentPlayId = this._nowPlayingView.getCurrentlyPlaying().id;
        this._albumView.setCurrentPlaying(currentPlayId);
    }
}