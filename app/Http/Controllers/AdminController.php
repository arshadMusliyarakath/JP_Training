<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController
{
    public function login()
    {
        return view('admin_login');
    }
    public function doLogin()
    {

      
        //validation
        request()->validate([
            'email' => 'required|Email',
            'password' => 'required'
        ]);

        $input = ['email' => request('email'), 'password' => request('password')];
        if (auth()->guard('admin')->attempt($input, true)) {
            return redirect()->route('admin.home');
        } else {
            return redirect()->route('admin.login')->with('message', 'Login Failed');
        }
    }
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }


    public function homePage(){
        $users = User::withCount('orders')->withTrashed()->latest()->paginate(6);
        return view('admin_home',compact('users'));
    }
}
