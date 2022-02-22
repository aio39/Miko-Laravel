<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// 로그인된 사용자라면 logged 쿠키를 추가해줌.
class CreateSessionTimeoutCookie
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
        $res =  $next($request);
        if(Auth::check()){
            $res->cookie('isLogin',true, config('SESSION_LIFETIME'), null,null,false,false);
        }
        return $res;
    }
}
