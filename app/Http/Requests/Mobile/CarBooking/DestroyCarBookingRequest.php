<?php

namespace App\Http\Requests\Mobile\CarBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;


class DestroyCarBookingRequest extends FormRequest
{

    public function authorize(): bool
    {

        $carBooking = $this->route('carBooking');

        return $carBooking->user_id == Auth::guard('api_user')->id() && $carBooking->status == BookingStatusEnum::PENDING;

    }


}
