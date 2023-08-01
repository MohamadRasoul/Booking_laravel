<?php

namespace App\Http\Requests\Dashboard\Restaurant;

use App\Http\Requests\Dashboard\DashboardFormRequest;
use Illuminate\Foundation\Http\FormRequest;


class StoreRestaurantRequest extends DashboardFormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => ['required'],
            'image' => ['required'],
            'table_types' => ['array', 'min:1'],
            'table_types.*' => ['integer', 'exists:table_types,id'],

            'user_id' => ['required', 'exists:users,id'],
            'city_id' => ['required', 'exists:cities,id'],
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return [
            'name' => $this->name,
            'image' => $this->image,

            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
        ];
    }
}
