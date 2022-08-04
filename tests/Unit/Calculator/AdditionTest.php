<?php


use App\Calculator\Addition;
use App\Calculator\Exceptions\NoOperandExcpetion;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    /** @test */
    public function constructor()
    {
        $addition = new Addition();

        $this->assertInstanceOf(Addition::class, $addition);
    }

    /** @test */
    public function add_up_given_operands()
    {
        $addition = new Addition();
        $addition->setOperands([5, 10]);

        $this->assertEquals(15, $addition->calculate());
    }

    /** @test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->expectException(NoOperandExcpetion::class);

        $addition = new Addition();
        $addition->calculate();
    }
}