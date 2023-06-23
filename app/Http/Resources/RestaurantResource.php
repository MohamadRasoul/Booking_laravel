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
            'admin' => new AdminResource($this->whenLoaded('admin')),
            'city' => new CityResource($this->whenLoaded('city')),
            'table_types' => TableTypeResource::collection($this->whenLoaded('tableTypes')),
        ];
    }
}
