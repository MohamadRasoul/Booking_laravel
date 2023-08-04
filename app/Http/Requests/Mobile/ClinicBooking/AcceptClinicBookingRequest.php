<?php

namespace App\Http\Requests\Mobile\ClinicBooking;

use App\Enums\BookingStatusEnum;
use App\Enums\ClinicVisitTypeEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class AcceptClinicBookingRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            "clinic_visit_type" => ['required', 'string', new Enum(ClinicVisitTypeEnum::class)],
            "case_description" => ['required', 'string', 'max:200'],
        ];
    }

    public function authorize(): bool
    {
        $clinicBooking = $this->route('clinicBooking');

        return $clinicBooking->clinicSession->clinic->user_id == Auth::guard('api_user')->id() && $clinicBooking->status == BookingStatusEnum::PENDING;

    }

    public function validated($key = null, $default = null)
    {
        return [
            "clinic_visit_type" => $this->clinic_visit_type,
            "case_description" => $this->case_description,

            'status' => BookingStatusEnum::ADMIN_ACCEPTED
        ];
    }


}
