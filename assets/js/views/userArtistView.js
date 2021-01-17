export class UserArtist {
	addUserArtist(artistId) {
		const thisClass = this;

		$.post('includes/handlers/ajax/addUserArtist.php', {
			artistId: artistId,
			username: userLoggedIn,
		}).done(function (error) {
			if (error) {
				alert(error);
				return;
			}
			thisClass._hideAddButton();
		});
	}

	removeUserArtist(artistId) {
		const thisClass = this;

		$.post('includes/handlers/ajax/removeUserArtist.php', {
			artistId: artistId,
			username: userLoggedIn,
		}).done(function () {
			thisClass._hideRemoveButton();
		});
	}

	_hideAddButton() {
		$('#addUserArtistBtn').css('display', 'none');
		$('#rmvUserArtistBtn').css('display', 'inline-block');
	}

	_hideRemoveButton() {
		$('#rmvUserArtistBtn').css('display', 'none');
		$('#addUserArtistBtn').css('display', 'inline-block');
	}
}
