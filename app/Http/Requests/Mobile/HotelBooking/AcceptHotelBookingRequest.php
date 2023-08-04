<?php

namespace App\Http\Requests\Mobile\HotelBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AcceptHotelBookingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'room_number' => ['required', 'string', 'max:10']
        ];
    }

    public function authorize(): bool
    {
        $hotelBooking = $this->route('hotelBooking');

        return $hotelBooking->hotel->user_id == Auth::guard('api_user')->id() && $hotelBooking->status == BookingStatusEnum::PENDING;

    }


    public function validated($key = null, $default = null)
    {
        return [
            "room_number" => $this->room_number,

            'status' => BookingStatusEnum::ADMIN_ACCEPTED
        ];
    }
}
