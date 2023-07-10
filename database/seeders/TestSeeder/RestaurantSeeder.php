<?php

namespace Database\Seeders\TestSeeder;

use App\Models\PlaceContact;
use App\Models\Restaurant;
use App\Models\TableType;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{


    public function run(): void
    {

        $tableTypes = TableType::inRandomOrder()->take(5)->get();
        Restaurant::factory(10)
            ->has(PlaceContact::factory()->count(1), 'placeContact')
            ->hasAttached($tableTypes)
            ->create();
    }
}
