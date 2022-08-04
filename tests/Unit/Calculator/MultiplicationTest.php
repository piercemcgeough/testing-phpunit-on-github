<?php


use App\Calculator\Exceptions\NoOperandExcpetion;
use App\Calculator\Multiplication;
use PHPUnit\Framework\TestCase;

class MultiplicationTest extends TestCase
{
    /** @test */
    public function constructor()
    {
        $multiplication = new Multiplication();

        $this->assertInstanceOf(Multiplication::class, $multiplication);
    }

    /** @test */
    public function divides_given_operands_2()
    {
        $multiplication = new Multiplication();
        $multiplication->setOperands([100, 2]);

        $this->assertEquals(200, $multiplication->calculate());
    }

    /** @test */
    public function divides_given_operands_3()
    {
        $multiplication = new Multiplication();
        $multiplication->setOperands([100, 2, 2]);

        $this->assertEquals(400, $multiplication->calculate());
    }

    /** @test */
    public function ignores_zero_operands()
    {
        $multiplication = new Multiplication();
        $multiplication->setOperands([10, 0, 0, 5, 0]);

        $this->assertEquals(50, $multiplication->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandExcpetion::class);

        $multiplication = new Multiplication();
        $multiplication->calculate();
    }
}