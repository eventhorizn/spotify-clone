var searchViewClass = class SearchView {
    init() {
        $(".searchInput").focus();
        var val = $(".searchInput").val();
        $(".searchInput").val('');
        $(".searchInput").val(val);


        $(function () {
            $(".searchInput").keyup(function () {
                clearTimeout(timer);

                timer = setTimeout(function () {
                    const val = $('.searchInput').val();
                    openPage(`search.php?term=${val}`);
                }, 2000);
            });
        });

        $(".searchInput").on("keydown", function (event) {
            if (event.which == 13) {
                const val = $('.searchInput').val();
                openPage(`search.php?term=${val}`);
            }
        });
    }
}