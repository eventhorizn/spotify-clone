import { Audio } from './../classes/audio.js';

export class NowPlayingView {
	_progressTimeCurrent = $('.progressTime.current');
	_playbackBarProgress = $('.playbackBar .progress');
	_volumeBarProgress = $('.volumeBar .progress');
	_audioElement;
	_currentPlaylist = [];
	_shufflePlaylist = [];
	_progressMouseDown = false;
	_volMouseDown = false;
	_currentIndex = 0;
	_repeat = false;
	_shuffle = false;

	constructor(currentPlaylist, callback) {
		this._audioElement = new Audio();
		this._currentPlaylist = currentPlaylist;
		this._shufflePlaylist = this._currentPlaylist.slice();

		this.setTrack(currentPlaylist[0], this._currentPlaylist, false, callback);
		this.updateVolumeProgressBar(this._audioElement.getAudio());

		this._addEventHandlers(this);
	}

	_addEventHandlers(thisClass) {
		$('#nowPlayingBarContainer').on(
			'mousedown touchstart mousemove touchmove',
			function (e) {
				e.preventDefault();
			}
		);

		$('.playbackBar .progressBar').mousedown(function () {
			thisClass._progressMouseDown = true;
			$('.playbackBar .progress').addClass('progress-active');
		});

		$('.volumeBar .progressBar').mousedown(function () {
			thisClass._volMouseDown = true;
			$('.volumeBar .progress').addClass('progress-active');
		});

		$(document).mousemove(function (e) {
			if (thisClass._progressMouseDown) {
				thisClass.dragProgress(e, $('.playbackBar .progressBar'));
			}

			if (thisClass._volMouseDown) {
				thisClass.dragVolume(e, $('.volumeBar .progressBar'));
			}
		});

		$(document).mouseup(function (e) {
			if (thisClass._progressMouseDown) {
				thisClass.timeFromOffset(e, $('.playbackBar .progressBar'));
				$('.playbackBar .progress').removeClass('progress-active');
			}

			if (thisClass._volMouseDown) {
				thisClass.volumeFromOffset(e, $('.volumeBar .progressBar'));
				$('.volumeBar .progress').removeClass('progress-active');
			}

			thisClass._progressMouseDown = false;
			thisClass._volMouseDown = false;
		});

		$('.volumeBar .progressBar').bind('wheel', function (e) {
			e.preventDefault();

			let volume = thisClass._audioElement.getAudio().volume * 100;

			if (e.originalEvent.deltaY < 0) {
				volume += 5;
			} else {
				volume -= 5;
			}

			volume = volume / 100;

			if (volume >= 0 && volume <= 1) {
				thisClass._audioElement.getAudio().volume = volume;
			}
		});

		this._audioElement.getAudio().addEventListener('ended', function () {
			thisClass.nextSong();
		});

		this._audioElement.getAudio().addEventListener('timeupdate', function () {
			if (this.duration) {
				thisClass.updateTimeProgressBar(this);
			}
		});

		this._audioElement.getAudio().addEventListener('volumechange', function () {
			thisClass.updateVolumeProgressBar(this);
		});
	}

	_formatTime(secondsIn) {
		const time = Math.round(secondsIn);
		const minutes = Math.floor(time / 60);
		const seconds = time - minutes * 60;
		const extraZero = seconds < 10 ? '0' : '';

		return `${minutes}:${extraZero}${seconds}`;
	}

	updateTimeProgressBar(audio) {
		this._progressTimeCurrent.text(this._formatTime(audio.currentTime));

		const progress = (audio.currentTime / audio.duration) * 100;
		this._playbackBarProgress.css('width', `${progress}%`);
	}

	updateVolumeProgressBar(audio) {
		const volume = audio.volume * 100;
		this._volumeBarProgress.css('width', `${volume}%`);
	}

	dragProgress(mouse, progressBar) {
		const offset = mouse.pageX - $(progressBar).offset().left;
		const percentage = (offset / $(progressBar).width()) * 100;

		if (percentage >= 0 && percentage <= 100) {
			this._playbackBarProgress.css('width', `${percentage}%`);
		}
	}

	dragVolume(mouse, volumeBar) {
		const offset = mouse.pageX - $(volumeBar).offset().left;
		const percentage = offset / $(volumeBar).width();

		if (percentage >= 0 && percentage <= 1) {
			this._audioElement.getAudio().volume = percentage;
		}
	}

	timeFromOffset(mouse, progressBar) {
		const offset = mouse.pageX - $(progressBar).offset().left;
		const percentage = (offset / $(progressBar).width()) * 100;
		const seconds = this._audioElement.getAudio().duration * (percentage / 100);
		this._audioElement.setTime(seconds);
	}

	volumeFromOffset(mouse, volumeBar) {
		const offset = mouse.pageX - $(volumeBar).offset().left;
		const percentage = offset / $(volumeBar).width();

		if (percentage >= 0 && percentage <= 1) {
			this._audioElement.getAudio().volume = percentage;
		}
	}

	prevSong(callback) {
		if (
			this._audioElement.getAudio().currentTime >= 3 ||
			this._currentIndex === 0
		) {
			this._audioElement.setTime(0);
		} else {
			this._currentIndex--;
			this.setTrack(
				this._currentPlaylist[this._currentIndex],
				this._currentPlaylist,
				true,
				callback
			);
		}
	}

	nextSong(callback) {
		if (this._repeat) {
			this._audioElement.setTime(0);
			this.playSong();
			return;
		}

		if (this._currentIndex === this._currentPlaylist.length - 1) {
			this._currentIndex = 0;
		} else {
			this._currentIndex++;
		}

		const trackToPlay = this._shuffle
			? this._shufflePlaylist[this._currentIndex]
			: this._currentPlaylist[this._currentIndex];
		this.setTrack(trackToPlay, this._currentPlaylist, true, callback);
	}

	setShuffle() {
		this._shuffle = !this._shuffle;
		const className = this._shuffle
			? 'icofont-random icon-active'
			: 'icofont-random icon';
		$('.controlButton.shuffle i').attr('class', `${className}`);

		if (this._shuffle) {
			// randomize playlist
			this._shuffleArray(this._shufflePlaylist);
			this._currentIndex = this._shufflePlaylist.indexOf(
				this._audioElement.getCurrentlyPlaying().id
			);
		} else {
			// shuffle has been deactivated
			// go back to regular playlist
			this._currentIndex = this._currentPlaylist.indexOf(
				this._audioElement.getCurrentlyPlaying().id
			);
		}
	}

	_shuffleArray(a) {
		let j, x, i;
		for (i = a.length; i; i--) {
			j = Math.floor(Math.random() * i);
			x = a[i - 1];
			a[i - 1] = a[j];
			a[j] = x;
		}
	}

	setRepeat() {
		this._repeat = !this._repeat;
		const className = this._repeat
			? 'icofont-retweet icon-active'
			: 'icofont-retweet icon';
		$('.controlButton.repeat i').attr('class', `${className}`);
	}

	setMute() {
		this._audioElement.getAudio().muted = !this._audioElement.getAudio().muted;
		const className = this._audioElement.getAudio().muted
			? 'icofont-volume-mute icon'
			: 'icofont-volume-up icon';
		$('.controlButton.volume i').attr('class', `${className}`);
	}

	setTrack(trackId, newPlaylist, play, callback) {
		if (newPlaylist != this._currentPlaylist) {
			this._currentPlaylist = newPlaylist;
			this._shufflePlaylist = this._currentPlaylist.slice();
			this._shuffleArray(this._shufflePlaylist);
		}

		if (this._shuffle) {
			this._currentIndex = this._shufflePlaylist.indexOf(trackId);
		} else {
			this._currentIndex = this._currentPlaylist.indexOf(trackId);
		}

		this.setSongAjax(trackId, play).then((_) => {
			if (callback) callback();
		});
	}

	setSongAjax(trackId, play) {
		const thisClass = this;
		return $.post(
			'includes/handlers/ajax/getSongJson.php',
			{
				songId: trackId,
			},
			function (data) {
				const track = JSON.parse(data);

				$('.trackName span').text(track.title);

				$.post(
					'includes/handlers/ajax/getArtistJson.php',
					{
						artistId: track.artist,
					},
					function (data) {
						const artist = JSON.parse(data);

						$('.trackInfo .artistName span').text(artist.name);

						$('.trackInfo .artistName span').attr(
							'onClick',
							`openPage('artist.php?id=${artist.id}')`
						);
					}
				);

				$.post(
					'includes/handlers/ajax/getAlbumJson.php',
					{
						albumId: track.album,
					},
					function (data) {
						const album = JSON.parse(data);

						$('.content .albumLink img').attr('src', album.artworkPath);
						$('.content .albumLink span').attr(
							'onClick',
							`openPage('album.php?id=${album.id}')`
						);
						$('.trackInfo .trackName span').attr(
							'onClick',
							`openPage('album.php?id=${album.id}')`
						);
					}
				);

				thisClass._audioElement.setTrack(track);
				if (play) {
					thisClass.playSong();
				}
			}
		);
	}

	playSong() {
		if (this._audioElement.getAudio().currentTime === 0) {
			$.post('includes/handlers/ajax/updatePlays.php', {
				songId: this._audioElement.getCurrentlyPlaying().id,
			});
		}

		$('.controlButton.play').hide();
		$('.controlButton.pause').show();
		this._audioElement.play();
	}

	pauseSong() {
		$('.controlButton.play').show();
		$('.controlButton.pause').hide();

		this._audioElement.pause();
	}

	getCurrentlyPlaying() {
		return this._audioElement.getCurrentlyPlaying();
	}

	getAudioPaused() {
		return this._audioElement.getAudio().paused;
	}

	getCurrentPlayist() {
		return this._currentPlaylist;
	}
}
