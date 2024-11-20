<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginAccount(Request $request){

        $credentials = $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if (! Auth::attempt($credentials)) {
            return back()
            ->withInput()
            ->withErrors([
                'name', 'password' => 'Неверный логин или пароль!'
            ]);
        }

        return redirect('main');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
