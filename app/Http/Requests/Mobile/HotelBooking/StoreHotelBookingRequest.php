<?php

namespace App\Http\Requests\Mobile\HotelBooking;

use Illuminate\Foundation\Http\FormRequest;


class StoreHotelBookingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "description" => ['nullable', 'string'],
            "escorts_number" => ['nullable', 'integer'],

            "booking_datetime" => ['required', 'date'],
            "hotel_room_type_id" => ['required', 'exists:hotel_room_type,id']
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return data_get($this->validator->validated(), $key, $default);
    }

}
