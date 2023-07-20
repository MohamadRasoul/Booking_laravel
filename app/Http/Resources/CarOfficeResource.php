<?php

namespace App\Http\Resources;

use App\Models\CarOffice;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @mixin CarOffice
 */
class CarOfficeResource extends JsonResource
{
    public function toArray(Request $request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'place_contact' => PlaceContactResource::make($this->whenLoaded('placeContact')),
            'user' => AdminResource::make($this->whenLoaded('user')),
            'city' => CityResource::make($this->whenLoaded('city')),
            'car_types' => CarTypeResource::collection($this->whenLoaded('carTypes')),
        ];
    }
}
