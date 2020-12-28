class Controller {
    _nowPlayingView;
    _albumView;

    constructor(playlist) {
        this._nowPlayingView = new NowPlayingView(playlist, this.setCurrentPlaying.bind(this));
        this._albumView = new AlbumView();
    }

    setShuffle() {
        this._nowPlayingView.setShuffle();
    }

    prevSong() {
        this._nowPlayingView.prevSong(this.setCurrentPlaying.bind(this));
    }

    playSong() {
        this._nowPlayingView.playSong();
    }

    pauseSong() {
        this._nowPlayingView.pauseSong();
    }

    nextSong() {
        this._nowPlayingView.nextSong(this.setCurrentPlaying.bind(this));
    }

    setRepeat() {
        this._nowPlayingView.setRepeat();
    }

    setMute() {
        this._nowPlayingView.setMute();
    }

    setTrack(trackId, newPlaylist, play) {
        this._nowPlayingView.setTrack(trackId, newPlaylist, play, this.setCurrentPlaying.bind(this));
        ;
    }

    setCurrentPlaying() {
        const currentPlayId = this._nowPlayingView.getCurrentlyPlaying().id;
        this._albumView.setCurrentPlaying(currentPlayId);
    }
}