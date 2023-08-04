<?php

namespace App\Http\Requests\Mobile\CarBooking;

use App\Enums\BookingStatusEnum;
use Auth;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class IndexCarBookingForOwnerRequest extends FormRequest
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
        return $this->route('carOffice')->user_id == Auth::guard('api_user')->id();
//        return true;
    }
}
