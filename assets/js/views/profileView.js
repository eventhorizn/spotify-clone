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

    updatePassword(oldPasswordClass, newPasswordClass1, newPasswordClass2) {
        const oldPassword = $(`.${oldPasswordClass}`).val();
        const newPassword1 = $(`.${newPasswordClass1}`).val();
        const newPassword2 = $(`.${newPasswordClass2}`).val();

        $.post("includes/handlers/ajax/updatePassword.php",
            {
                oldPassword: oldPassword,
                newPassword1: newPassword1,
                newPassword2: newPassword2,
                username: userLoggedIn
            }).done(function (response) {
                $(`.${oldPasswordClass}`).nextAll('.message').text(response);
            });
    }
}