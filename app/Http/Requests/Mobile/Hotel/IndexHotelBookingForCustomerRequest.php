<?php

namespace App\Http\Requests\Mobile\Hotel;

use App\Enums\BookingStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexHotelBookingForCustomerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "include" => ['nullable', 'string'],
            "filter.status" => ['integer', new Enum(BookingStatusEnum::class)],
            'filter.hotel_id' => ['integer', 'exists:hotels,id']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
