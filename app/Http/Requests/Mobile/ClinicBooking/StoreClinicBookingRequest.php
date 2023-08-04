<?php

namespace App\Http\Requests\Mobile\ClinicBooking;

use App\Enums\ClinicVisitTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;


class StoreClinicBookingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "case_description" => ['nullable', 'string'],
            "clinic_visit_type" => ['nullable', new Enum(ClinicVisitTypeEnum::class)],

            "booking_datetime" => ['required', 'date:Y-m-d', 'after:now'],
            "clinic_session_id" => ['required', 'exists:clinic_sessions,id']
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return data_get($this->validator->validated(), $key, $default);
    }

}
