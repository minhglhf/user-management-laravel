<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLogoutMiddleware
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
//        if (!$request->session()->has('login')) {
//            return redirect('/')->withErrors(['not_login' => "Yêu cầu login để tiếp tục"]);
//        }
        if(Auth::check()){
            return redirect('user/index');
        }
        return $next($request);
    }
}
