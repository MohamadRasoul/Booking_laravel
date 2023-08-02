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

            "booking_datetime" => ['required', 'date', 'after:now'],

            'hotel_id' => ['required', 'exists:hotels,id'],
            'room_type_id' => ['required', 'exists:room_types,id',],
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return data_get($this->validator->validated(), $key, $default);
    }

}
