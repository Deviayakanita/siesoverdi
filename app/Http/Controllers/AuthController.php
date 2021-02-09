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
                return redirect('/dashboard')->with('success', 'Selamat datang Administrator!');
            } elseif ($user->level == '1') {
                return redirect('/dashboard')->with('success', 'Selamat datang Kepala Sekolah!');
            } 
        }

        return redirect('/')->with('error', 'BUNCH!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}