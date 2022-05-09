<?php

namespace Tests\Traits;

use App\Models\Role;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;

trait AuthenticateUsers {

    public $token;
    public $user;

    public function authenticateAdmin()
    {
        $user = User::factory()->create();
        $user->roles()->sync([Role::ADMIN]);

        $this->token = $this->jwtToken($user);
    }

    public function authenticateMember()
    {
        $user = User::factory()->create();
        $user->roles()->sync([Role::MEMBER]);

        $this->token = $this->jwtToken($user);
    }

    public function jwtToken(User $user)
    {
        // Default UserFactory password is "password"
        return 'Bearer ' . JWTAuth::attempt(['email' => $user->email, 'password' => 'password']);
    }
}