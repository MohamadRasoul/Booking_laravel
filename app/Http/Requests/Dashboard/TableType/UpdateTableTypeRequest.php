<?php

namespace App\Http\Requests\Dashboard\TableType;

use App\Http\Requests\Dashboard\DashboardFormRequest;

class UpdateTableTypeRequest extends DashboardFormRequest
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
