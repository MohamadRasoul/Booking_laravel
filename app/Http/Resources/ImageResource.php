<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


/**
 * @mixin Media
 */
class ImageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $image = $this->resource ?: (object)[
            'id' => null,
            'media_url' => 'media_url',
            'media_type' => 'media_type',
            'hash' => 'hash',
            'order' => 'order',
        ];
        
        return [
            'id' => $image->id,
            'media_url' => $image->getUrl(),
            'media_type' => $image->getCustomProperty('media_type'),
            'hash' => $image->getCustomProperty('hash'),
            'order' => $image->order_column,
        ];
    }
}
