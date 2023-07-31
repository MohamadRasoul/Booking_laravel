<?php

namespace Database\Factories;

use App\Enums\DaysOfWeekEnum;
use App\Models\PlaceContact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PlaceContactFactory extends Factory
{
    protected $model = PlaceContact::class;

    public function definition(): array
    {
//        $placeContactable_type = $this->faker->randomElement(BookingServiceEnum::values());

        return [
            'about' => $this->faker->text(),
            'address' => $this->faker->address(),
            'phone_number' => $this->faker->phoneNumber(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'facebook_url' => $this->faker->url(),
            'instagram_url' => $this->faker->url(),

            'open_at' => \Carbon\Carbon::parse('10:00:00')->format('H:i:s'),
            'close_at' => Carbon::parse('18:00:00')->format('H:i:s'),
            'open_days' => $this->faker->randomElements(DaysOfWeekEnum::values(), 5),


        ];
    }
}
