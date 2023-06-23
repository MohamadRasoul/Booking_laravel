<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarBookingResource extends JsonResource
{
    public function toArray(Request $request): array
    {

        return [
            "id" => $this->id,
            "car_number" => $this->car_number,
            "color" => $this->color,
            "manufacture_company" => $this->manufacture_company,
            "address_details" => $this->address_details,
            "escorts_number" => $this->escorts_number,
            "latitude_from" => $this->latitude_from,
            "longitude_from" => $this->longitude_from,
            "latitude_to" => $this->latitude_to,
            "longitude_to" => $this->longitude_to,
            "booking_datetime" => $this->booking_datetime,
            "status" => $this->status,
            "user" => UserResource::make($this->whenLoaded('user')),
            "car_office" => CarOfficeResource::make($this->whenLoadedRelation('officeCarType.carOffice'))
        ];
    }
}
