<?php

namespace App\Enums;

use ArchTech\Enums\Names;
use ArchTech\Enums\Values;

enum DaysOfWeekEnum: int
{
    use Values, Names;

    case SUN = 0;
    case MON = 1;
    case TUE = 2;
    case WED = 3;
    case THU = 4;
    case FRI = 5;
    case SAT = 6;


    /**
     * @return string
     */
    public function getHumanName(): string
    {

//        DaysOfWeekEnum::FRI->getHumanName()


        return match ($this) {
            self::SUN => 'sunday',
            self::MON => 'monday',
            self::TUE => 'TUE',
            self::WED => 'WED',
            self::THU => 'THU',
            self::FRI => 'FRI',
            self::SAT => 'SAT',
        };
    }
}
