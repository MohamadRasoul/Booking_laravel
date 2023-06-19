<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{


    public function run(): void
    {
        Admin::create([
            'name' => "super_admin",
            'username' => "super_admin",
            'password' => "12345678",
        ]);

        // \App\Models\Admin::factory(10)->create();
    }
}
