<?php

namespace Tests\Unit\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Api\v1\Auth\AuthController;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test a user request to register using API
     */
    public function test_register_should_be_validated()
    {
        $response = $this->postJson(route('auth.register'));
        $response->assertStatus(422);
    }

    /**
     * Test a new user can register using API
     */
    public function test_a_new_user_can_register()
    {
        $response = $this->postJson(route('auth.register'), [
            'name'     => 'Dan Salahi',
            'email'    => 'dev.salahi@gmail.com',
            'password' => '12345678',
        ]);
        $response->assertStatus(201);
    }

    /**
     * Test a user request to login using API
     */
    public function test_login_should_be_validated()
    {
        $response = $this->postJson(route('auth.login'));
        $response->assertStatus(422);
    }

    /**
     * Test a new user can register using API
     */
    public function test_a_new_user_can_login_by_correct_credentials()
    {
        $user = factory(User::class, 1)->create();
        $response = $this->actingAs($user)->postJson(route('auth.login'), [
            'email'    => $user->email,
            'password' => 'password ',
        ]);
        $response->assertStatus(200);
    }
}
