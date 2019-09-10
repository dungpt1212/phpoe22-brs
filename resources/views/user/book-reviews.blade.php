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
                                        <textarea name="reply" class="reply_input{{ $review->id }}"></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                                        <a href="javascript:void(0)" class="btn btn-sm btn-primary send_reply" idReview='{{ $review->id }}'>{{ trans('client.send') }}</a>
                                </div>
                                    </form>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-2">
                                    <div class="container-fluid all_replys{{ $review->id }}">
                                        @foreach($review->comments as $comment)
                                            <div class="row mt-2">
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
                                                    </p>
                                                     <div class="comment_content mt-1">
                                                        {{ $comment->comment_content }}
                                                    </div>
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
