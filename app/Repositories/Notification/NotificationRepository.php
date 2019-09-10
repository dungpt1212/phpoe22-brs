<?php
namespace App\Repositories\Notification;

use App\Repositories\BaseRepository;
use App\Repositories\Notification\NotificationRepositoryInterface;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Notification::class;
    }

}
