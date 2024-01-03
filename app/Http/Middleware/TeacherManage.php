<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TeacherManage
{

    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->roles->contains(1) || Auth::user()->roles->contains(2) || Auth::user()->roles->contains(4)){
            return $next($request);
        }else{
            return back();
        }
    }
}
