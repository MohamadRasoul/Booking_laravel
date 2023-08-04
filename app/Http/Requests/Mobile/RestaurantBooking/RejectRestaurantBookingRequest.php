<?php

namespace App\Http\Requests\Mobile\RestaurantBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class RejectRestaurantBookingRequest extends FormRequest
{

    public function authorize(): bool
    {
        $restaurantBooking = $this->route('restaurantBooking');

        return $restaurantBooking->restaurant->user_id == Auth::guard('api_user')->id() && $restaurantBooking->status == BookingStatusEnum::PENDING;

    }
}
