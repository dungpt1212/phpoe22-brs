$(document).ready(function() {
    $(document).on("click",".reply_btn",function(){
        $('.reply').hide();
        var id = $(this).attr('id');
        $('#reply'+id).show();
    });

});
