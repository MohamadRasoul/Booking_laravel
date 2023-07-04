<?php

namespace Database\Seeders\TestSeeder;

use App\Models\Clinic;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{


    public function run(): void
    {
        Clinic::factory(10)->create();

    }
}
