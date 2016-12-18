<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Response;

use App\User;

use Auth;

class AdminMiddleware
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
        $user = User::where('email', Auth::user()->email)->first();
        $person = $user->admin;
        if(isset($person->admintype_id))
        {
                return $next($request);
        }
        else
            return new Response(view('welcome'));
    }
}
