<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\TestSeeder\TestSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            citySeeder::class,
            AdminSeeder::class,
            CarTypeSeeder::class,
            TableTypeSeeder::class,
        ]);


        $this->callWith([
            TestSeeder::class
        ]);

    }
}
