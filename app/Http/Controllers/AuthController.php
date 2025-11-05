<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

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

    // ✅ Store user data in session
    session(['user' => $user]);

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

    $user = User::where('email', $r->email)->first();

    if (!$user || !Hash::check($r->password, $user->password)) {
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    // ✅ Store logged in user session
    session(['user' => $user]);

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
}



    // ✅ Handle logout
public function logout()
{
    session()->forget('user');
    return redirect()->route('login.show');
}



}
