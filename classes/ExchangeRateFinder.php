<?php
namespace Refactors;

Interface ExchangeRateFinder
{
    public function getExchangeRate($currencyCode);
}