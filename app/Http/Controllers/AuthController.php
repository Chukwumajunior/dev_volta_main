<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Login Form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function registrationForm(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'tel' => 'required|string',
            'password' => 'required',
        ]);

        $knownEmail = 'ohams.innocent@yahoo.com';
        $knownPassword = '@Falcon242261@Falcon';

        if ($request->email === $knownEmail && $request->input('password') === $knownPassword) {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->tel,
                'role' => 'admin',
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);

            return redirect()->route('profile.edit')->with('success', 'Welcome back, Admin.');
        }
        
        return back()->with('error', 'Unauthorized credentials.');
    }


    // Handle Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/profile')->with('success', 'Logged in successfully');
        }

        return back()->withErrors(['username' => 'Invalid credentials'])->withInput();
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully');
    }
}
