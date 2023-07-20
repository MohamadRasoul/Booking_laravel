<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class CarOfficeFactory extends Factory
{

    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "user_id" => User::inRandomOrder()->first()->id,
            "city_id" => City::inRandomOrder()->first()->id,
        ];
    }
}
