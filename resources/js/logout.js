$(document).ready(function($) {
    $('.logout').click(function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
});
