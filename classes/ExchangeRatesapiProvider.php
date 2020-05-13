<?php
namespace Refactors;

class ExchangeRatesapiProvider implements ExchangeRateFinder
{
    public function getExchangeRate($currencyCode)
    {
        try{
            $exchangeRateInformation = @json_decode(file_get_contents('https://api.exchangeratesapi.io/latest'),true);
            if (empty($exchangeRateInformation))
                throw new \Exception("Unable to find exchange rate information!");
            if (empty($exchangeRateInformation['rates']))
                throw new \Exception("Unable to find exchange rate information!");
            if (!array_key_exists($currencyCode,$exchangeRateInformation['rates']))
                return 0;

            return $exchangeRateInformation['rates'][$currencyCode];
        }
        catch (\Exception $e){
            throw new \Exception("Unable to find exchange rate!");
        }
    }
}