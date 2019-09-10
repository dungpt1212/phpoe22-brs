<?php
namespace App\Repositories\UserActivity;

interface UserActivityRepositoryInterface
{
    public function getUserActivity($authId);
}
