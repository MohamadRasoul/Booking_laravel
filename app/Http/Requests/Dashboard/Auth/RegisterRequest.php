<?php

namespace App\Http\Requests\Dashboard\Auth;

use App\Models\Admin;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;


class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:' . Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }


    public function validated($key = null, $default = null): array
    {
        return [
            'name' => $this->name,
            'username' => $this->username,
            'password' => $this->password,
        ];
    }
}