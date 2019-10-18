<?php
namespace App\Repositories\RoleUser;

use App\Repositories\BaseRepository;
use App\Repositories\RoleUser\RoleUserRepositoryInterface;

class RoleUserRepository extends BaseRepository implements RoleUserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Role_User::class;
    }

    public function getUserAsAdmin()
    {
        return $this->model->pluck('user_id')->toArray();
    }

}
