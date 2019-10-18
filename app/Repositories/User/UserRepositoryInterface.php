<?php
namespace App\Repositories\User;

interface UserRepositoryInterface
{
    public function getAuthId();

    public function getAuth();

    public function getFollowers();

    public function getListAdminsToSendNotice($listUser);

    public function markUserAsReadNotice($idNotice);

    public function deleteNoticeIfSenderDeleteNotice($idNotice);

}
