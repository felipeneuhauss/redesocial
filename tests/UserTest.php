<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
//        $this->assertTrue(true);
        $this->visit('/')
            ->see('As Melhores Empresas')
            ->dontSee('Error');
    }

    public function testRegister() {
        $user = factory(App\Models\User::class)->create();
    }
}
