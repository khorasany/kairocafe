<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Log;
use DataTables;
use Illuminate\Support\Facades\Storage;


class ProdutosController extends Controller
{


    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO PAGINA PRODUTOS
    |--------------------------------------------------------------------------
    */

    function index(Request $request)
    {

        return view("paginas.produtos");
    }

    function teste2(Request $request)
    {

        return view("paginas.teste");
    }


    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER LISTAGEM DE PRODUTOS
    |--------------------------------------------------------------------------
    */

    public function getProdutos()
    {

        $dados = datatables(DB::table('produtos')->orderBy('nome', 'DESC'))->toJson();

        return  $dados;
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER LISTAGEM DE PRODUTOS POR CAT
    |--------------------------------------------------------------------------
    */

    public function getProdutosCat($cat)
    {

        $dados = datatables(DB::table('produtos')->where('categoria', $cat)->orderBy('nome', 'DESC'))->toJson();

        return  $dados;
    }

    public function getProdutosSubCat($cat)
    {

        $dados = datatables(DB::table('produtos')->where('subcategoria', $cat)->orderBy('nome', 'DESC'))->toJson();

        return  $dados;
    }


    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER CONTAGEM DE PRODUTOS
    |--------------------------------------------------------------------------
    */

    public function getProdutosTotal()
    {

        $contagem = DB::table('produtos')->count();

        return response()->json([

            'produtos' => $contagem

        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO CADASTRO DE PRODUTOS
    |--------------------------------------------------------------------------
    */

    function brl2decimal($brl, $casasDecimais = 2) {
        // Se já estiver no formato USD, retorna como float e formatado
        if(preg_match('/^\d+\.{1}\d+$/', $brl))
            return (float) number_format($brl, $casasDecimais, '.', '');
        // Tira tudo que não for número, ponto ou vírgula
        $brl = preg_replace('/[^\d\.\,]+/', '', $brl);
        // Tira o ponto
        $decimal = str_replace('.', '', $brl);
        // Troca a vírgula por ponto
        $decimal = str_replace(',', '.', $decimal);
        return (float) number_format($decimal, $casasDecimais, '.', '');
    }

    public function cadastrarProduto()
    {

        $prodCategorias = $_POST['prodCategorias'];
        $prodSubCategorias = $_POST['prodSubCategorias'];
        $nomeProduto = $_POST['nomeProduto'];
        $codigoProduto = $_POST['codigoProduto'];
        $precoProduto = $this->brl2decimal($_POST['precoProduto']);
        $unidadeProduto = $_POST['unidadeProduto'];
        $insumoProduto = $_POST['insumoProduto'];
        $perecivelProduto = $_POST['perecivelProduto'];
        $produtoCustoValorFixo = $_POST['produtoCustoValorFixo'];
        $produtoDisponivelVenda = $_POST['produtoDisponivelVenda'];
        $produtoControlarEstoque = $_POST['produtoControlarEstoque'];
        $produtoNotificacaoEstoque = $_POST['produtoNotificacaoEstoque'];
        $produtoEstoqueMinimo = $_POST['produtoEstoqueMinimo'];
        $produtoEstoqueMaximo = $_POST['produtoEstoqueMaximo'];
        $produtoNCM = $_POST['produtoNCM'];
        $produtoCEST = $_POST['produtoCEST'];
        $produtoOrigem = $_POST['produtoOrigem'];
        $produtoCFOP = $_POST['produtoCFOP'];
        $produtoICMS = $_POST['produtoICMS'];
        $produtoIPI = $_POST['produtoIPI'];
        $produtoPIS = $_POST['produtoPIS'];
        $produtoCOFINS = $_POST['produtoCOFINS'];


        if ($prodCategorias != 'sem_categoria') {
            $prodCategoriasNome = DB::table('categorias')->where('id', $prodCategorias)->value('nome');
        } else {
            $prodCategoriasNome = "Não vinculado";
        }

        if ($prodSubCategorias != 'sem_subcategoria') {
            $prodSubCategoriasNome = DB::table('subcategorias')->where('id', $prodSubCategorias)->value('nome');
        } else {
            $prodSubCategoriasNome = "Não vinculado";
        }

        if ($_POST['nova_imagem'] == 'sim') {

            $imagem = $_FILES['imagem']['tmp_name'];
            $diretorio = 'imagens/produtos/' . $_FILES['imagem']['name'];
            $result = move_uploaded_file($imagem, $diretorio);

            $cadastrar = DB::table('produtos')->insert([
                'nome' => $nomeProduto,
                'imagem' => $_FILES['imagem']['name'],
                'preco' => $precoProduto,
                'categoria' => $prodCategorias,
                'categoria_nome' => $prodCategoriasNome,
                'subcategoria' => $prodSubCategorias,
                'subcategoria_nome' => $prodSubCategoriasNome,
                'unit' => $unidadeProduto,
                'ncm' => $produtoNCM,
                'cest' => $produtoCEST,
                'origem' => $produtoOrigem,
                'cfop' => $produtoCFOP,
                'icms' => $produtoICMS,
                'ipi' => $produtoIPI,
                'pis' => $produtoPIS,
                'cofins' => $produtoCOFINS,
                'codigo' => $codigoProduto,
                'unidade' => $unidadeProduto,
                'estoque_minimo' => $produtoEstoqueMinimo,
                'estoque_maximo' => $produtoEstoqueMaximo,
                'controlar_estoque' => $produtoControlarEstoque,
                'notificacao_estoque' => $produtoNotificacaoEstoque,
                'tipo_insumo' => $insumoProduto,
                'perecivel' => $perecivelProduto,
                'custo_com_valor_fixo' => $produtoCustoValorFixo,
                'disponivel_para_venda' => $produtoDisponivelVenda,
                'pontos_impressao' => 'nao',
                'quantidade' => 0
            ]);
        } else {

            $cadastrar = DB::table('produtos')->insert([
                'nome' => $nomeProduto,
                'imagem' => 'X.png',
                'preco' => $precoProduto,
                'categoria' => $prodCategorias,
                'categoria_nome' => $prodCategoriasNome,
                'subcategoria' => $prodSubCategorias,
                'subcategoria_nome' => $prodSubCategoriasNome,
                'unit' => $unidadeProduto,
                'ncm' => $produtoNCM,
                'cest' => $produtoCEST,
                'origem' => $produtoOrigem,
                'cfop' => $produtoCFOP,
                'icms' => $produtoICMS,
                'ipi' => $produtoIPI,
                'pis' => $produtoPIS,
                'cofins' => $produtoCOFINS,
                'codigo' => $codigoProduto,
                'unidade' => $unidadeProduto,
                'estoque_minimo' => $produtoEstoqueMinimo,
                'estoque_maximo' => $produtoEstoqueMaximo,
                'controlar_estoque' => $produtoControlarEstoque,
                'notificacao_estoque' => $produtoNotificacaoEstoque,
                'tipo_insumo' => $insumoProduto,
                'perecivel' => $perecivelProduto,
                'custo_com_valor_fixo' => $produtoCustoValorFixo,
                'disponivel_para_venda' => $produtoDisponivelVenda,
                'pontos_impressao' => 'nao',
                'quantidade' => 0

            ]);
        }

        if ($cadastrar == 1) {




            return response()->json(['sucesso' => "cadastrado"], 200);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO ALTERAR DADOS DE PRODUTO
    |--------------------------------------------------------------------------
    */

    public function alterarDadosProduto($id)
    {

        $prodCategorias = $_POST['prodCategorias'];
        $prodSubCategorias = $_POST['prodSubCategorias'];
        $nomeProduto = $_POST['nomeProduto'];
        $codigoProduto = $_POST['codigoProduto'];
        $precoProduto = $this->brl2decimal($_POST['precoProduto']);
        $unidadeProduto = $_POST['unidadeProduto'];
        $insumoProduto = $_POST['insumoProduto'];
        $perecivelProduto = $_POST['perecivelProduto'];
        $produtoCustoValorFixo = $_POST['produtoCustoValorFixo'];
        $produtoDisponivelVenda = $_POST['produtoDisponivelVenda'];
        $produtoControlarEstoque = $_POST['produtoControlarEstoque'];
        $produtoNotificacaoEstoque = $_POST['produtoNotificacaoEstoque'];
        $produtoEstoqueMinimo = $_POST['produtoEstoqueMinimo'];
        $produtoEstoqueMaximo = $_POST['produtoEstoqueMaximo'];
        $produtoNCM = $_POST['produtoNCM'];
        $produtoCEST = $_POST['produtoCEST'];
        $produtoOrigem = $_POST['produtoOrigem'];
        $produtoCFOP = $_POST['produtoCFOP'];
        $produtoICMS = $_POST['produtoICMS'];
        $produtoIPI = $_POST['produtoIPI'];
        $produtoPIS = $_POST['produtoPIS'];
        $produtoCOFINS = $_POST['produtoCOFINS'];


        if ($prodCategorias != 'sem_categoria') {
            $prodCategoriasNome = DB::table('categorias')->where('id', $prodCategorias)->value('nome');
        } else {
            $prodCategoriasNome = "Não vinculado";
        }

        if ($prodSubCategorias != 'sem_subcategoria') {
            $prodSubCategoriasNome = DB::table('subcategorias')->where('id', $prodSubCategorias)->value('nome');
        } else {
            $prodSubCategoriasNome = "Não vinculado";
        }

        if ($_POST['nova_imagem'] == 'sim') {


            $imagem = $_FILES['imagem']['tmp_name'];
            $diretorio = 'imagens/produtos/' . $_FILES['imagem']['name'];
            $result = move_uploaded_file($imagem, $diretorio);
            $alteracao = DB::table('produtos')
                ->where('id', $id)
                ->update([
                    'nome' => $nomeProduto,
                    'imagem' => $_FILES['imagem']['name'],
                    'preco' => $precoProduto,
                    'categoria' => $prodCategorias,
                    'categoria_nome' => $prodCategoriasNome,
                    'subcategoria' => $prodSubCategorias,
                    'subcategoria_nome' => $prodSubCategoriasNome,
                    'unit' => $unidadeProduto,
                    'ncm' => $produtoNCM,
                    'cest' => $produtoCEST,
                    'origem' => $produtoOrigem,
                    'cfop' => $produtoCFOP,
                    'icms' => $produtoICMS,
                    'ipi' => $produtoIPI,
                    'pis' => $produtoPIS,
                    'cofins' => $produtoCOFINS,
                    'codigo' => $codigoProduto,
                    'unidade' => $unidadeProduto,
                    'estoque_minimo' => $produtoEstoqueMinimo,
                    'estoque_maximo' => $produtoEstoqueMaximo,
                    'controlar_estoque' => $produtoControlarEstoque,
                    'notificacao_estoque' => $produtoNotificacaoEstoque,
                    'tipo_insumo' => $insumoProduto,
                    'perecivel' => $perecivelProduto,
                    'custo_com_valor_fixo' => $produtoCustoValorFixo,
                    'disponivel_para_venda' => $produtoDisponivelVenda,
                    'pontos_impressao' => 'nao'
                ]);
        } else {

            $alteracao = DB::table('produtos')
                ->where('id', $id)
                ->update([
                    'nome' => $nomeProduto,
                    'preco' => $precoProduto,
                    'categoria' => $prodCategorias,
                    'categoria_nome' => $prodCategoriasNome,
                    'subcategoria' => $prodSubCategorias,
                    'subcategoria_nome' => $prodSubCategoriasNome,
                    'unit' => $unidadeProduto,
                    'ncm' => $produtoNCM,
                    'cest' => $produtoCEST,
                    'origem' => $produtoOrigem,
                    'cfop' => $produtoCFOP,
                    'icms' => $produtoICMS,
                    'ipi' => $produtoIPI,
                    'pis' => $produtoPIS,
                    'cofins' => $produtoCOFINS,
                    'codigo' => $codigoProduto,
                    'unidade' => $unidadeProduto,
                    'estoque_minimo' => $produtoEstoqueMinimo,
                    'estoque_maximo' => $produtoEstoqueMaximo,
                    'controlar_estoque' => $produtoControlarEstoque,
                    'notificacao_estoque' => $produtoNotificacaoEstoque,
                    'tipo_insumo' => $insumoProduto,
                    'perecivel' => $perecivelProduto,
                    'custo_com_valor_fixo' => $produtoCustoValorFixo,
                    'disponivel_para_venda' => $produtoDisponivelVenda,
                    'pontos_impressao' => 'nao'
                ]);
        }

        if ($alteracao == 1) {

            return response()->json(['sucesso' => "alterado"], 200);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO OBTER DADOS DE PRODUTO
    |--------------------------------------------------------------------------
    */

    public function dadosProduto($id)
    {

        $dados = DB::table('produtos')->where('id', $id)->get();


        if ($dados->count() >= 1) {
            $dados[0]->preco = number_format($dados[0]->preco,2,",",".");

            return ($dados);
        } else {

            return response()->json(['erro' => "Desconhecido"], 404);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÃO EXCLUIR PRODUTO
    |--------------------------------------------------------------------------
    */

    public function excluirProduto($id)
    {

        $deletar = DB::table('produtos')->where('id', $id)->delete();

        if ($deletar == 1) {

            return response()->json(['sucesso' => "excluido"], 200);
        }
    }

    public function getLastProducts($mesaId, $comanda){
        $dados = datatables(DB::table('produtos')
            ->select('produtos.*')
            ->join('mesas_pedidos', function ($q) use ($mesaId, $comanda) {
                $q->on('mesas_pedidos.mesas_id', '=', DB::raw($mesaId))
                    ->where('mesas_pedidos.comanda_id', '=', DB::raw($comanda))
                    ->where('mesas_pedidos.status_pedidos', '<>', 2);
            })
            ->join('mesas_pedidos_itens', function($q)
            {
                $q->on('mesas_pedidos_itens.produtos_id', '=', 'produtos.id')
                    ->where('mesas_pedidos_itens.mesas_pedidos_id', '=', DB::raw('mesas_pedidos.id'));
            })
            ->groupBy('produtos.id')
            ->orderBy('produtos.nome', 'DESC'))
            ->toJson();

        return  $dados;
    }
}
