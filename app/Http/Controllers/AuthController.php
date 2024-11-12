<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login page
    public function loginPage()
    {
        return view('login.index');
    }

    // Handle login request
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/')->with('success', 'You are logged in!');
        }
        
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ])->withInput($request->only('email'));
    }

    // Show registration page
    public function registerPage()
    {
        return view('register.index');
    }

    // Handle registration request
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email', // Ensure unique email in 'users' table
            'password' => 'required|min:5',
        ]);

        // Hash the password
        $data['password'] = Hash::make($data['password']);
        
        // Create a new user
        User::create($data);

        return view('login.index')->with('success', 'Registration successful! Please log in.');
    }

    // Handle logout request
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/loginPage')->with('success', 'You have been logged out.');
    }
}
