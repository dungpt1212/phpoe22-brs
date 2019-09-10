<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Notification\NotificationRepositoryInterface;
use App\Repositories\RequestNewBook\RequestNewBookRepositoryInterface;

class NotificationController extends Controller
{
    protected $requireRepo;
    protected $noticeRepo;

    public function __construct(
        RequestNewBookRepositoryInterface $requireRepo,
        NotificationRepositoryInterface $noticeRepo
    ) {
        $this->requireRepo = $requireRepo;
        $this->noticeRepo = $noticeRepo;
    }

    public function detail($idRequire, $idNotice)
    {
        $notice = $this->noticeRepo->find($idNotice);
        dd($notice);
        $requireBook = $this->requireRepo->find($idRequire);
        if($requireBook == false){
            return view('errors.notfound');
        }

        return view('admin.notification.notice-require-detail', compact('requireBook'));
    }
}
