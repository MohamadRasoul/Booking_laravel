<?php

namespace Database\Seeders\TestSeeder;

use App\Models\CarBooking;
use Illuminate\Database\Seeder;

class CarBookingSeeder extends Seeder
{


    public function run(): void
    {
        CarBooking::factory(50)->create();

    }
}
