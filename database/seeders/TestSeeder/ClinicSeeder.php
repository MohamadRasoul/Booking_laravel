<?php

namespace Database\Seeders\TestSeeder;

use App\Models\Clinic;
use App\Models\PlaceContact;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{


    public function run(): void
    {


        Clinic::factory(10)
            ->has(PlaceContact::factory()->count(1), 'placeContact')
            ->create()
            ->each(function (Clinic $clinic) {
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
            });

    }
}
