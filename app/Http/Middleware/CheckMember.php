<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMember
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('member_id')) {
            return redirect('/')->with('error', 'Please login first.');
        }

        return $next($request);
    }
}
