<?php

namespace App\Http\Requests\Dashboard\City;

use Illuminate\Foundation\Http\FormRequest;


class UpdateCityRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => ['required', 'string']
        ];
    }
}
