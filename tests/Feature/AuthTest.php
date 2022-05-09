<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends TestCase
{
    use DatabaseMigrations;

    public function test_can_register_a_user()
    {
        $credentials = ['email' => 'some@email.com', 'password' => 'password'];

        $this->post('/register', $credentials)->assertCreated();
    }

    public function test_can_login_a_user()
    {
        $user = User::factory()->create();

        $this->post('/login', ['email' => $user->email, 'password' => 'password'])
            ->assertOk();
    }
}
