<?php


use App\Calculator\Division;
use App\Calculator\Exceptions\NoOperandExcpetion;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    /** @test */
    public function constructor()
    {
        $division = new Division();

        $this->assertInstanceOf(Division::class, $division);
    }

    /** @test */
    public function divides_given_operands_2()
    {
        $division = new Division();
        $division->setOperands([100, 2]);

        $this->assertEquals(50, $division->calculate());
    }

    /** @test */
    public function divides_given_operands_3()
    {
        $division = new Division();
        $division->setOperands([100, 2, 2]);

        $this->assertEquals(25, $division->calculate());
    }

    /** @test */
    public function ignores_zero_operands()
    {
        $division = new Division();
        $division->setOperands([10, 0, 0, 5, 0]);

        $this->assertEquals(2, $division->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandExcpetion::class);

        $division = new Division();
        $division->calculate();
    }
}