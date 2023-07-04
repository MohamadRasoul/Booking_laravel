<?php

namespace Database\Seeders\TestSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            UserSeeder::class,
            CarOfficeSeeder::class,
            CarBookingSeeder::class,
            RestaurantSeeder::class,
            RestaurantBookingSeeder::class,
            HotelSeeder::class,
            HotelBookingSeeder::class,
            ClinicSeeder::class,
            ClinicSessionSeeder::class,
            ClinicBookingSeeder::class,
        ]);


    }
}
