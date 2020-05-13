<?php
namespace Refactors;

class MockCountryCodeProvider implements CredicardCountryCodeFinder
{
    public function getCountryCode($creditcardNumber)
    {
        $countryCode = array(
            'AT',
            'BE',
            'BG',
            'CY',
            'CZ',
            'DE',
            'DK',
            'EE',
            'ES',
            'FI',
            'FR',
            'GR',
            'HR',
            'HU',
            'IE',
            'IT',
            'LT',
            'LU',
            'LV',
            'MT',
            'NL',
            'PO',
            'PT',
            'RO',
            'SE',
            'SI',
            'SK',
            'NA'
        );

        try {
            if (empty($creditcardNumber)){
                throw new \Exception("Credit card is empty!");
            }
            $index = ($creditcardNumber%28);
            return $countryCode[$index];
        }catch (\Exception $e){
            throw new \Exception("Unable to process credit card information!");
        }

    }
}