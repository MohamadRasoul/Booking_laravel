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
        $this->callWith([
            TestSeeder::class
        ]);

        $this->call([
            citySeeder::class,
            AdminSeeder::class,
        ]);
    }
}
