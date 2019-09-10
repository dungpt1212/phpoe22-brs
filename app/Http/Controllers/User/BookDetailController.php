<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoteRequest;
use Auth;
use App\Models\Book;
use App\Models\Rate;
use App\Models\Review;
use App\Models\Comment;

class BookDetailController extends Controller
{
    public function index($id)
    {
        $book = Book::findOrFail($id);
        if(Auth::check()) {
          $userRateBook = Rate::where([
                ['user_id', '=', Auth::user()->id],
                ['book_id', '=', $id],

          ])->first();
        }else {
            $userRateBook = "";
        }

        $reviews = Review::with('user', 'comments', 'book')
            ->where('book_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('user.book-detail', compact('book', 'userRateBook', 'reviews'));
    }

    public function readBook($id)
    {
        $book = Book::findOrFail($id);

        return view('user.book-read', compact('book'));
    }

    public function voteBook(VoteRequest $request, $id)
    {
        $rate = new Rate;
        $rate->book_id = $id;
        $rate->user_id = Auth::user()->id;
        $rate->stars = count($request->get('star'));
        $rate->save();

       return redirect()->back();
    }

    public function reviewBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        Review::create([
            'review_content' => $request->get('review'),
            'user_id' => Auth::user()->id,
            'book_id' => $id,

        ]);

        $reviews = Review::with('user', 'comments', 'book')
            ->where('book_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $returnHTML = view('user.book-reviews')->with('reviews', $reviews)->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML));

    }

    public function replyReview(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        Comment::create([
            'comment_content' => $request->get('reply'),
            'user_id' => Auth::user()->id,
            'review_id' => $id,

        ]);

        $returnHTML = view('user.book-replys')->with('review', $review)->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML));

    }

    public function editReply(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->comment_content = $request->get('comment_edit_content');
        $comment->save();

        $returnHTML = view('user.book-reply-edit')->with('comment', $comment)->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function deleteReply(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        $comment->delete();

        return response()->json(array('success' => true));
    }

    public function editReview(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        $review->review_content = $request->get('review_edit_content');
        $review->save();

        $returnHTML = view('user.book-review-edit')->with('review', $review)->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }

    public function deleteReview(Request $request)
    {
        $review = Review::findOrFail($request->id);
        $review->comments()->delete();
        $review->delete();

        return response()->json(array('success' => true));
    }

}
