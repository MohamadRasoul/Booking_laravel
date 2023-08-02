<?php


namespace App\Actions;

use App\Models\Clinic;
use Carbon\CarbonPeriod;

class CreateSessionForClinic
{
    public static function handle(Clinic $clinic)
    {
        $clinicContact = $clinic->placeContact;
        $open_at = $clinicContact->open_at;
        $close_at = $clinicContact->close_at;

        $start_sessions = CarbonPeriod::since($open_at)->minutes($clinic->session_duration)->until($close_at)->toArray();
        foreach ($start_sessions as $key => $start_session) {
            $clinic->clinicSessions()->create([
                'slot_of_day' => $key + 1,
                'start_time' => $start_session,
                'end_time' => (clone $start_session)->addMinute($clinic->session_duration),
                'clinic_id' => $clinic->id,
            ]);
        }
    }
}
