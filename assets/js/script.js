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

//TODO: Make standalong playlistView.js
function createPlaylist() {
    const popup = prompt('Please enter the name of your playlist');

    if (popup != null) {
        $.post("includes/handlers/ajax/createPlaylist.php", { name: popup, username: userLoggedIn })
            .done(function (error) {
                if (error != "") {
                    alert(error);
                    return;
                }

                openPage('yourMusic.php');
            });
    }
}