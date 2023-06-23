<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class studentAlreadyLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session()->has('studentid') and (url('/student/login') == $request->url())) {
           return back()->with('faild','Please Logout Then Login');
        }elseif (Session()->has('studentid') and (url('/student/resgister') == $request->url())) {
            return back()->with('faild','Please Logout Then Login');
        }
        return $next($request);
    }
}
