<?php

namespace Tests\Browser;

use App\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A basic browser test example.
     *
     * @return void
     */

    public function testUserLoginFail()
    {
        $this->browse(function ($browser) {
            $browser->visit('/login')
                    ->type('email', 'email@gmail.com')
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/login')
                    ->assertSee('Login')
                    ->assertRouteIs('login');
        });
    }

    public function testUserLoginSuccessfully()
    {
        $user = factory(User::class)->create([
            'email' => 'dung1@gmail.com',
        ]);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/')
                    ->assertSee('NEW UPDATED BOOKS')
                    ->assertRouteIs('homepage');
        });
    }

}
