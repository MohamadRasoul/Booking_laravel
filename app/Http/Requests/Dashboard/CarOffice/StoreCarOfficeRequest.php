<?php

namespace App\Http\Requests\Dashboard\CarOffice;

use App\Http\Requests\Dashboard\DashboardFormRequest;
use App\Models\CarOffice;
use App\Models\PlaceContact;


/**
 * @mixin CarOffice
 * @mixin PlaceContact
 */
class StoreCarOfficeRequest extends DashboardFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'image' => ['required'],
            'car_types' => ['array', 'min:1'],
            'car_types.*' => ['integer', 'exists:car_types,id'],

            'user_id' => ['required', 'exists:users,id'],
            'city_id' => ['required', 'exists:cities,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }


    public function validated($key = null, $default = null)
    {
        return [
            'name' => $this->name,

            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
        ];
    }

}
