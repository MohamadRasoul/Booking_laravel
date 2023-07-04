<?php

namespace Database\Factories;

use App\Enums\DaysOfWeekEnum;
use App\Models\Admin;
use App\Models\City;
use App\Models\Clinic;
use App\Models\ClinicSpecialization;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicFactory extends Factory
{
    protected $model = Clinic::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'about' => $this->faker->text(),
            'experience_years' => $this->faker->randomNumber(2),
            'day_slot_number' => $this->faker->randomNumber(1),

            'open_at' => Carbon::parse('10:00:00')->format('H:i:s'),
            'close_at' => Carbon::parse('18:00:00')->format('H:i:s'),
            'open_days' => json_encode($this->faker->randomElements(DaysOfWeekEnum::values(), 5)),

            "clinic_specialization_id" => ClinicSpecialization::inRandomOrder()->first()->id,
            'admin_id' => Admin::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
        ];
    }
}
