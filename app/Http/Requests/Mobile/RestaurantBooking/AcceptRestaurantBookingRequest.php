<?php

namespace App\Http\Requests\Mobile\RestaurantBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AcceptRestaurantBookingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'table_number' => ['required', 'string', 'max:10']
        ];
    }

    public function authorize(): bool
    {
        $restaurantBooking = $this->route('restaurantBooking');

        return $restaurantBooking->restaurant->user_id == Auth::guard('api_user')->id() && $restaurantBooking->status == BookingStatusEnum::PENDING;

    }


    public function validated($key = null, $default = null)
    {
        return [
            "table_number" => $this->table_number,

            'status' => BookingStatusEnum::ADMIN_ACCEPTED
        ];
    }
}
