<?php

namespace App\Listeners;

use App\Events\SendMailWhenRequestNewBookSuccessEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailToAdminWhenRequestBookSuccess;
use App\Models\Role_User;
use App\Models\User;
use Auth;

class SendMailToAdminListener implements ShouldQueue
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
        $useAsAdmin = Role_User::pluck('user_id')->toArray();
        $listReceivers = User::whereIn('id', $useAsAdmin)->get();

        Mail::to($listReceivers)
            ->send(new MailToAdminWhenRequestBookSuccess($event->require));
    }
}
