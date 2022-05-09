<?php

namespace App\Http\Controllers;

use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserAuthRequest;

class AuthController extends Controller {

    public function register(UserAuthRequest $request){
        $credentials = $request->only(['email', 'password']);

        try {
            $user = User::create($credentials);
            $token = JWTAuth::attempt($credentials);
        }
        catch (\Exception $e){
            return response()->json($e->getMessage(), 400);
        }
        return response()->json(['token' => $token, 'user' => new UserResource($user)], 201);
    }

    public function login(UserAuthRequest $request){
        $token = '';
        try {
            $credentials = $request->only(['email', 'password']);
            $token = JWTAuth::attempt($credentials);
            if (!$token) {
                return response()->json(['message' => 'Invalid credentials', 401]);
            }
        }
        catch (\Exception $e){
            return response()->json($e->getMessage());
        }

        return response()->json(['token' => $token, 'user' => new UserResource(JWTAuth::user())], 200);
    }
}