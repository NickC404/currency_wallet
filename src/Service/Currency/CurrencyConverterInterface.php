<?php

namespace App\Service\Currency;

use App\Entity\Wallet;

interface CurrencyConverterInterface
{
    public function convert(int $amount, Wallet $wallet): int;
}
