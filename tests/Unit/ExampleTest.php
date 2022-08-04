<?php


use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function trueIsTrue()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function falseIsFalse()
    {
        $this->assertFalse(false);
    }
}
