<?php

use App\Models\User;

class UserTest extends \PHPUnit\Framework\TestCase
{
    protected $user;

    public function setUp(): void
    {
        $this->user = new User(
            'Pierce',
            'McGeough',
            'pierce@test.com'
        );
    }

    /** @test */
    public function we_can_get_the_first_name()
    {
        $this->assertEquals('Pierce', $this->user->firstName);
    }

    /** @test */
    public function we_can_get_the_last_name()
    {
        $this->assertEquals('McGeough', $this->user->lastName);
    }

    /** @test */
    public function we_can_get_the_full_name()
    {
        $this->assertEquals('Pierce McGeough', $this->user->getFullName());
    }

    /** @test */
    public function we_can_get_the_email()
    {
        $this->assertEquals('pierce@test.com', $this->user->email);
    }

    /** @test */
    public function email_variables_contain_correct_values()
    {
        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals('Pierce McGeough', $emailVariables['full_name']);
        $this->assertEquals('pierce@test.com', $emailVariables['email']);
    }
}