<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class moduloAdministrativo
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

        /* VERIFICA SE O USUÁRIO POSSUI PERMISSÃO PARA O MÓDULO ADMINISTRATIVO */

        if ($request->session()->get('m_administrativo') == 'sim') {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}
