<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;


class CarOfficeFactory extends Factory
{

    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "admin_id" => Admin::inRandomOrder()->first()->id,
            "city_id" => City::inRandomOrder()->first()->id,
        ];
    }
}
