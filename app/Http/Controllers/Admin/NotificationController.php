<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RequestNewBook\RequestNewBookRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class NotificationController extends Controller
{
    protected $requireRepo;
    protected $userRepo;

    public function __construct(
        RequestNewBookRepositoryInterface $requireRepo,
        UserRepositoryInterface $userRepo
    ) {
        $this->requireRepo = $requireRepo;
        $this->userRepo = $userRepo;
    }

    public function detail($idRequire, $idNotice)
    {
        $requireBook = $this->requireRepo->find($idRequire);
        if($requireBook == false){
            $this->userRepo->deleteNoticeIfSenderDeleteNotice($idNotice);
            return view('errors.notfound');
        }
        $this->userRepo->markUserAsReadNotice($idNotice);

        return view('admin.notification.notice-require-detail', compact('requireBook'));
    }

    public function showAll()
    {
        return view('admin.notification.all-notice');
    }
}
