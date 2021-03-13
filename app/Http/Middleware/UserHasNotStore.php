<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserHasNotStore
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
        if (!auth()->user()->store()->count()) {
            flash('Você ainda não possui uma loja!')->warning();
            return redirect()->route('admin.stores.index');
        }
        
        return $next($request);
    }
}