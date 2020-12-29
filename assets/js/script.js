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
}