<?php

namespace App\Listeners;

use App\Events\CreateRequireAddNewBookEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendMailWhenRequireSuccessfulListner implements ShouldQueue
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
     * @param  CreateRequireAddNewBookEvent  $event
     * @return void
     */
    public function handle(CreateRequireAddNewBookEvent $event)
    {
        $email = $event->require->user->email;
        $require = $event->require->toArray();
        Mail::send('user.email.create-new-require-success', $require, function ($message) use($require, $email) {
            $message->from('dungdauda097@gmail', 'BookOnline');
            $message->to($email);
            $message->subject(trans('client.you_are_required_book').'"'.$require["book_name"].'"'.trans('client.successfully'));
        });
    }
}
