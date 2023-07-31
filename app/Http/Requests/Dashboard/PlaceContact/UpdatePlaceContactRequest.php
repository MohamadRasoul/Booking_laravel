<?php

namespace App\Http\Requests\Dashboard\PlaceContact;

use App\Http\Requests\Dashboard\DashboardFormRequest;
use App\Models\PlaceContact;
use Arr;


/**
 *
 * @mixin PlaceContact
 */
class UpdatePlaceContactRequest extends DashboardFormRequest
{
    public function rules(): array
    {
        return [
            'about' => ['nullable'],
            'address' => ['nullable'],
            'phone_number' => ['nullable'],
            'latitude' => ['nullable'],
            'longitude' => ['nullable',],
            'facebook_url' => ['required', 'string'],
            'instagram_url' => ['required', 'string'],
            'open_at' => ['nullable', 'date_format:H:i'],
            'close_at' => ['nullable', 'date_format:H:i'],
            'open_days' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }


    public function validated($key = null, $default = null)
    {
        return Arr::whereNotNull([
            'about' => $this->about,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'facebook_url' => $this->facebook_url,
            'instagram_url' => $this->instagram_url,
            'open_at' => $this->open_at,
            'close_at' => $this->close_at,
            'open_days' => $this->open_days,

        ]);
    }

}
