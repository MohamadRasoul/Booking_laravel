<?php

namespace App\Http\Requests\Dashboard\RoomType;

use App\Http\Requests\Dashboard\DashboardFormRequest;

class UpdateRoomTypeRequest extends DashboardFormRequest
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
