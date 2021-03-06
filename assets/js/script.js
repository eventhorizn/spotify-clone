var controller;
var userLoggedIn;
var timer;

window.addEventListener('popstate', function (event) {
	const fullUrl = window.location.href;
	const lastSlash = fullUrl.lastIndexOf('/') + 1;
	const url = fullUrl.substr(lastSlash, fullUrl.length);

	openPage(url, false);
});

function openPage(url, pushState = true) {
	if (!timer != null) {
		clearTimeout(timer);
	}

	if (url.indexOf('?') === -1) {
		url += '?';
	}

	const encodedUrl = encodeURI(`${url}&userLoggedIn=${userLoggedIn}`);
	$('#mainContent').load(encodedUrl);
	$('body').scrollTop(0);
	if (pushState) {
		history.pushState(null, null, url);
	}

	_highlightMenu(url);
}

function _highlightMenu(url) {
	_resetMenu();

	if (url.includes('index')) {
		const navMenuItem = document.getElementById('homeNav');
		const navMenuIco = document.getElementById('homeNavIco');
		navMenuItem.classList.add('currentMenu');
		navMenuIco.classList.add('currentMenu');
	}
	if (
		url.includes('browse') ||
		url.includes('album') ||
		url.includes('artist')
	) {
		const navMenuItem = document.getElementById('browseNav');
		const navMenuIco = document.getElementById('browseNavIco');
		navMenuItem.classList.add('currentMenu');
		navMenuIco.classList.add('currentMenu');
	}
	if (url.includes('yourMusic') || url.includes('playlist')) {
		const navMenuItem = document.getElementById('yourMusicNav');
		navMenuItem.classList.add('currentMenu');
	}
	if (url.includes('profile') || url.includes('updateProfile')) {
		const navMenuItem = document.getElementById('profileNav');
		navMenuItem.classList.add('currentMenu');
	}

	if (url.includes('search')) {
		const navMenuItem = document.getElementById('searchNav');
		const navMenuIco = document.getElementById('searchNavIco');
		navMenuItem.classList.add('currentMenu');
		navMenuIco.classList.add('currentMenu');
	}

	if (url.includes('userAlbum')) {
		const navMenuItem = document.getElementById('userAlbumNav');
		navMenuItem.classList.add('currentMenu');
	}

	if (url.includes('userArtist')) {
		const navMenuItem = document.getElementById('userArtistNav');
		navMenuItem.classList.add('currentMenu');
	}
}

function _resetMenu() {
	const allEls = document.querySelectorAll('.currentMenu');

	[].forEach.call(allEls, function (el) {
		el.classList.remove('currentMenu');
	});
}
