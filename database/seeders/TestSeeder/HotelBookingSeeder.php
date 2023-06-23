<?php

namespace Database\Seeders\TestSeeder;

use App\Models\HotelBooking;
use Illuminate\Database\Seeder;

class HotelBookingSeeder extends Seeder
{


    public function run(): void
    {
        HotelBooking::factory(10)->create();

    }
}
