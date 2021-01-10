<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class InsertRegister extends Controller
{
    public function insert()
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'level' => 0,
        ]);
        User::create([
            'username' => 'kepsek',
            'password' => Hash::make('12345'),
            'level' => 1,
        ]);
    }
}