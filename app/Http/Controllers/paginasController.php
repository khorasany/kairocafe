<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class paginasController extends Controller

{
    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO ROTA HOME
    |--------------------------------------------------------------------------
    */

    function inicio(Request $request)
    {

        return redirect()->route("home");
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO PAGINA HOME
    |--------------------------------------------------------------------------
    */
    function index(Request $request)
    {

        return view("paginas.index");
    }
}
