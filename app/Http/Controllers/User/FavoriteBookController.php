<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Book;
use App\Models\User;
use App\Models\BookUser;

class FavoriteBookController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $booksFavoritedByUser = BookUser::where([
            [ 'favorite', '=', 1 ],
            [ 'user_id', '=', Auth::user()->id ],

        ])->pluck('book_id');
        $books = Book::whereIn('id', $booksFavoritedByUser)->get();

        return view('user.book-favorite', compact('books'));
    }

    public function addFavoriteBook($idBook)
    {
        $book = Book::findOrFail($idBook);
        $bookUser = BookUser::firstOrCreate([
            'book_id' => $idBook,
            'user_id' => Auth::user()->id,
            'favorite' => config('constant.favorite'),

        ]);
        $favorite = 1;
        if($bookUser->wasRecentlyCreated == false){
            $bookUser->delete();
            $favorite = 0;
        };

        return response()->json(array('success' => true, 'favorite' => $favorite));

    }
}
