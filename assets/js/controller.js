import { ProfileView } from './views/profileView.js';
import { AlbumView } from './views/albumView.js';
import { SearchView } from './views/searchView.js';
import { PlaylistView } from './views/playlistView.js';
import { NowPlayingView } from './views/nowPlayingView.js';
import { UserAlbum } from './views/userAlbumView.js';

export class Controller {
	_nowPlayingView;
	_albumView;
	_searchView;
	_playlistView;
	_profileView;
	_userAlbum;

	constructor(playlist) {
		this._nowPlayingView = new NowPlayingView(
			playlist,
			this.setCurrentPlaying.bind(this)
		);
		this._albumView = new AlbumView();
		this._searchView = new SearchView();
		this._playlistView = new PlaylistView();
		this._profileView = new ProfileView();
		this._userAlbum = new UserAlbum();
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

		if (
			this._nowPlayingView.getCurrentPlayist() != newPlaylist ||
			trackId != this._nowPlayingView.getCurrentlyPlaying().id
		) {
			this._nowPlayingView.setTrack(
				trackId,
				newPlaylist,
				play,
				this.setCurrentPlaying.bind(this)
			);
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
			this._nowPlayingView.setTrack(
				trackId,
				newPlaylist,
				play,
				this.setCurrentPlaying.bind(this)
			);
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

	updatePassword(oldPasswordClass, newPasswordClass1, newPasswordClass2) {
		this._profileView.updatePassword(
			oldPasswordClass,
			newPasswordClass1,
			newPasswordClass2
		);
	}

	searchViewInit() {
		this._searchView.init();
	}

	addUserAlbum(albumId) {
		this._userAlbum.addUserAlbum(albumId);
	}

	removeUserAlbum(albumId) {
		this._userAlbum.removeUserAlbum(albumId);
	}

	hideAddButton() {
		this._userAlbum.hideAddButton();
	}
}
