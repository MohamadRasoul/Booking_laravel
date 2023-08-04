<?php

namespace App\Http\Requests\Mobile\CarBooking;

use App\Enums\BookingStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexCarBookingForCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "include" => ['nullable', 'string'],
            "filter.status" => ['integer', new Enum(BookingStatusEnum::class)],
            'filter.car_office_id' => ['integer', 'exists:car_offices,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
