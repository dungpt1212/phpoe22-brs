<?php
namespace App\Repositories\nNotification;

use App\Repositories\BaseRepository;
use App\Repositories\nNotification\NotificationRepositoryInterface;

class NotificationRepository extends BaseRepository implements NotificationRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Notification::class;
    }

}
