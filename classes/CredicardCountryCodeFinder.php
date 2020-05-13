<?php
namespace Refactors;

Interface CredicardCountryCodeFinder
{
    public function getCountryCode($creditcardnumber);
}