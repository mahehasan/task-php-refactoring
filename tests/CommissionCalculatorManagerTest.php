<?php
namespace Refactors;
use PHPUnit\Framework\TestCase;

class CommissionCalculatorManagerTest extends TestCase
{
    public function testInputFileEmptyExceptionMessageTest()
    {
        $this->expectExceptionMessage("Input is empty!");
        $commissionCalculatorManager = new CommissionCalculatorManager();
        $commissionCalculatorManager->manageCommission("","dafult", "mockcf", "mockef");
    }
    public function testInputFileNotExistExceptionMessageTest()
    {
        $this->expectExceptionMessage("file_get_contents(mahedi): failed to open stream: No such file or directory");
        $commissionCalculatorManager = new CommissionCalculatorManager();
        $commissionCalculatorManager->manageCommission("mahedi","dafult", "mockcf", "mockef");
    }

    public function testInputFileFormatEmptyExceptionMessageTest()
    {
        $this->expectExceptionMessage("Invalid input format!");
        $commissionCalculatorManager = new CommissionCalculatorManager();
        $commissionCalculatorManager->manageCommission("input.txt","", "mockcf", "mockef");
    }

    public function testInputFileFormatNotExistExceptionMessageTest()
    {
        $this->expectExceptionMessage("Invalid input format!");
        $commissionCalculatorManager = new CommissionCalculatorManager();
        $commissionCalculatorManager->manageCommission("input.txt","eu", "mockcf", "mockef");
    }

    public function testBinlistEmptyExceptionMessageTest()
    {
        $this->expectExceptionMessage("Invalid credit card country code provider!");
        $commissionCalculatorManager = new CommissionCalculatorManager();
        $commissionCalculatorManager->manageCommission("input.txt","dafult", "", "mockef");
    }

    public function testBinlistNotExistExceptionMessageTest()
    {
        $this->expectExceptionMessage("Invalid credit card country code provider!");
        $commissionCalculatorManager = new CommissionCalculatorManager();
        $commissionCalculatorManager->manageCommission("input.txt","dafult", "xyz", "mockef");
    }

    public function testExchangeRateEmptyExceptionMessageTest()
    {
        $this->expectExceptionMessage("Invalid exchange rate provider!");
        $commissionCalculatorManager = new CommissionCalculatorManager();
        $commissionCalculatorManager->manageCommission("input.txt","dafult", "mockcf", "");
    }

    public function testExchangeRateNotExistExceptionMessageTest()
    {
        $this->expectExceptionMessage("Invalid exchange rate provider!");
        $commissionCalculatorManager = new CommissionCalculatorManager();
        $commissionCalculatorManager->manageCommission("input.txt","dafult", "mockcf", "abc");
    }

    public function testEmptydataInputExceptionMessageTest()
    {
        $this->expectExceptionMessage("No commssion is found in the list!");
        $commissionCalculatorManager = new CommissionCalculatorManager();
        $commissionCalculatorManager->manageCommission("emptyinput.txt","dafult", "mockcf", "mockef");
    }

}