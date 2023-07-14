<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

abstract class DashboardFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        $messages = $validator->messages();
        foreach ($messages->all() as $message) {
            toastr()->error($message, 'Error Validation');
        }
        parent::failedValidation($validator);
    }


}
