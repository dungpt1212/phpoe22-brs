<?php

namespace App\Listeners;

use App\Events\IncrementViewForBookEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;

class IncrementViewForBookEventListner
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
     * @param  IncrementViewForBookEvent  $event
     * @return void
     */
    public function handle(IncrementViewForBookEvent $event)
    {
        $book = $event->book;
        $bookKey = 'book_'.$book->id;
        if(!Session::has($bookKey)){
            $book->increment('view');
            Session::put($bookKey, 1);
        }
    }
}
