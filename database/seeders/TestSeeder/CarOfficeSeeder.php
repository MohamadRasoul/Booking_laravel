<?php

namespace Database\Seeders\TestSeeder;

use App\Models\CarOffice;
use App\Models\CarType;
use App\Models\PlaceContact;
use Illuminate\Database\Seeder;

class CarOfficeSeeder extends Seeder
{


    public function run(): void
    {
        $carType = CarType::inRandomOrder()->take(5)->get();

        CarOffice::factory(10)
            ->has(PlaceContact::factory()->count(1), 'placeContact')
            ->hasAttached($carType)
            ->create();

    }
}
