<?php

namespace App\Http\Requests\Dashboard\Clinic;

use App\Http\Requests\Dashboard\DashboardFormRequest;
use Illuminate\Support\Arr;

class UpdateClinicRequest extends DashboardFormRequest
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
            'experience_years' => ['required'],
            'session_duration' => ['required', 'numeric', 'between:10,120'],
            'clinic_specialization_id' => ['required', 'exists:clinic_specializations,id'],
            'user_id' => ['required', 'exists:users,id'],
            'city_id' => ['required', 'exists:cities,id'],

        ];
    }


    public function validated($key = null, $default = null): array
    {
        return Arr::whereNotNull([
            'name' => $this->name,
            'image' => $this->image,
            'user_id' => $this->user_id,
            'city_id' => $this->city_id,
            'clinic_specialization_id' => $this->clinic_specialization_id,
            'session_duration' => $this->session_duration,
            'experience_years' => $this->experience_years,
        ]);
    }
}
