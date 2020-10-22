<?php

namespace Tests\Unit\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Api\v1\Auth\AuthController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{

    use RefreshDatabase;

    /**
     * Test a user request to register using API: api/v1/auth/register
     */
    public function test_register_should_be_validated()
    {
        $response = $this->postJson('api/v1/auth/register');
        $response->assertStatus(422);
    }

    /**
     * Test a new user can register using API: api/v1/auth/register
     */
    public function test_a_new_user_can_register()
    {
        $response = $this->postJson('api/v1/auth/register', [
            'name'     => 'Dan Salahi',
            'email'    => 'dev.salahi@gmail.com',
            'password' => '12345678',
        ]);
        $response->assertStatus(201);
    }
}
