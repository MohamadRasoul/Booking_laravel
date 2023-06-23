<?php

namespace Database\Seeders\TestSeeder;

use App\Models\Restaurant;
use App\Models\TableType;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{


    public function run(): void
    {
        Restaurant::factory(10)->create()->each(function (Restaurant $restaurant) {
            $restaurant->tableTypes()->attach(
                TableType::inRandomOrder()
                    ->take(5)
                    ->pluck('id')
                    ->toArray()
            );
        });

    }
}
