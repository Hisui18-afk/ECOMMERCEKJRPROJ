<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminAuthController extends Controller
{
    /**
     * Show the admin login page.
     */
    public function showLogin()
    {
        return view('admin.login');
    }

    /**
     * Handle admin login attempt.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // Ensure valid user and correct role
        if (!$user || !Hash::check($request->password, $user->password) || $user->role !== 'admin') {
            return back()->withErrors(['email' => 'Invalid admin credentials'])->withInput();
        }

        // Save admin session
        Session::put('admin_id', $user->id);

        return redirect()->route('admin.dashboard');
    }

    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        if (!Session::has('admin_id')) {
            return redirect()->route('admin.login.show');
        }

        $admin = User::find(Session::get('admin_id'));

        return view('admin.dashboard', compact('admin'));
    }

    /**
     * Logout admin.
     */
    public function logout()
    {
        Session::forget('admin_id');
        return redirect()->route('admin.login.show');
    }
}
