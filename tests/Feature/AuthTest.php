<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->post('api/login',[
            'email' => 'test@test.com',
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }

    public function test_register(){

        $registerResponse = $this->post('/api/register',[
            'email' => 'test3@test.com',
            'name'  => 'deneme test user',
            'password' => 'password'
        ])->assertStatus(200);

    }
}
