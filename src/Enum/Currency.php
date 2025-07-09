<?php

namespace App\Enum;

enum Currency: string
{
    case USD = 'USD';
    case EUR = 'EUR';

    case GBP = 'GBP';

    public function symbol(): string
    {
        return match ($this) {
            self::USD => '$',
            self::EUR => '€',
            self::GBP => '£',
        };
    }
}
