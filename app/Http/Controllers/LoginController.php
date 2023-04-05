<?php

namespace App\Http\Controllers;

class LoginController
{
    public function login()
    {
        return view('login');
    }
    public function doLogin()
    {
        //validation
        request()->validate([
            'email' => 'required|Email',
            'password' => 'required'
        ]);

        $input = ['email' => request('email'), 'password' => request('password')];
        if (auth()->attempt($input, true)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('message', 'Login Failed');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
