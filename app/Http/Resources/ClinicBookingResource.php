<?php

namespace App\Http\Resources;

use App\Models\ClinicBooking;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin ClinicBooking */
class ClinicBookingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'clinic_visit_type' => $this->clinic_visit_type,
            'case_description' => $this->case_description,
            'booking_datetime' => $this->booking_datetime,
            'status' => $this->status,

            'user' => UserResource::make($this->whenLoaded('user')),
            'clinic_session' => ClinicSessionResource::make($this->whenLoaded('clinicSession')),
            'clinic' => ClinicResource::make($this->whenLoadedRelation('clinicSession.clinic')),
        ];
    }
}
