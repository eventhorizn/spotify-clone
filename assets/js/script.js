var controller;
var userLoggedIn;
var timer;

function openPage(url) {
    if (!timer != null) {
        clearTimeout(timer);
    }

    if (url.indexOf('?') === -1) {
        url += "?";
    }

    var encodedUrl = encodeURI(`${url}&userLoggedIn=${userLoggedIn}`);
    $('#mainContent').load(encodedUrl);
    $('body').scrollTop(0);
    history.pushState(null, null, url);

    highlightMenu(url);
}

function highlightMenu(url) {
    _resetMenu();

    if (url.includes('index')) {
        const navMenuItem = document.getElementById('homeNav');
        const navMenuIco = document.getElementById('homeNavIco');
        navMenuItem.classList.add('currentMenu');
        navMenuIco.classList.add('currentMenu');
    }
    if (url.includes('browse') || url.includes('album') || url.includes('artist')) {
        const navMenuItem = document.getElementById('browseNav');
        const navMenuIco = document.getElementById('browseNavIco');
        navMenuItem.classList.add('currentMenu');
        navMenuIco.classList.add('currentMenu');
    }
    if (url.includes('yourMusic') || url.includes('playlist')) {
        const navMenuItem = document.getElementById('yourMusicNav');
        navMenuItem.classList.add('currentMenu');
    }
    if (url.includes('profile')) {
        const navMenuItem = document.getElementById('profileNav');
        navMenuItem.classList.add('currentMenu');
    }

    if (url.includes('search')) {
        const navMenuItem = document.getElementById('searchNav');
        const navMenuIco = document.getElementById('searchNavIco');
        navMenuItem.classList.add('currentMenu');
        navMenuIco.classList.add('currentMenu');
    }
}

function _resetMenu() {
    const allEls = document.querySelectorAll('.currentMenu');

    [].forEach.call(allEls, function (el) {
        el.classList.remove('currentMenu');
    });
}