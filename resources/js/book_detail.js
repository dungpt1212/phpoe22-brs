$(document).ready(function() {
    $(document).on("click", ".reply_btn", function() {
        $('.reply').hide();
        var id = $(this).attr('id');
        $('#reply' + id).show();
    });

    $('.send_review').click(function(event) {
        var review = $('#review').val();
        if(review.trim().length != 0){
            var form = $('#reviewForm');
            var url = form.attr('action');
            $.ajax({
                url: url,
                method: "POST",
                data: form.serialize(),
                success:function(data){
                    $('#all_reviews').html(data['html']);
                    $('#review').val('');
                }
            });
        }else{
            alert('Please enter your review');
        }

    });

    $(document).on("click",".send_reply",function(){
        var idReview = $(this).attr('idReview');
        var replyContent = $('.reply_input'+idReview).val();
        var replyNumber = parseInt($('.reply_number'+idReview).text());
        if(replyContent.trim().length != 0){
            var form = $('.replyForm'+idReview);
            var url = form.attr('action');
            $.ajax({
                url: url,
                method: "POST",
                data: form.serialize(),
                success:function(data){
                    $('.all_replys'+idReview).html(data['html']);
                    $('.reply_number'+idReview).html(replyNumber+1);
                    $('.reply_input'+idReview).val('');
                }
            });

        }else{
            alert('Please enter your comment');
        }

    });

    $(document).on("click",".btn_edit_comment",function(){
        var idComment = $(this).attr('idComment');
        $('.comment_content').show();
        $('.input_edit_comment').hide();
        $('.comment_content'+idComment).hide();
        $('.input_edit_comment'+idComment).show();


    });

    $(document).on("click",".btn_change",function(){
        var idComment = $(this).attr('idComment');
        var form = $('.editCommentForm'+idComment);
        var commentEditContent = $('.comment_edit_content'+idComment).val();
        if(commentEditContent.trim().length != 0){
            var url = form.attr('action');
            $.ajax({
                url: url,
                method: "POST",
                data: form.serialize(),
                success:function(data){
                    $('.input_edit_comment'+idComment).html(data['html']);
                    $('.input_edit_comment'+idComment).hide();
                    $('.comment_content'+idComment).html(commentEditContent);
                    $('.comment_content').show();

                }
            });
        }else{
            alert('Please enter your comment');
        }

    });

    $(document).on("click",".btn_delete_comment",function(){
        var idComment = $(this).attr('idComment');
        var idReview = $(this).attr('idReview');
        var replyNumber = parseInt($('.reply_number'+idReview).text());
        $.ajax({
            url: "book/detail/reply/delete",
            method: "GET",
            data:{
                id:idComment,
            },
            success:function(data){
                $('.comment'+idComment).remove();
                $('.reply_number'+idReview).html(replyNumber-1);
            }
        });
    });

    $(document).on("click",".btn_edit_review",function(){
        var idReview = $(this).attr('idReview');
        $('.review_content').show();
        $('.input_edit_review').hide();
        $('.review_content'+idReview).hide();
        $('.input_edit_review'+idReview).show();


    });

    $(document).on("click",".btn_change_review",function(){
        var idReview = $(this).attr('idReview');
        var form = $('.editReviewForm'+idReview);
        var reviewEditContent = $('.review_edit_content'+idReview).val();
        if(reviewEditContent.trim().length != 0){
            var url = form.attr('action');
            $.ajax({
                url: url,
                method: "POST",
                data: form.serialize(),
                success:function(data){
                    $('.input_edit_review'+idReview).html(data['html']);
                    $('.input_edit_review'+idReview).hide();
                    $('.review_content'+idReview).html(reviewEditContent);
                    $('.review_content').show();

                }
            });
        }else{
            alert('Please enter your review');
        }

    });

    $(document).on("click",".btn_delete_review",function(){
        var idReview = $(this).attr('idReview');
        $.ajax({
            url: "book/detail/review/delete",
            method: "GET",
            data:{
                id:idReview,
            },
            success:function(data){
                $('.review'+idReview).remove();
            }
        });
    });

    $(document).on("click",".btn_like",function(){
        var idBook = $(this).attr('idBook');
        var numberLike = parseInt($('.number_like').text());
        $.ajax({
            url: "book/favorite/add/" + idBook ,
            method: "GET",
            success:function(data){
                if(data['favorite'] == 1){
                    $('.number_like').html(numberLike+1);
                    $('#span_like').attr("class", "fa fa-check-circle");
                    $('.btn_like').attr("class", "bg-primary btn btn-sm btn-success mt-3 btn_like");
                }else{
                    $('.number_like').html(numberLike-1);
                    $('#span_like').attr("class", "fa fa-thumbs-up");
                    $('.btn_like').attr("class", "bg-secondary btn btn-sm btn-success mt-3 btn_like");
                }
            }
        });

    });

    $(document).on('click', '.btn_like_review', function() {
        var idReview = $(this).attr('idReview');
        var numberLike = parseInt($(this).text());
        var numberUnLike = parseInt($('#btn_unlike_review'+idReview).text());
        $.ajax({
            url: "book/detail/review/like",
            method: "GET",
            data: {
                idReview: idReview,

            },
            success:function(data){
                if(data['like'] == 1){
                    $('#btn_like_review'+idReview).html(numberLike + 1);
                    $('#btn_like_review'+idReview).css({
                        color: '#007bff',
                    });
                    if(data['unlike'] == 1){
                        $('#btn_unlike_review'+idReview).html(numberUnLike - 1);
                        $('#btn_unlike_review'+idReview).css({
                            color: '#333',
                        });
                    }
                }else{
                    $('#btn_like_review'+idReview).html(numberLike - 1);
                    $('#btn_like_review'+idReview).css({
                        color: '#333',
                    });
                }


            }

        });
    });

    $(document).on('click', '.btn_unlike_review', function() {
        var idReview = $(this).attr('idReview');
        var numberUnLike = parseInt($(this).text());
        var numberLike = parseInt($('#btn_like_review'+idReview).text());
        $.ajax({
            url: "book/detail/review/unlike",
            method: "GET",
            data: {
                idReview: idReview,

            },
            success:function(data){
                if(data['unlike'] == 1){
                    $('#btn_unlike_review'+idReview).html(numberUnLike + 1);
                    $('#btn_unlike_review'+idReview).css({
                        color: '#007bff',
                    });
                    if(data['like'] == 1){
                        $('#btn_like_review'+idReview).html(numberLike - 1);
                        $('#btn_like_review'+idReview).css({
                            color: '#333',
                        });
                    }
                }else{
                    $('#btn_unlike_review'+idReview).html(numberUnLike - 1);
                    $('#btn_unlike_review'+idReview).css({
                        color: '#333',
                    });
                }

            }

        });


    });

});
