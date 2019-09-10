<form action="{{ route('book-detail-reply-edit', ['id' => $comment->id]) }}" class="editCommentForm{{ $comment->id }}" method="POST">
    @csrf
    <textarea name="comment_edit_content" class="comment_edit_content{{ $comment->id }}" value="{{ $comment->comment_content }}">{{ $comment->comment_content }}</textarea>
    <a href="javascript:void(0)" class="btn btn-sm btn-success btn_change" idComment='{{ $comment->id }}'>{{ trans('client.change') }}</a>
</form>
