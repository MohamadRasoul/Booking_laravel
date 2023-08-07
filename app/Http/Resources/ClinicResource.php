<?php

namespace App\Http\Resources;

use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Clinic */
class ClinicResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'about' => $this->about,
            'favorite_count' => $this->whenHas('favorites_count', $this->favorites_count),
            'user_is_favorite' => $this->whenHas('user_is_favorite', $this->user_is_favorite),

            'visit_count_total' => $this->whenHas('visit_count_total', $this->visit_count_total),
            'experience_years' => $this->experience_years,
            'session_duration' => $this->session_duration,
            'image' => $this->whenLoaded('media', ImageResource::make($this->getFirstMedia('Clinic'))),


            'place_contact' => PlaceContactResource::make($this->whenLoaded('placeContact')),
            'user' => AdminResource::make($this->whenLoaded('user')),
            'city' => CityResource::make($this->whenLoaded('city')),
            'clinic_specialization' => ClinicSpecializationResource::make($this->whenLoaded('clinicSpecialization')),

            'clinic_sessions' => ClinicSessionResource::collection($this->whenLoaded('clinicSessions')),
        ];
    }
}
