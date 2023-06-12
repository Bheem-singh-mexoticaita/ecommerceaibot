<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next ,...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        // dd($guards);
        // dd(Auth::guard('admin')->check());
        // dd(!Auth::guard('admin')->check());
        if(!Auth::guard('admin')->check()){
            return redirect()->route('admin.login');
        }
        // dd('admin');
        return $next($request);
    }
}