<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\BookUser;
use App\Models\Book;
use App\Models\UserFollow;

class UserFollowOtherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detailUser($id)
    {
        $user = User::findOrFail($id);
        $followersThisUser = $user->userFollows;
        $numberFollower = $followersThisUser->count();
        $followed = $user->userFollows->where('follower', Auth::user()->id)->count();

        $booksFavoritedByUser = BookUser::where([
            [ 'favorite', '=', 1 ],
            [ 'user_id', '=', $id ],

        ])->pluck('book_id');
        $books = Book::with('rates', 'publisher')
            ->whereIn('id', $booksFavoritedByUser)
            ->get();


        return view('user.user-detail', compact('user', 'books', 'numberFollower', 'followed'));
    }

    public function addFollow(Request $request)
    {
        $user = User::findOrFail($request->id);

        $userFollow = UserFollow::firstOrCreate([
            'user_id' => $request->id,
            'follower' => Auth::user()->id,

        ]);

        $followed = 0;
        if($userFollow->wasRecentlyCreated == false){
            $userFollow->delete();
            $followed = 1;
        }

        return $followed;
    }
}
