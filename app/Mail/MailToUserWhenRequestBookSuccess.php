<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\RequestNewbook;
use App\Models\User;
use Auth;

class MailToUserWhenRequestBookSuccess extends Mailable
{
    use Queueable, SerializesModels;
    public $require;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RequestNewbook $require, User $user)
    {
        $this->require = $require;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('dungdauda097@gmail.com', 'Book Online')
            ->subject('Request add new book')
            ->view('email.send-to-user-when-their-request-book-success');
    }
}
