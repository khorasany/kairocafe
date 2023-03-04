<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\paginasController;
use App\Http\Controllers\administrativoController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\categoriasController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\loginController;
use App\Http\Middleware\VerificaLogin;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\moduloAdministrativo;
use App\Http\Middleware\moduloCategorias;
use App\Http\Middleware\moduloProdutos;
use App\Http\Middleware\moduloEstoque;


/*
|--------------------------------------------------------------------------
| INICIO
|--------------------------------------------------------------------------
*/

Route::get('/', [paginasController::class,'inicio'])->name('inicio');
Route::get('/home', [paginasController::class,'index'])->name('home')->middleware('VerificaLogin');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login', [loginController::class,'login'])->name('login');
Route::post('/login', [loginController::class, 'loginApi'])->name('loginApi');

/*
|--------------------------------------------------------------------------
| GERENCIAMENTO DE USUARIOS
|--------------------------------------------------------------------------
*/

Route::get('/admin/usuarios', [administrativoController::class,'usuarios'])->name('usuarios')->middleware('VerificaLogin', 'moduloAdministrativo');
Route::get('/api/usuarios', [administrativoController::class,'getUsuarios'])->name('getUsuarios')->middleware('VerificaLogin', 'moduloAdministrativo');
Route::get('/api/usuarios/total', [administrativoController::class,'getUsuariosTotal'])->name('getUsuariosTotal')->middleware('VerificaLogin', 'moduloAdministrativo');
Route::get('/api/excluir/usuario/{id?}', [administrativoController::class, 'excluirUsuario'])->name('excluir.usuario')->middleware('VerificaLogin', 'moduloAdministrativo');
Route::get('/api/dados/usuario/{id?}', [administrativoController::class, 'dadosUsuario'])->name('dados.usuario')->middleware('VerificaLogin', 'moduloAdministrativo');
Route::post('/api/dados/alterar/usuario/{id?}', [administrativoController::class, 'alterarDadosUsuario'])->name('alterar.dados.usuario')->middleware('VerificaLogin', 'moduloAdministrativo');
Route::post('/api/cadastrar/usuario', [administrativoController::class, 'cadastrarUsuario'])->name('cadastrar.usuario')->middleware('VerificaLogin', 'moduloAdministrativo');

/*
|--------------------------------------------------------------------------
| GERENCIAMENTO DE CATEGORIAS E SUB CATEGORIAS
|--------------------------------------------------------------------------
*/

Route::get('/categorias', [categoriasController::class,'index'])->name('categorias')->middleware('VerificaLogin', 'moduloCategorias');
Route::get('/api/categorias', [categoriasController::class,'getCategorias'])->name('getCategorias');
Route::get('/api/categorias/total', [categoriasController::class,'getCategoriasTotal'])->name('getCategoriasTotal')->middleware('VerificaLogin', 'moduloCategorias');
Route::get('/api/excluir/categoria/{id?}', [categoriasController::class, 'excluirCategoria'])->name('excluir.categoria')->middleware('VerificaLogin', 'moduloCategorias');
Route::get('/api/dados/categoria/{id?}', [categoriasController::class, 'dadosCategoria'])->name('dados.categorias')->middleware('VerificaLogin', 'moduloCategorias');
Route::post('/api/dados/alterar/categoria/{id?}', [categoriasController::class, 'alterarDadosCategoria'])->name('alterar.dados.categoria')->middleware('VerificaLogin', 'moduloCategorias');
Route::post('/api/cadastrar/categoria', [categoriasController::class, 'cadastrarCategoria'])->name('cadastrar.categoria')->middleware('VerificaLogin', 'moduloCategorias');

// SUBCATEGORIAS

Route::get('/api/subcategorias', [categoriasController::class,'getSubCategorias'])->name('getSubCategorias');
Route::get('/api/subcategorias/{catpai?}', [categoriasController::class,'getSubCategorias2'])->name('getSubCategorias2');
Route::get('/api/subcategoriascontagem/total', [categoriasController::class,'getSubCategoriasTotal'])->name('getSubCategoriasTotal')->middleware('VerificaLogin', 'moduloCategorias');
Route::get('/api/excluir/subcategoria/{id?}', [categoriasController::class, 'excluirSubCategoria'])->name('excluir.subcategoria')->middleware('VerificaLogin', 'moduloCategorias');
Route::get('/api/dados/subcategoria/{id?}', [categoriasController::class, 'dadosSubCategoria'])->name('dados.subcategorias')->middleware('VerificaLogin', 'moduloCategorias');
Route::post('/api/dados/alterar/subcategoria/{id?}', [categoriasController::class, 'alterarDadosSubCategoria'])->name('alterar.dados.subcategoria')->middleware('VerificaLogin', 'moduloCategorias');
Route::post('/api/cadastrar/subcategoria', [categoriasController::class, 'cadastrarSubCategoria'])->name('cadastrar.subcategoria')->middleware('VerificaLogin', 'moduloCategorias');

/*
|--------------------------------------------------------------------------
| GERENCIAMENTO DE PRODUTOS
|--------------------------------------------------------------------------
*/

Route::get('/produtos', [ProdutosController::class,'index'])->name('produtos')->middleware('VerificaLogin', 'moduloProdutos');
Route::get('/api/produtos', [ProdutosController::class,'getProdutos'])->name('getProdutos');
Route::get('/api/produtos/cat/{cat?}', [ProdutosController::class,'getProdutosCat'])->name('getProdutosCat');
Route::get('/api/produtos/subcat/{cat?}', [ProdutosController::class,'getProdutosSubCat'])->name('getProdutosSubCat');
Route::get('/api/produtos/total', [ProdutosController::class,'getProdutosTotal'])->name('getProdutosTotal')->middleware('VerificaLogin', 'moduloProdutos');
Route::get('/api/dados/produto/{id?}', [ProdutosController::class, 'dadosProduto'])->name('dados.produto');
Route::post('/api/cadastrar/produto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto')->middleware('VerificaLogin', 'moduloProdutos');
Route::post('/api/dados/alterar/produto/{id?}', [ProdutosController::class, 'alterarDadosProduto'])->name('alterar.dados.produto')->middleware('VerificaLogin', 'moduloProdutos');
Route::get('/api/excluir/produto/{id?}', [ProdutosController::class, 'excluirProduto'])->name('excluir.produto')->middleware('VerificaLogin', 'moduloProdutos');

/*
|--------------------------------------------------------------------------
| GERENCIAMENTO DE ESTOQUE
|--------------------------------------------------------------------------
*/

Route::get('/estoque/visualizar', [EstoqueController::class,'index'])->name('estoque')->middleware('VerificaLogin', 'moduloEstoque');
Route::get('/api/estoque', [EstoqueController::class,'getEstoque'])->name('getEstoque')->middleware('VerificaLogin', 'moduloEstoque');
Route::get('/api/estoque/produtos', [EstoqueController::class,'getListaProdutos'])->name('getListaProdutos')->middleware('VerificaLogin', 'moduloEstoque');
Route::get('/api/busca/produtos', [SearchController::class, 'autocomplete'])->name('autocomplete')->middleware('VerificaLogin', 'moduloEstoque');
Route::get('/api/busca/ncm', [SearchController::class, 'autocomplete2'])->name('autocomplete2')->middleware('VerificaLogin', 'moduloEstoque');


Route::get('/estoque/entradas', [EstoqueController::class,'entradas'])->name('estoque.entradas')->middleware('VerificaLogin', 'moduloEstoque');
Route::get('/api/estoque/entradas', [EstoqueController::class,'getEntradas'])->name('getEntradas')->middleware('VerificaLogin', 'moduloEstoque');
Route::post('/api/cadastrar/entrada', [EstoqueController::class, 'cadastrarEntrada'])->name('cadastrar.entrada')->middleware('VerificaLogin', 'moduloEstoque');
Route::get('/api/excluir/entrada/{id?}', [EstoqueController::class, 'excluirEntrada'])->name('excluir.entrada')->middleware('VerificaLogin', 'moduloEstoque');




Route::get('/estoque/saidas', [EstoqueController::class,'saidas'])->name('estoque.saidas')->middleware('VerificaLogin');
Route::get('/api/estoque/saidas', [EstoqueController::class,'getSaidas'])->name('getSaidas')->middleware('VerificaLogin');
Route::post('/api/cadastrar/saida', [EstoqueController::class, 'cadastrarSaida'])->name('cadastrar.saida')->middleware('VerificaLogin', 'moduloEstoque');
Route::get('/api/excluir/saida/{id?}', [EstoqueController::class, 'excluirSaida'])->name('excluir.saida')->middleware('VerificaLogin', 'moduloEstoque');

