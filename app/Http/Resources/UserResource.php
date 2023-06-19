<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class UserResource extends JsonResource
{


    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "username" => $this->username,
            "address" => $this->address,
            "phone_number" => $this->phone_number,
            "longitude" => $this->longitude,
            "latitude" => $this->latitude,
        ];
    }
}
