<?php

namespace App\Http\Resources;

use App\Models\PlaceContact;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin PlaceContact */
class PlaceContactResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'is_open' => $this->is_open,
            'open_at' => $this->open_at,
            'close_at' => $this->close_at,
            'open_days' => $this->open_days,
        ];
    }
}
