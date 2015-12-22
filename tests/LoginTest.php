<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
//        $this->assertTrue(true);
        $this->visit('/auth/login')->see('Login')->dontSee('Error')
        ->type('felipe.neuhauss@gmail.com', 'email')
        ->type('123456', 'password')
        ->press('Entrar')
        ->seePageIs('/home');
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogout()
    {
//        $this->assertTrue(true);
        $this->visit('/auth/logout')->see('Login');
    }
}
