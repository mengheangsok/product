<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Account
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
       
        if (Auth::check() && (Auth::user()->status == 2)) {
            Auth::logout();
            return redirect('/login')->withMessage('Your account is net approved');
        }

        \App::setLocale(session('lang'));

        return $next($request);
    }
}
