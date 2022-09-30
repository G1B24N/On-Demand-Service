<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()){
            return redirect('login');
        }

        $user = Auth::user();

        if($user->role == 'admin') {
            return $next($request);
        }
        foreach ($roles as $role) {
            if($user->role == $role)
            return $next($request);
        }

        // if(in_array($request->user()->role, $role)){
        //     return $next($request);
        // }

        return redirect('login');
    }
}
