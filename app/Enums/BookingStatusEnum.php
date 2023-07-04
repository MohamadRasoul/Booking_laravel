<?php

namespace App\Enums;

use ArchTech\Enums\{InvokableCases, Names, Options, Values};

enum BookingStatusEnum: int
{
    use Values, Options, Names, InvokableCases;


    case PENDING = 1;
    case ADMIN_ACCEPTED = 2;
    case ADMIN_REJECTED = 3;
    
    case DONE = 4;
    case NOT_DONE = 5;
}
