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
