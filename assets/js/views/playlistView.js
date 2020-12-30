var playlistViewClass = class PlaylistView {

    constructor() {
        this._addEventHandlers(this);
    }

    _addEventHandlers(thisClass) {
        $(document).click(function (click) {
            const target = $(click.target);

            if (!target.hasClass('item') && !target.hasClass('optionsButton')) {
                thisClass._hideOptionsMenu();
            }
        });

        $(window).scroll(function () {
            thisClass._hideOptionsMenu();
        });

        $(document).on('change', 'select.playlist', function () {
            const select = $(this);
            const playlistId = select.val(); //contains id of playlist
            const songId = select.prev('.songId').val();

            $.post('includes/handlers/ajax/addToPlaylist.php', { playlistId: playlistId, songId: songId }).done(function () {
                thisClass._hideOptionsMenu();
                select.val('');
            });
        });
    }

    _hideOptionsMenu() {
        const menu = $('.optionsMenu');
        if (menu.css('display') != 'none') {
            menu.css('display', 'none');
        }
    }

    showOptionsMenu(button) {
        const songIdInput = $(button).children('.songId')[0];
        const songId = $(songIdInput).val();
        const menu = $('.optionsMenu');
        // Distance from top of window to top of document
        const scrollTop = $(window).scrollTop();
        const elOffset = $(button).offset().top;

        menu.find('.songId').val(songId);

        const top = elOffset - scrollTop;
        const left = $(button).position().left + 45;

        menu.css({
            'top': `${top}px`,
            'left': `${left}px`,
            'display': 'inline'
        });
    }

    removeFromPlaylist(button, playlistId) {
        const songId = $(button).prevAll('.songId').val();

        $.post("includes/handlers/ajax/removeFromPlaylist.php", { playlistId: playlistId, songId: songId })
            .done(function (error) {
                if (error != "") {
                    alert(error);
                    return;
                }

                openPage(`playlist.php?id=${playlistId}`);
            });
    }

    createPlaylist() {
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

    deletePlaylist(playlistId) {
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
}