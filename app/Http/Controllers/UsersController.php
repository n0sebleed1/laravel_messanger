<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;

class UsersController extends Controller
{
    public function show(){
        $myData = Auth::user();
        $user = new User;
        return view('users', ['usersList' => $user -> orderBy('id', 'desc') -> get()], compact('myData'));
    }
}
