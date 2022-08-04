<?php


use App\Calculator\Exceptions\NoOperandExcpetion;
use App\Calculator\Subtraction;
use PHPUnit\Framework\TestCase;

class SubtractionTest extends TestCase
{
    /** @test */
    public function constructor()
    {
        $subtraction = new Subtraction();

        $this->assertInstanceOf(Subtraction::class, $subtraction);
    }

    /** @test */
    public function subtracts_given_operands_2()
    {
        $subtraction = new Subtraction();
        $subtraction->setOperands([20, 5]);

        $this->assertEquals(15, $subtraction->calculate());
    }

    /** @test */
    public function subtracts_given_operands_3()
    {
        $subtraction = new Subtraction();
        $subtraction->setOperands([20, 5, 3]);

        $this->assertEquals(12, $subtraction->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandExcpetion::class);

        $subtraction = new Subtraction();
        $subtraction->calculate();
    }
}