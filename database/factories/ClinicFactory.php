<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\City;
use App\Models\Clinic;
use App\Models\ClinicSpecialization;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicFactory extends Factory
{
    protected $model = Clinic::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'about' => $this->faker->text(),
            'experience_years' => $this->faker->randomNumber(1),
            'session_duration' => $this->faker->numberBetween(15, 60),

            "clinic_specialization_id" => ClinicSpecialization::inRandomOrder()->first()->id,
            'admin_id' => Admin::inRandomOrder()->first()->id,
            'city_id' => City::inRandomOrder()->first()->id,
        ];
    }
}
