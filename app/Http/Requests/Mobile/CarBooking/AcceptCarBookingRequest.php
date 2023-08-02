<?php

namespace App\Http\Requests\Mobile\CarBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AcceptCarBookingRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            "car_number" => ['required', 'string', 'max:20'],
            "color" => ['required', 'string', 'max:20'],
            "manufacture_company" => ['required', 'string', 'max:20'],
        ];
    }

    public function authorize(): bool
    {
        $carBooking = $this->route('carBooking');

        return $carBooking->carOffice->user_id == Auth::guard('api_user')->id() && $carBooking->status == BookingStatusEnum::PENDING;

    }

    public function validated($key = null, $default = null)
    {
        return [
            "car_number" => $this->car_number,
            "color" => $this->color,
            "manufacture_company" => $this->manufacture_company,

            'status' => BookingStatusEnum::ADMIN_ACCEPTED
        ];
    }


}
