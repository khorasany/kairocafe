<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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

        /* MIDDLEWARE NÃO ESTÁ SENDO UTILIZADO */
        /* VERIFICA SE O USUÁRIO POSSUI CARGO ADMIN NA SESSÃO */

        if ($request->session()->get('cargo') == 'admin') {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}
