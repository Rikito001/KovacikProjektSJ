<script>
$("#toggleTheme").on('change', function() {
    if($(this).is(':checked')) {
        document.cookie = "theme=dark; expires=Fri, 31 Dec 9999 23:59:59 GMT";
    } else {
        document.cookie = "theme=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
    location.reload();
});
</script>