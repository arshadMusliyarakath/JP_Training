<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController
{
    public function login()
    {
        $email = request('email');
        $password = request('password');


        $user = User::where('email', $email)->first();
        if (Hash::check($password, $user->password)) {

            $token = $user->createToken('mobile-app')->plainTextToken;
            return response()->json([
                'email' => $email,
                'password' => $password,
                'token' => $token,
                'message' => 'The credencials are fetched succeed'
            ]);
        } else {

            return response()->json([
                'email' => $email,
                'password' => $password,
                'token' => 'invalid',
                'message' => 'Password is invalid'
            ]);
        }
    }


    public function getProfile()
    {
        $userId = auth()->user()->user_id;
        $user = User::find($userId);
        return response()->json([
            'status' => 200,
            'data' => [
                'profile' => $user,
                'address' => $user->address,
                'orders' => $user->orders
            ],
            'message' => "user data fetching succeed!!"
        ]);
    }

    public function logout()
    {
        $userId = auth()->user()->user_id;
        $user = User::find($userId);
        $user->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => "user loggedOut succeed!!"
        ]);
    }
}
