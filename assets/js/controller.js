var controllerClass = class Controller {
    _nowPlayingView;
    _albumView;
    _playlistView;
    _profileView;

    constructor(playlist) {
        this._nowPlayingView = new nowPlayingView(playlist, this.setCurrentPlaying.bind(this));
        this._albumView = new albumView();
        this._playlistView = new playlistViewClass();
        this._profileView = new profileViewClass();
    }

    setShuffle() {
        this._nowPlayingView.setShuffle();
    }

    prevSong() {
        this._nowPlayingView.prevSong(this.setCurrentPlaying.bind(this));
    }

    playSong() {
        const currentPlayId = this._nowPlayingView.getCurrentlyPlaying().id;
        this._nowPlayingView.playSong();
        this._albumView.playSong(currentPlayId);

        $('.playButton').hide();
        $('.pauseButton').show();
    }

    pauseSong() {
        const currentPlayId = this._nowPlayingView.getCurrentlyPlaying().id;
        this._nowPlayingView.pauseSong();
        this._albumView.pauseSong(currentPlayId);

        $('.playButton').show();
        $('.pauseButton').hide();
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
        if (play) {
            $('.playButton').hide();
            $('.pauseButton').show();
        }

        if (this._nowPlayingView.getCurrentPlayist() != newPlaylist ||
            trackId != this._nowPlayingView.getCurrentlyPlaying().id) {
            this._nowPlayingView.setTrack(trackId, newPlaylist, play, this.setCurrentPlaying.bind(this));
            ;
        } else {
            this.playSong();
        }
    }

    playFromArtistAlbum(trackId, newPlaylist, play) {
        if (play) {
            $('.playButton').hide();
            $('.pauseButton').show();
        }

        if (this._nowPlayingView.getCurrentPlayist() != newPlaylist) {
            this._nowPlayingView.setTrack(trackId, newPlaylist, play, this.setCurrentPlaying.bind(this));
            ;
        } else {
            this.playSong();
        }
    }

    setCurrentPlaying() {
        if (this._nowPlayingView.getCurrentlyPlaying()) {
            const isPlaying = !this._nowPlayingView.getAudioPaused();
            const currentPlayId = this._nowPlayingView.getCurrentlyPlaying().id;
            const currentAlbum = this._nowPlayingView.getCurrentlyPlaying().album;
            this._albumView.setCurrentPlaying(currentPlayId, isPlaying);
            this._albumView.setCurrentPlayingAlbum(currentAlbum);

            if (isPlaying) {
                $('.playButton').hide();
                $('.pauseButton').show();
            }
        }
    }

    setCurrentAlbumPlaying() {
        if (this._nowPlayingView.getCurrentlyPlaying()) {
            const currentAlbum = this._nowPlayingView.getCurrentlyPlaying().album;
            this._albumView.setCurrentPlayingAlbum(currentAlbum);
        }
    }

    showOptionsMenu(button) {
        this._playlistView.showOptionsMenu(button);
    }

    removeFromPlaylist(button, playlistId) {
        this._playlistView.removeFromPlaylist(button, playlistId);
    }

    createPlaylist() {
        this._playlistView.createPlaylist();
    }

    deletePlaylist(playlistId) {
        this._playlistView.deletePlaylist(playlistId);
    }

    logout() {
        this._profileView.logout();
    }

    updateEmail(emailClass) {
        this._profileView.updateEmail(emailClass);
    }
}