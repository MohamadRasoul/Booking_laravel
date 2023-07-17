<?php

namespace App\Http\Resources;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Notification
 */
class NotificationResource extends JsonResource
{
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'title' => $this->data['title'],
            'message' => $this->data['message'],
            'read_at' => $this->read_at,
            'image' => $this->resolveImage(),
            'notifiable_type' => $this->notifiable_type,
            'notifiable_id' => $this->notifiable_id,
            'created_at' => $this->created_at,
        ];
    }


    protected function resolveImage()
    {
        if ($this->getFirstMedia('Notification')) {
            return ImageResource::make($this->getFirstMedia('Notification'));
        }

        return (object)[
            'id' => null,
            'media_url' => $this->getFallbackMediaUrl('Notification'),
            'media_type' => null,
            'hash' => null,
            'order' => null,
        ];
    }
}
