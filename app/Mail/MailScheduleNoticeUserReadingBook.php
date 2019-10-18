<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;

class MailScheduleNoticeUserReadingBook extends Mailable /*implements ShouldQueue*/
{
    use Queueable, SerializesModels;
    public $books;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Collection $books)
    {
        $this->books = $books;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('dungdauda097@gmail.com', 'Book Online')
            ->subject('Alert about your reading books')
            ->view('email.mail-schedule-notice-user-reading-book');
    }
}
