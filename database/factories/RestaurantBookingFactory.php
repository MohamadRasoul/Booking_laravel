<?php

namespace Database\Factories;

use App\Enums\BookingStatusEnum;
use App\Models\Restaurant;
use App\Models\TableType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class RestaurantBookingFactory extends Factory
{

    public function definition(): array
    {
        return [

            "table_number" => $this->faker->numberBetween(1, 30),

            "description" => $this->faker->text(),
            "escorts_number" => $this->faker->numberBetween(0, 10),

            "booking_datetime" => $this->faker->dateTimeBetween('now', '+12 hours'),
            "status" => $this->faker->randomElement(BookingStatusEnum::values()),

            "user_id" => User::inRandomOrder()->first()->id,
            "restaurant_id" => Restaurant::inRandomOrder()->first()->id,
            "table_type_id" => TableType::inRandomOrder()->first()->id,
        ];
    }
}
