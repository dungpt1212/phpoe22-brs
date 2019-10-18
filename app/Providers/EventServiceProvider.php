<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\IncrementViewForBookEvent' => [
            'App\Listeners\IncrementViewForBookEventListner',
        ],
        'App\Events\SendMailWhenRequestNewBookSuccessEvent' => [
            'App\Listeners\SendMailToUserListener',
            'App\Listeners\SendMailToAdminListener',
        ],
        'App\Events\MarkBookAsReadingEvent' => [
            'App\Listeners\MarkBookAsReadingListener',
        ],
        'App\Events\ScheduleNoticeForUserEvent' => [
            'App\Listeners\ScheduleNoticeForUserListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
