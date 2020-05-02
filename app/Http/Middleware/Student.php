<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Student
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->user_role_iduser_role == 4 || Auth::user()->user_role_iduser_role == 3 || Auth::user()->user_role_iduser_role == 2 ||Auth::user()->user_role_iduser_role == 1  ){

            return $next($request);

        }
        else{
            return redirect('home');
        }
    }
}
