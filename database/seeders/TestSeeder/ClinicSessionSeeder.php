<?php

namespace Database\Seeders\TestSeeder;

use App\Models\ClinicSession;
use Illuminate\Database\Seeder;

class ClinicSessionSeeder extends Seeder
{


    public function run(): void
    {
        ClinicSession::factory(10)->create();

    }
}
