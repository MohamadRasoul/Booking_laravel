<?php

namespace App\Http\Requests\Dashboard\CarType;

use App\Http\Requests\Dashboard\DashboardFormRequest;

class StoreCarTypeRequest extends DashboardFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required','string'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
