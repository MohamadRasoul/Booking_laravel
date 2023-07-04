<?php

namespace Database\Seeders;

use App\Models\ClinicSpecialization;
use Illuminate\Database\Seeder;

class ClinicSpecializationSeeder extends Seeder
{


    public function run(): void
    {
        ClinicSpecialization::factory(10)->create();
        
    }
}
