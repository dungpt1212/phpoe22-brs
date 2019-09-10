<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NoticeForAdminEvent;

class PusherController extends Controller
{
    public function index()
    {
        return view('test-pusher');
    }

    public function filePusher()
    {
        event(new NoticeForAdminEvent('Hello world'));

        return "Message has been sent.";
    }
}
