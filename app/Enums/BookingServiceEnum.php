<?php

namespace App\Enums;

use App\Models\CarOffice;
use App\Models\Clinic;
use App\Models\Hotel;
use App\Models\Restaurant;
use ArchTech\Enums\{InvokableCases, Names, Options, Values};

enum BookingServiceEnum: string
{
    use Values, Options, Names, InvokableCases;


    case CAR_OFFICE = CarOffice::class;
    case RESTAURANT = Restaurant::class;
    case HOTEL = Hotel::class;
    case CLINIC = Clinic::class;
}
