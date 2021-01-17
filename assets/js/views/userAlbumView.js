export class UserAlbum {
	constructor() {}

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
			thisClass.hideAddButton();
		});
	}

	removeUserAlbum(albumId) {
		const thisClass = this;

		$.post('includes/handlers/ajax/removeUserAlbum.php', {
			albumId: albumId,
			username: userLoggedIn,
		}).done(function () {
			thisClass.hideRemoveButton();
		});
	}

	hideAddButton() {
		$('#addUserBtn').css('display', 'none');
		$('#rmvUserBtn').css('display', 'inline-block');
	}

	hideRemoveButton() {
		$('#rmvUserBtn').css('display', 'none');
		$('#addUserBtn').css('display', 'inline-block');
	}
}
