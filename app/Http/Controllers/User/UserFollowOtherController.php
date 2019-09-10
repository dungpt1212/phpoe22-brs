<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\BookUser;
use App\Models\Book;
use App\Models\UserFollow;
use App\Models\UserActivity;
use App\Models\Role_User;

class UserFollowOtherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detailUser($id)
    {
        $user = User::findOrFail($id);
        $role_user = Role_User::where('user_id', '=', $id);
        if($role_user->count() != 0){
            return view('errors.notfound');
        }

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
            UserActivity::create([
                'user_id' => Auth::user()->id,
                'activity_id' => 2,
                'type_id' => $request->id,
            ]);

        }else{
            UserActivity::create([
                'user_id' => Auth::user()->id,
                'activity_id' => 1,
                'type_id' => $request->id,
            ]);

        }

        return $followed;
    }
}
