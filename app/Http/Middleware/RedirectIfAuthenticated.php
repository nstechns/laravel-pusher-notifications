<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
        if ($request->ajax() || $request->wantsJson()) {
            return response('Unauthorized.', 401);
        }

       /* if (Auth::guard($guard)->check()) {
            return redirect('/home');
        }*/
          switch ($guard) {

            case 'admin':
            if(Auth::guard($guard)->check()){
                return redirect()->route('admin.dashboard');
            }
            break;
            
            default:
            if (Auth::guard($guard)->check()) {
                return redirect()->route('home');
            }
            break;
        }

        return $next($request);
    }
}
