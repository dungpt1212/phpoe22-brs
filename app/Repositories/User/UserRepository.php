<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use App\Repositories\User\UserRepositoryInterface;
use Auth;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getAuthId()
    {
        return Auth::user()->id;
    }

    public function getFollowers()
    {
        $userFollowers = $this->model
            ->find($this->getAuthId())
            ->userfollows
            ->pluck('follower');

        $followers = $this->model
            ->whereIn('id', $userFollowers)
            ->get();

        return $followers;

    }

}
