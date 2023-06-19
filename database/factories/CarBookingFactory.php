<?php

namespace Database\Factories;

use App\Enums\BookingStatusEnum;
use App\Models\OfficeCarType;
use App\Models\User;
use Faker\Provider\Fakecar;
use Illuminate\Database\Eloquent\Factories\Factory;


class CarBookingFactory extends Factory
{

    public function definition(): array
    {
        $this->faker->addProvider(new  Fakecar($this->faker));

        return [
            "car_number" => $this->faker->vehicleRegistration,
            "color" => $this->faker->hexColor,
            "manufacture_company" => $this->faker->vehicleBrand,

            "address_details" => $this->faker->address,
            "seat_number" => $this->faker->numberBetween(1, 6),

            "latitude_from" => $this->faker->latitude(32.3112, 37.3199),
            "longitude_from" => $this->faker->longitude(35.7272, 42.3770),

            "latitude_to" => $this->faker->latitude(32.3112, 37.3199),
            "longitude_to" => $this->faker->longitude(35.7272, 42.3770),

            "booking_datetime" => $this->faker->dateTimeBetween('now', '+12 hours'),
            "status" => $this->faker->randomElement(BookingStatusEnum::values()),

            "user_id" => User::inRandomOrder()->first()->id,
            "office_car_type_id" => OfficeCarType::inRandomOrder()->first()->id,
        ];
    }
}
