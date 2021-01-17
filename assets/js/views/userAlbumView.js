export class UserAlbum {
	addUserAlbum(albumId) {
		const thisClass = this;

		$.post('includes/handlers/ajax/addUserAlbum.php', {
			albumId: albumId,
			username: userLoggedIn,
		}).done(function (error) {
			if (error) {
				alert(error);
				return;
			}
			thisClass._hideAddButton();
		});
	}

	removeUserAlbum(albumId) {
		const thisClass = this;

		$.post('includes/handlers/ajax/removeUserAlbum.php', {
			albumId: albumId,
			username: userLoggedIn,
		}).done(function () {
			thisClass._hideRemoveButton();
		});
	}

	_hideAddButton() {
		$('#addUserAlbumBtn').css('display', 'none');
		$('#rmvUserAlbumBtn').css('display', 'inline-block');
	}

	_hideRemoveButton() {
		$('#rmvUserAlbumBtn').css('display', 'none');
		$('#addUserAlbumBtn').css('display', 'inline-block');
	}
}
