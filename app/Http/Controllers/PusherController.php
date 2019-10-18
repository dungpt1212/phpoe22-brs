<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\NoticeForAdminEvent;
use Session;

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

    public function testToken()
    {
        return view('test-token');
    }

    /*public function sendToken($token)
    {
        if(Session::token() == $token){
            return 'true';
        }return 'false';

    }*/
}
