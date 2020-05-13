<?php
namespace Refactors;

class CommonFactory
{
    public static $binlistCredicardCountryCodeFinder;
    public static $mockCredicardCountryCodeFinder;
    public static $exchangeRatesapiExchangeRateFinder;
    public static $mockExchangeRateFinder;
    public static $dynamicInputFormatProcessor;

    public static function init()
    {
        self::$binlistCredicardCountryCodeFinder    = new BinlistProvider();
        self::$mockCredicardCountryCodeFinder       = new MockCountryCodeProvider();
        self::$exchangeRatesapiExchangeRateFinder   = new ExchangeratesapiProvider();
        self::$mockExchangeRateFinder               = new MockExchangeRatesProvider();
        self::$dynamicInputFormatProcessor          = new DefaultInputFormatProcessor();
    }

    public static function getCreditCardCountryCodeFinder($providerName)
    {
        if($providerName == "binlist") return self::$binlistCredicardCountryCodeFinder;
        elseif($providerName == "mockcf") return self::$mockCredicardCountryCodeFinder;
        return null;
    }

    public static function getExchangeRateFinder($providerName)
    {
        if($providerName == "exchangeratesapi") return self::$exchangeRatesapiExchangeRateFinder;
        elseif($providerName == "mockef") return self::$mockExchangeRateFinder;
        return null;
    }

    public static function getDynamicInputFormatProcessor($formatName)
    {
        if($formatName == "dafult") return self::$dynamicInputFormatProcessor;
        return null;
    }
}
CommonFactory::init();