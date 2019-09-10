<?php
namespace App\Repositories\UserFollow;

use App\Repositories\BaseRepository;
use App\Repositories\UserFollow\UserFollowRepositoryInterface;

class UserFollowRepository extends BaseRepository implements UserFollowRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\UserFollow::class;
    }

    public function getFollowings($authId)
    {
        return $this->model
            ->with('user')
            ->where('follower', $authId)
            ->get();
    }

}
