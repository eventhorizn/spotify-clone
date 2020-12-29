var controller;
var userLoggedIn;
var timer;

$(document).click(function (click) {
    const target = $(click.target);

    if (!target.hasClass('item') && !target.hasClass('optionsButton')) {
        hideOptionsMenu();
    }
});

$(window).scroll(function () {
    hideOptionsMenu();
});

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

function showOptionsMenu(button) {
    const menu = $('.optionsMenu');
    // Distance from top of window to top of document
    const scrollTop = $(window).scrollTop();
    const elOffset = $(button).offset().top;

    const top = elOffset - scrollTop;
    const left = $(button).position().left + 45;

    menu.css({
        'top': `${top}px`,
        'left': `${left}px`,
        'display': 'inline'
    });
}

function hideOptionsMenu() {
    const menu = $('.optionsMenu');
    if (menu.css('display') != 'none') {
        menu.css('display', 'none');
    }
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

function deletePlaylist(playlistId) {
    const prompt = confirm('Are you sure you want to delete this playlist?');

    if (prompt) {
        $.post("includes/handlers/ajax/deletePlaylist.php", { playlistId: playlistId })
            .done(function (error) {
                if (error != "") {
                    alert(error);
                    return;
                }

                openPage('yourMusic.php');
            });
    }
}