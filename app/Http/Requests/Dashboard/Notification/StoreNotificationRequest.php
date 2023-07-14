<?php

namespace App\Http\Requests\Dashboard\Notification;

use App\Http\Requests\Dashboard\DashboardFormRequest;

class StoreNotificationRequest extends DashboardFormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:20'],
            'message' => ['required', 'string', 'max:50'],
            'image' => ['required', 'image','mimes:jpeg,png,jpg,gif','max:2048'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
            'image' => $this->image,
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
