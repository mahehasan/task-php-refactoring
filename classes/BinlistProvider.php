<?php
namespace Refactors;

class BinlistProvider implements CredicardCountryCodeFinder
{
    public function getCountryCode($creditcardNumber)
    {
        try {
            $binResults = file_get_contents('https://lookup.binlist.net/' . $creditcardNumber);
            if (!$binResults) return null;
            $creditcardInfo = json_decode($binResults);
            if ($creditcardInfo == null)
                throw new \Exception("Unable to process credit card information!");
            if ($creditcardInfo->country == null)
                throw new \Exception("Unable to retrive credit card country information!");
            if ($creditcardInfo->country->alpha2 == null)
                throw new \Exception("Unable to retrive credit card country code information!");
            return $creditcardInfo->country->alpha2;
        }catch (\Exception $e){
            throw new \Exception("Unable to process credit card information!");
        }

    }
}