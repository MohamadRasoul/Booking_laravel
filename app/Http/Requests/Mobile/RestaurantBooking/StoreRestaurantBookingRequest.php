<?php

namespace App\Http\Requests\Mobile\RestaurantBooking;

use Illuminate\Foundation\Http\FormRequest;


class StoreRestaurantBookingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "description" => ['required', 'string'],

            "booking_datetime" => ['required', 'date'],
            "restaurant_table_type_id" => ['required', 'exists:restaurant_table_type,id']
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return data_get($this->validator->validated(), $key, $default);
    }

}
