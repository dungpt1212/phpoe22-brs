<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests\EditProfileFormRequest;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserFollow\UserFollowRepositoryInterface;

class ProfileController extends Controller
{
    protected $userRepo;
    protected $userFollowRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
        UserFollowRepositoryInterface $userFollowRepo
    )
    {
        $this->userRepo = $userRepo;
        $this->userFollowRepo = $userFollowRepo;
        $this->middleware('auth');
    }

    public function following()
    {
        $followings = $this->userFollowRepo->getFollowings($this->userRepo->getAuthId());
        return view('user.profile-following', compact('followings'));

    }

    public function follower()
    {
        $followers = $this->userRepo->getFollowers();
        return view('user.profile-follower', compact('followers'));

    }

    public function editProfile()
    {
        return view('user.profile-edit');
    }

    public function postEditProfile(EditProfileFormRequest $request)
    {
        $data = [];
        $data['name'] = $request->get('name');
        $data['password'] = Hash::make($request->get('password'));

        if($request->hasFile('avatar')){
            $filename = uniqid(). "." . $request->avatar->extension();
            $path = $request->avatar->storeAs('images/avatars', $filename);
            $data['avatar'] = $path;
        }

        $this->userRepo->update($this->userRepo->getAuthId(), $data);

        return redirect()->back()->with('msg', 'Update Successfully');
    }
}
