<?php

namespace Tests\Feature;

use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use WithFaker;
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

        $this->post('/api/register',[
            'email' => $this->faker->unique()->safeEmail(),
            'name'  => $this->faker->userName(),
            'password' => 'password'
        ])->assertStatus(200);

    }
}
