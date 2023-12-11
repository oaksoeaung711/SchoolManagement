<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->status === "inactive"){
            Auth::logout();
            return redirect()->route('login.index');
        }
        return $next($request);
    }
}
