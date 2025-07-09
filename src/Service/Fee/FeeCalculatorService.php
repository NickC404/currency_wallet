<?php

namespace App\Service\Fee;

use Brick\Money\Money;

final class FeeCalculatorService
{
    public const string LEVEL_LOW = 'low';
    public const int LEVEL_LOW_VALUE = 100;
    public const string LEVEL_MEDIUM = 'medium';
    public const int LEVEL_MEDIUM_VALUE = 200;
    public const string LEVEL_HIGH = 'high';
    public const int LEVEL_HIGH_VALUE = 300;
    public const array FEE_LEVELS = [
        self::LEVEL_LOW => [
            'min' => 0,
            'max' => 100,
            'value' => 200,
        ],
        self::LEVEL_MEDIUM => [
            'min' => 101,
            'max' => 200,
            'value' => 300,
        ],
        self::LEVEL_HIGH => [
            'min' => 201,
            'value' => 300,
        ],
    ];

    public function determineFee(Money $money): string
    {
        $amount = $money->getAmount();

        return match (true) {
            $amount->isGreaterThan(self::FEE_LEVELS[self::LEVEL_LOW]['min'])
                && $amount->isLessThan(self::FEE_LEVELS[self::LEVEL_LOW]['max']) => self::LEVEL_LOW_VALUE,
            $amount->isGreaterThan(self::FEE_LEVELS[self::LEVEL_MEDIUM]['min'])
                && $amount->isLessThan(self::FEE_LEVELS[self::LEVEL_MEDIUM]['max']) => self::LEVEL_MEDIUM_VALUE,
            $amount->isGreaterThan(self::FEE_LEVELS[self::LEVEL_HIGH]['min'])
                && $amount->isLessThan(self::FEE_LEVELS[self::LEVEL_HIGH]['max']) => self::LEVEL_HIGH_VALUE,
        };
    }
}
