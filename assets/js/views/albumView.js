class AlbumView {
    setCurrentPlaying(albumSongId) {
        this._resetAllTracks();

        const currentPlayRow = document.getElementById(`${Number(albumSongId)}`);

        if (currentPlayRow) {
            const allEls = currentPlayRow.getElementsByClassName('song-change')

            for (let i = 0; i < allEls.length; i++) {
                allEls[i].classList.toggle('currentSong');
            }
        }
    }

    _resetAllTracks() {
        const allEls = document.getElementsByClassName('song-change');
        for (let i = 0; i < allEls.length; i++) {
            allEls[i].classList.remove('currentSong');
        }
    }
}