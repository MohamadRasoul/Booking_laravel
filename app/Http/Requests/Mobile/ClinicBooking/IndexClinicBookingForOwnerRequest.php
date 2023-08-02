<?php

namespace App\Http\Requests\Mobile\ClinicBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexClinicBookingForOwnerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "include" => ['nullable', 'string'],
            "filter.status" => ['integer', new Enum(BookingStatusEnum::class)],
            'filter.clinic_id' => ['integer', 'exists:clinics,id']
        ];
    }

    public function authorize(): bool
    {
        return $this->route('clinic')->user_id == Auth::guard('api_user')->id();
//        return true;
    }
}
