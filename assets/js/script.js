var controller;
var userLoggedIn;

function openPage(url) {
    if (url.indexOf('?') === -1) {
        url += "?";
    }

    var encodedUrl = encodeURI(`${url}&userLoggedIn=${userLoggedIn}`);
    $('#mainContent').load(encodedUrl);
    $('body').scrollTop(0);
    history.pushState(null, null, url);
}