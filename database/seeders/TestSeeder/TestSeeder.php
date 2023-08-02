<?php

namespace Database\Seeders\TestSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Filesystem\Filesystem;

class TestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $file = new Filesystem;
        $file->cleanDirectory(public_path('media'));


        $this->call([
            UserSeeder::class,
            CarOfficeSeeder::class,
            CarBookingSeeder::class,
            RestaurantSeeder::class,
            RestaurantBookingSeeder::class,
            HotelSeeder::class,
            HotelBookingSeeder::class,
            ClinicSeeder::class,
            ClinicBookingSeeder::class,
        ]);


    }
}
