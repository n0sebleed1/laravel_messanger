<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DialogController;

// method GET

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/login', function () {
    return view('login');
})->middleware('guest');

Route::get('/register', function () {
    return view('register');
})->middleware('guest');

Route::get('/main', [DialogController::class, 'show'])->middleware('auth');
Route::get('/users', [UsersController::class, 'show'])->middleware('auth');
Route::get('/dialog/{id}', [DialogController::class, 'dialog'])->middleware('auth');

// method POST

Route::post('/login', [LoginController::class, 'loginAccount'])->name('login');
Route::post('/register', [RegisterController::class, 'createAccount'])->name('register');
Route::post('/main', [LoginController::class, 'logout'])->name('logout');
Route::post('/dialog/{id}', [DialogController::class, 'send'])->name('send');