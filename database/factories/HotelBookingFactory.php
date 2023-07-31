<?php

namespace Database\Factories;

use App\Enums\BookingStatusEnum;
use App\Models\Hotel;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


class HotelBookingFactory extends Factory
{

    public function definition(): array
    {
        return [
            "room_number" => $this->faker->numberBetween(200, 999),

            "description" => $this->faker->text(),
            "escorts_number" => $this->faker->numberBetween(0, 10),

            "booking_datetime" => $this->faker->dateTimeBetween('now', '+12 hours'),
            "status" => $this->faker->randomElement(BookingStatusEnum::values()),

            "user_id" => User::inRandomOrder()->first()->id,
            "hotel_id" => Hotel::inRandomOrder()->first()->id,
            "room_type_id" => RoomType::inRandomOrder()->first()->id,
        ];
    }
}
