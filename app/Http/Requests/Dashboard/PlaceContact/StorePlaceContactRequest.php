<?php

namespace App\Http\Requests\Dashboard\PlaceContact;

use App\Http\Requests\Dashboard\DashboardFormRequest;
use App\Models\PlaceContact;


/**
 *
 * @mixin PlaceContact
 */
class StorePlaceContactRequest extends DashboardFormRequest
{
    public function rules(): array
    {
        return [
            'about' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required',],
            'facebook_url' => ['required'],
            'instagram_url' => ['required',],
            'open_at' => ['required', 'date_format:H:i'],
            'close_at' => ['required', 'date_format:H:i'],
            'open_days' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }


    public function validated($key = null, $default = null)
    {
        return [
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

        ];
    }

}
