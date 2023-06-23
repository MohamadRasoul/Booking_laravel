<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class RestaurantBookingResource extends JsonResource
{


    public function toArray($request): array
    {
        return [
            'id' => $this->id,

            "booking_datetime" => $this->booking_datetime,
            "status" => $this->status,

            "user" => UserResource::make($this->whenLoaded('user')),
            "restaurant" => RestaurantResource::make($this->whenLoadedRelation('restaurantTableType.restaurant'))
        ];
    }
}
