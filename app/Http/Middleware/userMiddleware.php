<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if (Auth::check() && $user->role =="user") {
            # code...
            if($user->statu == 'banned'){
                return to_route('login')->with('banned','your account is banned by admin');
              }
            return $next($request);
        }
        else{
            return back();
        }
    }
}
