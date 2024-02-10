<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
return view('dashboard');
})->name('home')->middleware('guard');

Route::get('/login', [UserController::class,'login'])->name('login');
Route::post('/login', [UserController::class,'loginPost'])->name('login.post');
Route::get('/signup', [UserController::class,'signup'])->name('signup');
Route::post('/signup', [UserController::class,'signupPost'])->name('signup.post');
Route::get('/logout', [UserController::class,'logout'])->name('logout');