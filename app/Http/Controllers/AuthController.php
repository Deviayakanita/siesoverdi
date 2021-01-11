<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            $user = \App\Models\User::where('username', $request->username)->first();
            if ($user->level == '0') {
                return response()->view('layout/dashboard_admin');
            } elseif ($user->level == '1') {
                return response()->view('layout/dashboard_kepsek');
            } 
            else
            {
                return response()->view('auth.login');
            }
        }

        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}