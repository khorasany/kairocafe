<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class administrativoController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO PÁGINA DE USUÁRIOS
    |--------------------------------------------------------------------------
    */

    function usuarios(Request $request)
    {

        return view("paginas.usuarios");
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO CADASTRO DE USUÁRIO
    |--------------------------------------------------------------------------
    */

    public function cadastrarUsuario()
    {

        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $m_administrativo = $_POST['m_administrativo'];
        $m_categorias = $_POST['m_categorias'];
        $m_produtos = $_POST['m_produtos'];
        $m_estoque = $_POST['m_estoque'];

        $cadastrar = DB::table('usuarios')->insert([
            'email' => $email,
            'password' => $senha,
            'nome' => $nome,
            'm_administrativo' => $m_administrativo,
            'm_categorias' => $m_categorias,
            'm_produtos' => $m_produtos,
            'm_estoque' => $m_estoque
        ]);


        if ($cadastrar == 1) {

            return response()->json(['sucesso' => "cadastrado"], 200);
        }

    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER LISTA USUÁRIOS EM JSON
    |--------------------------------------------------------------------------
    */

    public function getUsuarios()
    {

        $totalRecords = DB::table('usuarios')->count();
        $records = DB::table('usuarios')->orderBy('criado', 'DESC')->get();
        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $nome = $record->nome;
            $email = $record->email;
            $senha = $record->password;
            $criado = $record->criado;
            $atualizado = $record->atualizado;

            $criado_formatado = Carbon::createFromFormat('Y-m-d H:i:s', $criado)->format('d/m/Y H:i');
            $atualizado_formatado = Carbon::createFromFormat('Y-m-d H:i:s', $atualizado)->format('d/m/Y H:i');

            $data_arr[] = array(
                "id" => $id,
                "nome" => $nome,
                "email" => $email,
                "password" => $senha,
                "criado" => $criado_formatado,
                "atualizado" => $atualizado_formatado,
            );
        }

        $response = array(
            "resultados" => $totalRecords,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;

    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER TOTAL DE USUÁRIOS
    |--------------------------------------------------------------------------
    */

    public function getUsuariosTotal()
    {

        $contagem = DB::table('usuarios')->count();

        return response()->json([

            'usuarios' => $contagem

        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO EXCLUIR USUÁRIO
    |--------------------------------------------------------------------------
    */

    public function excluirUsuario($id)
    {

        $deletar = DB::table('usuarios')->where('id', $id)->delete();

        if ($deletar == 1) {

            return response()->json(['sucesso' => "excluido"], 200);
        }

    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER DADOS DO USUÁRIO
    |--------------------------------------------------------------------------
    */

    public function dadosUsuario($id)
    {

        $dados = DB::table('usuarios')->where('id', $id)->get();

        if ($dados->count() >= 1) {

            return ($dados);
        } else {

            return response()->json(['erro' => "Desconhecido"], 404);
        }

    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO ALTERAR DADOS DO USUÁRIO
    |--------------------------------------------------------------------------
    */

    public function alterarDadosUsuario($id)
    {

        $dataAtual = date('Y-m-d H:i:s');
        $novaData = Carbon::createFromFormat('Y-m-d H:i:s', $dataAtual)->tz('America/Sao_Paulo')->format('Y-m-d H:i:s');

        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $m_administrativo = $_POST['m_administrativo'];
        $m_categorias = $_POST['m_categorias'];
        $m_produtos = $_POST['m_produtos'];
        $m_estoque = $_POST['m_estoque'];

        $alteracao = DB::table('usuarios')
            ->where('id', $id)
            ->update([
                'email' => $email,
                'password' => $senha,
                'nome' => $nome,
                'm_administrativo' => $m_administrativo,
                'm_categorias' => $m_categorias,
                'm_produtos' => $m_produtos,
                'm_estoque' => $m_estoque,
                'atualizado' => $novaData
            ]);

        if ($alteracao == 1) {

            return response()->json(['sucesso' => "alterado"], 200);
        }

    }




}
