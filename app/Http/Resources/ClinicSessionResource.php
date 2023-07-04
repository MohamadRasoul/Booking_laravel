<?php

namespace App\Http\Resources;

use App\Models\ClinicSession;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ClinicSession */
class ClinicSessionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slot_of_day' => $this->slot_of_day,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ];
    }
}
