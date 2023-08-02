<?php

namespace Database\Seeders\TestSeeder;

use App\Models\Hotel;
use App\Models\PlaceContact;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{


    public function run(): void
    {
        $roomTypes = RoomType::inRandomOrder()->take(5)->get();

        Hotel::factory(10)
            ->has(PlaceContact::factory()->count(1), 'placeContact')
            ->hasAttached($roomTypes)
            ->create()
            ->each(function ($hotel) {
                setImage($hotel, 'Hotel', '3oZYfGc7ye0');
            });
    }
}
