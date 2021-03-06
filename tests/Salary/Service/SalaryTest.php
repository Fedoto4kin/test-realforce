<?php

namespace App\Tests\Salary;

use App\Service\Salary\Salary;
use App\Service\Salary\Action;
use PHPUnit\Framework\TestCase;

class SalaryTest extends TestCase
{
    private Salary $Salary;

    public function setUp()
    {
        $this->Salary = new Salary(1000);
    }

    public function testPlainTaxSalary()
    {
        $salary = $this->Salary->calc();
        $this->assertEquals(800, $salary);
    }

    public function testPlainTaxReduceSalary()
    {
        $salary = $this->Salary->calc();
        $this->Salary->updateTax(Action\DecreaseValue::class, 5);
        $this->assertEquals(800, $salary);
    }

    public function testBonusSalaryBase()
    {
        $this->Salary->updateSalary(Action\IncreaseValue::class, 1000);
        $salary = $this->Salary->calc();
        $this->assertEquals(1600, $salary);
    }

    public function testSalaryBasePercent()
    {
        $this->Salary->updateSalary(Action\IncreaseValue::class, 1000);
        $salary = $this->Salary->calc();
        $this->assertEquals(1600, $salary);
    }
}
