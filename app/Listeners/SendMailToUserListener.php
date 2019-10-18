<?php

namespace App\Listeners;

use App\Events\SendMailWhenRequestNewBookSuccessEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\MailToUserWhenRequestBookSuccess;
use Illuminate\Support\Facades\Mail;
use Auth;

class SendMailToUserListener /*implements ShouldQueue*/
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SendMailWhenRequestNewBookSuccessEvent  $event
     * @return void
     */
    public function handle(SendMailWhenRequestNewBookSuccessEvent $event)
    {
        Mail::to(Auth::user())
            ->send(new MailToUserWhenRequestBookSuccess($event->require, Auth::user()));
    }
}
