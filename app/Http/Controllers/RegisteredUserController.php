<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:255', 'string'],
            'email' => ['required', 'email', Rule::unique('users', 'email'), 'max:255'],
            'password' => ['required', 'min:8', 'max:255', 'string', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'], // no need to use bcrypt() because user model has a mutator that automatically hashes the password
        ]);

        Auth::login($user);

        return redirect()->route('/')->with('success', 'Registration successful!');
    }
}
