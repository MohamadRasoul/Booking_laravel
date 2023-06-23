<?php

namespace Database\Seeders\TestSeeder;

use App\Models\RestaurantBooking;
use Illuminate\Database\Seeder;

class RestaurantBookingSeeder extends Seeder
{


    public function run(): void
    {
        RestaurantBooking::factory(10)->create();

    }
}
