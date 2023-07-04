<?php

namespace App\Http\Requests\Mobile\Clinic;

use Illuminate\Foundation\Http\FormRequest;

class IndexClinicRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "include" => ['nullable', 'string'],
            "filter.is_open" => ['integer', 'bool'],
            'filter.clinic_specialization_id' => ['integer', 'exists:clinic_specializations,id'],
            'filter.admin_id' => ['integer', 'exists:admins,id'],
            'filter.city_id' => ['integer', 'exists:cities,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
