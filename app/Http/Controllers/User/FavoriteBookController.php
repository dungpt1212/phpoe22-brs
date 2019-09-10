<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Book;
use App\Models\User;
use App\Models\BookUser;
use App\Models\UserActivity;
use App\Repositories\BookUser\BookUserRepositoryInterface;
use App\Repositories\Book\BookRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class FavoriteBookController extends Controller
{
    protected $bookRepo;
    protected $bookUserRepo;
    protected $userRepo;

    public function __construct
    (
        BookRepositoryInterface $bookRepo,
        BookUserRepositoryInterface $bookUserRepo,
        UserRepositoryInterface $userRepo
    )
    {
        $this->bookRepo = $bookRepo;
        $this->bookUserRepo = $bookUserRepo;
        $this->userRepo = $userRepo;
        $this->middleware('auth');
    }

    public function index()
    {
        $booksFavoritedByUser = $this->bookUserRepo->getFavoriteBookByUser($this->userRepo->getAuthId());
        $books = $this->bookRepo->getFavoriteBook($booksFavoritedByUser);

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
        if($bookUser->wasRecentlyCreated == false) {
            $bookUser->delete();
            $favorite = 0;
        }else {
            UserActivity::create([
                'user_id' => Auth::user()->id,
                'activity_id' => 3,
                'type_id' => $idBook,
            ]);
        }


        return response()->json(array('success' => true, 'favorite' => $favorite));

    }
}
