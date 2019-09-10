<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\UserActivity;
use App\Models\User;

class ActivityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function list()
    {
        $userActivities = UserActivity::with('user', 'activity')
            ->where('user_id', Auth::user()->id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('user.activity', compact('userActivities'));
    }
}
