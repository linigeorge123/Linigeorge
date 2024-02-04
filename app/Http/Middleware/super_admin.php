<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Super_Admin
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
        if(Auth::User()->usertype != 'super_admin'){
            if( ! $request->ajax()){
               return back()->with('error','Permission denied !');
            }else{
              return new Response('<h5 class="text-center red">Permission denied !</h5>');
            }
          }
            return $next($request);
        }    
}
