export class AlbumView {
	setCurrentPlaying(albumSongId, isPlaying) {
		this._resetAllTracks();

		const currentPlayRow = document.getElementById(`${Number(albumSongId)}`);

		if (currentPlayRow) {
			currentPlayRow.classList.add('currentSongRow');

			this._wait(2)
				.then(() => {
					currentPlayRow.classList.add('removeSongRow');

					return this._wait(1.5);
				})
				.then(() => {
					currentPlayRow.classList.remove('currentSongRow');
					currentPlayRow.classList.remove('removeSongRow');
				});

			const allEls = currentPlayRow.getElementsByClassName('song-change');

			for (let i = 0; i < allEls.length; i++) {
				allEls[i].classList.add('currentSong');
			}

			if (isPlaying) {
				currentPlayRow.querySelector('.play-row').style.display = 'none';
				currentPlayRow.querySelector('.pause-row').style.display = 'inline';
			}
		}
	}

	_wait = function (seconds) {
		return new Promise(function (resolve) {
			setTimeout(resolve, seconds * 1000);
		});
	};

	_resetAllTracks() {
		const allEls = document.getElementsByClassName('song-change');
		const allPlays = document.getElementsByClassName('play-row');
		const allPause = document.getElementsByClassName('pause-row');
		const currentSongRows = document.getElementsByClassName('currentSongRow');
		const removeSongRows = document.getElementsByClassName('removeSongRow');

		for (let i = 0; i < allEls.length; i++) {
			allEls[i].classList.remove('currentSong');
		}

		for (let i = 0; i < allPlays.length; i++) {
			allPlays[i].style.display = 'inline';
		}

		for (let i = 0; i < allPause.length; i++) {
			allPause[i].style.display = 'none';
		}

		for (let i = 0; i < currentSongRows.length; i++) {
			currentSongRows[i].classList.remove('currentSongRow');
		}

		for (let i = 0; i < removeSongRows.length; i++) {
			removeSongRows[i].classList.remove('removeSongRow');
		}
	}

	setCurrentPlayingAlbum(albumId) {
		this._resetAllAlbums();

		const currentAlbum = document.getElementById(`${Number(albumId)}`);
		if (currentAlbum && currentAlbum.classList.contains('album-change')) {
			currentAlbum.classList.add('currentAlbum');
		}
	}

	_resetAllAlbums() {
		const allEls = document.getElementsByClassName('album-change');
		for (let i = 0; i < allEls.length; i++) {
			allEls[i].classList.remove('currentAlbum');
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
