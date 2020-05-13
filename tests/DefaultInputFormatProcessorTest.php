<?php

namespace Refactors;

use PHPUnit\Framework\TestCase;

class DefaultInputFormatProcessorTest extends TestCase
{
    public function testEuCreditCradNonEuroCurrencyCommissionCalculationTest()
    {
        $credicardCountrycodeFinder = new MockCountryCodeProvider();
        $exchangeRateFinder = new MockExchangeRatesProvider();
        $defaultInputFormatProcessor = new DefaultInputFormatProcessor();
        $commission = $defaultInputFormatProcessor->getComissionList('eucreditcradnoneurocurrencyinput.txt', $credicardCountrycodeFinder, $exchangeRateFinder);
        $this->assertEquals(1,$commission[0]);

    }

    public function testEuCreditCradEuroCurrencyCommissionCalculationTest()
    {
        $credicardCountrycodeFinder = new MockCountryCodeProvider();
        $exchangeRateFinder = new MockExchangeRatesProvider();
        $defaultInputFormatProcessor = new DefaultInputFormatProcessor();
        $commission = $defaultInputFormatProcessor->getComissionList('eucreditcradeurocurrencyinput.txt', $credicardCountrycodeFinder, $exchangeRateFinder);
        $this->assertEquals(1.5,$commission[0]);

    }

    public function testNonEuCreditCradNonEuroCurrencyCommissionCalculationTest()
    {
        $credicardCountrycodeFinder = new MockCountryCodeProvider();
        $exchangeRateFinder = new MockExchangeRatesProvider();
        $defaultInputFormatProcessor = new DefaultInputFormatProcessor();
        $commission = $defaultInputFormatProcessor->getComissionList('noneucreditcradnoneurocurrencyinput.txt', $credicardCountrycodeFinder, $exchangeRateFinder);
        $this->assertEquals(2,$commission[0]);

    }
}