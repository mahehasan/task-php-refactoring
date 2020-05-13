<?php
namespace Refactors;

Interface DynamicInputFormatProcessor
{
    public function getComissionList($inputPath, $credicardCountrycodeFinder, $exchangeRateFinder);
}