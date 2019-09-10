<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\RequestNewbook;

class NoticeForAdminEvent extends Notification implements ShouldQueue
{
    use Queueable;

    protected $requireBook;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RequestNewbook $requireBook)
    {
        $this->requireBook = $requireBook;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->
            ->view(
                'user.email.create-new-require-success', ['requireBook' => $this->requireBook]
            );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->requireBook->toArray();
    }
}
