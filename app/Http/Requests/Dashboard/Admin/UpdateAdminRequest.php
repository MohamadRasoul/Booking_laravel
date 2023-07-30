<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UpdateAdminRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'username' => ['required'],
            'password' => ['nullable', 'confirmed'],
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return Arr::whereNotNull([
            'name' => $this->name,
            'username' => $this->username,
            'password' => $this->password,
        ]);
    }
}
