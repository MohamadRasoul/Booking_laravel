<?php

namespace App\Http\Requests\Mobile\HotelBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexHotelBookingForOwnerRequest extends FormRequest
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
        return $this->route('hotel')->user_id == Auth::guard('api_user')->id();
    }
}
