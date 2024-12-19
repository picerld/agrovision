<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class AuthApiController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('username', 'password');

        try {

            $request->validate([
                'username' => 'required|string|exists:users,username',
                'password' => 'required|string',
            ]);

            if (auth()->attempt($credentials)) {
                $token = auth()->user()->createToken('agrovision_token')->plainTextToken;
                return ApiResponse::success('Login successful', [
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                    'user' => auth()->user()
                ]);
            }

            return ApiResponse::error('Invalid credentials');
        } catch (\Throwable $th) {
            return ApiResponse::error($th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();

        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken) {
            return ApiResponse::error('Failed to logout', 'Invalid token provided.');
        }

        $user = $accessToken->tokenable;

        if ($user) {
            $accessToken->delete();
            return ApiResponse::success('Logout successful');
        }

        return ApiResponse::error('Failed to logout', 'User not authenticated.');
    }
}
