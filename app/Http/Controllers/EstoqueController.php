<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Log;
use DataTables;
use Illuminate\Support\Facades\Storage;

class EstoqueController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO PAGINA DE ESTOQUE
    |--------------------------------------------------------------------------
    */

    function index(Request $request)
    {

        return view("paginas.estoque");
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER ESTOQUE
    |--------------------------------------------------------------------------
    */

    public function getEstoque()
    {

        $dados = datatables(DB::table('produtos')->where('controlar_estoque', 'sim')->orderBy('nome', 'DESC'))->toJson();

        return  $dados;
    }



    public function getEntradas()
    {

        $dados = datatables(DB::table('estoque')->where('tipo', 'entrada'))
            ->editColumn('datahora', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->datahora)->format('d/m/Y H:i');
                return $formatedDate;
            })
            ->addColumn('imagem', function ($data) {
                $imagem = DB::table('produtos')->where('id', $data->produto_id)->value('imagem');
                return $imagem;
            })
            ->addColumn('produto_nome', function ($data) {
                $produto_nome = DB::table('produtos')->where('id', $data->produto_id)->value('nome');
                return $produto_nome;
            })
            ->toJson();

        return  $dados;
    }



    public function getSaidas()
    {

        $dados = datatables(DB::table('estoque')->where('tipo', 'saida'))
            ->editColumn('datahora', function ($data) {
                $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->datahora)->format('d/m/Y H:i');
                return $formatedDate;
            })
            ->addColumn('imagem', function ($data) {
                $imagem = DB::table('produtos')->where('id', $data->produto_id)->value('imagem');
                return $imagem;
            })
            ->addColumn('produto_nome', function ($data) {
                $produto_nome = DB::table('produtos')->where('id', $data->produto_id)->value('nome');
                return $produto_nome;
            })
            ->toJson();

        return  $dados;
    }


    public function getListaProdutos()
    {

        $dados = datatables(DB::table('produtos'))->only(['id', 'nome'])
            ->toJson();

        return  $dados;
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO PAGINA DE ENTRADAS
    |--------------------------------------------------------------------------
    */

    function entradas(Request $request)
    {

        return view("paginas.entrada");
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO CADASTRO DE ENTRADA
    |--------------------------------------------------------------------------
    */

    public function cadastrarEntrada()
    {

        $produto_id = $_POST['produto_id'];
        $quantidade = $_POST['quantidade'];
        $valor = $_POST['valor'];

        $cadastrar = DB::table('estoque')->insert([
            'produto_id' => $produto_id,
            'quantidade' => $quantidade,
            'valor' => $valor,
            'tipo' => "entrada"
        ]);

        $quantAtual = DB::table('produtos')->where('id', $produto_id)->value('quantidade');

        $alteracaoProdutos = DB::table('produtos')
            ->where('id', $produto_id)
            ->update([
                'quantidade' => $quantAtual + $quantidade
            ]);


        if ($cadastrar == 1 and $alteracaoProdutos == 1) {

            return response()->json(['sucesso' => "cadastrado"], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO EXCLUIR ENTRADA
    |--------------------------------------------------------------------------
    */

    public function excluirEntrada($id)
    {

        $quantEntrada = DB::table('estoque')->where('id', $id)->value('quantidade');
        $produtoEntrada = DB::table('estoque')->where('id', $id)->value('produto_id');
        $quantAtual = DB::table('produtos')->where('id', $produtoEntrada)->value('quantidade');

        $alteracaoProdutos = DB::table('produtos')
            ->where('id', $produtoEntrada)
            ->update([
                'quantidade' => $quantAtual - $quantEntrada
            ]);

        $deletar = DB::table('estoque')->where('id', $id)->delete();


        if ($deletar == 1 and $alteracaoProdutos == 1) {

            return response()->json(['sucesso' => "excluido"], 200);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO PAGINA DE SAIDAS
    |--------------------------------------------------------------------------
    */

    function saidas(Request $request)
    {

        return view("paginas.saidas");
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO CADASTRO DE SAÍDA
    |--------------------------------------------------------------------------
    */

    public function cadastrarSaida()
    {

        $produto_id = $_POST['produto_id'];
        $quantidade = $_POST['quantidade'];
        $motivo = $_POST['motivo'];
        $observacao = $_POST['observacao'];



        if ($motivo == 'devolucao_mercadoria') {

            $motivo_formatado = 'Devolução de mercadoria';
        } elseif ($motivo == 'devolucao_venda') {

            $motivo_formatado = 'Devolução de venda';
        } elseif ($motivo == 'perda_mercadoria') {

            $motivo_formatado = 'Perda de mercadoria';
        } elseif ($motivo == 'venda') {

            $motivo_formatado = 'Venda';
        }


        $cadastrar = DB::table('estoque')->insert([
            'produto_id' => $produto_id,
            'quantidade' => $quantidade,
            'motivo' => $motivo_formatado,
            'observacao' => $observacao,
            'tipo' => "saida"
        ]);

        $quantAtual = DB::table('produtos')->where('id', $produto_id)->value('quantidade');

        $alteracaoProdutos = DB::table('produtos')
            ->where('id', $produto_id)
            ->update([
                'quantidade' => $quantAtual - $quantidade
            ]);


        if ($cadastrar == 1 and $alteracaoProdutos == 1) {

            return response()->json(['sucesso' => "cadastrado"], 200);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO EXCLUIR SAÍDA
    |--------------------------------------------------------------------------
    */

    public function excluirSaida($id)
    {

        $quantEntrada = DB::table('estoque')->where('id', $id)->value('quantidade');
        $produtoEntrada = DB::table('estoque')->where('id', $id)->value('produto_id');
        $quantAtual = DB::table('produtos')->where('id', $produtoEntrada)->value('quantidade');

        $alteracaoProdutos = DB::table('produtos')
            ->where('id', $produtoEntrada)
            ->update([
                'quantidade' => $quantAtual + $quantEntrada
            ]);

        $deletar = DB::table('estoque')->where('id', $id)->delete();


        if ($deletar == 1 and $alteracaoProdutos == 1) {

            return response()->json(['sucesso' => "excluido"], 200);
        }
    }
}
