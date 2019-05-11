$(document).ready(function () {

    $('select').on('change', function () {
        let searchForm = document.getElementById("searchForm");
        searchForm.submit();
    });

});