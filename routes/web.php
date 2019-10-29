<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('index');
});

/* PRODUTOS */

/* GET*/
Route::get('listar-produtos', ['as' => 'listar-produtos', 'uses' => 'ProdutosController@ListarProdutos']);
Route::get('deletar-produto/{id}', ['as' => 'deletar-produto', 'uses' => 'ProdutosController@DeletarProduto']);
Route::get('duplicar-produto/{id}', ['as' => 'duplicar-produto', 'uses' => 'ProdutosController@DuplicarProduto']);
Route::get('listar-areaconhecimento', ['as' => 'listar-areaconhecimento', 'uses' => 'ProdutosController@getAreaConhecimento']);
Route::get('listar-nivelensino', ['as' => 'listar-nivelensino', 'uses' => 'ProdutosController@getNivelEnsino']);
Route::get('listar-anoescolar', ['as' => 'listar-anoescolar', 'uses' => 'ProdutosController@getAnoEscolar']);

Route::get('listar-especificacoes/{id}', ['as' => 'listar-especificacoes', 'uses' => 'ProdutosController@ListarEspecificacoes']);
Route::get('listar-estruturas/{id}', ['as' => 'listar-estruturas', 'uses' => 'ProdutosController@ListarEstruturas']);
Route::get('listar-produtos-estruturas/{id}', ['as' => 'listar-produtos-estruturas', 'uses' => 'ProdutosController@ListarProdutosEstruturas']);
Route::get('listar-observacoes/{id}', ['as' => 'listar-observacoes', 'uses' => 'ProdutosController@ListarObservacoes']);

Route::get('listar-modelos', ['as' => 'listar-modelos', 'uses' => 'ModelosController@ListarModelos']);
Route::get('listar-modelo/{id}', ['as' => 'listar-modelo', 'uses' => 'ModelosController@SelecionarModelo']);
Route::get('deletar-modelo/{id}', ['as' => 'deletar-modelo', 'uses' => 'ModelosController@DeletarModelo']);

/* POST */
Route::post('cadastrar-produto', ['as' => 'cadastrar-produto', 'uses' => 'ProdutosController@CadastrarProdutos']);
Route::post('cadastrar-modelo', ['as' => 'cadastrar-modelo', 'uses' => 'ModelosController@CadastrarModelo']);
Route::post('cadastrar-especificacao', ['as' => 'cadastrar-especificacao', 'uses' => 'ProdutosController@CadastrarEspecificacao']);
Route::post('cadastrar-observacao', ['as' => 'cadastrar-observacao', 'uses' => 'ProdutosController@CadastrarObservacao']);
Route::post('cadastrar-estrutura', ['as' => 'cadastrar-estrutura', 'uses' => 'ProdutosController@CadastrarEstrutura']);


Route::post('deletar-estrutura', ['as' => 'deletar-estrutura', 'uses' => 'ProdutosController@DeletarEstrutura']);
