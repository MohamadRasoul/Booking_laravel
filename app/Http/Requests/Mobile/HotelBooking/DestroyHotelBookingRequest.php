<?php

namespace App\Http\Requests\Mobile\HotelBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;


class DestroyHotelBookingRequest extends FormRequest
{

    public function authorize(): bool
    {

        $hotelBooking = $this->route('hotelBooking');

        return $hotelBooking->user_id == Auth::guard('api_user')->id() && $hotelBooking->status == BookingStatusEnum::PENDING;

    }


}
