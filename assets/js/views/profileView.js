var profileViewClass = class ProfileView {

    logout() {
        $.post("includes/handlers/ajax/logout.php", function () {
            location.reload();
        });
    }

    updateEmail(emailClass) {
        const emailValue = $(`.${emailClass}`).val();

        $.post("includes/handlers/ajax/updateEmail.php", { email: emailValue, username: userLoggedIn }).done(function (response) {
            $(`.${emailClass}`).nextAll('.message').text(response);
        });
    }
}