<?php

namespace Database\Seeders\TestSeeder;

use App\Models\CarType;
use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{


    public function run(): void
    {
        Hotel::factory(10)->create()->each(function (Hotel $hotel) {
            $hotel->roomTypes()->attach(
                CarType::inRandomOrder()
                    ->take(5)
                    ->pluck('id')
                    ->toArray()
            );
        });

    }
}
