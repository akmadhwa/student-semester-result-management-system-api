<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CheckIfAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->roles == config('constants.roles.admin')) {
            return $next($request);
        }

        return response()->json([
            "error" => true,
            "message" => 'You are not allowed to use this function'
        ], 403);
    }
}
