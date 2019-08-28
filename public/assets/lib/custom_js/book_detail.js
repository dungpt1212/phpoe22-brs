$(document).ready(function($) {
    $('.reply_btn').click(function(event) {
        $('.reply').hide();
        var id = $(this).attr('id');
        $('#reply'+id).show();
    });
});
