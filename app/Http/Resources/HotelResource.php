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
            'about' => $this->placeContact->about,
            'favorite_count' => $this->whenHas('favorites_count', $this->favorites_count),
            'user_is_favorite' => $this->whenHas('user_is_favorite', $this->user_is_favorite),

            'visit_count_total' => $this->whenHas('visit_count_total', $this->visit_count_total),


            'image' => $this->whenLoaded('media', ImageResource::make($this->getFirstMedia('Hotel'))),
            'place_contact' => PlaceContactResource::make($this->whenLoaded('placeContact')),
            'user' => AdminResource::make($this->whenLoaded('user')),
            'city' => CityResource::make($this->whenLoaded('city')),
            'room_types' => RoomTypeResource::collection($this->whenLoaded('roomTypes')),
        ];
    }
}
