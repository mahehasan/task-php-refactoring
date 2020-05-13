<?php
namespace Refactors;

class DefaultInputFormatProcessor implements DynamicInputFormatProcessor
{
    public function getComissionList($inputPath, $credicardCountryCodeFinder, $exchangeRateFinder){
        $commissionArr = array();
        try {
            foreach (explode("\n", file_get_contents($inputPath)) as $row) {
                if (empty($row)) continue;
                $segmentArr = explode(",", $row);
                if (empty($segmentArr) || count($segmentArr) != 3) {
                    throw new \Exception("Input data does not match with input format!");
                }
                $pairObject = explode(':', $segmentArr[0]);
                if (empty($pairObject) || count($pairObject) != 2) {
                    throw new \Exception("Input data does not match with input format!");
                }
                $creditcardNumber = $pairObject[1];
                $creditcardNumber = trim($creditcardNumber, '"');

                $pairObject = explode(':', $segmentArr[1]);
                if (empty($pairObject) || count($pairObject) != 2) {
                    throw new \Exception("Input data does not match with input format!");
                }
                $amount = $pairObject[1];
                $amount = trim($amount, '"');

                $pairObject = explode(':', $segmentArr[2]);
                if (empty($pairObject) || count($pairObject) != 2) {
                    throw new \Exception("Input data does not match with input format!");
                }
                $currency = $pairObject[1];
                $currency = trim($currency, '"}');

                $isEu = $this->isEu($credicardCountryCodeFinder->getCountryCode($creditcardNumber));

                $rate = $exchangeRateFinder->getExchangeRate($currency);

                $amntFixed = $this->converCurrencyToEuro($amount, $rate, $currency);

                $commissionArr[] = $this->roundUp(($amntFixed * ($isEu == true ? 0.01 : 0.02)));
            }
            return $commissionArr;
        }
        catch (\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }
    }

    private function converCurrencyToEuro($amount, $rate, $currency) {
        if ($currency == 'EUR' or $rate == 0) {
            return $amount;
        }
        return ($amount / $rate);
    }

    private function  isEu($countryCode) {
        $result = false;
        switch($countryCode) {
            case 'AT':
            case 'BE':
            case 'BG':
            case 'CY':
            case 'CZ':
            case 'DE':
            case 'DK':
            case 'EE':
            case 'ES':
            case 'FI':
            case 'FR':
            case 'GR':
            case 'HR':
            case 'HU':
            case 'IE':
            case 'IT':
            case 'LT':
            case 'LU':
            case 'LV':
            case 'MT':
            case 'NL':
            case 'PO':
            case 'PT':
            case 'RO':
            case 'SE':
            case 'SI':
            case 'SK':
                $result = true;
        }
        return $result;
    }

    private function roundUp($value,$precision=2) {
        $pow = pow ( 10, $precision );
        return (ceil( $pow * $value) + ceil( $pow * $value - ceil( $pow * $value))) / $pow;
    }
}