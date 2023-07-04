<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class RestaurantResource extends JsonResource
{


    public function toArray($request): array
    {
//        return parent::toArray($request);


        return [
            "id" => $this->id,
            "name" => $this->name,
            "about" => $this->about,
            'admin' => AdminResource::make($this->whenLoaded('admin')),
            'city' => CityResource::make($this->whenLoaded('city')),
            'table_types' => TableTypeResource::collection($this->whenLoaded('tableTypes')),
        ];
    }
}
