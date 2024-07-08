<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Cookie;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() &&  Auth::user()->is_admin == 1) {
            return $next($request);
        }else{
            Auth::logout();
            return redirect()->route('home')->with('error', __('admin.access_denied'));
        }

    }
}
