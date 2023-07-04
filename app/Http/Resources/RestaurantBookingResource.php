<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class RestaurantBookingResource extends JsonResource
{


    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            "table_number" => $this->table_number,
            
            'escorts_number' => $this->escorts_number,
            'description' => $this->description,

            "booking_datetime" => $this->booking_datetime,
            "status" => $this->status,

            "user" => UserResource::make($this->whenLoaded('user')),
            "restaurant" => RestaurantResource::make($this->whenLoadedRelation('restaurantTableType.restaurant'))
        ];
    }
}