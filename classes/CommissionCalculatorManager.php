<?php
namespace Refactors;
class CommissionCalculatorManager
{
    public function manageCommission($inputPath, $inputFormat, $creditCardCountryCodeProviderName, $exchangeRateProviderName)
    {
        try{
            if (empty($inputPath)){
                throw new \Exception("Input is empty!");
            }
            $credicardCountrycodeFinder = CommonFactory::getCreditCardCountryCodeFinder($creditCardCountryCodeProviderName);
            if ($credicardCountrycodeFinder == null){
                throw new \Exception("Invalid credit card country code provider!");
            }
            $exchangeRateFinder = CommonFactory::getExchangeRateFinder($exchangeRateProviderName);
            if ($exchangeRateFinder == null){
                throw new \Exception("Invalid exchange rate provider!");
            }
            $dp = CommonFactory::getDynamicInputFormatProcessor($inputFormat);
            if ($dp == null){
                throw new \Exception("Invalid input format!");
            }
            $commsionList = $dp->getComissionList($inputPath, $credicardCountrycodeFinder, $exchangeRateFinder);
            if (empty($commsionList)){
                throw new \Exception("No commssion is found in the list!");
            }
            foreach ($commsionList as $commision) {
                echo $commision;
                echo "\n";
            }
        }catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }
}