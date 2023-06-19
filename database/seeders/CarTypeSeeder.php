<?php

namespace Database\Seeders;

use App\Models\CarType;
use Illuminate\Database\Seeder;

class CarTypeSeeder extends Seeder
{


    public function run(): void
    {
        CarType::factory(10)->create();
    }
}
