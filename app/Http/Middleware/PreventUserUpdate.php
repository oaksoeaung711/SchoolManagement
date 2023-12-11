<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PreventUserUpdate
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::user()->id !== $request->route('user')->id) // to preven self update
        {
            if(Auth::user()->roles->contains(1)) // If you are global administrator
            {
                if(!$request->route('user')->roles->contains(1)) // Target user can't be global administrator
                {
                    return $next($request);
                }
            }elseif(Auth::user()->roles->contains(2)) // If you are administrator
            {
                if(!$request->route('user')->roles->contains(1) && !$request->route('user')->roles->contains(2)) // Target user neighter can be global administrator nor administrator
                {
                    return $next($request);
                }
            }
        }
        return redirect()->route('home');
    
    }
}
