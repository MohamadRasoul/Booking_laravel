<?php

namespace Database\Seeders;

use App\Models\TableType;
use Illuminate\Database\Seeder;

class TableTypeSeeder extends Seeder
{


    public function run(): void
    {
        TableType::factory(10)->create();

    }
}
