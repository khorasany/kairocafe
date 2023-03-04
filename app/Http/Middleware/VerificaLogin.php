<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificaLogin
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
        //session()->flash('menu-estilo', 'sidebar-mini');

        /* VERIFICA SE O USUÁRIO ESTÁ LOGADO */


        if ($request->session()->get('logado') == True) {
            return $next($request);
        } else {
            /* RETORNO 5 = SESSÃO NÃO INICIADA/EXPIRADA */
            return redirect()->route('login', ['retorno' => '5']);
        }
    }
}
