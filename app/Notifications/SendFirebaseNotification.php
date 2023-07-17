<?php

namespace App\Notifications;

use App\Channels\FirebaseAndDatabaseChannel;
use Illuminate\Notifications\Notification;

class SendFirebaseNotification extends Notification
{
//    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(
        protected string $title,
        protected string $message,
        protected  $image,
    )
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return [FirebaseAndDatabaseChannel::class];
    }


    public function toDatabase($notifiable): array
    {
        return [
            'title' => $this->title,
            'message' => $this->message
        ];
    }

    public function setMediaImage($notifiable):array
    {

        return [
            'image' => $this->image,
        ];
    }


}
