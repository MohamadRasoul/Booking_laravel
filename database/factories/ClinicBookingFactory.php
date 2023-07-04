<?php

namespace Database\Factories;

use App\Enums\BookingStatusEnum;
use App\Enums\ClinicVisitTypeEnum;
use App\Models\ClinicBooking;
use App\Models\ClinicSession;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClinicBookingFactory extends Factory
{
    protected $model = ClinicBooking::class;

    public function definition(): array
    {
        return [
            'clinic_visit_type' => $this->faker->randomElement(ClinicVisitTypeEnum::values()),
            'case_description' => $this->faker->text(),

            "booking_datetime" => $this->faker->dateTimeBetween('now', '+12 hours'),
            "status" => $this->faker->randomElement(BookingStatusEnum::values()),

            "user_id" => User::inRandomOrder()->first()->id,
            "clinic_session_id" => ClinicSession::inRandomOrder()->first()->id,
        ];
    }
}
