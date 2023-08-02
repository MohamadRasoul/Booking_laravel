<?php

namespace App\Http\Requests\Dashboard\ClinicSpecialization;

use App\Http\Requests\Dashboard\DashboardFormRequest;
use Illuminate\Foundation\Http\FormRequest;


class UpdateClinicSpecializationRequest extends DashboardFormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string'],
        ];
    }


}
