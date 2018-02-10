<?php
/**
 * Created by IntelliJ IDEA.
 * User: smartankur4u
 * Date: 8/11/17
 * Time: 4:52 PM
 */


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            return redirect('/home');
        }

        return $next($request);
    }
}


