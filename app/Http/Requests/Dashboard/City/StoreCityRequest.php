<?php

namespace App\Http\Requests\Dashboard\City;


use Illuminate\Foundation\Http\FormRequest;


class StoreCityRequest extends FormRequest
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


    public function validated($key = null, $default = null): array
    {
        return data_get($this->validator->validated(), $key, $default);
    }

}
