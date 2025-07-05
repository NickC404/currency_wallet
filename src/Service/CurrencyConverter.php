<?php

namespace App\Service;

use Brick\Money\Exception\UnknownCurrencyException;
use Brick\Money\Money;

class CurrencyConverter
{
    /**
     * @throws UnknownCurrencyException
     */
    public function convert(int $amount, string $currencyFrom, string $currencyTo): Money
    {
        return Money::ofMinor($amount, $currencyTo);
    }
}
