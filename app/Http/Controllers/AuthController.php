<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request
        $credentials = $request->only('username', 'password');

        // Attempt to authenticate the admin
        if (!$token = Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid username or password',
                'data' => null
            ], 401);
        }

        // Get the authenticated admin
        $admin = Auth::guard('api')->user();

        // Format the response
        return response()->json([
            'status' => 'success',
            'message' => 'Login successful',
            'data' => [
                'token' => $token,
                'admin' => [
                    'id' => $admin->id, // UUID
                    'name' => $admin->name,
                    'username' => $admin->username,
                    'phone' => $admin->phone,
                    'email' => $admin->email
                ]
            ]
        ], 200);
    }
}