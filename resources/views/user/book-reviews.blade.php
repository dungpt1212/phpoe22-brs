@foreach($reviews as $review)
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-3 review{{ $review->id }} ">
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
                        @if(Auth::check() && ($review->user->email == Auth::user()->email))
                            <span class="ml-5">
                                <a href="javascript:void(0)" class="text-danger btn_edit_review" idReview='{{ $review->id }}'><b>{{ trans('client.edit') }}</b></a> ||
                                <a href="javascript:void(0)" class="text-danger btn_delete_review" idReview='{{ $review->id }}'><b>{{ trans('client.delete') }}</b></a>
                            </span>
                        @endif
                    </p>
                    <div class="review_content review_content{{ $review->id }} mt-1">
                        {{ $review->review_content }}
                    </div>
                    @if(Auth::check() && ($review->user->email == Auth::user()->email))
                        <div class="mt-1 input_edit_review input_edit_review{{ $review->id }}">
                            <form action="{{ route('book-detail-review-edit', ['id' => $review->id]) }}" class="editReviewForm{{ $review->id }}" method="POST">
                                @csrf
                                <textarea name="review_edit_content" class="review_edit_content{{ $review->id }}" value="{{ $review->review_content }}">{{ $review->review_content }}</textarea>
                                <a href="javascript:void(0)" class="btn btn-sm btn-success btn_change_review" idReview='{{ $review->id }}'>{{ trans('client.change') }}</a>
                            </form>
                        </div>
                    @endif
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
                                        <textarea name="reply" class="reply_input{{ $review->id }}"></textarea>
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
