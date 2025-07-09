<?php

namespace App\Service\Currency;

use Brick\Money\CurrencyConverter;
use Brick\Money\Exception\CurrencyConversionException;
use Brick\Money\ExchangeRateProvider\ConfigurableProvider;
use Brick\Money\Money;

final class CurrencyConverterService
{
    private CurrencyConverter $converter;

    public function __construct()
    {
        $currencyProvider = $this->setConfigurableProvider();
        $this->converter = new CurrencyConverter($currencyProvider);
    }

    /**
     * @throws CurrencyConversionException
     */
    public function convert(Money $money, $toCurrency): Money
    {
        return $this->converter->convert($money, $toCurrency);
    }

    private function setConfigurableProvider(): ConfigurableProvider
    {
        $provider = new ConfigurableProvider();
        $provider->setExchangeRate('EUR', 'GBP', 1.1);
        $provider->setExchangeRate('GBP', 'EUR', 0.91);

        $provider->setExchangeRate('EUR', 'USD', 0.90);
        $provider->setExchangeRate('USD', 'EUR', 1.20);

        $provider->setExchangeRate('USD', 'GBP', 0.87);
        $provider->setExchangeRate('GBP', 'USD', 1.34);

        return $provider;
    }
}
