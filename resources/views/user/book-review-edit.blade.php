<form action="{{ route('book-detail-review-edit', ['id' => $review->id]) }}" class="editReviewForm{{ $review->id }}" method="POST">
    @csrf
    <textarea name="review_edit_content" class="review_edit_content{{ $review->id }}" value="{{ $review->review_content }}">{{ $review->review_content }}</textarea>
    <a href="javascript:void(0)" class="btn btn-sm btn-success btn_change_review" idReview='{{ $review->id }}'>{{ trans('client.change') }}</a>
</form>
