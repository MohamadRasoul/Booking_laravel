<?php

namespace App\Http\Requests\Dashboard\Restaurant;

use App\Http\Requests\Dashboard\DashboardFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateRestaurantRequest extends DashboardFormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['nullable'],
            'image' => ['nullable'],
            'table_types' => ['array', 'min:1'],
            'table_types.*' => ['integer', 'exists:table_types,id'],
            'user_id' => ['nullable', 'exists:users,id'],
            'city_id' => ['nullable', 'exists:cities,id'],
        ];
    }


    public function validated($key = null, $default = null): array
    {
          return Arr::WhereNotNull([
            'name' =>$this->name,
            'image' =>$this->image,

            'user_id' =>$this->user_id,
            'city_id' =>$this-> city_id,
          ]);



    }
}
