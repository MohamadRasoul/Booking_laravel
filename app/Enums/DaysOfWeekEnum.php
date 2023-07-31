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


    public static function getDaysForSelect(): array
    {
        return [
            self::SUN->value => self::SUN->getHumanName(),
            self::MON->value => self::MON->getHumanName(),
            self::TUE->value => self::TUE->getHumanName(),
            self::WED->value => self::WED->getHumanName(),
            self::THU->value => self::THU->getHumanName(),
            self::FRI->value => self::FRI->getHumanName(),
            self::SAT->value => self::SAT->getHumanName(),
        ];
    }

    /**
     * @return string
     */
    public function getHumanName(): string
    {
        return match ($this) {
            self::SUN => 'Sunday',
            self::MON => 'Monday',
            self::TUE => 'Tuesday',
            self::WED => 'Wednesday',
            self::THU => 'Thursday',
            self::FRI => 'Friday',
            self::SAT => 'Saturday',
        };
    }


}

