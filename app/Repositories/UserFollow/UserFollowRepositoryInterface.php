<?php
namespace App\Repositories\UserFollow;

interface UserFollowRepositoryInterface
{
    public function getFollowings($authId);

}
