<?php

namespace App\Listeners;

use App\Events\MarkBookAsReadingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\BookUser;
use Auth;

class MarkBookAsReadingListener
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
     * @param  MarkBookAsReadingEvent  $event
     * @return void
     */
    public function handle(MarkBookAsReadingEvent $event)
    {
        $bookUser = BookUser::firstOrCreate([
            'book_id' => $event->idBook,
            'user_id' => Auth::user()->id,
            'reading' => config('constant.reading'),
        ]);
    }
}
