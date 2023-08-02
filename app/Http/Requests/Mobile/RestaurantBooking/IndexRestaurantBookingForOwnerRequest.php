<?php

namespace App\Http\Requests\Mobile\RestaurantBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexRestaurantBookingForOwnerRequest extends FormRequest
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
        return $this->route('restaurant')->user_id == Auth::guard('api_user')->id();
    }
}
