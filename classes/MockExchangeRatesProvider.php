<?php
namespace Refactors;

class MockExchangeRatesProvider implements ExchangeRateFinder
{
    public function getExchangeRate($currencyCode)
    {
        try{
            if (empty($currencyCode)){
                throw new \Exception("Currency Code is empty!");
            }
            // all non euro currency exchange rate will be 1.5 for mock exchange rate provider
            return 1.5;
        }
        catch (\Exception $e){
            throw new \Exception("Unable to find exchange rate!");
        }

    }
}