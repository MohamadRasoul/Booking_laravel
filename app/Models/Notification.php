<?php

namespace App\Models;

use Illuminate\Notifications\DatabaseNotification;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Notification extends DatabaseNotification implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('Restaurant')
            ->useFallbackUrl(config('app.url') . '/images/default.jpg')
            ->singleFile();
    }

}
