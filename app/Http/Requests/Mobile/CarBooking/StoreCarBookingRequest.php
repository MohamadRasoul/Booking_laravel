<?php

namespace App\Http\Requests\Mobile\CarBooking;

use Illuminate\Foundation\Http\FormRequest;


class StoreCarBookingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "address_details" => ['required', 'string'],
            "escorts_number" => ['required', 'integer'],

            "latitude_from" => ['required', 'numeric', 'between:-90,90'],
            "longitude_from" => ['required', 'numeric', 'between:-90,90'],
            "latitude_to" => ['required', 'numeric', 'between:-90,90'],
            "longitude_to" => ['required', 'numeric', 'between:-90,90'],

            "booking_datetime" => ['required', 'date', 'after:now'],

            'car_office_id' => ['required', 'exists:car_offices,id'],
            'car_type_id' => ['required', 'exists:car_types,id'],
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return data_get($this->validator->validated(), $key, $default);
    }

}
