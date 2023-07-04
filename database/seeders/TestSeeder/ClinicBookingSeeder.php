<?php

namespace Database\Seeders\TestSeeder;

use App\Models\ClinicBooking;
use Illuminate\Database\Seeder;

class ClinicBookingSeeder extends Seeder
{


    public function run(): void
    {
        ClinicBooking::factory(10)->create();

    }
}
