<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        if(Auth::guard('user')->check()){
            // if user_role is above admin
            if(auth('user')->user()->role_id == 1){
                return redirect(route('get.superAdmin.home'));
            }else if(auth('user')->user()->role_id == 2){
                return redirect(route('get.admin.home'));
            }
            return redirect(route('get.merchant.home'));
        }
        // foreach ($guards as $guard) {
        //     if (Auth::guard($guard)->check()) {
        //         if($guard === 'user'){
        //             // return redirect(RouteServiceProvider::SUPER_ADMIN_HOME);
        //             echo 'true';
        //         }
        //         // return redirect(RouteServiceProvider::HOME);
        //     }
        // }

        return $next($request);
    }
}
