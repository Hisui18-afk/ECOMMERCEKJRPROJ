<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        session(['user_id' => $user->id]);

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

    $user = \App\Models\User::where('email', $r->email)->first();

    if (!$user || !\Illuminate\Support\Facades\Hash::check($r->password, $user->password)) {
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // Store user ID in session
    session(['user_id' => $user->id]);

    // ✅ Redirect based on role
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('home');
    }
}


    // ✅ Handle logout
    public function logout()
    {
        session()->forget('user_id');
        return redirect()->route('login.show');
    }
}
