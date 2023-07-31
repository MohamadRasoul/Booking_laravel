<?php

namespace App\Http\Requests\Dashboard\CarOffice;

use App\Http\Requests\Dashboard\DashboardFormRequest;
use App\Models\CarOffice;
use App\Models\PlaceContact;
use Arr;


/**
 * @mixin CarOffice
 * @mixin PlaceContact
 */
class UpdateCarOfficeRequest extends DashboardFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable'],
            'image' => ['nullable'],

            'user_id' => ['nullable', 'exists:users,id'],
            'city_id' => ['nullable', 'exists:cities,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }


    public function validated($key = null, $default = null)
    {
        return Arr::whereNotNull([
            'name' => $this->name,

            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
        ]);
    }

}