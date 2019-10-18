<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoteRequest;
use App\Events\IncrementViewForBookEvent;
use App\Events\MarkBookAsReadingEvent;
use Auth;
use App\Models\Book;
use App\Models\Rate;
use App\Models\Review;
use App\Models\Comment;
use App\Models\BookUser;
use App\Models\ReviewLike;
use App\Models\UserActivity;

class BookDetailController extends Controller
{
    public function index($id)
    {
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        if (Auth::check()) {
            $numberLike = BookUser::where([
                [ 'book_id', '=', $id ],
                [ 'favorite', '=', 1 ],

            ])->count();
            $userLikedBook = BookUser::where([
                [ 'book_id', '=', $id ],
                [ 'favorite', '=', 1 ],
                [ 'user_id', '=', Auth::user()->id ],

            ])->count();
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

        return view('user.book-detail', compact('book', 'userRateBook', 'reviews', 'numberLike', 'userLikedBook'));
    }

    public function readBook($id)
    {
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        event(new IncrementViewForBookEvent($book));
        event(new MarkBookAsReadingEvent($id));

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
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

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

        UserActivity::create([
            'user_id' => Auth::user()->id,
            'activity_id' => 4,
            'type_id' => $id,
        ]);

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

        UserActivity::create([
            'user_id' => Auth::user()->id,
            'activity_id' => 5,
            'type_id' => $review->book_id,
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

    public function likeReview(Request $request)
    {
        $review = Review::findOrFail($request->idReview);

        $userLikedReview = ReviewLike::where([
            ['user_id', '=', Auth::user()->id],
            ['review_id', '=', $request->idReview],

        ])->first();

        $userUnLikedReview = checkUserUnLikedReview($request->idReview);

        if (empty($userLikedReview)) {
            $userLikedReview = ReviewLike::firstOrCreate([
                'review_id' => $request->idReview,
                'user_id' => Auth::user()->id,
                'like' => 1,

            ]);
        } else {
            if ($userLikedReview->like == 0) {
                $userLikedReview->like = 1;
                $userLikedReview->unlike = 0;
                $userLikedReview->save();
            } else {
                $userLikedReview->like = 0;
                $userLikedReview->save();
            }
        }

        return response()->json(array('success' => true, 'like'=>$userLikedReview->like, 'unlike' => $userUnLikedReview));
    }

    public function unlikeReview(Request $request)
    {
        $review = Review::findOrFail($request->idReview);

        $userUnLikedReview = ReviewLike::where([
            ['user_id', '=', Auth::user()->id],
            ['review_id', '=', $request->idReview],

        ])->first();

        $userLikedReview = checkUserLikedReview($request->idReview);

        if (empty($userUnLikedReview)) {
            $userUnLikedReview = ReviewLike::firstOrCreate([
                'review_id' => $request->idReview,
                'user_id' => Auth::user()->id,
                'unlike' => 1,

            ]);
        } else {
            if ($userUnLikedReview->unlike == 0) {
                $userUnLikedReview->unlike = 1;
                $userUnLikedReview->like = 0;
                $userUnLikedReview->save();
            } else {
                $userUnLikedReview->unlike = 0;
                $userUnLikedReview->save();
            }
        }

        return response()->json(array('success' => true, 'unlike' => $userUnLikedReview->unlike, 'like' => $userLikedReview));
    }

}
