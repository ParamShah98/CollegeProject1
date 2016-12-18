<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MainAdminMiddleware
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
        $user = \App\User::where('email', Auth::user()->email)->first();
        $person = $user->admin;
        if(isset($person->admintype_id)  && $person->admintype_id==1)
        {
                return $next($request);
        }
        else
            return redirect('admin');
    }
}
