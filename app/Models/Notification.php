<?php

namespace App\Models;

use App\Services\MediaService;
use Illuminate\Notifications\DatabaseNotification;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Notification extends DatabaseNotification implements HasMedia
{
    use InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('Notification')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $media->setCustomProperty('hash', MediaService::hashImage($media->getPath()));

        $media->save();
    }


}
