<?php

namespace App\Enums;

use ArchTech\Enums\{InvokableCases, Names, Options, Values};

enum ClinicVisitTypeEnum: int
{
    use Values, Options, Names, InvokableCases;


    case SICK = 1;
    case REVIEW = 2;
    case EMERGENCY = 3;
}
