<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthLoginRequest;
use App\Http\Requests\Api\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(AuthLoginRequest $request)
    {
        $user = User::where("email", $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password))
        {
            return response([
                "message" => "User not found"
            ], 401);
        }

        $token = $user->createToken("app_token")->plainTextToken;

        $response = [
            "user" => $user,
            "token" => $token
        ];

        return response($response, 201);
    }

    public function register(AuthRegisterRequest $request)
    {
        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        $token = $user->createToken("app_token")->plainTextToken;
        $response = [
            "user" => $user,
            "token" => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            "message" => "Logged out"
        ];
    }
}
