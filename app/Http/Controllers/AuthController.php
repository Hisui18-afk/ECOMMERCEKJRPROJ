<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ✅ Show registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // ✅ Handle new user registration
public function register(Request $r)
{
    $r->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
    ]);

    $user = User::create([
        'name' => $r->name,
        'email' => $r->email,
        'password' => Hash::make($r->password),
        'role' => 'customer'
    ]);

    Auth::login($user);

    return redirect()->route('home');
}


    // ✅ Show login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // ✅ Handle login
public function login(Request $r)
{
    $r->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (Auth::attempt($r->only('email', 'password'))) {
        $user = Auth::user();

        return $user->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('home');
    }

    return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
}



    // ✅ Handle logout
public function logout()
{
    Auth::logout();
    return redirect()->route('login.show');
}

}
