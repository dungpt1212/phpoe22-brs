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
}
