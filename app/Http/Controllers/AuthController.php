<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller {

    public function register(Request $request){
        $credentials = $request->only(['email', 'password']);

        try {
            $user = User::create($credentials);
            $token = JWTAuth::attempt($credentials);
        }
        catch (\Exception $e){
            return response()->json($e->getMessage(), 400);
        }
        return response()->json(['token' => $token, 'user' => new UserResource($user)]);
    }

    public function login(Request $request){
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
        
        return response()->json(['token' => $token], 200);
    }
}