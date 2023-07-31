<?php

namespace App\Http\Requests\Mobile\Restaurant;

use App\Enums\BookingStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexRestaurantBookingForCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "include" => ['nullable', 'string'],
            "filter.status" => ['integer', new Enum(BookingStatusEnum::class)],
            'filter.restaurant_id' => ['integer', 'exists:restaurants,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
