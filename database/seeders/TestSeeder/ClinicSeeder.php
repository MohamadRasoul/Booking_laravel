<?php

namespace Database\Seeders\TestSeeder;

use App\Actions\CreateSessionForClinic;
use App\Models\Clinic;
use App\Models\PlaceContact;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{


    public function run(): void
    {


        Clinic::factory(10)
            ->has(PlaceContact::factory()->count(1), 'placeContact')
            ->create()
            ->each(function ($clinic) {
                setImage($clinic, 'Clinic', '48993685');
            })
            ->each(function (Clinic $clinic) {
                (new  CreateSessionForClinic)->handle($clinic);
            });
    }
}
