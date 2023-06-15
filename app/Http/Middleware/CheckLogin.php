<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
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
        $pageIsLogin = array_slice(func_get_args(), 2)[0];

        $pageIsLogin    = !empty($pageIsLogin) && $pageIsLogin != "false" ? true : false;

        $userIsLogin = \Auth::guard("admin")->check() || \Auth::guard("kasir")->check();
        if($userIsLogin == $pageIsLogin){
            return $next($request);
        }
        if($userIsLogin){
            return redirect(route("cp.dashboard"));
        }else{
            return redirect('/');
        }
    }
}
