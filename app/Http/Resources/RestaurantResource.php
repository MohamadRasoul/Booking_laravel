<?php

namespace App\Http\Resources;

use App\Models\Restaurant;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @mixin Restaurant
 */
class RestaurantResource extends JsonResource
{


    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "about" => $this->about,
            'favorite_count' => $this->favorite_count,
            'visit_count_total' => $this->whenHas('visit_count_total', $this->visit_count_total),
            'image' => $this->whenLoaded('media', ImageResource::make($this->getFirstMedia('Restaurant'))),
            'place_contact' => PlaceContactResource::make($this->whenLoaded('placeContact')),
            'user' => AdminResource::make($this->whenLoaded('user')),
            'city' => CityResource::make($this->whenLoaded('city')),
            'table_types' => TableTypeResource::collection($this->whenLoaded('tableTypes')),
        ];
    }
}
