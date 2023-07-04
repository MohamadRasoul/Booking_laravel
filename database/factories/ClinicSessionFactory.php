<?php

namespace Database\Factories;

use App\Models\Clinic;
use App\Models\ClinicSession;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ClinicSessionFactory extends Factory
{
    protected $model = ClinicSession::class;

    public function definition(): array
    {
        return [
            'slot_of_day' => $this->faker->randomNumber(1),
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addHour(),
            'clinic_id' => Clinic::inRandomOrder()->first()->id,
        ];
    }
}
