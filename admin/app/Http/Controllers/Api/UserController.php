<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // register
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
            'address' => 'required',
            'phone' => 'required'
        ]);

        if (User::where('email', $request->email)->first()) {
            return response([
                'message' => 'This email already exists',
                'status' => 'failed'
            ], 422);
        }

        if (User::where('phone', $request->phone)->first()) {
            return response([
                'message' => 'This phone number already exists',
                'status' => 'failed'
            ], 422);
        }

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);

        $token = $user->createToken('register_' . $request->email)->plainTextToken;

        return response([
            'message' => 'Successfully registered',
            'status' => 'success',
            'token' => $token
        ], 201);
    }
    // login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {

            $token = $user->createToken('login_' . $request->email)->plainTextToken;

            return response([
                'message' => 'Successfully login',
                'status' => 'success',
                'token' => $token
            ], 200);
        }

        return response([
            'message' => 'Invalid credential',
            'status' => 'failed'
        ], 401);
    }
    // logout
    // public function logout()
    // {
    //     auth()->user()->tokens()->delete();

    //     return response([
    //         'message' => 'Successfully logged out',
    //         'status' => 'success'
    //     ], 200);
    // }

    // logout
    public function logout(Request $request)
    {
        $user = $request->user();

        if ($user) {
            $user->tokens()->delete();

            return response([
                'message' => 'Successfully logged out',
                'status' => 'success'
            ], 200);
        }

        return response([
            'message' => 'Unauthorized',
            'status' => 'failed'
        ], 401);
    }

    // logged user data
    public function logged_user_data()
    {
        $logged_user = auth()->user();

        return response([
            'user' => $logged_user,
            'status' => 'success'
        ], 200);
    }
}
