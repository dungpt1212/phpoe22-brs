@extends('user.layouts.master')
@section('title', trans('detail'))
@section('content')
<div class="container above detail_book">
    <div class="row ml-5">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <img src="{{ $book->image }}" alt="">
            <h5 class="mt-3">{{ trans('client.votes') }} {{ '('.$book->rates->count().')' }}</h5>
            @if(Auth::check())
                @if(empty($userRateBook))
                    <form class="vote" action="{{ route('book-detail-vote', ['id' => $book->id]) }}" method="POST">
                        @csrf
                        <p>
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                            <input type="checkbox" name="star[]" value="1" class="star">
                        </p>
                        <button type="submit" class="btn btn-sm btn-primary mt-3">{{ trans('client.send') }}</button>
                        @if($errors->has('star'))
                            <div class="alert alert-danger mt-2">
                               {{ $errors->first('star') }}
                            </div>
                        @endif
                    </form>
                @else
                    <i>{{ trans('client.you_are_voted') }} {{ $userRateBook->stars }} {{ trans('client.star_for_book') }}</i>
                @endif
            @else
                <p><i>{{ trans('client.login_to_rate') }}</i></p>
            @endif
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-8 right ml-5">
            <h3>{{ $book->title }}</h3>
            <p>
                {{ trans('author') }}:
                <span class="text-secondary">
                    @foreach ($book->authors as $author)
                        {{ $author->author_name }},
                    @endforeach
                </span>
            </p>
            <p>{{ trans('client.category') }}: <span class="text-secondary">{{ $book->category->category_name }}</span></p>
            <p>{{ trans('client.publisher') }}: <span class="text-secondary">{{ $book->publisher->publisher_name }}</span></p>
            <p>{{ trans('date') }}: <span class="text-secondary">{{ $book->created_at }}</span></p>
            <a href="{{ route('book-read', ['id' => $book->id]) }}" class="btn btn-sm btn-success mt-3">{{ trans('read_book') }}</a>
            <div class="description mt-3">
                {{ $book->book_description }}
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    </div>
</div>

<div class="container under ml-5">
    <h4 class="ml-5 mb-5 mt-5">{{ trans('review') }}</h4>
    <div class="row ml-5">
        @if(Auth::check())
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            @if(!empty(Auth::user()->avatar))
                                <img src="{{ Auth::user()->avatar }}" alt="">
                            @else
                                <img src="{{ config('constant.avatar_empty') }}" alt="">
                            @endif
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-10">
                            <form action="{{ route('book-detail-review', ['id' => $book->id]) }}" method="POST" id="reviewForm">
                                @csrf
                                 <textarea name="review" id="review" autofocus></textarea>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                                <a href="javascript:void(0)" class="btn btn-primary send_review" idBook="{{ $book->id }}">{{ trans('client.send') }}</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p><i class="text-danger">Please login to write review for this book</i></p>
        @endif
        <div class="container-fluid" id="all_reviews">
            @foreach($reviews as $review)
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-3 ">
                    <div class="container-fluid comment">
                        <div class="row mt-2">
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                                @if(!empty($review->user->avatar))
                                    <img src="{{ $review->user->avatar }}" alt="">
                                @else
                                    <img src="{{ config('constant.avatar_empty') }}" alt="">
                                @endif
                            </div>
                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-11">
                                <p class="gmail_comment">
                                    <b>{{ $review->user->email }}</b>
                                    <span class="ml-3 text-secondary">{{ $review->created_at }}</span>
                                </p>
                                <div class="comment_content mt-1">
                                    {{ $review->review_content }}
                                </div>
                                @if(Auth::check())
                                    <p>
                                        <span class="fa fa-thumbs-up"></span >
                                        <span class="fa fa-thumbs-down ml-3"></span>
                                        <span class="ml-3 reply_btn" id="{{ $review->id }}">(<b class="reply_number{{ $review->id }}">{{ $review->comments->count() }}</b>){{ trans('client.reply') }}</span>
                                    </p>
                                    <div class="container-fluid reply" id="reply{{ $review->id }}">
                                        <div class="row">
                                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                                @if(!empty(Auth::user()->avatar))
                                                    <img src="{{ Auth::user()->avatar }}" alt="">
                                                @else
                                                    <img src="{{ config('constant.avatar_empty') }}" alt="">
                                                @endif
                                            </div>
                                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-11">
                                                <form action="{{ route('book-detail-reply', ['id' => $review->id]) }}" method="POST" class="replyForm{{ $review->id }}">
                                                    @csrf
                                                    <textarea name="reply" class="reply_input{{ $review->id }}" autofocus></textarea>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                                                    <a href="javascript:void(0)" class="btn btn-sm btn-primary send_reply" idReview='{{ $review->id }}'>{{ trans('client.send') }}</a>
                                            </div>
                                                </form>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                                                <div class="container-fluid all_replys{{ $review->id }}">
                                                    @foreach($review->comments as $comment)
                                                        <div class="row mt-2 comment{{ $comment->id }}">
                                                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                                                @if(!empty($comment->user->avatar))
                                                                    <img src="{{ $review->user->avatar }}" alt="">
                                                                @else
                                                                    <img src="{{ config('constant.avatar_empty') }}" alt="">
                                                                @endif
                                                            </div>
                                                            <div class="col-xs-1 col-sm-1 col-md-1 col-lg-11">
                                                                <p class="gmail_comment">
                                                                    <b>{{ $comment->user->email }}</b>
                                                                    <span class="ml-3 text-secondary">{{ $comment->created_at }}</span>
                                                                    @if($comment->user->email == Auth::user()->email)
                                                                        <span class="ml-5">
                                                                            <a href="javascript:void(0)" class="text-danger btn_edit_comment" idComment='{{ $comment->id }}'><b>{{ trans('client.edit') }}</b></a> ||
                                                                            <a href="javascript:void(0)" class="text-danger btn_delete_comment" idComment='{{ $comment->id }}' idReview='{{ $review->id }}'><b>{{ trans('client.delete') }}</b></a>
                                                                        </span>
                                                                    @endif
                                                                </p>
                                                                <div class="comment_content comment_content{{ $comment->id }} mt-1">
                                                                    {{ $comment->comment_content }}
                                                                </div>
                                                                @if($comment->user->email == Auth::user()->email)
                                                                    <div class="mt-1 input_edit_comment input_edit_comment{{ $comment->id }}">
                                                                        <form action="{{ route('book-detail-reply-edit', ['id' => $comment->id]) }}" class="editCommentForm{{ $comment->id }}" method="POST">
                                                                            @csrf
                                                                            <textarea name="comment_edit_content" class="comment_edit_content{{ $comment->id }}" value="{{ $comment->comment_content }}">{{ $comment->comment_content }}</textarea>
                                                                            <a href="javascript:void(0)" class="btn btn-sm btn-success btn_change" idComment='{{ $comment->id }}'>{{ trans('client.change') }}</a>
                                                                        </form>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection

@section('customjs')
    <script>
        $(document).ready(function($) {
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
                    url: "{{ route('book-detail-reply-delete') }}",
                    method: "POST",
                    data:{
                        id:idComment,
                        _token: '{{csrf_token()}}'
                    },
                    success:function(data){
                        $('.comment'+idComment).remove();
                        $('.reply_number'+idReview).html(replyNumber-1);
                    }
                });
            });
        });
    </script>
@endsection

