<?php

namespace App\Http\Requests\Dashboard\Clinic;

use App\Http\Requests\Dashboard\DashboardFormRequest;
use Illuminate\Foundation\Http\FormRequest;


class StoreClinicRequest extends DashboardFormRequest
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
            'experience_years' => ['required'],
            'session_duration' => ['required', 'numeric', 'between:10,120'],
            'clinic_specialization_id' => ['required', 'exists:clinic_specializations,id'],
            'user_id' => ['required', 'exists:users,id'],
            'city_id' => ['required', 'exists:cities,id'],


        ];
    }


    public function validated($key = null, $default = null): array
    {
        return data_get($this->validator->validated(), $key, $default);
    }
}
