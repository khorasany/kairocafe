<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class loginController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO PAGINA DE LOGIN
    |--------------------------------------------------------------------------
    */

    function login(Request $request)
    {

        $user = Auth::user();
        return view("paginas.login");
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO API DE LOGIN
    |--------------------------------------------------------------------------
    */
    public function loginApi(Request $request)
    {

        $email = $_POST['email'];
        $senha = $_POST['password'];

        $users = DB::table('usuarios')->get();

        if (DB::table('usuarios')->where('email', $email)->value('email') == $email and DB::table('usuarios')->where('email', $email)->value('password') == $senha) {
            $idUsuario = DB::table('usuarios')->where('email', $email)->value('id');
            $nome = DB::table('usuarios')->where('email', $email)->value('nome');
            $m_administrativo = DB::table('usuarios')->where('email', $email)->value('m_administrativo');
            $m_categorias = DB::table('usuarios')->where('email', $email)->value('m_categorias');
            $m_produtos = DB::table('usuarios')->where('email', $email)->value('m_produtos');
            $m_estoque = DB::table('usuarios')->where('email', $email)->value('m_estoque');


            session(
                [
                    'logado' => True,
                    'id' => $idUsuario,
                    'email' => $email,
                    'senha' => $senha,
                    'nome' => $nome,
                    'm_administrativo' => $m_administrativo,
                    'm_categorias' => $m_categorias,
                    'm_produtos' => $m_produtos,
                    'm_estoque' => $m_estoque
                ]
            );

            return redirect()->route('home');
        } elseif (DB::table('usuarios')->where('email', $email)->value('email') == $email and DB::table('usuarios')->where('email', $email)->value('password') != $senha) {
            return redirect()->route('login', ['retorno' => '2']);
        } elseif (DB::table('usuarios')->where('email', $email)->value('email') != $email) {
            return redirect()->route('login', ['retorno' => '3']);
        } else {
            return redirect()->route('login', ['retorno' => '4']);
        }
    }
}
