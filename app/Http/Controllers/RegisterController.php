<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function createAccount(Request $request){
        $request->validate([
            'name' => 'required|string|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        return redirect('main');
    }
}
