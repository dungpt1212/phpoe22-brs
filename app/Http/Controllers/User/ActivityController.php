<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\UserActivity\UserActivityRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class ActivityController extends Controller
{
    protected $userActivityRepo;
    protected $userRepo;

    public function __construct(
        UserActivityRepositoryInterface $userActivityRepo,
        UserRepositoryInterface $userRepo
    )
    {
        $this->userActivityRepo = $userActivityRepo;
        $this->userRepo = $userRepo;
        $this->middleware('auth');
    }


    public function list()
    {
        $authId = $this->userRepo->getAuthId();
        $userActivities = $this->userActivityRepo->getUserActivity($authId);

        return view('user.activity', compact('userActivities'));
    }
}
