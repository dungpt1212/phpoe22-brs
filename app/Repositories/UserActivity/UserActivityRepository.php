<?php
namespace App\Repositories\UserActivity;

use App\Repositories\BaseRepository;
use App\Repositories\UserActivity\UserActivityRepositoryInterface;

class UserActivityRepository extends BaseRepository implements UserActivityRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\UserActivity::class;
    }

    public function getUserActivity($authId)
    {
        return $this->model
            ->with('user', 'activity')
            ->where('user_id', $authId)
            ->orderBy('id', 'DESC')
            ->get();
    }



}
