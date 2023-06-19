<?php

namespace Database\Seeders\TestSeeder;

use App\Models\CarOffice;
use App\Models\CarType;
use Illuminate\Database\Seeder;

class CarOfficeSeeder extends Seeder
{


    public function run(): void
    {
        CarOffice::factory(10)->create()->each(function (CarOffice $carOffice) {
            $carOffice->carTypes()->attach(
                CarType::inRandomOrder()
                    ->take(5)
                    ->pluck('id')
                    ->toArray()
            );
        });

    }
}
