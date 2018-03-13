<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class CheckLogin
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
        if (!Auth::check()) {
            Session::flash('alert-danger', ' Anda tidak bisa checkout, seharusnya anda masuk atau mendaftar terlebih dahulu');
            return redirect('/cart/list');
        }
        return $next($request);
    }
}
