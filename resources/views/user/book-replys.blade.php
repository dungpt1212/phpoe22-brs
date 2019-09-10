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
