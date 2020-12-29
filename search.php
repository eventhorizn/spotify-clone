<?php
include("includes/includedFiles.php");

if(isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
} else {
    $term = "";
}
?>

<div class="searchContainer">
    <h4>Search for an Artist, Album, or Song</h4>
    <input type="text" class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing...">
</div>

<script>
$(".searchInput").focus();
var val = $(".searchInput").val();
$(".searchInput").val('');
$(".searchInput").val(val);


$(function() {
    let timer;

    $(".searchInput").keyup(function() {
        clearTimeout(timer);

        timer = setTimeout(function() {
            const val = $('.searchInput').val();
            openPage(`search.php?term=${val}`);
        }, 2000);
    });
});
</script>