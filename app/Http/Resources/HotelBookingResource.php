<?php

namespace App\Http\Resources;

use App\Models\HotelBooking;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin HotelBooking */
class HotelBookingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'room_number' => $this->room_number,

            'escorts_number' => $this->escorts_number,
            'description' => $this->description,

            "booking_datetime" => $this->booking_datetime,
            "status" => $this->status,

            "user" => UserResource::make($this->whenLoaded('user')),
            "hotel" => HotelResource::make($this->whenLoadedRelation('hotel')),
            "room_type" => RoomTypeResource::make($this->whenLoadedRelation('roomType'))
        ];
    }
}
