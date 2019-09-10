$(document).ready(function() {
    $(document).on("click",".btn_follow",function(){
        var idUser = $(this).attr('id');
        var numberFollow = parseInt($('.number_follow').text());
        console.log(numberFollow);
        $.ajax({
            url: "user/add-follow",
            method: "GET",
            data:{
                id:idUser,
            },
            success:function(data){
                if(data == 0){
                    $('#follow_flag').html('Followed');
                    $('.btn_follow').css({
                        'background-color': 'gray',

                    });
                    $('.number_follow').text(numberFollow + 1);
                }else{
                    $('#follow_flag').html('Follow');
                    $('.btn_follow').css({
                        'background-color': '#dc3545',

                    });
                    $('.number_follow').text(numberFollow - 1);
                }
            }
        });

    });

});
