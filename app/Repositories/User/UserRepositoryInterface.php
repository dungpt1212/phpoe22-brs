<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getAuthId();

    public function getFollowers();

}
