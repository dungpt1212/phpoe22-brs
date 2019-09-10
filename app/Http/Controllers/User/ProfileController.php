<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserFollow;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function following()
    {
        $followings = UserFollow::with('user')->where('follower', Auth::user()->id)->get();

        return view('user.profile-following', compact('followings'));
    }

    public function follower()
    {
        $userFollowers = User::findOrFail(Auth::user()->id)->userfollows->pluck('follower');
        $followers = User::whereIn('id', $userFollowers)->get();

        return view('user.profile-follower', compact('followers'));
    }
}
