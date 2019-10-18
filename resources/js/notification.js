$('.bell_notice').click(function(event) {
    $('.notice').show();
});

$("body").mouseup(function(e) {
    var id = "notice"
    if (e.target.id != id)
    {
        $('.notice').hide();
    }
});
