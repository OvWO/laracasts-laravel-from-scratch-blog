<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Support\Facades\Route;


class CheckIsUserActivated
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
        if(Auth::check() && Auth::user()->token != null){ // if user is logged in AND if user is unverified
            dump('Verify your email');

            // return redirect()->route('activation-required')
            //     ->with([
            //         'message' => 'Activation is required. ',
            //         'status'  => 'danger',
            // ]);
        }


        return $next($request);
    }
}


