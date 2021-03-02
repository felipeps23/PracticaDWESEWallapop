<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $session = auth()->user()->id;

        $usuario = User::find($session);

        if(!is_null($usuario) && $usuario -> admin){

            return $next($request);
        }

        return redirect('/');
    }
}