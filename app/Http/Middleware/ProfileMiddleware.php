<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

use Illuminate\Http\Response;

class ProfileMiddleware
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
        if (!Auth::guest() && Auth::user()->profile) {
            return $next($request);
        }
        else if(Auth::user()->designation == "student")
            return new Response(view('profiles.StudentProfileForm'));
        else if(Auth::user()->designation == "teacher")
            return new Response(view('profiles.TeacherProfileForm'));
    }
}
