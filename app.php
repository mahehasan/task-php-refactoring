<?php
namespace Refactors;
// register the autoloader
include_once "vendor/autoload.php";

$inputPath                          = $argv[1];
$inputFormat                        = $argv[2];
$crediCardCountryCodeProviderName    = $argv[3];
$exchangeRateProviderName           = $argv[4];

echo "Waiting...\n";
echo "Working...\n";
try{
    $commissionCalculatorManager = new CommissionCalculatorManager();
    $commissionCalculatorManager->manageCommission($inputPath,$inputFormat, $crediCardCountryCodeProviderName, $exchangeRateProviderName);
}catch (\Exception $e){
    echo ('Caught exception: '.$e->getMessage()."\n");
}

