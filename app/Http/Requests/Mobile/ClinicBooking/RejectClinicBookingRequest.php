<?php

namespace App\Http\Requests\Mobile\ClinicBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;

class RejectClinicBookingRequest extends FormRequest
{

    public function authorize(): bool
    {

        $clinicBooking = $this->route('clinicBooking');

        return $clinicBooking->clinicSession->clinic->user_id == Auth::guard('api_user')->id() && $clinicBooking->status == BookingStatusEnum::PENDING;

    }
}
