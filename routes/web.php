<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/ideas');

// Registration routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register.create')->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store')->middleware('guest');

// Login routes
Route::get('/login', [SessionController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->name('login.store')->middleware('guest');

// Logout routes
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

// Ideas routes
Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas.index')->middleware('auth');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show')->middleware('auth');
Route::post('ideas', [IdeaController::class, 'store'])->name('ideas.store')->middleware('auth');
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy')->middleware('auth');
