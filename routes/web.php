<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'))->name('home');

// Registration routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store')->middleware('guest');

// Login routes
Route::get('/login', [SessionController::class, 'create'])->name('login.create')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('login.store')->middleware('guest');

// Logout routes
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');
