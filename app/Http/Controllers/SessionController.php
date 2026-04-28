<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:255', 'string'],
        ]);

        if (! Auth::attempt($validated)) {
            return back()
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ])
                ->withInput();
        }

        session()->regenerate();

        return redirect()->intended('/')->with('success', 'You are logged in!');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('home')->with('success', 'Logout successful!');
    }
}
