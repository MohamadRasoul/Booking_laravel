<?php

namespace App\Channels;

use App\Http\Resources\NotificationResource;
use App\Services\MediaService;
use DB;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Notifications\Channels\DatabaseChannel;
use Illuminate\Notifications\Notification;
use Kutia\Larafirebase\Facades\Larafirebase;
use Spatie\MediaLibrary\HasMedia;

class FirebaseAndDatabaseChannel extends DatabaseChannel
{
    public function send($notifiable, Notification $notification)
    {
        $storedNotification = parent::send($notifiable, $notification);


        if ($storedNotification instanceof HasMedia) {

            (new MediaService())->storeImage(
                model: $storedNotification,
                image: $notification->setMediaImage($notifiable)['image'],
                collection: $notification->setMediaImage($notifiable)['imageCollection'],
            );
        } else {
            throw new Exception('this model not include image');
        }

        DB::commit();
        $this->sendFirebase($notifiable, $storedNotification);

    }

    /**
     * @param $notifiable
     * @param $notification
     * @return Response
     */
    protected function sendFirebase($notifiable, $notification)
    {

        $data = [
            "registration_ids" => [
                $notifiable->routeNotificationForFcm()
            ],
        ];

        //for IOS
        $data["notification"] = new NotificationResource(clone $notification);

        //for Android
        $data["data"] = new NotificationResource(clone $notification);

        return Larafirebase::fromRaw($data)->send();
    }

}
