<?php

namespace App\Http\Requests\Dashboard\TableType;

use App\Http\Requests\Dashboard\DashboardFormRequest;

class StoreTableTypeRequest extends DashboardFormRequest
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
