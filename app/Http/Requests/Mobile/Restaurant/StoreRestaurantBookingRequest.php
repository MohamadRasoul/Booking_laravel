<?php

namespace App\Http\Requests\Mobile\Restaurant;

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
            "description" => ['nullable', 'string'],
            "escorts_number" => ['nullable', 'integer'],

            "booking_datetime" => ['required', 'date', 'after:now'],
            "restaurant_table_type_id" => ['required', 'exists:restaurant_table_type,id']
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return data_get($this->validator->validated(), $key, $default);
    }

}
