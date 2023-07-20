<?php

namespace App\Http\Resources;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Hotel */
class HotelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'about' => $this->about,

            'place_contact' => PlaceContactResource::make($this->whenLoaded('placeContact')),
            'user' => AdminResource::make($this->whenLoaded('user')),
            'city' => CityResource::make($this->whenLoaded('city')),
            'room_types' => RoomTypeResource::collection($this->whenLoaded('roomTypes')),
        ];
    }
}
