<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $req)
    {
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $accessToken = Auth::user()->createToken('authToken')->accessToken;

            return response()->json([
                'success'=> true,
                "access_token" => $accessToken
            ]);
        }

        return response()->json([
            'error'=> true,
        ], 401);
    }

    public function logout()
    {
        $user = Auth::user()->token();
        $user->revoke();

        return response()->json([
            'success'=> true,
            "message" => 'Logged Out'
        ]);
    }
}
