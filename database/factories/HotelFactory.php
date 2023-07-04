<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\City;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelFactory extends Factory
{
    protected $model = Hotel::class;

    public function definition(): array
    {
        return [
            "name" => $this->faker->name,
            "about" => $this->faker->text,

            "admin_id" => Admin::inRandomOrder()->first()->id,
            "city_id" => City::inRandomOrder()->first()->id,
        ];
    }
}