<?php

namespace App\Http\Requests\Mobile\ClinicBooking;

use App\Enums\BookingStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexClinicBookingForCustomerRequest extends FormRequest
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
        return true;
    }
}
