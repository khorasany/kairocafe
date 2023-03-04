<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;


class categoriasController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO PAGINA DE CATEGORIAS
    |--------------------------------------------------------------------------
    */

    function index(Request $request)
    {

        return view("paginas.categorias");
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO CADASTRO DE CATEGORIA
    |--------------------------------------------------------------------------
    */

    public function cadastrarCategoria()
    {

        $nome = $_POST['nome'];

        if ($_POST['nova_imagem'] == 'sim') {

            $imagem = $_FILES['imagem']['tmp_name'];
            $diretorio = 'imagens/categorias/' . $_FILES['imagem']['name'];
            $result = move_uploaded_file($imagem, $diretorio);

            $cadastrar = DB::table('categorias')->insert([
                'nome' => $nome,
                'endereco_imagem' => $_FILES['imagem']['name']
            ]);
        } else {

            $cadastrar = DB::table('categorias')->insert([
                'nome' => $nome,
                'endereco_imagem' => 'X.png'
            ]);
        }

        if ($cadastrar == 1) {

            return response()->json(['sucesso' => "cadastrado"], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER LISTA DE CATEGORIAS
    |--------------------------------------------------------------------------
    */

    public function getCategorias()
    {

        $totalRecords = DB::table('categorias')->count();
        $records = DB::table('categorias')->orderBy('nome', 'ASC')->get();
        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $subs = DB::table('subcategorias')->where('categoria_pai', $id)->count();
            $prods = DB::table('produtos')->where('categoria', $id)->count();
            $endereco_imagem = $record->endereco_imagem;
            $nome = $record->nome;

            $data_arr[] = array(
                "id" => $id,
                "nome" => $nome,
                "endereco_imagem" => $endereco_imagem,
                "subcategorias_quant" => $subs,
                "produtos_quant" => $prods,
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
    | FUNÇÃO OBTER CONTAGEM DE CATEGORIAS
    |--------------------------------------------------------------------------
    */

    public function getCategoriasTotal()
    {

        $contagem = DB::table('categorias')->count();

        return response()->json([

            'categorias' => $contagem

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO EXCLUIR CATEGORIA
    |--------------------------------------------------------------------------
    */

    public function excluirCategoria($id)
    {

        $deletar = DB::table('categorias')->where('id', $id)->delete();
        $deletarsub = DB::table('subcategorias')->where('categoria_pai', $id)->delete();
        $endereco_imagem = DB::table('categorias')->where('id', $id)->value('endereco_imagem');

        if ($deletar == 1 and $deletarsub == 1) {

            /*$image_path = "imagens/categorias/".$endereco_imagem.""; 

             if (file_exists($image_path)) {

                   @unlink($image_path);

            }*/

            return response()->json(['sucesso' => "excluido"], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER DADOS DE CATEGORIA
    |--------------------------------------------------------------------------
    */

    public function dadosCategoria($id)
    {

        $dados = DB::table('categorias')->where('id', $id)->get();


        if ($dados->count() >= 1) {

            return ($dados);
        } else {

            return response()->json(['erro' => "Desconhecido"], 404);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO ALTERAR DADOS DE CATEGORIA
    |--------------------------------------------------------------------------
    */

    public function alterarDadosCategoria($id)
    {

        $nome = $_POST['nome'];

        if ($_POST['nova_imagem'] == 'sim') {

            $imagem = $_FILES['imagem']['tmp_name'];
            $diretorio = 'imagens/categorias/' . $_FILES['imagem']['name'];
            $result = move_uploaded_file($imagem, $diretorio);
            $alteracao = DB::table('categorias')
                ->where('id', $id)
                ->update([
                    'nome' => $nome,
                    'endereco_imagem' => $_FILES['imagem']['name']
                ]);


            $alteracaoProdutos = DB::table('produtos')
                ->where('categoria', $id)
                ->update([
                    'categoria_nome' => $nome
                ]);

            $alteracaoEstoque = DB::table('estoque')
                ->where('categoria_id', $id)
                ->update([
                    'categoria_nome' => $nome
                ]);
        } else {

            $alteracao = DB::table('categorias')
                ->where('id', $id)
                ->update([
                    'nome' => $nome
                ]);

            $alteracaoProdutos = DB::table('produtos')
                ->where('categoria', $id)
                ->update([
                    'categoria_nome' => $nome
                ]);


            $alteracaoEstoque = DB::table('estoque')
                ->where('categoria_id', $id)
                ->update([
                    'categoria_nome' => $nome
                ]);
        }

        if ($alteracao == 1) {

            return response()->json(['sucesso' => "alterado"], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO CADASTRO DE SUB CATEGORIA
    |--------------------------------------------------------------------------
    */

    public function cadastrarSubCategoria()
    {

        $nome = $_POST['nome'];
        $pai = $_POST['categoria_pai'];

        if ($_POST['nova_imagem'] == 'sim') {

            $imagem = $_FILES['imagem']['tmp_name'];
            $diretorio = 'imagens/categorias/' . $_FILES['imagem']['name'];
            $result = move_uploaded_file($imagem, $diretorio);

            $cadastrar = DB::table('subcategorias')->insert([
                'nome' => $nome,
                'endereco_imagem' => $_FILES['imagem']['name'],
                'categoria_pai' => $pai
            ]);
        } else {

            $cadastrar = DB::table('subcategorias')->insert([
                'nome' => $nome,
                'endereco_imagem' => 'X.png',
                'categoria_pai' => $pai
            ]);
        }

        if ($cadastrar == 1) {

            return response()->json(['sucesso' => "cadastrado"], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER LISTAGEM DE SUB CATEGORIAS
    |--------------------------------------------------------------------------
    */

    public function getSubCategorias()
    {

        $totalRecords = DB::table('subcategorias')->count();
        $records = DB::table('subcategorias')->orderBy('nome', 'DESC')->get();
        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $endereco_imagem = $record->endereco_imagem;
            $prods = DB::table('produtos')->where('subcategoria', $id)->count();
            $nome = $record->nome;

            $data_arr[] = array(
                "id" => $id,
                "nome" => $nome,
                "endereco_imagem" => $endereco_imagem,
                "produtos_quant" =>  $prods,
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
    | OBTER LISTAGEM DE SUB CATEGORIA PAI
    |--------------------------------------------------------------------------
    */

    public function getSubCategorias2($catpai)
    {

        $totalRecords = DB::table('subcategorias')->where('categoria_pai', $catpai)->count();
        $records = DB::table('subcategorias')->where('categoria_pai', $catpai)->orderBy('nome', 'DESC')->get();
        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $endereco_imagem = $record->endereco_imagem;
            $prods = DB::table('produtos')->where('subcategoria', $id)->count();
            $nome = $record->nome;

            $data_arr[] = array(
                "id" => $id,
                "nome" => $nome,
                "endereco_imagem" => $endereco_imagem,
                "produtos_quant" => $prods,
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
    | FUNÇÃO OBTER CONTAGEM SUB CATEGORIAS
    |--------------------------------------------------------------------------
    */

    public function getSubCategoriasTotal()
    {

        $contagem = DB::table('subcategorias')->count();

        return response()->json([

            'subcategorias' => $contagem

        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO EXCLUIR SUB CATEGORIA
    |--------------------------------------------------------------------------
    */

    public function excluirSubCategoria($id)
    {

        $deletar = DB::table('subcategorias')->where('id', $id)->delete();


        if ($deletar == 1) {

            return response()->json(['sucesso' => "excluido"], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER DADOS SUB CATEGORIA
    |--------------------------------------------------------------------------
    */

    public function dadosSubCategoria($id)
    {

        $dados = DB::table('subcategorias')->where('id', $id)->get();


        if ($dados->count() >= 1) {

            return ($dados);
        } else {

            return response()->json(['erro' => "Desconhecido"], 404);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO ALTERAR DADOS SUB CATEGORIA
    |--------------------------------------------------------------------------
    */

    public function alterarDadosSubCategoria($id)
    {

        $nome = $_POST['nome'];

        if ($_POST['nova_imagem'] == 'sim') {

            $imagem = $_FILES['imagem']['tmp_name'];
            $diretorio = 'imagens/categorias/' . $_FILES['imagem']['name'];
            $result = move_uploaded_file($imagem, $diretorio);
            $alteracao = DB::table('subcategorias')
                ->where('id', $id)
                ->update([
                    'nome' => $nome,
                    'endereco_imagem' => $_FILES['imagem']['name']
                ]);


            $alteracaoProdutos = DB::table('produtos')
                ->where('subcategoria', $id)
                ->update([
                    'subcategoria_nome' => $nome
                ]);

            $alteracaoEstoque = DB::table('estoque')
                ->where('subcategoria_id', $id)
                ->update([
                    'subcategoria_nome' => $nome
                ]);
        } else {

            $alteracao = DB::table('subcategorias')
                ->where('id', $id)
                ->update([
                    'nome' => $nome
                ]);

            $alteracaoProdutos = DB::table('produtos')
                ->where('subcategoria', $id)
                ->update([
                    'subcategoria_nome' => $nome
                ]);


            $alteracaoEstoque = DB::table('estoque')
                ->where('subcategoria_id', $id)
                ->update([
                    'subcategoria_nome' => $nome
                ]);
        }

        if ($alteracao == 1) {

            return response()->json(['sucesso' => "alterado"], 200);
        }
    }
}
