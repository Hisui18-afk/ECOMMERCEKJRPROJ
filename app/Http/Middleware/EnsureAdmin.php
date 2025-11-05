<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if admin is logged in
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login.show')
                ->with('error', 'Please log in as admin first.');
        }

        return $next($request);
    }
}
