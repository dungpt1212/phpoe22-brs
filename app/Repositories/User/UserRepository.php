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

    public function getAuth()
    {
        return Auth::user();
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

    public function getListAdminsToSendNotice($listUser)
    {

        return $this->model->whereIn('id', $listUser)->get();
    }

    public function markUserAsReadNotice($idNotice)
    {
        return Auth::user()
            ->notifications
            ->where('id', $idNotice)
            ->first()
            ->markAsRead();
    }

    public function deleteNoticeIfSenderDeleteNotice($idNotice)
    {
        return Auth::user()
            ->notifications
            ->where('id', $idNotice)
            ->first()
            ->delete();
    }

}
