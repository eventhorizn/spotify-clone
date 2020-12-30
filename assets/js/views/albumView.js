var albumView = class AlbumView {
    setCurrentPlaying(albumSongId, isPlaying) {
        this._resetAllTracks();

        const currentPlayRow = document.getElementById(`${Number(albumSongId)}`);

        if (currentPlayRow) {
            const allEls = currentPlayRow.getElementsByClassName('song-change')

            for (let i = 0; i < allEls.length; i++) {
                allEls[i].classList.add('currentSong');
            }

            if (isPlaying) {
                currentPlayRow.querySelector('.play-row').style.display = 'none';
                currentPlayRow.querySelector('.pause-row').style.display = 'inline';
            }
        }
    }

    _resetAllTracks() {
        const allEls = document.getElementsByClassName('song-change');
        for (let i = 0; i < allEls.length; i++) {
            allEls[i].classList.remove('currentSong');
        }

        const allPlays = document.getElementsByClassName('play-row');
        const allPause = document.getElementsByClassName('pause-row');

        for (let i = 0; i < allPlays.length; i++) {
            allPlays[i].style.display = 'inline';
        }

        for (let i = 0; i < allPause.length; i++) {
            allPause[i].style.display = 'none';
        }
    }

    playSong(albumSongId) {
        const currentPlayRow = document.getElementById(`${Number(albumSongId)}`);

        if (currentPlayRow) {
            currentPlayRow.querySelector('.play-row').style.display = 'none';
            currentPlayRow.querySelector('.pause-row').style.display = 'inline';
        }
    }

    pauseSong(albumSongId) {
        const currentPlayRow = document.getElementById(`${Number(albumSongId)}`);

        if (currentPlayRow) {
            currentPlayRow.querySelector('.play-row').style.display = 'inline';
            currentPlayRow.querySelector('.pause-row').style.display = 'none';
        }
    }
}