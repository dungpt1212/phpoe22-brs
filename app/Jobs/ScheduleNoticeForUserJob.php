<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\MailScheduleNoticeUserReadingBook;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Mail;
use App\Models\Book;
use App\Models\User;
use App\Models\Role_User;


class ScheduleNoticeForUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userAsAdmins = Role_User::pluck('user_id')->toArray();
        $listUsersToSendMail = User::whereNotIn('id', $userAsAdmins)->get();
        foreach ($listUsersToSendMail as $user){
            $books = getReadingBooksByUser($user->id);

            Mail::to($user)
            ->send(new MailScheduleNoticeUserReadingBook($books));

        }

    }
}
