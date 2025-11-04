<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class authApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $token = auth('api')->attempt($credentials);

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response([
            'success' => true,
            'token' => $token,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function refresh()
    {
        // token refresh rotation
        $newToken = auth('api')->refresh();

        return response()->json([
            'success' => true,
            'refresh token' => $newToken,
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }
    public function me()
    {
        $user = auth('api')->user();
        return response()->json($user);
    }
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
